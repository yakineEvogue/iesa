<?php

//Dossier : 06-surcharge-abstraction-interface-finalisation-trait
	//-> surchage.php
	
// Surcharge : Ou override permet de modifier le comportement initialement pr�vu d'une m�thode h�rit�e. On y apporte des traitements SUPPLEMENTAIRES
// Surchage != red�finition

class A
{
	public function calcul(){
		return 10;
	}
}
//---
class B extends A
{
	
	public function calcul(){
		
		return parent::calcul() + 5;
		// Tu r�cup�res le fonctionnement pr�vu dans la classe parente et tu ajoutes des traitements.
		
		//$this -> calcul() + 5; => Pas bon, cela provequerait un comprotement recursif ! 
	}
}