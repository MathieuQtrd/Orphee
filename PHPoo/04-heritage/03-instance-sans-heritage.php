<?php 

// Une class ne peut hériter que d'une seule class à la fois
// En revanche il est tout à fait possible d'avoir un objet contenant d'autres objets

class A 
{
    public function direBonjour()
    {
        return 'Bonjour à tous';
    }
}

class B 
{
    public $maVariable;
    public function __construct()
    {
        $this->maVariable = new A;
    }

    public function direBonjour() {
        return 'Hello World';
    }

    public function uneMethode()
    {
        return $this->maVariable->direBonjour();
    }
}

$objetB = new B;

echo '<pre>'; var_dump($objetB); echo '</pre><hr>';
echo '<pre>'; var_dump(get_class_methods($objetB)); echo '</pre><hr>';
echo '<pre>'; var_dump(get_class_methods($objetB->maVariable)); echo '</pre><hr>';

echo $objetB->direBonjour() . '<br>';
echo $objetB->uneMethode() . '<br>';
echo $objetB->maVariable->direBonjour() . '<br>';
