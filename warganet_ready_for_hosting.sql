-- MySQL dump 10.13  Distrib 9.6.0, for Win64 (x86_64)
--
-- Host: localhost    Database: warganet
-- ------------------------------------------------------
-- Server version	9.6.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `monthly_fee` decimal(10,2) NOT NULL,
  `bill_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('no_payment','partial_payment','fully_paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_payment',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_customer_id_foreign` (`customer_id`),
  CONSTRAINT `bills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (1,1,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-26 01:43:28'),(2,2,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-12-02 08:50:04'),(3,3,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-07 00:31:20'),(4,4,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-07 00:31:10'),(5,5,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-07 00:31:32'),(6,6,100000.00,100000.00,'no_payment','2024-12-12 13:48:28','2025-11-02 16:52:47'),(7,7,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-12-02 08:49:49'),(8,8,150000.00,150000.00,'no_payment','2024-12-12 13:48:28','2025-11-02 16:52:47'),(9,9,100000.00,100000.00,'no_payment','2024-12-12 13:48:28','2025-11-02 16:52:47'),(10,10,150000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-07 00:31:58'),(11,11,150000.00,140000.00,'partial_payment','2024-12-12 13:48:28','2025-12-16 15:03:37'),(12,12,300000.00,0.00,'fully_paid','2024-12-12 13:48:28','2025-11-07 00:32:08'),(13,13,150000.00,0.00,'fully_paid','2025-03-02 13:06:21','2025-11-07 00:32:17'),(14,14,150000.00,0.00,'fully_paid','2025-04-04 17:41:27','2025-11-07 00:31:02'),(15,15,150000.00,0.00,'fully_paid','2025-05-04 16:51:30','2025-11-08 06:11:06'),(16,16,150000.00,1000000.00,'no_payment','2025-05-04 16:51:30','2025-11-02 16:52:47'),(17,1,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-22 09:53:52'),(18,2,150000.00,150000.00,'no_payment','2025-12-16 14:59:06','2025-12-16 14:59:06'),(19,3,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 14:59:15'),(20,4,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 14:59:21'),(21,5,140000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 14:59:28'),(22,6,100000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 15:00:47'),(23,7,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-22 12:04:01'),(24,8,150000.00,300000.00,'no_payment','2025-12-16 14:59:06','2025-12-16 14:59:06'),(25,9,100000.00,100000.00,'partial_payment','2025-12-16 14:59:06','2025-12-16 15:01:38'),(26,10,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-17 11:47:42'),(27,11,140000.00,280000.00,'no_payment','2025-12-16 14:59:06','2025-12-16 14:59:06'),(28,12,300000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 14:59:41'),(29,13,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-17 11:48:00'),(30,14,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 15:00:03'),(31,15,150000.00,0.00,'fully_paid','2025-12-16 14:59:06','2025-12-16 15:01:10'),(32,16,100000.00,1100000.00,'no_payment','2025-12-16 14:59:06','2025-12-16 14:59:06'),(33,1,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-12 12:43:15'),(34,2,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-21 09:22:57'),(35,3,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-01 11:16:25'),(36,4,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-20 11:18:06'),(37,5,140000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-01 11:16:32'),(38,6,100000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-29 10:48:04'),(39,7,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-22 02:17:14'),(40,8,150000.00,450000.00,'no_payment','2026-01-01 11:16:03','2026-01-01 11:16:03'),(41,9,100000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-01 11:21:33'),(42,10,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-10 04:21:48'),(43,11,140000.00,420000.00,'no_payment','2026-01-01 11:16:03','2026-01-01 11:16:03'),(44,12,300000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-20 11:18:19'),(45,13,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-01 11:16:40'),(46,14,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-08 04:15:08'),(47,15,150000.00,0.00,'fully_paid','2026-01-01 11:16:03','2026-01-01 11:21:42'),(48,16,100000.00,1200000.00,'no_payment','2026-01-01 11:16:03','2026-01-01 11:16:03'),(49,1,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-09 07:17:21'),(50,2,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-24 13:51:40'),(51,3,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-01 23:41:37'),(52,4,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-09 07:17:27'),(53,5,140000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-01 23:41:47'),(54,6,100000.00,100000.00,'no_payment','2026-02-01 23:41:16','2026-02-01 23:41:16'),(55,7,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-09 07:17:34'),(56,8,150000.00,600000.00,'no_payment','2026-02-01 23:41:16','2026-02-01 23:41:16'),(57,9,100000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-01 23:41:58'),(58,10,150000.00,150000.00,'no_payment','2026-02-01 23:41:16','2026-02-01 23:41:16'),(59,11,140000.00,560000.00,'no_payment','2026-02-01 23:41:16','2026-02-01 23:41:16'),(60,12,300000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-09 07:17:43'),(61,13,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-02 13:24:15'),(62,14,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-09 07:17:51'),(63,15,150000.00,0.00,'fully_paid','2026-02-01 23:41:16','2026-02-01 23:42:17'),(64,16,100000.00,1300000.00,'no_payment','2026-02-01 23:41:16','2026-02-01 23:41:16'),(65,1,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-14 03:09:52'),(66,2,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-27 05:50:26'),(67,3,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-02 06:37:23'),(68,4,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-20 17:01:47'),(69,5,140000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-02 06:37:14'),(70,6,100000.00,100000.00,'partial_payment','2026-03-02 06:37:04','2026-03-02 06:38:10'),(71,7,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-14 03:10:03'),(72,8,150000.00,750000.00,'no_payment','2026-03-02 06:37:04','2026-03-02 06:37:04'),(73,9,100000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-02 06:38:04'),(74,10,150000.00,300000.00,'no_payment','2026-03-02 06:37:04','2026-03-02 06:37:04'),(75,11,140000.00,700000.00,'no_payment','2026-03-02 06:37:04','2026-03-02 06:37:04'),(76,12,300000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-08 02:36:39'),(77,13,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-08 02:36:31'),(78,14,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-08 02:36:22'),(79,15,150000.00,0.00,'fully_paid','2026-03-02 06:37:04','2026-03-02 06:37:57'),(80,16,100000.00,1400000.00,'no_payment','2026-03-02 06:37:04','2026-03-02 06:37:04'),(81,1,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:18:56'),(82,2,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-19 08:42:00'),(83,3,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:03'),(84,4,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:10'),(85,5,140000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:16'),(86,6,100000.00,100000.00,'partial_payment','2026-04-06 03:18:48','2026-04-06 03:19:23'),(87,7,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:29'),(88,8,150000.00,900000.00,'no_payment','2026-04-06 03:18:48','2026-04-06 03:18:48'),(89,9,100000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:37'),(90,10,150000.00,450000.00,'no_payment','2026-04-06 03:18:48','2026-04-06 03:18:48'),(91,11,140000.00,840000.00,'no_payment','2026-04-06 03:18:48','2026-04-06 03:18:48'),(92,12,300000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-10 03:29:24'),(93,13,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:50'),(94,14,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:19:57'),(95,15,150000.00,0.00,'fully_paid','2026-04-06 03:18:48','2026-04-06 03:20:05'),(96,16,100000.00,1500000.00,'no_payment','2026-04-06 03:18:48','2026-04-06 03:18:48'),(97,1,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:53:28'),(98,2,150000.00,150000.00,'no_payment','2026-05-01 09:48:41','2026-05-01 09:48:41'),(99,3,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-01 09:48:48'),(100,4,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:53:36'),(101,5,140000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-01 09:48:56'),(102,6,100000.00,100000.00,'partial_payment','2026-05-01 09:48:41','2026-05-01 09:49:13'),(103,7,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:53:47'),(104,8,150000.00,1050000.00,'no_payment','2026-05-01 09:48:41','2026-05-01 09:48:41'),(105,9,100000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-01 09:49:06'),(106,10,150000.00,600000.00,'no_payment','2026-05-01 09:48:41','2026-05-01 09:48:41'),(107,11,140000.00,980000.00,'no_payment','2026-05-01 09:48:41','2026-05-01 09:48:41'),(108,12,300000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:53:56'),(109,13,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:54:17'),(110,14,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-08 03:54:05'),(111,15,150000.00,0.00,'fully_paid','2026-05-01 09:48:41','2026-05-01 09:49:24'),(112,16,100000.00,1600000.00,'no_payment','2026-05-01 09:48:41','2026-05-01 09:48:41'),(113,1,150000.00,150000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(114,2,150000.00,150000.00,'partial_payment','2026-06-01 13:49:21','2026-06-02 16:06:15'),(115,3,150000.00,0.00,'fully_paid','2026-06-01 13:49:21','2026-06-01 13:49:29'),(116,4,150000.00,150000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(117,5,140000.00,0.00,'fully_paid','2026-06-01 13:49:21','2026-06-01 13:49:37'),(118,6,100000.00,50000.00,'partial_payment','2026-06-01 13:49:21','2026-06-01 13:49:44'),(119,7,150000.00,150000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(120,8,150000.00,1200000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(121,9,100000.00,0.00,'fully_paid','2026-06-01 13:49:21','2026-06-01 13:49:55'),(122,10,150000.00,750000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(123,11,140000.00,1120000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(124,12,300000.00,300000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(125,13,150000.00,0.00,'fully_paid','2026-06-01 13:49:21','2026-06-01 13:50:06'),(126,14,150000.00,150000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21'),(127,15,150000.00,0.00,'fully_paid','2026-06-01 13:49:21','2026-06-01 13:50:15'),(128,16,100000.00,1700000.00,'no_payment','2026-06-01 13:49:21','2026-06-01 13:49:21');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('warganet@gmail.com|158.140.182.1','i:1;',1752265352),('warganet@gmail.com|158.140.182.1:timer','i:1752265352;',1752265352);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_wifi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_router` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_router` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_router` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pppoe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_pppoe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remote_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_fee` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'KAPTI','KAPTI','barakallah','192.168.0.1','WARGANET','admin','admin','pemersatubangsa','10.10.10.102',150000.00,1,'2024-12-12 13:16:42','2025-03-11 17:16:31'),(2,'MINANG','MINANG','rajadangdut','192.168.0.1','TP-LINK','pemersatubangsa$','MINANG','pemersatubangsa','10.10.10.104',150000.00,1,'2024-12-12 13:18:45','2025-03-08 14:30:29'),(3,'ABANG/EGA','EGA','bismillah','192.168.0.1','TP-LINK','admin','ABANG','pemersatubangsa','10.10.10.108',150000.00,1,'2024-12-12 13:22:49','2025-03-11 17:19:02'),(4,'ARSYAD/KANDI','ARSYAD','alhamdulillah','192.168.0.1','TOTOLINK','admin','ARSYAD','pemersatubangsa','10.10.10.109',150000.00,1,'2024-12-12 13:26:00','2025-03-11 17:19:22'),(5,'YUDI','RAFI','Aldistirafi04','192.168.0.1','TP-LINK','admin','RAFI','pemersatubangsa$','10.10.10.111',140000.00,1,'2024-12-12 13:30:42','2025-03-11 17:19:49'),(6,'MAK OCIH','BAH ENANG','allahuakbar','192.168.0.1','admin','pemersatubangsa$','MAOCIH','pemersatubangsa','10.10.10.115',100000.00,1,'2024-12-12 13:32:48','2025-03-11 18:02:39'),(7,'NANI','RISMA','miraao210','192.168.0.1','TOTOLINK','admin','NANI','pemersatubangsa','10.10.10.110',150000.00,1,'2024-12-12 13:35:38','2025-03-11 17:19:31'),(8,'HESTY','HESTY','xxxxxx','192.168.0.1','TOTOLINK','admin','HESTY','pemersatubangsa','10.10.10.114',150000.00,0,'2024-12-12 13:39:30','2026-06-02 09:34:00'),(9,'DEDI','D6M','biasawelah','192.168.0.1','admin','admin','DEDI','pemersatubangsa','10.10.10.107',100000.00,1,'2024-12-12 13:41:46','2025-03-11 17:18:50'),(10,'BAGUS','KEKEY','xxxxxx','192.168.0.1','WARGANET','pemersatubangsa','KEKEY','pemersatubangsa','10.10.10.113',150000.00,0,'2024-12-12 13:44:18','2026-06-02 09:33:58'),(11,'VERA','VERA','xxxxx','192.168.0.1','warganet','pemersatubangsa','VERA','pemersatubangsa','10.10.10.112',140000.00,0,'2024-12-12 13:46:00','2026-06-02 09:33:57'),(12,'SWM','SWM','swm','192.168.0.1','warganet','pemersatubangsa','WIJAYA','pemersatubangsa','10.10.10.101',300000.00,1,'2024-12-12 13:47:10','2025-03-11 17:16:03'),(13,'KOJEK','Bahira','naonwaenya','192.168.1.1','admin','Warganet25','FIRMAN','pemersatubangsa','10.10.10.105',150000.00,1,'2025-03-02 13:01:29','2025-03-11 17:17:12'),(14,'PIPIH','Lani Bunga','Mailani selfi','192.168.1.1','admin','Warganet25','PIPIH','pemersatubangsa','10.10.10.106',150000.00,1,'2025-03-05 03:53:39','2025-03-11 17:18:32'),(15,'ARI','ARYA','cacariya','192.168.1.1','ARI','pemersatubangsa$','ARI','pemersatubangsa','10.10.10.117',150000.00,1,'2025-04-19 05:36:25','2025-04-19 05:36:25'),(16,'RONY','-','-','192.168.0.1','-','-','RONY','pemersatubangsa','-',100000.00,0,'2025-04-29 03:02:38','2026-06-02 09:32:45');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_user_id_foreign` (`user_id`),
  CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,1,'Pembayaran Indihome rapel dari excel',2657000.00,'2024-12-12 13:16:33','2025-12-16 15:08:28'),(2,1,'Bayar ocep',100000.00,'2024-12-15 08:21:35','2024-12-15 08:21:35'),(3,1,'Beli switch Hub 8 port',112000.00,'2024-12-15 08:56:04','2024-12-15 08:56:04'),(4,1,'BAYAR VPN',30000.00,'2024-12-18 09:17:21','2024-12-18 09:17:21'),(5,1,'Beli kabel fiber 200m',215300.00,'2025-01-03 07:03:11','2025-01-03 07:03:11'),(6,1,'Pembayaran Indihome',657000.00,'2025-01-06 04:38:27','2025-01-06 04:38:27'),(7,1,'Beli kabel LAN 100m',250000.00,'2025-01-16 02:50:10','2025-01-16 02:50:10'),(8,1,'Bayar sedod narik kabel yudi-bagus',100000.00,'2025-01-29 02:23:02','2025-01-29 02:23:02'),(9,1,'Bayar sedod narik kabel Vera bagus dan cabut kabel bagus yudi',50000.00,'2025-01-29 02:23:34','2025-01-29 02:23:34'),(10,1,'Bayar IndiHome februari',657000.00,'2025-02-06 11:04:24','2025-02-06 11:04:24'),(11,1,'Beli HTB KOJEK & PIPIH A & B',107000.00,'2025-03-05 02:13:44','2025-03-05 02:13:44'),(12,1,'BELI HTB AAB BUAT DIRUMAH AMBON',109000.00,'2025-03-05 02:14:30','2025-03-05 02:14:30'),(13,1,'BELI ROUTER PIPIH & KOJEK 2',252000.00,'2025-03-05 02:15:02','2025-03-05 02:15:02'),(14,1,'BELI SWITCH HUB CADANGAN',101200.00,'2025-03-05 02:16:06','2025-03-05 02:16:06'),(15,1,'BAYAR KABEL DAN PASANG FASCONT ORANG TELKOM KOJEK PIPIH',100000.00,'2025-03-05 02:16:42','2025-03-05 02:16:42'),(16,1,'BAYAR ORANG TELKOM DI SEDOD',50000.00,'2025-03-05 02:17:14','2025-03-05 02:17:14'),(17,1,'Beli Mikrotik',960300.00,'2025-03-11 16:56:13','2025-03-11 16:56:13'),(18,1,'Beli HTB Untuk SWM',100000.00,'2025-03-11 16:56:36','2025-03-11 16:56:36'),(19,1,'Setting VPN Mikrotik baru',30000.00,'2025-03-11 16:57:02','2025-03-11 16:57:02'),(20,1,'Beli Router RPH',270000.00,'2025-03-11 16:59:48','2025-03-11 16:59:48'),(21,1,'Beli router Kapti',121000.00,'2025-03-12 08:53:50','2025-03-12 08:53:50'),(22,1,'Pembayaran Indihome',656000.00,'2025-03-16 11:03:27','2025-03-16 11:03:27'),(23,1,'Bayar IndiHome maret - april',657000.00,'2025-04-09 00:46:26','2025-04-09 00:46:26'),(24,1,'Router, HTB, FO',388000.00,'2025-04-22 02:13:36','2025-04-22 02:13:36'),(25,1,'Pembayaran Indihome',657000.00,'2025-05-08 01:55:39','2025-05-08 01:55:39'),(26,1,'Pembayaran IndiHome',657000.00,'2025-06-10 00:39:24','2025-06-10 00:39:24'),(27,1,'Pembayaran Indihome',657000.00,'2025-07-10 01:07:27','2025-07-10 01:07:27'),(28,1,'Pembelian htb 2 set',202800.00,'2025-08-07 03:34:16','2025-08-07 03:34:16'),(29,1,'Pembayaran Indihome Juli',657000.00,'2025-08-09 05:06:43','2025-08-09 05:06:43'),(30,1,'Pembayaran Indihome agustus',657000.00,'2025-09-05 23:54:19','2025-09-05 23:54:19'),(31,1,'Beli HTB 2 SET',206000.00,'2025-09-11 00:16:20','2025-09-11 00:16:20'),(32,1,'Ngulian kang wifi',60000.00,'2025-09-11 00:17:05','2025-09-11 00:17:05'),(33,1,'Pembayaran Indihome',657000.00,'2025-10-07 02:08:17','2025-10-07 02:08:17'),(34,1,'Beli colokan dll',25000.00,'2025-10-20 08:46:09','2025-10-20 08:46:09'),(35,1,'Beli htb',350000.00,'2025-10-30 04:42:38','2025-10-30 04:42:38'),(36,1,'Switch',125000.00,'2025-11-07 00:29:17','2025-11-07 00:29:17'),(37,1,'Switch',145000.00,'2025-11-07 00:29:52','2025-11-07 00:30:04'),(38,1,'Pembayaran Indihome Oktober',657000.00,'2025-11-11 10:27:15','2025-11-11 10:27:15'),(39,1,'Copot vera',100000.00,'2025-11-11 10:28:05','2025-11-11 10:28:05'),(40,1,'Bayar sedod',50000.00,'2025-11-15 01:57:56','2025-11-15 01:57:56'),(41,1,'Brli kabel optic',265000.00,'2025-11-15 01:58:20','2025-11-15 01:58:20'),(42,1,'beli HTB',295000.00,'2025-12-16 15:04:59','2025-12-16 15:04:59'),(43,1,'beli router',155000.00,'2025-12-16 15:05:18','2025-12-16 15:05:18'),(44,1,'BAYAR MYREPUBLIK',610000.00,'2025-12-16 15:07:52','2025-12-16 15:07:52'),(45,1,'BELI MIKROTIK RB450GX4',1620000.00,'2025-12-20 06:46:59','2025-12-20 06:46:59'),(46,1,'BELI SWITCH GIGABYTE',106000.00,'2025-12-20 06:47:30','2025-12-20 06:47:30'),(47,1,'BELI TERMINAL KUNINGAN',70000.00,'2025-12-20 06:47:44','2025-12-20 06:47:44'),(48,1,'Beli HTB yudi',82400.00,'2025-12-26 15:55:36','2025-12-26 15:55:36'),(49,1,'Beli router yudi',215000.00,'2025-12-30 01:01:42','2025-12-30 01:01:42'),(50,1,'Beli alat listrik pindah server',71000.00,'2025-12-30 01:02:24','2025-12-30 01:02:24'),(51,1,'Pembayaran Myrepublik + add on',585000.00,'2026-01-06 02:31:17','2026-01-06 02:31:17'),(52,1,'Cicilan paylater',215500.00,'2026-01-20 11:17:09','2026-01-20 11:17:09'),(53,1,'Pembayaran Myrepublik + add on',585000.00,'2026-02-09 07:18:32','2026-02-09 07:18:32'),(54,1,'Republik',585000.00,'2026-02-11 22:39:01','2026-02-11 22:39:01'),(55,1,'Paylater',215500.00,'2026-02-21 05:49:34','2026-02-21 05:49:34'),(56,1,'Pembayaran Myrepublik + add on',585000.00,'2026-03-08 02:37:09','2026-03-08 02:37:09'),(57,1,'Bayar paylater',216000.00,'2026-03-14 03:09:43','2026-03-14 03:09:43'),(58,1,'Bayar Paylater',216000.00,'2026-04-10 03:29:51','2026-04-10 03:29:51'),(59,1,'Pembayaran Myrepublik + add on',585000.00,'2026-04-10 03:30:07','2026-04-10 03:30:07'),(60,1,'Pembayaran Myrepublik + add on',585000.00,'2026-05-01 09:50:14','2026-05-01 09:50:14');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `initial_balances`
