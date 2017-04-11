<?php

//explode() : 
$phrase = 'Nous sommes lundi !';

$tab = explode(' ', $phrase);
echo '<pre>';
print_r($tab);
echo '</pre>';


//implode() : 
$tab2 = array(
	"Il",
	"fait",
	"pas",
	"beau",
	"aujourd'hui"
);
echo '<pre>';
print_r($tab2);
echo '</pre>';

$phrase2 = implode($tab2, ' ' );
echo $phrase2;