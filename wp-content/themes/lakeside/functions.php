<?php
 
add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'homepage',
			'name' => __( 'Homepage' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'landing-page-scaffold',
			'name' => __( 'Landing Page Scaffold' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'gift-offer',
			'name' => __( 'Gift Offer' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'invoices-gift',
			'name' => __( 'Invoices Gift' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'post',
			'name' => __( 'Post' ),
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);
	
/** Add new image sizes */

add_image_size( 'grid-thumbnail', 270, 100, TRUE );


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'my_woocommerce_template_loop_add_to_cart', 10 );

function my_woocommerce_template_loop_add_to_cart() {
    global $product;
    echo '<form action="' . esc_url( $product->get_permalink( $product->id ) ) . '" method="get">
            <button type="submit" class="single_add_to_cart_button button alt">' . __('More Info', 'woocommerce') . '</button>
          </form>';
}

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );                                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'Hire Now', 'woocommerce' );
 
}

// Use WC 2.0 variable price format, now include sale price strikeout
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
	// Main Price
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	// Sale Price
	$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	sort( $prices );
	$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
	if ( $price !== $saleprice ) {
		$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
	}
	return $price;
}

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', function ( $cols ) {
    return 24;
}, 20 );

// Downloads Tab
// Add downloads tab if pdf attachment is present

add_filter( 'woocommerce_product_tabs', 'cg_product_downloads_tab');

function cg_product_downloads_content() {

  global $woocommerce, $product, $post;
  $args = array(
   'post_type' => 'attachment',
   'orderby' => 'menu_order',
   'numberposts' => -1,
   'post_status' => null,
   'post_parent' => $post->ID,
   'post_mime_type' => array( 'application/pdf','application/vnd.ms-excel','application/msword' )
  );

  $attachments = get_posts( $args );

     if ( $attachments ) {

        foreach ( $attachments as $attachment ) {
        // SETUP THE ATTACHMENT ICON
		$attachment_icon = $attachment->post_mime_type;
		$attachment_icon = explode( '/',$attachment_icon ); $attachment_icon = $attachment_icon[1];
		$attachment_icon = '<img src="' .get_bloginfo('template_directory'). '/icons/' . $attachment_icon . '.png" alt="' . get_the_title($attachment->ID) . '" title="' . get_the_title($attachment->ID) . '" />';

           echo '<p><a href="';
           echo wp_get_attachment_url( $attachment->ID );
           echo '">';
           echo $attachment_icon;
           echo wp_get_attachment_image( $attachment->ID );
           echo '&nbsp;&nbsp;';
           echo apply_filters( 'the_title', $attachment->post_title );
           echo '</a>';
           echo '</p>';
          }
     }

}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo $woocommerce->cart->get_total(); ?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}



function cg_product_downloads_tab($tabs) {

  $args = array(
   'post_type' => 'attachment',
   'numberposts' => -1,
   'post_status' => null,
   'post_parent' => $post->ID,
   'post_mime_type' => array( 'application/pdf','application/vnd.ms-excel','application/msword' )
  );

  $attachments = get_posts( $args );

if ( $attachments ):

 $tabs['test_tab'] = array(
 'title' => __( 'Downloads', 'woocommerce' ),
 'priority' => 50,
 'callback' => 'cg_product_downloads_content'
 );

endif;

 return $tabs;
}

require_once get_template_directory() . '/inc/custom-woospecs.php'; // woocommerce custom tabs



/********* Added By Saikat *********/
add_action("wp_enqueue_scripts", "lsh_add_custom_scripts");
function lsh_add_custom_scripts(){
	if( is_page_template("template-scaffoldtower.php") ) {
		wp_register_style("lsh-custom-style", get_template_directory_uri() . "/../eleven40/styles/custom-style.css" );
		wp_enqueue_style("lsh-custom-style");
	}

	if(!is_admin())
		// wp_enqueue_script( "tapTrack",  get_template_directory_uri() . "/../eleven40/js/rTapTrack.min.js", array('jquery'), false);
		//wp_enqueue_script( "callBtn",  get_template_directory_uri() . "/../eleven40/js/custom.js", array('jquery'), false);


	// don't remove this line. otherwise gravity form may lose it's style
	if(!is_page(13)){
		wp_enqueue_script( "countdowntimer",  get_template_directory_uri() . "/js/jquery.min.js");
	}

	wp_enqueue_script( "countdowntimer",  get_template_directory_uri() . "/js/jquery.countdownTimer.js");
	
	//wp_register_style( 'lsh-form-style', get_template_directory_uri() . '/../../plugins/gravityforms/css/forms.css');
	wp_enqueue_style( 'lsh-form-style' );
}

// Add image size
add_image_size( 'lakeshare-thumbnail', 170, 262, TRUE );
add_image_size( 'double-thumbnail', 420, 262, TRUE );

// Fix php for adward campaign
add_filter( 'wp_title', 'lsh_template_title', 10, 5 );
function lsh_template_title($title, $sep, $seplocation){
	if(is_page("scaffold-towers-uk")){
		$town = isset($_GET["t"]) ? $_GET["t"] : "London";
		$town = ucwords(str_replace("_", "", $town));
		$title = $town . " Scaffold Tower Hire";
		return $title;
	}
}

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
 
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}

/**
 * Google Address autocomplte feature on checkout page.
 */
if ( file_exists( WP_CONTENT_DIR . '/plugins/woocommerce-google-address/index.php' ) ) {
	require_once WP_CONTENT_DIR . '/plugins/woocommerce-google-address/index.php';
	add_action( 'init' , 'WooCommerce_Google_Address_Loader');	
}

/**
 * Custom styles for overwriting woocommerce
 */
add_action( 'wp_enqueue_scripts', 'overwrite_woocommerce_styles', 20 );
function overwrite_woocommerce_styles() {
	wp_enqueue_style( 'woocom_custom', get_template_directory_uri() . '/css/woocommerce.css' );
	wp_enqueue_style( 'woocom_layout_custom', get_template_directory_uri() . '/css/woocommerce-layout.css' );
	wp_enqueue_style( 
		'woocom_smallscreen_custom',
		get_template_directory_uri() . '/css/woocommerce-smallscreen.css',
		array(),
		false,
		'only screen and (max-width: 768px)'
	);
}

/**
 * Category Page Short Descriptions
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'my_add_short_description', 9 );
function my_add_short_description() {
	  echo '<div class="product-description">' . get_the_excerpt() . '</div>';
}


/**
 * Product Variables Fix
 */
function custom_wc_ajax_variation_threshold( $qty, $product ) {
 return 110;
}

add_filter( 'woocommerce_ajax_variation_threshold', 'custom_wc_ajax_variation_threshold', 10, 2 );



// Change the Add to Cart text on the single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_button_text' ); 

function custom_add_to_cart_button_text() {
    return __( 'Add to Basket', 'woocommerce' ); // Replace 'Your Custom Text' with the text you want.
}



// Change the Place Order button text on the checkout page
add_filter( 'woocommerce_order_button_text', 'custom_place_order_button_text' );

function custom_place_order_button_text() {
    return __( 'Proceed to Payment', 'woocommerce' ); // Replace 'Your Custom Text' with the text you want.
}

























function enqueue_flatpickr_script() {
    wp_enqueue_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', array('jquery'), null, true);
    wp_enqueue_style('flatpickr-style', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_flatpickr_script');
