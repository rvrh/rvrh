<?php 

// Logo
if ( ! function_exists( 'mlogfree_logo' ) ) {
    function mlogfree_logo() {?>
        <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                <img src="<?php echo esc_url( $image[0] ); ?>" class="custom-logo" alt="<?php echo bloginfo('name'); ?>">
            </a>
            <?php if ( is_home() ) {
                printf(
                    '<h1 class="site-name logo"><a href="%1$s" title="%2$s">%3$s</a></h1>',
                    esc_url( home_url( '/' ) ),
                    esc_attr( get_bloginfo( 'description' ) ),
                    esc_attr( get_bloginfo( 'sitename' ) )
                );
            } else {
                printf(
                    '<h2 class="site-name logo"><a href="%1$s" title="%2$s">%3$s</a></h2>',
                    esc_url( home_url( '/' ) ),
                    esc_attr( get_bloginfo( 'description' ) ),
                    esc_attr( get_bloginfo( 'sitename' ) )
                );
            } ?>
        <?php } else { ?>
            <?php if ( is_home() ) {
                printf(
                    '<h1 class="site-name"><a href="%1$s" title="%2$s">%3$s</a></h1>',
                    esc_url( home_url( '/' ) ),
                    esc_attr( get_bloginfo( 'description' ) ),
                    esc_attr( get_bloginfo( 'sitename' ) )
                );
            } else {
                printf(
                    '<h2 class="site-name"><a href="%1$s" title="%2$s">%3$s</a></h2>',
                    esc_url( home_url( '/' ) ),
                    esc_attr( get_bloginfo( 'description' ) ),
                    esc_attr( get_bloginfo( 'sitename' ) )
                );
            } ?>
            <div class="site-description">
                <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>
            </div>
        <?php } ?>
    <?php }
}

// Menu Primary
if ( ! function_exists( 'mlogfree_menu_primary' ) ) {
    function mlogfree_menu_primary() {?>
        <div id="primary-navigation" class="primary-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <nav class="navigation">
                <?php if ( has_nav_menu( 'menu-primary' ) ) { ?>
                    <?php wp_nav_menu(  array( 'theme_location' => 'menu-primary', 'menu_class' => 'primary-menu', 'container' => '' ) ); ?>
                <?php } else { ?>
                    <?php wp_list_pages( 'title_li=' ); ?>
                <?php } ?>
            </nav>
        </div>
    <?php }
}

// Menu HOT
if ( ! function_exists( 'mlogfree_menu_hot' ) ) {
    function mlogfree_menu_hot() {?>
        <div id="hot-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <nav>
                <?php if ( has_nav_menu( 'menu-hot' ) ) { ?>
                    <?php wp_nav_menu(  array( 'theme_location' => 'menu-hot', 'menu_class' => 'hot-menu', 'container' => '' ) ); ?>
                <?php } else { ?>
                    <?php wp_list_pages( 'title_li=' ); ?>
                <?php } ?>
            </nav>
        </div>
    <?php }
}

// Menu Right
if ( ! function_exists( 'mlogfree_menu_right' ) ) {
    function mlogfree_menu_right() {?>
        <div id="menu-right">
            <div id="close-menu"><?php esc_attr_e('Close Menu', 'mlog-free'); ?></div>
            <?php mlogfree_menu_primary(); ?>
            <div class="menu-right-footer">
                <?php echo esc_attr__('Copyright © ', 'mlog-free') . ' ' . esc_attr( date('Y') ) . ' ' . esc_attr( get_bloginfo('name') ); ?>
            </div>
        </div>
        <div id="moc-phu"></div>
    <?php }
}

// Cover
if ( ! function_exists( 'mlogfree_cover' ) ) {
    function mlogfree_cover() { ?>
        <?php $cover_url = mlogfree_home_cover_image(); ?>
        <?php if( !empty( $cover_url ) && is_home() && is_paged() == FALSE ) { ?>
            <div id="mlogfree_cover" style="background-image:url(<?php echo esc_url( $cover_url );  ?>)">
                <div class="moc-lop-phu"></div>
                <div class="moc-cover-text">
                    <span class="cover-title"><?php echo esc_attr( mlogfree_home_cover_title() ); ?></span>
                    <span class="cover-desc"><?php echo esc_attr( mlogfree_home_cover_desc() ); ?></span>
                </div>
                <a href="#site-header" class="scroll-downnbt light-textnbt">
                    <?php echo wp_kses_post( mlogfree_home_cover_icon() ); ?>
                </a>
            </div>
        <?php } ?>
    <?php }
}

// Cover class
if ( ! function_exists( 'mlogfree_cover_class' ) ) {
    function mlogfree_cover_class() { 
        $cover_url = esc_url( mlogfree_home_cover_image() );
        if( !empty( $cover_url ) && is_home() && is_paged() == FALSE ) { 
            $class = 'cover';
        } else {
            $class = 'nocover';
        }
        return $class;
    }
}

// Container class
if ( ! function_exists( 'mlogfree_container_class' ) ) {
    function mlogfree_container_class() {
        if ( is_active_sidebar('sidebar') ) {
            $class = "right-sidebar";
        } else {
            $class = "no-sidebar";
        }
        return $class;
    }
}

// Main class
if ( ! function_exists( 'mlogfree_main_class' ) ) {
    function mlogfree_main_class() {
        if ( is_active_sidebar('sidebar') ) {
            $class = "col col-8 col-tb-12 col-tb-top";
        } else {
            $class = "col col-12";
        }
        return $class;
    }
}

