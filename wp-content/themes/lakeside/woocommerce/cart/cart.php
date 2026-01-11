<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

do_action( 'woocommerce_before_cart' ); ?>
	
	<div id="feature">
		<div class="content-wrap">
		
		<?php wc_print_notices(); ?>
		
		<div class="top-button">
        	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

				<input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="<?php _e( 'Proceed To Secure Checkout', 'woocommerce' ); ?>" />

				<?php // do_action( 'woocommerce_proceed_to_checkout' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</form>
        </div>
		
		<h1 style="display: none; text-indent: -9999px;">Basket - Your Products Are Ready To Be Hired</h1>
		<p>Complete your order before 3pm for guaranteed delivery <span class="basket-underline">before noon tomorrow</span> <abbr title="Weekend orders for Monday will be processed and delivered for Tuesday." rel="tooltip"><img src="<?php bloginfo('template_url'); ?>/img/tooltip.png" /></abbr></p>

<div class="checkout-form">
		
		<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="shop_table cart" cellspacing="0">
			<thead>
				<tr>
					<th class="product-name"><?php _e( 'Item Description', 'woocommerce' ); ?></th>
					<th class="product-price"><?php _e( 'Your Options', 'woocommerce' ); ?></th>
					<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
					<th align="right" class="product-subtotal"><?php _e( 'Price', 'woocommerce' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-name">
								
		                        <?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $_product->is_visible() )
										echo $thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
								?>
								
								<?php
									if ( ! $_product->is_visible() )
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
									else
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="product-title" href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
								?>
		                        
		                         <?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">Remove</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
								?>
		                        
							</td>

							<td class="product-options">
								<?php

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

		               				// Backorder notification
		               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
		               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
								?>
							</td>

							<td class="product-quantity">
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
								?>
							</td>

							<td align="right" class="product-subtotal">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
		    </tbody>
		</table>
		    
    <div class="basket-table-buttons">

				<div class="update-button">
                	<input type="submit" class="button button-grey" name="update_cart" value="<?php _e( 'Update Basket', 'woocommerce' ); ?>" />
                </div>
				
				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button button-grey" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } ?>

				<?php // do_action( 'woocommerce_proceed_to_checkout' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			
      </div>
        
        <?php do_action( 'woocommerce_after_cart_contents' ); ?>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

</div>

<div class="cart-collaterals">

	<?php woocommerce_cart_totals(); ?>

	<div class="clear"></div>
    
    <div class="total-buttons">
    
    <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

				<input type="submit" class="checkout-button button alt wc-forward" name="proceed" value="<?php _e( 'Proceed To Secure Checkout', 'woocommerce' ); ?>" />

				<?php // do_action( 'woocommerce_proceed_to_checkout' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
    
	</form>
    
    </div>
    
    <div class="cart-payment-options">
    	<img src="<?php bloginfo('template_url'); ?>/img/cards.png" alt="Payment Options" width="370" height="32" />
		<img src="<?php bloginfo('template_url'); ?>/img/security-logos.jpg" alt="McAfee Secure" width="252" height="53" />
    </div>

</div>

<div class="cart-coupon">
    
    <div class="countdown-timer">
    	<span class="countdown-title">Reserved</span>
        <p>Your items have been reserved in your basket for <span id="m_timer"></span> <span class="timer-red">minutes</span></p>
                            <script>
                                jQuery(function ($) {
                                    $('#m_timer').countdowntimer({
                                        minutes :15,
                                        size : "lg",
      									regexpReplaceWith: "$1<sup>days</sup> / $2<sup>hours</sup> / $3<sup>minutes</sup> / $4<sup>seconds</sup>"
                                    });
                                });
                            </script>
    </div>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>

<div class="clear">
</div>

<!--<div class="cross-sells-wrapper">
    	<?//php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>-->

</div><!-- END CONTENT WRAP-->
</div><!-- END FEATURE-->
