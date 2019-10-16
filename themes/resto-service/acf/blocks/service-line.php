<?php

$services = get_field('list');


if ( ! empty($services) ) :

?>

<div class="widget _nomargin _light-gray">
	<div class="container-inner container">
		<div class="promo-adv-container">
			<div class="row">
				<div class="col-sm-6">
					<div class="h1"><?php echo esc_html( $block['data']['title'] ) ?></div>
					<?php echo wpautop( $block['data']['excerpt'] ) ?>
				</div>

				<?php $i=0; foreach ($services as $service) : $i++; ?>
					<?php

					$classes = ' _'; 
					$classes .= $i & 1 ? 'right' : 'left';
					$classes .= $i === 1 ? ' _first' : '';

					$icon = $service['icon']['url'];

					?>
					<div class="col-sm-6">
						<div class="promo-adv<?php echo $classes; ?>">
							<div class="promo-adv-title ico _promo" style="--icon:url(<?php echo esc_url( $icon ) ?>)"><?php echo esc_html( $service['title'] ) ?></div>
							<?php echo wpautop( $service['content'] ) ?>
						</div>
					</div>
				<?php endforeach; ?>

				<div class="col-sm-6 d-sm-flex align-items-sm-end">
					<div class="promo-adv-btn"><?php echo $block['data']['button'] ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif;