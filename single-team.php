<?php
get_header();
$opt          = get_option( 'core_opt' );
$social_title = ! empty( $opt['team_social_title'] ) ? $opt['team_social_title'] : '';
$social_links = function_exists( 'get_field' ) ? get_field( 'social_links' ) : '';
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="team-details mb-50 md-mb-10">
        <div class="container position-relative">
            <div class="main-bg d-lg-flex align-items-center">
                <div class="img-meta">
					<?php the_post_thumbnail( 'full', [ 'class' => 'w-100 team-single-image' ] ); ?>
                </div>
                <div class="text-wrapper">
                    <div class="name font-gilroy-bold"><?php the_title() ?></div>
                    <div class="position">
						<?php
						$terms = get_the_terms( get_the_ID(), 'team_cat' );
						if ( !empty( $terms ) ):
							foreach ( $terms as $term ) {
								echo esc_html($term->name);
							}
						endif;
						?>
                    </div>

					<?php the_content(); ?>
					<?php if ( array_filter( $social_links ) ): ?>
                        <h6 class="font-gilroy-bold"><?php echo esc_html( sprintf( __( '%s', 'core' ), $social_title ) ); ?></h6>
					<?php endif; ?>
                    <ul class="social-icon d-flex pt-15">
						<?php if ( $social_links['facebook'] ): ?>
                            <li class="facebook">
                                <a href="<?php echo esc_url( $social_links['facebook'] ) ?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['twitter'] ): ?>
                            <li class="twitter">
                                <a href="<?php echo esc_url( $social_links['twitter'] ) ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['dribbble'] ): ?>
                            <li class="dribbble">
                                <a href="<?php echo esc_url( $social_links['dribbble'] ) ?>">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['email'] ): ?>
                            <li class="email">
                                <a href="<?php echo esc_url( $social_links['email'] ) ?>">
                                    <i class="fa fa-envelope-o"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['instagram'] ): ?>
                            <li class="instagram">
                                <a href="<?php echo esc_url( $social_links['instagram'] ) ?>">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['linkedin'] ): ?>
                            <li class="linkedin">
                                <a href="<?php echo esc_url( $social_links['linkedin'] ) ?>">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['pinterest'] ): ?>
                            <li class="pinterest">
                                <a href="<?php echo esc_url( $social_links['pinterest'] ) ?>">
                                    <i class="fa fa-pinterest"></i></a>
                            </li>
						<?php endif; ?>

						<?php if ( $social_links['vk'] ): ?>
                            <li class="vk">
                                <a href="<?php echo esc_url( $social_links['vk'] ) ?>">
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
						<?php endif; ?>

                    </ul>
                </div> <!-- /.text-wrapper -->
            </div> <!-- /.main-bg -->

            <div class="pager d-flex justify-content-between">
				<?php if ( ! empty( $prev_post ) ): ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="flaticon-right-arrow"></i></a>
				<?php endif; ?>

				<?php if ( ! empty( $next_post ) ): ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>"><i class="flaticon-right-arrow"></i></a>
				<?php endif; ?>

            </div>
        </div>
    </div> <!-- /.team-details -->


<?php
endwhile;
get_footer();
