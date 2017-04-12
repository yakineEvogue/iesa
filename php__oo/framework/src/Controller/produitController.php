<?php

//src
	//Controller
		//ProduitController.php
		
namespace Controller; 

use Controller\Controller;

class ProduitController extends Controller
{
	//Tout le code de Controller.php est copié/collé ici ! 
	//getRepository()
	//render()
	
	
	public function show($i){
	
		$produit = $this -> getRepository() -> getProduitById($i);
		//getRepository nous récupère un objet de la classe Repository\ProduitRepository qui contient une fonction getProduitById() qui récupère les infos d'un enregistrement (sous forme d'array) depuis la BDD (SELECT * FROM produit WHERE id = $id). 
	
		// Suggestions de produit : les produits de la même categorie
		$suggestions = $this -> getRepository() -> getAllProduitByCategorie($produit['categorie']);
	
		$params = array(
			"produit" => $produit,
			"suggestions" => $suggestions,
			"title" => $produit['titre']
		);
	
		return $this -> render('layout.html', 'produit.html', $params);
	
	
		// Pour le TEST5 : 
		//var_dump($produit);
		
		
	}
	
	public function showAll(){
		$produits = $this -> getRepository() -> getAllProduit();
		
		$categories = $this -> getRepository() -> getAllCategorie();
		
		$params = array(
			"produits" => $produits,
			"categories" => $categories,
			"title" => "Boutique"
		);
		
		return $this -> render('layout.html', 'produits.html', $params);	
	}
	
	
	public function showCat($cat){
		$produits = $this -> getRepository() -> getAllProduitByCategorie($cat);
		
		$categories = $this -> getRepository() -> getAllCategorie();
		
		$params = array(
			"produits" => $produits,
			"categories" => $categories,
			"title" => "Boutique " . $produits[0]['categorie']
		);
		
		return $this -> render('layout.html', 'produits.html', $params);
	}
	
	
	
	
	
	//-------------Potentiellement ici, mais dans notre cas les fonctions suivantes seraient plutôt dans le BO de l'application...
	public function update($id){
		
	}
	
	public function suppr($id){
		
	}
	
	public function add($produit){
		
	}
	
	
	
	
	
	
}