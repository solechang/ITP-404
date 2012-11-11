<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Twitter API Demo</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
	$tweets = getTweetsFromJSON('slicknet');

	foreach($tweets as $tweet) {
		echo '<div class="tweets">'.$tweet->text.'</div>';
	}
?>
	
</body>
</html>