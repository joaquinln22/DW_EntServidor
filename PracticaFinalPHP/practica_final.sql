-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2024 a las 23:19:36
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

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
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `estado` enum('abierta','ocupada','pagada') COLLATE utf8_spanish_ci NOT NULL,
  `comensales` int(11) NOT NULL,
  `creacion_mesa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `estado`, `comensales`, `creacion_mesa`) VALUES
(1, 'abierta', 0, '2024-11-19 21:15:42'),
(2, 'ocupada', 5, '2024-11-26 09:08:31'),
(3, 'ocupada', 4, '2024-12-17 14:51:00'),
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
  `mesa_id` int(11) DEFAULT NULL,
  `camarero_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('pendiente','pagado') COLLATE utf8_spanish_ci NOT NULL,
  `creacion_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` enum('Entrantes','Principales','Postres','Bedidas') COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `imagen`, `nombre`, `categoria`, `precio`, `descripcion`, `stock`) VALUES
(1, 'images/tequeños.png', 'Tequeños', 'Entrantes', 3, 'Palitos de queso recubiertos con masa de hojaldre. (6 uds)', 75),
(2, 'images/burguer.png', 'McGlouber', 'Principales', 12, 'Doble carne de ternera con extra de salsa blanca secreta, tomate, lechuga y cheddar.', 30),
(3, 'images/burguer.png', 'Black Mamba', 'Principales', 13, 'Una carne de 200gr., queso curado y extra de salsa secreta Desty.', 20),
(4, 'images/burguer.png', 'López burguer', 'Principales', 12.5, 'burguer clásica elaborada con ingredientes 100% autóctonos de las tierras de Calasparra.', 25),
(6, 'images/burguer.png', 'Taco\'s burguer', 'Principales', 12.5, 'Fusión de culturas en una hamburguesa con ingredientes propios del Steven con el añadido de una salsa especial de origen ecuatoriano.', 20),
(7, 'images/burguer.png', 'LGTÜ burguer', 'Principales', 15.75, 'Doble carne extra gorda con ingredientes recolectados por nosotros mismos de la huerta y con salsas ultra secretas.', 15),
(8, 'images/burguer.png', 'B.I.G.', 'Principales', 30, 'Hamburguesa de tres kilos de Angus con salsa de la casa y grandes cantidades de condumio local.', 15),
(9, 'images/burguer.png', 'Especial Boatiah', 'Principales', 21.25, 'Limitado su consumo a una por cliente al día. Cuenta con 4 carnes smash con extra de salsa de queso y una loncha de queso americano con cada carne.', 30),
(10, 'images/burguer.png', 'Sor Candelaria Deluxe', 'Principales', 12.5, 'Pieza de pollo rebozada en la abadía de Nuestra Señora de los Candelabros, con nuestro pan especial horneado en el santuario de Caravaca y salsa barbacoa ahumada con madera de roble murciano.', 12),
(11, 'images/burguer.png', 'La cuchi cuchi', 'Principales', 18.25, 'Una burguer obesa, triple smash de borrico murciano y mayonesa de pies a cabeza.', 10),
(12, 'images/burguer.png', 'La morcillona', 'Principales', 19.5, 'Una burger que te hace entrar en modo gorrino, hecha de múltiples carnes y grasa compactada con las manos de nuestra cocinera más veterana. Con una morcilla de burgos como acompañamiento.', 30),
(13, 'images/tarta_queso.png', 'Tarta de queso', 'Postres', 5, 'Porción de tarta de queso con mermelada de arándanos.', 30),
(16, 'images/patatas.png', 'Patatas fritas', 'Entrantes', 1.5, 'Ración de patatas extra crujientes al punto de sal.', 100),
(18, 'images/soda.png', 'Refresco', 'Bedidas', 1.5, 'Refresco a elegir entre la variedad disponible en nuestro surtidor, coca-cola (zero y zero-zero, también), seven-up, fanta de naranja y limón, nestea.', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_pedido`
--

DROP TABLE IF EXISTS `producto_pedido`;
CREATE TABLE `producto_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `notas` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('pendiente','en cocina') COLLATE utf8_spanish_ci NOT NULL,
  `agregado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto_pedido`
--

INSERT INTO `producto_pedido` (`id`, `pedido_id`, `producto_id`, `mesa_id`, `cantidad`, `notas`, `estado`, `agregado_en`) VALUES
(11, 0, 1, 3, 2, '', 'pendiente', '2024-12-17 22:04:32'),
(12, 0, 16, 3, 1, '', 'pendiente', '2024-12-17 22:07:33'),
(14, 0, 2, 3, 1, '', 'pendiente', '2024-12-17 22:14:09'),
(15, 0, 18, 3, 1, '', 'pendiente', '2024-12-17 22:15:38'),
(16, 0, 13, 3, 1, '', 'pendiente', '2024-12-17 22:16:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('camarero','encargado') COLLATE utf8_spanish_ci NOT NULL,
  `creacion_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `nombre`, `apellidos`, `edad`, `dni`, `foto`, `contraseña`, `rol`, `creacion_usuario`) VALUES
(1, 'joaquinln22', 'Joaquín', 'Lorca Nieto', 22, '49195871k', NULL, '123', 'encargado', '2024-12-17 13:31:36'),
(2, 'alex33', 'Alejandro', 'Garay Lopez', 22, '48175661j', NULL, 'Alicates33', 'camarero', '2024-12-17 13:32:14'),
(3, 'maria111', 'María', 'Bermejo', 22, '56723445l', NULL, 'Martillo33', 'camarero', '2024-12-17 13:33:41'),
(4, 'matias66', 'Matías', 'Rodenas Contreras', 22, '98712345f', NULL, 'Destornillador33', 'camarero', '2024-12-17 13:34:18'),
(5, 'desty69', 'Destiny Asosa', 'Okuns Okpaka', 23, '86742378g', NULL, 'Berengena33', 'camarero', '2024-12-17 13:35:01'),
(6, 'MontyB', 'Adrián', 'Montero Mondejas', 23, '56798398d', NULL, 'Teken33', 'camarero', '2024-12-17 13:35:39'),
(7, 'TacoCBR', 'Steven Alexander', 'Taco Nenger', 22, '67832679u', NULL, 'Burguer33', 'encargado', '2024-12-17 13:36:27'),
(8, 'GalleGOL', 'Jose Manuel', 'Gallego', 23, '76534589p', NULL, 'Telepi', 'encargado', '2024-12-17 13:39:36');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id`) REFERENCES `producto_pedido` (`pedido_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`mesa_id`) REFERENCES `mesas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_pedido`
--
ALTER TABLE `producto_pedido`
  ADD CONSTRAINT `producto_pedido_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
