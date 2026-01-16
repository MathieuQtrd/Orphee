-- Création d'un user
CREATE USER 'bob'@'localhost' IDENTIFIED BY 'azerty';

-- Suppression d'un user
DROP USER 'bob'@'localhost';

-- On donne les droits
-- GRANT
GRANT SELECT, INSERT, DELETE, UPDATE(service)
    ON entreprise.employes 
    TO 'bob'@'localhost';

-- Pour valider un GRANT
FLUSH PRIVILEGES;

