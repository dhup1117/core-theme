<?php
    /**
     * The header for our theme
     *
     * This is the template that displays all of the <head> section
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package deksi
     */
    // Theme settings options
    $opt          = get_option( 'core_opt' );
    $is_preloader = isset( $opt['is_preloader'] ) ? $opt['is_preloader'] : '';
    // header layout
    $header_layout_opt = ! empty( $opt['header_layout'] ) ? $opt['header_layout'] : 'h_layout_1';
    $header_layout     = ! empty( $_GET['header_layout'] ) ? $_GET['header_layout'] : $header_layout_opt;


    ?>

    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <!-- Theme Version -->
        <meta name="core-version" content="<?php // echo esc_attr($my_theme->Version) ?>">
        <!-- Charset Meta -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="main-page-wrapper">
        <?php
        //Preloader
        if ( $is_preloader == '1' ) {
            get_template_part( 'template-parts/header-elements/preloader' );
        }

        if ( function_exists( 'get_field' ) ) {
            $page_header_layout = get_field( 'header_layouts' ) ?? '';

            if ( $page_header_layout && $page_header_layout != 'Default' ) {
                switch ( $page_header_layout ) {
                    case 'Creative':
                        $header_layout = 'h_layout_1';
                        break;
                    case 'Doc':
                        $header_layout = 'h_layout_2';
                        break;
                    case 'Event':
                        $header_layout = 'h_layout_3';
                        break;
                    case 'Customer Support':
                        $header_layout = 'h_layout_4';
                        break;
                    default:
                        $header_layout = 'h_layout_1';
                }
            }
        }

        // header layout
        if ( $header_layout == 'h_layout_1' ) {
            get_template_part( 'template-parts/header-elements/header-1' );
        } elseif ( $header_layout == 'h_layout_2' ) {
            get_template_part( 'template-parts/header-elements/header-2' );
        } elseif ( $header_layout == 'h_layout_3' ) {
            get_template_part( 'template-parts/header-elements/header-3' );
        } elseif ( $header_layout == 'h_layout_4' ){
            get_template_part( 'template-parts/header-elements/header-4' );
        }
        