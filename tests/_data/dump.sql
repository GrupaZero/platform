-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: dev_db    Database: gzero-cms
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `BlockTranslations`
--

DROP TABLE IF EXISTS `BlockTranslations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BlockTranslations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `langCode` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `blockId` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `customFields` text COLLATE utf8_unicode_ci,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `blocktranslations_blockid_foreign` (`blockId`),
  KEY `blocktranslations_langcode_foreign` (`langCode`),
  CONSTRAINT `blocktranslations_blockid_foreign` FOREIGN KEY (`blockId`) REFERENCES `Blocks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blocktranslations_langcode_foreign` FOREIGN KEY (`langCode`) REFERENCES `Langs` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BlockTranslations`
--

LOCK TABLES `BlockTranslations` WRITE;
/*!40000 ALTER TABLE `BlockTranslations` DISABLE KEYS */;
/*!40000 ALTER TABLE `BlockTranslations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BlockTypes`
--

DROP TABLE IF EXISTS `BlockTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BlockTypes` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `blocktypes_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BlockTypes`
--

LOCK TABLES `BlockTypes` WRITE;
/*!40000 ALTER TABLE `BlockTypes` DISABLE KEYS */;
INSERT INTO `BlockTypes` VALUES ('basic',1,'2016-04-03 16:43:47','2016-04-03 16:43:47'),('content',1,'2016-04-03 16:43:47','2016-04-03 16:43:47'),('menu',1,'2016-04-03 16:43:47','2016-04-03 16:43:47'),('slider',1,'2016-04-03 16:43:47','2016-04-03 16:43:47'),('widget',1,'2016-04-03 16:43:47','2016-04-03 16:43:47');
/*!40000 ALTER TABLE `BlockTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Blocks`
--

DROP TABLE IF EXISTS `Blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blockableId` int(10) unsigned DEFAULT NULL,
  `blockableType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorId` int(10) unsigned DEFAULT NULL,
  `filter` text COLLATE utf8_unicode_ci,
  `options` text COLLATE utf8_unicode_ci,
  `weight` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isCacheable` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deletedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocks_blockableid_blockabletype_index` (`blockableId`,`blockableType`),
  KEY `blocks_authorid_foreign` (`authorId`),
  KEY `blocks_type_foreign` (`type`),
  CONSTRAINT `blocks_authorid_foreign` FOREIGN KEY (`authorId`) REFERENCES `Users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `blocks_type_foreign` FOREIGN KEY (`type`) REFERENCES `BlockTypes` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Blocks`
--

LOCK TABLES `Blocks` WRITE;
/*!40000 ALTER TABLE `Blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `Blocks` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `contenttranslations_contentid_foreign` FOREIGN KEY (`contentId`) REFERENCES `Contents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contenttranslations_langcode_foreign` FOREIGN KEY (`langCode`) REFERENCES `Langs` (`code`) ON DELETE CASCADE
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
  UNIQUE KEY `contenttypes_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContentTypes`
--

LOCK TABLES `ContentTypes` WRITE;
/*!40000 ALTER TABLE `ContentTypes` DISABLE KEYS */;
INSERT INTO `ContentTypes` VALUES ('category',1,'2016-04-03 16:43:47','2016-04-03 16:43:47'),('content',1,'2016-04-03 16:43:47','2016-04-03 16:43:47');
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
  `theme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  CONSTRAINT `contents_authorid_foreign` FOREIGN KEY (`authorId`) REFERENCES `Users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `contents_parentid_foreign` FOREIGN KEY (`parentId`) REFERENCES `Contents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contents_type_foreign` FOREIGN KEY (`type`) REFERENCES `ContentTypes` (`name`) ON DELETE CASCADE
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
INSERT INTO `Langs` VALUES ('en','en_US',1,1,'2016-04-03 16:43:46','2016-04-03 16:43:46'),('pl','pl_PL',1,0,'2016-04-03 16:43:46','2016-04-03 16:43:46'),('de','de_DE',0,0,'2016-04-03 16:43:46','2016-04-03 16:43:46'),('fr','fr_FR',0,0,'2016-04-03 16:43:46','2016-04-03 16:43:46');
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
INSERT INTO `OptionCategories` VALUES ('general','2016-04-03 16:43:47','2016-04-03 16:43:47'),('seo','2016-04-03 16:43:47','2016-04-03 16:43:47');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Options`
--

LOCK TABLES `Options` WRITE;
/*!40000 ALTER TABLE `Options` DISABLE KEYS */;
INSERT INTO `Options` VALUES (1,'siteName','general','{\"en\":\"G-ZERO CMS\",\"pl\":\"G-ZERO CMS\",\"de\":\"G-ZERO CMS\",\"fr\":\"G-ZERO CMS\"}','2016-04-03 16:43:47','2016-04-03 16:43:47'),(2,'siteDesc','general','{\"en\":\"Content management system.\",\"pl\":\"Content management system.\",\"de\":\"Content management system.\",\"fr\":\"Content management system.\"}','2016-04-03 16:43:47','2016-04-03 16:43:47'),(3,'defaultPageSize','general','{\"en\":5,\"pl\":5,\"de\":5,\"fr\":5}','2016-04-03 16:43:47','2016-04-03 16:43:47'),(4,'cookiesPolicyUrl','general','{\"en\":null,\"pl\":null,\"de\":null,\"fr\":null}','2016-04-03 16:43:47','2016-04-03 16:43:47'),(5,'seoDescLength','seo','{\"en\":160,\"pl\":160,\"de\":160,\"fr\":160}','2016-04-03 16:43:47','2016-04-03 16:43:47'),(6,'googleAnalyticsId','seo','{\"en\":null,\"pl\":null,\"de\":null,\"fr\":null}','2016-04-03 16:43:47','2016-04-03 16:43:47');
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
  `routableId` int(10) unsigned DEFAULT NULL,
  `routableType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Table structure for table `SocialIntegrations`
--

DROP TABLE IF EXISTS `SocialIntegrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SocialIntegrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned DEFAULT NULL,
  `socialId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `socialintegrations_socialid_unique` (`socialId`),
  KEY `socialintegrations_userid_foreign` (`userId`),
  CONSTRAINT `socialintegrations_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SocialIntegrations`
--

LOCK TABLES `SocialIntegrations` WRITE;
/*!40000 ALTER TABLE `SocialIntegrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `SocialIntegrations` ENABLE KEYS */;
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
  `nickName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rememberToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `hasSocialIntegrations` tinyint(1) NOT NULL DEFAULT '0',
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
INSERT INTO `Users` VALUES (1,'admin@gzero.pl','$2y$10$iDOTV75LH2aQFq9iL8Qvw.TTt8pekafeMSpKi5GkCPAFMod3RLlsW','Admin','John','Doe','',1,0,'2016-04-03 16:43:46','2016-04-03 16:43:46');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Widgets`
--

DROP TABLE IF EXISTS `Widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `args` text COLLATE utf8_unicode_ci,
  `isActive` tinyint(1) NOT NULL,
  `isCacheable` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `widgets_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Widgets`
--

LOCK TABLES `Widgets` WRITE;
/*!40000 ALTER TABLE `Widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `Widgets` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES ('2014_11_16_114110_create_lang',1),('2014_11_16_114111_create_user',1),('2014_11_16_114112_create_route',1),('2014_11_16_114113_create_content',1),('2015_09_07_100656_create_options',1),('2015_11_26_115322_create_block',1),('2015_03_28_091847_create_social',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'gzero-cms'
--

--
-- Dumping routines for database 'gzero-cms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-03 16:44:07
