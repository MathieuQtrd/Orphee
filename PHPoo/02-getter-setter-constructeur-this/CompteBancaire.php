<?php

/* 

EXERCICE : 
            Création d'une classe CompteBancaire selon la modélisation suivante 

    ----------------------
    |   CompteBancaire   |
    ----------------------
    | -titulaire:string  |
    | -solde:float       |
    ----------------------
    | +__construct()     |
    | +getTitulaire()    |
    | +setTitulaire()    |
    | +getSolde()        | 
    | +setSolde()        | Le solde ne peut pas etre negatif
    | +afficherSolde()   |
    | +retirer()         | Il n'est pas possible de retirer un montant négatif
    | +deposer()         | Il n'est pas possible de déposer un montant négatif
    ----------------------

*/