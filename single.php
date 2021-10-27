<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package core
 */

get_header();
$opt                 = get_option( 'core_opt' );
$blog_column         = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$blog_title          = $opt['blog_title'] ?? '1';
$is_featured_img     = $opt['is_featured_img'] ?? '1';
$is_single_post_date = $opt['is_single_post_date'] ?? '1';
$is_post_tag         = $opt['is_post_tag'] ?? '1';
$is_share_icon       = isset($opt['is_share_icon']) ? $opt['is_share_icon'] : '';
?>

<div class="blog-page-bg">
    <div class="shapes shape-one"></div>
    <div class="shapes shape-two"></div>
    <div class="shapes shape-three"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-<?php echo esc_attr( $blog_column ); ?> feature-blog-one width-lg blog-details-post-v1">
                <div class="post-meta">
                    <?php
                    if ( $is_featured_img == '1' ) {
                        the_post_thumbnail( 'full', array( 'class' => 'image-meta' ) );
                    }
                    if ( $is_single_post_date == '1' ) {
                        ?>
                        <div class="tag"> <?php the_time( 'j M. Y' ); ?> </div>
                    <?php } ?>
                    <h1 class="title"> <?php the_title(); ?> </h1>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'core' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'core' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                    endwhile;
                    ?>
                    <div class="d-sm-flex align-items-center justify-content-between share-area">
                        <?php if ( has_tag() && $is_post_tag == '1' ) : ?>
                            <div class="tag-feature d-flex">
                                <?php the_tags( '<span>' . esc_html__( 'Tags :&nbsp;', 'core' ) . '</span>', ',&nbsp;' ); ?>
                            </div>
                        <?php
                        endif;
                        if ( $is_share_icon == '1' ) {
                            Core_helper()->share_links();
                        } ?>
                    </div>
                </div> <!-- /.post-meta -->
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div> <!-- /.feature-blog-one -->

<?php
get_footer();
