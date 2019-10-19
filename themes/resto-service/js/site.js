(function($){

	/**
	 * Mobile menu
	 */

	$('.header-nav-list .menu-item-has-children')
		.on('click', function(e){
			if ( 'A' != e.target.nodeName && 'a' != e.target.nodeName ) {
				e.stopPropagation()

				$(this).toggleClass('open')
			}
		})

	/**
	 * Owl Carousel
	 */

	$('.carousel-container').each(function(){
		var container = $(this),
			carousel = container.find('.carousel'),
			loop = container.data('loop') || 0,
			margin = container.data('margin') || 0,
			items = container.data('items') || 0

		options = {
			items: 1,
			margin: +margin,
			loop: loop,
			nav: true,
			dots: false,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				992: {
					items: 3
				},
				1200: {
					items: 4
				}
			}
		}

		if ( '1' == items ) {
			options.responsive = false
		}

		if ( '3' == items ) {
			options.responsive = {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		}

		carousel.owlCarousel(options)
	})


	/**
	 * Custom checkboxes
	 */

	$('[type="checkbox"]').each(function(){
		var checkbox = $(this),
			parent = checkbox.parents('.form-check').eq(0)

		parent.addClass('form-check-custom')

		checkbox
			.wrap('<span class="form-check-wrap"/>')
			.after('<span class="form-check-custom-control"/>')
	})


	/**
	 * Qty calc control
	 */

	$('.calc-form-qty-control').each(function(){
		var control = $(this)

		control.wrap('<span class="calc-form-qty"/>')
			.before('<span class="calc-form-qty-toggle _minus">&minus;</span>')
			.after('<span class="calc-form-qty-toggle _plus">+</span></span>')

		var toggle = control.parents('.calc-form-qty').eq(0).find('.calc-form-qty-toggle')

		changeQty(control, toggle)
	})

	$('.cart-product-quantity-container [type="number"]').each(function(){
		var control = $(this),
			toggle = control.parents('.cart-product-quantity-container').eq(0).find('.btn')

		changeQty(control, toggle)
	})

	function changeQty(control, toggle){
		toggle.on('click', function(e){
			var toggle = $(this),
				controlValue = control.val()

			if ( toggle.hasClass('_minus') ) {
				if ( controlValue > 1 ) {
					control.val( --controlValue )
				}
			}
			else {
				control.val( ++controlValue )
			}

			control.trigger('change')
		})
	}


	/**
	 * Fancybox
	 */

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
	 * Navigation Search
	 */

	$('.header-nav-search').on('click', function(){
		var searchButton = $(this),
			parent = searchButton.parent()

		parent.addClass('show-control')
	})


	/**
	 * Calculator
	 */

	$('.calc-form').each(function(){
		var $form = $(this),
			$options = $form.find('.form-check-input'),
			$qty = $form.find('.calc-form-qty-control'),
			$priceTotal = $form.find('.calc-form-total-v'),
			priceSingle = +$priceTotal.text(),
			priceTotal = priceSingle,

			$dataField = $('[name="your-data"]'),
			dataFieldOptions = {
				pc: {
					label: 'Количество ПК'
				},
				price: {
					label: 'Общая сумма'
				},
				options: {
					label: 'Дополнительные опции',
					v: []
				}
			}

		$qty
			.on('update', function(){
				var qtyVal = +$(this).val(),
					price = qtyVal * priceSingle

				$priceTotal.text( price )

				dataFieldOptions.pc.v = qtyVal
				dataFieldOptions.price.v = price
			})
			.on('change', function(){
				$(this).trigger('update')

				$form.trigger('setData')
			})
			.trigger('update')

		$options.each(function(){
			var $option = $(this),
				val = $option.val()

			$option
				.on('update', function(){
					if ( $(this).prop('checked') ) {
						dataFieldOptions.options.v.push( val )
					}
					else {
						var index = dataFieldOptions.options.v.indexOf( val )

						if ( index != -1 ) {
							dataFieldOptions.options.v.splice(index, 1)
						}
					}
				})
				.on('change', function(){
					$(this).trigger('update')

					$form.trigger('setData')
				})
				.trigger('update')
		})

		$form
			.on('setData', function(){
				var data = []

				$.each(dataFieldOptions, function(index, object){
					var value = Array.isArray( object.v ) ? object.v.join('; ') : object.v

					data.push(object.label + ': ' + value)
				})

				$dataField.val( data.join("\n") )
			})
			.trigger('setData')
	})


	/**
	 * Service Table
	 */

	$('.calc-st-table').each(function(){
		var $table = $(this),
			$options = $table.find('.calc-st-option'),
			$infoRow = $table.find('.calc-st-info'),
			$info = $table.find('.calc-st-selected'),

			$dataField = $('[name="service-list"]'),
			dataFieldOptions = []

		$options.each(function(){
			var $option = $(this),
				val = $option.val()

			$option
				.on('update', function(){
					if ( $(this).prop('checked') ) {
						dataFieldOptions.push( val )
					}
					else {
						var index = dataFieldOptions.indexOf( val )

						if ( index != -1 ) {
							dataFieldOptions.splice(index, 1)
						}
					}
				})
				.on('change', function(){
					$(this).trigger('update')

					$table.trigger('setData')
				})
				.trigger('update')
		})

		$table
			.on('setData', function(){
				if ( dataFieldOptions.length > 0 ) {
					$info.text('Выбрано услуг: ' + dataFieldOptions.length)

					$table.addClass('_show')
				}
				else {
					$info.text('')

					$table.removeClass('_show')
				}

				$dataField.val( dataFieldOptions.join('; ') )
			})
			.trigger('setData')
	})
})(jQuery)


/**
 * Callbacks for CF7 successful submits
 */

document.addEventListener( 'wpcf7mailsent', function( event ) {
	jQuery.fancybox.close()
	jQuery.fancybox.open('<div class="popup-container"><div class="popup widget _nomargin _dark _important text-center"><div class="h2 widget-title _big" style="margin-bottom: 0">Сообщение успешно отправлено</div></div></div>')

	setTimeout( function(){
		if ( '389' == event.detail.contactFormId ) {
			jQuery(location).attr('href', cart.urlEmpty)
		}
		else {
			jQuery.fancybox.close()
		}
	}, 2000)
}, false )