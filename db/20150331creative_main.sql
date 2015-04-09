-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2015 a las 18:03:14
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `NUMERO_CELULAR`, `EMAIL_CLIENTE`, `FOTO_CLIENTE`, `ID_USUARIO`, `FECHA_REGISTRO`) VALUES
(1, 'Jose Luis Rodriguez Loaiza', '51981352709', 'burngeek8@gmail.com', 'user.png', 1, '2015-02-18 17:53:11'),
(2, 'phillip', '3023390742', 'phillipmg.15@gmail.com', 'user.png', 2, '2015-02-18 23:06:52'),
(3, 'bernardo gobines', '3025690969', 'gobines20bernardo@gmail.com', 'user.png', 0, '2015-02-19 23:20:11'),
(4, 'AXEL velasquez', '4107257005', 'no tiene', 'user.png', 0, '2015-02-20 22:20:04'),
(5, 'carlos alfaro', '3028535262', 'carlosmanolo8@hotmail.com', 'user.png', 0, '2015-02-20 22:36:13'),
(6, 'jose ramirez', '3029438262', 'no tieneee', 'user.png', 0, '2015-02-21 20:13:12'),
(7, 'mario giovanny', '3027273339', 'NULL', 'user.png', 0, '2015-02-23 23:24:10'),
(8, 'arturo jimenez', '3028645327', 'NULL', 'user.png', 0, '2015-02-24 00:34:30'),
(9, 'omar ortiz', '3022602529', 'NULL', 'user.png', 0, '2015-02-24 16:36:52'),
(10, 'antonio mejia ambrosio', '3022604472', 'NULL', 'user.png', 0, '2015-02-24 22:20:08'),
(11, 'jose maldonado', '4104639800', 'NULL', 'user.png', 0, '2015-02-24 22:40:52'),
(12, 'domingos lorenzo', '3028589682', 'NULL', 'user.png', 0, '2015-02-25 01:14:17'),
(13, 'marielena', '99129121392', 'sjvnwjfvnw@gmail.com', 'user.png', 0, '2015-02-25 05:00:18'),
(14, 'maria chavez', '3023392586', 'NULL', 'user.png', 0, '2015-02-25 22:03:22'),
(15, 'rigoberto sanchez', '3022129121', 'rigorberto_sanchez@hotmail.com', 'user.png', 0, '2015-02-25 22:47:33'),
(16, 'albino', 'NULL', 'perez27albino', 'user.png', 0, '2015-02-27 01:16:28'),
(17, 'alejandro torres', '4108453598', 'torres2626alejandro@gmail.com', 'user.png', 0, '2015-02-27 22:35:22'),
(18, 'wilder ventura', '3022657165', 'NULL', 'user.png', 0, '2015-02-28 00:22:43'),
(19, 'JACOB sima', '3024303262', 'NULL', 'user.png', 0, '2015-02-28 21:56:17'),
(20, 'salvador garcia', '3024301799', 'NULL', 'user.png', 0, '2015-02-28 23:49:25'),
(21, 'dimas zunun', '3022499082', 'NULL', 'user.png', 0, '2015-03-02 21:42:37'),
(22, 'mariela natareno', '3022602438', 'NULL', 'user.png', 0, '2015-03-04 23:11:37'),
(23, 'carmen de jesus', '3028647861', 'NULL', 'user.png', 0, '2015-03-05 19:02:05'),
(24, 'oziel rodriguez', '3023446246', 'NULL', 'user.png', 0, '2015-03-07 18:06:40'),
(25, 'mileny garcia', '7868041646', 'garciamileny238@yahoo.com', 'user.png', 0, '2015-03-07 18:30:42'),
(26, 'cristian alvarado', '3023939518', 'NULL', 'user.png', 0, '2015-03-07 23:00:58'),
(27, 'antonio perez', '3024301675', 'NULL', 'user.png', 0, '2015-03-07 23:47:32'),
(28, 'armando rodriguez', '3022604126', 'NULL', 'user.png', 0, '2015-03-13 20:32:51'),
(29, 'jose perez', '3025690499', 'NULL', 'user.png', 0, '2015-03-13 22:39:46'),
(30, 'elmer argueta', '302569214', 'NULL', 'user.png', 0, '2015-03-16 23:54:43'),
(31, 'rudy escalante', '3028563542', 'NULL', 'user.png', 0, '2015-03-17 22:08:42'),
(32, 'carmen domingo diaz', '3022966108', 'NULL', 'user.png', 0, '2015-03-18 18:20:46'),
(33, 'missin haiti', '3023934000', 'NULL', 'user.png', 0, '2015-03-18 19:32:24'),
(34, 'aristeo vamaca', '3023311067', 'NULL', 'user.png', 0, '2015-03-19 22:06:43'),
(35, 'mario domingo', '3022284563', 'domingo6mario@gmail.com', 'user.png', 0, '2015-03-21 00:01:43'),
(36, 'jenifer ortiz', '3023817419', 'NULL', 'user.png', 0, '2015-03-23 20:50:18'),
(37, 'dulcidoris mazariegos', '3022200657', 'NULL', 'user.png', 0, '2015-03-27 22:02:33'),
(38, 'oscar morales', '3025692064', 'NULL', 'user.png', 0, '2015-03-31 19:06:29');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`ID_NOTIFICACION`, `DESCRIPCION`, `LEIDO`, `ID_RECEPTOR`, `FECHA_REGISTRO`) VALUES
(1, 'El usuario burngeek8 se ha unido a nuestra familia', 0, 1, '2015-02-16 03:54:03'),
(2, 'El usuario filimg017 se ha unido a nuestra familia', 0, 1, '2015-02-16 04:32:03'),
(3, 'El usuario samy123 se ha unido a nuestra familia', 0, 1, '2015-03-07 02:19:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_servicio`
--

CREATE TABLE IF NOT EXISTS `orden_servicio` (
  `ID_ORDEN_SERVICIO` int(9) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(9) NOT NULL,
  `DETALLE` text NOT NULL,
  `REFERENCIA` varchar(500) NOT NULL,
  `A_CUENTA` decimal(10,2) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL,
  `ESTADO` int(1) NOT NULL,
  `ID_USUARIO` int(9) NOT NULL,
  `FECHA_REGISTRO_ORDEN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_ORDEN_SERVICIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `orden_servicio`
--

INSERT INTO `orden_servicio` (`ID_ORDEN_SERVICIO`, `ID_CLIENTE`, `DETALLE`, `REFERENCIA`, `A_CUENTA`, `TOTAL`, `ESTADO`, `ID_USUARIO`, `FECHA_REGISTRO_ORDEN`) VALUES
(1, 1, '        El mejor de mis clientes, ahora me debes 18 horas\r\nAhahhja ctvda -_-', '', '0.00', '90.00', 1, 0, '2015-02-19 22:11:39'),
(3, 3, ' creacion de cuenta gmail y restauracion de telefono 30$ y correo es \r\ngobines20bernardo@gmail.com\r\npass : bernardo20', '', '30.00', '30.00', 1, 0, '2015-02-19 23:21:23'),
(4, 4, ' pieza de galaxy s2 ! dejo 20$ 21 dar respuesta de llegada de repuesto ! debe 30 $', '', '20.00', '50.00', 0, 0, '2015-02-20 22:20:33'),
(5, 5, ' reseteo de iphone 4 ! \r\nverizon 25 $ entrega de inmediata ! (cerrado)', '', '25.00', '25.00', 1, 0, '2015-02-20 22:36:41'),
(9, 7, ' Unlock iphone 5c emei : 358540051281957\r\nfecha de entrega \r\nProcess Time3-7 Business Days \r\ninicia el 23 de febrero', '', '100.00', '115.00', 0, 0, '2015-02-23 23:25:25'),
(8, 6, '  Reparacion de charguing port iPhone 4', '', '20.00', '40.00', 1, 0, '2015-02-21 20:13:44'),
(10, 8, 'Cambio de bateria Iphone 4s', '', '35.00', '35.00', 1, 0, '2015-02-24 00:34:44'),
(11, 9, ' Cambio de Charguing port Galaxy s4 active i537 ', '', '45.00', '45.00', 1, 0, '2015-02-24 16:37:52'),
(12, 10, 'venta de baterry galaxy s5', '', '45.00', '45.00', 1, 0, '2015-02-24 22:20:29'),
(13, 11, ' dejo iphone 4s page plus entregar 26 se va la senial aun nose da respuesta', '', '0.00', '20.00', 0, 0, '2015-02-24 22:41:35'),
(14, 12, 'cambio de ranura del monitor Tarjeta ! VGA', '', '60.00', '60.00', 1, 0, '2015-02-25 01:14:44'),
(15, 13, 'prueba de servicio', '', '50.00', '100.00', 1, 0, '2015-02-25 05:01:03'),
(16, 14, 'Cambio de pantalla de iphone 4 entregado', '', '70.00', '70.00', 1, 0, '2015-02-25 22:03:42'),
(17, 15, 'Cambio de motherboard de acer a5132', '', '180.00', '180.00', 1, 0, '2015-02-25 22:47:58'),
(18, 16, 'creacion de correo perez27albino@gmail.com\r\nalbino27', '', '10.00', '10.00', 1, 0, '2015-02-27 01:17:18'),
(19, 17, 'creacion de apple iD con venta de Itunes\r\ntorres2626alejandro@gmail.com\r\npass : Alejandro2626', '', '30.00', '30.00', 0, 0, '2015-02-27 22:36:02'),
(20, 18, 'transferencia de archivos ! iphone 4 a 4s ', '', '20.00', '20.00', 1, 0, '2015-02-28 00:23:16'),
(21, 19, ' cambio de pantalla y back cover iphone 4s 8:30', '', '80.00', '80.00', 0, 0, '2015-02-28 21:56:36'),
(22, 20, 'creacion de cuenta de apple con venta de tarjeta de itunes\r\n garcia1818salvador@gmail.com\r\nSalvador1818', '', '30.00', '30.00', 0, 0, '2015-02-28 23:49:55'),
(23, 21, 'CAmbio de disco duro a TOSHIBA ! y venta de cargador original ! ', '', '115.00', '115.00', 0, 0, '2015-03-02 21:43:25'),
(24, 23, 'camboi de battery EB20 moorola xt910 y cargador', '', '60.00', '72.00', 0, 0, '2015-03-05 19:03:18'),
(25, 24, 'cambio de pantalla toshiba b5298 ', '', '0.00', '135.00', 1, 0, '2015-03-07 18:07:18'),
(26, 25, 'cambio de pnatalla de galaxy  i9152 ', '', '105.00', '105.00', 0, 0, '2015-03-07 18:32:07'),
(27, 26, 'cambio de pantalla y back cover y boton de encendido Iphone 4s', '', '110.00', '110.00', 0, 0, '2015-03-07 23:01:53'),
(28, 27, 'creacion de gmail para android y descargar apps', '', '15.00', '15.00', 1, 0, '2015-03-07 23:47:51'),
(29, 11, 'cambio de antenna ! ', '', '25.00', '50.00', 0, 0, '2015-03-09 21:05:43'),
(30, 28, 'compra de conector de sim card para G flex LG', '', '19.00', '35.00', 0, 2, '2015-03-13 20:35:09'),
(31, 29, ' cambio de battery y remove charguing port ', '', '10.00', '45.00', 1, 2, '2015-03-13 22:40:15'),
(32, 30, 'reset note 2', '', '0.00', '25.00', 0, 2, '2015-03-16 23:55:00'),
(33, 31, 'cambio de pantalla iphone 5c', '', '110.00', '110.00', 1, 2, '2015-03-17 22:08:58'),
(34, 32, 'investigar flasheo celular chino', '', '0.00', '0.00', 0, 2, '2015-03-18 18:21:07'),
(35, 34, 'desbloqueo de att iphone 6', '', '80.00', '80.00', 0, 2, '2015-03-19 22:07:11'),
(36, 35, 'creeacion de icloud y actualizacion de iphone 4\r\ndomingo6mario@gmail.com\r\nMario6domingo', '', '55.00', '55.00', 0, 2, '2015-03-21 00:02:01'),
(37, 36, 'cambio de pantalla ! iphone 4 !', '', '0.00', '100.00', 0, 2, '2015-03-23 20:50:30'),
(38, 30, 'creacion de correo argueta22elmer@gmail.com\r\nElmer22argueta', '', '10.00', '10.00', 0, 2, '2015-03-24 00:05:09'),
(39, 38, 'batria se cambio y sigue enfermo ! iphone 4s negro', '', '0.00', '0.00', 0, 2, '2015-03-31 19:06:46');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pre_registro`
--

INSERT INTO `pre_registro` (`ID`, `EMAIL`, `CONFIRMADO`, `FECHA_RAGISTRO`) VALUES
(1, 'burngeek8@gmail.com', 1, '2015-02-16 03:51:44'),
(2, 'phillipmg.15@gmail.com', 1, '2015-02-16 04:31:13'),
(3, 'slopez@creativepmg.com', 1, '2015-02-25 01:36:25');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `EMAIL`, `USER`, `PASS`, `AVATAR_USUARIO`, `CATEGORIA`, `FECHA_REGISTRO`) VALUES
(1, 'burngeek8@gmail.com', 'burngeek8', 'w8uiq9da', 'user.png', 1, '2015-02-16 03:54:03'),
(2, 'phillipmg.15@gmail.com', 'filimg017', 'phillip1707', 'user.png', 1, '2015-02-16 04:32:03'),
(3, 'slopez@creativepmg.com', 'samy123', 'mirna123', 'user.png', 2, '2015-03-07 02:19:03');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo`
--

CREATE TABLE IF NOT EXISTS `usuario_tipo` (
  `ID_TIPO` int(9) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(250) NOT NULL,
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`ID_TIPO`, `DESCRIPCION`, `FECHA_REGISTRO`) VALUES
(1, 'ADMINISTRADOR', '2015-02-23 00:18:34'),
(2, 'USUARIO', '2015-02-23 00:18:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
