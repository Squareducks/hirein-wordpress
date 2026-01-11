(function($){
	var animation = false;
	var getWidth  = $(window).width();
	
	$(document).ajaxSend(function( event, jqxhr, settings ) {
		ECP.showloader();
	});	
	$(document ).ajaxComplete(function( event, xhr, settings ) {
		ECP.loaderClose();
		ECP.addCart();
	});	
	$(document ).ajaxError(function( event, xhr, settings ) {		
		ECP.loaderClose();
	});
	
	// Scroll to top on click
	$('#scrollToTop').on('click', function(){
	    $("html, body").animate({ scrollTop: 0 }, 600);
	    return false;
	 });
	
	$('.modal').on('hidden.bs.modal', function () {
	    $('.addtocartbtn').removeClass('wait');
	});
	
	$(document).on('change','select#makeSelection',function(){
		$(this).parents('form').find('select').removeAttr('disabled');
		$('select#engineSelection,select#yearSelection,select#fuelSelection').attr('disabled','disabled');
		
		var make = $(this).val();
		var modelsets = jQuery.parseJSON($('input[name=jsonmodels]').val());
		var option = $('#modelSelection').find('option').get(0);
		 $('select#modelSelection').find('option').remove();
		 $('select#modelSelection').append(option);
		 option = $('#engineSelection').find('option').get(0);
		 $('select#engineSelection').find('option').remove();
		 $('select#engineSelection').append(option);
		 option = $('#yearSelection').find('option').get(0);
		 $('select#yearSelection').find('option').remove();
		 $('select#yearSelection').append(option);
		 option = $('#fuelSelection').find('option').get(0);
		 $('select#fuelSelection').find('option').remove();
		 $('select#fuelSelection').append(option);
		 $.each(modelsets, function(i, modelset) {		 
			 if(modelset.make == make){
				 	$('select#modelSelection').append('<option  value="'+modelset.model+'">'+modelset.model+'</option>');
				}
		    });	
	});
	
	// For less content hide view more link in tier pages
	if($('.tierseocontent > span').length > 0){
		var contentEl 		= $('.tierseocontent > span');
		if (contentEl[0].offsetHeight < contentEl[0].scrollHeight || contentEl[0].offsetWidth < contentEl[0].scrollWidth) {
			$('.tierseocontent > .view-more').show();
		}
	}
	
	$(document).on('change','select#modelSelection',function(){
		$(this).parents('form').find('select').removeAttr('disabled');
		$('select#yearSelection,select#fuelSelection').attr('disabled','disabled');
			var model = $(this).val();
			var make = $('select#makeSelection').val();
			var engineSets = jQuery.parseJSON($('#jsonengines').val());
			var option = $('#engineSelection').find('option').get(0);
			$('select#engineSelection').find('option').remove();
			$('select#engineSelection').append(option);
			option = $('#yearSelection').find('option').get(0);
			 $('select#yearSelection').find('option').remove();
			 $('select#yearSelection').append(option);
			 option = $('#fuelSelection').find('option').get(0);
			 $('select#fuelSelection').find('option').remove();
			 $('select#fuelSelection').append(option);
			$.each(engineSets, function(i,engineset){				
				if(engineset.make == make && engineset.model == model){
					if(engineset.engine != "Not"){
						$('select#engineSelection').append('<option value="'+engineset.engine+'">'+engineset.engine+'</option ');
					}
						
				}
			});
	});
	
	$(document).on('change','select#engineSelection',function(){
		$(this).parents('form').find('select').removeAttr('disabled');
		$('select#fuelSelection').attr('disabled','disabled');
		var engine  = $(this).val();
		var model = $('select#modelSelection').val();
		var make = $('select#makeSelection').val();
		var yearSets = jQuery.parseJSON($('#jsonyears').val());
		var option = $('#yearSelection').find('option').get(0);
		$('select#yearSelection').find('option').remove();
		$('select#yearSelection').append(option);
		option = $('#fuelSelection').find('option').get(0);
		 $('select#fuelSelection').find('option').remove();
		 $('select#fuelSelection').append(option);
		$.each(yearSets, function(i,yearSet){				
			if(yearSet.make == make && yearSet.model == model && yearSet.engine == engine){
					$('select#yearSelection').append('<option value="'+yearSet.year+'">'+yearSet.year+'</option ');
			}
		});
	});
	
	$(document).on('change','select#yearSelection',function(){
		var engine  = $(this).val();
		var model = $('select#modelSelection').val();
		var make = $('select#makeSelection').val();
		var engine = $('select#engineSelection').val();
		var year = $('select#yearSelection').val();
		var fuelSets = jQuery.parseJSON($('#jsonfuels').val());
		var option = $('#fuelSelection').find('option').get(0);
		$('select#fuelSelection').find('option').remove();
		$('select#fuelSelection').append(option);
		$.each(fuelSets, function(i,fuelSet){				
			if(fuelSet.make == make && fuelSet.model == model && fuelSet.engine == engine  && fuelSet.year == year){
				$('select#fuelSelection').append('<option value="'+fuelSet.fuel+'">'+fuelSet.fuel+'</option ');
				$('select#fuelSelection').removeAttr('disabled');
			}
		});
	});
	
	$(document).on('submit','form[name=partvehicleselection]',function(){
		
	});
	
	ECP.addCart = function(){
		 /* $(".cart-btn-outer").hoverIntent({
			over: function(){
				$(this).children('.cart-btn-dropdown').animate({opacity:1, height:'toggle'}, 300);
			},
			timeout: 200, // number = milliseconds delay before onMouseOut
			out: function(){
				$(this).children('.cart-btn-dropdown').animate({opacity:0, height:'toggle'}, 300);
			}
		}); */
		if(getWidth >= 768){
			$(".cart-btn-outer").on('click',function(e){
				//$(this).children('.cart-btn-dropdown').animate({opacity:1, height:'toggle'}, 300);
				$(this).children('.cart-btn-dropdown').slideToggle(400);
				e.stopPropagation();
			});
			$(document).click(function(e){
				if(e.target.class != 'cart-btn-dropdown' && !$('.cart-btn-dropdown').find(e.target).length){
					$(".cart-btn-dropdown").hide();
				}
			});
		}
	}
	

	
	/* Product Listing Page */
	
	// For mobiles
	if(getWidth < 768){
		// To show popup of Error messages
		if($('.info-box').length > 0){
			var htmlObj = $("<div>"+$('.info-box').html()+"</div>");
			htmlObj.find('img').addClass('warning-icon');
			ECP.alert('',htmlObj.html());
		}
		
		// Mobile Reg input tap clear all selection
		if($('.vrmInp').prop("disabled") == true){
			$('.vrmInp').closest("span").on('click', function(){
				$('a.clearselection').trigger('click');
			});
		}
	}

	$(document).on('click','.product-listing-col .right-col .brand-list li',function(){
	  if(animation){
		  return true;
	  }
	//  animation = true;
	  var currentEle  = $(this);
	  var productclass  = '.'+ currentEle.data('productdetailclass');
	  currentEle.parents('.productbrandslisting').find('.product_brand_detail').not(productclass).slideUp(400);
	  
	  $(productclass).slideDown(400,function(){
	   animation = false;
	  });
	  currentEle.parent('.brand-list').children('li').removeClass('active');
	  currentEle.addClass('active');
	  var getWidth = $(window).width();
	});
	
	// Maxlength Fix for Android Devices
	if(getWidth < 768){
		$("input[type='text']").on("keydown", function(e) {
	        if(e.keyCode != 8) {
	            maxlength = $(this).attr('maxlength');
	            if(this.value.length >= maxlength ) {
	                var curIndex = $(this).attr('tabindex');
	                $('[tabindex=' + curIndex + ']').focus();
	                return false;
	            }
	        }
	    });
	}
	
	$('.numeric').on('keyup', function(e) {
	  $(this).val($(this).val().replace(/[^0-9]/g, ''));
	});
	$('.prdQty').on('blur', function(){
		if($(this).val() < 1){
			$(this).val(1);
		}
	});
	
	
	
	/* Product Detail Page */
	
	$('#zoom-image').on('show.bs.modal', function (e) {
		$(this).find('img').attr('src', '');
		var src = $(e.relatedTarget).find('img').attr('src');
		$(this).find('img').attr('src', src);
	});	
	$('#referFriend').on('show.bs.modal', function () {
		  $('.success').html('');
		  $('#referForm .error').html('');
		  $('#referFriend input').val('');
		  $('#referFriend .referFormCont').show();
	})
	
	$('#referForm').submit(function(){
		var err 		= false;
		$(this).find('.error').html('');
		$(this).find('.error').show();
		$(this).find('.required').each(function(){
			var val 	= $.trim($(this).val());
			if(val == ''){
				$(this).parent('fieldset').find('.error').html('This field is required.');
				err 	= true;
			}
		});
		if(err == false){
			if(!validateEmail($.trim($('#referEmail').val()))){
				$('#referEmail').parent('fieldset').find('.error').html('Please enter valid email address.');
				err 		= true;
			}
			if(!validateMultipleEmail($('#referfriendEmail').val())){
				$('#referfriendEmail').parent('fieldset').find('.error').html('Please enter valid email address.');
				err 		= true;
			}
		}
		if(err == false){
			var formData = $(this).serializeArray();
			formData.push({name:'link', value: window.location.href});
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase() + "/users/referFriend", 
			      data: formData,
			      success: function(data) {	
			    	  if(data.hasOwnProperty('errors')){
			    		  $.each(data.errors, function(index, value){
			    			  if(value == 'emptyfield'){
			    				  $('#refer' + capitalizeFirstLetter(index) + 'Err').html(messages.referFriend.empty);
			    			  }
			    			  else if(value == 'invalidemail' || value == 'callback'){
			    				  $('#refer' + capitalizeFirstLetter(index) + 'Err').html(messages.referFriend.invalidEmail);
			    			  }
			    		  });
			    	  }
			    	  else if(data.hasOwnProperty('success') && data.success == 1){
			    		 $('#referFriend').modal('hide');
			    		 var msg 	= '<div class="popNotificationMessage success">'+ messages.referFriend.success +'</div>';
			    		 ECP.alert('', msg);
			    	  }
			      }
		    });
		}
		return false;
	});
	
	
	/*$('[data-toggle="tooltip"]').tooltip()
    $(".tip-top").tooltip({placement : 'top'});
    $(".tip-right").tooltip({placement : 'right'});
    $(".tip-bottom").tooltip({placement : 'bottom'});
    $(".tip-left").tooltip({ placement : 'left'});*/
    
    $('.jtooltip:not(.disable)').jBox('Tooltip');
        //if (typeof settings != 'undefined') {
         ECP.setConfig(settings);
        //}
	
	ECP.AdsLookup.loadMakers(function(data){
		var make = $('select[name=make]');
		var option = $(make).find('option').get(0);
		$(make).find('option').remove();
		make.append(option);
		$.each(data['manufacturers'],function(index,maker){
			make.append('<option value="'+maker.Id+'">' + maker.Maker + '</option>');
		});
		$("select[name=model],select[name=year],select[name=engine],select[name=fuel]").attr('disabled',true);
	});
	
	$('select[name=make]').on('change',function(){
		ECP.AdsLookup.__data.makestr = $(this).find('option:selected').text();
		$('select[name=model] option').not('option:first').remove();
		$('select[name=year] option').not('option:first').remove();
		$('select[name=engine] option').not('option:first').remove();
		$('select[name=fuel] option').not('option:first').remove();
		ECP.AdsLookup.loadModel(this.value,function(data){
			var model = $('select[name=model]');
			var option = $(model).find('option').get(0);
			model.find('option').remove();
			model.append(option);
			$.each(data['models'],function(index,modelObj){
				model.append('<option value="'+modelObj.Id+'">' + modelObj.Model + '</option>');
			});
			$("select[name=year],select[name=engine],select[name=fuel]").attr('disabled',true);
			//$("select[name=model]").val('');
			$("select[name=model]").removeAttr('disabled');
		});
	});
	
	$('select[name=model]').on('change',function(){
		ECP.AdsLookup.__data.modelstr = $(this).find('option:selected').text();
		var year = $('select[name=year]');
		var option = $(year).find('option').get(0);
		$('select[name=year] option').not('option:first').remove();
		$('select[name=engine] option').not('option:first').remove();
		$('select[name=fuel] option').not('option:first').remove();
		ECP.AdsLookup.loadYear(this.value,function(data){
			
			year.find('option').remove();
			year.append(option);
			$.each(data['years'],function(index,yearObj){
				year.append('<option value="'+yearObj.Id+'">' + yearObj.Year + '</option>');
			});
			$("select[name=year],select[name=engine],select[name=fuel]").attr('disabled',true);
			//$("select[name=year]").val('');
			$("select[name=year]").removeAttr('disabled');
		});
	});
	
	$('select[name=year]').on('change',function(){
		var engine = $('select[name=engine]');
		var option = $(engine).find('option').get(0);
		$('select[name=engine] option').not('option:first').remove();
		$('select[name=fuel] option').not('option:first').remove();
		ECP.AdsLookup.loadEngine(this.value,function(data){			
			engine.find('option').remove();
			engine.append(option);
			$.each(data['engines'],function(index,engineObj){
				engine.append('<option value="'+engineObj.Id+'">' + engineObj.Engine + '</option>');
			});
			$("select[name=fuel]").attr('disabled',true);
			//$("select[name=engine]").val('');
			$("select[name=engine]").removeAttr('disabled');
		});
	});
	
	$('select[name=engine]').on('change',function(){
		var fuel = $('select[name=fuel]');
		var option = $(fuel).find('option').get(0);
		$('select[name=fuel] option').not('option:first').remove();
		ECP.AdsLookup.loadFuel(this.value,function(data){
			fuel.find('option').remove();
			fuel.append(option);
			$.each(data['fules'],function(index,fuelObj){
				fuel.append('<option value="'+fuelObj.Fuel+'">' + fuelObj.Fuel + '</option>');
			});
			//$("select[name=fuel]").val('');
			$("select[name=fuel]").removeAttr('disabled');
		});
	});
	
	$('select[name=width]').on('change',function(){
		var width = $(this).val();
		var profile = $('select[name=profile]');
		var option = $(profile).find('option').get(0);
		if(width!=''){
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+"/catalog/categories/getTyreProfile", 
			      data: {'width': width},
			      dataType: "json",
			      success: function(data) {	
			    	  profile.find('option').remove();
		    		  profile.append(option);
			    	  $.each( data.profiles, function( index, profileObj ) {
			    		  profile.append('<option value="'+profileObj.profile+'">' + profileObj.profile + '</option>');
			    	  });  	  
			      }
		    });
		}
		$("select[name=profile]").removeAttr('disabled');
	});
	
	$('select[name=profile]').on('change',function(){
		var profile = $(this).val();
		var width = $('select[name=width]').val();
		var tyresize = $('select[name=tyresize]');
		var option = $(tyresize).find('option').get(0);
		if(width!=''){
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+"/catalog/categories/getTyreSizes", 
			      data: {'width': width, 'profile': profile},
			      dataType: "json",
			      success: function(data) {	
			    	  tyresize.find('option').remove();
			    	  tyresize.append(option);
			    	  $.each( data.tyresizes, function( index, tyresizeObj ) {
			    		  tyresize.append('<option value="'+tyresizeObj.rim+'">' + tyresizeObj.rim + '</option>');
			    	  });  	  
			      }
		    });
		}
		$("select[name=tyresize]").removeAttr('disabled');
	});
	
	$('.vehicle-form').on('submit',function(){
		if(window.settings.ads.enabled == 0){
			ECP.alert('', window.messages.modules.error.ads);
			return false;
		}
		ECP.AdsLookup.__data.fuel = $('select[name=fuel]').val();
		if(ECP.AdsLookup.__data.fuel == ''){
			ECP.alert('','Please select all the required fields.');
		}else{
			if($(this).hasClass('portraitform')){
				global 	= false;
				$('.portrait').hide();
				$('.loading-screen').show();
			} else{
				global 	= true;
			}
			ECP.AdsLookup.getCompoents(function(data){
				if(data.result.success==1){
					var strURL = window.location.href;
				
					if(parseInt(strURL.indexOf("engine-oils-fluids")) > 0){
						window.location.href = "/engineoil";
						return true;
					}
					
					if(parseInt(strURL.indexOf("battery")) > 0){
						window.location.href = "/car-battery";
						return true;
					}
					var currentUrl 		= window.location.href.split('?')[0];
					if(currentUrl == window.settings.docroot+'/' || currentUrl == window.settings.docroot){
						window.location.href = window.settings.vrm.redirecturl;
					} else{
						window.location.href = window.location.href;
					}
				}else{
					$('.loading-screen').hide();
					$('.portrait').show();
					ECP.alert('','Invalid REG.');
				}
			}, global);
		}
		return false;
	});
	
	$('.search-selection-filter form').on('submit',function(){
		if(window.settings.ads.enabled == 0){
			ECP.alert('', window.messages.modules.error.ads);
			return false;
		}
		ECP.AdsLookup.__data.make = $('select[name=makeSelection]').val();
		ECP.AdsLookup.__data.fuel = $('select[name=fuelSelection]').val();
		ECP.AdsLookup.__data.engine = $('select[name=engineSelection]').val();
		ECP.AdsLookup.__data.year = $('select[name=yearSelection]').val();
		ECP.AdsLookup.__data.model = $('select[name=modelSelection]').val();
		//alert(ECP.AdsLookup.__data.fuel)
		if(typeof ECP.AdsLookup.__data.fuel == 'undefined' || ECP.AdsLookup.__data.fuel == ''){
			ECP.alert('','Please select all the required fields.');
		}else{
			if($(this).hasClass('portraitform')){
				global 	= false;
				$('.portrait').hide();
				$('.loading-screen').show();
			} else{
				global 	= true;
			}
			ECP.AdsLookup.getCompoents(function(data){
				if(data.result.success==1){
					if(window.location == window.settings.docroot+'/' || window.location == window.settings.docroot){
						window.location.href = window.settings.vrm.redirecturl;
					} else{
						window.location.href = window.location.href;
					}
				}else{
					$('.loading-screen').hide();
					$('.portrait').show();
					ECP.alert('','Invalid REG.');
				}
			}, global);
		}
		return false;
	});
	
	$('a.clearselection').on('click',function(){
		var href = this.href;
		$.post(href,{},function(data){
			window.location.href = window.location.href;
		});
		return false;
	});
	
	$('#vrmForm').on('submit',function(){
		if(window.settings.vrm.enabled == 0){
			ECP.alert('', window.messages.modules.error.vrm);
			return false;
		}
		if($(this).hasClass('portraitform')){
			global 	= false;
			$('.portrait').hide();
			$('.loading-screen').show();
		} else{
			global 	= true;
		}
		var reg 			= $('#vrmReg').val();
		if(reg == ''){
			ECP.alert('Registration no not given.','Please enter valid REG no.');
			return false;
		}
		ECP.VrmLookup.getDetailByReg(reg,function(data){
			if(data.result.success==1){
				
				var strURL = window.location.href;
				
				if(parseInt(strURL.indexOf("engine-oils-fluids")) > 0){
					window.location.href = "/engineoil";
					return true;
				}
				
				if(parseInt(strURL.indexOf("battery")) > 0){
					window.location.href = "/car-battery";
					return true;
				}
				var currentUrl 		= window.location.href.split('?')[0];
				if(currentUrl == window.settings.docroot+'/' || currentUrl == window.settings.docroot || currentUrl == 'http:'+window.settings.docroot || currentUrl == 'http:'+window.settings.docroot+'/'){
					window.location.href = window.settings.vrm.redirecturl;
				} else{
					window.location.href = window.location.href;
				}
			}else{
				$('.loading-screen').hide();
				$('.portrait').show();
				ECP.alert('Invalid Reg No.','Please enter valid REG no.');
				return false;
			}		
		}, global);
		return false;
	});
	
	//login email error
	/*$(".login-form #email, .checkout .sign-form #emailid").focusout(function(){
		var $this = $(this);
		userEmail = $this.val();
		var $errorDiv = $(".login-form .loginEmailError");
		$errorDiv.hide();
		$(this).removeClass('invalid');
		if(userEmail!=''){
			if (!validateEmail(userEmail)) {
				$(this).removeClass('valid');
				$(this).addClass('invalid');
				$errorDiv.show();
				$errorDiv.text(messages.forgotpassword.invalidemail);
			}else{
				$.ajax({
				      type: "POST",			     
				      url: ECP.getBase()+"/users/login/checkifemailexists", 
				      data: {'email': userEmail},
				      success: function(data) {	
				    	  if(typeof data.form !== 'undefined'){
				    		  if(data.form.success.status==0){
				    			  $errorDiv.show();
					    		  $errorDiv.text(messages.loginHeader.emailerror);
				    			  $this.removeClass('valid');
				    			  $this.addClass('invalid');
					    	  }else if(data.form.success.status==1){
					    		  $this.removeClass('invalid');
					    		  $this.addClass('valid');
					    	  }
				    	  }			    	  
				      }
			    });
			}
		}	
		return false;
	});
	*/
	// register email error
	$(".login-info-form #email").focusout(function(){
		var $this = $(this);
		userEmail = $this.val();
		var $errorDiv = $(".login-info-form .registerEmailError");
		$errorDiv.hide();
		$(this).removeClass('invalid');
		if(userEmail!=''){
			if (!validateEmail(userEmail)) {
				$(this).removeClass('valid');
				$(this).addClass('invalid');				
				$errorDiv.show();
				$errorDiv.text(messages.forgotpassword.invalidemail);
			}else{
				$.ajax({
				      type: "POST",			     
				      url: ECP.getBase()+"/users/login/checkifemailexists", 
				      data: {'email': userEmail},
				      success: function(data) {	
				    	  if(typeof data.form !== 'undefined'){
				    		  if(data.form.success.status==1){
				    			  $errorDiv.show();
					    		  $errorDiv.text(messages.loginHeader.callback);
				    			  $this.removeClass('valid');
				    			  $this.addClass('invalid');
					    	  }else if(data.form.success.status==0){
					    		  $this.removeClass('invalid');
					    		  $this.addClass('valid');
					    	  }
				    	  }			    	  
				      }
			    });
			}
		}	
		return false;
	});
	
	
	//custom codes for popups
	$('#loginSubmitBtn').click(function(){
		userEmail = $('.login-box .login-form .email').val();
		userPassword = $('.login-box .login-form #password').val();
		if (!validateEmail(userEmail) || userPassword=='') {
			$('.login-box .login-form .error').text(messages.loginHeader.invalidemailpassword);
			$('.login-box .login-form .error').show();
		}else{
			$('.login-box .login-form .error').hide();	
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+"/login", 
			      data: {'email': userEmail,'password': userPassword},
			      success: function(data) {	
			    	  if(typeof data.form !== 'undefined'){
			    		  if ( typeof data.form.errors.error.email !== 'undefined' && data.form.errors.error.email == 'invalidemail' ) {
				    		  $('.login-box .login-form .error').show();
				    		  $('.login-box .login-form .error').text(messages.loginHeader.invalidemailpassword);
				    	  }else if(data.form.errors.error.email=='callback'){
				    		  $('.login-box .login-form .error').show();
				    		  $('.login-box .login-form .error').text(messages.loginHeader.emailerror);
				    	  }else if(data.form.errors.error.formError=='mismatch'){
				    		  $('.login-box .login-form .error').show();
				    		  $('.login-box .login-form .error').text(messages.loginHeader.formerror);
				    	  }else if(data.form.success.status==1){
				    		  location.reload();
				    	  }
			    	  }			    	  
			      }
		    });
		}
		return false;
	});
	
	
	$('#forgot_password_popup .okay-btn').click(function(){
		userEmail = $('#forgot_password_popup #email').val();		
		if($('#forgot_password_popup .okay-btn').hasClass( "disable" )){
			return false;
		}
		if($.trim(userEmail)!=''){
			$('#forgot_password_popup .error').hide();
			$('.modal-body .forgotflashMessages').hide();
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+"/forgot-password", 
			      data: {'email': userEmail},
			      beforeSend: function(){
		    	     // Handle the beforeSend event
			    	 $('#forgot_password_popup .okay-btn').addClass('disable');
		    	  },
		    	  complete: function(){
	    		     // Handle the complete event
		    		  $('#forgot_password_popup .okay-btn').removeClass('disable');
	    		  },
			      success: function(data) {			    	 
			    	  if(data.form.errors.error.email=='invalidemail'){
			    		  //if invalid email
			    		  $('#forgot_password_popup .error').text(messages.forgotpassword.invalidemail);
			    		  $('#forgot_password_popup .error').show();
			    	  }else if(data.form.errors.error.email=='callback'){
			    		  //if email not exists
			    		  $('#forgot_password_popup .error').text(messages.forgotpassword.callback);
			    		  $('#forgot_password_popup .error').show();
			    	  }else if(data.form.errors.error.email=='emptyfield'){
			    		  //if empty submit
			    		  $('#forgot_password_popup .error').text(messages.forgotpassword.invalidemail);
			    		  $('#forgot_password_popup .error').show();
			    	  }else if(data.form.success.status==1){
			    		  //if email sent
			    		  $('#forgot_password_popup .error').hide();
			    		  $('.modal-body #forgotflashMessages').show();
			    		  $('#forgot_password_popup #email').val('');
			    	  }
			      }
		    });
		}else{			
			$('#forgot_password_popup .error').text(messages.forgotpassword.invalidemail);
			$('#forgot_password_popup .error').show();
		}
		return false;
	});
	
	$('#change_password_popup .okay-btn').click(function(){
		userPassword = $('#change_password_popup #password').val();
		userCpassword = $('#change_password_popup #cpassword').val();
		var userPasswordLength = userPassword.length;
		var userCpasswordLength = userCpassword.length;
		if(userPasswordLength < 8 && userCpasswordLength < 8) {
			//if noth fields not valid
			$('#change_password_popup #cpasswordError').text(messages.changepassword.minlength);
  		  	$('#change_password_popup #cpasswordError').show();
  		  	$('#change_password_popup #passwordError').text(messages.changepassword.minlength);
		  	$('#change_password_popup #passwordError').show();
  		  	return false;
		}else if(userPasswordLength < 8) {
			//if invalid password
			$('#change_password_popup #cpasswordError').hide();
			$('#change_password_popup #passwordError').text(messages.changepassword.minlength);
  		  	$('#change_password_popup #passwordError').show();
  		  	return false;
		}else if(userCpasswordLength < 8){
			//if invalid password
			$('#change_password_popup #passwordError').hide();
			$('#change_password_popup #cpasswordError').text(messages.changepassword.minlength);
  		  	$('#change_password_popup #cpasswordError').show();
  		  	return false;
		}else if(userPassword != userCpassword) {
			//if password fields not same
			$('#change_password_popup #passwordError').hide();
			$('#change_password_popup #cpasswordError').text(messages.changepassword.notsametofield);
  		  	$('#change_password_popup #cpasswordError').show();
  		  	return false;
		}		
		$('#change_password_popup .error').hide();
		$('.modal-body .changeflashMessages').hide();
		$.ajax({
		      type: "POST",			     
		      url: ECP.getBase()+"/my-account/change-password", 
		      data: {'password': userPassword,'cpassword': userCpassword},
		      success: function(data) {			    	 
		    	  if(data.form.errors.error.password=='emptyfield' || data.form.errors.error.password=='minlength'){
		    		  //if invalid password		  				
		  				$('#change_password_popup #passwordError').text(messages.changepassword.minlength);
		    		  	$('#change_password_popup #passwordError').show();
		    	  }else{
		    		  	$('#change_password_popup #passwordError').hide();
		    	  }
		    	  if(data.form.errors.error.cpassword=='emptyfield' || data.form.errors.error.cpassword=='minlength'){
		    		  //if email not exists
		    		  	$('#change_password_popup #cpasswordError').text(messages.changepassword.minlength);
		    		  	$('#change_password_popup #cpasswordError').show();
		    	  }else{
		    		  	$('#change_password_popup #cpasswordError').hide();
		    	  }
		    	  
		    	  if(data.form.errors.error.cpassword=='notsametofield'){
	    		  	  //if password fields not same
	  					$('#change_password_popup #passwordError').hide();
	  					$('#change_password_popup #cpasswordError').text(messages.changepassword.notsametofield);
	  					$('#change_password_popup #cpasswordError').show();
		    	  }
		    	  
		    	  if(data.form.success.status==1){
		    		  //if email sent
		    		  $('#change_password_popup .error').hide();
		    		  $('.modal-body #changeflashMessages').show();
		    		  $('#change_password_popup .InputTxtBox').val('');		    		  
		    	  }
		      }
	    });
		return false;
	});
	
	$('#forgot_password_popup').keydown(function(event){
	    if(event.keyCode == 13) {
	    	$('#forgot_password_popup .okay-btn').trigger( "click" );
	    	event.preventDefault();
	    	return false;
	    }
	});
	
	$('.login-box .login-form').keydown(function(event){
	    if(event.keyCode == 13) {
	    	$('.login-box .login-form #loginSubmitBtn').trigger( "click" );
	    	event.preventDefault();
	    	return false;
	    }
	});
	
	$('.login-info-form .post-find-btn').on('click',function(){
		var findPostcodeVal = $( "#findPostcode" ).val();
		if(findPostcodeVal){
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+"/secure/services/getAFDAddresses",
			      data: {'postcode': findPostcodeVal},
			      success: function(data) {
			    	  addressDropdown = jQuery(data).find('#selectInner').html();
			    	  $('.registration-col .address-finder select').remove();
			    	  $('.registration-col .address-finder .outer-select').html(addressDropdown);
			    	  $('.registration-col #registrationAfdDiv').show();
			      }
		    });
			return false;
		}else{
			ECP.alert('Form Error.','Please enter you postcode to use address finder.');
			return false;
		}		
	});
	
	$('#change_password_popup').keydown(function(event){
	    if(event.keyCode == 13) {
	    	$('#change_password_popup .okay-btn').trigger( "click" );
	    	event.preventDefault();
	    	return false;
	    }
	});	
	
	// Store Locator Js
	
	$('.searchStore').on('submit',function(){
		var search		= $(this).find('input[name="search"]').val();
		if($.trim(search) == ''){
			ECP.alert('', 'Search field cannot be empty.');
			return false;
		} else{
			return true;
		}
	});
	
	// Store Locator for static page
	$('.searchStorePage').on('submit',function(){
		var search		= $(this).find('input[name="search"]').val();
		$('.searchStoreMsg').remove();
		if($.trim(search) == ''){
			ECP.alert('', 'Search field cannot be empty.');
		} else{
			var msg 	= '';
			var search 	= $(this).find('input[name="search"]').val();
			var form 	= $(this);
			$.ajax({
			      type: "POST",			     
			      url: ECP.getBase()+$(this).data('href'),
			      data: {'search': search, 'isajax': 'true'},
			      success: function(data) {
			    	  if(data == 'true'){
			    		 msg  = '<p class="searchStoreMsg succMsg"><img src="' + $("body").data("statichost") + '/product-list-icon.jpg"  /> ' + window.messages.sddsearch.success + '</p>';
			    	  }else{
			    		 msg  = '<p class="searchStoreMsg errMsg">' + window.messages.sddsearch.error + '</p>';
			    	  }
			    	 form.append(msg);
			      }
		    });
		}
		return false;
	});
		
	if($('div.flashmessage').length>0){
		var msgstr = '';
		var notifClass = '';
		$('div.flashmessage').each(function(){
				var message = $(this).data('message');
				notifClass = $(this).data('errorclass');				
				console.log(message);
				var messageArray = message.split('.');
				var predefinedarray =  window.messages;
				while(index = messageArray.shift()){					
					if(index in  predefinedarray){
						predefinedarray = predefinedarray[index];
					}
				}
				if(typeof predefinedarray !='undefined'){
					msgstr += predefinedarray;
				}
				
				msgstr = '<div class="popNotificationMessage '+notifClass+'">'+msgstr+'</div>';				
		});
		notifClass = messages.notificationalert[notifClass];		
		ECP.alert(notifClass,msgstr);
	}
	ECP.addCart();
	var branch = $(".branchselector").val();
	if(typeof branch != undefined){
		$('#branchbox_'+branch).show();
	}
	$(document).on('change','.branchselector',function(){
			$('div [id^=branchbox_]').hide();
			var branchid = $('.branchselector').val();
			$('#branchbox_'+branchid).show();
	});	
	
	//hide sign in box on body click
	$('body').click(function(evt){    
	       if(evt.target.class == "login-box")
	          return;
	       //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
	       if($(evt.target).closest('.login-box').length)
	          return;             
	       
	       if(evt.target.class == "signin")
		          return;
		       //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
	       if($(evt.target).closest('.signin').length)
		          return;             
	       if(evt.target.id == "cls-popup")
		          return;
		       //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
	       if($(evt.target).closest('#cls-popup').length)
		          return;             
		         
	      //Do processing of click event here for every element except with id menu_content
	       if($(document).scrollTop()=='0'){
	    	   $('header').removeClass('slide--up').addClass('slide--reset');
	       	   $('header .login-box').slideUp(400);
	       }
	});
	
	var hash = window.location.hash;

    if (hash) {
        var selectedTab = $('.order-heading a[href="' + hash + '"]');
        selectedTab.trigger('click', true);
    }
	
	$('.geolocation').on('click', function(){
		if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(function(position){
	        	window.location  = ECP.getBase() + '/store-locator/locate/lat/' + position.coords.latitude + '/lon/' + position.coords.longitude;
	        });
	    } else { 
	       alert("Geolocation is not supported by this browser.");
	    }
	});
	
	$(document).ready(function(){
		if($('.storeAutocomplete').length>0){
			$('.storeAutocomplete').autocomplete({
			    serviceUrl: '/stores/store/getStoreNamesAutocomplete',
			    ajaxSettings: {
			    	global: false,
			    }
			});	
		}		
	});
	
	$(document).on('click','.tiercatcontentheader .view-more',function(){
		
		if($(this).text()==$(this).data('more')){
			$(this).text($(this).data('less'));
			$(this).parents('.tiercatcontentheader').find('article.moretext').css({'display':'inline'});
		}else{
			$(this).parents('.tiercatcontentheader').find('article.moretext').css({'display':'none'});
			$(this).text($(this).data('more'));
		}
		return false;
	});
	
	$('#feedbackForm').on('submit', function(){
		$('.error').html('');
		$('.error').hide();
		var error 			= false;
		var option1 		= $('#feedbackForm input[name="option1"]:checked').length;
		var option2 		= $('#feedbackForm input[name="option2"]:checked').length;
		var msg 			= $('#feedbackForm textarea[name="msg"]').val();
		var name 			= $('#feedbackForm input[name="name"]').val();
		var email 			= $('#feedbackForm input[name="email"]').val();
		if(option1 < 1){
			$('.option1Err').html(window.messages.feedback.error.required);
			error 			= true;
		}
		if(option2 < 1){
			$('.option2Err').html(window.messages.feedback.error.required);
			error 			= true;
		}
		if(msg == ''){
			$('.msgErr').html(window.messages.feedback.error.required);
			error 			= true;
		}
		if(name == ''){
			$('.nameErr').html(window.messages.feedback.error.required);
			error 			= true;
		}
		if(email == ''){
			$('.emailErr').html(window.messages.feedback.error.required);
			error 			= true;
		} else if(!validateEmail(email)){
			$('.emailErr').html(window.messages.feedback.error.validEmail);
			error 			= true;
		}
		if(error){
			$('.error').show();
			return false;
		}
		return true;
	});
	
	$('.tyresize-form').on('submit',function(){ 
		width = $('select[name=width] option:selected').val();
		profile = $('select[name=profile] option:selected').val();
		tyresize = $('select[name=tyresize] option:selected').val();
		if(width == '' || tyresize == '' || profile == ''){
			ECP.alert('',window.messages.snowchains.error.required);
		}else{
			return true;
		}
		return false;
	});
	
    $('[data-toggle="popover"]').popover();
})(jQuery);

