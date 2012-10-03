<html>
<body>
<?php
	
	$name = 'David Tang';
	echo "$name likes the web";

	// indexed array
	$fruits = array('apples', 'oranges', 'bananas');

	echo '<ul>';
	foreach($fruits as $fruit) {
		echo "<li>$fruit</li>";
	}
	echo '</ul>';

	// Associative array
	$schools = array(
		'CA' => 'USC',
		'FL' => 'University of Miami'
	);

	echo '<ul>';
	foreach($schools as $key => $value) {
		echo "<li>$key - $value</li>";
	}
	echo '</ul>';

?>

</body>
</html>