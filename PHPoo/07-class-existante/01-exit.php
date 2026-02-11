<?php  

// exit() ou die()
// permettent de déclencher une erreur et de bloquer l'exécution du code à la suite.

function rechercher($tab, $elem) 
{
    $elem = strtolower($elem);

    if(! is_array($tab) ) {
        exit('Vous devez fournir un tableau array pour le bon fonctionnement');
    }

    $position = array_search($elem, $tab);
    
    return $position;
}


$liste_fruit = ['pommes', 'poires', 'cerises', 'kiwis'];
$liste_fruit2 = [];
$liste_fruit3 = 'poires';

echo rechercher($liste_fruit, 'poires') . '<hr>';
echo rechercher($liste_fruit2, 'poires') . '<hr>';
echo rechercher($liste_fruit3, 'poires') . '<hr>';

echo 'TEST';