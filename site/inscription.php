<?php
require_once('inc/init.inc.php');

if($_POST){
	
	// vérifier ce qu'on récupère
	//debug($_POST);
	
	// vérifier l'intégrité des données (vide, nbre de caractère, caractère etc...)
	if(!empty($_POST['pseudo'])){
		$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']); 
		
		// preg_match() est une fonction qui permet de vérifier les caractères d'une chaîne de caractères. Le 1er arg c'est les caractères autorisés (REGEX, ou expression regulière), 2eme arg : la CC que l'on va vérifier. 
		// preg_match() nous retourne TRUE ou FALSE
		
		if($verif_caractere){ // $verif_caractere == TRUE
			if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 25 ){
				$msg .= '<div class="erreur">Veuillez renseigner un pseudo de 3 à 25 caractères</div>';
			}
		}
		else{
			$msg .= '<div class="erreur">Pseudo : Caractères acceptés : de A à Z, de 0 à 9, et les "-", "_", "."</div>';
		}
	}
	else{
		$msg .= '<div class="erreur">Veuillez renseigner un pseudo !</div>';
	}
	
	
	if(empty($msg)){ // Tout est OK ! Si $msg est vide cela signifie que nous sommes passés dans aucun message d'erreur. 
		// vérifier que le pseudo et l'email est dispo
		$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
		$resultat -> execute(); 
		
		if($resultat -> rowCount() > 0){
			$msg .= '<div class="erreur">Le pseudo <b>' . $_POST['pseudo'] . ' n\'est pas disponible. Veuillez choisir un autre pseudo !</b></div>';	
		}
		else{ // tout est ok !! Pas d'erreur... le pseudo est bien disponible, on peut insérer l'utilisateur en BDD : 
			//insérer les infos en BDD
			$resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, '0')");
			
			//STR
			$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
			$mdp_crypte = md5($_POST['mdp']);
			// La fonction md5() permet de crypter le MDP (de manière simplifiée)
			$resultat -> bindParam(':mdp', $mdp_crypte, PDO::PARAM_STR);
			$resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
			$resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
			$resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
			$resultat -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR); 
			$resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR); 
			$resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR); 
			
			//INT
			$resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT); 
			
			if($resultat -> execute()){
				header('location:connexion.php');
			}
		}
	}
}

// traitement pour conserver les données saisies dans le formulaire : 

$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$civilite = (isset($_POST['civilite'])) ? $_POST['civilite'] : '';
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : '';
$code_postal = (isset($_POST['code_postal'])) ? $_POST['code_postal'] : '';
$adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : '';

// équivaut à faire ceci pour chaque variable : 
if(isset($_POST['pseudo'])){
	$pseudo = $_POST['pseudo'];
}
else{
	$pseudo = '';
}


require_once('inc/header.inc.php');
?>
<h1>Inscription</h1>
	<?= $msg ?>
	<form action="" method="post">
		<label>Pseudo : </label><br/>
		<input type="text" name="pseudo" value="<?= $pseudo ?>" /><br/><br/>
	
		<label>Mot de passe : </label><br/>
		<input type="password" name="mdp"/><br/><br/>
	
		<label>Nom : </label><br/>
		<input type="text" name="nom" value="<?= $nom ?>"/><br/><br/>
		
		<label>Prénom : </label><br/>
		<input type="text" name="prenom" value="<?= $prenom ?>"/><br/><br/>
	
		<label>Email : </label><br/>
		<input type="text" name="email" value="<?= $email ?>"/><br/><br/>
		
		<label>Civilite : </label><br/>
		<select name="civilite">
			<option>-- Selectionnez --</option>
			<option value="m" <?= ($civilite == 'm') ? 'selected' : '' ?> >Homme</option>
			<option value="f" <?= ($civilite == 'f') ? 'selected' : '' ?> >Femme</option>
		</select><br/><br/>
		
		<label>Ville : </label><br/>
		<input type="text" name="ville" value="<?= $ville ?>"/><br/><br/>
		
		<label>Code Postal : </label><br/>
		<input type="text" name="code_postal" value="<?= $code_postal ?>"/><br/><br/>
		
		<label>Adresse : </label><br/>
		<input type="text" name="adresse" value="<?= $adresse ?>"/><br/><br/>
		
		<input type="submit" value="Inscription"/>	
	</form>

<?php
require_once('inc/footer.inc.php');
?>