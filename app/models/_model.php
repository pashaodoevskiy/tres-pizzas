<?php

include 'app/connect.php';

class Model_ extends Model {
	
	public function get_data() {
		
		$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
		$stmt = $pdo->query("SELECT * FROM menu_main");

		$menu = [];
		
		foreach($stmt as $row) {
			$menu += array($row['link'] => '<a href="'.$row['link'].'"><img class="menu-img '.$row['link'].'-img" src="'.$row['img'].'" alt="" title=""></a>');
		}
		return $menu;
	}
}