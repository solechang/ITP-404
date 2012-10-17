##AJAX - Part 1

###Overview
* AJAX Overview
	* What is AJAX?
		* __A__synchronouse __J__avaScript __a__nd __X__ML
		* Asynchronous requests vs synchronous requests
		* Response formats
		* Examples of real world AJAX applications
		* Why is AJAX useful? 
* AJAX in plain JS
	* XMLHttpRequest constructor
	* Same origin policy
	* AJAX loaders 
* AJAX with jQuery
	* static methods on constructors 
	* event listeners on AJAXed content using event delegation
	 
##What is AJAX?
* AJAX is not a programming language
* AJAX is a __technique using JavaScript__ that allows for updating parts of a web page without reloading the whole page. AJAX is a way to interact and exchange data with the server through JavaScript
* AJAX stands for Asynchronous JavaScript and XML
* Asynchronous means that you can make requests to the server without making the user wait around for a response. Essentially, the browser is not locked and it can continue doing other things (like processing other JS).
* XML used to be the defacto format for data being transferred. Responses can be whatever format you like. A lot of times, dynamic templates are returned (server-side generated HTML) or JSON data.

####Examples of AJAX
* Google Search autosuggestions
* posting on a Facebook wall
* panning Google maps
* Gmail (versus Gmail without JS)

####Why is AJAX useful?
* More responsive interface. User feels that changes are instantaneous
* Reduced waiting time
* Less traffic

##AJAX with Vanilla JavaScript
* create an XHR object using XMLHttpRequest constructor
* __onreadystatechange__	stores a function (or the name of a function) to be called automatically each time the __readyState__ property changes
* __readyState__	holds the status of the XMLHttpRequest. Changes from 0 to 4: 
	* 0: request not initialized 
	* 1: server connection established
	* 2: request received 
	* 3: processing request 
	* 4: request finished and response is ready
* __status__:	200: "OK", 404: Page not found
* __responseText__ property holds the response data as a string

See example folder for a full working demo.

##jQuery's AJAX method

```js
	$.ajax({
		url: 'some/path/to/script.php',
		data: {},
		type: 'GET',
		success: function() {
		
		},
		error: function() {
		
		}
	});
```

##References
* [jQuery ajax method](http://api.jquery.com/jQuery.ajax/)
* [AJAX loaders](http://ajaxload.info/)

##Assignment
For this assignment, I want you to take the files supplied in the homework-starter folder, navigate to the index.html page, and make that page pull in tweets via AJAX (either raw JS or jQuery is fine) when you click on any one of the anchors. The respective twitter username is stored on the id attribute of each anchor, so you'll need to pull that out before making the AJAX request. Also, you will neex to modify twitter-JSON.php and functions.php to accept data from your AJAX request, namely the twitter username. Your AJAX request will be made to the twitter-JSON.php file.

####Requirements
* Page pulls in tweets via AJAX for a user when the corresponding anchor is clicked
* Before the AJAX request is sent, an AJAX loader image is placed in div#tweets. I have provided the image for you, or you can visit [ajaxload.info](http://ajaxload.info/) for another loader image.
* Lastly, when you click on each list item element within the list of tweets that is returned, I want you to add a class of 'read' to that list-item. I have already created this class in the attached stylesheet.

Upload your assignment to a NEW repository called ITP404-AJAX1