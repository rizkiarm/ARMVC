<?php

class View
{
	private static $initialized = false;
	private static $view;

	private static function initialize()
	{
    	if (self::$initialized){
    		return;
    	}

    	self::$view = new ViewHelper();

    	self::$initialized = true;
    }

	public static function make($view_name, $view_data = null){
		self::initialize();
		return self::$view->make(array(
			'name' => $view_name, 
			'data' => $view_data
		));
	}
}

?>