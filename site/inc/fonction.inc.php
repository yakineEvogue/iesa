<?php
// cr�ation d'une fonction debug pour faire les print_r() : 

// d�claration d'une fonction :
function debug($arg){
	//Traitements...		
	echo '<pre>'; 
	print_r($arg);
	echo '</pre>';
}

