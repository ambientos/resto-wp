<?php

$list_array = get_field('list');


if ( ! empty($list_array) ) :

?>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<div class="list-ico d-md-flex flex-md-wrap">
			<?php foreach ($list_array as $list_item) : ?>
				<div class="list-ico-item ico d-flex align-items-sm-center flex-sm-nowrap flex-wrap" style="--icon:url(<?php echo esc_url( $list_item['icon']['url'] ) ?>)">
					<div class="list-ico-item-content">
						<h3 class="list-ico-item-title"><?php echo esc_html( $list_item['title'] ) ?></h3>
						<div class="list-ico-item-text">
							<p><?php echo $list_item['content'] ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php endif;