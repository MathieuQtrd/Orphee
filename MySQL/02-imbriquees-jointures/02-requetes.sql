-- La valeur NULL se test avec IS ou IS NOT (pas le =)

-- Quels sont les titres des id_livre qui n'ont pas été rendu à la bibliotheque ?
SELECT id_livre 
FROM emprunt 
WHERE date_rendu IS NULL;


---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES IMBRIQUEES (sur plusieurs tables)
---------------------------------------------------------------------------
---------------------------------------------------------------------------

-- Quels sont les titres des livres qui n'ont pas été rendu à la bibliotheque ?
SELECT id_livre, titre, auteur FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);
+----------+-------------------------+-------------------+
| id_livre | titre                   | auteur            |
+----------+-------------------------+-------------------+
|      100 | Une vie                 | GUY DE MAUPASSANT |
|      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
+----------+-------------------------+-------------------+

-- EXERCICE :
-- Quels sont les abonnés n'ayant pas encore rendu un livre à la bibliotheque ?
SELECT * FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE date_rendu IS NULL);
+-----------+--------+
| id_abonne | prenom |
+-----------+--------+
|         2 | Benoit |
|         3 | Chloe  |
+-----------+--------+

-- Quels sont les abonnés ayant emprunté un livre le 11/12/2016 ?
SELECT * FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE date_sortie = '2016-12-11');
+-----------+--------+
| id_abonne | prenom |
+-----------+--------+
|         3 | Chloe  |
+-----------+--------+

-- Combien de livres Guillaume a emprunté à la bibliothèque ?
SELECT COUNT(*) AS nb_emprunt FROM emprunt WHERE id_abonne IN 
    (SELECT id_abonne FROM abonne WHERE prenom = 'guillaume');
+------------+
| nb_emprunt |
+------------+
|          2 |
+------------+

-- Affichez la liste des prénoms des abonnés ayant déjà emprunté un livre écrit par Alphonse daudet
SELECT prenom FROM abonne WHERE id_abonne IN 
    (SELECT id_abonne FROM emprunt WHERE id_livre IN 
        (SELECT id_livre FROM livre WHERE auteur = 'alphonse daudet') );
+--------+
| prenom |
+--------+
| Laura  |
+--------+

-- Nous aimerions connaitre la liste des livres empruntés par Chloé
SELECT * FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'));
+----------+-------------------+-------------------------+
| id_livre | auteur            | titre                   |
+----------+-------------------+-------------------------+
|      100 | GUY DE MAUPASSANT | Une vie                 |
|      105 | ALEXANDRE DUMAS   | Les Trois Mousquetaires |
+----------+-------------------+-------------------------+

-- Nous aimerions connaitre la liste des livres que Chloé n'a pas emprunté
SELECT * FROM livre WHERE id_livre NOT IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'));
+----------+-------------------+-----------------+
| id_livre | auteur            | titre           |
+----------+-------------------+-----------------+
|      101 | GUY DE MAUPASSANT | Bel-Ami         |
|      102 | HONORE DE BALZAC  | Le pere Goriot  |
|      103 | ALPHONSE DAUDET   | Le Petit chose  |
|      104 | ALEXANDRE DUMAS   | La Reine Margot |
+----------+-------------------+-----------------+

-- Nous aimerions connaitre la liste des livres que Chloé n'a pas encore rendu
SELECT * FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE id_abonne IN 
        (SELECT id_abonne FROM abonne WHERE prenom = 'chloe') AND date_rendu IS NULL);
+----------+-----------------+-------------------------+
| id_livre | auteur          | titre                   |
+----------+-----------------+-------------------------+
|      105 | ALEXANDRE DUMAS | Les Trois Mousquetaires |
+----------+-----------------+-------------------------+

-- Qui a emprunté le plus de livre à la bibliotheque ?
SELECT prenom FROM abonne WHERE id_abonne = 
    (SELECT ... );


---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES JOINTURES (sur plusieurs tables)
---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- Différences entre les requetes imbriquées et en jointure :
    -- Avec une requete imbriquée, on ne peut obtenir des informations qui ne proviennent que d'une seule table à la fois.
    -- Avec une requete en jointure, on mélange tout, les colonnes, les tables, les conditions et on peut ontenir des informations provenant de toutes les tables sur notre résultat.

-- Nous aimerions connaitre les prénoms des abonnés ainsi que les date de sortie lors de leurs emprunts
SELECT -- ce que l'on veut obtenir
FROM -- la ou le stables concernées
WHERE -- la ou les conditions
GROUP BY ORDER BY LIMIT -- si nécessaire

