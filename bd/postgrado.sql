-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-10-2020 a las 10:43:11
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `postgrado`
--
CREATE DATABASE IF NOT EXISTS `postgrado` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `postgrado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcientifica`
--

CREATE TABLE IF NOT EXISTS `catcientifica` (
  `idCatCientifica` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCatCientifica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `catcientifica`
--

INSERT INTO `catcientifica` (`idCatCientifica`, `descripcion`) VALUES
(1, 'Doctor'),
(2, 'Master');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catdocente`
--

CREATE TABLE IF NOT EXISTS `catdocente` (
  `idCategoriaDocente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategoriaDocente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `catdocente`
--

INSERT INTO `catdocente` (`idCategoriaDocente`, `descripcion`) VALUES
(1, 'Profesor Titular'),
(2, 'Profesor Auxiliar'),
(3, 'Asistente\r\n'),
(4, 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impartidoen`
--

CREATE TABLE IF NOT EXISTS `impartidoen` (
  `idImpartido` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idImpartido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `impartidoen`
--

INSERT INTO `impartidoen` (`idImpartido`, `descripcion`) VALUES
(1, 'Angola'),
(2, 'Brasil'),
(3, 'Colombia'),
(4, 'EspaÃ±a'),
(5, 'Francia'),
(6, 'Gran BretaÃ±a'),
(7, 'Honduras'),
(8, 'India'),
(9, 'Rusia'),
(10, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postgrado`
--

CREATE TABLE IF NOT EXISTS `postgrado` (
  `idPostgrado` int(11) NOT NULL AUTO_INCREMENT,
  `impartidoCentro` varchar(10) NOT NULL,
  `cantAlumnos` int(11) NOT NULL,
  `cantHoras` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `codigo` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idTipoPostgrado` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  PRIMARY KEY (`idPostgrado`),
  KEY `Ref54` (`idTipoPostgrado`),
  KEY `Ref85` (`idTema`),
  KEY `Ref26` (`idProfesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Volcado de datos para la tabla `postgrado`
--

INSERT INTO `postgrado` (`idPostgrado`, `impartidoCentro`, `cantAlumnos`, `cantHoras`, `fechaInicio`, `fechaFin`, `codigo`, `idTipoPostgrado`, `idTema`, `idProfesor`) VALUES
(183, 'NO', 22, 32, '2020-10-02', '2020-10-20', 'PG-003', 2, 3, 48),
(185, 'NO', 6, 61, '2020-10-03', '2020-10-11', 'PG-004', 2, 2, 49),
(190, 'NO', 22, 35, '2020-10-08', '2020-10-14', 'PG-005', 2, 6, 26),
(191, 'SI', 6, 60, '2020-10-08', '2020-10-21', 'PG-006', 2, 1, 47),
(195, 'SI', 5, 36, '2020-10-02', '2020-10-09', 'PG-002', 1, 4, 137),
(198, 'SI', 22, 52, '2020-10-09', '2020-10-20', 'PG-001', 1, 1, 33),
(200, 'NO', 27, 60, '2020-10-02', '2020-10-14', 'PG-008', 1, 5, 43),
(201, 'NO', 22, 36, '2020-10-21', '2020-10-28', 'PG-009', 1, 6, 26),
(204, 'SI', 12, 60, '2020-10-01', '2020-11-06', 'PG-010', 2, 4, 46),
(205, 'SI', 6, 36, '2020-10-07', '2020-10-22', 'PG-011', 2, 6, 33),
(206, 'SI', 6, 52, '2020-09-28', '2020-11-02', 'PG-012', 2, 3, 48),
(207, 'NO', 10, 52, '2020-10-22', '2020-10-29', 'PG-013', 1, 4, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postgradointernacional`
--

CREATE TABLE IF NOT EXISTS `postgradointernacional` (
  `idPostgrado` int(11) NOT NULL,
  `cantPaisesAlumnos` int(11) NOT NULL,
  `idImpartido` int(11) NOT NULL,
  PRIMARY KEY (`idPostgrado`),
  KEY `Ref78` (`idPostgrado`),
  KEY `Ref119` (`idImpartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postgradointernacional`
--

INSERT INTO `postgradointernacional` (`idPostgrado`, `cantPaisesAlumnos`, `idImpartido`) VALUES
(183, 15, 3),
(185, 19, 2),
(190, 15, 9),
(191, 15, 6),
(204, 25, 4),
(205, 25, 9),
(206, 25, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `idProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `idCategoriaDocente` int(11) NOT NULL,
  `idCatCientifica` int(11) NOT NULL,
  PRIMARY KEY (`idProfesor`),
  KEY `Ref32` (`idCategoriaDocente`),
  KEY `Ref63` (`idCatCientifica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `edad`, `especialidad`, `idCategoriaDocente`, `idCatCientifica`) VALUES
(26, 'Milagros Alina GonzÃ¡lez', 62, 'Sistema de BD', 1, 1),
(29, 'Yunaisy PeÃ±a Guzman', 25, 'Ingles', 1, 2),
(32, 'Ernesto Gallo Sosa', 30, 'Arquitectura de MÃ¡quina', 4, 2),
(33, 'Virgen Delano Prieto', 38, 'ProgramaciÃ³n Web', 2, 2),
(43, 'Yasmany Fonseca Saez', 36, 'ProgramaciÃ³n II', 3, 1),
(46, 'Claudia EstefanÃ­a', 27, 'MatemÃ¡tica III', 2, 2),
(47, 'Maria Cristina GonzÃ¡lez', 46, 'EspaÃ±ol y Literatura', 2, 2),
(48, 'Adam Alonso Potter', 28, 'ProgramaciÃ³n Web', 4, 2),
(49, 'Aileen Suarez Barroso', 34, 'EspaÃ±ol y Literatura', 1, 1),
(93, 'Elena PÃ©rez de la Osa', 52, 'EspaÃ±ol y Literatura', 3, 1),
(137, 'Hurbelino Paez', 55, 'MatmÃ¡tica II', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temapostgrado`
--

CREATE TABLE IF NOT EXISTS `temapostgrado` (
  `idTema` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idTema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `temapostgrado`
--

INSERT INTO `temapostgrado` (`idTema`, `descripcion`) VALUES
(1, 'DistribuciÃ³n Cubana de GNU/Linux Nova Escritorio 6.0'),
(2, 'IntroducciÃ³n a las Redes Sociales de Internet'),
(3, 'Inteligencia Artificial aplicada a la mejora de procesos'),
(4, 'Introduction to Business Inteligence'),
(5, 'Desarrollo e InnovaciÃ³n de los procesos educativos'),
(6, 'EducaciÃ³n MediÃ¡tica y Competencias Digitales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopostgrado`
--

CREATE TABLE IF NOT EXISTS `tipopostgrado` (
  `idTipoPostgrado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoPostgrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipopostgrado`
--

INSERT INTO `tipopostgrado` (`idTipoPostgrado`, `descripcion`) VALUES
(1, 'Nacional'),
(2, 'Internacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `Ref41` (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `usuario`, `pass`, `nombre`, `idRol`) VALUES
(1, 'howard', 'dc5ab2b32d9d78045215922409541ed7', 'Howard Hernández', 1),
(2, 'invitado', 'a6ae8a143d440ab8c006d799f682d48d', 'Invitado', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postgrado`
--
ALTER TABLE `postgrado`
  ADD CONSTRAINT `Refprofesor6` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReftemaPostgrado5` FOREIGN KEY (`idTema`) REFERENCES `temapostgrado` (`idTema`) ON DELETE CASCADE,
  ADD CONSTRAINT `ReftipoPostgrado4` FOREIGN KEY (`idTipoPostgrado`) REFERENCES `tipopostgrado` (`idTipoPostgrado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `postgradointernacional`
--
ALTER TABLE `postgradointernacional`
  ADD CONSTRAINT `RefimpartidoEn9` FOREIGN KEY (`idImpartido`) REFERENCES `impartidoen` (`idImpartido`) ON DELETE CASCADE,
  ADD CONSTRAINT `RefPostgrado8` FOREIGN KEY (`idPostgrado`) REFERENCES `postgrado` (`idPostgrado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `RefCatCientifica3` FOREIGN KEY (`idCatCientifica`) REFERENCES `catcientifica` (`idCatCientifica`) ON DELETE CASCADE,
  ADD CONSTRAINT `RefCatDocente2` FOREIGN KEY (`idCategoriaDocente`) REFERENCES `catdocente` (`idCategoriaDocente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Refrol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
