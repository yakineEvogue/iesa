<?php
//Dossier : 5-heritage
	// -> Animal.php

class Animal
{
	protected function deplacement(){
		return 'Je me d�place !';
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
		// Je peux utiliser la fonction d�placement car elle est protected dans la classe m�re. 
	}
}
//----------
class Chat extends Animal
{
	
	public function quiSuisJe(){
		return 'Je suis un chat !';
	}
	
	public function manger(){ // red�finition de m�thode !
		return 'Je mange pas beaucoup';
	}
}
//--------
$chat = new Chat;
echo $chat -> manger(); // 'Je mange pas beaucoup' et non pas 'Je mange' car la fonction a �t� red�finie.

$eleph = new Elephant;
echo $eleph -> manger(); 
//echo $eleph -> deplacement(); // ERREUR : La fonction est accessible � l'interieur de la classe et des classes filles, mais pas � l'exterieur (protected).


