<?php 
require_once('../inc/init.inc.php');

// redirection si user n'est pas admin :
if(!userAdmin()){
	header('location:../connexion.php');
}



$resultat = $pdo -> query("SELECT * FROM produit");
// $resultat = inexploitable

$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

//debug($produits);


require_once('../inc/header.inc.php');
?>
<h1>Gestion des produits</h1>

<table border="1">
<tr>
<?php for($i = 0; $i < $resultat -> columnCount(); $i ++) : ?>
	<?php $colonne = $resultat -> getColumnMeta($i); ?>
	<th><?= $colonne['name'] ?></th>
<?php endfor; ?>
	<th colspan="2">Actions</th>
</tr>
<?php foreach($produits as $indice => $valeur) : ?>
	<tr>
		<?php foreach($valeur as $indice2 => $valeur2) : ?>
		
			<?php if($indice2 == 'photo') : ?>
				<td><img src="<?= RACINE_SITE . 'photo/' . $valeur2 ?>" height="80"/></td>
			<?php else : ?>
				<td><?= $valeur2 ?></td>
			<?php endif; ?>
			
		<?php endforeach; ?>
		<td><a href="formulaire_produit.php?id=<?= $valeur['id_produit'] ?>"><img src="<?= RACINE_SITE ?>img/edit.png"/></a></td>
		<td><a href="supprimer_produit.php?id=<?= $valeur['id_produit'] ?>"><img src="<?= RACINE_SITE ?>img/delete.png"/></a></td>
		
	</tr>
<?php endforeach; ?>
</table>


<a style="display: inline-block; padding: 10px; border: 2px solid red; border-radius: 3px; text-align: center; margin: 20px 0; color: red; font-weight: bold;" href="formulaire_produit.php">Ajouter un produit</a>







<?php 
require_once('../inc/footer.inc.php');
?>