-- si on se sert d'une colonne ayant le même nom sur une ou plusieurs tables, il faut préciser le nom de la table en prefixe table.colonne
SELECT prenom, date_sortie 
FROM abonne, emprunt
WHERE emprunt.id_abonne = abonne.id_abonne;
+-----------+-------------+
| prenom    | date_sortie |
+-----------+-------------+
| Guillaume | 2016-12-07  |
| Benoit    | 2016-12-07  |
| Chloe     | 2016-12-11  |
| Laura     | 2016-12-12  |
| Guillaume | 2016-12-15  |
| Benoit    | 2017-01-02  |
| Chloe     | 2017-02-15  |
| Benoit    | 2017-02-20  |
+-----------+-------------+

-- Il est possible de donner un alias à nos table
-- avec le mot clé AS ou juste avec un espace
SELECT prenom, date_sortie 
FROM abonne AS a, emprunt AS e
WHERE a.id_abonne = e.id_abonne;
--
SELECT prenom, date_sortie 
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne;

-- Avec JOIN ou INNER JOIN 
-- 01 : si la clé primaire et la clé étrangère ont le même nom : avec USING()
SELECT prenom, date_sortie 
FROM abonne 
JOIN emprunt USING(id_abonne);

-- 02 : si la clé primaire et la clé étrangère n'ont pas le même nom : ON
SELECT prenom, date_sortie 
FROM abonne 
JOIN emprunt ON emprunt.id_abonne = abonne.id;

-- EXERCICE : Nous aimerions connaitre les dates de sortie et les dates de rendu pour l'abonné Guillaume
SELECT *  
FROM abonne a, emprunt e 
WHERE a.id_abonne = e.id_abonne
AND prenom = 'guillaume';

+-------------+------------+
| date_sortie | date_rendu |
+-------------+------------+
| 2016-12-07  | 2016-12-11 |
| 2016-12-15  | 2016-12-30 |
+-------------+------------+

SELECT * 
FROM abonne 
JOIN emprunt USING(id_abonne)
WHERE prenom = 'guillaume';
+-----------+-----------+------------+----------+-------------+------------+
| id_abonne | prenom    | id_emprunt | id_livre | date_sortie | date_rendu |
+-----------+-----------+------------+----------+-------------+------------+
|         1 | Guillaume |          1 |      100 | 2016-12-07  | 2016-12-11 |
|         1 | Guillaume |          5 |      104 | 2016-12-15  | 2016-12-30 |
+-----------+-----------+------------+----------+-------------+------------+

-- EXERCICE : Nous aimerions connaitre les dates de sortie et les dates de rendu pour les livres écrit par Alphonse daudet
SELECT * 
FROM emprunt 
JOIN livre USING(id_livre)
WHERE auteur = 'alphonse daudet';
+----------+------------+-----------+-------------+------------+-----------------+----------------+
| id_livre | id_emprunt | id_abonne | date_sortie | date_rendu | auteur          | titre          |
+----------+------------+-----------+-------------+------------+-----------------+----------------+
|      103 |          4 |         4 | 2016-12-12  | 2016-12-22 | ALPHONSE DAUDET | Le Petit chose |
+----------+------------+-----------+-------------+------------+-----------------+----------------+

-- Nous aimerions connaitre les prénoms des abonnés ayant emprunté le livre "une vie" sur l'année 2016
SELECT * 
FROM livre 
JOIN emprunt USING(id_livre)
JOIN abonne USING (id_abonne)
WHERE titre = 'une vie' 
AND date_sortie LIKE '2016%';
-- ADN YEAR(date_sortie) = 2016;
-- ADN date_sortie BETWEEN '2016-01-01' AND '2016-12-31';
+-----------+----------+-------------------+---------+------------+-------------+------------+-----------+
| id_abonne | id_livre | auteur            | titre   | id_emprunt | date_sortie | date_rendu | prenom    |
+-----------+----------+-------------------+---------+------------+-------------+------------+-----------+
|         1 |      100 | GUY DE MAUPASSANT | Une vie |          1 | 2016-12-07  | 2016-12-11 | Guillaume |
|         3 |      100 | GUY DE MAUPASSANT | Une vie |          3 | 2016-12-11  | 2016-12-19 | Chloe     |
+-----------+----------+-------------------+---------+------------+-------------+------------+-----------+

