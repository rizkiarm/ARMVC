<?php
	
class Controller
{
	private static $initialized = false;

	public static function initialize()
	{
    	if (self::$initialized){
    		return;
    	}
    	self::$initialized = true;
    }
}

?>