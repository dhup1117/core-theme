<?php
	/**
	 * Register Google fonts.
	 * @return string Google fonts URL for the theme.
	 */

	function core_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = '';

		//If there are character in your language not supported by this font, translate to off
		if ( 'off' !== esc_html_x( 'on', 'Roboto font: on or off', 'core' ) ) {
			$fonts[] = "Roboto:300,400,500,600,700";
		}

		//If there are character in your language not supported by this font, translate to off
		if ( 'off' !== esc_html_x( 'on', 'Rubik font: on or off', 'core' ) ) {
			$fonts[] = "Rubik:ital,wght@0,300;0,400;0,700";
		}

		$is_ssl = is_ssl() ? 'https' : 'http';

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), "$is_ssl://fonts.googleapis.com/css" );
		}

		return $fonts_url;
	}

	/**
	 * Enqueue site scripts and styles
	 */
	function core_scripts() {
		//load core css
		wp_enqueue_style( 'core-fonts', core_fonts_url(), array(), null );
		wp_enqueue_style( 'core-style', CORE_DIR_CSS . '/style.css' );
		wp_enqueue_style( 'core-wpd', CORE_DIR_CSS . '/fix.css' );
		wp_enqueue_style( 'core-custom', CORE_DIR_CSS . '/custom.css' );
		wp_enqueue_style( 'core-root', get_stylesheet_uri() );

		if ( is_rtl() ) {
			wp_enqueue_style( 'core-rtl', CORE_DIR_CSS . '/rtl.css' );
		}

		// conditional enqueue only when elementor is not in preview mode
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			if ( ! \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
				// enqueue a script if not in elementor preview mode
			}
		}

		/**
		 * Register and enqueue core theme script files
		 */
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			if ( ! \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
				// enqueue a script if not in elementor preview mode
			}
		}

		wp_enqueue_script( 'core-theme', CORE_DIR_JS . '/theme.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'core-custom', CORE_DIR_JS . '/custom.js', array( 'jquery' ), '1.0', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'core_scripts' );