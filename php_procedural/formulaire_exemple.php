<?php
$msg = ''; 

if($_POST){
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	foreach($_POST as $indice => $valeur){
		if(empty($valeur)){
			$msg .= '<p style="background:red; padding: 5px; color: white">Veuillez renseigner le champ ' . $indice . '</p>';
		}
		else{
			if($indice != 'sexe'){
				if(strlen($valeur) < 3 || strlen($valeur) > 50){
					$msg .= '<p style="background:red; padding: 5px; color: white">Le champ ' . $indice . ' attend entre 3 et 50 caractères</p>';
				}
			}
		}
	}
	
	if($_POST['mdp'] != $_POST['mdp_conf']){
		$msg .= '<p style="background:red; padding: 5px; color: white">Les deux mots de passe ne sont pas identiques !</p>';
	}
	
	if(strpos($_POST['email'], '@') == FALSE){
		$msg .= '<p style="background:red; padding: 5px; color: white">Veuillez renseigner un email valide!</p>';
	}
	
	
	if(empty($msg)){ // Si $msg est vide, cela signifie qu'on est passé dans aucune erreur. Tous les feux sont au vert, on peut effectuer le traitement final (requête INSERT pour enregistrer l'utilisateur. 
	
		//requête pour enregistrer l'utilisateur !
		
	}
}
?>
<html>
	<h1>Formulaire d'inscription</h1>
	<?php echo $msg; ?>
	<form action="" method="post">
		<div style="width: 30%; float: left; ">
			<label>Pseudo : </label><br/>
			<input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"/><br/><br/>
			
			<label>Nom : </label><br/>
			<input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>"/><br/><br/>
			
			<label>Prénom : </label><br/>
			<input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" /><br/><br/>
			
			<label>Email : </label><br/>
			<input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"/><br/><br/>
		</div>
		<div style="width: 30%; float: left; ">
			<label>Sexe : </label><br/>
			<select name="sexe">
				<option value="m">Homme</option>
				<option <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f'){echo 'selected';} ?> value="f">Femme</option>
			</select><br/><br/>
			
			<label>Sexe : </label><br/>
			<input checked type="radio" id="m" name="sexe" value="m" /><label for="m">Homme</label>
			<input <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f'){echo 'checked';} ?> type="radio" id="f" name="sexe" value="f" /><label for="f">Femme</label><br/><br/>
			
			<label>MDP : </label><br/>
			<input type="text" name="mdp" /><br/><br/>
			
			<label>Confirmation MDP : </label><br/>
			<input type="text" name="mdp_conf" /><br/><br/>
			
			<input type="submit" value="Inscription"/>
		</div>
	</form>
</html>