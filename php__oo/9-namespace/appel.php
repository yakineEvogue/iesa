<?php

//Dossier : 9-namespace
	// -> appel.php
	
namespace Appel; // Je crée le namespace Appel

require('autoload.php');

use Espace1;
use Espace2;
	
$objet = new Espace1\A;
echo $objet -> test() . '<br/>'; 



$objet2 = new Espace2\A;
echo $objet2 -> test() . '<br/>'; 