<?php

global $promo_breadcrumbs;

if(function_exists('bcn_display')) : ?>
	<div class="breadcrumbs<?php echo $promo_breadcrumbs ? ' promo-breadcrumbs' : '' ?>" typeof="BreadcrumbList" vocab="http://schema.org/">
		<?php bcn_display(); ?>
	</div>
<?php endif; ?>