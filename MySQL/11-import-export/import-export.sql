-- Ouvrir cmd

-- Export
-- Il faut se positionner dans le dossier où se trouve mysql du serveur
> cd C:\wamp64\bin\mysql\mysql8.0.31\bin
> mysqldump -u root -p entreprise > c:/wamp64/www/entreprise_export.sql

-- Dans powershell
> cd C:\wamp64\bin\mysql\mysql8.0.31\bin
> .\mysqldump.exe -u root -p entreprise > c:/wamp64/www/entreprise_export.sql


-- Import
> cd C:\wamp64\bin\mysql\mysql8.0.31\bin
> mysql -u root -p entreprise < c:/wamp64/www/employes2.sql


> mysql -u root -p < c:/wamp64/www/entreprise2.sql


-- Dans la console MySQL pou run import d'un fichier contenant un ensemble de requete
mysql> SOURCE c:/wamp64/www/entreprise3.sql