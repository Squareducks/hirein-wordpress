import csv
import json
from collections import defaultdict

class ClusterAssignmentGenerator:
    def __init__(self):
        self.pillar_clusters = {
            'scaffold-access-solutions': {
                'title': 'Scaffold & Access Solutions',
                'url': '/scaffold-access-solutions/',
                'keywords': ['scaffold', 'ladder', 'access', 'tower', 'platform', 'height', 'working at height'],
                'content': []
            },
            'site-groundworks-equipment': {
                'title': 'Site & Groundworks Equipment',
                'url': '/site-groundworks-equipment/',
                'keywords': ['site', 'groundworks', 'excavation', 'concrete', 'compaction', 'preparation'],
                'content': []
            },
            'safety-security-equipment': {
                'title': 'Safety & Security Equipment',
                'url': '/safety-security-equipment/',
                'keywords': ['safety', 'security', 'protection', 'ppe', 'protective', 'guard', 'barrier'],
                'content': []
            },
            'material-handling-lifting': {
                'title': 'Material Handling & Lifting',
                'url': '/material-handling-lifting/',
                'keywords': ['lifting', 'material handling', 'hoist', 'crane', 'trolley', 'transport', 'moving'],
                'content': []
            },
            'diy-home-renovation': {
                'title': 'DIY & Home Renovation Projects',
                'url': '/diy-home-renovation/',
                'keywords': ['diy', 'home', 'renovation', 'project', 'repair', 'improvement', 'domestic'],
                'content': []
            }
        }
        
    def load_content_inventory(self, csv_file):
        """Load content inventory from CSV"""
        with open(csv_file, 'r') as file:
            reader = csv.DictReader(file)
            for row in reader:
                self.assign_to_cluster(row)
    
    def assign_to_cluster(self, content_row):
        """Assign content to appropriate pillar cluster"""
        url = content_row['URL']
        title = content_row['Page_Title']
        content_type = content_row['Content_Type']
        primary_keyword = content_row['Primary_Keyword'].lower()
        
        # Calculate relevance scores for each pillar
        relevance_scores = {}
        for cluster_id, cluster_data in self.pillar_clusters.items():
            score = self.calculate_cluster_relevance(primary_keyword, title.lower(), cluster_data['keywords'])
            relevance_scores[cluster_id] = score
        
        # Assign to highest scoring cluster
        best_cluster = max(relevance_scores, key=relevance_scores.get)
        
        self.pillar_clusters[best_cluster]['content'].append({
            'url': url,
            'title': title,
            'type': content_type,
            'primary_keyword': content_row['Primary_Keyword'],
            'relevance_score': relevance_scores[best_cluster]
        })
    
    def calculate_cluster_relevance(self, keyword, title, cluster_keywords):
        """Calculate how relevant content is to a cluster"""
        score = 0.0
        
        # Check keyword matches
        for cluster_keyword in cluster_keywords:
            if cluster_keyword in keyword:
                score += 1.0
            if cluster_keyword in title:
                score += 0.5
        
        return score
    
    def generate_upward_linking_system(self):
        """Generate system for upward links to pillar pages"""
        upward_links = {
            'total_content': 0,
            'clusters': {}
        }
        
        for cluster_id, cluster_data in self.pillar_clusters.items():
            cluster_content = cluster_data['content']
            upward_links['total_content'] += len(cluster_content)
            
            upward_links['clusters'][cluster_id] = {
                'pillar_title': cluster_data['title'],
                'pillar_url': cluster_data['url'],
                'content_count': len(cluster_content),
                'content_items': cluster_content
            }
        
        return upward_links
    
    def generate_intra_cluster_links(self):
        """Generate intra-cluster linking opportunities"""
        intra_cluster_links = {}
        
        for cluster_id, cluster_data in self.pillar_clusters.items():
            cluster_content = cluster_data['content']
            
            # Group by content type
            by_type = defaultdict(list)
            for item in cluster_content:
                by_type[item['type']].append(item)
            
            # Generate linking opportunities within types
            links = []
            for content_type, items in by_type.items():
                for i, item in enumerate(items):
                    # Link to 3-5 related items of same type
                    related_items = [other for j, other in enumerate(items) if j != i][:5]
                    
                    if related_items:
                        links.append({
                            'source_url': item['url'],
                            'source_title': item['title'],
                            'related_content': [
                                {'url': r['url'], 'title': r['title'], 'type': r['type']}
                                for r in related_items
                            ]
                        })
            
            intra_cluster_links[cluster_id] = {
                'pillar_title': cluster_data['title'],
                'total_links': len(links),
                'linking_opportunities': links
            }
        
        return intra_cluster_links
    
    def generate_cross_cluster_links(self):
        """Generate cross-cluster linking opportunities"""
        cross_cluster_links = {
            'scaffold-access-solutions': ['safety-security-equipment', 'material-handling-lifting'],
            'site-groundworks-equipment': ['safety-security-equipment', 'material-handling-lifting'],
            'safety-security-equipment': ['scaffold-access-solutions', 'site-groundworks-equipment', 'material-handling-lifting'],
            'material-handling-lifting': ['scaffold-access-solutions', 'site-groundworks-equipment'],
            'diy-home-renovation': ['scaffold-access-solutions', 'safety-security-equipment', 'material-handling-lifting']
        }
        
        cross_links = {}
        for source_cluster, related_clusters in cross_cluster_links.items():
            cross_links[source_cluster] = {
                'pillar_title': self.pillar_clusters[source_cluster]['title'],
                'pillar_url': self.pillar_clusters[source_cluster]['url'],
                'related_pillars': [
                    {
                        'cluster_id': rc,
                        'title': self.pillar_clusters[rc]['title'],
                        'url': self.pillar_clusters[rc]['url']
                    }
                    for rc in related_clusters
                ]
            }
        
        return cross_links

# Generate the cluster assignments
generator = ClusterAssignmentGenerator()
generator.load_content_inventory('content_inventory.csv')

# Generate upward linking system
upward_links = generator.generate_upward_linking_system()
with open('week3_upward_links.json', 'w') as f:
    json.dump(upward_links, f, indent=2)

# Generate intra-cluster links
intra_links = generator.generate_intra_cluster_links()
with open('week3_intra_cluster_links.json', 'w') as f:
    json.dump(intra_links, f, indent=2)

# Generate cross-cluster links
cross_links = generator.generate_cross_cluster_links()
with open('week3_cross_cluster_links.json', 'w') as f:
    json.dump(cross_links, f, indent=2)

print(f"Cluster assignments complete!")
print(f"Total content assigned: {upward_links['total_content']}")
for cluster_id, data in upward_links['clusters'].items():
    print(f"  {data['pillar_title']}: {data['content_count']} items")
