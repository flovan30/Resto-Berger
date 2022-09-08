CREATE TABLE CLIENTS (
idClient AUTO_INCREMENT NOT NULL,
prenomClient varchar(30) NOT NULL,
nomClient varchar(30) NOT NULL,
mailClient varchar(90) NOT NULL,
telClient varchar(10) NOT NULL,
mdpClient varchar(30) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE TABLES (
idTable AUTO_INCREMENT NOT NULL,
numTable int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/* menu */
CREATE TABLE `boisson` (
  `idBoisson` int NOT NULL,
  `libelleBoisson` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `prixBoisson` float DEFAULT NULL,
  `adressePhotoBoisson` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE reservation (
  idClient int NOT NULL,
  dateReservation date NOT NULL,
  nbPersonne int DEFAULT NOT NULL,
  idReservation int NOT NULL
)

CREATE TABLE service(
  idReservation int NOT NULL
)

