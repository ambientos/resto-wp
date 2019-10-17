<?php

global $promo_breadcrumbs;

$block_type = $block['data']['type'];
$thumb_bg   = get_field('thumb');
$title      = $block['data']['title'];
$content    = $block['data']['content'];
$btn_text   = $block['data']['btn_btn-text'];
$btn_link   = $block['data']['btn_btn-link'];
$addict     = $block['data']['addict'];

$container_classes = 'home' === $block_type ? ' d-flex align-items-center' : '';
$home_addict_class = 'home' === $block_type ? ' _home' : '';

?>

<div class="promo">
	<div class="promo-container<?php echo $container_classes ?>" style="background-image:url(<?php echo esc_url( $thumb_bg ) ?>)">
		<div class="container">
			<?php if ( ! is_front_page() ) : $promo_breadcrumbs = true; ?>
				<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
			<?php endif; ?>

			<div class="promo-content<?php echo $home_addict_class ?>">
				<h1 class="promo-title<?php echo $home_addict_class ?>"><?php echo esc_html( $title ); ?></h1>
				<div class="promo-text"><?php echo wpautop( $content ); ?></div>
				<div class="promo-more d-sm-flex align-items-sm-center justify-content-sm-between">
					<span><a href="<?php echo esc_attr( $btn_link ) ?>" class="btn-primary btn-wide btn"><?php echo esc_html( $btn_text ) ?></a></span>
					<?php echo $addict ?>
				</div>
			</div>
		</div>
	</div>
</div>