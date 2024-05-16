CREATE DATABASE IF NOT EXISTS gestionUe;
USE gestionUe;


-- UE
DROP TABLE IF EXISTS `UE`;
CREATE TABLE `UE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUe` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomUe` (`nomUe`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `UE` WRITE;
INSERT INTO `UE` VALUES (11,''),(3,'Communication'),(4,'Gestion de projet'),(1,'Mathematique'),(9,'Physique'),(2,'Programmation'),(12,'Test');
UNLOCK TABLES;

-- ECUE
DROP TABLE IF EXISTS `ECUE`;
CREATE TABLE `ECUE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomECUE` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomECUE` (`nomECUE`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `ECUE` WRITE;
INSERT INTO `ECUE` VALUES (21,''),(2,'Algebre'),(1,'Analyse'),(10,'Bash'),(9,'C'),(15,'Communication'),(13,'Communication audio-visuel'),(14,'Communication interpersonnelle'),(5,'Geometrie'),(11,'Gestion de projet'),(7,'JAVA'),(17,'Langue'),(12,'Langue et communication'),(18,'Mathematique'),(6,'PHP'),(19,'Physique'),(4,'Probabillite'),(20,'Programmation'),(8,'QT'),(3,'Statistique'),(22,'Test');
UNLOCK TABLES;

-- Enseignement
DROP TABLE IF EXISTS `Enseignement`;
CREATE TABLE `Enseignement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Enseignement` WRITE;
INSERT INTO `Enseignement` VALUES (2,'ED'),(3,'EP'),(1,'ET');
UNLOCK TABLES;

-- Niveau
DROP TABLE IF EXISTS `Niveau`;
CREATE TABLE `Niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomNiveau` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomNiveau` (`nomNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Niveau` WRITE;
INSERT INTO `Niveau` VALUES (1,'L1'),(2,'L2'),(3,'L3'),(4,'M1'),(5,'M2');
UNLOCK TABLES;

-- Semestre
DROP TABLE IF EXISTS `Semestre`;
CREATE TABLE `Semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSemestre` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomSemestre` (`nomSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Semestre` WRITE;
INSERT INTO `Semestre` VALUES (1,'S1'),(2,'S2'),(3,'S3'),(4,'S4'),(5,'S5'),(6,'S6'),(7,'S7'),(8,'S8'),(9,'S9'),(10,'S10');
UNLOCK TABLES;

-- Grade: Professeur
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomGrade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `grade` WRITE;
INSERT INTO `grade` VALUES (1,'Professeur'),(2,'Assistant'),(3,'Professeur titulaire'),(4,'Maître de conférence');
UNLOCK TABLES;

-- Professeur
DROP TABLE IF EXISTS `Professeur`;
CREATE TABLE `Professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomProf` varchar(256) NOT NULL,
  `prenomProf` varchar(256) DEFAULT NULL,
  `idGrade` int(11) DEFAULT NULL,
  `adresse` varchar(256) DEFAULT NULL,
  `tel` varchar(256) DEFAULT NULL,
  `mail` varchar(256) DEFAULT NULL,
  `vacataire` tinyint(1) DEFAULT NULL,
  `matricule` varchar(256) DEFAULT NULL,
  `CIN` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CIN` (`CIN`),
  UNIQUE KEY `nomProf` (`nomProf`,`prenomProf`),
  KEY `idGrade` (`idGrade`),
  CONSTRAINT `Professeur_ibfk_1` FOREIGN KEY (`idGrade`) REFERENCES `grade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Professeur` WRITE;
INSERT INTO `Professeur` VALUES (1,'Rakoto','Randria',1,'Antananarivo','034 56 111 01','rakoto@mit-ua.mg',0,'198653228',1234867890),(3,'Rakoto','Rasoa',1,'Antananarivo','034 56 111 01','rakoto@mit-ua.mg',0,'198653228',1211117890);
UNLOCK TABLES;

-- Jour
DROP TABLE IF EXISTS `jour`;
CREATE TABLE `jour` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`day` varchar(20),
	PRIMARY KEY (`id`)
);

INSERT INTO `jour` (day) VALUES ("Lundi"),("Mardi"),("Mercredi"),("Jeudi"),("Vendredi"),("Samedi");

-- Classification
DROP TABLE IF EXISTS `Classification`;
CREATE TABLE `Classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `ue` int(11) DEFAULT NULL,
  `ecue` int(11) DEFAULT NULL,
  `heure` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `prof` int(11) DEFAULT NULL,
  `enseignement` int(11) DEFAULT NULL,
  `groupe` int(11) DEFAULT 0,
   `jour`  int DEFAULT NULL,
   `heure_edt_debut` time DEFAULT NULL,
   `heure_edt_fin` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`ue`,`ecue`,`enseignement`,`niveau`,`semestre`,`groupe`),
  UNIQUE (`heure_edt_debut`,`heure_edt_fin`,`jour`,`semestre`,`groupe`),
  KEY `enseignement` (`enseignement`),
  KEY `niveau` (`niveau`),
  KEY `prof` (`prof`),
  KEY `semestre` (`semestre`),
  KEY `ecue` (`ecue`),
  KEY `jour` (`jour`),
  CONSTRAINT `Classification_ibfk_1` FOREIGN KEY (`enseignement`) REFERENCES `Enseignement` (`id`),
  CONSTRAINT `Classification_ibfk_2` FOREIGN KEY (`niveau`) REFERENCES `Niveau` (`id`),
  CONSTRAINT `Classification_ibfk_3` FOREIGN KEY (`prof`) REFERENCES `Professeur` (`id`),
  CONSTRAINT `Classification_ibfk_4` FOREIGN KEY (`semestre`) REFERENCES `Semestre` (`id`),
  CONSTRAINT `Classification_ibfk_5` FOREIGN KEY (`ue`) REFERENCES `UE` (`id`),
   CONSTRAINT `Classification_ibfk_7` FOREIGN KEY (`jour`) REFERENCES `jour` (`id`),
  CONSTRAINT `Classification_ibfk_6` FOREIGN KEY (`ecue`) REFERENCES `ECUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DELIMITER //
-- Test jour et heure sao mifanitsaka
CREATE TRIGGER check_time_overlap_insert_trigger
BEFORE INSERT ON Classification
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM Classification
    WHERE NEW.semestre = semestre
    AND NEW.jour = jour
    AND (NEW.groupe = groupe OR groupe = 0)
    AND (( (NEW.heure_edt_debut>=heure_edt_debut) AND (NEW.heure_edt_debut <heure_edt_fin) ) OR ( (NEW.heure_edt_fin<=heure_edt_fin) AND (NEW.heure_edt_fin >heure_edt_debut) ))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Les heures se chevauchent pour le meme jour';
  END IF;
END;
//
CREATE TRIGGER check_time_overlap_update_trigger
BEFORE UPDATE ON Classification
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM Classification
    WHERE NEW.semestre = semestre
    AND NEW.jour = jour
    AND (NEW.groupe = groupe OR groupe = 0)
    AND (( (NEW.heure_edt_debut>=heure_edt_debut) AND (NEW.heure_edt_debut <heure_edt_fin) AND (NEW.id!=id) ) OR ( (NEW.heure_edt_fin<=heure_edt_fin) AND (NEW.heure_edt_fin >heure_edt_debut) AND (NEW.id!=id) ))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Les heures se chevauchent pour le meme jour';
  END IF;
END;
//

-- Test si le prof est deja occupE

CREATE TRIGGER check_prof_occupation_insert_trigger
BEFORE INSERT ON Classification
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM Classification
    WHERE MOD(NEW.semestre,2) = MOD(semestre,2)
    AND NEW.jour = jour
    AND NEW.prof = prof
    AND (( (NEW.heure_edt_debut>=heure_edt_debut) AND (NEW.heure_edt_debut <heure_edt_fin) ) OR ( (NEW.heure_edt_fin<=heure_edt_fin) AND (NEW.heure_edt_fin >heure_edt_debut) ))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ce professeur n est plus libre en ce jour';
  END IF;
END;
//
CREATE TRIGGER check_prof_occupation_update_trigger
BEFORE UPDATE ON Classification
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM Classification
    WHERE MOD(NEW.semestre,2) = MOD(semestre,2)
    AND NEW.jour = jour
    AND NEW.prof = prof
    AND (( (NEW.heure_edt_debut>=heure_edt_debut) AND (NEW.heure_edt_debut <heure_edt_fin) AND (NEW.id!=id) ) OR ( (NEW.heure_edt_fin<=heure_edt_fin) AND (NEW.heure_edt_fin >heure_edt_debut) AND (NEW.id!=id) ))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Ce professeur n est plus libre en ce jour';
  END IF;
END;
//

-- Test si fin < debut
CREATE TRIGGER check_hour_validation_insert_trigger
BEFORE INSERT ON Classification
FOR EACH ROW
BEGIN
  IF (
    NEW.heure_edt_debut>=NEW.heure_edt_fin
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure incorrecte.';
  END IF;
END;
//

CREATE TRIGGER check_hour_validation_update_trigger
BEFORE UPDATE ON Classification
FOR EACH ROW
BEGIN
  IF (
    NEW.heure_edt_debut>=NEW.heure_edt_fin
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure incorrecte.';
  END IF;
END;
//

-- Test si dans l'horaire d'etude
CREATE TRIGGER check_hour_possible_insert_trigger
BEFORE INSERT ON Classification
FOR EACH ROW
BEGIN
  IF (
    (NEW.heure_edt_debut<"06:00") OR (NEW.heure_edt_fin>"18:00")
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure doit etre entre 06h et 18h';
  END IF;
END;
//

CREATE TRIGGER check_hour_possible_update_trigger
BEFORE UPDATE ON Classification
FOR EACH ROW
BEGIN
  IF (
    (NEW.heure_edt_debut<"06:00") OR (NEW.heure_edt_fin>"18:00")
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure doit etre entre 06h et 18h';
  END IF;
END;
//

-- Ne pas inserer des UE/ ECUE dont seul les UPPER qui les different
CREATE TRIGGER ue_case_insert_trigger
BEFORE INSERT ON UE
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM UE
    WHERE UPPER(New.nomUe) = UPPER(nomUe)
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'INY';
  END IF;
END;
//

CREATE TRIGGER ue_case_update_trigger
BEFORE UPDATE ON UE
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM UE
    WHERE ( UPPER(New.nomUe) = UPPER(nomUe) AND NEW.id!=id)
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'INY';
  END IF;
END;
//

CREATE TRIGGER ecue_case_insert_trigger
BEFORE INSERT ON ECUE
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM ECUE
    WHERE UPPER(New.nomECUE) = UPPER(nomECUE)
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'INY';
  END IF;
END;
//

CREATE TRIGGER ecue_case_update_trigger
BEFORE UPDATE ON ECUE
FOR EACH ROW
BEGIN
  IF EXISTS(
    SELECT 1 FROM ECUE
    WHERE ( UPPER(New.nomECUE) = UPPER(nomECUE) AND NEW.id!=id) 
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'INY';
  END IF;
END;
//

-- Determiner la limite de heure_debut et heure_fin
DROP TRIGGER IF EXISTS check_hour_difference_insert_trigger //
CREATE TRIGGER check_hour_difference_insert_trigger
BEFORE INSERT ON Classification
FOR EACH ROW
BEGIN
  IF (
    (NEW.heure_edt_fin-NEW.heure_edt_debut<time("01:00"))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure doit depasser de 1h de difference';
  END IF;
END;
//

DROP TRIGGER IF EXISTS check_hour_difference_update_trigger //
CREATE TRIGGER check_hour_difference_update_trigger
BEFORE UPDATE ON Classification
FOR EACH ROW
BEGIN
  IF (
    (NEW.heure_edt_fin-NEW.heure_edt_debut<time("01:00"))
  )THEN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Heure doit depasser de 1h de difference';
  END IF;
END;
//

-- Resaka required @ input: ilay generated: --manisy input display none anaty isque, --rehefa checked=set required, -- rehefa generated/notChecked=remove required
DELIMITER ;