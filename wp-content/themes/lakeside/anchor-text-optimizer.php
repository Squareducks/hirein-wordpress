<?php
/**
 * Anchor Text Optimization & Quality Assurance System
 * Week 2 Implementation: Advanced Link Quality Control
 * 
 * This system ensures natural anchor text distribution and prevents over-optimization
 * while maintaining high-quality contextual linking standards.
 */

class HireIn_Anchor_Text_Optimizer {
    
    private $anchor_usage_tracking;
    private $quality_rules;
    private $natural_variations;
    
    public function __construct() {
        $this->init_anchor_tracking();
        $this->setup_quality_rules();
        $this->setup_natural_variations();
        
        add_action('init', array($this, 'init_quality_system'));
        add_action('wp_head', array($this, 'add_quality_styles'));
    }
    
    /**
     * Initialize anchor text usage tracking
     */
    private function init_anchor_tracking() {
        $this->anchor_usage_tracking = get_option('hirein_anchor_usage', array());
    }
    
    /**
     * Setup quality assurance rules
     */
    private function setup_quality_rules() {
        $this->quality_rules = array(
            'max_exact_match_percentage' => 30, // Max 30% exact match anchors
            'min_branded_percentage' => 20,     // Min 20% branded anchors
            'max_links_per_paragraph' => 2,    // Max 2 links per paragraph
            'min_words_between_links' => 50,   // Min 50 words between links
            'max_anchor_length' => 60,         // Max 60 characters per anchor
            'min_context_relevance' => 0.5     // Min relevance score for insertion
        );
    }
    
    /**
     * Setup natural anchor text variations
     */
    private function setup_natural_variations() {
        $this->natural_variations = array(
            'exact_match' => array(
                'weight' => 0.3,
                'examples' => array('lifting equipment hire', 'scaffold hire', 'ladder hire')
            ),
            'partial_match' => array(
                'weight' => 0.25,
                'examples' => array('professional lifting equipment', 'quality scaffold rental', 'ladder rental services')
            ),
            'branded' => array(
                'weight' => 0.2,
                'examples' => array('HireIn lifting equipment', 'HireIn scaffold services', 'HireIn ladder rental')
            ),
            'generic' => array(
                'weight' => 0.15,
                'examples' => array('click here', 'learn more', 'view options', 'get quote')
            ),
            'long_tail' => array(
                'weight' => 0.1,
                'examples' => array('professional construction equipment hire services', 'quality scaffold tower rental solutions')
            )
        );
    }
    
    /**
     * Optimize anchor text selection based on usage patterns
     */
    public function optimize_anchor_selection($keyword, $target_url, $context) {
        $current_usage = $this->get_anchor_usage_stats($keyword);
        $optimal_anchor = $this->select_optimal_anchor($keyword, $current_usage, $context);
        
        // Update usage tracking
        $this->track_anchor_usage($optimal_anchor, $keyword, $target_url);
        
        return $optimal_anchor;
    }
    
    /**
     * Get current anchor text usage statistics
     */
    private function get_anchor_usage_stats($keyword) {
        if (!isset($this->anchor_usage_tracking[$keyword])) {
            $this->anchor_usage_tracking[$keyword] = array(
                'exact_match' => 0,
                'partial_match' => 0,
                'branded' => 0,
                'generic' => 0,
                'long_tail' => 0,
                'total_uses' => 0
            );
        }
        
        return $this->anchor_usage_tracking[$keyword];
    }
    
    /**
     * Select optimal anchor text based on current distribution
     */
    private function select_optimal_anchor($keyword, $usage_stats, $context) {
        $total_uses = $usage_stats['total_uses'];
        
        // If this is the first use, prefer exact match for primary keyword establishment
        if ($total_uses === 0) {
            return $this->generate_exact_match_anchor($keyword);
        }
        
        // Calculate current distribution percentages
        $current_distribution = array();
        foreach ($this->natural_variations as $type => $config) {
            $current_distribution[$type] = $total_uses > 0 ? 
                ($usage_stats[$type] / $total_uses) : 0;
        }
        
        // Find the most underused anchor type
        $target_type = $this->find_underused_anchor_type($current_distribution);
        
        // Generate anchor text for the selected type
        return $this->generate_anchor_by_type($keyword, $target_type, $context);
    }
    
    /**
     * Find the most underused anchor text type
     */
    private function find_underused_anchor_type($current_distribution) {
        $biggest_gap = 0;
        $target_type = 'exact_match';
        
        foreach ($this->natural_variations as $type => $config) {
            $target_percentage = $config['weight'];
            $current_percentage = $current_distribution[$type];
            $gap = $target_percentage - $current_percentage;
            
            if ($gap > $biggest_gap) {
                $biggest_gap = $gap;
                $target_type = $type;
            }
        }
        
        return $target_type;
    }
    