function getUrlParams(url, param){
	alert(url);
	 name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + param + "=([^&#]*)"),
	        results = regex.exec(url);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function updateUrlParameters(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  }
  else {
    return uri + separator + key + "=" + value;
  }
}

function  getCarriagesOptions(countryVal, international, postcodeVal){
	if( (countryVal != "" && international == '1' ) || (countryVal == "777"  &&  postcodeVal != "") || (countryVal != "" && countryVal != "777" && international == '0') ){
		if(window.ECP.__loadervisible){
		var overlayq =' left:0; top:0; bottom:0; right:0; background:#233f92; opacity:0.8; height:100%; filter:alpha(opacity=80); z-index:9999999; margin-left:0px; text-align:center;';
		$('.billing-col.delivery-option').html($('<div  class="" style="'+overlayq+'"><img  style="margin-top:20%;margin-bottom:20%;" width="100" src="/assets/img/puff.svg" alt="Loading"/></div>')).fadeIn();
		}
		  $('#deliveryError').hide();
		  $('#spostcode').attr('disabled','disabled');
		  var postedcarriagecode = $('#postedcarriagecode').val();
		  //$(".delivery-overlay").show();
		  $.ajax({
			  type:'POST',
			  url: ECP.getBase()+'/secure/services/getBfpoStatus',
			  data:{'postcode':postcodeVal},
			  success:function(data){
				  if($(window).width() > 768){
					  var obj = $('.select-country fieldset div.bfpomsgdiv');
				  }else{
					  var obj = $('.address-field fieldset div.bfpomsgdiv');
				  }
				   if(data.result != 'N\/A'){					 
					  if(data.result == 'invalid'){
						  obj.addClass('bfpomsgdiv bfpo-info semibold');
						  obj.html(window.messages.bfpo.error.invalidproduct);
					  }else{
						  obj.addClass('bfpomsgdiv bfpo-info');
						  obj.html('<strong>'+window.messages.bfpo.error.validproduct.heading+'</strong>');
						  obj.append(window.messages.bfpo.error.validproduct.msg);
					  }
				  }else{
					  obj.html('');
					  obj.removeClass('bfpo-info');
				  }
			 
		 $.ajax({
		      type: "POST",			     
		      url: ECP.getBase()+"/secure/services/getCarriages", 
		      data: {'countryVal': countryVal,'international': international,'postcodeVal':postcodeVal, 'postedcarriagecode':postedcarriagecode},
		      success: function(data) {		    	  
			    if(!$("#clickCollect").is(':checked')){
		    	//ECP.loaderClose();
		    	  $('.billing-col.delivery-option').show();
		    	  $('.billing-col.delivery-msg').hide();
		    	  $('.billing-col.delivery-option').html(data);
		    	  $('#hdsteps3').show();
		    	  $("#hdstep4n5").show();
				 //$('.checkout.delivery-option .delivery-table .delivery-data:nth-child(3)').addClass('active');
				 /*  $('.checkout.delivery-option .delivery-table .delivery-data').click(function(){
					$('.checkout.delivery-option .delivery-table .delivery-data').removeClass('active');
					$(this).addClass('active');
				  }); */
				  $('.checkout.delivery-option .delivery-table .delivery-data input').click(function(){
				    if(this.checked){
						$('.checkout.delivery-option .delivery-table .delivery-data').removeClass('active');
						$(this).parent('.delivery-data').addClass('active');
					}else{
						$('.checkout.delivery-option .delivery-table .delivery-data').removeClass('active');
					}
				  });
		    	  var deliveryOptionHidden = $('#deliveryOptionHidden').val();
		    	  if(deliveryOptionHidden){
		    		  $('#slot'+deliveryOptionHidden).attr('checked', 'checked');
		    	  }
		    	  var selected = $(".delivery-data input[type='radio']:checked");
		    	  if (selected.length > 0) {
		    	      selectedChargeId = selected.attr('id');
		    	      updateDeliveryAmounts(selectedChargeId);
		    	  }
		    	  $('#spostcode').removeAttr('disabled');
		      }
		     }
	    }); 
			  }
		  });
	}
}

