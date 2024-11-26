-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 14:37:23
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
-- Base de datos: `practica_final`
--
CREATE DATABASE IF NOT EXISTS `practica_final` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `practica_final`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pedidos`
--

DROP TABLE IF EXISTS `historial_pedidos`;
CREATE TABLE `historial_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `pagado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `estado` enum('abierta','ocupada','pagada') NOT NULL,
  `comensales` int(11) NOT NULL,
  `creacion_mesa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `estado`, `comensales`, `creacion_mesa`) VALUES
(1, 'abierta', 0, '2024-11-19 21:15:42'),
(2, 'ocupada', 5, '2024-11-26 09:08:31'),
(3, 'abierta', 0, '2024-11-19 21:18:58'),
(4, 'abierta', 0, '2024-11-19 22:33:08'),
(5, 'ocupada', 3, '2024-11-19 23:02:51'),
(6, 'abierta', 0, '2024-11-20 18:37:01'),
(7, 'abierta', 0, '2024-11-20 18:37:01'),
(8, 'abierta', 0, '2024-11-20 18:37:38'),
(9, 'abierta', 0, '2024-11-20 18:37:38'),
(10, 'abierta', 0, '2024-11-20 18:37:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `camarero_id` int(11) NOT NULL,
  `estado` enum('pendiente','en_preparacion','servido') NOT NULL,
  `creacion_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enviado_a_cocina` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` enum('Entrantes','Principales','Postres','') NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `disponible` enum('disponible','no disponible') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `descripcion`, `disponible`) VALUES
(1, 'McGlouber', 'Principales', 12, 'Doble carne de ternera con extra de salsa blanca secreta, tomate, lechuga y cheddar.', 'disponible'),
(2, 'Black Mamba', 'Principales', 13, 'Una carne de 200gr., queso curado y extra de salsa secreta Desty.', 'disponible'),
(3, 'López burguer', 'Principales', 12.5, 'burguer clásica elaborada con ingredientes 100% autóctonos de las tierras de Calasparra.', 'disponible'),
(4, 'Taco\'s burguer', 'Principales', 12.5, 'Fusión de culturas en una hamburguesa con ingredientes propios del Steven con el añadido de una salsa especial de origen ecuatoriano.', 'disponible'),
(5, 'LGTÜ burguer', 'Principales', 15.75, 'Doble carne extra gorda con ingredientes recolectados por nosotros mismos de la huerta y con salsas ultra secretas.', 'disponible'),
(6, 'B.I.G.', 'Principales', 30, 'Hamburguesa de tres kilos de Angus con salsa de la casa y grandes cantidades de condumio local.', 'disponible'),
(7, 'Especial Boatiah', 'Principales', 21.25, 'Limitado su consumo a una por cliente al día. Cuenta con 4 carnes smash con extra de salsa de queso y una loncha de queso americano con cada carne.', 'disponible'),
(8, 'Sor Candelaria Deluxe', 'Principales', 12.5, 'Pieza de pollo rebozada en la abadía de Nuestra Señora de los Candelabros, con nuestro pan especial horneado en el santuario de Caravaca y salsa barbacoa ahumada con madera de roble murciano.', 'disponible'),
(9, 'La cuchi cuchi', 'Principales', 18.25, 'Una burguer obesa, triple smash de borrico murciano y mayonesa de pies a cabeza.', 'disponible'),
(10, 'La morcillona', 'Principales', 19.5, 'Una burger que te hace entrar en modo gorrino, hecha de múltiples carnes y grasa compactada con las manos de nuestra cocinera más veterana. Con una morcilla de burgos como acompañamiento.', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_pedido`
--

DROP TABLE IF EXISTS `producto_pedido`;
CREATE TABLE `producto_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `notas` varchar(200) NOT NULL,
  `estado` enum('pendiente','en cocina','listo') NOT NULL,
  `agregado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` enum('camarero','encargado') NOT NULL,
  `creacion_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`, `rol`, `creacion_usuario`) VALUES
(1, 'joaquinln22', '123', 'encargado', '2024-11-18 08:41:34'),
(2, 'alex33', 'Alicates33', 'camarero', '2024-11-18 08:41:34'),
(3, 'maria111', 'Martillo33', 'camarero', '2024-11-18 08:41:34'),
(4, 'matias66', 'Destornillador33', 'camarero', '2024-11-18 08:41:34'),
(5, 'desty69', 'Berengena33', 'camarero', '2024-11-18 08:41:34'),
(6, 'MontyB', 'Teken33', 'camarero', '2024-11-18 08:41:34'),
(7, 'TacoCBR', 'Burguer33', 'encargado', '2024-11-18 08:41:34'),
(8, 'GalleGOL', 'Telepi', 'encargado', '2024-11-18 08:41:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_pedidos`
--
ALTER TABLE `historial_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `camarero_id` (`camarero_id`),
  ADD KEY `mesa_id` (`mesa_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_pedidos`
--
ALTER TABLE `historial_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`camarero_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`mesa_id`) REFERENCES `mesas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id`) REFERENCES `producto_pedido` (`pedido_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD CONSTRAINT `producto_pedido_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
