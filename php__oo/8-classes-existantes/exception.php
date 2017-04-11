<?php
// 8-class_existantes
	// -> exception.php

// Les exceptions nous permettent de tester des morceaux de codes (try) et d'effectuer un traitement en particulier en cas d'erreur

function recherche($tab, $elem){

	if(!is_array($tab)){
		Throw new Exception('Vous devez envoyer un array dans la fonction !'); // Throw new nous permet de nous renvoyer dans le bloc catch ! 
	}

	if(sizeof($tab) <= 0){
		Throw new Exception('Vous devez envoyer un tableau avec du contenu à l\'intérieur!');
	}

	$position = array_search($elem, $tab);
	return $position; 
}
//---------------
$tab = array();
$liste = array('Orange', 'Pomme', 'Cerise');

try{

	echo recherche($liste, 'Cerise') . '<hr/>'; // position 2
	echo recherche($liste, 'Orange') . '<hr/>'; // position 0
	//echo recherche($tab, 'Orange') . '<hr/>';
	echo recherche('dzaeaze', 'Cerise') . '<hr/>';

}
catch(Exception $e){
	echo '<div style="color: white; padding: 10px; background: red;">';
	echo '	Message : ' . $e -> getMessage() . '<br/>';
	echo '	Fichier : ' . $e -> getFile() . '<br/>';
	echo '	Ligne : ' . $e -> getLine() . '<br/>';
	echo '</div>';
}

/*
	- Exception est une classe prédéfinie dans le PHP
	- Un eexception est une erreur que l'on peut attrapper
	- Throw permet d'arrêter l'exécution du code et d'entrer dans le bloc catch()
*/