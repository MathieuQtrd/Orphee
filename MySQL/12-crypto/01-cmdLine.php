<?php 

/*
// Pour PC
//--------
https://slproweb.com/products/Win32OpenSSL.html

Suivre les étapes.
- Une fois installé, il sera nécessaire (à priori) de rajouter le PATH dans les variables d'environnement
> Panneau de configuration > Systeme > parametres avancés > variables d'environnement
    > sur les variables systeme cliquer sur PATH > modifier > nouvelle > coller le chemin où se trouver OpenSSL
    > C:\Program Files\OpenSSL-Win64\bin

// Sur Mac
//--------
// https://brew.sh
// https://formulae.brew.sh/formula/openssl@3

// Linux
//------
// sudo apt update
// sudo apt install openssl


- Pour tester si tout est ok : 
> openssl version

-- Chiffrer et déchiffrer un fichier contenant du texte en ligne de commande
-- Créer un fichier (message.txt) contenant du texte

// Pour chiffrer : openssl enc -e
// on se positionne dans notre dossier
cd C:\wamp64\www\PHP_orphee_18\MySQL\12-crypto

openssl enc -e -aes-256-cbc -in message.txt -out message_chiffre.txt -pbkdf2 -iter 10000

// Pour dechiffrer : openssl enc -d
openssl enc -d -aes-256-cbc -in message_chiffre.txt -out message_dechifre.txt -pbkdf2 -iter 10000



- pbkdf2 : 
    - Utilise l'algorithme PBKDF2 (Password-Based Key Derivation Function 2) pour créer une clé sur un mot de passe
    - PBKDF2 applique un process de dérivation qui inclut des itérations et un "salt" (grain de sel) aléatoire rendant les attaques beaucoup plus difficile
    - Par défaut openssl utilise une mthode moins sécurisés et désormais obsolète

- iter :
    - Définit le nombre d'itération utilisées par PBKDF2 pour dériver la clé
    - plus le nombre d'itération est grand plus le process est lent
    - 10000 est une bonne base pour commencer
    - attention à avoir un équilibre entre sécurité et performance !


Liste des chiffrements :
------------------------
openssl list -cipher-algorithms

Liste des fonctions de hash
---------------------------
openssl list -digest-algorithms

Voir une clé publique
---------------------
openssl pkey -pubin public_key.pem -text -noout

Voir une clé privée (ne l'affiche pas complète)
--------------------
openssl pkey -pubin private_key.pem -text -noout


*/