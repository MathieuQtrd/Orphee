<?php 

class A 
{
    public function calcul()
    {
        return 10;
    }
}

class B extends A 
{
    // il est possible de surcharger une methode de la class reçue en héritage, lors de l'appel, la methode de la class enfant est prioritaire
    public function calcul()
    {
        // parent:: représente la class reçue en héritage
        $nb = parent::calcul();

        if($nb < 50) {
            return 'La valeur est inférieure à 50';
        } else {
            return 'La valeur est surpérieure à 50';
        }
    }

    public function autreCalcul()
    {
        return parent::calcul();
    }

}

$objetA = new A;
$objetB = new B;

echo $objetA->calcul() . '<hr>';
echo $objetB->calcul() . '<hr>';
echo $objetB->autreCalcul() . '<hr>';