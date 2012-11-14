<?php 

class Instructor {

	public static function all() {
		// SELECT * FROM instructors
		$results = DB::table('instructors')->get();
		return $results;
	}
}
