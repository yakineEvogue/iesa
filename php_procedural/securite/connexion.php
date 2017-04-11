<?php

/*
Une injection SQL permet de détourner le comportement initialement prévu de notre requête. 

------------
Exemple 1 : 
	Pseudo : juju '#
	mdp : 
	
	Requete : SELECT * FROM membre WHERE pseudo = 'juju '#' AND mdp = ''
	
	Explications : Le dièse permet de mettre la suite de la requête en commentaire ! Le MDP n'a donc plus d'importance. 

-------------
Exemple 2 : 
	Pseudo : 
	MDP : ' OR id_membre = '2 
	
	Requete : SELECT * FROM membre WHERE pseudo = '' AND mdp = '' OR id_membre = '2 '
	
	Explications : On demande le membre ayant le pseudo '' et le mdp ''... ou alors le membre ayant l'id_membre = 2
	
	idUsers - idUser - id_users - id_user etc..

---------------
Exemple 3 : 
	pseudo : 
	mdp : ' OR 1='1
	
	Requete : SELECT * FROM membre WHERE pseudo = '' AND mdp = '' OR 1='1'
	
	Explications : On demande le membre ayant le pseudo '' et le mdp'' Ou alors 1=1   0_o
*/














$pdo = new PDO('mysql:host=localhost;dbname=securite', 'root', ''); 

if($_POST){
	

	
	$_POST['pseudo'] = htmlentities(addslashes($_POST['pseudo']));
	$_POST['mdp'] = htmlentities(addslashes($_POST['mdp']));
	Evogue
	echo '<pre>'; 
	print_r($_POST);
	echo '</pre>';
	
	
	echo 'Pseudo : ' . $_POST['pseudo'] . '<br/>';
	echo 'MDP : ' . $_POST['mdp'] . '<hr/>'; 
	
	echo "SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' AND mdp = '$_POST[mdp]'";
	echo '<hr/>';
	
	$resultat = $pdo -> query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' AND mdp = '$_POST[mdp]'"); 
	// On effectue une requête pour récupérer les infos du membre grâce à son pseudo et à son MDP. Si le pseudo n'existe pas, ou que le MDP n'est pas le bon cette requete nous renvoie un résultat vide !
	
	$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
	// Pour rendre exploitable le résultat de la requete
	
	if(!empty($membre)){ // S'il existe bien un membre avec ce pseudo et ce MDP, je le connecte et j'affiche ses infos : 
		echo '<div style="background: green; padding: 10px; color: white" >';
		echo 'Félicitations, vous êtes connecté !<br/>';
		echo 'Prénom : ' . $membre['prenom'] . '<br/>'; 
		//echo 'Nom : ' . $membre['nom'] . '<br/>'; 
		echo 'Email : ' . $membre['email'] . '<br/>'; 
		echo 'MDP : ' . $membre['mdp'] . '<br/>'; 
		echo 'ID : ' . $membre['id_membre'] . '<br/>'; 
		echo '</div>';
	}
	else{
		echo '<p style="background: red; padding: 10px; color: white;">Erreur d\'identifiants !!</p>';
	}
}

?>


<html>
	<h1>Connexion</h1>
	<form action="" method="post">
		<label>Pseudo :</label>
		<input type="text" name="pseudo" /><br/><br/>
		
		<label>Mot de passe :</label>
		<input type="text" name="mdp" /> <br/><br/>
		
		<input type="submit" value="Connexion"/>
	
	</form>
</html>