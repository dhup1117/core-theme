<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package core
 */

if ( ! is_active_sidebar( 'sidebar_widgets' ) ) {
	return;
}
?>
<div class="col-lg-4 col-md-6">
	<div class="blog-sidebar-one">
        <?php dynamic_sidebar( 'sidebar_widgets' ); ?>
	</div> <!-- /.blog-sidebar-one -->
</div>

