<?php

// web/
	// -> index.php
	
require_once(__DIR__ . '/../vendor/autoload.php');

//TEST 1 : Entity
// $produit = new Entity\Produit;
// $produit -> setTitre('MonTitre');
// echo $produit -> getTitre(); 
//----------------------

//TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance(); 
// var_dump($pdom); 
// $resultat = $pdom -> getPdo() -> query("SELECT * FROM produit");
// var_dump($resultat -> fetchAll()); 
//-----------------------

//TEST 3 : EntityRepository
// $er = new Manager\EntityRepository;
//$resultat = $er -> findAll();
// $resultat = $er -> find(5);
// var_dump($resultat);
//-------------------------

// TEST 4 : ProduitRepository (et ses fonctions)
$pr = new Repository\ProduitRepository;
// $resultat = $pr -> getAllProduit();
// $resultat = $pr -> getProduitById(5);
// $resultat = $pr -> getAllCategorie();
$resultat = $pr -> getAllProduitByCategorie('chemise');
var_dump($resultat);






