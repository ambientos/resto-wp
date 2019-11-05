(function($){
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
			dataPrice = 0

		$options.each(function(){
			var $option = $(this),
				val = $option.val()

			$option
				.on('update', function(){
					var $option = $(this),
						optionPrice = +$option.data('price')

					if ( $option.prop('checked') ) {
						dataFieldOptions.push( val )
						dataPrice += optionPrice
					}
					else {
						var index = dataFieldOptions.indexOf( val )

						if ( index != -1 ) {
							dataFieldOptions.splice(index, 1)

							dataPrice -= optionPrice
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
					$info.text('Выбрано услуг: ' + dataFieldOptions.length +', на сумму: '+ dataPrice)

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