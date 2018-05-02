<?php

class Controller_ extends Controller {
	
	public function __construct() {
		$this->model = new Model_();
		$this->view = new View();
	}
	
	public function action_index() {
		
		$data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}