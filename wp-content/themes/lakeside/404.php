<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="breadcrumb">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>

	<div id="feature">
		<div class="content-wrap">
			
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<h1 class="page-title"><?php _e( 'Woops!', 'Hire Desk' ); ?></h1>

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'Hire Desk' ); ?></p>

						<?php get_search_form(); ?>
						
						<ul class="404List">
							<li><a href="/scaffold-tower/">Scaffold Tower Hire</a></li>
							<li><a href="/site-accessories/">Site Accessories</a></li>
							<li><a href="/podium-steps/">Podium Steps</a></li>
							<li><a href="/ladders/">Ladder Hire</a></li>
							<li><a href="/powered-access/">Powered Access</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<?php get_sidebar(); ?>
				</div>
			</div>

		</div>
	</div>

</div><!-- END MAIN-->

<?php get_footer(); ?>