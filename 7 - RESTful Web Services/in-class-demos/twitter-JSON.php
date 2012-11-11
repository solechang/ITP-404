<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Twitter w JSON</title>
</head>
<body>

<?php
	$tweets = getTweetsFromJSON();
	//print_r($json);
	echo '<ul>';
	foreach($tweets as $tweet) {
		echo '<li>' . $tweet->text . '</li>';
	}
	echo '</ul>';
?>

</body>
</html>