/*
 * Function that validates email address through a regular expression.
 */
function validateEmail(sEmail) {
	sEmail = sEmail.trim();
	var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if (filter.test(sEmail)) {
		return true;
	}
	else {
		return false;
	}
}

/*
 * Function that validates email address through a regular expression.
 */
function validateMultipleEmail(value, seperator) {
    seperator = seperator || ',';
    if (value != '') {
        var result = value.split(seperator);
        for (var i = 0; i < result.length; i++) {
            if (result[i] != '') {
                if (!validateEmail($.trim(result[i]))) {
                    return false;
                }
            }
        }
    }
    return true;
}

/*
 * function to update delivery and total amount on change in delivery option
 */ 
function updateDeliveryAmounts(objCheckedId){
	var moneyOff = 0;
	//moneyOff = document.getElementById("moneyOff").value;
	var strDescription = $('#'+objCheckedId).attr("description");
	var strCode = $('#'+objCheckedId).val();
	var dCharge = $('#'+objCheckedId).attr("charge");
	var currencyIcon = $('#currencyIconConatiner').text();
	var objDeliveryAmount = document.getElementById("shippingAmount");
	var shippingAmountConatiner = document.getElementById("shippingAmountConatiner");
	var objDeliveryAmountDesc = document.getElementById("basketDeliveryAmountDesc");
	var objDescription = document.getElementById("basketDeliveryDescription");
	var objTotalAmount = document.getElementById("totalAmountPayable");
	var dBasketPrice = parseFloat(objTotalAmount.getAttribute("basketprice"));	
	var position = $('#totalAmountPayable').data('position');
	var symbol = $('#totalAmountPayable').data('symbol');
	var totalamount = shippingcharges = deliveryAmount = deliveryDesc =  shippingcharges = '';
	dBasketPrice = dBasketPrice - moneyOff;
	
	if(strCode == 'INT_DELIVERY'){
		if (dCharge > 0){
			if(position > 0){
				shippingcharges = deliveryAmount = dCharge + symbol;	;
			}else{
				shippingcharges = deliveryAmount = symbol + dCharge;
			}
		}else{
			deliveryAmount = "TBC";
			shippingcharges = '0.00';
		}		
		deliveryDesc = "(" + strDescription + ")";
	}
	else if (dCharge == 0)
	{
		deliveryAmount = "FREE";
		shippingcharges = '0.00';
		deliveryDesc = "(" + strDescription + ")";
	}
	else
	{
		if(position > 0){
			shippingcharges = deliveryAmount = dCharge + symbol;	;
		}else{
			shippingcharges = deliveryAmount = symbol + dCharge;
		}
		deliveryDesc = "(" + strDescription + ")";
	}
	//objTotalAmount.innerHTML = currencyFormatted(+dBasketPrice + +dCharge);
	
	
	if(position > 0){
		totalamount = currencyFormatted(+dBasketPrice + +dCharge) + symbol;		
	}else{
		totalamount = symbol + currencyFormatted(+dBasketPrice + +dCharge);	
	}
	
	objTotalAmount.innerHTML = totalamount;
	objDeliveryAmount.innerHTML = deliveryAmount;
	objDeliveryAmountDesc.innerHTML  = deliveryDesc;
	
	if($('#totalprice').length > 0){
		$('#totalprice').html(totalamount);
		$('#summarytotalprice').html(totalamount);
	}
	if($('#shippingchrges').length > 0){
		$('#shippingchrges').html(shippingcharges);
		$('#shipdesc').html(deliveryDesc);
		
	} 

}


