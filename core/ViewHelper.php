<?php

class ViewHelper
{
	private $config = array(
		'path' => './app/views/', 
		'ext' => '.php'
	);

	public function make($view){
		$path = $this->config['path'];
		$ext = $this->config['ext'];
		require($path.$view['name'].$ext);
	}
}

?>