    /**
     * Generate anchor text by type
     */
    private function generate_anchor_by_type($keyword, $type, $context) {
        switch ($type) {
            case 'exact_match':
                return $this->generate_exact_match_anchor($keyword);
                
            case 'partial_match':
                return $this->generate_partial_match_anchor($keyword);
                
            case 'branded':
                return $this->generate_branded_anchor($keyword);
                
            case 'generic':
                return $this->generate_generic_anchor($context);
                
            case 'long_tail':
                return $this->generate_long_tail_anchor($keyword);
                
            default:
                return $keyword;
        }
    }
    
    /**
     * Generate exact match anchor text
     */
    private function generate_exact_match_anchor($keyword) {
        return $keyword;
    }
    
    /**
     * Generate partial match anchor text
     */
    private function generate_partial_match_anchor($keyword) {
        $variations = array(
            "professional $keyword",
            "quality $keyword",
            "$keyword services",
            "reliable $keyword",
            "expert $keyword"
        );
        
        return $variations[array_rand($variations)];
    }
    
    /**
     * Generate branded anchor text
     */
    private function generate_branded_anchor($keyword) {
        $variations = array(
            "HireIn $keyword",
            "$keyword from HireIn",
            "HireIn's $keyword services",
            "$keyword with HireIn"
        );
        
        return $variations[array_rand($variations)];
    }
    
    /**
     * Generate generic anchor text
     */
    private function generate_generic_anchor($context) {
        $generic_anchors = array(
            'learn more',
            'click here',
            'view options',
            'get quote',
            'find out more',
            'see details',
            'explore options',
            'discover more'
        );
        
        return $generic_anchors[array_rand($generic_anchors)];
    }
    
    /**
     * Generate long-tail anchor text
     */
    private function generate_long_tail_anchor($keyword) {
        $long_tail_templates = array(
            "professional $keyword services in the UK",
            "reliable $keyword solutions for construction",
            "quality $keyword equipment rental",
            "expert $keyword services and support"
        );
        
        return $long_tail_templates[array_rand($long_tail_templates)];
    }
    
    /**
     * Track anchor text usage
     */
    private function track_anchor_usage($anchor_text, $keyword, $target_url) {
        $type = $this->classify_anchor_type($anchor_text, $keyword);
        
        if (!isset($this->anchor_usage_tracking[$keyword])) {
            $this->anchor_usage_tracking[$keyword] = array(
                'exact_match' => 0,
                'partial_match' => 0,
                'branded' => 0,
                'generic' => 0,
                'long_tail' => 0,
                'total_uses' => 0
            );
        }
        
        $this->anchor_usage_tracking[$keyword][$type]++;
        $this->anchor_usage_tracking[$keyword]['total_uses']++;
        
        // Save to database
        update_option('hirein_anchor_usage', $this->anchor_usage_tracking);
        
        // Log for analysis
        $this->log_anchor_usage($anchor_text, $keyword, $target_url, $type);
    }
    
    /**
     * Classify anchor text type
     */
    private function classify_anchor_type($anchor_text, $keyword) {
        $anchor_lower = strtolower($anchor_text);
        $keyword_lower = strtolower($keyword);
        
        if ($anchor_lower === $keyword_lower) {
            return 'exact_match';
        }
        
        if (strpos($anchor_lower, 'hirein') !== false) {
            return 'branded';
        }
        
        if (strpos($anchor_lower, $keyword_lower) !== false) {
            return 'partial_match';
        }
        
        if (strlen($anchor_text) > 50) {
            return 'long_tail';
        }
        
        return 'generic';
    }
    
    /**
     * Quality assurance check before link insertion
     */
    public function quality_check($content, $anchor_text, $target_url, $context_score) {
        $checks = array(
            'context_relevance' => $context_score >= $this->quality_rules['min_context_relevance'],
            'anchor_length' => strlen($anchor_text) <= $this->quality_rules['max_anchor_length'],
            'paragraph_density' => $this->check_paragraph_link_density($content, $anchor_text),
            'word_spacing' => $this->check_word_spacing($content, $anchor_text),
            'duplicate_links' => !$this->has_duplicate_link($content, $target_url)
        );
        
        $passed_checks = array_filter($checks);
        $quality_score = count($passed_checks) / count($checks);
        
        return array(
            'passed' => $quality_score >= 0.8, // Require 80% pass rate
            'score' => $quality_score,
            'checks' => $checks,
            'recommendations' => $this->generate_quality_recommendations($checks)
        );
    }
    
    /**
     * Check paragraph link density
     */
    private function check_paragraph_link_density($content, $anchor_text) {
        // Find the paragraph containing the anchor text
        $paragraphs = explode('</p>', $content);
        
        foreach ($paragraphs as $paragraph) {
            if (strpos($paragraph, $anchor_text) !== false) {
                $link_count = substr_count($paragraph, '<a ');
                return $link_count < $this->quality_rules['max_links_per_paragraph'];
            }
        }
        
        return true;
    }
    
    /**
     * Check word spacing between links
     */
    private function check_word_spacing($content, $anchor_text) {
        // This is a simplified check - in production, you'd want more sophisticated analysis
        $words_between_links = 50; // Placeholder - implement actual word counting
        return $words_between_links >= $this->quality_rules['min_words_between_links'];
    }
    
