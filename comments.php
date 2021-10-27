<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package core
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>

<?php if ( have_comments() ) : ?>
    <div class="comment-area <?php echo esc_attr($is_comments); ?>" id="comments">
        <h3 class="title"> <?php core_comment_count( get_the_ID() ) ?> </h3>
            <?php
            wp_list_comments(
                array(
                    'style'         => 'div',
                    'short_ping'    => true,
                    'walker'        => new Core_Walker_Comment,
                )
            );
            the_comments_navigation();
            ?>
    </div>
    <?php
endif;
?>


<div class="comment-form-section <?php echo esc_attr($is_comments) ?>">
    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments alert alert-warning"><?php esc_html_e( 'Comments are closed.', 'core' ); ?></p>
        <?php
    endif;
    ?>

    <?php
    $commenter      = wp_get_current_commenter();
    $req            = get_option( 'require_name_email' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $label          = '<label class="floating-label">';
    $fields =  array(
        'author' => '<div class="input-group-meta mb-35"> <input type="text" class="form-control" name="author" id="name" value="'.esc_attr($commenter['comment_author']).'" '.$aria_req.'>'. $label . esc_html__('Full Name *', 'core').'</label> </div>',
        'email'	=> '<div class="input-group-meta mb-35"> <input type="email" class="form-control" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" '.$aria_req.'>'. $label . esc_html__('Email *', 'core').'</label> </div>',
        'url'	=> '<div class="input-group-meta mb-35"><input type="url" class="form-control" name="url" value="'.esc_attr($commenter['comment_author_url']).'">'. $label . esc_html__('Website (Optional)', 'core'). '</label> </div>',
    );
    $comments_args = array(
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'class_form'            => 'form-style-light',
        'class_submit'          => 'theme-btn-one btn-lg',
        'title_reply_before'    => '<h3 class="title">',
        'title_reply'           => esc_html__( 'Leave a Comment', 'core' ),
        'title_reply_after'     => '</h3>',
        'comment_notes_before'  => '',
        'comment_field'         => '<div class="input-group-meta mb-35"><textarea placeholder="'.esc_html__('Write your message here...', 'core').'" name="comment" id="comment" class="form-control message"></textarea> ' .$label.esc_html__('Your Message', 'core'). ' </label></div>',
        'comment_notes_after'   => '',
    );
    comment_form($comments_args);
    ?>
</div>
