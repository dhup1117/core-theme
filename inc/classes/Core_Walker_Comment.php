<?php
/**
 * Custom comment walker for this theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

if ( ! class_exists('Core_Walker_Comment') ) {
    /**
     * CUSTOM COMMENT WALKER
     * A custom walker for comments, based on the walker in Twenty Nineteen.
     */
    class Core_Walker_Comment extends Walker_Comment {

        /**
         * Outputs a comment in the HTML5 format.
         *
         * @see wp_list_comments()
         * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
         * @see https://developer.wordpress.org/reference/functions/get_comment_author/
         * @see https://developer.wordpress.org/reference/functions/get_avatar/
         * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
         * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
         *
         * @param WP_Comment $comment Comment to display.
         * @param int        $depth   Depth of the current comment.
         * @param array      $args    An array of arguments.
         */
        protected function html5_comment( $comment, $depth, $args ) {
            $arrow_icon = is_rtl() ? 'arrow_left' : 'arrow_right';
            $has_child = $this->has_children ? 'has_children' : '';
            ?>
            <<?php echo ( 'div' === $args['style'] ) ? 'div' : 'li'; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class("single-comment $has_child", $comment ); ?>>
      
            <div class="d-flex">
                <?php
                if ( get_avatar($comment) ) {
                    echo get_avatar($comment, 50, null, null, array( 'class'=> 'user-img'));
                }
                ?>
                <div class="comment-body">
                    <h6 class="name"> <?php comment_author(); ?> </h6>
                    <div class="time"> <?php comment_date(get_option( 'date_format')); ?></div>
                    <?php if ( '0' === $comment->comment_approved ) : ?>
                        <em> <?php esc_html_e( 'Your comment is awaiting moderation.', 'core' ) ?></em><br />
                    <?php endif; ?>
                    <div class="comment-text">
                        <?php comment_text(); ?>
                    </div>
                    <?php
                    comment_reply_link(array_merge(
                        $args,
                        array(
                            'reply_text' => esc_html__('Reply', 'core'),
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'        => '<button class="reply">',
                            'after'         => '</button>',
                        )
                    ));
                    ?>
                </div>
            </div>

            <?php
        }
    }
}