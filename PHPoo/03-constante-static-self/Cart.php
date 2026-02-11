<?php  

// EXERCICE :
    // refaire un panier en mode singleton
    // Propriétés :
        // private static instance
        // private items (sous form d'array)
        // private tva 0.20

    // methodes
        // __construct
        // __clone
        // getInstance

        // addItem($productId, $name, $quantity, $UnitPrice) // pour rajouter un produit dans $items
        
        // getItem()

        // removeItem($productId) // pour retirer un produit de $items

        // clearCart() // pour vider $items

        // calculateTotalHT() // calculer le montant total hors taxe

        // calculateTotalTVA() // calculer le montant total TTC

        // calculateTVA() // calculer le montant de la tva 