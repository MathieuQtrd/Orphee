<?php 

/*
Les namespaces avec PHP

    - Les namespace sont un moyen d'organiser et de structurer les classes de manière logique, permet d'éviter les conflits de nom, particulièrement dans les projets qui possèdent une multitude de class, des bibliothèques, modules ...

    - Sans les namespaces, toutes les classes seraient déclarées dans l'espace global, cela peut rapidement poser des soucis.
*/

namespace Commerce1;

// echo __NAMESPACE__;

class Commande 
{
    public $commande = 2;
}

namespace Commerce2;

class Produit
{
    public $id = 15;
}

namespace Commerce3;

class Produit
{
    public $id = 23;
}