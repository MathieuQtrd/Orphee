-- table virtuelle : view

-- Une table virtuelle se construit depuis une requete et des données existantes
-- Les données d'une table virtuelle sont les mêmes que les données initiales
-- Si je modifie une donnée sur la la vue, les données d'origines seront aussi modifiées et inversement.

-- Durée de vie : jusqu'à ce que que le dev la supprime.

USE bibliotheque;

SHOW TABLES;

+------------------------+
| Tables_in_bibliotheque |
+------------------------+
| abonne                 |
| emprunt                |
| livre                  |
+------------------------+

CREATE VIEW vue_emprunt AS  
    SELECT prenom, date_sortie, titre
    FROM abonne 
    JOIN emprunt USING(id_abonne)
    JOIN livre USING(id_livre);

+------------------------+
| Tables_in_bibliotheque |
+------------------------+
| abonne                 |
| emprunt                |
| livre                  |
| vue_emprunt            |
+------------------------+

SELECT * FROM vue_emprunt WHERE YEAR(date_sortie) = 2016;

+-----------+-------------+-----------------+
| prenom    | date_sortie | titre           |
+-----------+-------------+-----------------+
| Guillaume | 2016-12-07  | Une vie         |
| Benoit    | 2016-12-07  | Bel-Ami         |
| Chloe     | 2016-12-11  | Une vie         |
| Laura     | 2016-12-12  | Le Petit chose  |
| Guillaume | 2016-12-15  | La Reine Margot |
+-----------+-------------+-----------------+

-- Pour supprimer la table virtuelle
DROP VIEW vue_emprunt;


-- Pour voir les vues présentent sur le serveur
SELECT * FROM information_schema.views \G;

SELECT table_name FROM information_schema.views;
+-----------------------------------------------+
| TABLE_NAME                                    |
+-----------------------------------------------+
| version                                       |
| innodb_buffer_stats_by_schema                 |
| x$innodb_buffer_stats_by_schema               |
| innodb_buffer_stats_by_table                  |
| x$innodb_buffer_stats_by_table                |
| schema_object_overview                        |
| schema_auto_increment_columns                 |
| x$schema_flattened_keys                       |
| schema_redundant_indexes                      |
| ps_check_lost_instrumentation                 |
| latest_file_io                                |
| x$latest_file_io                              |
| io_by_thread_by_latency                       |
| x$io_by_thread_by_latency                     |
| io_global_by_file_by_bytes                    |
| x$io_global_by_file_by_bytes                  |
| io_global_by_file_by_latency                  |
| x$io_global_by_file_by_latency                |
| io_global_by_wait_by_bytes                    |
| x$io_global_by_wait_by_bytes                  |
| io_global_by_wait_by_latency                  |
| x$io_global_by_wait_by_latency                |
| innodb_lock_waits                             |
| x$innodb_lock_waits                           |
| memory_by_user_by_current_bytes               |
| x$memory_by_user_by_current_bytes             |
| memory_by_host_by_current_bytes               |
...