function currencyFormatted(dAmount)
{
	var dMoney = parseFloat(dAmount);
	var cMinus = '';
	
	if (isNaN(dMoney))
	{
		dMoney = 0.00;
	}
	
	if (dMoney < 0)
	{
		cMinus = '-';
	}
	dMoney = Math.abs(dMoney);
	dMoney = parseInt((dMoney + .005) * 100);
	dMoney = dMoney / 100;
	var sMoney = new String(dMoney);

	if (sMoney.indexOf('.') < 0)
	{
		sMoney += '.00';
	}

	if (sMoney.indexOf('.') == (sMoney.length - 2))
	{
		sMoney += '0';
	}
	sMoney = cMinus + sMoney;
	return sMoney;  
}


function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function clearAddress(addressTypePrefix){
	if(addressTypePrefix=='s'){
		$("#shippingAddress #address > option:eq(0)").prop('selected', true);
	}else{
		$("#billingAddress #address > option:eq(0)").prop('selected', true);
	}
	
	$('#'+addressTypePrefix+'address1').val('');
	$('#'+addressTypePrefix+'address2').val('');
	$('#'+addressTypePrefix+'town').val('');
	$('#'+addressTypePrefix+'county').val('');
	$('#'+addressTypePrefix+'postcode').val('');
}

