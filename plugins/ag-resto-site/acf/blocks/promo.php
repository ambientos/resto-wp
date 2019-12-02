<?php

$block_type = $block['data']['type'];
$thumb_bg   = get_field('thumb');
$title      = $block['data']['title'];
$content    = $block['data']['content'];
$btn_text   = $block['data']['btn_btn-text'];
$btn_link   = $block['data']['btn_btn-link'];
$addict     = $block['data']['addict'];

$container_classes = 'home' === $block_type ? ' _home d-flex align-items-center' : '';
$home_addict_class = 'home' === $block_type ? ' _home' : '';

?>

<div class="promo">
	<div class="promo-container<?php echo $container_classes ?>" style="background-image:url(<?php echo esc_url( $thumb_bg ) ?>)">
		<div class="container">
			<?php if ( 'home' !== $block_type ) : set_query_var( 'promo_breadcrumbs', true ); ?>
				<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
			<?php endif; ?>

			<div class="promo-content<?php echo $home_addict_class ?>">
				<h1 class="promo-title<?php echo $home_addict_class ?>"><?php echo esc_html( $title ); ?></h1>
				<div class="promo-text"><?php echo wpautop( $content ); ?></div>
				<div class="promo-more d-sm-flex align-items-sm-center justify-content-sm-between">
					<span>
						<?php if ( $btn_link ) : ?>
							<a href="<?php echo esc_attr( $btn_link ) ?>" class="btn-primary btn-wide btn"><?php echo esc_html( $btn_text ) ?></a>
						<?php else : ?>
							<span data-fancybox data-src="#popup-callback" class="btn-primary btn-wide btn"><?php echo esc_html( $btn_text ) ?></span>
						<?php endif; ?>
					</span>
					<?php echo $addict ?>
				</div>
			</div>
		</div>
	</div>
</div>