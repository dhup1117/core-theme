<?php
/**
 * Template Name: Sign up Page
 */
?>
    <!DOCTYPE html>
<?php

wp_head();
$opt       = get_option( 'core_opt' );
$copyright = $opt['copyright_txt'] ?? '';

// Left Column
$left_title = '';
$image_1    = '';
$image_2    = '';
$image_3    = '';


// Right Column
$right_title    = '';
$right_subtitle = '';
$btn_label      = '';

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
				?>

				<?php
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
						<?php Core_helper()->image_from_settings( 'main_logo', '', 'logo' ); ?>
                    </a></div>
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="font-rubik go-back-button">
                    <?php esc_html_e( 'Go home', 'core' ) ?>
                </a>
            </div>

			<?php
			if ( ! is_user_logged_in() ) : ?>

                    <h2 class="mt-80"> <?php echo ! empty( $right_title ) ? wp_kses_post( $right_title ) : ''; ?></h2>
	                <?php echo ! empty( $right_subtitle ) ? wp_kses_post( $right_subtitle ) : ''; ?>

                    <div id="reg-form-validation-messages"> </div>
                    <?php dt_reg_form($btn_label); ?>

			    <?php
            else:
				$current_user = wp_get_current_user();
				?>
                <h2 class="mt-80">
                    <?php esc_html_e( 'Welcome', 'core' );
					echo "<br>" . esc_html( $current_user->display_name ); ?>
                </h2>
                <p class="header-info pt-30 pb-50">
                    <?php esc_html_e( 'You are now logged in.', 'core' ); ?>
                </p>
			    <?php
            endif;
            ?>


        </div> <!-- /.form-wrapper -->
    </div> <!-- /.user-data-page -->
<?php
wp_footer();