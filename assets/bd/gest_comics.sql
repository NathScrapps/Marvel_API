-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2022 a las 08:26:10
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gest_comics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_comic` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `pagenums` int(5) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin NOT NULL,
  `disponibilidad` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_comic`, `title`, `descripcion`, `pagenums`, `imagen`, `disponibilidad`, `id_sucursal`) VALUES
(1, 49008, '100th Anniversary Special (2014) #1', 'It\'s 100 years after the wall-crawler\'s creation, but when the Kingpin has taken Spider-Man\'s ultra-powerful techno-symbiote suit, Spider-Man will need to prove once again why he is the world\'s greatest super hero.', 32, 'http://i.annihil.us/u/prod/marvel/i/mg/c/20/53b1be72eec81.jpg', 'notAvailable', 4),
(3, 49010, '100th Anniversary Special (2014) #1', 'CELEBRATE 100 YEARS OF EARTH\'S MIGHTIEST HEROES – THE AVENGERS! Following the failed Badoon invasion of Earth and America\'s disappearance into the Negative Zone, how will the Avengers of 2061 cope?!', 32, 'http://i.annihil.us/u/prod/marvel/i/mg/3/a0/53c406e09649c.jpg', 'Available', 4),
(4, 49007, '100th Anniversary Special (2014) #1', 'A REMARKABLE ARTIFACT FROM THE FUTURE OF MARVEL COMICS! It\'s 2061 and the world of the Fantastic Four has turned upside-down, complete with the granddaughter of Doom...and the Richards-Banner twins', 32, 'http://i.annihil.us/u/prod/marvel/i/mg/3/20/53a85058a61f0.jpg', 'Available', 4),
(5, 84345, '2020 Force Works (2020) #3', '', 32, 'http://i.annihil.us/u/prod/marvel/i/mg/d/60/5e8b6d2d5e8f9.jpg', 'Available', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `sucursal` varchar(255) COLLATE utf8_bin NOT NULL,
  `direc` text COLLATE utf8_bin NOT NULL,
  `habre` time NOT NULL,
  `hcierra` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `sucursal`, `direc`, `habre`, `hcierra`) VALUES
(4, 'ComixToluca', 'Felipe Berriozabal 101, Valle Verde y Terminal, 50140 Toluca de Lerdo, Méx.', '09:00:00', '20:00:00'),
(5, 'Panini', 'Panini Point Metepec, La Providencia, Metepec, Méx.', '09:39:00', '19:39:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
