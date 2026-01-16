-- Quelques outils de base :
----------------------------
CREATE DATABASE nom_de_la_base;
CREATE DATABASE entreprise;

-- Pour voir les BDD, les tables d'une BDD et les warnings (les warnings ne seront visibles qu'au moment où ils ont été déclenchés)
SHOW DATABASES;
SHOW TABLES;
SHOW WARNINGS;

-- Pour se positionner sur une BDD :
USE nom_de_la_base;
USE entreprise; 

-- Pour supprimer une BDD ou une table (action définitive)
DROP DATABASE nom_de_la_base;
DROP TABLE nom_de_la_table;

-- Pour vider les données d'une table tout en conservant sa structure
TRUNCATE nom_de_la_table;

-- Pour voir la structure d'une table : 
DESC nom_de_la_table;

-- Copier / coller le contenu du fichier entreprise.sql afin d'avoir la bdd entreprise de disponible

---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES DE SELCTION (SELECT : On ne touche pas aux données)
---------------------------------------------------------------------------
---------------------------------------------------------------------------

-- Affichage complet des données de la table 
SELECT id_employes, prenom, nom, sexe, service, date_embauche, salaire FROM employes; 
+-------------+-------------+----------+------+---------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service       | date_embauche | salaire |
+-------------+-------------+----------+------+---------------+---------------+---------+
|         350 | Jean-pierre | Laborde  | m    | direction     | 2010-12-09    |    5000 |
|         388 | Clement     | Gallet   | m    | commercial    | 2010-12-15    |    2300 |
|         415 | Thomas      | Winter   | m    | commercial    | 2011-05-03    |    3550 |
|         417 | Chloe       | Dubar    | f    | production    | 2011-09-05    |    1900 |
|         491 | Elodie      | Fellier  | f    | secretariat   | 2011-11-22    |    1600 |
|         509 | Fabrice     | Grand    | m    | comptabilite  | 2011-12-30    |    2900 |
|         547 | Melanie     | Collier  | f    | commercial    | 2012-01-08    |    3100 |
|         592 | Laura       | Blanchet | f    | direction     | 2012-05-09    |    4500 |
|         627 | Guillaume   | Miller   | m    | commercial    | 2012-07-02    |    1900 |
|         655 | Celine      | Perrin   | f    | commercial    | 2012-09-10    |    2700 |
|         699 | Julien      | Cottet   | m    | secretariat   | 2013-01-05    |    1390 |
|         701 | Mathieu     | Vignal   | m    | informatique  | 2013-04-03    |    2500 |
|         739 | Thierry     | Desprez  | m    | secretariat   | 2013-07-17    |    1500 |
|         780 | Amandine    | Thoyer   | f    | communication | 2014-01-23    |    2100 |
|         802 | Damien      | Durand   | m    | informatique  | 2014-07-05    |    2250 |
|         854 | Daniel      | Chevel   | m    | informatique  | 2015-09-28    |    3100 |
|         876 | Nathalie    | Martin   | f    | juridique     | 2016-01-12    |    3550 |
|         900 | Benoit      | Lagarde  | m    | production    | 2016-06-03    |    2550 |
|         933 | Emilie      | Sennard  | f    | commercial    | 2017-01-11    |    1800 |
|         990 | Stephanie   | Lafaye   | f    | assistant     | 2017-03-01    |    1775 |
+-------------+-------------+----------+------+---------------+---------------+---------+

-- Même chose avec le raccourci * (ALL)
SELECT * FROM employes;

-- Affichage des prénoms et des noms de la table employes
SELECT nom, prenom FROM employes;
+----------+-------------+
| nom      | prenom      |
+----------+-------------+
| Laborde  | Jean-pierre |
| Gallet   | Clement     |
| Winter   | Thomas      |
| Dubar    | Chloe       |
| Fellier  | Elodie      |
...

-- EXERCICE : Affichez les différents services de la table employes :
SELECT service FROM employes;
-- Pour éviter les doublons :
SELECT DISTINCT service FROM employes;
+---------------+
| service       |
+---------------+
| direction     |
| commercial    |
| production    |
| secretariat   |
| comptabilite  |
| informatique  |
| communication |
| juridique     |
| assistant     |
+---------------+

