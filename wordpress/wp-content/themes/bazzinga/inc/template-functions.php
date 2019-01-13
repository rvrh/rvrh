<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bazzinga
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bazzinga_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$classes[] = 'no_scroll';

	return $classes;
}
add_filter( 'body_class', 'bazzinga_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bazzinga_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bazzinga_pingback_header' );



/*
=================================================
Pre Loader 
@Action: bazzinga_pre_loader
=================================================
*/

if( !function_exists( 'bazzinga_pre_loader_sec_fnc' )):
	function bazzinga_pre_loader_sec_fnc (){ ?>
		<div class="bazz_loader preloader"></div>
		<div class=" bazz_loader preloading-icon"> 
			<div class="bazz-folding-cube">
				<div class="bazz-cube1 bazz-cube"></div>
				<div class="bazz-cube2 bazz-cube"></div>
				<div class="bazz-cube4 bazz-cube"></div>
				<div class="bazz-cube3 bazz-cube"></div>
			</div>
		</div>
	<?php 
}
endif;

/*
=================================================
Header Banner
@Action: bazzinga_banner_header_fnc
=================================================
*/

if ( ! function_exists( 'bazzinga_header_banner_sec_fnc' ) ) :

function bazzinga_header_banner_sec_fnc(){

	if( is_page_template( array('page-templates/tpl_homepage_creative.php', 'page-templates/tpl_homepage_business.php', 'page-templates/tpl_homepage_classic.php' )  ) ){ 
		if ( is_page_template('page-templates/tpl_homepage_creative.php') ){
			do_action('bazzinga_home_banner_sec_creative');
		}
		elseif( is_page_template('page-templates/tpl_homepage_business.php') ){
			do_action('bazzinga_home_banner_sec_business');
		}
		elseif( is_page_template('page-templates/tpl_homepage_classic.php') ){
			do_action('bazzinga_home_banner_sec_classic');
		} 
	} else{
		if ( get_header_image() ) : ?>
			<div class="content-wrap">
				<div class="inner-header-wrapper if-bg">
					<img src="<?php echo esc_url(( get_header_image()) ); ?>" alt="<?php echo esc_attr(( get_bloginfo( 'title' )) ); ?>" />
					<div class="bazz_main_heading">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="bazz_main_heading__1">
										<?php if( is_archive() ){
												the_archive_title( '<h1 class="page-title a">', '</h1>' );
											}else{
												the_title('<h1 class="page-title p">', '</h1>');
											}
											// Check if NavXT plugin activated
											if( class_exists( 'breadcrumb_navxt' ) ) {
												echo '<div class="bazz_breadcrumb">';
												bcn_display();
												echo '</div>';
											} 
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		<?php endif;
	}

} endif;



/*
=================================================
Homepage Banner Section Function
@Action: bazzinga_home_banner_sec_creative
=================================================
*/
if ( ! function_exists( 'bazzinga_home_banner_sec_creative_fnc' ) ) :

function bazzinga_home_banner_sec_creative_fnc(){ 
	?>
<section class="homepage_banner_wrap hero-image bazz_creative_style" data-aos="zoom-in"  data-aos-delay="800"  style="background-image: url(<?php if(has_post_thumbnail()){ echo esc_url( get_the_post_thumbnail_url() ); }?>);">
	<?php 
		if ( true == get_theme_mod( 'homepage_banner_display_setting', true ) ) :
	?>
		<div class="hero-post-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-6 offset-md-2 offset-lg-6">
					<div class="d-flex justify-content-end home_banner_wrap">	
					<?php
					$homepage_banner_post_id= get_theme_mod('homepage_banner_post_display_setting');
					if( $homepage_banner_post_id ){
						
						$bazzinga_banner_query  = new WP_Query( array( 
														'cat' => absint( $homepage_banner_post_id ) , 
														'posts_per_page' => 4 
																) );

						while ( $bazzinga_banner_query->have_posts() ) : $bazzinga_banner_query->the_post();
					 	?>
						<div class="hero-post article-post" data-aos="fade-up" data-aos-delay="1200">
							<article class="homepage_banner_post" >
								<div class="p-4">
									<div class="row">
										<div class="col-md-4" data-aos="fade-up">
											<div class="entry-meta">
												<?php if( has_tag() ){ ?>
													<div class="blog-cat">
														<i class="fas fa-tag"></i>
														<?php the_tags( '', ', ', '' ); ?>
													</div>
												<?php } ?>
												<div class="blog_date_author">
													<span class="blog_date"><i class="far fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?> </span>
													<span class="blog_author"><i class="fas fa-user"></i> <?php the_author(); ?> </span>
												</div>
											</div><!-- .entry-meta -->
											 
											<p><?php
												the_excerpt();
											 ?>								
											</p>
										</div>
										<div class="col-md-8">
											<?php if( has_post_thumbnail() ): ?>
												<figure>
												<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'bazzinga_post_image1')); ?>">
														<?php the_category() ; ?>
							
												</figure>
											<?php endif; ?>
											<div class="post-title">
												<h1>
													<span class="heading-line">
														<a class="pre-wrap-bg" href="<?php the_permalink();?>"><?php
															the_title();
														?></a>
													</span>
												</h1>
												<div class="banner_author_content">
													<span class="author_label">
														<?php esc_html_e('Author:' ,'bazzinga'); ?>
													</span>	
													<span class="author_name">
													<?php 
														the_author();
														?>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</article>
						</div>
						<?php endwhile; wp_reset_postdata(); } ?> 
					</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
