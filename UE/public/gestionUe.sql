CREATE DATABASE IF NOT EXISTS gestionUe;
USE gestionUe;
--
-- Dumping data for table `Classification`
--
DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomGrade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ECUE`
--

DROP TABLE IF EXISTS `ECUE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ECUE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomECUE` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomECUE` (`nomECUE`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ECUE`
--

LOCK TABLES `ECUE` WRITE;
/*!40000 ALTER TABLE `ECUE` DISABLE KEYS */;
INSERT INTO `ECUE` VALUES (21,''),(2,'Algebre'),(1,'Analyse'),(10,'Bash'),(9,'C'),(15,'Communication'),(13,'Communication audio-visuel'),(14,'Communication interpersonnelle'),(5,'Geometrie'),(11,'Gestion de projet'),(7,'JAVA'),(17,'Langue'),(12,'Langue et communication'),(18,'Mathematique'),(6,'PHP'),(19,'Physique'),(4,'Probabillite'),(20,'Programmation'),(8,'QT'),(3,'Statistique'),(22,'Test');
/*!40000 ALTER TABLE `ECUE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Enseignement`
--

DROP TABLE IF EXISTS `Enseignement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enseignement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enseignement`
--

LOCK TABLES `Enseignement` WRITE;
/*!40000 ALTER TABLE `Enseignement` DISABLE KEYS */;
INSERT INTO `Enseignement` VALUES (2,'ED'),(3,'EP'),(1,'ET');
/*!40000 ALTER TABLE `Enseignement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Niveau`
--

DROP TABLE IF EXISTS `Niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomNiveau` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomNiveau` (`nomNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Niveau`
--

LOCK TABLES `Niveau` WRITE;
/*!40000 ALTER TABLE `Niveau` DISABLE KEYS */;
INSERT INTO `Niveau` VALUES (1,'L1'),(2,'L2'),(3,'L3'),(4,'M1'),(5,'M2');
/*!40000 ALTER TABLE `Niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Professeur`
--

DROP TABLE IF EXISTS `Professeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professeur`
--

LOCK TABLES `Professeur` WRITE;
/*!40000 ALTER TABLE `Professeur` DISABLE KEYS */;
INSERT INTO `Professeur` VALUES (1,'Rakoto','Randria',1,'Antananarivo','034 56 111 01','rakoto@mit-ua.mg',0,'198653228',1234867890),(3,'Rakoto','Rasoa',1,'Antananarivo','034 56 111 01','rakoto@mit-ua.mg',0,'198653228',1211117890);
/*!40000 ALTER TABLE `Professeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Semestre`
--

DROP TABLE IF EXISTS `Semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSemestre` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomSemestre` (`nomSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semestre`
--

LOCK TABLES `Semestre` WRITE;
/*!40000 ALTER TABLE `Semestre` DISABLE KEYS */;
INSERT INTO `Semestre` VALUES (1,'S1'),(10,'S10'),(2,'S2'),(3,'S3'),(4,'S4'),(5,'S5'),(6,'S6'),(7,'S7'),(8,'S8'),(9,'S9');
/*!40000 ALTER TABLE `Semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UE`
--

DROP TABLE IF EXISTS `UE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomUe` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomUe` (`nomUe`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UE`
--

LOCK TABLES `UE` WRITE;
/*!40000 ALTER TABLE `UE` DISABLE KEYS */;
INSERT INTO `UE` VALUES (11,''),(3,'Communication'),(4,'Gestion de projet'),(1,'Mathematique'),(9,'Physique'),(2,'Programmation'),(12,'Test');
/*!40000 ALTER TABLE `UE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,'Professeur'),(2,'Assistant'),(3,'Professeur titulaire'),(4,'Maître de conférence');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
DROP TABLE IF EXISTS `Classification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

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
  `groupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ue` (`ue`,`ecue`,`enseignement`,`niveau`,`semestre`),
  KEY `enseignement` (`enseignement`),
  KEY `niveau` (`niveau`),
  KEY `prof` (`prof`),
  KEY `semestre` (`semestre`),
  KEY `ecue` (`ecue`),
  CONSTRAINT `Classification_ibfk_1` FOREIGN KEY (`enseignement`) REFERENCES `Enseignement` (`id`),
  CONSTRAINT `Classification_ibfk_2` FOREIGN KEY (`niveau`) REFERENCES `Niveau` (`id`),
  CONSTRAINT `Classification_ibfk_3` FOREIGN KEY (`prof`) REFERENCES `Professeur` (`id`),
  CONSTRAINT `Classification_ibfk_4` FOREIGN KEY (`semestre`) REFERENCES `Semestre` (`id`),
  CONSTRAINT `Classification_ibfk_5` FOREIGN KEY (`ue`) REFERENCES `UE` (`id`),
  CONSTRAINT `Classification_ibfk_6` FOREIGN KEY (`ecue`) REFERENCES `ECUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Classification` WRITE;
INSERT INTO `Classification` VALUES (21,1,1,1,1,60,12,1,1,NULL),(22,1,2,1,1,60,12,1,1,NULL),(23,2,3,1,1,60,12,1,1,NULL),(24,2,4,1,1,60,12,1,1,NULL),(25,3,5,1,1,60,12,1,1,NULL),(26,3,6,1,1,60,12,1,1,NULL),(27,4,7,1,1,60,12,1,1,NULL),(28,4,8,1,1,60,12,1,1,NULL),(29,5,9,1,1,60,12,1,1,NULL),(30,5,10,1,1,60,12,1,1,NULL),(31,1,1,2,6,60,12,1,1,NULL),(32,1,2,2,6,60,12,1,1,NULL),(33,2,3,2,6,60,12,1,1,NULL),(34,2,4,2,6,60,12,1,1,NULL),(35,3,5,2,6,60,12,1,1,NULL),(36,3,6,2,6,60,12,1,1,NULL),(37,4,7,2,6,60,12,1,1,NULL),(38,4,8,2,6,60,12,1,1,NULL),(39,5,9,2,6,60,12,1,1,NULL),(40,5,10,2,6,60,12,1,1,NULL),(51,1,1,2,2,60,12,1,1,NULL),(52,1,2,2,2,60,12,1,1,NULL),(53,2,3,2,2,60,12,1,1,NULL),(54,2,4,2,2,60,12,1,1,NULL),(55,3,5,2,2,60,12,1,1,NULL),(56,3,6,2,2,60,12,1,1,NULL),(57,4,7,2,2,60,12,1,1,NULL),(58,4,8,2,2,60,12,1,1,NULL),(59,5,9,2,2,60,12,1,1,NULL),(60,5,10,2,2,60,12,1,1,NULL),(61,1,1,3,15,10,6,1,1,NULL),(62,1,1,3,17,10,2,1,1,NULL),(63,1,1,1,18,10,2,1,1,NULL),(64,1,1,9,19,10,2,1,1,NULL),(65,1,1,9,19,10,2,1,2,2),(67,1,1,9,19,10,2,1,3,2),(69,1,2,2,20,10,2,1,1,NULL),(70,1,2,2,20,10,2,1,2,2);
/*!40000 ALTER TABLE `Classification` ENABLE KEYS */;
UNLOCK TABLES;
