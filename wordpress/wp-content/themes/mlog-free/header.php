<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class( esc_attr( mlogfree_container_class() )); ?>>
    <?php mlogfree_cover(); ?>
    <header id="site-header" class="main-header <?php echo esc_attr( mlogfree_cover_class() ); ?>" itemscope="" itemtype="http://schema.org/WPHeader">
        <div class="container">
            <div class="header-top row">
                <div id="logo" class="col col-4 col-tb-10 col-mb-8">
                    <?php mlogfree_logo(); ?>
                </div>
                <div class="col col-6 col-tb-0 col-mb-0">
                    <?php mlogfree_menu_hot(); ?>
                </div>
                <div id="menu-pri" class="button col col-1 col-tb-1 col-mb-2">
                    <button id="show_menu" class="fas"></button>
                </div>
                <div id="button-search" class="button col col-1 col-tb-1 col-mb-2">
                    <button id="show_search_form" class="search fas"></button>
                </div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>
    <?php mlogfree_menu_right(); ?>
    <?php mlogfree_back_to_top(); ?>
    <div id="main" class="<?php echo esc_attr( mlogfree_cover_class() ); ?>">
        <?php mlogfree_breadcrumb(); ?>