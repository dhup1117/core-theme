<?php
/**
 * Registration form
 */
function dt_reg_form( $btn_lablel = 'Create an account' ) {
	$username        = ! empty( $_POST['username'] ) ? sanitize_user( $_POST['username'] ) : '';
	$password        = ! empty( $_POST['password'] ) ? $_POST['password'] : '';
	$email           = ! empty( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$btn_lablel      = ! empty( $btn_lablel ) ? $btn_lablel : esc_html__( 'Create an account', 'core' );
	$agree_checkbox  = function_exists( 'get_field' ) ? get_field( 'agree_checkbox' ) : '';
	$agreement_label = function_exists( 'get_field' ) ? get_field( 'agreement_label' ) : '';
	$alert_message   = function_exists( 'get_field' ) ? get_field( 'alert_message' ) : esc_html__( 'Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy', 'core' );
	?>

    <form action="<?php echo esc_url(home_url('/wp-login.php?action=register')); ?>" name="registerform" method="post" class="login_form registerform user-data-form mt-30"
          onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('<?php echo esc_js( $alert_message ) ?>'); return false; }">
        <div class="row">
            <div class="col-12">
                <div class="input-group-meta mb-50">
                    <label><?php esc_html_e( 'Username', 'core' ); ?></label>
                    <input name="username" type="text"
                           placeholder="<?php esc_html_e( 'Melvin Carlson', 'core' ); ?>"
                           value="<?php echo esc_attr( $username ) ?>">
                </div>
            </div>

            <div class="col-12">
                <div class="input-group-meta mb-50">
                    <label><?php esc_html_e( 'Email', 'core' ); ?></label>
                    <input type="email" name="email" placeholder="<?php esc_attr_e('Enter your email', 'core'); ?>" value="<?php echo esc_attr( $email ) ?>">
                </div>
            </div>

            <div class="col-12">
                <div class="input-group-meta mb-50">
                    <label><?php esc_html_e( 'Password', 'core' ) ?> </label>
                    <input type="password" name="password" placeholder="<?php esc_attr_e('Enter Password', 'core') ?>" class="pass_log_id" value="<?php echo esc_attr( $password ) ?>">
                    <span class="placeholder_icon">
                        <span class="passVicon">
                            <img src="<?php echo CORE_FIX_IMG ?>/icon/view.svg" alt="<?php esc_attr_e('view icon', 'core'); ?>">
                        </span>
                    </span>
                </div>
            </div>


			<?php if ( $agree_checkbox == '1' && ! empty( $agreement_label ) ) : ?>
                <div class="col-12">
                    <div class="agreement-checkbox d-flex justify-content-between align-items-center sm-mt-10">
                        <div>
                            <input type="checkbox" value="None" id="agree" name="check">
                            <label for="agree"><?php echo str_replace(['<p>', '</p>'], '', wp_kses_post( $agreement_label ));  ?></label>
                        </div>
                    </div> <!-- /.agreement-checkbox -->
                </div>

			<?php endif; ?>
            <div class="col-12">
                <button type="submit" class="theme-btn-one mt-30 mb-50"> <?php echo esc_html( $btn_lablel ) ?></button>
            </div>

			<?php if ( ! empty( $copyright ) ): ?>
                <div class="col-12">
                    <p class="text-center font-rubik copyright-text"><?php echo wp_kses_post( $copyright ) ?></p>
                </div>
			<?php endif; ?>
        </div>

		<?php wp_nonce_field( 'et_test_submit_form', 'submit_et_form' ); ?>
    </form>

	<?php
}

/**
 * Registration validation
 */
function dt_registration_validation( $username, $password, $email ) {
	global $reg_errors;
	$reg_errors = new WP_Error;
	if ( 4 > strlen( $username ) ) {
		$reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
	}
	if ( username_exists( $username ) ) {
		$reg_errors->add( 'user_name', 'Sorry, that username already exists!' );
	}
	if ( ! validate_username( $username ) ) {
		$reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	}
	if ( 5 > strlen( $password ) ) {
		$reg_errors->add( 'password', 'Password length must be greater than 5' );
	}
	if ( ! is_email( $email ) ) {
		$reg_errors->add( 'email_invalid', 'Email is not valid' );
	}
	if ( email_exists( $email ) ) {
		$reg_errors->add( 'email', 'Email already in use' );
	}

	if ( is_wp_error( $reg_errors ) ) {
		foreach ( $reg_errors->get_error_messages() as $error ) {
			$msg = '<div class="error">';
			$msg .= '<strong>ERROR </strong> : ';
			$msg .= $error . '<br/>';
			$msg .= '</div>';
		}
	} else {
		$msg = '<div class="no-error">';
		$msg .= '<strong>No Error</strong>:';
		$msg .= '</div>';
	}

	return $msg;
}

function dt_complete_registration( $username, $password, $email ) {
	$userdata = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass'  => $password,
	);
	$user_id  = wp_insert_user( $userdata );
}

add_action( 'wp_ajax_nopriv_dt_custom_registration_form', 'dt_custom_registration_form' );
add_action( 'wp_ajax_dt_custom_registration_form', 'dt_custom_registration_form' );
function dt_custom_registration_form() {
	global $reg_errors;
	$reg_errors = new WP_Error;
	$data       = array();
	wp_parse_str( $_POST['data'], $data );
	// sanitize user form input
	$username = sanitize_user( $data['username'] );
	$password = esc_attr( $data['password'] );
	$email    = sanitize_email( $data['email'] );

	if ( ! isset( $data['submit_et_form'] ) || ! wp_verify_nonce( $data['submit_et_form'], 'et_test_submit_form' ) ) {
		wp_send_json_error( array(
			'message' => "WP nonce not verified",
		) );
	} else {
		if ( 4 > strlen( $username ) || username_exists( $username ) || ! validate_username( $username ) || 5 > strlen( $password ) || ! is_email( $email ) || email_exists( $email ) ) {
			wp_send_json_error( array(
				'message' => dt_registration_validation( $username, $password, $email ),
			) );
		} else {
			dt_complete_registration( $username, $password, $email );
			wp_send_json_success( array(
				'message' => __( 'You have been registered successfully!', 'core' )
			) );
		}
	}
}