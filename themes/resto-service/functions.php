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
		'main_menu'             => __( 'Header Menu', 'resto' ),
		'product_category_menu' => __( 'Sidebar Product Category Menu', 'resto' ),
		'footer_menu_1'         => __( 'Footer Main Menu', 'resto' ),
		'footer_menu_2'         => __( 'Footer Sub Menu', 'resto' ),
	) );

	/**
	 * Theme supports
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'caption', ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );

	/**
	 * Theme image sizes
	 */
	add_image_size( 'testimonial-thumb', 370, 240, true );
	add_image_size( 'video-thumb', 170, 96, true );

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
	wp_enqueue_style( 'resto-wc', get_template_directory_uri() . '/css/woocommerce.css', array(), '20191008' );
	wp_enqueue_style( 'resto-site', get_template_directory_uri() . '/css/site.css', array(), '20191008' );


	/**
	 * Scripts
	 */

	wp_enqueue_script( 'resto-bs-js', get_template_directory_uri() . '/js/bootstrap.build.js', array('jquery'), '20191106', true );
	wp_enqueue_script( 'resto-owl-carousel-js', get_template_directory_uri() . '/js/owl-carousel.build.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'resto-fancybox-js', get_template_directory_uri() . '/js/fancybox.build.js', array('jquery'), '3.5.7', true );
	wp_enqueue_script( 'resto-site-js', get_template_directory_uri() .'/js/site.build.js', array('jquery'), '20191106', true );

	wp_localize_script( 'resto-site-js', 'restoCart', array(
		'urlEmpty' => add_query_arg( array( 'empty' => '1' ), site_url('/cart/') ),
	) );
}

add_action( 'wp_enqueue_scripts', 'resto_scripts_styles' );


/**
 * Register sidebars
 */

function resto_register_sidebars(){
	register_sidebar(
		array(
			'name'          => __( 'After Content', 'resto' ),
			'id'            => 'content-after',
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
 * Add support upload extra file types
 */

function resto_add_file_types_to_uploads($file_types){
	$new_filetypes = array();

	$new_filetypes['svg'] = 'image/svg+xml';

	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}

function resto_allow_upload_svg( $type_and_ext, $file, $filename, $mimes ){
	if( '.svg' === strtolower( substr($filename, -4) ) ){
		$filesize = filesize( $file ) / 1024;

		if( $filesize < 50 && current_user_can('manage_options') ){
			$type_and_ext['ext']  = 'svg';
			$type_and_ext['type'] = 'image/svg+xml';
		}
		else {
			$type_and_ext['ext'] = $type_and_ext['type'] = false;
		}
	}

	return $type_and_ext;
}

add_action('upload_mimes', 'resto_add_file_types_to_uploads');
add_filter('wp_check_filetype_and_ext', 'resto_allow_upload_svg', 10, 4);


/**
 * Add icons to Menu Items
 */

function resto_product_cat_wp_nav_menu_objects( $items, $args ) {

	if ( ! function_exists('get_field') || 'product_category_menu' !== $args->theme_location ) {
		return $items;
	}

	foreach( $items as &$item ) {
		$icon = get_field('icon', $item);

		if ( $icon ) {
			$item->title = '<span class="ico">'. file_get_contents( $icon['url'] ) .'</span>'. $item->title;
		}
	}

	return $items;
}

add_filter('wp_nav_menu_objects', 'resto_product_cat_wp_nav_menu_objects', 10, 2);


/**
 * Add knowledge custom trail to some post type pages
 */

function resto_knowledge_add_breadcrumb( $breadcrumb_trail ) {
	/**
	 * Allowed post types
	 * @var array
	 */
	$post_types_list = array( 'post', 'rs-video', );

	/**
	 * Current post type
	 * @var string
	 */
	$post_type_current = get_post_type();

	/**
	 * Condition for Knowledget Base trail add
	 * @var boolean
	 */
	$condition_to_show = in_array( $post_type_current, $post_types_list );

	if ( $condition_to_show ) {
		$knowledge_breadcrumb = new bcn_breadcrumb( __( 'Knowledge Base', 'resto' ), NULL, array('knowledge'), '/knowledge/');

		array_splice( $breadcrumb_trail->breadcrumbs, -1, 0, array($knowledge_breadcrumb) );
	}
}

add_action('bcn_after_fill', 'resto_knowledge_add_breadcrumb');


/**
 * Additional Classes
 */

require 'classes/bs4navwalker.php';


/**
 * Template functions
 */

require 'inc/template-functions.php';


/**
 * Customizer
 */

require 'inc/customizer.php';


/**
 * Shortcodes
 */

require 'inc/shortcodes.php';


/**
 * WooCommerce
 */

require 'woocommerce/wc.php';