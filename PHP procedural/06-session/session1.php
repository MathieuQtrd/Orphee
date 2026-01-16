<?php 

// $_SESSION est une superglobale en revanche la session n'existe pas tant qu'on ne la pas créée.
// La création d'une session doit obligatoirement être avant le moindre affichage dans une page
// Une ouverture de session va créer un cookie côté utilisateur et un fichier de session côté serveur visible dans le dossier tmp/ du serveur

session_start(); // permet de créer ou d'ouvrir une session

// sess_gfv43djhfcs38iqdce0o98me5d // nom du fichier de la session
//      gfv43djhfcs38iqdce0o98me5d // valeur du cookie lié à la session

echo '<pre>'; var_dump($_SESSION); echo '</pre>';

// exemple : lors de la connexion utilisateur via le formulaire de connexion, on stocke les informations de l'utilisateur que l'on a récupéré depuis la BDD

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


echo '<pre>'; var_dump($_SESSION); echo '</pre>';

// on supprimer le password de la session
unset($_SESSION['user']['password']);

echo '<pre>'; var_dump($_SESSION); echo '</pre>';

// Il est possible de stocker le panier dans la session (ou toute autre sorte d'information)
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

echo '<pre>'; var_dump($_SESSION); echo '</pre>';

// pour supprimer la session :
echo 'SESSION DESTROY <hr><hr>'; 

// session_destroy(); 

// cette fonction ne sera exécutée qu'après la dernière ligne de ce script
// c'est pour ça que le var_dump suivant nous affiche toujours le contenu de la session

// echo '<pre>'; var_dump($_SESSION); echo '</pre>';