<?php

/**
 * Theme Setup
 */

function resto_setup() {

	/**
	 * Load translations
	 */
	load_theme_textdomain( 'resto', get_template_directory() . '/languages' );

	/**
	 * Register menus
	 */
	register_nav_menus( array(
		'main_menu'     => __( 'Header Menu', 'resto' ),
		'footer_menu_1' => __( 'Footer Main Menu', 'resto' ),
		'footer_menu_2' => __( 'Footer Sub Menu', 'resto' ),
	) );

	/**
	 * Theme supports
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'caption', ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );

	/**
	 * Theme image sizes
	 */
	//add_image_size( 'service-thumb', 445, 345, false );

	/**
	 * Theme filters
	 */
	add_filter( 'widget_text', 'do_shortcode' );
}

add_action( 'after_setup_theme', 'resto_setup' );


/**
 * Add styles and scripts
 */

function resto_scripts_styles() {

	/**
	 * Styles
	 */

	wp_enqueue_style( 'resto-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '20191008' );
	wp_enqueue_style( 'resto-owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css', array(), '20191008' );
	wp_enqueue_style( 'resto-fancybox', get_template_directory_uri() . '/css/fancybox.css', array(), '20191008' );
	wp_enqueue_style( 'resto-site', get_template_directory_uri() . '/css/site.css', array(), '20191008' );


	/**
	 * Scripts
	 */

	wp_enqueue_script( 'resto-bs-util-js', get_template_directory_uri() . '/js/bootstrap/util.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'resto-bs-collapse-js', get_template_directory_uri() . '/js/bootstrap/collapse.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'resto-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'resto-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3.5.7', true );
	wp_enqueue_script( 'resto-site-js', get_template_directory_uri() .'/js/site.js', array('jquery'), '20191008', true );
}

add_action( 'wp_enqueue_scripts', 'resto_scripts_styles' );


/**
 * Register sidebars
 */

function resto_register_sidebars(){
	register_sidebar(
		array(
			'name'          => __( 'After Content', 'resto' ),
			'id'            => 'after-content',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Menu List', 'resto' ),
			'id'            => 'footer-menu-list',
			'description'   => '',
			'before_widget' => '<div class="col-md col-sm-4 col-6"><div class="footer-menu-container">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="footer-menu-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Hidden', 'resto' ),
			'id'            => 'sidebar-hidden',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}

add_action( 'widgets_init', 'resto_register_sidebars' );


/**
 * ACF
 */

require 'acf/init.php';


/**
 * Template functions
 */

require 'inc/template-functions.php';


/**
 * Customizer
 */

require 'inc/customizer.php';


/**
 * Additional Classes
 */

require 'classes/bs4navwalker.php';
