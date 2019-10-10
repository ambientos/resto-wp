<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<?php the_post(); the_content(); ?>
</div>

<?php get_footer(); ?>