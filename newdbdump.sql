/*
SQLyog Community v12.13 (64 bit)
MySQL - 5.6.26 : Database - legacy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cell` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`office_id`,`title_id`,`specialty_id`,`name`,`email`,`protected`,`created_at`,`updated_at`,`phone`,`cell`,`fax`,`published`,`bio`) values (1,1,1,1,'Nathon Shultz','nashultz07@gmail.com',1,'2016-01-22 22:01:32','2016-01-23 01:29:26','5019089587','','',0,'I am the web developer.');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `images` */

insert  into `images`(`id`,`imageable_id`,`imageable_type`,`name`,`created_at`,`updated_at`) values (1,1,'Legacy\\Listing','image1.jpg','2016-01-20 23:46:03','0000-00-00 00:00:00'),(16,5,'Legacy\\Listing','5.dsc-0006.jpg','2016-01-25 20:37:08','2016-01-25 20:37:08');

/*Table structure for table `listing_cities` */

DROP TABLE IF EXISTS `listing_cities`;

CREATE TABLE `listing_cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_cities` */

insert  into `listing_cities`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 15:34:33','2016-01-25 15:34:33','Conway'),(2,'2016-01-25 15:34:46','2016-01-25 15:34:46','Vilonia'),(3,'2016-01-25 15:34:54','2016-01-25 15:34:54','Greenbrier'),(4,'2016-01-25 15:35:05','2016-01-25 15:35:05','Little Rock'),(5,'2016-01-25 15:35:15','2016-01-25 15:35:15','North Little Rock'),(6,'2016-01-25 17:00:08','2016-01-25 17:00:08','Plumerville'),(7,'2016-01-25 17:00:22','2016-01-25 17:00:22','Morrilton');

/*Table structure for table `listing_counties` */

DROP TABLE IF EXISTS `listing_counties`;

CREATE TABLE `listing_counties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_counties` */

