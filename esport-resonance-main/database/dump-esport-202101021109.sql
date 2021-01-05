-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: esport
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `broadcasts`
--

DROP TABLE IF EXISTS `broadcasts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `broadcasts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broadcasts`
--

LOCK TABLES `broadcasts` WRITE;
/*!40000 ALTER TABLE `broadcasts` DISABLE KEYS */;
INSERT INTO `broadcasts` VALUES (1,'Lah','Indonesia','team-logo1-db102.png','RBQfEZ7us14','2021-01-01 05:46:35','2021-01-01 05:46:35'),(2,'Video 2','Indonesia','team-logo5-82b36.png','mRkPAG9tyLU','2021-01-01 06:10:11','2021-01-01 06:10:11'),(3,'Video 31','English','team-logo3-4af8b.png','mvQHVKGGkFU','2021-01-01 06:10:49','2021-01-01 06:10:49'),(4,'Laravel','Russian','team-logo1-14572.png','OPuEgyl2CoU','2021-01-01 06:29:28','2021-01-01 06:29:28');
/*!40000 ALTER TABLE `broadcasts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
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
-- Table structure for table `match_finishes`
--

DROP TABLE IF EXISTS `match_finishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_finishes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_finishes`
--

LOCK TABLES `match_finishes` WRITE;
/*!40000 ALTER TABLE `match_finishes` DISABLE KEYS */;
INSERT INTO `match_finishes` VALUES (1,'Half-time','2020-12-17 08:17:25','2020-12-17 08:17:25'),(2,'Full-time','2020-12-17 08:17:25','2020-12-17 08:17:25'),(3,'Penalties','2020-12-17 08:17:25','2020-12-17 08:17:25');
/*!40000 ALTER TABLE `match_finishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_groups`
--

DROP TABLE IF EXISTS `match_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) unsigned DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `match_groups_status_id_foreign` (`status_id`),
  CONSTRAINT `match_groups_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_groups`
--

LOCK TABLES `match_groups` WRITE;
/*!40000 ALTER TABLE `match_groups` DISABLE KEYS */;
INSERT INTO `match_groups` VALUES (1,'UEFA',1,'2020-12-17 08:21:56','2020-12-17 08:21:56'),(2,'FIFA 2019',2,'2021-01-01 09:02:13','2021-01-01 09:02:13');
/*!40000 ALTER TABLE `match_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_rounds`
--

DROP TABLE IF EXISTS `match_rounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_rounds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_rounds`
--

LOCK TABLES `match_rounds` WRITE;
/*!40000 ALTER TABLE `match_rounds` DISABLE KEYS */;
INSERT INTO `match_rounds` VALUES (1,'Penyisihan','2020-12-17 08:22:03','2020-12-17 08:22:03'),(2,'Quarter Final','2020-12-17 08:22:12','2020-12-17 08:22:12'),(3,'Semi Final','2020-12-17 08:22:16','2020-12-17 08:22:16'),(4,'Final','2020-12-17 08:22:20','2020-12-17 08:22:20');
/*!40000 ALTER TABLE `match_rounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_statuses`
--

DROP TABLE IF EXISTS `match_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_statuses`
--

LOCK TABLES `match_statuses` WRITE;
/*!40000 ALTER TABLE `match_statuses` DISABLE KEYS */;
INSERT INTO `match_statuses` VALUES (1,'Upcoming','2020-12-17 08:17:25','2020-12-17 08:17:25'),(2,'Live','2020-12-17 08:17:25','2020-12-17 08:17:25'),(3,'Finished','2020-12-17 08:17:25','2020-12-17 08:17:25');
/*!40000 ALTER TABLE `match_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `match_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stadium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_1` bigint(20) unsigned NOT NULL,
  `team_2` bigint(20) unsigned NOT NULL,
  `match_group_id` bigint(20) unsigned NOT NULL,
  `match_round_id` bigint(20) unsigned NOT NULL,
  `match_status_id` bigint(20) unsigned NOT NULL,
  `match_finish_id` bigint(20) unsigned DEFAULT NULL,
  `score_team_1` int(11) DEFAULT 0,
  `score_team_2` int(11) DEFAULT 0,
  `score_additional_team_1` int(11) DEFAULT 0,
  `score_additional_team_2` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matches_team_1_foreign` (`team_1`),
  KEY `matches_team_2_foreign` (`team_2`),
  KEY `matches_match_group_id_foreign` (`match_group_id`),
  KEY `matches_match_round_id_foreign` (`match_round_id`),
  KEY `matches_match_status_id_foreign` (`match_status_id`),
  KEY `matches_match_finish_id_foreign` (`match_finish_id`),
  CONSTRAINT `matches_match_finish_id_foreign` FOREIGN KEY (`match_finish_id`) REFERENCES `match_finishes` (`id`),
  CONSTRAINT `matches_match_group_id_foreign` FOREIGN KEY (`match_group_id`) REFERENCES `match_groups` (`id`),
  CONSTRAINT `matches_match_round_id_foreign` FOREIGN KEY (`match_round_id`) REFERENCES `match_rounds` (`id`),
  CONSTRAINT `matches_match_status_id_foreign` FOREIGN KEY (`match_status_id`) REFERENCES `match_statuses` (`id`),
  CONSTRAINT `matches_team_1_foreign` FOREIGN KEY (`team_1`) REFERENCES `teams` (`id`),
  CONSTRAINT `matches_team_2_foreign` FOREIGN KEY (`team_2`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (5,'2021-01-01','13:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,4,3,2,0,0,0,0,'broad-img-664a0.jpg',NULL,'2021-01-01 04:27:38','2021-01-01 04:27:38'),(6,'2021-01-02','19:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,3,3,3,0,0,5,4,'broad-img-8996c.jpg',NULL,'2021-01-01 04:27:57','2021-01-01 04:27:57'),(7,'2021-01-02','13:00:00','Jakarta','<p>desc</p>\r\n','GBK',2,1,1,2,2,2,0,0,0,0,'broad-img-86e20.jpg',NULL,'2021-01-01 04:28:16','2021-01-01 04:28:16'),(8,'2021-01-02','19:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,1,2,3,3,3,3,5,'broad-img-8996c.jpg',NULL,'2021-01-01 04:27:57','2021-01-01 04:27:57'),(9,'2021-01-02','19:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,4,1,3,0,0,4,5,'broad-img-8996c.jpg',NULL,'2021-01-01 04:27:57','2021-01-01 04:27:57'),(10,'2021-01-02','19:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,3,1,2,0,0,5,3,'broad-img-8996c.jpg',NULL,'2021-01-01 04:27:57','2021-01-01 04:27:57'),(11,'2021-01-02','19:00:00','Jakarta','<p>Desc</p>\r\n','GBK',1,2,1,2,1,3,0,0,5,4,'broad-img-8996c.jpg',NULL,'2021-01-01 04:27:57','2021-01-01 04:27:57');
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2020_12_17_101617_create_roles_table',1),(6,'2020_12_17_101700_add_role_to_users_table',1),(7,'2020_12_17_125228_create_news_categories_table',1),(8,'2020_12_17_130143_create_news_table',1),(9,'2020_12_17_132354_create_teams_table',1),(10,'2020_12_17_133926_add_phone_to_users_table',1),(11,'2020_12_17_135828_create_broadcasts_table',1),(12,'2020_12_17_141111_create_match_groups_table',1),(13,'2020_12_17_141137_create_match_rounds_table',1),(14,'2020_12_17_142044_create_match_statuses_table',1),(15,'2020_12_17_142635_create_match_finishes_table',1),(16,'2020_12_17_143221_create_matches_table',1),(17,'2020_12_17_152715_create_team_members_table',2),(18,'2021_01_01_154221_add_match_group_to_teams_table',3),(19,'2019_01_01_154418_create_statuses_table',4),(20,'2021_01_01_154703_add_status_to_match_groups_table',5),(21,'2021_01_01_234841_create_product_categories_table',6),(22,'2021_01_01_235542_create_products_table',7),(23,'2021_01_01_235841_create_product_cats_table',8),(24,'2021_01_02_000223_create_product_images_table',9),(25,'2021_01_02_011300_add_slug_to_products_table',10),(29,'2021_01_02_013516_create_product_buys_table',11),(30,'2021_01_02_031041_create_product_checkouts_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_category_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_news_category_id_foreign` (`news_category_id`),
  KEY `news_user_id_foreign` (`user_id`),
  CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Title News 1','title-news-1','<p>Contennya</p>\r\n\r\n<ol>\r\n	<li>Ketuhanan Yang Maha Esa</li>\r\n	<li>Kemanusiaan yang adil dan beradab</li>\r\n</ol>\r\n\r\n<p>asdsad</p>\r\n','Footbal, Sport','broad-img-0213c.jpg',2,4,'2021-01-01 03:38:32','2021-01-01 03:38:32'),(2,'Title News 2','title-news-2','<p>Contennya</p>\r\n\r\n<ol>\r\n	<li>Ketuhanan Yang Maha Esa</li>\r\n	<li>Kemanusiaan yang adil dan beradab</li>\r\n</ol>\r\n\r\n<p>asdsad</p>\r\n','Footbal, Sport','broad-img-0213c.jpg',2,4,'2021-01-01 03:38:32','2021-01-01 03:38:32'),(3,'Title News 3','title-news-3','<p>Contennya</p>\r\n\r\n<ol>\r\n	<li>Ketuhanan Yang Maha Esa</li>\r\n	<li>Kemanusiaan yang adil dan beradab</li>\r\n</ol>\r\n\r\n<p>asdsad</p>\r\n','Footbal, Sport','broad-img-0213c.jpg',1,4,'2021-01-01 03:38:32','2021-01-01 03:38:32'),(4,'Title News 4','title-news-4','<p>Contennya</p>\r\n\r\n<ol>\r\n	<li>Ketuhanan Yang Maha Esa</li>\r\n	<li>Kemanusiaan yang adil dan beradab</li>\r\n</ol>\r\n\r\n<p>asdsad</p>\r\n','Footbal, Sport','broad-img-0213c.jpg',1,4,'2021-01-01 03:38:32','2021-01-01 03:38:32'),(5,'Title News','title-news','<p>Contennya</p>\r\n\r\n<ol>\r\n	<li>Ketuhanan Yang Maha Esa</li>\r\n	<li>Kemanusiaan yang adil dan beradab</li>\r\n</ol>\r\n\r\n<p>asdsad</p>\r\n','Footbal, Sport','broad-img-0213c.jpg',1,4,'2021-01-01 03:38:32','2021-01-01 03:38:32'),(6,'Berita Terbaru','berita-terbaru','<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi iusto odio fugiat, mollitia praesentium, veritatis iste cumque eaque nihil sint odit dignissimos tempore asperiores voluptates, deserunt obcaecati vero velit! Adipisci?</p>\r\n','Tag Pertama, Kedua, Ketiga','broad-img-ab2fa.jpg',2,4,'2021-01-01 06:49:46','2021-01-01 06:49:46');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;
INSERT INTO `news_categories` VALUES (1,'Highlight','highlight',NULL,'2021-01-01 03:37:16'),(2,'Soccer','soccer',NULL,'2021-01-01 05:22:40');
/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_buys`
--

DROP TABLE IF EXISTS `product_buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_buys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_buys_user_id_foreign` (`user_id`),
  KEY `product_buys_product_id_foreign` (`product_id`),
  CONSTRAINT `product_buys_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_buys`
--

LOCK TABLES `product_buys` WRITE;
/*!40000 ALTER TABLE `product_buys` DISABLE KEYS */;
INSERT INTO `product_buys` VALUES (1,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','xs','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(2,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','s','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(3,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','m','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(4,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','l','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(5,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','xl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(6,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','green','xxl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(7,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','xs','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(8,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','s','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(9,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','m','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(10,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','l','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(11,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','xl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(12,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','black','xxl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(13,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','xs','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(14,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','s','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(15,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','m','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(16,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','l','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(17,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','xl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(18,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,1,'50000','3','150000','purple','xxl','1','2021-01-01 20:36:25','2021-01-01 20:37:21'),(19,NULL,2,1,'50000','1','50000','green','xs','0','2021-01-01 20:41:04','2021-01-01 20:41:04');
/*!40000 ALTER TABLE `product_buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Resonance Brands','resonance-brands',NULL,'2021-01-01 17:09:01'),(2,'Men\'s Clothing','mens-clothing',NULL,'2021-01-01 17:09:19'),(3,'Women\'s Clothing','womens-clothing',NULL,'2021-01-01 17:09:25');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_cats`
--

DROP TABLE IF EXISTS `product_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_cats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `product_category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_cats_product_id_foreign` (`product_id`),
  KEY `product_cats_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `product_cats_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_cats_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_cats`
--

LOCK TABLES `product_cats` WRITE;
/*!40000 ALTER TABLE `product_cats` DISABLE KEYS */;
INSERT INTO `product_cats` VALUES (1,1,2),(2,2,2),(3,2,3),(4,1,3);
/*!40000 ALTER TABLE `product_cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_checkouts`
--

DROP TABLE IF EXISTS `product_checkouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_checkouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibayar` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_checkouts_user_id_foreign` (`user_id`),
  CONSTRAINT `product_checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_checkouts`
--

LOCK TABLES `product_checkouts` WRITE;
/*!40000 ALTER TABLE `product_checkouts` DISABLE KEYS */;
INSERT INTO `product_checkouts` VALUES (1,'EwMe1yFHob1NUV9zhMCp3yqpVOhbZ8',2,'Reza','Nurfachmi','aaezha@gmail.com','08898','Indonesia','Wonosobo','0898','Catatnnya',NULL,NULL,NULL,'2700000','0','2021-01-01 20:37:21','2021-01-01 20:37:21');
/*!40000 ALTER TABLE `product_checkouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (4,2,'team-logo5-e1c38.png',NULL,NULL),(5,2,'team-logo4-b11c4.png',NULL,NULL),(6,2,'team-logo2-1bc1e.png',NULL,NULL),(7,2,'team-logo3-80d77.png',NULL,NULL),(8,2,'team-logo1-39f0c.png',NULL,NULL),(10,1,'product-main-img.jpg',NULL,NULL),(11,1,'product-main-img-a4b80.jpg',NULL,NULL),(12,1,'product-main-img-564c5.jpg',NULL,NULL),(13,1,'product-main-img-74207.jpg',NULL,NULL),(14,1,'octocat-53ae3.png',NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Kaos Pria','kaos-pria','8989-9989','50000','<p>Deskripsi</p>\r\n','Kaos, Pria','octocat-dd784.png',NULL,'2021-01-01 18:14:45'),(2,'Celana','celana','978','150000','<p>Celana panjang</p>\r\n','Celana,Panjang,Pria,Wanita','team-logo3-bb81c.png',NULL,'2021-01-01 18:14:48');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','2020-12-17 08:17:25','2020-12-17 08:17:25'),(2,'Member','2020-12-17 08:17:25','2020-12-17 08:17:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Aktif',NULL,NULL),(2,'Tidak Aktif',NULL,NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_members_team_id_foreign` (`team_id`),
  CONSTRAINT `team_members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (1,'Syalal',1,'2020-12-17 08:31:09','2020-12-17 08:31:09'),(2,'Adi',1,'2020-12-17 08:31:13','2020-12-17 08:31:13'),(3,'Akbar (GK)',2,'2020-12-17 08:31:21','2020-12-17 08:31:21');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_group_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_foreign` (`user_id`),
  KEY `teams_match_group_id_foreign` (`match_group_id`),
  CONSTRAINT `teams_match_group_id_foreign` FOREIGN KEY (`match_group_id`) REFERENCES `match_groups` (`id`) ON DELETE SET NULL,
  CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Arsenal','team-logo5-b9832.png',1,3,'2020-12-17 08:20:39','2020-12-17 08:20:39'),(2,'Indonesia','team-logo4.png',1,2,'2020-12-17 08:20:52','2020-12-17 08:20:52'),(7,'Indonesia Raya','team-logo3-84ca5.png',1,4,'2021-01-01 08:54:32','2021-01-01 08:54:32');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Company','admin@gmail.com',NULL,1,NULL,'$2y$10$IWAEYF8Vzd7oN5tRcHGV2epJs4OmT5qha4/FoIHOSdGUkxL8.zilm',NULL,NULL,'B1sHqcePspXelpzX5aMOqA6GjFi1fq0VfdeVuHNOtlOuVARxQTS3yaUL8SFm','2020-12-17 08:17:25','2021-01-01 21:08:08'),(2,'Member','Last','member@gmail.com','0812',2,NULL,'$2y$10$xR/2k9Utm7Eokgeb1.A00uoAoiaWi5PI2BSHv4zqttQXoyt4m1Tia',NULL,NULL,'ZxTUqUi4aGJeK3yUabF4vSXHHkGR5Q1qCWxEPe8lVe6vf05Smd5G8iOYMoWQ','2020-12-17 08:20:24','2020-12-17 08:20:24'),(3,'Member','Lagi','member2@gmail.com','0898',2,NULL,'$2y$10$YbbP/.EF8l6w4ne7LdAer.GYX0mGFipge5qxkBXED4uLGP6Pzu6HC',NULL,NULL,'c9VdpeO94Da2V6umOKBlV8tbeaOcpgmtcIy79rLiaNMIG7HUkbW2UaKasIPt','2021-01-01 03:34:19','2021-01-01 03:34:19'),(4,'Member','Lagi','member3@gmail.com',NULL,2,NULL,'$2y$10$pJh8UP3pgEx4qxboh7dJY.W1li5rpzJzOloUEwsMF9e7ZPJo.NWhO',NULL,NULL,NULL,'2021-01-01 03:35:21','2021-01-01 03:35:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'esport'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-02 11:09:46
