<?php
//app/
	//Config.php

class Config
{
	protected $parameters;

	public function __construct(){
		require __DIR__ . '/Config/parameters.php';
		$this -> parameters = $parameters;
	}

	public function getParametersConnect(){
		return $this -> parameters['connect'];
	}
}
//-------------------
//$config = new Config;
//var_dump($config -> getParametersConnect());
