<?php
/**
 * Enhanced Automated Internal Linking System
 * Week 2.5 Implementation: Extended to All Content Types
 * 
 * This system automatically inserts contextual internal links from:
 * - Blog posts to commercial pages (original)
 * - Pages to pillar pages, products, and blog posts (NEW)
 * - WooCommerce products to pillar pages, related products, and blog posts (NEW)
 * 
 * Based on Kyle Roof's Reverse Content Silos and WooCommerce best practices
 */

class HireIn_Internal_Linking_System_Enhanced {
    
    private $linking_map;
    private $anchor_text_variations;
    private $link_density_rules;
    
    public function __construct() {
        $this->load_linking_map();
        $this->setup_anchor_text_variations();
        $this->setup_link_density_rules();
        
        add_filter('the_content', array($this, 'insert_contextual_links'), 20);
        add_filter('woocommerce_short_description', array($this, 'insert_contextual_links'), 20);
        add_action('wp_head', array($this, 'add_linking_styles'));
    }
    
    /**
     * Setup link density rules by post type
     */
    private function setup_link_density_rules() {
        $this->link_density_rules = array(
            'post' => array(
                'max_links' => 8,
                'max_per_paragraph' => 2,
                'min_words_between' => 50
            ),
            'page' => array(
                'max_links' => 4,
                'max_per_paragraph' => 1,
                'min_words_between' => 75
            ),
            'product' => array(
                'max_links' => 3,
                'max_per_paragraph' => 1,
                'min_words_between' => 100
            )
        );
    }
    
