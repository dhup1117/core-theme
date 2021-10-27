<?php
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Forums', 'core' ),
	'id'        => 'forums_opt',
	'icon'      => 'dashicons dashicons-buddicons-forums',
));

/**
 * Forum archive settings
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Forum Archive', 'core' ),
	'id'        => 'forum_archive_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'     => array(
        array(
            'title'     => esc_html__( 'Top Call to Action', 'core' ),
            'id'        => 'is_forum_top_c2a',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),

        /**
         * Top Call to Action
         */
        array(
            'title'     => esc_html__( 'Top Call to Action Controls', 'core' ),
            'id'        => 'forum_top_c2a-start',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_forum_top_c2a', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Left Featured Image', 'core' ),
            'id'        => 'forum_top_c2a_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => CORE_DIR_IMG.'/forum/answer.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Title', 'core' ),
            'id'        => 'forum_top_c2a_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Can’t find an answer?', 'core' )
        ),

        array(
            'title'     => esc_html__( 'Subtitle', 'core' ),
            'id'        => 'forum_top_c2a_subtitle',
            'type'      => 'text',
            'default'   => esc_html__( 'Make use of a qualified tutor to get the answer', 'core' )
        ),

        array(
            'title'     => esc_html__( 'Button Title', 'core' ),
            'id'        => 'forum_top_c2a_btn_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Ask a Question', 'core' )
        ),
        array(
            'title'     => esc_html__( 'Button URL', 'core' ),
            'id'        => 'forum_top_c2a_btn_url',
            'type'      => 'text',
            'default'   => '#'
        ),

        array(
            'id'     => 'forum_top_c2a-end',
            'type'   => 'section',
            'indent' => false,
        ),

        /**
         * Bottom Call to Action
         */
        array(
            'title'     => esc_html__( 'Bottom Call to Action', 'core' ),
            'id'        => 'is_forum_btm_c2a',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Bottom Call to Action', 'core' ),
            'subtitle'  => esc_html__( 'Control here the bottom Call to Action area of the Forum archive pages.', 'core' ),
            'id'        => 'forum_btm_c2a-start',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_forum_btm_c2a', '=', '1')
        ),
        array(
            'title'     => esc_html__( 'Left Featured Image', 'core' ),
            'id'        => 'forum_btm_c2a_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => CORE_DIR_IMG.'/forum/chat-smile.png'
            )
        ),
        array(
            'title'     => esc_html__( 'Background Image', 'core' ),
            'id'        => 'forum_btm_c2a_bg',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => CORE_DIR_IMG.'/forum/overlay_bg.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Title', 'core' ),
            'id'        => 'forum_btm_c2a_title',
            'type'      => 'text',
            'default'   => esc_html__( 'New to Communities?', 'core' )
        ),

        array(
            'title'     => esc_html__( 'Button Title', 'core' ),
            'id'        => 'forum_btm_c2a_btn_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Join the community ', 'core' )
        ),
        array(
            'id'     => 'forum_btm_c2a-end',
            'type'   => 'section',
            'indent' => false,
        ),
	)
));

/**
 * Forum topics archive
 */
Redux::set_section('core_opt', array(
	'title'         => esc_html__( 'Topics Archive', 'core' ),
	'id'            => 'topics_archive_opt',
	'icon'          => '',
	'subsection'    => true,
	'fields'        => array(
		array(
			'title'     => esc_html__( 'Forums', 'core' ),
			'id'        => 'is_forums_in_topics',
			'type'      => 'switch',
			'on'        => esc_html__( 'Show', 'core' ),
			'off'       => esc_html__( 'Hide', 'core' ),
			'default'   => '1',
		),
		array(
			'title'         => esc_html__( 'Forums', 'core' ),
			'desc'          => esc_html__( 'Forums to show above the topics list.', 'core' ),
			'id'            => 'forums_ppp_in_topics',
			'type'          => 'slider',
			'default'       => 4,
			'min'           => 4,
			'step'          => 1,
			'max'           => 50,
			'display_value' => 'label',
		),
	)
));
