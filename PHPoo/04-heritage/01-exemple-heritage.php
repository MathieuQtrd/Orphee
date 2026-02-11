<?php

class Membre 
{
    public $pseudo;
    public $address;
    public $email;

    public function __construct()
    {
        echo 'instanciation Membre';
    }

    public function register() 
    {
        return 'Je m\'inscrit';
    }

    public function login()
    {
        return 'Je me connecte';
    }

}

class Admin extends Membre
{
    // extends permet d'hériter d'une autre class. Lors de l'héritage, on récupère dans la class enfant les propriétés et methodes de la class parente (sauf les éléments en visibilité private !)
    // Une class ne peut hériter que d'une seule class à la fois.
    public function accessDashboard()
    {
        return 'ok pour accéder au back office';
    }

    // il est possible de surcharger une methode de la class parente. Dans ce cas, la methode de la class enfant est prioritaire
    public function register() 
    {
        return 'Je m\'inscrit, et on change le statut lors de l\'enregistrement ne bdd';
    }
}

$admin = new Admin;

echo '<pre>'; print_r($admin); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($admin)); echo '</pre>';

echo $admin->register() . '<br>';
echo $admin->login() . '<br>';
echo $admin->accessDashboard() . '<br>';