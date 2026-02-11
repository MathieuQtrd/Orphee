<?php 

// pattern (ou modèle de conception, c'est une façon de répondre à un souci (récurrent))
// Le pattern singleton permet de garantir qu'une class n'a qu'une seule instance et fournit un point d'accès global à cette instance
    // Controle de l'instance : assure qu'une class n'a qu'une seule instance, utile pour des ressource partagée comme la connexion à la BDD, les gestionnaire de fichiers ...
    // Gestion des ressources : peut aider à gérer et à limiter les ressources couteuses, en s'assurant que ça ne soit créé qu'une seule fois
    // facilité de maintenance
    // ...

class Singleton 
{
    public $number = 20;
    private static $instance = null;

    private function __construct()
    {
        // la class n'est pas instanciable dans l'espace global avec un new
    }

    private function __clone() {} // l'objet ne sera pas clonable

    public static function getInstance()
    {
        if(is_null(self::$instance)) {
            // si l'instance n'existe pas encore, on la crée
            self::$instance = new Singleton; 
        }
        return self::$instance;
    }
}

// $obj = new Singleton; // Uncaught Error: Call to private Singleton::__construct()

$obj2 = Singleton::getInstance();
$obj3 = Singleton::getInstance();
$obj4 = Singleton::getInstance();
$obj5 = Singleton::getInstance();

echo '<pre>'; var_dump($obj2); echo '</pre><hr>';
echo '<pre>'; var_dump($obj3); echo '</pre><hr>';
echo '<pre>'; var_dump($obj4); echo '</pre><hr>';
echo '<pre>'; var_dump($obj5); echo '</pre><hr>';

$obj4->number = 35;

echo $obj4->number . '<hr>'; // 35

echo $obj2->number . '<hr>'; // 35