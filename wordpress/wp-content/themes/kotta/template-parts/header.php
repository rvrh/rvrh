<?php

	$kottaHeaderPostTitle = '';
	$kottaHeaderPostDesc = '';

	if( '' != get_theme_mod('kotta_slider_post') && 'select' != get_theme_mod('kotta_slider_post') ){

		$kottaHeaderPostId = get_theme_mod('kotta_slider_post');
		
		$kottaHeaderPostImage = get_stylesheet_directory_uri() . '/images/600.jpg';

		if( ctype_alnum($kottaHeaderPostId) ){

			$kottaHeaderPost = get_post( $kottaHeaderPostId );

			$kottaHeaderPostTitle = $kottaHeaderPost->post_title;
			$kottaHeaderPostDesc = $kottaHeaderPost->post_excerpt;
			$kottaHeaderPostContent = $kottaHeaderPost->post_content;
			$kottaHeaderPostUrl = get_permalink( $kottaHeaderPostId );
			
			if( has_post_thumbnail($kottaHeaderPostId) ){
				$kottaHeaderPostImage = wp_get_attachment_image_src( get_post_thumbnail_id( $kottaHeaderPostId ), 'full' );
				$kottaHeaderPostImage = $kottaHeaderPostImage[0];
			}			

		}

	}

?>


<div class="headerContainer">

	<div class="headerImage">
	
		<?php 
						
			if( '' != $kottaHeaderPostImage ){
				echo '<img src="' . esc_url($kottaHeaderPostImage) . '" />';
			} 
						
		?>		
		
	</div><!-- .headerImage -->
	
	<div class="headerContent">
		
		<h1><?php echo esc_html($kottaHeaderPostTitle); ?></h1>
		<div class="headerContentDesc">

			<p>
			<?php 
					
				if( '' != $kottaHeaderPostDesc ){
							
					echo esc_html($kottaHeaderPostDesc);
							
				}else{
							
					echo esc_html($kottaHeaderPostContent);
							
				}
					
			?>
			</p>
			<p><a class="headerContentLink" href="<?php echo esc_url($kottaHeaderPostUrl); ?>"><?php esc_html_e('Read More', 'kotta'); ?></a></p>
			
		</div><!-- .headerContentDesc -->
		
	</div><!-- .headerContent -->	
	
</div><!-- .headerContainer -->