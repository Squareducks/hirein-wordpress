<?php
/**
 * Link Tracking and Verification System
 * Week 2 Implementation: Performance Monitoring & Analytics
 * 
 * This system tracks internal link performance, verifies link integrity,
 * and provides comprehensive analytics for optimization decisions.
 */

class HireIn_Link_Tracking_System {
    
    private $tracking_table;
    private $performance_metrics;
    
    public function __construct() {
        global $wpdb;
        $this->tracking_table = $wpdb->prefix . 'hirein_link_tracking';
        
        add_action('init', array($this, 'init_tracking_system'));
        add_action('wp_ajax_track_internal_link', array($this, 'handle_link_tracking'));
        add_action('wp_ajax_nopriv_track_internal_link', array($this, 'handle_link_tracking'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_tracking_scripts'));
        add_action('wp_head', array($this, 'add_tracking_meta'));
        
        // Daily verification cron job
        add_action('hirein_daily_link_verification', array($this, 'verify_all_links'));
        if (!wp_next_scheduled('hirein_daily_link_verification')) {
            wp_schedule_event(time(), 'daily', 'hirein_daily_link_verification');
        }
    }
    
    /**
     * Initialize tracking system and database
     */
    public function init_tracking_system() {
        $this->create_tracking_table();
        $this->setup_performance_metrics();
        
        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_tracking_admin_menu'));
        }
    }
    
    /**
     * Create tracking database table
     */
    private function create_tracking_table() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS {$this->tracking_table} (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            source_post_id bigint(20) NOT NULL,
            source_url varchar(255) NOT NULL,
            target_url varchar(255) NOT NULL,
            anchor_text varchar(255) NOT NULL,
            keyword varchar(100) NOT NULL,
            click_count bigint(20) DEFAULT 0,
            last_clicked datetime DEFAULT NULL,
            relevance_score decimal(4,3) DEFAULT 0.000,
            conversion_count bigint(20) DEFAULT 0,
            bounce_rate decimal(5,2) DEFAULT 0.00,
            avg_time_on_target decimal(8,2) DEFAULT 0.00,
            link_status varchar(20) DEFAULT 'active',
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY source_post_id (source_post_id),
            KEY target_url (target_url),
            KEY keyword (keyword),
            KEY click_count (click_count),
            KEY created_at (created_at)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    /**
     * Setup performance metrics tracking
     */
    private function setup_performance_metrics() {
        $this->performance_metrics = array(
            'total_internal_links' => 0,
            'total_clicks' => 0,
            'average_ctr' => 0.0,
            'top_performing_keywords' => array(),
            'conversion_rate' => 0.0,
            'link_health_score' => 100.0
        );
    }
    
    /**
     * Register a new internal link for tracking
     */
    public function register_link($source_post_id, $source_url, $target_url, $anchor_text, $keyword, $relevance_score = 0.5) {
        global $wpdb;
        
        // Check if link already exists
        $existing = $wpdb->get_var($wpdb->prepare(
            "SELECT id FROM {$this->tracking_table} 
             WHERE source_post_id = %d AND target_url = %s AND anchor_text = %s",
            $source_post_id, $target_url, $anchor_text
        ));
        
        if (!$existing) {
            $wpdb->insert(
                $this->tracking_table,
                array(
                    'source_post_id' => $source_post_id,
                    'source_url' => $source_url,
                    'target_url' => $target_url,
                    'anchor_text' => $anchor_text,
                    'keyword' => $keyword,
                    'relevance_score' => $relevance_score,
                    'link_status' => 'active'
                ),
                array('%d', '%s', '%s', '%s', '%s', '%f', '%s')
            );
            
            return $wpdb->insert_id;
        }
        
        return $existing;
    }
    
    /**
     * Handle AJAX link tracking requests
     */
    public function handle_link_tracking() {
        // Verify nonce for security
        if (!wp_verify_nonce($_POST['nonce'], 'hirein_link_tracking')) {
            wp_die('Security check failed');
        }
        
        $target_url = sanitize_url($_POST['target_url']);
        $source_url = sanitize_url($_POST['source_url']);
        $anchor_text = sanitize_text_field($_POST['anchor_text']);
        $keyword = sanitize_text_field($_POST['keyword']);
        $timestamp = current_time('mysql');
        
        global $wpdb;
        
        // Update click count and last clicked time
        $wpdb->query($wpdb->prepare(
            "UPDATE {$this->tracking_table} 
             SET click_count = click_count + 1, 
                 last_clicked = %s,
                 updated_at = %s
             WHERE target_url = %s AND anchor_text = %s",
            $timestamp, $timestamp, $target_url, $anchor_text
        ));
        
        // Log detailed click data
        $this->log_click_event($source_url, $target_url, $anchor_text, $keyword);
        
        wp_send_json_success(array(
            'message' => 'Click tracked successfully',
            'timestamp' => $timestamp
        ));
    }
    
    /**
     * Log detailed click event
     */
    private function log_click_event($source_url, $target_url, $anchor_text, $keyword) {
        $click_log = get_option('hirein_click_log', array());
        
        $click_event = array(
            'timestamp' => current_time('mysql'),
            'source_url' => $source_url,
            'target_url' => $target_url,
            'anchor_text' => $anchor_text,
            'keyword' => $keyword,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            'ip_address' => $this->get_client_ip(),
            'referrer' => $_SERVER['HTTP_REFERER'] ?? ''
        );
        
        $click_log[] = $click_event;
        
        // Keep only last 5000 click events
        if (count($click_log) > 5000) {
            $click_log = array_slice($click_log, -5000);
        }
        
        update_option('hirein_click_log', $click_log);
    }
    
    /**
     * Get client IP address
     */
    private function get_client_ip() {
        $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR');
        
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
    
    /**
     * Verify all internal links
     */
    public function verify_all_links() {
        global $wpdb;
        
        $links = $wpdb->get_results(
            "SELECT * FROM {$this->tracking_table} WHERE link_status = 'active'"
        );
        
        $verification_results = array(
            'total_checked' => count($links),
            'working' => 0,
            'broken' => 0,
            'redirected' => 0,
            'slow' => 0
        );
        
        foreach ($links as $link) {
            $status = $this->verify_single_link($link->target_url);
            
            // Update link status in database
            $wpdb->update(
                $this->tracking_table,
                array(
                    'link_status' => $status['status'],
                    'updated_at' => current_time('mysql')
                ),
                array('id' => $link->id),
                array('%s', '%s'),
                array('%d')
            );
            
            // Update verification results
            switch ($status['status']) {
                case 'working':
                    $verification_results['working']++;
                    break;
                case 'broken':
                    $verification_results['broken']++;
                    break;
                case 'redirected':
                    $verification_results['redirected']++;
                    break;
                case 'slow':
                    $verification_results['slow']++;
                    break;
            }
        }
        
        // Save verification results
        update_option('hirein_link_verification_results', $verification_results);
        update_option('hirein_last_verification', current_time('mysql'));
        
        // Send notification if broken links found
        if ($verification_results['broken'] > 0) {
            $this->notify_broken_links($verification_results);
        }
        
        return $verification_results;
    }
    
    /**
     * Verify a single link
     */
    private function verify_single_link($url) {
        $start_time = microtime(true);
        
        $response = wp_remote_get($url, array(
            'timeout' => 10,
            'redirection' => 5,
            'user-agent' => 'HireIn Link Checker/1.0'
        ));
        
        $end_time = microtime(true);
        $response_time = ($end_time - $start_time) * 1000; // Convert to milliseconds
        
        if (is_wp_error($response)) {
            return array(
                'status' => 'broken',
                'response_code' => 0,
                'response_time' => $response_time,
                'error' => $response->get_error_message()
            );
        }
        
        $response_code = wp_remote_retrieve_response_code($response);
        
        if ($response_code >= 200 && $response_code < 300) {
            $status = $response_time > 3000 ? 'slow' : 'working';
        } elseif ($response_code >= 300 && $response_code < 400) {
            $status = 'redirected';
        } else {
            $status = 'broken';
        }
        
        return array(
            'status' => $status,
            'response_code' => $response_code,
            'response_time' => $response_time
        );
    }
    
    /**
     * Notify about broken links
     */
    private function notify_broken_links($results) {
        $admin_email = get_option('admin_email');
        $site_name = get_bloginfo('name');
        
        $subject = "[$site_name] Broken Internal Links Detected";
        $message = "Link verification found {$results['broken']} broken internal links.\n\n";
        $message .= "Verification Summary:\n";
        $message .= "- Total links checked: {$results['total_checked']}\n";
        $message .= "- Working links: {$results['working']}\n";
        $message .= "- Broken links: {$results['broken']}\n";
        $message .= "- Redirected links: {$results['redirected']}\n";
        $message .= "- Slow links: {$results['slow']}\n\n";
        $message .= "Please check the Link Tracking dashboard for details.";
        
        wp_mail($admin_email, $subject, $message);
    }
    
    /**
     * Get comprehensive performance analytics
     */
    public function get_performance_analytics($date_range = '30_days') {
        global $wpdb;
        
        // Calculate date range
        switch ($date_range) {
            case '7_days':
                $date_condition = "DATE(created_at) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                break;
            case '30_days':
                $date_condition = "DATE(created_at) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
                break;
            case '90_days':
                $date_condition = "DATE(created_at) >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
                break;
            default:
                $date_condition = "1=1"; // All time
        }
        
        // Get basic metrics
        $total_links = $wpdb->get_var(
            "SELECT COUNT(*) FROM {$this->tracking_table} WHERE {$date_condition}"
        );
        
        $total_clicks = $wpdb->get_var(
            "SELECT SUM(click_count) FROM {$this->tracking_table} WHERE {$date_condition}"
        );
        
        // Get top performing links
        $top_links = $wpdb->get_results(
            "SELECT target_url, anchor_text, keyword, click_count, relevance_score 
             FROM {$this->tracking_table} 
             WHERE {$date_condition} 
             ORDER BY click_count DESC 
             LIMIT 10"
        );
        
        // Get keyword performance
        $keyword_performance = $wpdb->get_results(
            "SELECT keyword, 
                    COUNT(*) as link_count,
                    SUM(click_count) as total_clicks,
                    AVG(relevance_score) as avg_relevance
             FROM {$this->tracking_table} 
             WHERE {$date_condition}
             GROUP BY keyword 
             ORDER BY total_clicks DESC 
             LIMIT 10"
        );
        
        // Get link health statistics
        $link_health = $wpdb->get_results(
            "SELECT link_status, COUNT(*) as count 
             FROM {$this->tracking_table} 
             WHERE {$date_condition}
             GROUP BY link_status"
        );
        
        // Calculate CTR (simplified - would need page view data for accurate CTR)
        $estimated_ctr = $total_links > 0 ? ($total_clicks / ($total_links * 100)) : 0;
        
        return array(
            'summary' => array(
                'total_links' => $total_links,
                'total_clicks' => $total_clicks,
                'estimated_ctr' => round($estimated_ctr * 100, 2),
                'date_range' => $date_range
            ),
            'top_performing_links' => $top_links,
            'keyword_performance' => $keyword_performance,
            'link_health' => $link_health,
            'verification_results' => get_option('hirein_link_verification_results', array()),
            'last_verification' => get_option('hirein_last_verification', 'Never')
        );
    }
    
    /**
     * Enqueue tracking scripts
     */
    public function enqueue_tracking_scripts() {
        if (is_single() && get_post_type() === 'post') {
            wp_enqueue_script('jquery');
            
            $script = "
            jQuery(document).ready(function($) {
                $('.contextual-internal-link').on('click', function(e) {
                    var targetUrl = $(this).attr('href');
                    var anchorText = $(this).text();
                    var keyword = $(this).data('keyword') || '';
                    var sourceUrl = window.location.href;
                    
                    $.ajax({
                        url: '" . admin_url('admin-ajax.php') . "',
                        type: 'POST',
                        data: {
                            action: 'track_internal_link',
                            target_url: targetUrl,
                            source_url: sourceUrl,
                            anchor_text: anchorText,
                            keyword: keyword,
                            nonce: '" . wp_create_nonce('hirein_link_tracking') . "'
                        },
                        success: function(response) {
                            console.log('Link click tracked:', response);
                        }
                    });
                });
            });
            ";
            
            wp_add_inline_script('jquery', $script);
        }
    }
    
    /**
     * Add tracking meta tags
     */
    public function add_tracking_meta() {
        if (is_single() && get_post_type() === 'post') {
            echo '<meta name="hirein-tracking" content="enabled">' . "\n";
            echo '<script>window.hireinTracking = true;</script>' . "\n";
        }
    }
    
    /**
     * Add tracking admin menu
     */
    public function add_tracking_admin_menu() {
        add_submenu_page(
            'tools.php',
            'Link Tracking Analytics',
            'Link Analytics',
            'manage_options',
            'hirein-link-analytics',
            array($this, 'display_analytics_dashboard')
        );
    }
    
    /**
     * Display analytics dashboard
     */
    public function display_analytics_dashboard() {
        $date_range = $_GET['range'] ?? '30_days';
        $analytics = $this->get_performance_analytics($date_range);
        
        echo '<div class="wrap">';
        echo '<h1>Internal Link Analytics Dashboard</h1>';
        
        // Date range selector
        echo '<div class="date-range-selector">';
        echo '<label for="date-range">Date Range: </label>';
        echo '<select id="date-range" onchange="window.location.href=\'?page=hirein-link-analytics&range=\'+this.value">';
        $ranges = array('7_days' => '7 Days', '30_days' => '30 Days', '90_days' => '90 Days', 'all_time' => 'All Time');
        foreach ($ranges as $value => $label) {
            $selected = $value === $date_range ? 'selected' : '';
            echo "<option value=\"$value\" $selected>$label</option>";
        }
        echo '</select>';
        echo '</div>';
        
        // Summary cards
        echo '<div class="analytics-summary">';
        echo '<div class="summary-card">';
        echo '<h3>Total Internal Links</h3>';
        echo '<div class="metric-value">' . number_format($analytics['summary']['total_links']) . '</div>';
        echo '</div>';
        
        echo '<div class="summary-card">';
        echo '<h3>Total Clicks</h3>';
        echo '<div class="metric-value">' . number_format($analytics['summary']['total_clicks']) . '</div>';
        echo '</div>';
        
        echo '<div class="summary-card">';
        echo '<h3>Estimated CTR</h3>';
        echo '<div class="metric-value">' . $analytics['summary']['estimated_ctr'] . '%</div>';
        echo '</div>';
        echo '</div>';
        
        // Top performing links
        echo '<div class="top-links-section">';
        echo '<h2>Top Performing Links</h2>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Target URL</th><th>Anchor Text</th><th>Keyword</th><th>Clicks</th><th>Relevance Score</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($analytics['top_performing_links'] as $link) {
            echo '<tr>';
            echo '<td><a href="' . esc_url($link->target_url) . '" target="_blank">' . esc_html($link->target_url) . '</a></td>';
            echo '<td>' . esc_html($link->anchor_text) . '</td>';
            echo '<td>' . esc_html($link->keyword) . '</td>';
            echo '<td>' . number_format($link->click_count) . '</td>';
            echo '<td>' . number_format($link->relevance_score, 3) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table>';
        echo '</div>';
        
        // Keyword performance
        echo '<div class="keyword-performance-section">';
        echo '<h2>Keyword Performance</h2>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Keyword</th><th>Links</th><th>Total Clicks</th><th>Avg Relevance</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($analytics['keyword_performance'] as $keyword) {
            echo '<tr>';
            echo '<td>' . esc_html($keyword->keyword) . '</td>';
            echo '<td>' . number_format($keyword->link_count) . '</td>';
            echo '<td>' . number_format($keyword->total_clicks) . '</td>';
            echo '<td>' . number_format($keyword->avg_relevance, 3) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table>';
        echo '</div>';
        
        // Link health status
        echo '<div class="link-health-section">';
        echo '<h2>Link Health Status</h2>';
        echo '<div class="health-stats">';
        
        foreach ($analytics['link_health'] as $status) {
            $status_class = $status->link_status === 'working' ? 'status-good' : 
                           ($status->link_status === 'broken' ? 'status-bad' : 'status-warning');
            
            echo '<div class="health-stat ' . $status_class . '">';
            echo '<div class="status-label">' . ucfirst($status->link_status) . '</div>';
            echo '<div class="status-count">' . number_format($status->count) . '</div>';
            echo '</div>';
        }
        
        echo '</div>';
        echo '<p><strong>Last Verification:</strong> ' . esc_html($analytics['last_verification']) . '</p>';
        echo '</div>';
        
        echo '</div>';
        
        // Add dashboard styles
        echo '<style>
        .analytics-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .summary-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .summary-card h3 {
            margin: 0 0 10px 0;
            color: #2c3e50;
            font-size: 1rem;
        }
        
        .metric-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #007bff;
        }
        
        .health-stats {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        
        .health-stat {
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            min-width: 120px;
        }
        
        .status-good { background: #d4edda; border-left: 4px solid #28a745; }
        .status-warning { background: #fff3cd; border-left: 4px solid #ffc107; }
        .status-bad { background: #f8d7da; border-left: 4px solid #dc3545; }
        
        .status-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .status-count {
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .date-range-selector {
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        
        .top-links-section, .keyword-performance-section, .link-health-section {
            margin: 30px 0;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        </style>';
    }
}

// Initialize the link tracking system
new HireIn_Link_Tracking_System();
?>
