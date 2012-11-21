<?php 

class Course_Controller extends Base_Controller {

	public function action_add() {
		return View::make('add-course');
		//return new View('add-course');
	}

	public function action_add_course() {
		$validation = Course::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to('course/add')
				->with_input()
				->with_errors($validation);
		} else {
			// save to db
			return Redirect::to('course/add')
				->with('success', 'You have successfully added the course.');
		}
	}

}