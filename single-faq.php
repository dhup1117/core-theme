<?php
get_header();

$opt                  = get_option( 'core_opt' );
$faq_sf_title         = ! empty( $opt['faq_page_title'] ) ? $opt['faq_page_title'] : '';
$faq_sf_subtitle      = ! empty( $opt['faq_page_subtitle'] ) ? $opt['faq_page_subtitle'] : '';
$faq_form_placeholder = ! empty( $opt['faq_form_placeholder'] ) ? $opt['faq_form_placeholder'] : '';

?>

    <div class="fancy-hero-one faq-search-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto">

					<?php if ( ! empty( $faq_sf_title ) ): ?>
                        <h2 class="font-rubik"><?php echo esc_html( $faq_sf_title ); ?></h2>
					<?php endif; ?>

					<?php if ( ! empty( $faq_sf_subtitle ) ): ?>
                        <p class="sub-heading"><?php echo esc_html( $faq_sf_subtitle ); ?></p>
					<?php endif; ?>

                </div>
            </div>

            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form sf-form">
				<?php $sf_value = get_search_query() ? get_search_query() : ''; ?>
                <input type="search" name="s" placeholder="<?php echo esc_attr( $faq_form_placeholder ); ?>"
                       value="<?php esc_attr( $sf_value ) ?>">
                <button type="submit"><img
                            src="<?php echo get_template_directory_uri() . '/assets/images/icon/47.svg' ?>"
                            alt="search button"></button>
                <input type="hidden" name="post_type" value="faq">
            </form>

        </div>

        <div class="bubble-one"></div>
        <div class="bubble-two"></div>
        <div class="bubble-three"></div>
        <div class="bubble-four"></div>
        <div class="bubble-five"></div>
        <div class="bubble-six"></div>

    </div>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="faqs-inner-page">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/shape/66.svg' ?>" alt="dots"
             class="shapes shape-one">
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="shapes shape-four"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-11 m-auto">
                    <div class="all-faqs">
                        <div class="faqs-all-qus md-m0">
                            <div class="article-preview">
                                <div class="d-flex">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, 'gravatar_default', 'avatar', [ 'class' => 'avatar-img' ] ); ?>

                                    <div>
                                        <h3 class="font-rubik"><?php the_title(); ?></h3>
                                        <div class="avatar-info">
											<?php if ( $opt['is_faq_author'] ) {
											esc_html_e( 'Written by', 'core' ); ?>
                                            <span>

                                            <?php
                                            the_author();
                                            } ?>
                                            </span>
                                            <br>
											<?php if ( $opt['is_faq_date'] ) {
												the_time( 'j M, Y' );
											} ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-details">
									<?php the_content(); ?>
                                </div> <!-- /.article-details -->
                            </div> <!-- /.article-preview -->
                        </div> <!-- /.faqs-all-qus -->
                    </div> <!-- /.all-faqs -->
                </div>
            </div>
        </div>
    </div> <!-- /.faqs-inner-page -->


<?php
endwhile;
get_footer();
