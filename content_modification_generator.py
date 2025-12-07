import csv
import json
from collections import defaultdict

class ContentModificationGenerator:
    def __init__(self):
        self.linking_map = {}
        self.anchor_variations = {
            'lifting equipment hire': [
                'lifting equipment hire', 'professional lifting equipment', 
                'lifting gear rental', 'hire lifting equipment', 'lifting equipment services'
            ],
            'ladder hire': [
                'ladder hire', 'professional ladder rental', 'hire a ladder', 
                'ladder rental services', 'quality ladder hire'
            ],
            'scaffold hire': [
                'scaffold hire', 'scaffolding rental', 'professional scaffolding',
                'scaffold tower hire', 'scaffolding services'
            ],
            'heater hire': [
                'heater hire', 'industrial heater rental', 'construction heaters',
                'site heating solutions', 'portable heater hire'
            ],
            'equipment hire': [
                'equipment hire', 'construction equipment rental', 'professional equipment hire',
                'hire construction equipment', 'equipment rental services'
            ]
        }
        
    def load_linking_map(self, csv_file):
        """Load the semantic linking map from CSV"""
        with open(csv_file, 'r') as file:
            reader = csv.DictReader(file)
            for row in reader:
                source_post = self.extract_post_slug(row['Source_URL'])
                if source_post not in self.linking_map:
                    self.linking_map[source_post] = []
                
                self.linking_map[source_post].append({
                    'target_url': row['Target_URL'],
                    'keyword': row['Target_Keyword'],
                    'relevance_score': float(row['Semantic_Relevance_Score']),
                    'source_title': row['Source_Title']
                })
    
    def extract_post_slug(self, url):
        """Extract post slug from URL"""
        if '/blog/' in url:
            return url.split('/blog/')[-1].rstrip('/')
        return url.split('/')[-1].rstrip('/')
    
    def generate_modification_instructions(self):
        """Generate detailed content modification instructions"""
        instructions = {
            'total_posts': len(self.linking_map),
            'total_links': sum(len(links) for links in self.linking_map.values()),
            'modifications': []
        }
        
        for post_slug, links in self.linking_map.items():
            # Sort links by relevance score (highest first)
            sorted_links = sorted(links, key=lambda x: x['relevance_score'], reverse=True)
            
            # Limit to top 8 links per post for natural distribution
            top_links = sorted_links[:8]
            
            post_instruction = {
                'post_slug': post_slug,
                'post_title': top_links[0]['source_title'] if top_links else '',
                'links_to_insert': len(top_links),
                'modifications': []
            }
            
            for i, link in enumerate(top_links, 1):
                keyword = link['keyword']
                target_url = link['target_url']
                score = link['relevance_score']
                
                # Get anchor text variations
                anchor_options = self.get_anchor_variations(keyword)
                
                modification = {
                    'priority': i,
                    'target_url': target_url,
                    'primary_keyword': keyword,
                    'relevance_score': score,
                    'anchor_text_options': anchor_options,
                    'insertion_strategy': self.get_insertion_strategy(score),
                    'context_requirements': self.get_context_requirements(keyword)
                }
                
                post_instruction['modifications'].append(modification)
            
            instructions['modifications'].append(post_instruction)
        
        return instructions
    
    def get_anchor_variations(self, keyword):
        """Get anchor text variations for natural linking"""
        if keyword in self.anchor_variations:
            return self.anchor_variations[keyword]
        
        # Generate default variations
        base_variations = [
            keyword,
            f"professional {keyword}",
            f"quality {keyword}",
            f"{keyword} services"
        ]
        
        return base_variations
    
    def get_insertion_strategy(self, score):
        """Determine insertion strategy based on relevance score"""
        if score >= 0.7:
            return "high_priority_contextual"
        elif score >= 0.5:
            return "medium_priority_natural"
        else:
            return "low_priority_subtle"
    
    def get_context_requirements(self, keyword):
        """Define context requirements for natural link insertion"""
        context_map = {
            'lifting equipment hire': [
                "When discussing material handling",
                "In sections about construction equipment",
                "When mentioning heavy lifting tasks",
                "In safety-related equipment discussions"
            ],
            'ladder hire': [
                "When discussing access equipment",
                "In height-related work sections",
                "When mentioning scaffolding alternatives",
                "In DIY project equipment lists"
            ],
            'scaffold hire': [
                "When discussing working at height",
                "In construction project sections",
                "When mentioning access solutions",
                "In safety equipment discussions"
            ],
            'heater hire': [
                "When discussing winter construction",
                "In sections about site conditions",
                "When mentioning temperature control",
                "In equipment maintenance discussions"
            ]
        }
        
        return context_map.get(keyword, ["In relevant equipment discussions"])
    
    def generate_wordpress_snippets(self, instructions):
        """Generate WordPress code snippets for implementation"""
        snippets = []
        
        for post_data in instructions['modifications']:
            post_slug = post_data['post_slug']
            
            snippet = f"""
// Content modification for: {post_data['post_title']}
// Post slug: {post_slug}
// Links to insert: {post_data['links_to_insert']}

function modify_content_{post_slug.replace('-', '_')}($content) {{
    // Only process this specific post
    if (get_post_field('post_name') !== '{post_slug}') {{
        return $content;
    }}
    
"""
            
            for mod in post_data['modifications']:
                snippet += f"""    // Priority {mod['priority']}: {mod['primary_keyword']} (Score: {mod['relevance_score']})
    $anchor_options = {json.dumps(mod['anchor_text_options'])};
    $target_url = home_url('{mod['target_url']}');
    
    foreach ($anchor_options as $anchor_text) {{
        if (hirein_insert_contextual_link($content, $anchor_text, $target_url)) {{
            break; // Move to next link
        }}
    }}
    
"""
            
            snippet += """    return $content;
}
add_filter('the_content', 'modify_content_""" + post_slug.replace('-', '_') + """', 15);

"""
            snippets.append(snippet)
        
        return snippets

# Generate the modifications
generator = ContentModificationGenerator()
generator.load_linking_map('linking_map.csv')
instructions = generator.generate_modification_instructions()

# Save detailed instructions
with open('week2_modification_instructions.json', 'w') as f:
    json.dump(instructions, f, indent=2)

# Generate WordPress code snippets
snippets = generator.generate_wordpress_snippets(instructions)
with open('week2_wordpress_snippets.php', 'w') as f:
    f.write("<?php\n")
    f.write("// Week 2 Implementation: Content Modification Snippets\n")
    f.write("// Generated automatically from semantic linking map\n\n")
    for snippet in snippets:
        f.write(snippet)

print(f"Generated modification instructions for {instructions['total_posts']} posts")
print(f"Total links to insert: {instructions['total_links']}")
print(f"Average links per post: {instructions['total_links'] / instructions['total_posts']:.1f}")
