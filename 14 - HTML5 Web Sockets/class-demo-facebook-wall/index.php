<!doctype html>
<html>
	<head>
		<title>Facebook Wall</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<div id="container">
			<h1>Facebook News Feed</h1>
			<div class="form">
				<textarea name="new-post" id="new-post"></textarea>
				<input type="button" id="share-button" value="Share">
			</div>
			<div id="posts">
				<!-- initialize page with posts stored in DB -->
				<div class="post">This is post 3</div>
				<div class="post">This is post 2</div>
				<div class="post">This is post 1</div>
			</div>
		</div>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="http://js.pusher.com/1.12/pusher.min.js"></script>
		<script src="main.js"></script>
	</body>
</html>