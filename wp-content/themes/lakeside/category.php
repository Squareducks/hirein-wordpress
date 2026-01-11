<?php get_header(); ?>
 
    <h1>Lakeside Hire <?php single_cat_title(); ?></h1>
	
	<div id="blog">
	
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			 
			<div class="postRpt">
			<?php the_post_thumbnail(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
			<span class="date"><?php the_date(); ?></span>
	 
				<div class="entry">
				<?php the_excerpt(); ?>
	 
				</div>
				
				<div class="clear"></div>
	 
			</div>
			 
	<?php endwhile; ?>
	 
		<div class="navigation">
			<?php posts_nav_link(); ?>
		</div>
	 
	<?php endif; ?>
 
</div>
 
</div><!-- END CONTENT-->
<?php get_sidebar(); ?>   
</div><!-- END CONTAINER-->
</div><!-- END MAIN-->
<?php get_footer(); ?>