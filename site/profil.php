<?php 
require_once('inc/init.inc.php');


// extract() me permet de transformer les valeurs d'un array en variables... pratique, non ? 
extract($_SESSION['membre']);


require_once('inc/header.inc.php');
?>
<h1>Profil de <?= $pseudo ?></h1>

<div class="profil">
	<p>Bonjour <?= $pseudo?> !</p><br/>
	
	<div class="profil_img">
		<img src="img/default.jpg"/>
	</div>
	<div class="profil_infos">
		<ul>
			<li>Pseudo : <b><?= $pseudo ?></b></li>
			<li>Prénom : <b><?= $prenom ?></b></li>
			<li>Nom: <b><?= $nom ?></b></li>
		</ul>
	</div>
	<div class="profil_adresse">
		<ul>
			<li>Adresse : <b><?= $adresse ?></b></li>
			<li>Code Postal : <b><?= $code_postal ?></b></li>
			<li>Ville : <b><?= $ville ?></b></li>
		</ul>
	</div>
</div>






<?php 
require_once('inc/footer.inc.php');
?>