<?php

session_start();  // La fonction session_start() permet de cr�er un fichier de session s'il n'existe pas, ou de l'ouvrir s'il existe d�j�. (voir dossier /TMP/ de wamp) 

$_SESSION['pseudo'] = 'Yakine';
$_SESSION['mdp'] = '123456';

// $_SESSION : Superglobale (tableaux de donn�es). 

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>'; 

unset($_SESSION['mdp']); // La fonction unset() nous permet de vider une partie de la session

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';

// session_destroy(); // session_destroy() permet de d�truire la session (supression du fichier de session), mais cette fonction est ex�cut�e � lafin du script. 
echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';
