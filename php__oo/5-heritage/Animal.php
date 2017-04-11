<?php
//Dossier : 5-heritage
	// -> Animal.php

class Animal
{
	protected function deplacement(){
		return 'Je me déplace !';
	}
	
	public function manger(){
		return 'Je mange';
	}
}
//----------
class Elephant extends Animal
{
	public function quiSuisJe(){
		return 'Je suis un Elephant et ' . $this -> deplacement();
		// Je peux utiliser la fonction déplacement car elle est protected dans la classe mère. 
	}
}
//----------
class Chat extends Animal
{
	
	public function quiSuisJe(){
		return 'Je suis un chat !';
	}
	
	public function manger(){ // redéfinition de méthode !
		return 'Je mange pas beaucoup';
	}
}
//--------
$chat = new Chat;
echo $chat -> manger(); // 'Je mange pas beaucoup' et non pas 'Je mange' car la fonction a été redéfinie.

$eleph = new Elephant;
echo $eleph -> manger(); 
//echo $eleph -> deplacement(); // ERREUR : La fonction est accessible à l'interieur de la classe et des classes filles, mais pas à l'exterieur (protected).


