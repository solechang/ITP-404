<?php

require 'functions.php';

$api_key = '055a3d9b90dfae0f8db89d7c7c6d6a5c';

$search_text = $_GET['searchText'];

$photos = searchPhotosFromFlickr($api_key, $search_text);
//print_r($photos);

foreach ($photos->photo as $photo) {
	$farm = $photo['farm'];
	$id = $photo['id'];
	$server_id = $photo['server'];
	$secret = $photo['secret'];

	echo "<img src='http://farm{$farm}.staticflickr.com/{$server_id}/{$id}_{$secret}_m.jpg'>";
}

