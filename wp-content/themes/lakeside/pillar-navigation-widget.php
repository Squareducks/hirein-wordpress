<?php
/**
 * Pillar Navigation Widget
 * Displays navigation links to all pillar pages
 */

class Pillar_Navigation_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'pillar_navigation_widget',
            __('Pillar Pages Navigation', 'text_domain'),
            array('description' => __('Navigation widget for pillar pages', 'text_domain'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Define pillar pages
        $pillar_pages = array(
            array(
                'title' => 'Scaffold & Access Solutions',
                'url' => home_url('/scaffold-access-solutions/'),
                'description' => 'Complete guide to scaffolding, ladders, and powered access equipment'
            ),
            array(
                'title' => 'Site & Groundworks Equipment',
                'url' => home_url('/site-groundworks-equipment/'),
                'description' => 'Essential equipment for site preparation and groundworks'
            ),
            array(
                'title' => 'Safety & Security Equipment',
                'url' => home_url('/safety-security-equipment/'),
                'description' => 'Comprehensive safety and security solutions for construction sites'
            ),
            array(
                'title' => 'Material Handling & Lifting',
                'url' => home_url('/material-handling-lifting/'),
                'description' => 'Equipment for efficient material handling and lifting operations'
            ),
            array(
                'title' => 'DIY & Home Renovation',
                'url' => home_url('/diy-home-renovation/'),
                'description' => 'Tools and equipment for DIY projects and home improvements'
            )
        );

        echo '<div class="pillar-navigation-widget">';
        echo '<ul class="pillar-nav-list">';
        
        foreach ($pillar_pages as $page) {
            echo '<li class="pillar-nav-item">';
            echo '<a href="' . esc_url($page['url']) . '" class="pillar-nav-link">';
            echo '<h4 class="pillar-nav-title">' . esc_html($page['title']) . '</h4>';
            echo '<p class="pillar-nav-description">' . esc_html($page['description']) . '</p>';
            echo '</a>';
            echo '</li>';
        }
        
        echo '</ul>';
        echo '</div>';

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Equipment Guides', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Register the widget
function register_pillar_navigation_widget() {
    register_widget('Pillar_Navigation_Widget');
}
add_action('widgets_init', 'register_pillar_navigation_widget');

// Add CSS for the widget
function pillar_navigation_widget_styles() {
    ?>
    <style>
    .pillar-navigation-widget {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
    }
    
    .pillar-nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .pillar-nav-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .pillar-nav-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .pillar-nav-link {
        text-decoration: none;
        color: inherit;
        display: block;
        transition: all 0.3s ease;
    }
    
    .pillar-nav-link:hover {
        transform: translateX(5px);
    }
    
    .pillar-nav-title {
        color: #2c3e50;
        font-size: 1rem;
        margin: 0 0 5px 0;
        font-weight: 600;
    }
    
    .pillar-nav-link:hover .pillar-nav-title {
        color: #007bff;
    }
    
    .pillar-nav-description {
        color: #6c757d;
        font-size: 0.85rem;
        margin: 0;
        line-height: 1.4;
    }
    </style>
    <?php
}
add_action('wp_head', 'pillar_navigation_widget_styles');
?>
