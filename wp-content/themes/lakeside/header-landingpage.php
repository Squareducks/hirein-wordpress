<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- All in one Favicon 4.3 -->
<link rel="icon" href="https://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.png" type="image/png"/>
<link rel="shortcut icon" href="https://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.ico" />

<?php 

$town = isset($_GET["t"]) ? $_GET["t"] : "London";
$town = ucwords(str_replace("_", "", $town));

?>

<title><?php echo get_the_title(); ?> <?php echo $town; ?> - Hire In</title>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/menu/css/webslidemenu.css" />
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/menu/js/webslidemenu.js"></script>

<!--Tooltip-->
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/js/tooltip.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
    
    $('#toggle-view li').click(function () {
        var text = $(this).children('div.panel');
        if (text.is(':hidden')) {
            text.slideDown('200');
            $(this).children('span').html('-');        
        } else {
            text.slideUp('200');
            $(this).children('span').html('+');        
        }
        
    });
});
</script>

<?php global $woocommerce; ?>

</head>
<body <?php body_class(); ?>>
	
	<div class="wsmenucontainer clearfix">
	<div class="wsmenuexpandermain slideRight"><a id="navToggle" class="animated-arrow slideLeft"><span></span></a></div>
	<div class="wsmenucontent overlapblackbg"></div>
    
    <div class="header" name="header">
    
        <div class="container">
            <div class="mobile-call-nav">
                <a href="tel:08081151064"></a>
            </div>
            <div class="search">
                <form role="search" method="get" id="searchform" action="https://www.lakeside-hire.co.uk/">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="" name="s" id="s" placeholder="Search for hire equipment">
						<input type="submit" id="searchsubmit" value="">
						<input type="hidden" name="post_type" value="product">
					</div>
				</form>
            </div>
            <div class="basket">
              <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo $woocommerce->cart->get_total(); ?></a>
            </div>
            <div class="contact">
				<div class='textwidget'>
					<a class="phone" href="tel:08081151064">0808 115 1064</a>
				</div>
            </div>
            <div id="logo2">
                <a href="<?php echo get_option('home'); ?>">Hire Desk</a>
            </div>
            <!--Menu HTML Code-->
