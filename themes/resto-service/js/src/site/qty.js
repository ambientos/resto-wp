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


/**
 * Qty Cart control
 */

$(document).on('set_qty_controls', function(){
	$('.cart-product-quantity-container [type="number"]').each(function(){
		var $control = $(this),
			$toggles = $control.parents('.cart-product-quantity-container').eq(0).find('.btn')

		changeQty($control, $toggles)
	})
}).trigger('set_qty_controls')

$( document.body ).on('updated_cart_totals', function(){
	$(document).trigger('set_qty_controls')
})

function changeQty($control, $toggles){
	var updateButtonTimer

	$toggles.on('click', function(e){
		var $toggle = $(this),
			controlValue = $control.val()

		if ( $toggle.hasClass('_minus') ) {
			if ( controlValue > 1 ) {
				$control.val( --controlValue )
			}
		}
		else {
			$control.val( ++controlValue )
		}

		if ( controlValue !== $control.val() ) {
			$control.trigger('change')
		}
	})

	$control
		.on('change', function(){
			$('[name="update_cart"]').each(function(){
				var $updateButton = $(this)

				clearTimeout(updateButtonTimer)

				updateButtonTimer = setTimeout(function(){
					$updateButton.trigger('click')
				}, 1500)
			})
		})
}