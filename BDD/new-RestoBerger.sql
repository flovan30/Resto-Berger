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