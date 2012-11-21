<?php

require 'remoteconnector.php';

class Flickr extends RemoteConnector {

	private $_api_key;

	public function __construct($api_key) {
		$this->_api_key = $api_key;
	}

	public function searchPhotosByTerm($searchTerm) {
		$searchTerm = urlencode($searchTerm);
		$url = "http://api.flickr.com/services/rest/?api_key=" . $this->_api_key . "&method=flickr.photos.search&text=$searchTerm";
		$xmlString = $this->get($url);
		$simpleXML = simplexml_load_string($xmlString);
		return $simpleXML;
	}

	public function searchPhotosByUser($user) {
		// code here
	}

}