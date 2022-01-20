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
-- Table structure for table `map_contracts`
--

DROP TABLE IF EXISTS `map_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `map_contracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  `map_username` varchar(45) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `cluster` int DEFAULT NULL,
  `skill_level` int DEFAULT NULL,
  `aggrement_status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=551 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_contracts`
--

LOCK TABLES `map_contracts` WRITE;
/*!40000 ALTER TABLE `map_contracts` DISABLE KEYS */;
INSERT INTO `map_contracts` VALUES (461,'Project Manager (PL) remote','MAP1',1075,1,1,NULL,'2022-01-20 05:10:44'),(462,'Project Manager (PL) remote','MAP1',1200,1,2,NULL,'2022-01-20 05:10:44'),(463,'Project Manager (PL) remote','MAP1',1350,1,3,NULL,'2022-01-20 05:10:44'),(464,'Industry Process Consultant (IPC) remote','MAP1',965,1,1,NULL,'2022-01-20 05:10:44'),(465,'Industry Process Consultant (IPC) remote','MAP1',1050,1,2,NULL,'2022-01-20 05:10:44'),(466,'Industry Process Consultant (IPC) remote','MAP1',1250,1,3,NULL,'2022-01-20 05:10:44'),(467,'Software Expert (SE) remote','MAP1',850,1,1,NULL,'2022-01-20 05:10:44'),(468,'Software Expert (SE) remote','MAP1',950,1,2,NULL,'2022-01-20 05:10:44'),(469,'Software Expert (SE) remote','MAP1',1200,1,3,NULL,'2022-01-20 05:10:44'),(470,'Infrastructure Consultant (IC) remote','MAP1',985,1,1,NULL,'2022-01-20 05:10:44'),(471,'Infrastructure Consultant (IC) remote','MAP1',1110,1,2,NULL,'2022-01-20 05:10:44'),(472,'Infrastructure Consultant (IC) remote','MAP1',1210,1,3,NULL,'2022-01-20 05:10:44'),(473,'Operations Research Scientist (ORS) remote','MAP1',1025,1,1,NULL,'2022-01-20 05:10:44'),(474,'Operations Research Scientist (ORS) remote','MAP1',1200,2,2,NULL,'2022-01-20 05:10:44'),(475,'Operations Research Scientist (ORS) remote','MAP1',1250,1,3,NULL,'2022-01-20 05:10:44'),(476,'Project Manager (PL) nearshore','MAP1',1075,1,1,NULL,'2022-01-20 05:10:44'),(477,'Project Manager (PL) nearshore','MAP1',1200,2,2,NULL,'2022-01-20 05:10:44'),(478,'Project Manager (PL) nearshore','MAP1',1350,1,3,NULL,'2022-01-20 05:10:44'),(479,'Industry Process Consultant (IPC) nearshore','MAP1',965,1,1,NULL,'2022-01-20 05:10:44'),(480,'Industry Process Consultant (IPC) nearshore','MAP1',1050,1,2,NULL,'2022-01-20 05:10:44'),(481,'Industry Process Consultant (IPC) nearshore','MAP1',1250,2,3,NULL,'2022-01-20 05:10:44'),(482,'Software Expert (SE) nearshore','MAP1',850,1,1,NULL,'2022-01-20 05:10:44'),(483,'Software Expert (SE) nearshore','MAP1',950,1,2,NULL,'2022-01-20 05:10:44'),(484,'Software Expert (SE) nearshore','MAP1',1200,2,3,NULL,'2022-01-20 05:10:44'),(485,'Infrastructure Consultant (IC) nearshore','MAP1',985,1,1,NULL,'2022-01-20 05:10:44'),(486,'Infrastructure Consultant (IC) nearshore','MAP1',1110,1,2,NULL,'2022-01-20 05:10:44'),(487,'Infrastructure Consultant (IC) nearshore','MAP1',1210,1,3,NULL,'2022-01-20 05:10:44'),(488,'Operations Research Scientist (ORS) nearshore','MAP1',1025,1,1,NULL,'2022-01-20 05:10:44'),(489,'Operations Research Scientist (ORS) nearshore','MAP1',1200,1,2,NULL,'2022-01-20 05:10:44'),(490,'Operations Research Scientist (ORS) nearshore','MAP1',1250,1,3,NULL,'2022-01-20 05:10:44'),(491,'Project Manager (PL) remote','MAP2',1076,1,1,NULL,'2022-01-20 05:10:44'),(492,'Project Manager (PL) remote','MAP2',1196,1,2,NULL,'2022-01-20 05:10:44'),(493,'Project Manager (PL) remote','MAP2',1444,2,3,NULL,'2022-01-20 05:10:44'),(494,'Industry Process Consultant (IPC) remote','MAP2',929,1,1,NULL,'2022-01-20 05:10:44'),(495,'Industry Process Consultant (IPC) remote','MAP2',1076,1,2,NULL,'2022-01-20 05:10:44'),(496,'Industry Process Consultant (IPC) remote','MAP2',1316,2,3,NULL,'2022-01-20 05:10:44'),(497,'Software Expert (SE) remote','MAP2',819,1,1,NULL,'2022-01-20 05:10:44'),(498,'Software Expert (SE) remote','MAP2',1021,1,2,NULL,'2022-01-20 05:10:44'),(499,'Software Expert (SE) remote','MAP2',1242,2,3,NULL,'2022-01-20 05:10:44'),(500,'Infrastructure Consultant (IC) remote','MAP2',929,1,1,NULL,'2022-01-20 05:10:44'),(501,'Infrastructure Consultant (IC) remote','MAP2',1076,1,2,NULL,'2022-01-20 05:10:44'),(502,'Infrastructure Consultant (IC) remote','MAP2',1316,1,3,NULL,'2022-01-20 05:10:44'),(503,'Operations Research Scientist (ORS) remote','MAP2',1012,1,1,NULL,'2022-01-20 05:10:44'),(504,'Operations Research Scientist (ORS) remote','MAP2',1316,1,2,NULL,'2022-01-20 05:10:44'),(505,'Operations Research Scientist (ORS) remote','MAP2',1500,1,3,NULL,'2022-01-20 05:10:44'),(506,'Project Manager (PL) nearshore','MAP2',580,1,1,NULL,'2022-01-20 05:10:44'),(507,'Project Manager (PL) nearshore','MAP2',690,1,2,NULL,'2022-01-20 05:10:44'),(508,'Project Manager (PL) nearshore','MAP2',911,1,3,NULL,'2022-01-20 05:10:44'),(509,'Industry Process Consultant (IPC) nearshore','MAP2',478,1,1,NULL,'2022-01-20 05:10:44'),(510,'Industry Process Consultant (IPC) nearshore','MAP2',598,1,2,NULL,'2022-01-20 05:10:44'),(511,'Industry Process Consultant (IPC) nearshore','MAP2',681,1,3,NULL,'2022-01-20 05:10:44'),(512,'Software Expert (SE) nearshore','MAP2',350,1,1,NULL,'2022-01-20 05:10:44'),(513,'Software Expert (SE) nearshore','MAP2',543,1,2,NULL,'2022-01-20 05:10:44'),(514,'Software Expert (SE) nearshore','MAP2',653,1,3,NULL,'2022-01-20 05:10:44'),(515,'Infrastructure Consultant (IC) nearshore','MAP2',534,1,1,NULL,'2022-01-20 05:10:44'),(516,'Infrastructure Consultant (IC) nearshore','MAP2',644,1,2,NULL,'2022-01-20 05:10:44'),(517,'Infrastructure Consultant (IC) nearshore','MAP2',727,1,3,NULL,'2022-01-20 05:10:44'),(518,'Operations Research Scientist (ORS) nearshore','MAP2',543,1,1,NULL,'2022-01-20 05:10:44'),(519,'Operations Research Scientist (ORS) nearshore','MAP2',653,1,2,NULL,'2022-01-20 05:10:44'),(520,'Operations Research Scientist (ORS) nearshore','MAP2',736,1,3,NULL,'2022-01-20 05:10:44'),(521,'Project Manager (PL) remote','MAP3',953,1,1,NULL,'2022-01-20 05:10:44'),(522,'Project Manager (PL) remote','MAP3',1029,1,2,NULL,'2022-01-20 05:10:44'),(523,'Project Manager (PL) remote','MAP3',1242,1,3,NULL,'2022-01-20 05:10:44'),(524,'Industry Process Consultant (IPC) remote','MAP3',910,1,1,NULL,'2022-01-20 05:10:44'),(525,'Industry Process Consultant (IPC) remote','MAP3',990,1,2,NULL,'2022-01-20 05:10:44'),(526,'Industry Process Consultant (IPC) remote','MAP3',1220,1,3,NULL,'2022-01-20 05:10:44'),(527,'Software Expert (SE) remote','MAP3',805,1,1,NULL,'2022-01-20 05:10:44'),(528,'Software Expert (SE) remote','MAP3',1000,1,2,NULL,'2022-01-20 05:10:44'),(529,'Software Expert (SE) remote','MAP3',1242,1,3,NULL,'2022-01-20 05:10:44'),(530,'Infrastructure Consultant (IC) remote','MAP3',929,1,1,NULL,'2022-01-20 05:10:44'),(531,'Infrastructure Consultant (IC) remote','MAP3',1076,1,2,NULL,'2022-01-20 05:10:44'),(532,'Infrastructure Consultant (IC) remote','MAP3',1250,1,3,NULL,'2022-01-20 05:10:44'),(533,'Operations Research Scientist (ORS) remote','MAP3',1250,1,1,NULL,'2022-01-20 05:10:44'),(534,'Operations Research Scientist (ORS) remote','MAP3',1316,1,2,NULL,'2022-01-20 05:10:44'),(535,'Operations Research Scientist (ORS) remote','MAP3',1500,1,3,NULL,'2022-01-20 05:10:44'),(536,'Project Manager (PL) nearshore','MAP3',790,1,1,NULL,'2022-01-20 05:10:44'),(537,'Project Manager (PL) nearshore','MAP3',880,1,2,NULL,'2022-01-20 05:10:44'),(538,'Project Manager (PL) nearshore','MAP3',1040,1,3,NULL,'2022-01-20 05:10:44'),(539,'Industry Process Consultant (IPC) nearshore','MAP3',705,1,1,NULL,'2022-01-20 05:10:44'),(540,'Industry Process Consultant (IPC) nearshore','MAP3',890,1,2,NULL,'2022-01-20 05:10:44'),(541,'Industry Process Consultant (IPC) nearshore','MAP3',1042,1,3,NULL,'2022-01-20 05:10:44'),(542,'Software Expert (SE) nearshore','MAP3',800,1,1,NULL,'2022-01-20 05:10:44'),(543,'Software Expert (SE) nearshore','MAP3',942,1,2,NULL,'2022-01-20 05:10:44'),(544,'Software Expert (SE) nearshore','MAP3',1042,1,3,NULL,'2022-01-20 05:10:44'),(545,'Infrastructure Consultant (IC) nearshore','MAP3',674,1,1,NULL,'2022-01-20 05:10:44'),(546,'Infrastructure Consultant (IC) nearshore','MAP3',892,1,2,NULL,'2022-01-20 05:10:44'),(547,'Infrastructure Consultant (IC) nearshore','MAP3',1042,1,3,NULL,'2022-01-20 05:10:44'),(548,'Operations Research Scientist (ORS) nearshore','MAP3',502,1,1,NULL,'2022-01-20 05:10:44'),(549,'Operations Research Scientist (ORS) nearshore','MAP3',794,1,2,NULL,'2022-01-20 05:10:44'),(550,'Operations Research Scientist (ORS) nearshore','MAP3',892,1,3,NULL,'2022-01-20 05:10:44');
/*!40000 ALTER TABLE `map_contracts` ENABLE KEYS */;
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

-- Dump completed on 2022-01-20 23:28:40
