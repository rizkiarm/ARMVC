<?php

Route::filter('get', 'index', function(){
	if(!Auth::isLoggedIn()) Route::redirect('index.php?page=login');
});
Route::get('index', function(){
	IndexController::getIndex();
});

Route::filter('get', 'login', function(){
	if(Auth::isLoggedIn()) Route::redirect('index.php?page=index');
});
Route::get('login', function(){
	LoginController::getIndex();
});
Route::post('login', function(){
	LoginController::postLogin();
});

Route::filter('get', 'register', function(){
	if(Auth::isLoggedIn()) Route::redirect('index.php?page=index');
});
Route::get('register', function(){
	RegistrationController::getIndex();
});
Route::post('register', function(){
	RegistrationController::postRegister();
});

Route::get('logout', function(){
	IndexController::getLogout();
});

Route::notfound(function(){
	View::make('404');
});

?>