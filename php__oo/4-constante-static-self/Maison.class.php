<?php

//Dossier : 04-constante-static-self
	// -> Maison.class.php
	
class Maison
{
	public $couleur = 'blanc'; // Appartient � l'objet
	public static $espaceTerrain = '500m2'; // Appartient � la classe
	private static $nbPiece = 7; // Appartient � la classe
	private $nbPorte = 10; // Appartient � l'objet
	const HAUTEUR = '10m'; // Appartient � la classe
	
	
	public static function getNbPiece(){
		return self::$nbPiece;
	}
	
	public function getNbPorte(){
		return $this -> nbPorte;
	}
}
//-------------
echo Maisson::getNbPiece() . '<br/>'; // OK, j'acc�de � un �l�ment private via un getter, et puisque le getter est static j'y acc�de via la classe. 
echo Maison::$espaceTerrain . '<br/>';
//echo Maison::$nbPiece; //ERREUR ! Je ne peux pas acc�der � une propri�t� private en dehors de la classe !
echo Maison::HAUTEUR; // OK ! Je peux acc�der � une constante via la classe !
//-------------- Instanciation
$maison = new Maison;

echo $maison -> getNbPorte() . '<br/>'; // OK je peux acc�der � une propri�t� private via un getter qui appartient � l'objet. 
echo $maison -> couleur . '<br/>'; // OK je peux acc�der � une propri�t� de mon objet par mon objet. 
//echo $maison -> espaceTerrain . '<br/>'; // ERREUR ! Je ne peux pas acc�der � la propri�t� de la class par mon objet. 
//echo $maison -> nbPiece; // ERREUR : Je ne peux pas acc�der � une propri�t� private en dehors de la classe. En plus elle appartient � la classe (static).


/*
Op�rateurs: 
	$objet -> = Element d'un objet � l'ext�rieur de la classe
	$this -> = Element d'un objet � l'int�rieur de la classe
	Class::  = Element de la classe � l'ext�rieur de la classe
	self::  = Element de la classe � l'int�rieur de la classe

2 questions � se poser : 
	Est-ce c'est static ?
		Oui : 
			- Est-ce c'est dans la classe ?
				Oui : self::
				NOn : Class::

		Non : 
			- Est-ce c'est dans la classe ?
				oui : $this ->
				non : $objet ->

'Static' indique qu'un �l�ment appartient � la classe (ex : nbre de roues d'une voiture). La propri�t� est variable. 
'const' indique qu'un �lement appartient � la classe, et il n'est pas variable. 



*/


