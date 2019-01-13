<?php

// Meta post archive
if ( ! function_exists( 'mlogfree_post_meta_archive' ) ) {
    function mlogfree_post_meta_archive() { ?>
        <span class="author">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                <i class="far fa-user-circle"></i><?php the_author(); ?>
            </a>
        </span>
        <span class="date">
        <i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?>
        </span>
        <span class="cmt">
            <a href="<?php the_permalink(); ?>#comment" title="<?php comments_number(); ?>">
                <i class="far fa-comments"></i><?php comments_number( '0', '1', '%' ); ?>
            </a>
        </span>
    <?php }
}

// Meta post single
if ( ! function_exists( 'mlogfree_post_meta_single' ) ) {
    function mlogfree_post_meta_single() { ?>
        <span class="author">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
                <i class="far fa-user-circle"></i> <?php the_author(); ?>
            </a>
        </span>
        <span class="date">
            <i class="far fa-clock"></i> <?php echo esc_html( get_the_date() ); ?>
        </span>
    <?php }
}

// Meta post info
if ( ! function_exists( 'mlogfree_post_info' ) ) {
    function mlogfree_post_info() { ?>
        <span class="post-category">
            <i class="far fa-folder"></i>
            <?php echo wp_kses_data( get_the_category_list() ); ?>
        </span>
        <span class="post-tags">
            <?php echo wp_kses_data( get_the_tag_list('<i class="fas fa-hashtag"></i> <ul><li>',',</li><li>','</li></ul>') ); ?>
        </span>
    <?php }
}

// Related Post
if ( ! function_exists( 'mlogfree_related_post' ) ) {
    function mlogfree_related_post() { ?>
        <h3><?php esc_attr_e('Related Post', 'mlog-free'); ?></h3>
        <?php
            global $post;
            $categories = get_the_category($post->ID);
            if ($categories): 
                $category_ids = array();
                foreach($categories as $individual_category): 
                    $category_ids[] = $individual_category->term_id;
                    $args=array(
                        'category__in'          => $category_ids,
                        'post__not_in'          => array($post->ID),
                        'showposts'             => 6,
                        'ignore_sticky_posts'   => 1,
                        'orderby'               => 'rand'
                    );
                endforeach;
        ?>
        <div class="row">
            <?php $my_query = new wp_query($args); if( $my_query->have_posts() ): ?>
                <?php while ($my_query->have_posts()): $my_query->the_post();?>
                    <?php get_template_part( 'templates/content', 'archive' ); ?>
                <?php endwhile; ?>
            <?php endif; endif; wp_reset_postdata(); ?>
        </div>
    <?php }
}

// List Comment
if ( ! function_exists( 'mlogfree_list_comment' ) ) {
    function mlogfree_list_comment($comment, $args, $depth) { ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<?php
			switch( $comment->comment_type ) :
				case 'pingback':
				case 'trackback': ?>
					<div id="comment-<?php comment_ID(); ?>">
						<div class="comment-author vcard">
							Pingback: <?php comment_author_link(); ?>
								<span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
							<span class="comment-meta">
								<?php edit_comment_link( esc_attr__( '( Edit )', 'mlog-free' ), '  ', '' ) ?>
							</span>
						</div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php esc_attr_e('Your comment is awaiting moderation.', 'mlog-free'); ?></em>
						<?php endif; ?>
					</div>
				    <?php
					    break;
					    default:
				    ?>
				    <div class="tabel" id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/UserComments">
					    <div class="comment-header row">
					        <div class="col col-1">
					            <?php echo get_avatar( $comment->comment_author_email, 50 ); ?>
					        </div>
					        <div class="col col-11">
					            <?php printf( '<span class="fn comment-name" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name">%s</span></span>', get_comment_author_link() ) ?>
					            <span class="comment-date">
					                <?php comment_date( get_option( 'date_format' ) ); ?>
					            </span>
					        </div>
					    </div>
					    <div class="comment-content">
					        <?php echo comment_text(); ?>
					    </div>
					    <div class="comment-footer">
					        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fas fa-reply"></i> Reply', 'mlog-free' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
					    </div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em><?php esc_attr_e('Your comment is awaiting moderation.', 'mlog-free'); ?></em>
						<?php endif; ?>						
					</div>
				<?php
				   break;
			 endswitch; ?>
		</li>
    <?php }
}