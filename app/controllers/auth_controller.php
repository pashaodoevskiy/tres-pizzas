<?php

include 'app/connect.php';

class Controller_auth extends Controller {
	
	public function __construct() {
		$this->view = new View();
	}
	
	public function action_index() {
		switch(true){
			case $_POST['auth']:
				$this->auth();
				break;
			case $_POST['reg']:
				$this->reg();
				break;
			default:
				$_SESSION['auth'] = 0;
				$this->view->generate('auth_view.php', 'template_view.php', $data);
		}
	}
	
	public function auth() {
		//подключаем БД
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		//подготавливаем запрос
		$stmt_psw = $pdo->prepare('SELECT password FROM users WHERE login = ?');
		$stmt_psw->execute(array($_POST['lgn']));	
		//получаем строку
		$psw_in_db = $this->get_string($stmt_psw, 'password');
		//получаем количество строк с указанным логином
		$stmt_lgn = $pdo->prepare('SELECT COUNT(login) FROM users WHERE login = ?');
		$stmt_lgn->execute(array($_POST['lgn']));
		//преобзаруем в строку с числом строк
		$lgn_in_db = $this->get_string($stmt_lgn, '0');
		//если нажата кнопка выход меняем значение сессии
		if(isset($_POST['exit'])) {
			$_SESSION['auth'] = 0;
			header('Location:/auth');
		} else {
			if($lgn_in_db == 0) {
				$data['auth'] = $div.'<div class="alert-message">Такой пользователь еще не зарегистрирован</div>';
				$this->view->generate('auth_view.php', 'template_view.php', $data);
			//сравниваем хэши
			} elseif(password_verify($_POST['psw'], $psw_in_db)) {
				$data['auth'] = $div.'<div class="alert-message">Неверный логин или пароль</div>';
				$this->view->generate('auth_view.php', 'template_view.php', $data);
			//если все ок меняем значение сессии
			} else {
				$session_true = $this->get_session_id($_POST['lgn']);
				$_SESSION['auth'] = $session_true;
				header('Location:/');
			}
		}
	}

	public function reg() {
		$div = '<div class="alert-text">';
		//подключаем БД
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		//подготавливаем запрос c логином
		$stmt_lgn = $pdo->prepare('SELECT COUNT(login) FROM users WHERE login = ?');
		$stmt_lgn->execute(array($_POST['lgn_a']));
		//получаем число строк с схожим логином
		$login_count = $this->get_string($stmt_lgn, '0');
		//подготавливаем запрос с почтой
		$stmt_mail = $pdo->prepare('SELECT COUNT(login) FROM users WHERE login = ?');
		$stmt_mail->execute(array($_POST['mail']));
		//получаем число строк с схожим логином
		$mail_count = $this->get_string($stmt_mail, '0');
		//создаем хэш пароля
		$psw_hash = password_hash($_POST['psw'], PASSWORD_DEFAULT);
		
		//проверяем логин в БД
		if($login_count != 0 or $mail_count != 0) {
			$data['reg'] = $div.'<div class="alert-message">Такой пользователь уже зарегистрирован</div>';
			$this->view->generate('auth_view.php', 'template_view.php', $data);
		} else {
			//если все ок добавляем данные в базу и логиним пользователя
			$stmt = $pdo->prepare('INSERT INTO users(login, password, email) VALUES(:lgn, :psw, :mail)');
			$stmt->execute(array(
				"lgn" => $_POST['lgn_a'],
				"psw" => $psw_hash,
				"mail" => $_POST['mail'],
			));
			$session_true = $this->get_session_id($_POST['lgn_a']);
			$_SESSION['auth'] = $session_true;
			header('Location:/registration');
		}
	}
	
	public function get_string($data, $col) {
		foreach($data as $v) {
			$data = $v[$col];
		}
		return $data;
	}
	
	public function get_session_id($login) {
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		$stmt_ses = $pdo->prepare('SELECT id_users FROM users WHERE login = ?');
		$stmt_ses->execute(array($login));
		return $this->get_string($stmt_ses, 'id_users');
	}
 }