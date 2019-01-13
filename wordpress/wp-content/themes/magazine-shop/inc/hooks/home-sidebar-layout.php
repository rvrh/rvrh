<?php
if ( ! function_exists( 'magazine_shop_widget_section' ) ) :
    /**
     *
     * @since Magazine Shop 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function magazine_shop_widget_section() {
        ?>
        <!-- Main Content section -->       
        <?php 
        $sidebar_home_1 = '';
        if (! is_active_sidebar( 'sidebar-home-2') ) {
            $sidebar_home_1 = "full-width";
        }?>
        <?php if ( is_active_sidebar( 'sidebar-home-1') || is_active_sidebar( 'sidebar-home-2') ) {  ?>
            <section class="section-block-upper">
                <div id="primary" class="content-area <?php echo esc_attr($sidebar_home_1); ?>">
                    <main id="main" class="site-main">
                        <?php dynamic_sidebar('sidebar-home-1'); ?>
                    </main>
                </div>
                <?php if (is_active_sidebar( 'sidebar-home-2') ) { ?>
                    <aside class="widget-area">
                        <div class="theiaStickySidebar">
                        <?php dynamic_sidebar('sidebar-home-2'); ?>
                            </div>
                    </aside>
                <?php } ?>
            </section>
        <?php } ?>
    <?php
    }
endif;
add_action( 'magazine_shop_action_sidebar_section', 'magazine_shop_widget_section', 50 );