CREATE DATABASE  IF NOT EXISTS `morningflower` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `morningflower`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: morningflower
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(225) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `telefone1` varchar(16) NOT NULL,
  `telefone2` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cnpj` varchar(30) NOT NULL,
  `vendedor` varchar(225) NOT NULL,
  `telefonevendedor1` varchar(16) NOT NULL,
  `telefonevendedor2` varchar(16) DEFAULT NULL,
  `condicaodavenda` varchar(225) DEFAULT NULL,
  `atividade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`codigo`,`cnpj`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  UNIQUE KEY `telefone1_UNIQUE` (`telefone1`),
  UNIQUE KEY `telefonevendedor1_UNIQUE` (`telefonevendedor1`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone2_UNIQUE` (`telefone2`),
  UNIQUE KEY `telefonevendedor2_UNIQUE` (`telefonevendedor2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `ctps` varchar(20) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` char(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `grupo_de_acesso` varchar(1) NOT NULL,
  PRIMARY KEY (`codigo`,`grupo_de_acesso`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `rg_UNIQUE` (`rg`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `ctps_UNIQUE` (`ctps`),
  UNIQUE KEY `senha_UNIQUE` (`senha`),
  UNIQUE KEY `grupo_de_acesso_UNIQUE` (`grupo_de_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'raissa','2006-01-23','1253256','12584697586','12584785','santa rosa','avenida','88965000','raissafraga@gmail.com','48996518770','12345678','1');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `codigo` varchar(225) NOT NULL,
  `produto` varchar(225) NOT NULL,
  `quantidade` varchar(10) NOT NULL,
  `preco de compra` varchar(14) NOT NULL,
  `preco de venda` varchar(20) NOT NULL,
  `fornecedor` varchar(225) NOT NULL,
  `validade` varchar(100) NOT NULL,
  `obs do produto` varchar(225) NOT NULL,
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-19 21:30:41
