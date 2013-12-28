CREATE DATABASE  IF NOT EXISTS `videoworld` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `videoworld`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `actor`
--

DROP TABLE IF EXISTS `actor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actor` (
  `idactor` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idactor`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actor`
--

LOCK TABLES `actor` WRITE;
/*!40000 ALTER TABLE `actor` DISABLE KEYS */;
INSERT INTO `actor` VALUES (1,'Leonardo','DiCaprio'),(2,'Tom ','Hanks'),(3,'Jon','Hamm'),(4,'Aaron','Staton'),(5,'Russell','Crowe'),(6,'Joaquin','Phoenix'),(7,'Shia','LaBeouf'),(8,'Tobey','Maguire'),(9,'Colin','Ferrell'),(11,'Hugh','Jackman'),(12,'Ian','McKellan'),(13,'Charlie','Sheen'),(14,'Tom','Cruise'),(15,'Milla','Jovovich'),(16,'Georgie','Henley'),(17,'Jack','Black'),(18,'Ray','Romano'),(19,'Chris','Evans');
/*!40000 ALTER TABLE `actor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actor_has_video`
--

DROP TABLE IF EXISTS `actor_has_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actor_has_video` (
  `actor_idactor` int(11) NOT NULL,
  `video_idvideo` int(11) NOT NULL,
  PRIMARY KEY (`actor_idactor`,`video_idvideo`),
  KEY `fk_actor_has_video_video1_idx` (`video_idvideo`),
  KEY `fk_actor_has_video_actor1_idx` (`actor_idactor`),
  CONSTRAINT `fk_actor_has_video_actor1` FOREIGN KEY (`actor_idactor`) REFERENCES `actor` (`idactor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_actor_has_video_video1` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actor_has_video`
--

LOCK TABLES `actor_has_video` WRITE;
/*!40000 ALTER TABLE `actor_has_video` DISABLE KEYS */;
INSERT INTO `actor_has_video` VALUES (9,1),(15,2),(13,3),(3,4),(4,4),(18,5),(5,6),(6,6),(7,7),(7,8),(2,9),(16,10),(11,11),(17,12),(14,13),(12,14),(8,15),(8,16),(19,17);
/*!40000 ALTER TABLE `actor_has_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` char(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idcustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (16,'Sadik','Pepic','sadik.pepic','745a02903f2a8e15f6bb833830d064e6','sadik-1@bluewin.ch','1990-01-30',1),(17,'max','muster','max.muster','202cb962ac59075b964b07152d234b70','max.muster@gmail.com','2003-11-03',1),(18,'sadik','pepic','sadik23','81dc9bdb52d04dc20036dbd8313ed055','sadik.pepic@buhlergroup.com','2013-11-12',1);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_has_video`
--

DROP TABLE IF EXISTS `customer_has_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_has_video` (
  `customer_idcustomer` int(11) NOT NULL,
  `video_idvideo` int(11) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`customer_idcustomer`,`video_idvideo`),
  KEY `fk_customer_has_video_video1_idx` (`video_idvideo`),
  KEY `fk_customer_has_video_customer1_idx` (`customer_idcustomer`),
  CONSTRAINT `fk_customer_has_video_customer1` FOREIGN KEY (`customer_idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_has_video_video1` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_has_video`
--

LOCK TABLES `customer_has_video` WRITE;
/*!40000 ALTER TABLE `customer_has_video` DISABLE KEYS */;
INSERT INTO `customer_has_video` VALUES (16,2,1.5),(16,3,5.0),(16,4,5.0),(16,5,2.5),(16,6,5.0),(16,7,3.0),(16,11,1.5),(16,14,1.0),(16,15,4.5),(16,16,3.0),(18,17,3.5);
/*!40000 ALTER TABLE `customer_has_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `idgenre` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgenre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Horror'),(2,'Sience fiction'),(3,'Comedy'),(4,'Drama'),(5,'Thriller'),(6,'Lovestory'),(7,'Kids'),(8,'Documentary'),(9,'Action');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre_has_video`
--

DROP TABLE IF EXISTS `genre_has_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre_has_video` (
  `genre_idgenre` int(11) NOT NULL,
  `video_idvideo` int(11) NOT NULL,
  PRIMARY KEY (`genre_idgenre`,`video_idvideo`),
  KEY `fk_genre_has_video_video1_idx` (`video_idvideo`),
  KEY `fk_genre_has_video_genre1_idx` (`genre_idgenre`),
  CONSTRAINT `fk_genre_has_video_genre1` FOREIGN KEY (`genre_idgenre`) REFERENCES `genre` (`idgenre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_genre_has_video_video1` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre_has_video`
--

LOCK TABLES `genre_has_video` WRITE;
/*!40000 ALTER TABLE `genre_has_video` DISABLE KEYS */;
INSERT INTO `genre_has_video` VALUES (2,1),(1,2),(3,3),(4,4),(7,5),(4,6),(9,7),(2,8),(5,9),(7,10),(9,11),(7,12),(4,13),(9,14),(9,15),(9,16),(9,17),(3,18),(4,19),(6,20),(5,21),(7,22),(6,23);
/*!40000 ALTER TABLE `genre_has_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `idmovie` int(11) NOT NULL AUTO_INCREMENT,
  `video_idvideo` int(11) NOT NULL,
  `boxoffice_revenue` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmovie`,`video_idvideo`),
  KEY `fk_movie_video1_idx` (`video_idvideo`),
  CONSTRAINT `fk_movie_video1` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,1,22000000),(2,2,68000000),(3,5,200000000),(4,6,313094000),(5,7,499588300),(6,8,456000000),(7,9,234995000),(8,10,20849990),(9,11,231100399),(10,12,560000000),(11,13,403002000),(12,14,204820074),(13,15,1003948775),(14,16,300588630),(15,17,30548299),(16,18,2000000),(17,19,324677550),(18,20,180000000),(19,21,148500588),(20,22,340203490),(21,23,394039990);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_type`
--

DROP TABLE IF EXISTS `payment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_type` (
  `idpayment_type` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type_name` varchar(45) DEFAULT NULL,
  `payment_type_pic_location` varchar(45) DEFAULT NULL,
  `payment_type_link` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`idpayment_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_type`
--

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;
INSERT INTO `payment_type` VALUES (1,'PayPal','paypal.jpg','www.paypal.com'),(2,'Credit Card','creditcards.png','www.visa.com');
/*!40000 ALTER TABLE `payment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `idsubscription` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_type_idsubscription_type` int(11) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `customer_idcustomer` int(11) DEFAULT NULL,
  `payment_type_idpayment_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubscription`),
  KEY `customer_idcustomer_fk_idx` (`customer_idcustomer`),
  KEY `payment_type_idpayment_type` (`payment_type_idpayment_type`),
  KEY `subscription_type_idsubscription_type` (`subscription_type_idsubscription_type`),
  CONSTRAINT `customer_idcustomer_fk` FOREIGN KEY (`customer_idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `payment_type_idpayment_type_fk` FOREIGN KEY (`payment_type_idpayment_type`) REFERENCES `payment_type` (`idpayment_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subscription_type_idsubscription_type_fk` FOREIGN KEY (`subscription_type_idsubscription_type`) REFERENCES `subscription_type` (`idsubscription_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (1,2,'2013-11-05','2013-11-12',17,2),(2,4,'2013-11-05','2014-11-05',16,1),(3,2,'2013-11-12','2013-11-19',18,2);
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_type`
--

DROP TABLE IF EXISTS `subscription_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_type` (
  `idsubscription_type` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_type_name` varchar(45) DEFAULT NULL,
  `subscription_price` decimal(6,2) DEFAULT NULL,
  `subscription_discount` decimal(3,0) DEFAULT NULL,
  `subscription_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubscription_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_type`
--

LOCK TABLES `subscription_type` WRITE;
/*!40000 ALTER TABLE `subscription_type` DISABLE KEYS */;
INSERT INTO `subscription_type` VALUES (1,'1 day',4.99,0,1),(2,'1 week',31.99,10,7),(3,'1 month',127.99,15,30),(4,'1 year',910.99,50,365);
/*!40000 ALTER TABLE `subscription_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tvshow`
--

DROP TABLE IF EXISTS `tvshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tvshow` (
  `idtvshow` int(11) NOT NULL AUTO_INCREMENT,
  `season` tinyint(4) DEFAULT NULL,
  `episode` tinyint(4) DEFAULT NULL,
  `video_idvideo` int(11) NOT NULL,
  PRIMARY KEY (`idtvshow`,`video_idvideo`),
  KEY `fk_tvshow_video_idx` (`video_idvideo`),
  CONSTRAINT `fk_tvshow_video` FOREIGN KEY (`video_idvideo`) REFERENCES `video` (`idvideo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tvshow`
--

LOCK TABLES `tvshow` WRITE;
/*!40000 ALTER TABLE `tvshow` DISABLE KEYS */;
INSERT INTO `tvshow` VALUES (1,3,10,3),(2,1,4,4);
/*!40000 ALTER TABLE `tvshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `location_video` varchar(45) DEFAULT NULL,
  `location_videopreview` varchar(45) DEFAULT NULL,
  `location_videocover` varchar(45) DEFAULT NULL,
  `times_viewed` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `release_year` year(4) DEFAULT NULL,
  `language` tinytext,
  `permit_age` tinyint(4) DEFAULT NULL,
  `duration` int(4) DEFAULT NULL,
  `hd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'total_recall.mp4','total_recall.png','',55,'Total Recall','In the future total recall is a...',2012,'EN',18,130,0),(2,'Resident_Evil.mp4','resident_evil.png','',25,'Resident Evil','Zombies are back!',2010,'EN',16,130,0),(3,'TWAAHM.mp4','TwoAndHalfMen_S4.jpg','',32,'Two and a half men','Alan still lives with Charlie...',2000,'EN',14,30,0),(4,'Mad_Men.mp4','mad_men.jpg','',49,'Mad Men','Mad men is situated in the 30s',1995,'EN',18,50,0),(5,'Ice Age_1.mp4','ice_age.jpg',NULL,9,'Ice Age','Ice Age is dated on...',2001,'EN',6,90,0),(6,'Gladiator.mp4','gladiator.jpg',NULL,22,'Gladiator','A roman warrior...',2000,'EN',16,210,0),(7,'Eagle Eye.mp4','eagle_eye_preview.jpg','eagle_eye_cover.jpg',51,'Eagle Eye','A young man is forced by...',2009,'EN',12,122,0),(8,'Transformers.mp4','transformers.jpg',NULL,24,'Transformers','The decepticons...',2004,'EN',12,102,0),(9,'Angels and Demons.mp4','angels_and_demons.jpg',NULL,33,'Angels & Demons','In italy, the vatican has...',2005,'EN',14,205,0),(10,'Narnia.mp4','narnia.jpg',NULL,24,'Narnia','The wand is very...',2006,'EN',12,181,0),(11,'X-Men.mp4','xmen.jpg',NULL,38,'X-Men','Dr. X has founded...',2001,'EN',14,120,0),(12,'Kung Fu Panda_1.mp4','kung_fu_panda.jpg',NULL,24,'Kung Fu Panda','The very obese panda...',2007,'EN',0,98,0),(13,'Valkyrie.mp4','valkyrie.jpg',NULL,14,'Valkyrie','In WW2...',2011,'EN',16,119,0),(14,'X-Men_Origins_Magneto.mp4','magneto.jpg',NULL,14,'X-Men Origins - Magneto','This movie tell the story of Magneto and his internal fight to...',2008,'EN',16,99,0),(15,'Spider-Man_2.mp4','spiderman2.jpg',NULL,56,'Spider Man 2','Spider man fights again...',2007,'EN',12,89,0),(16,'Spider-Man_3.mp4','spiderman3.jpg',NULL,54,'Spider Man 3','Spider man fights... again.',2011,'EN',12,90,0),(17,'captain_america_2.mp4','captain_america_2.jpg',NULL,127,'Captain America 2','Captain America is back to fight...',2014,'EN',14,146,1),(18,'zookeeper.mp4','zookeeper.jpg','zookeeper.jpg',4,'Zookeeper','Der neue Zoowächter Samuel möchte gerne...',2013,'DE',6,82,1),(19,'blackswan.mp4','blackswan.jpg','black swan.jpg',41,'Black Swan','Cet film s\'agit d\'une dancer qui veut...',2013,'FR',14,145,1),(20,'crazystupidlove.mp4','crazy-stupid-love.jpg','crazy stupid love.jpg',81,'Crazy Stupid Love','Andy ist ein Familienvater, der gerade...',2011,'DE',12,98,1),(21,'thecall.mp4','thecall.png',NULL,40,'The Call','The very busy business woman gets an unexpected call',2014,'EN',16,79,1),(22,'frozen.mp4','frozen.jpg','frozen.jpg',24,'Frozen','The snowman who seeks for friends and...',2014,'EN',0,97,1),(23,'friendswithbenefits.mp4','friends with benefits.jpg','friends with benefits.jpg',79,'Friends with benefits','Sally and James just broke up with their partners and...',2012,'EN',10,101,1);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-16 20:41:06
