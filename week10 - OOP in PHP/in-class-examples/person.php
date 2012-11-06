<?php

class Person {

	public $name = '';

	public function __construct($first_name) {
		$this->name = $first_name;
	}

	protected function set_fullname() {

	}

	private function encrypt_password($pw) {
		// encrypt pw
	}

	public function greeting() {
		echo 'Hello my name is ' . $this->name;
	}

	public function __toString() {
		echo 'Not a string buddy.';
		return '';
	}

	public function __destruct() {
		echo "Class finished.";
	}
}

// $david = new Person('David');
// echo $david;
// $david->greeting();