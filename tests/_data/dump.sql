-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gzero-cms
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `ContentTranslations`
--

DROP TABLE IF EXISTS `ContentTranslations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContentTranslations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `langCode` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `contentId` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teaser` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seoDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `contenttranslations_contentid_foreign` (`contentId`),
  KEY `contenttranslations_langcode_foreign` (`langCode`),
  CONSTRAINT `contenttranslations_langcode_foreign` FOREIGN KEY (`langCode`) REFERENCES `Langs` (`code`) ON DELETE CASCADE,
  CONSTRAINT `contenttranslations_contentid_foreign` FOREIGN KEY (`contentId`) REFERENCES `Contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContentTranslations`
--

LOCK TABLES `ContentTranslations` WRITE;
/*!40000 ALTER TABLE `ContentTranslations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ContentTranslations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ContentTypes`
--

DROP TABLE IF EXISTS `ContentTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContentTypes` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `contenttypes_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContentTypes`
--

LOCK TABLES `ContentTypes` WRITE;
/*!40000 ALTER TABLE `ContentTypes` DISABLE KEYS */;
INSERT INTO `ContentTypes` VALUES ('content',1,'2015-10-17 18:25:48','2015-10-17 18:25:48'),('category',1,'2015-10-17 18:25:48','2015-10-17 18:25:48');
/*!40000 ALTER TABLE `ContentTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contents`
--

DROP TABLE IF EXISTS `Contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorId` int(10) unsigned DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentId` int(10) unsigned DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `isOnHome` tinyint(1) NOT NULL,
  `isCommentAllowed` tinyint(1) NOT NULL,
  `isPromoted` tinyint(1) NOT NULL,
  `isSticky` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `publishedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_type_path_parentid_level_index` (`type`,`path`,`parentId`,`level`),
  KEY `contents_authorid_foreign` (`authorId`),
  KEY `contents_parentid_foreign` (`parentId`),
  CONSTRAINT `contents_type_foreign` FOREIGN KEY (`type`) REFERENCES `ContentTypes` (`name`) ON DELETE CASCADE,
  CONSTRAINT `contents_authorid_foreign` FOREIGN KEY (`authorId`) REFERENCES `Users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `contents_parentid_foreign` FOREIGN KEY (`parentId`) REFERENCES `Contents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contents`
--

LOCK TABLES `Contents` WRITE;
/*!40000 ALTER TABLE `Contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Langs`
--

DROP TABLE IF EXISTS `Langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Langs` (
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `i18n` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `isEnabled` tinyint(1) NOT NULL,
  `isDefault` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `langs_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Langs`
--

LOCK TABLES `Langs` WRITE;
/*!40000 ALTER TABLE `Langs` DISABLE KEYS */;
INSERT INTO `Langs` VALUES ('en','en_US',1,1,'2015-10-17 18:25:48','2015-10-17 18:25:48'),('pl','pl_PL',1,0,'2015-10-17 18:25:48','2015-10-17 18:25:48'),('de','de_DE',0,0,'2015-10-17 18:25:48','2015-10-17 18:25:48'),('fr','fr_FR',0,0,'2015-10-17 18:25:48','2015-10-17 18:25:48');
/*!40000 ALTER TABLE `Langs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OptionCategories`
--

DROP TABLE IF EXISTS `OptionCategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OptionCategories` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`key`),
  KEY `optioncategories_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OptionCategories`
--

LOCK TABLES `OptionCategories` WRITE;
/*!40000 ALTER TABLE `OptionCategories` DISABLE KEYS */;
INSERT INTO `OptionCategories` VALUES ('general','2015-10-17 18:25:48','2015-10-17 18:25:48'),('seo','2015-10-17 18:25:48','2015-10-17 18:25:48');
/*!40000 ALTER TABLE `OptionCategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Options`
--

DROP TABLE IF EXISTS `Options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `options_categorykey_key_index` (`categoryKey`,`key`),
  CONSTRAINT `options_categorykey_foreign` FOREIGN KEY (`categoryKey`) REFERENCES `OptionCategories` (`key`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Options`
--

LOCK TABLES `Options` WRITE;
/*!40000 ALTER TABLE `Options` DISABLE KEYS */;
INSERT INTO `Options` VALUES (1,'siteName','general','{\"en\":\"G-ZERO CMS\",\"pl\":\"G-ZERO CMS\",\"de\":\"G-ZERO CMS\",\"fr\":\"G-ZERO CMS\"}','2015-10-17 18:25:48','2015-10-17 18:25:48'),(2,'siteDesc','general','{\"en\":\"Content management system.\",\"pl\":\"Content management system.\",\"de\":\"Content management system.\",\"fr\":\"Content management system.\"}','2015-10-17 18:25:48','2015-10-17 18:25:48'),(3,'defaultPageSize','general','{\"en\":5,\"pl\":5,\"de\":5,\"fr\":5}','2015-10-17 18:25:48','2015-10-17 18:25:48'),(4,'seoDescLength','seo','{\"en\":160,\"pl\":160,\"de\":160,\"fr\":160}','2015-10-17 18:25:48','2015-10-17 18:25:48'),(5,'googleAnalyticsId','seo','{\"en\":null,\"pl\":null,\"de\":null,\"fr\":null}','2015-10-17 18:25:48','2015-10-17 18:25:48');
/*!40000 ALTER TABLE `Options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PasswordReminders`
--

DROP TABLE IF EXISTS `PasswordReminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PasswordReminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `passwordreminders_email_index` (`email`),
  KEY `passwordreminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PasswordReminders`
--

LOCK TABLES `PasswordReminders` WRITE;
/*!40000 ALTER TABLE `PasswordReminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `PasswordReminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RouteTranslations`
--

DROP TABLE IF EXISTS `RouteTranslations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RouteTranslations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `langCode` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `routeId` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `routetranslations_langcode_routeid_unique` (`langCode`,`routeId`),
  UNIQUE KEY `routetranslations_langcode_url_unique` (`langCode`,`url`),
  KEY `routetranslations_routeid_foreign` (`routeId`),
  KEY `routetranslations_url_index` (`url`),
  CONSTRAINT `routetranslations_langcode_foreign` FOREIGN KEY (`langCode`) REFERENCES `Langs` (`code`) ON DELETE CASCADE,
  CONSTRAINT `routetranslations_routeid_foreign` FOREIGN KEY (`routeId`) REFERENCES `Routes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RouteTranslations`
--

LOCK TABLES `RouteTranslations` WRITE;
/*!40000 ALTER TABLE `RouteTranslations` DISABLE KEYS */;
/*!40000 ALTER TABLE `RouteTranslations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Routes`
--

DROP TABLE IF EXISTS `Routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `routableId` int(10) unsigned NOT NULL,
  `routableType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Routes`
--

LOCK TABLES `Routes` WRITE;
/*!40000 ALTER TABLE `Routes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rememberToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'admin@gzero.pl','$2y$10$e2NYo4HEJmJcHgNleTqiHeX41sC2WugALw4Lu.Aj0Juq7vCK3CMVK','John','Doe','',1,'2015-10-17 18:25:48','2015-10-17 18:25:48');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_11_16_114110_create_lang',1),('2014_11_16_114111_create_user',1),('2014_11_16_114112_create_route',1),('2014_11_16_114113_create_content',1),('2015_09_07_100656_create_options',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-17 22:27:05
