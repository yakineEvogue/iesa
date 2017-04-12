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
		// Au moment o� j'execute cette m�thod je suis dans Controller\ProduitController par exemple, et donc je r�cup�re juste le mot Produit en retirant Controller\ et Controller. 
		
		$repo = 'Repository\\' . $entity . 'Repository';
		// $repo = Repository\ProduitRepository
		
		$this -> repository = new $repo;
		return $this -> repository;
	}
	
	
	
	public function render($layout, $template, $parametres){
		$dirView = __DIR__ . '/../../src/Views/';
		//Chemin vers le dossier o� se trouvent les vues .html
		
		$dirFile = str_replace(array('Controller\\', 'Controller'), '', get_called_class());
		// Nom du dossier o� aller chercher les bonnes vues (en fonction du nom du controller)
		
		$pathTemplate = $dirView . '/' . $dirFile .  '/' . $template;
		
		$pathLayout = $dirView . '/' . $layout;
		
		extract($parametres, EXTR_SKIP); // L'option EXTR_SKIP permet de ne pas cr�er une variable si elle existe d�j� dans le code. 
		
		ob_start(); 
		// Enclenche la temporisation de sortie. Cela signifie que ce qui suit ne sera ex�cuter tout de suite, mais sera conserv� en memoire tampon. 
		require $pathTemplate; // Instruction retenue...
		$content = ob_get_clean(); // Met dans la variable $content, ce qui a �t� retenu... le require de la vue. 
		
		ob_start();
		require $pathLayout;
		
		return ob_end_flush();
		// Envoie le contenu de sortie (tout ce qui a retenu) et �teint la temporisation. 

	}
	
	
	
	
	
}