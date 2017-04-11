<?php

abstract class Joueur
{
	public function seConnecter(){
		return $this -> etreMajeur();
	}

	abstract public function etreMajeur(); 
	abstract public function devise(); 
	// les fonctions abstraites n'ont pas de contenu.
}
//-----------
class JoueurFr extends Joueur
{

	public function etreMajeur(){
		return 18; 
	}

	public function devise(){
		return '€';
	}

}
//-----------
class JoueurUs extends Joueur
{
	public function etreMajeur(){
		return 21; 
	}

	public function devise(){
		return '$';
	}
}
/*
- Une classe abstraite n'est pas instanciable. 
- Les méthodes abstraites n'ont pas de contenu. 
- Lorsqu'une classe hérite d'une méthode abstraite, elle est OBLIGEE de la redéfinir. 
- Pour créer une méthode abstraite, la classe doit OBLIGATOIREMENT être abstraite (ex: abstract class Joueur{})
- Un classe abstraite peut également contenir des méthodes normales. 

Le développeur qui écrit les classes abstraites est au coeur de l'application. Il va obliger les autres développeurs à redéfinir des méthodes (ex: etreMajeur). Ce sont des bonnes contraintes !!! 
*/
