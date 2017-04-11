<?php

class Vehicule
{
	private static $marque = 'Renault';
	private $couleur = 'noir';
	
	//Getters : 
	public function getMarque(){
		return self::$marque;
	}
	public function getCouleur(){
		return $this -> couleur;
	}
	
	//setters : 
	public function setMarque($arg){
		self::$marque = $arg;
	}
	public function setCouleur($arg){
		$this -> couleur = $arg;
	}
}
//--------
$v1 = new Vehicule;
echo 'La voiture 1 est de marque ' . $v1 -> getMarque() . ' et de couleur ' . $v1 -> getCouleur() . '<hr/>'; // Renault, noir

$v2 = new Vehicule;
echo 'La voiture 2 est de marque ' . $v2 -> getMarque() . ' et de couleur ' . $v2 -> getCouleur() . '<hr/>';// Renault, Noir

$v3 = new Vehicule;
$v3 -> setCouleur('rouge');
echo 'La voiture 3 est de marque ' . $v3 -> getMarque() . ' et de couleur ' . $v3 -> getCouleur() . '<hr/>';// Renault, rouge

$v4 = new Vehicule;
echo 'La voiture 4 est de marque ' . $v4 -> getMarque() . ' et de couleur ' . $v4 -> getCouleur() . '<hr/>';// Renault, Noir

$v5 = new Vehicule;
$v5 -> setMarque('Mercedes');
echo 'La voiture 5 est de marque ' . $v5 -> getMarque() . ' et de couleur ' . $v5 -> getCouleur() . '<hr/>'; // Mercedes, noir

$v6 = new Vehicule;
echo 'La voiture 6 est de marque ' . $v6 -> getMarque() . ' et de couleur ' . $v6 -> getCouleur() . '<hr/>';


