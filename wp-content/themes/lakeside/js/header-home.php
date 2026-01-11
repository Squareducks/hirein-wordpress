<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- All in one Favicon 4.3 -->
<link rel="icon" href="http://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.png" type="image/png"/>
<link rel="shortcut icon" href="http://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.ico" />
<title><?php wp_title ( '|', true,'right' ); ?></title>
<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/menu/css/webslidemenu.css" />
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/menu/js/webslidemenu.js"></script>
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/js/email.js"></script>

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

<!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
	window.__insp = window.__insp || [];
	__insp.push(['wid', 834449440]);
	(function() {
		function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); }
		if (window.attachEvent){
			window.attachEvent('onload', __ldinsp);
		}else{
			window.addEventListener('load', __ldinsp, false);
		}
	})();
</script>
<!-- End Inspectlet Embed Code -->

<script type="text/javascript">(function(){function f(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="https://platform.cloud-iq.com/cartrecovery/store.js?app_id=27841";var t = document.getElementsByTagName('head')[0];t.appendChild(e);}f();})();</script>

<script type="text/javascript" src="http://www.connct-9.com/js/42460.js" ></script>
<noscript><img src="http://www.connct-9.com/42460.png" style="display:none;" /></noscript>


<script>
    (function(f,b){
        var c;
        f.hj=f.hj||function(){(f.hj.q=f.hj.q||[]).push(arguments)};
        f._hjSettings={hjid:15214, hjsv:3};
        c=b.createElement("script");c.async=1;
        c.src="//static.hotjar.com/c/hotjar-15214.js?sv=3";
        b.getElementsByTagName("head")[0].appendChild(c); 
    })(window,document);
</script>


<?php global $woocommerce; ?>

</head>
<body <?php body_class(); ?>>
	
	<div class="wsmenucontainer clearfix">
	<div class="wsmenuexpandermain slideRight"><a id="navToggle" class="animated-arrow slideLeft"><span></span></a></div>
	<div class="wsmenucontent overlapblackbg"></div>
    
    <div id="header" name="header">
    
        <div class="container">
            <div class="mobile-call-nav">
                <a href="tel:03339200713"></a>
            </div>
            <div class="topBar">
                <div class="links">
                    <ul>
						<li class="first"><a href="/my-account/">My Account</a></li>
						<li><a href="/newsletter-signup/">Newsletter Signup</a></li>
                        <li><a href="/blog/">Blog</a></li>
                        
                    </ul>
                </div>
                <div class="social">
                    <ul>
                        <li><a class="google" title="Google Plus" href="https://plus.google.com/+lakesidehire/about" target="_blank"></a></li>
                        <li><a class="youtube" title="Youtube" href="http://www.youtube.com/user/lakesidehireco" target="_blank"></a></li>
                        <li><a class="facebook" title="Facebook" href="https://www.facebook.com/LakesideHire" target="_blank"></a></li>
                        <li><a class="twitter" title="Twitter" href="https://twitter.com/LakesideHire" target="_blank"></a></li>
                        <li><a class="linkedin" title="linkedin" href="http://www.linkedin.com/company/lakeside-hire" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
            <div class="search">
                <form role="search" method="get" id="searchform" action="http://www.lakeside-hire.co.uk/">
					<div>
						<label class="screen-reader-text" for="s">Search for:</label>
						<input type="text" value="" name="s" id="s" placeholder="Search for products">
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
					<a class="phone" href="tel:03339200615"><span class="rTapNumber121261">01708866566</span></a>
				</div>
            </div>
            <div id="logo2">
                <a href="<?php echo get_option('home'); ?>"></a>
            </div>
            <!--Menu HTML Code-->
