<?php

class LoginController extends Controller
{
	public static function getIndex(){
		self::initialize();
		View::make('auth/login');
	}

	public static function postLogin(){
		self::initialize();

		$data = Route::data();

		$user = new UserAuthModel();
		$user->fill($data);

		if($user->validate()){
			if($user->authenticate()){
				Auth::login($data['username']);
				Route::redirect('index.php');
			} else {
				$user_auth = $user->getAuth();
				$_SESSION['messages'] = $user_auth['messages'];
				Route::redirect('index.php?page=login');
			}
		} else {
			$_SESSION['messages'] = $user->getValidator()->getErrors();
			Route::redirect('index.php?page=login');
		}
		
	}
}

?>