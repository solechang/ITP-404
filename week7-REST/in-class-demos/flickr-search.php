<?php require 'functions.php' ?>
<!doctype html>
<html>
<head>
	<title>Flickr Demo</title>
</head>
<body>

<?php
	$xml_obj = searchPhotosFlickr('USC Trojan Football');
	foreach($xml_obj->photos->photo as $photo) {
		$id = $photo['id'];
		$farm = $photo['farm'];
		$secret = $photo['secret'];
		$server_id = $photo['server'];

		$img_src = "http://farm".$farm.".staticflickr.com/".$server_id."/".$id."_".$secret."_m.jpg";
		echo '<img src="'.$img_src.'" />';
	}
?>

</body>
</html>