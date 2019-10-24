<?php

$list = get_field('list');


if ( ! empty($list) ) :

?>

<div class="container-inner container">
	<div class="widget">
		<h2 class="widget-title _sub"><?php echo esc_html( $block['data']['title'] ) ?></h2>
		<ul class="list-links d-sm-flex flex-wrap">
			<?php foreach ($list as $item) : ?>
				<li class="list-links-item d-flex col-md-3 col-sm-4"><a class="list-links-item-link d-flex align-items-center" href="<?php echo esc_url( $item['link'] ) ?>" target="_blank"><?php echo file_get_contents( $item['icon']['url'] ) ?><span><?php echo esc_html( $item['title'] ) ?></span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<?php

endif;