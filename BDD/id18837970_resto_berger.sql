-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 13 mai 2022 à 15:21
-- Version du serveur :  10.5.12-MariaDB
-- Version de PHP : 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id18837970_resto_berger`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idclient_Avis` int(255) NOT NULL,
  `commentaire_Avis` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `numBoisson_Boisson` int(255) NOT NULL,
  `libelleBoisson_Boisson` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prixBoisson_Boisson` float DEFAULT NULL,
  `photoBoisson` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`numBoisson_Boisson`, `libelleBoisson_Boisson`, `prixBoisson_Boisson`, `photoBoisson`) VALUES
(1, 'Eau vittel 33cl', 1, '627e771c029e10.51911654.jpg'),
(2, 'Eau pétillante San Pellegrino 33cl', 1, '627e772e207199.63831514.jpg'),
(3, 'Coca Cola 33cl', 2, '627e7740736d88.39730428.jpg'),
(4, 'Fanta 33cl', 2, '627e77573f4cd2.35553025.jpg'),
(5, 'Ice Tea peche 33cl', 2, '627e7769e93407.30545442.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `numClient_Clients` int(255) NOT NULL,
  `prenom_Client_Clients` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nom_Client_Clients` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mailClient_Clients` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `telClient_Clients` int(255) DEFAULT NULL,
  `mdpClient_Clients` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`numClient_Clients`, `prenom_Client_Clients`, `nom_Client_Clients`, `mailClient_Clients`, `telClient_Clients`, `mdpClient_Clients`) VALUES
(8, 'admin', 'instrateur', 'administrateur@gmail.com', 613642054, '8776f108e247ab1e2b323042c049c266407c81fbad41bde1e8dfc1bb66fd267e');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande_Commande` int(255) NOT NULL,
  `numClient_Clients` int(255) DEFAULT NULL,
  `numBoisson_Boisson` int(255) DEFAULT NULL,
  `numDesert_Desert` int(255) DEFAULT NULL,
  `numEntree_Entree` int(255) DEFAULT NULL,
  `numPlat_Plat` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE `dessert` (
  `numDesert_Desert` int(255) NOT NULL,
  `libelleDesert_Desert` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prixDesert_Desert` float DEFAULT NULL,
  `photoDesert` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `donne`
--

CREATE TABLE `donne` (
  `numClient_Clients` int(255) NOT NULL,
  `idclient_Avis` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `numEntree_Entree` int(255) NOT NULL,
  `libelleEntree_Entree` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prixEntree` float DEFAULT NULL,
  `photoEntree_Entree` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `numPlat_Plat` int(255) NOT NULL,
  `libellePlat_Plat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prixPlat_Plat` float DEFAULT NULL,
  `platdujour_Plat` tinyint(2) DEFAULT 0,
  `photo_plat` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation_Reservation` int(255) NOT NULL,
  `service_Reservation` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dateReservation_Reservation` date DEFAULT NULL,
  `numClient_Clients` int(255) DEFAULT NULL,
  `numTable_Tables` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE `tables` (
  `numTable_Tables` int(255) NOT NULL,
  `NbplaceTable_Tables` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idclient_Avis`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`numBoisson_Boisson`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`numClient_Clients`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande_Commande`),
  ADD KEY `FK_Commande_numClient_Clients` (`numClient_Clients`),
  ADD KEY `FK_Commande_numBoisson_Boisson` (`numBoisson_Boisson`),
  ADD KEY `FK_Commande_numDesert_Desert` (`numDesert_Desert`),
  ADD KEY `FK_Commande_numEntree_Entree` (`numEntree_Entree`),
  ADD KEY `FK_Commande_numPlat_Plat` (`numPlat_Plat`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`numDesert_Desert`);

--
-- Index pour la table `donne`
--
ALTER TABLE `donne`
  ADD PRIMARY KEY (`numClient_Clients`,`idclient_Avis`),
  ADD KEY `FK_Donne_idclient_Avis` (`idclient_Avis`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`numEntree_Entree`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`numPlat_Plat`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation_Reservation`),
  ADD KEY `FK_Reservation_numClient_Clients` (`numClient_Clients`),
  ADD KEY `FK_Reservation_numTable_Tables` (`numTable_Tables`);

--
-- Index pour la table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`numTable_Tables`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idclient_Avis` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `numBoisson_Boisson` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `numClient_Clients` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande_Commande` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `numDesert_Desert` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donne`
--
ALTER TABLE `donne`
  MODIFY `numClient_Clients` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `numEntree_Entree` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `numPlat_Plat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation_Reservation` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tables`
--
ALTER TABLE `tables`
  MODIFY `numTable_Tables` int(255) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Commande_numBoisson_Boisson` FOREIGN KEY (`numBoisson_Boisson`) REFERENCES `boisson` (`numBoisson_Boisson`),
  ADD CONSTRAINT `FK_Commande_numClient_Clients` FOREIGN KEY (`numClient_Clients`) REFERENCES `clients` (`numClient_Clients`),
  ADD CONSTRAINT `FK_Commande_numDesert_Desert` FOREIGN KEY (`numDesert_Desert`) REFERENCES `dessert` (`numDesert_Desert`),
  ADD CONSTRAINT `FK_Commande_numEntree_Entree` FOREIGN KEY (`numEntree_Entree`) REFERENCES `entree` (`numEntree_Entree`),
  ADD CONSTRAINT `FK_Commande_numPlat_Plat` FOREIGN KEY (`numPlat_Plat`) REFERENCES `plat` (`numPlat_Plat`);

--
-- Contraintes pour la table `donne`
--
ALTER TABLE `donne`
  ADD CONSTRAINT `FK_Donne_idclient_Avis` FOREIGN KEY (`idclient_Avis`) REFERENCES `avis` (`idclient_Avis`),
  ADD CONSTRAINT `FK_Donne_numClient_Clients` FOREIGN KEY (`numClient_Clients`) REFERENCES `clients` (`numClient_Clients`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_numClient_Clients` FOREIGN KEY (`numClient_Clients`) REFERENCES `clients` (`numClient_Clients`),
  ADD CONSTRAINT `FK_Reservation_numTable_Tables` FOREIGN KEY (`numTable_Tables`) REFERENCES `tables` (`numTable_Tables`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
