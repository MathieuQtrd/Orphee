<?php

// throw nous permet de lancer une exception
// catch nous permet d'attrpper l'exception

function rechercher($tab, $elem) 
{
    $elem = strtolower($elem);

    if(! is_array($tab) ) {
        // exit('Vous devez fournir un tableau array pour le bon fonctionnement');
        throw new Exception('Vous devez fournir un tableau array pour le bon fonctionnement');
    }

    if(empty($tab) ) {
        // il est possible de déclencher des erreurs lorsqu'on le souhaite selon le traitement.
        // throw new Exception('Le tableau est vide');
    }

    $position = array_search($elem, $tab);
    
    return $position;
}


$liste_fruit = ['pommes', 'poires', 'cerises', 'kiwis'];
$liste_fruit2 = [];
$liste_fruit3 = 'poires';


try {
    echo rechercher($liste_fruit, 'poires') . '<hr>';
    echo rechercher($liste_fruit2, 'poires') . '<hr>';
    echo rechercher($liste_fruit3, 'poires') . '<hr>';

    echo '<hr>BONJOUR A TOUS<hr>';

} catch(Exception $e) {

    // echo '<pre>'; print_r($e); echo '</pre>';
    // echo '<pre>'; print_r(get_class_methods($e)); echo '</pre>';

    echo 'Erreur : ' . $e->getMessage() . '<br>Sur le fichier ' . $e->getFile() . '<br>à la ligne : ' . $e->getLine() . '<hr>';

    if(property_exists($e, 'xdebug_message')) {
        // echo 'XDEBUG MESSAGE : ' . $e->xdebug_message . '<hr>';
        // VSCode peut vous mettre xdebug_message en rouge car se présence dépend d'un extension de PHP (xdebug)
    }
}


//----------------

// Pour PDO il est possible de choisir la gestion d'erreur, notamment en exception
// Dans tous les cas, lors d'une erreur à la connexion (new PDO(...)) on obtient obligatoirement une erreur de type PDOException

try {
    $host = 'mysql:host=localhost;dbname=entreprise';
    $login = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    
    $pdo = new PDO($host, $login, $password, $options);

    // try {
    //     $result = $pdo->query('SELECT prenom, nom, FROM employes');
    // } catch(PDOException $e) {
    //     // echo '<pre>'; print_r($e); echo '</pre>';
    //     echo 'ERREUR<br>';
    // }



} catch(PDOException $e) {

    echo '<pre>'; print_r($e); echo '</pre>';

}

