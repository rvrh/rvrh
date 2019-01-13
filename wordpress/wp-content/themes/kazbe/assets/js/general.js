// JavaScript Document
jQuery(document).ready(function() {
	
	var kazbeViewPortWidth = '',
		kazbeViewPortHeight = '';

	function kazbeViewport(){

		kazbeViewPortWidth = jQuery(window).width(),
		kazbeViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( kazbeViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var kazbeSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var kazbeSiteHeaderWidth = jQuery('.site-header').width();
			var kazbeSiteHeaderPadding = ( kazbeSiteHeaderWidth * 2 )/100;
			var kazbeMenuHeight = jQuery('.menu-container').height();
			
			var kazbeMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var kazbeMenuPadding = ( kazbeSiteHeaderHeight - ( (kazbeSiteHeaderPadding * 2) + kazbeMenuHeight ) )/2;
			var kazbeMenuButtonsPadding = ( kazbeSiteHeaderHeight - ( (kazbeSiteHeaderPadding * 2) + kazbeMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':kazbeMenuPadding});
			jQuery('.site-buttons').css({'padding-top':kazbeMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		kazbeViewport();
		
	});
	
	kazbeViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( kazbeViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		