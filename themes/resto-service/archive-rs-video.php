<?php

get_header();

$taxonomy = 'rs-video-cat';

?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
</div>

<div class="widget _nomargin _gray">
	<div class="container-inner container">
		<div class="row align-items-center">
			<div class="col-md-3">
				<h1 class="knowledge-title"><?php _e( 'All Videos', 'resto' ) ?></h1>
			</div>
			<div class="col-md-9">
				<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search">
					<div class="form-input-with-button">
						<input class="form-control" type="text" name="s" value="" placeholder="<?php echo esc_attr( __( 'Search by Videos', 'resto' ) ) ?>">
						<input class="btn-secondary btn-wide btn" type="submit" value="<?php echo esc_attr( __( 'Search', 'resto' ) ) ?>">
						<input type="hidden" name="post_type" value="rs-video">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title _sub">
			<span class="ico _video-title">
				<?php

				$page_title = is_tax($taxonomy) ? single_term_title('', false) : __( 'Videos', 'resite' );

				echo $page_title;

				?>
			</span>
		</h2>
		<div class="row">
			<div class="col-md-3">
				<?php

				$menu_items = array(
					__( 'All Lessons', 'resto' ) => get_post_type_archive_link('rs-video'),
				);

				$video_categories_list = get_terms( array(
					'taxonomy' => $taxonomy,
				) );

				foreach ($video_categories_list as $video_category) {
					$menu_items[ $video_category->name ] = get_term_link( $video_category, $taxonomy );
				}

				?>
				<ul class="list-side-menu list-unstyled">
					<?php foreach ($menu_items as $menu_name => $menu_link) : ?>
						<?php $current_item_class = strpos( $menu_link, $_SERVER['REQUEST_URI'] ) !== false ? ' class="current-menu-item"' : ''; ?>
						<li<?php echo $current_item_class ?>><a href="<?php echo esc_url( $menu_link ) ?>"><?php echo $menu_name ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="col-md-9">
				<?php if ( have_posts() ) : ?>
					<div class="knowledge-video row">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'archive-video' ); ?>
						<?php endwhile; ?>
					</div>

					<?php the_posts_pagination(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>