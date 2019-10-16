<?php get_header(); ?>

<?php the_post(); the_content(); ?>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>