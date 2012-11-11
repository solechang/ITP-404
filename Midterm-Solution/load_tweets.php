<?php 

include 'twitter.php';

$tweets = Twitter::getTweets('linkinpark');

echo '<ul>';

foreach($tweets as $tweet) {
	echo '<li>' . $tweet->text . '</li>';
}

echo '</ul>';