<?php
/**
 * Loop Add to Cart
 *
 * @author  WooCommerce
 * @package WooCommerce/Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $product;

echo apply_filters(
    'woocommerce_loop_add_to_cart_link',
    sprintf(
        '<a href="%s" class="button %s product_type_%s" %s>%s</a>',
        esc_url( $product->add_to_cart_url() ),
        $product->is_purchasable() ? 'add_to_cart_button' : '',
        esc_attr( $product->get_type() ),
        'rel="nofollow" data-product_id="' . esc_attr( $product->get_id() ) . '" data-product_sku="' . esc_attr( $product->get_sku() ) . '"',
        esc_html( $product->add_to_cart_text() )
    ),
    $product
);