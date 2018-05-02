<?php

class Controller_terms_delivery extends Controller {
	
	public function action_index() {
		
		$this->view->generate('terms_delivery_view.php', 'template_view.php');

	}
}