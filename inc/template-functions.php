<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package core
 */

/*Image Size */
add_image_size('core_330x248', 330, 248, true); // Blog post grid format
add_image_size('core_690x340', 690, 340, true); // Blog post list format with sidebar
add_image_size('core_1000x520', 1000, 520, true); // Blog post list format without sidebar



// Get comment count text
function core_comment_count( $post_id ) {
	$comments_number = get_comments_number( $post_id );
	if ( 0 == $comments_number ) {
		$comment_text = esc_html__( 'No Comments', 'core' );
	} elseif ( 1 == $comments_number ) {
		$comment_text = esc_html__( '1 Comment', 'core' );
	} elseif ( $comments_number > 1 ) {
		$comment_text = $comments_number . esc_html__( ' Comments', 'core' );
	}
	echo esc_html( $comment_text );
}

