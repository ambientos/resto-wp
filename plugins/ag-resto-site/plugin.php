<?php

/**
 * Plugin Name: AG Resto Site
 * Description: Special plugin for Resto site
 * Version: 0.1
 * Author: Anton Grakhov
 * Author URI: https://grakhov.dev/
 * Tested up to: 5.2
 * Text Domain: resite
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin prefix for constants
 *
 * @var string
 */
$plugin_prefix = 'AG_Resto_Site\\';


/**
 * Plugin folder name
 */
$plugin_folder_name = 'ag-resto-site';


/**
 * Text Domain
 */
define( $plugin_prefix . 'TEXT_DOMAIN', 'resite' );


/**
 * Plugin Folder
 */
define( $plugin_prefix . 'PLUGIN_FOLDER', WP_PLUGIN_DIR . '/' . $plugin_folder_name );


/**
 * Plugin URI
 */
define( $plugin_prefix . 'PLUGIN_URI', plugins_url( $plugin_folder_name ) );


/**
 * ACF folder for load/save local JSON
 */
define( $plugin_prefix . 'ACF_LOCAL_JSON_DIR', WP_PLUGIN_DIR . '/' . $plugin_folder_name . '/acf' );


/**
 * Autoload classes
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	include __DIR__ . '/vendor/autoload.php';

	$plugin_classname = $plugin_prefix . 'Plugin';

	new $plugin_classname();
}
