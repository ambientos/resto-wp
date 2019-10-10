<?php /* Template Name: Contacts */ ?>

<?php get_header(); ?>

<div class="container-inner container">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<div class="row">
		<div class="col-md-6">
			<div class="widget">
				<?php the_title( '<h1>', '</h1>' ); ?>

				<?php if ( get_field('item') ) : ?>
					<ul class="list-links d-sm-flex flex-wrap">
						<?php while ( the_repeater_field('item') ) : ?>
							<li class="list-links-item d-flex col-md-6">
								<?php

								$link_title = get_sub_field('link-title');
								$content = get_sub_field('content');
								$icon = get_sub_field('icon');

								$sm = get_sub_field('sm');
								$sm_class = $sm ? ' _sm' : '';

								echo ( 'link' === get_sub_field('type') ? '<a href="'. esc_url( get_sub_field('link') ) .'"' : '<div' ) . ' class="list-links-item-link d-flex align-items-center'. $sm_class .'">';

								?>

								<?php if ( $icon ) : ?>
									<?php echo file_get_contents( $icon['url'] ); ?>
								<?php endif; ?>

								<?php if ( $sm && $icon ) : ?>
									<span class="list-links-item-text-sm">
								<?php endif; ?>

								<?php

								echo $link_title;
								echo $content;

								?>

								<?php if ( $sm && $icon ) : ?>
									</span>
								<?php endif; ?>

								<?php echo 'link' === get_sub_field('type') ? '</a>' : '</div>' ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="widget">
				<?php the_post(); the_content(); ?>
			</div>
		</div>
		<div class="col-md-6">
			<?php if ( function_exists('the_field') ) : ?>
				<div class="widget">
					<?php the_field('map') ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>