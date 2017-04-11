<?php 
require_once('../inc/init.inc.php');

// redirection si user n'est pas admin :
if(!userAdmin()){
	header('location:../connexion.php');
}

// Enregistrement un produit (ajouter/modifier)

if($_POST){
	//debug($_POST);
	//debug($_FILES);
	
	$nom_photo = 'default.jpg';
	
	if(isset($_POST['photo_actuelle'])){
		$nom_photo = $_POST['photo_actuelle'];
	}
	//Si je suis dans le cadre d'une modif de produit, $nom_photo prend la valeur de la photo du produit en cours de modif....
	
	//... Mais si on change de photo, alors on entre dans la condition ci-dessous :
	
	if(!empty($_FILES['photo']['name'])){ //Si une image nous a été transmise :
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		// On crée un nouveau nom de photo, pour éviter les doublons sur notre serveur et dans la BDD. 
		
		$chemin_photo = RACINE_SERVEUR . RACINE_SITE . 'photo/' . $nom_photo;
		// $chemin_photo est l'emplacement définitif de la photo depuis la racine du serveur et jusqu'à son nom. 
		
		
		copy($_FILES['photo']['tmp_name'], $chemin_photo); // Copy() nous permet de déplacer (copier/coller) un fichier d'un emplacement à un aurtre. 
		// Pour enregistrer la photo on va la copier depuis son emplacement temporaire, et la coller dans son emplacement définitif (dossier photo/)
	}
	
	
	
	// Insérer les infos dans la BDD : 
	
	if(isset($_GET['id'])){
		$resultat = $pdo -> prepare("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur,taille, public, photo, prix, stock) VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
		$resultat -> bindParam(':id_produit', $_GET['id'], PDO::PARAM_INT);
	}
	else{
		$resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur,taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
	
	}
	
	
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



if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){ // Si j'ai un id dans l'url et qu'il n'est pas vide et que c'est bien une valeur numérique, je récupère les infos du produit
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){
		$produit_actuel = $resultat -> fetch(PDO::FETCH_ASSOC);
		//debug($produit_actuel);
	}
}
//--------------

$reference = (isset($produit_actuel)) ? $produit_actuel['reference'] : '';
$categorie = (isset($produit_actuel)) ? $produit_actuel['categorie'] : '';
$titre = (isset($produit_actuel)) ? $produit_actuel['titre'] : '';
$description = (isset($produit_actuel)) ? $produit_actuel['description'] : '';
$couleur = (isset($produit_actuel)) ? $produit_actuel['couleur'] : '';
$taille = (isset($produit_actuel)) ? $produit_actuel['taille'] : '';
$public = (isset($produit_actuel)) ? $produit_actuel['public'] : '';
$photo = (isset($produit_actuel)) ? $produit_actuel['photo'] : '';
$prix = (isset($produit_actuel)) ? $produit_actuel['prix'] : '';
$stock = (isset($produit_actuel)) ? $produit_actuel['stock'] : '';

$action = (isset($produit_actuel)) ? 'Modifier' : 'Ajouter';




require_once('../inc/header.inc.php');
?>
<h1><?= $action ?> un produit</h1>
<form action="" method="post" enctype="multipart/form-data">
	<label>Référence : </label><br/>
	<input type="text" name="reference" value="<?= $reference ?>"/><br/><br/>

	<label>Catégorie : </label><br/>
	<input type="text" name="categorie" value="<?= $categorie ?>"/><br/><br/>
	
	<label>Titre : </label><br/>
	<input type="text" name="titre" value="<?= $titre ?>"/><br/><br/>
	
	<label>Description : </label><br/>
	<textarea rows="10" cols="30" name="description"><?= $description ?></textarea><br/><br/>
	
	<label>Couleur : </label><br/>
	<input type="text" name="couleur" value="<?=$couleur ?>"/><br/><br/>
	
	<label>Taille : </label><br/>
	<input type="text" name="taille" value="<?=$taille ?>"/><br/><br/>
	
	<label>Public : </label><br/>
	<select name="public">
		<option <?= ($public == 'm') ? 'selected' : '' ?> value="m">Homme</option>
		<option <?= ($public == 'f') ? 'selected' : '' ?> value="f">Femme</option>
		<option <?= ($public == 'mixte') ? 'selected' : '' ?> value="mixte">Mixte</option>
	</select><br/><br/>
	
	
	<?php if(isset($produit_actuel)) : ?>
		<img src="<?= RACINE_SITE . 'photo/' . $photo ?>" width="100" /><br/><br/>
		<input type="hidden"  name="photo_actuelle" value="<?= $photo ?>"/>
	<?php endif; ?>
	
	<label>Photo : </label><br/>
	<input type="file" name="photo"/><br/><br/>
	
	
	
	<label>Prix : </label><br/>
	<input type="text" name="prix" value="<?= $prix ?>"/><br/><br/>

	<label>Stock : </label><br/>
	<input type="text" name="stock" value="<?= $stock ?>"/><br/><br/>
	
	<input type="submit" value="<?= $action ?>"/>
</form>

<?php 
require_once('../inc/footer.inc.php');
?>