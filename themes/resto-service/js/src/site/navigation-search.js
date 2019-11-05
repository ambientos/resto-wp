/**
 * Navigation Search
 */

$('.header-nav-search').on('click', function(){
	var searchButton = $(this),
		parent = searchButton.parent()

	parent.addClass('show-control')
})