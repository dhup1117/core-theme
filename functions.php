<?php
	/**
	 * core functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package core
	 */

	if ( ! function_exists( 'core_setup' ) ) :
		function core_setup() {
			load_theme_textdomain( 'core', get_template_directory() . '/languages' );

			// Add theme support
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'post-formats', array( 'video', 'quote', 'link' ) );
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );
			add_theme_support( 'align-wide' );
			add_theme_support( 'editor-styles' );
			add_theme_support( 'responsive-embeds' );

			// Post type supports
			add_post_type_support( 'page', 'excerpt' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'main_menu' => esc_html__( 'Main Menu', 'core' ),
			) );

			add_editor_style( 'style-editor.css' );
		}
	endif;
	add_action( 'after_setup_theme', 'core_setup' );


	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 * Priority 0 to make it available to lower priority callbacks.
	 * @global int $content_width
	 */
	function core_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'core_content_width', 1170 );
	}

	add_action( 'after_setup_theme', 'core_content_width', 0 );

	/**
	 * Constants
	 * Defining default asset paths
     * css,fonts,js,vendors,images
	 */
	define( 'CORE_DIR_CSS', get_template_directory_uri() . '/assets/css' );
	define( 'CORE_DIR_FONT', get_template_directory_uri() . '/assets/fonts' );
	define( 'CORE_DIR_IMG', get_template_directory_uri() . '/assets/images' );
	define( 'CORE_DIR_JS', get_template_directory_uri() . '/assets/js' );
	define( 'CORE_DIR_VEND', get_template_directory_uri() . '/assets/vendors' );

	/**
	 * Enqueue scripts and styles.
	 */
	require get_template_directory() . '/inc/enqueue.php';

	/**
	 * Theme's helper functions
	 */
	require get_template_directory() . '/inc/classes/Core_helper.php';

	/**
	 * Theme's filters and actions
	 */
	require get_template_directory() . '/inc/filter_actions.php';
	require get_template_directory() . '/inc/reg_process.php';

	/**
	 * Classes
	 */
	require get_template_directory() . '/inc/classes/Core_Walker_Comment.php';

	require get_template_directory() . '/options/opt-config.php';

	/**
	 * Required plugins activation
	 */
	require get_template_directory() . '/inc/template-functions.php';
	require get_template_directory() . '/inc/plugin_activation.php';

	/**
	 * Bootstrap Nav Walker
	 */
	require get_template_directory() . '/inc/classes/Core_Nav_Walker.php';


	/**
	 * Register Sidebar Areas
	 */
	require get_template_directory() . '/inc/sidebars.php';

	/*
	 * Demo importer configuration
	 */

	require get_template_directory() . '/inc/demo_config.php';


	function w4dev_login_enqueue_scripts() {
		$login_icon_url = CORE_DIR_IMG . '/core_01.svg';
		?>
        <style>
            #login h1 a {
                background-image: url( <?php echo esc_url( $login_icon_url ) ?> );
            }
        </style>
		<?php
	}

	add_action( 'login_enqueue_scripts', 'w4dev_login_enqueue_scripts' );


