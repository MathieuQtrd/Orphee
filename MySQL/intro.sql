-- ceci est un commentaire
# ceci esr un commentaire
/*
Ceci est un commentaire
sur plusieurs lignes
*/

/*
Base de données (BDD)
---------------------
1 - BDD (un nom)
    - x tables (users, products, category, invoices, ...)
        - x colonnes (users : id, username, password, firstname, lastname, email, address ...)



Exemple de requete :
--------------------
4 types de requetes : (Récupération SELECT, création INSERT, modification UPDATE, suppression DELETE)

SELECT nom, prenom, salaire, profession FROM table_user WHERE id = 123;

SELECT : renvoie moi
FROM : depuis la table ou depuis les tables
WHERE : à la condition que

MySQL n'est pas sensible à la casse
Convention d'écriture : les mots clés en majuscule
Chaque instruction doit se terminer par un point virgule

MySQL permet d'avoir des bdd relationnelles concernant potentiellement plusieurs tables,  ces relations entre ces tables se basent sur les clés primaires et clés étrangères

- Chaque table doit avoir une clé primaire (c'est l'identifiant unique de chacune des entrées (lignes) de la table)
- Lorsque l'on retrouve une valeur clé primaire sur une autre table, on parl de clé étrangère

Pour ouvrir la console MySQL 
----------------------------
- WAMP : 
    - clic gauche sur l'icone de wamp -> onglet MySQL -> Console MySQL
    - Identifiant de connexion à notre serveur MySQL : root
    - Mot de passe de connexion : (rien, il n'y en a pas par défaut)

- XAMPP :
    - Sur le control panel, il faut cliquer sur le bouton "shell"
    - saisir les deux lignes suivantes :
    cd c:/xampp/mysql
    mysql.exe -u root
    - Identifiant de connexion à notre serveur MySQL : root
    - Mot de passe de connexion : (rien, il n'y en a pas par défaut)

- MAMP :
    Ouvrir le terminal et saisir la ligne suivante :
    /Applications/MAMP/Library/bin/mysql -u root -p
    Valider la ligne, l'outil nous demande le mot de passe, il faut le saisir (le mdp ne sera pas visible)
    - Identifiant de connexion à notre serveur MySQL : root
    - Mot de passe de connexion : root

DOC :
-----
https://sql.sh

*/

