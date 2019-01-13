
jQuery(window).load(function() {
    // Animate loader off screen
    jQuery("body").removeClass("no_scroll");
    jQuery(".bazz_loader").fadeOut("slow");
      
  });
jQuery(document).ready(function($){

  // counter 
  $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

  // SmartMenus init
  $('#menu-header-menu').smartmenus({
    mainMenuSubOffsetX: -1,
    mainMenuSubOffsetY: 4,
    subMenusSubOffsetX: 6,
    subMenusSubOffsetY: -6,
  });

  // SmartMenus mobile menu toggle button
  $(function() {
    var $mainMenuState = $('#main-menu-state');
    if ($mainMenuState.length) {
      // animate mobile menu
      $mainMenuState.change(function(e) {
        var $menu = $('#menu-header-menu');
        if (this.checked) {
          $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
        } else {
          $menu.show().slideUp(250, function() { $menu.css('display', ''); });
        }
      });
      // hide mobile menu beforeunload
      $(window).bind('beforeunload unload', function() {
        if ($mainMenuState[0].checked) {
          $mainMenuState[0].click();
        }
      });
    }
  });

  // testimonial slider initialization
  if( $(".testimonials_inner_content").length > 0 ){
    jQuery(".testimonials_inner_content").lightSlider({
        item : 3,
        controls: false,
        responsive : [
        {
              breakpoint:992,
              settings: {
                  item:2,
                  slideMove:1,
                  slideMargin:6,
                }
          },
          {
              breakpoint:768,
              settings: {
                  item:1,
                  slideMove:1,
                  slideMargin:6,
                }
          }
          ]
    });
  }
  // testimonial slider initialization
  if( $(".homepage_three_banner").length > 0 ){
    $(".homepage_three_banner").lightSlider({
      item : 1,
      controls: true,
      pager: false,
      slideMargin: 0,

    });
  }

  if( $(".home_banner_wrap").length > 0 ){
    $(".home_banner_wrap").lightSlider({
      item:1,
      slideMargin: 0,
      loop:true,
      pauseOnHover: true,
      pager: false,
      speed: 1000,
      mode: 'slide',
      cssEasing: 'easeInOutBack',
      pause: 3000,
      onBeforeStart: function (el) {
        el.addClass('classAddedBeforeSliderLoad');
      },
      onSliderLoad: function (el) {
        el.removeClass('classAddedBeforeSliderLoad');
      },

    });
  }


var forimg_load =  document.querySelector('.portfolio_items')
  if(forimg_load) {
    imagesLoaded( forimg_load, function() {
      $containerport =  jQuery('.homepage_portfolio_wrap .portfolio_items');
        jQuery('.homepage_portfolio_wrap .portfolio_items').isotope({
          itemSelector: '.item',
      });
    });
  }

 	jQuery('.portfolio_design').on( 'click', 'li:not(".no-link")', function() {
    var filterValue = jQuery(this).attr('data-filter');
    $containerport.isotope({ filter: filterValue});
      $('.portfolio_design li').removeClass('active');
 		$(this).addClass('active');
  });

  // for search show hide header
  $(".bazzinga_show_search").click(function(){
    $(".header_search_form").toggleClass("slow_search_header");
  });
  $(".header_search_close").click(function(){
    $(".header_search_form").toggleClass("slow_search_header");
  });

// for stickey menu
  $(function(){
     var shrinkHeader = 300;
      $(window).scroll(function() {
        var scroll = getCurrentScroll();
           if ( scroll >= shrinkHeader ) {
               $('#bazz_header_nav').addClass('bazz_sticky_menu');
            }
            else {
                $('#bazz_header_nav').removeClass('bazz_sticky_menu');
            }
      });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
        }
  });

  

  var bazz_width = (window.innerWidth > 0) ? window.innerWidth : document.documentElement.clientWidth;
  if(bazz_width > 600){
    $(".stickey_left").stick_in_parent({
      parent: ".team_left_content",
      offset_top: 140,
    });

    $(".blog_left_stickey").stick_in_parent({
      parent: ".blog_left_content",
      offset_top: 160,
    });
  }
  if(bazz_width < 993 ){
    $(".bazz_banner_header").lightSlider({
      item:1,
    });
  }


// aos animation init/*
window.addEventListener('load', AOS.refresh);
    AOS.init({
      disable: 'mobile',
      easing: 'ease-in-sine',
      duration: 500,
      once: true,
    });

// Fixed Body after clicking responsive menu
 $('.main-menu-btn').click(function(){
    $('body').toggleClass('fixed-body');
  });


 //Scroll To Top
    var window_height = $(window).height();
    var window_height = (window_height) + (50);

    $(window).scroll(function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top > window_height) {
            $('.bazzinga_move_to_top').show();
        }
        else {
            $('.bazzinga_move_to_top').hide();   
        }
    });

    $('.bazzinga_move_to_top').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
        
    });
 
});





