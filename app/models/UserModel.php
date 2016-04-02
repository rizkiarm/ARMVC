<?php

class UserModel extends Model
{
	protected $config = array(
		'table' => 'users',
		'autohash' => true
	);
	protected $rules = array(
		'username' => 'not_empty,unique',
		'password' => 'not_empty',
		'email' => 'email,unique'
	);
	protected $validationMessages = array(
		'username' => "Username musn't be empty",
		'password' => "Password musn't be empty",
		'email' => "Email isn't valid"
	);
	protected $fillable = array('username', 'password', 'email');

	public function validate(){
		parent::validate();

		$data = $this->data;

		if($data['password'] != $data['re_password']){
			$this->validator->addError("Password doesn't match");
		}

		$errors = $this->validator->getErrors();

		if(empty($errors)){
			return true;
		} 
		return false;
	}
}

?>