<?php 

/*
Les namespaces avec PHP

    - Les namespace sont un moyen d'organiser et de structurer les classes de manière logique, permet d'éviter les conflits de nom, particulièrement dans les projets qui possèdent une multitude de class, des bibliothèques, modules ...

    - Sans les namespaces, toutes les classes seraient déclarées dans l'espace global, cela peut rapidement poser des soucis.
*/
namespace General;

require_once 'namespace_commercial.php';

// use Commerce1, Commerce2, Commerce3; // on utilise les namespace présent dans le fichier en require

// $commande = new Commerce1\Commande;

// var_dump($commande);

// $produit1 = new Commerce2\Produit;
// $produit2 = new Commerce3\Produit;

// var_dump($produit1);
// var_dump($produit2);

use Commerce1\Commande;
use Commerce2\Produit;
use Commerce3\Produit as Produit2;

$commande = new Commande;

$produit1 = new Produit;
$produit2 = new Produit2;

var_dump($commande);

var_dump($produit1);
var_dump($produit2);

/*
Fonctionnement des namespace avec les dossier de notre application

Il est recommandé de faire correspondre la structure des namespace avec la structure des dossiers pour mieux organiser notre projet

Exemple :

MonProjet/ 

    - App/ 
        - Model/ 
            - User.php                  => namespace : App\Model
            - Product.php               => namespace : App\Model

        - Controller
            - UserController.php        => namespace : App\Controller
            - ProductController.php     => namespace : App\Controller

    Les namespace sont génralement utilisés conjointement avec l'Autoload pour éviter de devoir inclure manuellement chaque fichier

    - Convention PSR-4 
    - https://www.php-fig.org/psr/psr-4/

    - Chaque class doit avoir un namespace qui correspond à sa structure de repertoire sur le serveur
    - Chaque class doit correspondre au nom du fichier dans lequel la class se trouve

*/

$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = ''; 
$options = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING, 
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
];

$pdo = new \PDO($host, $login, $password, $options);

var_dump($pdo);

// Sans l'antislash, on cherche PDO dans ce namespace ce qui provoque une erreur car nous ne sommes plus dans l'espace globale.
// l'antislash \ permet de sortir du namespace et de retrouner dans l'espace gloabl afin d'avoir accès à la class PDO