-- Nous aimerions connaitre le nombre de livre empruné par chaque abonné (prénom)
SELECT prenom, COUNT(id_emprunt) AS nb 
FROM abonne, emprunt 
WHERE abonne.id_abonne = emprunt.id_abonne
GROUP BY prenom;
+-----------+----+
| prenom    | nb |
+-----------+----+
| Guillaume |  2 |
| Benoit    |  3 |
| Chloe     |  2 |
| Laura     |  1 |
+-----------+----+

-- Nous aimerions connaitre le nombre d'emprunt pour chaque livre (titre)
SELECT titre, COUNT(id_emprunt) AS nb 
FROM livre, emprunt 
WHERE livre.id_livre = emprunt.id_livre
GROUP BY titre;

+-------------------------+----+
| titre                   | nb |
+-------------------------+----+
| Une vie                 |  3 |
| Bel-Ami                 |  1 |
| Le Petit chose          |  1 |
| La Reine Margot         |  1 |
| Les Trois Mousquetaires |  2 |
+-------------------------+----+

-- Nous aimerions connaitre le nombre d'emprunt par auteur
SELECT auteur, COUNT(id_emprunt) AS nb 
FROM livre, emprunt 
WHERE livre.id_livre = emprunt.id_livre
GROUP BY auteur;

+-------------------+----+
| auteur            | nb |
+-------------------+----+
| GUY DE MAUPASSANT |  4 |
| ALPHONSE DAUDET   |  1 |
| ALEXANDRE DUMAS   |  3 |
+-------------------+----+

-- Nous aimerions connaitre le nombre de livre à rendre pour chaque abonné
SELECT prenom, COUNT(id_emprunt) AS nb 
FROM abonne, emprunt 
WHERE abonne.id_abonne = emprunt.id_abonne
AND date_rendu IS NULL 
GROUP BY prenom;

+--------+----+
| prenom | nb |
+--------+----+
| Chloe  |  1 |
| Benoit |  1 |
+--------+----+

-- Qui a emprunté quoi et quand ?
SELECT prenom, auteur, titre, date_sortie 
FROM abonne a, livre l, emprunt e 
WHERE a.id_abonne = e.id_abonne 
AND e.id_livre = l.id_livre;
+-----------+-------------------+-------------------------+-------------+
| prenom    | auteur            | titre                   | date_sortie |
+-----------+-------------------+-------------------------+-------------+
| Guillaume | GUY DE MAUPASSANT | Une vie                 | 2016-12-07  |
| Benoit    | GUY DE MAUPASSANT | Bel-Ami                 | 2016-12-07  |
| Chloe     | GUY DE MAUPASSANT | Une vie                 | 2016-12-11  |
| Laura     | ALPHONSE DAUDET   | Le Petit chose          | 2016-12-12  |
| Guillaume | ALEXANDRE DUMAS   | La Reine Margot         | 2016-12-15  |
| Benoit    | ALEXANDRE DUMAS   | Les Trois Mousquetaires | 2017-01-02  |
| Chloe     | ALEXANDRE DUMAS   | Les Trois Mousquetaires | 2017-02-15  |
| Benoit    | GUY DE MAUPASSANT | Une vie                 | 2017-02-20  |
+-----------+-------------------+-------------------------+-------------+

SELECT * 
FROM abonne 
JOIN emprunt USING(id_abonne)
JOIN livre USING(id_livre);
+----------+-----------+-----------+------------+-------------+------------+-------------------+-------------------------+
| id_livre | id_abonne | prenom    | id_emprunt | date_sortie | date_rendu | auteur            | titre                   |
+----------+-----------+-----------+------------+-------------+------------+-------------------+-------------------------+
|      100 |         1 | Guillaume |          1 | 2016-12-07  | 2016-12-11 | GUY DE MAUPASSANT | Une vie                 |
|      101 |         2 | Benoit    |          2 | 2016-12-07  | 2016-12-18 | GUY DE MAUPASSANT | Bel-Ami                 |
|      100 |         3 | Chloe     |          3 | 2016-12-11  | 2016-12-19 | GUY DE MAUPASSANT | Une vie                 |
|      103 |         4 | Laura     |          4 | 2016-12-12  | 2016-12-22 | ALPHONSE DAUDET   | Le Petit chose          |
|      104 |         1 | Guillaume |          5 | 2016-12-15  | 2016-12-30 | ALEXANDRE DUMAS   | La Reine Margot         |
|      105 |         2 | Benoit    |          6 | 2017-01-02  | 2017-01-15 | ALEXANDRE DUMAS   | Les Trois Mousquetaires |
|      105 |         3 | Chloe     |          7 | 2017-02-15  | NULL       | ALEXANDRE DUMAS   | Les Trois Mousquetaires |
|      100 |         2 | Benoit    |          8 | 2017-02-20  | NULL       | GUY DE MAUPASSANT | Une vie                 |
+----------+-----------+-----------+------------+-------------+------------+-------------------+-------------------------+

