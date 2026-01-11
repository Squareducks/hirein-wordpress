var spinnerstyle = 'position:absolute; top:50%; left:50%; margin-left:-50px; margin-top:-50px; text-align:center; z-index:1234; overflow:auto; width:100px;  height:102px;';	
var overlay ='display:block; position:fixed ;left:0; top:0; bottom:0; right:0; background:#233f92; opacity:0.8; height:100%; filter:alpha(opacity=80); z-index:9999999; margin-left:0px; text-align:center;';
var spinnerhtml = '<div id="spinner" class="spinner" style="'+overlay+'"></div>';
var alertbox = '<div class="row" style="margin-top:300px;height:50%"><div class="col-md-4"></div><div class="col-md-4 content" style="background:white"></div><div class="col-md-4"></div></div>';
var model = '<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog">\
      		<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">Ã—</span></button><h4 class="modal-title">Modal title</h4></div>\
        	<div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-primary save_btn">Save changes</button><button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>\
	</div></div></div></div>';


(function( $, window, document, undefined){
	var defaults = {
		loadmakers:1,
	};
	window.ECP = {
			__loadervisible : false,
		setConfig:function(options){
			defaults = $.extend({}, defaults, options);
			return this;
		},
		getBase:function(){
			if($('body').data('url')== settings.docroot && settings.docroot!=''){
				return $('body').data('url');
			}
			return '';
		},
		getStatic:function(){
			return $('body').data('statichost');
		},
		alert:function(title,message,options){
			alertconfig = {autoclose:false,timeinterval:100000};
			if(typeof options!=undefined){
				alertconfig = $.extend({}, alertconfig, options);
			}
			alertmodel = $(model);
			alertmodel.find('.modal-title').html(title);
			alertmodel.find('.modal-body').html(message);
			alertmodel.find('.save_btn').remove();
			alertmodel.modal({backdrop:'static',keyboard:false,show:true});
			if('header' in alertconfig && alertconfig['header'] == false){
				alertmodel.find('.modal-header .modal-title').remove();
			}
			if('footer' in alertconfig && alertconfig['footer'] == false){
				alertmodel.find('.modal-footer').remove();
			}
		},
		confirm : function (title,confirmmsg,successcallback,failurecallback){
			confirmmodel = $(model);
			confirmmodel.find('.modal-title').html(title);
			confirmmodel.find('.modal-body').html(confirmmsg);
			confirmmodel.find('.save_btn').html('Ok');
			confirmmodel.find('.close_btn').removeAttr('data-dismiss');
			confirmmodel.modal({backdrop:'static',keyboard:false,show:true});
			$(document).off('click','.save_btn');
			$(document).on('click','.save_btn',function(){
				if(successcallback){
					successcallback.call(this);
				}
				confirmmodel.remove();
			});
			$(document).off('click','.close_btn');
			$(document).on('click','.close_btn',function(){
				if(failurecallback){
					failurecallback.call(this);
				}
				confirmmodel.remove();
			})
		},
		showloader:function(){
			if(window.ECP.__loadervisible){
				return false;
			}else{
				window.ECP.__loadervisible = true;
				$('.spinner').fadeOut().remove();
				//$('body').append($(spinnerhtml));			
				$('.spinner').append($('<span class="loader-img">loading...</span>')).fadeIn();
			}
			
		},
		loaderClose:function(){
			window.ECP.__loadervisible = false;
			$('.spinner').fadeOut().remove();
		},
		Carriages:{
			getCountryCarriages:function(url,data,callback){				
				$.post(url,this.__data,function(response){
					callback.call(this,response);
				},'html');
			}
		},
		AdsLookup : {
			__data : {},
			loadMakers:function(callback){
        				
				if(defaults.ads.required==1){
					$.ajax({
						url: defaults.ads.maker,
						type: 'POST',
						data: this.__data,
						dataType: 'json',
						success: function(data){
							callback.call(this,data);
						},
						global: false
					});
					return this;
				}
			},
			loadModel:function(maker,callback){
				ECP.AdsLookup.__data.make = maker;
				$.ajax({
					url: defaults.ads.model,
					type: 'POST',
					data: {make:maker},
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global: false
				});
				return this;
			},
			loadYear:function(model,callback){
				this.__data.model = model;
				$.ajax({
					url: defaults.ads.year,
					type: 'POST',
					data: this.__data,
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global: false
				});
				return this;
			},
			loadEngine:function(year,callback){
				this.__data.year = year;
				$.ajax({
					url: defaults.ads.engine,
					type: 'POST',
					data: this.__data,
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global: false
				});
				return this;
			},
			loadFuel:function(engine,callback){
				this.__data.engine = engine;
				$.ajax({
					url: defaults.ads.fuel,
					type: 'POST',
					data: this.__data,
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global: false
				});
				return this;
			},
			getCompoents:function(callback, global){
				global = (global === undefined) ? true : global;
				$.ajax({
					url: defaults.ads.componentmannual,
					type: 'POST',
					data: this.__data,
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global:global
				});
				return this;
			}
		},
		VrmLookup:{
			__data : {},
			getDetailByReg:function(reg,callback,global){
				global = (global === undefined) ? true : global;
				$.ajax({
					url: defaults.vrm.detailurl,
					type: 'POST', 
					data: {reg:reg},
					dataType: 'json',
					success: function(data){
						callback.call(this,data);
					},
					global:global
				});
				return this;
			}
			
		}
	}
})( jQuery, window , document );