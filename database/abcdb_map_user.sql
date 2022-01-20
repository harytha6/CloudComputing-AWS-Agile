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
-- Table structure for table `map_user`
--

DROP TABLE IF EXISTS `map_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `map_user` (
  `map_id` int NOT NULL AUTO_INCREMENT,
  `map_user_name` varchar(45) NOT NULL,
  `map_user_email` varchar(45) NOT NULL,
  `active_status` int DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `password` longtext,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_user`
--

LOCK TABLES `map_user` WRITE;
/*!40000 ALTER TABLE `map_user` DISABLE KEYS */;
INSERT INTO `map_user` VALUES (2,'MAP1','m@gmail.com',1,'2022-01-16 03:50:25','81dc9bdb52d04dc20036dbd8313ed055'),(3,'MAP1','test@test.com',1,NULL,'test'),(4,'Mukit','mukitkhan07@gmail.com',1,'2022-01-20 17:31:58','81dc9bdb52d04dc20036dbd8313ed055'),(5,'Haritha Test User','harytha6@gmail.com',1,'2022-01-20 17:44:25','827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `map_user` ENABLE KEYS */;
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

-- Dump completed on 2022-01-20 23:28:23
