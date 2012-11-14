<?php

class Schedule {

	public static function all($term = null) {
		$query = DB::table('schedule')
			->join('courses', 'schedule.course_id', '=', 'courses.id')
			->join('instructors', 'schedule.instructor_id', '=', 'instructors.id');

		if ($term) {
			$query->where('term', '=', $term);
		}

		$results = $query->get(array(
			'term',
			'course_number',
			'name',
			'units',
			'first_name',
			'last_name'
		));

		return $results;

		/*
		SELECT term, course_number, name, units
		FROM schedule, courses, instructors
		WHERE course_id = courses.id
		AND instructor_id = instructors.id
		*/

		/*
		SELECT term, course_number, name, units
		FROM schedule
		INNER JOIN courses
		ON schedule.course_id = courses.id
		INNER JOIN instructors
		ON schedule.instructor_id = instructors.id
		*/

	}


}