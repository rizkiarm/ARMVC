<?php

class UserAuthModel extends Model
{
	protected $config = array(
		'table' => 'users',
		'autohash' => true
	);
	protected $rules = array(
		'username' => 'not_empty',
		'password' => 'not_empty'
	);
	protected $validationMessages = array(
		'username' => "Username musn't be empty",
		'password' => "Password musn't be empty"
	);
	protected $fillable = array('username', 'password');

	public function validate(){
		parent::validate();

		$data = $this->data;
		$errors = $this->validator->getErrors();

		if(empty($errors)){
			return true;
		} 
		return false;
	}
}

?>