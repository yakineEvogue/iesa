<?php

//vendor
	//Manager
		// -> EntityRepository.php
		
namespace Manager; 

use PDO; 

class EntityRepository
{
	private $db; // cela va contenir mon objet PDO.
	
	//recup�rer l'objet PDO : 
	public function getDb(){
		$this -> db = PDOManager::getInstance() -> getPdo();
		return $this -> db; 
	}
	
	// R�cup�ration du nom de la table sur laquelle on souhaite travailler
	public function getTableName(){
		return strtolower(str_replace(array('Repository\\', 'Repository'), '', get_called_class()));
		
		// 1arg : qu'est-ce que je remplace, 2eme : par quoi je le remplace, 3eme dans quelle CC
		
		//Repository\produitRepository
		//produit
		
		// pour tester directement notre repository sur l'index on simule un nom de table :
		//return 'produit';
	}
	
	//---------------------
	
	//fonction pour r�cup�rer tous les enregistrements de la table : 
	public function findAll(){
		$req = "SELECT * FROM " . $this -> getTableName();
		$resultat = $this -> getDb() -> query($req);
		
		//Cela correspond � faire :
		//$resultat = $pod -> query("SELECT * FROM produit");
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName());
		//setFetchMode est tr�s pratique, car il nous permet de prendre les r�sultats de la requ�te et de cr�er un ou plusieurs objets de la class pass�e en argument. il va mettre les valeurs de l'enregistrement dans les propri�t� de notre objet correspond.

		//$objet = new Entity\produit
		//$objet -> reference = '';
		//$objet -> titre = '';
		//$objet -> categorie = '';
		//...
		
		$donnees = $resultat -> fetchAll(PDO::FETCH_ASSOC); 
		if(!$donnees){
			return FALSE; 
		}
		else{
			return $donnees;
		}
	}
	
	//fonction pour r�cup�rer un enregistrement par son id	:
	public function find($id){
		$req = "SELECT * FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . " = :id";
		$resultat = $this -> getDb() -> prepare($req);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT);
		$resultat -> execute(); 
		
		// revient � faire :
		//$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id")
		
		$resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this -> getTableName()); // me permet de r�cup�rer un objet de la bonne entity
		
		$donnees = $resultat -> fetch(PDO::FETCH_ASSOC);
		
		if(!$donnees){
			return FALSE;
		}
		else{
			return $donnees;
		}
	}
	
	
	//fonction pour inserer un enregistre dans une table : 
	public function register(){
		$req = "INSERT INTO " . $this -> getTableName() . " (" . implode(array_keys($_POST), ',') . ") VALUES (" . "'" . implode($_POST, "','") . "'" . ")";
		
		echo $req;

		//req = "INSERT INTO produit (reference, categorie) VALUES ('$_POST[reference]', '$_POST[categorie]')"
		// array_key() nous permet de parcourir les indices d'un ARRAY. Dans notre application les indices de $_POST (les names de nos champs) doivent absolument correspondre aux noms de nos champs dans nos tables.  
		
		$resultat = $this -> getDb() -> exec($req);
		return $resultat; // retourne le nombre de lignes affect�(e)s par la requ�te. 
		
		//Nous pourrions egalement retourner l'ID de l'enregistrement : 
		// return $this -> getDb -> lastInsertId();
	} 
	
	
	
	
	
	
	
	
	
	
	
	
}