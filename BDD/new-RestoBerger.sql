CREATE TABLE CLIENTS (
idClient AUTO_INCREMENT NOT NULL,
prenomClient varchar(30) NOT NULL,
nomClient varchar(30) NOT NULL,
mailClient varchar(90) NOT NULL,
telClient varchar(10) NOT NULL,
mdpClient varchar(30) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE RESERVATIONS (
idReservation AUTO_INCREMENT NOT NULL,
idClient int NOT NULL,
idTable int NOT NULL,
typeService int NOT NULL,
Datereservation date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE TABLES (
idTable AUTO_INCREMENT NOT NULL,
numTable int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

ALTER TABLE clients 
    ADD PRIMARY KEY (idClient);

ALTER TABLE reservations
    ADD PRIMARY KEY (idReservation),
    ADD FOREIGN KEY (idClient) REFERENCES CLIENTS(idClient),
    ADD FOREIGN KEY (idTable) REFERENCES TABLES(idTable);

/* menu */
CREATE TABLE `boisson` (
  `idBoisson` int NOT NULL,
  `libelleBoisson` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `prixBoisson` float DEFAULT NULL,
  `adressePhotoBoisson` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `dessert` (
  `idDessert` int NOT NULL,
  `libelleDessert` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `prixDessert` float DEFAULT NULL,
  `adresseDessert` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `plat` (
  `idPlat` int NOT NULL,
  `libellePlat` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `prixPlat` float DEFAULT NULL,
  `adressePlat` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `entree` (
  `idEntree` int NOT NULL,
  `libelleEntree` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `prixEntree` float DEFAULT NULL,
  `adresseEntree` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;