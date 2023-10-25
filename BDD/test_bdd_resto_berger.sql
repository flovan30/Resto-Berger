-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 mars 2023 à 09:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_resto_berger`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE IF NOT EXISTS `boisson` (
  `idBoisson` int NOT NULL AUTO_INCREMENT,
  `libelleBoisson` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prixBoisson` decimal(6,2) NOT NULL,
  `adressePhotoBoisson` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idBoisson`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`idBoisson`, `libelleBoisson`, `prixBoisson`, `adressePhotoBoisson`) VALUES
(1, 'rzz', '2.00', 'uploaded_images/boisson6356dd0019ce25.49368993.png');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `prenomClient` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nomClient` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mailClient` varchar(90) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telClient` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mdpClient` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `admin` bit(1) NOT NULL,
  `nbReservations` int NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `prenomClient`, `nomClient`, `mailClient`, `telClient`, `mdpClient`, `admin`, `nbReservations`) VALUES
(1, 'normal', 'user', 'testmail@mail.fr', '000000000', '014a6e4af097b05af3e6267a0da60240f245e07a9d7ccda60e7a744ac150cccc', b'0', 0),
(2, 'admin', 'user', 'testadmin@mail.com', '000000000', '014a6e4af097b05af3e6267a0da60240f245e07a9d7ccda60e7a744ac150cccc', b'1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `idDessert` int NOT NULL AUTO_INCREMENT,
  `libelleDessert` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prixDessert` decimal(6,2) NOT NULL,
  `adressePhotoDessert` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idDessert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `idEntree` int NOT NULL AUTO_INCREMENT,
  `libelleEntree` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prixEntree` decimal(6,2) NOT NULL,
  `adressePhotoEntree` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idEntree`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `idPlat` int NOT NULL AUTO_INCREMENT,
  `libellePlat` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prixPlat` decimal(6,2) NOT NULL,
  `platdujour` bit(1) NOT NULL,
  `adressePhotoPlat` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`idPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `dateReservation` date NOT NULL,
  `nbPersonne` int NOT NULL,
  `idService` int NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `addidclient` (`idClient`),
  KEY `addidservice` (`idService`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idClient`, `dateReservation`, `nbPersonne`, `idService`) VALUES
(1, 2, '2022-09-19', 5, 1),
(2, 2, '2022-09-10', 5, 2),
(3, 2, '2022-09-10', 60, 3),
(4, 2, '2022-09-11', 10, 4),
(5, 2, '2022-09-11', 60, 4),
(6, 1, '2022-09-26', 70, 5),
(7, 1, '2023-03-15', 10, 6);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `idService` int NOT NULL AUTO_INCREMENT,
  `dateService` date NOT NULL,
  `typeService` bit(1) NOT NULL,
  `nbPlacePrise` int DEFAULT NULL,
  PRIMARY KEY (`idService`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`idService`, `dateService`, `typeService`, `nbPlacePrise`) VALUES
(1, '2022-09-19', b'0', 5),
(2, '2022-09-10', b'0', 5),
(3, '2022-09-10', b'1', 60),
(4, '2022-09-11', b'0', 70),
(5, '2022-09-26', b'1', 70),
(6, '2023-03-15', b'0', 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `addidclient` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`),
  ADD CONSTRAINT `addidservice` FOREIGN KEY (`idService`) REFERENCES `services` (`idService`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
