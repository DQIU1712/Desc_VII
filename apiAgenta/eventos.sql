-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 20:52:46
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendadigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_ev` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `fecha_inicial` datetime NOT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `ubicacion` varchar(220) DEFAULT NULL,
  `detalle` varchar(220) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `rep_dia` varchar(20) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_ev`, `titulo`, `fecha_inicial`, `fecha_final`, `ubicacion`, `detalle`, `correo`, `rep_dia`, `categoria`) VALUES
(1, 'Entreno de football', '2022-10-25 08:45:00', '2022-10-25 08:45:00', 'Los Andes', 'Práctica de football con el equipo', ' ', 'no', 'deportes'),
(4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '0', ''),
(5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '0', ''),
(6, 'Del estudio', '2022-11-16 00:00:00', '2022-11-16 00:00:00', 'utp', 'estudiar', 'sj@gmail.com', '1', 'Escuela'),
(7, 'Del estudio', '2022-11-16 00:00:00', '2022-11-16 00:00:00', 'utp', 'estudiar', 'sj@gmail.com', '1', 'Escuela'),
(8, 'Parcial', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'utp', 'Parcial', 'Juan@gmail.com', '2', 'Estudio'),
(9, 'Prueba', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'utp', 'Prueba', 'Juan@gmail.com', '2', 'Prueba'),
(10, 'Prueba2', '2022-11-19 00:35:07', '2022-11-19 00:35:07', 'utp', 'Prueba', 'Juan@gmail.com', '2', 'Prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_ev`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
