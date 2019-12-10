-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: yii2basic
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','4UYo4sWMWhgElYwRIFbO-HeoyYl1hLPe','$2y$13$72Wy/vAzXDlNmhGCnESsluF6BpavenRP8P5LVE18I.8CzEpRT7tyO',NULL,'farid.lfsibgtu.ru@mail.ru',10,1570347777,1570347777,'$2y$13$72Wy/vAzXDlNmhGCnESsluF6BpavenRP8P5LVE18I.8CzEpRT7tyO');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('roleRoot','1',1570347950);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('PermissionRoot',2,'Просмотр ЛК root',NULL,NULL,1570347950,1570347950),('roleRoot',1,NULL,NULL,NULL,1570347949,1570347949);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('roleRoot','PermissionRoot');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canvas`
--

DROP TABLE IF EXISTS `canvas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canvas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canvas`
--

LOCK TABLES `canvas` WRITE;
/*!40000 ALTER TABLE `canvas` DISABLE KEYS */;
INSERT INTO `canvas` VALUES (5,5,'paris.jpg','12345');
/*!40000 ALTER TABLE `canvas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactdetails`
--

DROP TABLE IF EXISTS `contactdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `studname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` int(11) DEFAULT NULL,
  `yearset` int(11) DEFAULT NULL,
  `formeducation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lineeducation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactdetails`
--

LOCK TABLES `contactdetails` WRITE;
/*!40000 ALTER TABLE `contactdetails` DISABLE KEYS */;
INSERT INTO `contactdetails` VALUES (1,5,'Надежда','Александровна','Баженова',NULL,2016,'Очная форма','35.03.02 Технология лесозаготовительных и деревоперерабатывающих производств','Студент');
/*!40000 ALTER TABLE `contactdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` varchar(65000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'100','<?xml version=\"1.0\" encoding=\"WINDOWS-1251\"?><?xml-stylesheet type=\"text/xsl\" href=\"template/index.xsl\"?><!DOCTYPE post SYSTEM \"template/post.dtd\"><post><info><row><col-sm-4>111</col-sm-4><col-sm-4>222</col-sm-4><col-sm-4>333</col-sm-4></row><well-lg>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqq</well-lg><button>wsssssssssss</button><alertWarning>sdfsdfsa</alertWarning></info><history><well>444444</well><badge>2</badge></history></post>');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entry`
--

DROP TABLE IF EXISTS `entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entry`
--

LOCK TABLES `entry` WRITE;
/*!40000 ALTER TABLE `entry` DISABLE KEYS */;
INSERT INTO `entry` VALUES (1,'test123','yyyyyyyyyyyyyyyyyyy23@mail.com'),(2,'sdr','test123@mail.com');
/*!40000 ALTER TABLE `entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1570192835),('m000000_000000_create_user_table',1570347728),('m140506_102106_rbac_init',1570238082),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1570238083),('m180523_151638_rbac_updates_indexes_without_prefix',1570238084),('m191006_124139_create_contactdetails_table',1570367197),('m191007_142846_create_picture_table',1570458667),('m191007_144306_create_canvas_table',1570459471),('m191007_144640_create_teachingplan_table',1570640059),('m191007_144939_create_studentsacademicwork_table',1570850749),('m191007_145223_create_studentarticles_table',1570460095),('m191007_145724_create_studentssocialachievements_table',1570460327),('m191007_150523_create_studentsscientificachievements_table',1570460830),('m191007_150822_create_studentssportingachievements_table',1570460950),('m191012_061141_create_post_table',1570863334),('m191019_044140_create_entry_table',1571460359);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (5,5,'newyork.jpg','12345');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` mediumtext,
  `text` mediumtext,
  `name` mediumtext,
  `role` mediumtext,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'История','<div align=\"center\"><span style=\"background-color: darkgrey;\"><font size=\"5\">Начало</font></span><br></div><div>\r\n\r\n\r\n	\r\n	\r\n	\r\n	<style type=\"text/css\">p { margin-bottom: 0.25cm; line-height: 115%; }</style>\r\n\r\n\r\n<p style=\"margin-bottom: 0cm; line-height: 100%\" align=\"left\">В Красноярском\r\nкрае в конце 70-х годов было 18 вузов и 3\r\nфилиала. На 3 млн. жителей края приходилось\r\n130 тыс. человек с высшим образованием и\r\nтолько 60% главных специалистов имели\r\nвысшее инженерное образование.</p><p style=\"margin-bottom: 0cm; line-height: 100%\" align=\"left\"><br></p><p style=\"margin-bottom: 0cm; line-height: 100%\" align=\"left\"><br></p>\r\n\r\n</div><div align=\"right\"><img style=\"float: right; border: 1px solid black;\" src=\"http://lfsibgu.ru/images/filhistory/Build_LfSibGTU.jpg\" width=\"254\" height=\"176\"></div>',NULL,NULL),(3,'Филиал сегодня','<p class=\"p0\" align=\"justify\">Лесосибирский\r\n филиал ФГБОУ ВО \"Сибирский государственный университет науки и \r\nтехнологий имени М.Ф. Решетнева\" - это учебное заведение, реализующее \r\nпрограммы высшего профессионального и дополнительного образования.</p>\r\n<p class=\"p7\" align=\"justify\">Филиал был создан в 1982 году и решает \r\nзадачи по подготовке высококвалифицированных специалистов для \r\nлесохимических и деревообрабатывающих предприятий города и региона, \r\nявляясь центром образования, науки и культуры Ангаро-Енисейского региона\r\n России.</p>\r\n<p>За годы деятельности филиала выпущено более 4000 \r\nвысококвалифицированных специалистов, которые работают на предприятиях \r\nгорода, края и за его пределами мастерами, механиками, технологами, \r\nэкономистами, менеджерами, а ряд выпускников – главными специалистами и \r\nдиректорами предприятий Лесосибирского лесопромышленного комплекса.</p>\r\n<p class=\"p0\" align=\"justify\">Филиал СибГУ им. М.Ф. Решетнева в г. \r\nЛесосибирске&nbsp;ведет подготовку специалистов по по основным \r\nобразовательным программам высшего образования – программам бакалавриата\r\n и магистратуры:</p>\r\n<p>&nbsp;</p>\r\n<table width=\"100%\" border=\"1\">\r\n<tbody>\r\n<tr class=\"p7updownTable\">\r\n<td width=\"12%\">\r\n<div align=\"center\"><strong>Код</strong></div>\r\n</td>\r\n<td width=\"88%\">\r\n<div align=\"center\"><strong>Наименование</strong></div>\r\n</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\"><strong>09.00.00</strong></td>\r\n<td class=\"p7updownTableCopy\"><strong>Информатика и вычислительная техника</strong></td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">09.03.01</td>\r\n<td class=\"p7updownTableCopy\">Информатика и вычислительная техника (уровень бакалавриата)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\"><strong>15.00.00</strong></td>\r\n<td class=\"p7updownTableCopy\"><strong>Машиностроение</strong></td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">15.03.02</td>\r\n<td class=\"p7updownTableCopy\">Технологические машины и оборудование (уровень бакалавриата)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">15.04.02</td>\r\n<td class=\"p7updownTableCopy\">Технологические машины и оборудование (уровень магистратуры)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\"><strong>35.00.00</strong></td>\r\n<td class=\"p7updownTableCopy\"><strong>Сельское, лесное и рыбное хозяйство</strong></td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">35.03.02</td>\r\n<td class=\"p7updownTableCopy\">Технология лесозаготовительных и деревоперерабатывающих производств (уровень бакалавриата)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">35.04.02</td>\r\n<td class=\"p7updownTableCopy\">Технология лесозаготовительных и деревоперерабатывающих производств (уровень магистратуры)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\"><strong>38.00.00</strong></td>\r\n<td class=\"p7updownTableCopy\"><strong>Экономика и управление</strong></td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">38.03.01</td>\r\n<td class=\"p7updownTableCopy\">Экономика (уровень бакалавриата)</td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\"><strong>39.00.00</strong></td>\r\n<td class=\"p7updownTableCopy\"><strong>Социология и социальная работа</strong></td>\r\n</tr>\r\n<tr class=\"p7updownTable\">\r\n<td class=\"p7updownTableCopy\">39.03.02</td>\r\n<td class=\"p7updownTableCopy\">Социальная работа (уровень бакалавриата)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p class=\"p0\" align=\"justify\">&nbsp;<strong>Общий контингент студентов на 20.11.2016 г.:</strong></p>\r\n<ul><li><a href=\"http://lfsibgu.ru/files/history/OF_number.pdf\" target=\"_blank\" rel=\"alternate noopener noreferrer\">очная форма обучения</a>;</li><li><a href=\"http://lfsibgu.ru/files/history/ZF_number.pdf\" target=\"_blank\" rel=\"alternate noopener noreferrer\">заочная форма обучения</a>;</li><li><a href=\"http://lfsibgu.ru/files/history/OZF_number.pdf\" target=\"_blank\" rel=\"alternate noopener noreferrer\">очно-заочная форма обучения</a>.</li></ul>\r\n<p class=\"p0\" align=\"justify\"><a href=\"http://lfsibgu.ru/dopedu\" rel=\"alternate\">Центр дополнительного профессионального образования филиала</a>&nbsp;ведет\r\n подготовку слушателей по образовательным программам повышения \r\nквалификации, профессиональной переподготовки в соответствии с профилем \r\nосновных образовательных программ.</p>\r\n<p class=\"p0\" align=\"justify\">Филиал имеет устойчивые связи с \r\nпредприятиями региона; заключены договоры с лесоперерабатывающими \r\nпредприятиями города, современное оборудование и технологии которых \r\nпозволяют учебные и производственные практики проводить в \r\nпроизводственных условиях.</p>\r\n<p>Филиал располагает хорошей материально-технической базой, лаборатории снабжены современным оборудованием и приборами.</p>\r\n<p class=\"p7\" align=\"justify\">Филиал вносит существенный вклад в \r\nрегиональное развитие через удовлетворение потребностей регионального \r\nрынка труда в развитии научно-технического и научного инновационного \r\nпотенциала. Предприятия лесопромышленного комплекса выступают \r\nинициаторами и заказчиками проведения научных исследований, которые \r\nвыполняются сотрудниками филиала. Ряд научных разработок достаточно \r\nконкурентоспособны.</p>\r\n<figure style=\"text-align: center;\"><img style=\"display: block; margin-left: auto; margin-right: auto; border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_Dmitriev.jpg\" alt=\"\">\r\n<figcaption><em>В кабинете лесозаготовительной техники</em></figcaption>\r\n</figure>\r\n<p class=\"p7\" align=\"justify\">Так, в области комплексного и \r\nрационального использования древесного сырья таковыми являются \r\nтехнологии утилизации коры, изготовления огне-биозащищенных отделочных и\r\n конструкционно-отделочных плит и пластиков, очистки производственных \r\nсточных вод, сушки лиственничных пиломатериалов в сушильных камерах.<br>\r\n В течение 2011-2015 гг. защищено 8 (в 2015 – 1) кандидатских \r\nдиссертаций лицами, направленными в аспирантуру и докторантуру от Лф \r\nСибГТУ, в диссертационных советах СибГАУ и других вузов. В 2016 г. \r\nзащищено две докторских диссертации.</p>\r\n<p class=\"p7\" align=\"justify\">В 2015-2016 годах сотрудники и студенты \r\nактивно участвовали в научных конкурсах федерального и регионального \r\nуровня. По итогам участия в 2015 г. сотрудники и студенты филиала стали \r\nпобедителями регионального конкурса инициативных исследовательских \r\nпроектов РФФИ “Сибирь”, регионального конкурса РГНФ “Российское \r\nмогущество прирастать будет Сибирью и Ледовитым океаном”, конкурса \r\nнаучно-технических исследований, разработок, инновационных программ и \r\nпроектов для обеспечения конкурентных преимуществ экономики \r\nКрасноярского края, проводимом ККФПН и НТД и других конкурсов на сумму \r\n2025 тыс. рублей; в 2016 г. - регионального конкурса РГНФ «Российское \r\nмогущество прирастать будет Сибирью и Ледовитым океаном», конкурса по \r\nорганизации проведения мероприятий по профессиональной ориентации \r\nмолодежи, конкурса по организации участия студентов, аспирантов и \r\nмолодых ученых во всероссийских, международных конференциях и научных \r\nмероприятиях – поддержка академической мобильности на сумму 791,6 тыс. \r\nрублей.</p>\r\n<p class=\"p7\" align=\"justify\">Студенты филиала в 2016 г. получили десять\r\n грантов ККФПН и НТД по результатам участия в конкурсах юных \r\nтехников-изобретателей, по организации участия студентов, аспирантов и \r\nмолодых ученых во всероссийских, международных конференциях и научных \r\nмероприятиях; по организации научных стажировок студентов, аспирантов и \r\nмолодых ученых.</p>\r\n<p class=\"p7\" align=\"justify\">Студентам филиала в 2015-2016 годах были \r\nназначены стипендии Президента Российской Федерации студентам очной \r\nформы обучения, обучающимся по направлениям подготовки, соответствующим \r\nприоритетным направлениям модернизации и технологического развития \r\nроссийской экономики, стипендии Правительства Российской Федерации, \r\nкраевые именные стипендии имени академика М.Ф. Решетнева за достижения в\r\n области технических наук и имени первого Губернатора Енисейской \r\nгубернии А.П. Степанова за достижения в области гуманитарных наук.</p>\r\n<p class=\"p7\" align=\"justify\">Филиал вовлекает молодежь территории в \r\nсовместную научно-исследовательскую деятельность, стимулирует к \r\nнаучно-техническому творчеству. Так, в 2015 году на основании соглашения\r\n о сотрудничестве в области образования от 14.10.2015 г, заключенного \r\nМинистерством образования Красноярского края, администрацией города \r\nЛесосибирска Красноярского края, муниципальным бюджетным \r\nобщеобразовательным учреждением «Лицей» города Лесосибирска и \r\nЛесосибирским филиалом федерального государственного бюджетного \r\nобразовательного учреждения высшего образования «Сибирский \r\nгосударственный технологический университет» 26 обучающихся 10 класса \r\nМБОУ «Лицей» зачислены в число обучающихся специализированных классов \r\nподготовительного отделения ЦДПО филиала.</p>\r\n<p class=\"p7updown\" align=\"justify\"><a name=\"hostel\"></a>Для проживания \r\nвсех иногородних студентов в филиале имеется благоустроенное общежитие, \r\nрасположенное рядом с учебными корпусами. <a href=\"http://lfsibgtu.ru/services/pk/pk_pay.htm#pay_hostel\">Стоимость оплаты за общежитие</a>.</p>\r\n<p class=\"p7updown\" align=\"justify\"><img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_1.jpg\" alt=\"\" width=\"328\" height=\"228\">&nbsp;&nbsp; <img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_2.jpg\" alt=\"\" width=\"328\" height=\"228\"></p>\r\n<p class=\"p7updown\" align=\"justify\"><img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_3.jpg\" alt=\"\" width=\"328\" height=\"228\">&nbsp;&nbsp; <img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_4.jpg\" alt=\"\" width=\"328\" height=\"228\"></p>\r\n<p class=\"p7updown\" align=\"justify\"><img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_5.jpg\" alt=\"\" width=\"328\" height=\"228\">&nbsp;&nbsp; <img style=\"border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_obsh_6.jpg\" alt=\"\" width=\"328\" height=\"228\"></p>\r\n<p class=\"p7updown\" style=\"padding-left: 60px; text-align: center;\" align=\"justify\"><em>Общежитие&nbsp;филиала</em></p>\r\n<p class=\"p0\" align=\"justify\">Парк компьютерной техники филиала составляет более <strong>200 персональных компьютеров</strong>. В информационно-вычислительном центре филиала имеется <strong>5 классов ЭВМ</strong>.\r\n Программное обеспечение филиала полностью лицензировано и включает \r\nболее 30 наименований, среди них: Microsoft Windows 7, 8, 10; Microsoft \r\nOffice 2010, 2013; KOMPAS; Corel Draw; КонсультантПюс; Statistica; \r\nMathcad; Project Expert; Solid Works.</p>\r\n<p align=\"justify\">Филиал имеет безлимитный тариф на доступ к ресурсам сети Интернет. Студенты филиала могут работать в сети Интернет бесплатно.</p>\r\n<p class=\"p7\" align=\"justify\">Компьютеры подразделений и классов ЭВМ \r\nвходят в состав корпоративной сети филиала, построенной на базе \r\nархитектуры клиент-сервер, что позволят каждому сотруднику и студенту \r\nполучать доступ к ресурсам локальных серверов и сети Интернет с любого \r\nкомпьютера.</p>\r\n<p class=\"p7\" align=\"justify\">Преподавателями освоена и активно используется адаптивная тестовая система ACT с комплектом тестов по различным дисциплинам.</p>\r\n<figure style=\"text-align: center;\"><img style=\"display: block; margin-left: auto; margin-right: auto; border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_ivc.jpg\" alt=\"\">\r\n<figcaption><em>Занятие в классе информационно-вычислительного центра</em></figcaption>\r\n</figure>\r\n<p>Для более качественного проведения занятий по дисциплинам на всех кафедрах филиала созданы мультимедийные классы.<br>\r\n В филиале создана и активно используется телевизионная информационная \r\nсистема, мониторы которой расположены на всех этажах учебного корпуса.</p>\r\n<p class=\"p7\" align=\"justify\">Книжный фонд&nbsp;<a href=\"http://lfsibgu.ru/obschiesvedeniantb\" rel=\"alternate\">научно-технической библиотеки</a> (НТБ) составляет <strong>более 137 тыс. экз.</strong>\r\n Для организации оперативного поиска информации используются возможности\r\n система автоматизации библиотек «ИРБИС». В электронном каталоге НТБ \r\nсформированы и пополняются базы данных: «Учебная литература», \r\n«Периодические издания», «Научные публикации учёных филиала», \r\n«Художественная литература». Для обеспечения информацией НИР и НИРС \r\nвыписываются реферативные журналы по профилю образовательных программ.</p>\r\n<p class=\"p7updown\" align=\"justify\">Для студентов всех форм обучения проводятся презентации библиотеки, тренинги, мероприятия культурно-просветительского характера.</p>\r\n<p class=\"p0\" align=\"justify\">Наши студенты активно учавствуют во \r\nвнутривузовских, городских и краевых культурно-массовых мероприятиях. В \r\nфилиале организована видеостудия, информационные выпуски которой \r\nрассказывают о творческой и научной жизни студентов и преподавателей.</p>\r\n<figure style=\"text-align: center;\"><img style=\"display: block; margin-left: auto; margin-right: auto; border: 1px solid black;\" src=\"http://lfsibgu.ru/images/images_history/Today_aerobika.jpg\" alt=\"\">\r\n<figcaption><em>Команда аэробики&nbsp;филиала</em></figcaption>\r\n</figure>\r\n<p>Студенты филиала ежегодно участвуют в городском фестивале «Студенческая весна» и общегородском новогоднем бале.</p> \r\n	\r\n						 			\r\n		\r\n		\r\n		\r\n    ',NULL,NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentarticles`
--

DROP TABLE IF EXISTS `studentarticles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentarticles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentarticles`
--

LOCK TABLES `studentarticles` WRITE;
/*!40000 ALTER TABLE `studentarticles` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentarticles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentsacademicwork`
--

DROP TABLE IF EXISTS `studentsacademicwork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentsacademicwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentsacademicwork`
--

LOCK TABLES `studentsacademicwork` WRITE;
/*!40000 ALTER TABLE `studentsacademicwork` DISABLE KEYS */;
INSERT INTO `studentsacademicwork` VALUES (1,5,'public.pdf','Not description');
/*!40000 ALTER TABLE `studentsacademicwork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentsscientificachievements`
--

DROP TABLE IF EXISTS `studentsscientificachievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentsscientificachievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentsscientificachievements`
--

LOCK TABLES `studentsscientificachievements` WRITE;
/*!40000 ALTER TABLE `studentsscientificachievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentsscientificachievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentssocialachievements`
--

DROP TABLE IF EXISTS `studentssocialachievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentssocialachievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentssocialachievements`
--

LOCK TABLES `studentssocialachievements` WRITE;
/*!40000 ALTER TABLE `studentssocialachievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentssocialachievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentssportingachievements`
--

DROP TABLE IF EXISTS `studentssportingachievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentssportingachievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentssportingachievements`
--

LOCK TABLES `studentssportingachievements` WRITE;
/*!40000 ALTER TABLE `studentssportingachievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentssportingachievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachingplan`
--

DROP TABLE IF EXISTS `teachingplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachingplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachingplan`
--

LOCK TABLES `teachingplan` WRITE;
/*!40000 ALTER TABLE `teachingplan` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachingplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','4UYo4sWMWhgElYwRIFbO-HeoyYl1hLPe','$2y$13$72Wy/vAzXDlNmhGCnESsluF6BpavenRP8P5LVE18I.8CzEpRT7tyO',NULL,'farid.lfsibgtu.ru@mail.ru',10,1570347777,1570347777),(5,'000000001756','nqfYQk8yB6McbGZjFhgoGcFkMLW6gy8p','$2y$13$5ThQEn9ffxUJiJTl1Pj73ujFE3LGSVU7gwL5ePBdI9SgdifgCA65S',NULL,'lf_1756@sibsau.ru',10,1570356068,1570373349);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-10 15:51:04
