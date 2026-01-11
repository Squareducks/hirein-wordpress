<?php
/**
 * Intra-Cluster Linking System
 * 
 * Implements intra-cluster linking within each of the 5 pillar clusters
 * Creates related content connections within topic areas
 * 
 * @package Lakeside
 * @subpackage Internal_Linking
 */

class IntraClusterLinkingSystem {
    
    private $cluster_data;
    
    public function __construct() {
        $this->load_cluster_data();
        add_filter('the_content', array($this, 'add_related_cluster_content'), 15);
        add_shortcode('cluster_related_content', array($this, 'related_content_shortcode'));
    }
    
    /**
     * Load cluster data from JSON file
     */
    private function load_cluster_data() {
        $json_file = get_stylesheet_directory() . '/../../week3_intra_cluster_links.json';
        
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            $this->cluster_data = json_decode($json_content, true);
        }
    }
    
    /**
     * Add related cluster content widget to posts and pages
     */
    public function add_related_cluster_content($content) {
        if (!is_single() && !is_page()) {
            return $content;
        }
        
        $current_url = get_permalink();
        $related_content = $this->get_related_content($current_url);
        
        if (empty($related_content)) {
            return $content;
        }
        
        $related_widget = $this->build_related_content_widget($related_content);
        
        // Add related content before the last paragraph
        $content = $this->insert_before_last_paragraph($content, $related_widget);
        
        return $content;
    }
    
    /**
     * Get related content for current URL
     */
    private function get_related_content($current_url) {
        if (empty($this->cluster_data)) {
            return array();
        }
        
        // Search through all clusters for current URL
        foreach ($this->cluster_data as $cluster_id => $cluster_info) {
            foreach ($cluster_info['linking_opportunities'] as $opportunity) {
                if (strpos($current_url, $opportunity['source_url']) !== false) {
                    return $opportunity['related_content'];
                }
            }
        }
        
        return array();
    }
    
    /**
     * Build related content widget HTML
     */
    private function build_related_content_widget($related_content) {
        $html = '<div class="intra-cluster-related-content">';
        $html .= '<h3 class="related-content-title">Related Equipment & Services</h3>';
        $html .= '<div class="related-content-grid">';
        
        foreach ($related_content as $item) {
            $html .= '<div class="related-content-item">';
            $html .= '<a href="' . esc_url($item['url']) . '" class="related-content-link">';
            $html .= '<span class="related-content-type">' . esc_html($item['type']) . '</span>';
            $html .= '<span class="related-content-title-text">' . esc_html($item['title']) . '</span>';
            $html .= '<span class="related-content-arrow">→</span>';
            $html .= '</a>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Insert content before the last paragraph
     */
    private function insert_before_last_paragraph($content, $insert) {
        $closing_p = strrpos($content, '</p>');
        
        if ($closing_p !== false) {
            $before = substr($content, 0, $closing_p);
            $after = substr($content, $closing_p);
            return $before . $insert . $after;
        }
        
        return $content . $insert;
    }
    
    /**
     * Shortcode for manually adding related content
     */
    public function related_content_shortcode($atts) {
        $current_url = get_permalink();
        $related_content = $this->get_related_content($current_url);
        
        if (empty($related_content)) {
            return '';
        }
        
        return $this->build_related_content_widget($related_content);
    }
}

// Initialize the intra-cluster linking system
new IntraClusterLinkingSystem();

/**
 * Add CSS for intra-cluster related content
 */
function intra_cluster_related_content_styles() {
    ?>
    <style>
        .intra-cluster-related-content {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #0066cc;
            padding: 30px;
            margin: 40px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .intra-cluster-related-content .related-content-title {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 20px 0;
            padding-bottom: 15px;
            border-bottom: 2px solid #dee2e6;
        }
        
        .related-content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .related-content-item {
            background: white;
            border-radius: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .related-content-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,102,204,0.15);
        }
        
        .related-content-link {
            display: flex;
            flex-direction: column;
            padding: 20px;
            text-decoration: none;
            color: inherit;
            position: relative;
        }
        
        .related-content-type {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0066cc;
            margin-bottom: 8px;
        }
        
        .related-content-title-text {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            line-height: 1.4;
            margin-bottom: 10px;
        }
        
        .related-content-arrow {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 20px;
            color: #0066cc;
            opacity: 0;
            transform: translateX(-5px);
            transition: all 0.3s ease;
        }
        
        .related-content-item:hover .related-content-arrow {
            opacity: 1;
            transform: translateX(0);
        }
        
        .related-content-item:hover .related-content-title-text {
            color: #0066cc;
        }
        
        @media (max-width: 768px) {
            .related-content-grid {
                grid-template-columns: 1fr;
            }
            
            .intra-cluster-related-content {
                padding: 20px;
                margin: 30px 0;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'intra_cluster_related_content_styles');
