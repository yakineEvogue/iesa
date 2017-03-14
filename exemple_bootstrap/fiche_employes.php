<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', ''); 



if(is_numeric($_GET['id'])){
	$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = $_GET[id]");
	if($resultat -> rowCount() == 0){
		echo 'Ce membre n\'existe pas encore !';
	}
}
else{
	echo 'Petit malin tu as touché à l\'URL'; 
}


// $resultat : INEXPLOITABLE en l'état !! 

$employe = $resultat -> fetch(PDO::FETCH_ASSOC);



?>

<h1>Profil de <?php echo $employe['prenom']; ?></h1>

<ul>
	<li>Prenom : <?php echo $employe['prenom'];  ?></li>
	<li>Nom : <?php echo $employe['nom'];  ?></li>
	<li>Sexe : <?php echo $employe['sexe'];  ?></li>
	<li>Salaire : <?php echo $employe['salaire'];  ?>€</li>
	<li>Embauche : <?php echo $employe['date_embauche'];  ?></li>
</ul>

