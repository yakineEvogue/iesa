<?php
// 6-surcharge-abstraction-finalisation-trait
	//-> finalisation.php

final class Application
{
	public function run(){
		return 'Lancement de l\'application';
	}
}

//class Extension extends Application{} //ERREUR : Une classe finale ne peut pas être héritée.

$app = new Application; // En revanche on peut l'instancier. 

//-------------------
class Application2
{
	final public function run2(){
		return 'Lancement de l\'application';
	}
}

class Extension extends Application2
{
	//public function run2(){} // Je ne peux pas surcharger ou redéfinir une méthode final

}
/*
 - Une class final ne peut pas être héritée, donc tout ce qui est à l'intérieur devra être utilisé sans surcharge ou sans redéfinition. 
 - Une clase final reste instanciable. 

 - Une méthode final peut être présente dans une classe normale. 
 - Une méthode final ne peut pas être surchargée ou redéfinie.

 Contexte : Je suis le développeur maître d'une application. Je souhaite que tous les dev' utilisent une ou plusieurs fonction(s) sans en changer le comportement. Ceci est encore une fois une bonne contrainte, dans le cadre d'une grosse application avec une équipe de plusieurs dev'. 
*/