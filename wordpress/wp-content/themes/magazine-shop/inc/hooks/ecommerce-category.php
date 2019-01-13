<?php
if (!function_exists('magazine_shop_ecommerce_grid')) :
    /**
     * Front Page Featured product category
     */
    function magazine_shop_ecommerce_grid()
    {
        if (1 == magazine_shop_get_option('show_ecommerce_cat_section')) {
            $product_cat = array(
                magazine_shop_get_option('drop_down_category_ecommerce_1'),
                magazine_shop_get_option('drop_down_category_ecommerce_2'),
                magazine_shop_get_option('drop_down_category_ecommerce_3'),
            );

            ?>
            <div class="woo-categories-widget">
                <div class="container">
                    <div class="row">
                        <?php
                        if (isset($product_cat) && !empty($product_cat)):
                            foreach ($product_cat as $cat_id):
                                if (0 != absint($cat_id)):
                                    if ($term = get_term_by('id', $cat_id, 'product_cat')):
                                        $term_name = $term->name;
                                        $term_link = get_term_link($cat_id, 'product_cat');

                                        $meta = get_term_meta($cat_id);
                                        if (isset($meta['thumbnail_id'])) {
                                            $thumb_id = $meta['thumbnail_id'][0];
                                            $thumb_url = wp_get_attachment_image_src($thumb_id, 'magazine-shop-400-260');
                                            $thumb_url = $thumb_url[0];
                                        } else {
                                            $thumb_url = get_template_directory_uri() . '/images/no-image-900x600.jpg';
                                        }
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="category-list-wrapper">
                                                <div class="category-list">
                                                    <div class="product-image">
                                                        <a href="<?php echo $term_link; ?>">
                                                            <img src="<?php echo $thumb_url; ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <div class="table-align">

                                                        </div>
                                                        <h2 class="category-title primary-font">
                                                            <?php echo $term_name; ?>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
endif;
