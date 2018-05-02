<?php

include 'app/connect.php';

class Model_menu extends Model {

	public function get_data() {
		
		$url = explode('/', strtolower($_SERVER['REQUEST_URI']));
		$category = $url[1];
		
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		
		$stmt = $pdo->prepare('SELECT * FROM menu_food WHERE category = ?');
		$stmt->execute(array($category));
		
		$menu = [];
		
		foreach($stmt as $row) {
			$id = "'btn-buy_".$row['id']."'";
			$menu += [$row['id'] => 
			'<div class = "menu">
				<div style="text-align:center;">
					<img class="product-img" src="../../img/'.$row['category'].'/'.$row['id'].'.jpg" alt="" title="'.$row['name'].'">
					<div class="menu_desc">
						<p class="main-text-black">'.$row['name'].'</p>
						<p class="main-text-black">'.$row['price'].'&nbsp<i class="fas fa-ruble-sign fa-xs"></i></p>
					</div>
				</div>
				<span class="btn-get-product">
					<input type="hidden" id="btn-buy_'.$row['id'].'" name="prod" value="'.$row['id'].'">
					<input class="unact" type="submit onclick="updateFile(document.getElementById('.$id.'));" type="button" id="btn" value="Хочу!">
					<input class="act" type="submit" onclick="updateFile(document.getElementById('.$id.'));" type="button" id="btn" value="+">
				</span>
			</div>'];
		}
		return $menu;
	}
}