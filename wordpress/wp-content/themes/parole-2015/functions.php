<?php

// Register parent style

add_action( 'wp_enqueue_scripts', 'parole2015_enqueue_styles' );
function parole2015_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


?>