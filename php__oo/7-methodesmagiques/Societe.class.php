<?php
//7-methodesmagiques
	// -> Societe.class.php

// Les méthodes magiques sont des méthodes qui s'execute automatiquement

class Societe
{
	public $adresse;
	public $ville;
	public $cp;

	public function __construct(){}

	public function __set($nom, $valeur){ // La fonction magique __set() permet d'executer du code lorsqu'on souhait affecté une valeur à une propriété qui n'existe pas. 
		echo 'La propriété <b>' . $nom . '</b> n\'existe pas. La valeur  <b>'. $valeur . '</b> n\'a donc pas été affectée !';
	}

	public function __get($nom){ // La fonction magique __get() s'execute automatiquement lorsqu'on souhaite récupérer la valeur d'une propriété qui n'existe pas. 
		echo 'La propriété <b>' . $nom . '</b> n\'existe pas !';
	}

	public function __call($nom, $arguments){ // S'exécute quand on appelle une méthode qui n'existe pas. 
		echo 'La méthode ' . $nom . ' n\existe pas. Les arguments étaient : ' . implode($arguments, '-');
	}

	/*Voici d'autre méthodes magiques : 
	- callStatic() : méthodes static qui n'existe pas
	- destruct() : Se lance à la fin du script
	- toString() : Se lance lorsqu'on fait un echo d'un objet
	- Autres : wakeup(), sleep(), invoke(), clone()...
	*/
}
//----------------------------
$s = new Societe;
$s -> pays = 'France';
echo '<br/>';
echo $s -> telephone;
$s -> maFonction('argument1', 'argument2');