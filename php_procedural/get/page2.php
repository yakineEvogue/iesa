<?php
// $_GET repr�sente l'URL. Il s'agit d'une superglobale et comme toutes les superglobales, c'est un tableau de donn�es ARRAY. 

// ?   article=jean    &  couleur=bleu  &  prix=10
// ?   cl�    =valeur  &  cl�=valeur    &  cl�=valeur

// un param�tre d'URL est toujours construit avec une cl� et une valeur. Les cl�s deviennent les indices dans l' ARRAY $_GET. 
// Chaque param�tre est pr�c�d� de '&', et le premier est lui pr�c�d� de '?'. 

echo '<pre>'; 
print_r($_GET); 
echo '</pre>'; 

if($_GET){
	echo 'Couleur : ' . $_GET['couleur'] . '<br/>';
	echo 'Article : ' . $_GET['article'] . '<br/>';
	echo 'Prix : ' . $_GET['prix'] . '<br/>';
}

?>


<h1>Page 2</h1>
<a href="page1.php">< Retour vers la page 1</a>