<?php 

class Course {

	protected static $rules = array(
		'course_name' => 'required',
		'course_number' => 'required|min:5',
		'units' => 'required|numeric'
	);

	public static function validate($input) {
		$validation = new Validator($input, static::$rules);
		return $validation;
	}

}
