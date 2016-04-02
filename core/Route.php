<?php

class Route
{
	private static $initialized = false;
	private static $route;

	private static function initialize()
	{
    	if (self::$initialized){
    		return;
    	}

    	self::$route = new RouteHelper();

    	self::$initialized = true;
    }

	public static function get($string, $callback){
		self::initialize();
		return self::$route->get($string, $callback);
	}

	public static function post($string, $callback){
		self::initialize();
		return self::$route->post($string, $callback);
	}

	public static function filter($method, $string, $callback){
		self::initialize();
		return self::$route->filter($method, $string, $callback);
	}

	public static function data(){
		self::initialize();
		return self::$route->data;
	}

	public static function notfound($callback){
		self::initialize();
		$data = self::data();
		if(self::$route->notfound && empty($data)) self::redirect('index.php?page=index');
		else if(self::$route->notfound) $callback();
	}

	public static function redirect($url){
		header('Location: '.$url);
		die();
	}
}

?>