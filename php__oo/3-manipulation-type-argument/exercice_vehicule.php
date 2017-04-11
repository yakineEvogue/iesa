<?php
//dossier : 03-manipulation-type-argument
	//-> exercice_vehicule.php

class Vehicule
{
	private $litre;
	private $reservoir;
	
	//Setters : 
	public function setLitre($litre){
		$this -> litre = $litre;
	}
	public function setReservoir($reservoir){
		$this -> reservoir = $reservoir;
	}
	
	//getters : 
	public function getLitre(){
		return $this -> litre;
	}
	public function getReservoir(){
		return $this -> reservoir;
	}
}	

class Pompe
{
	private $litre;
	 
	public function setLitre($litre){
		$this -> litre = $litre;
	}

	public function getLitre(){
		return $this -> litre;
	}+
	public function fairePlein(Vehicule $v){
		$this -> setLitre($this -> getLitre() - ($v -> getReservoir() - $v -> getLitre()));
		//nlleValeurLitrePompe = 800 - (50 - 5) = 800 - 45 = 755
		
		$v -> setLitre($v -> getLitre() + ($v -> getReservoir() - $v -> getLitre()));
		//NlleValeurLitreVehicule = 5 + (50-5) = 5 + 45 = 50;	
	}
}
//---------------------
$vehicule1 = new Vehicule(); 
$vehicule1 -> setLitre(5);
$vehicule1 -> setReservoir(50);

echo 'La voiture possède ' . $vehicule1 -> getLitre() . ' litre(s) de carburant !';
echo '<hr/>';

$pompe = new Pompe();
$pompe -> setLitre(800); 
echo 'La pompe contient ' . $pompe -> getLitre() . ' litre(s) de carburant !';
echo '<hr/>';

$pompe -> fairePlein($vehicule1); 

echo '<hr/>';
echo 'Après ravitaillement : <br/>';
echo 'La voiture possède ' . $vehicule1 -> getLitre() . ' litre(s) de carburant !<br/>';
echo 'La pompe contient ' . $pompe -> getLitre() . ' litre(s) de carburant !';