    /**
     * Load the semantic linking map from CSV data
     */
    private function load_linking_map() {
        $this->linking_map = array(
            // ===== BLOG POSTS TO COMMERCIAL PAGES =====
            'lifting-equipment-guide' => array(
                array('url' => '/lifting-equipment-hire/', 'keyword' => 'lifting equipment hire', 'score' => 0.833),
                array('url' => '/lifting-gear-hire/', 'keyword' => 'lifting gear hire', 'score' => 0.667)
            ),
            'equipment-maintenance' => array(
                array('url' => '/lifting-equipment-hire/', 'keyword' => 'lifting equipment hire', 'score' => 0.769),
                array('url' => '/cheap-ladder-hire/', 'keyword' => 'ladder hire', 'score' => 0.615),
                array('url' => '/platform-ladder-hire/', 'keyword' => 'platform ladder hire', 'score' => 0.615),
                array('url' => '/scaffold-hire-prices/', 'keyword' => 'scaffold hire', 'score' => 0.615)
            ),
            'heater-hire-winter' => array(
                array('url' => '/lifting-equipment-hire/', 'keyword' => 'equipment hire', 'score' => 0.615),
                array('url' => '/industrial-heater-hire/', 'keyword' => 'industrial heater hire', 'score' => 0.615),
                array('url' => '/heater-hire/', 'keyword' => 'heater hire', 'score' => 0.545),
                array('url' => '/industrial-gas-heater-hire/', 'keyword' => 'gas heater hire', 'score' => 0.533)
            ),
            'construction-site-safety' => array(
                array('url' => '/cheap-ladder-hire/', 'keyword' => 'ladder hire', 'score' => 0.571),
                array('url' => '/lifting-equipment-hire/', 'keyword' => 'lifting equipment hire', 'score' => 0.571),
                array('url' => '/scaffold-tower-scaff-tag-hire/', 'keyword' => 'scaffold safety', 'score' => 0.522),
                array('url' => '/tower-scaffold-protectors-hire/', 'keyword' => 'scaffold protectors', 'score' => 0.5)
            ),
            'scaffold-tower-assembly' => array(
                array('url' => '/scaffold-tower-scaff-tag-hire/', 'keyword' => 'scaffold tower hire', 'score' => 0.553),
                array('url' => '/aluminium-scaffold-tower-hire/', 'keyword' => 'aluminium scaffold tower', 'score' => 0.533),
                array('url' => '/mobile-scaffold-tower-hire/', 'keyword' => 'mobile scaffold tower', 'score' => 0.533),
                array('url' => '/tower-scaffold-protectors-hire/', 'keyword' => 'scaffold protectors', 'score' => 0.533)
            ),
            
            // ===== PAGES TO PILLAR PAGES AND PRODUCTS (NEW) =====
            'about' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'scaffold equipment', 'score' => 0.65),
                array('url' => '/aluminium-scaffold-tower-hire/', 'keyword' => 'scaffold tower hire', 'score' => 0.60)
            ),
            'contact' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'equipment hire services', 'score' => 0.65)
            ),
            'delivery-information' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'scaffold delivery', 'score' => 0.70),
                array('url' => '/diy-home-renovation-equipment-hire-for-every-project/', 'keyword' => 'equipment delivery', 'score' => 0.65)
            ),
            
            // ===== WOOCOMMERCE PRODUCTS TO PILLAR PAGES (NEW) =====
            'aluminium-scaffold-tower-hire' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'scaffold solutions', 'score' => 0.85),
                array('url' => '/mobile-scaffold-tower-hire/', 'keyword' => 'mobile scaffold tower', 'score' => 0.75)
            ),
            'mobile-scaffold-tower-hire' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'scaffold access solutions', 'score' => 0.85),
                array('url' => '/aluminium-scaffold-tower-hire/', 'keyword' => 'aluminium scaffold tower', 'score' => 0.75)
            ),
            'extension-ladder-hire' => array(
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'access equipment', 'score' => 0.80),
                array('url' => '/diy-home-renovation-equipment-hire-for-every-project/', 'keyword' => 'DIY equipment', 'score' => 0.70)
            ),
            'cheap-ladder-hire' => array(
                array('url' => '/diy-home-renovation-equipment-hire-for-every-project/', 'keyword' => 'DIY ladder hire', 'score' => 0.80),
                array('url' => '/scaffold-access-solutions-complete-equipment-hire-guide/', 'keyword' => 'ladder solutions', 'score' => 0.70)
            ),
            'lifting-equipment-hire' => array(
                array('url' => '/material-handling-lifting-efficient-equipment-solutions/', 'keyword' => 'lifting solutions', 'score' => 0.90),
                array('url' => '/site-groundworks-equipment-professional-hire-services/', 'keyword' => 'site equipment', 'score' => 0.70)
            ),
            'heater-hire' => array(
                array('url' => '/site-groundworks-equipment-professional-hire-services/', 'keyword' => 'site heating', 'score' => 0.85)
            ),
            'barrier-fencing-hire' => array(
                array('url' => '/safety-security-equipment-protect-your-site-team/', 'keyword' => 'site security', 'score' => 0.85),
                array('url' => '/site-groundworks-equipment-professional-hire-services/', 'keyword' => 'site fencing', 'score' => 0.75)
            )
        );
    }
    
    /**
     * Setup anchor text variations for natural linking
     */
    private function setup_anchor_text_variations() {
        $this->anchor_text_variations = array(
            'lifting equipment hire' => array(
                'lifting equipment hire',
                'professional lifting equipment',
                'lifting gear rental',
                'hire lifting equipment',
                'lifting equipment services'
            ),
            'ladder hire' => array(
                'ladder hire',
                'professional ladder rental',
                'hire a ladder',
                'ladder rental services',
                'quality ladder hire'
            ),
            'scaffold hire' => array(
                'scaffold hire',
                'scaffolding rental',
                'professional scaffolding',
                'scaffold tower hire',
                'scaffolding services'
            ),
            'heater hire' => array(
                'heater hire',
                'industrial heater rental',
                'construction heaters',
                'site heating solutions',
                'portable heater hire'
            ),
            'equipment hire' => array(
                'equipment hire',
                'professional equipment rental',
                'hire equipment',
                'equipment hire services',
                'quality equipment hire'
            ),
            'scaffold solutions' => array(
                'scaffold solutions',
                'scaffolding options',
                'scaffold equipment range',
                'complete scaffold solutions'
            ),
            'access equipment' => array(
                'access equipment',
                'working at height equipment',
                'access solutions',
                'height access equipment'
            ),
            'DIY equipment' => array(
                'DIY equipment',
                'home renovation equipment',
                'DIY project equipment',
                'DIY hire equipment'
            ),
            'site security' => array(
                'site security',
                'construction site security',
                'site protection',
                'security solutions'
            )
        );
    }
    
    /**
     * Insert contextual links into content (all post types)
     */
    public function insert_contextual_links($content) {
        // Debug logging
        error_log('HireIn Internal Linking: Filter called');
        error_log('HireIn Internal Linking: is_single=' . (is_single() ? 'true' : 'false') . ', is_page=' . (is_page() ? 'true' : 'false'));
        
        // Only process single posts, pages, and products
        if (!is_single() && !is_page()) {
            error_log('HireIn Internal Linking: Skipped - not single or page');
            return $content;
        }
        
        $post_type = get_post_type();
        error_log('HireIn Internal Linking: post_type=' . $post_type);
        
        // Only process supported post types
        if (!in_array($post_type, array('post', 'page', 'product'))) {
            error_log('HireIn Internal Linking: Skipped - unsupported post type');
            return $content;
        }
        
        $post_slug = get_post_field('post_name');
        error_log('HireIn Internal Linking: post_slug=' . $post_slug);
        
        // Check if this content has linking opportunities
        if (!isset($this->linking_map[$post_slug])) {
            error_log('HireIn Internal Linking: Skipped - no linking map for slug: ' . $post_slug);
            return $content;
        }
        
        error_log('HireIn Internal Linking: Found linking map for: ' . $post_slug . ' with ' . count($this->linking_map[$post_slug]) . ' opportunities');
        
        // Get link density rules for this post type
        $rules = $this->link_density_rules[$post_type];
        $max_links = $rules['max_links'];
        
        $links_to_insert = $this->linking_map[$post_slug];
        $links_inserted = 0;
        
        foreach ($links_to_insert as $link_data) {
            if ($links_inserted >= $max_links) {
                break;
            }
            
            $keyword = $link_data['keyword'];
            $url = home_url($link_data['url']);
            $anchor_variations = $this->get_anchor_variations($keyword);
            
            // Try to insert link with different anchor text variations
            foreach ($anchor_variations as $anchor_text) {
                if ($this->insert_single_link($content, $anchor_text, $url, $keyword, $post_type)) {
                    $links_inserted++;
                    break; // Move to next link opportunity
                }
            }
        }
        
        return $content;
    }
    
    /**
     * Get anchor text variations for a keyword
     */
    private function get_anchor_variations($keyword) {
        if (isset($this->anchor_text_variations[$keyword])) {
            return $this->anchor_text_variations[$keyword];
        }
        
        // Return default variations if specific ones not found
        return array($keyword, "professional $keyword", "quality $keyword");
    }
    
    /**
     * Insert a single contextual link into content
     */
    private function insert_single_link(&$content, $anchor_text, $url, $keyword, $post_type) {
        // Check if anchor text exists in content and isn't already linked
        $pattern = '/(?<!<a[^>]*>)(?<!<a[^>]*>[^<]*)\b' . preg_quote($anchor_text, '/') . '\b(?![^<]*<\/a>)/i';
        
        if (preg_match($pattern, $content)) {
            // Create the link with proper attributes and post type class
            $link_html = sprintf(
                '<a href="%s" class="contextual-internal-link contextual-link-%s" title="%s" data-keyword="%s" data-post-type="%s">%s</a>',
                esc_url($url),
                esc_attr($post_type),
                esc_attr("Professional $keyword services from HireIn"),
                esc_attr($keyword),
                esc_attr($post_type),
                $anchor_text
            );
            
            // Replace first occurrence only
            $content = preg_replace($pattern, $link_html, $content, 1);
            return true;
        }
        
        return false;
    }
    
    /**
     * Add CSS styles for contextual links
     */
    public function add_linking_styles() {
        ?>
        <style>
        .contextual-internal-link {
            color: #007bff;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .contextual-internal-link:hover {
            color: #0056b3;
            border-bottom-color: #0056b3;
            text-decoration: none;
        }
        
        .contextual-internal-link:focus {
            outline: 2px solid #007bff;
            outline-offset: 2px;
        }
        
        /* Ensure links are visually distinct but not overwhelming */
        .entry-content .contextual-internal-link {
            background: linear-gradient(transparent 60%, rgba(0, 123, 255, 0.1) 60%);
            padding: 0 2px;
            border-radius: 2px;
        }
        
        .entry-content .contextual-internal-link:hover {
            background: linear-gradient(transparent 60%, rgba(0, 86, 179, 0.15) 60%);
        }
        
        /* Product-specific link styling */
        .contextual-link-product {
            font-weight: 600;
        }
        
        /* Page-specific link styling */
        .contextual-link-page {
            font-weight: 500;
        }
        </style>
        <?php
    }
    
    /**
     * Get linking statistics for admin dashboard
     */
    public function get_linking_stats() {
        $stats = array(
            'total_opportunities' => 0,
            'by_post_type' => array(
                'post' => 0,
                'page' => 0,
                'product' => 0
            ),
            'high_priority' => 0,
            'medium_priority' => 0,
            'low_priority' => 0
        );
        
        foreach ($this->linking_map as $slug => $post_links) {
            // Determine post type from slug (simplified)
            $post_type = 'post'; // Default
            if (strpos($slug, 'hire') !== false && strpos($slug, '-') !== false) {
                $post_type = 'product';
            } elseif (in_array($slug, array('about', 'contact', 'delivery-information'))) {
                $post_type = 'page';
            }
            
            foreach ($post_links as $link) {
                $stats['total_opportunities']++;
                $stats['by_post_type'][$post_type]++;
                
                if ($link['score'] >= 0.7) {
                    $stats['high_priority']++;
                } elseif ($link['score'] >= 0.5) {
                    $stats['medium_priority']++;
                } else {
                    $stats['low_priority']++;
                }
            }
        }
        
        return $stats;
    }
}