</section>
<?php 
}
endif;



/*
=================================================
Homepage Banner Section Function
@Action: bazzinga_home_banner_sec_business
=================================================
*/
if ( ! function_exists( 'bazzinga_home_banner_sec_business_fnc' ) ) :

function bazzinga_home_banner_sec_business_fnc(){ 
	?>
<section class="homepage_banner_wrap hero-image bazz_business_style"  data-aos="zoom-in"  data-aos-delay="800" style="background-image: url(<?php if(has_post_thumbnail()){ echo esc_url( get_the_post_thumbnail_url() ); } ?>);">
	<?php 
		if ( true == get_theme_mod( 'homepage_banner_display_setting', true ) ) :
	?>
	<div class="hero-post-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1  data-aos="fade-up" data-aos-delay="1000">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>

			<div class="row bazz_banner_header">
				<?php
				$homepage_banner_post_id= get_theme_mod('homepage_banner_post_display_setting');
				if( $homepage_banner_post_id ){
					
					$bazzinga_banner_query  = new WP_Query( array( 
													'cat' => absint( $homepage_banner_post_id ) , 
													'posts_per_page' => 4 
															) );
					$business_header_delay = 1200;

					while ( $bazzinga_banner_query->have_posts() ) : $bazzinga_banner_query->the_post();
				 	?>
					 	<div class="col-lg-3">
							<article class="homepage_banner_post" data-aos="fade-up"  data-aos-delay="<?php echo esc_attr( $business_header_delay );?>">
								<div class="hero-post article-post"  >
									<div class="p-md-4">
										<div class="post-title">
											<h2 >
												<a class="pre-wrap-bg" href="<?php the_permalink();?>"><?php
													the_title();
												?></a>
											</h2>
										</div>
										<div class="post-content">
											<p><?php echo wp_kses_post( wp_trim_words( get_the_content(), '8' ,'...' ) ); ?></p>
										</div>

										<a href="<?php the_permalink();?>" class="links bz-white">
											<?php esc_html_e( 'Read More', 'bazzinga') ; ?>
										</a>

									</div>
								</div>
							</article>
						</div>
					<?php 
					$business_header_delay = $business_header_delay+100;
					endwhile; wp_reset_postdata(); } ?> 
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
</section>
<?php 
}
endif;

/*
=================================================
Homepage Banner Section Function classic
@Action: bazzinga_home_banner_sec_classic
=================================================
*/
if ( ! function_exists( 'bazzinga_home_banner_sec_classic_fnc' ) ) :

