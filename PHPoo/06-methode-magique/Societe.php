<?php 
// #[\AllowDynamicProperties]
class Societe 
{
    public $nom;
    public $adresse;
    public $cp;
    public $ville;

    public function __construct($arg1, $arg2)
    {
        // Cette methode se déclenche automatiquement  lors d'un new
        // Cette methode récupère naturellement les arguments fournis lors de l'instanciation
        // new Societe($arg1, $arg2)
    }

    // Si on essaie d'affecter une propriété qui n'existe pas, elle sera créée dans l'objet (selon la version de PHP (déprécié depuis 8.2))
    // Nous avons la possibilité d'utiliser la methode magique __set() qui va se déclencher automatiquement lorsque l'on affecte une propriété inexistante et de prévoir un comportement
    public function __set($propriete, $valeur)
    {
        echo 'La propriété ' . $propriete . ' n\'existe pas, nous ne l\'avons pas affectée<br>';
    }

    // Si on appelle une propriété qui n'existe pas, on obtient une erreur undefined
    // Il est possible de gérer cette erreur en utilisant la methode magique __get() qui se déclenche automatiquement et nous permet de mùettre en place un comportement
    public function __get($propriete)
    {
        return 'La propriété ' . $propriete . ' n\'existe pas, veuillez vérifier votre code';
    }

    // Pour une methode inexistante : __call()
    public function __call($nom, $arguments)
    {
        return 'La méthode ' . $nom . ', n\'existe pas, veuillez vérifier votre code, voici les arguments fournis : ' . implode(' | ', $arguments);
        // https://www.php.net/manual/fr/function.implode.php
    }

    // Si on essaie d'afficher un objet avec un echo !
    public function __toString()
    {
        return 'Vous essayez d\'afficher un objet comme une chaine de caractère, ce n\'est pas cohérent !';
    }

    // __callStatic() : si on appelle une methode static qui n'existe pas
    // __isset() : lorsque l'on test l'existance d'une propriété qui n'existe pas
    // __destruct() : se déclenche à la fin du script avant que l'objet ne soit détruit. Par exemple pour en faire une sauvegarde ou autre ...
    // __clone() : Se lance lorsque l'on veut faire un clone de l'objet


}
$societe = new Societe('arg1', 'arg2');

$societe->telephone = '0102030405';

echo '<hr>';

echo $societe->telephone;

echo '<hr>';

echo $societe->affichage('un', 'deux', 'trois', 'quatre');

echo '<hr>';

echo $societe;


echo '<pre>'; var_dump($societe); echo '</pre>';
