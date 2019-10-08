<?php

namespace AG_Resto_Site;

class Plugin {
	/**
	 * Init
	 *
	 * @return
	 */
	public function __construct() {

		/**
		 * Actions
		 */
		add_action( 'plugins_loaded', array( __CLASS__, 'plugins_loaded' ) );

		/**
		 * Register CPT and CT
		 */
		add_action( 'init', array( __CLASS__, 'register_cpt_ct' ) );

		/**
		 * Login customize
		 */
		add_action('login_head', array( __CLASS__, 'login_head' ) );
	}

	/**
	 * Main load
	 *
	 * @return
	 */
	public static function plugins_loaded() {

		/**
		 * Load translations for this plugin
		 */
		load_textdomain( TEXT_DOMAIN, PLUGIN_FOLDER . '/languages/' . TEXT_DOMAIN . '-' . get_locale() . '.mo' );
	}

	/**
	 * Registering Custom Post Types and Custom Taxonomies
	 */
	public static function register_cpt_ct() {
	}

	/**
	 * Custom Login Brand
	 */
	public static function login_head() {
		?>
		
		<style>
			h1 a {
				width: 125px!important;
				height: 58px!important;
				background: url(<?php echo PLUGIN_URI; ?>/assets/admin/i/logo.svg) 50% 50% no-repeat !important;
				background-size: contain!important;
			}
		</style>

		<?php
	}
}