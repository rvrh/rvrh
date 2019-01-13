<?php

// Cover image
function mlogfree_home_cover_image() {
    $string = get_header_image();
    return $string;
}

// Cover title
function mlogfree_home_cover_title() {
    $string = get_theme_mod('mlogfree_home_cover_title');
    return $string;
}

// Cover desc
function mlogfree_home_cover_desc() {
    $string = get_theme_mod('mlogfree_home_cover_desc');
    return $string;
}

// Cover desc
function mlogfree_home_cover_icon() {
    $string = get_theme_mod('mlogfree_home_cover_icon');
    if ( empty( $string ) ) {
        $string = '<i class="fas fa-angle-double-down"></i>';
    } else {
        $string = get_theme_mod('mlogfree_home_cover_icon');
    }
    return $string;
}

// Feature Post
function mlogfree_home_feature_post() {
    $string = get_theme_mod('mlogfree_home_feature_post');
    if ( empty( $string ) ) {
        $string = 'no';
    } else {
        $string = get_theme_mod('mlogfree_home_feature_post');
    }
    return $string;
}

// Feature Post ID
function mlogfree_home_feature_post_id() {
    $string = get_theme_mod('mlogfree_home_feature_post_ID');
    return $string;
}

// Feature Post Sort
function mlogfree_home_feature_post_sort() {
    $string = get_theme_mod('mlogfree_home_feature_post_sort');
    if ( empty( $string ) ) {
        $string = 'ID';
    } else {
        $string = get_theme_mod('mlogfree_home_feature_post_sort');
    }
    return $string;
}