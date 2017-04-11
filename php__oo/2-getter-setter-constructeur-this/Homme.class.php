<?php

//Dossier : 02-getter-setter-constructeur-this
	// -> Homme.class.php

class Homme
{
	private $prenom;
	private $nom;
	
	public function setPrenom($arg){
		if(is_string($arg)){
			if(strlen($arg) > 3 && strlen($arg) < 25){
				$this -> prenom = $arg;
			}
		}
	}
	public function getPrenom(){
		return $this -> prenom; 
	}
	//--
	public function setNom($arg){
		$this -> nom = $arg;
	}
	public function getNom(){
		return $this -> nom; 
	}
}

//--------
$homme = new Homme; 
$homme -> setPrenom('Yakine');
echo $homme -> getPrenom();
echo $homme -> pseudo;

$homme -> setNom('Hamida');
echo $homme -> getNom();

/* 
Pourquoi faire des getter et des setters :
	- Le PHP �tant un langage qui ne type pas ses variables, nous devons constamment faire de nombreuses v�rifications sur l'int�grit� des variables que nous utilisons. 
	Imposer l'utilisation d'en setter est une bonne pratique pour contr�ler l'int�grit� des donn�es. 
	
$this -> : Repr�sente l'objet en cours... C'est � dire l'objet qui execute la m�thode.	
	





*/