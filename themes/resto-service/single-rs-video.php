<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<div class="widget">
		<h2 class="widget-title _sub"><span class="ico _video-title"><?php the_title() ?></span></h2>
		<div class="knowledge-video-item">
			<?php the_post(); the_content(); ?>
		</div>
		<div class="knowledge-video-item-back"><a class="ico _back" href="<?php echo get_post_type_archive_link('rs-video') ?>"><?php _e( 'Back to all Videos', 'resto' ) ?></a></div>
	</div>
</div>

<?php get_template_part( 'template-parts/content', 'after' ); ?>

<?php get_footer(); ?>