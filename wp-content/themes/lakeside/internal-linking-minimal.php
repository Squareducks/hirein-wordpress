<?php
/**
 * HireIn Internal Linking System - Minimal Working Version
 * 
 * A clean, simple implementation following WordPress best practices.
 * This version starts with ONE test link to verify the system works.
 * 
 * @package Lakeside
 * @version 1.0.0
 */

class HireIn_Internal_Linking_Minimal {
    
    /**
     * Constructor - Set up WordPress hooks
     */
    public function __construct() {
        // Hook into the_content filter with priority 10
        add_filter('the_content', array($this, 'add_internal_links'), 10);
        
        // Hook into WooCommerce short description
        add_filter('woocommerce_short_description', array($this, 'add_internal_links'), 10);
    }
    
    /**
     * Add internal links to content
     * 
     * @param string $content The post/page/product content
     * @return string Modified content with internal links
     */
    public function add_internal_links($content) {
        // Only process on singular pages (posts, pages, products)
        if (!is_singular()) {
            return $content;
        }
        
        // Only process in the main loop
        if (!in_the_loop()) {
            return $content;
        }
        
        // Only process the main query
        if (!is_main_query()) {
            return $content;
        }
        
        // Check if this is a supported post type
        $post_type = get_post_type();
        if (!in_array($post_type, array('post', 'page', 'product'))) {
            return $content;
        }
        
        // Get the current page slug
        $post_slug = get_post_field('post_name', get_the_ID());
        
        // Get linking data for this page
        $links_to_add = $this->get_links_for_page($post_slug);
        
        // If no links configured for this page, return unchanged content
        if (empty($links_to_add)) {
            return $content;
        }
        
        // Add each link to the content
        foreach ($links_to_add as $link_data) {
            $content = $this->insert_link($content, $link_data);
        }
        
        return $content;
    }
    
    /**
     * Get links to add for a specific page
     * 
     * @param string $page_slug The slug of the current page
     * @return array Array of link data
     */
    private function get_links_for_page($page_slug) {
        // For now, we'll start with ONE test link on ONE page
        // This proves the system works before scaling up
        
        $linking_map = array(
            // Test on the "Aluminium Scaffold Tower Hire" product page
            'aluminium-scaffold-tower-hire' => array(
                array(
                    'anchor_text' => 'scaffold tower',
                    'target_url' => home_url('/scaffold-access-solutions-complete-equipment-hire-guide/'),
                    'max_insertions' => 1
                )
            )
        );
        
        return isset($linking_map[$page_slug]) ? $linking_map[$page_slug] : array();
    }
    
    /**
     * Insert a single link into content
     * 
     * @param string $content The content to modify
     * @param array $link_data Link configuration (anchor_text, target_url, max_insertions)
     * @return string Modified content
     */
    private function insert_link($content, $link_data) {
        $anchor_text = $link_data['anchor_text'];
        $target_url = $link_data['target_url'];
        $max_insertions = isset($link_data['max_insertions']) ? $link_data['max_insertions'] : 1;
        
        // Check if link already exists in content
        if (strpos($content, 'href="' . $target_url . '"') !== false) {
            return $content; // Link already exists, don't add duplicate
        }
        
        // Create the link HTML
        $link_html = '<a href="' . esc_url($target_url) . '">' . esc_html($anchor_text) . '</a>';
        
        // Use regex to find the anchor text and replace it with a link
        // \b ensures we match whole words only
        $pattern = '/\b(' . preg_quote($anchor_text, '/') . ')\b/i';
        
        // Replace up to max_insertions occurrences
        $content = preg_replace($pattern, $link_html, $content, $max_insertions);
        
        return $content;
    }
}

// Initialize the system
new HireIn_Internal_Linking_Minimal();
