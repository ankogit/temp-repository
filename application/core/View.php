<?php

namespace App\Core;
use App\Core\View;
use Twig_Loader_Filesystem;
use Twig_Environment;


class View{

	public $path;
	public $route;
	public $layout = 'default';
	
	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';


		$name ='Main';
		$name = 'application\models\\'.ucfirst($name);
		$this->func = new $name;
		$footer = $this->func->getFooter();


		if (file_exists($path)) {
			/*как было*/
			//ob_start();
			//require $path;
			//$content = ob_get_clean();
			//require 'application/views/layouts/'.$this->layout.'.php';

			/*как надо*/
			$loader = new Twig_Loader_Filesystem('application/views/layouts/');
			$twig = new Twig_Environment($loader);
			$template = $twig->loadTemplate($this->path.'.php');
			$template->display($vars);
		}
	}

	public function redirect($url) {
		header('location: '.$url);
		exit;
	}

	public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

}