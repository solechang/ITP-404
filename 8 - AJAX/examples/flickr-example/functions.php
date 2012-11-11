<?php

/**
 * Twitter API documentation: https://dev.twitter.com/docs/api
 */

/**
 * [getTweetsFromJSON description]
 * @param  string $twitterUsername
 * @return array of objects
 */
function getTweetsFromJSON($twitterUsername) {
	$twitterURL = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=".$twitterUsername."&count=7";
	$jsonString = file_get_contents($twitterURL);
	$arrayOfTweets = json_decode($jsonString);
	return $arrayOfTweets;
}


/**
 * [getTweetsFromXML description]
 * @param  string $twitterUsername
 * @return simpleXML object
 */
function getTweetsFromXML($twitterUsername) {
	$twitterURL = "http://api.twitter.com/1/statuses/user_timeline.xml?screen_name=".$twitterUsername."&count=5";
	$xmlString = file_get_contents($twitterURL);
	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}


/**
 * [getTweetsFromXML_CURL description]
 * @param  string $twitterUsername 
 * @return simpleXML object        
 */
function getTweetsFromXML_CURL($twitterUsername) {
	$twitterURL = "http://api.twitter.com/1/statuses/user_timeline.xml?screen_name=".$twitterUsername."&count=3";
	
	//initialize the CURL session
	$session = curl_init($twitterURL);
	
	// Supress the HTTP headers
    curl_setopt($session, CURLOPT_HEADER, false);
	
	// Return the remote file as a string, rather than output it directly
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	$xmlString = curl_exec($session);
	
	// Close the cURL session
    curl_close($session);

	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}


function searchPhotosFromFlickr($api_key, $term = 'cats') {
	$term = urlencode($term);
	$url = "http://api.flickr.com/services/rest/?api_key=". $api_key;
	$url = $url . "&method=flickr.photos.search";
	$url = $url . "&text=" . $term;
	$url = $url . "&sort=relevance";
	$url = $url . "&content_type=1";

	$xmlString = file_get_contents($url);
	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML->photos;
}