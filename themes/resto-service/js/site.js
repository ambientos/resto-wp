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
		})
	}
})(jQuery)