function bazzinga_home_banner_sec_classic_fnc(){ 
	?>
<section class="homepage_banner_wrap bazz_classic_style" >
	<div class="homepage_three_banner">
		<?php 
			if ( true == get_theme_mod( 'homepage_banner_display_setting', true ) ) :
			$homepage_banner_post_id= get_theme_mod('homepage_banner_post_display_setting');
			if( $homepage_banner_post_id ){
				
				$bazzinga_banner_query  = new WP_Query( array( 
												'cat' => absint( $homepage_banner_post_id ) , 
												'posts_per_page' => 4 
														) );

				while ( $bazzinga_banner_query->have_posts() ) : $bazzinga_banner_query->the_post();
			 	?>
				<article class="homepage_banner_post bazz_homepage_three" style="background-image: url(<?php if( has_post_thumbnail() ){ echo esc_url( get_the_post_thumbnail_url(get_the_ID(),'full') ); } ?>)" data-aos="zoom-in"  data-aos-delay="800" >
					<div class="bazz_banner_caption text-center"  >
						<div class="container">
							<div class="row">
								<div class="col-md-8 offset-md-2" data-aos="fade-up"  data-aos-delay="1200">
									<div class="post-title">
										<h1>
											<a class="pre-wrap-bg" href="<?php the_permalink();?>"><?php
													the_title();
												?></a> 
										</h1>
									</div>
									<p><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink();?>" class="primary-btn btn"><?php esc_html_e( 'Read More', 'bazzinga'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); } ?> 
		<?php endif; ?>
	</div>
</section>
<?php 
}
endif;


/*
=================================================
Homepage Design Develop Section
@Action: bazzinga_home_design_develop_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_home_design_develop_sec_fnc' ) ) :

function bazzinga_home_design_develop_sec_fnc(){ 
?>
<section class="homepage_design-and-develop_wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-5">
				<?php 
				$designdevelop_post_id= get_theme_mod(
								'homepage_design_and_develop_post_display_setting');
				if( $designdevelop_post_id ){
				$bazz_designdevelop_post = get_post( absint($designdevelop_post_id) );
				 ?>
				<article>
					<div class="article-post " data-aos="fade-right" >
						<div class="px-4 pt-4">
							<div class="row">
								<div class="col-md-6">
									<p>
										<?php
										 echo wp_kses_post( wp_trim_words( $bazz_designdevelop_post->post_content, '10' ) ); ?>
									</p>
								</div>
								<div class="col-md-6">
									<div class="post-title">
										<h2>
											<a class="heading-line" href="<?php the_permalink( $designdevelop_post_id );?>"> <?php echo get_the_title( $designdevelop_post_id  ); ?> 
											</a>
										</h2>
									</div>
								</div> 
							</div>
						</div>
					<?php
						$bazz_design_img = wp_get_attachment_image_src( get_post_thumbnail_id( $designdevelop_post_id ), 'bazzinga_post_image2' );
						if($bazz_design_img){
						?>
						<figure class="m-0">
							<img src="<?php echo esc_url( $bazz_design_img[0] ); ?>">
						</figure>
					<?php } ?>	
					</div>
				</article>
				<?php wp_reset_postdata(); } ?>
			</div>
			<div class="col-md-6 col-lg-7 ">
				<?php
				$bazz_right_postid = get_theme_mod('homepage_design_and_develop_right_post_display_setting');
				if($bazz_right_postid){
					$bazz_designdev_right_post = get_post( absint($bazz_right_postid) );
				?>
					<div class="about-wrap px-md-5">
						<div class="sub-headline " data-aos="fade-up" >
							<a href="<?php echo esc_url( get_the_permalink( absint($bazz_right_postid) ) ); ?>">
								<?php
									echo get_the_title( absint( $bazz_right_postid ) );
								?>
							</a>
						</div>
						<div data-aos="fade-up" data-aos-delay="50">
							<p><?php 
								echo wp_kses_post( $bazz_designdev_right_post->post_content ); ?></p>
						</div>
						<div>
						<div  data-aos="fade-up"  data-aos-delay="100" >	
							<a href="<?php echo esc_url( get_the_permalink($bazz_right_postid) ); ?>" class="btn primary-btn">
							<?php esc_html_e('Read More', 'bazzinga'); ?>

							</a>
						</div>
								
					</div>
					<?php
				wp_reset_postdata();
				}
			?>
			</div>
		</div>
	</div>
</section>
<?php
} endif;


/*
=================================================
Homepage Services Section
@Action: bazzinga_home_services_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_home_services_sec_fnc' ) ) :

function bazzinga_home_services_sec_fnc(){ 
?>

<!-- homepage-service-section -->
<section class="homepage_service_wrap if-bg pt-7">
	<div class="container">
		<div class="row">
			<?php
				$services_left_text_id = get_theme_mod('homepage_service_left_text');
			?>
			<div class="col-md-5">
				<div class="what-we-offer " data-aos="fade-up">
					<?php 
					if( $services_left_text_id){
					$bazz_services_left_text = get_post( absint($services_left_text_id) );
					echo wp_kses_post( apply_filters('the_excerpt', $bazz_services_left_text->post_content) );
					} ?>
				</div>
			</div>
			<div class="col-md-7">
				<div class="row ">
				<div class="services-list row pl-md-5 pt-md-4">
			
				<?php 
					$services_cat_id = get_theme_mod(
											'homepage_service_category_setting'); ?>
					<?php
					if ($services_cat_id){
					$bazzinga_services_query  = new WP_Query( array( 
													'cat' => absint( $services_cat_id ) , 
													'posts_per_page' => 4 
															) );
						$bazz_service_delay = 0;
					while ( $bazzinga_services_query->have_posts() ) : 
						$bazzinga_services_query->the_post();
							
						 ?>
							<div class="col-md-12 col-lg-6">
								<div class="services-list-desc" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazz_service_delay); ?>">
									<div class="text-center services-list-desc">
								<?php 
								if( has_post_thumbnail() ){?>
								<figure><img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'bazzinga_services_image')); ?>"></figure>
								<?php } ?>
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt(); ?>
							</div>
							</div>
						</div>
					<?php 
						$bazz_service_delay= $bazz_service_delay+50;
						endwhile;
						wp_reset_postdata(); 
					} ?>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<?php }

endif;


/*
=================================================
Homepage Portfolio Section
@Action: bazzinga_home_porfolio_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_home_porfolio_sec_fnc' ) ) :

function bazzinga_home_porfolio_sec_fnc(){ 
?>
<section class="homepage_portfolio_wrap portfolio-style ">
	<div class="container">
		<?php $portfolio_cat_id = get_theme_mod('homepage_portfolio_cat');
			if($portfolio_cat_id){
		?>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo esc_url( get_category_link( absint( $portfolio_cat_id ) ) ); ?>"></a>
					<div class="sub-headline text-center" data-aos="fade-up" ><?php 
						echo esc_html( get_cat_name( absint( $portfolio_cat_id ) ) );
					?>
					</div>
				
				<h1 class="text-center" data-aos="fade-up" data-aos-delay="50">
					<div>
						<?php echo wp_kses_post( category_description( absint( $portfolio_cat_id ) ) ); ?>
					</div>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="portfolio-filter" data-aos="fade-up" data-aos-delay="100">
					<ul class="portfolio_design nav m-auto align-items-center justify-content-center ">
						<li class="show active" data-filter='*'><span class="links"><?php esc_html_e('ALL','bazzinga'); ?></span></li>
						<?php
						$bazz_portfolio_cat = get_categories(
						    array( 'parent' => absint( $portfolio_cat_id ) )
						);


						foreach($bazz_portfolio_cat as $bazz_portofolio_cat_child){ ?>
							<li class="show nav-item px-4" data-filter='.<?php echo esc_attr($bazz_portofolio_cat_child->slug ); ?>'>
								<span class="links"><?php echo esc_html( $bazz_portofolio_cat_child->name ); ?></span></li>
						<?php } ?>
					</ul>
				</div>
				<div class="portfolio_items row">
					<?php 
					$bazzinga_portfolio_query  = new WP_Query( array( 
													'cat' => absint( $portfolio_cat_id ) , 
													'posts_per_page' => 10 
															) );
					;
					$bazz_portfolio_delay = 0;
					while ( $bazzinga_portfolio_query->have_posts() ) : 
						$bazzinga_portfolio_query->the_post();
						$bazz_port_cat_inside = get_the_category();
						$bazz_portfolio_slug = $bazz_port_cat_inside[0]->slug;
						?>
							<div class="item <?php echo esc_attr($bazz_portfolio_slug); ?> col-md-4 mb-4 portfolio-style__1" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bazz_portfolio_delay ); ?>">
								<figure>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
								</figure>
								<div class="portfolio_content ">
									<div class="portfolio_content__1">
									
									<a class="bazz_portfolio_title_link" href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
									<span class="cat-links"><?php the_category(); ?></span>
									<a href="<?php the_permalink();?>" class="bazz_portfolio_link"><i class="fas fa-link"></i></a>
									</div>
								</div>
							</div>
						<?php 
							$bazz_portfolio_delay = $bazz_portfolio_delay+50;
							endwhile;  wp_reset_postdata();
						?>
				</div>
			</div>
			
		</div>
		<?php } ?>
	</div>
</section>
<?php 
}
endif;


/*
=================================================
Homepage Cta Section
@Action: bazzinga_home_cta_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_home_workwithus_sec_fnc' ) ) :

function bazzinga_home_workwithus_sec_fnc(){
?>
<section class="homepage_cta_section">
	<div class="container-fluid">
		<div class="homepage_work_with_us_wrap if-bg row ">
			<div class="col-md-12">
				<div class="sub-headline text-center" data-aos="fade-up" ><?php echo esc_html( get_theme_mod('homepage_portfolio_bottom_title') ); ?>
				</div>
				<h1 class="text-center" data-aos="fade-up" data-aos-delay="50"><?php echo esc_html( get_theme_mod( 'homepage_portfolio_bottom_subtitle' ) ); ?></h1>
				<?php if( get_theme_mod('homepage_portfolio_link_text')): ?>
					<div class="button text-center py-4" data-aos="fade-up" data-aos-delay="50">
						<a href="<?php echo esc_url( get_theme_mod( 'homepage_portfolio_link_text' ) ); ?>" class="primary-btn btn "><?php esc_html_e('Request a Quote', 'bazzinga'); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php }
endif;

/*
=================================================
Homepage My Approach Section
@Action: myapproach_home_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_home_approach_sec_fnc' ) ) :

function bazzinga_home_approach_sec_fnc(){
?>
<section class="homepage_our_approach_wrap "> 
	<div class="container">
		<?php
		$bazz_myapproach_cat = get_theme_mod('our_approach_category_setting');
		if( $bazz_myapproach_cat ){
			?>
			<div class="row">
				<div class=" col-md-6 col-lg-7 order-12 order-md-1">
					<div class="row">
					<?php
					$bazzinga_myapproach_query  = new WP_Query( array( 
														'cat' => absint( $bazz_myapproach_cat ) , 'posts_per_page' => 8) );

						while ( $bazzinga_myapproach_query->have_posts() ) : 
							$bazzinga_myapproach_query->the_post();
							?>
						<div class="col-md-6">
							<div class="counter-number-list" data-aos="fade-up" >
								<?php 
								if( has_post_thumbnail() ){ ?>
								<figure>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'bazzinga_services_image') ); ?>">
								<?php } ?>
								</figure>
								
								<h1 class="counter-number counter"> <?php the_content();  ?> </h1>
								<span class="title-counter"><?php the_title(); ?></span>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
				<div class="col-md-6 col-lg-5 order-1 order-md-12">
					<div class="our-approach-desc if-bg">
						<div class="sub-headline" data-aos="fade-up" ><?php 
							echo esc_html( get_cat_name( $bazz_myapproach_cat ) );
						?></div>
						<h1  data-aos="fade-up" data-aos-delay="50"><?php echo wp_kses_post( category_description( $bazz_myapproach_cat ) ); ?></h1>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<?php
}
endif;


/*
=================================================
Homepage Our Team panel
@Action: myapproach_home_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_home_team_sec_fnc' ) ) :

function bazzinga_home_team_sec_fnc(){
	?>
	<!-- homepage-our-team-section -->
	<section class="homepage_our_team_wrap" >
		<div class="container">
			<?php
			$bazz_team_cat = get_theme_mod('our_team_category_setting');
			if($bazz_team_cat){
			?>
			<div class="row">
				<div class="col-md-6 team_left_content">
					<div class="stickey_left " >
						<div class="sub-headline" data-aos="fade-up"  ><?php echo esc_html( get_cat_name( absint( $bazz_team_cat ) ) ); ?></div>
						<div class="" data-aos="fade-up" data-aos-delay="100"  ><?php echo wp_kses_post( category_description( absint( $bazz_team_cat ) ) );?></div>
					</div>			
				</div>

				<div class="col-md-6 team_right_content_wrap">
					<div class="team_right_content">
						<div class="row">
						<?php
							$bazz_team_delay = 0; 
							$bazzinga_team_query  = new WP_Query( array( 
															'cat' => absint( $bazz_team_cat ) , 'posts_per_page' => 10) );

							while ( $bazzinga_team_query->have_posts() ) : 
								$bazzinga_team_query->the_post(); ?>
								<div class="col-md-12 col-lg-6 " data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bazz_team_delay ); ?>" data-aos-once="false">
									<div class="bazzinga_team">
										<div class="our_team_member">
											<?php 
												if( has_post_thumbnail() ){ ?>
												<figure>
													<img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'bazzinga_about_team_img') ); ?>"></figure>
											<?php } ?>
										</div>

										<div class="our_team_inner_design text-right"  >
											<h3><?php the_title(); ?></h3>
											<?php the_content(); ?> 
										</div>
									</div>
								</div>
							<?php $bazz_team_delay = $bazz_team_delay+50; endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
			</div>
			<?php } ?><!-- check for empty category -->
		</div>
	</section>


<?php 
}
endif;

/*
=================================================
Homepage Call to action panel
@Action: bazzinga_home_cta_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_home_cta_sec_fnc' ) ) :

function bazzinga_home_cta_sec_fnc(){
	?>

<section class="homepage_calltoaction_wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="article-post" data-aos="fade-up" >
						<?php
						$bazz_insta = get_theme_mod( 'homepage_calltoaction_twitter_shortcode' ); 
						if( $bazz_insta ){
							echo do_shortcode( esc_html( $bazz_insta ) ); 
						}
					?>
				</div>
			</div>
			<div class="col-md-7 if-bg">
				<div class="homepage_calltoaction_wrap__right pl-md-5" data-aos="fade-up" >
					<?php
					$bazz_contact_form = get_theme_mod( 'homepage_calltoaction_contact_form_shortcode' );
					if( $bazz_contact_form ){
						if( class_exists ('WPCF7') ){ // check if contact form 7 activated
							echo do_shortcode('[contact-form-7 id="'.absint($bazz_contact_form).'"]');
						}
					}
					?>
			</div>
		</div>
	</div>
</section>
<?php }

endif;

/*
=================================================
Homepage Testimonial panel
@Action: bazzinga_home_testimonial_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_home_testimonial_sec_fnc' ) ) :

function bazzinga_home_testimonial_sec_fnc(){
?>
<section class="homepage_testimonials_wrap  testimonial-style">
	<div class="container">
		<?php
		$bazz_testimonial_cat = get_theme_mod('testimonial_category_setting');
		if($bazz_testimonial_cat) {
			?>
		<div class="row if-bg">
			<div class="col-md-12">
				<div class="sub-headline text-center" data-aos="fade-up" ><?php echo esc_html( get_cat_name( $bazz_testimonial_cat ) ); ?></div>
				<h1 class="text-center text-center " data-aos="fade-up" data-aos-delay="50"><?php echo wp_kses_post( category_description( $bazz_testimonial_cat ) );?></h1>
			</div>
		</div>

		<div class="testimonial-style__1">
			<div class="row">
				<?php
					$bazzinga_testimonial_query  = new WP_Query( array( 
															'cat' => absint( $bazz_testimonial_cat ) , 'posts_per_page' => 8) );
					?>
					<div class="testimonials_inner_content">
						<?php
							$bazzinga_testimonial_delay = 0;
							while ( $bazzinga_testimonial_query->have_posts() ) : 
							$bazzinga_testimonial_query->the_post();
						?>
						<div class="col-md-4">
							<div class="bazzinga-testimonials" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazzinga_testimonial_delay); ?>">
								<div class="testimonials_inner_image">
									<figure><img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'bazzinga_testimonials_image') ); ?>" ></figure>
								</div>
							
								<div class="testimonials_inner_detail text-right scrollbar">
									<h3><?php the_title(); ?></h3>
									<?php the_content(); ?>
								</div>
							</div>

						</div>
						<?php $bazzinga_testimonial_delay = $bazzinga_testimonial_delay+ 50; endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<?php }
endif;

/*
=================================================
Homepage Blog Section
@Action: bazzinga_home_blog_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_home_blog_sec_fnc' ) ) :

function bazzinga_home_blog_sec_fnc(){
?>

<section class="homepage_blog_wrap">
	<div class="container">
		<?php
		$bazz_blog_cat = get_theme_mod('homepage_blog_post1_display_setting');
		if($bazz_blog_cat){ ?>
		<div class="row">
			<div class="col-md-4 blog_left_content">
				<div class="blog_left_stickey">
					<div class="sub-headline" data-aos="fade-up"><?php echo esc_html( get_cat_name( absint( $bazz_blog_cat ) ) ); ?></div>
					<div class="blog-main-heading" data-aos="fade-up" data-aos-delay="50"><?php echo wp_kses_post( category_description( absint( $bazz_blog_cat ) ) );?></div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
				<?php
				$bazzinga_blog_query  = new WP_Query( array( 
														'cat' => absint( $bazz_blog_cat ) , 'posts_per_page' => 10) );
				$bazzinga_blog_delay = 0;

				while ( $bazzinga_blog_query->have_posts() ) : 
						$bazzinga_blog_query->the_post();
				?>
				<div class="col-md-12 col-lg-6">
					<div class="article-post blog_wrap_single grid-layout" data-aos-once="false" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazzinga_blog_delay); ?>">
						<?php 
							get_template_part( 'template-parts/content', get_post_format() );
						?>
					</div>
				</div>
				<?php
					$bazzinga_blog_delay = $bazzinga_blog_delay+50;
					endwhile;
					wp_reset_postdata();
				?>
			
			</div>
		</div>
		</div>
		<?php } ?>
	</div>
</section>
<?php }
endif;

/*
=================================================
Homepage newsletter section
@Action: bazzinga_home_newsletter_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_home_newsletter_sec_fnc' ) ) :

function bazzinga_home_newsletter_sec_fnc(){
?>
<section class="homepage_newsletter" data-aos="fade-up" >
	<div class="container">
		<div class="col-md-12  col-lg-10 offset-lg-1">
			<div class="bazz_newsletter_wrap ">
				
				<div class="row">
					<div class="col-md-5">
						<div class=" py-3  px-5 "><h1><?php esc_html_e('Newsletter Subscribe', 'bazzinga'); ?> </h1></div>
					</div>
					<div class="col-md-7">
						<div class="homepage_newsletter-right py-5 px-5">
							<div class="top_subscribe_text ">
								<strong> <?php esc_html_e('WANT TO HEAR FROM US', 'bazzinga'); ?> </strong>
							</div> 
							<div class="pr-5 ">
								<?php  
								if( class_exists( 'Newsletter' ) ) {
									echo do_shortcode(get_theme_mod('homepage_newsletter_shortcode'));
								}
							?>
							</div>
							<div class="side_text">
								<span class="rotate-90 ">
									<?php esc_html_e('LET WORK WITH US', 'bazzinga'); ?>
								</span>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
} endif;


/*
=================================================
Homepage footer top
@Action: bazzinga_footer_top_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_footer_top_sec_fnc' ) ) :

function bazzinga_footer_top_sec_fnc(){
?>
<section class="homepage_contact_us if-bg"> 
	<div class="container">
		<div class="homepage_contact_us__wrap">
			<?php 
				if ( is_active_sidebar( 'footer-top-heading' ) ) {
			?>
			<div class="row footer_heading">
				<div class="col-md-12" data-aos="fade-up" >
					<?php 
						dynamic_sidebar( 'footer-top-heading' );
					 ?>
				</div>
			</div>
			<?php } ?>

			<div class="row">
			 	<div class="col-md-5" data-aos="fade-up" >
					<?php 
					if ( is_active_sidebar( 'footer-top-one' ) ) {
						dynamic_sidebar( 'footer-top-one' );
					}
					 ?>
				</div>
				<div class="col-md-7" data-aos="fade-up" data-aos-delay="50" >
					<?php 
					if ( is_active_sidebar( 'footer-top-two' ) ) {
						dynamic_sidebar( 'footer-top-two' );
					}
					 ?>
				</div>
			</div>
	</div>
</div>
</section>
<?php
} endif;

/*
=================================================
Homepage footer botton
@Action: bazzinga_footer_bottom_sec_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_footer_bottom_sec_fnc' ) ) :

function bazzinga_footer_bottom_sec_fnc(){

	if ( is_active_sidebar( 'footer-bottom-one' ) || is_active_sidebar( 'footer-bottom-two' ) || is_active_sidebar( 'footer-bottom-three' ) ) {
		?>
		<section class="homepage_footer_bottom_wrap if-bg"> 
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-bottom-one' ) ) { ?>
				 	<div class="col-md-4" data-aos="fade-up" >
						<?php dynamic_sidebar( 'footer-bottom-one' ); ?>
					</div>
					<?php } ?>

					<?php if ( is_active_sidebar( 'footer-bottom-two' ) ) { ?>
				 	<div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
						<?php dynamic_sidebar( 'footer-bottom-two' ); ?>
					</div>
					<?php } ?>

					<?php if ( is_active_sidebar( 'footer-bottom-three' ) ) { ?>
				 	<div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
						<?php dynamic_sidebar( 'footer-bottom-three' ); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	}
} endif;

/*
=================================================
Header Navigation
@Action: bazzinga_navigation_header_fnc
=================================================
*/
if ( ! function_exists( 'bazzinga_navigation_header_fnc' ) ) :

function bazzinga_navigation_header_fnc(){
?>
 
 
<div class="navbar navbar-color-on-scroll navbar-expand-lg navbar-transparent" id="bazz_header_nav">
 
	<div class="container">

		<div class="inner-logo">	
			<div class="site-branding navbar-brand">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
		</div>

		<div class="inner-mainNav">
			<nav id="main-nav site-navigation" class="main-navigation  navbar-collapse">
				<!-- Mobile menu toggle button (hamburger/x icon) -->
				<input id="main-menu-state" type="checkbox" />
				<label class="main-menu-btn" for="main-menu-state">
					<span class="main-menu-btn-icon"></span>
					<?php esc_html_e('Toggle main menu visibility','bazzinga'); ?>
				</label>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'container' => false,
    					'menu_class' => 'sm sm-clean',
    					'menu' => 'header-menu',
					) );
				?>
				<a href="javascript:void(0);"><i class="fa fa-search bazzinga_show_search"></i></a>
			</nav><!-- #site-navigation -->
		</div>
		<div class="header_search_form"  >
			<?php get_search_form(); ?>
			<a href="javascript:void(0);" class="header_search_close"><i class="fas fa-times-circle"></i></a>
		</div>
	</div>
