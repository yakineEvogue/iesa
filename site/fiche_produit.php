<?php
require_once('inc/init.inc.php');

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
		extract($produit);
	}
	else{
		header('location:boutique.php');
	}
}
else{
	header('location:boutique.php');
}


// traitement pour récupérer des produits suggérés : 
$resultat = $pdo -> query("SELECT * FROM produit WHERE categorie != '$categorie' ORDER BY prix DESC LIMIT 0,5");

//$resultat = $pdo -> query("SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != $id_produit");
$suggestions = $resultat -> fetchAll(PDO::FETCH_ASSOC);

debug($suggestions);



require_once('inc/header.inc.php');
?>
<h1><?= $titre ?></h1>
<img src="<?= RACINE_SITE . 'photo/' . $photo ?>" width="200" />
<p>Détails du produit : </p>
<ul>
	<li>Réf : <?= $reference ?></li>
	<li>Catégorie : <?= $categorie ?></li>
	<li>Couleur : <?= $couleur ?></li>
	<li>Taille : <?= $taille ?></li>
	<li>Public : <?php if($public == 'm'){echo 'Homme';}elseif($public == 'f'){echo 'Femme';}else{echo 'Homme et Femme';} ?></li>
	<li>Prix : <b style="color:red; font-size: 20px"><?= $prix ?>€</b></li>
</ul>

<br/><br/>
<p>Description du produit : </p>
<em><?= $description ?></em>
<br/><br/>
<fieldset>
	<legend>Acheter ce produit</legend>
	<form action="" method="post">
		<select style="max-width: 100px; display: inline-block" name="quantite">
			<option>Quantité</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select>
		<input style="display: inline-block" type="submit" value="Ajouter au panier"/>
	</form>
</fieldset>


<!-- Consignes : Ajouter des suggestions de produit :
	- Soit de la même categorie (moins le pdt actuel)
	- Soit toutes les autres catégories
 -->
<br/><br/>
<fieldset>
	<legend>Suggestions de produits :</legend>
	<?php foreach($suggestions as $valeur) : ?>
	<div class="boutique-produit">
		<h3><?= $valeur['titre'] ?></h3>
		<a href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>"><img src="<?= RACINE_SITE ?>photo/<?= $valeur['photo'] ?>" height="100"/></a>
		<p style="font-weight: bold; font-size: 20px; color: red;"><?= $valeur['prix'] ?>€</p>
		<p style="height: 40px"><?= substr($valeur['description'], 0, 45) ?>...</p>
		<a style="padding: 5px 15px; background: red; color: white; text-align: center; border: 2px solid black; border-radius: 3px" href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>">Voir la fiche</a>
	</div>
	<?php endforeach; ?>
	
	
</fieldset>




<?php
	require_once('inc/footer.inc.php');

?>