<?php 
require_once('inc/init.inc.php');


// traitements pour la connexion :
if($_POST){
	debug($_POST);
	
	$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
	$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$resultat -> execute(); 
	
	if($resultat -> rowCount() > 0){ // Cela signifie que le pseudo existe bien dans ma BDD
		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
		// Le fetch() me permet de récupérer les info du membre sous forme de tableau de données ARRAY. 
		
		if($membre['mdp'] == md5($_POST['mdp'])){ // Tout est ok, le pseudo existe et en plus le MDP tapé correspond bien au MDP dans la BDD
			
			
			//$_SESSION['membre']['pseudo'] = $membre['pseudo'];
			//$_SESSION['membre']['prenom'] = $membre['prenom'];
			
			//Plus pratique dans une boucle :
			foreach($membre as $indice => $valeur){
				$_SESSION['membre'][$indice] = $valeur;
			}
			
			//debug($_SESSION);
			header("location:profil.php");
			
		}
		else{
			$msg .= '<div class="erreur">Erreur de mot de passe !</div>';
		}	
	}
	else{
		$msg .= '<div class="erreur">Erreur de pseudo !</div>';
	}
}

require_once('inc/header.inc.php');
?>
<h1>Connexion</h1>
<?= $msg ?>
<form action="" method="post">
	<label>Pseudo :</label><br/>
	<input type="text" name="pseudo"/><br/><br/>
	
	<label>Mot de passe :</label><br/>
	<input type="password" name="mdp"/><br/><br/>

	<input type="submit" value="Connexion"/>
</form>

<?php 
require_once('inc/footer.inc.php');
?>