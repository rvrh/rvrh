<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package magazine-shop
 */

if (!function_exists('magazine_shop_trigger_custom_css_action')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function magazine_shop_trigger_custom_css_action()
    {
        $magazine_shop_enable_banner_overlay = magazine_shop_get_option('enable_overlay_option');
        ?>
        <style type="text/css">
            <?php
            /* Banner Image */
            if ( $magazine_shop_enable_banner_overlay == 1 ){
                ?>
                    .inner-header-overlay {
                        background: #282828;
                        filter: alpha(opacity=65);
                        opacity: 0.65;
                    }
            <?php
        } ?>
        </style>

    <?php }

endif;