-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: abc-database.cd6bhxjeqpoi.us-east-2.rds.amazonaws.com    Database: abcdb
-- ------------------------------------------------------
-- Server version	8.0.23

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `service_requests`
--

DROP TABLE IF EXISTS `service_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `globalid` int DEFAULT NULL,
  `Created_by_userid` int NOT NULL,
  `is_open_for_bidding` int NOT NULL,
  `cycle` int NOT NULL DEFAULT '1',
  `role` varchar(100) NOT NULL,
  `skilllevel` int NOT NULL,
  `location` varchar(255) NOT NULL,
  `skillset` varchar(1000) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `projectname` varchar(255) NOT NULL,
  `taskdescription` varchar(2000) DEFAULT NULL,
  `comments` varchar(2000) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `Submission_status` int DEFAULT NULL,
  `template_status` int DEFAULT NULL,
  `deadline` date NOT NULL,
  `deadline_new` date DEFAULT NULL,
  `expired_status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1014 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_requests`
--

LOCK TABLES `service_requests` WRITE;
/*!40000 ALTER TABLE `service_requests` DISABLE KEYS */;
INSERT INTO `service_requests` VALUES (1000,8879899,3,1,1,'software engineer',1,'Munich','C#, C++','9 months','Credit Bureau - ISIL','implement loan portal','','100 % functional','2022-01-16 15:24:40.000000','ABC','2022-01-16 15:24:40.000000',0,0,'2022-04-21',NULL,0),(1001,563434,3,1,1,'Project Manager (PL) nearshore',3,'Berlin','CRM','2 months','Lebara','Technical products marketing','Need good languge skills','50% functional','2022-01-16 15:24:40.000000','ABC','2022-01-16 15:24:40.000000',2,1,'2022-03-21',NULL,0),(1002,138986,3,1,1,'Software Expert (SE) remote',1,'Hamburg','Javascript','2 years','Deutsche Leasing','Customer support','','90% functional','2022-01-16 15:24:40.000000','ABC','2022-01-16 15:24:40.000000',2,1,'2022-03-21','2022-04-20',0),(1003,4847,3,1,1,'Project Manager (PL) remote',1,'Frankfurt','CCNA','18 months','Commerz Bank','Implement Internal firewall security amongst bank employees','Preferred : Knowledge of Networking, Firewalls','100% fuctional','2022-01-16 15:24:40.000000','ABC','2022-01-16 15:24:40.000000',2,NULL,'2022-05-21',NULL,0),(1004,8080,0,1,1,'Programmer',2,'Remote','Python, HTML, CSS, Tableau','3 years','Implement features of Visualization software','Very good programmin skills in Python','','80% functional','2022-01-16 15:24:40.000000','ABC','2022-01-16 15:24:40.000000',3,NULL,'0000-00-00',NULL,0),(1005,2204,3,1,2,'Software Expert (SE) nearshore',3,'Remote','Javascript','1 year','Automation sensor Tesla','Testing and Automation','fully remote work','100% functional','2022-01-16 15:29:48.000000','ABC','2022-01-16 15:29:48.000000',1,0,'2022-01-12','2022-03-25',0),(1013,1197,3,1,1,'Infrastructure Maintenance',3,'Mannheim','printers, scanners knowledge','2 years','Laser Scanner','','','80% functional','2022-01-17 12:13:30.000000','ABC','2022-01-17 12:13:30.000000',1,NULL,'2022-05-20',NULL,0);
/*!40000 ALTER TABLE `service_requests` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-20 23:28:27
