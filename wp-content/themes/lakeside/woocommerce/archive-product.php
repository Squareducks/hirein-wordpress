<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will be bumped.
 * and the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'home' );

?>

<div id="breadcrumb">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<div id="feature">
    <div class="container">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( woocommerce_product_loop() ) : ?>

            <?php
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );
            ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>

                        <?php
                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content', 'product' );
                        ?>
                    <?php endwhile; // end of the loop. ?>
                <?php endif; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            ?>

        <?php else : ?>

            <?php
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' );
            ?>

        <?php endif; ?>

    </div><!-- END CONTENT WRAP-->
</div><!-- END FEATURE-->

<?php
    /**
     * Hook: woocommerce_sidebar.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );
?>

<?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
?>

<?php get_footer( 'shop' ); ?>