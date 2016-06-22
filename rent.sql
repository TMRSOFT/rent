-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2016 a las 07:58:54
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rent`
--
CREATE DATABASE IF NOT EXISTS `rent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rent`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `placa` varchar(8) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `fkmarca` int(11) NOT NULL,
  `fktipo_auto` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `nro_puertas` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `precio_por_dia` int(11) NOT NULL,
  `tipo_combustible` varchar(20) NOT NULL,
  `capacidad_combustible` int(11) NOT NULL,
  `tipo_caja` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `foto` blob NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`placa`, `modelo`, `fkmarca`, `fktipo_auto`, `ano`, `motor`, `color`, `nro_puertas`, `capacidad`, `precio_por_dia`, `tipo_combustible`, `capacidad_combustible`, `tipo_caja`, `estado`, `foto`, `fkempresa`) VALUES
('123-ABC', 'corolla', 1, 1, 2000, 'kiki', 'rojo', 4, 4, 10, 'gasolina', 10, 'manual', 'bueno', '', 1),
('3767DGX', 'Celerio', 4, 4, 2015, '998 cilindradas', 'gris', 5, 5, 49, 'gasolina', 30, 'mecanica', 'bueno', 0x433a5c66616b65706174685c31333137373735305f313131343036343639313937303730365f323235353038313938363533393632383032385f6e2e706e67, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`pkcliente` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`pkcliente`, `ci`, `nombre`, `apellido`, `telefono`, `correo`, `fkempresa`) VALUES
(1, 8258293, 'Luis Daniel', 'Lopez Sandi', 67770288, 'luiyicpu@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`pkempresa` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pagina_web` varchar(100) NOT NULL,
  `administrador_nombre` varchar(50) NOT NULL,
  `administrador_apellido` varchar(50) NOT NULL,
  `administrador` varchar(50) NOT NULL,
  `plan` varchar(30) NOT NULL,
  `llave` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`pkempresa`, `nombre`, `correo`, `pagina_web`, `administrador_nombre`, `administrador_apellido`, `administrador`, `plan`, `llave`, `estado`) VALUES
(1, 'rentas santa cruz', 'rentas_santa_cruz@hotmail.com', 'www.rentas-santa-cruz.com', 'luis daniel', 'lopez sandi', 'luis', 'free', 'xxxyolo420', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`pkmarca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`pkmarca`, `nombre`, `pais`, `fkempresa`) VALUES
(1, 'Toyota', 'Japon', 1),
(2, 'Nissan', 'Japon', 1),
(3, 'Honda', 'China', 1),
(4, 'Susuki', 'Japon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
`pkreserva` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` int(11) NOT NULL,
  `fkcliente` int(11) NOT NULL,
  `fkauto` int(11) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`pkreserva`, `fecha_ini`, `fecha_fin`, `precio`, `fkcliente`, `fkauto`, `fkempresa`) VALUES
(1, '2016-06-22', '2016-06-25', 30, 1, 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_auto`
--

CREATE TABLE IF NOT EXISTS `tipo_auto` (
`pktipo_auto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_auto`
--

INSERT INTO `tipo_auto` (`pktipo_auto`, `nombre`, `fkempresa`) VALUES
(1, 'Vagoneta', 1),
(2, 'Micro', 1),
(3, 'Camioneta', 1),
(4, 'Familiar', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto`
--
ALTER TABLE `auto`
 ADD PRIMARY KEY (`placa`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`pkcliente`), ADD KEY `pkcliente` (`pkcliente`), ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`pkempresa`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`pkmarca`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`pkreserva`);

--
-- Indices de la tabla `tipo_auto`
--
ALTER TABLE `tipo_auto`
 ADD PRIMARY KEY (`pktipo_auto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `pkcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
MODIFY `pkempresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `pkmarca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
MODIFY `pkreserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_auto`
--
ALTER TABLE `tipo_auto`
MODIFY `pktipo_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