<nav class="wsmenu slideLeft clearfix">
    <ul class="mobile-sub wsmenu-list">
      <li><a href="/" class="home">Home</a></li>
      <li><a href="/product-category/scaffold-tower/">Scaffold Tower <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Scaffold Tower</li>
          <li><a href="/ladderspan-scaffold-tower/">Aluminium Scaffold Tower</a></li>
          <li><a href="/boss-grp-scaffold-tower/">GRP Scaffold Tower</a></li>
          <li><a href="/room-mate-scaffold-tower/">Room Mate Scaffold Tower</a></li>
          <li><a href="/alloy-stair-scaffold-tower/">Alloy Stair Scaffold Tower</a></li>
          <li><a href="/boss-clima-tower/">Boss Clima Tower</a></li>
      </ul>

      <ul>
          <li class="title">Specialist Scaffold Tower</li>
          <li><a href="/boss-cam-lock-advance-guardrail/">Boss Cam-Lock Guardrail</a></li>
          <li><a href="/bridge-beams/">Bridge Beams</a></li>
          <li><a href="/cantilever-sections/">Cantilever Sections</a></li>
          <li><a href="/high-clearance-frames/">High Clearance Frames</a></li>
          <li><a href="/lift-shaft-scaffold-tower-hire/">Lift Shaft Scaffold Tower</a></li>
          <li><a href="/stairmax/">StairMax</a></li>
      </ul>
      
      <ul>
          <li class="title">Tower Accessories</li>
          <li><a href="/tower-scaffold-towers-protectors/">Foam Protectors</a></li>
          <li><a href="/scaffold-tower-scaff-tag/">ScaffTag Safety Tag</a></li>
          <li><a href="/staging-boards/">Staging Boards</a></li>
          <li><a href="/youngman-boards-hire/">Youngman Boards</a></li>
          <li><a href="/lakeside-hire-tower-training/">Lakeside Tower Training</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/boss-aluminium-scaffold-tower-hire/"><img src="https://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/scaffold-tower.jpg" width="300" height="200" alt="Scaffold Tower Hire From £41.60 PW" /></a></div>
      </div>     
      </li>
      <li><a href="/product-category/powered-access/low-level/">Other Access <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Ladders</li>
          <li><a href="/combination-ladders/">Combination Ladder</a></li>
          <li><a href="/extension-ladders/">Extension Ladder</a></li>
          <li><a href="/step-ladders/">Step Ladder</a></li>
          <li><a href="/grp-step-ladders/">GRP Step Ladder</a></li>
          <li><a href="/roof-ladders/">Roof Ladder</a></li>
      </ul>

      <ul>
          <li class="title">Podium Steps</li>
          <li><a href="/adjusta-minit-podium/">Adjusta Minit Podium</a> </li>
          <li><a href="/delta-deck/">Delta Deck</a></li>
          <li><a href="/desk-surfer/">Desk Surfer</a></li>
          <li><a href="/grp-podium-steps/">GRP Podium Step</a></li>
          <li><a href="/low-level-platform/">Low Level Platform</a></li>
          <li><a href="/mark-1-podium-steps/">Mark 1 Podium Step</a></li>
          <li><a href="/mark-2-podium-steps/">Mark 2 Podium Step</a></li>
          <li><a href="/mark-3-podium-steps/">Mark 3 Podium Step</a></li>
          <li><a href="/microfold-1000-podium-step/">Microfold 1000 Podium Step</a></li>
          <li><a href="/razor-decks/">Razor Deck</a></li>
          <li><a href="/teleguard-steps/">Teleguard Step</a></li>
      </ul>
      
      <ul>
          <li class="title">Powered Access</li>
          <li><a href="/boss-x2-scissor-lifts/">Boss X2 Scissor Lift</a></li>
          <li><a href="/boss-x3-scissor-lifts/">Boss X3 Scissor Lift</a></li>
          <li><a href="/boss-x3x-scissor-lifts/">Boss X3X Scissor Lift</a></li>
		  <li><a href="/pecolift/">Peco Lift</a></li>
          <li><a href="/pop-up-scissor-lift/">Pop Up Scissor Lift</a></li>
          <li><a href="/pop-plus-scissor-lifts/">Pop Up Plus Scissor Lift</a></li>
          <li><a href="/power-tower-nano/">Power Tower Nano</a></li>
          <li><a href="/power-towers/">Power Tower</a></li>
          <li><a href="/high-level-powered-access/">High Level Powered Access</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/high-level-powered-access/"><img src="https://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/powered-access.jpg" width="300" height="200" alt="Powered Access Hire" /></a></div>
      </div>      
      </li>
      <li><a href="/product-category/lifting-handling/">Lifting <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Hoists</li>
          <li><a href="/liftpulling-winch-hire/">Lifting/Pulling Winch</a> </li>
          <li><a href="/ratchet-hoist-hire/">Ratchet Hoist</a></li>
          <li><a href="/electric-chain-hoist-hire/">Electric Chain Hoist</a> </li>
          <li><a href="/scaffold-hoist-electric-hire/">Scaffold Hoist Electric</a></li>
          <li><a href="/power-wire-rope-hoist-hire/">Power Wire Rope Hoist</a> </li>
          <li><a href="/compact-hoist-hire/">Compact Hoist</a></li>
          <li><a href="/product-category/lifting-handling/hoist-accessories/">Hoist Accessories</a></li>
      </ul>

      <ul>
          <li class="title">General Building &amp; Groundworks</li>
          <li><a href="/stone-magnet-hire/">Stone Magnet</a> </li>
          <li><a href="/kerb-grab-hire/">Kerb Grab</a></li>
          <li><a href="/block-extractor-hire/">Block Extractor</a> </li>
          <li><a href="/block-transport-cart-hire/">Block Transport Cart</a></li>
          <li><a href="/mace-shifta-conveyor-hire/">Mace Shifta Conveyor</a> </li>
          <li><a href="/maxiveyor-hopper-hire/">Maxiveyor Hopper</a></li>
          <li><a href="/maxiveyor-conveyor-hire/">Maxiveyor Conveyor</a> </li>
          <li><a href="/scissor-lift-table-hire/">Scissor Lift Table</a></li>
          <li><a href="/glass-suction-lifter-pair-hire/">Glass Suction Lifter Pair</a> </li>
          <li><a href="/vacuum-slab-lifter-battery-hire/">Vacuum Slab Lifter Battery</a></li>
          <li><a href="/heavy-duty-goods-carry-cage-hire/">Heavy Duty Goods Carry Cage</a></li>
      </ul>
      
      <ul>
          <li class="title">Other Lifting</li>
          <li><a href="/adjustable-fork-lift-jib-hire/">Adjustable Fork Lift Jib</a></li>
          <li><a href="/3-roller-manhole-frame-hire/">3 Roller Manhole Frame</a></li>
          <li><a href="/corner-roller-hire/">Corner Roller</a></li>
          <li><a href="/shearlegs-hire/">Shearlegs</a> </li>
          <li><a href="/lightweight-demount-gantry-hire/">Lightweight Demount Gantry</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product-category/lifting-handling/"><img src="https://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/lifting.jpg" width="300" height="200" alt="Lifting & Handling" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/lifting-handling/">Material Handling <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Material Handling</li>
          <li><a href="/genie-lift/">Genie Lift</a></li>
          <li><a href="/gas-genie-lift/">Gas Genie Lift</a></li>
          <li><a href="/narrow-pallet-truck-hire/">Narrow Pallet Truck</a></li>
          <li><a href="/wide-pallet-truck-hire/">Wide Pallet Truck</a> </li>
          <li><a href="/powered-pallet-truck-hire/">Powered Pallet Truck</a></li>
      </ul>

      <ul>
          <li class="title">Trucks &amp; Trolleys</li>
          <li><a href="/panel-trolley-hire/">Panel Trolley</a> </li>
          <li><a href="/twin-gas-cylinder-trolley-hire/">Twin Gas Cylinder Trolley</a></li>
          <li><a href="/high-lift-pallet-truck-hire/">High Lift Pallet Truck</a> </li>
          <li><a href="/weight-scale-pallet-truck-hire/">Weight Scale Pallet Truck</a></li>
          <li><a href="/terrain-pallet-truck-hire/">Terrain Pallet Truck</a> </li>
          <li><a href="/long-reach-pallet-truck-hire/">Long Reach Pallet Truck</a></li>
          <li><a href="/sack-truck-hire/">Sack Truck</a> </li>
          <li><a href="/carpet-pipe-trolley-hire/">Carpet Pipe Trolley</a></li>
          <li><a href="/hydraulic-furniture-machine-mover-hire/">Hydraulic Furniture Machine Mover</a></li>
          <li><a href="/step-stair-climbing-trolley-hire/">Step Stair Climbing Trolley</a></li>
      </ul>
      
      <ul>
          <li class="title">Other Material Handling</li>
          <li><a href="/machine-moving-skates-hire/">Machine Moving Skates</a></li>
          <li><a href="/shifting-skates-hire/">Shifting Skates</a></li>
          <li><a href="/roller-crowbar-hire/">Roller Crowbar</a></li>
          <li><a href="/crate-skate-hire/">Crate Skate</a></li>
          <li><a href="/chain-sling-hire/">Chain Sling</a> </li>
          <li><a href="/wire-rope-sling-hire/">Wire Rope Sling</a></li>
          <li><a href="/product-category/lifting-handling/jacks-load-testing/">Jacks &amp; Load Testing</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product-category/lifting-handling/"><img src="https://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/handling.jpg" width="300" height="200" alt="Other Lifting & Handling" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/site-accessories/">Site Accessories <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Site Accessories</li>
          <li><a href="/acrow-props/">Acrow Props</a></li>
          <li><a href="/builders-trestles/">Builders Trestles</a></li>
          <li><a href="/site-box/">Site Box</a></li>
		  <li><a href="/large-site-box/">Large Site Box</a></li>
		  <li><a href="/site-chest/">Site Chest</a></li>
          <li><a href="/staging-boards/">Staging Boards</a></li>
          <li><a href="/strongboy-props/">Strongboy Props</a></li>
      </ul>

      <ul>
          <li class="title">Site Lighting &amp; Heating</li>
          <li><a href="/portable-magnetic-floodlight-hire/">Portable Magnetic Floodlight</a></li>
		  <li><a href="/portable-floodlight-hire/">Portable Floodlight 500W</a></li>
		  <li><a href="/single-tripod-floodlight-hire/">Single 500W Tripod Floodlight</a></li>
		  <li><a href="/twin-tripod-floodlight-hire/">Twin 500W Tripod Floodlight</a></li>
		  <li><a href="/plasterer-light-tripod-hire/">Plasterer Light - Tripod</a></li>
		  <li><a href="/fluorescent-uplight-hire/">Fluorescent Uplight Including Base 110v</a></li>
		  <li><a href="/lighting-mast-hire/">Lighting Mast 4 x 500W</a></li>
		  <li><a href="/rechargeable-light-hire/">Rechargeable Light 12V</a></li>
          <li><a href="/convector-heater-hire/">Convector Heater</a></li>
		  <li><a href="/oil-filled-radiator-hire/">Oil Filled Radiator Electric</a></li>
		  <li><a href="/infra-red-radiant-heater-hire/">Infra Red Radiant Heater</a></li>
      </ul>
      
      <ul>
          <li class="title">Specialist Storage</li>
          <li><a href="/flame-chemical-box/">Flame/Chemical Box</a></li>
		  <li><a href="/gas-cage-standard/">Gas Cage Standard</a></li>
		  <li><a href="/gas-cage-slim-line/">Gas Cage Slimline</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/site-box/"><img src="https://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/accessories.jpg" width="300" height="200" alt="Site Box Hire" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/security-fencing/">Fencing <span class="arrow"></span></a>
      <ul class="wsmenu-submenu">
          <li><a href="/pedestrian-barrier/">Pedestrian Barrier</a></li>
		  <li><a href="/plastic-safety-barrier/">Plastic Safety Barrier</a></li>
		  <li><a href="/steel-site-hoarding/">Steel Site Hoarding</a></li>
		  <li><a href="/temporary-fencing/">Temporary Fencing</a></li>
        </ul>
      </li>
      <li><a href="/testimonials/">Testimonials</a></li>
      <li><a href="/onoffhire/">Contact</a> </li>
    </ul>
</nav>
<!--Menu HTML Code-->
        </div>
    </div>
    </div>
    </div>
	<div id="main">
    	<div id="mobile-search">
    	<div class="search">
                <form role="search" method="get" id="searchform" action="https://www.lakeside-hire.co.uk/">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="" name="s" id="s" placeholder="Search for hire equipment...">
						<input type="submit" id="searchsubmit" value="Search">
						<input type="hidden" name="post_type" value="product">
					</div>
				</form>
         </div>
    </div>
    <div id="offer-bar">
            <div class="container">
            <ul>
                <li>
                    <span class="offer-title">Next Day Delivery Nationwide</span>
                    <span class="offer-desc">Order before 3pm</span>
                </li>
                <li>
                    <span class="offer-title">Get £25 Off Your Hire *</span>
                    <a href="/newsletter-signup/"><span class="offer-desc">Subscribe to our mailing list</span></a>
                </li>
                <li>
                    <span class="offer-title">Free Delivery</span>
                    <span class="offer-desc">Hire 3 weeks or more</span>
                </li>
            </ul>
            </div>
        </div>