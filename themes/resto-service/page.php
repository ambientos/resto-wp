<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_post(); the_content(); ?>
</div>

<?php get_footer(); ?>