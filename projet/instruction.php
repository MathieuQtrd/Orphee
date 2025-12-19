<?php 

// début de la mise en place d'une eboutique
// 1 ère étape : gestion utilisateur
    // préparer les pages suivants :
    // index.php
    // connexion.php
    // inscription.php
    // profil.php
// mettre en place un enregistrement de l'inscription en utilisant un fichier texte (fopen)
    // champs attendus : 
        // nom (obligatoire)
        // prénom (obligatoire)
        // email (obligatoire + format)
        // ville (obligatoire)
        // code postal (obligatoire + numéric (5 chiffres))
        // adresse (obligatoire)
    // lors d'une inscription rajouter l'information status avec la valeur par défaut 'user'
    // dans un deuxième temps, créer un compte admin et changer directement dans le fichier le status en 'admin'

// mettre en place le module de connexion
    // si la connexion est ok : 
    // on place les informations de l'utilisateur dans la session
    // on redirige vers index ou profil
    // on change le menu 
        // utilisateur connecté : menu 
                                    // boutique (index)
                                    // profil
                                    // déconnexion
        // utilisateur non connecté : menu 
                                    // boutique (index)
                                    // connexion
                                    // inscription

    // mettre en place la déconnexion utilisateur

    // mettre en place des restructions d'accès
        // si l'utilisateur est connecté, il ne doit pas avoir accès aux pages : connexion et inscription
        // si l'utilisateur n'est pas connecté, il ne doit pas avoir accès aux pages : profil
