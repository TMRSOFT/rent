-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2016 a las 10:54:52
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
  `condicion` varchar(20) NOT NULL,
  `foto` blob NOT NULL,
  `estado` int(1) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`placa`, `modelo`, `fkmarca`, `fktipo_auto`, `ano`, `motor`, `color`, `nro_puertas`, `capacidad`, `precio_por_dia`, `tipo_combustible`, `capacidad_combustible`, `tipo_caja`, `condicion`, `foto`, `estado`, `fkempresa`) VALUES
('123-TUV', 'Celerio', 1, 1, 2015, '998 cilindradas', 'rojo', 5, 4, 10, 'gasolina', 10, 'mecanica', 'buena', '', 0, 1);

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
(1, 123456, 'Luis Daniel', 'Lopez Sandi', 123, 'luiyicpu@hotmail.com', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`pkempresa`, `nombre`, `correo`, `pagina_web`, `administrador_nombre`, `administrador_apellido`, `administrador`, `plan`, `llave`, `estado`) VALUES
(1, 'yoloxxx420', 'rentas_santa_cruz@hotmail.com', 'www.rentas-santa-cruz.com', 'luis daniel', 'lopez sandi', 'luis', 'free', 'xxxyolo420', 1),
(2, 'gatosoft', 'gato@hotmail.com', 'www.gato.com', 'eddy', 'cuervo', 'www.gato.com', 'free', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`pkmarca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`pkmarca`, `nombre`, `pais`, `fkempresa`) VALUES
(1, 'Toyota', 'Japon', 1);

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
  `fkauto` varchar(8) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`pkreserva`, `fecha_ini`, `fecha_fin`, `precio`, `fkcliente`, `fkauto`, `fkempresa`) VALUES
(1, '2016-06-23', '2016-06-23', 666, 1, '123-TUV', 1),
(2, '2016-06-23', '2016-06-23', 0, 1, '123-TUV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_auto`
--

CREATE TABLE IF NOT EXISTS `tipo_auto` (
`pktipo_auto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_auto`
--

INSERT INTO `tipo_auto` (`pktipo_auto`, `nombre`, `fkempresa`) VALUES
(1, 'auto familiar', 1);

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
MODIFY `pkempresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `pkmarca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
MODIFY `pkreserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_auto`
--
ALTER TABLE `tipo_auto`
MODIFY `pktipo_auto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
