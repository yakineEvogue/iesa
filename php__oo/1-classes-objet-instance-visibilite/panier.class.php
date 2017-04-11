<?php
//Dossier : 01-classe-objet-instance-visibilite

class Panier
{
	public $nbProduit; // Propriété
	
	public function ajouterProduit(){
		return 'Le produit a été ajouté';
	}
	
	protected function retirerProduit(){
		return 'Le produit a été retiré';
	}
	
	private function affichePanier(){
		return 'Voici le panier';
	}
}
//------------------
$panier1 = new Panier; // Instanciation (création d'un objet de la classe panier
echo '<pre>';
var_dump($panier1);
echo '</pre>';

echo '<pre>';
var_dump(get_class_methods($panier1));
echo '</pre>';

$panier1 -> nbProduit = 5;

echo 'Panier 1 : ' . $panier1 -> nbProduit . ' produit(s) dans le panier <br/>'; // OK, propriété public

echo 'Panier 1 : ' . $panier1 -> ajouterProduit() . '<br/>'; // OK, méthode public

//echo 'Panier 1 : ' . $panier1 -> retirerProduit() . '<br/>'; // ERREUR, la méthode est protected. Elle est accessible depuis la classe et depuis les classes enfants. 

//echo 'Panier 1 : ' . $panier1 -> affichePanier() . '<br/>'; // ERREUR, la méthode est private. Elle est accessible uniquement depuis la classe

/*
Niveau de visibilité : 
	public : Accessible de partout
	protected : accessible depuis la classe et les enfants (classes héritières)
	private : Accessible UNIQUEMENT depuis la classe

Divers :
	new : permet d'effectuer une instanciation (création d'un nouvel objet)
	Une classe peut produire plusieurs objets
	$panier1 représente un objet de la classe Panier.
*/






