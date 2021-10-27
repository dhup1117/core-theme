<?php
Redux::set_section('core_opt', array(
    'title'     => esc_html__( 'Social links', 'core' ),
    'id'        => 'opt_social_links',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(

        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'title' => esc_html__( 'Facebook', 'core' ),
            'default'	 => '#'
        ),

        array(
            'title' => esc_html__( 'Facebook Icon Background Color', 'core' ),
            'id'       => 'facebook_bg',
            'type'     => 'color',
            'default'  => '#FFFFFF',
            'validate' => 'color',
        ),

        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'title' => esc_html__( 'Twitter', 'core' ),
            'default'	  => '#'
        ),

        array(
            'id'    => 'instagram',
            'type'  => 'text',
            'title' => esc_html__( 'Instagram', 'core' ),
        ),

        array(
            'id'    => 'linkedin',
            'type'  => 'text',
            'title' => esc_html__( 'LinkedIn', 'core' ),
            'default'	  => '#'
        ),

        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'title' => esc_html__( 'Youtube', 'core' ),
        ),

        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'title' => esc_html__( 'Dribbble', 'core' ),
        ),

        array(
            'id'    => 'github',
            'type'  => 'text',
            'title' => esc_html__( 'GitHub', 'core' ),
        ),

    ),
));