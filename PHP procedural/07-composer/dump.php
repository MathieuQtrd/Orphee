<?php 

// on se position dans la dossier concerné depuis notre console de ligne de commande (cmd / powershell/ terminal ...)
// cd ...

// https://github.com/symfony/var-dumper

# composer require symfony/var-dumper

require __DIR__ . '/vendor/autoload.php';

session_start();

$faker = Faker\Factory::create('fr_FR');

$tab = [
    'pseudo' => 'admin',
    'nom' => 'Quittard',
    'prenom' => 'Mathieu',
    'mail' => 'admin@mail.fr',
    'pseudo' => 75000,
    'competences' => [
        'PHP',
        'JS',
        'MySQL',
        'Laravel',
        'Symfony'
    ],
];

dump($tab);
dump($faker);


$_SESSION['user'] = [];
$_SESSION['user']['login'] = 'Mathieu';
$_SESSION['user']['password'] = 'rzr4gz4r4g4zeg543ze4gz';
$_SESSION['user']['email'] = 'Admin@mail.fr';
$_SESSION['user']['lastname'] = 'Quittard';
$_SESSION['user']['firstname'] = 'Mathieu';
$_SESSION['user']['address'] = '1 grand rue';
$_SESSION['user']['zip_code'] = '75000';
$_SESSION['user']['city'] = 'Paris';
$_SESSION['user']['status'] = 'client';

$_SESSION['cart'] = [];

$_SESSION['cart'][0]['title'] = 'pantalon';
$_SESSION['cart'][0]['price'] = 40;
$_SESSION['cart'][0]['quantity'] = '1';

$_SESSION['cart'][1]['title'] = 'Chemise';
$_SESSION['cart'][1]['price'] = 14;
$_SESSION['cart'][1]['quantity'] = '2';

$_SESSION['cart'][2]['title'] = 'Polo';
$_SESSION['cart'][2]['price'] = 11;
$_SESSION['cart'][2]['quantity'] = '1';

dump($_SESSION);