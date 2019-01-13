    <?php


// Change Archive title
function mlogfree_archive_title( $title ) {
         
    $title = str_replace( 'Category: ', '', $title );
    $title = str_replace( 'Tag: ', '', $title );
    $title = str_replace( 'Author: ', '', $title );
    $title = str_replace( 'Year: ', '', $title );
    $title = str_replace( 'Month: ', '', $title );
    $title = str_replace( 'Day: ', '', $title );
    $title = str_replace( 'Archives: ', '', $title );
 
    return $title;
 
}
add_filter( 'get_the_archive_title', 'mlogfree_archive_title', 10, 1 );


// Change Submit buttom comment
function mlogfree_cmt_submit_button( $submit_button, $args ) {
    $submit_before = '<div class="form-group col col-12">';
    $submit_after = '</div>';
    return $submit_before . $submit_button . $submit_after;
};
add_filter( 'comment_form_submit_button', 'mlogfree_cmt_submit_button', 10, 2 );


// Add theme edit style
function mlogfree_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'mlogfree_add_editor_styles' );


// Add theme customize css
function mlogfree_customize_theme() { ?>
<style type="text/css">

/* Custom Header text color */
<?php $header_textcolor = get_theme_mod('header_textcolor'); if( !empty( $header_textcolor ) ) { ?>
    #site-header, #site-header a {
        color: #<?php echo esc_attr( $header_textcolor ); ?>;
    }
<?php } ?>

/* Custom body background color */
<?php $background_color = get_theme_mod('background_color'); if( !empty( $background_color ) ) { ?>
    .custom-background #main {
        background: #<?php echo esc_attr( $background_color ); ?>;
    }
<?php } ?>

/* Custom body background image */
<?php $background_image = get_theme_mod('background_image'); if( !empty( $background_image ) ) { ?>
    .custom-background #main {
        background-image: url(<?php echo esc_attr( $background_image ); ?>);
        background-repeat: <?php echo esc_attr(get_theme_mod('background_repeat', 'no-repeat')); ?>;
        background-position: <?php echo esc_attr(get_theme_mod('background_position', 'center center')); ?>;
        background-size: cover;
    }
<?php } ?>
</style>
<?php }


// Filter the except length to 19 words
function mlogfree_excerpt_length( $length ) {
    return 19;
}
add_filter( 'excerpt_length', 'mlogfree_excerpt_length', 999 );


// Filter the excerpt "read more" string
function mlogfree_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'mlogfree_excerpt_more' );