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
		echo $this -> test(); // On peux utiliser une fonction protected de A gr�ce � la transitivit�.
		return 'test3';
	}
}
//-------
//transitivit� : Si B h�rite de A et que C h�rite de B... Alors C h�rite de A !
$c = new C;
echo $c -> test1(); // M�thode de A accessible � C (h�ritage)
echo $c -> test2(); // M�thode de B accessible � C (h�ritage)
echo $c -> test3(); // M�thode de C accessible � C 

print_r(get_class_methods($c)); // Me retourne les 3 m�thodes


/*
H�ritage est : 
	- non reflexif : "class D extends D". On ne peut pas h�rite de soi-m�me.
	- sans cycle : "class F extends E" il est pas possible "class E extends F"
	- non sym�trique : "class X extends Y" cela ne signifie pas que "class Y extends X"
	- non multiple : Class G extends  I, H
*/
