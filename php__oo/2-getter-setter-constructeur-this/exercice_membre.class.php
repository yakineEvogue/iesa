<?php
//Dossier : 02-getter-setter-constructeur-this
	// -> Exercice_membre.class.php

// Au regard de la classe ci-dessous veuillez créer un objet et renseigner son pseudo et son MDP puis les afficher : 
	
class Membre
{
	private $pseudo;
	private $mdp;
	
	public function setPseudo($pseudo){
		$this -> pseudo = $pseudo;
	}
	
	public function getPseudo(){
		return $this -> pseudo;
	}
	
	public function setMdp($mdp){
		$this -> mdp = md5($mdp);
	}
	
	public function getMdp(){
		return $this -> mdp;
	}
}
//----
$membre = new Membre(); 
$membre -> setPseudo('yakine');
$membre -> setMdp('123456');

echo 'Pseudo : ' . $membre -> getPseudo() .'<br/>';
echo 'Mot de passe : ' . $membre -> getMdp() .'<br/>';