<nav class="wsmenu slideLeft clearfix">
    <ul class="mobile-sub wsmenu-list">
      <li><a href="/" class="home">Home</a></li>
      <li><a href="/product-category/scaffold-tower/">Scaffold Tower <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Scaffold Tower</li>
          <li><a href="/product/ladderspan-scaffold-tower/">Aluminium Scaffold Tower</a></li>
          <li><a href="/product/boss-grp-scaffold-tower/">GRP Scaffold Tower</a></li>
          <li><a href="/product/room-mate-scaffold-tower/">Room Mate Scaffold Tower</a></li>
          <li><a href="/product/alloy-stair-scaffold-tower/">Alloy Stair Scaffold Tower</a></li>
          <li><a href="/product/boss-clima-tower/">Boss Clima Tower</a></li>
      </ul>

      <ul>
          <li class="title">Specialist Scaffold Tower</li>
          <li><a href="/product/boss-cam-lock-advance-guardrail/">Boss Cam-Lock Guardrail</a></li>
          <li><a href="/product/bridge-beams/">Bridge Beams</a></li>
          <li><a href="/product/cantilever-sections/">Cantilever Sections</a></li>
          <li><a href="/product/high-clearance-frames/">High Clearance Frames</a></li>
          <li><a href="/lift-shaft-scaffold-tower-hire/">Lift Shaft Scaffold Tower</a></li>
          <li><a href="/product/stairmax/">StairMax</a></li>
      </ul>
      
      <ul>
          <li class="title">Tower Accessories</li>
          <li><a href="/tower-scaffold-towers-protectors/">Foam Protectors</a></li>
          <li><a href="/scaffold-tower-scaff-tag/">ScaffTag Safety Tag</a></li>
          <li><a href="/product/staging-boards/">Staging Boards</a></li>
          <li><a href="/youngman-boards-hire/">Youngman Boards</a></li>
          <li><a href="/pasma-scaffold-tower-training/">PASMA Training</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product/boss-aluminium-scaffold-tower-hire/"><img src="http://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/scaffold-tower.jpg" alt="" /></a></div>
      </div>     
      </li>
      <li><a href="/product-category/powered-access/low-level/">Other Access <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Ladders</li>
          <li><a href="/product/combination-ladders/">Combination Ladder</a></li>
          <li><a href="/product/extension-ladders/">Extension Ladder</a></li>
          <li><a href="/product/step-ladders/">Step Ladder</a></li>
          <li><a href="/product/grp-step-ladders/">GRP Step Ladder</a></li>
          <li><a href="/product/roof-ladders/">Roof Ladder</a></li>
      </ul>

      <ul>
          <li class="title">Podium Steps</li>
          <li><a href="/product/adjusta-minit-podium/">Adjusta Minit Podium</a> </li>
          <li><a href="/product/delta-deck/">Delta Deck</a></li>
          <li><a href="/product/desk-surfer/">Desk Surfer</a></li>
          <li><a href="/product/grp-podium-steps/">GRP Podium Step</a></li>
          <li><a href="/product/low-level-platform/">Low Level Platform</a></li>
          <li><a href="/product/mark-1-podium-steps/">Mark 1 Podium Step</a></li>
          <li><a href="/product/mark-2-podium-steps/">Mark 2 Podium Step</a></li>
          <li><a href="/product/mark-3-podium-steps/">Mark 3 Podium Step</a></li>
          <li><a href="/product/microfold-1000-podium-step/">Microfold 1000 Podium Step</a></li>
          <li><a href="/product/razor-decks/">Razor Deck</a></li>
          <li><a href="/product/teleguard-steps/">Teleguard Step</a></li>
      </ul>
      
      <ul>
          <li class="title">Powered Access</li>
          <li><a href="/product/boss-x2-scissor-lifts/">Boss X2 Scissor Lift</a></li>
          <li><a href="/product/boss-x3-scissor-lifts/">Boss X3 Scissor Lift</a></li>
          <li><a href="/product/boss-x3x-scissor-lifts/">Boss X3X Scissor Lift</a></li>
		  <li><a href="/product/pecolift/">Peco Lift</a></li>
          <li><a href="/product/pop-up-scissor-lift/">Pop Up Scissor Lift</a></li>
          <li><a href="/product/pop-plus-scissor-lifts/">Pop Up Plus Scissor Lift</a></li>
          <li><a href="/product/power-tower-nano/">Power Tower Nano</a></li>
          <li><a href="/product/power-towers/">Power Tower</a></li>
          <li><a href="/high-level-powered-access/">High Level Powered Access</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/high-level-powered-access/"><img src="http://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/powered-access.jpg" alt="" /></a></div>
      </div>      
      </li>
      <li><a href="/product-category/lifting-handling/">Lifting <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Hoists</li>
          <li><a href="/product/liftpulling-winch-hire/">Lifting/Pulling Winch</a> </li>
          <li><a href="/product/ratchet-hoist-hire/">Ratchet Hoist</a></li>
          <li><a href="/product/electric-chain-hoist-hire/">Electric Chain Hoist</a> </li>
          <li><a href="/product/scaffold-hoist-electric-hire/">Scaffold Hoist Electric</a></li>
          <li><a href="/product/power-wire-rope-hoist-hire/">Power Wire Rope Hoist</a> </li>
          <li><a href="/product/compact-hoist-hire/">Compact Hoist</a></li>
          <li><a href="/product-category/lifting-handling/hoist-accessories/">Hoist Accessories</a></li>
      </ul>

      <ul>
          <li class="title">General Building &amp; Groundworks</li>
          <li><a href="/product/stone-magnet-hire/">Stone Magnet</a> </li>
          <li><a href="/product/kerb-grab-hire/">Kerb Grab</a></li>
          <li><a href="/product/block-extractor-hire/">Block Extractor</a> </li>
          <li><a href="/product/block-transport-cart-hire/">Block Transport Cart</a></li>
          <li><a href="/product/mace-shifta-conveyor-hire/">Mace Shifta Conveyor</a> </li>
          <li><a href="/product/maxiveyor-hopper-hire/">Maxiveyor Hopper</a></li>
          <li><a href="/product/maxiveyor-conveyor-hire/">Maxiveyor Conveyor</a> </li>
          <li><a href="/product/scissor-lift-table-hire/">Scissor Lift Table</a></li>
          <li><a href="/product/glass-suction-lifter-pair-hire/">Glass Suction Lifter Pair</a> </li>
          <li><a href="/product/vacuum-slab-lifter-battery-hire/">Vacuum Slab Lifter Battery</a></li>
          <li><a href="/product/heavy-duty-goods-carry-cage-hire/">Heavy Duty Goods Carry Cage</a></li>
      </ul>
      
      <ul>
          <li class="title">Other Lifting</li>
          <li><a href="/product/adjustable-fork-lift-jib-hire/">Adjustable Fork Lift Jib</a></li>
          <li><a href="/product/3-roller-manhole-frame-hire/">3 Roller Manhole Frame</a></li>
          <li><a href="/product/corner-roller-hire/">Corner Roller</a></li>
          <li><a href="/product/shearlegs-hire/">Shearlegs</a> </li>
          <li><a href="/product/lightweight-demount-gantry-hire/">Lightweight Demount Gantry</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product-category/lifting-handling/"><img src="http://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/lifting.jpg" alt="" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/lifting-handling/">Material Handling <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Material Handling</li>
          <li><a href="/product/genie-lift/">Genie Lift</a></li>
          <li><a href="/product/narrow-pallet-truck-hire/">Narrow Pallet Truck</a></li>
          <li><a href="/product/wide-pallet-truck-hire/">Wide Pallet Truck</a> </li>
          <li><a href="/product/powered-pallet-truck-hire/">Powered Pallet Truck</a></li>
      </ul>

      <ul>
          <li class="title">Trucks &amp; Trolleys</li>
          <li><a href="/product/panel-trolley-hire/">Panel Trolley</a> </li>
          <li><a href="/product/twin-gas-cylinder-trolley-hire/">Twin Gas Cylinder Trolley</a></li>
          <li><a href="/product/high-lift-pallet-truck-hire/">High Lift Pallet Truck</a> </li>
          <li><a href="/product/weight-scale-pallet-truck-hire/">Weight Scale Pallet Truck</a></li>
          <li><a href="/product/terrain-pallet-truck-hire/">Terrain Pallet Truck</a> </li>
          <li><a href="/product/long-reach-pallet-truck-hire/">Long Reach Pallet Truck</a></li>
          <li><a href="/product/sack-truck-hire/">Sack Truck</a> </li>
          <li><a href="/product/carpet-pipe-trolley-hire/">Carpet Pipe Trolley</a></li>
          <li><a href="/product/hydraulic-furniture-machine-mover-hire/">Hydraulic Furniture Machine Mover</a></li>
          <li><a href="/product/step-stair-climbing-trolley-hire/">Step Stair Climbing Trolley</a></li>
      </ul>
      
      <ul>
          <li class="title">Other Material Handling</li>
          <li><a href="/product/machine-moving-skates-hire/">Machine Moving Skates</a></li>
          <li><a href="/product/shifting-skates-hire/">Shifting Skates</a></li>
          <li><a href="/product/roller-crowbar-hire/">Roller Crowbar</a></li>
          <li><a href="/product/crate-skate-hire/">Crate Skate</a></li>
          <li><a href="/product/chain-sling-hire/">Chain Sling</a> </li>
          <li><a href="/product/wire-rope-sling-hire/">Wire Rope Sling</a></li>
          <li><a href="/product-category/lifting-handling/jacks-load-testing/">Jacks &amp; Load Testing</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product-category/lifting-handling/"><img src="http://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/handling.jpg" alt="" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/site-accessories/">Site Accessories <span class="arrow"></span></a>
      <div class="megamenu clearfix">
      <ul>
          <li class="title">Popular Site Accessories</li>
          <li><a href="/product/acrow-props/">Acrow Props</a></li>
          <li><a href="/product/builders-trestles/">Builders Trestles</a></li>
          <li><a href="/product/site-box/">Site Box</a></li>
		  <li><a href="/product/large-site-box/">Large Site Box</a></li>
		  <li><a href="/product/site-chest/">Site Chest</a></li>
          <li><a href="/product/staging-boards/">Staging Boards</a></li>
          <li><a href="/product/strongboy-props/">Strongboy Props</a></li>
      </ul>

      <ul>
          <li class="title">Site Lighting &amp; Heating</li>
          <li><a href="/product/portable-magnetic-floodlight-hire/">Portable Magnetic Floodlight</a></li>
		  <li><a href="/product/portable-floodlight-hire/">Portable Floodlight 500W</a></li>
		  <li><a href="/product/single-tripod-floodlight-hire/">Single 500W Tripod Floodlight</a></li>
		  <li><a href="/product/twin-tripod-floodlight-hire/">Twin 500W Tripod Floodlight</a></li>
		  <li><a href="/product/plasterer-light-tripod-hire/">Plasterer Light - Tripod</a></li>
		  <li><a href="/product/fluorescent-uplight-hire/">Fluorescent Uplight Including Base 110v</a></li>
		  <li><a href="/product/lighting-mast-hire/">Lighting Mast 4 x 500W</a></li>
		  <li><a href="/product/rechargeable-light-hire/">Rechargeable Light 12V</a></li>
          <li><a href="/product/convector-heater-hire/">Convector Heater</a></li>
		  <li><a href="/product/oil-filled-radiator-hire/">Oil Filled Radiator Electric</a></li>
		  <li><a href="/product/infra-red-radiant-heater-hire/">Infra Red Radiant Heater</a></li>
      </ul>
      
      <ul>
          <li class="title">Specialist Storage</li>
          <li><a href="/product/flame-chemical-box/">Flame/Chemical Box</a></li>
		  <li><a href="/product/gas-cage-standard/">Gas Cage Standard</a></li>
		  <li><a href="/product/gas-cage-slim-line/">Gas Cage Slimline</a></li>
      </ul>
      
	  <div class="ad-style"><a href="/product/site-box/"><img src="http://www.lakeside-hire.co.uk/wp-content/themes/Lakeside/menu/images/accessories.jpg" alt="" /></a></div>
      </div>
      </li>
      <li><a href="/product-category/security-fencing/">Fencing <span class="arrow"></span></a>
      <ul class="wsmenu-submenu">
          <li><a href="/product/pedestrian-barrier/">Pedestrian Barrier</a></li>
		  <li><a href="/product/plastic-safety-barrier/">Plastic Safety Barrier</a></li>
		  <li><a href="/product/steel-site-hoarding/">Steel Site Hoarding</a></li>
		  <li><a href="/product/temporary-fencing/">Temporary Fencing</a></li>
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