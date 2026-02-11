<?php 

// Les class abstraites permettent d'imposer une structure de base ou un modèle pour les class dérivées
// Une class abstraite ne peut pas être directement
// Les methodes abstraites n'ont pas de contenu
// Lorsqu'une class hérite d'une methode abstraite, elle est obligée de la redéclarer
// Une methode abstraite ne peut être que dans une class abstraite
// Une class abstraite peut aussi contenir des methodes classiques

abstract class Joueur 
{
    public $nomDuSite = 'poker.com';

    public function seConnecter()
    {
        return $this->etreMajeur();
    }

    abstract public function etreMajeur();
    abstract public function devise();
}

// $joueur1 = new Joueur; // Uncaught Error: Cannot instantiate abstract class

class JoueurFR extends Joueur
{
    public function etreMajeur()
    {
        return 18;
    }

    public function devise() 
    {
        return '€';
    }
}

class JoueurUS extends Joueur
{
    public function etreMajeur()
    {
        return 21;
    }

    public function devise() 
    {
        return '$';
    }
}
// $joueur1 = new 

$joueur1 = new JoueurFR;
$joueur2 = new JoueurUS;

echo 'Bienvenue sur ' . $joueur1->nomDuSite . ', age légal pour pouvoir jouer au poker pour un joueur français : ' . $joueur1->etreMajeur() . ', devise : ' . $joueur1->devise() . '<hr>';
echo 'Bienvenue sur ' . $joueur1->nomDuSite . ', age légal pour pouvoir jouer au poker pour un joueur américain : ' . $joueur2->etreMajeur() . ', devise : ' . $joueur2->devise() . '<hr>';