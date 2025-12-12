<?php
/**
 * Automated Internal Linking System
 * Week 2 Implementation: Kyle Roof's Reverse Content Silos
 * 
 * This system automatically inserts contextual internal links from blog posts
 * to commercial pages based on semantic relevance analysis.
 */

class HireIn_Internal_Linking_System {
    
    private $linking_map;
    private $anchor_text_variations;
    
    public function __construct() {
        $this->load_linking_map();
        $this->setup_anchor_text_variations();
        add_filter('the_content', array($this, 'insert_contextual_links'), 20);
        add_action('wp_head', array($this, 'add_linking_styles'));
    }
    
    /**
     * Load the semantic linking map from CSV data
     */
    private function load_linking_map() {
        $this->linking_map = array(
            // High-priority linking opportunities (relevance score > 0.7)
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
            )
        );
    }
    
    /**
     * Insert contextual links into blog post content
     */
    public function insert_contextual_links($content) {
        // Only process single blog posts
        if (!is_single() || get_post_type() !== 'post') {
            return $content;
        }
        
        $post_slug = get_post_field('post_name');
        
        // Check if this post has linking opportunities
        if (!isset($this->linking_map[$post_slug])) {
            return $content;
        }
        
        $links_to_insert = $this->linking_map[$post_slug];
        $links_inserted = 0;
        $max_links = 8; // Limit to 8 links per post for natural distribution
        
        foreach ($links_to_insert as $link_data) {
            if ($links_inserted >= $max_links) {
                break;
            }
            
            $keyword = $link_data['keyword'];
            $url = home_url($link_data['url']);
            $anchor_variations = $this->get_anchor_variations($keyword);
            
            // Try to insert link with different anchor text variations
            foreach ($anchor_variations as $anchor_text) {
                if ($this->insert_single_link($content, $anchor_text, $url, $keyword)) {
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
    private function insert_single_link(&$content, $anchor_text, $url, $keyword) {
        // Check if anchor text exists in content and isn't already linked
        $pattern = '/(?<!<a[^>]*>)(?<!<a[^>]*>[^<]*)\b' . preg_quote($anchor_text, '/') . '\b(?![^<]*<\/a>)/i';
        
        if (preg_match($pattern, $content)) {
            // Create the link with proper attributes
            $link_html = sprintf(
                '<a href="%s" class="contextual-internal-link" title="%s" data-keyword="%s">%s</a>',
                esc_url($url),
                esc_attr("Professional $keyword services from HireIn"),
                esc_attr($keyword),
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
        </style>
        <?php
    }
    
    /**
     * Get linking statistics for admin dashboard
     */
    public function get_linking_stats() {
        $stats = array(
            'total_opportunities' => 0,
            'high_priority' => 0,
            'medium_priority' => 0,
            'low_priority' => 0
        );
        
        foreach ($this->linking_map as $post_links) {
            foreach ($post_links as $link) {
                $stats['total_opportunities']++;
                
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

// Initialize the internal linking system
new HireIn_Internal_Linking_System();

/**
 * Admin dashboard widget for linking statistics
 */
function hirein_linking_dashboard_widget() {
    wp_add_dashboard_widget(
        'hirein_internal_linking_stats',
        'Internal Linking Performance',
        'hirein_display_linking_stats'
    );
}
add_action('wp_dashboard_setup', 'hirein_linking_dashboard_widget');

function hirein_display_linking_stats() {
    $system = new HireIn_Internal_Linking_System();
    $stats = $system->get_linking_stats();
    
    echo '<div class="linking-stats-widget">';
    echo '<h4>Week 2 Implementation Status</h4>';
    echo '<p><strong>Total Link Opportunities:</strong> ' . $stats['total_opportunities'] . '</p>';
    echo '<p><strong>High Priority (>0.7):</strong> ' . $stats['high_priority'] . '</p>';
    echo '<p><strong>Medium Priority (0.5-0.7):</strong> ' . $stats['medium_priority'] . '</p>';
    echo '<p><strong>Low Priority (<0.5):</strong> ' . $stats['low_priority'] . '</p>';
    echo '<p><em>System automatically inserts up to 8 contextual links per blog post.</em></p>';
    echo '</div>';
}

/**
 * Link tracking and analytics
 */
function hirein_track_internal_link_clicks() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Track clicks on contextual internal links
        document.querySelectorAll('.contextual-internal-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                // Send tracking data to Google Analytics or custom tracking
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'click', {
                        'event_category': 'Internal Link',
                        'event_label': this.getAttribute('data-keyword'),
                        'value': 1
                    });
                }
                
                // Custom tracking for internal analytics
                if (typeof hirein_analytics !== 'undefined') {
                    hirein_analytics.track('internal_link_click', {
                        keyword: this.getAttribute('data-keyword'),
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
add_action('wp_footer', 'hirein_track_internal_link_clicks');
?>