</div>
<?php
}
endif;


/*
=================================================
Innerpage Services Section
@Action: bazzinga_innerpage_services_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_innerpage_services_sec_fnc' ) ) :

function bazzinga_innerpage_services_sec_fnc(){ 
?>

<!-- homepage-service-section -->
<section class="innerpage_service_wrap pt-7 pb-md-5">
	<div class="container">
		<div class="row">
			<?php
				$services_left_text_id = get_theme_mod('homepage_service_left_text');
			?>
			<div class="col-md-12">
				<div class="what-we-offer text-center" data-aos="fade-up"  data-aos-delay="1000">
					<?php 
					if( $services_left_text_id){
					$bazz_services_left_text = get_post( absint($services_left_text_id) );
					echo wp_kses_post( apply_filters('the_excerpt', $bazz_services_left_text->post_content) );
					} ?>
				</div>
			</div>

			<div class="col-md-12">
				<div class="services-list row pt-4">
			
				<?php 
					$services_cat_id = get_theme_mod('homepage_service_category_setting'); ?>
					<?php
					if ($services_cat_id){
					$bazzinga_services_query  = new WP_Query( array( 
													'cat' => absint( $services_cat_id ) , 
													'posts_per_page' => 8 
															) );
					$bazz_inner_services_delay_count = 1000;
					while ( $bazzinga_services_query->have_posts() ) : 
						$bazzinga_services_query->the_post(); ?>
							<div class="col-md-4">
								<div class="services-list-desc" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bazz_inner_services_delay_count ); ?>">
									<div class="text-center services-list-desc">
									<?php 
									if( has_post_thumbnail() ){?>
									<figure><img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'bazzinga_services_image')); ?>"></figure>
									<?php } ?>
									<h4><?php the_title(); ?></h4>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					<?php $bazz_inner_services_delay_count = $bazz_inner_services_delay_count+50; endwhile; wp_reset_postdata(); }?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }

endif;

/*
=================================================
Innerpage Our Team panel
@Action: teamsection
=================================================
*/
if ( ! function_exists( 'bazzinga_inner_team_sec_fnc' ) ) :

