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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `password` mediumtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'sssss','wwwwwwwwww','sssssssss@gmail.com','123456','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'sssss','wwwwwwwwww','sssssssss@gmail.com','123456','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'sssss','wwwwwwwwww','sssssssss@gmail.com','123456','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'sssss','wwwwwwwwww','sssssssss@gmail.com','123456','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'eeeeeee','ee','e@gmail.com','e10adc3949ba59abbe56e057f20f883e','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'aas','dd','ee','ff',NULL,NULL),(7,'aaaqaaa','aywdw','a@gmail.com','e10adc3949ba59abbe56e057f20f883e','2022-01-09 14:17:30','2022-01-09 14:17:30'),(8,'aaaqaaa','aywdw','a@gmail.com','e10adc3949ba59abbe56e057f20f883e','2022-01-09 15:05:31','2022-01-09 15:05:31'),(9,'mukit','admin','m@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','2022-01-09 15:05:31','2022-01-09 15:05:31');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
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

-- Dump completed on 2022-01-20 23:28:37
