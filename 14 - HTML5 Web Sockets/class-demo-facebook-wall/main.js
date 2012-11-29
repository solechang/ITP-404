(function() {

	var pusher = new Pusher('19c7a97556307e78234c');
	var channel = pusher.subscribe('news-feed-channel');

	channel.bind('new-post', function(data) {
		console.log(data);
		var html = '<div class="post">';
		html += '<span>'+data.datetime+'</span>';
		html += data.post+'</div>';

		$('#posts').prepend(html);
	});

	$('#share-button').on('click', function() {
		var newPost = $('#new-post').val();
		console.log(newPost);
		$.ajax({
			url: 'process-new-posts.php',
			type: 'post',
			data: {
				post: newPost
			}
		});
	});

})();