function bazzinga_inner_team_sec_fnc(){
	?>
	<!-- our-team-section -->
	<section class="our_team_wrap bazz_team_style ">
		<div class="container">
			<?php
			$bazz_team_cat = get_theme_mod('our_team_category_setting');
			if($bazz_team_cat){
			?>

			<div class="bazz_team_style__1">
				<div class="row">
					<div class="col-md-12">
						<div  data-aos="fade-up">
							<div class="sub-headline text-center"><?php echo esc_html( get_cat_name( absint( $bazz_team_cat ) ) ); ?></div>
							<h1 class="text-center"><?php the_title(); ?></h1>
							<div class="text-center">
								<?php echo wp_kses_post( category_description( absint( $bazz_team_cat ) ) );?>
							</div>
						</div>			
					</div>

					<div class=" col-md-8 offset-md-2 pt-md-5 pt-sm-3">
						<div class="row">
						<?php 
							$bazzinga_team_query  = new WP_Query( array( 
															'cat' => absint( $bazz_team_cat ) , 'posts_per_page' => 6) );
							$bazz_inner_team_count = 0;
							while ( $bazzinga_team_query->have_posts() ) : 
								$bazzinga_team_query->the_post(); ?>
								<div class="col-md-6">
									<div class="bazzinga_team" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($bazz_inner_team_count); ?>">
										<div class="our_team_member">          
											<?php 
												if( has_post_thumbnail() ){ ?>
												<figure>
													<img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'bazzinga_about_team_img') ); ?>"></figure>
											<?php } ?>
										</div>

										<div class="our_team_inner_design text-right"  >
											<h3><?php the_title(); ?></h3>
											<?php the_content(); ?> 
										</div>
									</div>
								</div>
							<?php $bazz_inner_team_count = $bazz_inner_team_count+50; endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
				</div>
			</div>
			<?php } ?><!-- check for empty category -->
		</div>
	</section>


