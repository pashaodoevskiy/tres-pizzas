<?php
include 'app/connect.php';
class Controller_basket extends Controller {
	
	public $prod;
	
	public function __construct() {
		$this->prod = $_POST['prod'];
		$this->view = new View();
	}
	
	public function connect() {
		return new PDO(DSN, DB_USERNAME, DB_PASSWORD);
	}
	
	//Принимает PDO возвращает строку
	public function pdoToString($pdo, $val) {
		foreach($pdo as $v) {
			$pdo = $v[$val];
		}
		return $pdo;
	}
	
	//выбираем функцию по нажатой кнопке
	public function action_index() {
		switch(true){
			case $_POST['btn-basket']:
				$this->toCount();
				break;
			case $_POST['prod']:
				$this->createUserTable();
				break;
			case $_POST['confirm']:
				$this->confimOrder();
				break;
			case $_POST['delete']:
				$this->deleteItem();
				break;
			default:
				$this->view->generate('basket_view.php', 'template_view.php', $data);
		}
	}
	//Возвращает уникальный идентификатор пользователю
	public function getUniqId() {
		if($_SESSION['auth'] != 0) {
			return 'userOrder_'.$_SESSION['auth'];
		} elseif(isset($_COOKIE['uniq_id'])) {
			return $_COOKIE['uniq_id'];
		} else {
			$uniq_id = uniqid(" ");
			$id = setcookie('uniq_id', $uniq_id, time()+60*60*24*30);
			return $id;
		}
	}
	//добавляет выбранный продукт в таблицу
	public function insert() {
		$pdo = $this->connect();
		$stmt = $pdo->prepare("SELECT name, price FROM menu_food WHERE id = ?");
		$stmt->execute(array($_POST['prod']));
			
		foreach($stmt as $val) {
			$pdo->query("INSERT INTO ".$this->getUniqId()."(name, price) VALUES('".$val['name']."', '".$val['price']."')");
		}
		echo "В корзине!";
	}
	
	
	//удаляет выбранный товар
	public function deleteItem() {
		$pdo = $this->connect();
		$pdo->query("DELETE FROM ".$this->getUniqId()." WHERE ID = ".$_POST['del']."");
		$this->toCount();
	}

	
	//выводит таблицу с покупками в корзину
	public function toCount() {
		$pdo = $this->connect();
		$stmt = $pdo->query("SELECT * FROM ".$this->getUniqId()."");
		
		if($stmt == NULL) {
			$data = '<div class="main-text-black align-center" style="margin:10% 0 10% 0;"><span >Вы еще ничего не выбрали</span></div>';
		} else {
			foreach($stmt as $v) {
				$str .= 
				'<tr>
					<td class="table">'.$v['name'].'</td>
					<td class="table">'.$v['price'].' руб.</td>
					<td class="table">
						<form action="/basket" method="post">
							<input type="hidden" value='.$v['id'].' name="del">
							<input class="btn-del" type="submit" name="delete" value=" X ">
						</form>
					</td>
				</tr>';
			}
			$stmt = $pdo->query("SELECT SUM(price) FROM ".$this->getUniqId().";");
			foreach($stmt as $v) {
				$price = $v['SUM(price)'];
			}
			$data = 
			'<form id="basket-form" action="basket" method="post">
			<div class="align-center">
				<div>
					<input class="textbox" name="name" type="text" placeholder="Имя">
				</div>
				<div>
					<input class="textbox" name="phone" type="text" placeholder="Телефон" id="phone">
				</div>
				<div>
					<textarea class="textbox" name="note" placeholder="Комментарий" cols="50" rows="5"></textarea>
				</div>
				<div style="margin:2% 0 2% 0">
					<table class="main-text-black-big table-main">'.$str.'
					
						<tr><td class="table">Ваш заказ на сумму:</td><td class="table">'.$price.' руб.</td></tr>
					</table>
					
				</div>
				<div>
					<input class="btn-confirm" name="confirm" type="submit" value="Оформить заказ">
				</div>
			</form>';
		}
		$this->view->generate('basket_view.php', 'template_view.php', $data);
	}
	//проверяет создана ли таблица с заказом, если да добавляет товар, если нет создает таблицу и добавляет товар
	public function createUserTable(){	
		$pdo = $this->connect();
		
		$pdo->query("CREATE TABLE IF NOT EXISTS ".$this->getUniqId()."(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), price int(20));");
		$this->insert();
	}
	//если нажата кнопка оформить добавляет заказ в общую таблицу orders удаляет временную таблицу
	public function confimOrder() {

		$pdo = $this->connect();
		//заказ
		$stmt = $pdo->query("SELECT * FROM ".$this->getUniqId()."");
		foreach($stmt as $v) {
			$order .= $v['name'].":".$v['price']."; ";
		}
		
		//общая сумма заказа
		$stmt = $pdo->query("SELECT SUM(price) FROM ".$this->getUniqId().";");
		foreach($stmt as $v) {
			$price = $v['SUM(price)'];
		}
		//добавляем все в общую таблицу
		$stmt = $pdo->prepare("INSERT INTO `tres_pizzas`.`orders` (`id_orders`, `order`, `price`, `name`, `phone`, `note`) VALUES (DEFAULT,:order, :price, :name, :phone, :note);");
		$stmt->execute(array(
			"order" => $order,
			"price" => $price,
			"name" => $_POST['name'],
			"phone" => $_POST['phone'],
			"note" => $_POST['note'],
		));

		$pdo->query("DROP TABLE ".$this->getUniqId().";");

		$data = '<div class="main-text-black-big align-center" style="margin:10% 0 10% 0;"><span >Спасибо за Ваш заказ!</span></div>';
		$this->view->generate('basket_view.php', 'template_view.php', $data);		
		
	}
}