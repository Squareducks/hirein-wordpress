<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
  global $product;
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="product">
	<div class="woocommerce-tabs">
		<ul class="tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab">
					<a onclick="hide();" href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>

		<?php endforeach; ?>
		<script type="application/javascript">
            	function rating(){
					
					document.getElementById("ratings_tab").style.display="block";
				}
				function hide(){
					document.getElementById("ratings_tab").style.display="none";
				}
		</script>
		 <?php 
			$rawurl=$product->get_sku();
			
			echo "<pre>";
		?>
		<?php $temp_url = get_template_directory(); ?>
        	<div id="ratings_tab" style="margin-top: -58px; margin-left: -355px;display:none">
			   <?php 
               
                $logon = array_key_exists('logon', $_GET) ? $_GET['logon'] : null;
                $limit = array_key_exists('limit', $_GET) ? $_GET['limit'] : null;
                $mode = array_key_exists('mode', $_GET) ? $_GET['mode'] : null;
                $vendorref = array_key_exists('vendorref', $_GET) ? $_GET['vendorref'] : null;
                $suppressnegatives = array_key_exists('suppressnegatives', $_GET) ? $_GET['suppressnegatives'] : null;
                       $vendorref=$rawurl."*";
                
                $xml_filename = "http://www.feefo.com/feefo/xmlfeed.jsp?logon=www.lakeside-hire.co.uk";
                
                if ($limit)
                    $xml_filename .= "&limit=".$limit;
                if ($vendorref)
                  $xml_filename.="&vendorref=".$vendorref; 
                if ($mode)
                  $xml_filename.="&mode=".$mode; 
                if ($suppressnegatives)
                  $xml_filename.="&negativesanswered=true";
                
        ?>
            </div>
            
	</div>
	</div>

<?php endif; ?>