-- CONDITIONS : WHERE (à la condition que)
-- Affichages des employes du service informatique
SELECT * FROM employes WHERE service = 'informatique';
+-------------+---------+--------+------+--------------+---------------+---------+
| id_employes | prenom  | nom    | sexe | service      | date_embauche | salaire |
+-------------+---------+--------+------+--------------+---------------+---------+
|         701 | Mathieu | Vignal | m    | informatique | 2013-04-03    |    2500 |
|         802 | Damien  | Durand | m    | informatique | 2014-07-05    |    2250 |
|         854 | Daniel  | Chevel | m    | informatique | 2015-09-28    |    3100 |
+-------------+---------+--------+------+--------------+---------------+---------+

-- Affichage des employes ayant été recruté entre le 1er janvier 2015 et aujourd'hui
SELECT * FROM employes WHERE date_embauche BETWEEN '2015-01-01' AND '2026-01-12';
+-------------+-----------+---------+------+--------------+---------------+---------+
| id_employes | prenom    | nom     | sexe | service      | date_embauche | salaire |
+-------------+-----------+---------+------+--------------+---------------+---------+
|         854 | Daniel    | Chevel  | m    | informatique | 2015-09-28    |    3100 |
|         876 | Nathalie  | Martin  | f    | juridique    | 2016-01-12    |    3550 |
|         900 | Benoit    | Lagarde | m    | production   | 2016-06-03    |    2550 |
|         933 | Emilie    | Sennard | f    | commercial   | 2017-01-11    |    1800 |
|         990 | Stephanie | Lafaye  | f    | assistant    | 2017-03-01    |    1775 |
+-------------+-----------+---------+------+--------------+---------------+---------+

-- Pour obtenir la date du jour :
-- CURDATE()
SELECT CURDATE();
+------------+
| CURDATE()  |
+------------+
| 2026-01-12 |
+------------+
-- Affichage des employes ayant été recruté entre le 1er janvier 2015 et aujourd'hui
SELECT * FROM employes WHERE date_embauche BETWEEN '2015-01-01' AND CURDATE();

-- Pour obtenir la date du jour + heure, min, secondes
-- NOW()
SELECT NOW();
+---------------------+
| NOW()               |
+---------------------+
| 2026-01-12 12:00:13 |
+---------------------+

-- LIKE la valeur approchante
-- Liste des employes ayant un prénom qui commence par la lettre s
SELECT prenom FROM employes WHERE prenom LIKE 's%';
+---------+
| nom     |
+---------+
| Collier |
| Cottet  |
| Chevel  |
+---------+

-- prénoms finissant par ie
SELECT prenom FROM employes WHERE prenom LIKE '%ie';
+-----------+
| prenom    |
+-----------+
| Elodie    |
| Melanie   |
| Nathalie  |
| Emilie    |
| Stephanie |
+-----------+

-- prénoms contenant ie n'importe où (début, fin, au milieu ...)
SELECT prenom FROM employes WHERE prenom LIKE '%ie%';
+-------------+
| prenom      |
+-------------+
| Jean-pierre |
| Elodie      |
| Melanie     |
| Julien      |
| Mathieu     |
| Thierry     |
| Damien      |
| Daniel      |
| Nathalie    |
| Emilie      |
| Stephanie   |
+-------------+

/*
id  type    cp
---------------
23  appart  75018
25  appart  75020
26  appart  92800
27  appart  93200
31  appart  75001
35  appart  75005
45  appart  94700
49  appart  94700
50  appart  75021
51  appart  75017


SELECT * FROM appartment WHERE cp = 75; => 0 résultats
SELECT * FROM appartment WHERE cp LIKE '75%'; => 6 résultats
*/

-- Affichage des employes sauf ceux du service informatique (exclusion)
SELECT * FROM employes WHERE service != 'informatique';

-- Affichage des employes ayant un salaire supérieur à 3000
SELECT * FROM employes WHERE salaire > 3000;
+-------------+-------------+----------+------+--------------+---------------+---------+
| id_employes | prenom      | nom      | sexe | service      | date_embauche | salaire |
+-------------+-------------+----------+------+--------------+---------------+---------+
|         350 | Jean-pierre | Laborde  | m    | direction    | 2010-12-09    |    5000 |
|         415 | Thomas      | Winter   | m    | commercial   | 2011-05-03    |    3550 |
|         547 | Melanie     | Collier  | f    | commercial   | 2012-01-08    |    3100 |
|         592 | Laura       | Blanchet | f    | direction    | 2012-05-09    |    4500 |
|         854 | Daniel      | Chevel   | m    | informatique | 2015-09-28    |    3100 |
|         876 | Nathalie    | Martin   | f    | juridique    | 2016-01-12    |    3550 |
+-------------+-------------+----------+------+--------------+---------------+---------+

