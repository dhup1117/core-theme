<?php

// Footer settings
Redux::set_section( 'core_opt', array(
	'title'  => esc_html__( 'Footer', 'core' ),
	'id'     => 'core_footer',
	'icon'   => 'dashicons dashicons-arrow-down-alt2',
	'fields' => array(

		array(
			'title'   => esc_html__( 'Footer Column', 'core' ),
			'id'      => 'footer_column',
			'type'    => 'select',
			'default' => '3',
			'options' => array(
				'6' => esc_html__( 'Two Column', 'core' ),
				'4' => esc_html__( 'Three Column', 'core' ),
				'3' => esc_html__( 'Four Column', 'core' ),
			)
		),

		array(
			'title'          => esc_html__( 'Padding', 'core' ),
			'subtitle'       => esc_html__( 'Padding around the footer columns (Top Right Bottom Left)', 'core' ),
			'id'             => 'footer_column_padding',
			'type'           => 'spacing',
			'output'         => array( '.footer_area .f_widget' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
			'required'       => array( 'footer_style', '=', 'normal' )
		),

		array(
			'title'    => esc_html__( 'Ornament Illustration', 'core' ),
			'subtitle' => esc_html__( 'This is for beautiful design purpose. You can replace the default illustration or delete it from here.', 'core' ),
			'id'       => 'fs_illustration',
			'type'     => 'media',
			'default'  => array(
				'url' => CORE_DIR_IMG . '/footer/leaf_footter.png'
			),
			'required' => array( 'footer_style', '=', 'simple' )
		),
	)
) );


// General settings
Redux::set_section( 'core_opt', array(
	'title'      => esc_html__( ' General', 'core' ),
	'id'         => 'footer_general',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(

		array(
			'title'     => esc_html__( 'Scroll to top', 'core' ),
			'id'        => 'scroll_top',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'core' ),
			'off'       => esc_html__( 'Hide', 'core' ),
			'default'   => '1',
		),

	)
) );


// Footer colors
Redux::set_section( 'core_opt', array(
	'title'      => esc_html__( 'Font colors', 'core' ),
	'id'         => 'core_footer_font_colors',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Widget Title Color', 'core' ),
			'id'      => 'widget_title_color',
			'type'    => 'color',
			'output'  => array( '.footer-title' ),
			'default' => '#101621'
		)
	)
) );

// Footer background
Redux::set_section( 'core_opt', array(
	'title'      => esc_html__( 'Background', 'core' ),
	'id'         => 'core_footer_background',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Footer Background', 'core' ),
			'id'      => 'footer_bd',
			'type'    => 'media',
			'default' => array(
				'url' => CORE_DIR_IMG . '/ils_01.svg'
			)
		)
	)
) );

// Footer settings
Redux::set_section( 'core_opt', array(
	'title'      => esc_html__( 'Footer Bottom', 'core' ),
	'id'         => 'core_footer_btm',
	'icon'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'title'   => esc_html__( 'Copyright Text', 'core' ),
			'id'      => 'copyright_txt',
			'type'    => 'editor',
			'default' => 'Copyright @2021 core inc.',
			'args'    => array(
				'wpautop'       => true,
				'media_buttons' => false,
				'textarea_rows' => 10,
				'teeny'         => false,
				'quicktags'     => false,
			)
		),
		array(
			'title'         => esc_html__( 'Links', 'core' ),
			'id'            => 'footer_btm_links',
			'type'          => 'slides',
			'content_title' => esc_html__( 'Links', 'core' ),
			'show'          => array(
				'title'       => true,
				'description' => false,
				'url'         => true,
			),
		),

	)
	)
);