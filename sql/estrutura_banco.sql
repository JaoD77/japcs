/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.20-12.3.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: japcs
-- ------------------------------------------------------
-- Server version	12.3.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(50) DEFAULT NULL,
  `Senha` varchar(32) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES
(1,'parara','e8d51627e43048876a29f4b89a79d460','99999999999'),
(2,'artur','d8dc79b0d619897f546a1b73db0e5713','66666666699'),
(3,'ATS','e10adc3949ba59abbe56e057f20f883e','11111111111'),
(4,'Everton Buriti Oliveira','d20f3602321385b82cb15a741a6865c1','07011355570');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(150) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `Endereco` varchar(150) DEFAULT NULL,
  `Bairro` varchar(80) DEFAULT NULL,
  `Cidade` varchar(80) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'paranhos','99999999999','rua sim','centro','eunapolios','PE','99999-999'),
(2,'arthur','66666666699','Rua nao','centro','Eunapolos','AM','666666-66'),
(3,'Arthur','11111111111','RUa','A','EU','PI','11111111'),
(4,'everton buriti oliveira','07011355570','rua E, 74','Arnaldo moura','Eunapolis','BA','4525790');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NumVenda` varchar(30) DEFAULT NULL,
  `Login` varchar(50) DEFAULT NULL,
  `NomeCompleto` varchar(150) DEFAULT NULL,
  `Produtos` text DEFAULT NULL,
  `Data` varchar(30) DEFAULT NULL,
  `Total` varchar(20) DEFAULT NULL,
  `Pagamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES
(1,'202609141122092215','parara','paranhos','Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing x3 (R$ 8.999,70)','14/09/2026 11:22:09','8999.70','PIX'),
(2,'202609141134592790','artur','arthur','Placa de Vídeo Asus AMD Radeon RX 9060 XT Prime OC, 16GB, GDDR6, FSR, Ray Tracing x3 (R$ 8.999,70)','14/09/2026 11:34:59','8999.70','PIX'),
(3,'202609141152194016','ATS','Arthur','Placa de Vídeo Biostar AMD Radeon RX 580 2048SP, 8GB, GDDR5, 256 Bit x1 (R$ 839,00)','14/09/2026 11:52:19','839.00','PIX'),
(4,'202609141309243529','Everton Buriti Oliveira','everton buriti oliveira','PC Gamer Japcs DeepCool, Intel Core Ultra 9 285, GeForce RTX 5080 16GB, 32GB DDR5 x3 (R$ 66.300,00)','14/09/2026 13:09:24','66300.00','Cartão de Crédito');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-09-17 18:35:42
