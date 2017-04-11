<?php

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); // $pdo est un objet de la classe PDO. On parle d'instanciation. L'instanciation d ela classe PDO nécessite les informations suivantes : serveur de BDD, nom de la BDD, Login, MDP (root sur Mamp, et vide sur Wamp)

// $pdo représente notre connexion à la BDD. Grâce à $pdo j'ai accès à la base de données. 


// Faire une requête avec PDO : 
//$pdo -> query("SELECT * FROM employes WHERE prenom = 'jean-pierre'");
//$pdo -> exec("INSERT INTO employes (prenom, nom, salaire) VALUES ('yakine', 'hamida', 5101)"); 

// la différence entre la requete SELECT et les autres requêtes réside dans le fait que la requête SELECT me permet de récupérer des informations depuis la base de données. 



// 0 : Erreur volontaire de requête 
//$pdo -> query("dffdsfsdfsdfsd"); 
// Avec PDO, les erreurs SQL ne sont pas afffichées. Tant mieux, car cela signifierait que notre site est faillible. 
// En revanche nous avons deux options possibles pour les afficher : PDO:: ERRMODE_WARNING (message orange) ou PDO::ERRMODE_EXCEPTION (bloc try/catch qui récupère les erreurs). 

// 1 : REQUETE avec exec() (INSERT, DELETE, UPDATE, REPLACE)
$resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Yakine', 'HAMIDA', 'm', 'informatique', CURDATE(), '2500')"); 

echo 'Nombre de ligne(s) affectée(s) ' . $resultat . '<br/>';

/* 
La méthode exec() nous permet d'effectuer des requete REPLACE, INSET, UPDATE, DELETE. 
Valeurs de retour : 
	Succès : N (INT)  Nbre de lignes affectées
	Echec : FALSE (Bool)
*/


// 2 : REQUETE avec query() (SELECT, SHOW)

$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 350"); // JP LABORDE

// $resultat contient toutes les infos retournées par la requête. Il est sous la forme d'un objet de la classe PDOStatement, et est INEXPLOITABLE en l'état. 

// On aimerait récupérer les infos de l'employes 350 sous forme d'un array. 

$employe = $resultat -> fetch(PDO::FETCH_ASSOC); 

echo '<pre>';
print_r($employe);
echo '</pre>';

echo 'Bonjour ' . $employe['prenom'] . ' !<br/>';

/*
La méthode query() nous permet d'effectuer des requêtes SELECT ou SHOW, qui vont nous retourner des infos depuis la BDD. 
Valeurs de retours : 
	Succès : PDOStatement (OBJ)
	Echec : FALSE (Bool)
*/



//3 : REQUETE avec query() (SELECT, SHOW) avec plusieurs résultats.

$resultat = $pdo -> query("SELECT * FROM employes"); 

//$resultat est inexploitable. 

while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
	echo '<pre>';
	print_r($employes); 
	echo '</pre>';

	echo 'Bonjour ' . $employes['prenom'] . '!<hr/>';
}

/* 
La fonction fetch() de notre objet PDOstatement ($resultat) nous permet d'indexer les résultats sous la forme d'un ARRAY, donc exploitables. 
PDO::FETCH_ASSOC : indexation associative (les noms des champs de notre table deviennent les indices de notre ARRAY)
PDO::FETCH_NUM : indexation numérique (indice : 0, 1 etc..)
PDO::FETCH_OBJ : indexation sous forme d'objet
Sans argument : Indexation associative et à la fois numérique. 


Si notre requête nous retourne plusieurs resultats, il faut effectuer le fetch() dans une boucle . Car fetch() nous retourne un tableau par enregistrement et non pas un tableau avec tous les enregistrements !!!!!!!!


Si notre requete retourne 1 résultat : Pas de boucle
Si notre requete retourne plusieurs résultats : BOUCLE !!! 
Si notre requete retourne normalement 1 résultat mais potentiellement plusieurs : BOUCLE !! 
*/


//4 : REQUETE avec query() (SELECT, SHOW) avec plusieurs résultats et fetchAll()

$resultat = $pdo -> query("SELECT * FROM employes");
// $resultat est inexploitable !! 

// ma requete retourne plusieurs résultats !! ---> fetchAll()


$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($employes); 
echo '</pre>'; 

for($i = 0; $i < count($employes); $i++){
	echo 'Bonjour ' . $employes[$i]['prenom'] . '<hr/>';
}

foreach($employes as $valeur){
	echo 'Bonjour ' . $valeur['prenom'] . '<hr/>';
}





//5 : Requete prepare() puis execute() avec passage d'arguments via bindParam()

$id = '350'; // En admettant que $id soit une donnée sensible récupérée dans l'URL ou un formulaire (modifiable par l'utilisateur)

$resultat = $pdo -> prepare("SELECT * FROM employes WHERE id_employes = :id");
$resulat -> bindParam(':id', $id, PDO::PARAM_INT); 
$resultat -> execute();

// ---------- avec plusieurs données sensibles :

$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom OR service = :service");

$prenom = 'Amandine';
$service = 'Informatique';

$resultat -> bindParam(':prenom', $prenom, PDO::PARAM_STR);
$resultat -> bindParam(':service', $service, PDO::PARAM_STR);

$resultat  -> execute(); 


// Avec BindValue() :

$resultat = $pdo -> prepare("SELECT * FROM employes WHERE id_employes = :id");
$resulat -> bindValue(':id', '350', PDO::PARAM_INT); 
$resultat -> execute();


/* 
	Les requetes préparées nous permettent de gérer en partie la sécurité des données transmises via GET ou POST. (données sensibles !)
	
	Lorsqu'on prépare une requête on remplace les données  sensibles par un marqueur (soit ':' soit '?'). Ensuite on affecte les valeurs à ces données via bindParam() ou bindValue()
	Et enfin on éxécute la requête execute()

*/