-- Opérateur de comparaison
-- =    est égal à 
-- !=   est différent de
-- >    strictement supérieur
-- >=   supérieur ou égal
-- >    strictement inférieur
-- <=   inférieur ou égal

-- ORDER BY : pour ordonner les résultats
-- Affichage des employes en ordre alphabétique sur le nom
SELECT * FROM employes ORDER BY nom;
SELECT * FROM employes ORDER BY nom ASC; -- ASC pour ascendant (cas par défaut)

SELECT * FROM employes ORDER BY salaire DESC; -- DESC pour descendant 
-- Il est possible d'ordonner sur plusieurs colonnes :
SELECT * FROM employes ORDER BY salaire DESC, nom ASC;

-- Pour limiter le nombre de résultat (pagination)
-- LIMIT 
-- LIMIT position_de_depart, nb_de_ligne;
-- LIMIT nb_de_ligne; (on commence depuis le debut du résultat)

-- Affichage des employes 3 par 3
SELECT * FROM employes LIMIT 0, 3;
+-------------+-------------+---------+------+------------+---------------+---------+
| id_employes | prenom      | nom     | sexe | service    | date_embauche | salaire |
+-------------+-------------+---------+------+------------+---------------+---------+
|         350 | Jean-pierre | Laborde | m    | direction  | 2010-12-09    |    5000 |
|         388 | Clement     | Gallet  | m    | commercial | 2010-12-15    |    2300 |
|         415 | Thomas      | Winter  | m    | commercial | 2011-05-03    |    3550 |
+-------------+-------------+---------+------+------------+---------------+---------+
SELECT * FROM employes LIMIT 3, 3;
+-------------+---------+---------+------+--------------+---------------+---------+
| id_employes | prenom  | nom     | sexe | service      | date_embauche | salaire |
+-------------+---------+---------+------+--------------+---------------+---------+
|         417 | Chloe   | Dubar   | f    | production   | 2011-09-05    |    1900 |
|         491 | Elodie  | Fellier | f    | secretariat  | 2011-11-22    |    1600 |
|         509 | Fabrice | Grand   | m    | comptabilite | 2011-12-30    |    2900 |
+-------------+---------+---------+------+--------------+---------------+---------+
SELECT * FROM employes LIMIT 6, 3;
+-------------+-----------+----------+------+------------+---------------+---------+
| id_employes | prenom    | nom      | sexe | service    | date_embauche | salaire |
+-------------+-----------+----------+------+------------+---------------+---------+
|         547 | Melanie   | Collier  | f    | commercial | 2012-01-08    |    3100 |
|         592 | Laura     | Blanchet | f    | direction  | 2012-05-09    |    4500 |
|         627 | Guillaume | Miller   | m    | commercial | 2012-07-02    |    1900 |
+-------------+-----------+----------+------+------------+---------------+---------+

-- Affichage du salaire annuel
SELECT nom, salaire, (salaire * 12) FROM employes;

-- En utilisant un alias de colonne avec le mot clé AS
SELECT nom, salaire, (salaire * 12) AS salaire_annuel FROM employes LIMIT 5;
+---------+---------+----------------+
| nom     | salaire | salaire_annuel |
+---------+---------+----------------+
| Laborde |    5000 |          60000 |
| Gallet  |    2300 |          27600 |
| Winter  |    3550 |          42600 |
| Dubar   |    1900 |          22800 |
| Fellier |    1600 |          19200 |
+---------+---------+----------------+
SELECT nom, salaire, (salaire * 12) AS 'salaire annuel' FROM employes LIMIT 5;
+---------+---------+----------------+
| nom     | salaire | salaire annuel |
+---------+---------+----------------+
| Laborde |    5000 |          60000 |
| Gallet  |    2300 |          27600 |
| Winter  |    3550 |          42600 |
| Dubar   |    1900 |          22800 |
| Fellier |    1600 |          19200 |
+---------+---------+----------------+

-- Affichage de la masse salariale annuelle
-- SUM() : la somme
SELECT SUM(salaire * 12) AS masse_salariale FROM employes;
+-----------------+
| masse_salariale |
+-----------------+
|          623580 |
+-----------------+

-- AVG() : la moyenne
-- Affichage du salaire moyen de l'entreprise
SELECT AVG(salaire) AS salaire_moyen FROM employes;
+---------------+
| salaire_moyen |
+---------------+
|     2598.2500 |
+---------------+

-- Avec un arrondi 
-- ROUND(valeur) à l'entier 
-- ROUND(valeur, 2) deux décimales acceptées
SELECT ROUND(AVG(salaire)) AS salaire_moyen FROM employes;
+---------------+
| salaire_moyen |
+---------------+
|          2598 |
+---------------+
SELECT ROUND(AVG(salaire), 2) AS salaire_moyen FROM employes;
+---------------+
| salaire_moyen |
+---------------+
|       2598.25 |
+---------------+

