-- Une table temporaire se construit depuis une requete via des données existantes mais les données sont ensuite sur cette table indépendantes des données initiales.
-- Si je modifie une donnée de la table temporaire, la donnée d'origine ne sera pas impactée
-- Durée de vie très courte, si on ferme la session, la table sera supprimée.

USE entreprise;

SHOW TABLES;

CREATE TEMPORARY TABLE commerciaux AS SELECT * FROM employes WHERE service = 'commercial';

SHOW TABLES;

-- les tables temporaires ne seront pas visibles avec un show
-- en revanche elles existent, on peut les interroger.

SELECT * FROM commerciaux;

+-------------+-----------+---------+------+------------+---------------+---------+
| id_employes | prenom    | nom     | sexe | service    | date_embauche | salaire |
+-------------+-----------+---------+------+------------+---------------+---------+
|         388 | Clement   | Gallet  | m    | commercial | 2010-12-15    |    2300 |
|         415 | Thomas    | Winter  | m    | commercial | 2011-05-03    |    3550 |
|         547 | Melanie   | Collier | f    | commercial | 2012-01-08    |    3100 |
|         627 | Guillaume | Miller  | m    | commercial | 2012-07-02    |    1900 |
|         655 | Celine    | Perrin  | f    | commercial | 2012-09-10    |    2700 |
|         933 | Emilie    | Sennard | f    | commercial | 2017-01-11    |    1800 |
+-------------+-----------+---------+------+------------+---------------+---------+

CREATE TEMPORARY TABLE femme AS SELECT nom, prenom, sexe FROM employes WHERE sexe = 'f';

SELECT * FROM femme;

+----------+-----------+------+
| nom      | prenom    | sexe |
+----------+-----------+------+
| Dubar    | Chloe     | f    |
| Fellier  | Elodie    | f    |
| Collier  | Melanie   | f    |
| Blanchet | Laura     | f    |
| Perrin   | Celine    | f    |
| Thoyer   | Amandine  | f    |
| Martin   | Nathalie  | f    |
| Sennard  | Emilie    | f    |
| Lafaye   | Stephanie | f    |
+----------+-----------+------+