$('#some-button').on('click', function() {
	var name = $('#name').val();
	var school = $('#school').val();

	$.ajax({
		url: 'request.php',
		data: {
			name: name,
			school: school
		},
		type: 'GET',
		success: function(res) {
			$("#results").html(res);
		}
	});

});