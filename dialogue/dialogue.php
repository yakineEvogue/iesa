<?php
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '');

if($_POST){
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	
	// Traitements pour insérer un nouveau commentaire : 
	
	
	$resultat = $pdo -> prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ( :pseudo,  :message, NOW())");
	
	$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	
	$resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
	
	if($resultat -> execute()){
		header('location:dialogue.php');
	}
	// Si la requête s'est bien passée, je recharge la page pour "vider" le post ! 
	
}

// Traitements pour récupérer tous les commentaires : 

$resultat = $pdo -> query("SELECT pseudo, message, date_format(date_enregistrement, '%d/%m/%Y') as date_fr, date_format(date_enregistrement, '%h:%i:%s') as heure_fr FROM commentaire ORDER BY date_enregistrement DESC "); 



// $resultat contient toutes les infos, mais est inexploitable en l'état. 

$commentaires = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($commentaires);
echo '</pre>';

?>


<html>
	<head>
		<link type="text/css" rel="stylesheet" href="styles.css"/>
	</head>
	<body>
		<div class="container">
		<h1>Mon article</h1>
			<article>
				<p class="chapo">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<img src="image.jpg" />
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tortor vestibulum, efficitur elit ut, laoreet leo. Etiam consectetur metus a felis suscipit, tempus sagittis diam faucibus. Proin vitae diam nisi. Nullam velit nibh, vestibulum in augue non, faucibus elementum sapien. Praesent lobortis mi ut nunc tincidunt dignissim. Mauris at risus dui. Donec sed bibendum libero, ac volutpat metus. Proin rhoncus faucibus tortor at dignissim. Aliquam erat volutpat. Sed ullamcorper mauris ac purus feugiat, in auctor ipsum posuere. Morbi a eleifend felis.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tortor vestibulum, efficitur elit ut, laoreet leo. Etiam consectetur metus a felis suscipit, tempus sagittis diam faucibus. Proin vitae diam nisi. Nullam velit nibh, vestibulum in augue non, faucibus elementum sapien. Praesent lobortis mi ut nunc tincidunt dignissim. Mauris at risus dui. Donec sed bibendum libero, ac volutpat metus. Proin rhoncus faucibus tortor at dignissim. Aliquam erat volutpat. Sed ullamcorper mauris ac purus feugiat, in auctor ipsum posuere. Morbi a eleifend felis.</p>
			</article>
			<h4>Postez un commentaire à propos de cet article : </h4>
			<form action="" method="post">
				<input type="text" name="pseudo" placeholder="Pseudo..."/><br/>
				<label>Message : </label><br/>
				<textarea name="message"></textarea><br/>
				<input type="submit" value="Envoyer le message"/>
			</form>
			<aside>
			
			
			<?php 
			for($i = 0; $i < count($commentaires); $i++){
				echo '<!-- Début d\'un message -->';
				echo '<div class="comment">';
				echo '	<p class="user">Par ' . $commentaires[$i]['pseudo'] . ' le ' . $commentaires[$i]['date_fr'] . ' à ' . $commentaires[$i]['heure_fr'] . '</p>';
				echo '	<div class="content">';
				echo '		<p>' . $commentaires[$i]['message'] . '</p>';
				echo '	</div>';
				echo '</div>';
				echo '<!-- fin d\'un message -->';
			}
			?>
			
			
			
			<?php foreach($commentaires as $valeur) : ?>
				<!-- Début d\'un message -->
				<div class="comment">
					<p class="user">Par <?= $valeur['pseudo'] ?> la <?= $valeur['date_fr'] ?> à <?= $valeur['heure_fr'] ?></p>
					<div class="content">
						<p><?= $valeur['message'] ?></p>
					</div>
				</div>
				<!-- fin d\'un message -->
			<?php endforeach; ?>
			
			
			
			</aside>
		</div>
	</body>
</html>
</html>