function changeAddress(objSelect, strPrefix, strProvider)
{
	var strId = strPrefix + objSelect.value;
	var addressType = objSelect.parentNode.parentNode.id;
	var objOption = $(objSelect).children('#'+strId);
	//console.log($(objOption1).attr('postcode'));
	//var objOption = document.getElementById(strId);
	
	var objButton = document.getElementById("updateButton");
	var objDeleteButton = document.getElementById("deleteButton");
	
	if (strPrefix == "undefined" || strPrefix == undefined)
	{
		strPrefix = "";
	}
			
	if(addressType=="shippingAddress") {
		var objAddress1 = document.getElementById(strPrefix + "saddress1");
		var objAddress2 = document.getElementById(strPrefix + "saddress2");
		var objAddress3 = document.getElementById(strPrefix + "stown");
		var objAddress4 = document.getElementById(strPrefix + "scounty");
		var objPostcode = document.getElementById(strPrefix + "spostcode");
	}else{
		var objAddress1 = document.getElementById(strPrefix + "address1");
		var objAddress2 = document.getElementById(strPrefix + "address2");
		var objAddress3 = document.getElementById(strPrefix + "town");
		var objAddress4 = document.getElementById(strPrefix + "county");
		var objPostcode = document.getElementById(strPrefix + "postcode");
	}
	

	var objInternalId = document.getElementById(strPrefix + "internalId");
	var objContactName = document.getElementById(strPrefix + "contactName");
	
	if (objInternalId)
	{
		objInternalId.value = $(objOption).attr("internalId");
		
	}

	if (objContactName)
	{
		objContactName.value = $(objOption).attr("contactName");
	}
	
	//var strPostcode = $(objOption).attr("postcode").split(" ").join("");	 
	var strPostcode = $(objOption).attr("postcode");	
	if (strProvider == "AFD")
	{
	  $.ajax({
	      type: "POST",			     
	      url: ECP.getBase()+"/secure/services/getAFDAddressesModeSelect",
	      data: {'postcode': strPostcode},
	      success: function(data) {			    	 
	    	  var strPos = data.indexOf('|','6');
	    	  if(strPos != '-1'){
	    		  data = data.replace('<?xml version="1.0"?>','');
	    		  var arrAddress = data.split("|");
	    		  if($.trim(arrAddress[0])==''){
	    			  objAddress1.value = arrAddress[1];
	    			  objAddress2.value = '';
	    		  }else{
	    			  objAddress1.value = arrAddress[0];
	    			  objAddress2.value = arrAddress[1];
	    		  }
	    		  objAddress3.value = arrAddress[2];
	    		  objAddress4.value = arrAddress[3];
	    		  //objPostcode.value = arrAddress[4];
	    		 
	    		 if(addressType=="shippingAddress") {
	    			var postcodeVal = $( ".checkout-form #spostcode" ).val();
	    			var countryVal = $( ".checkout-form #scountry" ).val();
	    			var international = $('option:selected', ".checkout-form #scountry").attr('international');
	    			getCarriagesOptions(countryVal, international, postcodeVal);
	    		  }
	    		  
	    		  
	    		  
	    	  }else{
	    		  objAddress1.value = "";
	    		  objAddress2.value = "";
	    		  objAddress3.value = "";
	    		  objAddress4.value = "";
	    		  //objPostcode.value = "";				
	    	  }
	      }
	  });  
	} else { 	
	    if ($(objOption).attr("internalId") == "0")
	    {
		    if (objButton)
		    {
			    objButton.style.display = "none";
			    objDeleteButton.style.display = "none";
		    }
	    }
	    else
	    {
		    if (objButton)
		    {
			    objButton.style.display = "block";
    			
			    if ( $(objOption).attr("internalId") == "-1")
			    {
				    objDeleteButton.style.display = "none";
			    }
			    else
			    {
				    objDeleteButton.style.display = "block";
			    }
		    }
	    }    	
	    objAddress1.value = $(objOption).attr("address1");
	    objAddress2.value = $(objOption).attr("address2");
	    objAddress3.value = $(objOption).attr("town");
	    objAddress4.value = $(objOption).attr("county");
	    objPostcode.value = $(objOption).attr("postcode");
		
		if(addressType=="shippingAddress") {
			var postcodeVal = $( ".checkout-form #spostcode" ).val();
			var countryVal = $( ".checkout-form #scountry" ).val();
			var international = $('option:selected', ".checkout-form #scountry").attr('international');
			getCarriagesOptions(countryVal, international, postcodeVal);
		  }
    }
	
	
}
function checkADSFilter(tier5codes){
	console.log(filterstr);
}

