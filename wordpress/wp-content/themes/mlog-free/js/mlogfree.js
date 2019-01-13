jQuery(document).ready(function($){
    $('.navigation .primary-menu').addClass('toggle-menu');
    $('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
    $('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');
    $('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"></span>');
    $('.toggle-caret').click(function(e){
        $(this).parent().toggleClass('active').children('.toggle-submenu').toggleClass('active');
    })
});

jQuery(document).ready(function($){
    $(document).click(function (e) {
        // Show Search Form
        if (e.target.id == 'show_search_form') {
            $("#search-form").toggleClass("col-12").toggleClass("col-0");
        } else if( e.target.id != 'search-keyword' && e.target.id != 'search-submit' ) {
            $("#search-form").removeClass("col-12").addClass("col-0");
        }
        
        // Show Menu Right
        if (e.target.id == 'show_menu') {
            $("#menu-right, #moc-phu").toggleClass("active");
            $("body").toggleClass("noscroll");
        
        }
        if( e.target.id == 'moc-phu' || e.target.id == 'close-menu') {
            $("#menu-right, #moc-phu").removeClass("active");
            $("body").removeClass("noscroll");
        }
    })
});

jQuery(document).ready(function($) {
    jQuery(window).scroll(function () {
        var moc_height_screen = jQuery(this).height();
        if ( jQuery(this).scrollTop() > moc_height_screen){
            jQuery('.cover').addClass('filling');
        } else {
            jQuery('.cover').removeClass('filling');
        }
        
        if ( jQuery(this).scrollTop() > 0){
            jQuery('.nocover').addClass('filling');
        } else {
            jQuery('.nocover').removeClass('filling');
        }
    });
});