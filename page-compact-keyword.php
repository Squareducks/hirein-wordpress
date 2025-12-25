<?php
/**
 * Template Name: Compact Keyword Landing Page
 * Description: Optimized template for compact keyword pages (scaffold towers, ladders, etc.)
 * 
 * This template is designed for bottom-of-funnel, high-intent landing pages
 * following Edward Sturm's Compact Keywords methodology.
 */

get_header(); ?>

<div class="compact-keyword-page">
    <div class="container">
        
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <?php if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
            } else {
                echo '<p><a href="' . home_url() . '">Home</a> &raquo; ' . get_the_title() . '</p>';
            } ?>
        </div>
        
        <!-- Main Content Area -->
        <article class="main-content">
            
            <!-- Page Title (H1) -->
            <h1 class="page-title"><?php the_title(); ?></h1>
            
            <!-- Content -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="content-wrapper">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            
            <!-- Trust Signals Section -->
            <div class="trust-signals">
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Next Day Delivery</h3>
                    <p>Order before 3pm for nationwide next-day delivery</p>
                </div>
                
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>70% Cheaper</h3>
                    <p>Up to 70% cheaper than HSS, Speedy & Brandon Hire</p>
                </div>
                
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Free Delivery</h3>
                    <p>Free delivery on all hires of 3 weeks or more</p>
                </div>
            </div>
            
            <!-- Call to Action Section -->
            <div class="cta-section">
                <h2>Ready to Hire?</h2>
                <p>Call our expert hire desk now for immediate availability and a free quote</p>
                <div class="cta-buttons">
                    <a href="tel:08081151064" class="cta-button cta-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92V19.92C22 20.4896 21.5304 20.9592 20.96 20.9592C9.43969 20.9592 0 11.5195 0 0C0 -0.570392 0.469608 -1.04 1.04 -1.04H4.04C4.60961 -1.04 5.07922 -0.570392 5.07922 0C5.07922 1.85359 5.39961 3.63359 5.99961 5.28C6.11922 5.60039 6.01961 5.96078 5.75922 6.18078L3.71922 8.22078C5.51922 11.9608 8.47961 14.9208 12.2196 16.7208L14.2596 14.6808C14.4796 14.4608 14.8396 14.3208 15.1596 14.4808C16.8 15.0808 18.58 15.4008 20.4396 15.4008C21.0092 15.4008 21.4788 15.8704 21.4788 16.44V19.44C21.4788 20.0096 21.0092 20.4792 20.4396 20.4792Z" fill="white"/>
                        </svg>
                        0808 115 1064
                    </a>
                    <a href="/contact-us/" class="cta-button cta-secondary">Request a Call Back</a>
                </div>
            </div>
            
            <!-- Related Services -->
            <?php
            // Get related services from custom field (Pods)
            $related_services = get_post_meta(get_the_ID(), 'related_services', true);
            if ($related_services && is_array($related_services) && count($related_services) > 0) : ?>
                <div class="related-services">
                    <h3>Related Services</h3>
                    <ul class="related-services-list">
                        <?php foreach ($related_services as $service_id) : 
                            $service_title = get_the_title($service_id);
                            $service_url = get_permalink($service_id);
                        ?>
                            <li><a href="<?php echo esc_url($service_url); ?>"><?php echo esc_html($service_title); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
        </article>
        
    </div>
</div>

<style>
.compact-keyword-page {
    padding: 40px 0;
}

.compact-keyword-page .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.breadcrumbs {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
}

.breadcrumbs a {
    color: #0066cc;
    text-decoration: none;
}

.breadcrumbs a:hover {
    text-decoration: underline;
}

.page-title {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.2;
}

.content-wrapper {
    font-size: 16px;
    line-height: 1.8;
    color: #444;
    margin-bottom: 40px;
}

.content-wrapper h2 {
    font-size: 28px;
    color: #333;
    margin-top: 30px;
    margin-bottom: 15px;
}

.content-wrapper ul {
    margin: 15px 0;
    padding-left: 20px;
}

.content-wrapper li {
    margin-bottom: 10px;
}

.trust-signals {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin: 40px 0;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 8px;
}

.trust-item {
    text-align: center;
    flex: 1;
    min-width: 200px;
    margin: 10px;
}

.trust-icon {
    margin-bottom: 15px;
}

.trust-item h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.trust-item p {
    font-size: 14px;
    color: #666;
}

.cta-section {
    text-align: center;
    padding: 40px;
    background: linear-gradient(135deg, #0066cc 0%, #004999 100%);
    color: white;
    border-radius: 8px;
    margin: 40px 0;
}

.cta-section h2 {
    font-size: 32px;
    margin-bottom: 15px;
}

.cta-section p {
    font-size: 18px;
    margin-bottom: 25px;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 30px;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.cta-primary {
    background: #fff;
    color: #0066cc;
}

.cta-primary:hover {
    background: #f0f0f0;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.cta-secondary {
    background: transparent;
    color: #fff;
    border: 2px solid #fff;
}

.cta-secondary:hover {
    background: rgba(255,255,255,0.1);
    transform: translateY(-2px);
}

.related-services {
    margin-top: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 8px;
}

.related-services h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 15px;
}

.related-services-list {
    list-style: none;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 10px;
}

.related-services-list li a {
    display: block;
    padding: 10px 15px;
    background: white;
    color: #0066cc;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.related-services-list li a:hover {
    background: #0066cc;
    color: white;
    transform: translateX(5px);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 28px;
    }
    
    .trust-signals {
        flex-direction: column;
    }
    
    .trust-item {
        margin: 15px 0;
    }
    
    .cta-section h2 {
        font-size: 24px;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-button {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php get_footer(); ?>
