CREATE DATABASE  IF NOT EXISTS `dbproject` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbproject`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: dbproject
-- ------------------------------------------------------
-- Server version	5.1.54-community-log

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
-- Table structure for table `arquivos`
--

DROP TABLE IF EXISTS `arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivos` (
  `codigo_ARQUIVO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ARQUIVO` varchar(120) NOT NULL,
  `data_ARQUIVO` date NOT NULL,
  `codigoTarefa_ARQUIVO` int(11) NOT NULL,
  PRIMARY KEY (`codigo_ARQUIVO`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivos`
--

LOCK TABLES `arquivos` WRITE;
/*!40000 ALTER TABLE `arquivos` DISABLE KEYS */;
INSERT INTO `arquivos` VALUES (8,'5_3M.txt','2021-03-24',5);
/*!40000 ALTER TABLE `arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `codigo_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CATEGORIA` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_CATEGORIA`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Desenvolvimento de Sistema'),(2,'Projeto de Iniciação Científica'),(3,'Análise de Dados'),(4,'Projeto de Pesquisa');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipes`
--

DROP TABLE IF EXISTS `equipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipes` (
  `emailUsuario_EQUIPE` varchar(120) NOT NULL,
  `codigoProjeto_EQUIPE` int(11) NOT NULL,
  `codigoPermissao_EQUIPE` int(11) NOT NULL,
  PRIMARY KEY (`emailUsuario_EQUIPE`,`codigoProjeto_EQUIPE`,`codigoPermissao_EQUIPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipes`
--

LOCK TABLES `equipes` WRITE;
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
INSERT INTO `equipes` VALUES ('avieiradeornelas@gmail.com',2,2),('bpereira@uol.com.br',1,2),('deborahevelyn.vds@gmail.com',2,2),('deborahevelyn.vds@gmail.com',3,2),('gaokisouza@gmail.com',2,2),('mongiatlucas@gmail.com',2,2),('webmaster@nivaldo-junior.pro.br',1,2);
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
  `id_PERGUNTA` int(11) NOT NULL AUTO_INCREMENT,
  `texto_PERGUNTA` varchar(200) NOT NULL,
  `resposta_PERGUNTA` text NOT NULL,
  `idTopico_PERGUNTA` int(11) NOT NULL,
  PRIMARY KEY (`id_PERGUNTA`),
  KEY `idTopico_PERGUNTA` (`idTopico_PERGUNTA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,'Como cadastrar um usuário?','O usuário deve ser adicionado através do link na página inicial CADASTRAR. Os dados deverão ser inseridos nos respectivos campos.',1),(2,'Como devo proceder para excluir um arquivo?','Apenas usuários responsáveis pelo upload do arquivo referente à tarefa podem excluí-los. Basta clicar em X (excluir) localizado acima de cada ícone do arquivo.',6);
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissoes` (
  `codigo_PERMISSAO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_PERMISSAO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_PERMISSAO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissoes`
--

LOCK TABLES `permissoes` WRITE;
/*!40000 ALTER TABLE `permissoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `codigo_PROJETO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_PROJETO` varchar(120) NOT NULL,
  `descricao_PROJETO` varchar(300) NOT NULL,
  `inicio_PROJETO` date NOT NULL,
  `fim_PROJETO` date NOT NULL,
  `status_PROJETO` int(11) NOT NULL,
  `emailUsuario_PROJETO` varchar(120) NOT NULL,
  `codigoCategoria_PROJETO` int(11) NOT NULL,
  PRIMARY KEY (`codigo_PROJETO`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (1,'ERP - Enterprise Resources Planning','Implementação de sistema personalizado de gerenciamento comercial e empresarial.','2020-09-28','2020-11-26',0,'jportiz@prof.ung.br',1),(2,'Sistema de Entregas Online','O sistema fará o gerenciamento de entregas a usuários que solicitem o serviço.','2021-03-23','2021-07-31',0,'malubborges33@gmail.com',1),(3,'Morar na Europa','Juntar dinheiro, tirar passaporte, tomar vacina e viajar.','2021-03-24','2021-12-31',0,'gaokisouza@gmail.com',4);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefas` (
  `codigo_TAREFA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TAREFA` varchar(80) NOT NULL,
  `descricao_TAREFA` varchar(300) DEFAULT NULL,
  `data_TAREFA` date NOT NULL,
  `status_TAREFA` int(11) NOT NULL,
  `emailUsuario_TAREFA` varchar(120) NOT NULL,
  `codigoProjeto_TAREFA` int(11) NOT NULL,
  PRIMARY KEY (`codigo_TAREFA`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` VALUES (1,'Desenvolvimento do Cronograma','Levantamento de tarefas e prazos de entrega. Distribuição de responsabilidades e DeadLine do projeto.','2019-09-28',1,'bpereira@uol.com.br',1),(2,'Levantamento de Requisitos','A tarefa consiste em elaborar a entrevista com o cliente e a confecção do contexto de software.','2021-03-10',0,'webmaster@nivaldo-junior.pro.br',1),(3,'Cronograma do Projeto','Deverão ser tabulados todos os itens do desenvolvimento, e projetador por data no gráfico de Gantt.','2021-03-24',0,'avieiradeornelas@gmail.com',2),(4,'Contexto de Software','Deverá ser levantado mediante os aspectos funcionais do sistema.','2021-03-24',0,'deborahevelyn.vds@gmail.com',2),(5,'Levantamento de Requisitos','Consiste no estudo do ambiente e entrevista com o cliente','2021-03-24',1,'mongiatlucas@gmail.com',2),(8,'Venda de ovos de páscoa','Elaborar planejamento de vendas e executar a meta.','2021-03-24',0,'deborahevelyn.vds@gmail.com',3),(7,'Modelo de Banco de Dados','A partir do contexto, desenvolver o diagrama de dados funcional, baseado nas etapas de normalização.','2021-03-24',0,'gaokisouza@gmail.com',2);
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topicos`
--

DROP TABLE IF EXISTS `topicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topicos` (
  `id_TOPICO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TOPICO` varchar(30) NOT NULL,
  PRIMARY KEY (`id_TOPICO`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topicos`
--

LOCK TABLES `topicos` WRITE;
/*!40000 ALTER TABLE `topicos` DISABLE KEYS */;
INSERT INTO `topicos` VALUES (1,'Usuários'),(2,'Projetos'),(3,'Integrantes'),(4,'Tarefas'),(5,'Listagens'),(6,'Arquivos'),(7,'Cronograma');
/*!40000 ALTER TABLE `topicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `email_USUARIO` varchar(120) NOT NULL,
  `nome_USUARIO` varchar(120) NOT NULL,
  `senha_USUARIO` varchar(32) NOT NULL,
  `telefone_USUARIO` varchar(13) NOT NULL,
  PRIMARY KEY (`email_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('jportiz@prof.ung.br','João Ortiz','e10adc3949ba59abbe56e057f20f883e','11987654321'),('bpereira@uol.com.br','Bruno Pereira','e10adc3949ba59abbe56e057f20f883e','1198564578'),('webmaster@nivaldo-junior.pro.br','Nivaldo Junior','e10adc3949ba59abbe56e057f20f883e','11985474587'),('mongiatlucas@gmail.com','Lucas Mongiat','e10adc3949ba59abbe56e057f20f883e','11971449930'),('gaokisouza@gmail.com','Gabrielle Aoki','e10adc3949ba59abbe56e057f20f883e','11960731664'),('deborahevelyn.vds@gmail.com','Debora Evelin','e10adc3949ba59abbe56e057f20f883e','11950216745'),('avieiradeornelas@gmail.com','Ana Clara Vieira','e10adc3949ba59abbe56e057f20f883e','11985214578'),('malubborges33@gmail.com','Maria Luiza Borges','e10adc3949ba59abbe56e057f20f883e','11971554785');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbproject'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-21 12:38:52
