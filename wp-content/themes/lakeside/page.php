<?php get_header(); ?>
 
	<div id="breadcrumb">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
 
	<div id="feature">
	<div class="content-wrap">
		<div class="row">
			<div class="col-md-8 col-sm-8">
 
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				 
				<div class="post">
					<h1><?php the_title(); ?></h1>
					<?php the_post_thumbnail('full'); ?>
					<div class="entry">
						<?php the_content(); ?>
					</div>
		 
				</div>
				 
				<?php endwhile; ?>
		 
				<?php endif; ?>   
 
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="landing-btn">To Hire Call<br />0808 115 1064</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	</div>

</div><!-- END MAIN-->

<?php get_footer(); ?>