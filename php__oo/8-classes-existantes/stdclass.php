<?php
// 8-class_existantes
	// -> stdclass.php

$tab = array('Pomme', 'Orange', 'Cerise');
$objet = (object) $tab; // Caster : transformation

var_dump($objet); // Objet orphelin... issue de la clase STDCLASS

/*
	Un objet fait partie de la classe StdClass lorsque que celui est orphelin. C'est à dire il n'a pas été crée avec un new...

	exemple : $node dans drupal est issue de la classe StdClass
*/