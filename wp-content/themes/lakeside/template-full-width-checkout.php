<?php

/**
* Template Name: Checkout
*/

get_header('basket'); ?>



<div class="basket-wrap">
	<div id="breadcrumb">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
	
	<div id="feature">
		<div class="content-wrap">
			<?php echo do_shortcode("[woocommerce_checkout]"); ?>
		</div>
	</div>
	
	<div class="clear"></div>
</div>

</div><!-- END MAIN-->
<?php get_footer(); ?>