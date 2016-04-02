<?php
	
class Model
{
	protected $db;
	protected $config;
	protected $rules;
	protected $validationMessages;
	protected $fillable;
	protected $data;
	protected $validator;
	protected $auth = array(
		'messages' => array()
	);

	function __construct()
	{
		try {
			$this->db = new PDO(DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST, DB_USERNAME, DB_PASSWORD);
			if(defined('DB_SCHEME')){
				$this->db->exec('SET search_path TO '.DB_SCHEME);
			}
		} catch (PDOException $err) {
			echo $err->getMessage();
            die("Database connection error");
        }
	}

	function fill($data){
		$this->data = $data;
		if(isset($this->config['autohash']) && $this->config['autohash']){
			$this->hashPassword();
		}
	}

	function validate(){
		$this->validator = new Validation();
		$rules = $this->rules;
		$data = $this->data;
		$validationMessages = $this->validationMessages;

		foreach ($this->fillable as $name) {
			if(isset($rules[$name])){
				$rulesList = explode(',', $rules[$name]);
				foreach ($rulesList as $rule) {
					if($rule == 'unique') {
						if($this->isExist($name, $data[$name])){
							$this->validator->addError($name.' must be unique');
						}
					} else {
						$this->validator->validate($rule, $data[$name], $validationMessages[$name]);
					}
				}
			}
		}

		$errors = $this->validator->getErrors();
		return empty($errors);
	}

	function getValidator(){
		return $this->validator;
	}

	function getAuth(){
		return $this->auth;
	}

	function hashPassword(){
		if(isset($this->data['password']) && !empty($this->data['password'])){
			$this->data['password'] = md5($this->data['password']);
		} 
		if(isset($this->data['re_password']) && !empty($this->data['password'])){
			$this->data['re_password'] = md5($this->data['re_password']);
		} 
	}

	function authenticate(){
		$data = $this->data;
		$username = $data['username'];
		$password = $data['password'];
		if(!$this->isExist('username', $username)){
			array_push($this->auth['messages'], "Username doesn't exist");
			return false;
		}
		if(!$this->isMatch('username','password')){
			array_push($this->auth['messages'], "Username and password doesn't match");
			return false;
		}
		return true;
	}

	function isMatch($name1, $name2){
		$config = $this->config;
		$data = $this->data;
		$dbh = $this->db;
		try {
			$sth = $dbh->prepare('SELECT * FROM '.$config['table'].' WHERE '.$name1.'=? AND '.$name2.'=?');
			$sth->execute(array($data[$name1],$data[$name2]));
		} catch (Exception $e) {
			return false;
		}
		if ( $sth->rowCount() > 0 ) {
		  	return true;
		}
		return false;
	}

	function isExist($name, $data){
		$config = $this->config;
		$dbh = $this->db;
		try {
			$sth = $dbh->prepare('SELECT '.$name.' FROM '.$config['table'].' WHERE '.$name.'=? LIMIT 1');
			$sth->execute(array($data));
		} catch (Exception $e) {
			return false;
		}
		if ( $sth->rowCount() > 0 ) {
		  	return true;
		}
		return false;
	}

	function add(){
		$keys = implode(',', $this->fillable);
		$values = ':'.implode(',:', $this->fillable);
		$query = "INSERT INTO ".$this->config['table']." (".$keys.") values (".$values.")";
		$dbh = $this->db;
		$fillableData = $this->getFillableData();
		try {
			$sth = $dbh->prepare($query);
			$sth->execute($fillableData);
		} catch (Exception $e) {
			return false;
		}
		return true;
	}

	function getFillableData(){
		$data = $this->data;
		$fillableData = array();

		foreach ($this->fillable as $i) {
			$fillableData[$i] = $data[$i];
		}

		return $fillableData;
	}

	function save(){

	}
}

?>