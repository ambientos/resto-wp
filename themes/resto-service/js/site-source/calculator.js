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