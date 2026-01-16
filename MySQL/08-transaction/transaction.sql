-- Les transactions sont disponibles avec le moteur innoDB
-- Les transactions nous permettent de créer un environnemen de travail que l'on peut annuler (ROLLBACK) ou valider (COMMIT)
-- Normalement, chaque action est définitive, avec les transactions cela nous permet de tester notre travail avant de le valider.

-- Attention, certaines actions sont définitives (transaction ou pas) : CREATE, DROP et ALTER


USE entreprise;

START TRANSACTION; -- demarre la zone de mise en tampon

SELECT * FROM employes;

UPDATE employes SET service = 'Web' WHERE id_employes = 933;

SELECT * FROM employes;

UPDATE employes SET salaire = 3000;

SELECT * FROM employes;

UPDATE employes SET salaire = +100; -- UPDATE employes SET salaire = salaire+100;

SELECT * FROM employes;

DELETE FROM employes WHERE service = 'commercial';

SELECT * FROM employes;

-- COMMIT; -- valide toutes les opérations depuis le start transaction et ferme la transaction
ROLLBACK; -- annule toutes les opérations depuis le start transaction et ferme la transaction

SELECT * FROM employes;

---------------------------------------------------------------
---------------------------------------------------------------
-- SAVEPOINT
---------------------------------------------------------------
---------------------------------------------------------------

START TRANSACTION;

SELECT * FROM employes;

SAVEPOINT point1; -- point de sauvegarde nommé point1

UPDATE employes SET salaire = salaire + 1000;

SELECT * FROM employes;

SAVEPOINT point2; -- point de sauvegarde nommé point2

DELETE FROM employes WHERE service = 'direction';

SELECT * FROM employes;

SAVEPOINT point3; -- point de sauvegarde nommé point3

DELETE FROM employes;

SELECT * FROM employes;

SAVEPOINT point4; -- point de sauvegarde nommé point4

ROLLBACK TO point1;

ROLLBACK TO point2; -- ERROR 1305 (42000): SAVEPOINT point2 does not exist

COMMIT;

SELECT * FROM employes;

-- S'il y a un souci, la session est fermée pendant la transaction (coupure d'électricité par exemple) : La BDD applique un ROLLBACK par défaut.
