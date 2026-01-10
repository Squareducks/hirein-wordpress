<?php
/**
 * 404 Error Page Template
 * 
 * Phase 0 SEO Optimization - Quick Win #5
 * Added: January 10, 2026
 * Purpose: Improve user experience when pages are not found
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Page Not Found', 'lakeside'); ?></h1>
                </header>

                <div class="page-content">
                    <div class="error-message" style="text-align: center; padding: 40px 20px;">
                        <div class="error-icon" style="font-size: 80px; color: #e74c3c; margin-bottom: 20px;">
                            ⚠️
                        </div>
                        
                        <h2 style="color: #333; margin-bottom: 20px;">
                            <?php esc_html_e("Oops! We couldn't find that page.", 'lakeside'); ?>
                        </h2>
                        
                        <p style="font-size: 18px; color: #666; max-width: 600px; margin: 0 auto 30px;">
                            <?php esc_html_e("The page you're looking for may have been moved, deleted, or doesn't exist. Don't worry - we can help you find what you need.", 'lakeside'); ?>
                        </p>

                        <div class="helpful-links" style="margin: 30px 0;">
                            <h3 style="color: #333; margin-bottom: 15px;">
                                <?php esc_html_e('Here are some helpful links:', 'lakeside'); ?>
                            </h3>
                            
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li style="margin: 10px 0;">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" style="color: #3498db; text-decoration: none; font-size: 16px;">
                                        🏠 <?php esc_html_e('Return to Homepage', 'lakeside'); ?>
                                    </a>
                                </li>
                                <li style="margin: 10px 0;">
                                    <a href="<?php echo esc_url(home_url('/scaffold-towers/')); ?>" style="color: #3498db; text-decoration: none; font-size: 16px;">
                                        🔧 <?php esc_html_e('Browse Scaffold Towers', 'lakeside'); ?>
                                    </a>
                                </li>
                                <li style="margin: 10px 0;">
                                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" style="color: #3498db; text-decoration: none; font-size: 16px;">
                                        🛒 <?php esc_html_e('View All Products', 'lakeside'); ?>
                                    </a>
                                </li>
                                <li style="margin: 10px 0;">
                                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="color: #3498db; text-decoration: none; font-size: 16px;">
                                        📞 <?php esc_html_e('Contact Us', 'lakeside'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="search-section" style="margin-top: 30px; padding: 20px; background: #f9f9f9; border-radius: 8px; max-width: 500px; margin-left: auto; margin-right: auto;">
                            <h3 style="color: #333; margin-bottom: 15px;">
                                <?php esc_html_e('Or try searching:', 'lakeside'); ?>
                            </h3>
                            <?php get_search_form(); ?>
                        </div>

                        <div class="contact-info" style="margin-top: 40px; padding: 20px; background: #e8f4f8; border-radius: 8px;">
                            <p style="margin: 0; color: #333;">
                                <?php esc_html_e('Need help? Call us at', 'lakeside'); ?> 
                                <a href="tel:01onal" style="color: #3498db; font-weight: bold;">01onal</a> 
                                <?php esc_html_e('or email', 'lakeside'); ?> 
                                <a href="mailto:info@hirein.co.uk" style="color: #3498db;">info@hirein.co.uk</a>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>
