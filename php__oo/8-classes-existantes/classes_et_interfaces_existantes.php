<?php
// 8-class_existantes
	// -> classes_et_interfaces_existantes.php

echo '<pre>';
print_r(get_declared_classes());
echo '</pre>';

echo '<pre>';
print_r(get_declared_interfaces());
echo '</pre>';

/* 
Cela nous permet d'afficher toutes les classes et interfaces existante par défault dans le PHP. On peut en reconnaitre certaines, comme mysqli et PDO par exemple ! 

*/