<?php
// Theme settings options
$opt = get_option('core_opt');

/* Upload SVG Image */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/* Wrap up the Categories count in span tag */
add_filter('wp_list_categories', function ($links) {
    $links = str_replace('</a> (', '<span>(', $links);
    $links = str_replace(')', ')</span> </a>', $links);
    return $links;
});

/* Wrap up the archive count in span tag */
add_filter( 'get_archives_link', function($links) {
    $links = str_replace('</a>&nbsp;(', '<span>(', $links);
    $links = str_replace(')', ')</span> </a>', $links);
    return $links;
});

// add category nick names in body and post class
function core_post_class($classes)
{
    global $post;
    if (!has_post_thumbnail()) {
        $classes[] = 'no-post-thumbnail';
    }
    if (is_sticky() && !in_array('sticky', $classes)) {
        $classes[] = 'sticky';
    }
    return $classes;
}
add_filter('post_class', 'core_post_class');

/**
 * Body classes
 */
add_filter('body_class', function ($classes) {
    $opt = get_option('core_opt');
    $has_menu = has_nav_menu('main_menu') ? '' : 'has_not_menu';

    $classes[] = $has_menu;

    if ( !class_exists('Core_core') ) {
        $classes[] = 'no-core';
    }

    return $classes;
});

/**
 * Show post excerpt by default
 * @param $user_login
 * @param $user
 */
function core_show_post_excerpt($user_login, $user)
{
    $unchecked = get_user_meta($user->ID, 'metaboxhidden_post', true);
    $key = is_array($unchecked) ? array_search('postexcerpt', $unchecked) : FALSE;
    if (FALSE !== $key) {
        array_splice($unchecked, $key, 1);
        update_user_meta($user->ID, 'metaboxhidden_post', $unchecked);
    }
}
add_action('wp_login', 'core_show_post_excerpt', 10, 2);

// filter to replace class on reply link
add_filter('comment_reply_link', function ($class) {
    $class = str_replace("class='comment-reply-link", "class='comment_reply", $class);
    return $class;
});

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function core_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'core_pingback_header');

// Move the comment field to bottom
add_filter('comment_form_fields', function ($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
});

// Remove WordPress admin bar default CSS
add_action('get_header', function () {
    remove_action('wp_head', '_admin_bar_bump_cb');
});


// Elementor post type support
function core_add_cpt_support()
{

    //if exists, assign to $cpt_support var
    $cpt_support = get_option('elementor_cpt_support');

    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'docs']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }

    //if it DOES exist, but header is NOT defined
    elseif (!in_array('docs', $cpt_support)) {
        $cpt_support[] = 'docs'; //append to array
        update_option('elementor_cpt_support', $cpt_support); //update database
    }

    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action('after_switch_theme', 'core_add_cpt_support');

/**
 * Slug re-write
 */
if (!empty($opt['doc_slug'])) {
    add_filter('register_post_type_args', 'core_register_post_type_args', 10, 2);
    function core_register_post_type_args($args, $post_type)
    {
        $opt = get_option('core_opt');
        if ('docs' === $post_type) {
            $args['rewrite']['slug'] = $opt['doc_slug'];
        }

        return $args;
    }
}

// Color Picker Issue solution
if (is_admin()) {
    add_action('wp_default_scripts', 'core_default_custom_scripts');
    function core_default_custom_scripts($scripts)
    {
        $scripts->add('wp-color-picker', "/wp-admin/js/color-picker.js", array('iris'), false, 1);
        did_action('init') && $scripts->localize(
            'wp-color-picker',
            'wpColorPickerL10n',
            array(
                'clear'            => esc_html__('Clear', 'core'),
                'clearAriaLabel'   => esc_html__('Clear color', 'core'),
                'defaultString'    => esc_html__('Default', 'core'),
                'defaultAriaLabel' => esc_html__('Select default color', 'core'),
                'pick'             => esc_html__('Select Color', 'core'),
                'defaultLabel'     => esc_html__('Color value', 'core'),
            )
        );
    }
}

/**
 * Saving automatically the ACF group fields json files
 */
add_filter('acf/settings/save_json', function ($path) {

    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json';

    // return
    return $path;
});

/**
 * Loading the saved ACF fields
 */
add_filter('acf/settings/load_json', function ($paths) {
    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';
    // return
    return $paths;
});

/**
 * Turn on the WordPress visual editor for bbPress
 * @param array $args
 *
 * @return array|mixed
 */
function core_bbp_enable_visual_editor($args = array())
{
    $args['tinymce'] = true;
    return $args;
}
add_filter('bbp_after_get_the_content_parse_args', 'core_bbp_enable_visual_editor');

/**
 * weDocs breadcrumb
 */
add_filter('wedocs_breadcrumbs_html', function () {
    global $post;

    $html = '';
    $args = apply_filters('wedocs_breadcrumbs', [
        'delimiter' => '',
        'home'      => esc_html__('Home', 'core'),
        'before'    => '<li class="breadcrumb-item active">',
        'after'     => '</li>',
    ]);

    $breadcrumb_position = 1;

    $html .= '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
    $html .= '<li class="home-icon"><ion-icon name="home-outline"></ion-icon></li>';
    $html .= wedocs_get_breadcrumb_item($args['home'], home_url('/'), $breadcrumb_position);
    $html .= $args['delimiter'];

    $docs_home = wedocs_get_option('docs_home', 'wedocs_settings');

    if ($docs_home) {
        ++$breadcrumb_position;

        $html .= wedocs_get_breadcrumb_item(esc_html__('Docs', 'core'), get_permalink($docs_home), $breadcrumb_position);
        $html .= $args['delimiter'];
    }

    if ('docs' == $post->post_type && $post->post_parent) {
        $parent_id   = $post->post_parent;
        $breadcrumbs = [];

        while ($parent_id) {
            ++$breadcrumb_position;

            $page          = get_post($parent_id);
            $breadcrumbs[] = wedocs_get_breadcrumb_item(get_the_title($page->ID), get_permalink($page->ID), $breadcrumb_position);
            $parent_id     = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);

        for ($i = 0; $i < count($breadcrumbs); ++$i) {
            $html .= $breadcrumbs[$i];
            $html .= ' ' . $args['delimiter'] . ' ';
        }
    }

    $html .= ' ' . $args['before'] . get_the_title() . $args['after'];

    $html .= '</ol>';

    return $html;
});

// Recently Viewed Docs
add_action('template_redirect', 'core_posts_visited');
function core_posts_visited()
{
    if (is_single() || is_page()) {
        $cooki    = 'core_recent_posts';
        $ft_posts = isset($_COOKIE[$cooki]) ? json_decode($_COOKIE[$cooki], true) : null;
        if (isset($ft_posts)) {
            // Remove current post in the cookie
            $ft_posts = array_diff($ft_posts, array(get_the_ID()));
            // update cookie with current post
            array_unshift($ft_posts, get_the_ID());
        } else {
            $ft_posts = array(get_the_ID());
        }
        setcookie($cooki, json_encode($ft_posts), time() + (DAY_IN_SECONDS * 31), COOKIEPATH, COOKIE_DOMAIN);
    }
}


if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
        'page_title'     => esc_html__('Changelogs Settings', 'core'),
        'menu_title'    => esc_html__('Settings', 'core'),
        'parent_slug'    => 'edit.php?post_type=changelog',
    ));
}
