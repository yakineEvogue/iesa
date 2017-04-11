<?php
//Dossier : 10-autoload
	// -> autoload.php
function inclusion_automatique($nom_de_classe){
	
	$tab = explode('\\', $nom_de_classe);
	$nom_du_fichier = $tab[0] . '/' . 'class' . $tab[1] . '.php';
	require_once($nom_du_fichier);
	echo 'On passe dans l\'autoload !!<br/>';
	echo 'Require(' . $nom_du_fichier . ')<hr/>';
}
//--------------------
spl_autoload_register('inclusion_automatique');

//Explication de notre autoload amélioré avec le namespace en nom de dossier :
/*
$tab = explode('\\', 'Espace1\A'); // ceci donne: 
$tab[0] = 'Espace1';
$tab[1] = 'A';
// Du coup on require le chemin du fichier comme ça : 
require($tab[0] . '/' . 'class' . $tab[1] . '.php');
*/

/*
spl_autoload_register() est une fonction prédéfinie, qui s'execute à chaque qu'elle voir le mot 'new'. 
Elle va lancer la fonction précisée en argument, et apporter le nom de la classe instanciée en argument de la fonction 

*/