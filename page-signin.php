<?php
/**
 * Template Name: Sign in Page
 */
?>
    <!DOCTYPE html>
<?php
wp_head();

$opt       = get_option( 'core_opt' );
$copyright = $opt['copyright_txt'];

// Left Column
$left_title = '';
$image_1    = '';
$image_2    = '';
$image_3    = '';


// Right Column
$right_title    = '';
$right_subtitle = '';
$btn_label      = '';

$obj = new Core_Helper_Class();


if ( function_exists( 'get_field' ) ) {

	// Left Column
	$left_title = get_field( 'left_title' );
	$shape_1    = get_field( 'shape_1' );
	$shape_2    = get_field( 'shape_2' );
	$shape_3    = get_field( 'shape_3' );

	// Right Column
	$right_title    = get_field( 'right_title' );
	$right_subtitle = get_field( 'right_subtitle' );
	$btn_label      = get_field( 'submit_button_label' );

}

?>
    <div class="user-data-page clearfix d-lg-flex">
        <div class="illustration-wrapper d-flex align-items-center justify-content-between flex-column">
            <h3 class="font-rubik">
				<?php echo ! empty( $left_title ) ? wp_kses_post( $left_title ) : ''; ?>
            </h3>

            <div class="illustration-holder">

				<?php
				if ( ! empty( $shape_1['id'] ) ) {
					echo wp_get_attachment_image( $shape_1['id'], 'full', false, [ 'class' => 'illustration' ] );
				} else { ?>
                    <img src="<?php echo CORE_FIX_IMG ?>/assets/ils_08.svg" alt=" <?php esc_attr( 'ornamental shape' ) ?>" class="illustration">
					<?php
				}

				if ( ! empty( $shape_2['id'] ) ) {
					echo wp_get_attachment_image( $shape_2['id'], 'full', false, [ 'class' => 'shapes shape-one' ] );
				} else { ?>
                    <img src="<?php echo CORE_FIX_IMG ?>/assets/ils_08.1.svg" alt=" <?php esc_attr( 'ornamental shape' ) ?>" class="shapes shape-one">
					<?php
				}
				?>

				<?php
				if ( ! empty( $shape_3['id'] ) ) {
					echo wp_get_attachment_image( $shape_3['id'], 'full', false, [ 'class' => 'shapes shape-two' ] );
				} else { ?>
                    <img src="<?php echo CORE_FIX_IMG ?>/assets/ils_08.2.svg" alt=" <?php esc_attr( 'ornamental shape' ) ?>" class="shapes shape-two">
					<?php
				}
				?>

            </div>
        </div> <!-- /.illustration-wrapper -->

        <div class="form-wrapper">
            <div class="d-flex justify-content-between">
                <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ) ?>">
						<?php $obj->image_from_settings( 'main_logo', '', 'logo' ); ?>
                    </a></div>
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>"
                   class="font-rubik go-back-button"><?php esc_html_e( 'Go home', 'core' ) ?></a>
            </div>

			<?php
			if ( ! is_user_logged_in() ) : ?>
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php"
                      class="user-data-form mt-80 md-mt-40" method="post">
                    <h2> <?php echo ! empty( $right_title ) ? wp_kses_post( $right_title ) : ''; ?></h2>
					<?php echo ! empty( $right_subtitle ) ? wp_kses_post( $right_subtitle ) : ''; ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-group-meta mb-80 sm-mb-70">
                                <label><?php esc_html_e( 'Username or Email', 'core' ); ?></label>
                                <input id="username" type="text" name="log" placeholder="dmakto">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group-meta mb-15">
                                <label><?php esc_html_e( 'Password', 'core' ); ?></label>
                                <input id="pwd" name="pwd" autocomplete="off" type="password"
                                       placeholder="<?php esc_attr_e( 'Enter Password', 'core' ) ?>"
                                       class="pass_log_id">
                                <span class="placeholder_icon">
                                    <span class="passVicon">
                                        <img src="<?php echo CORE_FIX_IMG ?>/icon/view.svg" alt="<?php esc_attr_e('view icon', 'core') ?>;">
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="forgetmenot">
                                        <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                                        <label for="rememberme"><?php esc_html_e( 'Keep me logged in', 'core' ) ?></label>
                                    </p>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/' ) ) . '/wp-login.php?action=lostpassword'; ?>"><?php esc_html_e( 'Forgot password?', 'core' ); ?></a>
                            </div> <!-- /.agreement-checkbox -->
                        </div>
                        <div class="col-12">
                            <button type="submit" class="theme-btn-one mt-50 mb-50">
                                <?php echo ! empty( $btn_label ) ? esc_html( $btn_label ) : esc_html__( 'Login', 'core' ); ?>
                            </button>
                        </div>
                        <div class="col-12">
							<?php if ( ! empty( $copyright ) ): ?>
                                <p class="text-center font-rubik copyright-text">
                                    <?php echo esc_html($copyright); ?>
                                </p>
							<?php endif; ?>
                        </div>
                    </div>
                </form>

                <?php
            else:
				$current_user = wp_get_current_user();
				?>
                <h2 class="mt-80">
                    <?php esc_html_e( 'Welcome', 'core' );
					echo "<br>" . esc_html( $current_user->display_name ); ?>
                </h2>
                <p class="header-info pt-30 pb-50"><?php esc_html_e( 'You are now logged in.', 'core' ); ?></p>
			    <?php
            endif;
            ?>
        </div> <!-- /.form-wrapper -->
    </div> <!-- /.user-data-page -->
<?php
wp_footer();