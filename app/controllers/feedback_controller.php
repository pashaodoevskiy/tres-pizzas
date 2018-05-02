<?php

include 'app/connect.php';

class Controller_feedback extends Controller {
	
	public function action_index() {
		if(isset($_POST['send'])) {
			$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
			$stmt = $pdo->prepare('INSERT INTO feedback(name, phone, message) VALUES(:n, :p, :m)');
			$stmt->execute(array(
				"n" => $_POST['name'],
				"p" => $_POST['phone'],
				"m" => $_POST['message'],
			));
			$data = "<div class='main-text-black align-center'>Ваше сообщение отправлено</div>";
			$this->view->generate('feedback_view.php', 'template_view.php', $data);
	} else {
		$this->view->generate('feedback_view.php', 'template_view.php');
		}
	}
}