# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: homestead
# Generation Time: 2017-07-28 02:41:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table data_points
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_points`;

CREATE TABLE `data_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `metric_id` int(10) unsigned NOT NULL,
  `date_value` date DEFAULT NULL,
  `integer_value` int(11) DEFAULT NULL,
  `decimal_value` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_points_metric_id_foreign` (`metric_id`),
  CONSTRAINT `data_points_metric_id_foreign` FOREIGN KEY (`metric_id`) REFERENCES `metrics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_points` WRITE;
/*!40000 ALTER TABLE `data_points` DISABLE KEYS */;

INSERT INTO `data_points` (`id`, `created_at`, `updated_at`, `deleted_at`, `metric_id`, `date_value`, `integer_value`, `decimal_value`)
VALUES
	(1,'2017-07-27 05:37:48','2017-07-27 05:46:54',NULL,4,'2017-07-02',NULL,1.00),
	(2,'2017-07-27 05:38:02','2017-07-27 05:47:03',NULL,4,'2017-07-03',NULL,2.00),
	(3,'2017-07-27 05:39:52','2017-07-28 02:40:00','2017-07-28 02:40:00',3,'2017-07-02',4,NULL),
	(4,'2017-07-27 05:40:02','2017-07-28 02:39:07','2017-07-28 02:39:07',3,'2017-07-03',12,NULL),
	(5,'2017-07-27 05:43:37','2017-07-28 02:28:33',NULL,2,'2017-07-02',NULL,13.45),
	(6,'2017-07-27 05:43:54','2017-07-28 02:36:59',NULL,1,'2017-07-03',12,NULL),
	(7,'2017-07-27 05:47:37','2017-07-28 02:13:32',NULL,2,'2017-07-03',NULL,8.90),
	(8,'2017-07-27 05:47:54','2017-07-28 02:36:17',NULL,1,'2017-07-06',8,NULL),
	(9,'2017-07-27 06:10:49','2017-07-27 06:10:49',NULL,4,'2017-07-02',NULL,5.50),
	(10,'2017-07-27 06:22:38','2017-07-28 02:40:00','2017-07-28 02:40:00',3,'2017-07-02',11,NULL),
	(11,'2017-07-27 06:22:50','2017-07-28 02:40:00','2017-07-28 02:40:00',3,'2017-07-03',22,NULL),
	(12,'2017-07-27 06:23:44','2017-07-27 06:24:18',NULL,5,'2017-07-06',6,NULL),
	(13,'2017-07-27 06:28:39','2017-07-27 06:28:39',NULL,5,'2017-07-04',4,NULL),
	(14,'2017-07-27 06:29:00','2017-07-28 02:27:48',NULL,4,'2017-07-04',NULL,23.35),
	(15,'2017-07-28 02:38:44','2017-07-28 02:40:00','2017-07-28 02:40:00',3,'2017-07-03',1,NULL);

/*!40000 ALTER TABLE `data_points` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table metrics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `metrics`;

CREATE TABLE `metrics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `metrics` WRITE;
/*!40000 ALTER TABLE `metrics` DISABLE KEYS */;

INSERT INTO `metrics` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `data_type`)
VALUES
	(1,'2017-07-27 05:14:00','2017-07-27 05:14:00',NULL,'Support Calls','integer'),
	(2,'2017-07-27 05:14:27','2017-07-27 05:14:27',NULL,'Fiber Expense','decimal'),
	(3,'2017-07-27 05:15:12','2017-07-28 02:40:00','2017-07-28 02:40:00','QA','integer'),
	(4,'2017-07-27 05:15:21','2017-07-28 02:16:21',NULL,'Copper Cable','decimal'),
	(5,'2017-07-27 06:23:26','2017-07-28 02:16:27',NULL,'Gas','integer'),
	(6,'2017-07-28 02:26:11','2017-07-28 02:26:11',NULL,'nothing','integer');

/*!40000 ALTER TABLE `metrics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(13,'2014_10_12_000000_create_users_table',1),
	(14,'2014_10_12_100000_create_password_resets_table',1),
	(15,'2017_07_26_021415_create_metrics_table',1),
	(16,'2017_07_26_021424_create_data_points_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
