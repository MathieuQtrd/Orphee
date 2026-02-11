<?php 

$tab = ['pommes', 'poires', 'cerises', 'kiwis'];

$objet = (object) $tab; // casting de type (ou converstion de type). On transforme le tableau en objet
// PHP étant un langage peu typé, il est possible de forcer un type. Dans ce cas PHP fait la conversion

echo '<pre>'; var_dump($objet); echo '</pre>';

// AVec cette approche, les propriétés sont des chiffres ...
// il est quand même possible de les appeler oO
echo $objet->{0} . '<br>';
echo $objet->{1} . '<br>';
echo $objet->{2} . '<br>';
echo $objet->{3} . '<br>';

// Il est préférable d'avoir des noms de propriété plutôt que des chiffres
$tab2 = ['login' => 'admin', 'email' => 'admin@mail.fr', 'address' => '1 rue de la fleur', 'postal_code' => '75000', 'city' => 'Paris'];

$objet2 = (object) $tab2;

echo '<pre>'; var_dump($objet2); echo '</pre>';
echo $objet2->login . '<br>';
echo $objet2->email . '<br>';

//----------

$objet3 = new stdClass;
echo '<pre>'; var_dump($objet3); echo '</pre>';
$objet3->prop1 = 'Hello';
echo '<pre>'; var_dump($objet3); echo '</pre>';

// Pour ajouter une methode dans mon objet 
// On utilise un closure (fonction anonyme)
// Non conventionnel !!!
$objet3->myMethod = function () {
    return 'Bonjour à tous';
};

// pour l'appel, attention au placement des parenthèses
echo ($objet3->myMethod)() . '<hr>';