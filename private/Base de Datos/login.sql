-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2018 a las 05:39:40
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Id_Usuario` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contraseña` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Id_Usuario`, `Usuario`, `Correo`, `Contraseña`) VALUES
(1, 'appfcc', 'aldo.castvar@gmail.com', 'appfcc'),
(3, 'vdion', 'vic_dion@hotmail.com', '$2y$10$gqfsnFKN4lEG559/tkLwWeg9ul0l2SU55Ry5uSchAuoYksiIATWWS'),
(4, 'vflores', 'k_vif96@hotmail.com', '$2y$10$RdZDfkp69tV5kNYVqQgoU.8sElKqhVIaonSoYS/8X85YE8lW7tVNK'),
(5, 'jemorales', 'jhmorales@gmail.com', '$2y$10$PTHolexl8rTBL.9nrlMW9.JNRZizmDomDjQRpQxq2LvtatArnmYee'),
(6, 'acast', 'acava@gmail.com', '$2y$10$XMPP5pW7gQEacryzkNH/iebhpALqQlhq0lcN3WC4ghzlYucqUT4x6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
