<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', ''); 

$resultat = $pdo -> query("SELECT * FROM employes"); 
// INEXPLOITABLE (OBJ PDOStatement)





?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	</head>
	<body>
		<div id="container" style="width: 90%; margin: 5vh auto">
			<div class="row">
			
		
			<?php
			while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
			
			echo '<!-- Début vignette produit -->';
			echo '<div class="col-sm-6 col-lg-3 col-md-4">';
			echo '	<div class="thumbnail">';
			echo '		<img src="image5.jpg" alt="">';
			echo '		<div class="caption">';
			echo '			<h4 class="pull-right">Id : ' . $employes['id_employes'] .'</h4>';
			echo '			<h4><a href="fiche_employes.php?id=' . $employes['id_employes'] . '">' . $employes['prenom'] . ' ' . $employes['nom'] .  '</a>';
			echo '			</h4>';
			echo '			<ul>';
			echo '				<li>Sexe : ' . $employes['sexe'] . '</li>';
			echo '				<li>Date Embauche : ' . $employes['date_embauche'] . '</li>';
			echo '				<li>Salaire : ' . $employes['salaire'] . '€</li>';
			echo '			</ul>';
			echo '		</div>';
			echo '		<div class="ratings">';
			echo '			<p class="pull-right">15 reviews</p>';
			echo '			<p>';
			echo '				<span class="glyphicon glyphicon-star"></span>';
			echo '				<span class="glyphicon glyphicon-star"></span>';
			echo '			<span class="glyphicon glyphicon-star"></span>';
			echo '				<span class="glyphicon glyphicon-star"></span>';
			echo '				<span class="glyphicon glyphicon-star"></span>';
			echo '			</p>';
			echo '		</div>';
			echo '	</div>';
			echo '</div>';
			echo '<!-- Fin vignette produit -->';
			
			}
			
			?>
			
			
			
			
			</div>
		</div>
	</body>
</html>