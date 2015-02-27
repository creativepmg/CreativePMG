-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2015 a las 13:22:27
-- Versión del servidor: 5.5.42-cll
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `creative_main`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_CLIENTE` int(9) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE` varchar(500) NOT NULL,
  `NUMERO_CELULAR` varchar(11) NOT NULL,
  `EMAIL_CLIENTE` varchar(500) NOT NULL,
  `FOTO_CLIENTE` varchar(500) NOT NULL,
  `ID_USUARIO` int(9) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `NUMERO_CELULAR`, `EMAIL_CLIENTE`, `FOTO_CLIENTE`, `ID_USUARIO`, `FECHA_REGISTRO`) VALUES
(1, 'Jose Luis Rodriguez Loaiza', '51981352709', 'burngeek8@gmail.com', 'user.png', 1, '2015-02-18 17:53:11'),
(2, 'phillip', '3023390742', 'phillipmg.15@gmail.com', 'user.png', 2, '2015-02-18 23:06:52'),
(3, 'bernardo gobines', '3025690969', 'gobines20bernardo@gmail.com', 'user.png', 0, '2015-02-19 23:20:11'),
(4, 'AXEL velasquez', '4107257005', 'no tiene', 'user.png', 0, '2015-02-20 22:20:04'),
(5, 'carlos alfaro', '3028535262', 'carlosmanolo8@hotmail.com', 'user.png', 0, '2015-02-20 22:36:13'),
(6, 'jose ramirez', '3029438262', 'no tieneee', 'user.png', 0, '2015-02-21 20:13:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(300) NOT NULL,
  `PEDIDO` text NOT NULL,
  `FECHA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden_servicio`
--

CREATE TABLE IF NOT EXISTS `detalle_orden_servicio` (
  `ID_ORDEN_SERVICIO` int(9) NOT NULL AUTO_INCREMENT,
  `ITEM` int(9) NOT NULL,
  `DETALLE` varchar(500) NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  `FECHA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_ORDEN_SERVICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda_cliente`
--

CREATE TABLE IF NOT EXISTS `deuda_cliente` (
  `ID_DEUDA` int(9) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` varchar(500) NOT NULL,
  `DETALLE` varchar(1000) NOT NULL,
  `MONTO` decimal(10,2) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_DEUDA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `ID_MENU` int(9) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(500) NOT NULL,
  `URL` varchar(500) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_MENU`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`ID_MENU`, `DESCRIPCION`, `URL`, `FECHA_REGISTRO`) VALUES
(1, 'MANTENIMIENTO MENUS', 'mantenimiento-menus', '2015-02-07 14:21:01'),
(2, 'MANTENIMIENTO USUARIOS', 'mantenimiento-usuarios', '2015-02-07 17:11:08'),
(3, 'CLIENTES', 'clientes', '2015-02-10 15:00:36'),
(4, 'MANTENIMIENTO SERVICIOS', 'mantenimiento-servicios', '2015-02-13 20:07:33'),
(5, 'ORDENES DE SERVICIO', 'orden-servicio', '2015-02-19 21:41:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `ID_NOTIFICACION` int(9) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(500) NOT NULL,
  `LEIDO` int(1) NOT NULL,
  `ID_RECEPTOR` int(9) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_NOTIFICACION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`ID_NOTIFICACION`, `DESCRIPCION`, `LEIDO`, `ID_RECEPTOR`, `FECHA_REGISTRO`) VALUES
(1, 'El usuario burngeek8 se ha unido a nuestra familia', 0, 1, '2015-02-16 03:54:03'),
(2, 'El usuario filimg017 se ha unido a nuestra familia', 0, 1, '2015-02-16 04:32:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_servicio`
--

CREATE TABLE IF NOT EXISTS `orden_servicio` (
  `ID_ORDEN_SERVICIO` int(9) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(9) NOT NULL,
  `DETALLE` text NOT NULL,
  `A_CUENTA` decimal(10,2) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL,
  `ESTADO` int(1) NOT NULL,
  `FECHA_REGISTRO_ORDEN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_ORDEN_SERVICIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `orden_servicio`
--

INSERT INTO `orden_servicio` (`ID_ORDEN_SERVICIO`, `ID_CLIENTE`, `DETALLE`, `A_CUENTA`, `TOTAL`, `ESTADO`, `FECHA_REGISTRO_ORDEN`) VALUES
(1, 1, '    El mejor de mis clientes, ahora me debes 12 horas\r\nAhahhja ctvda -_-', '0.00', '60.00', 1, '2015-02-19 22:11:39'),
(3, 3, ' creacion de cuenta gmail y restauracion de telefono 30$ y correo es \r\ngobines20bernardo@gmail.com\r\npass : bernardo20', '30.00', '30.00', 1, '2015-02-19 23:21:23'),
(4, 4, ' pieza de galaxy s2 ! dejo 20$ 21 dar respuesta de llegada de repuesto ! debe 30 $', '20.00', '50.00', 0, '2015-02-20 22:20:33'),
(5, 5, ' reseteo de iphone 4 ! \r\nverizon 25 $ entrega de inmediata ! (cerrado)', '25.00', '25.00', 1, '2015-02-20 22:36:41'),
(8, 6, '  Reparacion de charguing port iPhone 4', '20.00', '40.00', 1, '2015-02-21 20:13:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_registro`
--

CREATE TABLE IF NOT EXISTS `pre_registro` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `CONFIRMADO` int(1) NOT NULL,
  `FECHA_RAGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pre_registro`
--

INSERT INTO `pre_registro` (`ID`, `EMAIL`, `CONFIRMADO`, `FECHA_RAGISTRO`) VALUES
(1, 'burngeek8@gmail.com', 1, '2015-02-16 03:51:44'),
(2, 'phillipmg.15@gmail.com', 1, '2015-02-16 04:31:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `ID_SERVICIO` int(9) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(500) NOT NULL,
  `COSTO` decimal(10,2) NOT NULL,
  `PRECIO_VENTA` decimal(10,2) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_REGISTRANTE` int(9) NOT NULL,
  PRIMARY KEY (`ID_SERVICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIO` int(9) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(500) NOT NULL,
  `USER` varchar(50) NOT NULL,
  `PASS` varchar(100) NOT NULL,
  `AVATAR_USUARIO` varchar(100) NOT NULL,
  `CATEGORIA` int(9) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `EMAIL`, `USER`, `PASS`, `AVATAR_USUARIO`, `CATEGORIA`, `FECHA_REGISTRO`) VALUES
(1, 'burngeek8@gmail.com', 'burngeek8', 'w8uiq9da', 'user.png', 2, '2015-02-16 03:54:03'),
(2, 'phillipmg.15@gmail.com', 'filimg017', 'phillip1707', 'user.png', 2, '2015-02-16 04:32:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_menu`
--

CREATE TABLE IF NOT EXISTS `usuario_menu` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_MENU` (`ID_MENU`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `usuario_menu`
--

INSERT INTO `usuario_menu` (`ID`, `ID_USUARIO`, `ID_MENU`) VALUES
(27, 1, 2),
(26, 1, 3),
(25, 1, 4),
(24, 1, 5),
(35, 2, 3),
(28, 1, 1),
(34, 2, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
