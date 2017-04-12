<?php

//vendor
	//Controller
		//-> Controller.php
		
namespace Controller; 

use Manager\EntityRepository;
use Manager\PDOManager;

class Controller
{
	protected $repository; 
	
	public function getRepository(){
		$entity = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
		// Au moment où j'execute cette méthod je suis dans Controller\ProduitController par exemple, et donc je récupère juste le mot Produit en retirant Controller\ et Controller. 
		
		$repo = 'Repository\\' . $entity . 'Repository';
		// $repo = Repository\ProduitRepository
		
		$this -> repository = new $repo;
		return $this -> repository;
	}
	
	
	
	public function render($layout, $template, $parametres){
		$dirView = __DIR__ . '/../../src/Views/';
		//Chemin vers le dossier où se trouvent les vues .html
		
		$dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
		// Nom du dossier où aller chercher les bonnes vues (en fonction du nom du controller)
		
		$pathTemplate = $dirView . '/' . $dirFile .  '/' . $template;
		
		$pathLayout = $dirView . '/' . $layout;
		
		extract($parametres, EXTR_SKIP); // L'option EXTR_SKIP permet de ne pas créer une variable si elle existe déjà dans le code. 
		
		ob_start(); 
		// Enclenche la temporisation de sortie. Cela signifie que ce qui suit ne sera exécuter tout de suite, mais sera conservé en memoire tampon. 
		require $pathTemplate; // Instruction retenue...
		$content = ob_get_clean(); // Met dans la variable $content, ce qui a été retenu... le require de la vue. 
		
		ob_start();
		require $pathLayout;
		
		return ob_end_flush();
		// Envoie le contenu de sortie (tout ce qui a retenu) et éteint la temporisation. 

	}
	
	
	
	
	
}