--

DROP TABLE IF EXISTS `initial_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `initial_balances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `initial_balances`
--

LOCK TABLES `initial_balances` WRITE;
/*!40000 ALTER TABLE `initial_balances` DISABLE KEYS */;
INSERT INTO `initial_balances` VALUES (1,31855600.00,NULL,NULL);
/*!40000 ALTER TABLE `initial_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_11_24_120817_create_customers_table',1),(5,'2024_11_25_172010_create_bills_table',1),(6,'2024_11_26_154627_create_payments_table',1),(7,'2024_11_28_123142_create_expenses_table',1),(8,'2024_11_28_164625_create_withdrawals_table',1),(9,'2024_11_30_162146_create_initial_balances_table',1),(10,'2024_12_04_154150_add_customer_id_to_payments_table',1),(11,'2025_03_11_164239_create_sideincomes_table',2),(12,'2020_10_04_115514_create_moonshine_roles_table',3),(13,'2020_10_05_173148_create_moonshine_tables',3),(14,'2025_03_16_011640_modify_qty_column_in_pesanan_detail_table',4),(15,'2025_03_16_011817_modify_qty_column_in_pesanan_detail_table',4),(16,'2025_03_16_012240_update_qty_column_in_pesanan_detail',4),(17,'2025_03_16_014047_update_qty_column_in_pesanan_detail',4),(18,'2025_03_16_014528_modify_qty_pesanan_detail',4),(19,'2025_03_16_024734_modify_qty_pesanan_detail',4),(20,'2026_06_01_162238_create_notifications_table',4),(21,'2026_06_02_034130_add_is_active_to_customers_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_user_roles`
--

DROP TABLE IF EXISTS `moonshine_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_user_roles`
--

LOCK TABLES `moonshine_user_roles` WRITE;
/*!40000 ALTER TABLE `moonshine_user_roles` DISABLE KEYS */;
INSERT INTO `moonshine_user_roles` VALUES (1,'Admin','2026-06-02 09:24:11','2026-06-02 09:24:11'),(2,'Admin Terbatas',NULL,NULL);
/*!40000 ALTER TABLE `moonshine_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moonshine_users`
--

DROP TABLE IF EXISTS `moonshine_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moonshine_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moonshine_user_role_id` bigint unsigned NOT NULL DEFAULT '1',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moonshine_users_email_unique` (`email`),
  KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`),
  CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moonshine_users`
--

LOCK TABLES `moonshine_users` WRITE;
/*!40000 ALTER TABLE `moonshine_users` DISABLE KEYS */;
INSERT INTO `moonshine_users` VALUES (1,1,'asepsaidung@gmail.com','$2y$12$QUp96824yb4x7u4iR0samuaki9kv5B21IOv4Etmq3R/UFqVOprMyq','IDUNG',NULL,NULL,'2026-06-02 09:25:28','2026-06-02 09:38:09'),(2,2,'primaprivate28@gmail.com','$2y$12$dsNjCsZMYfyZDU7fFWFrd..4rsSp0JHQ9k.ug/w.SA6wf7Mxe9GA2','Prima js',NULL,NULL,'2026-06-02 09:25:29','2026-06-02 09:25:29');
/*!40000 ALTER TABLE `moonshine_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `bill_id` bigint unsigned NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `status` enum('waiting','confirmed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `paid_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_bill_id_foreign` (`bill_id`),
  KEY `payments_user_id_foreign` (`user_id`),
  KEY `payments_customer_id_foreign` (`customer_id`),
  CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,4,4,150000.00,0.00,'confirmed','2024-12-12 13:49:27',2,'2024-12-12 13:49:27','2024-12-12 13:53:38'),(2,1,1,150000.00,0.00,'confirmed','2024-12-12 13:50:42',1,'2024-12-12 13:50:42','2024-12-12 13:53:36'),(3,3,3,150000.00,0.00,'confirmed','2024-12-12 13:50:54',1,'2024-12-12 13:50:54','2024-12-12 13:53:33'),(4,5,5,140000.00,10000.00,'confirmed','2024-12-12 13:51:34',1,'2024-12-12 13:51:34','2024-12-12 13:53:31'),(5,7,7,150000.00,0.00,'confirmed','2024-12-12 13:51:52',1,'2024-12-12 13:51:52','2024-12-12 13:53:29'),(6,10,10,150000.00,0.00,'confirmed','2024-12-12 13:52:10',1,'2024-12-12 13:52:10','2024-12-12 13:53:27'),(7,11,11,150000.00,0.00,'confirmed','2024-12-12 13:52:27',1,'2024-12-12 13:52:27','2024-12-12 13:53:25'),(8,12,12,300000.00,0.00,'confirmed','2024-12-12 13:52:36',1,'2024-12-12 13:52:36','2024-12-12 13:53:22'),(9,2,2,150000.00,0.00,'confirmed','2024-12-15 08:19:57',2,'2024-12-15 08:19:57','2024-12-15 08:20:35'),(10,8,8,150000.00,0.00,'confirmed','2024-12-18 09:45:54',1,'2024-12-18 09:45:54','2024-12-18 09:46:11'),(11,5,5,140000.00,0.00,'confirmed','2025-01-01 13:23:19',1,'2025-01-01 13:23:19','2025-01-01 13:23:23'),(12,3,3,150000.00,0.00,'confirmed','2025-01-03 04:20:24',1,'2025-01-03 04:20:24','2025-01-03 04:20:30'),(13,6,6,100000.00,100000.00,'confirmed','2025-01-03 10:21:46',1,'2025-01-03 10:21:46','2025-01-03 10:22:19'),(14,9,9,200000.00,0.00,'confirmed','2025-01-03 10:21:55',1,'2025-01-03 10:21:55','2025-01-03 10:22:15'),(15,12,12,300000.00,0.00,'confirmed','2025-01-03 10:22:08',1,'2025-01-03 10:22:08','2025-01-03 10:22:13'),(16,1,1,150000.00,0.00,'confirmed','2025-01-05 13:15:28',1,'2025-01-05 13:15:28','2025-01-05 13:17:33'),(17,4,4,150000.00,0.00,'confirmed','2025-01-05 13:17:09',1,'2025-01-05 13:17:09','2025-01-05 13:17:31'),(18,7,7,150000.00,0.00,'confirmed','2025-01-05 13:17:18',1,'2025-01-05 13:17:18','2025-01-05 13:17:28'),(19,10,10,130000.00,20000.00,'confirmed','2025-01-07 02:05:01',1,'2025-01-07 02:05:01','2025-01-07 02:05:06'),(20,8,8,150000.00,0.00,'confirmed','2025-01-11 06:35:09',1,'2025-01-11 06:35:09','2025-01-11 06:35:15'),(21,11,11,150000.00,0.00,'confirmed','2025-01-14 00:48:59',1,'2025-01-14 00:48:59','2025-01-14 00:49:05'),(22,2,2,150000.00,0.00,'confirmed','2025-01-22 11:23:15',2,'2025-01-22 11:23:15','2025-01-22 11:58:59'),(23,3,3,150000.00,0.00,'confirmed','2025-02-03 02:12:21',1,'2025-02-03 02:12:21','2025-02-03 02:12:40'),(24,5,5,140000.00,0.00,'confirmed','2025-02-03 02:12:32',1,'2025-02-03 02:12:32','2025-02-03 02:12:38'),(25,9,9,100000.00,0.00,'confirmed','2025-02-04 10:56:54',1,'2025-02-04 10:56:54','2025-02-04 10:56:58'),(26,10,10,100000.00,50000.00,'confirmed','2025-02-06 05:03:03',1,'2025-02-06 05:03:03','2025-02-06 05:03:25'),(27,12,12,300000.00,0.00,'confirmed','2025-02-06 05:03:18',1,'2025-02-06 05:03:18','2025-02-06 05:03:22'),(28,6,6,100000.00,0.00,'confirmed','2025-02-06 05:03:34',1,'2025-02-06 05:03:34','2025-02-06 05:03:40'),(29,4,4,150000.00,0.00,'confirmed','2025-02-07 16:21:01',1,'2025-02-07 16:21:01','2025-02-07 16:22:36'),(30,7,7,150000.00,0.00,'confirmed','2025-02-07 16:21:23',1,'2025-02-07 16:21:23','2025-02-07 16:22:32'),(31,8,8,150000.00,0.00,'confirmed','2025-02-07 16:21:33',1,'2025-02-07 16:21:33','2025-02-07 16:22:30'),(32,11,11,140000.00,10000.00,'confirmed','2025-02-07 16:22:16',1,'2025-02-07 16:22:16','2025-02-07 16:22:28'),(33,1,1,150000.00,0.00,'confirmed','2025-02-09 13:56:10',1,'2025-02-09 13:56:10','2025-02-09 13:56:15'),(34,2,2,150000.00,0.00,'confirmed','2025-02-15 09:29:40',2,'2025-02-15 09:29:40','2025-02-20 11:40:27'),(35,13,13,0.00,150000.00,'confirmed','2025-03-02 13:06:54',2,'2025-03-02 13:06:54','2025-03-02 13:07:57'),(36,3,3,150000.00,0.00,'confirmed','2025-03-02 13:07:19',2,'2025-03-02 13:07:19','2025-03-02 13:07:51'),(37,5,5,140000.00,0.00,'confirmed','2025-03-05 03:54:24',1,'2025-03-05 03:54:24','2025-03-05 04:11:46'),(38,9,9,100000.00,0.00,'confirmed','2025-03-05 03:54:35',1,'2025-03-05 03:54:35','2025-03-05 04:11:45'),(39,6,6,100000.00,0.00,'confirmed','2025-03-05 03:54:42',1,'2025-03-05 03:54:42','2025-03-05 04:11:43'),(40,10,10,145000.00,5000.00,'confirmed','2025-03-05 04:10:09',1,'2025-03-05 04:10:09','2025-03-05 04:11:41'),(41,12,12,300000.00,0.00,'confirmed','2025-03-05 04:10:22',1,'2025-03-05 04:10:22','2025-03-05 04:11:39'),(42,1,1,150000.00,0.00,'confirmed','2025-03-11 16:57:55',1,'2025-03-11 16:57:55','2025-03-11 16:58:45'),(43,4,4,150000.00,0.00,'confirmed','2025-03-11 16:58:04',1,'2025-03-11 16:58:04','2025-03-11 16:58:44'),(44,8,8,140000.00,10000.00,'confirmed','2025-03-11 16:58:15',1,'2025-03-11 16:58:15','2025-03-11 16:58:43'),(45,11,11,125000.00,15000.00,'confirmed','2025-03-11 16:58:27',1,'2025-03-11 16:58:27','2025-03-11 16:58:41'),(46,7,7,140000.00,10000.00,'confirmed','2025-03-16 04:49:39',1,'2025-03-16 04:49:39','2025-03-16 04:49:55'),(47,2,2,150000.00,0.00,'confirmed','2025-03-16 11:02:07',1,'2025-03-16 11:02:07','2025-03-16 11:02:17'),(48,3,3,150000.00,0.00,'confirmed','2025-04-04 17:41:36',1,'2025-04-04 17:41:36','2025-04-04 17:42:08'),(49,5,5,140000.00,0.00,'confirmed','2025-04-04 17:41:46',1,'2025-04-04 17:41:46','2025-04-04 17:42:06'),(50,9,9,100000.00,0.00,'confirmed','2025-04-04 17:41:54',1,'2025-04-04 17:41:54','2025-04-04 17:42:04'),(51,1,1,150000.00,0.00,'confirmed','2025-04-08 13:48:31',1,'2025-04-08 13:48:31','2025-04-08 13:51:38'),(52,13,13,140000.00,10000.00,'confirmed','2025-04-08 13:48:57',1,'2025-04-08 13:48:57','2025-04-08 13:51:35'),(53,14,14,140000.00,10000.00,'confirmed','2025-04-08 13:49:25',1,'2025-04-08 13:49:25','2025-04-08 13:51:32'),(54,7,7,150000.00,0.00,'confirmed','2025-04-08 13:49:51',1,'2025-04-08 13:49:51','2025-04-08 13:51:30'),(55,6,6,100000.00,0.00,'confirmed','2025-04-08 13:50:01',1,'2025-04-08 13:50:01','2025-04-08 13:51:28'),(56,11,11,140000.00,0.00,'confirmed','2025-04-08 13:50:20',1,'2025-04-08 13:50:20','2025-04-08 13:51:25'),(57,4,4,150000.00,0.00,'confirmed','2025-04-09 01:37:42',1,'2025-04-09 01:37:42','2025-04-09 01:37:47'),(58,8,8,140000.00,10000.00,'confirmed','2025-04-10 02:14:32',1,'2025-04-10 02:14:32','2025-04-10 02:14:49'),(59,10,10,140000.00,0.00,'confirmed','2025-04-12 00:53:51',1,'2025-04-12 00:53:51','2025-04-12 00:54:14'),(60,10,10,0.00,10000.00,'confirmed','2025-04-12 00:54:06',1,'2025-04-12 00:54:06','2025-04-12 00:54:12'),(61,12,12,300000.00,0.00,'confirmed','2025-04-12 12:32:32',1,'2025-04-12 12:32:32','2025-04-12 12:32:37'),(62,2,2,150000.00,0.00,'confirmed','2025-04-24 17:37:00',1,'2025-04-24 17:37:00','2025-04-24 17:37:08'),(63,5,5,140000.00,0.00,'confirmed','2025-05-04 16:51:41',1,'2025-05-04 16:51:41','2025-05-04 16:52:44'),(64,9,9,100000.00,0.00,'confirmed','2025-05-04 16:51:51',1,'2025-05-04 16:51:51','2025-05-04 16:52:42'),(65,6,6,100000.00,0.00,'confirmed','2025-05-04 16:52:04',1,'2025-05-04 16:52:04','2025-05-04 16:52:39'),(66,15,15,50000.00,100000.00,'confirmed','2025-05-04 16:52:17',1,'2025-05-04 16:52:17','2025-05-04 16:52:37'),(67,1,1,150000.00,0.00,'confirmed','2025-05-06 01:27:47',1,'2025-05-06 01:27:47','2025-05-06 01:29:29'),(68,3,3,150000.00,0.00,'confirmed','2025-05-06 01:27:55',1,'2025-05-06 01:27:55','2025-05-06 01:29:26'),(69,4,4,150000.00,0.00,'confirmed','2025-05-06 01:28:04',1,'2025-05-06 01:28:04','2025-05-06 01:29:19'),(70,7,7,150000.00,0.00,'confirmed','2025-05-06 01:28:13',1,'2025-05-06 01:28:13','2025-05-06 01:29:17'),(71,12,12,300000.00,0.00,'confirmed','2025-05-06 01:28:27',1,'2025-05-06 01:28:27','2025-05-06 01:29:15'),(72,13,13,150000.00,0.00,'confirmed','2025-05-06 01:28:40',1,'2025-05-06 01:28:40','2025-05-06 01:29:13'),(73,14,14,150000.00,0.00,'confirmed','2025-05-06 01:28:54',1,'2025-05-06 01:28:54','2025-05-06 01:29:11'),(74,10,10,150000.00,0.00,'confirmed','2025-05-12 00:36:36',1,'2025-05-12 00:36:36','2025-05-12 00:36:57'),(75,11,11,140000.00,0.00,'confirmed','2025-05-12 00:36:45',1,'2025-05-12 00:36:45','2025-05-12 00:36:55'),(76,8,8,150000.00,0.00,'confirmed','2025-05-13 11:59:46',1,'2025-05-13 11:59:46','2025-05-13 11:59:51'),(77,2,2,150000.00,0.00,'confirmed','2025-05-27 09:58:50',2,'2025-05-27 09:58:50','2025-05-28 04:11:17'),(78,5,5,140000.00,0.00,'confirmed','2025-06-01 12:30:40',1,'2025-06-01 12:30:40','2025-06-01 12:31:12'),(79,9,9,100000.00,0.00,'confirmed','2025-06-01 12:30:49',1,'2025-06-01 12:30:49','2025-06-01 12:31:10'),(80,15,15,150000.00,0.00,'confirmed','2025-06-01 12:30:59',1,'2025-06-01 12:30:59','2025-06-01 12:31:08'),(81,10,10,150000.00,0.00,'confirmed','2025-06-05 03:02:35',1,'2025-06-05 03:02:35','2025-06-05 03:02:40'),(82,6,6,100000.00,0.00,'confirmed','2025-06-06 01:44:03',1,'2025-06-06 01:44:03','2025-06-06 01:44:08'),(83,11,11,140000.00,0.00,'confirmed','2025-06-06 01:44:44',1,'2025-06-06 01:44:44','2025-06-13 12:37:27'),(84,1,1,150000.00,0.00,'confirmed','2025-06-07 09:01:45',1,'2025-06-07 09:01:45','2025-06-07 09:03:03'),(85,3,3,150000.00,0.00,'confirmed','2025-06-07 09:01:53',1,'2025-06-07 09:01:53','2025-06-07 09:03:00'),(86,4,4,150000.00,0.00,'confirmed','2025-06-07 09:02:01',1,'2025-06-07 09:02:01','2025-06-07 09:02:58'),(87,7,7,150000.00,0.00,'confirmed','2025-06-07 09:02:07',1,'2025-06-07 09:02:07','2025-06-07 09:02:57'),(88,13,13,150000.00,0.00,'confirmed','2025-06-07 09:02:17',1,'2025-06-07 09:02:17','2025-06-07 09:02:55'),(89,14,14,150000.00,0.00,'confirmed','2025-06-07 09:02:27',1,'2025-06-07 09:02:27','2025-06-07 09:02:53'),(90,12,12,300000.00,0.00,'confirmed','2025-06-13 12:36:51',1,'2025-06-13 12:36:51','2025-06-13 12:37:16'),(91,8,8,150000.00,0.00,'confirmed','2025-06-16 02:29:33',1,'2025-06-16 02:29:33','2025-06-16 02:29:38'),(92,2,2,150000.00,0.00,'confirmed','2025-06-21 09:59:03',2,'2025-06-21 09:59:03','2025-06-21 11:03:13'),(93,5,5,140000.00,0.00,'confirmed','2025-07-01 04:26:17',1,'2025-07-01 04:26:17','2025-07-01 04:26:23'),(94,6,6,100000.00,0.00,'confirmed','2025-07-03 14:48:11',1,'2025-07-03 14:48:11','2025-07-03 14:49:13'),(95,9,9,100000.00,0.00,'confirmed','2025-07-03 14:48:19',1,'2025-07-03 14:48:19','2025-07-03 14:49:11'),(96,15,15,150000.00,0.00,'confirmed','2025-07-03 14:48:26',1,'2025-07-03 14:48:26','2025-07-03 14:49:09'),(97,11,11,140000.00,0.00,'confirmed','2025-07-03 14:48:40',1,'2025-07-03 14:48:40','2025-07-03 14:49:08'),(98,12,12,300000.00,0.00,'confirmed','2025-07-03 14:48:48',1,'2025-07-03 14:48:48','2025-07-03 14:49:06'),(99,1,1,150000.00,0.00,'confirmed','2025-07-06 15:31:09',1,'2025-07-06 15:31:09','2025-07-06 15:32:51'),(100,3,3,150000.00,0.00,'confirmed','2025-07-06 15:31:16',1,'2025-07-06 15:31:16','2025-07-06 15:32:48'),(101,4,4,150000.00,0.00,'confirmed','2025-07-06 15:31:32',1,'2025-07-06 15:31:32','2025-07-06 15:32:46'),(102,7,7,150000.00,0.00,'confirmed','2025-07-06 15:31:42',1,'2025-07-06 15:31:42','2025-07-06 15:32:43'),(103,13,13,150000.00,0.00,'confirmed','2025-07-06 15:31:54',1,'2025-07-06 15:31:54','2025-07-06 15:32:41'),(104,14,14,150000.00,0.00,'confirmed','2025-07-06 15:32:09',1,'2025-07-06 15:32:09','2025-07-06 15:32:39'),(105,8,8,150000.00,0.00,'confirmed','2025-07-10 01:07:38',1,'2025-07-10 01:07:38','2025-07-10 01:07:43'),(106,10,10,150000.00,0.00,'confirmed','2025-07-12 14:29:23',1,'2025-07-12 14:29:23','2025-07-12 14:29:29'),(107,2,2,150000.00,0.00,'confirmed','2025-07-27 01:48:28',2,'2025-07-27 01:48:28','2025-07-27 02:14:59'),(108,5,5,140000.00,0.00,'confirmed','2025-08-03 09:47:32',1,'2025-08-03 09:47:32','2025-08-05 09:45:15'),(109,15,15,150000.00,0.00,'confirmed','2025-08-03 09:47:47',1,'2025-08-03 09:47:47','2025-08-05 09:45:09'),(110,9,9,50000.00,0.00,'confirmed','2025-08-03 09:47:54',1,'2025-08-03 09:47:54','2025-08-05 09:45:12'),(111,6,6,100000.00,0.00,'confirmed','2025-08-05 09:45:31',1,'2025-08-05 09:45:31','2025-08-05 09:46:57'),(112,1,1,150000.00,0.00,'confirmed','2025-08-07 03:31:45',1,'2025-08-07 03:31:45','2025-08-07 03:32:50'),(113,3,3,150000.00,0.00,'confirmed','2025-08-07 03:31:51',1,'2025-08-07 03:31:51','2025-08-07 03:32:47'),(114,4,4,150000.00,0.00,'confirmed','2025-08-07 03:31:57',1,'2025-08-07 03:31:57','2025-08-07 03:32:45'),(115,7,7,150000.00,0.00,'confirmed','2025-08-07 03:32:03',1,'2025-08-07 03:32:03','2025-08-07 03:32:43'),(116,11,11,140000.00,0.00,'confirmed','2025-08-07 03:32:14',1,'2025-08-07 03:32:14','2025-08-07 03:32:41'),(117,13,13,150000.00,0.00,'confirmed','2025-08-07 03:32:24',1,'2025-08-07 03:32:24','2025-08-07 03:32:39'),(118,14,14,150000.00,0.00,'confirmed','2025-08-07 03:32:31',1,'2025-08-07 03:32:31','2025-08-07 03:32:37'),(119,8,8,150000.00,0.00,'confirmed','2025-08-29 06:50:14',1,'2025-08-29 06:50:14','2025-08-29 07:00:30'),(120,12,12,300000.00,0.00,'confirmed','2025-08-29 07:00:19',1,'2025-08-29 07:00:19','2025-08-29 07:00:29'),(121,2,2,150000.00,0.00,'confirmed','2025-08-30 15:59:22',2,'2025-08-30 15:59:22','2025-08-31 17:24:33'),(122,10,10,150000.00,0.00,'confirmed','2025-08-31 10:51:52',1,'2025-08-31 10:51:52','2025-08-31 10:52:00'),(123,3,3,150000.00,0.00,'confirmed','2025-09-01 11:05:32',1,'2025-09-01 11:05:32','2025-12-16 15:03:38'),(124,5,5,140000.00,0.00,'confirmed','2025-09-01 11:05:39',1,'2025-09-01 11:05:39','2025-12-16 15:03:38'),(125,11,11,140000.00,0.00,'confirmed','2025-09-01 11:05:49',1,'2025-09-01 11:05:49','2025-12-16 15:03:37'),(126,13,13,150000.00,0.00,'confirmed','2025-09-01 11:05:57',1,'2025-09-01 11:05:57','2025-12-16 15:03:36'),(127,15,15,150000.00,0.00,'confirmed','2025-09-03 04:30:21',1,'2025-09-03 04:30:21','2025-09-03 04:30:40'),(128,9,9,150000.00,0.00,'confirmed','2025-09-03 04:30:31',1,'2025-09-03 04:30:31','2025-09-03 04:30:38'),(129,10,10,150000.00,0.00,'confirmed','2025-09-06 03:48:18',1,'2025-09-06 03:48:18','2025-09-06 03:48:23'),(130,14,14,150000.00,0.00,'confirmed','2025-09-07 04:41:20',1,'2025-09-07 04:41:20','2025-09-07 04:41:26'),(131,6,6,100000.00,0.00,'confirmed','2025-09-09 10:27:08',1,'2025-09-09 10:27:08','2025-09-20 05:20:40'),(132,1,1,150000.00,0.00,'confirmed','2025-09-10 03:19:16',1,'2025-09-10 03:19:16','2025-09-20 05:20:38'),(133,4,4,150000.00,0.00,'confirmed','2025-09-10 03:19:24',1,'2025-09-10 03:19:24','2025-09-20 05:20:36'),(134,7,7,150000.00,0.00,'confirmed','2025-09-10 03:19:31',1,'2025-09-10 03:19:31','2025-09-20 05:20:34'),(135,8,8,150000.00,0.00,'confirmed','2025-09-16 00:53:07',1,'2025-09-16 00:53:07','2025-09-20 05:20:32'),(136,12,12,300000.00,0.00,'confirmed','2025-09-16 00:53:15',1,'2025-09-16 00:53:15','2025-09-20 05:20:30'),(137,3,3,150000.00,0.00,'confirmed','2025-10-02 12:02:32',1,'2025-10-02 12:02:32','2025-10-02 12:04:13'),(138,5,5,140000.00,0.00,'confirmed','2025-10-02 12:02:44',1,'2025-10-02 12:02:44','2025-10-02 12:04:11'),(139,11,11,140000.00,0.00,'confirmed','2025-10-02 12:02:51',1,'2025-10-02 12:02:51','2025-10-02 12:04:10'),(140,13,13,150000.00,0.00,'confirmed','2025-10-02 12:02:59',1,'2025-10-02 12:02:59','2025-10-02 12:04:09'),(141,4,4,150000.00,0.00,'confirmed','2025-10-03 15:37:50',1,'2025-10-03 15:37:50','2025-10-07 01:02:41'),(142,1,1,150000.00,0.00,'confirmed','2025-10-07 01:01:32',1,'2025-10-07 01:01:32','2025-10-07 01:02:39'),(143,6,6,100000.00,0.00,'confirmed','2025-10-07 01:01:41',1,'2025-10-07 01:01:41','2025-10-07 01:02:37'),(144,7,7,150000.00,0.00,'confirmed','2025-10-07 01:01:48',1,'2025-10-07 01:01:48','2025-10-07 01:02:36'),(145,9,9,100000.00,0.00,'confirmed','2025-10-07 01:01:56',1,'2025-10-07 01:01:56','2025-10-07 01:02:34'),(146,14,14,150000.00,0.00,'confirmed','2025-10-07 01:02:11',1,'2025-10-07 01:02:11','2025-10-07 01:02:32'),(147,15,15,150000.00,0.00,'confirmed','2025-10-07 01:02:22',1,'2025-10-07 01:02:22','2025-10-07 01:02:30'),(148,8,8,150000.00,0.00,'confirmed','2025-10-08 03:41:55',1,'2025-10-08 03:41:55','2025-10-08 03:42:17'),(149,12,12,300000.00,0.00,'confirmed','2025-10-08 03:42:02',1,'2025-10-08 03:42:02','2025-10-08 03:42:15'),(150,2,2,150000.00,0.00,'confirmed','2025-10-10 12:28:49',2,'2025-10-10 12:28:49','2025-10-11 01:45:24'),(151,10,10,135000.00,15000.00,'confirmed','2025-10-11 05:52:50',1,'2025-10-11 05:52:50','2025-10-11 05:53:02'),(152,14,14,150000.00,0.00,'confirmed','2025-11-07 00:31:02',1,'2025-11-07 00:31:02','2025-11-07 00:33:11'),(153,4,4,150000.00,0.00,'confirmed','2025-11-07 00:31:10',1,'2025-11-07 00:31:10','2025-11-07 00:33:09'),(154,3,3,140000.00,10000.00,'confirmed','2025-11-07 00:31:20',1,'2025-11-07 00:31:20','2025-11-07 00:33:07'),(155,5,5,140000.00,0.00,'confirmed','2025-11-07 00:31:32',1,'2025-11-07 00:31:32','2025-11-07 00:33:05'),(156,10,10,130000.00,20000.00,'confirmed','2025-11-07 00:31:58',1,'2025-11-07 00:31:58','2025-11-07 00:33:03'),(157,12,12,300000.00,0.00,'confirmed','2025-11-07 00:32:08',1,'2025-11-07 00:32:08','2025-11-07 00:33:01'),(158,13,13,150000.00,0.00,'confirmed','2025-11-07 00:32:17',1,'2025-11-07 00:32:17','2025-11-07 00:32:59'),(159,15,15,150000.00,0.00,'confirmed','2025-11-08 06:11:06',1,'2025-11-08 06:11:06','2025-11-11 03:34:31'),(160,2,2,150000.00,0.00,'confirmed','2025-11-18 03:17:43',2,'2025-11-18 03:17:43','2025-12-16 15:02:15'),(161,1,1,150000.00,0.00,'confirmed','2025-11-26 01:43:28',1,'2025-11-26 01:43:28','2025-12-16 15:02:19'),(162,7,7,150000.00,0.00,'confirmed','2025-12-02 08:49:49',1,'2025-12-02 08:49:49','2025-12-16 15:03:35'),(163,2,2,150000.00,0.00,'confirmed','2025-12-02 08:50:04',1,'2025-12-02 08:50:04','2025-12-16 15:02:11'),(164,3,19,150000.00,0.00,'confirmed','2025-12-16 14:59:15',1,'2025-12-16 14:59:15','2025-12-16 15:02:09'),(165,4,20,150000.00,0.00,'confirmed','2025-12-16 14:59:21',1,'2025-12-16 14:59:21','2025-12-16 15:02:06'),(166,5,21,140000.00,0.00,'confirmed','2025-12-16 14:59:28',1,'2025-12-16 14:59:28','2025-12-16 15:02:04'),(167,12,28,300000.00,0.00,'confirmed','2025-12-16 14:59:41',1,'2025-12-16 14:59:41','2025-12-16 15:02:03'),(168,14,30,15.00,0.00,'confirmed','2025-12-16 14:59:51',1,'2025-12-16 14:59:51','2025-12-16 15:02:02'),(169,14,30,149985.00,0.00,'confirmed','2025-12-16 15:00:03',1,'2025-12-16 15:00:03','2025-12-16 15:02:00'),(170,6,22,200000.00,0.00,'confirmed','2025-12-16 15:00:47',1,'2025-12-16 15:00:47','2025-12-16 15:01:59'),(171,15,31,150000.00,0.00,'confirmed','2025-12-16 15:01:10',1,'2025-12-16 15:01:10','2025-12-16 15:01:58'),(172,9,25,50000.00,0.00,'confirmed','2025-12-16 15:01:38',1,'2025-12-16 15:01:38','2025-12-16 15:01:57'),(173,10,26,150000.00,0.00,'confirmed','2025-12-17 11:47:42',1,'2025-12-17 11:47:42','2025-12-20 06:45:58'),(174,13,29,150000.00,0.00,'confirmed','2025-12-17 11:48:00',1,'2025-12-17 11:48:00','2025-12-20 06:45:57'),(175,1,17,150000.00,0.00,'confirmed','2025-12-22 09:53:52',2,'2025-12-22 09:53:52','2025-12-22 12:25:16'),(176,7,23,150000.00,0.00,'confirmed','2025-12-22 12:04:01',2,'2025-12-22 12:04:01','2025-12-22 12:25:14'),(177,3,35,150000.00,0.00,'confirmed','2026-01-01 11:16:25',1,'2026-01-01 11:16:25','2026-01-01 11:17:09'),(178,5,37,140000.00,0.00,'confirmed','2026-01-01 11:16:32',1,'2026-01-01 11:16:32','2026-01-01 11:17:07'),(179,13,45,150000.00,0.00,'confirmed','2026-01-01 11:16:40',1,'2026-01-01 11:16:40','2026-01-01 11:17:05'),(180,9,41,200000.00,0.00,'confirmed','2026-01-01 11:21:33',1,'2026-01-01 11:21:33','2026-01-02 10:03:20'),(181,15,47,150000.00,0.00,'confirmed','2026-01-01 11:21:42',1,'2026-01-01 11:21:42','2026-01-02 10:03:18'),(182,2,34,150000.00,0.00,'confirmed','2026-01-02 10:03:41',1,'2026-01-02 10:03:41','2026-01-02 10:03:47'),(183,14,46,150000.00,0.00,'confirmed','2026-01-08 04:15:08',1,'2026-01-08 04:15:08','2026-01-10 04:21:55'),(184,10,42,135000.00,15000.00,'confirmed','2026-01-10 04:21:48',1,'2026-01-10 04:21:48','2026-01-10 04:21:53'),(185,1,33,150000.00,0.00,'confirmed','2026-01-12 12:43:15',1,'2026-01-12 12:43:15','2026-01-12 12:43:23'),(186,4,36,150000.00,0.00,'confirmed','2026-01-20 11:18:06',1,'2026-01-20 11:18:06','2026-01-20 11:18:29'),(187,12,44,300000.00,0.00,'confirmed','2026-01-20 11:18:19',1,'2026-01-20 11:18:19','2026-01-20 11:18:27'),(188,2,34,150000.00,0.00,'confirmed','2026-01-21 09:22:57',2,'2026-01-21 09:22:57','2026-01-22 02:17:29'),(189,7,39,150000.00,0.00,'confirmed','2026-01-22 02:17:14',1,'2026-01-22 02:17:14','2026-01-22 02:17:27'),(190,6,38,100000.00,0.00,'confirmed','2026-01-29 10:48:04',1,'2026-01-29 10:48:04','2026-01-29 10:48:14'),(191,3,51,150000.00,0.00,'confirmed','2026-02-01 23:41:37',1,'2026-02-01 23:41:37','2026-02-01 23:42:47'),(192,5,53,140000.00,0.00,'confirmed','2026-02-01 23:41:47',1,'2026-02-01 23:41:47','2026-02-01 23:42:45'),(193,9,57,100000.00,0.00,'confirmed','2026-02-01 23:41:58',1,'2026-02-01 23:41:58','2026-02-01 23:42:43'),(194,15,63,150000.00,0.00,'confirmed','2026-02-01 23:42:17',1,'2026-02-01 23:42:17','2026-02-01 23:42:40'),(195,13,61,150000.00,0.00,'confirmed','2026-02-02 13:24:15',1,'2026-02-02 13:24:15','2026-02-02 13:24:22'),(196,1,49,150000.00,0.00,'confirmed','2026-02-09 07:17:21',1,'2026-02-09 07:17:21','2026-02-09 07:18:10'),(197,4,52,150000.00,0.00,'confirmed','2026-02-09 07:17:27',1,'2026-02-09 07:17:27','2026-02-09 07:18:09'),(198,7,55,150000.00,0.00,'confirmed','2026-02-09 07:17:34',1,'2026-02-09 07:17:34','2026-02-09 07:18:08'),(199,12,60,300000.00,0.00,'confirmed','2026-02-09 07:17:43',1,'2026-02-09 07:17:43','2026-02-09 07:18:07'),(200,14,62,150000.00,0.00,'confirmed','2026-02-09 07:17:51',1,'2026-02-09 07:17:51','2026-02-09 07:18:06'),(201,2,50,150000.00,0.00,'confirmed','2026-02-24 13:51:40',2,'2026-02-24 13:51:40','2026-02-25 03:27:06'),(202,5,69,140000.00,0.00,'confirmed','2026-03-02 06:37:14',1,'2026-03-02 06:37:14','2026-03-02 06:38:18'),(203,3,67,150000.00,0.00,'confirmed','2026-03-02 06:37:23',1,'2026-03-02 06:37:23','2026-03-02 06:38:17'),(204,15,79,150000.00,0.00,'confirmed','2026-03-02 06:37:57',1,'2026-03-02 06:37:57','2026-03-02 06:38:15'),(205,9,73,100000.00,0.00,'confirmed','2026-03-02 06:38:04',1,'2026-03-02 06:38:04','2026-03-02 06:38:14'),(206,6,70,100000.00,0.00,'confirmed','2026-03-02 06:38:10',1,'2026-03-02 06:38:10','2026-03-02 06:38:13'),(207,14,78,150000.00,0.00,'confirmed','2026-03-08 02:36:22',1,'2026-03-08 02:36:22','2026-03-08 02:36:48'),(208,13,77,150000.00,0.00,'confirmed','2026-03-08 02:36:31',1,'2026-03-08 02:36:31','2026-03-08 02:36:47'),(209,12,76,300000.00,0.00,'confirmed','2026-03-08 02:36:39',1,'2026-03-08 02:36:39','2026-03-08 02:36:45'),(210,1,65,150000.00,0.00,'confirmed','2026-03-14 03:09:52',1,'2026-03-14 03:09:52','2026-03-14 03:10:23'),(211,7,71,150000.00,0.00,'confirmed','2026-03-14 03:10:03',1,'2026-03-14 03:10:03','2026-03-14 03:10:21'),(212,4,68,150000.00,0.00,'confirmed','2026-03-20 17:01:47',1,'2026-03-20 17:01:47','2026-03-20 17:01:59'),(213,2,66,150000.00,0.00,'confirmed','2026-03-27 05:50:26',1,'2026-03-27 05:50:26','2026-03-27 05:50:31'),(214,1,81,150000.00,0.00,'confirmed','2026-04-06 03:18:56',1,'2026-04-06 03:18:56','2026-04-06 03:20:27'),(215,3,83,150000.00,0.00,'confirmed','2026-04-06 03:19:03',1,'2026-04-06 03:19:03','2026-04-06 03:20:24'),(216,4,84,150000.00,0.00,'confirmed','2026-04-06 03:19:10',1,'2026-04-06 03:19:10','2026-04-06 03:20:21'),(217,5,85,140000.00,0.00,'confirmed','2026-04-06 03:19:16',1,'2026-04-06 03:19:16','2026-04-06 03:20:19'),(218,6,86,100000.00,0.00,'confirmed','2026-04-06 03:19:23',1,'2026-04-06 03:19:23','2026-04-06 03:20:17'),(219,7,87,150000.00,0.00,'confirmed','2026-04-06 03:19:29',1,'2026-04-06 03:19:29','2026-04-06 03:20:16'),(220,9,89,100000.00,0.00,'confirmed','2026-04-06 03:19:37',1,'2026-04-06 03:19:37','2026-04-06 03:20:14'),(221,13,93,150000.00,0.00,'confirmed','2026-04-06 03:19:50',1,'2026-04-06 03:19:50','2026-04-06 03:20:12'),(222,14,94,150000.00,0.00,'confirmed','2026-04-06 03:19:57',1,'2026-04-06 03:19:57','2026-04-06 03:20:11'),(223,15,95,150000.00,0.00,'confirmed','2026-04-06 03:20:05',1,'2026-04-06 03:20:05','2026-04-06 03:20:09'),(224,12,92,300000.00,0.00,'confirmed','2026-04-10 03:29:24',1,'2026-04-10 03:29:24','2026-04-10 03:29:28'),(225,2,82,150000.00,0.00,'confirmed','2026-04-19 08:42:00',2,'2026-04-19 08:42:00','2026-04-20 14:24:37'),(226,3,99,150000.00,0.00,'confirmed','2026-05-01 09:48:48',1,'2026-05-01 09:48:48','2026-05-01 09:49:33'),(227,5,101,140000.00,0.00,'confirmed','2026-05-01 09:48:56',1,'2026-05-01 09:48:56','2026-05-01 09:49:32'),(228,9,105,100000.00,0.00,'confirmed','2026-05-01 09:49:06',1,'2026-05-01 09:49:06','2026-05-01 09:49:31'),(229,6,102,100000.00,0.00,'confirmed','2026-05-01 09:49:13',1,'2026-05-01 09:49:13','2026-05-01 09:49:30'),(230,15,111,150000.00,0.00,'confirmed','2026-05-01 09:49:24',1,'2026-05-01 09:49:24','2026-05-01 09:49:28'),(231,1,97,150000.00,0.00,'confirmed','2026-05-08 03:53:28',1,'2026-05-08 03:53:28','2026-05-08 03:54:33'),(232,4,100,150000.00,0.00,'confirmed','2026-05-08 03:53:36',1,'2026-05-08 03:53:36','2026-05-08 03:54:30'),(233,7,103,150000.00,0.00,'confirmed','2026-05-08 03:53:47',1,'2026-05-08 03:53:47','2026-05-08 03:54:28'),(234,12,108,300000.00,0.00,'confirmed','2026-05-08 03:53:56',1,'2026-05-08 03:53:56','2026-05-08 03:54:26'),(235,14,110,150000.00,0.00,'confirmed','2026-05-08 03:54:05',1,'2026-05-08 03:54:05','2026-05-08 03:54:24'),(236,13,109,150000.00,0.00,'confirmed','2026-05-08 03:54:17',1,'2026-05-08 03:54:17','2026-05-08 03:54:22'),(237,3,115,150000.00,0.00,'confirmed','2026-06-01 13:49:29',1,'2026-06-01 13:49:29','2026-06-01 13:50:30'),(238,5,117,140000.00,0.00,'confirmed','2026-06-01 13:49:37',1,'2026-06-01 13:49:37','2026-06-01 13:50:28'),(239,6,118,150000.00,0.00,'confirmed','2026-06-01 13:49:44',1,'2026-06-01 13:49:44','2026-06-01 13:50:26'),(240,9,121,100000.00,0.00,'confirmed','2026-06-01 13:49:55',1,'2026-06-01 13:49:55','2026-06-01 13:50:25'),(241,13,125,150000.00,0.00,'confirmed','2026-06-01 13:50:06',1,'2026-06-01 13:50:06','2026-06-01 13:50:23'),(242,15,127,150000.00,0.00,'confirmed','2026-06-01 13:50:15',1,'2026-06-01 13:50:15','2026-06-01 13:50:21'),(243,2,114,150000.00,0.00,'confirmed','2026-06-02 16:06:15',1,'2026-06-02 16:06:15','2026-06-02 16:06:19');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7rHASY2DmULRe5IRJ39du3YZVRV3ucr2jviOYHRV',1,'2402:8780:1071:d6f:c487:3a06:10c0:e70b','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT3lDUGthckI3OXNVUWlTZ09ITVhwbEJqaU1PZHZlRzk1Y1A3bXRzcyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwczovL3dhcmdhbmV0LndpamF5YW1lYXQuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1780416382),('bUwNR96aDrTKhT70pk3EcbH9waqvdQVKH64Rk7a3',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVGRkNXhwWDU1NlExdEd5T1JoY0VoSDAzclJrVDNYd2dPenZVSUtpbSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU2OiJsb2dpbl9tb29uc2hpbmVfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjM6InBhc3N3b3JkX2hhc2hfbW9vbnNoaW5lIjtzOjYwOiIkMnkkMTIkUVVwOTY4MjR5YjR4N3U0aVIwc2FtdWFraTlrdjVCMjFJT3Y0RXRtcTNSL1VGcVZPcHJNeXEiO30=',1780419447),('FFHGuqV4IBUO7NEuz01iwjZz8v19eDhXtax9nXve',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRWNLbVNURWhlR2dZNlk0OUg1dmdGYXZQazJ0VEtTSmdTdWt1YlBSTCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjgwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcmVzb3VyY2Uvc2lkZS1pbmNvbWUtcmVzb3VyY2Uvc2lkZS1pbmNvbWUtaW5kZXgtcGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTY6ImxvZ2luX21vb25zaGluZV81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMzoicGFzc3dvcmRfaGFzaF9tb29uc2hpbmUiO3M6NjA6IiQyeSQxMiRkc05qQ3NaTVlmeVpEVTdmRldGcmQuLjRyc1NwMEpIUTlrLnVnL3cuU0E2d2Y3TXhlOUdBMiI7fQ==',1780419252);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sideincomes`
--

DROP TABLE IF EXISTS `sideincomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sideincomes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sideincomes`
--

LOCK TABLES `sideincomes` WRITE;
/*!40000 ALTER TABLE `sideincomes` DISABLE KEYS */;
INSERT INTO `sideincomes` VALUES (1,'2025-03-02',500000.00,'PEMASANGAN PIPIH & KOJEK','2025-03-11 16:54:19','2025-03-11 17:01:09'),(2,'2025-04-20',250000.00,'Pemasangan ARI','2025-04-22 02:12:09','2025-04-22 02:12:09'),(3,'2025-12-20',450000.00,NULL,'2025-12-20 06:46:15','2025-12-20 06:46:15');
/*!40000 ALTER TABLE `sideincomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'IDUNG','asepsaidung@gmail.com',NULL,'$2y$12$YRjSc8xFOlly7ppFdFRSg.KOWt12geoEnliHB4oz5xLNSetQbtqdK',NULL,'2024-12-11 18:22:19','2026-06-02 09:25:27'),(2,'Prima js','primaprivate28@gmail.com',NULL,'$2y$12$ET.c/fJlc2cUxwO7nLquxOfuADYBVjeOpL0mUkhsc2/78NlRi3Wb6',NULL,'2024-12-12 10:48:34','2026-06-02 09:25:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `withdrawal_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `withdrawals_user_id_foreign` (`user_id`),
  CONSTRAINT `withdrawals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawals`
--

LOCK TABLES `withdrawals` WRITE;
/*!40000 ALTER TABLE `withdrawals` DISABLE KEYS */;
INSERT INTO `withdrawals` VALUES (1,1,15900000.00,'2024-12-12','saldo awal','2024-12-12 13:12:47','2024-12-12 13:12:47'),(2,2,16642500.00,'2024-12-12','saldo awal','2024-12-12 13:13:10','2024-12-12 13:13:10'),(3,2,150000.00,'2024-12-12','Dari arshad','2024-12-12 14:00:48','2024-12-12 14:00:48'),(4,2,150000.00,'2024-12-15','Ambil dari pembayaran  minang','2024-12-15 08:21:10','2024-12-15 08:21:10'),(5,1,600000.00,'2025-01-02','Modal kabel dan lain-lain','2025-01-06 04:39:12','2025-01-06 04:39:12'),(6,2,150000.00,'2025-01-22','Dari uang minang','2025-01-29 02:21:17','2025-01-29 02:21:17'),(7,2,150000.00,'2025-02-20','Dari payment minang','2025-02-20 11:40:52','2025-02-20 11:40:52'),(8,1,50000.00,'2025-03-02','DARI PEMASANGAN PIPIH & KOJEK','2025-03-05 02:17:47','2025-03-05 02:17:47'),(9,2,50000.00,'2025-03-02','DARI PEMASANGAN PIPIH & KOJEK','2025-03-05 02:18:07','2025-03-05 02:18:07'),(10,2,150000.00,'2025-03-16','Minang','2025-03-16 11:02:33','2025-03-16 11:02:33'),(11,2,150000.00,'2025-04-25',NULL,'2025-04-24 17:37:35','2025-04-24 17:37:35'),(12,2,50000.00,'2025-05-12','Kirim dana','2025-05-13 11:59:04','2025-05-13 11:59:04'),(13,2,200000.00,'2025-05-25','Teuing','2025-05-26 01:38:38','2025-05-26 01:38:38'),(15,1,1200000.00,'2025-05-31','rahasia','2025-05-30 16:42:58','2025-05-30 16:42:58'),(16,2,150000.00,'2025-06-20',NULL,'2025-06-21 00:05:41','2025-06-21 00:05:41'),(17,2,350000.00,'2025-06-21','Minang + cash 200','2025-06-21 11:03:35','2025-06-21 11:03:35'),(18,2,100000.00,'2025-06-28','Mancing','2025-07-01 04:25:54','2025-07-01 04:25:54'),(19,1,1500000.00,'2025-07-06','Ganti Oli Tune Up','2025-07-06 05:49:12','2025-07-06 05:49:12'),(20,2,200000.00,'2025-07-12','Badminton','2025-07-12 14:30:01','2025-07-12 14:30:01'),(21,2,100000.00,'2025-07-23',NULL,'2025-07-24 09:29:26','2025-07-24 09:29:26'),(22,2,150000.00,'2025-07-27',NULL,'2025-07-27 02:15:17','2025-07-27 02:15:17'),(23,2,100000.00,'2025-07-31','Dana','2025-07-31 00:38:14','2025-07-31 00:38:14'),(24,2,150000.00,'2025-08-31','dari uang minang','2025-08-31 17:24:54','2025-08-31 17:24:54'),(25,2,100000.00,'2025-09-26',NULL,'2025-09-27 02:14:58','2025-09-27 02:14:58'),(26,2,200000.00,'2025-10-10','Minang dan cash','2025-10-11 01:45:44','2025-10-11 01:45:44'),(27,2,1500000.00,'2025-10-20','Beli keramik','2025-10-20 08:46:25','2025-10-20 08:46:25'),(29,2,150000.00,'2025-12-01',NULL,'2025-12-02 08:50:20','2025-12-02 08:50:20'),(30,2,100000.00,'2026-01-01',NULL,'2026-01-01 11:21:58','2026-01-01 11:21:58'),(31,2,150000.00,'2026-01-21',NULL,'2026-01-22 02:17:45','2026-01-22 02:17:45'),(32,1,2000000.00,'2026-01-22','Meuli domba','2026-01-22 02:18:21','2026-01-22 02:18:21'),(33,2,200000.00,'2026-01-27','Tf dana','2026-01-27 02:59:47','2026-01-27 02:59:47'),(34,2,15000.00,'2026-02-24','timinang','2026-02-25 03:27:22','2026-02-25 03:27:22'),(35,2,500000.00,'2026-03-24','Meuli keramik','2026-03-24 03:19:02','2026-03-24 03:19:02'),(36,1,780000.00,'2026-03-23','Tambahan meuli ban','2026-03-24 03:19:32','2026-03-24 03:19:32'),(37,2,150000.00,'2026-04-20','Minang','2026-04-20 14:24:53','2026-04-20 14:24:53'),(38,1,1800000.00,'2026-05-04',NULL,'2026-05-08 03:55:33','2026-05-08 03:55:33');
/*!40000 ALTER TABLE `withdrawals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-03  0:10:16
