<?php

function getTweetsFromXML() {
	$url = "http://api.twitter.com/1/statuses/user_timeline.xml?screen_name=slicknet";
	$xmlString = file_get_contents($url);
	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}

function getTweetsFromJSON() {
	$url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=slicknet";
	$jsonString = file_get_contents($url);
	$arrayOfTweets = json_decode($jsonString);
	return $arrayOfTweets;
}

function getTweetsFromXML_CURL() {
	$url = "http://api.twitter.com/1/statuses/user_timeline.xml?screen_name=slicknet";
	//$xmlString = file_get_contents($url);

	$session = curl_init($url);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	$xmlString = curl_exec($session);
	curl_close($session);

	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}


function searchPhotosFlickr($searchTerm) {
	$searchTerm = urlencode($searchTerm);
	$url = "http://api.flickr.com/services/rest/?api_key=055a3d9b90dfae0f8db89d7c7c6d6a5c&method=flickr.photos.search&text=$searchTerm";
	$xmlString = file_get_contents($url);
	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}