<?php
// Header Section
Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Header', 'core' ),
    'id'               => 'header_sec',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-arrow-up-alt2',
));

// Header Layouts
Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Header Layouts', 'core' ),
    'id'               => 'header_layouts',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Header Layout', 'core' ),
            'id'        => 'header_layout',
            'type'      => 'image_select',
            'options'   => array(
                'h_layout_1' => array(
                    'alt' => esc_html__( 'Layout One', 'core' ),
                    'img' => CORE_DIR_IMG.'/header_layouts/header_1.png'
                ),
                'h_layout_2' => array(
                    'alt' => esc_html__( 'Layout Two', 'core' ),
                    'img' => CORE_DIR_IMG.'/header_layouts/header_2.png'
                ),
                'h_layout_3' => array(
                    'alt' => esc_html__( 'Layout Three', 'core' ),
                    'img' => CORE_DIR_IMG.'/header_layouts/header_3.png'
                ),
	            'h_layout_4' => array(
		            'alt' => esc_html__( 'Layout Four', 'core' ),
		            'img' => CORE_DIR_IMG.'/header_layouts/header_4.png'
	            ),
            ),
            'default' => 'h_layout_1'
        ),
    )
) );


// Logo
Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Logo', 'core' ),
    'id'               => 'logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Logo', 'core' ),
            'subtitle'  => esc_html__( 'Upload here of your logo.', 'core' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => CORE_DIR_IMG.'/core_01.svg'
            )
        ),

        array(
            'title'     => esc_html__( 'Retina Logo', 'core' ),
            'subtitle'  => esc_html__( 'If you use SVG image, you will not need 2x retina images.', 'core' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => CORE_DIR_IMG.'/core_01.svg'
            )
        ),

        array(
            'title'     => esc_html__( 'Logo dimensions', 'core' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'core' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.logo>a>img'
        ),

        array(
            'title'     => esc_html__( 'Padding', 'core' ),
            'subtitle'  => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'core' ),
            'id'        => 'logo_padding',
            'type'      => 'spacing',
            'output'    => array( '.theme-main-menu .logo' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),
    )
) );


/**
 * Button
 */
Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Button', 'core' ),
    'id'               => 'menu_btn_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Button Visibility', 'core' ),
            'id'        => 'is_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
        ),

        array(
            'title'     => esc_html__( 'Button label', 'core' ),
            'subtitle'  => esc_html__( 'Leave the button label field empty to hide the menu button.', 'core' ),
            'id'        => 'menu_btn_label',
            'type'      => 'text',
            'default'   => esc_html__( 'Log in', 'core' ),
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL', 'core' ),
            'id'        => 'menu_btn_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL Target', 'core' ),
            'id'        => 'menu_btn_target',
            'type'      => 'select',
            'options'   => array(
            	'_blank' => esc_html__( 'Blank (Open in new tab)', 'core' ),
            	'_self' => esc_html__( 'Self (Open in the same tab)', 'core' ),
            ),
            'output'    => array( 
                '.right-button-group a.signIn-action'
            ),
            'default'   => '_self',
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Font color', 'core' ),
            'id'        => 'menu_btn_font_color',
            'type'      => 'color',
            'output'    => array( 
                '.right-button-group a.signIn-action', 
                '.theme-menu-three .user-login-button li a', 
                '.theme-menu-four .right-button-group a.signIn-action' 
            ),
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),
        
        array(
            'title'     => esc_html__( 'Hover Font Color', 'core' ),
            'id'        => 'menu_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array( 
                '.theme-menu-one .right-button-group .signIn-action:hover', 
                '.theme-menu-three .user-login-button li a:hover', 
                '.theme-menu-four .right-button-group li a.signIn-action:hover'
            ),
            'required'  => array( 'is_menu_btn', '=', '1' )
        ),

	    array(
		    'title'     => esc_html__( 'Button padding', 'core' ),
		    'subtitle'  => esc_html__( 'Padding around the menu button.', 'core' ),
		    'id'        => 'menu_btn_padding',
		    'type'      => 'spacing',
		    'output'    => array( 
                '.right-button-group a.signIn-action', 
                '.theme-menu-three .user-login-button li a', 
                '.theme-menu-four .right-button-group a.signIn-action'  
            ),
		    'mode'      => 'padding',
		    'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
		    'units_extended' => 'true',
		    'required'  => array( 'is_menu_btn', '=', '1' )
	    )
    )
));


