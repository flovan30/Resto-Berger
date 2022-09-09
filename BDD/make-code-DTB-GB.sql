CREATE TABLE boisson (
  idBoisson int(4) NOT NULL,
  libelleBoisson varchar(255) CHARACTER SET utf8 NOT NULL,
  prixBoisson decimal(15,2) NOT NULL,
  adressePhotoBoisson varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (idBoisson)
);

CREATE TABLE dessert (
  idDessert int(4) NOT NULL,
  libelleDessert varchar(255) CHARACTER SET utf8 NOT NULL,
  prixDessert decimal(6,2) NOT NULL,
  adressePhotoDessert varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (idDessert)
);

CREATE TABLE plat (
  idPlat int(4) NOT NULL,
  libellePlat varchar(255) CHARACTER SET utf8 NOT NULL,
  prixPlat decimal(6,2) NOT NULL,
  platdujour bit(1) NOT NULL,
  adressePhotoPlat varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (idPlat)
);

CREATE TABLE entree (
  idEntree int(4) NOT NULL,
  libelleEntree varchar(255) CHARACTER SET utf8 NOT NULL,
  prixEntree decimal(6,2) NOT NULL,
  adressePhotoEntree varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (idEntree)
);

CREATE TABLE clients (
  idClient int(10) NOT NULL,
  prenomClient varchar(30) CHARACTER SET utf8 NOT NULL,
  nomClient varchar(30) CHARACTER SET utf8 NOT NULL,
  mailClient varchar(90) CHARACTER SET utf8 NOT NULL,
  telClient varchar(9) CHARACTER SET utf8 NOT NULL,
  mdpClient varchar(255) CHARACTER SET utf8 NOT NULL,
  admin bit(1) NOT NULL,
  nbReservations int(5) NOT NULL,
  PRIMARY KEY (idClient)
);

CREATE TABLE reservation (
    idReservation int(11) NOT NULL,
    idClient int(10) NOT NULL, 
    dateReservation date NOT NULL,
    nbPersonne int(10) NOT NULL,
    idService int NOT NULL,
    PRIMARY KEY (idReservation)
);

CREATE TABLE services (
    idService int NOT NULL,
    dateService date NOT NULL,
    typeService bit(1) NOT NULL,
    nbPlacePrise int(2),
    PRIMARY KEY (idService)
);


ALTER TABLE reservation
ADD CONSTRAINT AddIdClient
FOREIGN KEY (idClient) REFERENCES clients(idClient);

ALTER TABLE reservation
ADD CONSTRAINT AddIdService
FOREIGN KEY (idService) REFERENCES services(idService); 