
(function($) {
	var favoriteCount = 0;

	// event delegation
	$('#contacts').on('click', '.favorite', function(e) {
		var $this = $(this); // cache the value of $(this) in a variable
		var name = $this.siblings('.name').text(); //DOM traversal method .siblings()

		console.log(name + ' saved to favorites');
		favoriteCount++;
		console.log('Total favorites: ' + favoriteCount);

		$this.parent().addClass('favorited'); // DOM traversal method .parent()
		e.preventDefault(); //prevent default behavior of the link so you dont jump to the top of the page
	});

})(jQuery);