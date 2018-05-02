<?php

include 'app/connect.php';

class Controller_registration extends Controller {
	
	public function __construct() {
		$this->view = new View();
	}
	
	public function action_index() {
		
		if($_SESSION['auth'] == 0){
			header("Location:/auth");
		} else {
			if(isset($_POST['save'])) {
				$this->reg_about();
			}
		}
		$this->view->generate('registration_view.php', 'template_view.php');
	}
	
	public function reg_about() {
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		$stmt = $pdo->prepare("UPDATE users SET name = :f_name, surname = :l_name, phone = :phone, adress = :adress where id_users = ".$_SESSION['auth'].";");
		$stmt->execute(array(
			"f_name" => $_POST['f_name'],
			"l_name" => $_POST['l_name'],
			"phone" => $_POST['phone'],
			"adress" => $_POST['adress'],
		));
		header("Location:/");
	}
}