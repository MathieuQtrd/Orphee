-- Fonctions prédéfinies MySQL

-- Ne pas mettre d'espace entre le nom de la fonction et ses parenthèses

SELECT DATABASE(); -- la bdd sur laquelle on se trouve
+--------------+
| DATABASE()   |
+--------------+
| bibliotheque |
+--------------+

-- Pour les dates
SELECT CURDATE(); -- la date du jour

SELECT NOW(); -- date + heure min sec

SELECT CURTIME(); -- heure min sec
+-----------+
| CURTIME() |
+-----------+
| 14:25:51  |
+-----------+

-- Pour les formats de dates
-- https://sql.sh/fonctions/date_format
SELECT DATE_FORMAT('2026-01-15', '%d/%m/%Y') AS date_fr;
+------------+
| date_fr    |
+------------+
| 15/01/2026 |
+------------+

SELECT *, DATE_FORMAT(date_sortie, '%d/%m/%Y') AS date_sortie_fr FROM emprunt; 
+------------+----------+-----------+-------------+------------+----------------+
| id_emprunt | id_livre | id_abonne | date_sortie | date_rendu | date_sortie_fr |
+------------+----------+-----------+-------------+------------+----------------+
|          1 |      100 |         1 | 2016-12-07  | 2016-12-11 | 07/12/2016     |
|          2 |      101 |         2 | 2016-12-07  | 2016-12-18 | 07/12/2016     |
|          3 |      100 |         3 | 2016-12-11  | 2016-12-19 | 11/12/2016     |
|          4 |      103 |         4 | 2016-12-12  | 2016-12-22 | 12/12/2016     |
|          5 |      104 |         1 | 2016-12-15  | 2016-12-30 | 15/12/2016     |
|          6 |      105 |         2 | 2017-01-02  | 2017-01-15 | 02/01/2017     |
|          7 |      105 |         3 | 2017-02-15  | NULL       | 15/02/2017     |
|          8 |      100 |         2 | 2017-02-20  | NULL       | 20/02/2017     |
+------------+----------+-----------+-------------+------------+----------------+

SELECT DAYNAME('1789-07-14');
+-----------------------+
| DAYNAME('1789-07-14') |
+-----------------------+
| Tuesday               |
+-----------------------+

SELECT DAYOFYEAR('2026-01-15');
+-------------------------+
| DAYOFYEAR('2026-01-15') |
+-------------------------+
|                      15 |
+-------------------------+

SELECT DATE_ADD(CURDATE(), INTERVAL 100 DAY);
+---------------------------------------+
| DATE_ADD(CURDATE(), INTERVAL 100 DAY) |
+---------------------------------------+
| 2026-04-25                            |
+---------------------------------------+

SELECT DATE_ADD(NOW(), INTERVAL 70 HOUR);
+-----------------------------------+
| DATE_ADD(NOW(), INTERVAL 70 HOUR) |
+-----------------------------------+
| 2026-01-18 12:35:10               |
+-----------------------------------+


-- Il est possible de récupérer le dernier id inséré dans la base (quelque soit la table concernée)
INSERT INTO abonne (prenom) VALUES ('Mathieu');

SELECT LAST_INSERT_ID();

+------------------+
| LAST_INSERT_ID() |
+------------------+
|               12 |
+------------------+

SELECT CONCAT('a', 'b', 'c');

SELECT CONCAT(date_sortie, ' | ', date_rendu) FROM emprunt WHERE date_rendu IS NOT NULL;
+----------------------------------------+
| CONCAT(date_sortie, ' | ', date_rendu) |
+----------------------------------------+
| 2016-12-07 | 2016-12-11                |
| 2016-12-07 | 2016-12-18                |
| 2016-12-11 | 2016-12-19                |
| 2016-12-12 | 2016-12-22                |
| 2016-12-15 | 2016-12-30                |
| 2017-01-02 | 2017-01-15                |
+----------------------------------------+

SELECT CONCAT_WS(' - ', prenom, titre, auteur, date_sortie, date_rendu) 
FROM abonne, emprunt, livre 
WHERE abonne.id_abonne = emprunt.id_abonne 
AND emprunt.id_livre = livre.id_livre;
+------------------------------------------------------------------------------+
| CONCAT_WS(' - ', prenom, titre, auteur, date_sortie, date_rendu)             |
+------------------------------------------------------------------------------+
| Guillaume - Une vie - GUY DE MAUPASSANT - 2016-12-07 - 2016-12-11            |
| Benoit - Bel-Ami  - GUY DE MAUPASSANT - 2016-12-07 - 2016-12-18              |
| Chloe - Une vie - GUY DE MAUPASSANT - 2016-12-11 - 2016-12-19                |
| Laura - Le Petit chose - ALPHONSE DAUDET - 2016-12-12 - 2016-12-22           |
| Guillaume - La Reine Margot - ALEXANDRE DUMAS - 2016-12-15 - 2016-12-30      |
| Benoit - Les Trois Mousquetaires - ALEXANDRE DUMAS - 2017-01-02 - 2017-01-15 |
| Chloe - Les Trois Mousquetaires - ALEXANDRE DUMAS - 2017-02-15               |
| Benoit - Une vie - GUY DE MAUPASSANT - 2017-02-20                            |
+------------------------------------------------------------------------------+

SELECT TRIM('               a b c               ');
+---------------------------------------------+
| TRIM('               a b c               ') |
+---------------------------------------------+
| a b c                                       |
+---------------------------------------------+

SELECT UPPER('hello');
+----------------+
| UPPER('hello') |
+----------------+
| HELLO          |
+----------------+

SELECT LOWER('BONJOUR');
+------------------+
| LOWER('BONJOUR') |
+------------------+
| bonjour          |
+------------------+