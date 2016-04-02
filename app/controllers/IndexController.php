<?php

class IndexController extends Controller
{
	public static function getIndex(){
		self::initialize();
		View::make('index');
	}

	public static function getLogout(){
		self::initialize();
		Auth::logout();
		Route::redirect('index.php?page=login');
	}
}

?>