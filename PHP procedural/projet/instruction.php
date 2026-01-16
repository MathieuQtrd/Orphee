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
        // si l'utilisateur n'a pas le statut admin, il ne doit pas avoir accès au backoffice

// 2 eme étape
    // Gestion de contenu
    // dans une page backoffice mettre en place un form de création de contenu
    // création de produit
        // id_produit
        // titre
        // prix
        // stock
        // image_produit
        // categorie
        // description
        // autre : atille / couleur / matiere  ...
    // On enregistre les produit dans un fichier texte

    // pour le format json voir les fonction :
        // json_encode()
        // json_decode()

    // dans la page index (boutique)
        // on récupère les produit pour les afficher

    // 3 eme etape
        // donner la possibilite de faire un ajout panier
        // soit depuis la page index un bouton permettant de faire ajout panier
        // ou possibilité de faire une page produit avec un la possibilité de choisir une quantite et de faire un jout produit
        
        // faire une page panier qui affiche le contenu du panier
        // un bouton pour vider le panier
        // un bouton sur chaque produit pour supprimer un produit du panier
        // un bouton de paiement : on vide le panier et on met un message merci pour votre achat 

        // enregistrement de la commande sur un fichier texte

        // il serait interessant d'afficher sur la page profil les précédentes commandes de l'utilisateur
