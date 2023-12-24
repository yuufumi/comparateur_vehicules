SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `caracteristique`;
CREATE TABLE IF NOT EXISTS `caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `siege_social` varchar(255) NOT NULL,
  `annee_creation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `main_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` varchar(8) NOT NULL,
  `date_de_naissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `vehicule`;

CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `prix` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marque_id` (`marque_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `vehicule_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel1` (`utilisateur_id`),
  KEY `rel2` (`vehicule_id`),
  CONSTRAINT `rel1` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`),
  CONSTRAINT `rel2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `avis_marque`;
CREATE TABLE IF NOT EXISTS`avis_marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `note` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `marque_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marque_id` (`marque_id`),
  CONSTRAINT `avis_marque_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `comparaison`;
CREATE TABLE IF NOT EXISTS`comparaison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicule1_id` int(11) NOT NULL,
  `vehicule2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicule1_id` (`vehicule1_id`),
  KEY `vehicule2_id` (`vehicule2_id`),
  CONSTRAINT `comparaison_ibfk_1` FOREIGN KEY (`vehicule1_id`) REFERENCES `vehicule` (`id`),
  CONSTRAINT `comparaison_ibfk_2` FOREIGN KEY (`vehicule2_id`) REFERENCES `vehicule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS`image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(255) NOT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `marque_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marque_id` (`marque_id`),
  KEY `news_id` (`news_id`),
  KEY `vehicule_id` (`vehicule_id`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `image_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  CONSTRAINT `image_ibfk_3` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS `vehicule_caracteristique`;
CREATE TABLE IF NOT EXISTS `vehicule_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(255) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_id` (`feature_id`),
  KEY `vehicule_id` (`vehicule_id`),
  CONSTRAINT `vehicule_caracteristique_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `caracteristique` (`id`),
  CONSTRAINT `vehicule_caracteristique_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
