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
-- Table structure for table `mapservice`
--

DROP TABLE IF EXISTS `mapservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mapservice` (
  `globalid` int NOT NULL,
  `profileid` int NOT NULL AUTO_INCREMENT,
  `employeeid` int NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `skilllevel` int NOT NULL,
  `skillset` varchar(1000) NOT NULL,
  `submission_status` int NOT NULL,
  `bid_status` int NOT NULL,
  `agreed_status` int NOT NULL,
  `durationavailablefor` varchar(255) NOT NULL,
  `currentcompany` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `comments` varchar(2000) NOT NULL,
  `profileuploadedon` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `price` int NOT NULL,
  `negotiateprice` int NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  PRIMARY KEY (`profileid`)
) ENGINE=InnoDB AUTO_INCREMENT=487 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mapservice`
--

LOCK TABLES `mapservice` WRITE;
/*!40000 ALTER TABLE `mapservice` DISABLE KEYS */;
INSERT INTO `mapservice` VALUES (4847,113,9091,'Hari','Delhi',1,'CCNA, Firewalls',4,0,0,'4 months','MAP1','English, Tamil','need deutsch','2022-01-10 17:25:15.645320',850,0,'ABC','sample question?','sample response',''),(8080,122,9095,'Peter Torvald','Czech',2,'Python, HTML, CSS, Java, NodeJS',3,0,1,'3 years','MAP1','','','2022-01-14 18:12:23.015145',830,0,'ABC','Is role fully remote?','','satisfying work'),(563434,486,7891,'charu','Hamburg',3,'Marketing consultant for 2.5 years',2,0,0,'','MAP1','Deutsch, English','','2022-01-17 11:53:19.250579',1020,0,'ABC','','','');
/*!40000 ALTER TABLE `mapservice` ENABLE KEYS */;
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

-- Dump completed on 2022-01-20 23:28:20
