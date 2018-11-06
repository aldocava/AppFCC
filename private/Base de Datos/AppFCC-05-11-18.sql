-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para mydb
DROP DATABASE IF EXISTS `mydb`;
CREATE DATABASE IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mydb`;

-- Volcando estructura para tabla mydb.academico
DROP TABLE IF EXISTS `academico`;
CREATE TABLE IF NOT EXISTS `academico` (
  `Id_Academico` int(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Academico`),
  KEY `fk_Academico_Usuarios1_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Academico_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `login` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.academico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `academico` DISABLE KEYS */;
/*!40000 ALTER TABLE `academico` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.anuncio
DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `Id_Anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` varchar(45) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Descripcion` tinytext NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  PRIMARY KEY (`Id_Anuncio`),
  KEY `fk_Anuncio_Usuarios1_idx` (`Usuarios_idUsuarios`),
  CONSTRAINT `fk_Anuncio_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `login` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.anuncio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.login
DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contraseña` varchar(70) NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.login: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.preferencias
DROP TABLE IF EXISTS `preferencias`;
CREATE TABLE IF NOT EXISTS `preferencias` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Tag` int(11) NOT NULL,
  PRIMARY KEY (`Id_Usuario`,`Id_Tag`),
  KEY `fk_Usuarios_has_Tag_Tag1_idx` (`Id_Tag`),
  KEY `fk_Usuarios_has_Tag_Usuarios1_idx` (`Id_Usuario`),
  CONSTRAINT `fk_Usuarios_has_Tag_Tag1` FOREIGN KEY (`Id_Tag`) REFERENCES `tag` (`Id_Tag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Tag_Usuarios1` FOREIGN KEY (`Id_Usuario`) REFERENCES `login` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.preferencias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `preferencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `preferencias` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Rol`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.roles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.rolusuarios
DROP TABLE IF EXISTS `rolusuarios`;
CREATE TABLE IF NOT EXISTS `rolusuarios` (
  `Id_Rol` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`Id_Rol`,`Id_Usuario`),
  KEY `fk_Roles_has_Usuarios_Usuarios1_idx` (`Id_Usuario`),
  KEY `fk_Roles_has_Usuarios_Roles1_idx` (`Id_Rol`),
  CONSTRAINT `fk_Roles_has_Usuarios_Roles1` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Roles_has_Usuarios_Usuarios1` FOREIGN KEY (`Id_Usuario`) REFERENCES `login` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.rolusuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `rolusuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolusuarios` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.tag
DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `Id_Tag` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.tag: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.tag_anuncio
DROP TABLE IF EXISTS `tag_anuncio`;
CREATE TABLE IF NOT EXISTS `tag_anuncio` (
  `Id_Anuncio` int(11) NOT NULL,
  `Id_Tag` int(11) NOT NULL,
  PRIMARY KEY (`Id_Anuncio`,`Id_Tag`),
  KEY `fk_Anuncio_has_Tag_Tag1_idx` (`Id_Tag`),
  KEY `fk_Anuncio_has_Tag_Anuncio1_idx` (`Id_Anuncio`),
  CONSTRAINT `fk_Anuncio_has_Tag_Anuncio1` FOREIGN KEY (`Id_Anuncio`) REFERENCES `anuncio` (`Id_Anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Anuncio_has_Tag_Tag1` FOREIGN KEY (`Id_Tag`) REFERENCES `tag` (`Id_Tag`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.tag_anuncio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tag_anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_anuncio` ENABLE KEYS */;

-- Volcando estructura para tabla mydb.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Nombre2` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Usuarios1` (`Usuarios_idUsuarios`) USING BTREE,
  CONSTRAINT `fk_Profesores_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `login` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mydb.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
