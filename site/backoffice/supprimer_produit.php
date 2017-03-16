<?php

require_once('../inc/init.inc.php');

//redirectiion si user pas admin : 
if(!userAdmin()){
	header('location:../connexion.php');
}

// Traitement pour supprimer un produit
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){ // Si on récupère bien un id, non vide et numérique, alors on va pouvoir supprimer le produit...
//... mais d'abord, on veut supprimer la ou les photo(s) du produit, on doit donc récupérer toutes les infos du produit : 

	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){ // le produit existe bien dans ma BDD
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
	
		$chemin_photo_a_supprimer = RACINE_SERVEUR . RACINE_SITE . 'photo/' . $produit['photo'];
		//$chemin_photo_a_supprimer contient le chemin exact et absolu de la photo que nous supprimer du serveur.
		
		if($produit['photo'] != 'default.jpg' && file_exists($chemin_photo_a_supprimer)){
			unlink($chemin_photo_a_supprimer); //unlink() permet de supprimer un fichier du serveur.	
		}
		
		$resultat = $pdo -> exec("DELETE FROM produit WHERE id_produit = $produit[id_produit]");
		
		if($resultat != FALSE){
			header('location:gestion_produit.php');
		}
	}
	else{
		header('location:gestion_produit.php');
	}
}
else{
	header('location:gestion_produit.php');
}



