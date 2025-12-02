import csv
import re
from collections import defaultdict

# Sample blog post topics and their semantic relevance to equipment categories
blog_posts = [
    {"url": "https://hirein.co.uk/blog/construction-site-safety", "title": "Construction Site Safety Guide", "content_keywords": ["safety", "construction", "site", "equipment", "protection", "scaffold", "ladder", "barriers"]},
    {"url": "https://hirein.co.uk/blog/scaffold-tower-assembly", "title": "How to Assemble a Scaffold Tower", "content_keywords": ["scaffold", "tower", "assembly", "safety", "construction", "height", "platform"]},
    {"url": "https://hirein.co.uk/blog/ladder-safety-tips", "title": "Ladder Safety Tips for DIY Projects", "content_keywords": ["ladder", "safety", "diy", "home", "renovation", "height", "access"]},
    {"url": "https://hirein.co.uk/blog/site-security-equipment", "title": "Essential Site Security Equipment", "content_keywords": ["security", "site", "fencing", "barriers", "protection", "equipment"]},
    {"url": "https://hirein.co.uk/blog/lifting-equipment-guide", "title": "Complete Guide to Lifting Equipment", "content_keywords": ["lifting", "equipment", "material", "handling", "safety", "construction"]},
    {"url": "https://hirein.co.uk/blog/diy-home-renovation", "title": "DIY Home Renovation Project Planning", "content_keywords": ["diy", "home", "renovation", "planning", "equipment", "tools", "ladder", "scaffold"]},
    {"url": "https://hirein.co.uk/blog/powered-access-benefits", "title": "Benefits of Powered Access Equipment", "content_keywords": ["powered", "access", "equipment", "cherry", "picker", "boom", "lift", "height"]},
    {"url": "https://hirein.co.uk/blog/heater-hire-winter", "title": "Winter Construction: Heater Hire Guide", "content_keywords": ["heater", "hire", "winter", "construction", "site", "equipment", "industrial"]},
    {"url": "https://hirein.co.uk/blog/fencing-types-guide", "title": "Types of Construction Site Fencing", "content_keywords": ["fencing", "construction", "site", "security", "barriers", "safety", "protection"]},
    {"url": "https://hirein.co.uk/blog/equipment-maintenance", "title": "Equipment Maintenance Best Practices", "content_keywords": ["equipment", "maintenance", "safety", "construction", "scaffold", "ladder", "lifting"]}
]

def calculate_semantic_relevance(blog_keywords, target_keyword):
    """Calculate semantic relevance score between blog content and target keyword"""
    target_words = target_keyword.lower().split()
    blog_words = [word.lower() for word in blog_keywords]
    
    # Direct keyword matches
    direct_matches = sum(1 for word in target_words if word in blog_words)
    
    # Semantic relationships
    semantic_score = 0
    for blog_word in blog_words:
        for target_word in target_words:
            if blog_word == target_word:
                semantic_score += 1.0
            elif blog_word in target_word or target_word in blog_word:
                semantic_score += 0.7
            elif (blog_word in ['safety', 'equipment', 'construction'] and 
                  target_word in ['hire', 'scaffold', 'ladder', 'lifting']):
                semantic_score += 0.5
    
    # Normalize score
    max_possible_score = len(target_words) + len(blog_words) * 0.5
    relevance_score = min(semantic_score / max_possible_score, 1.0) if max_possible_score > 0 else 0
    
    return round(relevance_score, 3)

# Read content inventory
content_data = []
with open('content_inventory.csv', 'r') as file:
    reader = csv.DictReader(file)
    content_data = list(reader)

# Generate linking map
linking_map = []

for blog in blog_posts:
    for content in content_data:
        if content['ContentType'] == 'Page' and content['PrimaryKeyword'] != 'faq':
            relevance = calculate_semantic_relevance(blog['content_keywords'], content['PrimaryKeyword'])
            if relevance > 0.2:  # Only include meaningful relationships
                linking_map.append({
                    'Supporting_URL': blog['url'],
                    'Supporting_Title': blog['title'],
                    'Target_URL': content['URL'],
                    'Target_Keyword': content['PrimaryKeyword'],
                    'Semantic_Relevance_Score': relevance
                })

# Sort by relevance score
linking_map.sort(key=lambda x: x['Semantic_Relevance_Score'], reverse=True)

# Write linking map
with open('linking_map.csv', 'w', newline='') as file:
    fieldnames = ['Supporting_URL', 'Supporting_Title', 'Target_URL', 'Target_Keyword', 'Semantic_Relevance_Score']
    writer = csv.DictWriter(file, fieldnames=fieldnames)
    writer.writeheader()
    writer.writerows(linking_map)

print(f"Generated linking map with {len(linking_map)} potential internal links")
print("Top 10 highest relevance opportunities:")
for i, link in enumerate(linking_map[:10]):
    print(f"{i+1}. {link['Supporting_Title']} -> {link['Target_Keyword']} (Score: {link['Semantic_Relevance_Score']})")
