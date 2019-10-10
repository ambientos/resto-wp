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

		add_shortcode( 'testimonials_carousel', array( __CLASS__, 'testimonials_carousel' ) );
	}

	/**
	 * Registering Custom Post Types and Custom Taxonomies
	 */
	public static function register_cpt_ct() {
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

		<div class="carousel-container" data-loop="1" data-items="3" data-margin="30">
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
}