    /**
     * Check for duplicate links to same URL
     */
    private function has_duplicate_link($content, $target_url) {
        return substr_count($content, 'href="' . $target_url . '"') > 0;
    }
    
    /**
     * Generate quality improvement recommendations
     */
    private function generate_quality_recommendations($checks) {
        $recommendations = array();
        
        if (!$checks['context_relevance']) {
            $recommendations[] = 'Improve contextual relevance of link placement';
        }
        
        if (!$checks['anchor_length']) {
            $recommendations[] = 'Shorten anchor text for better user experience';
        }
        
        if (!$checks['paragraph_density']) {
            $recommendations[] = 'Reduce link density in this paragraph';
        }
        
        if (!$checks['word_spacing']) {
            $recommendations[] = 'Increase word spacing between links';
        }
        
        if (!$checks['duplicate_links']) {
            $recommendations[] = 'Avoid duplicate links to the same URL';
        }
        
        return $recommendations;
    }
    
    /**
     * Log anchor usage for analysis
     */
    private function log_anchor_usage($anchor_text, $keyword, $target_url, $type) {
        $log_entry = array(
            'timestamp' => current_time('mysql'),
            'anchor_text' => $anchor_text,
            'keyword' => $keyword,
            'target_url' => $target_url,
            'type' => $type,
            'post_id' => get_the_ID()
        );
        
        $log = get_option('hirein_anchor_log', array());
        $log[] = $log_entry;
        
        // Keep only last 1000 entries
        if (count($log) > 1000) {
            $log = array_slice($log, -1000);
        }
        
        update_option('hirein_anchor_log', $log);
    }
    
    /**
     * Get anchor text distribution report
     */
    public function get_distribution_report() {
        $report = array(
            'total_keywords' => count($this->anchor_usage_tracking),
            'keywords' => array()
        );
        
        foreach ($this->anchor_usage_tracking as $keyword => $stats) {
            if ($stats['total_uses'] > 0) {
                $distribution = array();
                foreach ($this->natural_variations as $type => $config) {
                    $distribution[$type] = array(
                        'count' => $stats[$type],
                        'percentage' => round(($stats[$type] / $stats['total_uses']) * 100, 1),
                        'target_percentage' => round($config['weight'] * 100, 1)
                    );
                }
                
                $report['keywords'][$keyword] = array(
                    'total_uses' => $stats['total_uses'],
                    'distribution' => $distribution
                );
            }
        }
        
        return $report;
    }
    
    /**
     * Initialize quality system
     */
    public function init_quality_system() {
        // Add admin menu for quality reports
        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_quality_admin_menu'));
        }
    }
    
    /**
     * Add quality assurance admin menu
     */
    public function add_quality_admin_menu() {
        add_submenu_page(
            'tools.php',
            'Internal Linking Quality',
            'Link Quality',
            'manage_options',
            'hirein-link-quality',
            array($this, 'display_quality_dashboard')
        );
    }
    
    /**
     * Display quality dashboard
     */
    public function display_quality_dashboard() {
        $report = $this->get_distribution_report();
        
        echo '<div class="wrap">';
        echo '<h1>Internal Linking Quality Dashboard</h1>';
        
        echo '<div class="quality-overview">';
        echo '<h2>Anchor Text Distribution</h2>';
        
        foreach ($report['keywords'] as $keyword => $data) {
            echo '<div class="keyword-report">';
            echo '<h3>' . esc_html($keyword) . ' (' . $data['total_uses'] . ' uses)</h3>';
            
            echo '<table class="wp-list-table widefat fixed striped">';
            echo '<thead><tr><th>Type</th><th>Count</th><th>Current %</th><th>Target %</th><th>Status</th></tr></thead>';
            echo '<tbody>';
            
            foreach ($data['distribution'] as $type => $stats) {
                $status = abs($stats['percentage'] - $stats['target_percentage']) <= 5 ? 
                    '<span style="color: green;">✓ Good</span>' : 
                    '<span style="color: orange;">⚠ Needs adjustment</span>';
                
                echo '<tr>';
                echo '<td>' . ucfirst(str_replace('_', ' ', $type)) . '</td>';
                echo '<td>' . $stats['count'] . '</td>';
                echo '<td>' . $stats['percentage'] . '%</td>';
                echo '<td>' . $stats['target_percentage'] . '%</td>';
                echo '<td>' . $status . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody></table>';
            echo '</div>';
        }
        
        echo '</div>';
        echo '</div>';
    }
    
    /**
     * Add quality assurance styles
     */
    public function add_quality_styles() {
        ?>
        <style>
        .quality-overview {
            margin: 20px 0;
        }
        
        .keyword-report {
            margin-bottom: 30px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        
        .keyword-report h3 {
            margin-top: 0;
            color: #2c3e50;
        }
        
        .quality-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .stat-card {
            background: white;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
        
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9em;
        }
        </style>
        <?php
    }
}

// Initialize the anchor text optimizer
new HireIn_Anchor_Text_Optimizer();
?>
