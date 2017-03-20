<?php

require_once('inc/init.inc.php');

// Traitement pour récupérer toutes les categories :

$resultat = $pdo -> query("SELECT DISTINCT(categorie) FROM produit");
$cat = $resultat -> fetchAll(PDO::FETCH_ASSOC);

//debug($cat);


// Traitement pour récupérer tous les produits d'une catégorie (transmises dans l'url

if(isset($_GET['categorie']) && !empty($_GET['categorie'])){ // Si une categorie est bien transmise dans l'URL
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE categorie = :cat");
	$resultat -> bindParam(':cat', $_GET['categorie'], PDO::PARAM_STR);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){ // La catégorie contient bien des produits...
		$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
	}
	else{ //Si la categorie n'existe pas
		$resultat = $pdo -> query("SELECT * FROM produit");
		$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
	}
}
else{ //S'il n'y a pas de catégorie dans l'URL (premiere fois qu'on arrive sur la page par exemple)
		$resultat = $pdo -> query("SELECT * FROM produit");
		$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
}
// On sort de ces conditions avec des produits dans $produits (tab multi) quoi qu'il arrive. 


require_once('inc/header.inc.php');

?>
<h1>Boutique</h1>

<div class="boutique-gauche">
	<ul>
		<?php foreach($cat as $key => $value) : ?>
			<li><a href="?categorie=<?= $value['categorie'] ?>"><?= $value['categorie'] ?></a></li>
		<?php endforeach ; ?>	
	</ul>
</div>

<div class="boutique-droite">
	
	
	<!-- Faire la boucle qui affiche les produits dynamiquemnt ! -->
	<?php foreach($produits as $valeur) : ?>
	<div class="boutique-produit">
		<h3><?= $valeur['titre'] ?></h3>
		<a href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>"><img src="<?= RACINE_SITE ?>photo/<?= $valeur['photo'] ?>" height="100"/></a>
		<p style="font-weight: bold; font-size: 20px; color: red;"><?= $valeur['prix'] ?>€</p>
		<p style="height: 40px"><?= substr($valeur['description'], 0, 45) ?>...</p>
		<a style="padding: 5px 15px; background: red; color: white; text-align: center; border: 2px solid black; border-radius: 3px" href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>">Voir la fiche</a>
	</div>
	<?php endforeach; ?>
	
	
	
</div>






<?php
	require_once('inc/footer.inc.php');

?>