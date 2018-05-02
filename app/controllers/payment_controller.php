<?php

class Controller_payment extends Controller {
	
	public function action_index() {
		
		$this->view->generate('payment_view.php', 'template_view.php');

	}
}