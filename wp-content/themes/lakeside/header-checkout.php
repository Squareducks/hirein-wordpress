<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- All in one Favicon 4.3 -->
<link rel="icon" href="https://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.png" type="image/png"/>
<link rel="shortcut icon" href="https://lakeside-hire.co.uk/wp-content/uploads/2013/10/Lakeside-hire.favicon.ico" />
<title><?php wp_title ( '|', true,'right' ); ?></title>
<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/menu/css/webslidemenu.css" />
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/menu/js/webslidemenu.js"></script>

<!--Tooltip-->
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url'); ?>/js/tooltip.js"></script>

<script type="text/javascript">(function(){function f(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="https://platform.cloud-iq.com/cartrecovery/store.js?app_id=27841";var t = document.getElementsByTagName('head')[0];t.appendChild(e);}f();})();</script>

<script type="text/javascript" src="https://www.connct-9.com/js/42460.js" ></script>
<noscript><img src="https://www.connct-9.com/42460.png" style="display:none;" /></noscript>


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

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '981397811924478');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=981397811924478&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<?php global $woocommerce; ?>

</head>
<body <?php body_class(); ?>>
	
	<div class="wsmenucontainer clearfix">
	<div class="wsmenuexpandermain slideRight"><a id="navToggle" class="animated-arrow slideLeft"><span></span></a></div>
	<div class="wsmenucontent overlapblackbg"></div>
    
    <div class="header header-checkout" name="header">
    
        <div class="container">
            <div class="mobile-call-nav">
                <a href="tel:08081151064"></a>
            </div>
            <div class="search">
                <form role="search" method="get" id="searchform" action="https://www.lakeside-hire.co.uk/">
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
					<a class="phone" href="tel:08081151064">0808 115 1064</a>
				</div>
            </div>
            <div id="logo2">
                <a href="<?php echo get_option('home'); ?>">Hire Desk</a>
            </div>
        </div>
    </div>
    </div>
	<div id="main-checkout">
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
        <div class="container">
            <div id="content" name="content" class="hfeed">