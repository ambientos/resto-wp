<?php

$type    = get_field('type');
$bg_url  = get_field('bg');
$options = get_field('options');
$sales   = get_field('sale');

?>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<div class="calc">
			<div class="calc-form" data-type="<?php echo esc_attr( $type ) ?>" style="background-image:url(<?php echo esc_url( $bg_url ) ?>)">
				<form>
					<div class="calc-form-item">
						<div class="row">
							<div class="col-md-6">
								<?php $i = 0; foreach ($options as $option) : $i++; ?>
									<div class="form-check form-group form-check-custom">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="option-<?php echo $i ?>" value="<?php echo esc_attr( $option['title'] ) ?>"> <?php echo $option['title'] ?>
										</label>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label><?php _e( 'Number of PC', 'resite' ) ?></label>
											<input class="calc-form-qty-control form-control" name="qty" type="number" value="1">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label><?php _e( 'Service cost', 'resite' ) ?></label>
											<div class="calc-form-total">
												<span class="calc-form-total-v-container"><span class="calc-form-total-v"><?php echo esc_html( $block['data']['price'] ) ?></span></span> <span><?php _e( 'rub/mon.', 'resite' ) ?></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="calc-form-item">
						<div class="row">
							<?php foreach ($sales as $sale_item) : ?>
								<div class="col-md-6">
									<div class="calc-form-info"><?php echo $sale_item['text'] ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="calc-form-submit form-submit">
						<input class="btn-primary btn-wide btn" data-fancybox data-src="#popup-calc" type="button" value="<?php echo esc_attr( __( 'Submit Order', 'resite' ) ) ?>">
					</div>
				</form>
			</div>
			<div class="calc-info"><?php echo $block['data']['external'] ?></div>
		</div>
	</div>
</div>