CREATE DATABASE gestionUe;
USE gestionUe;
CREATE TABLE Niveau (id int primary key auto_increment, nomNiveau CHAR(2) NOT NULL UNIQUE);
CREATE TABLE Semestre (id int primary key auto_increment, nomSemestre VARCHAR(3) NOT NULL UNIQUE);
CREATE TABLE UE (id int primary key auto_increment, nomUe VARCHAR(256) NOT NULL UNIQUE);
CREATE TABLE QUE (id int primary key auto_increment, nomQUE VARCHAR(256) NOT NULL UNIQUE);
CREATE TABLE Professeur (id int primary key auto_increment, nomProf VARCHAR(256) NOT NULL UNIQUE);
CREATE TABLE Classification (id int primary key auto_increment, niveau int, semestre int, ue int, que int, heure int, credit int, prof int, foreign key (niveau) references Niveau(id),foreign key (prof) references Professeur(id), foreign key (semestre) references Semestre(id), foreign key (ue) references UE(id), foreign key (que) references QUE(id), UNIQUE (ue,que));
INSERT INTO Niveau (nomNiveau) VALUES ('L1'),('L2'),('L3'),('M1'),('M2');
INSERT INTO Semestre (nomSemestre) VALUES ('S1'),('S2'),('S3'),('S4'),('S5'),('S6'),('S7'),('S8'),('S9'),('S10');
