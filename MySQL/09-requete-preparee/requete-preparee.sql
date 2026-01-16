--------------------------------------------------------
--------------------------------------------------------
-- REQUETE PREPAREE
--------------------------------------------------------
--------------------------------------------------------

-- Lors de l'exécution d'une requete : 3 étapes
-- 01 - On fournit la requete au systeme
-- 02 - Interprétation de la requete
-- 03 - exécution

USE entreprise;

SELECT * FROM employes WHERE prenom = 'chloe';

+-------------+--------+-------+------+------------+---------------+---------+
| id_employes | prenom | nom   | sexe | service    | date_embauche | salaire |
+-------------+--------+-------+------+------------+---------------+---------+
|         417 | Chloe  | Dubar | f    | production | 2011-09-05    |    1900 |
+-------------+--------+-------+------+------------+---------------+---------+

PREPARE req1 FROM "SELECT * FROM employes WHERE prenom=?";

-- variable contenant une information 
SET @prenom = 'Chloe';

+-------------+--------+-------+------+------------+---------------+---------+
| id_employes | prenom | nom   | sexe | service    | date_embauche | salaire |
+-------------+--------+-------+------+------------+---------------+---------+
|         417 | Chloe  | Dubar | f    | production | 2011-09-05    |    1900 |
+-------------+--------+-------+------+------------+---------------+---------+

EXECUTE req1 USING @prenom;

SET @prenom2 = 'Jean-pierre';

EXECUTE req1 USING @prenom2;
+-------------+-------------+---------+------+-----------+---------------+---------+
| id_employes | prenom      | nom     | sexe | service   | date_embauche | salaire |
+-------------+-------------+---------+------+-----------+---------------+---------+
|         350 | Jean-pierre | Laborde | m    | direction | 2010-12-09    |    5000 |
+-------------+-------------+---------+------+-----------+---------------+---------+