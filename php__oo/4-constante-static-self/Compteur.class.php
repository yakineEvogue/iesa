<?php

class Compteur
{
	public static $nbInstanceClass = 0;
	public $nbInstanceObjet = 0;
	
	public function __construct(){
		self::$nbInstanceClass ++;
		$this -> nbInstanceObjet ++;
	}	
}
//-------------------
$c1 = new Compteur; //NbInstanceClass = 1  //nbInstanceObjet = 1
$c2 = new Compteur; //NbInstanceClass = 2  //nbInstanceObjet = 1
$c3 = new Compteur; //NbInstanceClass = 3  //nbInstanceObjet = 1
$c4 = new Compteur; //NbInstanceClass = 4  //nbInstanceObjet = 1
$c5 = new Compteur; //NbInstanceClass = 5  //nbInstanceObjet = 1

echo 'Nombre de fois que la classe a été instanciée : ' . Compteur::$nbInstanceClass . '<br/>';
echo 'Nombre de fois que l\'objet a été instancié : ' . $c5 -> nbInstanceObjet . '<br/>';



