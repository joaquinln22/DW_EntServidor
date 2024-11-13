-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 14:34:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

DROP TABLE IF EXISTS `alquileres`;
CREATE TABLE `alquileres` (
  `id_alquiler` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_libro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `fecha_publi` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`titulo`, `autor`, `fecha_publi`, `estado`) VALUES
('Quijote', 'Cervantes', '02/05/1568', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id_alquiler`),
  ADD KEY `id_usuario` (`id_usuario`,`titulo_libro`),
  ADD KEY `titulo_libro` (`titulo_libro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`titulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id_alquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`titulo_libro`) REFERENCES `libros` (`titulo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
