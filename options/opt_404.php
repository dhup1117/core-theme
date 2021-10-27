<?php

Redux::set_section( 'core_opt', array(
	'title'  => esc_html__( '404 Error Settings', 'core' ),
	'id'     => '404_0pt',
	'icon'   => 'dashicons dashicons-info',
	'fields' => array(
		array(
			'title'   => esc_html__( 'Title Text', 'core' ),
			'id'      => 'error_heading',
			'type'    => 'textarea',
			'default' => esc_html__( "Sorry, The Page Can’t be Found.", 'core' ),
		),

		array(
			'title'   => esc_html__( 'Subtitle', 'core' ),
			'id'      => 'error_subtitle',
			'type'    => 'textarea',
			'default' => esc_html__( 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'core' ),
		),

		array(
			'title'    => esc_html__( 'Image on right', 'core' ),
			'subtitle' => esc_html__( 'Upload here the image to show on right side', 'core' ),
			'id'       => 'error_image',
			'type'     => 'media',
			'compiler' => true,
			'default'  => [
				'url' => CORE_DIR_IMG . '/404.svg'
			]
		),

		array(
			'title'    => esc_html__( 'Question mark', 'core' ),
			'subtitle' => esc_html__( 'Upload any image to replace animated question mark.', 'core' ),
			'id'       => 'error_question',
			'type'     => 'media',
			'compiler' => true,
			'default'  => [
				'url' => CORE_DIR_IMG . '/404-q.svg'
			]
		),

	)
) );
