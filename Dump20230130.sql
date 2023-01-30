-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hospitale2n
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments`
(
  `id` int NOT NULL AUTO_INCREMENT,
  `dateHour` datetime NOT NULL,
  `idPatients` int NOT NULL,
  PRIMARY KEY
(`id`),
  KEY `FK_appointments_id_patients`
(`idPatients`),
  CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY
(`idPatients`) REFERENCES `patients`
(`id`) ON
DELETE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `
appointments`
VALUES
  (11, '2024-12-12 13:30:12', 15),
  (12, '2024-12-12 09:30:12', 12),
  (13, '2024-12-15 15:30:12', 13),
  (15, '2024-12-12 10:10:12', 15),
  (16, '2024-12-12 12:12:12', 16),
  (17, '2024-02-24 15:25:12', 17),
  (18, '2024-01-01 19:30:12', 18),
  (19, '2024-12-12 22:30:12', 19);
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients`
(
  `id` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar
(25) NOT NULL,
  `firstname` varchar
(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar
(25) NOT NULL,
  `mail` varchar
(255) NOT NULL,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `
patients`
VALUES
  (11, 'Wright', 'Matthew', '2002-04-05', '+33605541594', 'matthew.wright@email.com'),
  (12, 'Lopez', 'Danielle', '2004-05-10', '+33605541595', 'danielle.lopez@email.com'),
  (13, 'Hill', 'Jacob', '2006-06-15', '+33605541596', 'jacob.hill@email.com'),
  (15, 'Green', 'Isabella', '2010-08-25', '+33605541598', 'isabella.green@email.com'),
  (16, 'Adams', 'Ryan', '2012-09-30', '+33605541599', 'ryan.adams@email.com'),
  (17, 'Smith', 'John', '1990-01-01', '+33606965965', 'john.smith@email.com'),
  (18, 'Johnson', 'Jane', '1995-02-02', '+33606965966', 'jane.johnson@email.com'),
  (19, 'Williams', 'Bob', '1985-03-03', '+33606965967', 'bob.williams@email.com'),
  (21, 'Brown', 'Michael', '1975-05-05', '+33606965969', 'michael.brown@email.com'),
  (22, 'Davis', 'Emily', '1980-06-06', '+33606965970', 'emily.davis@email.com'),
  (23, 'Miller', 'Jacob', '1970-07-07', '+33606965971', 'jacob.miller@email.com'),
  (24, 'Wilson', 'Sophia', '1990-08-08', '+33606965972', 'sophia.wilson@email.com'),
  (25, 'Moore', 'Madison', '1995-09-09', '+33606965973', 'madison.moore@email.com'),
  (27, 'Anderson', 'Isabella', '2000-11-11', '+33606965975', 'isabella.anderson@email.com'),
  (28, 'Thomas', 'Aiden', '1975-12-12', '+33606965976', 'aiden.thomas@email.com'),
  (29, 'Jackson', 'Mia', '1980-01-01', '+33606965977', 'mia.jackson@email.com'),
  (31, 'Harris', 'Madison', '1990-03-03', '+33606965979', 'madison.harris@email.com'),
  (32, 'Martin', 'Ethan', '1995-04-04', '+33606965980', 'ethan.martin@email.com'),
  (33, 'Green', 'Isabella', '2010-08-25', '+33605541598', 'isabella.en@email.com'),
  (122, 'Smith', 'John', '1990-12-05', '+33699302112', 'sdsd@email.com'),
  (123, 'Smith', 'John', '1990-12-05', '+33699302112', 'sdsd@email.com'),
  (124, 'Smith', 'Isabella', '1995-12-25', '+33699302112', 'smith.isa@email.com'),
  (125, 'Smith', 'Isabella', '1995-12-25', '+33699302112', 'smith.isa@email.com');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-30 12:36:57
