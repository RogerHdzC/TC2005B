-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: TC2005B_401_1
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `md1_administrador`
--

DROP TABLE IF EXISTS `md1_administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_administrador` (
  `correo` varchar(20) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`correo`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_administrador`
--

LOCK TABLES `md1_administrador` WRITE;
/*!40000 ALTER TABLE `md1_administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `md1_administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_docente`
--

DROP TABLE IF EXISTS `md1_docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_docente` (
  `nomina` varchar(30) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`nomina`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_docente`
--

LOCK TABLES `md1_docente` WRITE;
/*!40000 ALTER TABLE `md1_docente` DISABLE KEYS */;
INSERT INTO `md1_docente` VALUES ('claudia.v@tec.mx','Claudia Verónica Pérez Lezama','********'),('d.perez@tec.mx','Daniel Pérez Rojas','********'),('r.paredes@tec.mx','Rosa Paredes Juarez','********');
/*!40000 ALTER TABLE `md1_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_edicion`
--

DROP TABLE IF EXISTS `md1_edicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_edicion` (
  `id` varchar(5) NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `estatusEvento` varchar(20) DEFAULT NULL,
  `estatusEdicion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_edicion`
--

LOCK TABLES `md1_edicion` WRITE;
/*!40000 ALTER TABLE `md1_edicion` DISABLE KEYS */;
INSERT INTO `md1_edicion` VALUES ('FJ 23','2023-05-10','2023-06-10','Postulacion',1);
/*!40000 ALTER TABLE `md1_edicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_enseña`
--

DROP TABLE IF EXISTS `md1_enseña`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_enseña` (
  `idProfesor` varchar(20) NOT NULL,
  `idUf` varchar(15) NOT NULL,
  PRIMARY KEY (`idProfesor`,`idUf`),
  KEY `idUf` (`idUf`),
  CONSTRAINT `md1_enseña_ibfk_1` FOREIGN KEY (`idUf`) REFERENCES `md1_uf` (`clave`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_enseña_ibfk_2` FOREIGN KEY (`idProfesor`) REFERENCES `md1_docente` (`nomina`) ON DELETE RESTRICT ON UPDATE CASCADE
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_enseña`
--

LOCK TABLES `md1_enseña` WRITE;
/*!40000 ALTER TABLE `md1_enseña` DISABLE KEYS */;
/*!40000 ALTER TABLE `md1_enseña` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_estudiante`
--

DROP TABLE IF EXISTS `md1_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_estudiante` (
  `matricula` char(9) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_estudiante`
--

LOCK TABLES `md1_estudiante` WRITE;
/*!40000 ALTER TABLE `md1_estudiante` DISABLE KEYS */;
INSERT INTO `md1_estudiante` VALUES ('A00000111','Abcdefghi Jklmnopqrstu Vwxyz','$2y$12$Z9qB3mj/RcKq0zksA2wZyuvirHQVvJPCz2e04MMs21ksfl6qtu21i'),('A017351','roger federer re','$2y$12$SezMFj4QatBC71CdD6J4wetB4NzaIK.5p897W0Cu5mdu6LFKapoaW'),('A017358','Raúl Díaz Romero','$2y$12$fl0xRIxDJMi7YHB9ASbfHem0qLy1TxeMqodBw/5D.RA6C0alaFaeO'),('A01735819','Rogelio Hernández Cortés','******'),('A01735839','Raúl Díaz Romero','******'),('A01736100','Diego Dieguín GS Pro','$2y$12$aaILc8neCGq6IRSDJal7pewiwOEHYCOaWNMWYnaFY0A3bs5Lb4jkO'),('A01736106','Diego García de los Salmones Ajuria','******'),('A01736279','Daniel Francisco Acosta Vazquez','DanielCool123'),('A01742069','Roberto Carlos Juarez Coronado','******');
/*!40000 ALTER TABLE `md1_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_evalua`
--

DROP TABLE IF EXISTS `md1_evalua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_evalua` (
  `idJurado` varchar(100) NOT NULL,
  `idProyecto` int NOT NULL,
  `calificacion` double DEFAULT NULL,
  `rubrica1` int DEFAULT NULL,
  `rubrica2` int DEFAULT NULL,
  `rubrica3` int DEFAULT NULL,
  `rubrica4` int DEFAULT NULL,
  PRIMARY KEY (`idJurado`,`idProyecto`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `md1_evalua_ibfk_1` FOREIGN KEY (`idJurado`) REFERENCES `md1_jurado` (`correo`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_evalua_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `md1_proyecto` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_evalua`
--

LOCK TABLES `md1_evalua` WRITE;
/*!40000 ALTER TABLE `md1_evalua` DISABLE KEYS */;
INSERT INTO `md1_evalua` VALUES ('ferdiaz@gmail.com',2,NULL,3,3,3,3),('ferdiaz@gmail.com',3,NULL,3,2,2,2),('josehdz@tec.mx',1,NULL,1,2,3,4),('josehdz@tec.mx',2,NULL,1,3,3,4),('josehdz@tec.mx',3,NULL,1,4,3,4),('luismtz@gmail.com',1,NULL,1,4,3,4),('luismtz@gmail.com',2,NULL,1,4,2,1),('samuelgonz@tec.mx',1,NULL,4,3,3,4),('samuelgonz@tec.mx',3,NULL,1,1,1,1);
/*!40000 ALTER TABLE `md1_evalua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_jurado`
--

DROP TABLE IF EXISTS `md1_jurado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_jurado` (
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `contraseña` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`correo`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_jurado`
--

LOCK TABLES `md1_jurado` WRITE;
/*!40000 ALTER TABLE `md1_jurado` DISABLE KEYS */;
INSERT INTO `md1_jurado` VALUES ('ferdiaz@gmail.com','Fernando Díaz Guerrero','**********'),('josehdz@tec.mx','José Hernández López','*********'),('luismtz@gmail.com','Luis Alberto Martínez Castro','*********'),('samuelgonz@tec.mx','Samuel González Pérez','***********');
/*!40000 ALTER TABLE `md1_jurado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_modifica`
--

DROP TABLE IF EXISTS `md1_modifica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_modifica` (
  `idProyecto` int NOT NULL,
  `idAlumno` char(9) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`,`idAlumno`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `md1_modifica_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_modifica_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `md1_proyecto` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_modifica`
--

LOCK TABLES `md1_modifica` WRITE;
/*!40000 ALTER TABLE `md1_modifica` DISABLE KEYS */;
/*!40000 ALTER TABLE `md1_modifica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_proyecto`
--

DROP TABLE IF EXISTS `md1_proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_proyecto` (
  `id` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `area estrategica` varchar(50) DEFAULT NULL,
  `correoLider` varchar(20) DEFAULT NULL,
  `correoProfesor` varchar(20) DEFAULT NULL,
  `nivel` varchar(30) DEFAULT NULL,
  `promedio` double DEFAULT NULL,
  `componeteDeEmprendimiento` tinyint(1) DEFAULT NULL,
  `idEdicion` varchar(5) DEFAULT NULL,
  `autorizado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEdicion` (`idEdicion`),
  KEY `correoLider` (`correoLider`),
  KEY `correoProfesor` (`correoProfesor`),
  CONSTRAINT `md1_proyecto_ibfk_1` FOREIGN KEY (`idEdicion`) REFERENCES `md1_edicion` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_proyecto_ibfk_2` FOREIGN KEY (`correoLider`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_proyecto_ibfk_3` FOREIGN KEY (`correoProfesor`) REFERENCES `md1_docente` (`nomina`) ON DELETE RESTRICT ON UPDATE CASCADE
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_proyecto`
--

LOCK TABLES `md1_proyecto` WRITE;
/*!40000 ALTER TABLE `md1_proyecto` DISABLE KEYS */;
INSERT INTO `md1_proyecto` VALUES (1,'Reciclaje de la Naturaleza','Naturaleza','Bio','A01742069','claudia.v@tec.mx','Prototipo',NULL,1,'FJ 23',1),(2,'Nerds 4 Nerds','Tecnologia','Cyber','A01736106','d.perez@tec.mx','Producto Terminado',NULL,0,'FJ 23',1),(3,'Programming AI','Tecnologia','Cyber','A01735839','d.perez@tec.mx','Conceptual',NULL,0,'FJ 23',1),(4,'Natural Databases','Tecnologia','Cyber','A01736279','r.paredes@tec.mx','Prototipo',NULL,1,'FJ 23',NULL);
/*!40000 ALTER TABLE `md1_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_registra`
--

DROP TABLE IF EXISTS `md1_registra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_registra` (
  `idProyecto` int NOT NULL,
  `idAlumno` char(9) NOT NULL,
  `companero1` char(9) DEFAULT NULL,
  `companero2` char(9) DEFAULT NULL,
  `companero3` char(9) DEFAULT NULL,
  `companero4` char(9) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`,`idAlumno`),
  KEY `companero4` (`companero4`),
  KEY `companero1` (`companero1`),
  KEY `idAlumno` (`idAlumno`),
  KEY `companero3` (`companero3`),
  KEY `companero2` (`companero2`),
  CONSTRAINT `md1_registra_ibfk_1` FOREIGN KEY (`companero4`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_registra_ibfk_2` FOREIGN KEY (`companero1`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_registra_ibfk_3` FOREIGN KEY (`idAlumno`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_registra_ibfk_4` FOREIGN KEY (`companero3`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_registra_ibfk_5` FOREIGN KEY (`idProyecto`) REFERENCES `md1_proyecto` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `md1_registra_ibfk_6` FOREIGN KEY (`companero2`) REFERENCES `md1_estudiante` (`matricula`) ON DELETE RESTRICT ON UPDATE CASCADE
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_registra`
--

LOCK TABLES `md1_registra` WRITE;
/*!40000 ALTER TABLE `md1_registra` DISABLE KEYS */;
/*!40000 ALTER TABLE `md1_registra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md1_uf`
--

DROP TABLE IF EXISTS `md1_uf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `md1_uf` (
  `clave` varchar(15) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`clave`)
) 
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md1_uf`
--

LOCK TABLES `md1_uf` WRITE;
/*!40000 ALTER TABLE `md1_uf` DISABLE KEYS */;
/*!40000 ALTER TABLE `md1_uf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trans_transactions`
--

