<?php

$list_array = get_field('list');


if ( ! empty($list_array) ) : ?>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title _primary _big"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<div class="solutions">
			<?php foreach ($list_array as $list_item) : ?>
				<?php

				$icon_src = $list_item['icon']['url'];

				?>
				<div class="solutions-item" style="background-image:url(<?php echo esc_url( $icon_src ) ?>)">
					<div class="solutions-item-row">
						<div class="row align-items-center">
							<div class="solutions-item-title col-lg col-12"><?php echo esc_html( $list_item['title'] ) ?></div>
							<div class="solutions-item-more col-lg col-sm"><span data-fancybox data-src="#popup-callback" class="btn-secondary btn-wide btn"><?php _e( 'More', 'resto' ) ?></span></div>

							<?php $i = 0; foreach ($list_item['prices'] as $price_item) : ?>
								<div class="solutions-item-price-c _<?php echo $i > 1 ? 'second' : 'first' ?> col-sm">
									<?php if ( $price_item['price'] ) : ?>
										<span class="solutions-item-price"><?php echo esc_html( $price_item['price'] ) ?> ₽</span>
									<?php endif; ?>
									<span class="solutions-item-price-l"><?php echo $price_item['content'] ?></span>
								</div>
							<?php $i++; endforeach; ?>
						</div>
					</div>
					<div class="solutions-item-row">
						<div class="row">
							<div class="solutions-item-descr _first col">
								<p><b><?php echo esc_html( $list_item['info'] ) ?></b></p>
							</div>
							<div class="solutions-item-descr _second col">
								<b><?php _e( 'Equipments', 'resto' ) ?>:</b>
								<?php echo $list_item['equip'] ?>
							</div>
							<div class="solutions-item-descr _third col">
								<b><?php _e( 'Services', 'resto' ) ?>:</b>
								<?php echo $list_item['service'] ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php endif; ?>