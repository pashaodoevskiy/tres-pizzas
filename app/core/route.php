<?php

class Route {
	
	static function start() {

		$url = explode('/', strtolower($_SERVER['REQUEST_URI']));
		$controller_name = $url[1];
		
		//меняем имя модели на menu_model
		if($controller_name == 'pizza' or $controller_name == 'promo' or $controller_name == 'drink') {
			$model_name = 'menu';
		} else {
			$model_name = $controller_name;
		}
		if($url[2]) {
			$controller_name = $url[2];
		}
		//app/controllers/_controller.php
		$controller_path = 'app/controllers/'.$controller_name.'_controller.php';
		//app/controllers/_model.php
		$model_path = 'app/models/'.$model_name.'_model.php';

		if(file_exists($controller_path)) {
			include $controller_path;
		}
		if(file_exists($model_path)) {
			include $model_path;
		}
		
		//new Controller_insert
		$controller_class = 'Controller_'.$controller_name;
		$controller = new $controller_class;
		$action = 'action_index';
		//запускаем функцию action_index()
		if(method_exists($controller, $action)) {
			$controller->$action();
		}
	}
}