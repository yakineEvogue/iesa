<?php
//Dossier : 5-heritage
	// -> exemple_heritage.php	
class Membre
{
	public $pseudo;
	public $id;
	public $mdp;
	//...
	
	public function inscription(){
		//traitements..
		return 'Je m\'inscris<hr/>';
	}
	
	public function seConnecter(){
		// traitements...
		return 'Je me connecte<hr/>';
	}
}
//-----------

class Admin extends Membre // extends = héritage ! 
{
	//C'est comme si tout le code de la classe membre était copié/collé ici !
	public function accesBackOffice(){
		return 'Accès backOffice';
	}
}
//-----
$admin = new Admin; 

echo $admin -> inscription() . '<br/>';
echo $admin -> seConnecter() . '<br/>';

/*
	L'héritage est l'un des fondement de la POO
	Dans notre exemple, dans le site, un admin est avant tout un mùembre avec quelques droits en plus. 
	Lors d'un héritage on hérite de tout, même des de ce qui est private, egalement de la fonction Construct(). 
	
	public : accessible de partout
	protected : accessible depuis la classe mere + les classes héritieres
	private : accessible UNIQUEMENT depuis la classe où cela a été déclaré.
*/



