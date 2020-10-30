CREATE DATABASE  IF NOT EXISTS `laborus` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laborus`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: laborus
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Coleta'),(5,'Exames'),(10,'Eletronicos'),(11,'Outra');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `convenio` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_convenio` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientes_colaboradores1_idx` (`usuario_id`),
  CONSTRAINT `fk_clientes_colaboradores1` FOREIGN KEY (`usuario_id`) REFERENCES `colaboradores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (2,'Fulano','64654654','fulano@email.com','64654','asdf','55',NULL,'asdf','33','asdf','asdf','asdf','df',1),(3,'sdfasdf','645.654.654-64','sfd@gmil.com','(46) 54654-6456','dsfadsf','555','01001-010','Rua Filipe de Oliveira','555','asdf','Sé','São Paulo','SP',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaboradores`
--

DROP TABLE IF EXISTS `colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colaboradores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaboradores`
--

LOCK TABLES `colaboradores` WRITE;
/*!40000 ALTER TABLE `colaboradores` DISABLE KEYS */;
INSERT INTO `colaboradores` VALUES (1,'afsdf','654654','fula@emai.com','64654',NULL,'65asdf','55','asdf','sadf','asdf','df','asdfasdf'),(3,'Luciano','64654564','luciano@email.com','64654654',NULL,'qqq','55','asdf','aa','asd','DF','81dc9bdb52d04dc20036dbd8313ed055'),(4,'Teste Tutor','ikhkjhjkh','mozartcomart@gmail.com','61991254154',NULL,'asdf','33','sadfa','Teste','Brasília','DF','912ec803b2ce49e4a541068d495ab570'),(5,'Teste','014.465.181-59','mozart@gmail.com','(99) 99999-9999','71919-360','Rua 37','234','','Norte (Águas Claras)','Brasília','DF','81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fantasia` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome_contato` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedores_colaboradores1_idx` (`usuario_id`),
  CONSTRAINT `fk_fornecedores_colaboradores1` FOREIGN KEY (`usuario_id`) REFERENCES `colaboradores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (1,'asdf','asdf','65.444.444/4444-44','teste@mail.com','(55) 55555-5555','asdfaf',NULL,'Rua São Bento','555','de 320 ao fim - lado par','Centro','São Paulo','SP',1),(2,'asdfads','asdfads','11.111.111/1111-11','hml@asdf.com','(66) 66666-6666','asdf',NULL,'Rua 37','555','asd','Norte (Águas Claras)','Brasília','DF',1),(3,'Teste','Teste','65.465.465/4654-65','f@mail.com','(61) 61616-1616','Mozart','71919-360','Rua 37','234','asdf','Norte (Águas Claras)','Brasília','DF',1);
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int NOT NULL,
  `estoque` int DEFAULT NULL,
  `data_compra` datetime DEFAULT NULL,
  `usuario_id` int NOT NULL,
  `preco` decimal(8,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_produtos_categoria_idx` (`categoria_id`),
  KEY `fk_produtos_colaboradores1_idx` (`usuario_id`),
  CONSTRAINT `fk_produtos_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_produtos_colaboradores1` FOREIGN KEY (`usuario_id`) REFERENCES `colaboradores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (2,'Eqip','Equipeeeee',1,NULL,'2020-10-28 01:10:23',1,4154.00),(6,'yyy','Eletrop',10,20,'2020-10-28 00:00:00',1,89.00);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_fornecedores`
--

DROP TABLE IF EXISTS `produtos_fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos_fornecedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produtos_id` int NOT NULL,
  `fornecedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos_has_fornecedores_fornecedores1_idx` (`fornecedores_id`),
  KEY `fk_produtos_has_fornecedores_produtos1_idx` (`produtos_id`),
  CONSTRAINT `fk_produtos_has_fornecedores_fornecedores1` FOREIGN KEY (`fornecedores_id`) REFERENCES `fornecedores` (`id`),
  CONSTRAINT `fk_produtos_has_fornecedores_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_fornecedores`
--

LOCK TABLES `produtos_fornecedores` WRITE;
/*!40000 ALTER TABLE `produtos_fornecedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `categoria_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `preco` decimal(8,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_servicos_categoria1_idx` (`categoria_id`),
  KEY `fk_servicos_colaboradores1_idx` (`usuario_id`),
  CONSTRAINT `fk_servicos_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_servicos_colaboradores1` FOREIGN KEY (`usuario_id`) REFERENCES `colaboradores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (1,'asd','asdf','asdf',1,1,12.00),(2,'rrr','erqewrqer','qwer',1,1,26.00),(3,'44444','Teste com categoria','Teste com categoria',11,1,654.00),(4,'1234','Servico','Servico',5,1,66.00);
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos_produtos`
--

DROP TABLE IF EXISTS `servicos_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicos_produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `servicos_id` int NOT NULL,
  `produtos_id` int NOT NULL,
  `qtd` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_servicos_has_produtos_produtos1_idx` (`produtos_id`),
  KEY `fk_servicos_has_produtos_servicos1_idx` (`servicos_id`),
  CONSTRAINT `fk_servicos_has_produtos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`),
  CONSTRAINT `fk_servicos_has_produtos_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos_produtos`
--

LOCK TABLES `servicos_produtos` WRITE;
/*!40000 ALTER TABLE `servicos_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicos_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laborus'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-28 19:42:42
