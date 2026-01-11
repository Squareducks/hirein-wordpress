<?php
/**
 * Cross-Cluster Linking System
 * 
 * Implements cross-cluster linking for complementary topics
 * Creates connections between different pillar clusters
 * 
 * @package Lakeside
 * @subpackage Internal_Linking
 */

class CrossClusterLinkingSystem {
    
    private $cross_cluster_data;
    
    public function __construct() {
        $this->load_cross_cluster_data();
        add_filter('the_content', array($this, 'add_cross_cluster_links'), 20);
        add_action('hirein_pillar_page_footer', array($this, 'display_related_pillars'));
    }
    
    /**
     * Load cross-cluster data from JSON file
     */
    private function load_cross_cluster_data() {
        $json_file = get_stylesheet_directory() . '/../../week3_cross_cluster_links.json';
        
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            $this->cross_cluster_data = json_decode($json_content, true);
        }
    }
    
    /**
     * Add cross-cluster links to pillar pages
     */
    public function add_cross_cluster_links($content) {
        if (!$this->is_pillar_page()) {
            return $content;
        }
        
        $current_cluster = $this->get_current_cluster();
        
        if (empty($current_cluster) || empty($this->cross_cluster_data[$current_cluster])) {
            return $content;
        }
        
        $cross_links_widget = $this->build_cross_cluster_widget($current_cluster);
        
        // Append cross-cluster links at the end of content
        return $content . $cross_links_widget;
    }
    
    /**
     * Check if current page is a pillar page
     */
    private function is_pillar_page() {
        $pillar_slugs = array(
            'scaffold-access-solutions',
            'site-groundworks-equipment',
            'safety-security-equipment',
            'material-handling-lifting',
            'diy-home-renovation'
        );
        
        $current_slug = get_post_field('post_name', get_post());
        
        return in_array($current_slug, $pillar_slugs);
    }
    
    /**
     * Get current cluster ID
     */
    private function get_current_cluster() {
        $current_slug = get_post_field('post_name', get_post());
        return $current_slug;
    }
    
    /**
     * Build cross-cluster widget HTML
     */
    private function build_cross_cluster_widget($cluster_id) {
        $cluster_info = $this->cross_cluster_data[$cluster_id];
        
        $html = '<div class="cross-cluster-links-section">';
        $html .= '<div class="cross-cluster-header">';
        $html .= '<h2 class="cross-cluster-title">Explore Related Equipment Categories</h2>';
        $html .= '<p class="cross-cluster-subtitle">Complete your project with complementary equipment and services</p>';
        $html .= '</div>';
        
        $html .= '<div class="cross-cluster-grid">';
        
        foreach ($cluster_info['related_pillars'] as $related_pillar) {
            $html .= $this->build_pillar_card($related_pillar);
        }
        
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Build individual pillar card
     */
    private function build_pillar_card($pillar) {
        $icon = $this->get_pillar_icon($pillar['cluster_id']);
        $description = $this->get_pillar_description($pillar['cluster_id']);
        
        $html = '<div class="pillar-card">';
        $html .= '<a href="' . esc_url($pillar['url']) . '" class="pillar-card-link">';
        $html .= '<div class="pillar-card-icon">' . $icon . '</div>';
        $html .= '<h3 class="pillar-card-title">' . esc_html($pillar['title']) . '</h3>';
        $html .= '<p class="pillar-card-description">' . esc_html($description) . '</p>';
        $html .= '<span class="pillar-card-cta">Explore Category →</span>';
        $html .= '</a>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Get icon for pillar
     */
    private function get_pillar_icon($cluster_id) {
        $icons = array(
            'scaffold-access-solutions' => '🏗️',
            'site-groundworks-equipment' => '🚧',
            'safety-security-equipment' => '🦺',
            'material-handling-lifting' => '🏋️',
            'diy-home-renovation' => '🔨'
        );
        
        return isset($icons[$cluster_id]) ? $icons[$cluster_id] : '📦';
    }
    
    /**
     * Get description for pillar
     */
    private function get_pillar_description($cluster_id) {
        $descriptions = array(
            'scaffold-access-solutions' => 'Professional scaffolding, ladders, and access platforms for working at height safely and efficiently.',
            'site-groundworks-equipment' => 'Essential equipment for site preparation, excavation, and groundworks projects of all sizes.',
            'safety-security-equipment' => 'Comprehensive safety and security solutions to protect your team and site.',
            'material-handling-lifting' => 'Lifting and material handling equipment for efficient project execution.',
            'diy-home-renovation' => 'Everything you need for successful DIY and home renovation projects.'
        );
        
        return isset($descriptions[$cluster_id]) ? $descriptions[$cluster_id] : 'Explore our comprehensive range of equipment hire solutions.';
    }
    
    /**
     * Display related pillars (for use in templates)
     */
    public function display_related_pillars() {
        if (!$this->is_pillar_page()) {
            return;
        }
        
        $current_cluster = $this->get_current_cluster();
        
        if (empty($current_cluster) || empty($this->cross_cluster_data[$current_cluster])) {
            return;
        }
        
        echo $this->build_cross_cluster_widget($current_cluster);
    }
}

// Initialize the cross-cluster linking system
new CrossClusterLinkingSystem();

/**
 * Add CSS for cross-cluster links
 */
function cross_cluster_links_styles() {
    ?>
    <style>
        .cross-cluster-links-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 30px;
            margin: 60px 0;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }
        
        .cross-cluster-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .cross-cluster-title {
            font-size: 32px;
            font-weight: 800;
            margin: 0 0 15px 0;
            color: white;
        }
        
        .cross-cluster-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin: 0;
        }
        
        .cross-cluster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .pillar-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .pillar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        
        .pillar-card-link {
            display: block;
            padding: 30px;
            text-decoration: none;
            color: inherit;
        }
        
        .pillar-card-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .pillar-card-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0 0 12px 0;
            line-height: 1.3;
        }
        
        .pillar-card-description {
            font-size: 15px;
            color: #5a6c7d;
            line-height: 1.6;
            margin: 0 0 20px 0;
        }
        
        .pillar-card-cta {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            color: #667eea;
            transition: all 0.3s ease;
        }
        
        .pillar-card:hover .pillar-card-cta {
            color: #764ba2;
            transform: translateX(5px);
        }
        
        .pillar-card:hover .pillar-card-title {
            color: #667eea;
        }
        
        @media (max-width: 768px) {
            .cross-cluster-links-section {
                padding: 40px 20px;
                margin: 40px 0;
            }
            
            .cross-cluster-title {
                font-size: 26px;
            }
            
            .cross-cluster-subtitle {
                font-size: 16px;
            }
            
            .cross-cluster-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'cross_cluster_links_styles');
