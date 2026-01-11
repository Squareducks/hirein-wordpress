<?php
/**
 * Template Name: Site & Groundworks Equipment Pillar Page
 * Description: Comprehensive guide to site preparation and groundworks equipment
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="pillar-page">
                <header class="pillar-header">
                    <h1 class="pillar-title">The Ultimate Guide to Site &amp; Groundworks Equipment</h1>
                    <p class="pillar-subtitle">Everything you need for successful site preparation and groundworks</p>
                    <div class="pillar-meta">
                        <span class="author">HireIn Equipment Experts</span>
                        <span class="separator">|</span>
                        <span class="date"><?php echo date('F j, Y'); ?></span>
                    </div>
                </header>

                <div class="pillar-content">
                    <section class="pillar-intro">
                        <p>A successful construction project starts from the ground up. Proper site preparation and groundworks are essential for ensuring the stability, safety, and longevity of any structure. This guide provides a comprehensive overview of the essential site and groundworks equipment you need to get your project started on the right foot.</p>
                        
                        <p>From clearing and securing your site to providing essential services like heating and lighting, HireIn offers a complete range of equipment to support every stage of your project. This pillar page will guide you through our offerings and help you select the right tools for the job.</p>
                    </section>

                    <section class="pillar-section">
                        <h2>Site Security &amp; Fencing</h2>
                        <p>Securing your construction site is the first step in any project. It protects your equipment, materials, and the public from potential hazards. We offer a range of robust and reliable fencing solutions to meet your needs.</p>
                        
                        <div class="equipment-grid">
                            <div class="equipment-item">
                                <h4>Security Fencing</h4>
                                <p>For maximum security, our heavy-duty security fencing is the ideal choice. It provides a strong physical barrier to deter unauthorized access.</p>
                                <a href="<?php echo home_url('/security-fencing-hire/'); ?>" class="btn btn-primary">Security Fencing Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Site Fencing</h4>
                                <p>Professional site fencing solutions for construction sites, providing both security and clear boundary definition.</p>
                                <a href="<?php echo home_url('/site-fencing-hire/'); ?>" class="btn btn-primary">Site Fencing Options</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Crowd Control Barriers</h4>
                                <p>For managing pedestrian traffic and cordoning off specific areas, our crowd control barriers are versatile and easy to deploy.</p>
                                <a href="<?php echo home_url('/crowd-control-barrier-hire/'); ?>" class="btn btn-primary">Crowd Control Barriers</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Plastic Barriers</h4>
                                <p>Lightweight and highly visible, plastic barriers are perfect for temporary traffic management and marking out safe zones.</p>
                                <a href="<?php echo home_url('/plastic-barrier-hire/'); ?>" class="btn btn-primary">Plastic Barrier Hire</a>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-section">
                        <h2>Site Heating &amp; Lighting</h2>
                        <p>Maintaining a safe and comfortable working environment is crucial, especially during the colder, darker months. Our range of heating and lighting solutions ensures your project can continue year-round.</p>
                        
                        <div class="equipment-grid">
                            <div class="equipment-item">
                                <h4>Industrial Heaters</h4>
                                <p>For large, open spaces, our industrial heaters provide powerful and efficient heating. Available in both <a href="<?php echo home_url('/industrial-gas-heater-hire/'); ?>">gas</a> and electric options.</p>
                                <a href="<?php echo home_url('/industrial-heater-hire/'); ?>" class="btn btn-warning">Industrial Heater Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Portable Heaters</h4>
                                <p>For smaller, enclosed areas, our portable heaters offer a flexible and convenient heating solution.</p>
                                <a href="<?php echo home_url('/portable-heater-hire/'); ?>" class="btn btn-warning">Portable Heater Options</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Blow Heaters</h4>
                                <p>High-powered blow heaters for rapid heating of large spaces and drying applications.</p>
                                <a href="<?php echo home_url('/blow-heater-hire/'); ?>" class="btn btn-warning">Blow Heater Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Site Lighting</h4>
                                <p>Ensure your site is well-lit and safe with our range of site lighting solutions. From portable floodlights to larger lighting towers.</p>
                                <a href="<?php echo home_url('/site-lighting-hire/'); ?>" class="btn btn-info">Site Lighting Solutions</a>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-section">
                        <h2>Groundworks &amp; Material Handling</h2>
                        <p>Once your site is secure and prepared, the real work of groundworks and material handling begins. We offer a range of equipment to help you move, lift, and manage materials with ease.</p>
                        
                        <div class="equipment-grid">
                            <div class="equipment-item">
                                <h4>Lifting Equipment</h4>
                                <p>From manual chain blocks to powered hoists, our lifting equipment can handle a wide range of lifting tasks.</p>
                                <a href="<?php echo home_url('/lifting-equipment-hire/'); ?>" class="btn btn-success">Lifting Equipment Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Lifting Gear</h4>
                                <p>Specialized lifting gear for more complex lifting operations and material handling requirements.</p>
                                <a href="<?php echo home_url('/lifting-gear-hire/'); ?>" class="btn btn-success">Lifting Gear Options</a>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-cta">
                        <h2>Your One-Stop Shop for Site &amp; Groundworks</h2>
                        <p>Proper site preparation is the foundation of a successful project. At HireIn, we provide a comprehensive range of equipment to support every aspect of your site and groundworks needs. Our team of experts is on hand to provide advice and support, ensuring you have the right tools to get the job done safely and efficiently.</p>
                        
                        <div class="cta-buttons">
                            <a href="<?php echo home_url('/shop/'); ?>" class="btn btn-primary btn-lg">Browse Site Equipment</a>
                            <a href="<?php echo home_url('/contact-us/'); ?>" class="btn btn-outline-primary btn-lg">Get Expert Advice</a>
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>
