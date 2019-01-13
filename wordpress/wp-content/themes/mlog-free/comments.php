<?php
    if ( post_password_required() ) {
        return;
    }
?>
<?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php comments_number(); ?>
        </h3>
        
        <ul class="comment-list">
            <?php wp_list_comments('type=comment&callback=mlogfree_list_comment'); ?>
        </ul>
        
        <?php 
            the_comments_pagination(
                array (
                    'prev_text' => '<span class="screen-reader-text">' . esc_attr__( 'Previous', 'mlog-free' ) . '</span>',
                    'next_text' => '<span class="screen-reader-text">' . esc_attr__( 'Next', 'mlog-free' ) . '</span>',
                )
            );
    endif;
                
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'mlog-free' ); ?></p>
    <?php endif;
    
    $fields =  array(
        'author' =>
            '<p class="comment-form-author col col-6">' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30" placeholder="' . esc_attr__( 'Name *', 'mlog-free' ) . '" required/></p>',

        'email' =>
            '<p class="comment-form-email col col-6">' .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30" placeholder="' . esc_attr__( 'Email *', 'mlog-free' ) . '" required/></p>',

        'url' =>
            '<p class="comment-form-url col col-12">' .
            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" placeholder="' . esc_attr__( 'Website', 'mlog-free' ) . '"/></p>',
    );
    $mlogfree = array(
        'format'                => 'xhtml',
        'class_form'            => 'row small-mb',
        'comment_notes_before'  => '<p class="comment-notes col col-12">' . esc_attr__('Your email address will not be published. Required fields are marked *', 'mlog-free') . '</p>',
        'logged_in_as'          => '<p class="logged-in-as col col-12">' . sprintf( wp_kses( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'mlog-free' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
        'comment_field'         => '<p class="comment-form-comment col col-12"><textarea name="comment" rows="5" aria-required="true" placeholder="' . esc_attr__( 'Content', 'mlog-free' ) . '" required></textarea></p>',
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    );
    comment_form($mlogfree);
?>