<?php
/**
 * Doc Settings
 */
Redux::set_section('core_opt', array(
    'title' => esc_html__( 'Doc Settings', 'core' ),
    'id' => 'core_doc_sec',
    'customizer_width' => '400px',
    'icon' => 'dashicons dashicons-media-document',
	'fields' => array(
		array(
			'id'            => 'doc_slug',
			'type'          => 'text',
			'title'         => esc_html__( 'Slug', 'core' ),
			'subtitle'      => esc_html__( 'You can change the doc post type slug from here. The default slug is docs. After changing the slug, go to Settings > Permalinks and click on the Save Changes button.', 'core' ),
		),
	)
));

/**
 * Search Banner
 */
Redux::set_section('core_opt', array(
	'title' => esc_html__( 'Search Banner', 'core' ),
	'id' => 'doc_search_opt',
	'subsection' => true,
	'icon' => '',
	'fields' => array(
		array(
			'title'     => esc_html__( 'Documentation List', 'core' ),
			'subtitle'  => esc_html__( 'Show/Hide the documentation dropdown list.', 'core' ),
			'id'        => 'is_search_doc_dropdown',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'core' ),
			'off'       => esc_html__( 'Hide', 'core' ),
			'default'   => '1',
		),
		array(
			'title'     => esc_html__( 'Search Keywords', 'core' ),
			'id'        => 'is_keywords',
			'type'      => 'switch',
			'on'        => esc_html__( 'Yes', 'core' ),
			'off'       => esc_html__( 'No', 'core' ),
		),
		array(
			'title'     => esc_html__( 'Keywords Label', 'core' ),
			'id'        => 'keywords_label',
			'type'      => 'text',
			'default'   => esc_html__( 'Popular Searches', 'core'),
			'required'  => array('is_keywords', '=', '1'),
		),
		array(
			'title'     => esc_html__( 'Keywords', 'core' ),
			'id'        => 'doc_keywords',
			'type'      => 'multi_text',
			'add_text'  =>  esc_html__( 'Add Keyword', 'core'),
			'required'  => array('is_keywords', '=', '1'),
		),
	)
));


/**
 * Right Sidebar
 */
