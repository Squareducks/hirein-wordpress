<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<?php 

$town = isset($_GET["t"]) ? $_GET["t"] : "";
$town = ucwords(str_replace("_", "", $town));

?>

<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?> <?php echo $town; ?></h1>