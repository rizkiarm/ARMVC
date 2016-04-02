<?php

class RouteHelper
{
	public $get;
	public $post;
	public $data;

	public $notfound = true;
	private $filter = true;

	function __construct()
	{
		$this->get = array();
		$this->post = array();

		foreach ($_GET as $key => $value) {
			$this->get[$key] = htmlspecialchars($value);
		}
		foreach ($_POST as $key => $value) {
			$this->post[$key] = htmlspecialchars($value);
		}
	}

	function get($string, $callback){
		if(!isset($this->get['page']) || $this->post){
			return;
		}
		$this->data = $this->get;
		if($this->get['page'] == $string){
			$this->notfound = false;
			if(is_bool($this->filter) && !$this->filter){
				return;
			}
			$callback();
		}
	}

	function post($string, $callback){
		if(!isset($this->get['page']) || !$this->post){
			return;
		}
		$this->data = $this->post;
		if($this->get['page'] == $string){
			$this->notfound = false;
			if(is_bool($this->filter) && !$this->filter){
				return;
			}
			$callback();
		}
	}

	function filter($method, $string, $filter){
		$data = $this->$method;
		if(!isset($data['page'])){
			return;
		}
		if($data['page'] == $string){
			$this->filter = $filter();

			if(is_null($this->filter)){
				return;
			} else if(!is_bool($this->filter)){
				if(is_string($this->filter)){
					echo($this->filter);
				} else {
					$this->filter();
				}
			}
		}
	}
}

?>