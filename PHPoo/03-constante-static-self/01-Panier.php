<?php 

/*
- Les constantes : 
    - Les constantes dans une class permettent de définir des valeurs ne pouvant pas être modifiée
    - On considère une constante comme un élément static (qui appartient à la class et non pas à l'objet)
    - Par défaut une constante est publique

    - Dans l'espace global on défini une constante avec define('SON_NOM', 'sa valeur')
    - Dans une class : avec le mot clé const

- Les propriétés et methodes static
    - Un élément static appartient à la class et non pas à l'objet
    - il est possible d'accèder à un élément static sans créer d'objet
    - Nouvelle syntaxe : Class::static

- Self 
    - $this se réfère à l'objet qui sera créé
    - self se réfère à la class
*/

class Panier 
{
    const TVA = 20;
    public static $total = 0;
    public $nomPanier = 'Panier1';

    public static function setPrixTotal($nouveauTotal)
    {
        self::$total = $nouveauTotal;
    }

    public static function getTotal()
    {
        return self::$total;
    }

}

$panier1 = new Panier;

echo '<pre>'; var_dump($panier1); echo '</pre><hr>';
// $panier1->TVA; // Undefined property: Panier::$TVA

echo Panier::TVA . '<br>';
Panier::setPrixTotal(40);

echo Panier::getTotal() . '<hr>';

echo $panier1->nomPanier . '<br>';


// Les lignes suivantes fonctionnent mais ce n'est pas conventionnel. Fortement déconseillé pour la lisibilité du code !!!

echo $panier1::$total . '<hr>'; // à éviter
Panier::setPrixTotal(100);
echo $panier1::getTotal(); // à éviter
