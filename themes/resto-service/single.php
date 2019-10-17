<?php get_header(); ?>

<div class="entry-container">
	<div class="container-inner container">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

		<article class="entry">
			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>

			<div class="entry-content">
				<?php the_post(); the_content(); ?>
			</div>
		</article>
	</div>
</div>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>