<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
</div>

<div class="widget _nomargin _gray">
	<div class="container-inner container">
		<div class="row align-items-center">
			<div class="col-md-3">
				<?php the_title( '<h1 class="knowledge-title">', '</h1>' ) ?>
			</div>
			<div class="col-md-9">
				<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search">
					<div class="form-input-with-button">
						<input class="form-control" type="text" name="s" value="" placeholder="<?php echo esc_attr( __( 'What are you interested in?', 'resto' ) ) ?>">
						<input class="btn-secondary btn-wide btn" type="submit" value="<?php echo esc_attr( __( 'Search', 'resto' ) ) ?>">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php the_post(); the_content(); ?>

<div class="container-inner container">
	<?php

	$videos = get_posts( array(
		'post_type' => 'rs-video',
		'numberposts' => '6',
	) );

	?>

	<?php if ( ! empty($videos) ) : ?>
		<div class="widget">
			<h2 class="widget-title _sub d-sm-flex align-items-md-center justify-content-sm-between"><span class="ico _video-title"><?php _e( 'Videos iiko', 'resto' ) ?></span><a class="btn-secondary btn-sm btn" href="<?php echo get_post_type_archive_link('rs-video') ?>"><?php _e( 'All Videos', 'resto' ) ?></a></h2>
			<div class="knowledge-video row">
				<?php foreach ($videos as $post) : setup_postdata( $post ); ?>
					<?php get_template_part( 'template-parts/content', 'fp-video' ); ?>
				<?php endforeach; wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif; ?>


	<div class="widget">
		<div class="row align-items-center">
			<div class="col-md-5">
				<div class="h2 widget-title _sub">Остались вопросы? Напишите нам</div>
			</div>
			<div class="col">
				<?php

				$callback_icons = array( 'vb' => 'Viber', 'wa' => 'WhatsApp', 'tg' => 'Telegram', 'mail' => 'E-Mail' );

				?>

				<?php foreach ($callback_icons as $callback_icon => $callback_title) : ?>
					<?php $url = 'mail' === $callback_icon ? 'mailto:'. get_option('resto_'. $callback_icon) : get_option('resto_'. $callback_icon); ?>
					<a class="d-inline-flex align-items-center justify-content-center ico _social-item" href="<?php echo esc_attr( $url ); ?>" title="<?php echo $callback_title ?>"><?php require dirname(__FILE__) . '/i/knowledge/'. $callback_icon .'.svg' ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php

$articles_args = array(
	'paged'          => get_query_var( 'paged' ),
	'posts_per_page' => 9,
);

if ( get_query_var( 'cat' ) ) {
	$articles_args['cat'] = get_query_var( 'cat' );
}

query_posts( $articles_args );

?>

<?php if ( have_posts() ) : ?>
	<div class="widget _with-pads _nomargin _gray">
		<div class="container-inner container">
			<div class="row align-items-center">
				<div class="col-md">
					<h2 class="widget-title _primary"><?php _e( 'Posts from Resto-Service', 'resto' ) ?></h2>
				</div>
				<div class="list-filter-container col-md d-sm-flex align-items-sm-center justify-content-sm-end"><span class="list-filter-label"><?php _e( 'Show:', 'resto' ) ?></span>
					<?php

					$current_page_url = site_url( '/knowledge/' );

					$categories = get_categories();

					$categories_list = array(
						__( 'All', 'resto' ) => array(
							'term_id' => '',
							'url'     => $current_page_url,
						),
					);

					foreach ($categories as $category) :
						$categories_list[ $category->name ] = array(
							'term_id' => $category->term_id,
							'url'     => add_query_arg( array( 'cat' => $category->term_id ), $current_page_url ),
						);
					endforeach;

					?>
					<ul class="d-sm-flex align-items-center list-filter list-unstyled">
						<?php foreach ($categories_list as $category_title => $category_item) : ?>
							<li<?php echo $category_item['term_id'] === get_query_var( 'cat' ) ? ' class="active"' : '' ?>><a href="<?php echo esc_url( $category_item['url'] ) ?>"><?php echo $category_title ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="knowledge-article-list row">
				<?php while ( have_posts() ) : the_post() ?>
					<?php get_template_part( 'template-parts/content', 'article' ); ?>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination(); ?>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>