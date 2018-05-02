<?php

class Controller_drink extends Controller {
	
	public function __construct() {
		$this->model = new Model_menu();
		$this->view = new View();
	}
	
	public function action_index() {
		
		$data = $this->model->get_data();
		$this->view->generate('drink_view.php', 'template_view.php', $data);
	}
}