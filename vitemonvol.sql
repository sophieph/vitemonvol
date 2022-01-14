-- MySQL dump 10.13  Distrib 5.7.31, for macos10.14 (x86_64)
--
-- Host: localhost    Database: vitemonvol
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Administrateur ViteMonVol','admin@admin.com','$2y$12$QrZXGbq6I8HKtTKviD9n..36QOSPOT5sd8L3Xjdo7mu2pI8qGtJHu',1),(2,'user011','user01@vmv.com','$2y$12$eARBTjH7uKxNj8WvhpwocOtu0ep5cg58jWlVpwPHvBdSSejfFP8Ny',0),(3,'user02','user02@vmv.com','$2y$12$EWD3VScMjM6VAmUz44IPmOKeDT7BNsckwVof3e5Vogm/3LpQ8Bxwe',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `tripId` int(11) NOT NULL,
  `createdAt` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,1,'14/01/2022'),(2,1,2,'14/01/2022'),(3,1,8,'14/01/2022'),(4,2,8,'14/01/2022'),(5,3,9,'14/01/2022');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `maximumTravellers` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip`
--

LOCK TABLES `trip` WRITE;
/*!40000 ALTER TABLE `trip` DISABLE KEYS */;
INSERT INTO `trip` VALUES (1,'Sri Lankaaa','02/02/2022 - 22/02/2022','Hôtel de charme en bordure d\'une plage de sable fin et proche de la petite ville de Waikkal Un cadre luxueux et reposant Chambres au grand confort avec accès piscine Profitez de la formule tout compris pour un séjour en toute sérénité Nombreuses activités et animations pour vous divertir : ping-pong, tir à l\'arc, volley ball et tir à l\'arc',100,NULL,NULL,2100),(2,'Maldives','03/03/2022 - 10/03/2022','À seulement quelques mètres des plages de sable fin et des eaux turquoise Séjournez dans les chambres confortable et spacieuses Profitez des saveurs différentes chaque jour grâce à des repas élaborés à base de produits locaux et frais Sirotez de bonne sélection de boissons et de cocktails paradisiaques au Bar Veragan',10,NULL,NULL,2300),(5,'Test','Test','Test',10,NULL,NULL,2100),(6,'Test','03/03/2022 - 10/03/2022','Test',10,NULL,NULL,2100),(7,'Grece','03/03/2022 - 07/03/2022','Idéalement situé au cœur de la bourgade de Kato Gouvès, à l’est d’Héraklion Point de départ idéal permettant de visiter pratiquement toute la Crète Des chambres tout confort pour profiter d\'un séjour au calme Une formule tout compris, pour des vacances en toute tranquillité',15,NULL,NULL,500),(8,'Italie','03/03/2022 - 10/03/2022','Hôtel de charme en bordure d\'une plage de sable fin et proche de la petite ville de Waikkal Un cadre luxueux et reposant Chambres au grand confort avec accès piscine Profitez de la formule tout compris pour un séjour en toute sérénité Nombreuses activités et animations pour vous divertir : ping-pong, tir à l\'arc, volley ball et tir à l\'arc',2,NULL,NULL,210),(9,'Crète','01/01/2022 - 02/02/2022','Emplacement en bord de mer, pour un séjour inoubliable Chambres confortables et élégantes pour se reposer Cuisine crétoise à savourer au restaurant Belle piscine extérieure pour se rafraîchir et se détendre',20,NULL,NULL,400);
/*!40000 ALTER TABLE `trip` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-14 12:47:25
