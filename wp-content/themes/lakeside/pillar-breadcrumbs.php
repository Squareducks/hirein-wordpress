<?php
/**
 * Pillar Pages Breadcrumb Navigation
 * Provides contextual navigation for pillar pages
 */

function display_pillar_breadcrumbs() {
    // Only show on pillar pages
    if (!is_page_template('page-scaffold-access-solutions.php') && 
        !is_page_template('page-site-groundworks-equipment.php') &&
        !is_page_template('page-safety-security-equipment.php') &&
        !is_page_template('page-material-handling-lifting.php') &&
        !is_page_template('page-diy-home-renovation.php')) {
        return;
    }

    $current_page = get_the_title();
    $home_url = home_url('/');
    
    echo '<nav class="pillar-breadcrumbs" aria-label="Breadcrumb navigation">';
    echo '<ol class="breadcrumb-list">';
    
    // Home link
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . esc_url($home_url) . '" class="breadcrumb-link">Home</a>';
    echo '</li>';
    
    // Equipment Guides section
    echo '<li class="breadcrumb-item">';
    echo '<span class="breadcrumb-separator">›</span>';
    echo '<span class="breadcrumb-text">Equipment Guides</span>';
    echo '</li>';
    
    // Current page
    echo '<li class="breadcrumb-item active">';
    echo '<span class="breadcrumb-separator">›</span>';
    echo '<span class="breadcrumb-current">' . esc_html($current_page) . '</span>';
    echo '</li>';
    
    echo '</ol>';
    echo '</nav>';
}

// Add breadcrumb styles
function pillar_breadcrumb_styles() {
    ?>
    <style>
    .pillar-breadcrumbs {
        background: #f8f9fa;
        padding: 15px 20px;
        margin: 20px 0;
        border-radius: 6px;
        border: 1px solid #e9ecef;
    }
    
    .breadcrumb-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .breadcrumb-item {
        display: flex;
        align-items: center;
    }
    
    .breadcrumb-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .breadcrumb-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    
    .breadcrumb-separator {
        margin: 0 10px;
        color: #6c757d;
        font-weight: bold;
    }
    
    .breadcrumb-text {
        color: #495057;
        font-weight: 500;
    }
    
    .breadcrumb-current {
        color: #2c3e50;
        font-weight: 600;
    }
    
    @media (max-width: 480px) {
        .pillar-breadcrumbs {
            padding: 10px 15px;
        }
        
        .breadcrumb-separator {
            margin: 0 5px;
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'pillar_breadcrumb_styles');

// Function to get related pillar pages
function get_related_pillar_pages($current_template = '') {
    $all_pillars = array(
        'page-scaffold-access-solutions.php' => array(
            'title' => 'Scaffold & Access Solutions',
            'url' => home_url('/scaffold-access-solutions/'),
            'category' => 'access'
        ),
        'page-site-groundworks-equipment.php' => array(
            'title' => 'Site & Groundworks Equipment',
            'url' => home_url('/site-groundworks-equipment/'),
            'category' => 'site'
        ),
        'page-safety-security-equipment.php' => array(
            'title' => 'Safety & Security Equipment',
            'url' => home_url('/safety-security-equipment/'),
            'category' => 'safety'
        ),
        'page-material-handling-lifting.php' => array(
            'title' => 'Material Handling & Lifting',
            'url' => home_url('/material-handling-lifting/'),
            'category' => 'handling'
        ),
        'page-diy-home-renovation.php' => array(
            'title' => 'DIY & Home Renovation',
            'url' => home_url('/diy-home-renovation/'),
            'category' => 'diy'
        )
    );
    
    // Remove current page from the list
    if (isset($all_pillars[$current_template])) {
        unset($all_pillars[$current_template]);
    }
    
    return $all_pillars;
}

// Display related pillar pages
function display_related_pillar_pages() {
    $current_template = get_page_template_slug();
    
    if (!$current_template || strpos($current_template, 'page-') !== 0) {
        return;
    }
    
    $related_pillars = get_related_pillar_pages($current_template);
    
    if (empty($related_pillars)) {
        return;
    }
    
    echo '<section class="related-pillars">';
    echo '<h3 class="related-pillars-title">Explore More Equipment Guides</h3>';
    echo '<div class="related-pillars-grid">';
    
    foreach ($related_pillars as $pillar) {
        echo '<div class="related-pillar-item">';
        echo '<a href="' . esc_url($pillar['url']) . '" class="related-pillar-link">';
        echo '<h4 class="related-pillar-title">' . esc_html($pillar['title']) . '</h4>';
        echo '<span class="related-pillar-arrow">→</span>';
        echo '</a>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</section>';
}

// Add related pillars styles
function related_pillars_styles() {
    ?>
    <style>
    .related-pillars {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        margin: 40px 0;
        border: 1px solid #e9ecef;
    }
    
    .related-pillars-title {
        color: #2c3e50;
        font-size: 1.5rem;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .related-pillars-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }
    
    .related-pillar-item {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }
    
    .related-pillar-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        border-color: #007bff;
    }
    
    .related-pillar-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        text-decoration: none;
        color: inherit;
    }
    
    .related-pillar-title {
        color: #2c3e50;
        font-size: 1rem;
        margin: 0;
        font-weight: 600;
        flex: 1;
    }
    
    .related-pillar-arrow {
        color: #007bff;
        font-size: 1.2rem;
        font-weight: bold;
        transition: transform 0.3s ease;
    }
    
    .related-pillar-item:hover .related-pillar-arrow {
        transform: translateX(5px);
    }
    
    .related-pillar-item:hover .related-pillar-title {
        color: #007bff;
    }
    </style>
    <?php
}
add_action('wp_head', 'related_pillars_styles');
?>
