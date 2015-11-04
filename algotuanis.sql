-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2015 a las 06:50:44
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `algotuanis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categorias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre_categoria`) VALUES
(1, 'Alimentación'),
(2, 'Servicio'),
(3, 'Entretenimiento'),
(4, 'Salud'),
(5, 'Hospedaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_location`
--

CREATE TABLE IF NOT EXISTS `categorias_location` (
  `id_categorias_location` int(11) NOT NULL AUTO_INCREMENT,
  `id_location` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_categorias_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categorias_location`
--

INSERT INTO `categorias_location` (`id_categorias_location`, `id_location`, `id_categoria`) VALUES
(1, 6, 1),
(2, 6, 2),
(3, 7, 3),
(4, 7, 1),
(5, 8, 1),
(6, 9, 1),
(7, 10, 1),
(8, 10, 3),
(10, 12, 1),
(11, 12, 2),
(12, 13, 1),
(14, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` int(11) NOT NULL AUTO_INCREMENT,
  `id_locations` int(11) NOT NULL,
  `text_comments` text NOT NULL,
  PRIMARY KEY (`id_comments`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comments`, `id_locations`, `text_comments`) VALUES
(23, 12, 'Muy mal servicio, la cajera es un poco mal educada.'),
(24, 12, 'Concuerdo con el comentario anterior, la cajera la verdad tiene muy mala cara al atender'),
(25, 12, 'Muy buenos granizados'),
(26, 11, 'comment test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `name_location` text NOT NULL,
  `description` text NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT '0',
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id_location`, `latitude`, `longitude`, `name_location`, `description`, `telefono`, `email`, `facebook`, `youtube`, `id_usuario`) VALUES
(6, '10.00021151575335', '-84.11218643188477', 'Musmanni', 'Mini Super Musmanni', NULL, NULL, NULL, NULL, 0),
(7, '10.001701294939627', '-84.11227226257323', 'Beach Club', 'Bar Beach Club Heredia Centro, buenas Alitas', NULL, NULL, NULL, NULL, 0),
(8, '9.996534584701084', '-84.11231517791748', 'Mcdonalds', 'MacDonalds Heredia Centro', NULL, NULL, NULL, NULL, 1),
(9, '9.996788167488452', '-84.11218643188477', 'Taco Bell', '', NULL, NULL, NULL, NULL, 0),
(10, '9.999239457566398', '-84.11381721496582', 'El Bule', 'Bulebar Relax', NULL, NULL, NULL, NULL, 0),
(11, '9.991462887416695', '-84.1344165802002', 'Taco Bell San Francisco', 'La mejor comida a un precio accesible', '88888888', 'mail@mail.com', '', '', 1),
(12, '9.967561450024814', '-84.12053346633911', 'AM PM Laguinilla', '', NULL, NULL, NULL, NULL, 0),
(13, '9.96656816047403', '-84.1168212890625', 'LuigiÂ´s Pizza', 'Pizza y Pasta de Exelente calidad', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id_rating` int(11) NOT NULL AUTO_INCREMENT,
  `id_locations` int(11) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ratings`
--

INSERT INTO `ratings` (`id_rating`, `id_locations`, `rating`) VALUES
(1, 11, 3),
(2, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `correo`, `nombre`, `photo`) VALUES
(1, 'bernalmatus@gmail.com', 'Bernal Araya', 'https://lh3.googleusercontent.com/-wTazaez6v38/AAAAAAAAAAI/AAAAAAAAAEY/i0ZrJ7Lgakw/s96-c/photo.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
