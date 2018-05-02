<?php

class Controller_pizza extends Controller {
	
	public function __construct() {
		$this->model = new Model_menu();
		$this->view = new View();
	}
	
	public function action_index() {
		
		$data = $this->model->get_data();
		$this->view->generate('pizza_view.php', 'template_view.php', $data);
	}
}