insert  into `listing_counties`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 15:30:38','2016-01-25 15:30:38','Arkansas'),(2,'2016-01-25 15:30:48','2016-01-25 15:30:48','Ashley'),(3,'2016-01-25 15:30:57','2016-01-25 15:30:57','Baxter'),(4,'2016-01-25 15:31:05','2016-01-25 15:31:05','Benton'),(5,'2016-01-25 15:31:14','2016-01-25 15:31:14','Boone'),(6,'2016-01-25 15:31:25','2016-01-25 15:31:25','Bradley'),(7,'2016-01-25 15:31:36','2016-01-25 15:31:36','Calhoun'),(8,'2016-01-25 15:31:45','2016-01-25 15:31:45','Carroll'),(9,'2016-01-25 15:32:02','2016-01-25 15:32:02','Chicot'),(10,'2016-01-25 15:32:10','2016-01-25 15:32:10','Clark'),(11,'2016-01-25 15:32:19','2016-01-25 15:32:19','Clay'),(12,'2016-01-25 15:32:29','2016-01-25 15:32:29','Clebourne'),(13,'2016-01-25 15:32:41','2016-01-25 15:32:41','Cleveland'),(14,'2016-01-25 15:32:53','2016-01-25 15:32:53','Colombia'),(15,'2016-01-25 15:33:02','2016-01-25 15:33:02','Conway'),(16,'2016-01-25 15:33:13','2016-01-25 15:33:13','Craighead'),(17,'2016-01-25 15:33:22','2016-01-25 15:33:22','Crawford'),(18,'2016-01-25 15:33:33','2016-01-25 15:33:33','Crittenden'),(19,'2016-01-25 15:33:41','2016-01-25 15:33:41','Cross'),(20,'2016-01-25 15:33:49','2016-01-25 15:33:49','Dallas'),(21,'2016-01-25 15:33:57','2016-01-25 15:33:57','Desha'),(22,'2016-01-25 15:34:09','2016-01-25 15:34:09','Drew'),(23,'2016-01-25 15:34:19','2016-01-25 15:34:19','Faulkner'),(24,'2016-01-25 16:40:20','2016-01-25 16:40:20','Franklin'),(25,'2016-01-25 16:40:29','2016-01-25 16:40:29','Fulton'),(26,'2016-01-25 16:40:43','2016-01-25 16:40:43','Garland'),(27,'2016-01-25 16:40:56','2016-01-25 16:40:56','Grant'),(28,'2016-01-25 16:41:28','2016-01-25 16:41:28','Green'),(29,'2016-01-25 16:41:49','2016-01-25 16:41:49','Hempstead'),(30,'2016-01-25 16:41:58','2016-01-25 16:41:58','Hot Spring'),(31,'2016-01-25 16:42:08','2016-01-25 16:42:08','Howard'),(32,'2016-01-25 16:42:18','2016-01-25 16:42:18','Independence'),(33,'2016-01-25 16:42:29','2016-01-25 16:42:29','Izard'),(34,'2016-01-25 16:42:37','2016-01-25 16:42:37','Jackson'),(35,'2016-01-25 16:42:48','2016-01-25 16:42:48','Jefferson'),(36,'2016-01-25 16:42:59','2016-01-25 16:42:59','Johnson'),(37,'2016-01-25 16:43:14','2016-01-25 16:43:14','Lafayette'),(38,'2016-01-25 16:43:24','2016-01-25 16:43:24','Lawrence'),(39,'2016-01-25 16:43:32','2016-01-25 16:43:32','Lee'),(40,'2016-01-25 16:43:44','2016-01-25 16:43:44','Lincoln'),(41,'2016-01-25 16:43:58','2016-01-25 16:43:58','Little River'),(42,'2016-01-25 16:44:08','2016-01-25 16:44:08','Logan'),(43,'2016-01-25 16:44:19','2016-01-25 16:44:19','Lonoke'),(44,'2016-01-25 16:44:28','2016-01-25 16:44:28','Madison'),(45,'2016-01-25 16:44:39','2016-01-25 16:44:39','Marion'),(46,'2016-01-25 16:44:48','2016-01-25 16:44:48','Miller'),(47,'2016-01-25 16:45:01','2016-01-25 16:45:01','Mississippi'),(48,'2016-01-25 16:45:18','2016-01-25 16:45:18','Monroe'),(49,'2016-01-25 16:45:31','2016-01-25 16:45:31','Montgomery'),(50,'2016-01-25 16:45:39','2016-01-25 16:45:39','Nevada'),(51,'2016-01-25 16:45:48','2016-01-25 16:45:48','Newton'),(52,'2016-01-25 16:46:07','2016-01-25 16:46:07','Ouachita'),(53,'2016-01-25 16:46:18','2016-01-25 16:46:18','Perry'),(54,'2016-01-25 16:46:30','2016-01-25 16:46:30','Phillips'),(55,'2016-01-25 16:46:38','2016-01-25 16:46:38','Pike'),(56,'2016-01-25 16:46:56','2016-01-25 16:46:56','Poinsett'),(57,'2016-01-25 16:47:06','2016-01-25 16:47:06','Polk'),(58,'2016-01-25 16:47:14','2016-01-25 16:47:14','Pope'),(59,'2016-01-25 16:47:27','2016-01-25 16:47:27','Praire'),(60,'2016-01-25 16:47:36','2016-01-25 16:47:36','Pulaski'),(61,'2016-01-25 16:47:52','2016-01-25 16:47:52','Randolph'),(62,'2016-01-25 16:48:07','2016-01-25 16:48:07','St. Francis'),(63,'2016-01-25 16:48:17','2016-01-25 16:48:17','Saline'),(64,'2016-01-25 16:48:30','2016-01-25 16:48:30','Scott'),(65,'2016-01-25 16:48:42','2016-01-25 16:48:42','Searcy'),(66,'2016-01-25 16:48:54','2016-01-25 16:48:54','Sebastian'),(67,'2016-01-25 16:49:05','2016-01-25 16:49:05','Sevier'),(68,'2016-01-25 16:49:14','2016-01-25 16:49:14','Sharp'),(69,'2016-01-25 16:49:22','2016-01-25 16:49:22','Stone'),(70,'2016-01-25 16:49:31','2016-01-25 16:49:31','Union\''),(71,'2016-01-25 16:49:32','2016-01-25 16:49:32','Union'),(72,'2016-01-25 16:49:44','2016-01-25 16:49:44','Van Buren'),(73,'2016-01-25 16:49:54','2016-01-25 16:49:54','Washington'),(74,'2016-01-25 16:50:05','2016-01-25 16:50:05','White'),(75,'2016-01-25 16:50:15','2016-01-25 16:50:15','Woodruff'),(76,'2016-01-25 16:50:25','2016-01-25 16:50:25','Yell');

