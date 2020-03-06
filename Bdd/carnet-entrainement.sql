SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE  IF EXISTS `carnet-entrainement`;
CREATE DATABASE IF NOT EXISTS `carnet-entrainement`;
USE `carnet-entrainement`;

DROP TABLE IF EXISTS `coureurs`;
CREATE TABLE IF NOT EXISTS `coureurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
    `streetNumber` int(11)  NOT NULL,
      `street` varchar(255) NOT NULL,
        `country` varchar(255) NOT NULL,
          `postalCode` int(11) NOT NULL,
  `birthdayDate` date NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCoureur` int(11) NOT NULL,
  `dateEntrainement` datetime NOT NULL,
  `kilometrage` decimal NOT NULL,
    `duree` time  NOT NULL,
      `vitesseMoyenne` decimal NOT NULL,
        `meteo` varchar(255) NOT NULL,
          `commentaire` text NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`idCoureur`) REFERENCES coureurs (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;