<?php get_header(); ?>
 
    <div id="breadcrumb">
		<div class="container 11">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
        
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="post">
			<div class="entry">   
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
            </div>
		</div>
 
		<?php endwhile; ?>
		<?php endif; ?>

</div><!-- END MAIN-->

<?php get_footer(); ?>