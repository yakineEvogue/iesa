<?php

//vendor
	//Repository
		//-> ProduitRepository.php
		
namespace Repository;

use Manager\EntityRepository;
use PDO;

//use Manager\EntityRepository, PDO;


class ProduitRepository extends EntityRepository
{
	// TOUT LE CODE DE ENTITYREPOSITORY il est importé ici !! 
	
	//requêtes génériques : 	
	public function getAllProduit(){
		return $this -> findAll();
	}

	public function getProduitById($id){
		return $this -> find($id);
	}
	
	public function registerProduit(){
		return $this -> register();
	}

	//requêtes spécifiques
	public function getAllCategorie(){
		$req = "SELECT DISTINCT categorie FROM produit";
		$resultat = $this -> getDb() -> query($req);
		
		$donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		
		if(!$donnees){
			return FALSE;
		}
		else{
			return $donnees;
		}	
	}
	
	
	public function getAllProduitByCategorie($cat){
		$req = "SELECT * FROM produit WHERE categorie = :cat";
		$resultat = $this -> getDb() -> prepare($req);
		$resultat -> bindParam(':cat', $cat, PDO::PARAM_STR);
		$resultat -> execute();
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
		
		$donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC); 
		if(!$donnees){
			return FALSE; 
		}
		else{
			return $donnees;
		}
	}
}