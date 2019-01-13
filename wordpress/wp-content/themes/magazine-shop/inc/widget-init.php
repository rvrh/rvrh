<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magazine_shop_widgets_init()
{

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'magazine-shop'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'magazine-shop'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title primary-font">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Home Page Sidebar One', 'magazine-shop'),
        'id' => 'sidebar-home-1',
        'description' => esc_html__('Add widgets here.', 'magazine-shop'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Home Page Sidebar Two', 'magazine-shop'),
        'id' => 'sidebar-home-2',
        'description' => esc_html__('Add widgets here.', 'magazine-shop'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title primary-font">',
        'after_title' => '</h2>',
    ));

    $magazine_shop_footer_widgets_number = magazine_shop_get_option('number_of_footer_widget');
    if ($magazine_shop_footer_widgets_number > 0) {
        register_sidebar(array(
            'name' => esc_html__('Footer Column One', 'magazine-shop'),
            'id' => 'footer-col-one',
            'description' => esc_html__('Displays items on footer section.', 'magazine-shop'),
            'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title primary-font">',
            'after_title' => '</h2>',
        ));
        if ($magazine_shop_footer_widgets_number > 1) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Two', 'magazine-shop'),
                'id' => 'footer-col-two',
                'description' => esc_html__('Displays items on footer section.', 'magazine-shop'),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title primary-font">',
                'after_title' => '</h2>',
            ));
        }
        if ($magazine_shop_footer_widgets_number > 2) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Three', 'magazine-shop'),
                'id' => 'footer-col-three',
                'description' => esc_html__('Displays items on footer section.', 'magazine-shop'),
                'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title primary-font">',
                'after_title' => '</h2>',
            ));
        }
    }
}

add_action('widgets_init', 'magazine_shop_widgets_init');
