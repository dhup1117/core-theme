<?php
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'General', 'core' ),
	'id'        => 'general_settings',
	'icon'      => 'dashicons dashicons-admin-generic',
));

Redux::set_section( 'core_opt', array(
	'title'            => esc_html__( 'Preloader', 'core' ),
	'id'               => 'preloader_opt',
	'icon'             => '',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'        => 'is_preloader',
			'type'      => 'switch',
			'title'     => esc_html__( 'Pre-loader', 'core' ),
			'on'        => esc_html__( 'Enable', 'core' ),
			'off'       => esc_html__( 'Disable', 'core' ),
			'default'   => true,
		),

		array(
            'required' => array('is_preloader', '=', '1'),
            'id'       => 'preloader_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Pre-loader Text', 'core' ),
            'default'  => get_bloginfo('name')
        ),

		array(
            'required' => array('is_preloader', '=', '1'),
            'id'       => 'preloader_text_color',
            'type'     => 'color',
			'default'  => '#655C97',
            'title'    => esc_html__( 'Pre-loader Text Color', 'core' ),
        ),

		array(
            'required' => array('is_preloader', '=', '1'),
            'id'       => 'spinner_color',
            'type'     => 'color',
			'default'  => '#655C97',
            'title'    => esc_html__( 'Spinner Color', 'core' ),
        ),
	)
));



/**
 * Ajax Search settings
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Ajax Search', 'core' ),
	'id'        => 'ajax_search_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Ajax Search Result Limit', 'core' ),
            'subtitle'  => esc_html__( 'This will limit the doc sections and articles in Ajax live search results. Input -1 for show all results.', 'core' ),
            'id'        => 'doc_result_limit',
            'type'      => 'text',
            'default'   => '-1',
        ),
        array(
            'id'        => 'is_ajax_search_tab',
            'type'      => 'switch',
            'title'     => esc_html__( 'Tab Filters', 'core' ),
            'subtitle'  => esc_html__( 'If you disable it, the docs search will show by default.', 'core' ),
            'on'        => esc_html__( 'Enable', 'core' ),
            'off'       => esc_html__( 'Disable', 'core' ),
            'default'   => true,
        ),
	)
));