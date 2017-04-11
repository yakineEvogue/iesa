<?php
// 6-surcharge-abstraction-finalisation-trait
	//-> interface.php

interface Mouvement
{
	public function deplacement(); // pas de contenu

}

class Bateau implements Mouvement // extends ne fonctionne pas avec les interfaces, on utilise le mot clé implements
{
	public function deplacement(){
		return 'se déplace !';
	}
}

class Avion implements Mouvement
{
	public function deplacement(){
		return 'se déplace !';
	}
}
//-------
//$mouv = new Mouvement; // Erreur, une interface ne peut pas être instanciée

/*
Un interface est liste méthodes (sans contenu), qui permet de garantir que toute classe qui implément l'interface contiendra les même méthodes avec le même nom. C'est le plan de fabrication des classes. Une sorte de contrat entre le dev' mâitre et les autres dev'. 

Une interface implémentée n'est pas un héritage. On peut à la hérité d'une classe, et implémenter une interface 
ex : 
class Bateau extends Vehicule implements Mouvement{}

De ma nière générale cela permet une meilleur conceptualisation. 
*/

