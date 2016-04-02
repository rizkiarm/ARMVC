<?php
	
class Auth
{
	private static $initialized = false;
	private static $loggedin = false;
	private static $user;

	public static function initialize()
	{
    	if (self::$initialized){
    		return;
    	}
    	self::$initialized = true;

    	if(isset($_SESSION['auth'])){
    		$auth = $_SESSION['auth'];
    		if(!empty($auth['username'])){
    			self::$loggedin = true;
    			self::$user = $auth['username'];
    		}
    	}
    }

    public static function isLoggedIn(){
    	self::initialize();
    	return self::$loggedin;
    }

    public static function getUser(){
    	self::initialize();
    	return self::$user;
    }

    public static function logout(){
    	self::initialize();
    	self::$loggedin = false;
    	self::$user = '';
    	unset($_SESSION['auth']);
    }

    public static function login($username){
    	self::initialize();
    	self::$loggedin = true;
    	self::$user = $username;

    	$_SESSION['auth'] = array(
    		'username' => $username
    	);
    }
}

?>