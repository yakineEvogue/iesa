<?php

//Dossier : 04-constante-static-self
	// -> Maison.class.php
	
class Maison
{
	public $couleur = 'blanc'; // Appartient à l'objet
	public static $espaceTerrain = '500m2'; // Appartient à la classe
	private static $nbPiece = 7; // Appartient à la classe
	private $nbPorte = 10; // Appartient à l'objet
	const HAUTEUR = '10m'; // Appartient à la classe
	
	
	public static function getNbPiece(){
		return self::$nbPiece;
	}
	
	public function getNbPorte(){
		return $this -> nbPorte;
	}
}
//-------------
echo Maisson::getNbPiece() . '<br/>'; // OK, j'accède à un élément private via un getter, et puisque le getter est static j'y accède via la classe. 
echo Maison::$espaceTerrain . '<br/>';
//echo Maison::$nbPiece; //ERREUR ! Je ne peux pas accéder à une propriété private en dehors de la classe !
echo Maison::HAUTEUR; // OK ! Je peux accéder à une constante via la classe !
//-------------- Instanciation
$maison = new Maison;

echo $maison -> getNbPorte() . '<br/>'; // OK je peux accéder à une propriété private via un getter qui appartient à l'objet. 
echo $maison -> couleur . '<br/>'; // OK je peux accéder à une propriété de mon objet par mon objet. 
//echo $maison -> espaceTerrain . '<br/>'; // ERREUR ! Je ne peux pas accéder à la propriété de la class par mon objet. 
//echo $maison -> nbPiece; // ERREUR : Je ne peux pas accéder à une propriété private en dehors de la classe. En plus elle appartient à la classe (static).


/*
Opérateurs: 
	$objet -> = Element d'un objet à l'extérieur de la classe
	$this -> = Element d'un objet à l'intérieur de la classe
	Class::  = Element de la classe à l'extérieur de la classe
	self::  = Element de la classe à l'intérieur de la classe

2 questions à se poser : 
	Est-ce c'est static ?
		Oui : 
			- Est-ce c'est dans la classe ?
				Oui : self::
				NOn : Class::

		Non : 
			- Est-ce c'est dans la classe ?
				oui : $this ->
				non : $objet ->

'Static' indique qu'un élément appartient à la classe (ex : nbre de roues d'une voiture). La propriété est variable. 
'const' indique qu'un élement appartient à la classe, et il n'est pas variable. 



*/


