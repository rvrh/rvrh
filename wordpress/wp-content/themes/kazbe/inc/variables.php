<?php

$kazbePostsPagesArray = array(
	'select' => __('Select a post/page', 'kazbe'),
);

$kazbePostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$kazbePostsPagesQuery = new WP_Query( $kazbePostsPagesArgs );
	
if ( $kazbePostsPagesQuery->have_posts() ) :
							
	while ( $kazbePostsPagesQuery->have_posts() ) : $kazbePostsPagesQuery->the_post();
			
		$kazbePostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$kazbePostsPagesTitle = get_the_title();
		}else{
				$kazbePostsPagesTitle = get_the_ID();
		}
		$kazbePostsPagesArray[$kazbePostsPagesId] = $kazbePostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$kazbeYesNo = array(
	'select' => __('Select', 'kazbe'),
	'yes' => __('Yes', 'kazbe'),
	'no' => __('No', 'kazbe'),
);

$kazbeSliderType = array(
	'select' => __('Select', 'kazbe'),
	'header' => __('WP Custom Header', 'kazbe'),
	'slider' => __('kazbe Header', 'kazbe'),
);

$kazbeServiceLayouts = array(
	'select' => __('Select', 'kazbe'),
	'one' => __('One', 'kazbe'),
	'two' => __('Two', 'kazbe'),
);

$kazbeAvailableCats = array( 'select' => 'Select' );

$kazbe_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $kazbe_categories_raw as $category ){
	
	$kazbeAvailableCats[$category->term_id] = $category->name;
	
}
