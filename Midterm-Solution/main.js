
var map;
var template = $('#concert-list-item-template').html();
template = Handlebars.compile(template);

// JSONP callback funciton. Must be global
var processJSONP = function(data) {
	var i;
	var eventList = data.events.event;
	var len = eventList.length;
	var marker;
	var html = '';

	console.log(eventList);

	for (i = 0; i < len; i++) {
		console.log(eventList[i].latitude, eventList[i].longitude);

		marker = new google.maps.Marker({
			position: new google.maps.LatLng(eventList[i].latitude, eventList[i].longitude),
			title: 'Linkin Park'
		});

		marker.setMap(map);
		html += template(eventList[i]);
	}

	$('#concert-list').html(html);
};

// Page initialization code
(function() {
	var mapOptions = {
		zoom: 2,
		center: new google.maps.LatLng(36.05178307933835, 42.49737373046878),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var script = document.createElement('script');
	script.src = "http://api.eventful.com/json/events/search?c=music&app_key=NpmnLBfV4QKQtQ2N&page_number=1&date=Future&keywords=linkin+park&callback=processJSONP";
	document.getElementsByTagName('head')[0].appendChild(script);

	map = new google.maps.Map(document.getElementById("map"), mapOptions);

	// ajax request on page load to load in the tweets
	$.ajax({
		url: 'load_tweets.php',
		success: function(html) {
			var $tweetsContainer = $('#tweets');
			$tweetsContainer.find('img').remove();
			$tweetsContainer.append(html);
		}
	});
})();