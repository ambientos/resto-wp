<?php /* Template Name: Page Wide */ ?>

<?php get_header(); ?>

<?php if ( ! is_front_page() ) : ?>
	<div class="container-inner container">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	</div>
<?php endif; ?>

<?php the_post(); the_content(); ?>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>