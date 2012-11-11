<?php

require 'flickr.php';

$bbt_flickr = new Flickr('055a3d9b90dfae0f8db89d7c7c6d6a5c');
$bbt_search = $bbt_flickr->searchPhotosByTerm('Big Bang Theory');

// display the photos
foreach($bbt_search as $photo) {
	$id = $photo['id'];
	$farm = $photo['farm'];
	$secret = $photo['secret'];
	$server_id = $photo['server'];

	$img_src = "http://farm".$farm.".staticflickr.com/".$server_id."/".$id."_".$secret."_m.jpg";
	echo '<img src="'.$img_src.'" />';
}

