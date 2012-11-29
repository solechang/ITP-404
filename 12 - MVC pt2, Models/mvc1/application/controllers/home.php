<?php

class Home_Controller extends Base_Controller {

	public function action_index() {
		$instructors = Instructor::all();
		$schedule = Schedule::all('Fall 2012');

		//dd($instructors);
		//dd($schedule);

		$data = array(
			'itp_instructors' => $instructors,
			'scheduled_courses' => $schedule
		);

		return View::make('home.index', $data);
	}

}