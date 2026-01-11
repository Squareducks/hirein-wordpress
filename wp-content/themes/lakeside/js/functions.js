jQuery(document).ready(function(){
	$(document).on('click','.searchAutoComplete',function(){
	$('.searchAutoComplete').autocomplete({
		serviceUrl: ECP.getBase() + '/search/index/getSearchAutoComplete',
		onSelect: function (event, ui) { 
	    	$(".search-from").submit();
	    },
		ajaxSettings: {
		    	global: false,
		    }
		});
	});
	var getWidth = $(window).width();
	//Fixed Header
	if(getWidth >= 768){
		var timer;
		$("header .nav-col nav li.tier1nav").mouseenter(function(){
			var that = this;
			timer = setTimeout(function(){
				$("header .nav-col nav li.tier1nav .sub-nav").hide();
				$(that).children(".sub-nav").show();
				$(that).children(".sub-li").addClass('active');
				$($(that).find(".sub-li").get(0)).addClass('active');
			}, 400);
		}).mouseleave(function(){
			var that = this;
			clearTimeout(timer);
			$("header .nav-col nav li.tier1nav .sub-nav").hide();
			$("header .nav-col nav li.tier1nav .sub-nav .sub-li").removeClass('active');
			$($(that).find(".sub-li").get(0)).addClass('active');
		});		
		var navhover = {
			over: function(){
				$(this).siblings().removeClass("active");
				$(this).addClass('active');
				$(this).children('.inner-nav').fadeIn(200);
			},
			timeout: 400, // number = milliseconds delay before onMouseOut
			out: function(){
				
			}
		};
		$("header .nav-col .sub-nav .left-sub-nav .sub-li").hoverIntent(navhover);
		//checkout Dropdown
		var checkout = {
			over: function(){
				$(this).children('.drop-arrow').animate({opacity:1, height:'toggle'}, 150);
				$(this).children('.cart-dropdown').animate({opacity:1, height:'toggle'}, 150);
			},
			timeout: 100, // number = milliseconds delay before onMouseOut
			out: function(){
				$(this).children('.drop-arrow').animate({opacity:0, height:'toggle'}, 150);
				$(this).children('.cart-dropdown').animate({opacity:0, height:'toggle'}, 150);
			}
		};
		$("header .right-col li.fourth-col").hoverIntent(checkout);
		//Cookie Bar
		if($('.cookie-bar').length){
			$('.content-section').addClass('cookiebar');
		}else{
			$('.content-section').removeClass('cookiebar');
		}
		$('.cookie-bar.active .close-btn').click(function(){
			$('.cookie-bar').slideUp(400).removeClass('active');
			$('header').removeClass('extbar');
			$('.content-section').removeClass('cookiebar');
		});
		//vrm focus
		$('.search-detail-box .reg-field input').focus(function(){
			$(this).parents('.reg-field').addClass('focus');
			$('.search-detail-box .select-vehicle').addClass('disable');
		}).blur(function(){
			$(this).parents('.reg-field').removeClass('focus');
			$('.search-detail-box .search-wrapper .select-vehicle').removeClass('disable');
		});
		$('.search-detail-box .select-vehicle select').focus(function(){
			$(this).parents('.select-vehicle').addClass('focus');
			$('.search-detail-box .reg-field').addClass('disable');
		}).blur(function(){
			$(this).parents('.select-vehicle').removeClass('focus');
			$('.search-detail-box .reg-field').removeClass('disable');
		});
		//Brands Logo List
		$('.brand-slider .bxslider li:nth-child(7)').nextAll().css( "margin-bottom", "0px" );
		//custom dropdown
		if($('.custom-select').length){
			$('.custom-select').niceSelect();
		}
	}
	//Country Dropdown
	var countryhover = {
		over: function(){
			$(this).children('.country-list').slideDown(200);
			$(this).children('.drop-arrow').slideDown(200);
		},
		timeout: 100, // number = milliseconds delay before onMouseOut
		out: function(){
			$(this).children('.country-list').slideUp(200);
			$(this).children('.drop-arrow').slideUp(200);
		}
	};
	$("header .right-col li.first-col").hoverIntent(countryhover);
	$('.country-list a').click(function(){
		var imgVal = $(this).children('img').attr('src');
		$(this).parents('.first-col').children('.counrty-flag').children('img').attr('src',imgVal);
	});
	//Login Bar
	$('header .right-col .third-col a').click(function(){
		$('.login-box').slideToggle(400);
	});
	//search
	$('.search-from input').focus(function(){
		$(this).parents('.search-from').addClass('active');
	}).blur(function(){
		$(this).parents('.search-from').removeClass('active');
	});
	//Search Result Popup
	$('.search-result-display .view-btn').click(function(){
		$('.search-result-display .popup-box').fadeOut(400);
		$(this).parent('.left-col').next('.popup-box').fadeIn(400);
	});
	$('.search-result-display .close-btn').click(function(){
		$('.search-result-display .popup-box').fadeOut(400);
		$(this).parents('.popup-box').hide();
	});
	//Main Slider
	$('.home-slider .bxslider').bxSlider({
		mode: 'horizontal',
		animation: "slide",
		auto: true,
		infiniteLoop: ($(".home-slider .bxslider>li").length > 1) ? true: false,
		touch: true,
		useCSS: false,
		controls: false,
		preventDefaultSwipeY: false,
		onSliderLoad: function(){
			$(".home-slider").css("visibility", "visible");
		}
	});
	//Product Listing
	$(document).on('click','.product-listing-col .product-btn .quick-btn.desktop',function(){
		$(this).toggleClass('active');
		$(this).parents('.left-col').children('.quick-info-data').slideToggle(400);
	});
	//Shopping Cart
	$('.shopping-cart-col .basket-body .info-btn').click(function(){
		$(this).parents('.left-col').next('.right-col').slideToggle(400);
	});
	//Product Detail
	if($(".product-detail-table").length){
		RESPONSIVEUI.responsiveTabs();
		$('.tabcontrolswrap a.tabcontrols').click(function(){
			var obj = $(this);
			if(getWidth <= 767){
				$("div.product-detail-table .responsive-tabs").find('h4').removeClass('responsive-tabs__heading--active');
				var tab3 = $("div.product-detail-table .responsive-tabs").find('#tablist1-panel2');
				$(tab3).prev('h4').addClass('responsive-tabs__heading--active');
				$(tab3).addClass('responsive-tabs__panel--active').show();
				$('html,body').animate({scrollTop: $("#"+obj.data('id')).offset().top-40}, 500);
				return false;
			}else{
				$("div.product-detail-table .responsive-tabs").find('li').removeClass('responsive-tabs__list__item--active');
				$("div.product-detail-table .table-data").removeClass('responsive-tabs__panel--active').hide();
				var tab2 = $("div.product-detail-table .responsive-tabs").find('#tablist1-tab2');
				$(tab2).addClass('responsive-tabs__list__item--active');
				$("#"+$(tab2).attr('aria-controls')).addClass('responsive-tabs__panel--active').show();
				$('html,body').animate({scrollTop: $("#"+obj.data('id')).offset().top-40}, 500);
				return false;
			}
		});
	}
	//Footer Dropdown
	$('.choose-country .inner-box .country-selector').click(function(e){
		$(this).parent('.inner-box').children('.country-list').slideToggle(200);
		e.stopPropagation();
	});
	//order confirmation tabbing
	$('.order-confirm-col .order-header .tab-link').click(function(){
		$(this).parent('.order-header').next('.order-detail').slideToggle(400);
	});
	$('.order-confirm-col .order-header .tab-link').click(function(event){
		if($(this).hasClass("active")){
			$(this).toggleClass("active").html('-');
			$(this).parent('.order-header').css('margin-bottom','0');
		}else{
			$(this).toggleClass("active").html('+');
			$(this).parent('.order-header').css('margin-bottom','20px');
		}
	});
	//checkout order view toggle
	$(document).on('click','.checkout.delivery-option .table-data .toggle-option',function(){
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			$(this).children('img').attr('src',ECP.getStatic()+'/'+'open-arrow.png');
		}else{                                                    
			$(this).children('img').attr('src',ECP.getStatic()+'/'+'close-arrow.png');
		}
		$(this).parent('.row-inner').children('.sub-list').slideToggle(400);
	});
	$(document).click(function(e){
		if(e.target.class != 'country-list' && !$('.country-list').find(e.target).length){
			$(".country-list, .first-col .drop-arrow").hide();
		}
	});
	//Static Page Accordion
	$(".static-page #accordion").on("shown.bs.collapse", function(){
		var myEl = $(this).find('.collapse.in').prev('.panel-heading');
		$('html, body').animate({
			scrollTop:($(myEl).offset().top-200)
		}, 500);
	});
	$(".static-page #accordion1 .panel-group").on("shown.bs.collapse", function(){
		var myEl = $(this).find('.collapse.in').prev('.panel-heading');
		$('html, body').animate({
			scrollTop:($(myEl).offset().top-200)
		}, 500);
	});
	$(".static-page #accordion1").on("shown.bs.collapse", function(event){
		var accParent 	= $(event.target).parent();
		var eleId 		= $(accParent).find('.panel-title').data('parent');
		if(eleId.indexOf('inner') < 0){
			$(eleId).find('.panel-body .in').collapse('hide');
			var myEl = $(event.target).parent();
			$('html, body').animate({
				scrollTop:($(myEl).offset().top-200)
			}, 500);
		}
	});
	//Device Menu close
	if(getWidth >= 768 && getWidth <= 1023){
		$('.content-section, footer').on('click touchstart', function(event){
			if($(event.target).parents().index($('.sub-nav-col')) == -1){
				if($('.sub-nav').is(":visible")){
					$('.sub-nav').hide();
				}
			}
		});
		$('.stock-availability-data .select-store-btn').click(function(){
			$(this).next('.store-btn-popup').slideDown(400);
		}, function(){
			$(this).next('.store-btn-popup').slideUp(400);
		});
	}
	//Sitemap Accordion
	var currentlyAnimating = false;
	$('.sitemap-col .sub-listing span').click(function(){
		if(!currentlyAnimating){
			currentlyAnimating = true;
			$(this).parent('li').toggleClass("active").find('ul').slideToggle(400, function() {
				currentlyAnimating = false;
			});
			
			$('.sitemap-col .sub-listing > li.active').not($(this).parent('li')).removeClass("active");
			$('.sitemap-col .sub-listing ul:visible').not($(this).parent('li').find('ul')).slideUp(400, function() {
				currentlyAnimating = false;
			});
		}
	});
	//Checkout payment view
	$('.checkout.payment-detail .select-payment-mode li input').click(function(){
		if(this.checked){
			$('.checkout.payment-detail .select-payment-mode li').removeClass('active');
			$(this).parent('li').addClass('active');
		}else{
			$('.checkout.payment-detail .select-payment-mode li').removeClass('active');
		}
	});
	$('.checkout.payment-detail .detail-form .address-confirm-col label').click(function(){
		$('.checkout.payment-detail .detail-form .address-confirm-col label').removeClass('active');
		$(this).addClass('active');
	});
	//Product listing Filter
	$(document).on('click','.product-listing-col .sfilter',function(){
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			$('.filter-box .selection-count').hide();
			$('.product-listing-col .filter-box .filter-overlay').show();
			$('.product-listing-col .filter-box .small-filter').slideDown(200);
			$('.clearance-listing-col.product-listing-col .filter-overlay').hide();
		}else{
			$('.filter-box .selection-count').show();
			$('.product-listing-col .filter-box .filter-overlay').hide();
			$('.product-listing-col .filter-box .small-filter').slideUp(200);
		}
	});
	$(document).on('click','.product-listing-col .lfilter',function(){
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			$('.filter-box .selection-count').hide();
			$('.product-listing-col .filter-box .filter-overlay').show();
			$('.product-listing-col .filter-box .full-filter').slideDown(200);
			$('.clearance-listing-col.product-listing-col .filter-overlay').hide();
		}else{
			$('.filter-box .selection-count').show();
			$('.product-listing-col .filter-box .filter-overlay').hide();
			$('.product-listing-col .filter-box .full-filter').slideUp(200);
		}
	});
	$(document).on('click','.filter-box .filter-overlay',function(){
		$(this).hide();
		$('.filter-box .selection-count').show();
		$('.filter-box .lfilter').removeClass('active');
		$('.filter-box .sfilter').removeClass('active');
		$('.product-listing-col .filter-box .full-filter').slideUp(200);
		$('.product-listing-col .filter-box .small-filter').slideUp(200);
	});
	//Feedback slide Effect
	$('.feedback-link').hover(function(){
		$(this).animate({right: '0'}, 400);
	}, function(){
		$(this).animate({right: '-92px'}, 400);
	});
	//SEO content effect
	$('.tierseocontent .view-more').click(function(){
		$(this).hide();
		$('.tierseocontent span').addClass('expand');
		$('.tierseocontent .view-less').css('display','inline');
	});
	$('.tierseocontent .view-less').click(function(){
		$(this).hide();
		$('.tierseocontent span').removeClass('expand');
		$('.tierseocontent .view-more').fadeIn(400);
	});
	$(document).on('click','.order-review .collapse-arrow',function(){
		$(this).toggleClass('active');
		if($(this).hasClass('active')){
			if(getWidth <= 767){
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'checkout-review-arrow-active.png');
			}else{
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'open-arrow.png');
			}
		}else{
			if(getWidth <= 767){
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'checkout-review-arrow.png');
			}else{
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'close-arrow.png');
			}
		}
		$('.toggle-view').slideToggle(400);
	});
	//----------Mobile Device Function-----------
	if(getWidth <= 767){
		//Mobile Header
		$('.cookie-bar.active .close-btn').click(function(){
			$('.cookie-bar').slideUp(400).removeClass('active');
		});
		$('header .right-col li.fourth-col .basket-icon').attr('href','javascript:void(0);');
		//vrm box selection
		$('.car-parts-form .select-vehicle').addClass('nowActive');
		$(document).on('click','.car-parts-form .select-vehicle.nowActive .heading',function(){
			$(this).addClass('open');
			$(this).parent('.select-vehicle').removeClass('nowActive');
			$(this).next('.vehicle-form').slideToggle(400);
			$('.car-parts-form .number-col .vrm-form').slideToggle(400);
			$('.car-parts-form .number-col').addClass('nowActive');
			$('.car-parts-form .number-col .heading').addClass('close');
		});
		$(document).on('click','.car-parts-form .number-col.nowActive .heading',function(){
			$(this).removeClass('close');
			$(this).parent('.number-col').removeClass('nowActive');
			$(this).next('.vrm-form').slideToggle(400);
			$('.car-parts-form .vehicle-form').slideToggle(400);
			$('.car-parts-form .select-vehicle').addClass('nowActive');
			$('.car-parts-form .select-vehicle .heading').removeClass('open');
		});
		$('.car-parts-form.filled-form').click(function(){
			$('.car-parts-form.filled-form .number-col .vrm-form').stop();
		});
		//inner pages vrm box selection
		$('.search-detail-box .select-vehicle').addClass('nowActive');
		$(document).on('click','.search-detail-box .select-vehicle.nowActive .heading',function(){
			$(this).addClass('open');
			$(this).parent('.select-vehicle').removeClass('nowActive');
			$(this).next('.vehicle-form').slideToggle(400);
			$('.search-detail-box .reg-field .vrm-form').slideToggle(400);
			$('.search-detail-box .reg-field').addClass('nowActive');
			$('.search-detail-box .reg-field .heading').addClass('close');
		});
		$(document).on('click','.search-detail-box .reg-field.nowActive .heading',function(){
			$(this).removeClass('close');
			$(this).parent('.reg-field').removeClass('nowActive');
			$(this).next('.vrm-form').slideToggle(400);
			$('.search-detail-box .select-vehicle .vehicle-form').slideToggle(400);
			$('.search-detail-box .select-vehicle').addClass('nowActive');
			$('.search-detail-box .select-vehicle .heading').removeClass('open');
		});
		
		$('.store-finder-detail .find-form input').attr("placeholder", "Search again");
		$('header .right-col li.fourth-col').click(function(){
			$('header .right-col li.first-col .drop-arrow').hide();
			$('header .right-col li.first-col .country-list').hide();
			$('.main-header .mobile-menu').removeClass('active');
			$('header .nav-col').hide();
			$(this).children('.drop-arrow').slideToggle(200);
			$(this).children('.cart-dropdown').slideToggle(200);
		});
		$('header .right-col li.first-col').click(function(){
			$('header .right-col li.fourth-col .drop-arrow').hide();
			$('header .right-col li.fourth-col .cart-dropdown').hide();
			$('header .nav-col').hide();
		});
		//body close navigation
		$(document).click(function(e){
			if(e.target.class != 'slide--reset' && !$('.slide--reset').find(e.target).length){
				$('.slide--reset .mobile-menu').removeClass('active');
				$(".nav-col").hide();
			}
		});
		//Mobile Footer
		$('footer h3').click(function(event){
			if($(this).hasClass("open")){
				$('footer ul').slideUp(400);
				$('.choose-country .drop-arrow').slideUp(400);
				$('footer h3').removeClass('open');
				$('footer .col-md-2').removeClass('active');
				event.preventDefault();
			}else{
				$('footer ul').slideUp(400);
				$('.choose-country .drop-arrow').slideUp(400);
				$('footer h3').removeClass('open');
				$('footer .col-md-2').removeClass('active');
				$(this).parent('.col-md-2').addClass('active');
				$(this).addClass('open');
				$(this).parent('div').children('ul').slideDown(400);
			}
		});
		//Mobile Search Bar
		$('.mobile-search').click(function(){
			$('header').css('min-height','47px');
			$('.main-header .right-col, header .nav-col').hide();
			$('.main-header .mobile-menu').removeClass('active');
			$('header .left-grid, .search-from').fadeIn(400);
		});
		$('.search-from .close-btn').click(function(){
			$('.search-from, header .left-grid').hide();
			$('.main-header .right-col').show();
			$('header').css('min-height','unset');
		});
		//Mobile Navigation
		$('.mobile-menu').click(function(){
			$('header .right-col li.fourth-col .drop-arrow').hide();
			$('header .right-col li.fourth-col .cart-dropdown').hide();
			$(this).toggleClass('active');
			$('.nav-col').slideToggle(400);
			if($(this).hasClass('active')){
			}else{
				$('.nav-col .outer-ul li').show();
				$('.nav-col .sub-nav, .nav-col .inner-nav').hide();
				$('.nav-col .sub-li').removeClass('active').show();
			}
		});
		$('.nav-col .tier1nav').click(function(event){
			if(event.target.nodeName.toUpperCase() == 'A' && $(event.target).parent('.back-link').length==0){
				window.location.href = $(event.target).attr('href');
				return true;
			}else{
			 $(this).addClass('main');
			 $('.nav-col .country-selection, .nav-col .tier1nav:not(.main)').hide();
			 $(this).children('.sub-nav').fadeIn(400);
			}
			$(this).children('.out-list').find('li').show();
		});
		$(document).on('click','.nav-col .sub-li',function(){
			$(this).addClass('active');
			$('.nav-col .country-selection, .nav-col .tier1nav:not(.main)').hide();
			$(".left-sub-nav .sub-li").not(this).removeClass('active').hide();
			$(this).children('.inner-nav').fadeIn(400);
		});
		$(document).on('click','.nav-col .back-link',function(event){
			if($(this).closest('li').parent('ul.outer-ul').length>0){
				$('.nav-col .country-selection, .nav-col .tier1nav').removeClass('main').show();
			}
			$(this).parent('.out-list').fadeOut(400);
			$(this).parents('li.active').show();
			event.stopPropagation();
		});
		//Product Popup
		$('#product-popup').modal('show');

		//Product Listing
		$(document).on('click', '.product-listing-col .quick-btn.desktop', function(){
			var infodivid = $(this).data('quickinfo');
			$(this).parents('.left-col').children('.quick-info-data').find('.popup-title').replaceWith($('#'+infodivid));
			$(this).parents('.left-col').append('<div class="overlay-bg"></div>');
			$(this).parents('.left-col').children('.quick-info-data').fadeIn(400);
		});
		$(document).on('click', '.product-listing-col .quick-info-data .close-data', function(){
			$('.product-listing-col .quick-btn.desktop').removeClass('active');
			$(this).parent('.product-listing-col').children('.quick-btn').removeClass('active');
			$(this).parent('.quick-info-data').fadeOut(400);
			$(this).parent('.quick-info-data').next('.overlay-bg').fadeOut(400,function(){
				$(this).remove();
			});
		});
		$('.mobile-brand .bxslider').bxSlider({
			mode: 'vertical',
			auto: false,
			pager: false,
			slideMargin: 5,
			minSlides: 3,
			maxSlides: 3
		});
		$(document).on('click', '.mobile-brand-right .viewAllBrands', function(){
			$('.custom-overlay').fadeIn(400);
			$(this).parents('.productbrandslisting').children('.right-col').fadeIn(400);
		});
		$(document).on('click', '.product-listing-col .right-col .close', function(){
			$('.custom-overlay').fadeOut(400);
			$(this).parent('.right-col').fadeOut(400);
		});
		//Product Detail
		$('.cusotmer-bought-list .bxslider').bxSlider({
			mode: 'horizontal',
			auto: true,
			pager: false,
			infiniteLoop: false,
			hideControlOnEnd: true,
			useCSS: false
		});
		$('.stock-availability-data .select-store-btn').click(function(){
			$(this).next('.store-btn-popup').slideDown(400);
		}, function(){
			$(this).next('.store-btn-popup').slideUp(400);
		});
		$('.cart-btn-outer').click(function(e){
			$(this).children('.cart-btn-dropdown').slideToggle(400);
			e.stopPropagation();
		});
		$(document).click(function(e){
			if(e.target.class != 'cart-btn-dropdown' && !$('.cart-btn-dropdown').find(e.target).length){
				$(".cart-btn-dropdown").hide();
			}
		});
		//checkout delivery toggle step 3
		/* $(document).on('click','.collapse-arrow.mobile',function(){
			$(this).toggleClass('active');
			if($(this).hasClass('active')){
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'checkout-review-arrow-active.png');
			}else{
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'checkout-review-arrow.png');
			}
			$('.toggle-view').slideToggle(400);
		}); */
		$('.checkout.delivery-option .table-data .toggle-option').click(function(){
			$(this).children('img').attr('src',ECP.getStatic()+'/'+'open-arrow.png');
			$(this).parent('.row-inner').children('.sub-list').slideDown(400);
		});
		$('.checkout .delivery-method .box').click(function(){
			if($(this).hasClass('disable')){
				$('.checkout .delivery-method .box.disable').show();
			}else{
				$('.checkout .delivery-method-toggle').show();
				$('.checkout .delivery-method .box').removeClass('active');
				$('.checkout .delivery-method .box:not(.active)').hide();
				$(this).not('.disable').toggleClass('active').show();
			}
			$(document).on('click','.checkout .delivery-method-toggle',function(){
				$(this).hide();
				$('#order-place-btn').removeClass('reserve-btn').html('Place Order');
				$('#shippingform .enter-text').show();
			});
		});
		$('.checkout .delivery-method-toggle').click(function(){
			$('.checkout .delivery-method .box').fadeIn(400);
			$('.checkout.contact-detail .profile-info li:nth-child(3)').show();
			$('.checkout .delivery-method .box').removeClass('active');
			$('#clickncollectdetails, #homedeliveryshipping').css('display','none');
			$('#hdsteps3').show();
		});
		$(document).on('click','.checkout .delivery-method .box.click-collect',function(){
			$('#order-place-btn').addClass('reserve-btn').html('Reserve');
		});
		$(document).on('click','.checkout .delivery-method .loc-delivery',function(){
			$('#shippingform .enter-text').hide();
		});
		$('.contact-info-form label, .sign-form label').each(function(){
			var getVal = $(this).text();
			$(this).next('input').attr('placeholder', getVal);
			$(this).closest('fieldset').find('select option:first').text(getVal);
		});
		$('#shippingform label, #billingform label').each(function(){
			var getText = $(this).text();
			$(this).next('input').attr('placeholder', getText);
		});
		//SEO content effect
		$('.seo-content .show-more').click(function(){
			$(this).hide();
			$('.seo-content span').addClass('expand');
			$('.seo-content .show-less').css('display','inline');
		});
		$('.seo-content .show-less').click(function(){
			$(this).hide();
			$('.seo-content span').removeClass('expand');
			$('.seo-content .show-more').fadeIn(400);
		});
		//Country Dropdown Navigation
		$('.country-selection').click(function(){
			$(this).children('.country-dropdown').slideToggle(400);
		});
		//VRM error popup
		var dataHtml = '<a class="error-close-btn" href="javascript:void(0);" title="Close">x</a>'
		if($('.content-section .product-listing-col').find('div.error-banner').length > 0 ){
			$('.search-detail-box').addClass('search-popup').append(dataHtml);
			$('.custom-overlay').fadeIn(400);
		}else{
			$('.search-detail-box').removeClass('search-popup');
			$('.search-detail-box').find('.error-close-btn').remove();
			$('.custom-overlay').hide();
		}
		$('.search-detail-box .error-close-btn').click(function(){
			$('.custom-overlay').hide();
			$('.search-detail-box').removeClass('search-popup')
			$('.search-detail-box').find('.error-close-btn').remove();
		});
		$('.custom-overlay').click(function(){
			$(this).hide();
			$('.search-detail-box').removeClass('search-popup')
			$('.search-detail-box').find('.error-close-btn').remove();
			$('.product-listing-col .right-col').hide();
		});
		$(window).scroll(function(){
			if($(window).scrollTop() > 600){
				$('.scrollToTop.float').fadeIn(400);
			}else{
				$('.scrollToTop.float').fadeOut(400);
			}
		});
		//zoom class add
		$('.clearance-listing-col .clearance-list figure').addClass('zoom').attr('data-target','#zoom-image');
		//home page latest offers
		$('.latest-product-offers .bxslider').bxSlider({
			mode: 'horizontal',
			auto: false,
			pager: false,
			minSlides: 1,
			maxSlides: 1,
			slideWidth: 270,
			slideMargin: 0,
			infiniteLoop: false,
			hideControlOnEnd: false
		});
		//Category toggle section
		$('.tier-one-category .tier-listing .mobile-display').on('click', function(){
			if($(this).hasClass('active')){
				$('.tier-one-category .tier-listing .mobile-display').removeClass('active');
				$('.tier-one-category .tier-listing .mobile-expand').slideUp(400);
			}else{
				$('.tier-one-category .tier-listing .mobile-display').removeClass('active');
				$('.tier-one-category .tier-listing .mobile-expand').slideUp(400);
				$(this).toggleClass('active');
				$(this).next('.mobile-expand').slideToggle(400);
			}
		});
		//Basket Page placeholder
		$('.shopping-cart-col #promotionalCode').attr('placeholder','Enter promo code');
	}
	else if(getWidth >= 1024){
		if($('.checkout-right-col').length){
			var didScroll1;
			var lastScrollTop1 = 0;
			var delta1 = 1;
			var headerHeight1 = $('header').outerHeight();
			var getRight = ($(window).width() - ($('.checkout-form').offset().left + $('.checkout-form').outerWidth()));
			$(window).scroll(function(event){
				didScroll1 = true;
			});
			setInterval(function(){
				if(didScroll1){
					hasScrolled1();
					didScroll1 = false;
				}
			}, 100);
			function hasScrolled1(){
			var windowScroll1 = $(window).scrollTop();
				var st = $(this).scrollTop();
				if(Math.abs(lastScrollTop1 - st) <= delta1)
				return;
				if(st > lastScrollTop1 && st > headerHeight1){
					$('.checkout-right-col').css({'top':'20px', 'position':'fixed', 'right':getRight, 'width':'345px'});
				}else if(st < headerHeight1){
					$('.checkout-right-col').css({'top':'0', 'position':'static'});
				}else{
					if(st + $(window).height() < $(document).height()){
						$('.checkout-right-col').css({'top':'150px', 'position':'fixed', 'right':getRight, 'width':'345px'});
					}
				}
				if(windowScroll1 >= $('.checkout-left-col').height()-250){
					$('.checkout-right-col').css({'position':'absolute', 'top':'auto', 'bottom':'20px', 'right':'0'});
				}									
				lastScrollTop1 = st;
			}
		}
		var timeoutId;
		$('header .nav-col nav .sub-nav').hover(function(){
			if(!timeoutId){
				timeoutId = window.setTimeout(function(){
					timeoutId = null;
					$(".search-detail-box .vehicle-form .field").hide();
				}, 200);
			}
		},function(){
			if(timeoutId){
				window.clearTimeout(timeoutId);
				timeoutId = null;
			}else{
				$(".search-detail-box .vehicle-form .field").show();
			}
		});
		//Product Detail Slider
		$('.cusotmer-bought-list .bxslider').bxSlider({
			mode: 'horizontal',
			auto: true,
			pager: false,
			minSlides: 3,
			maxSlides: 3,
			slideWidth: 320,
			slideMargin: 15,
			infiniteLoop: false,
			hideControlOnEnd: true
		});
		//IE9 placeholder
		var getDefault = $('input').attr('placeholder');
		if($('HTML.lt-ie10').length && getDefault){
			$('input').each(function(){
				var getText = $(this).attr('placeholder');
				$(this).attr('value',getText);
				$(this).focus(function(){
					$(this).attr('value',' ');
				}).blur(function(){
					$(this).attr('value',getText);
				});
			});
		}
		$('.checkout .delivery-method .box').click(function(){
			if(!$(this).hasClass('disable')){
				$('.checkout .delivery-method .box').removeClass('active');
			}
			$(this).not('.disable').toggleClass('active');
		});
	}
	else{
		$('.stock-availability-data .select-store-btn').hover(function(){
			$(this).next('.store-btn-popup').slideDown(400);
		}, function(){
			$(this).next('.store-btn-popup').slideUp(400);
		});
		//Checkout option
		/* $(document).on('click','.collapse-arrow',function(){
			$(this).toggleClass('active');
			if($(this).hasClass('active')){
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'open-arrow.png');
			}else{
				$(this).children('img').attr('src',ECP.getStatic()+'/'+'close-arrow.png');
			}
			$('.toggle-view').slideToggle(400);
		}); */
		$('.checkout .delivery-method .box').click(function(){
			if(!$(this).hasClass('disable')){
				$('.checkout .delivery-method .box').removeClass('active');
			}
			$(this).not('.disable').toggleClass('active');
		});
	}

	//detectOrientation
	detectOrientation();
	window.onorientationchange = detectOrientation;
	function detectOrientation(){
		if(typeof window.onorientationchange != 'undefined'){
			 if(orientation == 0 ){
				if($('.zoom').length > 0){
					$('.zoom').trigger('zoom.destroy');
				}
				$('.product-listing-col .thumb-box figure, .product-detail-inner .product-thumb figure').removeClass('zoom');
				$('.product-listing-col .thumb-box figure .zoomImg, .product-detail-inner .product-thumb figure .zoomImg').hide();
				$('header .right-col a.desktop').css('display','none');
				$('header .right-col a.mobile').css('display','block');
			 }
			else if(orientation == 90){
				if($('.zoom').length > 0){
					$('.zoom').trigger('zoom.destroy');
				}
				$('.product-listing-col .thumb-box figure, .product-detail-inner .product-thumb figure').removeClass('zoom');
				$('.product-listing-col .thumb-box figure .zoomImg, .product-detail-inner .product-thumb figure .zoomImg').hide();
				$('header .right-col a.desktop').css('display','none');
				$('header .right-col a.mobile').css('display','block');
			}
			else if(orientation == -90){
				if($('.zoom').length > 0){
					$('.zoom').trigger('zoom.destroy');
				}
				$('.product-listing-col .thumb-box figure, .product-detail-inner .product-thumb figure').removeClass('zoom');
				$('.product-listing-col .thumb-box figure .zoomImg, .product-detail-inner .product-thumb figure .zoomImg').hide();
				$('header .right-col a.desktop').css('display','none');
				$('header .right-col a.mobile').css('display','block');
			}
			else if(orientation == 180){
				if($('.zoom').length > 0){
					$('.zoom').trigger('zoom.destroy');
				}
				$('.product-listing-col .thumb-box figure, .product-detail-inner .product-thumb figure').removeClass('zoom');
				$('.product-listing-col .thumb-box figure .zoomImg, .product-detail-inner .product-thumb figure .zoomImg').hide();
				$('header .right-col a.desktop').css('display','none');
				$('header .right-col a.mobile').css('display','block');
			}
		}
	}
	$('.addtocartbtn').click(function(){
		$(this).addClass('wait');
	});
});
// Brands Slider Code
if($('.brand-slider').length){
	var sliderActive = false;
	var slider;
	function createSlider(noofslides){
		if(slider==null){
			slider = $('.brand-slider .bxslider').bxSlider({
				pager: false,
				controls: false,
				auto: true,
				minSlides: noofslides,
				maxSlides: noofslides,
				slideWidth: 130,
				slideMargin: 10,
				swipeThreshold: 0
			});
		}else{
			slider.reloadSlider({
				pager: false,
				controls: false,
				auto: true,
				minSlides: noofslides,
				maxSlides: noofslides,
				slideWidth: 130,
				slideMargin: 10,
				swipeThreshold: 0
			});
		}
		return true;
	}
	$(document).ready(function(){
		if(window.innerWidth >= 768){
		
		}else if(window.innerWidth >= 414 && window.innerWidth <= 767){
			createSlider(3);
		}else if(window.innerWidth <= 413){
			createSlider(2);	
		}
		$(window).resize(function(){
			if(window.innerWidth >= 768){
				if(slider!=null){
					slider.destroySlider();
					slider = null;
				}
			}else if(window.innerWidth >= 414 && window.innerWidth <= 767){
				createSlider(3);
			}
			else if(window.innerWidth <= 413){
				createSlider(2);
			}
		});
	});
}
if($('#bx-pager').length){
	$('.product-thumb .bxslider').bxSlider({
		mode: 'horizontal',
		auto: false,
		pagerCustom: '#bx-pager',
		pagerSelector: 'jQuery selector',
		useCSS: false,
		controls: false,
		maxSlides: 1,
		minSlides: 1
	});
	var mySettings = { slideWidth: 70,
					   useCSS: false,
					   pager: false,
					   infiniteLoop: false,
					   autoStart: false,
					   maxSlides: 3,
					   moveSlides: 1,
					   slideMargin: 10
					};
	var maxSlides= 3;
	var pagerr;
	var wiidth = $(window).innerWidth();
	$(document).ready(function(){
		var alterSettings = mySettings;
		if(wiidth <= 480){
			alterSettings.maxSlides = 2;
		}else if(wiidth > 481 && wiidth <= 767){
			alterSettings.maxSlides = 2;
		}else{
			alterSettings.maxSlides = 3;
		}
		pagerr = $('.product-thumb #bx-pager').bxSlider(alterSettings);
		$(window).resize(function(){
			$(window).on("orientationchange",function(){
				var alterSettings = mySettings;
				if(wiidth <= 480){
					alterSettings.maxSlides = 2;
				}else if(wiidth > 481 && wiidth <= 767){
					alterSettings.maxSlides = 2;
				}else{
					alterSettings.maxSlides = 3;
				}
				pagerr.destroySlider();
				setTimeout(function(){
					pagerr.reloadSlider(alterSettings); 
				}, 100);
			});
		});
	});
}
//Detecting IE browser
$(document).ready(function(){
	var myNav = navigator.userAgent.toLowerCase();
	var msie = (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
	var ua = navigator.userAgent.toString().toLowerCase();
	var match = /(trident)(?:.*rv:([\w.]+))?/.exec(ua) ||/(msie) ([\w.]+)/.exec(ua)||['',null,-1];
	var rv = match[2];
	if (typeof msie == 'number' || rv == '12.0' || rv == '11.0' || rv == '10.0' || rv == '9.0' || rv == '8.0'){
		$('html').addClass('ieView');
	}
});
$(window).resize(function(){
	var getWidth = $(window).width();
	if(getWidth <= 767){
		//zoom class add
		$('.clearance-listing-col .clearance-list figure').addClass('zoom').attr('data-target','#zoom-image');
	}else{
		$('.clearance-listing-col .clearance-list figure').removeClass('zoom').removeAttr('data-target','#zoom-image');
	}
});