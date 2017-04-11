<?php
// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));


// Session start
session_start();


// variables
$msg = '';


// chemin 
define('RACINE_SITE', '/iesa/php_procedural/site/');
define('RACINE_SERVEUR', $_SERVER['DOCUMENT_ROOT']);

//echo RACINE_SERVEUR . RACINE_SITE . '<hr/>';

// autres inclusions
require('fonction.inc.php');


