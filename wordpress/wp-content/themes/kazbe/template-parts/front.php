<div class="frontPageContainer">
	
	<div class="frontMain">

		<?php 

				if( 'no' != get_theme_mod('kazbe_show_welcome') ): 

				$kazbeWelcomePostTitle = '';
				$kazbeWelcomePostDesc = '';

				if( '' != get_theme_mod('kazbe_welcome_post') && 'select' != get_theme_mod('kazbe_welcome_post') ){

					$kazbeWelcomePostId = get_theme_mod('kazbe_welcome_post');

					if( ctype_alnum($kazbeWelcomePostId) ){

						$kazbeWelcomePost = get_post( $kazbeWelcomePostId );

						$kazbeWelcomePostTitle = $kazbeWelcomePost->post_title;
						$kazbeWelcomePostDesc = $kazbeWelcomePost->post_excerpt;
						$kazbeWelcomePostContent = $kazbeWelcomePost->post_content;

					}

				}



		?>		
		<div class="frontWelcomeContainer">

			<h1><?php echo esc_html($kazbeWelcomePostTitle); ?></h1>
			<div class="frontWelcomeContent">
				<p>
					<?php 
					
						if( '' != $kazbeWelcomePostDesc ){
							
							echo esc_html($kazbeWelcomePostDesc);
							
						}else{
							
							echo esc_html($kazbeWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontWelcomeContent -->

		</div><!-- .frontWelcomeContainer -->
		<?php endif; ?>
		
		
		<div class="frontLeftContainer">
			
			<?php if( '' != get_theme_mod('kazbe_products_title') ): ?>
			<h2>
				<?php echo esc_html(get_theme_mod('kazbe_products_title')); ?>
			</h2>
			<?php endif; ?>
			
			<?php

				$kazbe_left_cat = '';

				if(get_theme_mod('kazbe_products_cat')){
					$kazbe_left_cat = get_theme_mod('kazbe_products_cat');
				}else{
					$kazbe_left_cat = 0;
				}		

				$kazbe_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 5,
				   'cat' => $kazbe_left_cat
				);

				$kazbe_left = new WP_Query($kazbe_left_args);		

				if ( $kazbe_left->have_posts() ) : while ( $kazbe_left->have_posts() ) : $kazbe_left->the_post();
   			?> 
			<div class="frontColumnItem">
				
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(kazbelimitedstring(get_the_content(), 50));
						}
					
					?>
				</p>
				
			</div><!-- .frontColumnItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontLeftContainer -->
		
		<div class="frontMiddleContainer">
			
			<?php if( '' != get_theme_mod('kazbe_services_title') ): ?>
			<h2>
				<?php echo esc_html(get_theme_mod('kazbe_services_title')); ?>
			</h2>
			<?php endif; ?>
			
			<?php

				$kazbe_middle_cat = '';

				if(get_theme_mod('kazbe_services_cat')){
					$kazbe_middle_cat = get_theme_mod('kazbe_services_cat');
				}else{
					$kazbe_middle_cat = 0;
				}		

				$kazbe_middle_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 5,
				   'cat' => $kazbe_middle_cat
				);

				$kazbe_middle = new WP_Query($kazbe_middle_args);		

				if ( $kazbe_middle->have_posts() ) : while ( $kazbe_middle->have_posts() ) : $kazbe_middle->the_post();
   			?> 
			<div class="frontColumnItem">
				
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(kazbelimitedstring(get_the_content(), 50));
						}
					
					?>
				</p>
				
			</div><!-- .frontColumnItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
			
		</div><!-- .frontMiddleContainer -->		

	</div><!-- .frontMain -->

	<div class="frontSide">

		<div class="frontNewsContainer">
			
			<?php if( '' != get_theme_mod('kazbe_news_title') ): ?>
			<h2>
				<?php echo get_theme_mod('kazbe_news_title'); ?>
			</h2>
			<?php endif; ?>
			
			<?php

				$kazbe_right_cat = '';

				if(get_theme_mod('kazbe_news_cat')){
					$kazbe_right_cat = get_theme_mod('kazbe_news_cat');
				}else{
					$kazbe_right_cat = 0;
				}		

				$kazbe_right_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 2,
				   'cat' => $kazbe_right_cat
				);

				$kazbe_right = new WP_Query($kazbe_right_args);		

				if ( $kazbe_right->have_posts() ) : while ( $kazbe_right->have_posts() ) : $kazbe_right->the_post();
   			?> 			
			<div class="frontNewsItem">
				
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(kazbelimitedstring(get_the_content(), 100));
						}
					
					?>				
				</p>
				<p class="readmore"><a href="<?php echo esc_url(get_the_permalink()); ?>">Read More</a></p>
				
			</div><!-- .frontNewsItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
			
		</div><!-- .frontNewsContainer -->
		
		<?php 

				if( 'no' != get_theme_mod('kazbe_show_quote') ): 

				$kazbeQuoteTitle = '';
				$kazbeQuoteDesc = '';

				if( '' != get_theme_mod('kazbe_quote_post') && 'select' != get_theme_mod('kazbe_quote_post') ){

					$kazbeQuoteId = get_theme_mod('kazbe_quote_post');

					if( ctype_alnum($kazbeQuoteId) ){

						$kazbeQuote = get_post( $kazbeQuoteId );

						$kazbeQuoteTitle = $kazbeQuote->post_title;
						$kazbeQuoteDesc = $kazbeQuote->post_excerpt;
						$kazbeQuoteContent = $kazbeQuote->post_content;

					}

				}



		?>		
		<div class="frontQuoteContainer">
			
			<p>
			<?php 
					
				if( '' != $kazbeQuoteDesc ){
							
					echo esc_html($kazbeQuoteDesc);
							
				}else{
							
					echo esc_html(kazbelimitedstring($kazbeQuoteContent, 300));
							
				}
					
			?>			
			</p>
			<p><span><?php echo esc_html($kazbeQuoteTitle); ?></span></p>			
			
		</div><!-- .frontQuoteContainer -->
		<?php endif; ?>
		
	</div><!-- .frontSide -->
	
</div><!-- .frontPageContainer -->	