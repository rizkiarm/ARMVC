<?php

class RegistrationController extends Controller
{
	public static function getIndex(){
		self::initialize();
		View::make('auth/register');
	}

	public static function postRegister(){
		self::initialize();

		$data = Route::data();
		
		$user = new UserModel();
		$user->fill($data);

		if($user->validate() && $user->add()){
			$_SESSION['messages'] = $user->getValidator()->getErrors();
			Route::redirect('index.php?page=login');
		} else {
			$_SESSION['messages'] = $user->getValidator()->getErrors();
			Route::redirect('index.php?page=register');
		}
	}
}

?>