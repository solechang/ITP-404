<?php 

require 'functions.php';

$searchTerm = $_GET['searchTerm'];

$xml_obj = searchPhotosFlickr($searchTerm);
foreach($xml_obj->photos->photo as $photo) {
	$id = $photo['id'];
	$farm = $photo['farm'];
	$secret = $photo['secret'];
	$server_id = $photo['server'];

	$img_src = "http://farm".$farm.".staticflickr.com/".$server_id."/".$id."_".$secret."_m.jpg";
	echo '<img src="'.$img_src.'" />';
}
