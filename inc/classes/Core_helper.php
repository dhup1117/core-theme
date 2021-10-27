<?php
/**
 * Core theme helper functions and resources
 */

class Core_Helper_Class {
    /**
	 * Hold an instance of Core_Helper_Class class.
	 * @var Core_Helper_Class
	 */
	protected static $instance = null;

	/**
	 * Main Core_Helper_Class instance.
	 * @return Core_Helper_Class - Main instance.
	 */
	public static function instance() {

		if (null == self::$instance) {
			self::$instance = new Core_Helper_Class();
		}

		return self::$instance;
	}

    /**
     * Core header Logo
     */
    public function logo() {
        $opt = get_option( 'core_opt' );
        // Main Logo
        $main_logo = isset($opt['main_logo']['url']) ? $opt['main_logo'] ['url'] : '';

        ?>
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if ( !empty($main_logo) ) : ?>
                    <img src="<?php echo esc_url($main_logo) ?>" alt="<?php bloginfo('name'); ?>">
                    <?php
                else: ?>
                    <h3> <?php echo get_bloginfo( 'name' ) ?> </h3>
                    <?php
                endif;
                ?>
            </a>
        </div>
        <?php
    }

    // Core Numeric Pagination
    function core_post_pagination() {
        if( is_singular() )
            {return;}
        global $wp_query;

        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 )
            {return;}

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );

        /**	Add current page to the array */
        if ( $paged >= 1 )
            {$links[] = $paged;}

        /**	Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }

        echo '<ul class="d-flex align-items-center">' . "\n";

        /**	Previous Post Link */
        if ( get_previous_posts_link() )
            {printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>') );}

        /**	Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : ' ';

            printf( '<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

            if ( ! in_array( 2, $links ) )
                {echo '<li>&#46;&#46;&#46;</li>';}
        }

        /**	Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );
        foreach ( $links as $link ) {
            $class = $paged == $link ? ' class="active"' : ' ';
            printf( '<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        }

        /**	Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) {
            if ( ! in_array( $max - 1, $links ) )
                {echo '<li>&#46;&#46;&#46;</li>' . "\n";}

            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }

        /**	Next Post Link */
        if ( get_next_posts_link() )
            {printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>') );}

        echo '</ul>';
    }
    
   /**
     * Social Links
     **/
    function share_links() {
        $opt = get_option( 'core_opt' );

        $is_share = $opt['is_share_icon'] ?? '';
        $fb = $opt['is_facebook'] ?? '';
        $twitter = $opt['is_twitter'] ?? '';
        $insta = $opt['is_instagram'] ?? '';
        $linkedin = $opt['is_linkedin'] ?? '';
        $youtube = $opt['is_youtube'] ?? '';
        $dribbble = $opt['is_dribbble'] ?? '';
        $github = $opt['is_github'] ?? '';


        if( $is_share == '1' ):
        ?>
        <ul class="share-option d-flex align-items-center">
            <li><?php  esc_html_e('Share', 'core')?></li>
            <?php if( $fb == '1'): ?>
                <li><a href="<?php echo esc_url($opt['facebook_url']); ?>" style="background: #588DE7;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $twitter == '1'): ?>
                <li><a href="<?php echo esc_url($opt['twitter_url']); ?>" style="background: #41CFED;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $insta == '1'): ?>
                <li><a href="<?php echo esc_url($opt['instagram_url']); ?>" style="background: #15aabf;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $linkedin == '1'): ?>
                <li><a href="<?php echo esc_url($opt['linkedin_url']); ?>" style="background: #4c6ef5;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $youtube == '1'): ?>
                <li><a href="<?php echo esc_url($opt['youtube_url']); ?>" style="background: #FF0000;"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $dribbble == '1'): ?>
                <li><a href="<?php echo esc_url($opt['dribbble_url']); ?>" style="background: #be4bdb;"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if( $github == '1'): ?>
                <li><a href="<?php echo esc_url($opt['github_url']); ?>" style="background: #fd7e14;"><i class="fa fa-github" aria-hidden="true"></i></a></li>
            <?php endif; ?>
        </ul>
        <?php
        endif;
    }

    /**
     * Limit latter
    *
    * @param $string
    * @param $limit_length
    * @param string $suffix
     */
    function limit_latter($string, $limit_length, $suffix = '...' ) {
        if (strlen($string) > $limit_length) {
            echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
        }
        else {
            echo strip_shortcodes(esc_html($string));
        }
    }

    /**
     * Post's excerpt text
     *
     * @param $settings_key
     * @param bool $echo
     *
     * @return string
     **/
    function excerpt($settings_key, $echo = true) {
        $opt = get_option( 'core_opt' );
        $blog_layout_opt = !empty( $opt['blog_layout'] ) ? $opt['blog_layout'] : 'b_w_r_s';
        $blog_layout = !empty( $_GET['blog_layout'] ) ? $_GET['blog_layout'] : $blog_layout_opt;
        $excerpt_limit = !empty( $opt[$settings_key] ) ? $opt[$settings_key] : 25;

        $post_excerpt = get_the_excerpt();
        $excerpt = (strlen(trim($post_excerpt)) != 0) ? wp_trim_words(get_the_excerpt(), $excerpt_limit, '') : wp_trim_words(get_the_content(), $excerpt_limit, '');
        if(  $echo == true ) {
            echo wp_kses_post(wpautop($excerpt));
        } else {
            return wp_kses_post(wpautop($excerpt));
        }
    }

    /** Render Meta CSS value
    *
    * @param $handle
    * @param $css_items
    */

    function meta_css_render( $handle, $css_items ) {
        $dynamic_css = '';
        $opt = get_option( 'core_opt' );

        if ( !empty($opt['blog_bg_color']) ) {
            $dynamic_css .= "
                .blog-page-bg {
                    background: linear-gradient( 45deg, {$opt['blog_bg_color']['from']}, {$opt['blog_bg_color']['to']});
                }
                .ctn-preloader .animation-preloader .spinner {
                    border-top-color: {$opt['spinner_color']};
                    border-bottom-color: {$opt['spinner_color']};
                }
                .ctn-preloader .animation-preloader .txt-loading .letters-loading:before {
                    color: {$opt['preloader_text_color']};
                }";
        }

       wp_add_inline_style( $handle, $dynamic_css );
    }

    /** Render Meta CSS value
    *
    * @param $handle
    * @param $css_items
    */
     function acf_css_render( $handle, $css_items ) {
         $dynamic_css = '';
         $opt = get_option( 'core_opt' );

         if ( function_exists('get_field') ) {
             $keys = array_keys($css_items);
             for ( $i = 0; $i < count($css_items); $i++ ) {
                 $split_id = explode('__', $keys[$i]);
                 $meta_id = $split_id[0];
                 $append = !empty($split_id[1]) ? $split_id[1] : '';
                 $meta_value = get_field($meta_id);
                 if ( !empty($meta_value) ) {
                     $css_i = 1;
                     foreach ( $css_items[$keys[$i]] as $property => $selector ) {
                         $css_output = "$selector {";
                         $css_output .= "$property: $meta_value$append;";
                         $css_output .= "}";
                         $dynamic_css .= $css_output;
                         $css_i++;
                     }
                 }
             }
         }

         if ( !empty($opt['custom_css']) ) {
    	    $dynamic_css .= $opt['custom_css'];
         }

        wp_add_inline_style( $handle, $dynamic_css );
     }


     /**
     * Pagination
     **/

    function pagination() {
        the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="arrow_carrot-left"></i>',
            'next_text'          => '<i class="arrow_carrot-right"></i>'
        ));
    }

    // Banner Title
    function banner_title() {
        $opt = get_option('core_opt');
        if ( is_home() ) {
            $blog_title = !empty($opt['blog_title']) ? $opt['blog_title'] : esc_html__( 'Blog', 'core' );
            echo esc_html($blog_title);
        } elseif ( is_page() || is_single() ) {
            the_title();
        } elseif( is_category() ) {
            single_cat_title();
        } elseif( is_archive() ) {
            the_archive_title();
        } elseif( is_search() ) {
            esc_html_e( 'Search result for: “', 'core' ); echo get_search_query().'”';
        } else {
            the_title();
        }
    }

    /**
    * Day link to archive page
    **/
    function day_link() {
        $archive_year   = get_the_time( 'Y' );
        $archive_month  = get_the_time( 'm' );
        $archive_day    = get_the_time( 'd' );
        echo get_day_link( $archive_year, $archive_month, $archive_day);
    }

    /**
     * estimated reading time
     **/
    function reading_time() {
        $content = get_post_field( 'post_content', get_the_ID() );
        $word_count = str_word_count( strip_tags( $content ) );
        $readingtime = ceil($word_count / 200);
        if ($readingtime == 1) {
            $timer = esc_html__( " minute read", 'core' );
        } else {
            $timer = esc_html__( " minutes read", 'core' );
        }
        $totalreadingtime = $readingtime . $timer;
        echo esc_html($totalreadingtime);
    }



    /**
     * Post author avatar
     **/
     function post_author_avatar( $size = 50, $default = '', $alt = '', $args = null ) {
         $post_author_id = get_post_field( 'post_author', get_the_ID() );
         echo get_avatar($post_author_id, $size, $default, $alt, $args);
     }

    /**
    * Get the first category name
    *
    * @param string $term
    */
    function first_category($term = 'category') {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? $cats[0]->name : '';
        echo esc_html($cat);
    }

    /**
    * Get the first category link
    *
    * @param string $term
    */
    function first_category_link($term='category') {
        $cats = get_the_terms(get_the_ID(), $term);
        $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
        echo esc_url($cat);
    }



    /**
    * Doc Layout
    * @return mixed|string
    */
    function doc_layout() {
        $opt = get_option('core_opt' );
        $page_doc_layout = function_exists('get_field') ? get_field('doc_layout') : 'default';
        if ( $page_doc_layout == 'default' || $page_doc_layout == '' ) {
            $doc_layout = !empty($opt['doc_layout']) ? $opt['doc_layout'] : 'both_sidebar';
        } else {
            $doc_layout = $page_doc_layout;
        }

        return $doc_layout;
    }

    /**
    * Doc width
    * @return mixed|string
    */
    function doc_width() {
        $opt = get_option('core_opt' );
        $page_doc_width = function_exists('get_field') ? get_field('doc_width') : 'default';
        if ( $page_doc_width == 'default' || $page_doc_width == '' ) {
            $doc_width = isset($opt['doc_width']) ? $opt['doc_width'] : 'boxed';
        } else {
            $doc_width = $page_doc_width;
        }

        return $doc_width;
    }

    /**
    * Image from Theme Settings
    *
    * @param $settins_key
    * @param string $class
    * @param string $alt
    */

    function image_from_settings( $settings_key = '', $class = '', $alt = '' ) {
        $opt = get_option('core_opt' );
        $page_image = function_exists('get_field') ? get_field($settings_key) : '';
        $sett_image = !empty($opt[$settings_key]) ? $opt[$settings_key] : '';
        $image = $page_image == '' ? $sett_image : $page_image;
        if ( !empty($image['id']) ) {
            echo wp_get_attachment_image($image['id'], 'full', '', array('class' => $class));
        }
        elseif ( !empty($image['url']) && empty($image['id']) ) {
            $class = !empty($class) ? "class='$class'" : '';
            echo "<img src='{$image['url']}' $class alt='$alt'>";
        }
    }

    /**
    * Render the Navbar classes based on conditions
    */
    function navbar_type() {
        $opt = get_option('core_opt' );
        $banner_preset = function_exists('get_field') ? get_field('banner_preset') : '';
        $search_banner_opt = !empty($opt['select_search_banner']) ? $opt['select_search_banner'] : 'light';
        $search_banner = !empty($banner_preset) && $banner_preset != 'default' ? $banner_preset : $search_banner_opt;
        if ( is_singular('post') || $search_banner == 'aesthetic' && is_home() || $search_banner == 'aesthetic' && in_array('bbpress', get_body_class()) ) {
            $header_type = 'white';
        } elseif ( is_singular('docs') ) {
            $header_type = $search_banner == 'aesthetic' ? 'white' : 'black';
        } else {
            $header_type = function_exists('get_field') ? get_field('core_header_type' ) : '';
            if ( !isset($header_type) || $header_type == '' ) {
                $header_type = 'black';
            }
        }
        $nav_classes = $header_type == 'white' ? ' menu_purple' : ' dark_menu';
        echo esc_html($nav_classes);
    }

}


/**
 * Instance of Core_Helper_Class class
 */
function Core_helper() {
    return Core_Helper_Class::instance();
}