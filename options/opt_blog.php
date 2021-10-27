<?php
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Blog Pages', 'core' ),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));

/**
 * Blog archive settings
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Blog Page', 'core' ),
	'id'        => 'blog_meta_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Blog Page Title', 'core' ),
            'id'        => 'blog_title',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Page Title', 'core' ),
            'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'core' ),
            'id'        => 'page_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Check our company inside story', 'core' ),
            'required' => array (
                array ( 'blog_title', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Page Sub Title', 'core' ),
            'subtitle'     => esc_html__( 'If you do not want this field, leave the blank.', 'core' ),
            'id'        => 'page_subtitle',
            'type'      => 'text',
            'default'   => esc_html__( 'You will find here our company news and latest update', 'core' ),
            'required' => array (
                array ( 'blog_title', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Blog Layout', 'core' ),
            'id'        => 'blog_layout',
            'type'      => 'image_select',
            'options'   => array(
                'b_w_r_s' => array(
                    'alt' => esc_html__( 'Blog with right sidebar layout', 'core' ),
                    'img' => CORE_DIR_IMG.'/blog_layouts/sidebar_right.jpg'
                ),
                'b_w_l_s' => array(
                    'alt' => esc_html__( 'Blog with left sidebar layout', 'core' ),
                    'img' => CORE_DIR_IMG.'/blog_layouts/sidebar_left.jpg'
                ),
                'grid' => array(
                    'alt' => esc_html__( 'Grid Layout', 'core' ),
                    'img' => CORE_DIR_IMG.'/blog_layouts/grid.jpg'
                ),
                'list' => array(
                    'alt' => esc_html__( 'List Layout', 'core' ),
                    'img' => CORE_DIR_IMG.'/blog_layouts/list.jpg'
                ),
            ),
            'default' => 'b_w_r_s'
        ),
        array(
            'title'     => esc_html__( 'Column', 'core' ),
            'id'        => 'blog_column',
            'type'      => 'select',
            'options'   => [
                '6' => esc_html__( 'Two', 'core' ),
                '4' => esc_html__( 'Three', 'core' ),
                '3' => esc_html__( 'Four', 'core' ),
            ],
            'default'   => '4',
            'required' => array (
                array ( 'blog_layout', '=', array( 'grid' ) ),
            )
        ),
        array(
            'title'     => esc_html__( 'Post title length', 'core' ),
            'subtitle'  => esc_html__( 'Blog post title length in character', 'core' ),
            'id'        => 'post_title_length',
            'type'      => 'slider',
            'default'   => 50,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text',
        ),
        array(
            'title'     => esc_html__( 'Post word excerpt', 'core' ),
            'subtitle'  => esc_html__( 'If post excerpt empty, the excerpt content will take from the post content. Define here how much word you want to show along with the each posts in the blog page.', 'core' ),
            'id'        => 'blog_excerpt',
            'type'      => 'slider',
            'default'   => 40,
            "min"       => 1,
            "step"      => 1,
            "max"       => 500,
            'display_value' => 'text'
        ),
        array(
            'title'     => esc_html__( 'Continue Reading Label', 'core' ),
            'id'        => 'blog_continue_read',
            'type'      => 'text',
            'default'   => esc_html__( 'Continue Reading', 'core' ),
        ),
        array(
			'title'     => esc_html__( 'Post date', 'core' ),
			'id'        => 'is_post_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required' => array( 'blog_layout', '!=', 'grid' )
		),
        array(
            'id'        => 'blog_bg_color',
            'title'     => esc_html__( 'Blog Background Color', 'core' ),
            'type'      => 'color_gradient',
            'validate' => 'color',
            'default'  => array(
                'from' => '#FFFBF2',
                'to'   => '#EDFFFD', 
            ),
        ),
	)
));

/**
 * Post single
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Blog Single', 'core' ),
	'id'        => 'blog_single_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__( 'Featured Image', 'core' ),
			'id'        => 'is_featured_img',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1'
		),
        array(
			'title'     => esc_html__( 'Post Date', 'core' ),
			'id'        => 'is_single_post_date',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1'
		),
		array(
			'title'     => esc_html__( 'Post Tag', 'core' ),
			'id'        => 'is_post_tag',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1'
		),

	)
));


/**
 * Post blog single social Icon
 */
Redux::set_section('core_opt', array(
	'title'     => esc_html__( 'Single Blog Share Icon', 'core' ),
	'id'        => 'blog_single_social_icon_opt',
	'icon'      => '',
	'subsection' => true,
	'fields'    => array(
        array(
            'title'     => esc_html__( 'Share Icon Visibility ', 'core' ),
            'id'        => 'is_share_icon',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
        ),
        array(
            'title'     => esc_html__( 'Facebook', 'core' ),
            'id'        => 'is_facebook',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Facebook URL', 'core' ),
            'id'        => 'facebook_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_facebook', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Twitter', 'core' ),
            'id'        => 'is_twitter',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Twitter URL', 'core' ),
            'id'        => 'twitter_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_twitter', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Instagram', 'core' ),
            'id'        => 'is_instagram',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Instagram URL', 'core' ),
            'id'        => 'instagram_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_instagram', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'LinkedIn', 'core' ),
            'id'        => 'is_linkedin',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'LinkedIn URL', 'core' ),
            'id'        => 'linkedin_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_linkedin', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Youtube', 'core' ),
            'id'        => 'is_youtube',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Youtube URL', 'core' ),
            'id'        => 'youtube_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_youtube', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'Dribbble', 'core' ),
            'id'        => 'is_dribbble',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'Dribbble URL', 'core' ),
            'id'        => 'dribbble_url',
            'type'      => 'text',
            'default'   => '#',
            'required' => array (
                array ( 'is_dribbble', '=', '1' ),
            )
        ),
        array(
            'title'     => esc_html__( 'GitHub', 'core' ),
            'id'        => 'is_github',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'core' ),
            'off'       => esc_html__( 'Hide', 'core' ),
            'default'   => '1',
            'required'  => array('is_share_icon', '=', '1' )
        ),
        array(
            'title'     => esc_html__( 'GitHub URL', 'core' ),
            'id'        => 'github_url',
            'default'   => '#',
            'type'      => 'text',
            'required' => array (
                array ( 'is_github', '=', '1' ),
            )
        )
	)
));