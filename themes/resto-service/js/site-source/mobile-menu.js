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
})(jQuery)