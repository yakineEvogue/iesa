<?php
// création d'une fonction debug pour faire les print_r() : 

// déclaration d'une fonction :
function debug($arg){
	//Traitements...		
	echo '<pre>'; 
	print_r($arg);
	echo '</pre>';
}

