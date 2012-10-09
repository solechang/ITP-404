<?php
	require('functions.php');

	if (!isset($_POST['submit'])) {
		redirect('profile.php');
	}
?>

<html>
<head>
	<title></title>
</head>
<body>

<?php
	if (isset($_POST['submit'])) {
		$name = $_POST['username']; // query string parameter
		echo "<p>Thanks you, $name, for logging in.</p>";	
	} else {
		header('Location: profile.php');
	}
?>

</body>
</html>
