
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2019-11-11 11:20:28
