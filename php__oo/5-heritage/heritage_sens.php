<?php
//Dossier : 5-heritage
	// -> heritage_sens.php
	
class A
{
	public function test1(){
		return 'test1';
	}
	
	protected function test(){
		return 'test';
	}
}
//---------
class B extends A
{
	public function test2(){
		return 'test2';
	}
} 
//---------
class C extends B
{
	public function test3(){
		echo $this -> test(); // On peux utiliser une fonction protected de A grâce à la transitivité.
		return 'test3';
	}
}
//-------
//transitivité : Si B hérite de A et que C hérite de B... Alors C hérite de A !
$c = new C;
echo $c -> test1(); // Méthode de A accessible à C (héritage)
echo $c -> test2(); // Méthode de B accessible à C (héritage)
echo $c -> test3(); // Méthode de C accessible à C 

print_r(get_class_methods($c)); // Me retourne les 3 méthodes


/*
Héritage est : 
	- non reflexif : "class D extends D". On ne peut pas hérite de soi-même.
	- sans cycle : "class F extends E" il est pas possible "class E extends F"
	- non symétrique : "class X extends Y" cela ne signifie pas que "class Y extends X"
	- non multiple : Class G extends  I, H
*/