function focusChangeStore(){
	javascript:document.getElementById('clickncollectdetails').style.display='block'; 
	$('.checkout.delivery-detail .loc-post-field #changecncpostcode').focus();
	return false;
}

$(document).on('click','#productfilters',function(){
	//$('#filter-popup').find('.modal-content').html();
	$('#filter-popup').modal({backdrop:'static',keyboard:false,show:true});
});

$(document).on('click','#clear-allfilters',function(){
	//$('#filter-popup').find('.modal-content').html();
	$('#filter-popup').modal({backdrop:'static',keyboard:false,show:true});
});

$(document).on('click',"#filterProductListing",function(){	
	
	var filterstr='tier5Code='+$('#filtertier5codes').val()+'&';
	var val='';
	var varcheckedfiltres='';
	var selected=0;
	var selectedFilter=0;
	var filterData={};
	var filterapplied = false;
	
	$('#filterform select option:selected').each(function() {
		if($(this).val()==0){val='';}
		else{val=$(this).val();selected=1;selectedFilter++;}		
		filterstr+=$(this).parent().attr('name')+'='+val.replace("-", " ")+'&';		
	});	
	filterstr+='selected='+selected+'&';
	//console.log(filterstr);
	
	var filters = {};
	var checkedfiltercounter=0;
	$("#filterform input:checked").each(function(){
		checkedfiltercounter++;
		var filter= $(this).attr('data-filtertype');
		if(typeof filters[filter]=='undefined'){
			filters[filter] = [];
		}		
		filters[filter].push($(this).val());	
		
		//varcheckedfiltres+=$(this).attr('data-filtertype')+'='+$(this).val()+'&';
		varcheckedfiltres+=$(this).val()+',';
		//console.log($(this).val());
	});	
	var totalfilter=selectedFilter+checkedfiltercounter;
	filterstr+='checkboxfiltres='+varcheckedfiltres+'&totalFilterSelected='+totalfilter+'&';
	//console.log(varcheckedfiltres);
	$.ajax({
		 type: "POST",			     
	      url: $('#filterform').attr('action'), 
	      data: filterstr,
	      async:false,
	      success: function(data) {	
	    	  $('#carpartslistingsection').html(data); 
	      }
	})	
	
	if($("form.product-content").is(":visible")){
		$("form.product-content").hide();
	}
	$("li.brandselection").hide();
	
	$.each(filters,function(filtername,filterarr){
			
			$('form.product-content').removeAttr(filtername);
			$.each(filterarr,function(index,filter){
				
				$('form.product-content').each(function(){
					
					if($(this).attr('data-'+filtername)==filter && $(this).attr(filtername)!='applied'){
						
						if(filterapplied){
							if($(this).is(":visible")){
								$(this).attr(filtername,'applied');
								$(this).show();
							}
						}else{
							$(this).attr(filtername,'applied');
							$(this).show();
						}
					}
				});
				$('li.brandselection').each(function(){
						if($(this).attr('data-'+filtername)==filter && $(this).attr(filtername)!='applied'){						
						if(filterapplied){
							if($(this).is(":visible")){
								$(this).attr(filtername,'applied');
								$(this).show();
							}
						}else{
							$(this).attr(filtername,'applied');
							$(this).show();
						}
					}
				});
			});
			if(!filterapplied){
				
				filterapplied = true;
			}
			
			$('form.product-content:not(['+filtername+'=applied])').hide();
			//$('li.brandselection:not(['+filtername+'=applied])').hide();

	});
	
	
	if($.isEmptyObject(filters)){
		$("form.product-content").show();
		$("li.brandselection").show();
	} else{
		slideProducts();
	}
	
	hideEmptyProductDiv();
	
	showFilterCount();
	
	$('#zoom-image').on('show.bs.modal', function (e) {
		$(this).find('img').attr('src', '');
		var src = $(e.relatedTarget).find('img').attr('src');
		$(this).find('img').attr('src', src);
	});	
	
	$('[data-toggle="popover"]').popover();
	
	var getWidth  = $(window).width();
	if(getWidth < 768){
		// To show popup of Error messages
		if($('.info-box').length > 0){
			var htmlObj = $("<div>"+$('.info-box').html()+"</div>");
			htmlObj.find('img').addClass('warning-icon');
			ECP.alert('',htmlObj.html());
		}
		$("html, body").animate({ scrollTop: $(".product-listing-col").offset().top - $("html, body").offset().top }, 600);
	}

});