// Footer class
if ( ! function_exists( 'mlogfree_footer_class' ) ) {
    function mlogfree_footer_class() { 
        if ( is_active_sidebar('footer-1') ) {
            $i1 = 1;
        } else {
            $i1 = 0;
        }
        if ( is_active_sidebar('footer-2') ) {
            $i2 = 1;
        } else {
            $i2 = 0;
        }
        if ( is_active_sidebar('footer-3') ) {
            $i3 = 1;
        } else {
            $i3 = 0;
        }
        (int)$i = (int)$i1 + (int)$i2 + (int)$i3;
        
        $numcol = (12 / (int)$i);
        
        return $numcol;
    }
}

//Feature Post
if ( ! function_exists( 'mlogfree_feature_post' ) ) {
    function mlogfree_feature_post() { ?>
        <?php if ( mlogfree_home_feature_post() == 'yes' ) { ?>
            <div id="feature-post">
                <div class="container">
                    <h2>
                        <a href="<?php echo esc_url( get_category_link( mlogfree_home_feature_post_id() ) ); ?>">
                            <?php esc_attr_e('Feature Post', 'mlog-free'); ?>
                        </a>
                    </h2>
                    <?php
                        $moc = new WP_Query(
                            array(
                                'post_type'             => 'post',
                                'post_status'           => 'publish',
                                'cat'                   => mlogfree_home_feature_post_id(),
                                'orderby'               => mlogfree_home_feature_post_sort(),
                                'posts_per_page'        => 3,
                                'ignore_sticky_posts'   => 1
                            )
                        );
                    ?>
                    <div class="row">
                        <?php $i=1; while ($moc->have_posts()) : $moc->the_post(); ?>
                            <?php if( $i == 1 ) { ?>
                                <div class="col col-6 col-mb-12 col-mb-top">
                                    <a href="<?php the_permalink() ;?>" title="<?php the_title_attribute(); ?>" class="feature-post-item">
                                        <?php the_post_thumbnail( "mlogfree-thumbnail"); ?>
                                        <span class="feature-post-title"><?php the_title_attribute() ;?></span>
                                    </a>
                                </div>
                                <div class="col col-6 col-mb-12 a">
                            <?php } else { ?>
                                <a href="<?php the_permalink() ;?>" title="<?php the_title_attribute() ;?>" class="feature-post-item">
                                    <?php the_post_thumbnail( "mlogfree-thumbnail-small"); ?>
                                    <span class="feature-post-title"><?php the_title_attribute() ;?></span>
                                </a>
                            <?php } ?>
                        <?php $i++; endwhile ; wp_reset_postdata() ;?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }
}

// Breadcrumbs
if ( ! function_exists( 'mlogfree_breadcrumb' ) ) {
    function mlogfree_breadcrumb() {
        if(!is_home()) {
            echo '<div id="breadcrumb"><div class="container">';
                echo '<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">';
                echo '<div typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="'.esc_url( home_url( '/' ) ).'" title="' . esc_attr( get_bloginfo('name') ) . '">' . sprintf( esc_attr__( 'Home', 'mlog-free'));
                echo '</a></div>';
                if (is_search()) {
                    echo '<span class="arrow">›</span>' . esc_attr_e( 'Search', 'mlog-free').'</div>';
                }
                if (is_tag()) {
                    echo '<span class="arrow">›</span><div typeof="v:Breadcrumb"><a href="' . esc_url( get_tag_link( get_queried_object()->term_id ) ). '" title="'. esc_attr( single_tag_title( '', false ) ).'" rel="v:url" property="v:title">'. esc_attr( single_tag_title( '', false ) ).'</a></div>';
                }
                if (is_tax()) {
                    echo '<span class="arrow">›</span><div typeof="v:Breadcrumb"><a href="'. esc_url( get_term_link( get_queried_object()->term_id ) ).'" title="'. esc_attr( single_term_title( '', false ) ).'" rel="v:url" property="v:title">'. esc_attr( single_term_title( '', false ) ).'</a></div>';
                }
                if (is_category()) {
                    $category = get_category(get_query_var('cat'));
                    echo '<span class="arrow">›</span><div typeof="v:Breadcrumb"><a href="'.esc_url( get_category_link( $category->term_id ) ).'" title="'. esc_attr( $category->cat_name ) .'" rel="v:url" property="v:title">'.esc_attr( $category->cat_name ).'</a></div>';
                }
                if (is_single()) {
                    $categories = get_the_category();
                    if($categories){
                        foreach($categories as $category) {
                            echo '<span class="arrow">›</span><div typeof="v:Breadcrumb"><a href="'.esc_url( get_category_link( $category->term_id ) ).'" title="'.esc_attr( $category->cat_name ).'" rel="v:url" property="v:title">'.esc_attr( $category->cat_name ).'</a></div>';
                        }
                    }
                } else if (is_page()) {
                    echo '<span class="arrow">›</span><div typeof="v:Breadcrumb"><span property="v:title">';
                    the_title_attribute();
                    echo '</span></div>';
                }
                echo '</div>';
            echo '</div></div>';
        }
    }
}

// Back to top
if ( ! function_exists( 'mlogfree_back_to_top' ) ) {
    function mlogfree_back_to_top() { ?>
        <a href="#" id="back-to-top" class="fas <?php echo esc_attr( mlogfree_cover_class() ); ?>"><i class="fas fa-arrow-up"></i></a>
    <?php }
}