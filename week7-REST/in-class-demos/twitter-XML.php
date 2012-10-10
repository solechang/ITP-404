<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Twitter w XML</title>
</head>
<body>

<?php
	$xml = getTweetsFromXML();
	echo '<ul>';
	foreach($xml->status as $tweet) {
		echo '<li>' . $tweet->text;
		echo '<strong>' . $tweet->created_at . '</strong>';
		echo '</li>';
	}
	echo '</ul>';
?>

</body>
</html>