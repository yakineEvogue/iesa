<?php
// $_GET représente l'URL. Il s'agit d'une superglobale et comme toutes les superglobales, c'est un tableau de données ARRAY. 

// ?   article=jean    &  couleur=bleu  &  prix=10
// ?   clé    =valeur  &  clé=valeur    &  clé=valeur

// un paramètre d'URL est toujours construit avec une clé et une valeur. Les clés deviennent les indices dans l' ARRAY $_GET. 
// Chaque paramètre est précédé de '&', et le premier est lui précédé de '?'. 

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