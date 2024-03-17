-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2024 a las 21:17:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba-conocimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` bigint(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` int(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `edad`, `correo_electronico`, `telefono`, `direccion`, `ciudad`, `codigo_postal`, `pais`, `tipo_documento`, `fecha_expedicion`, `fecha_nacimiento`) VALUES
(9, 'hola', 'Tirado ', 22, 'mariotiradotovar@gmail.com', 3012598745, 'Carlos', 'Monteria', 230001, 'Colombia', 'Cédula de ciudadanía', '2024-03-12', '2024-03-29'),
(16, 'Carlos juan', 'Tirado', 25, 'juan@gmail.com', 3013325096, 'Carlos', 'Monteria', 230001, 'Colombia', 'Cédula de ciudadanía', '2024-03-05', '2024-03-23'),
(29, 'juan', 'Tirado ', 22, 'mariotiradotovar@gmail.com', 3012598745, 'Carlos', 'Monteria', 230001, 'Colombia', 'Cédula de ciudadanía', '2024-03-12', '2024-03-29'),
(30, 'ma', 'Tirado ', 22, 'mariotiradotovar@gmail.com', 3012598745, 'Carlos', 'Monteria', 230001, 'Colombia', 'Cédula de ciudadanía', '2024-03-12', '2024-03-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
