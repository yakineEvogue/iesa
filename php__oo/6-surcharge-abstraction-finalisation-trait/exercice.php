<?php

abstract class Vehicule // Pas d'instance possible
{
	final public function demarrer(){ // pas de surcharge ni redéfinition possible
		return 'Je démarre !';
	}

	abstract public function carburant();

	public function NbreTest(){
		return 100;
	}
}
//------
class Peugeot extends Vehicule
{
	public function carburant(){
		return 'Essence';
	}

	public function NbreTest(){
		return parent::NbreTest() + 70; // Surcharge : On récupère le comportement de la fonction parrente, et on la modifie.
	}
}
//------
class Renault extends Vehicule
{
	public function carburant(){
		return 'Diesel';
	}

	public function NbreTest(){
		return parent::NbreTest() + 30;
	}

}

//----
$r = new Renault;
echo $r -> demarrer() . '<br/>';
echo $r -> carburant() . '<br/>';
echo $r -> nbreTest() . '<br/>';

$p = new Peugeot;
echo $p -> demarrer() . '<br/>';
echo $p -> carburant() . '<br/>';
echo $p -> nbreTest() . '<br/>';