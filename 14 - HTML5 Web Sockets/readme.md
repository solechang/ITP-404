##HTML5 Web Sockets

###Overview
* What are Web Sockets and why are they useful?
* Web Socket libraries / APIs
	* Pusher
	* Firebase
	* Socket.IO w/ Node.js
* Chat Demo


###Web Sockets

Web Sockets is a type of push technology that allows for servers to push data or updates to a page AFTER a page has loaded. If you think about a traditional application, once a page has already loaded, the way it typically receives updates are through AJAX requests. The page has to make an AJAX request to the server to fetch new information. In order to receive the most up to date information, your page has to keep making requests to the server in order to check if there are updates. With Web Sockets, rather than __polling the server__, you can create an open, bidirectional connection between your page and the server and let the server PUSH updates to your app. This way, your page never has to keep making unnecessary requests to the server when there might not be any updates. Your app will instead be notified by the server if there are updates. Web Sockets can replace the technique of __long polling (polling the server)__.

In order to work with Web Sockets, you need a Web Socket Server. Now although we could look for one to install, there are several really simple, robust, and scalable API's out there that we can utilize instead, one of them being Pusher. Others include Firebase and Socket.IO with Node.js. 

* Visit [Pusher Site](http://pusher.com/)