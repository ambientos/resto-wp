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
		add_action( 'login_head', array( __CLASS__, 'login_head' ) );

		/**
		 * ACF init
		 */
		add_action( 'acf/init', array( __CLASS__, 'acf_init' ) );
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

		add_shortcode( 'testimonials_carousel', array( __CLASS__, 'testimonials_carousel' ) );
	}

	/**
	 * Registering Custom Post Types and Custom Taxonomies
	 */
	public static function register_cpt_ct() {
		/**
		 * Solutions
		 */
		register_post_type( 'rs-solution', array(
			'labels' => array(
				'name'               => __( 'Solutions', TEXT_DOMAIN ),
				'singular_name'      => __( 'Solution', TEXT_DOMAIN ),
				'add_new'            => __( 'Add New Solution', TEXT_DOMAIN ),
				'add_new_item'       => __( 'Add New Solution item', TEXT_DOMAIN ),
				'edit_item'          => __( 'Edit Solution Item', TEXT_DOMAIN ),
				'new_item'           => __( 'New Solution Item', TEXT_DOMAIN ),
				'view_item'          => __( 'View Solution Item', TEXT_DOMAIN ),
				'search_items'       => __( 'Search Solutions', TEXT_DOMAIN ),
				'not_found'          => __( 'Nothing found Solutions', TEXT_DOMAIN ),
				'not_found_in_trash' => __( 'Nothing found Solutions in Trash', TEXT_DOMAIN ),
				'menu_name'          => __( 'Solutions', TEXT_DOMAIN ),
			),
			'public'              => true,
			'show_in_rest'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-book-alt',
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'has_archive'         => false,
			'rewrite'             => array(
				'slug'            => 'solution',
				'with_front'      => false,
				'feeds'           => false,
			),
		) );

		/**
		 * Services
		 */
		register_post_type( 'rs-service', array(
			'labels' => array(
				'name'               => __( 'Services', TEXT_DOMAIN ),
				'singular_name'      => __( 'Service', TEXT_DOMAIN ),
				'add_new'            => __( 'Add New Service', TEXT_DOMAIN ),
				'add_new_item'       => __( 'Add New Service item', TEXT_DOMAIN ),
				'edit_item'          => __( 'Edit Service Item', TEXT_DOMAIN ),
				'new_item'           => __( 'New Service Item', TEXT_DOMAIN ),
				'view_item'          => __( 'View Service Item', TEXT_DOMAIN ),
				'search_items'       => __( 'Search Services', TEXT_DOMAIN ),
				'not_found'          => __( 'Nothing found Services', TEXT_DOMAIN ),
				'not_found_in_trash' => __( 'Nothing found Services in Trash', TEXT_DOMAIN ),
				'menu_name'          => __( 'Services', TEXT_DOMAIN ),
			),
			'public'              => true,
			'show_in_rest'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-sos',
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'has_archive'         => false,
			'rewrite'             => array(
				'slug'            => 'service',
				'with_front'      => false,
				'feeds'           => false,
			),
		) );

		/**
		 * Video Categories
		 */
		register_taxonomy( 'rs-video-cat', array(), array(
			'labels'                => array(
				'name'              => __( 'Video Categories', TEXT_DOMAIN ),
				'singular_name'     => __( 'Video Category', TEXT_DOMAIN ),
				'search_items'      => __( 'Search Category', TEXT_DOMAIN ),
				'all_items'         => __( 'All Categories', TEXT_DOMAIN ),
				'view_item '        => __( 'View Category', TEXT_DOMAIN ),
				'parent_item'       => __( 'Parent Category', TEXT_DOMAIN ),
				'parent_item_colon' => __( 'Parent Category:', TEXT_DOMAIN ),
				'edit_item'         => __( 'Edit Category', TEXT_DOMAIN ),
				'update_item'       => __( 'Update Category', TEXT_DOMAIN ),
				'add_new_item'      => __( 'Add New Category', TEXT_DOMAIN ),
				'new_item_name'     => __( 'New Category Name', TEXT_DOMAIN ),
				'menu_name'         => __( 'Video Categories', TEXT_DOMAIN ),
			),
			'publicly_queryable'    => true,
			'show_in_rest'          => true,
			'hierarchical'          => true,
			'rewrite'               => array(
				'slug'              => 'video-cat',
				'with_front'        => false,
				'hierarchical'      => true,
			),
			'show_admin_column'     => true,
		) );

		/**
		 * Video
		 */
		register_post_type( 'rs-video', array(
			'labels' => array(
				'name'               => __( 'Videos', TEXT_DOMAIN ),
				'singular_name'      => __( 'Video', TEXT_DOMAIN ),
				'add_new'            => __( 'Add New Video', TEXT_DOMAIN ),
				'add_new_item'       => __( 'Add New Video item', TEXT_DOMAIN ),
				'edit_item'          => __( 'Edit Video Item', TEXT_DOMAIN ),
				'new_item'           => __( 'New Video Item', TEXT_DOMAIN ),
				'view_item'          => __( 'View Video Item', TEXT_DOMAIN ),
				'search_items'       => __( 'Search Videos', TEXT_DOMAIN ),
				'not_found'          => __( 'Nothing found Videos', TEXT_DOMAIN ),
				'not_found_in_trash' => __( 'Nothing found Videos in Trash', TEXT_DOMAIN ),
				'menu_name'          => __( 'Videos', TEXT_DOMAIN ),
			),
			'public'              => true,
			'show_in_rest'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-video-alt3',
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'has_archive'         => true,
			'taxonomies'          => array( 'rs-video-cat' ),
			'rewrite'             => array(
				'slug'            => 'video',
				'with_front'      => false,
				'feeds'           => false,
			),
		) );

		/**
		 * Testimonials
		 */
		register_post_type( 'rs-testimonial', array(
			'labels' => array(
				'name'               => __( 'Testimonials', TEXT_DOMAIN ),
				'singular_name'      => __( 'Testimonial', TEXT_DOMAIN ),
				'add_new'            => __( 'Add New Testimonial', TEXT_DOMAIN ),
				'add_new_item'       => __( 'Add New Testimonial item', TEXT_DOMAIN ),
				'edit_item'          => __( 'Edit Testimonial Item', TEXT_DOMAIN ),
				'new_item'           => __( 'New Testimonial Item', TEXT_DOMAIN ),
				'view_item'          => __( 'View Testimonial Item', TEXT_DOMAIN ),
				'search_items'       => __( 'Search Testimonials', TEXT_DOMAIN ),
				'not_found'          => __( 'Nothing found Testimonials', TEXT_DOMAIN ),
				'not_found_in_trash' => __( 'Nothing found Testimonials in Trash', TEXT_DOMAIN ),
				'menu_name'          => __( 'Testimonials', TEXT_DOMAIN ),
			),
			//'public'              => true,
			'show_ui'             => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_in_rest'        => false,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-testimonial',
			'supports'            => array( 'title', 'editor', 'thumbnail', ),
			'has_archive'         => false,
			'rewrite'             => array(
				'slug'            => 'testimonial',
				'with_front'      => false,
				'feeds'           => false,
			),
		) );
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

	/**
	 * Testimonials Carousel shortcode
	 */
	public static function testimonials_carousel() {
		global $post;

		$content = '';

		$testimonials = get_posts( array(
			'post_type'   => 'rs-testimonial',
			'numberposts' => -1,
		) );

		if ( empty( $testimonials ) ) {
			return;
		}

		ob_start();

		?>

		<div class="carousel-container" data-loop="1" data-items="3" data-margin="30" data-play="4000">
			<div class="container-inner container">
				<div class="promo-cite-carousel carousel owl-carousel">
					<?php foreach ($testimonials as $post) : setup_postdata($post); ?>
						<div class="promo-cite-item">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="promo-cite-item-thumb">
									<?php the_post_thumbnail( 'testimonial-thumb', array( 'class' => 'img-block img-fluid' ) ); ?>
								</div>
							<?php endif; ?>

							<div class="promo-cite-item-content">
								<div class="promo-cite-item-name"><?php the_title() ?></div>

								<?php if ( function_exists('the_field') && get_field('title') ) : ?>
									<div class="promo-cite-item-title"><?php the_field('title') ?></div>
								<?php endif; ?>

								<div class="promo-cite-item-excerpt"><?php the_content() ?></div>
							</div>
						</div>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

		<?php

		return ob_get_clean();
	}


	/**
	 * ACF init
	 */
	public function acf_init() {

		/**
		 * Add Gutenberg blocks
		 */
		if( function_exists('acf_register_block_type') ) {

			/**
			 * Promo block
			 */
			acf_register_block_type( array(
				'name'            => 'promo',
				'title'           => __( 'Promo Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/promo.php',
				'category'        => 'formatting',
				'icon'            => 'media-interactive',
				'keywords'        => array( 'promo', 'top' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Widget block
			 */
			acf_register_block_type( array(
				'name'            => 'widget',
				'title'           => __( 'Widget Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/widget.php',
				'category'        => 'formatting',
				'icon'            => 'excerpt-view',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Services Line block
			 */
			acf_register_block_type( array(
				'name'            => 'service-line',
				'title'           => __( 'Service Line Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/service-line.php',
				'category'        => 'formatting',
				'icon'            => 'list-view',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Service include-in block
			 */
			acf_register_block_type( array(
				'name'            => 'included-in',
				'title'           => __( 'Service Included-in Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/service-included-in.php',
				'category'        => 'formatting',
				'icon'            => 'list-view',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Ready Solution block
			 */
			acf_register_block_type( array(
				'name'            => 'solution-ready',
				'title'           => __( 'Ready Solution Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/solution-ready.php',
				'category'        => 'formatting',
				'icon'            => 'album',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Solution Modules block
			 */
			acf_register_block_type( array(
				'name'            => 'solution-modules',
				'title'           => __( 'Solution Modules Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/solution-modules.php',
				'category'        => 'formatting',
				'icon'            => 'admin-page',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Calculator block
			 */
			acf_register_block_type( array(
				'name'            => 'calc-block',
				'title'           => __( 'Calculator Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/calc.php',
				'category'        => 'formatting',
				'icon'            => 'forms',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Service Table block
			 */
			acf_register_block_type( array(
				'name'            => 'service-table-block',
				'title'           => __( 'Service Table Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/service-table.php',
				'category'        => 'formatting',
				'icon'            => 'editor-table',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );


			/**
			 * Grid Links block
			 */
			acf_register_block_type( array(
				'name'            => 'grid-links-block',
				'title'           => __( 'Grid Links Block', 'resto' ),
				'mode'            => 'edit',
				'render_template' => PLUGIN_FOLDER . '/acf/blocks/grid-links.php',
				'category'        => 'formatting',
				'icon'            => 'grid-view',
				'keywords'        => array( 'widget', 'block' ),
				'supports'        => array(
					'mode' => false,
				),
			) );
		}
	}
}