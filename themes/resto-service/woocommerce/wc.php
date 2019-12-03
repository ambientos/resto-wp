<?php

/**
 * Hooks
 */

add_action( 'wp', function(){
	/**
	 * Add Theme Features for Product Images
	 */
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );


	/**
	 * Disable styles
	 */
	add_filter( 'woocommerce_enqueue_styles', function( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );
		unset( $enqueue_styles['woocommerce-layout'] );
		unset( $enqueue_styles['woocommerce-smallscreen'] );

		return $enqueue_styles;
	});

	/**
	 * Remove WC wrappers and add customs
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', function(){
		?>
		<div class="container-inner container">
			<div class="row align-items-center">
				<div class="col-md">
					<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
				</div>

				<?php if ( is_product() ) : ?>
					<div class="col-md product-nav d-lg-flex justify-content-lg-between">
						<span></span> 
						<span data-fancybox data-src="#popup-callback" class="btn">
							<span class="ico _btn-ico-question"></span><span><?php _e( 'Ask a Question', 'resto' ) ?></span>
						</span>
					</div>
				<?php else : ?>
					<?php if ( have_posts() ) : ?>
						<div class="col-md">
							<div class="list-filter-container d-flex align-items-center justify-content-end">
								<span class="list-filter-label"><?php _e( 'Sort by:', 'resto' ) ?></span>
								<?php woocommerce_catalog_ordering(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php 
	}, 10 );

	add_action( 'woocommerce_after_main_content', function(){
		?>
		</div>

		<?php
	}, 10 );

	/**
	 * Remove WC breadcrumbs
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

	/**
	 * Remove sidebar
	 */
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	/**
	 * Remove some Product hooks
	 */
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	/**
	 * Add Product data
	 */
	add_action( 'woocommerce_single_product_summary', 'resto_product_part_data', 10 );

	function resto_product_part_data(){
		global $product;

		the_content();

		?>

		<div class="product-buy d-sm-flex align-items-sm-center justify-content-sm-between">
			<div class="product-buy-item">
				<div class="product-buy-price-label"><?php _e( 'Price', 'resto' ) ?></div>
				<div class="product-buy-price"><?php echo $product->get_price_html(); ?></div>
			</div>

			<?php if ( $product->is_in_stock() ) : ?>
				<div class="product-buy-item d-flex">
					<div class="product-buy-btn">
						<button data-fancybox data-src="#popup-order" class="btn btn-primary d-flex align-items-center" type="button"><span class="ico _btn-ico-card"></span><span><?php _e( 'Buy One&nbsp;Click', 'resto' ) ?></span></button>
					</div>
					<div class="product-buy-btn">
						<?php do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="product-buy-item product-avail-order"><?php _e( 'Under the Order', 'resto' ) ?></div>
			<?php endif; ?>
		</div>

		<?php

		$attributes_html = '';

		$attributes = $product->get_attributes();

		?>

		<?php if ( ! empty($attributes) ) : ?>
			<div class="widget">
				<div class="h2 widget-title"><?php _e( 'Characteristics', 'resto' ) ?></div>
				<ul class="product-chars list-unstyled">
					<?php foreach ( $attributes as $attribute ) : ?>
						<?php

						if ( $attribute->get_variation() ) {
							continue;
						}

						$attr_item_before = '<li class="product-chars-item d-flex justify-content-between"><span class="product-chars-title">';
						$attr_item_between = '</span> <span class="product-chars-v">';
						$attr_item_after = '</span></li>';


						$name = $attribute->get_name();

						if ( $attribute->is_taxonomy() ) {
							$terms = wp_get_post_terms( $product->get_id(), $name, 'all' );

							$cwtax = $terms[0]->taxonomy;
							$cw_object_taxonomy = get_taxonomy($cwtax);

							if ( isset ($cw_object_taxonomy->labels->singular_name) ) {
								$tax_label = $cw_object_taxonomy->labels->singular_name;
							} elseif ( isset( $cw_object_taxonomy->label ) ) {
								$tax_label = $cw_object_taxonomy->label;

								if ( 0 === strpos( $tax_label, 'Product ' ) ) {
									$tax_label = substr( $tax_label, 8 );
								}
							}

							$attributes_html .= $attr_item_before . $tax_label . $attr_item_between;

							$tax_terms = array();

							foreach ( $terms as $term ) {
								$single_term = esc_html( $term->name );

								array_push( $tax_terms, $single_term );
							}

							$attributes_html .= implode(', ', $tax_terms) . $attr_item_after;
						}

						else {
							$attributes_html .= $attr_item_before . $name . $attr_item_between;

							$attributes_html .= esc_html( implode( ', ', $attribute->get_options() ) ) . $attr_item_after;
						}

						?>
					<?php endforeach; echo $attributes_html; ?>
				</ul>

				<?php if ( count($attributes) > 5 ) : ?>
					<button class="product-chars-toggle" type="button">
						<?php echo file_get_contents( get_bloginfo( 'template_directory' ) .'/i/chars-toggle.svg' ) ?>
						<span class="_off"><?php _e( 'See full description', 'resto' ) ?></span>
						<span class="_on"><?php _e( 'Hide full description', 'resto' ) ?></span>
					</button>
				<?php endif; ?>
			</div>

		<?php endif;
	}

	/**
	 * Attached Documents
	 */
	add_action( 'woocommerce_after_single_product', function(){
		if ( function_exists('have_rows') && have_rows('files') ): ?>
			<section class="widget">
				<div class="h2 widget-title"><?php _e( 'Documentation and downloads', 'resto' ) ?></div>
				<div class="product-docs-list row">
					<?php while ( have_rows('files') ) : the_row(); $file_array = get_sub_field('file'); ?>
						<a class="product-docs-item col-md-4 d-flex align-items-center" href="<?php echo esc_url( $file_array['url'] ) ?>">
							<span class="product-docs-item-type ico _file-<?php echo esc_attr( $file_array['subtype'] ); ?>"></span>
							<span>
								<span><?php the_sub_field('title') ?></span>
								<span>Размер: <i><?php echo number_format($file_array['filesize'] / 1024, 1) ?></i> Кб</span>
							</span>
						</a>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endif;
	}, 10 );

	/**
	 * Add availability
	 */
	add_action( 'woocommerce_before_shop_loop_item', function(){
		global $product;

		$is_in_stock = $product->is_in_stock();

		$class = $is_in_stock ? 'stock' : 'order';
		$label = $is_in_stock ? __( 'In stock', 'resto' ) : __( 'Under the Order', 'resto' );

		?>
		<div class="product-item-avail _<?php echo $class; ?>">
			<i><?php echo $label; ?></i>
			<span class="ico"><?php require dirname( __FILE__ ) . '/../i/'. $class .'.svg'; ?></span>
		</div>

		<?php
	}, 5 );

	/**
	 * Custom Price
	 */
	add_action( 'woocommerce_after_shop_loop_item', function(){
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		?>

		<div class="product-item-meta d-flex justify-content-center">
			<span class="product-item-price">
				<?php echo $product->get_price_html(); ?>
			</span>
			<span class="product-item-more">
				<a href="<?php echo esc_url( $link ) ?>"><?php _e( 'More', 'resto' ) ?></a>
			</span>
		</div>

		<?php
	}, 10 );

	/**
	 * Add related products
	 */
	add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );

	/**
	 * Add custom Product Categories Menu
	 */
	add_action( 'woocommerce_sidebar', function(){
		if ( ! is_product() ) {
			wp_nav_menu( array(
				'theme_location'  => 'product_category_menu',
				'menu_class'      => 'product-menu list-unstyled',
				'item_spacing'    => 'discard',
				'container_class' => false,
			) );
		}
	}, 1 );

	/**
	 * Ajax update Header Cart
	 */
	add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
		global $woocommerce;

		ob_start();
		resto_header_cart();
		$fragments['div.header-cart-contents'] = ob_get_clean();

		return $fragments;
	} );
} );


/**
 * Clear Cart by query argument
 */

function resto_clear_cart_url() {
	if ( '/cart/?empty=1' === $_SERVER['REQUEST_URI'] ) {
		global $woocommerce;

		$woocommerce->cart->empty_cart();
	}
}

add_action( 'init', 'resto_clear_cart_url' );


function resto_header_cart(){
	?>
	<div class="header-cart-contents">
		<?php $cart_count = WC()->cart->get_cart_contents_count() ?>

		<?php if ( $cart_count > 0 ) : ?>
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart-num count">
				<?php echo $cart_count ?>
			</a> 
			<span class="header-cart-label">
				<?php echo wp_kses_data( sprintf( _n( '%d item in total', '%d items in total', WC()->cart->get_cart_contents_count(), 'resto' ), WC()->cart->get_cart_contents_count() ) ); ?> <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?>
			</span> 
			<a class="header-cart-checkout" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( __( 'View your shopping cart', 'resto' ) ); ?>">
				<?php _e( 'Order', 'resto' ) ?>
			</a>
		<?php else : ?>
			<span class="header-cart-label"><?php _e( 'Cart is Empty', 'resto' ) ?></span>
		<?php endif; ?>
	</div>
	<?php
}