-- COUNT() pour compter le nombre de ligne
-- combien d'homme dans l'entreprise
SELECT COUNT(*) AS nb_homme FROM employes WHERE sexe = 'm';
+----------+
| nb_homme |
+----------+
|       11 |
+----------+
SELECT COUNT(id_employes) AS nb_femme FROM employes WHERE sexe = 'f';
+----------+
| nb_femme |
+----------+
|        9 |
+----------+

-- On peut mettre soit * soit une colonne dans le COUNT().
-- Si on se base sur une colonne pouvant contenir la valeur NULL, le count() ne fera pas +1 pour la ou les lignes ayant la valeur NULL présente dans cette colonne.

-- MIN() | MAX()
-- le plus gros salaire de l'entreprise
SELECT MAX(salaire) FROM employes;
+--------------+
| MAX(salaire) |
+--------------+
|         5000 |
+--------------+
-- le salaire minimum de l'entreprise
SELECT MIN(salaire) FROM employes;
+--------------+
| MIN(salaire) |
+--------------+
|         1390 |
+--------------+

-- EXERCICE : affichez le plus petit salaire de l'entreprise ainsi que le prenom de l'employé ayant ce salaire :
-- Vérifiez votre résultat
SELECT MIN(salaire), prenom FROM employes; -- Résultat incorrect
-- MIN() est une fonction d'aggregation
-- Ces fonctions ne nous renvoient un seul résultat (sauf si l'on utilise GROUP BY)
-- On obtient ici le salaire minimum et le premier prenom de la table puis la requete est bloquée du fait d'utiliser une fonction d'aggregation

-- 2 solutions :
-- Une requete imbriquée 
SELECT prenom, salaire FROM employes WHERE salaire = MIN(salaire); -- Error
SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes); 
+--------+---------+
| prenom | salaire |
+--------+---------+
| Julien |    1390 |
+--------+---------+

-- Sinon avec un order by et un limit
SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 1;
+--------+---------+
| prenom | salaire |
+--------+---------+
| Julien |    1390 |
+--------+---------+

-- https://sql.sh/fonctions/agregation


-- Pour tester plusieurs valeurs
-- = pour tester une seule valeur
-- IN ou NOT IN pour tester un ensemble de valeur

-- Affichage des employes des services commercial et informatique
SELECT nom, prenom, service FROM employes WHERE service IN ('informatique', 'commercial');
+---------+-----------+--------------+
| nom     | prenom    | service      |
+---------+-----------+--------------+
| Gallet  | Clement   | commercial   |
| Winter  | Thomas    | commercial   |
| Collier | Melanie   | commercial   |
| Miller  | Guillaume | commercial   |
| Perrin  | Celine    | commercial   |
| Vignal  | Mathieu   | informatique |
| Durand  | Damien    | informatique |
| Chevel  | Daniel    | informatique |
| Sennard | Emilie    | commercial   |
+---------+-----------+--------------+
-- l'inverse
SELECT nom, prenom, service FROM employes WHERE service NOT IN ('informatique', 'commercial');
+----------+-------------+---------------+
| nom      | prenom      | service       |
+----------+-------------+---------------+
| Laborde  | Jean-pierre | direction     |
| Dubar    | Chloe       | production    |
| Fellier  | Elodie      | secretariat   |
| Grand    | Fabrice     | comptabilite  |
| Blanchet | Laura       | direction     |
| Cottet   | Julien      | secretariat   |
| Desprez  | Thierry     | secretariat   |
| Thoyer   | Amandine    | communication |
| Martin   | Nathalie    | juridique     |
| Lagarde  | Benoit      | production    |
| Lafaye   | Stephanie   | assistant     |
+----------+-------------+---------------+


-- Plusieurs conditions obligatoires : AND
--  les employes du service commercial ayant un salaire inférieur à 3000 et ayant été recruté avant 2012
SELECT * FROM employes WHERE service = 'commercial' AND salaire < 3000 AND date_embauche < '2012-01-01';
+-------------+---------+--------+------+------------+---------------+---------+
| id_employes | prenom  | nom    | sexe | service    | date_embauche | salaire |
+-------------+---------+--------+------+------------+---------------+---------+
|         388 | Clement | Gallet | m    | commercial | 2010-12-15    |    2300 |
+-------------+---------+--------+------+------------+---------------+---------+

