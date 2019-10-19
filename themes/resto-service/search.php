<?php get_header(); ?>

<div class="entry-container">
	<div class="container-inner container">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

		<div class="entry">
			<header class="entry-header">
				<div class="entry-title _sub d-sm-flex align-items-md-center justify-content-sm-between">
					<h1><?php _e( 'Search Results', 'resto' ) ?></h1>

					<?php get_template_part( 'template-parts/search', 'count-info' ); ?>
				</div>
			</header>

			<?php if ( have_posts() ) : ?>
				<?php

				$types = array(
					'page' => array(
						'type' => 'post',
						'title' => __( 'Post', 'resto' ),
					),
					'post' => array(
						'type' => 'post',
						'title' => __( 'Post', 'resto' ),
					),
					'rs-solution' => array(
						'type' => 'post',
						'title' => __( 'Post', 'resto' ),
					),
					'rs-service' => array(
						'type' => 'post',
						'title' => __( 'Post', 'resto' ),
					),
					'rs-video' => array(
						'type' => 'video',
						'title' => __( 'Video Lesson', 'resto' ),
					),
					'product' => array(
						'type' => 'post',
						'title' => __( 'Product', 'resto' ),
					),
				);

				?>
				<div class="search-list">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $post_type = get_post_type( get_the_ID() ); ?>
						<article class="search-list-item">
							<h2 class="search-list-item-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="search-list-item-type ico _search-<?php echo $types[$post_type]['type'] ?>"><?php echo $types[$post_type]['title'] ?></div>
							<div class="search-list-item-excerpt"><?php echo wp_trim_words( get_the_content(), 45, '&hellip;' ); ?></div>
						</article>
					<?php endwhile; ?>
				</div>

				<div class="d-sm-flex justify-content-sm-between align-items-sm-center">
					<span><?php the_posts_pagination(); ?></span>

					<?php get_template_part( 'template-parts/search', 'count-info' ); ?>
				</div>
			<?php else : ?>
				<p><?php _e( 'Sorry, but nothing found. Try another search.', 'resto' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>