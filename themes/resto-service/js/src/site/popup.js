/**
 * Fancybox
 */

$.fancybox.defaults.touch = false

$('[data-fancybox]').fancybox({
	afterLoad: function( instance, slide ) {
		$('.single-product,.woocommerce-cart').each(function(){
			var $body = $(this),
				$popup = slide.$slide,
				$orderField = $popup.find('[name="your-order"]'),
				orderFieldData = []

			if ( $body.hasClass('single-product') ) {
				$orderField.val( $('h1').eq(0).text() + ', Цена: '+ $('.product-buy-price').text() )
			}

			if ( $body.hasClass('woocommerce-cart') ) {
				$('.woocommerce-cart-form__cart-item').each(function(){
					var $productRow = $(this),
						productTitle = $productRow.find('.cart-product-title a').text(),
						productQty = $productRow.find('.input-text.qty.text').val(),
						productSum = $productRow.find('.cart-product-subtotal .woocommerce-Price-amount').text()

					orderFieldData.push({
						title: productTitle,
						qty: productQty,
						sum: productSum
					})
				})

				if ( orderFieldData.length > 0 ) {
					var orderFieldRows = []

					$.each(orderFieldData, function(index, object){
						orderFieldRows.push( object.title +', Количество: '+ object.qty +', Общая цена: '+ object.sum )
					})

					$orderField.val( orderFieldRows.join("\n") )
				}
			}
		})
	}
})


/**
 * Callbacks for CF7 successful submits
 */

document.addEventListener( 'wpcf7mailsent', function( event ) {
	jQuery.fancybox.close()
	jQuery.fancybox.open('<div class="popup-container"><div class="popup widget _nomargin _dark _important text-center"><div class="h2 widget-title _big" style="margin-bottom: 0">Сообщение успешно отправлено</div></div></div>')

	setTimeout( function(){
		if ( '389' == event.detail.contactFormId ) {
			jQuery(location).attr('href', restoCart.urlEmpty)
		}
		else {
			jQuery.fancybox.close()
			jQuery('.wpcf7-response-output').hide()
		}
	}, 2000)
}, false )