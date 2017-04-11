<?php

//Dossier : 04-constante-static-self
	// -> Singleton.class.php
	
	
// Un design Pattern, est une r�ponse � un probl�me rencontr� par plusieurs d�veloppeur ! 
// Singleton, c'est la r�ponse � la question : COmment faire pour une cr�er une classe qui ne produiera qu'UN SEUL obejt (une seule et unique instance). 
	
	
class Singleton
{
	private static $instance = NULL;
	
	private function __construct(){} // La classe n'est pas instanciable; 
	private function __clone(){} //L'objet ne sera pas clonable.
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Singleton;
		}
		return self::$instance;
	}
}
//--------
//$s = new Singleton;  // ERREUR, la fonction construct() est private donc non accessible hors de la classe.

$objet1 = Singleton::getInstance();
$objet2 = Singleton::getInstance();

var_dump($objet1);
var_dump($objet2);

