<?php
/**
 * Template Name: Material Handling & Lifting Pillar Page
 * Description: Comprehensive guide to material handling and lifting equipment
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="pillar-page">
                <header class="pillar-header">
                    <h1 class="pillar-title">The Ultimate Guide to Material Handling &amp; Lifting</h1>
                    <p class="pillar-subtitle">Move, lift, and build with confidence and efficiency</p>
                    <div class="pillar-meta">
                        <span class="author">HireIn Lifting Specialists</span>
                        <span class="separator">|</span>
                        <span class="date"><?php echo date('F j, Y'); ?></span>
                    </div>
                </header>

                <div class="pillar-content">
                    <section class="pillar-intro">
                        <p>Efficient material handling and lifting are the unsung heroes of a productive construction site. The ability to move heavy materials safely and quickly is essential for keeping your project on schedule and within budget. This guide provides a comprehensive overview of the material handling and lifting equipment that can transform your site's efficiency.</p>
                        
                        <p>From manual lifting aids to powerful powered equipment, HireIn offers a wide range of solutions to meet the demands of any project. This pillar page will explore the different types of equipment available, their primary applications, and how to select the right tools for your specific lifting and moving needs.</p>
                    </section>

                    <section class="pillar-section">
                        <h2>Lifting Equipment</h2>
                        <p>Lifting heavy objects is a daily reality on most construction sites. Using the right equipment not only makes the job easier but also significantly reduces the risk of injury.</p>
                        
                        <div class="equipment-grid">
                            <div class="equipment-item">
                                <h4>Manual Lifting Aids</h4>
                                <p>For smaller, more manageable loads, manual lifting aids like chain blocks and lever hoists provide mechanical advantage for single-person operation.</p>
                                <a href="<?php echo home_url('/lifting-gear-hire/'); ?>" class="btn btn-primary">Lifting Gear Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Powered Hoists</h4>
                                <p>When you need to lift heavier loads or move them more frequently, powered hoists are essential. Available in electric and pneumatic options.</p>
                                <a href="<?php echo home_url('/lifting-equipment-hire/'); ?>" class="btn btn-primary">Lifting Equipment Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>Platform Lifts</h4>
                                <p>For lifting both goods and personnel to specific heights, platform lifts offer a stable and secure solution for various applications.</p>
                                <a href="<?php echo home_url('/platform-lift-hire/'); ?>" class="btn btn-primary">Platform Lift Hire</a>
                            </div>
                            
                            <div class="equipment-item">
                                <h4>General Lift Hire</h4>
                                <p>Comprehensive lifting solutions for all types of construction and industrial applications.</p>
                                <a href="<?php echo home_url('/lift-hire/'); ?>" class="btn btn-primary">General Lift Hire</a>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-section">
                        <h2>Material Conveying</h2>
                        <p>Moving large quantities of loose materials like soil, gravel, or demolition debris can be time-consuming and labor-intensive. Material conveyors offer a highly efficient solution, automating the process and saving valuable time and manpower.</p>
                        
                        <div class="equipment-types">
                            <div class="equipment-type">
                                <h3>Belt Conveyors</h3>
                                <p>The most common type of material conveyor, using a continuous belt to move materials from one point to another. Ideal for a wide range of materials and can be configured to suit specific site layouts.</p>
                            </div>
                            
                            <div class="equipment-type">
                                <h3>Screw Conveyors</h3>
                                <p>For moving materials in a more controlled manner, screw conveyors use a rotating helical screw blade to move materials through a tube or trough. Particularly well-suited for fine-grained or granular materials.</p>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-section">
                        <h2>Safety in Material Handling</h2>
                        <p>As with any construction activity, safety is paramount when handling and lifting materials. Always ensure that your team is trained in the correct use of equipment and following all relevant safety regulations.</p>
                        
                        <div class="safety-guidelines">
                            <div class="safety-item">
                                <h4>Load Limits</h4>
                                <p>Never exceed the specified load limit of any lifting or conveying equipment. Overloading can lead to equipment failure and serious accidents.</p>
                            </div>
                            
                            <div class="safety-item">
                                <h4>Regular Inspections</h4>
                                <p>Regularly inspect all lifting and handling equipment for signs of wear or damage. Any faulty equipment should be immediately taken out of service and repaired or replaced.</p>
                            </div>
                            
                            <div class="safety-item">
                                <h4>Personal Protective Equipment</h4>
                                <p>Ensure that all personnel involved in material handling are wearing appropriate PPE, including hard hats, steel-toed boots, and gloves.</p>
                            </div>
                        </div>
                    </section>

                    <section class="pillar-cta">
                        <h2>The Right Equipment for a More Productive Site</h2>
                        <p>Efficient material handling and lifting are key to a productive and profitable construction project. By choosing the right equipment, you can save time, reduce labor costs, and create a safer working environment for your team.</p>
                        
                        <div class="cta-buttons">
                            <a href="<?php echo home_url('/shop/'); ?>" class="btn btn-primary btn-lg">Browse Lifting Equipment</a>
                            <a href="<?php echo home_url('/contact-us/'); ?>" class="btn btn-outline-primary btn-lg">Get Lifting Solutions Advice</a>
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>
