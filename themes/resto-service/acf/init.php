<?php

/**
 * Add Gutenberg blocks
 */

function resto_acf_init(){
	if( function_exists('acf_register_block_type') ) {

		/**
		 * Promo block
		 */
		acf_register_block_type( array(
			'name'            => 'promo',
			'title'           => __( 'Promo Block', 'resto' ),
			'mode'            => 'edit',
			'render_template' => 'acf/blocks/promo.php',
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
			'render_template' => 'acf/blocks/widget.php',
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
			'render_template' => 'acf/blocks/service-line.php',
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
			'render_template' => 'acf/blocks/service-included-in.php',
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
			'render_template' => 'acf/blocks/solution-ready.php',
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
			'render_template' => 'acf/blocks/solution-modules.php',
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
			'render_template' => 'acf/blocks/calc.php',
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
			'render_template' => 'acf/blocks/service-table.php',
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
			'render_template' => 'acf/blocks/grid-links.php',
			'category'        => 'formatting',
			'icon'            => 'grid-view',
			'keywords'        => array( 'widget', 'block' ),
			'supports'        => array(
				'mode' => false,
			),
		) );
	}
}

add_action('acf/init', 'resto_acf_init');