$(document).on('click','#clearallfilters',function(){
	location.reload();
	return true;
	var filterstr='tier5Code='+$('#filtertier5codes').val()+'&';
	var val='';
	var selected=0;
	var totalfilter=0;
	var filterData={};
	var filterapplied = false;
	
	$('#filterform select').each(
		function(i) {						
		$("#" + $(this).attr('id') + " option:selected").prop("selected", false);

	});
	$("#filterform input:checked").each(function(){
		this.checked = false;
	});
		
	$('#filterform select option:selected').each(function() {
		if($(this).val()==0){val='';}
		else{val=$(this).val();selected=1;}
		
		filterstr+=$(this).parent().attr('name')+'='+val.replace("-", " ")+'&';
		
	});	
	filterstr+='selected='+selected+'&totalFilterSelected='+totalfilter+'&';
	
	var filters = {};
	$("#filterform input:checked").each(function(){
		//console.log(($(this).val()));
		var filter= $(this).attr('data-filtertype');
		if(typeof filters[filter]=='undefined'){
			filters[filter] = [];
		}		
		filters[filter].push($(this).val());		
	});
	
	$.ajax({
		 type: "POST",			     
	      url: $('#filterform').attr('action'), 
	      data: filterstr,
	      async:false,
	      success: function(data) {	
	    	  $('#carpartslistingsection').html(data); 
	      }
	})
	
	
	$("form.product-content").show();
	$("li.brandselection").show();
})

