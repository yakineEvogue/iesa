<?php

//vendor
	//Manager/
		//-> Application.php
	

namespace Manager;

final class Application
{
	protected $controller;
	protected $action;
	protected $id;
	protected $categorie;
	
	public function __construct(){
		if(isset($_GET['controller'])){
			$this -> controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';
		}
		else{
			$this -> controller = 'Controller\ProduitController';
		}
		
		if(isset($_GET['action'])){
			$this -> action = $_GET['action'];
		}
		else{
			$this -> controller = 'Controller\ProduitController';
			$this -> action = 'showall';
		}
		
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$this -> id = (int) $_GET['id'];
		}
		
		if(isset($_GET['cat']) && !empty($_GET['cat'])){
			$this -> categorie = $_GET['cat'];
		}
	}
	
	public function run(){
		if(!is_null($this -> controller)){
			$a = new $this -> controller;
			//$a = new Controller\ProduitController
			// Faudrait vérifier si le ficier Controller/ProduitController.php existe grâce à la fonction file_exists()
		}
		
		if(!is_null($this -> action)){
			if(!is_null($this -> id)){
				$action = $this -> action;
				$a -> $action($this -> id);
				//$a -> show(id)
			}
			elseif(!is_null($this -> categorie)){
				$action = $this -> action;
				$a -> $action($this -> categorie);
				//$a -> showCat(cat)
			}
			else{
				$action = $this -> action;
				$a -> $action();
				//$a -> showall();
			}
		}
	}
}
//Exemple d'url :
//index.php?controller=produit&action=show&id=5
//index.php?controller=produit&action=showall /!\
//index.php?controller=produit&action=showcat&cat=pull /!\

//L'url index.php doit normalement effectuer ?controller=produit&action=showall()


