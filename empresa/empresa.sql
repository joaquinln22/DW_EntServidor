-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 12:20:39
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
-- Base de datos: `empresa`
--
DROP DATABASE IF EXISTS `empresa`;
CREATE DATABASE IF NOT EXISTS `empresa` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `empresa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `numero_factura` varchar(10) NOT NULL,
  `fecha_factura` date NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_facturas`
--

CREATE TABLE `lineas_facturas` (
  `numero_linea` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `producto` varchar(20) NOT NULL,
  `descuento` double NOT NULL,
  `precio_unitario` double NOT NULL,
  `numero_factura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(6) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `descuento` double NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `producto`, `detalle`, `precio`, `descuento`, `imagen`) VALUES
('c001', 'Consola', 'PS5', 300, 2, 'images/c001.jpg'),
('c002', 'Impresora', 'A1', 100, 1, 'images/c002.jpg'),
('c003', 'Ordenador', 'Gaming', 1200, 4, 'images/c003.jpg'),
('c004', 'JoyCon', 'Nintendo', 60, 5, 'images/c004.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`numero_factura`);

--
-- Indices de la tabla `lineas_facturas`
--
ALTER TABLE `lineas_facturas`
  ADD PRIMARY KEY (`numero_linea`),
  ADD KEY `numero_factura` (`numero_factura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lineas_facturas`
--
ALTER TABLE `lineas_facturas`
  MODIFY `numero_linea` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_facturas`
--
ALTER TABLE `lineas_facturas`
  ADD CONSTRAINT `lineas_facturas_ibfk_1` FOREIGN KEY (`numero_factura`) REFERENCES `facturas` (`numero_factura`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
