-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2025 a las 13:34:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reciclaje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_vecino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha_pedido`, `id_estado`, `id_vecino`) VALUES
(1, '2025-02-24', 1, 1),
(2, '2025-02-24', 1, 1),
(3, '2025-02-24', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `material` varchar(150) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_detalle`
--

INSERT INTO `pedidos_detalle` (`id`, `id_pedido`, `material`, `cantidad`, `tipo`) VALUES
(1, 3, '1111', 22, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_estado`
--

CREATE TABLE `pedidos_estado` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_estado`
--

INSERT INTO `pedidos_estado` (`id`, `estado`) VALUES
(1, 'Solicitado'),
(2, 'En proceso'),
(7, 'Cumplido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `contacto` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `DNI` varchar(50) DEFAULT NULL,
  `legajo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_estado`
--
ALTER TABLE `pedidos_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos_estado`
--
ALTER TABLE `pedidos_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
