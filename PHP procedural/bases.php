<?php 
    // rand() est une fonction prédéfinie permettant de nous renvoyer un entier aléatoire compris entre 2 entiers fournis en argument
    // faire en sorte que les titre de notre page aient une couleur aléatoire à chaque rechargement de page.
    $couleur = rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>PHP</title>
    <style>
        .bg-couleur {
            /* background-color: rgb(<?php echo $couleur ?>); */ 
            background-color: rgb(<?= $couleur ?>);
        }
    </style>
</head>

<body>
    <header class="p-5 bg-couleur text-white text-center">
        <h1>PHP Procédural</h1>
    </header>

    <div class="container border p-3 mt-5">
        <div class="row">
            <div class="col-12">

                <!-- commentaire html -->

                <?php

                // commentaire sur une ligne
                #  commentaire sur une ligne 

                /*
                    Commentaire 
                    sur plusieurs 
                    lignes
                */

                // il est possible d'écrire de l'html, du css et du js dans un fichier .php 
                // l'inverse n'est pas possible.

                // Chaque instruction doit se terminer par un point virgule ;

                // Liens utiles :
                // Doc officielle :                 php.net
                // Les bonnes pratiques :           https://phptherightway.com/
                // PHP Standard recommendation :    https://www.php-fig.org/psr/

                // Debuggage :                      https://stackoverflow.com/
                // Veille : reddit                  https://www.reddit.com/r/PHP/

                // Les ia ...

                // Sommaire :
                //-----------
                // 01 : Les instructions d'affichage
                // 02 : Variables : type, déclaration, affectation
                // 03 : La concaténation
                // 04 : Conditions et opérations de comparaison
                // 05 : Fonctions prédéfinies et utilisateurs
                // 06 : Boucles 
                // 07 : Tableaux de données array
                // 08 : Les inclusions
                // 09 : Les objets

                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 01 : Les instructions d'affichage
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">01 : Les instructions d\'affichage</h2>';

                // echo est une instruction d'affichage nous permettant de générer un code source

                echo 'Bonjour ';

                echo 'à tous<br>';

                // il existe aussi print (à éviter)

                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 02 : Variables : type, déclaration, affectation
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">02 : Variables : type, déclaration, affectation</h2>';

                // une variable est un espace nommé permettant de conserver une valeur, qu'il sera possible de modifier
                // une variable se déclare avec le signe $ 
                // caractères autorisés : 09 az AZ _ (une variable ne peut pas commencer par un chiffre)
                // PHP est sensible à la casse (une minuscule n'est pas une majuscule)

                // gettype() est une fonction prédéfinie permettant de connaitre le type d'une information

                $a = 'du texte'; // déclaration de la variable nommée "a" et affectation d'une valeur chaine de caractère
                echo gettype($a); // type : string
                echo '<br>';

                $a = 123;
                echo gettype($a); // type : integer (un entier)
                echo '<br>';

                $a = "123";
                echo gettype($a); // type : string
                echo '<br>';

                $a = 1.5;
                echo gettype($a); // type : double (float) : chiffre à virgule
                echo '<br>';

                $a = true; // ou TRUE ou false ou FALSE
                echo gettype($a); // type : boolean
                echo '<br>';

                // il existe array, object


                // Les constantes : 
                // Une constante comme une variable permet de conserver une valeur sauf que comme son nom l'indique, cette valeur restera constante.
                // définition e affectation avec define()
                // par convention d'écriture une constante s'écrit en majuscule
                define('URL', 'http://www.monsite.fr');

                define('TVA', 5.5);

                echo 'L\'adresse de mon site est : ';
                echo URL;
                echo '<br>';

                // TVA = 20; // parse error
                // define('TVA', 5.5); // erreur de type warning

                // Constante magique
                // deux underscores avant et après
                echo __FILE__; // chemin complet vers ce fichier C:\wamp64\www\PHP_orphee_18\bases.php
                echo '<br>';

                echo __LINE__; // le numéro de ligne : 132
                echo '<br>';

                echo __DIR__; // chemin complet vers ce dossier C:\wamp64\www\PHP_orphee_18
                echo '<br>';


                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 03 : La concaténation
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">03 : La concaténation</h2>';

                // raccourci d'écriture
                // la concaténation consiste à assembler des chaines de caractères les unes avec les autres quelles soient contenus dans des variables, des constantes, en resultat d'une fonction ou de texte pur.

                // le caractère utilisé est le point . (qu'on peut traduire par "suivi de")

                $x = 'Bonjour';
                $y = 'à tous';

                // sans concaténation :
                echo $x;
                echo ' ';
                echo $y;
                echo '<br>';

                // avec la concaténation
                echo $x . ' ' . $y . '<br>';

                // il est possible de concaténer avec la virgule , (ne fonctionne pas avec l'instruction print)
                echo $x, ' ', $y, '<br>';

                // Différence entre les parenthèses "" et les apostrophes ''
                // Dans des parenthèses, une variable sera reconnue et interprétée
                // Dans des apostrophes, tout est considéré comme du texte
                echo "$x $y <br>";
                echo '$x $y <br>';


                // concaténation lors de l'affectation
                $prenom = 'Mathieu ';
                $prenom = 'Sophie';

                echo $prenom . '<br>'; // affiche Sophie

                // Pour ajouter sans écraser l'existant : .=
                $prenom2 = 'Mathieu ';
                $prenom2 .= 'Sophie';
                // $prenom2 = $prenom2 . 'Sophie';

                echo $prenom2 . '<br>';

                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // Les opérateurs arithmétiques
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">Les opérateurs arithmétiques</h2>';

                $valeur1 = 10;
                $valeur2 = 5;

                // addition
                echo $valeur1 + $valeur2 . '<br>';
                // soustraction
                echo ($valeur1 - $valeur2) . '<br>';
                // division
                echo ($valeur1 / $valeur2) . '<br>';
                // multiplication
                echo ($valeur1 * $valeur2) . '<br>';
                // modulo (le restant de la division en terme d'entier)
                echo ($valeur1 % $valeur2) . '<br>'; // 0
                // puissance
                echo ($valeur1 ** $valeur2) . '<br>';


                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 04 : Conditions et opérations de comparaison
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">04 : Conditions et opérations de comparaison</h2>';

                // if elseif else

                $a = 10;
                $b = 5;
                $c = 2;

                // if else
                if ($a > $b) {
                    echo 'Vrai<br>';
                } else { // jamais de parenthèse sur un else, il représente toutes les autres possibilités
                    echo 'Faux<br>';
                }

                // Plusieurs conditions : ET => &&
                if ($a > $b && $b > $c) {
                    echo 'Ok pour les deux conditions<br>';
                } else {
                    echo 'L\'une ou l\'autre ou les deux condition est fausse<br>';
                }

                // au moins  une des conditions : OU => ||
                if ($a > $b || $b < $c) {
                    echo 'Ok pour au moins une des conditions<br>';
                } else {
                    echo 'Toutes les condition sont fausses<br>';
                }


                // plusieurs conditions
                // autant de elseif que l'on souhaite
                $a = 10;
                $b = 5;
                $c = 2;

                if ($a == 9) {
                    echo 'Réponse 1<br>';
                } elseif ($b > 7) {
                    echo 'Réponse 2<br>';
                } elseif ($a != 10) {
                    echo 'Réponse 3<br>';
                } else { // cas par défaut
                    echo 'Réponse 4<br>'; // 4
                }

                /*
                    Opérateurs de comparaison
                    -------------------------
                    =   Affectation. (ce n'est pas un opérateur de comparaison)
                    ==  est égal à
                    !=  est différent de
                    <>  est différent de
                    === est strictement égal de en terme de valeur ET de type
                    !== est strictement différent en terme de valeur ET/OU de type
                    >   est strictement supérieur à
                    >=  est supérieur ou égal  à
                    <   est strictement inférieur à
                    <=  est inférieur ou égal  à
                */

                // comparaison sur la valeur
                $a1 = 1; // int
                $a2 = '1'; // string
                $a3 = true; // boolean

                if ($a1 == $a2) {
                    echo 'C\'est les mêmes valeurs<br>'; // ok
                } else {
                    echo 'Les valeurs sont différentes<br>';
                }

                // comparaison stricte (comparaison sur la valeur et le type)
                if ($a1 === $a2) {
                    echo 'C\'est les mêmes valeurs et les mêmes types<br>';
                } else {
                    echo 'Les valeurs et/ou les types sont différentes<br>'; // ok
                }
                // la comparaison stricte est important lorsque que je peux obtenir la réponse 0 (une valeur ou une position par exemple) pour ne pas la confondre avec false.


                // Autre possibilité d'écriture :
                // si le else n'est pas géré, ilest possible de ne pas l'écrire
                if ($a1 === $a2) {
                    echo 'C\'est les mêmes valeurs et les mêmes types<br>';
                }

                // il est possible de remplacer les accolades par : et end(if) 
                if ($a1 === $a2) :
                    echo 'C\'est les mêmes valeurs et les mêmes types<br>';
                else :
                    echo 'Les valeurs et/ou les types sont différentes<br>'; // ok
                endif;


                // s'il n'y a qu'une seule instriction par cas, il est possible de ne rien mettre.
                if ($a1 === $a2)
                    echo 'C\'est les mêmes valeurs et les mêmes types<br>';
                else
                    echo 'Les valeurs et/ou les types sont différentes<br>'; // ok

                // écriture ternaire
                // condition ? vrai : faux;
                echo ($a1 === $a2) ? 'C\'est les mêmes valeurs et les mêmes types<br>' : 'Les valeurs et/ou les types sont différentes<br>';


                echo '<hr><hr>Isset / Empty<hr><hr>';
                // isset / empty
                //---------------
                // isset => permet de savoir si une variable est définie (existe)
                // empty => permet de savoir si une variable ne contient rien (vide)

                // $existe_pas = 123;

                if (isset($existe_pas)) {
                    echo $existe_pas . '<br>';
                } else {
                    echo 'Cette variable n\'existe pas<br>';
                }

                $pseudo = ''; // valeurs considérées come vide : false, 0, 0.0, -0, '0', une chaine vide '' ou "", un tableau array ou la valeur null

                if (empty($pseudo)) {
                    echo '<div class="alert alert-danger">Le pseudo est obligatoire</div>';
                } else {
                    echo '<div class="alert alert-success">Bonjour ' . $pseudo . ', bienvenue sur notre site</div>';
                }

                //----

                echo '<hr><hr>Switch<hr><hr>';

                $couleur = 'Jaune';

                switch ($couleur) {
                    case 'bleu':
                        echo 'Vous aimez le bleu<br>';
                        break;
                    case 'vert':
                        echo 'Vous aimez le vert<br>';
                        break;
                    case 'gris':
                        echo 'Vous aimez le gris<br>';
                        break;
                    default:
                        echo 'Vous n\'aimez ni le bleu, ni le vert ni le gris<br>';
                        break;
                }

                // exercice : refaire ce traitement avec if

                $couleur = 'Jaune';
                if ($couleur == 'bleu') {
                    echo 'Vous aimez le bleu<br>';
                } elseif ($couleur == 'vert') {
                    echo 'Vous aimez le vert<br>';
                } elseif ($couleur == 'gris') {
                    echo 'Vous aimez le gris<br>';
                } else {
                    echo 'Vous n\'aimez ni le bleu, ni le vert ni le gris<br>';
                }

                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 05 : Fonctions prédéfinies et utilisateurs
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">05 : Fonctions prédéfinies et utilisateurs</h2>';

                // fonctions prédéinies : déjà inscrite au langage (php.net)
                // date() - https://www.php.net/manual/fr/function.date.php
                // Pour les formats disponibles : https://www.php.net/manual/fr/datetime.format.php

                date_default_timezone_set('Europe/Paris'); // permet de préciser le fuseau concerné.

                echo 'Nous sommes le ' . date('d/m/Y') . ' et il est : ' . date('H:i:s') . '<hr>';


                // Traitement de chaine de caractères :
                // strlen() // permet de compter la taille d'une chaine en terme d'octets
                // iconv_strlen() // permet de compter la taille d'une chaine en nombre de caractères (par défaut basé sur l'utf-8)

                $pseudo = 'admin';

                // trim() permet de supprimer les espaces en début et en fin de chaine 

                $pseudo = trim($pseudo);

                if (iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14) {
                    echo 'Erreur : le pseudo doit avoir entre 4 et 14 caractères inclus<hr>';
                } else {
                    echo 'Pseudo ok';
                }

                echo '<hr><hr>Fonctions utilisateur<hr><hr>';

                // déclarée et exécutée par le dev
                // Il est possible d'appeler une fonction avant sa déclaration.

                // déclaration :
                function separateur()
                {
                   echo '<hr><hr><hr>';
                }

                // exécution :

                separateur();

                // si la fonction contient un echo, l'affichage sera automatique lors de l'appel
                // Sinon si on souhaite un affichage, c'est à nous de mettre un echo lors de l'appel

                // fonction avec argument
                function dire_bonjour($qui)
                {
                    return 'Bonjour ' . $qui . ', bienvenue sur notre site<hr>';
                }

                echo dire_bonjour('Mathieu');
                echo dire_bonjour(12345);
                echo dire_bonjour('Admin');

                // il est possible de passer une valeur par défaut à un argument pour le rendre facultatif
                function prix_ttc($prix, $tva = 1.2)
                {
                    return 'Prix HT : ' . $prix . ', Prix TTC : ' . ($prix * $tva) . ' €<br>';
                    echo 'HELLO WORLD !'; // cette ligne ne sera jamais exécutée, car un return nous fait soprtir de la fonction
                }

                echo prix_ttc(1000); // 20 de tva (cas par defaut)
                echo prix_ttc(1000, 1.055); // 5.5 de tva
                echo prix_ttc(1000, 1.2);

                // Environnement (Scope)
                // Environnement global : tout le script
                // Environnement local : à l'intérieur d'une fonction
                    // Une variable déclarée dans une fonction (espace local) n'existe pas à l'extérieur de la fonction
                    
                separateur();

                $animal = 'chien'; // global

                function jardin()
                {
                    $animal = 'chat'; // local
                    return $animal;
                }

                echo $animal . '<br>'; // chien
                jardin();
                echo $animal . '<br>'; // chien

                $ville = 'Montpellier';

                function location()
                {
                    global $ville; // permet de récupérer une variable depuis l'espace global dans la fonction
                    return $ville . '<br>';
                }
                echo location();

                separateur();


                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 06 : Boucles
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">06 : Boucles</h2>';

                // Pour mettre en place une boucle, nous avons besoin de 3 informations :
                // 01 : une valeur de départ (compteur)
                // 02 : une condition d'entrée
                // 03 : une incrémentation ou décrémentation.

                // while 
                $i = 0; // compteur

                while($i < 10) { // condition d'entrée
                    echo $i . ' ';
                    $i++; // incrémentation, équivaut à écrire $i = $i + 1;
                }

                separateur();

                // for
                // for(valeur_de_depart; condition; incrementation)
                for($i = 0; $i < 10; $i++) {
                    echo $i . ' ';
                }



                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 07 : Tableaux de données array
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">07 : Tableaux de données array</h2>';

                // Outil de base : une variable simple => (qui contient une valeur)
                // Outil amélioré : une variable contenant un ensemble de valeur => (un tableau array)
                // Outil amélioré : une variable contenant un ensemble de valeur (propriété) et de fonction (methode) => (un objet)

                // Un tableau array est toujurs composé de deux colonnes :
                // une conlonne contenant l'indice (index) : la position
                // une colonne contenant la valeur correspondante
                // On passera toujours par l'indice afin d'obtenir la valeur

                $tab_fruit = array('Pommes', 'Poires', 'Cerises', 'Abricots');

                echo gettype($tab_fruit) . '<br>';

                // echo $tab_fruit; // erreur

                // Pour voir l'intégralité d'un tableau : print_r
                echo '<pre>';
                print_r($tab_fruit);
                echo '</pre>';

                // deuxième outil pour voir l'intégralité d'un tableau : var_dump
                echo '<pre>';
                var_dump($tab_fruit);
                echo '</pre>';

                // Pour récupérer une des valeur du tableau
                echo $tab_fruit[1] . '<br>';

                // Pour rajouter un élément dans mon tableau :
                $tab_fruit[] = 'Ananas';

                echo '<pre>'; print_r($tab_fruit); echo '</pre>';

                // Pour rajouter un élément dans mon tableau :
                $tab_fruit[5] = 'Oranges';
                $tab_fruit[] = 'Mandarines';

                echo '<pre>'; print_r($tab_fruit); echo '</pre>';

                // Autre façon de déclarer un tableau : 
                // avec les crochets
                $tab_jour = ['lundi', 'mardi', 'mercredi'];

                echo '<pre>'; print_r($tab_jour); echo '</pre>';

                // Autre façon de déclarer un tableau :
                $tab_categories[] = 'Pantalons';
                $tab_categories[] = 'Chemises';
                $tab_categories[] = 'Tshirts';
                $tab_categories[] = 'Polos';

                echo '<pre>'; print_r($tab_categories); echo '</pre>';

                // array_push(tableau, valeur1, valeur2, valeur3, ...)
                array_push($tab_categories, 'Echarpes', 'Shorts');

                echo '<pre>'; print_r($tab_categories); echo '</pre>';

                // taille du tableau :
                $taille = count($tab_categories);

                echo $taille . '<br>';

                // Affichage du tableau dans une liste ul li
                echo '<ul>';
                
                for($i = 0; $i < $taille; $i++) {
                    echo '<li>' . $tab_categories[$i] . '</li>';
                }

                echo '</ul>';

                // Il est possible de choisir nous mêmes les indices du tableau lors de la déclaration du tableau

                $password = password_hash('soleil', PASSWORD_DEFAULT);

                $tab_user = ['id' => 10, 'login' => 'admin', 'password' => $password, 'postal_code' => 34000, 'city' => 'Montpellier', 'mail' => 'admin@mail.fr'];

                $tab_user = [
                            'id' => 10, 
                            'login' => 'admin', 
                            'password' => $password, 
                            'postal_code' => 34000, 
                            'city' => 'Montpellier', 
                            'mail' => 'admin@mail.fr'
                        ];

                echo '<pre>'; print_r($tab_user); echo '</pre>';

                echo dire_bonjour($tab_user['login']);
                echo 'Votre mail de contact est : ' . $tab_user['mail'] . '<hr>';

                // Pour supprimer un élément du tableau : unset()
                unset($tab_user['password']);

                echo '<pre>'; print_r($tab_user); echo '</pre>';

                // La boucle foreach() permet de tourner sur un tableau
                // selon l'écriture, on peut récupérer juste la valeur ou à la fois l'indice et la valeur

                // foreach(tableau AS valeur)
                // foreach(tableau AS index => valeur)


                echo '<ul>';
                
                foreach($tab_user AS $info) {
                    echo '<li>' . $info . '</li>';
                }

                echo '</ul>';

                echo '<ul>';
                
                foreach($tab_user AS $indice => $info) {
                    echo '<li>' . $indice . ' : ' . $info . '</li>';
                }

                echo '</ul>';


                // il est possible d'avoir un ou des tableaux dans un tableau array : tableau multidimensionnel

                $panier = [
                    0 => [
                        'titre' => 'tshirt gris',
                        'quantite' => 1,
                        'prix' => 10
                    ],
                    1 => [
                        'titre' => 'chemise rayée',
                        'quantite' => 1,
                        'prix' => 25
                    ],
                    2 => [
                        'titre' => 'Echarpe rouge',
                        'quantite' => 2,
                        'prix' => 7
                    ],
                    3 => [
                        'titre' => 'chaussure',
                        'quantite' => 1,
                        'prix' => 70
                    ],

                ];

                echo '<pre>'; print_r($panier); echo '</pre>';

                // Pour piocher dans un tableau multidimensionnel : succession de crochets pour chaque niveau concerné
                echo $panier[1]['titre'] . '<hr>';

                echo '<ul class="list-group">';

                foreach($panier AS $produit) {
                    // echo '<pre>'; print_r($produit); echo '</pre>';
                    echo '<li class="list-group-item"><ul>';
                    foreach($produit AS $index => $value) {
                        echo '<li><b>' . $index . '</b> : ' . $value . '</li>';
                    }   
                    echo '</ul></li><hr>';
                }

                echo '</ul>';

                // Affichez le contenu du panier dans un tableau html 
                // la première ligne du tableau contient le nom des colonnes
                // en fin de ligne de chaque produit, affichez le prix selon la quantité
                // et dernière ligne du tableau affichez le prix total du panier. (119)

                $total = 0;
                echo '<table class="table table-bordered">';

                echo '<tr>';
                foreach($panier[0] AS $indice => $valeur) {
                    echo '<th>';
                    if($indice == 'prix') {
                        echo 'Prix unitaire';
                    } else {
                        echo ucfirst($indice);
                    }                    
                    echo '</th>';
                }
                echo '<th>Prix</th>';
                echo '</tr>';

                foreach($panier AS $produit) {
                    $prix = $produit['prix'] * $produit['quantite'];
                    $total += $prix; // $total = $total + $prix;
                    echo '<tr>';
                    foreach($produit AS $info) {
                        echo '<td>' . $info . '</td>';
                    }
                    echo '<td>' . $prix . '</td>';
                    echo '</tr>';
                }

                echo '<tr><td colspan="3" class="text-end"><b>Total : </b></td><td>' . $total . ' €</td></tr>';


                echo '</table>';

                separateur();

                $total = 0;
            ?>

            <table class="table table-bordered">
                <tr>
                    <th>Titre</th>                
                    <th>Quantité</th>                
                    <th>Prix unitaire</th>                
                    <th>Prix</th>                
                </tr>
                <?php 
                    foreach($panier AS $produit) : 
                        $prix = $produit['prix'] * $produit['quantite'];
                        $total += $prix;
                ?>
                <tr>
                    <td><?= $produit['titre'] ?></td>
                    <td><?= $produit['quantite'] ?></td>
                    <td><?= $produit['prix'] ?></td>
                    <td><?= $prix ?></td>
                </tr>
                <?php endforeach; ?>
                <tr><td colspan="3" class="text-end"><b>Total : </b></td><td><?=  $total ?> €</td></tr>

            </table>


            <?php

                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 08 : Les inclusion
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">08 : Les inclusion</h2>';

                // il est possible de découper son projet en plusieurs fichier contenant du code puis de les inclure dans un même page.

                echo '<h3>Premier appel avec include</h3>';
                include 'exemple.inc.php';

                echo '<h3>Deuxième appel avec include_once</h3>';
                include_once 'exemple.inc.php';

                echo '<h3>Premier appel avec require</h3>';
                require 'exemple.inc.php';

                echo '<h3>Deuxième appel avec require_once</h3>';
                require_once 'exemple.inc.php';

                // différence entre include et require :
                    // En cas d'erreur :
                        // include va provoquer un warning et laisser le code à suite s'exécuter
                        // require va provoquer une erreur fatale et bloquer l'exécution du code à la suite.


                //-------------------------------------------------------------------
                //-------------------------------------------------------------------
                // 09 : Les objets
                //-------------------------------------------------------------------
                //-------------------------------------------------------------------

                echo '<h2 class="bg-couleur p-3 text-white">09 : Les objets</h2>';

                // Outil de base : une variable simple => (qui contient une valeur)
                // Outil amélioré : une variable contenant un ensemble de valeur => (un tableau array)
                // Outil amélioré : une variable contenant un ensemble de valeur (propriété ou attribut) et de fonction (methode) => (un objet)

                // dans un objet il y a une notion de visibilité, pour le moment on ne parlera que de la visibilité public (sinon il y a protected et private)

                // Un objet est toujours issu d'une class (modèle de construction)

                class User 
                {
                    // propriétés
                    public $pseudo = 'Admin';
                    public $mail = 'admin@mail.fr';
                    public $age = 40;
                    public $ville = 'Paris';
                    public $competences = ['PHP', 'SQL', 'JS'];

                    // methodes
                    public function location () {
                        // $this représente l'objet qui sera créé
                        return $this->ville;
                    }
                }

                // création de l'objet 
                $user1 = new User;

                echo '<pre>'; var_dump($user1); echo '</pre>';

                // pour voir les methodes :
                echo '<pre>'; var_dump(get_class_methods($user1)); echo '</pre>';

                // pour appeler une propriété ou une methode on utilise la fleche ->

                echo 'Bonjour ' . $user1->pseudo . ', votre mail est : ' . $user1->mail . ' et vous êtes situé dans la ville : ' . $user1->ville . '<hr>';
                
                // Si l'information est public, il est possible de modifier directement sur l'objet
                $user1->ville = 'Montpellier';
                
                echo 'Bonjour ' . $user1->pseudo . ', votre mail est : ' . $user1->mail . ' et vous êtes situé dans la ville : ' . $user1->location() . '<hr>';





































                ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>

</html>