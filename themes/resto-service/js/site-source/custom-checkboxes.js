(function($){
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
})(jQuery)