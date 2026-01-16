CREATE DATABASE vtc;

USE vtc;

DROP TABLE IF EXISTS `association_vehicule_conducteur`;
CREATE TABLE IF NOT EXISTS `association_vehicule_conducteur` (
  `id_association` int NOT NULL AUTO_INCREMENT,
  `id_vehicule` int DEFAULT NULL,
  `id_conducteur` int DEFAULT NULL,
  PRIMARY KEY (`id_association`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_conducteur` (`id_conducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 ;



INSERT INTO `association_vehicule_conducteur` (`id_association`, `id_vehicule`, `id_conducteur`) VALUES
(1, 501, 1),
(2, 502, 2),
(3, 503, 3),
(4, 504, 4),
(5, 501, 3);


DROP TABLE IF EXISTS `conducteur`;
CREATE TABLE IF NOT EXISTS `conducteur` (
  `id_conducteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 ;


INSERT INTO `conducteur` (`id_conducteur`, `nom`, `prenom`) VALUES
(1, 'Avigny', 'Julien'),
(2, 'Alamia', 'Morgane'),
(3, 'Pandre', 'Philippe'),
(4, 'Blondelle', 'Amelie'),
(5, 'Richy', 'Alex');


DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vehicule`),
  UNIQUE KEY `immatriculation` (`immatriculation`)
) ENGINE=InnoDB AUTO_INCREMENT=509;


INSERT INTO `vehicule` (`id_vehicule`, `marque`, `modele`, `couleur`, `immatriculation`) VALUES
(501, 'Peugeot', '807', 'noir', 'AB-355-CA'),
(502, 'Citroen', 'C8', 'bleu', 'CE-122-AE'),
(503, 'Mercedes', 'Cls', 'vert', 'FG-953-HI'),
(504, 'Volkswagen', 'Touran', 'noir', 'SO-322-NV'),
(505, 'Skoda', 'Octavia', 'gris', 'PB-631-TK'),
(506, 'Volkswagen', 'Passat', 'gris', 'XN-973-MM');


ALTER TABLE `association_vehicule_conducteur`
  ADD CONSTRAINT `association_vehicule_conducteur_ibfk_1` FOREIGN KEY (`id_conducteur`) REFERENCES `conducteur` (`id_conducteur`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `association_vehicule_conducteur_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE SET NULL ON UPDATE CASCADE;
