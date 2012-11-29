<?php

class Database {

	protected static $connection = null;

	public function __construct($user, $pw, $host, $db) {
		if (static::$connection === null) { // if theres no connection
			static::$connection = mysqli_connect($host, $user, $pw, $db);
		}
	}

	public function query($sql) {
		$result = mysqli_query(static::$connection, $sql);
		// $rows = mysqli_fetch_assoc($result);
		//return $rows;
		return $result;
	}

}