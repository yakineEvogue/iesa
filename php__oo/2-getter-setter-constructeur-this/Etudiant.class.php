<?php
//Dossier : 02-getter-setter-constructeur-this
	// -> Etudiant.class.php
	
class Etudiant
{
	private $prenom;
	
	public function __construct($arg){ // La fonction magique __construct() nous permet d'effectuer une action au moment de l'instanciation.
		$this -> setPrenom($arg);
	}
	
	public function setPrenom($prenom){
		$this -> prenom = $prenom;
	}
	
	public function getPrenom(){
		return $this -> prenom;
	}
}
//----------
$etudiant = new Etudiant('Yakine');
// Exercice : Sans modifier l'exterieur de la classe, essayer de renseigner la propriété prénom de notre objet $etudiant...
echo $etudiant -> getPrenom();

/*
	__construct() est fonction magique, qui nous permet d'effectuer des actions lors de la création d'un objet. Elle reçoit en argument, les arguments dans la parenthèse lors de l'instanciation. 
	
	Ceci est pratique pour déployer un site (objet qui vont créer des objet), et notamment dans l'instance sans héritage. 
	
*/





