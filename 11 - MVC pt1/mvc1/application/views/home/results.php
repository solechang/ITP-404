<!doctype html>
<html>
<head>
	<title>Flickr Search Results</title>
	<link rel="stylesheet" href="<?php echo URL::to_asset('css/default.css') ?>">
</head>
<body>

	<p>You searched for: <?php echo $search_term ?></p>

	<div id="results">
		<?php
			foreach($results as $photo) {
				$id = $photo['id'];
				$farm = $photo['farm'];
				$secret = $photo['secret'];
				$server_id = $photo['server'];

				$img_src = "http://farm".$farm.".staticflickr.com/".$server_id."/".$id."_".$secret."_m.jpg";
				echo '<img src="'.$img_src.'" />';
			}
		?>
	</div>

</body>
</html>