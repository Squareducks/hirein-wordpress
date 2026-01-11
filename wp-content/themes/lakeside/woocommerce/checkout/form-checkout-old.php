<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
		
		<h1>Checkout - Personal and Shipping Details</h1>

<div id="tabs">
	<ul>
            <li><a href="#tabs-1">1. Delivery Info</a></li>
            <li><a href="#tabs-2">2. Payment Info</a></li>
    </ul>
		
	<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

          <div id="tabs-1" class="checkout-tab">
            <h2>Delivery Information</h2>
            <?php do_action( 'woocommerce_checkout_billing' ); ?>
            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
          </div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

	<?php endif; ?>
    
	</form>

<div id="tabs-2" class="checkout-tab">
   <h2>Payment</h2>
   <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
   	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>
</div>

</div><!--End Tabs-->

<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>