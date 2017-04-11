<?php
//7-methodesmagiques
	// -> clone.php

class Ecole
{
	public $nom = 'IESA';
	public $cp = '75002';

	public function __clone(){ // La méthode s'exécute lorsque qu'un clone est effectué. Et si cette apporte des modifications, ces modifications seront exécuté sur le clone et non le modèle. 
		$this -> cp = '75011';
	}
}
//------------
$ecole1 = new Ecole;

$ecole2 = $ecole1; // transmission de référence ! $ecole2 pointe sur le même objet que $ecole1

$ecole1 -> cp = '75001';
var_dump($ecole2);
var_dump($ecole1);
// Les deux affichent 75001, car il s'agit du même objet. 


$ecole3 = clone $ecole1; // Il ne s'agit pas du même objet, il s'agit d'un objet identique... Sauf si __clone() précise queque chose !! 
var_dump($ecole1);
var_dump($ecole3);
