<?php

// web/
	// -> index.php
	
require_once(__DIR__ . '/../vendor/autoload.php');

$app = new Manager\Application; 
$app -> run(); 





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
// $pr = new Repository\ProduitRepository;
// $resultat = $pr -> getAllProduit();
// $resultat = $pr -> getProduitById(5);
// $resultat = $pr -> getAllCategorie();
// $resultat = $pr -> getAllProduitByCategorie('chemise');
// var_dump($resultat);
//-----------------------------

// TEST 5 : ProduitController
// $pdt = new Controller\ProduitController;
// $pdt -> show(5);

// TEST5.bis : Avec les URL show(id)
// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];
// $id = $_GET['id'];

// $cont = new $controller;
// $cont -> $action($id);

//tester l'url suivante : index.php?controller=produit&action=show&id=5

// TEST5.bis : Avec les URL showAll
// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];

// $cont = new $controller;
// $cont -> $action();

//tester l'url suivante : index.php?controller=produit&action=showall


// TEST5.bis : Avec les URL showcat
// $controller = 'Controller\\' . $_GET['controller'] . 'Controller';
// $action = $_GET['action'];
// $cat = $_GET['cat'];

// $cont = new $controller;
// $cont -> $action($cat);

//tester l'url suivante : index.php?controller=produit&action=showall


//TEST 6 : Render();
// $pdt = new Controller\ProduitController;
// $pdt -> show(5);



