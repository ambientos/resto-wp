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

			endforeach; ?>
		</div>

		<?php return ob_get_clean();

	endif;
}

add_shortcode( 'last-articles', 'resto_last_articles_func' );