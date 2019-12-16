/**
 * Calculator
 */

$('.calc-form').each(function(){
	let $form            = $(this),
		type             = $form.data('type'),

		$addictOptions   = $form.find('.form-check-input'),

		$qty             = $form.find('.calc-form-qty-control'),

		$priceTotal      = $form.find('.calc-form-total-v'),
		priceSingle      = +$priceTotal.text(),

		addict1Price     = 1000,
		addict2Price     = 330,
		remote1Price     = 1000,
		marginEgaisPrice = 600

		remoteOptionOn   = 0,
		egaisOptionOn    = 0,

		$dataField       = $('[name="your-data"]'),
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

	// QTY toggler
	$qty
		.on('update', function(){
			let qtyVal = +$(this).val(),
				price  = 0

			// If quantity less than one
			if ( qtyVal < 1 ) {
				return
			}

			// Support calculator
			if ( 'type1' === type ) {
				if ( qtyVal < 3) {
					price = priceSingle
				}

				else {
					price = (qtyVal - 2) * addict1Price + priceSingle
				}
			}

			// Online calculator
			if ( 'type2' === type ) {
				price = qtyVal * priceSingle
			}

			$priceTotal.text( price )

			dataFieldOptions.pc.v = qtyVal
			dataFieldOptions.price.v = price
		})
		.on('change', function(){
			$addictOptions.trigger('update')

			$(this).trigger('update')

			$form.trigger('setData')
		})
		.trigger('update')

	$addictOptions.each(function(){
		let $option = $(this),
			val     = $option.val()

		$option
			.on('update', function(){
				let priceTotal = +$priceTotal.text(),
					qtyVal     = +$qty.val(),

					optionCheckedIndex = dataFieldOptions.options.v.indexOf( val )

				if ( $(this).prop('checked') ) {
					// Support calculator
					if ( 'type1' === type ) {
						if ( 'option-1' == $(this).attr('name') ) {
							if ( ! remoteOptionOn ) {
								priceSingle -= remote1Price

								remoteOptionOn = 1
							}
						}

						if ( 'option-2' == $(this).attr('name') ) {
							if ( qtyVal > 2) {
								if ( ! egaisOptionOn ) {
									priceSingle += marginEgaisPrice

									egaisOptionOn = 1
								}
							}

							else {
								if ( egaisOptionOn ) {
									priceSingle -= marginEgaisPrice

									egaisOptionOn = 0
								}
							}
						}
					}

					// Online calculator
					if ( 'type2' === type ) {
						if ( 'option-1' == $(this).attr('name') ) {
							if ( ! remoteOptionOn ) {
								priceSingle -= addict2Price

								remoteOptionOn = 1
							}
						}
					}

					if ( optionCheckedIndex == -1 ) {
						dataFieldOptions.options.v.push( val )
					}
				}
				else {
					if ( optionCheckedIndex != -1 ) {
						// Support calculator
						if ( 'type1' === type ) {
							if ( 'option-1' == $(this).attr('name') ) {
								if ( remoteOptionOn ) {
									priceSingle += remote1Price

									remoteOptionOn = 0
								}
							}

							if ( 'option-2' == $(this).attr('name') ) {
								if ( egaisOptionOn ) {
									priceSingle -= marginEgaisPrice

									egaisOptionOn = 0
								}
							}
						}

						// Online calculator
						if ( 'type2' === type ) {
							if ( 'option-1' == $(this).attr('name') ) {
								if ( remoteOptionOn ) {
									priceSingle += addict2Price

									remoteOptionOn = 0
								}
							}
						}

						dataFieldOptions.options.v.splice(optionCheckedIndex, 1)
					}
				}
			})
			.on('change', function(){
				$(this).trigger('update')

				$qty.trigger('update')

				$form.trigger('setData')
			})
			.trigger('update')
	})

	$form
		.on('setData', function(){
			let data = []

			$.each(dataFieldOptions, function(index, object){
				let value = Array.isArray( object.v ) ? object.v.join('; ') : object.v

				data.push(object.label + ': ' + value)
			})

			$dataField.val( data.join("\n") )
		})
		.trigger('setData')
})