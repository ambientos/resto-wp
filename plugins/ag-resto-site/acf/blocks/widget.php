<?php

$title = $block['data']['title'];
$subtitle = $block['data']['subtitle'];
$content = $block['data']['content'];

$widget_class = ' _' . $block['data']['type'];

?>

<div class="widget<?php echo $widget_class ?>">
	<div class="container-inner container">
		<?php if ( $title ) : ?>
			<?php

			$title_classes_array = array(
				$block['data']['title-big'] ? '_big' : '',
				$block['data']['title-primary'] ? '_primary' : '',
			);

			$title_classes = implode(' ', $title_classes_array);

			?>
			<div class="h2 widget-title <?php echo $title_classes ?>"><?php echo esc_html( $title ) ?></div>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<div class="widget-subtitle text-center"><?php echo esc_html( $subtitle ) ?></div>
		<?php endif; ?>

		<?php echo $content ?>
	</div>
</div>