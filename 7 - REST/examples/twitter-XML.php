<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Twitter API Demo</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
	$xml = getTweetsFromXML('laravelphp');
	foreach($xml->status as $tweet) {
		echo '<div class="tweets">'.$tweet->text.'</div>';
	}
?>
	
</body>
</html>