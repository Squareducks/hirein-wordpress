<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$order = wc_get_order( $order_id );
?>
<h3 id="order_review_heading"><?php esc_html_e( 'Order Details', 'woocommerce' ); ?></h3>
<table class="shop_table order_details" cellpadding="0" cellspacing="0" border="0">
    <thead>
        <tr>
            <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
            <th class="product-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
        </tr>
    </thead>
    <tfoot>
    <?php
    if ( $totals = $order->get_order_item_totals() ) {
        foreach ( $totals as $total ) {
            ?>
            <tr class="order-total">
                <th scope="row"><?php echo wp_kses_post( $total['label'] ); ?></th>
                <td><?php echo wp_kses_post( $total['value'] ); ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tfoot>
    <tbody>
        <?php
        if ( $order->get_items() ) {
            foreach( $order->get_items() as $item_id => $item ) {
                $product = $order->get_product_from_item( $item );
                $item_meta = new WC_Order_Item_Meta( $item->get_meta_data(), $product );

                ?>
                <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
                    <td class="product-name">
                        <?php
                            if ( $product && ! $product->is_visible() ) {
                                echo apply_filters( 'woocommerce_order_item_name', wp_kses_post( $item->get_name() ), $item );
                            } else {
                                echo apply_filters( 'woocommerce_order_item_name', sprintf(
                                    '<a href="%s">%s</a>',
                                    esc_url( $product ? get_permalink( $product->get_id() ) : '' ),
                                    wp_kses_post( $item->get_name() )
                                ), $item );
                            }

                            echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', esc_html( $item->get_quantity() ) ) . '</strong>', $item );

                            $item_meta->display();

                            if ( $product && $product->exists() && $product->is_downloadable() && $order->is_download_permitted() ) {
                                $download_files = $order->get_item_downloads( $item );
                                $links = array();

                                foreach ( $download_files as $download_id => $file ) {
                                    $links[] = sprintf(
                                        '<small><a href="%s">%s</a></small>',
                                        esc_url( $file['download_url'] ),
                                        sprintf( esc_html__( 'Download file%s', 'woocommerce' ), count( $download_files ) > 1 ? ' ' . ( count( $download_files ) ) . ': ' : ': ' ) . esc_html( $file['name'] )
                                    );
                                }

                                echo '<br/>' . implode( '<br/>', $links );
                            }
                        ?>
                    </td>
                    <td class="product-total">
                        <?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?>
                    </td>
                </tr>
                <?php

                if ( $order->has_status( array( 'processing', 'completed' ) ) && ( $purchase_note = get_post_meta( $product->get_id(), '_purchase_note', true ) ) ) {
                    ?>
                    <tr class="product-purchase-note">
                        <td colspan="2"><?php echo apply_filters( 'the_content', wp_kses_post( $purchase_note ) ); ?></td>
                    </tr>
                    <?php
                }
            }
        }

        do_action( 'woocommerce_order_items_table', $order );
        ?>
    </tbody>
</table>

<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<header>
    <h3><?php esc_html_e( 'Customer details', 'woocommerce' ); ?></h3>
</header>
<dl class="customer_details">
<?php
if ( $order->get_billing_email() ) {
    echo '<dt>' . esc_html__( 'Email:', 'woocommerce' ) . '</dt><dd>' . esc_html( $order->get_billing_email() ) . '</dd>';
}
if ( $order->get_billing_phone() ) {
    echo '<dt>' . esc_html__( 'Telephone:', 'woocommerce' ) . '</dt><dd>' . esc_html( $order->get_billing_phone() ) . '</dd>';
}

do_action( 'woocommerce_order_details_after_customer_details', $order );
?>
</dl>

<?php if ( 'no' === get_option( 'woocommerce_ship_to_billing_address_only' ) && 'no' !== get_option( 'woocommerce_calc_shipping' ) ) : ?>

<div class="col2-set addresses">

    <div class="col-1">

<?php endif; ?>

    <header class="title">
        <h3><?php esc_html_e( 'Billing Address', 'woocommerce' ); ?></h3>
    </header>
    <address>
        <p>
            <?php
            if ( ! $order->get_formatted_billing_address() ) {
                esc_html_e( 'N/A', 'woocommerce' );
            } else {
                echo wp_kses_post( $order->get_formatted_billing_address() );
            }
            ?>
        </p>
    </address>

<?php if ( 'no' === get_option( 'woocommerce_ship_to_billing_address_only' ) && 'no' !== get_option( 'woocommerce_calc_shipping' ) ) : ?>

    </div><!-- /.col-1 -->

    <div class="col-2">

        <header class="title">
            <h3><?php esc_html_e( 'Shipping Address', 'woocommerce' ); ?></h3>
        </header>
        <address>
            <p>
                <?php
                if ( ! $order->get_formatted_shipping_address() ) {
                    esc_html_e( 'N/A', 'woocommerce' );
                } else {
                    echo wp_kses_post( $order->get_formatted_shipping_address() );
                }
                ?>
            </p>
        </address>

    </div><!-- /.col-2 -->

</div><!-- /.col2-set -->

<?php endif; ?>

<div class="clear"></div>