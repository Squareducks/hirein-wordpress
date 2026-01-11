<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="feature">
	<div class="content-wrap">

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

	<?php 

	$town = isset($_GET["t"]) ? $_GET["t"] : "";
	$town = ucwords(str_replace("_", "", $town));

	?>
	
	<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?> <?php echo $town; ?></h1>
	
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
    
    <div class="clear"></div>
	
	<div class="additional-info">
		<div class="add-box add-box1">
			<span>Hire your item online in just a few clicks. &nbsp;
				<abbr title="For guaranteed next day delivery, order before 3pm. Weekend Orders will be processed and delivered for Tuesday's." rel="tooltip">Next day delivery</abbr>
			</span>
		</div>
		<div class="add-box add-box2">
			<span>Got a question about this item? Talk to us using Live Chat. &nbsp;
				<abbr title="Our standard delivery is £15 each way + Vat. For Powered Access hire, delivery is POA." rel="tooltip">More about delivery</abbr>
			</span>
		</div>
		<div class="add-box add-box3">
			<span>Free premium damage waiver when ordering online. &nbsp;
				<abbr title="Our premium damage waiver's cover you for the cost of minor damage to the equipment whilst on hire." rel="tooltip">More about damage waiver's</abbr>
			</span>
		</div>
		<div class="clear"></div>
	</div><!--END ADDITIONAL INFO-->
	
	<div class="clear"></div>
		
	<div class="product-summary">

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
    
    </div><!--END PRODUCT SUMMARY-->

	<?php do_action( 'woocommerce_after_single_product' ); ?>
    
    </div>
</div><!-- .feature -->

	