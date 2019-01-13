<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magazine-shop
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (magazine_shop_get_option('enable_preloader_option') == 1) { ?>
    <div class="preloader">
        <div class="preloader-wrapper">
        </div>
    </div>
<?php } ?>
<div id="page" class="site site-bg">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'magazine-shop'); ?></a>
    <header id="masthead" class="site-header" role="banner">
        <div class="top-bar secondary-bgcolor">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <?php if (has_nav_menu('social')) { ?>
                            <div class="twp-social-share">
                                <div class="social-icons ">
                                    <?php
                                    wp_nav_menu(
                                        array('theme_location' => 'social',
                                            'link_before' => '<span class="screen-reader-text">',
                                            'link_after' => '</span>',
                                            'menu_id' => 'social-menu',
                                            'fallback_cb' => false,
                                            'menu_class' => 'twp-social-nav',
                                            'container_class' => 'social-menu-container'
                                        )); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-md-8 col-xs-12">
                        <div class="top-navigation">
                            <?php wp_nav_menu(array(
                                'theme_location'  => 'top',
                                'menu_id'         => 'top-menu',
                                'fallback_cb' => false,
                                'depth'           => 2,
                                'container_class' => 'menu',
                            ));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="site-branding">
                            <?php
                            if (is_front_page() && is_home()) : ?>
                                <span class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </span>
                            <?php else : ?>
                                <span class="site-title secondary-font">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </span>
                            <?php endif;
                            magazine_shop_the_custom_logo();
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    $banner_adv     = magazine_shop_get_option('top_section_advertisement');
                    $banner_adv_url = magazine_shop_get_option('top_section_advertisement_url');
                        if (!empty($banner_adv)) {?>
                            <div class="col-md-8 col-xs-12">
                                <div class="twp-adv-header">
                                    <a href="<?php echo esc_url($banner_adv_url);?>" target="_blank">
                                        <img src="<?php echo esc_url($banner_adv);?>">
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                </div>
            </div>
        </div>
        <div class="top-header secondary-bgcolor">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="main-navigation" role="navigation">
                            <div class="nav-right">
                                <?php if ( class_exists( 'WooCommerce' ) ): ?>
                                <div class="mini-cart nav-right-icons">
                                    <?php magazine_shop_woocommerce_header_cart(); ?>
                                </div>
                                <?php endif; ?>
                                <div class="icon-search nav-right-icons">
                                    <i class="twp-icon fa fa-search"></i>
                                </div>
                            </div>

                            <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                                 <span
                                     class="screen-reader-text"><?php esc_html_e('Primary Menu', 'magazine-shop'); ?></span>
                                <i class="ham"></i>
                            </span>
                            <?php wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'container' => 'div',
                                'container_class' => 'menu'
                            )); ?>
                        </nav>
                        <!-- #site-navigation -->

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="popup-search">
        <div class="table-align">
            <div class="table-align-cell v-align-middle">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
    <!-- #masthead -->

    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page()) {
        /**
         * magazine_shop_action_front_page hook
         * @since magazine-shop 0.0.2
         *
         * @hooked magazine_shop_action_front_page -  10
         * @sub_hooked magazine_shop_action_front_page -  10
         */
        do_action('magazine_shop_action_front_page');
    } else {
        do_action('magazine-shop-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">