function slideProducts(){
	$('li.productbrandslisting').each(function (){
		
		$(this).find('.brand-list  li').removeClass("active");
		$(this).find('.brand-list  li[brand="applied"]').eq(0).addClass("active");
		if($(this).find('.brand-list  li[brand="applied"]').length == 0){
			$(this).find('.brand-list  li[position="applied"]').eq(0).addClass("active");
		}
		$(this).find('.brand-list  .active').trigger('click');
		//$(this).find('.product-content:visible').eq(0).slideDown(400);
		/*$(this).find('.product-content').filter(':visible:first').slideDown(400);
		//$(this).find('.product-content').slideDown(400);
		;*/
		//if($(this).find('.product-content').css("display")=="block")
		//$(this).find('ul .brandselection  li:visible:first').css('background','blue');			
	});
	if($('.product_brand_detail:visible').length == 0){
		ECP.alert('', window.messages.refine.error.noProducts);
	}
	
}

function hideEmptyProductDiv(){
	$('li.productbrandslisting').each(function (){
		//console.log($(this).attr('id'));
		if($(this).find(".product-content:visible").length==0){
			$(this).hide();
		}
	});
}


$(document).on('click',"#filterBrandProductListing",function(){	
	
	
	var val='';
	var varcheckedfiltres='';
	var filterData={};
	var filterapplied = false;	
	
	
	var filters = {};
	var checkedfiltercounter=0;
	$("#filterbrandform input:checked").each(function(){
		checkedfiltercounter++;
		var filter= $(this).attr('data-filtertype');
		if(typeof filters[filter]=='undefined'){
			filters[filter] = [];
		}		
		filters[filter].push($(this).val());	
	});	
	
	//console.log(filters);
	$("li.productbrandslisting").show();
	$("form.product-content").hide();
	$("li.brandselection").hide();
	
	$.each(filters,function(filtername,filterarr){			
			$('form.product-content').removeAttr(filtername);
			$('li.brandselection').removeAttr(filtername);
			$.each(filterarr,function(index,filter){				
				$('form.product-content').each(function(){					
					if($(this).attr('data-'+filtername)==filter && $(this).attr(filtername)!='applied'){						
						if(filterapplied){
							//console.log(this);
							//console.log(filter);
							if($(this).is(":visible")){
								$(this).attr(filtername,'applied');
								$(this).slideDown();
							}
						}else{
							$(this).attr(filtername,'applied');
							$(this).slideDown();
						}						
						//console.log(filter);
					}
				});
				$('li.brandselection').each(function(){
					if($(this).attr('data-'+filtername)==filter && $(this).attr(filtername)!='applied'){
						
						if(filterapplied){
							if($(this).is(":visible")){
								$(this).attr(filtername,'applied');
								$(this).slideDown();
							}
						}else{
							$(this).attr(filtername,'applied');
							$(this).slideDown();
						}
					}else{
						//console.log($(this).attr('data-productdetailclass'));
					}
				});
			});
			if(!filterapplied){				
				filterapplied = true;
			}			
			$('form.product-content:not(['+filtername+'=applied])').hide();
			//$('li.brandselection:not(['+filtername+'=applied])').hide();

	});
	
	if($.isEmptyObject(filters)){
		$("form.product-content").show();
		$("li.brandselection").show();
	}
	
	$('#selectioncounter').html(checkedfiltercounter);
	slideProducts();
	hideEmptyProductDiv();
	
	$('.product-listing-col .filter-box .filter-overlay').hide();
	$('.filter-box .sfilter').removeClass('active');
	$('.product-listing-col .filter-box .small-filter').slideUp(200);
	$('.filter-box .selection-count').show();
});


$(document).on('click','#clearallbrandfilters',function(){
	var getWidth  = $(window).width();
	$("li.productbrandslisting").show();	
	$("li.productbrandslisting").each(function(){
		$(this).find('.brandselection:first').trigger('click');
	});
	
	$("form.product-content").show();
	$("li.brandselection").show();
	
	$('#selectioncounter').html(0);
	
	$("#filterbrandform input:checked").each(function(){
		$(this).attr('checked',false);
	});
	$('.product-listing-col .filter-box .filter-overlay').hide();
	$('.filter-box .sfilter').removeClass('active');
	$('.product-listing-col .filter-box .small-filter').slideUp(200);
	$('.filter-box .selection-count').show();
})

$(document).ready(function(){
	showFilterCount();
});

function showFilterCount(){
	var adscounter=0;
	var checkedfiltercounter=0;
	
	if($('#filterform').length !=0){
		$('#filterform select option:selected').each(function() {
			if($(this).val()!=0){adscounter++;}
		});	
		
		$("#filterbrandform input:checked").each(function(){
			if($.trim($(this).val()) !=''){
				checkedfiltercounter++;
			}
		});
		var totalFilterApplied=adscounter+checkedfiltercounter;
		$('#selectioncounter').html(totalFilterApplied);
	}
}

function searchKeyword(){
	if($('.search-from').find('input[name="search"]').val() == ''){
		ECP.alert('', window.messages.search.error.required);
		return false;
	} else{
		return true;
	}
}

$(document).on('change','#filterform select',function(){
	var filterstr='';
	var selected=0;
	$('#filterform select option:selected').each(function() {
		if($(this).val()==0){val='';}
		else{val=$(this).val();selected=1;}		
		filterstr+=$(this).parent().attr('name')+'='+val.replace("-", " ")+'&';		
	});	
	filterstr+='selected='+selected+'&';
	//console.log(ECP.getBase() + "/categories/showDistinctFilters");
	$('#filterform select').attr('disabled', 'disabled');
	$.ajax({
		 type: "POST",			     
	      url:ECP.getBase() + "/catalog/categories/showDistinctFilters", 
	      data: filterstr,
	      async:false,
	      success: function(data) {	
	    	  $('#filtervehiclespec').html(data); 
	    	  $('#filterform select').attr('disabled', false);
	      }
	})
	
})

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function deleteCookie(cname){
	document.cookie = cname + "=;expires=Wed; 01 Jan 1970";
}