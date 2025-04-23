/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: gestionResto_app
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
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
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `commandes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned DEFAULT NULL,
  `table_id` bigint(20) unsigned DEFAULT NULL,
  `nomcli` varchar(255) NOT NULL,
  `unite` int(11) NOT NULL,
  `typecom` varchar(255) NOT NULL,
  `datecom` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_menu_id_foreign` (`menu_id`),
  KEY `commandes_table_id_foreign` (`table_id`),
  CONSTRAINT `commandes_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL,
  CONSTRAINT `commandes_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandes`
--

LOCK TABLES `commandes` WRITE;
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
INSERT INTO `commandes` VALUES
(1,4,6,'JULES',1,'Sur table','2024-08-17','2025-03-21 14:04:51','2025-03-21 14:04:51'),
(2,1,6,'JULES',1,'Sur table','2024-08-17','2025-03-21 14:06:05','2025-03-21 14:06:05'),
(3,7,NULL,'LIAM',2,'A emporter','2024-09-26','2025-03-21 14:07:18','2025-03-21 14:07:18'),
(4,15,7,'BEN',2,'Sur table','2024-09-26','2025-03-21 14:10:49','2025-03-21 14:10:49'),
(5,7,3,'WILL',1,'Sur table','2024-09-26','2025-03-21 14:12:18','2025-03-21 14:12:18'),
(6,2,3,'CELINE',1,'Sur table','2024-10-14','2025-03-21 14:14:41','2025-03-21 14:14:41'),
(7,3,3,'CELINE',1,'Sur table','2024-10-14','2025-03-21 14:16:04','2025-03-21 14:16:04'),
(8,5,3,'CELINE',1,'Sur table','2024-10-14','2025-03-21 14:17:11','2025-03-21 14:17:11'),
(9,11,3,'CELINE',3,'Sur table','2024-10-14','2025-03-21 14:17:47','2025-03-21 14:17:47'),
(10,8,NULL,'MARK',1,'A emporter','2024-12-05','2025-03-21 14:20:36','2025-03-21 14:20:36'),
(11,10,NULL,'MARK',10,'A emporter','2024-12-05','2025-03-21 14:22:02','2025-03-21 14:29:22'),
(12,1,8,'MARIE',2,'Sur table','2024-12-20','2025-03-21 14:26:42','2025-03-21 14:26:42'),
(13,11,8,'MARIE',3,'Sur table','2024-12-20','2025-03-21 14:27:38','2025-03-21 14:27:38'),
(14,10,7,'MARK',5,'Sur table','2024-12-20','2025-03-21 14:28:49','2025-03-21 14:28:49'),
(15,15,6,'REY',2,'Sur table','2025-02-09','2025-03-21 14:30:23','2025-03-21 14:30:23'),
(16,1,5,'SAM',2,'Sur table','2025-02-13','2025-03-21 14:32:43','2025-03-21 14:36:09'),
(17,6,5,'SAM',3,'Sur table','2025-02-13','2025-03-21 14:36:41','2025-03-21 14:36:41'),
(18,15,NULL,'JOHN',4,'A emporter','2025-02-28','2025-03-21 14:37:19','2025-03-21 14:37:19'),
(19,12,3,'KIM',3,'Sur table','2025-03-03','2025-03-21 14:38:11','2025-03-21 14:38:11'),
(20,14,NULL,'KIM',2,'A emporter','2025-03-03','2025-03-21 14:38:31','2025-03-21 14:38:31'),
(21,1,4,'JOHAN',2,'Sur table','2025-03-30','2025-03-30 14:10:07','2025-03-30 14:11:11'),
(22,1,3,'GI',4,'Sur table','2025-03-30','2025-03-30 14:24:14','2025-03-30 14:58:42'),
(23,5,6,'BARRY',2,'Sur table','2024-11-07','2025-04-22 14:55:31','2025-04-22 14:55:31'),
(24,14,4,'ERIC',3,'Sur table','2025-04-10','2025-04-22 15:08:39','2025-04-22 15:09:28');
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
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
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomplat` varchar(255) NOT NULL,
  `pu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES
(1,'Mine sao poulet',10000,'2025-03-20 15:16:50','2025-03-20 15:16:50'),
(2,'Spaghetti bolognaise',15000,'2025-03-20 15:17:13','2025-03-20 15:17:13'),
(3,'Riz contonais',10000,'2025-03-20 15:17:55','2025-03-20 15:17:55'),
(4,'Bol renverse',13000,'2025-03-20 15:18:11','2025-03-20 15:18:11'),
(5,'Frites',7000,'2025-03-20 15:18:25','2025-03-20 15:18:25'),
(6,'Cheeseburger',16000,'2025-03-20 15:18:48','2025-03-20 15:18:48'),
(7,'Pizza 4 fromages',23000,'2025-03-20 15:19:07','2025-03-20 15:19:07'),
(8,'Pizza fruits de mer',25000,'2025-03-20 15:19:29','2025-03-20 15:19:29'),
(9,'Salade cesar',10000,'2025-03-20 15:19:49','2025-03-20 15:19:49'),
(10,'Brochette de viandes',5000,'2025-03-20 15:20:15','2025-03-20 15:20:15'),
(11,'Jus naturel',1500,'2025-03-20 15:20:29','2025-03-20 15:20:29'),
(12,'Yaourt',3000,'2025-03-20 15:20:48','2025-03-20 15:20:48'),
(13,'Salade de fruits',5000,'2025-03-20 15:21:06','2025-03-20 15:21:06'),
(14,'Glaces',6000,'2025-03-20 15:21:16','2025-03-20 15:21:16'),
(15,'Gateaux',8000,'2025-03-20 15:21:29','2025-03-20 15:21:29');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_03_11_173901_create_menus_table',1),
(5,'2025_03_11_173951_create_tables_table',1),
(7,'2025_03_12_184704_create_reservers_table',1),
(8,'2025_03_12_184608_create_commandes_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `reservers`
--

DROP TABLE IF EXISTS `reservers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `table_id` bigint(20) unsigned DEFAULT NULL,
  `nomcli` varchar(255) NOT NULL,
  `date_de_reserv` datetime NOT NULL,
  `date_reserve` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservers_table_id_foreign` (`table_id`),
  CONSTRAINT `reservers_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservers`
--

LOCK TABLES `reservers` WRITE;
/*!40000 ALTER TABLE `reservers` DISABLE KEYS */;
INSERT INTO `reservers` VALUES
(1,6,'JULES','2025-03-21 03:54:20','2024-08-17 11:30:00','2025-03-21 00:54:20','2025-03-21 00:54:20'),
(2,3,'BEN','2025-03-21 03:57:22','2024-09-26 12:00:00','2025-03-21 00:55:20','2025-03-21 00:57:22'),
(3,3,'WILL','2025-03-21 03:56:10','2024-09-26 12:00:00','2025-03-21 00:56:10','2025-03-21 00:56:10'),
(4,3,'CELINE','2025-03-21 03:58:02','2024-10-24 14:00:00','2025-03-21 00:58:02','2025-03-21 00:58:02'),
(5,8,'MARIE','2025-03-21 03:58:54','2024-12-20 12:30:00','2025-03-21 00:58:54','2025-03-21 00:58:54'),
(6,7,'MARK','2025-03-21 04:00:04','2024-12-20 10:30:00','2025-03-21 01:00:04','2025-03-21 01:00:04'),
(7,6,'REY','2025-03-21 17:31:14','2025-02-09 13:00:00','2025-03-21 01:00:47','2025-03-21 14:31:14'),
(8,5,'SAM','2025-03-21 04:01:25','2025-02-13 13:00:00','2025-03-21 01:01:25','2025-03-21 01:01:25'),
(9,7,'KIM','2025-03-21 04:03:37','2025-03-03 13:30:00','2025-03-21 01:03:37','2025-03-21 01:03:37');
/*!40000 ALTER TABLE `reservers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES
('xiaiQT7rFNrK5NLFwdmFhXijaETIntGQz4FHApHh',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0','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',1745348486);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `occupation` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES
(1,'VIP_1',0,'2025-03-20 15:10:44','2025-04-19 14:50:31'),
(2,'VIP_2',0,'2025-03-20 15:11:04','2025-04-22 15:10:32'),
(3,'FAMILIALE_3',0,'2025-03-20 15:11:21','2025-04-22 15:10:23'),
(4,'FAMILIALE_4',0,'2025-03-20 15:11:34','2025-04-22 15:10:10'),
(5,'FAMILIALE_5',0,'2025-03-20 15:11:51','2025-03-30 14:29:28'),
(6,'2 Pers_6',0,'2025-03-20 15:12:12','2025-04-22 15:07:51'),
(7,'2 Pers_7',0,'2025-03-20 15:12:19','2025-03-30 14:52:35'),
(8,'2 Pers_8',0,'2025-03-20 15:12:31','2025-04-01 15:00:47'),
(9,'Privee_9',1,'2025-03-20 15:12:54','2025-03-20 15:12:54'),
(10,'Privee_10',1,'2025-03-20 15:13:11','2025-03-20 15:13:11');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-04-22 22:13:34
