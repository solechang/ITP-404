$('#go').on('click', function() {
	var searchTerm = $('#search-term').val();

	$('#results').html('<img src="ajax-loader.gif">');

	$.ajax({
		url: 'flickr-search.php',
		data: {
			searchTerm: searchTerm
		},
		success: function(response) {
			$('#results').html(response);
		},
		error: function(err1, err2, err3) {
			console.log(err1, err2, err3);
		}
	});

});