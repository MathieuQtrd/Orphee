CREATE DATABASE IF NOT EXISTS dialogue;

USE dialogue;

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



INSERT INTO `commentaire` (`id`, `auteur`, `message`, `date`) VALUES
(1, 'Mathieu', 'Bonjour à tous', '2023-04-26 14:20:09'),
(2, 'Admin', 'Hello', '2023-04-26 14:22:43'),
(3, 'Mathieu', 'Aujourd\'hui il fait beau', '2023-04-26 14:24:47');
