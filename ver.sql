-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 15:11:46
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fer1fer1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ver`
--

CREATE TABLE `ver` (
  `idver` int(11) NOT NULL,
  `U` varchar(10) NOT NULL,
  `P` varchar(32) NOT NULL,
  `L` int(11) NOT NULL,
  `nreal` varchar(30) NOT NULL,
  `A` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ver`
--

INSERT INTO `ver` (`idver`, `U`, `P`, `L`, `nreal`, `A`) VALUES
(3, 'z', 'c4ca4238a0b923820dcc509a6f75849b', 4, 'ADRIAN', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
