<?php 
require_once('../inc/init.inc.php');

// redirection si user n'est pas admin :
if(!userAdmin()){
	header('location:../connexion.php');
}

// Enregistrement un produit (ajouter/modifier)

if($_POST){
	
	debug($_POST);
	debug($_FILES);
	
	$nom_photo = 'default.jpg';
	
	if(!empty($_FILES['photo']['name'])){ //Si une image nous a été transmise :
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		// On crée un nouveau nom de photo, pour éviter les doublons sur notre serveur et dans la BDD. 
		
		$chemin_photo = RACINE_SERVEUR . RACINE_SITE . 'photo/' . $nom_photo;
		// $chemin_photo est l'emplacement définitif de la photo depuis la racine du serveur et jusqu'à son nom. 
		
		
		copy($_FILES['photo']['tmp_name'], $chemin_photo); // Copy() nous permet de déplacer (copier/coller) un fichier d'un emplacement à un aurtre. 
		// Pour enregistrer la photo on va la copier depuis son emplacement temporaire, et la coller dans son emplacement définitif (dossier photo/)
	}
	
	
	// Insérer les infos dans la BDD : 
	$resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur,taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
	
	//STR
	$resultat -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
	$resultat -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
	$resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
	$resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
	$resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
	$resultat -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
	$resultat -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);
	$resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);
	
	
	//INT
	$resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_INT);
	$resultat -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);
	
	if($resultat -> execute()){
		header('location:gestion_produit.php');
	}
	
	
}







require_once('../inc/header.inc.php');
?>
<h1>Ajouter un produit</h1>
<form action="" method="post" enctype="multipart/form-data">
	<label>Référence : </label><br/>
	<input type="text" name="reference"/><br/><br/>

	<label>Catégorie : </label><br/>
	<input type="text" name="categorie"/><br/><br/>
	
	<label>Titre : </label><br/>
	<input type="text" name="titre"/><br/><br/>
	
	<label>Description : </label><br/>
	<textarea rows="10" cols="30" name="description"></textarea><br/><br/>
	
	<label>Couleur : </label><br/>
	<input type="text" name="couleur"/><br/><br/>
	
	<label>Taille : </label><br/>
	<input type="text" name="taille"/><br/><br/>
	
	<label>Public : </label><br/>
	<select name="public">
		<option value="m">Homme</option>
		<option value="f">Femme</option>
		<option value="mixte">Mixte</option>
	</select><br/><br/>
	
	<label>Photo : </label><br/>
	<input type="file" name="photo"/><br/><br/>
	
	<label>Prix : </label><br/>
	<input type="text" name="prix"/><br/><br/>

	<label>Stock : </label><br/>
	<input type="text" name="stock"/><br/><br/>
	
	<input type="submit" value="Ajouter"/>
</form>

<?php 
require_once('../inc/footer.inc.php');
?>