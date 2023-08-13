-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shop_gcc200081
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cuserid` int(11) NOT NULL,
  `cproid` int(11) NOT NULL,
  `cquantity` int(11) NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_user_cart` (`cuserid`),
  CONSTRAINT `fk_user_cart` FOREIGN KEY (`cuserid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `catid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `catname` varchar(30) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('N01','Necklace'),('N02','Ring');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pprice` decimal(8,0) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `pquan` int(11) NOT NULL,
  `pcatid` varchar(5) NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_cat_pro` (`pcatid`),
  CONSTRAINT `fk_cat_pro` FOREIGN KEY (`pcatid`) REFERENCES `category` (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Necklace A01JA',1000,'this is necklace A01JA made from silver 985 and diamond','day-chuyen-1.jpg',1,'N01','2023-07-12'),(2,'Necklace A02BA',1280,'With a simple, light design that can attract all eyes even if you wear all types of clothes in many different styles, you can still stand out in the crowd.','day-chuyen-2.jpeg',1,'N01','2023-08-03'),(3,'Necklace A00172',2000,'Made of shiny silver and diamond materials, it feels both gentle and delicate but equally luxurious to attract all eyes around.','day-chuyen-3.jpg',1,'N01','2023-08-06'),(5,'Ring Panthère de Cartier – Cartier – B4221700',2000,'Panthère de Cartier ring, rose gold 18K, agate, black lacquer, studded with 2 tsavorite garnets. Width of the sample: 8.7 mm.','nhan-doi-3.jpg',1,'N02','2023-08-02'),(6,'Ring Panthère de Cartier – Cartier – H4078300',4700,'Rings – platinum, sapphire, emerald eyes, agate, 461 brilliantly cut diamonds with a total weight of 4.90 carats.','nhan-doi-3.jpg',1,'N02','2023-06-28'),(7,'Ring Panthère de Cartier – Cartier – H4226300',2009,'The Panthère de Cartier ring, 950‰ platinum, is studded with 700 brilliantly cut diamonds totaling 5,06 carats, emerald, agate','nhan-bao.jpg',1,'N02','2023-08-07');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (42,'tinh','123','ct'),(47,'hao','123','unknow');
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

-- Dump completed on 2023-08-13 23:28:44