Redux::set_section('core_opt', array(
    'title' => esc_html__( 'Right Sidebar', 'core' ),
    'id' => 'doc_right_sidebar_opt',
    'subsection' => true,
    'icon' => '',
    'fields' => array(
        array(
            'title'     => esc_html__( 'Select Dropdown', 'core' ),
            'subtitle'  => __( 'You can display conditional contents using the [conditional_data] shortcode in documentation based on the dropdown value. See the shortcode usage tutorial <a href="https://is.gd/91LUR3" target="_blank">here</a>.', 'core' ),
            'id'        => 'is_os_dropdown',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),

        array(
            'title'         => esc_html__( 'Dropdown Options', 'core' ),
            'subtitle'      => esc_html__( 'Use the ionicons (https://ionicons.com) name in the icon field.', 'core' ),
            'id'            => 'os_options',
            'type'          => 'slides',
            'content_title' => esc_html__( 'Option', 'core' ),
            'show' => array(
                'title' => true,
                'description' => false,
                'url' => true,
            ),
            'placeholder' => array(
                'title'     => esc_html__( 'Title', 'core' ),
                'url'      => esc_html__( 'Icon', 'core' ),
            ),
            'required' => array( 'is_os_dropdown', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Font Size Switcher', 'core' ),
            'id'        => 'is_font_switcher',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),

        array(
            'title'     => esc_html__( 'Print Icon', 'core' ),
            'id'        => 'is_print_icon',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),
    )
));


/**
 * Doc Footer
 */
Redux::set_section('core_opt', array(
    'title' => esc_html__( 'Layout', 'core' ),
    'id' => 'doc_layout_opt',
    'subsection' => true,
    'icon' => '',
    'fields' => array(
        array(
            'title'     => esc_html__( 'Doc Layout', 'core' ),
            'id'        => 'doc_layout',
            'type'      => 'image_select',
            'options'   => array(
                'both_sidebar' => array(
                    'alt' => esc_html__( 'Both Sidebar', 'core' ),
                    'img' => CORE_DIR_IMG.'/layouts/both_sidebar.jpg'
                ),
                'left_sidebar' => array(
                    'alt' => esc_html__( 'Left Sidebar', 'core' ),
                    'img' => CORE_DIR_IMG.'/layouts/sidebar_left.jpg'
                ),
            ),
            'default' => 'both_sidebar'
        ),

	    array(
		    'title'     => esc_html__( 'Doc Page Width', 'core' ),
		    'subtitle'  => esc_html__( 'Set the default Doc page width from here.', 'core' ),
		    'id'        => 'doc_width',
		    'type'      => 'select',
		    'options'   => array(
			    'boxed' => esc_html__('Boxed', 'core'),
			    'full-width' => esc_html__('Full Width', 'core'),
		    ),
		    'default' => 'boxed'
	    ),

        array(
            'title'     => esc_html__( 'Doc Footer', 'core' ),
            'id'        => 'doc_footer',
            'type'      => 'image_select',
            'options'   => array(
                'simple' => array(
                    'alt' => esc_html__( 'Simple Footer', 'core' ),
                    'img' => CORE_DIR_IMG.'/footer/footer-simple.png'
                ),
                'normal' => array(
                    'alt' => esc_html__( 'Widgets Footer', 'core' ),
                    'img' => CORE_DIR_IMG.'/footer/footer-normal.png'
                ),
            ),
            'default' => 'simple'
        )
    )
));


/**
 * Feedback area
 */
Redux::set_section('core_opt', array(
    'title' => esc_html__( 'Feedback Area', 'core' ),
    'id' => 'doc_feedback_opt',
    'subsection' => true,
    'icon' => '',
    'fields' => array(
	    array(
		    'title'     => esc_html__( 'Feedback Area', 'core' ),
		    'id'        => 'is_feedback_area',
		    'type'      => 'switch',
		    'on'        => esc_html__( 'Show', 'core' ),
		    'off'       => esc_html__( 'Hide', 'core' ),
		    'default'   => '1',
	    ),

        array(
            'title'     => esc_html__( 'Still Stuck', 'core' ),
            'id'        => 'still_stuck_text',
            'type'      => 'text',
            'default'   => esc_html__( 'Still stuck?', 'core' ),
	        'required'  => array('is_feedback_area', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Help form link text', 'core' ),
            'id'        => 'help_form_link_text',
            'type'      => 'text',
            'default'   => esc_html__( 'How can we help?', 'core' ),
            'required'  => array('is_feedback_area', '=', '1')
        ),

	    array(
		    'title'     => esc_html__( 'Feedback Label', 'core' ),
		    'id'        => 'doc_feedback_label',
		    'type'      => 'text',
		    'default'   => esc_html__( 'Was this page helpful?', 'core' ),
		    'required'  => array('is_feedback_area', '=', '1')
	    ),

	    array(
		    'title'     => esc_html__( 'Feedback Modal', 'core' ),
		    'subtitle'  => esc_html__( 'Customize the feedback modal form here.', 'core' ),
		    'id'        => 'feedback_modal_form',
		    'type'      => 'section',
		    'indent'    => true,
		    'required'  => array('is_feedback_area', '=', '1')
	    ),

        array(
            'title'     => esc_html__( 'Form Title', 'core' ),
            'id'        => 'feedback_form_title',
            'type'      => 'text',
            'default'   => esc_html__( 'How can we help?', 'core' ),
            'required'  => array('is_feedback_area', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Form Subtitle', 'core' ),
            'id'        => 'feedback_form_subtitle',
            'type'      => 'textarea',
            'required'  => array('is_feedback_area', '=', '1')
        ),

	    array(
		    'id'     => 'feedback_modal_form-end',
		    'type'   => 'section',
		    'indent' => false,
	    ),
    )
));


/**
 * Related Docs
 */
Redux::set_section('core_opt', array(
    'title' => esc_html__( 'Related & Recent Docs', 'core' ),
    'id' => 'doc_related_recent_opt',
    'subsection' => true,
    'icon' => '',
    'fields' => array(
        array(
            'title'         => esc_html__( 'Related Docs', 'core' ),
            'subtitle'      => esc_html__( 'Related docs match by the doc tags.', 'core' ),
            'id'            => 'is_related_docs',
            'type'          => 'switch',
            'on'            => esc_html__( 'Show', 'core' ),
            'off'           => esc_html__( 'Hide', 'core' ),
            'default'       => '1',
        ),

        array(
            'title'         => esc_html__( 'Title', 'core' ),
            'id'            => 'related_docs_title',
            'type'          => 'text',
            'default'       => 'Related articles',
            'required'      => array( 'is_related_docs', '=', '1' ),
        ),

        array(
            'title'         => esc_html__( 'Show Posts', 'core' ),
            'id'            => 'ppp_related_docs',
            'type'          => 'slider',
            'default'       => 4,
            "min"           => 1,
            "step"          => 1,
            "max"           => 20,
            'display_value' => 'text',
            'required'      => array( 'is_related_docs', '=', '1' ),
        ),

        array(
            'id'        => 'recent_related_divide',
            'type'      => 'divide',
        ),

        array(
            'title'     => esc_html__( 'Recently Viewed Docs', 'core' ),
            'id'        => 'is_recent_docs',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),

        array(
            'title'     => esc_html__( 'Title', 'core' ),
            'id'        => 'recent_docs_title',
            'type'      => 'text',
            'default'   => 'Recently viewed articles',
            'required'      => array( 'is_recent_docs', '=', '1' ),
        ),
    )
));
