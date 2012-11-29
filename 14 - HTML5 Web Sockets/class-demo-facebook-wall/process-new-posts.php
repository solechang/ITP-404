<?php 

include '../Pusher-PHP/lib/Pusher.php';
$app_id = '19121';
$key = '19c7a97556307e78234c';
$secret = 'ef3c520ff2ca9a1a33ea';

$new_post = $_REQUEST['post'];
// store $new_post in DB

$pusher = new Pusher($key, $secret, $app_id);

$data = array(
	'post' => $new_post,
	'datetime' => date('m/d/Y - g:i A')
);

$pusher->trigger('news-feed-channel', 'new-post', $data);