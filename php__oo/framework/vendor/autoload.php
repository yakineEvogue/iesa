<?php

//vendor/
	// -> autoload.php

class Autoload
{
	public static function className($nom_de_la_classe){
		
		//echo '<pre>Autoload : ' . $nom_de_la_classe;
		
		//new Controller\produitController
		//Controller/produitController.php
		//require 'src/Controller/produitController.php'

		$tab = explode('\\', $nom_de_la_classe);
		//$tab[0] = Controller $tab[1] = produitController 

		if($tab[0] == 'Controller' && $tab[1] != 'Controller'){
			$path = __DIR__ . '/../src/' . implode($tab, '/') . '.php';
		}
		else{
			$path = __DIR__ . '/' . implode($tab, '/') . '.php';
			//$path = '../src/Controller/produitController.php'
		}

		//echo "\n => $path</pre><hr/>"; // Pour voir les classes instanciées et les fichiers requis
		
		require $path;

	}
}
//------
spl_autoload_register(array('Autoload', 'className'));
//------
// En objet, on transmet à spl_autoload_register, le nom de la classe à instancier, et le nom de la méthode à exécuter. La méthode doit absolument être STATIC ! (imposé par PDO) le spl va faire  Autoload::ClassName($nom_de_la_classe_apres_le_new)

