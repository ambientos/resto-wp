let $chrsList = $('.product-chars'),
	$chrsListToggle = $('.product-chars-toggle')

$chrsListToggle.on('click', function(e){
	e.preventDefault()

	$chrsList.children().toggleClass('_show-all')
	$chrsListToggle.toggleClass('_show-all')
})