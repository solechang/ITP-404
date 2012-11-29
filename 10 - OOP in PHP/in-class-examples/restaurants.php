<?php

require 'database.php';

$db = new Database('root', '', 'localhost', 'restaurants_db');
$results = $db->query('SELECT * FROM restaurants');

while ($row = mysqli_fetch_assoc($results)) {
	echo "<p>". $row['title'] ."</p>";
}