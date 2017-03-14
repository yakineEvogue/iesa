<!Doctype html>
<html>
	<h1>Votre langue :</h1>
	<ul>
		<li><a href="?lang=fr">Français</a></li>
		<li><a href="?lang=es">Espagnol</a></li>
		<li><a href="?lang=it">Italien</a></li>
		<li><a href="?lang=an">Anglais</a></li>
	</ul>
</html>
<?php


if(isset($_GET['lang'])){ // est-ce qu'une langue a été sélectionnée via l'URL ? 
	$langue = $_GET['lang'];  
}
elseif(isset($_COOKIE['lang'])){ // Sinon est-ce qu'il existe un cookie "langue"
	$langue = $_COOKIE['lang'];
}
else{ // Sinon s'il n'y a ni info dans l'URL, ni dans les cookies, on déclare une valeur par défaut : fr 
	$langue = 'fr';
}

// On ressort de cette condition avec une valeur dans la variable $langue. Donc on va créer un cookie d'un an, précisant la langue à afficher grâce à $langue. 
//echo time(); // Nombre de secondes écoulées depuis le 1er janvier 1970
$annee = 360 * 24 * 60 * 60; 
//echo $annee; 

setCookie('lang', $langue, time() + $annee); // setCookie() permet de créer un cookie et attend 3 arguments : 
	// 1 : Le nom qu'on souhaite donner au cookie
	// 2 : La valeur qu'on va stocker (fr, ou it, ou es ou an)
	// 3 : durée de vie en timestamp

echo '<hr/>';
switch($langue){
	case 'fr' : 
		echo 'Bonjour, vous visiter ce site en français !'; 
	break; 
	
	case 'es' : 
		echo 'Hola, esta visitando este sitio en espanol !'; 
	break; 	
	
	case 'it' : 
		echo 'Ciao, sta visitando il sitio in italiano !'; 
	break; 	
	
	case 'an' : 
		echo 'Hello, you are curently visiting this website in english !'; 
	break; 	
}	


// Les cookies permettent de conserver des informations, tant que la date d'expération n'est pas atteinte, ou tant que l'utilisateur n'a pas supprimer ses cookies. 
// la session quant à elle permet de connecter un utilisateur, et de garder des informations tant qu'il est connecté. 
// Une session est lié à un utilisateur grâce à un cookie PHPSESSID, qui sera détruit lorsque l'utilisateur eteint son ordinateur. 




	
	
	
	
	