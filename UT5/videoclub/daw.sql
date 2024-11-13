-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 02:21:06
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
-- Base de datos: `daw`
--
CREATE DATABASE IF NOT EXISTS `daw` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `daw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ejemplares` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `ejemplares`) VALUES
(1, 'Titanic', 'Un barco muy grande se hunde y muere gente.', 10),
(2, 'One Piece Film RED', 'Se celebra una macro reunión pirata, la cual resulta ser una trampa para nuestros piratas.', 6),
(3, 'Star Wars III', 'La República se desmorona bajo los ataques del despiadado Lord Sith, el conde Dooku.', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_alquiladas`
--

DROP TABLE IF EXISTS `peliculas_alquiladas`;
CREATE TABLE `peliculas_alquiladas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas_alquiladas`
--

INSERT INTO `peliculas_alquiladas` (`id`, `id_usuario`, `id_pelicula`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `clave`, `rol`) VALUES
(1, 'Joaquín Lorca Nieto', 'joaquinlorcanieto@gmail.com', '123j', 'usuario'),
(2, 'Alejandro Garay Lopez', 'jdprogramer@gmail.com', '123a', 'usuario'),
(5, 'Steven Alexander Taco Nenger', 'steventaco@gmail.com', '123s', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  ADD CONSTRAINT `peliculas_alquiladas_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_alquiladas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
