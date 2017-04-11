<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="Mon Site">MonSite.com</a>
                </span>
				
				
				<nav>
				
		<?php if(userConnecte()) : ?>	
			<a href="<?= RACINE_SITE ?>profil.php">Profil</a>
			<a href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
			<a href="<?= RACINE_SITE ?>panier.php">Panier</a>
			<a href="<?= RACINE_SITE ?>deconnexion.php">Deconnexion</a>	
		<?php else : ?>
			<a href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
			<a href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
			<a href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
			<a href="<?= RACINE_SITE ?>panier.php">Panier</a>	
		<?php endif; ?>
				
				
		<?php if(userAdmin()) : ?>			
			<a href="<?= RACINE_SITE ?>backoffice/gestion_produit.php">Gestion produit</a>
		<?php endif; ?>			
					
					
					
				</nav>
				
				
				
				
			</div>
        </header>
        <section>
			<div class="conteneur">      