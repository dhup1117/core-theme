<?php

// Register Widget areas
add_action( 'widgets_init', function () {
	//$opt = get_option('core_opt');
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'core' ),
		'description'   => esc_html__( 'Place widgets in sidebar widgets area.', 'core' ),
		'id'            => 'sidebar_widgets',
		'before_widget' => '<div id="%1$s" class="widget mb-85 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sidebar-title">',
		'after_title'   => '</h4>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'core' ),
		'description'   => esc_html__( 'Add widgets here for Footer widgets area', 'core' ),
		'id'            => 'footer_widgets',
		'before_widget' => '<div id="%1$s" class="footer_widget col-lg-3 col-md-4 footer-list" data-aos="fade-up" data-aos-duration="1200">
                            <div class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="footer-title">',
		'after_title'   => '</h5>',
	) );
} );
