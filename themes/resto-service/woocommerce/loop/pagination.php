<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<footer class="product-list-footer widget">
	<div class="d-sm-flex justify-content-sm-between align-items-sm-center">
		<div>
			<?php
				if ( wc_get_loop_prop( 'total_pages' ) > 1 ) :
					the_posts_pagination();

				endif;

			?>
		</div>
		<div class="list-filter-container d-flex align-items-center justify-content-end">
			<span class="list-filter-label"><?php _e( 'Sort by:', 'resto' ) ?></span>
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
</footer>