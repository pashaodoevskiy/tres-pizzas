<?php

class Controller_setting extends Controller {
	
	public function __construct() {
		$this->view = new View();
	}
	
	public function action_index() {
		if($_SESSION['auth'] == 1) {
			$this->view->generate('setting_view.php', 'template_view.php');
		} else {
			header("Location:/");
		}
		
	}
}