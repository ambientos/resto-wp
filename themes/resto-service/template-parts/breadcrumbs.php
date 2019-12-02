<?php

$promo_breadcrumbs = get_query_var( 'promo_breadcrumbs' );

if(function_exists('bcn_display')) : ?>
	<div class="breadcrumbs<?php echo $promo_breadcrumbs ? ' promo-breadcrumbs' : '' ?>" typeof="BreadcrumbList" vocab="http://schema.org/">
		<?php bcn_display(); ?>
	</div>
<?php endif; ?>