SELECT *                            -- premiere ligne : ce que l'on veut obtenir
FROM employes                       -- deuxième ligne : quelles sont les tables concernées
WHERE service = 'commercial'        -- troisième ligne et les suivantes : la ou les conditions ainsi que les outils type ORDR BY, LIMIT ...
AND salaire < 3000 
AND date_embauche < '2012-01-01';

-- L'une ou l'autre d'un ensemble de condition : OR
-- Les employes du service production ayant un salaire égal à 1900 ou 2300
SELECT * FROM employes WHERE service = 'production' AND (salaire = 2300 OR salaire = 1900);
+-------------+--------+-------+------+------------+---------------+---------+
| id_employes | prenom | nom   | sexe | service    | date_embauche | salaire |
+-------------+--------+-------+------+------------+---------------+---------+
|         417 | Chloe  | Dubar | f    | production | 2011-09-05    |    1900 |
+-------------+--------+-------+------+------------+---------------+---------+

-- sinon avec in
SELECT * FROM employes WHERE service = 'production' AND salaire IN (2300, 1900);

-- GROUP BY
-----------
-- Permet de regouper des résultats selon une ou des colonnes
-- Cet outil est important lorsque l'on utilise une fonction d'aggrégation

-- Nombre d'employes par service
SELECT service, COUNT(*) AS nb FROM employes ; -- souci
SELECT service, COUNT(*) AS nb FROM employes GROUP BY service; 

SELECT service, COUNT(*) AS nb FROM employes GROUP BY service ORDER BY COUNT(*) DESC; 
SELECT service, COUNT(*) AS nb FROM employes GROUP BY service ORDER BY nb DESC; -- quand on donne un alias à une colonne, il est ensuite possible d'appeler la colonnne via son alias

-- Il est possible de mettre des conditions sur un GROUP BY : HAVING
SELECT service, COUNT(*) AS nb FROM employes GROUP BY service HAVING COUNT(*) > 2 ORDER BY nb DESC ;
SELECT service, COUNT(*) AS nb FROM employes GROUP BY service HAVING nb > 2 ORDER BY nb DESC ;
+--------------+----+
| service      | nb |
+--------------+----+
| commercial   |  6 |
| secretariat  |  3 |
| informatique |  3 |
+--------------+----+


-- Potentiel ordre dans nos requete
SELECT ...
FROM ...
WHERE ...
AND ...
OR ...
GROUP BY ...
ORDER BY ...
LIMIT ...
;


---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES D'INSERTION (INSERT INTO : enregistrement d'une nouvelle entrée)
---------------------------------------------------------------------------
---------------------------------------------------------------------------
USE entreprise;

INSERT INTO employes (id_employes, prenom, nom, salaire, date_embauche, sexe, service) VALUES (991, 'Mathieu', 'Quittard', 3000, CURDATE(), 'm', 'Web');

SELECT * FROM employes;
-- AVec la valeur NULL sur id_employes (clé primaire) afin qu'il soit généré automatiquement
INSERT INTO employes (id_employes, prenom, nom, salaire, date_embauche, sexe, service) VALUES (NULL, 'Mathieu', 'Quittard', 3000, CURDATE(), 'm', 'Web');
-- Même chose, on ne met pas le champ id_employes dans la requete, il sera généré automatiquement
INSERT INTO employes (prenom, nom, salaire, date_embauche, sexe, service) VALUES ('Mathieu', 'Quittard', 3000, CURDATE(), 'm', 'Web');

-- SInon il est possible de ne pas préciser les colonnes de la table mais dans ce cas, nous sommes obligé de fournir toute les valeurs et surtout dans le même ordre que les colonne de la table
INSERT INTO employes VALUES (NULL, 'Mathieu', 'Quittard', 'm', 'Web', CURDATE(), 3000);


---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES DE MODIFICATION (UPDATE : modification de données existantes)
---------------------------------------------------------------------------
---------------------------------------------------------------------------
UPDATE employes SET service = 'developpeur' WHERE service = 'Web';
UPDATE employes SET prenom = 'math', salaire = 3500 WHERE service = 'developpeur';


---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES DE SUPPRESION (DELETE : Suppresion de lignes existantes)
---------------------------------------------------------------------------
---------------------------------------------------------------------------
DELETE FROM employes; -- ne pas exécuter cette ligne : supprime toutes les données de a table (comme un TRUNCATE)
DELETE FROM employes WHERE id_employes = 992;
SELECT * FROM employes;
DELETE FROM employes WHERE id_employes > 990;
SELECT * FROM employes;
