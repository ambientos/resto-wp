<?php

global $product_classes;

$product_classes = '_carousel-item';

$products = get_field('products');


if ( ! empty($products) ) :

?>

<div class="container-inner container">
	<div class="widget _with-pads">
		<h2 class="widget-title _primary _big"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<p><?php echo esc_html( $block['data']['content'] ) ?></p>

		<div class="carousel-container">
			<div class="product-carousel carousel owl-carousel">
				<?php

				foreach( $products as $post ){
					setup_postdata($post);

					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}

				wp_reset_postdata();

				?>
			</div>
		</div>
	</div>
</div>

<?php endif;