-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 08 sep. 2022 à 19:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test_bdd_resto_berger`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `idBoisson` int(11) NOT NULL,
  `libelleBoisson` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prixBoisson` decimal(15,2) NOT NULL,
  `adressePhotoBoisson` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`idBoisson`, `libelleBoisson`, `prixBoisson`, `adressePhotoBoisson`) VALUES
(2, 'Eau pétillante San Pellegrino', '2.00', 'uploaded_images/boisson630e2b37a5b6f2.54120300.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idClient` int(255) NOT NULL,
  `prenomClient` varchar(30) COLLATE utf8_bin NOT NULL,
  `nomClient` varchar(30) COLLATE utf8_bin NOT NULL,
  `mailClient` varchar(90) COLLATE utf8_bin NOT NULL,
  `telClient` varchar(10) COLLATE utf8_bin NOT NULL,
  `mdpClient` varchar(256) COLLATE utf8_bin NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `nbReservations` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `prenomClient`, `nomClient`, `mailClient`, `telClient`, `mdpClient`, `admin`, `nbReservations`) VALUES
(1, 'prenomTest', 'nomTest', 'testmail@mail.fr', '0000000000', '014a6e4af097b05af3e6267a0da60240f245e07a9d7ccda60e7a744ac150cccc', b'0', 0),
(2, 'testadmin', 'testadmin', 'testadmin@mail.com', '0000000000', '014a6e4af097b05af3e6267a0da60240f245e07a9d7ccda60e7a744ac150cccc', b'1', 0),
(3, 'steeve', 'catteau', 'steevecatteau@gmail.com', '0000000000', 'fe6e38bb6c8e2df9b6540eb3c995358bb5a16b7f7d42b06084fdda51b796f096', b'0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE `dessert` (
  `idDessert` int(11) NOT NULL,
  `libelleDessert` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prixDessert` decimal(15,2) NOT NULL,
  `adressePhotoDessert` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`idDessert`, `libelleDessert`, `prixDessert`, `adressePhotoDessert`) VALUES
(2, 'Verrine fruits rouges', '4.00', 'uploaded_images/dessert630e24da52fca0.60843891.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `idEntree` int(11) NOT NULL,
  `libelleEntree` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prixEntree` decimal(15,2) NOT NULL,
  `adressePhotoEntree` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`idEntree`, `libelleEntree`, `prixEntree`, `adressePhotoEntree`) VALUES
(16, 'test', '30.00', 'uploaded_images/entree630bb596a5e6c1.44530484.jpg'),
(17, 'test2', '30.00', 'uploaded_images/entree630bb5ba02c2c0.36011769.jpg'),
(18, 'test3', '2.00', 'uploaded_images/entree630bb5c7b91b61.62597613.jpg'),
(20, 'test5', '50.00', 'uploaded_images/entree630bb5ecb92896.04417288.jpg'),
(21, 'test6', '60.00', 'uploaded_images/entree630bb5faa07926.79409081.jpg'),
(22, 'test7', '70.00', 'uploaded_images/entree630bb60ee4e394.17518641.jpg'),
(23, 'test8', '80.00', 'uploaded_images/entree630bb61d5d4655.08991702.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `idPlat` int(11) NOT NULL,
  `libellePlat` varchar(256) CHARACTER SET utf8 NOT NULL,
  `prixPlat` decimal(15,2) NOT NULL,
  `adressePhotoPlat` varchar(256) CHARACTER SET utf8 NOT NULL,
  `platdujour` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`idPlat`, `libellePlat`, `prixPlat`, `adressePhotoPlat`, `platdujour`) VALUES
(4, 'Filet mignon sauce a lail et au romarin', '3.00', 'uploaded_images/plat630c2123a60d75.76287272.jpg', b'0');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateReservation` date NOT NULL,
  `nbPersonne` int(11) NOT NULL,
  `idService` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `idService` bigint(11) NOT NULL,
  `dateService` date NOT NULL,
  `typeService` tinyint(1) NOT NULL,
  `nbPlacesPrise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`idService`, `dateService`, `typeService`, `nbPlacesPrise`) VALUES
(1, '2022-09-19', 0, 0),
(2, '2022-09-15', 1, 2),
(3, '2022-09-19', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`idBoisson`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`idDessert`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`idEntree`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`idPlat`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `idBoisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `idDessert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `idEntree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `idPlat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `idService` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idService`) REFERENCES `services` (`idService`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
