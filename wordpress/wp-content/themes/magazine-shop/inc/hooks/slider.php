<?php
if (!function_exists('magazine_shop_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since magazine-shop 1.0.0
     *
     */
    function magazine_shop_banner_slider()
    {
        if (1 != magazine_shop_get_option('show_slider_section')) {
            return null;
        }
        $magazine_shop_slider_category = esc_attr(magazine_shop_get_option('select_category_for_slider'));
        $magazine_shop_slider_number = 3;
        ?>
        <!-- slider News -->
        <section class="main-banner">
            <?php
            $magazine_shop_banner_slider_args = array(
                'post_type' => 'post',
                'cat' => esc_attr($magazine_shop_slider_category),
                'ignore_sticky_posts' => true,
                'posts_per_page' => absint( $magazine_shop_slider_number ),
            ); ?>
            <?php 
            $magazine_shop_slider_layout = '';
            if (magazine_shop_get_option('slider_layout_option') == 'full-width') {
                $magazine_shop_slider_layout = 'mainbanner-jumbotron-fullwidth';
            } elseif (magazine_shop_get_option('slider_layout_option') == 'boxed') {
                $magazine_shop_slider_layout = '';
            }
            ?>
            <!-- Slide -->
            <div class="mainbanner-jumbotron <?php echo esc_attr($magazine_shop_slider_layout);?>">
                <?php
                $magazine_shop_banner_slider_post_query = new WP_Query($magazine_shop_banner_slider_args);
                if ($magazine_shop_banner_slider_post_query->have_posts()) :
                    while ($magazine_shop_banner_slider_post_query->have_posts()) : $magazine_shop_banner_slider_post_query->the_post();
                        if(has_post_thumbnail()){
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                            $url = $thumb['0'];
                        }
                        else{
                            $url = '';
                        }
                        global $post;
                        $author_id = $post->post_author;
                        ?>
                            <figure class="slick-item">
                                <div class="data-bg data-bg-slide" data-background="<?php echo esc_url($url); ?>">
                                    <figcaption class="slider-figcaption">
                                        <div class="slider-figcaption-wrapper">
                                            <div class="title-wrap">
                                                <div class="item-metadata twp-meta-categories posts-date">
                                                    <?php magazine_shop_entry_category(); ?>
                                                </div>
                                                <h2 class="slide-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <div class="post-meta">
                                                    <span>
                                                        <?php echo esc_html__('Posted On: ', 'magazine-shop'); ?><?php the_time('F j, Y'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </div>
                            </figure>
                        <?php
                        endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('magazine_shop_action_front_page', 'magazine_shop_banner_slider', 40);
add_action('magazine_shop_action_front_page', 'magazine_shop_ecommerce_grid', 41);