/*Table structure for table `listing_states` */

DROP TABLE IF EXISTS `listing_states`;

CREATE TABLE `listing_states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_states` */

insert  into `listing_states`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 15:35:48','2016-01-25 15:35:48','Alabama'),(2,'2016-01-25 15:35:56','2016-01-25 15:35:56','Alaska'),(3,'2016-01-25 15:36:06','2016-01-25 15:36:06','Arizona'),(4,'2016-01-25 15:36:14','2016-01-25 15:36:14','Arkansas'),(5,'2016-01-25 15:36:25','2016-01-25 15:36:25','California'),(6,'2016-01-25 16:52:14','2016-01-25 16:52:14','Colorado'),(7,'2016-01-25 16:52:25','2016-01-25 16:52:25','Connecticut'),(8,'2016-01-25 16:52:35','2016-01-25 16:52:35','Delaware'),(9,'2016-01-25 16:52:46','2016-01-25 16:52:46','Florida'),(10,'2016-01-25 16:52:56','2016-01-25 16:52:56','Georgia'),(11,'2016-01-25 16:53:29','2016-01-25 16:53:29','Hawaii'),(12,'2016-01-25 16:53:44','2016-01-25 16:53:44','Idaho'),(13,'2016-01-25 16:53:54','2016-01-25 16:53:54','Illinois'),(14,'2016-01-25 16:54:04','2016-01-25 16:54:04','Indiana'),(15,'2016-01-25 16:54:12','2016-01-25 16:54:12','Iowa'),(16,'2016-01-25 16:54:20','2016-01-25 16:54:20','Kansas'),(17,'2016-01-25 16:54:29','2016-01-25 16:54:29','Kentucky'),(18,'2016-01-25 16:55:25','2016-01-25 16:55:25','Louisiana'),(19,'2016-01-25 16:55:31','2016-01-25 16:55:31','Maine'),(20,'2016-01-25 16:55:39','2016-01-25 16:55:39','Maryland'),(21,'2016-01-25 16:55:49','2016-01-25 16:55:49','Massachusetts'),(22,'2016-01-25 16:55:56','2016-01-25 16:55:56','Michigan'),(23,'2016-01-25 16:56:03','2016-01-25 16:56:03','Minnesota'),(24,'2016-01-25 16:56:11','2016-01-25 16:56:11','Mississippi'),(25,'2016-01-25 16:56:18','2016-01-25 16:56:18','Missouri'),(26,'2016-01-25 16:56:23','2016-01-25 16:56:23','Montana'),(27,'2016-01-25 16:56:29','2016-01-25 16:56:29','Nebraska'),(28,'2016-01-25 16:56:34','2016-01-25 16:56:34','Nevada'),(29,'2016-01-25 16:56:43','2016-01-25 16:56:43','New Hampshire'),(30,'2016-01-25 16:56:50','2016-01-25 16:56:50','New Jersey'),(31,'2016-01-25 16:56:57','2016-01-25 16:56:57','New Mexico'),(32,'2016-01-25 16:57:03','2016-01-25 16:57:03','New York'),(33,'2016-01-25 16:57:11','2016-01-25 16:57:11','North Carolina'),(34,'2016-01-25 16:57:19','2016-01-25 16:57:19','North Dakota'),(35,'2016-01-25 16:57:24','2016-01-25 16:57:24','Ohio'),(36,'2016-01-25 16:57:31','2016-01-25 16:57:31','Oklahoma'),(37,'2016-01-25 16:57:37','2016-01-25 16:57:37','Oregon'),(38,'2016-01-25 16:57:45','2016-01-25 16:57:45','Pennsylvania'),(39,'2016-01-25 16:57:52','2016-01-25 16:57:52','Rhode Island'),(40,'2016-01-25 16:58:00','2016-01-25 16:58:00','South Carolina'),(41,'2016-01-25 16:58:06','2016-01-25 16:58:06','South Dakota'),(42,'2016-01-25 16:58:13','2016-01-25 16:58:13','Tennessee'),(43,'2016-01-25 16:58:19','2016-01-25 16:58:19','Texas'),(44,'2016-01-25 16:58:24','2016-01-25 16:58:24','Utah'),(45,'2016-01-25 16:58:29','2016-01-25 16:58:29','Vermont'),(46,'2016-01-25 16:58:35','2016-01-25 16:58:35','Virginia'),(47,'2016-01-25 16:58:41','2016-01-25 16:58:41','Washington'),(48,'2016-01-25 16:58:48','2016-01-25 16:58:48','West Virginia'),(49,'2016-01-25 16:58:53','2016-01-25 16:58:53','Wisconsin'),(50,'2016-01-25 16:59:01','2016-01-25 16:59:01','Wyoming');

