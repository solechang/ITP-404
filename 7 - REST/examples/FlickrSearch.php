<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Flickr API Demo</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
	$api_key = '055a3d9b90dfae0f8db89d7c7c6d6a5c';
	$photos = searchPhotosFromFlickr($api_key, "USC Trojan Football");
	//print_r($photos);

	foreach ($photos->photo as $photo) {
		$farm = $photo['farm'];
		$id = $photo['id'];
		$server_id = $photo['server'];
		$secret = $photo['secret'];

		echo "<img src='http://farm{$farm}.staticflickr.com/{$server_id}/{$id}_{$secret}_m.jpg'>";
	}

?>
	
</body>
</html>