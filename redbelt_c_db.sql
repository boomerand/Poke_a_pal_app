CREATE DATABASE  IF NOT EXISTS `redbelt_c_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `redbelt_c_db`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: localhost    Database: redbelt_c_db
-- ------------------------------------------------------
-- Server version	5.5.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pokes`
--

DROP TABLE IF EXISTS `pokes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poker_id` int(11) DEFAULT NULL,
  `num_pokes` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pokes_users_idx` (`users_id`),
  CONSTRAINT `fk_pokes_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokes`
--

LOCK TABLES `pokes` WRITE;
/*!40000 ALTER TABLE `pokes` DISABLE KEYS */;
INSERT INTO `pokes` VALUES (4,3,2,'2014-05-23 15:56:36','2014-05-23 15:56:36',1),(5,3,1,'2014-05-23 15:56:38','2014-05-23 15:56:38',2),(6,3,1,'2014-05-23 15:56:40','2014-05-23 15:56:40',5),(7,4,1,'2014-05-26 11:42:03','2014-05-26 11:42:03',2),(8,4,1,'2014-05-26 11:42:04','2014-05-26 11:42:04',1),(9,4,1,'2014-05-26 11:42:09','2014-05-26 11:42:09',2),(10,4,1,'2014-05-26 11:42:10','2014-05-26 11:42:10',5),(11,4,1,'2014-05-26 11:42:12','2014-05-26 11:42:12',3),(12,1,1,'2014-05-26 11:50:06','2014-05-26 11:50:06',2),(13,1,1,'2014-05-26 11:50:07','2014-05-26 11:50:07',3),(14,1,1,'2014-05-26 11:50:08','2014-05-26 11:50:08',4),(15,1,1,'2014-05-26 11:50:09','2014-05-26 11:50:09',5),(16,6,1,'2014-05-26 11:53:00','2014-05-26 11:53:00',1),(17,6,1,'2014-05-26 11:53:01','2014-05-26 11:53:01',2),(18,6,1,'2014-05-26 11:53:01','2014-05-26 11:53:01',3),(19,6,1,'2014-05-26 11:53:02','2014-05-26 11:53:02',4),(20,6,1,'2014-05-26 11:53:02','2014-05-26 11:53:02',5);
/*!40000 ALTER TABLE `pokes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Rand DeCastro','Rand','rand@gmail.com','jerome7977','2014-05-23 13:49:38','2014-05-23 13:49:38'),(2,'Fred Ho','Fred','fred@fred.ho','dogerocks','2014-05-23 14:28:38','2014-05-23 14:28:38'),(3,'Brendan Brown','Brendan','brendan@gmail.com','horserider','2014-05-23 14:29:14','2014-05-23 14:29:14'),(4,'Jesse Zimmerman','Jesse','jz@gmail.com','gosteelers','2014-05-23 14:30:15','2014-05-23 14:30:15'),(5,'Tanisha Henry','Tanisha','thenry@gmail.com','lovemesomewhiskey','2014-05-23 15:18:14','2014-05-23 15:18:14'),(6,'David Upjohn','Upjohn','dpupjohn@gmail.com','minnesota','2014-05-26 11:52:27','2014-05-26 11:52:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-26 11:54:15
