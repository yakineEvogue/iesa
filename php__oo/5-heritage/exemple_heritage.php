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

class Admin extends Membre // extends = h�ritage ! 
{
	//C'est comme si tout le code de la classe membre �tait copi�/coll� ici !
	public function accesBackOffice(){
		return 'Acc�s backOffice';
	}
}
//-----
$admin = new Admin; 

echo $admin -> inscription() . '<br/>';
echo $admin -> seConnecter() . '<br/>';

/*
	L'h�ritage est l'un des fondement de la POO
	Dans notre exemple, dans le site, un admin est avant tout un m�embre avec quelques droits en plus. 
	Lors d'un h�ritage on h�rite de tout, m�me des de ce qui est private, egalement de la fonction Construct(). 
	
	public : accessible de partout
	protected : accessible depuis la classe mere + les classes h�ritieres
	private : accessible UNIQUEMENT depuis la classe o� cela a �t� d�clar�.
*/