/**
 * Action button
 */
Redux::set_section( 'core_opt', array(
    'title'            => esc_html__( 'Action Button', 'core' ),
    'id'               => 'menu_action_btn_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Button Visibility', 'core' ),
            'id'        => 'is_action_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
        ),

        array(
            'title'     => esc_html__( 'Button label', 'core' ),
            'subtitle'  => esc_html__( 'Leave the button label field empty to hide the menu action button.', 'core' ),
            'id'        => 'menu_action_btn_label',
            'type'      => 'text',
            'default'   => esc_html__( 'Get Started', 'core' ),
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL', 'core' ),
            'id'        => 'menu_action_btn_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Button URL Target', 'core' ),
            'id'        => 'menu_action_btn_target',
            'type'      => 'select',
            'options'   => array(
            	'_blank' => esc_html__( 'Blank (Open in new tab)', 'core' ),
            	'_self' => esc_html__( 'Self (Open in the same tab)', 'core' ),
            ),
            'default'   => '_self',
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

	    array(
		    'title'     => esc_html__( 'Button padding', 'core' ),
		    'subtitle'  => esc_html__( 'Padding around the menu action button.', 'core' ),
		    'id'        => 'menu_action_btn_padding',
		    'type'      => 'spacing',
		    'output'    => array( '.right-button-group .signUp-action' ),
		    'mode'      => 'padding',
		    'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
		    'units_extended' => 'true',
		    'required'  => array( 'is_action_menu_btn', '=', '1' )
	    ),

        array(
            'title'     => esc_html__( 'Font color', 'core' ),
            'subtitle'  => esc_html__( 'Action Button Font Color.', 'core' ),
            'id'        => 'menu_action_btn_font_color',
            'type'      => 'color',
            'output'    => array( 
                '.theme-menu-one .right-button-group .signUp-action', 
                '.theme-menu-three .user-login-button li .signUp-action', 
                'a.theme-btn-five'
            ),
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Hover Font Color', 'core' ),
            'subtitle'  => esc_html__( 'Font Color For Hover Action Button.', 'core' ),
            'id'        => 'menu_action_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array(
                '.theme-menu-one .right-button-group .signUp-action:hover',
                '.theme-menu-three .user-login-button li .signUp-action:hover',
                'a.theme-btn-five:hover'
            ),
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Background Color', 'core' ),
            'subtitle'  => esc_html__( 'Action Button Background Color.', 'core' ),
            'id'        => 'menu_action_btn_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array( 
                '.theme-menu-one .right-button-group .signUp-action', 
                '.theme-menu-three .user-login-button li .signUp-action', 
                'a.theme-btn-five'
            ),
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),

        array(
            'title'     => esc_html__( 'Hover background color', 'core' ),
            'subtitle'  => esc_html__( 'Background Color For Hover Action Button.', 'core' ),
            'id'        => 'menu_action_btn_hover_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array(
                '.theme-menu-one .right-button-group .signUp-action:hover', 
                '.theme-menu-three .user-login-button li .signUp-action:hover', 
                'a.theme-btn-five:before' 
            ),
            'required'  => array( 'is_action_menu_btn', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Border color', 'core' ),
            'subtitle'  => esc_html__( 'Border Color For Action Button.', 'core' ),
            'id'        => 'menu_action_btn_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array( 
                '.theme-menu-three .user-login-button li .signUp-action'
            ),
            'required' => array( 
                array( 'is_action_menu_btn', 'equals', '1' ), 
                array( 'header_layout', 'equals', 'h_layout_2' ) 
            )
        ),
        array(
            'title'     => esc_html__( 'Hover border color', 'core' ),
            'subtitle'  => esc_html__( 'Border Color For Hover Action Button.', 'core' ),
            'id'        => 'menu_action_btn_hover_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array( 
                '.theme-menu-three .user-login-button li .signUp-action:hover'
            ),
            'required' => array( 
                array( 'is_action_menu_btn', 'equals', '1' ), 
                array( 'header_layout', 'equals', 'h_layout_2' ) 
            )
        ),

        array(
            'id'     => 'action_button_colors-end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));
