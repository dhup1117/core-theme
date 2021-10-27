<?php
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Team', 'core' ),
	'id'        => 'team_page',
	'icon'      => 'dashicons dashicons-admin-users',
));

/**
 * Blog archive settings
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Team Single Page', 'core' ),
	'id'        => 'team_single_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Social Items Title', 'core' ),
            'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'core' ),
            'id'        => 'team_social_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Follow & Contact', 'core' ),
        ),
	)
));
