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



// autres inclusions
require('fonction.inc.php');


