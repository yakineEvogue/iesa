<?php
// création d'une fonction debug pour faire les print_r() : 

// déclaration d'une fonction :
function debug($arg){
	//Traitements...		
	echo '<pre>'; 
	print_r($arg);
	echo '</pre>';
}


// Fonction pour voir si l'utilisateur est connecté : 
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return TRUE; 
	}
	else{
		return FALSE; 
	}
}
// S'il existe une session membre cela signifie que l'utilisateur est connecté, donc je retourne TRUE, sinon, il n'est pas connecté, je retourne FALSE. 


// Fonction pour voir si l'utilisateur est admin : 
function userAdmin(){
	if(userConnecte() && $_SESSION['membre']['statut'] == 1){
		return TRUE;
	}
	else{
		return FALSE;
	}
}











