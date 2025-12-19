<?php 

// https://getcomposer.org/

/*
Composer permet d'installer, mettre à jour et utiliser des bibliothèque PHP

- Installer une bibliothèque (Faker, dump, PHPMailer ...)
- mettre à jour les versions
- charger automatiquement les class
- partager un projet facilement

// Lors de la mise en place de composer sur un projet nous retrouverons plusieurs choses :

- composer.json : le coeur du projet
    - des informations sur le projet 
    - les bibliothèque utilisées
    - la configuration de l'autoload

- composer.lock : la version exacte
    - les version des bibliothèques utilisées
    - leurs dépendances internes
    - on n'y touche pas !!! 

- vendor/ : les bibliothèques installées
    - on ne modifie jamais ce dossier à la main
    - on ne met pas son propre code dans ce dossier


*/

// on se positionne dans un dossier
// on lance cmd et on va dans le dossier 

# composer init

// Composer te demande le nom du projet, au format :
// vendor/nom-du-projet
    // initiation/php-composer

// Description []:
    // Découverte de Composer et Faker en PHP procédural

// Author [Mathi <email@example.com>, n to skip]:
    // on valide ou juste "n" pour ignorer

// Minimum Stability []: => entrée
// quel niveau de stabilité des bibliothèques on accepte.
// par défaut : stable
// possibilité : stable | RC | beta | alpha | dev 

// Package Type (e.g. library, project, metapackage, composer-plugin) []: => project
// quel type de package tu es en train de créer.
// project => Application finale (site, app, TP)
// library => Librairie réutilisable
// metapackage => Regroupe d’autres packages
// composer-plugin => Étend Composer lui-même

// License []: => entrée
// licence juridique du projet
// pas important car ce n'est pas un projet public (open-source)
/*
| Licence       | Signification            |
| ------------- | ------------------------ |
| `MIT`         | très permissive          |
| `GPL`         | libre mais contraignante |
| `Apache-2.0`  | permissive               |
| `proprietary` | code privé               |

*/

// Would you like to define your dependencies (require) interactively? [yes]?
    // yes
// pour choisir les bibliothèques maintenant

// Would you like to define your dev dependencies (require-dev) interactively [yes]?
// pour choisir les bibliothèques maintenant => dépendances uniquement pour le développement
// pour coder, pour déboguer, pour tester par exemple (pas nécessaire pour le projet en prod)

// Add PSR-4 autoload mapping? Maps namespace "Initiation\PhpComposer" to the entered relative path. [src/, n to skip]:
// PSR-4, c’est une règle qui permet à PHP de savoir où se trouve une classe simplement grâce à son namespace. Composer lit cette règle et charge les fichiers à notre place.
// Faire n pour le moment
// c'est un genre d'autoload

// Si yes : 
// Search for a package: fakerphp/faker

// Version => entrée ou ^1.24

// Search for a package: => entrée pour terminer

// Do you confirm generation? [yes] => yes