<?php

/**
 * Last Article posts
 */

function resto_last_articles_func( $atts ){
	global $post;

	$atts = shortcode_atts( array(
		'post_type' => 'post',
		'limit'     => '3',
	), $atts );

	$posts = get_posts( array(
		'post_type'   => $atts['post_type'],
		'numberposts' => $atts['limit'],
	) );

	if ( ! empty($posts) ) :
		ob_start(); ?>

		<div class="knowledge-article-list row">
			<?php foreach ($posts as $post) :
				setup_postdata($post);

				get_template_part( 'template-parts/content', 'article' );	

			endforeach; wp_reset_postdata(); ?>
		</div>

		<?php return ob_get_clean();

	endif;
}

add_shortcode( 'last-articles', 'resto_last_articles_func' );


/**
 * Calculator Checkboxes
 */

function resto_calc_checkboxes_func( $atts ) {
	$atts = shortcode_atts( array(
	), $atts );

	$options = get_field( 'options', get_the_ID() );

	ob_start();

	foreach ($options as $option) : ?>
		<div class="form-check form-group form-check-custom">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" value="<?php echo esc_attr( $option['price'] ) ?>"> <?php echo esc_html( $option['title'] ) ?>
			</label>
		</div>

	<?php endforeach;

	return ob_get_clean();
}

add_shortcode( 'calc-checkboxes', 'resto_calc_checkboxes_func' );


/**
 * Calculator Price
 */

function resto_calc_price_func( $atts ) {
	$atts = shortcode_atts( array(
	), $atts );

	$price = get_field( 'price', get_the_ID() );

	ob_start();

	echo $price;

	return ob_get_clean();
}

add_shortcode( 'calc-price', 'resto_calc_price_func' );