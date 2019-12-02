<?php

$list = get_field('list');


if ( ! empty($list) ) :

?>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<div class="table-responsive-sm">
			<table class="calc-st-table table table-bordered<?php if ( ! $block['data']['button-in-table'] ) : ?> _without-btn<?php endif; ?>">
				<thead>
					<tr class="table-secondary">
						<th><?php _e( 'Service', 'resite' ) ?></th>
						<th><?php _e( 'Price', 'resite' ) ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $list_item) : ?>
						<tr>
							<td>
								<span class="form-check">
									<label class="form-check-label">
										<input class="calc-st-option form-check-input" type="checkbox" value="<?php echo esc_attr( $list_item['title'] ) ?>" data-price="<?php echo esc_attr( $list_item['price'] ) ?>"> 
										<span><?php echo esc_html( $list_item['title'] ) ?></span>
									</label>
								</span>
							</td>
							<td><?php echo esc_html( $list_item['info'] ) ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot class="calc-st-info">
					<tr>
						<td colspan="2">
							<div class="row align-items-sm-center">
								<?php if ( $block['data']['button-in-table'] ) : ?>
									<div class="col-md-6"><b class="calc-st-selected"></b></div>
									<div class="col-md-6 text-right"><span data-fancybox data-src="#popup-services" class="btn-primary btn-sm btn"><?php _e( 'Service Order', 'resite' ) ?></span></div>
								<?php else : ?>
									<div class="col-md"><b class="calc-st-selected"></b></div>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

<?php endif;