<?php 
}
endif;

/*
=================================================
Top header widgget
@Action: bazzinga_top_header_social_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_top_header_social_sec_fnc' ) ) :

function bazzinga_top_header_social_sec_fnc(){

				if ( is_active_sidebar( 'header-top-widget' ) ) {
			?>
			<div class="top_heading">
				<div class="container">
				 
						<?php 
							dynamic_sidebar( 'header-top-widget' );
						 ?>
					 
				</div>
			</div>
			<?php }
}
endif;

/*
=================================================
About us inner sub pages
@Action: bazzinga_inner_about_sec
=================================================
*/
if ( ! function_exists( 'bazzinga_inner_about_sec_fnc' ) ) :

function bazzinga_inner_about_sec_fnc(){
?>
	<section class="about_sub_pages">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 ">
					<div class="about_sub_pages__style1">
			
					<?php
					$bazz_about_child = new WP_Query(
												array(
													'post_type'	=> 'page',
													'post_parent' => get_the_ID(),
													'post_per_page' => -1,
												)
											);
					if($bazz_about_child -> have_posts() ){
						while( $bazz_about_child -> have_posts() ){
							$bazz_about_child -> the_post();
							?>						
							<div class="row">
								<div class="col-lg-8 col-md-12 content_area_about" data-aos="fade-up">
									<h2 class="main_title">
										<?php the_title(); ?>
									</h2>
									<div class="main_content">
										<?php the_content(); ?>
									</div>
									<div class="image_area_about"    >
										<?php 
											if( has_post_thumbnail() ){ ?>
												<img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(), 'bazzinga_about_innerimage') ); ?>">
										<?php } ?>
									</div>
								</div>
							</div>
							<?php
						}
					}
					wp_reset_postdata();
					?>
				</div>
			</div>	
		</div>
	</section>
<?php 
}
endif;


// add class for no img
function bazzinga_no_img_class(){
	if ( !has_post_thumbnail() ){ 
		esc_attr_e('bazz_no_img', 'bazzinga');
	}
}


