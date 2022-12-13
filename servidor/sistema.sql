-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2022 a las 22:53:24
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
-- Base de datos: `sistema`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_email` VARCHAR(255), IN `param_pass` VARCHAR(255))   BEGIN
    
       SET @s=CONCAT("SELECT count(* )FROM usuarios
                     WHERE email = '", param_email ,"' AND password= '" , param_pass,"'");
                     
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords`
--

CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `passwords`
--

INSERT INTO `passwords` (`id`, `email`, `token`, `codigo`, `fecha`) VALUES
(2, 'grijalvaromero@gmail.com', 'afef4689f3', 6598, '2021-03-18 03:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `confirmado` varchar(20) NOT NULL,
  `codigo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `confirmado`, `codigo`) VALUES
(2, 'Benito1', 'grijalvaromero@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'no', 1147),
(3, 'dianitza', 'dianitza1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 791300),
(4, 'dianitza', 'dianitza1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 536812),
(5, 'dianitza', 'dianitza1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 163381),
(8, 'dianitza', 'dianitza17@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 193379),
(9, 'dianitza', 'dianitzaqiu17@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 643747),
(10, 'dianitza', 'dianitzaqiu1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'si', 461920),
(11, 'dianitza', 'dianitzaqiu1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'si', 211710),
(12, 'dianitza', 'dianitza1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 575322),
(13, 'dianitza', 'dianitza1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'no', 512244),
(14, 'dianitza', 'dianitzaqiu1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'si', 898469),
(15, 'dianitza', 'dianitzaqiu1714@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'si', 924982),
(16, 'dianitza', 'dianitzaqiu1714@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'si', 667741),


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE usuarios ADD PRIMARY KEY id;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;


ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
