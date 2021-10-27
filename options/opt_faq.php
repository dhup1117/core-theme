<?php
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'FAQ Single', 'core' ),
	'id'        => 'faq_page',
	'icon'      => 'dashicons dashicons-lightbulb',
));

/**
 * Blog archive settings
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'FAQ Single Page', 'core' ),
	'id'        => 'faq_meta_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Banner Title', 'core' ),
            'id'        => 'faq_title',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),

        array(
            'title'     => esc_html__( 'Page Title', 'core' ),
            'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'core' ),
            'id'        => 'faq_page_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Help & Support', 'core' ),
            'required' => array (
                array ( 'faq_title', '=', '1' ),
            )
        ),

        array(
            'title'     => esc_html__( 'Page Sub Title', 'core' ),
            'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'core' ),
            'id'        => 'faq_page_subtitle',
            'type'      => 'text',
            'default'   => esc_html__( 'Advice and answers from our expert and proffesional core Team', 'core' ),
            'required' => array (
                array ( 'faq_title', '=', '1' ),
            )
        ),

		array(
			'title'     => esc_html__( 'Search Form Placeholder', 'core' ),
			'subtitle'     => esc_html__( 'Text within the search bar', 'core' ),
			'id'        => 'faq_form_placeholder',
			'type'      => 'text',
			'default'   => esc_html__( 'I am looking for ...', 'core' ),
			'required' => array (
				array ( 'faq_title', '=', '1' ),
			)
		),

        array(
			'title'     => esc_html__( 'Publish Date', 'core' ),
			'id'        => 'is_faq_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
		),

		array(
			'title'     => esc_html__( 'Author Name', 'core' ),
			'id'        => 'is_faq_author',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'core' ),
			'off'       => esc_html__( 'Hide', 'core' ),
			'default'   => '1',
		),
	)
));
