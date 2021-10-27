<?php
add_filter('get_search_form', function($form) {
    $value = get_search_query() ? get_search_query() : '';
	$form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
         <input type="text" placeholder="' . esc_html__('Search', 'core') . '" value="' . esc_attr($value) . '" name="s" id="s" />
         <button type="submit" id="searchsubmit"><img src="' . get_template_directory_uri() . '/assets/img/50.svg" alt="Search Icon"></button>
     </form>';
	return $form;

});