// Initialize the enhanced internal linking system
new HireIn_Internal_Linking_System_Enhanced();

/**
 * Admin dashboard widget for enhanced linking statistics
 */
function hirein_enhanced_linking_dashboard_widget() {
    wp_add_dashboard_widget(
        'hirein_enhanced_internal_linking_stats',
        'Enhanced Internal Linking Performance',
        'hirein_display_enhanced_linking_stats'
    );
}
add_action('wp_dashboard_setup', 'hirein_enhanced_linking_dashboard_widget');

function hirein_display_enhanced_linking_stats() {
    $system = new HireIn_Internal_Linking_System_Enhanced();
    $stats = $system->get_linking_stats();
    
    echo '<div class="linking-stats-widget">';
    echo '<h4>Week 2.5 Enhanced Implementation Status</h4>';
    echo '<p><strong>Total Link Opportunities:</strong> ' . $stats['total_opportunities'] . '</p>';
    
    echo '<h5>By Content Type:</h5>';
    echo '<ul>';
    echo '<li><strong>Blog Posts:</strong> ' . $stats['by_post_type']['post'] . ' opportunities</li>';
    echo '<li><strong>Pages:</strong> ' . $stats['by_post_type']['page'] . ' opportunities</li>';
    echo '<li><strong>Products:</strong> ' . $stats['by_post_type']['product'] . ' opportunities</li>';
    echo '</ul>';
    
    echo '<h5>By Priority:</h5>';
    echo '<p><strong>High Priority (>0.7):</strong> ' . $stats['high_priority'] . '</p>';
    echo '<p><strong>Medium Priority (0.5-0.7):</strong> ' . $stats['medium_priority'] . '</p>';
    echo '<p><strong>Low Priority (<0.5):</strong> ' . $stats['low_priority'] . '</p>';
    
    echo '<p><em>System automatically inserts contextual links across all content types:</em></p>';
    echo '<ul>';
    echo '<li>Blog posts: up to 8 links</li>';
    echo '<li>Pages: up to 4 links</li>';
    echo '<li>Products: up to 3 links</li>';
    echo '</ul>';
    echo '</div>';
}

/**
 * Link tracking and analytics (enhanced for all post types)
 */
function hirein_track_enhanced_internal_link_clicks() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Track clicks on contextual internal links
        document.querySelectorAll('.contextual-internal-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                var postType = this.getAttribute('data-post-type');
                var keyword = this.getAttribute('data-keyword');
                
                // Send tracking data to Google Analytics
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        'event_category': 'Internal Link - ' + postType,
                        'event_label': keyword,
                        'value': 1
                    });
                }
                
                // Custom tracking for internal analytics
                if (typeof hirein_analytics !== 'undefined') {
                    hirein_analytics.track('internal_link_click', {
                        post_type: postType,
                        keyword: keyword,
                        source_url: window.location.href,
                        target_url: this.href
                    });
                }
            });
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'hirein_track_enhanced_internal_link_clicks');
?>
