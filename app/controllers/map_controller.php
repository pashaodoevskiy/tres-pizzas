<?php

class Controller_map extends Controller {
	
	public function action_index() {
		
		$this->view->generate('map_view.php', 'template_view.php');

	}
}