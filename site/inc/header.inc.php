<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="Mon Site">MonSite.com</a>
                </span>
				
				
				<nav>
				
		<?php if(userConnecte()) : ?>	
			<a href="profil.php">Profil</a>
			<a href="boutique.php">Boutique</a>
			<a href="panier.php">Panier</a>
			<a href="deconnexion.php">Deconnexion</a>	
		<?php else : ?>
			<a href="inscription.php">Inscription</a>
			<a href="connexion.php">Connexion</a>
			<a href="boutique.php">Boutique</a>
			<a href="panier.php">Panier</a>	
		<?php endif; ?>
				
				
		<?php if(userAdmin()) : ?>			
			<a href="backoffice/gestion_produit.php">Gestion produit</a>
		<?php endif; ?>			
					
					
					
				</nav>
				
				
				
				
			</div>
        </header>
        <section>
			<div class="conteneur">      