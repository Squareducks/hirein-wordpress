<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon-32x32.png" type="image/png"/>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

<?php 

$town = isset($_GET["t"]) ? $_GET["t"] : "";
$town = ucwords(str_replace("_", "", $town));

?>

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<meta name="google-site-verification" content="C6bQdVdyTSAP9GUM7YsoWpTtanQZMRTGrV-HKxf_eIY" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/fonts.css" />
<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><script src="https://www.eurocarparts.com/theme/ecp/assets/js/selectivizr-min.js"></script> <![endif]-->
<!--[if IE 8 ]><body class="ieBrowser"><![endif]-->
<!--[if IE 9]><html class="ie9Browser">   <![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

<?php global $woocommerce; ?>

</head>
<body <?php body_class(); ?>>

	<header class="slide--reset">
		<section class="login-box" style="">
			<div class="container">
				<div class="row">
					<h3>Account Sign In</h3>
					<form class="login-form" name="header-login-form" method="post" action="https://www.eurocarparts.com/login">
					<input autocomplete="off" class="InputTxtBox required email" placeholder="Email Address" id="email" name="email" type="email" value="" data-emailcapturepoint="Contact"><input autocomplete="off" class="InputTxtBox required password" placeholder="Password" id="password" name="password" type="password" value=""><button id="loginSubmitBtn">Sign In</button><span class="error loginEmailError"></span><span class="register-link"> Not a Member?<a href="https://www.eurocarparts.com/sign-up" title=" Register Now"> Register Now</a></span><a href="javascript:void(0);" data-toggle="modal" data-target="#cls-popup" title="Forgot Password?" class="frgt-pwsd">Forgot Password?</a>
					</form>
				</div>
			</div>
		</section>

		<section class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8 left-grid">
					<span class="companylogo"><a href="/" title="Hire Desk"><img class="desktop" src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Scaffold Tower Hire" title="" data-pin-nopin="true"></a></span>
						<form class="search-from" role="search" method="get" id="searchform" action="https://www.hirein.co.uk/">
						<div class="form-group">
						<button onclick="javascript:return searchKeyword();"><img src="<?php bloginfo('template_url'); ?>/img/search-field-icon.png" alt="Search for ladders, scaffold towers..." title="Search"></button><input type="text" class="searchAutoComplete" placeholder="Search for ladders, scaffold towers..." value="" name="s">
						</div>
						<a href="javascript:void(0);" class="close-btn" title="Close"><img src="<?php bloginfo('template_url'); ?>/img/close-icon.png" alt="Close" title="Close"></a>
						<input type="hidden" name="post_type" value="product">
						<style>
						
						</style>
						</form>
					</div>
					<div class="col-md-4 col-sm-4 right-grid">
						<ul class="right-col">
						<li class="mobile-nav"><span class="mobile-menu"></span></li>
						<li class="mobile-search"><img src="/wp-content/themes/Lakeside/img/search-field-icon.png" alt="Search" title="Search"></li>
						<li class="mobile-logo"><a href="/" title="Hire In"><img src="<?php bloginfo('template_url'); ?>/img/logo-mobile.png" alt="Hire Desk Mobile Logo" title=""></a></li>
						<!--<li class="location-finder"><a href="https://www.eurocarparts.com/store-locator"><img src="https://www.eurocarparts.com/theme/ecp/assets/images/location-finder.svg" alt="Location Finder" title="Location Finder"></a></li>-->
						<li class="second-col">
							<a class="phone" href="tel:08081151064" title="Call Us"><span class="rTapNumber121261">0808 115 1064</span></a>
							<div class="desktop_time">(8:00AM to 5:00PM)</div>
						</li>
						<!--<li class="third-col signin"><a href="javascript:void(0);" title="Sign In">Sign In</a></li>-->
						<li class="fourth-col" id="quickbasketLi">
  <a href="/basket/" tabindex="0" class="basket-icon" role="button"
     data-toggle="popover" data-trigger="hover" data-placement="bottom"
     data-content="Currently there are no items in your basket."
     style="cursor: default;" title="" aria-label="Basket">
    <span class="cart-box" aria-live="polite">0</span>

    <!-- Inline SVG Cart Icon -->
    <svg class="cart-icon" viewBox="0 0 24 24" width="38" height="38"
         aria-hidden="true" focusable="false">
      <defs>
        <linearGradient id="cartStroke" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%" />
          <stop offset="100%" />
        </linearGradient>
      </defs>
      <!-- handle + frame -->
      <path d="M3 3h2l2.2 9.2a2 2 0 0 0 2 1.6h7.5a2 2 0 0 0 2-1.5l1.2-5.2H6.2"
            fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round"/>
      <!-- basket rim -->
      <path d="M7.5 8h12.8" fill="none" stroke="currentColor" stroke-width="1.8"
            stroke-linecap="round" stroke-linejoin="round" opacity=".9"/>
      <!-- wheels -->
      <circle cx="10" cy="20" r="1.7" fill="currentColor"/>
      <circle cx="17" cy="20" r="1.7" fill="currentColor"/>
    </svg>

    <span class="label"></span>
  </a>
</li>

						</ul>
					</div>
				</div>
			</div>
		</section>
		
		<section class="nav-col">
			<div class="container">
			<div class="row">
			<nav>
				<ul class="outer-ul">
					<li class="tier1nav">
					<a class="onlydlink" href="/scaffold-towers/" title="Scaffold">Scaffold</a><div class="sub-nav out-list" style="display: none;">
					<span class="back-link"><a href="javascript:void(0);" title="Scaffold">Scaffold</a></span>
						<ul class="left-sub-nav">
							<li class="sub-li active">
								<a class="onlydlink" href="/scaffold-towers/" title="">Popular Towers</a>
								<div class="inner-nav out-list">
									<span class="back-link"><a href="javascript:void(0);" title="">Popular Towers</a></span>
									<ul>
									<li title="Regular Service"><span>Popular Towers</span></li>
									<li><a href="/scaffold-towers/scaffold-tower-hire/" title="Aluminium Scaffold Tower">Aluminium Scaffold Tower</a></li>
									<li><a href="/scaffold-towers/grp-scaffold-tower/" title="GRP Scaffold Tower">GRP Scaffold Tower</a></li>
									<li><a href="/scaffold-towers/specialist-scaffold-tower/room-mate-scaffold-tower/" title="Room Mate Scaffold Tower">Room Mate Scaffold Tower</a></li>
									<li><a href="/scaffold-towers/alloy-stair-scaffold-tower/" title="Alloy Stair Scaffold Tower">Alloy Stair Scaffold Tower</a></li>
									<li><a href="/scaffold-towers/specialist-scaffold-tower/boss-clima-tower/" title="Boss Clima Tower">Boss Clima Tower</a></li>
									</ul>
									<a class="more-links" href="/scaffold-towers/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/scaffold-towers/specialist-scaffold-tower/" title="">Specialist Towers</a>
								<div class="inner-nav out-list">
									<span class="back-link"><a href="javascript:void(0);" title="">Specialist Towers</a></span>
									<ul>
									<li title="Specialist Towers"><span>Specialist Towers</span></li>
									<li><a href="/scaffold-towers/specialist-scaffold-tower/boss-cam-lock-advance-guardrail/" title="Boss Cam-Lock Guardrail">Boss Cam-Lock Guardrail</a></li>
								    <li><a href="/scaffold-towers/specialist-scaffold-tower/bridge-beams/" title="Bridge Beams">Bridge Beams</a></li>
									<li><a href="/scaffold-towers/specialist-scaffold-tower/cantilever-sections/" title="Cantilever Sections">Cantilever Sections</a></li>
									<li><a href="/high-clearance-frames/" title="High Clearance Frames">High Clearance Frames</a></li>
									<li><a href="/lift-shaft-scaffold-tower-hire/" title="Lift Shaft Scaffold Tower">Lift Shaft Scaffold Tower</a></li>
									<li><a href="/scaffold-towers/specialist-scaffold-tower/stairmax/" title="StairMax">StairMax</a></li>
									</ul>
									<a class="more-links" href="/scaffold-towers/specialist-scaffold-tower/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
							<a class="onlydlink" href="/scaffold-towers/" title="">Tower Accessories</a>
							<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Tower Accessories</a></span>
								<ul>
								<li title="Tower Accessories"><span>Tower Accessories</span></li>
								<li><a href="/tower-scaffold-towers-protectors/" title="Foam Protectors">Foam Protectors</a></li>
								<li><a href="/scaffold-tower-scaff-tag/" title="ScaffTag Safety Tag">ScaffTag Safety Tag</a></li>
								<li><a href="/scaffold-towers/specialist-scaffold-tower/staging-boards/" title="Staging Boards">Staging Boards</a></li>
								<li><a href="/youngman-boards-hire/" title="Youngman Boards">Youngman Boards</a></li>
								</ul>
								<a class="more-links" href="/scaffold-towers/" title="View All">View All</a>
							</div>
							</li>
						</ul>
					</div>
					</li>
					<li class="tier1nav ">
						<a class="onlydlink" href="/other-access/" title="Other Access">Other Access</a>
						<div class="sub-nav out-list" style="display: none;">
							<span class="back-link"><a href="/other-access/" title="">Other Access</a></span>
							<ul class="left-sub-nav">
							<li class="sub-li">
								<a class="onlydlink" href="/ladders/" title="">Ladders</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Ladders</a></span>
								<ul>
								<li title="Ladders"><span>Ladders</span></li>
								<li><a href="/ladders/combination-ladders/" title="Combination Ladder">Combination Ladder</a></li>
								<li><a href="/ladders/extension-ladders/" title="Extension Ladder">Extension Ladder</a></li>
								<li><a href="/ladders/step-ladders/" title="Step Ladder">Step Ladder</a></li>
								<li><a href="/ladders/grp-step-ladders/" title="GRP Step Ladder">GRP Step Ladder</a></li>
								<li><a href="/ladders/roof-ladders/" title="Roof Ladder">Roof Ladder</a></li>
								</ul>
								<a class="more-links" href="/ladders/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/podium-steps/" title="">Podiums</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Podiums</a></span>
								<ul>
								<li title="Podiums"><span>Podiums</span></li>
								<li><a href="/podium-steps/adjusta-minit-podium/" title="Adjusta Minit Podium">Adjusta Minit Podium</a> </li>
								<li><a href="/podium-steps/delta-deck/" title="Delta Deck">Delta Deck</a></li>
								<li><a href="/podium-steps/desk-surfer-hire/" title="Desk Surfer">Desk Surfer</a></li>
								<li><a href="/podium-steps/grp-podium-steps/" title="GRP Podium Step">GRP Podium Step</a></li>
								<li><a href="/ladders/low-level-platform/" title="Low Level Platform">Low Level Platform</a></li>
								<li><a href="/podium-steps/mark-1-podium-steps/" title="Mark 1 Podium Step">Mark 1 Podium Step</a></li>
								<li><a href="/podium-steps/mark-2-podium-steps/" title="Mark 2 Podium Step">Mark 2 Podium Step</a></li>
								<li><a href="/podium-steps/mark-3-podium-steps/" title="Mark 3 Podium Step">Mark 3 Podium Step</a></li>
								
								<li><a href="/scaffold-towers/" title="Razor Deck">Razor Deck</a></li>
								<li><a href="/podium-steps/teleguard-steps/" title="Teleguard Step">Teleguard Step</a></li>
								</ul>
								<a class="more-links" href="/podium-steps/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/powered-access/" title="">Powered Access</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Powered Access</a></span>
								<ul>
								<li title="Powered Access"><span>Powered Access</span></li>
								
								<li><a href="/powered-access/low-level/boss-x3-scissor-lifts/">Boss X3 Scissor Lift</a></li>
								<li><a href="/powered-access/low-level/boss-x3x-scissor-lifts/">Boss X3X Scissor Lift</a></li>
								<li><a href="/powered-access/low-level/pecolift/">Peco Lift</a></li>
								
								<li><a href="/powered-access/low-level/pop-plus-scissor-lifts/">Pop Up Plus Scissor Lift</a></li>
								<li><a href="/powered-access/low-level/power-tower-nano/">Power Tower Nano</a></li>
								<li><a href="/powered-access/low-level/power-towers/">Power Tower</a></li>
								<li><a href="/high-level-powered-access/">High Level Powered Access</a></li>
								</ul>
								<a class="more-links" href="/powered-access/" title="View All">View All</a>
								</div>
							</li>
							</ul>
						</div>
					</li>
					<li class="tier1nav ">
						<a class="onlydlink" href="https://www.hirein.co.uk/security-fencing/" title="Security">Security</a>
						<div class="sub-nav out-list" style="display: none;">
							<span class="back-link"><a href="javascript:void(0);" title="">Security</a></span>
							<ul class="left-sub-nav"> 
							<li class="sub-li">
								<a class="onlydlink" href="/security-fencing/" title="">Fencing</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Fencing</a></span>
								<ul>
								<li title="Fencing"><span>Fencing</span></li>
								<li><a href="/security-fencing/pedestrian-barrier/" title="Pedestrian Barrier">Pedestrian Barrier</a></li>
								<li><a href="/security-fencing/plastic-safety-barrier/" title="Plastic Safety Barrier">Plastic Safety Barrier</a></li>
								<li><a href="/security-fencing/steel-site-hoarding/" title="Steel Site Hoarding">Steel Site Hoarding</a></li>
								<li><a href="/security-fencing/temporary-heras-fencing/" title="Temporary Fencing">Temporary Fencing</a></li>
								</ul>
								<a class="more-links" href="/security-fencing/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/site-accessories/site-boxes/" title="">Site Boxes</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Site Boxes</a></span>
								<ul>
								<li title="Site Boxes"><span>Site Boxes</span></li>
								<li><a href="/site-accessories/site-boxes/site-box/" title="Site Box">Site Box</a></li>
								<li><a href="/site-accessories/site-boxes/large-site-box/" title="Large Site Box">Large Site Box</a></li>
								<li><a href="/site-accessories/site-boxes/site-chest/" title="Site Chest">Site Chest</a></li>
								</ul>
								<a class="more-links" href="/site-accessories/site-boxes/" title="View All">View All</a>
								</div>
							</li>
							</ul>
						</div>
					</li>
					<li class="tier1nav">
						<a class="onlydlink" href="https://www.hirein.co.uk/site-accessories/" title="Site Accessories">Site Accessories</a>
						<div class="sub-nav out-list" style="display: none;">
							<span class="back-link"><a href="javascript:void(0);" title="">Site Accessories</a></span>
							<ul class="left-sub-nav"> 
							<li class="sub-li">
								<a class="onlydlink" href="/site-accessories/" title="">Site Accessories</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Site Accessories</a></span>
								<ul>
								<li title="Site Accessories"><span>Site Accessories</span></li>
								<li><a href="/site-accessories/genie-lift/" title="Genie Lift">Genie Lift</a></li>
								<li><a href="/lifting-handling/material-lifting/gas-genie-lift/" title="Gas Genie Lift">Gas Genie Lift</a></li>
								<li><a href="/site-accessories/acrow-props/" title="Acrow Props">Acrow Props</a></li>
								<li><a href="/site-accessories/builders-trestles/" title="Builders Trestles">Builders Trestles</a></li>
								<li><a href="/scaffold-towers/specialist-scaffold-tower/staging-boards/" title="Staging Boards">Staging Boards</a></li>
								<li><a href="/site-accessories/strongboy-props/" title="Strongboy Props">Strongboy Props</a></li>
								</ul>
								<a class="more-links" href="/site-accessories/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/site-lighting/" title="">Lighting &amp; Heating</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Lighting &amp; Heating</a></span>
								<ul>
								<li title="Lighting &amp; Heating"><span>Lighting &amp; Heating</span></li>
								<li><a href="/site-lighting/portable-magnetic-floodlight-hire/" title="Portable Magnetic Floodlight">Portable Magnetic Floodlight</a></li>
								<li><a href="/site-lighting/portable-floodlight-hire/" title="Portable Floodlight 500W">Portable Floodlight 500W</a></li>
								<li><a href="/site-lighting/single-tripod-floodlight-hire/" title="Single 500W Tripod Floodlight">Single 500W Tripod Floodlight</a></li>
								<li><a href="/site-lighting/twin-tripod-floodlight-hire/" title="Twin 500W Tripod Floodlight">Twin 500W Tripod Floodlight</a></li>
								<li><a href="/site-lighting/plasterer-light-tripod-hire/" title="Plasterer Light - Tripod">Plasterer Light - Tripod</a></li>
								<li><a href="/site-lighting/fluorescent-uplight-hire/" title="Fluorescent Uplight Including Base 110v">Fluorescent Uplight Including Base 110v</a></li>
								<li><a href="/site-lighting/lighting-mast-hire/" title="Lighting Mast 4 x 500W">Lighting Mast 4 x 500W</a></li>
								<li><a href="/site-lighting/rechargeable-light-hire/" title="Rechargeable Light 12V">Rechargeable Light 12V</a></li>
								<li><a href="/heaters/convector-heater-hire/" title="Convector Heater">Convector Heater</a></li>
								<li><a href="/heaters/oil-filled-radiator-hire/" title="Oil Filled Radiator Electric">Oil Filled Radiator Electric</a></li>
								<li><a href="/heaters/infra-red-radiant-heater-hire/" title="Infra Red Radiant Heater">Infra Red Radiant Heater</a></li>
								</ul>
								<a class="more-links" href="/site-lighting/" title="View All">View All</a>
								</div>
							</li>
							<li class="sub-li">
								<a class="onlydlink" href="/site-accessories/specialist-storage/" title="">Specialist Storage</a>
								<div class="inner-nav out-list">
								<span class="back-link"><a href="javascript:void(0);" title="">Specialist Storage</a></span>
								<ul>
								<li title="Specialist Storage"><span>Specialist Storage</span></li>
								<li><a href="/site-accessories/specialist-storage/flame-chemical-box/" title="Flame/Chemical Box">Flame/Chemical Box</a></li>
								<li><a href="/site-accessories/specialist-storage/gas-cage-standard/" title="Gas Cage Standard">Gas Cage Standard</a></li>
								<li><a href="/site-accessories/specialist-storage/gas-cage-slim-line/" title="Gas Cage Slimline">Gas Cage Slimline</a></li>
								</ul>
								<a class="more-links" href="/site-accessories/specialist-storage/" title="View All">View All</a>
								</div>
							</li>
							</ul>
						</div>
					</li>
					<li><a href="/faq/">Faq</a></li>
					<li><a href="/contact-us/">Contact Us</a></li>
					<li class="tier1nav end active"><a class="call-back">request a call back</a></li>
					
					<div class="messagepop pop">
						
						<div class="gf_browser_chrome gform_wrapper" id="gform_wrapper_2"><form method="post" enctype="multipart/form-data" id="gform_2" action="/thank-you/">
                            <h3>Call-Back Request</h3>
                            <p>Enter your details and we'll call you right back.
								From 08:30 to 17:00 - Monday to Friday(excluding Bank Holidays)</p>
                        <div class="gform_body"><ul id="gform_fields_2" class="gform_fields top_label form_sublabel_below description_below"><li id="field_2_1" class="gfield gfield_contains_required field_sublabel_below field_description_below"><label class="gfield_label gfield_label_before_complex" for="input_2_1_3">Full name<span class="gfield_required">*</span></label><div class="ginput_complex ginput_container no_prefix has_first_name no_middle_name no_last_name no_suffix gf_name_has_1 ginput_container_name gfield_trigger_change" id="input_2_1">
                            
                            <span id="input_2_1_3_container" class="name_first">
                                                    <input type="text" name="input_1.3" id="input_2_1_3" value="" aria-label="First name" tabindex="2" aria-required="true" aria-invalid="false">
                                                </span>
                            
                            
                            
                        </div></li><li id="field_2_3" class="gfield gfield_contains_required field_sublabel_below field_description_below"><label class="gfield_label" for="input_2_3">Phone number<span class="gfield_required">*</span></label><div class="ginput_container ginput_container_phone"><input name="input_3" id="input_2_3" type="text" value="" class="large" tabindex="6" aria-required="true" aria-invalid="false"></div></li><li id="field_2_5" class="gfield field_sublabel_below field_description_below"><label class="gfield_label" for="input_2_5">When would you like a call?</label><div class="ginput_container ginput_container_select"><select name="input_5" id="input_2_5" class="large gfield_select" tabindex="7" aria-invalid="false"><option value="In the next hour?" selected="selected">In the next hour?</option><option value="Morning">Morning</option><option value="Afternoon">Afternoon</option></select></div></li><li id="field_2_4" class="gfield field_sublabel_below field_description_below"><label class="gfield_label" for="input_2_4">Message</label><div class="ginput_container"><textarea name="input_4" id="input_2_4" class="textarea medium" tabindex="8" aria-invalid="false" rows="10" cols="50"></textarea></div></li><li id="field_2_6" class="gfield gform_validation_container field_sublabel_below field_description_below"><label class="gfield_label" for="input_2_6">Email</label><div class="ginput_container"><input name="input_6" id="input_2_6" type="text" value=""></div><div class="gfield_description">This field is for validation purposes and should be left unchanged.</div></li>
                            </ul></div>
						<div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_2" class="btn" value="Call Me" tabindex="9" onclick="if(window[&quot;gf_submitting_2&quot;]){return false;}  window[&quot;gf_submitting_2&quot;]=true;  " onkeypress="if( event.keyCode == 13 ){ if(window[&quot;gf_submitting_2&quot;]){return false;} window[&quot;gf_submitting_2&quot;]=true;  jQuery(&quot;#gform_2&quot;).trigger(&quot;submit&quot;,[true]); }"> 
							<input type="hidden" class="gform_hidden" name="is_submit_2" value="1">
							<input type="hidden" class="gform_hidden" name="gform_submit" value="2">
							
							<input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
							<input type="hidden" class="gform_hidden" name="state_2" value="WyJbXSIsImI5N2U1ODJhMGUzMmYwMmEyN2M1NzU4ZWEzYzk1MDdiIl0=">
							<input type="hidden" class="gform_hidden" name="gform_target_page_number_2" id="gform_target_page_number_2" value="0">
							<input type="hidden" class="gform_hidden" name="gform_source_page_number_2" id="gform_source_page_number_2" value="1">
							<input type="hidden" name="gform_field_values" value="">
							
						</div>
                        </form>
                        </div>
						
					</div>
						
						<script>
							function deselect(e) {
					  $('.pop').slideFadeToggle(function() {
						e.removeClass('selected');
					  });    
					}

					$(function() {
					  $('.call-back').on('click', function() {
						if($(this).hasClass('selected')) {
						  deselect($(this));               
						} else {
						  $(this).addClass('selected');
						  $('.pop').slideFadeToggle();
						}
						return false;
					  });

					  $('.close').on('click', function() {
						deselect($('.call-back'));
						return false;
					  });
					});

					$.fn.slideFadeToggle = function(easing, callback) {
					  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
					};
						</script>
				</ul>
			</nav>
			</div>
			</div>
		</section>
	</header>
	
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