---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- REQUETES JOINTURE EXTERNE (sans correspondance exigée)
---------------------------------------------------------------------------
---------------------------------------------------------------------------

-- Ajoutez vous dans les abonnés.
INSERT INTO abonne (prenom) VALUES ('Mathieu');
-- Affichez tous les abonnés sans exception avec les id_livre qu'ils ont emprunté si c'est le cas.
SELECT prenom, id_livre 
FROM abonne 
JOIN emprunt USING(id_abonne); -- avec cette requete on ne peut obtenir les abonnés n'ayant pas fait d'emprunt

-- Pour obtenir tous les abonnés sans exception, il est possible de faire une jointure externe : LEFT JOIN ou RIGHT JOIN
SELECT prenom, id_livre FROM abonne LEFT JOIN emprunt USING(id_abonne);
+-----------+----------+
| prenom    | id_livre |
+-----------+----------+
| Guillaume |      104 |
| Guillaume |      100 |
| Benoit    |      100 |
| Benoit    |      105 |
| Benoit    |      101 |
| Chloe     |      105 |
| Chloe     |      100 |
| Laura     |      103 |
| Mathieu   |     NULL |
+-----------+----------+

SELECT prenom, id_livre FROM emprunt RIGHT JOIN abonne USING(id_abonne);
+-----------+----------+
| prenom    | id_livre |
+-----------+----------+
| Guillaume |      104 |
| Guillaume |      100 |
| Benoit    |      100 |
| Benoit    |      105 |
| Benoit    |      101 |
| Chloe     |      105 |
| Chloe     |      100 |
| Laura     |      103 |
| Mathieu   |     NULL |
+-----------+----------+

SELECT prenom, id_livre, titre, auteur FROM abonne LEFT JOIN emprunt USING(id_abonne) LEFT JOIN livre USING(id_livre);
+-----------+----------+-------------------------+-------------------+
| prenom    | id_livre | titre                   | auteur            |
+-----------+----------+-------------------------+-------------------+
| Guillaume |      104 | La Reine Margot         | ALEXANDRE DUMAS   |
| Guillaume |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Benoit    |      101 | Bel-Ami                 | GUY DE MAUPASSANT |
| Chloe     |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Chloe     |      100 | Une vie                 | GUY DE MAUPASSANT |
| Laura     |      103 | Le Petit chose          | ALPHONSE DAUDET   |
| Mathieu   |     NULL | NULL                    | NULL              |
+-----------+----------+-------------------------+-------------------+

-- Affichez tous les livres sans exception puis les prénoms des abonnés ayant emprunté ce livre ainsi que la date d'emprunt
SELECT prenom, id_livre, titre, auteur FROM abonne RIGHT JOIN emprunt USING(id_abonne) RIGHT JOIN livre USING(id_livre);
SELECT prenom, id_livre, titre, auteur FROM livre LEFT JOIN emprunt USING(id_livre) LEFT JOIN abonne USING(id_abonne);
+-----------+----------+-------------------------+-------------------+
| prenom    | id_livre | titre                   | auteur            |
+-----------+----------+-------------------------+-------------------+
| Benoit    |      100 | Une vie                 | GUY DE MAUPASSANT |
| Chloe     |      100 | Une vie                 | GUY DE MAUPASSANT |
| Guillaume |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      101 | Bel-Ami                 | GUY DE MAUPASSANT |
| NULL      |      102 | Le pere Goriot          | HONORE DE BALZAC  |
| Laura     |      103 | Le Petit chose          | ALPHONSE DAUDET   |
| Guillaume |      104 | La Reine Margot         | ALEXANDRE DUMAS   |
| Chloe     |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Benoit    |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
+-----------+----------+-------------------------+-------------------+

-- LEFT JOIN donne la priorité à la table considérée comme étant à gauche dans la requete, cette priorité permet d'obtenir toutes les informations demandées provenants de cette table avant d'aller chercher les correspondances avec les autres tables.
-- RIGHT JOIN donne la priorité à la table considérée comme étant à droite dans la requete, cette priorité permet d'obtenir toutes les informations demandées provenants de cette table avant d'aller chercher les correspondances avec les autres tables.

