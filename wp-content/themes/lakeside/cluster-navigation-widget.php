<?php
/**
 * Cluster Navigation Widget
 * 
 * Provides navigation within pillar clusters
 * Shows upward links to pillar pages and cluster membership
 * 
 * @package Lakeside
 * @subpackage Internal_Linking
 */

class ClusterNavigationWidget extends WP_Widget {
    
    private $cluster_data;
    
    public function __construct() {
        parent::__construct(
            'cluster_navigation_widget',
            'Cluster Navigation',
            array('description' => 'Displays cluster navigation and pillar page links')
        );
        
        $this->load_cluster_data();
        
        // Add automatic cluster navigation to content
        add_filter('the_content', array($this, 'add_cluster_breadcrumb'), 5);
    }
    
    /**
     * Load cluster data
     */
    private function load_cluster_data() {
        $json_file = get_stylesheet_directory() . '/../../week3_upward_links.json';
        
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            $data = json_decode($json_content, true);
            $this->cluster_data = isset($data['clusters']) ? $data['clusters'] : array();
        }
    }
    
    /**
     * Front-end display of widget
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $current_cluster = $this->get_current_page_cluster();
        
        if ($current_cluster) {
            echo $this->build_cluster_navigation($current_cluster);
        }
        
        echo $args['after_widget'];
    }
    
    /**
     * Back-end widget form
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'Equipment Categories';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
                   type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    
    /**
     * Sanitize widget form values
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
    
    /**
     * Get current page's cluster
     */
    private function get_current_page_cluster() {
        $current_url = get_permalink();
        
        foreach ($this->cluster_data as $cluster_id => $cluster_info) {
            foreach ($cluster_info['content_items'] as $item) {
                if (strpos($current_url, $item['url']) !== false) {
                    return array(
                        'cluster_id' => $cluster_id,
                        'cluster_info' => $cluster_info
                    );
                }
            }
        }
        
        return null;
    }
    
    /**
     * Build cluster navigation HTML
     */
    private function build_cluster_navigation($current_cluster) {
        $cluster_info = $current_cluster['cluster_info'];
        
        $html = '<div class="cluster-navigation-widget">';
        $html .= '<div class="cluster-badge">';
        $html .= '<span class="cluster-icon">📂</span>';
        $html .= '<span class="cluster-name">Part of: ' . esc_html($cluster_info['pillar_title']) . '</span>';
        $html .= '</div>';
        
        $html .= '<a href="' . esc_url($cluster_info['pillar_url']) . '" class="pillar-link-button">';
        $html .= 'View All ' . esc_html($cluster_info['pillar_title']);
        $html .= '<span class="button-arrow">→</span>';
        $html .= '</a>';
        
        $html .= '<div class="cluster-stats">';
        $html .= '<span class="stat-item">';
        $html .= '<strong>' . $cluster_info['content_count'] . '</strong> related items';
        $html .= '</span>';
        $html .= '</div>';
        
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Add cluster breadcrumb to content
     */
    public function add_cluster_breadcrumb($content) {
        if (!is_single() && !is_page()) {
            return $content;
        }
        
        $current_cluster = $this->get_current_page_cluster();
        
        if (!$current_cluster) {
            return $content;
        }
        
        $breadcrumb = $this->build_cluster_breadcrumb($current_cluster);
        
        return $breadcrumb . $content;
    }
    
    /**
     * Build cluster breadcrumb
     */
    private function build_cluster_breadcrumb($current_cluster) {
        $cluster_info = $current_cluster['cluster_info'];
        
        $html = '<div class="cluster-breadcrumb">';
        $html .= '<a href="/" class="breadcrumb-home">Home</a>';
        $html .= '<span class="breadcrumb-separator">›</span>';
        $html .= '<a href="' . esc_url($cluster_info['pillar_url']) . '" class="breadcrumb-pillar">';
        $html .= esc_html($cluster_info['pillar_title']);
        $html .= '</a>';
        $html .= '<span class="breadcrumb-separator">›</span>';
        $html .= '<span class="breadcrumb-current">' . get_the_title() . '</span>';
        $html .= '</div>';
        
        return $html;
    }
}

// Register the widget
function register_cluster_navigation_widget() {
    register_widget('ClusterNavigationWidget');
}
add_action('widgets_init', 'register_cluster_navigation_widget');

/**
 * Add CSS for cluster navigation
 */
function cluster_navigation_styles() {
    ?>
    <style>
        /* Cluster Navigation Widget */
        .cluster-navigation-widget {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        
        .cluster-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            padding: 10px;
            background: white;
            border-radius: 6px;
        }
        
        .cluster-icon {
            font-size: 20px;
        }
        
        .cluster-name {
            font-size: 13px;
            font-weight: 600;
            color: #5a6c7d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .pillar-link-button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }
        
        .pillar-link-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        
        .button-arrow {
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        
        .pillar-link-button:hover .button-arrow {
            transform: translateX(5px);
        }
        
        .cluster-stats {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #5a6c7d;
        }
        
        .stat-item strong {
            color: #2c3e50;
            font-size: 16px;
        }
        
        /* Cluster Breadcrumb */
        .cluster-breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            padding: 15px 20px;
            background: #f8f9fa;
            border-left: 3px solid #667eea;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .cluster-breadcrumb a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .cluster-breadcrumb a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .breadcrumb-separator {
            color: #adb5bd;
        }
        
        .breadcrumb-current {
            color: #2c3e50;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .cluster-navigation-widget {
                padding: 15px;
            }
            
            .pillar-link-button {
                padding: 12px 15px;
                font-size: 14px;
            }
            
            .cluster-breadcrumb {
                padding: 12px 15px;
                font-size: 13px;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'cluster_navigation_styles');
