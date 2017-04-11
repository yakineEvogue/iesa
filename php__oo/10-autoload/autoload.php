<?php
//Dossier : 10-autoload
	// -> autoload.php
function inclusion_automatique($nom_de_classe){
	
	require('class' . $nom_de_classe . '.php');
	echo 'On passe dans l\'autoload !!<br/>';
	echo 'Require(class' . $nom_de_classe . '.php)<hr/>';
}
//--------------------
spl_autoload_register('inclusion_automatique');
/*
spl_autoload_register() est une fonction pr�d�finie, qui s'execute � chaque qu'elle voir le mot 'new'. 
Elle va lancer la fonction pr�cis�e en argument, et apporter le nom de la classe instanci�e en argument de la fonction 

*/