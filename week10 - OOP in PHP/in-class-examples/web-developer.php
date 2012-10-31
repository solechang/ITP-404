<?php

require 'person.php';

class WebDeveloper extends Person {

	// public function __construct() {

	// }

	public function code() {
		echo "I like to code for the web";
		//$this->set_fullname();
	}

}

$david = new WebDeveloper('David');
$david->greeting();
$david->code();

//print_r($david);