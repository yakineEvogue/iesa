<?php
//Dossier : 5-heritage
	// -> instance_sans_heritage.php

class A
{
	public function bonjour(){
		return 'Bonjour !';
	}
}

class B // pas d'héritage de A !!! 
{
	public $maVariable;
	
	public function __construct(){
		$this -> maVariable = new A;
	}
}
//-------
$b = new B; 
echo $b -> maVariable -> bonjour();

/*
Nous avons un objet A dans un objet B, et le tout sans héritage
*/
