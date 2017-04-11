<?php

//vendor
	//Manager
		// -> PDOManager.php
		
namespace Manager; 
use PDO; 

class PDOManager
{
	private static $instance = NULL; 
	protected $pdo; 
	
	private function __construct(){} // La classe devient non-instanciable. 
	private function __clone(){} // La classe ne peut être clonée. 
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance; 
	}
	
	public function getPdo(){
		include_once(__DIR__ . '/../../app/Config.php'); 
		$config = new \Config;
		$connect = $config -> getParametersConnect();
		
		try{
			$this -> pdo = new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'], array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			));
		}
		catch(PDOException $e){
			echo '<div style="color: white; background: red; padding: 10px;">';
			echo 'Connexion échouée : ' . $e -> getMessage() . '<br/>';
			echo 'Fichier : ' . $e -> getFile() . '<br/>';
			echo 'Ligne : ' . $e -> getLine() . '<br/>';
			echo '</div>';
		}	
		return $this -> pdo;
	}
}
//------------------
//En procédural : 
//$pdo = new PDO('eazeazzaeaz');

//Avec notre mini-framework on fait : 
//$pdo = PDOManager::getInstance() -> getPdo();



