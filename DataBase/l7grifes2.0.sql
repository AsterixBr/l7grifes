-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: l7grifes
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) NOT NULL,
  `dtNascimento` date NOT NULL,
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `FkEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Vitao','2020-12-27','xands@net.com','6b57fe654d8ed3d7bcfc5718074ccb2c','577.200.833-18',2),(2,'Vitaoxxx','2021-10-31','xands@net.com','81dc9bdb52d04dc20036dbd8313ed055','245.987.881-86',2),(3,'Vitor','2021-10-31','xands@net.com','81dc9bdb52d04dc20036dbd8313ed055','577.200.833-18',2),(4,'Vitaotx','2021-11-03','xands@net.com','81dc9bdb52d04dc20036dbd8313ed055','577.200.833-18',2),(5,'Skol','2021-10-31','ghvghfgfghfghfgf@gmail.com','6e0d0cdf9e48538255bc003a8587e6d0','547.497.560-52',4),(6,'test','2021-11-02','xands@net.com','98cc7afd2db8fda29f0594839f023b1e','888.888.888-88',2),(7,'teste','2021-11-01','teste@gmail.com','137a3a3a7809a828afe701ad71827e81','222.222.222-22',4),(8,'Vitaog','2021-11-04','xands@net.com','b2a2b56ad26ce6f44a4f23c47ef4884b','577.200.833-18',5),(9,'Daniels','2021-11-01','skiner@gmail.com','4b5ee3f27537e8c13911d17972536347','245.987.881-86',2);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idEndereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cep` varchar(45) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'73403-345','Módulo 15','15','casa 15','Condomínio Mestre D\'Armas (Planaltina)','Brasília','DF'),(2,'73403-345','Módulo 15','25','casa ','Condomínio Mestre D\'Armas (Planaltina)','Brasília','DF'),(3,'73403-345','Módulo 15','66','ap','Condomínio Mestre D\'Armas (Planaltina)','Brasília','DF'),(4,'72543-402','QR 213 Conjunto B','14','casa ','Santa Maria','Brasília','DF'),(5,'73403-345','Módulo 15','111','apart','Condomínio Mestre D\'Armas (Planaltina)','Brasília','DF');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFornecedor` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tellFixo` varchar(45) DEFAULT NULL,
  `cell` varchar(45) DEFAULT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `logradouro` varchar(45) DEFAULT NULL,
  `uf` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `representante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (9,'balenciaga','balenciagafree@gmail.com','11 3378-9798','11 99198-9898','72543-401','QR 213 Conjunto A','DF','Santa Maria','Brasília','69','bau');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `nomeMarca` varchar(45) NOT NULL,
  `representante` varchar(45) NOT NULL,
  `emailRepresentante` varchar(255) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (2,'nike','nikin','solomon@hotmail.com');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `dtNascimento` date DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `FkEndereco` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `fk_Pessoa_Endereco1_idx` (`FkEndereco`),
  CONSTRAINT `fk_Pessoa_Endereco1` FOREIGN KEY (`FkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (3,'Vitao','2021-11-02','xands@net.com','90172145f7b8dfe1e35c6c9242ace06f','Administrador','577.200.833-18',2),(5,'jgjg','2021-11-02','ghvghfgfghfghfgf@gmail.com','943aa0fcda4ee2901a7de9321663b114','Funcionário','562.165.262-52',4),(6,'Vitor','2021-10-31','skiner@gmail.com','1b02dad2084860212efb16d8ff73ffdb','Administrador','577.200.833-18',2);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `nomeProduto` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `tamanho` varchar(45) NOT NULL,
  `vlrCompra` decimal(18,2) NOT NULL,
  `vlrVenda` decimal(18,2) NOT NULL,
  `qtdEstoque` varchar(255) DEFAULT NULL,
  `lote` varchar(45) NOT NULL,
  `dtCompra` date NOT NULL,
  `Imagem` varchar(255) NOT NULL,
  `FkFornecedor` int(11) NOT NULL,
  `FkMarca` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `FkFornecedor` (`FkFornecedor`),
  KEY `FkMarca` (`FkMarca`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`FkFornecedor`) REFERENCES `fornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`FkMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (28,'masculina','calça jeans calvin klein','azul','42',39.99,79.99,'35','142021','2021-11-01','img/118696485_130990552040794_8318677523067936807_n.jpg',9,2),(29,'masculina','short jeans reserva','azul','42',39.99,79.99,'35','142021','2021-10-31','img/tommy.jpg',9,2),(31,'masculina','calça jeans calvin klein','azul','42',39.99,79.99,'516','142021','2021-11-16','img/semImagem.jpg',9,2),(32,'masculina','calça jeans calvin klein','azul','42',39.99,79.99,'8','142021','2021-11-04','img/118592949_310890863525624_3517867113317653380_n.jpg',9,2);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacaovenda`
--

DROP TABLE IF EXISTS `situacaovenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacaovenda` (
  `idSituacaoVenda` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`idSituacaoVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacaovenda`
--

LOCK TABLES `situacaovenda` WRITE;
/*!40000 ALTER TABLE `situacaovenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `situacaovenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusvenda`
--

