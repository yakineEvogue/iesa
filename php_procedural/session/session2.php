<?php

session_start(); // le session_start() ouvre le fichier de session créé dans le fichier session1.php 

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>'; 
// les informations contenues dans le fichier de session sont donc disponibles, ici, alors que le fichier session2.php n'a rien à voir avec session1.php (pas inclusion de fichier). 