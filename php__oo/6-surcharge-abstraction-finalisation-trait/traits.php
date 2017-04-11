<?php
// 6-surcharge-abstraction-finalisation-trait
	//-> traits.php
trait TPanier
{
	public $nbProduit = 1;
	public function affichageProduit(){
		return 'Affichage des produits !';
	} 
}

trait TMembre
{
	public function affichageMembre(){
		return 'Affichage des membres';
	}
}

class Site
{
	use TPanier, TMembre; 
}
//----------
$site = new Site;
echo $site -> affichageProduit() . '<br/>';
echo $site -> affichageMembre() . '<br/>';

/* 
	EN PHP il n'y a pas d'héritage multiple. Les traits ont donc été inventés pour repousser les limites de l'héritage. 
	Les traits existent à partir de la version 5.4 de PHP. Avant cela ne fonctionne pas. 
	Les traits sont un regroupement de méthodes et propriétés qui peuvent être importé(e)s par des classes. 
	Un trait n'est pas instanciable. 
	Un classe pour importer plusieurs traits. 
*/