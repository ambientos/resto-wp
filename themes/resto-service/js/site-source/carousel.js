(function($){
	/**
	 * Owl Carousel
	 */

	$('.carousel-container').each(function(){
		var container = $(this),
			carousel = container.find('.carousel'),
			autoPlay = container.data('play') || 0,
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

		if ( autoPlay ) {
			options.autoplay = true
			options.autoplaySpeed = 2000
			options.autoplayTimeout = +autoPlay
			options.autoplayHoverPause = true
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
})(jQuery)