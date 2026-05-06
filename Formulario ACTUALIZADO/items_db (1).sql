-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2026 a las 23:40:47
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
-- Base de datos: `items_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `dni`, `email`, `password`, `phone`, `location`, `created_date`, `created_time`) VALUES
(2, 'Jose', '76276372', 'Jose@gmail.com', '$2y$10$/1AglIR1Y9kIF0TWf7RMBO.w3loR1yYDZJXrLoKEtDoBKXXjDB2Ji', '3438762732', 'Crespo', '2026-04-22', '20:11:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE `prestadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`id`, `name`, `description`, `category`, `location`, `email`, `password`, `phone`, `user_name`, `dni`, `created_date`, `created_time`) VALUES
(18, 'Albañil', 'Soy rápido y cobro barato.', 'hogar', 'Crespo Entre Rios', 'martin98@gmail.com', '$2y$10$Botrp27dCikhtH8cMbIqquMNqL5U/aWI2EmWfAWVUWkxGurgTaiV.', '3438746292', 'Martin', '38982378', '2026-04-21', '17:51:00'),
(19, 'Carpintero', 'hago muebles bonitos', 'hogar', 'Crespo Entre Rios', 'askjdhakjdh@gmail.com', '$2y$10$e89yOPuSm62SfdgszoKSP.KZYXFPTev5sil8xtspDpnJ.L67ulSbm', '3438712831', 'Juan', '34876382', '2026-04-22', '19:17:00'),
(20, 'Electricista', 'Cobro barato', 'hogar', 'Crespo', 'martina@gmail.com', '$2y$10$c707djKwLl0MraB0/nP7le5av2g8iWWjzZwWXt9ze6zZ5QWGSbCle', '3439872621', 'Martina', '87765647', '2026-04-22', '20:13:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_email` (`email`),
  ADD UNIQUE KEY `idx_dni` (`dni`),
  ADD KEY `idx_name` (`name`);

--
-- Indices de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_email` (`email`),
  ADD UNIQUE KEY `idx_dni` (`dni`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_user_name` (`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
