CREATE DATABASE IF NOT EXISTS gestionUe;
USE gestionUe;
CREATE TABLE Niveau (id int primary key auto_increment, nomNiveau CHAR(2) NOT NULL UNIQUE);
CREATE TABLE Semestre (id int primary key auto_increment, nomSemestre VARCHAR(3) NOT NULL UNIQUE);
CREATE TABLE UE (id int primary key auto_increment, nomUe VARCHAR(256) NOT NULL UNIQUE);
CREATE TABLE ECUE (id int primary key auto_increment, nomECUE VARCHAR(256) NOT NULL UNIQUE);
CREATE TABLE grade(id int auto_increment not null primary key , nomGrade VARCHAR(100) not null); 
CREATE TABLE Professeur (id int primary key auto_increment, nomProf VARCHAR(256) NOT NULL, prenomProf VARCHAR(256), idGrade int, adresse VARCHAR(256), tel varchar(256), mail VARCHAR(256), vacataire boolean, matricule varchar(256),CIN BIGINT NOT NULL UNIQUE, foreign key (idGrade) references grade(id), UNIQUE (nomProf,prenomProf));
CREATE TABLE Enseignement (id int primary key auto_increment, type char(2) NOT NULL UNIQUE);
CREATE TABLE Classification (id int primary key auto_increment, niveau int, semestre int, ue int, ecue int, heure int, credit int, prof int, enseignement int, groupe int NOT NULL, foreign key (enseignement) references Enseignement(id), foreign key (niveau) references Niveau(id),foreign key (prof) references Professeur(id), foreign key (semestre) references Semestre(id), foreign key (ue) references UE(id), foreign key (ecue) references ECUE(id), UNIQUE (ue,ecue,enseignement,niveau,semestre));
INSERT INTO Enseignement (type) VALUES ('ET'),('TD'),('TP');
INSERT INTO Niveau (nomNiveau) VALUES ('L1'),('L2'),('L3'),('M1'),('M2');
INSERT INTO Semestre (nomSemestre) VALUES ('S1'),('S2'),('S3'),('S4'),('S5'),('S6'),('S7'),('S8'),('S9'),('S10');