-- Nous voulons obtenir la liste de tous les abonnés ainsi que le nombre d'emprunt qu'ils ont fait. S'il n'y a pas d'emprunt on aura 0 sur l'abonné concerné
SELECT abonne.prenom, count(emprunt.id_emprunt) AS nombre_emprunts
FROM abonne
LEFT JOIN emprunt on abonne.id_abonne=emprunt.id_abonne
GROUP BY abonne.id_abonne;
+-----------+-----------------+
| prenom    | nombre_emprunts |
+-----------+-----------------+
| Guillaume |               2 |
| Benoit    |               3 |
| Chloe     |               2 |
| Laura     |               1 |
| Mathieu   |               0 |
+-----------+-----------------+

---------------------------------------------------------------------------
---------------------------------------------------------------------------
-- UNION ou UNION ALL
---------------------------------------------------------------------------
---------------------------------------------------------------------------

-- UNION permet de fusionner deux requetes en un seul résultat
-- Il est nécessaire que les deux requetes aient le même nombre de colonne à l'affichage sinon ça plante.

-- Il faut afficher tous les abonnés dans exception et tous les livres sans exception quelques soient les correspondances.
SELECT prenom, id_livre, titre, auteur 
FROM abonne 
LEFT JOIN emprunt USING(id_abonne) 
LEFT JOIN livre USING(id_livre)
UNION 
SELECT prenom, id_livre, titre, auteur 
FROM abonne 
RIGHT JOIN emprunt USING(id_abonne) 
RIGHT JOIN livre USING(id_livre);

+-----------+----------+-------------------------+-------------------+
| prenom    | id_livre | titre                   | auteur            |
+-----------+----------+-------------------------+-------------------+
| Guillaume |      104 | La Reine Margot         | ALEXANDRE DUMAS   |
| Guillaume |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Benoit    |      101 | Bel-Ami                 | GUY DE MAUPASSANT |
| Chloe     |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Chloe     |      100 | Une vie                 | GUY DE MAUPASSANT |
| Laura     |      103 | Le Petit chose          | ALPHONSE DAUDET   |
| Mathieu   |     NULL | NULL                    | NULL              |
| NULL      |      102 | Le pere Goriot          | HONORE DE BALZAC  |
+-----------+----------+-------------------------+-------------------+

-- UNION applique un DISTINCT par défaut
-- Pour avoir toutes les lignes sans exception : UNION ALL
SELECT prenom, id_livre, titre, auteur 
FROM abonne 
LEFT JOIN emprunt USING(id_abonne) 
LEFT JOIN livre USING(id_livre)
UNION ALL
SELECT prenom, id_livre, titre, auteur 
FROM abonne 
RIGHT JOIN emprunt USING(id_abonne) 
RIGHT JOIN livre USING(id_livre);

+-----------+----------+-------------------------+-------------------+
| prenom    | id_livre | titre                   | auteur            |
+-----------+----------+-------------------------+-------------------+
| Guillaume |      104 | La Reine Margot         | ALEXANDRE DUMAS   |
| Guillaume |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Benoit    |      101 | Bel-Ami                 | GUY DE MAUPASSANT |
| Chloe     |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Chloe     |      100 | Une vie                 | GUY DE MAUPASSANT |
| Laura     |      103 | Le Petit chose          | ALPHONSE DAUDET   |
| Mathieu   |     NULL | NULL                    | NULL              |
| Guillaume |      100 | Une vie                 | GUY DE MAUPASSANT |
| Chloe     |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      100 | Une vie                 | GUY DE MAUPASSANT |
| Benoit    |      101 | Bel-Ami                 | GUY DE MAUPASSANT |
| NULL      |      102 | Le pere Goriot          | HONORE DE BALZAC  |
| Laura     |      103 | Le Petit chose          | ALPHONSE DAUDET   |
| Guillaume |      104 | La Reine Margot         | ALEXANDRE DUMAS   |
| Benoit    |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
| Chloe     |      105 | Les Trois Mousquetaires | ALEXANDRE DUMAS   |
+-----------+----------+-------------------------+-------------------+

-- Liset des abonnés et des auteurs
SELECT prenom AS 'personne physique' FROM abonne
UNION 
SELECT auteur FROM livre;
+-------------------+
| personne physique |
+-------------------+
| Guillaume         |
| Benoit            |
| Chloe             |
| Laura             |
| Mathieu           |
| GUY DE MAUPASSANT |
| HONORE DE BALZAC  |
| ALPHONSE DAUDET   |
| ALEXANDRE DUMAS   |
+-------------------+