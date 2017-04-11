<?php

//vendor/
	//Entity/
		//-> Commande.php
		
namespace Entity; 

class Commande{
	protected $id_commande;
	protected $id_membre;
	protected $montant;
	protected $date_enregistrement;
	
	/**
	* GETTERS
	*/
	
	public function getId_Commande(){
		return $this -> id_commande;
	}
	
	public function getId_membre(){
		return $this -> id_membre;
	}
	
	public function getMontant(){
		return $this -> montant;
	}
	
	public function getDate_enregistrement(){
		return $this -> nom;
	}
	
	
	/**
	* SETTERS
	*/
	public function setId_commande($id){
		$this -> id_commande = $id;
	}
	
	public function setId_membre($id_membre){
		$this -> id_membre = $id_membre;
	}
	
	public function setMontant($montant){
		$this -> montant = $montant;
	}
	
	public function setDate_enregistrement($date){
		$this -> date_enregistrement = $date;
	}
	
}
//-----------
// $commande = new Commande;
// var_dump($commande);
// var_dump(get_class_methods($commande));