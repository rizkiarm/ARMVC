<?php
class Validation
{
	private $errors = Array();

	private $regexes = Array(
		'name' => "/^\pL[\pL '-]*\z/",
		'phone' => "/^[\+|\(|\)|\d|\- ]*$/",
		'email' => "/^\S+@\S+\.\S+$/",
		'not_empty' => "/\S/"
    );

	public function match( $method, $data ){
        $regexes = $this->regexes;
		return preg_match($regexes[$method], $data);
	}

    public function validate( $method, $data, $message ){
    	if(!$this->match($method,$data)){ 
            $this->addError( $message );
        }
    }

    public function addError( $message ){
    	array_push($this->errors, $message);
    }

    public function getErrors(){
    	return $this->errors;
    }
}
?>