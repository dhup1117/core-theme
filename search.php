<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package core
 */

get_header();
$opt             = get_option( 'core_opt' );

$blog_title      = isset( $opt['blog_title'] ) ? $opt['blog_title'] : '1';
$blog_column     = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$blog_layout_opt = ! empty( $opt['blog_layout'] ) ? $opt['blog_layout'] : 'b_w_r_s';
$blog_layout     = ! empty( $_GET['blog_layout'] ) ? $_GET['blog_layout'] : $blog_layout_opt;

$faq_title = isset( $opt['faq_meta_opt'] ) ? $opt['faq_meta_opt'] : '1';


if ( $blog_layout == 'b_w_r_s' ) {
	$sec_class = 'blog-page-bg';
} elseif ( $blog_layout == 'b_w_l_s' ) {
	$sec_class = 'blog-page-bg';
} elseif ( $blog_layout == 'grid' ) {
	$sec_class = 'feature-blog-one blog-page-bg';
} elseif ( $blog_layout == 'list' ) {
	$sec_class = 'blog-page-white-bg blog-v4';
} else {
	$sec_class = 'blog-page-bg';
}

if ( 1 == $blog_title && 'faq' != get_post_type() ) {
	get_template_part( 'template-parts/header-elements/page-title' );
}

if ( 1 == $faq_title && 'faq' == get_post_type() ) {
	get_template_part( 'template-parts/header-elements/page-title-faq' );
}

?>

    <!--
	=====================================================
		Feature Blog One
	=====================================================
	-->
    <div class="<?php echo esc_attr( $sec_class ) ?>">
        <div class="shapes shape-one"></div>
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="container">
            <div class="row">
				<?php
				if ( $blog_layout == 'b_w_r_s' ) {
					?>
                    <div class="col-lg-<?php echo esc_attr( $blog_column ); ?> feature-blog-one width-lg">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content', get_post_format() );
							endwhile;
						} else {
							//Need to modify
							esc_html_e( 'No post found', 'core' );
						}
						?>
                        <div class="page-pagination-one pt-15">
							<?php Core_helper()->core_post_pagination(); ?>
                        </div>
                    </div>
					<?php
					get_sidebar();
				} elseif ( $blog_layout == 'b_w_l_s' ) {
					get_sidebar();
					?>
                    <div class="col-lg-<?php echo esc_attr( $blog_column ); ?> feature-blog-one width-lg">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content', get_post_format() );
							endwhile;
						} else {
							//Need to modify
							esc_html_e( 'No post found', 'core' );
						}
						?>
                        <div class="page-pagination-one pt-15">
							<?php Core_helper()->core_post_pagination(); ?>
                        </div>
                    </div>
					<?php

				} elseif ( $blog_layout == 'grid' ) {
					?>
                    <div class="row">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content-grid', get_post_format() );
							endwhile;
						} else {
							//Need to modify
							esc_html_e( 'No post found', 'core' );
						}
						?>
                    </div>
                    <div class="page-pagination-one pt-15">
						<?php Core_helper()->core_post_pagination(); ?>
                    </div>
				<?php } elseif ( $blog_layout == 'list' ) {
					?>
                    <div class="wrapper">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content-list', get_post_format() );
							endwhile;
						} else {
							//Need to modify
							esc_html_e( 'No post found', 'core' );
						}
						?>
                        <div class="page-pagination-one pt-15">
							<?php Core_helper()->core_post_pagination(); ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div> <!-- /.feature-blog-one -->

<?php get_footer();