/*Table structure for table `listing_statuses` */

DROP TABLE IF EXISTS `listing_statuses`;

CREATE TABLE `listing_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_statuses` */

insert  into `listing_statuses`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 14:47:41','2016-01-25 15:38:37','Available'),(2,'2016-01-25 15:38:48','2016-01-25 15:38:48','Pending'),(3,'2016-01-25 15:38:56','2016-01-25 15:38:56','Sold'),(4,'2016-01-25 15:39:04','2016-01-25 15:39:04','Reduced');

/*Table structure for table `listing_subtypes` */

DROP TABLE IF EXISTS `listing_subtypes`;

CREATE TABLE `listing_subtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_subtypes` */

insert  into `listing_subtypes`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 15:37:49','2016-01-25 15:37:49','Land'),(2,'2016-01-25 15:37:56','2016-01-25 15:37:56','Home'),(3,'2016-01-25 15:38:06','2016-01-25 15:38:06','Apartments');

/*Table structure for table `listing_types` */

DROP TABLE IF EXISTS `listing_types`;

CREATE TABLE `listing_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing_types` */

insert  into `listing_types`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-25 15:36:38','2016-01-25 15:36:38','Residential');

/*Table structure for table `listings` */

DROP TABLE IF EXISTS `listings`;

CREATE TABLE `listings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `status_id` tinyint(4) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL DEFAULT '1',
  `county_id` int(11) NOT NULL DEFAULT '1',
  `state_id` int(11) NOT NULL DEFAULT '1',
  `zipcode` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `subtype_id` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL,
  `mlsno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yearbuilt` int(11) DEFAULT NULL,
  `googlemap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listings` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_01_14_131653_create_listings_table',1),('2016_01_14_234108_create_images_table',1),('2016_01_15_220155_create_testimonies_table',1),('2016_01_16_124401_create_pages_table',1),('2016_01_18_210513_add_template_column_to_pages_table',1),('2016_01_18_213719_add_order_columns_to_pages_table',2),('2016_01_20_004239_add_last_login_at_column_to_users',3),('2016_01_22_021228_create_employees_table',4),('2016_01_22_231708_create_titles_table',5),('2016_01_22_231739_create_specialties_table',5),('2016_01_22_231754_create_offices_table',5),('2016_01_25_120834_create_listing_statuses_table',6),('2016_01_25_120848_create_listing_types_table',6),('2016_01_25_120907_create_listing_subtypes_table',6),('2016_01_25_120923_create_listing_cities_table',6),('2016_01_25_120940_create_listing_states_table',6),('2016_01_25_120955_create_listing_counties_table',6);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`created_at`,`updated_at`,`name`,`address`,`city`,`state`,`zip`) values (1,'2016-01-23 01:02:57','2016-01-23 01:02:57','Legacy Realty Main','2115 Washington Ave','Conway','AR','72032');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `template` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title`,`name`,`uri`,`content`,`created_at`,`updated_at`,`template`,`parent_id`,`lft`,`rgt`,`depth`) values (6,'Buyers','buyers','#','Filler page.','2016-01-21 19:12:51','2016-01-21 19:12:51',NULL,NULL,1,6,0),(7,'Life In Conway','conway-life','conway-life','### Life In Conway\r\n\r\n[Conway](http://www.conwayark.com) is located about 30 miles north of Little Rock on I-40. The Arkansas River bounds Conway on the west, Lake Conway, an Arkansas Game and Fish reservoir, lies to the south-east, and city-owned Beaverfork Lake lies northeast of Conway.\r\n\r\nConway is the county seat and, with a population of 52,430, the largest city in Faulkner County, Arkansas. A frequent stop for travelers on their way to Branson, it has become known as the \"Gateway to the Ozarks\". Home to three higher education institutions, it has also earned the nickname of \"The City of Colleges\".\r\n\r\nConway offers many opportunities for cultural diversity. The [Conway Symphony Orchestra](http://www.conwaysymphony.com) performs many times throughout the year, and [Conway Community Arts Association](http://www.conwayarts.org/) has been presenting theatre and other art opportunities to the community for thirty years. There are also many art, music and theatre opportunities provided by Conway\'s colleges.\r\n\r\nConway is home to the annual [Toad Suck Daze Festival](http://toadsuck.org/) traditionally held in downtown Conway the first weekend of May. The family oriented festival is free to the public, and attendance is over 150,000 every year. The festival features arts & crafts, food, local and national entertainment, carnival rides, Tour de Toad bicycle race, Toad Kids Zone, Toad Jam Basketball tournament, Toad Run 5/10K, Toad Pageant, Business Expo, Stuck on a Truck, a Toad Store, and World Famous Toad Races held in the Toad Dome!\r\n\r\nThere are numerous lakes and parks in and near Conway for fishing, camping, swimming, picnicing, canoeing and other family fun. [Lake Conway](http://www.arkansas.com/outdoors/water-activities/lakes-rivers/lake.aspx?id=4) spans 6,700 acres and is the largest Game and Fish Commission lake. It offers some of the best catfish, crappie, bream and bass fishing anywere in Arkansas. [The Game and Fish Commission](http://www.agfc.com/Pages/default.aspx) maintains several free public launch areas and boat rentals are available at commerical docks. [Lake Beaverfork](http://www.arkansas.com/outdoors/water-activities/lakes-rivers/lake.aspx?id=88), [Wooly Hollow State Park](http://www.arkansasstateparks.com/woollyhollow/), and Toad Suck Park are also popular for family outings.\r\n\r\nFor golfers there are three private 18-hole courses available to members and their guests. Courses are located at [Conway Country Club](http://www.conwaycountryclub.com/), Cadron Valley Country Club, and [Centennial Valley Country Club](http://www.centennialvalleygolfac.com/).\r\n\r\nConway, Arkansas, a great place to raise your family and call home.','2016-01-22 00:33:20','2016-01-22 00:33:20','page',6,2,3,1),(8,'Local Attractions','local-attractions','local-attractions','### Local Attractions\r\n\r\n* [City of Conway](http://www.cityofconway.org/home/)\r\n* [Conway Chamber of Commerce](http://www.conwaychamber.org/)\r\n* [Conway Schools](http://www.conwayschools.org/)\r\n* [Faulkner County Schools](http://www.k12academics.com/national-directories/school-district/Arkansas/Faulkner#.VqHRjSorJjU)','2016-01-22 00:54:35','2016-01-22 00:54:35','page',6,4,5,1),(9,'Owners','owners','##','Filler page.','2016-01-21 19:14:49','2016-01-21 19:14:49',NULL,NULL,7,10,0),(10,'Owner Services','ownerservices','ownerservices','### Owner Services\r\n\r\nLegacy Realty is a Full Service firm that understands the financial goals of our clients. Our main objective is to make sure every client is 100% satisfied with our property management services. Our success is attributed to an experienced work force, customer services, and business ethics which stand above our competitors.\r\n\r\nAt Legacy Realty we don’t just sell homes; we implement a set of necessary services that provide our clients with outstanding service and peace of mind when they trust us with their property. At Legacy we provide a set of services that are unparalleled in our industry. Following these strict guidelines that we have created ensure that your experience with our Company is flawless.\r\n\r\n#### Marketing\r\n  \r\nThere are three keys to successful marketing of your property.\r\n\r\n* Print Campaign\r\n* Internet Marketing Campaign\r\n* Direct Marketing Campaign\r\n\r\nOur marketing campaign weaves these three approaches into one coordinated program, assuring the client receives the highest value from our advertising budget. Legacy monitors these campaigns closely to maximize the number of qualified tenants we can attract. We also cooperate and network with Real Estate agents in the area offering them a finders fee should they have a potential tenant.\r\n\r\n#### Strategic Planning\r\n\r\nAt Legacy we concisely plan and execute to meet the needs of our clients. At the beginning of each year we analyze our marketing efforts and budget to assess where we are receiving the most calls and potential tenants. We also analyze our maintanance agreements to make sure that we are getting the best deal for our clients during the move in move out process. We also want to evaluate your business philosophies and goals for the coming year.\r\n\r\n#### Customer Service\r\n\r\nCustomer service is key to making the property management and tenant leasing a pleasant experience. We are prepared for every situation relating to the management of your property. What you can expect from Legacy Property Management is continuity and a depth of expertise that provides you with consistent, high quality service. Best of all, you know what to expect from us. Not just good service, but outstanding service that will pay for itself over time.','2016-01-22 01:34:52','2016-01-22 01:34:52','page',9,8,9,1),(11,'Careers','careers','###','Filler page.','2016-01-21 19:50:43','2016-01-21 19:50:43',NULL,NULL,11,16,0),(12,'Become an Agent','join','join','### YOUR LEGACY STARTS HERE!\r\n\r\nLegacy is more than a name for Mark and Wanda; it is the purpose in their work. The average Realtor in the U.S. has 7 closings in the span of a year. Mark has a record of 162 closings per year and Wanda has a record of 73 per year. With 27 years of experience between them, they are working hard to build a Legacy.\r\n\r\n#### Mark\'s Story\r\n\r\nMark Burrier is no stranger to work ethic. At the age of 13, he ran away from home and was on his own from that point on. Most people would have given up at that point, but Mark pressed forward with drive and determination to reach his goals.\r\n\r\nAlong with earning his GED at the age of 16 and attending college, Mark has received his construction license, collaborated to develop 4 subdivisions, and become the King of Investment properties. Not only did he start a property management firm, currently with just under 300 units in inventory, but he also has 40 personal investment units of his own.\r\n\r\nMark is one of the most business savvy people you’ll ever met. Along with all of this, he is the owner and founder of Legacy Realty, Inc. and father to two spectacular children. Talking with his children, one hears the legacy Mark is leaving. They have understood hard work and dedication since a young age.\r\n\r\nHe also enjoys being part of a fantasy football league, fishing in Florida, and cooking for his friends and family. When you meet Mark, you will quickly learn that he has the kind of contagious laughter that fills a room.\r\n\r\n#### Wanda\'s Story\r\n\r\nBorn and raised on a farm in Idaho, her close knit and loving family has always been a great source of strength and joy. Living on a farm meant that everyone had to pitch-in and do their fair share of the chores. Hard work was a natural part of daily life as were the strong values instilled by her parents: faith, love, and commitment. To this day, she credits her childhood experiences and her parents’ prudent guidance with shaping her character as a diligent and caring person.\r\n\r\nIndeed, family is something that Wanda does not take for granted. Growing up with a father who waged a long battle with cancer, she realized early on that life is very precious. During this difficult time, she and her siblings pulled together in order to keep the family farm.\r\n\r\nWanda’s parents showed her the value of hard work. She credits her father with the “I can do anything I set my mind to” attitude that has made her an overachiever in everything that she undertakes. In school she became a champion track and cross country runner. She managed to receive top grades in school and attended Bible College following graduation. The drive, determination, and ambition she developed while growing up are the qualities that have helped her to achieve success in her real estate career.\r\n\r\nToday, she enjoys helping others reach their goal of becoming a successful Realtor too! That is why she is working to recruit, train, and support others that would like to be Realtors in Central Arkansas.\r\n\r\n### AGENT TESTIMONIALS\r\n\r\n> Legacy is all about guiding people through one of their largest decisions and a process most see very few times in life. We do this by sharing experiences and working together as a team, so that we support our clients in the best possible way! We can handle it! **-John Jordan**\r\n\r\n> Legacy is like a family to me. I’m coached, inspired, cheered on and I always feel like I can come to Wanda and Mark for help. The training has been wonderful. I can’t imagine working anywhere else. **-Pat Buck**\r\n\r\n> I love the Legacy Realty, Inc. ***team atmosphere***. There is ***so much encouragement*** and ***guidance*** to become ***successful***. **-Elana Chaney**\r\n\r\n> I am very happy here at **Legacy Realty**. They provide much hands-on training, and I always feel like they care about what is best for me. Finding an \'employer\' like such is a rarity today. **-Krystal Copeland**','2016-01-22 01:25:06','2016-01-22 01:25:06','page',11,12,13,1),(13,'Real Estate Schools','real-estate-schools','real-estate-schools','### Real Estate Express\r\n\r\n[Real Estate Express](http://trk.realestateexpress.com/?a=431&c=5&p=r&s1=)\r\n\r\n### Career WebSchool\r\n\r\n[Career WebSchool](http://www.careerwebschool.com/arkansas/real-estate/sales-pre-license/?ernid=2546)','2016-01-22 01:34:06','2016-01-22 01:34:06','page',11,14,15,1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `specialties` */

DROP TABLE IF EXISTS `specialties`;

CREATE TABLE `specialties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `specialties` */

insert  into `specialties`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-23 01:05:56','2016-01-23 01:05:56','Web Developer');

/*Table structure for table `testimonies` */

DROP TABLE IF EXISTS `testimonies`;

CREATE TABLE `testimonies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `published` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `testimonies` */

insert  into `testimonies`(`id`,`published`,`featured`,`body`,`name`,`created_at`,`updated_at`) values (1,1,1,'This is a sample testimony. edited','Jane Doe','2016-01-25 20:09:52','2016-01-25 20:09:52');

/*Table structure for table `titles` */

DROP TABLE IF EXISTS `titles`;

CREATE TABLE `titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `titles` */

insert  into `titles`(`id`,`created_at`,`updated_at`,`name`) values (1,'2016-01-23 01:04:21','2016-01-23 01:04:21','Web Developer');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`last_login_at`) values (1,'Nathon Shultz','nashultz07@gmail.com','$2y$10$PXL4A0kDeINiOpNMLPTKcuL.N.UiaTIyApN18wTZV/zOnQNFZshpO','a7FnuNODwORherFaGU4A7QA76wkjYkfXemNOGSToWGGSrMOeGPzkIuYkygI1','2016-02-02 02:37:05','2016-02-02 02:37:05','2016-02-02 02:37:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
