<?php

/**
* Template Name: Basket
*/

get_header('basket'); ?>

<div class="basket-wrap">
	<div id="breadcrumb">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>

	<?php echo do_shortcode("[woocommerce_cart]"); ?>
	<div class="clear"></div>
</div>

</div><!-- END MAIN-->
<?php get_footer(); ?>