DROP TABLE IF EXISTS `statusvenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusvenda` (
  `FkVenda` int(10) unsigned NOT NULL,
  `FkSituacaoVenda` int(11) NOT NULL,
  `dtSituacao` date NOT NULL,
  `observacao` text NOT NULL,
  PRIMARY KEY (`FkVenda`,`FkSituacaoVenda`),
  KEY `fk_Venda_has_SituacaoVenda_SituacaoVenda1_idx` (`FkSituacaoVenda`),
  KEY `fk_Venda_has_SituacaoVenda_Venda1_idx` (`FkVenda`),
  CONSTRAINT `fk_Venda_has_SituacaoVenda_SituacaoVenda1` FOREIGN KEY (`FkSituacaoVenda`) REFERENCES `situacaovenda` (`idSituacaoVenda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venda_has_SituacaoVenda_Venda1` FOREIGN KEY (`FkVenda`) REFERENCES `venda` (`idVenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusvenda`
--

LOCK TABLES `statusvenda` WRITE;
/*!40000 ALTER TABLE `statusvenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `statusvenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `idVenda` int(10) unsigned NOT NULL,
  `dtVenda` datetime NOT NULL,
  `vlrTotal` decimal(18,2) NOT NULL,
  `statusVenda` varchar(45) NOT NULL,
  `FkPessoa` int(11) NOT NULL,
  `FkEndEntrega` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idVenda`),
  KEY `fk_Venda_Pessoa1_idx` (`FkPessoa`),
  KEY `fk_Venda_Endereco1_idx` (`FkEndEntrega`),
  CONSTRAINT `fk_Venda_Endereco1` FOREIGN KEY (`FkEndEntrega`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venda_Pessoa1` FOREIGN KEY (`FkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda_produto`
--

DROP TABLE IF EXISTS `venda_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda_produto` (
  `FkVenda` int(10) unsigned NOT NULL,
  `FkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  `vlrProdutoVendido` decimal(18,2) NOT NULL,
  PRIMARY KEY (`FkVenda`,`FkProduto`),
  KEY `fk_Venda_has_Produto_Produto1_idx` (`FkProduto`),
  KEY `fk_Venda_has_Produto_Venda1_idx` (`FkVenda`),
  CONSTRAINT `fk_Venda_has_Produto_Produto1` FOREIGN KEY (`FkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venda_has_Produto_Venda1` FOREIGN KEY (`FkVenda`) REFERENCES `venda` (`idVenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda_produto`
--

LOCK TABLES `venda_produto` WRITE;
/*!40000 ALTER TABLE `venda_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda_produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-23  9:18:53
