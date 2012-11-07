<?php

class Flickr_Controller extends Base_Controller {

	public function action_index() {
		return View::make('home.search');
	}

	public function action_results() {
		$search_term = Input::get('search-term');
		$search_term = urlencode($search_term);

		$flickr = new Flickr('055a3d9b90dfae0f8db89d7c7c6d6a5c');
		$flickr_search = $flickr->searchPhotosByTerm($search_term);

		//dd($flickr_search);

		$data = array(
			'search_term' => $search_term,
			'results' => $flickr_search->photos->photo
		);

		return View::make('home.results', $data);
	}

}