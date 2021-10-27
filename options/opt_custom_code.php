<?php

Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Custom Code', 'core' ),
    'id'               => 'custom_code_opt',
    'icon'             => 'dashicons dashicons-editor-code',
    'fields'           => array(
	    array(
		    'id'       => 'custom_css',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__( 'CSS Code', 'core' ),
		    'subtitle' => esc_html__( 'Paste your CSS code here.', 'core' ),
		    'mode'     => 'css',
		    'theme'    => 'monokai',
	    ),
	    array(
		    'id'       => 'custom_js',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__( 'JS Code', 'core' ),
		    'subtitle' => esc_html__( 'Paste your JS code here.', 'core' ),
		    'mode'     => 'javascript',
		    'theme'    => 'chrome',
		    'default'  => "jQuery(document).ready(function(){\n\n});"
	    ),
    )
));