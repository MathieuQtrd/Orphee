<?php 

class A 
{
    public function testA()
    {
        return 'A';
    }
}

class B extends A 
{
    public function testB()
    {
        return 'B';
    }
}

class C extends B 
{
    public function testC()
    {
        return 'C';
    }
}

$objet = new C;

echo '<pre>'; print_r($objet); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($objet)); echo '</pre>';
/*
Array
(
    [0] => testC
    [1] => testB
    [2] => testA
)
*/

echo $objet->testA() . '<br>';
echo $objet->testB() . '<br>';
echo $objet->testC() . '<br>';