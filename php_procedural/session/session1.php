<?php

session_start();  // La fonction session_start() permet de créer un fichier de session s'il n'existe pas, ou de l'ouvrir s'il existe déjà. (voir dossier /TMP/ de wamp) 

$_SESSION['pseudo'] = 'Yakine';
$_SESSION['mdp'] = '123456';

// $_SESSION : Superglobale (tableaux de données). 

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>'; 

unset($_SESSION['mdp']); // La fonction unset() nous permet de vider une partie de la session

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';

// session_destroy(); // session_destroy() permet de détruire la session (supression du fichier de session), mais cette fonction est exécutée à lafin du script. 
echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';
