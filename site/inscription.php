<?php
require_once('inc/init.inc.php');

if($_POST){
	
	// vérifier ce qu'on récupère
	debug($_POST);
	
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
	
	
	
	
	// vérifier que le pseudo et l'email est dispo
	
	
	//insérer les infos en BDD
	
	
	
}

require_once('inc/header.inc.php');
?>
<h1>Inscription</h1>
	<?= $msg ?>
	<form action="" method="post">
		<label>Pseudo : </label><br/>
		<input type="text" name="pseudo"/><br/><br/>
	
		<label>Mot de passe : </label><br/>
		<input type="password" name="mdp"/><br/><br/>
	
		<label>Nom : </label><br/>
		<input type="text" name="nom"/><br/><br/>
	
		<label>Email : </label><br/>
		<input type="text" name="email"/><br/><br/>
		
		<label>Civilite : </label><br/>
		<select name="civilite">
			<option>-- Selectionnez --</option>
			<option value="m">Homme</option>
			<option value="f">Femme</option>
		</select><br/><br/>
		
		<label>Ville : </label><br/>
		<input type="text" name="ville"/><br/><br/>
		
		<label>Code Postal : </label><br/>
		<input type="text" name="code_postal"/><br/><br/>
		
		<label>Adresse : </label><br/>
		<input type="text" name="adresse"/><br/><br/>
		
		<input type="submit" value="Inscription"/>	
	</form>

<?php
require_once('inc/footer.inc.php');
?>