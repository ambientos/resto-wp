<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<?php if ( have_posts() ) : ?>
		<div class="widget">
			<h1 class="widget-title"><?php the_archive_title(); ?></h1>
			<div class="knowledge-article-list row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'article' ); ?>
				<?php endwhile; ?>
			</div>

			<?php get_template_part( 'template-parts/main/pagination' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>