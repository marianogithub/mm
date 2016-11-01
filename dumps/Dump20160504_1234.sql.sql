-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.13.71.2:3306
-- Generation Time: May 04, 2016 at 03:32 PM
-- Server version: 5.5.45
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividadcompleja`
--

CREATE TABLE IF NOT EXISTS `actividadcompleja` (
  `idactividadcompleja` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idactividadcompleja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `actividadcompleja`
--

INSERT INTO `actividadcompleja` (`idactividadcompleja`, `nombre`) VALUES
(1, 'SI debe solicitar viabilidad del proyecto'),
(2, 'NO debe solicitar viabilidad del proyecto');

-- --------------------------------------------------------

--
-- Table structure for table `adicionales`
--

CREATE TABLE IF NOT EXISTS `adicionales` (
  `idadicional` int(10) NOT NULL AUTO_INCREMENT,
  `expediente` int(10) NOT NULL DEFAULT '0',
  `idpermiso` int(10) DEFAULT NULL,
  `mlpermiso` double DEFAULT NULL,
  `montopermiso` int(10) DEFAULT NULL,
  `idreposicion` int(10) DEFAULT NULL,
  `mlreposicion` double DEFAULT NULL,
  `montoreposicion` int(10) DEFAULT NULL,
  `idobrasadicional` int(10) DEFAULT NULL,
  `unidadobraadicional` double DEFAULT NULL,
  `montoobraadicional` int(10) DEFAULT NULL,
  `idagua` int(10) DEFAULT NULL,
  `unidadagua` double DEFAULT NULL,
  `montoagua` int(10) DEFAULT NULL,
  `idcloacas` int(10) DEFAULT NULL,
  `unidadcloacas` double DEFAULT NULL,
  `montocloacas` int(10) DEFAULT NULL,
  `numerorecibo` int(10) DEFAULT NULL,
  PRIMARY KEY (`idadicional`),
  KEY `expediente` (`expediente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2011004069 ;

--
-- Dumping data for table `adicionales`
--

INSERT INTO `adicionales` (`idadicional`, `expediente`, `idpermiso`, `mlpermiso`, `montopermiso`, `idreposicion`, `mlreposicion`, `montoreposicion`, `idobrasadicional`, `unidadobraadicional`, `montoobraadicional`, `idagua`, `unidadagua`, `montoagua`, `idcloacas`, `unidadcloacas`, `montocloacas`, `numerorecibo`) VALUES
(1, 1, 2, 1.1, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(2, 1, 3, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 100, NULL, 0, 0, NULL),
(3, 2, 6, 2, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(4, 25, 2, 2, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(5, 26, 2, 2, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(6, 30, 2, 2, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(7, 32, 2, 2, 1, NULL, NULL, NULL, 2, 1, 4, 2, 1, 6, 1, 0, 8, NULL),
(8, 31, 2, 2, NULL, NULL, NULL, NULL, 2, 1, NULL, 2, 1, NULL, 1, 0, NULL, NULL),
(9, 41, 2, 2, NULL, NULL, NULL, NULL, 2, 1, NULL, 2, 1, NULL, 1, 0, NULL, NULL),
(10, 42, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, 1, 1, NULL, NULL, 0, NULL, NULL),
(11, 27, 2, 10, NULL, NULL, NULL, NULL, 2, 1, NULL, 1, 1, NULL, NULL, 0, NULL, NULL),
(12, 42, NULL, 0, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004023, 19, 7, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004006, 24, 3, 12, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004007, 51, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004008, 52, 2, 7, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004009, 54, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, NULL, NULL, 0, NULL, NULL),
(2011004010, 56, NULL, 0, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004011, 57, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004012, 58, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004013, 59, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004014, 36, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004015, 60, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004016, 64, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004017, 65, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004018, 70, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004019, 73, 2, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004020, 76, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004021, 77, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, 1, 1, NULL, NULL, 0, NULL, NULL),
(2011004024, 19, 6, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004025, 19, 5, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004026, 19, 2, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004028, 19, 3, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004029, 19, 1, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004030, 19, 8, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004031, 19, 4, 10, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004032, 87, 6, 6, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004033, 88, NULL, 0, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004034, 89, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, 0, NULL, NULL),
(2011004035, 96, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 22, NULL, 1, 22, NULL, NULL),
(2011004037, 99, 5, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004038, 103, 1, 6, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004039, 106, NULL, 0, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL),
(2011004040, 114, 2, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 2, 1, NULL, NULL),
(2011004041, 126, 5, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004068, 133, 2, 3, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 2, 0, NULL, NULL),
(2011004067, 131, 6, 12, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004060, 159, 6, 12, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL),
(2011004066, 66, 6, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `afectacionlimite`
--

CREATE TABLE IF NOT EXISTS `afectacionlimite` (
  `idafectacionlimite` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idafectacionlimite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `afectacionlimite`
--

INSERT INTO `afectacionlimite` (`idafectacionlimite`, `nombre`) VALUES
(1, 'Presentar croquis indicando la fraccion de terreno que corresponde a cada zona'),
(2, 'La propiedad se encuentra incluida en una sola Zona'),
(3, '-----');

-- --------------------------------------------------------

--
-- Table structure for table `aforo`
--

CREATE TABLE IF NOT EXISTS `aforo` (
  `idaforo` int(11) NOT NULL DEFAULT '1',
  `expediente` int(11) NOT NULL DEFAULT '0',
  `Art` varchar(10) DEFAULT NULL,
  `Inc` varchar(10) DEFAULT NULL,
  `It` varchar(10) DEFAULT NULL,
  `Ap` varchar(10) DEFAULT NULL,
  `Destino` varchar(50) DEFAULT NULL,
  `Cantidad` varchar(50) DEFAULT NULL,
  `Dimension` varchar(10) DEFAULT NULL,
  `Valor` varchar(10) DEFAULT NULL,
  `Servicio` varchar(50) DEFAULT NULL,
  KEY `Ãndice 1` (`idaforo`,`expediente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agua`
--

CREATE TABLE IF NOT EXISTS `agua` (
  `idagua` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idagua`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agua`
--

INSERT INTO `agua` (`idagua`, `descripcion`) VALUES
(1, 'Conexion 13mm'),
(2, 'Conexion 19mm'),
(3, 'Conexion >25 mm');

-- --------------------------------------------------------

--
-- Table structure for table `altura`
--

CREATE TABLE IF NOT EXISTS `altura` (
  `idaltura` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idaltura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `altura`
--

INSERT INTO `altura` (`idaltura`, `nombre`) VALUES
(1, '8 metros'),
(2, '11 metros'),
(3, 'NO PERMITIDA'),
(4, '-----');

-- --------------------------------------------------------

--
-- Table structure for table `ancho`
--

CREATE TABLE IF NOT EXISTS `ancho` (
  `idancho` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idancho`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ancho`
--

INSERT INTO `ancho` (`idancho`, `nombre`) VALUES
(1, '10 metros'),
(2, '12 metros'),
(3, '13 metros'),
(4, '15 metros'),
(5, '25 metros'),
(6, 'NO PERMITIDO'),
(7, '7 METROS'),
(8, 'EMPRENDIMIENTO PRIV 12 mts  CON FRENTE VIA PUB. 10 Mts');

-- --------------------------------------------------------

--
-- Table structure for table `calle`
--

CREATE TABLE IF NOT EXISTS `calle` (
  `idcalle` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `idzona` bigint(20) NOT NULL,
  PRIMARY KEY (`idcalle`),
  KEY `idzona` (`idzona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `calle`
--

INSERT INTO `calle` (`idcalle`, `nombre`, `idzona`) VALUES
(1, 'calle1', 1),
(2, 'Calle3', 1),
(3, 'Call1', 5),
(4, 'Calle23', 3),
(5, 'Calle1', 6),
(6, 'Calle2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cloacas`
--

CREATE TABLE IF NOT EXISTS `cloacas` (
  `idcloacas` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT '0',
  PRIMARY KEY (`idcloacas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cloacas`
--

INSERT INTO `cloacas` (`idcloacas`, `descripcion`) VALUES
(1, 'Conexion Cloaca Familiar'),
(2, 'Conexion Cloaca Comercial'),
(3, 'Conexion Cloaca Industrial');

-- --------------------------------------------------------

--
-- Table structure for table `cumplirordenanza`
--

CREATE TABLE IF NOT EXISTS `cumplirordenanza` (
  `idcumplirordenanza` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idcumplirordenanza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cumplirordenanza`
--

INSERT INTO `cumplirordenanza` (`idcumplirordenanza`, `nombre`) VALUES
(1, '9580/14'),
(2, '----');

-- --------------------------------------------------------

--
-- Table structure for table `derecho`
--

CREATE TABLE IF NOT EXISTS `derecho` (
  `idderecho` int(10) NOT NULL AUTO_INCREMENT,
  `Art` varchar(10) DEFAULT '0',
  `Inc` varchar(50) DEFAULT '0',
  `It` varchar(50) DEFAULT '0',
  `Ap` varchar(50) DEFAULT '0',
  `Destino` varchar(50) DEFAULT '0',
  `CC` varchar(50) DEFAULT '0',
  `puntajeinferior` decimal(10,2) DEFAULT NULL,
  `puntajesuperior` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idderecho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabla para calcular los montos y los coeficientes' AUTO_INCREMENT=80 ;

--
-- Dumping data for table `derecho`
--

INSERT INTO `derecho` (`idderecho`, `Art`, `Inc`, `It`, `Ap`, `Destino`, `CC`, `puntajeinferior`, `puntajesuperior`) VALUES
(1, '10', '8', '1', '0-4', 'Vivienda', '0.6', '0.00', '64.00'),
(2, '10', '8', '1', '0-3', 'Vivienda', '1.50', '105.00', '2000.00'),
(3, '10', '8', '1', '0-2', 'Vivienda', '0.9', '65.00', '74.00'),
(4, '10', '8', '1', '0-1', 'Vivienda', '1.20', '75.00', '104.00'),
(5, '10', '8', '1', '0-3', 'Oficina', '1.00', NULL, '20.00'),
(6, '10', '8', '1', '0-2', 'Oficina', '1.00', '31.00', NULL),
(7, '10', '8', '1', '0-1', 'Oficina', '2.00', '21.00', '30.00'),
(8, '10', '8', '1', '0-3', 'Salones ComerciosEc', '1.00', '0.00', '0.00'),
(9, '10', '8', '1', '0-2', 'Salones ComerciosNoc', '2.00', '0.00', '0.00'),
(10, '10', '8', '1', '0-1', 'Salones ComerciosLu', '2.00', '0.00', '0.00'),
(11, '10', '8', '1', '0-3', 'Hoteles', '0.9', '0.00', '74.00'),
(12, '10', '8', '1', '0-2', 'Hoteles', '1.5', '105.00', '2000.00'),
(13, '10', '8', '1', '0-1', 'Hoteles', '1.2', '75.00', '104.00'),
(14, '10', '8', '2', '0-3', 'Bodegas y/o Destiilerias', '1.00', '0.00', '2000.00'),
(15, '10', '8', '2', '0-2', 'Bodegas y/o Destiilerias', '1.00', '0.00', '2000.00'),
(16, '10', '8', '2', '0-1', 'Bodegas y/o Destiilerias', '1.00', '0.00', '2000.00'),
(17, '10', '-', '-', '-', 'Tinglado sin cerramiento', '0.00', '0.00', '0.00'),
(18, '10', '-', '-', '-', 'Tinglado  cerrado < 50 %', '0.00', '0.00', '0.00'),
(19, '10', '8', '2', '0-3', 'Tinglados', '0.15', '0.00', '0.00'),
(20, '10', '8', '2', '0-2', 'Galpones', '0.70', '68.00', '2000.00'),
(21, '10', '8', '2', '0-1', 'Galpones', '0.5', '67.00', '40.00'),
(22, '10', '8', '2', '0-3', 'Edificios públicosEc', '1.00', '0.00', '0.00'),
(23, '10', '8', '2', '0-2', 'Edificios públicosNo', '1.00', '0.00', '0.00'),
(24, '10', '8', '2', '0-1', 'Edificios públicosLu', '2.00', '0.00', '0.00'),
(25, '10', '8', '2', '0-3', 'DesmontableEc', '1.00', '0.00', '0.00'),
(26, '10', '8', '2', '0-3', 'DesmontableNo', '1.00', '0.00', '0.00'),
(27, '10', '8', '2', '0-3', 'DesmontableLu', '1.00', '0.00', '0.00'),
(29, '10', '8', '2', '3', 'Galpones', '0.35', '0.00', '40.00'),
(30, '10', '8', '3', '0-3', 'Fosa Pileta', '4.00', '0.00', '2000.00'),
(31, '10', '8', '3', '0-4', 'Antena', '0.40', '0.00', '20000.00'),
(32, '10', '8', '3', '0-5', 'Pileta de Natacion cap de 100 a 200 m3', '.80', '0.00', '2000.00'),
(33, '10', '8', '3', '0-6', 'Chimenea', '1.00', '0.00', '0.00'),
(34, '10', '8', '3', '0-7', 'Tanques Elevados', '1.6', '0.00', '2000.00'),
(35, '10', '9', '1', '1', 'Permiso  Rot. y Excav Calle de Asfalto', '0.01', '0.00', '0.00'),
(36, '10', '9', '1', '1', 'Permiso Rot y Exc Calle de Hormigón', '0.015', '0.00', '0.00'),
(37, '10', '9', '1', '1', 'Antena en ml', '0.03', '0.00', '0.00'),
(38, '10', '9', '2', '-', 'Permiso Rotura Puentes y Cordon', '0.007', '0.00', '0.00'),
(40, '11', '6', '2', '1', 'Conexion 13mm', '0.08', '0.00', '0.00'),
(41, '11', '6', '2', '2', 'Conexion 19mm', '0.09', '0.00', '0.00'),
(42, '11', '6', '2', '3', 'Antena', '1.6', '0.00', '2000.00'),
(44, '16', '3', '-', '1', 'Reparacion Calle Hormigón', '0.15', '0.00', '0.00'),
(45, '16', '3', '-', '2', 'Reparacion Calle Asfalto', '0.08914', '0.00', '0.00'),
(46, '16', '3', '-', '3', 'Reparacion Calle Tierra', '0.003', '0.00', '0.00'),
(47, '13', '6', '2', '1', 'Conexion Cloaca Familiar', '0.06', '0.00', '0.00'),
(48, '13', '6', '2', '2', 'Conexion Cloaca Comercial', '0.09', '0.00', '0.00'),
(49, '13', '6', '2', '2', 'Antena en ml', '0.09', '0.00', '0.00'),
(51, '15', '6', '1', '2', 'Potencia', '0.00', '0.00', '0.00'),
(52, '15', '6', '2', '1', 'Cambio Ubic Medidor Domic', '0.00', '0.00', '0.00'),
(53, '15', '6', '2', '2-a', 'Separacion medidor Vivienda', '0.00', '0.00', '0.00'),
(54, '15', '6', '2', '2-b', 'Separac medidor Com Ind', '0.00', '0.00', '0.00'),
(55, '10', '8', '3', '0-5', 'Pileta de Natacion cap < 100 m3', '1.6', '0.00', '2000.00'),
(56, '15', '6', '2', '4', 'Reconexiones', '0.00', '0.00', '0.00'),
(57, '15', '6', '2', '5', 'Letrero Luminoso', '0.024', '0.00', '0.00'),
(58, '15', '6', '2', '6-a', 'Inst Temporaria hasta 3 Kw', '0.05', '0.00', '0.00'),
(59, '15', '6', '2', '6-b', 'Inst Temporaria mayor 3 Kw', '0.09', '0.00', '0.00'),
(60, '10', '10', '1', '-', 'Plan Fomento a la Vuvienda', '0.00', '0.00', '0.00'),
(61, '11', '6', '2', '5', 'Instalac de medidor o reg', '0.00', '0.00', '0.00'),
(62, '13', '3', '-', '-', 'Cloacas inpección', '10.00', '0.00', '0.00'),
(63, '-', '-', '-', '-', 'Ordenanza Nº', '99.99', '0.00', '0.00'),
(64, '-', '-', '-', '-', 'Ordenanza Nº', '99.99', '0.00', '0.00'),
(65, '10', '8', '2', '4', 'Tinglados cerrado hasta 50%', '0.25', NULL, NULL),
(70, '15', '6', '1', '1', 'Boca', '1', '0.00', '2000.00'),
(71, '11', '6', '1', '-', 'Recinto', '10', '0.00', '2000.00'),
(74, '10', '8', '3', '0-5', 'Pileta de Natacion cap de 100 a 200 m3', '0.8', '0.00', '2000.00'),
(75, '15', '6', '2', '3', 'Antena en ml', '0.012', '0.00', '2000.00'),
(76, '15', '6', '2', '6', 'Instalacion funcionamiento temporario', '0.002', '0.00', '2000.00'),
(77, '15', '6', '2', '4', 'Reconexiones (sin modificación)', '0.108', '0.00', '2000.00'),
(78, '10', '9', '1', '3', 'Permiso Excv. Calle de Tierra', '0.003', NULL, NULL),
(79, '10', '9', '2', '1', 'Permiso Rotura de Vereda', '0.002', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `derechosvarios`
--

CREATE TABLE IF NOT EXISTS `derechosvarios` (
  `idderechovarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idderechovarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `descripcionoficial`
--

CREATE TABLE IF NOT EXISTS `descripcionoficial` (
  `iddescripcion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT '',
  `idobservacionoficial` int(30) DEFAULT '0',
  PRIMARY KEY (`iddescripcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=677 ;

--
-- Dumping data for table `descripcionoficial`
--

INSERT INTO `descripcionoficial` (`iddescripcion`, `nombre`, `idobservacionoficial`) VALUES
(1, 'medidas reglamentarias', 118),
(2, 'CONSTRUCCION VIVIENDA', 119),
(3, 'AMPLIACION VIVIENDA\r\n', 119),
(4, 'RELEVAMIENTO DE VIVIENDA\r\n', 119),
(5, 'CONSTRUCION DEPARTAMENTO\r\n', 119),
(6, 'AMPLIACION DEPARTAMENTO\r\n', 119),
(7, 'RELEVAMIENTO DE DEPARTAMENTO\r\n', 119),
(8, 'CONSTRUCION SALON COMERCIAL\r\n', 119),
(9, 'AMPLIACION SALON COMERCIAL\r\n', 119),
(10, 'RELEVAMIENTO DE SALON COMERCIAL\r\n', 119),
(11, 'CONSTRUCION OFICINAS\r\n', 119),
(12, 'AMPLIACION OFICINAS\r\n', 119),
(13, 'RELEVAMIENTO DE OFICINAS \r\n', 119),
(14, 'CONSTRUCION CONSULTORIOS\r\n', 119),
(15, 'AMPLIACION CONSULTORIOS', 119),
(16, 'RELEVAMIENTO DE CONSULTORIOS\r\n', 119),
(17, 'CONSTRUCION GALPON\r\n', 119),
(18, 'AMPLIACION GALPON\r\n', 119),
(19, 'RELEVAMIENTO DE GALPON\r\n', 119),
(20, 'CONSTRUCION TINGLADO\r\n', 119),
(21, 'AMPLIACION TINGLADO\r\n', 119),
(22, 'RELEVAMIENTO DE TINGLALDO\r\n', 119),
(23, 'REMODELACION DE\r\n', 119),
(24, 'LA DIRECCIÓN DE LA UBICACIÓN DE LA OBRA', 120),
(25, 'apellido y nombre del titular\r\n', 121),
(26, 'si es possedor cambiar "TITULAR" por "PROPIETARIO"\r\n', 121),
(27, 'apellido y nombre del poseedor', 121),
(28, 'colocar calle NÂ° distrito departamento\r\n', 122),
(29, 'debe firmar el propietario\r\n', 123),
(30, 'debe firmar el poseedor', 123),
(31, 'SUP. RELEVADA DE VIVIENDA\r\n', 124),
(32, 'SUP. RELEVADA DE DEPARTAMENTO\r\n', 124),
(33, 'SUP. RELEVADA DE SALON COMERCIAL\r\n', 124),
(34, 'SUP. RELEVADA DE OFICINAS\r\n', 124),
(35, 'SUP. RELEVADA DE CONSULTORIOS\r\n', 124),
(36, 'SUP. RELEVADA DE GALPONES\r\n', 124),
(49, 'indicar "Sup. Libre"\r\n', 130),
(48, 'indicar "Sup. terreno"\r\n', 129),
(37, 'SUP. RELEVADA DE TINGLADOS\r\n', 124),
(38, 'SUP. A CONSTRUIR DE VIVIENDA\r\n', 125),
(39, 'SUP. A CONSTRUIR  DE DEPARTAMENTO\r\n', 125),
(40, 'SUP.  A CONSTRUIR DE SALON COMERCIAL\r\n', 125),
(47, 'indicar lo que corresponde\r\n', 128),
(41, 'SUP. A CONSTRUIR DE OFICINAS\r\n', 125),
(42, 'SUP. A CONSTRUIR DE CONSULTORIOS \r\n', 125),
(43, 'SUP.  PROYECTADA DE GALPONES \r\n', 125),
(44, 'SUP.  PROYECTADA DE TINGLADOS \r\n', 125),
(45, 'TOTAL DE SUPERFICIES \r\n', 126),
(46, 'indicar "Esc 1:"\r\n', 127),
(50, 'PLANTAS', 131),
(51, 'CORTES', 131),
(52, 'ARQUITECTURA', 131),
(53, 'FACHADAS', 131),
(54, 'la escala para planta y  cortes ', 132),
(55, 'la escala para fachada de vivienda departamento', 132),
(56, 'la escala para planimetria', 132),
(57, ' "A"- NÃ?Â°" de plano que corresponda', 133),
(58, 'el Norte Magnetico ', 134),
(59, 'CROQUIS DE LA PROPIEDAD', 135),
(60, 'CALLE PRINCIPAL', 135),
(648, ' DESDE BALCONES Y/O TERRAZAS', 336),
(62, 'APELLIDOS Y NOMBRE DEL PROFESIONAL', 136),
(63, 'domicilio de profesionales del Proyecto', 137),
(64, 'matricula de profesionales del proyecto', 138),
(65, 'domicilio de profesionales del Calculo', 140),
(66, 'matricula de profesionales del calculo', 141),
(67, 'Apellidos y Nombres de profesionales de la Dir. Tec.', 141),
(68, 'Apellidos y Nombres de profesionales de la Dir. Tec.', 142),
(69, 'domicilio de profesionales de la Dir.Tec.', 142),
(70, 'domicilio de profesionales de la Dir.Tec.', 143),
(71, 'matricula de profesionales de la Dir. Tec.', 144),
(72, 'la firma de quiÃ?Â©n tiene a cargo la Administracion', 144),
(73, 'CONDUCCION POR ADMINISTRACION', 162),
(74, 'Falta firma ', 162),
(75, 'CUANDO LA OBRA ES PROYECTADA', 172),
(76, 'CUANDO EL PLANO ES CONFORME A OBRA', 172),
(77, 'CUANDO EL PLANO ES RELEVAMIENTO', 172),
(78, 'CUANDO LA OBRA ES PROYECTADA', 173),
(79, 'CUANDO EL PLANO ES CONFORME A OBRA', 173),
(675, ' DEPOSITOS', 185),
(81, 'CUANDO LA OBRA ES PROYECTADA', 174),
(82, 'En plano conforme a obra', 174),
(83, 'En Relevamiento', 174),
(84, ' LA NOMENCLATURA CATASTRAL', 175),
(85, 'de acuerdo al plano de arquitectura corregido', 145),
(86, 'INDICARLA TOMANDO EL NIVEL DE VEREDA (0,00)', 177),
(87, 'ESCALA COINCIDENTES AL DIBUJO', 178),
(88, 'LA EXISTENTE DE LA PROYECTADA O DE LA RELEVADA', 179),
(89, 'POR ETAPAS DE CONSTRUCCION', 179),
(90, 'de aleros', 181),
(91, 'TANQUE DE AGUA', 181),
(92, 'de Entrepiso', 181),
(93, 'de cumbrera', 181),
(94, 'de planta altas', 181),
(95, 'de vigas importante', 181),
(96, 'min 2,5 cm DE LA LINEA DE DIVISION', 182),
(97, ' DE CIERRE REFERIDA AL EJE CALLE', 183),
(98, 'EDIFICACIÓN REFERIDA AL EJE DE CALLE', 183),
(99, 'DE DORMITORIOS', 184),
(100, 'DE COCINAS', 184),
(101, 'DE LAVADERO', 184),
(102, 'LOCALES PRINCIPALES', 184),
(103, 'DE DORMITORIOS DE SERVICIOS', 184),
(104, 'DE LAVADERO INCORPORADO A COCINA', 184),
(105, 'DE LOS BAÑOS', 184),
(106, 'DESPENSA Y DEPÓSITOS', 184),
(107, 'dormitorios ventilaran con 6% iluminacion 12%', 185),
(108, 'dormitorios  secundadrios ventilaran', 185),
(109, 'deposito y/o despensa ventilaran con  sup/300 ', 185),
(110, 'star ventilaran al 6% iluminacion 12%', 185),
(111, 'lavaderos ventilaran e iluminaran 10%', 185),
(112, 'banos ventilaran con sup/300', 185),
(114, 'salas de juego ventilaran al 6% e iluminaran al 12%', 185),
(113, 'oficinas y/o estudio ventilaran al 6% iluminaran al 12%', 185),
(115, 'cocina con 10% ', 185),
(116, 'LOCALES COMERCIALES ABRIR HACIA AFUERA', 186),
(117, 'DE LOS MUROS', 187),
(472, 'DE EQUIPAMIENTOS FIJOS', 187),
(120, 'TODAS LAS UNIDADES FUNCIONALES', 180),
(121, 'quiebres de techos', 181),
(354, 'DESIGNACION', 186),
(510, 'DISYUNTOR DIFERENCIAL', 386),
(124, 'REPRESENTAR CORDÓN SI LO HAY', 189),
(126, 'MARCAR TRIANGULO DE VISIBILIDAD', 189),
(127, 'INDICAR ZONAS DE', 189),
(509, 'ESCALONAMIENTO  EN PROTECCIONES', 386),
(508, 'REPRESENTAR LAS CONSTRUCCIONES EXISTENTES FUERA DE LINEA', 189),
(501, 'INDICAR EJE DE CALLE', 189),
(131, 'INDICAR LINEAS', 188),
(132, 'INDICAR POZOS ABSORBENTES ', 188),
(133, 'ESCALA DE ACUERDO LA MAGNITUD DEL TERRENO', 188),
(134, 'INDICAR PLANTA DE TECHO SI LA ESCALA LO PERMITE', 188),
(135, 'EN ESCALERAS EL ANCHO MÍNIMO', 184),
(136, 'por cada superficie que corresponda, ', 193),
(474, 'DE LA COCINA', 339),
(140, 'COINCIDENTES CON PLANTA DE ARQUITECTURA', 195),
(483, 'COINCIDENTE CON LOS DE PLANTA', 380),
(485, 'ENTREPISOS', 200),
(143, 'hormigones armado sombreado en negro', 196),
(144, 'hormigones ciclopeos dibujar las piedras', 196),
(473, 'EN LOCALES COMERCIALES 3,00 mts DE PISO A CIELO RASO', 201),
(149, 'DESDE EL BASAMENTO VER POR ZONIFICACIÓN', 202),
(150, 'EN LOCALES NO HABITABLES 2,20 mts DE PISO A CIELO RASO', 201),
(154, 'EN LOCALES HABITABLES 2,40mts DE PISO A CIELO RASO', 201),
(155, ' TECHOS', 200),
(484, 'PISOS', 200),
(156, '1,50 mts desde la canilla mas alta de ducha', 194),
(479, 'ESTRUCTURAS', 204),
(480, 'EQUIPAMIENTOS FIJOS', 204),
(489, 'EN m2', 192),
(487, 'MATERIALES DE CONSTRUCCION', 200),
(488, 'EN m2', 191),
(164, 'REPRESENTACION QUIEBRE ', 204),
(165, 'VISTA  Y/O CORTE DEL TANQUE DE AGUA', 204),
(490, 'EN m2', 340),
(486, 'TERRAZAS', 200),
(168, '1:50 ', 205),
(169, '1:100 ', 205),
(495, 'DIMENSIONES DE SUS LIMITES', 356),
(496, 'TIPO DE CIERRE', 356),
(616, 'TRIANGULOS DE VISIBLIDAD', 183),
(176, 'TECHOS', 207),
(177, 'MUROS', 207),
(178, 'ESTRUCTURA DE HORMIGON ARMADO', 207),
(179, 'DE HORMIGÓN CICLOPEO', 207),
(180, 'de acuerdo al plano de arquitectura corregido', 146),
(181, 'de acuerdo al plano de arquitectura corregido', 147),
(182, 'de acuerdo al plano de arquitectura corregido', 148),
(183, 'debe firmar el propietario', 149),
(184, 'debe firmar el poseedor', 149),
(185, 'indicar lo que corresponde', 150),
(186, 'PLANTAS ESTRUCTURA', 151),
(187, 'PLANILLAS DE CALCULO', 151),
(188, 'la escala para planta ', 152),
(189, ' "E"- y el Numero del plano ', 153),
(190, 'el Norte Magnetico ', 154),
(191, 'croquis de la propiedad ', 155),
(192, 'calle principal', 155),
(193, 'calles perpendiculares a la principal', 155),
(194, 'Apellidos y Nombres de profesionales del Proyecto', 156),
(195, 'domicilio de profesionales del Proyecto', 157),
(196, 'domicilio de profesionales del Calculo', 160),
(197, 'Apellidos y Nombres de profesionales del Calculo', 139),
(198, 'Apellidos y Nombres de profesionales del Calculo', 159),
(199, 'matricula de profesionales del calculo', 161),
(200, 'Apellidos y Nombres de profesionales de la Dir. Tec.', 163),
(201, 'domicilio de profesionales de la Dir.Tec.', 164),
(202, 'matricula de profesionales de la Dir. Tec.', 165),
(203, 'CONDUCCION POR ADMINISTRACION', 166),
(204, 'En obra proyectada', 167),
(205, 'En plano conforme a obra', 167),
(206, 'En obra proyectada', 168),
(207, 'En plano conforme a obra', 168),
(208, 'En Relevamiento', 168),
(209, 'En obra proyectada', 169),
(210, 'En plano conforme a obra', 169),
(211, 'En Relevamiento', 169),
(212, 'Colocar la Momenclatura Catastral', 170),
(213, ' EL PADRÓN MUNICIPAL', 176),
(214, 'Colocar Padron  Municipal', 171),
(215, 'coincidentes con planta de arquiotectura', 208),
(216, 'faltan columnas', 209),
(217, 'faltan vigas', 209),
(218, ' faltan losas ', 209),
(219, 'faltan correas', 209),
(220, 'faltan muros sismicos', 209),
(221, 'faltan bases', 209),
(222, 'faltan vigas en voladizos', 209),
(223, 'entre niveles fundacion-dintel y techo', 210),
(224, 'COLUMNAS', 211),
(225, ' VIGAS', 211),
(226, 'DESIGNARLOS', 211),
(227, 'coincidentes con planta de arquitectura', 212),
(228, 'fuera de la planta de arquitectura, al mismo nivel', 213),
(229, 'utilizar la mas conveniente, ', 214),
(230, 'VERIFICAR LONGITUD DE ANCLAJE', 215),
(231, 'DIAMETROS Y SEPARACIÓN VERTICAL Y HORIZONTAL', 216),
(232, 'debera en planos realizar detalles de todos los elementos estructurales', 217),
(234, 'CARGA TOTAL', 218),
(235, 'TIPO DE EMPOTRAMIENTO', 218),
(236, 'REACCIONES', 218),
(237, 'MOMENTO FLECTOR', 218),
(238, 'DIMENSIONES DE SECCION', 218),
(239, 'SECCIÓN DE CÁLCULO DE Fe', 218),
(240, 'ARMADURA, UBIC. CANTIDAD, DTO  Y CANTIDAD', 218),
(241, 'TENSIÓN DE CORTE', 218),
(242, 'ESTRIBOS DIAMETRO Y SEPARACIÓN', 218),
(243, 'coef. sismico', 219),
(244, 'Enumerar el elemento de acuerdo a designacion en planta', 219),
(245, 'dimensiones del elemento', 219),
(246, 'datos mecanicos', 219),
(247, 'cargas a considerar', 219),
(248, 'solicitaciones ', 219),
(249, 'observaciones', 219),
(250, 'DIMENSIONES GEOMETRICAS', 220),
(251, 'CARGAS', 220),
(252, 'SOLICITACIONES', 220),
(253, 'en R.O. colocar el DISTRITO Y DEPARTAMENTO', 222),
(254, 'DEBE IR SOL N°', 223),
(255, 'PLANO:', 224),
(256, 'EDIFICIO :', 225),
(257, 'CALLE:', 226),
(258, 'PROPIETARIO:', 227),
(259, 'en "6" cambiar "PROPIETARIO" por "TITULAR" y abajo', 228),
(260, 'falta la firma del responsable', 229),
(261, 'LABOR DE ACUERDO AL CERTIFICADO PROFESIONAL', 230),
(262, 'Apellido y Nombre del responsable', 231),
(263, 'domicilio completo del profesional responsable', 232),
(264, 'matricula del profesional ', 233),
(265, 'NOMBRES DE CALLE PERPENDICULARES A LA PRINCIPAL', 234),
(266, 'MARCAR SALIDA A CONEXION DE AGUA', 237),
(267, 'nombre de la calle principal', 236),
(268, 'conexion a cloacas', 236),
(269, 'MARCAR SALIDA CONEXIÓN CLOACAS (BERMELLÓN)', 238),
(270, 'va la palabra "ANTECEDENTES"', 239),
(271, 'EXP. DE CONSTRUCCIÓN :', 240),
(272, 'P.Municipal: debe colocarse el padron municipal de la propiedad', 241),
(273, 'NOM. CAT. colocar el numero catastral de la propiedad', 242),
(274, 'SUP. CUBIERTA: debe colocarse el total de sup cubierta', 243),
(436, 'POR BOCA NO SE PUEDE CONSIDERAR <  40 wts', 296),
(276, 'PENDIENTES PERMITIDAS DE 1/20 a 1/60', 244),
(277, 'INDICAR PENDIENTES', 244),
(278, 'INDICAR MATERIAL Y DIAMETRO', 244),
(279, 'COLOR BERMELLON O ROJO', 244),
(280, 'UBICAR CAMARA DE INSPECCION ', 244),
(281, 'conexiones entre caÃ?Â±os a 45Ã?Â°', 244),
(282, 'conexion perpendiculares a camaras de inspeccion ', 244),
(283, 'debe ventiarse', 244),
(284, 'deben conectarse los siguientes artefactos', 244),
(285, 'diametro minimo 110 mm', 244),
(286, 'diametro minimo de 64 mm entre', 245),
(287, 'diametro minimo de 40 mm entre', 245),
(288, 'color sepia', 245),
(289, 'de ambientes al exterior', 246),
(290, 'de las redes primarias', 246),
(291, 'de pozo absorventes', 246),
(292, 'color vede', 246),
(293, 'de pisos superiores', 246),
(294, 'cano perpendicular  a linea municipal', 244),
(295, 'CANO CAMARA VERTICAL (CCD) de inspeccion', 244),
(296, 'coincidente con planta de arquitectura', 250),
(297, 'sin muebles mobiles', 250),
(298, 'de artefactos fijos', 250),
(299, 'marcar los muros necesarios', 251),
(300, 'acotar sus extremos ', 252),
(301, 'indicar pendientes coincidentes con pendientes de planta', 252),
(302, 'debe representase  los canos y todos artefactos de la red', 252),
(303, 'no es necesario marcarlas en corte', 253),
(304, 'el pie de inodoros a no menos de 40 cm del terreno natural', 252),
(305, 'todos los elementos coincidente con los marcados en planta', 254),
(306, 'designarlas con CV', 254),
(307, 'el cano debe sobrepasar al techo', 254),
(308, 'indicar que corte es', 251),
(309, 'indicar los cortes', 250),
(310, 'ESC:50', 198),
(311, 'ESC:100', 198),
(312, 'ILUMINACION', 255),
(313, 'BAJA TENSION', 255),
(314, 'FUERZA MOTRIZ', 255),
(315, 'TABLEROS', 256),
(316, 'MONTANTES', 256),
(317, 'PLANTA BAJA - ', 256),
(323, 'acotar entrada y salida de camara de inspeccion', 252),
(322, 'NUEVA', 258),
(518, 'CANERIAS EMBUTIDAS', 260),
(520, 'EN CASO DE POSEEDOR COLOCAR EL TITULAR', 262),
(324, 'BTI boca tapa de inspeccion', 244),
(325, 'BTA boca tapa de inspeccion', 252),
(326, 'en color azul', 279),
(327, 'indicar caballete y llave de paso', 279),
(328, 'canilla de servicio cerca de llave de paso', 279),
(329, 'tanque de agua', 279),
(330, 'cisternas de agua', 279),
(331, 'designacion con numeros y los circulos en azul', 279),
(332, 'color amarillo y trazos continuo', 280),
(333, 'AMPLIACION', 258),
(334, 'RELEVAMIENTO', 258),
(335, 'REMODELACION', 258),
(336, 'CONFORME A OBRA', 258),
(337, 'AIRE ACONDICIONADO CENTRAL', 259),
(338, 'ASCENSORES', 259),
(339, 'CALDERAS', 259),
(340, 'RAYOS X', 259),
(341, 'LETREROS DE ALTA Y BAJA TENSION', 259),
(342, 'VIDRIERAS - MARQUESINAS', 259),
(343, 'ILUMINACION DE EMERGENCIA', 259),
(519, 'APELLIDO Y NOMBRE DEL TITULAR', 262),
(517, 'CANERIAS A LA VISTA', 260),
(346, 'CONDUCTORES SOBRE AISLADORES', 260),
(347, 'CONDUCTORES EN BANDEJA', 260),
(348, 'CONDUCTORES SUBTERRANEOS', 260),
(349, 'VIVIENDA', 261),
(350, 'COMERCIO', 261),
(351, 'INDUSTRIA', 261),
(352, 'TALLER', 261),
(353, 'HOSPITAL', 261),
(355, 'INDICAR APERTURA', 186),
(356, 'PARCIALES', 178),
(357, 'GENERALES', 178),
(358, 'VISIBLES', 178),
(359, '', 316),
(360, '20% PARA RAMPAS VEHICULARES', 316),
(361, '7% PARA RAMPA DISCAPACITADO', 316),
(362, 'NORMALIZADAS', 178),
(363, 'FOS', 316),
(364, 'FOT', 316),
(365, 'LOCALES HABITABLES', 184),
(366, 'LOCALES NO HABITABLES', 184),
(367, 'LOCALES COMERCIALES', 184),
(368, 'LOCALES INDUSTRIALES', 184),
(369, 'LOCALES ESPECIALES', 184),
(371, 'COLOCAR VELOCIDAD DE VIENTO', 320),
(372, 'PESO PROPIO', 307),
(373, 'SOBRECARGA SEGUN DESTINO', 307),
(374, 'INCLUIR PESO DE CUBIERTA', 307),
(375, 'CARGA TOTAL', 307),
(376, 'PESO PROPIO', 308),
(377, 'INCLUIR PESO DE CUBIERTA', 308),
(378, 'SOBRECARGA SEGÚN DESTINO', 308),
(379, 'PESO TOTAL', 308),
(380, 'PESO PROPIO ', 309),
(381, 'PESO DE NIEVE', 309),
(382, 'PRESIÓN DE VIENTO', 309),
(383, 'SUBCIÓN DE VIENTO', 309),
(384, 'CARGA DE MONTAJE MONTAJE', 309),
(385, 'COEFICIENTE ZONAL', 310),
(386, 'COEFICIENTE DESTINO', 310),
(387, 'COEFICIENTE ESTRUCTURA', 310),
(388, 'COEFICIENTE POR SUELO', 310),
(389, 'QUE SE SE PERMITA EL COLADO DEL H°', 215),
(390, 'FACTOR DE RAFAGA', 320),
(391, 'GRADO DE EXPOSICION', 320),
(392, 'COEFICIENTE DEL DESTINO', 320),
(393, 'COLORES', 248),
(394, 'MARCANDO LOS MUROS SIN CARPINTERIA', 250),
(395, 'NO MAS 15 BOCAS PARA CIRC. MIXTOS', 292),
(396, 'NO MAS DE 20 BOCAS CIRC. ILUMINACIÓN EXCLUSIVA', 292),
(397, 'NO MAS DE 10 BOCAS CIRC TOMAS EXCLUSIVOS', 292),
(398, ' SE DEBEN IDENTIFICAR ', 292),
(399, 'INDEPENDIENTES PARA ', 292),
(407, 'CONDUCTORES NEUTRO', 292),
(406, 'CONDUCTORES DE TIERRA', 292),
(402, 'SEPARACION MAX. REGISTRO EN CAÑERIA  9 MTS', 292),
(403, 'UN NEUTRO POR CADA CIRCUITO', 292),
(404, 'NO COMPARTIR CAÑERÍA ', 292),
(408, 'CORREGIR CALCULOS', 292),
(409, 'CAÑERÍAS ', 292),
(410, 'TABLEROS', 295),
(411, 'BOMBAS', 295),
(412, 'TOMAS PARA AIRE ACONDICIONADO', 295),
(413, 'ACOMETIDA SUBTERRANEA', 295),
(414, 'ACOMETIDA AEREA', 295),
(415, 'RALLADO DIFERENCIANDOLA', 294),
(416, 'REFERENCIA DEL N° DE EXPTE', 294),
(417, 'SIMBOLOGIA  SOMBREADA', 294),
(418, 'SI CAÑERIA', 294),
(419, '', 294),
(420, 'SIMBOLOS SIN SOMBREAR', 373),
(421, 'CONDUCTOR DE TIERRA CON UN "T" ADELANTE', 293),
(422, 'LA CAÑERIA EL DIÁMETRO Y MATERIAL (SI ES PVC)', 293),
(423, 'EN AEREA', 293),
(424, 'EN SUBTERRANEA', 293),
(425, 'EN EMBUTIDA SE COLOCA SOLAMENTE EL DTO ', 293),
(426, 'EN PROPIEDAD HORIZONTAL', 299),
(427, 'DE VIVIENDA', 299),
(428, 'DE HOTELES', 299),
(429, 'DE OFICINAS', 299),
(430, 'DE INDUSTRIAS', 299),
(431, 'DE COMERCIO', 299),
(432, 'DE ESTABLECIMIENTOS EDUCATIVOS', 299),
(433, 'RED DE AGUA', 247),
(434, 'RED PRIMARIA', 247),
(435, 'PLUVIALES', 247),
(437, 'POR CADA UNIDAD NO SE PUEDE CONSIDERAR < 150 wts', 297),
(438, 'EN PROPIEDAD HORIZONTAL', 300),
(439, 'LECHO FILTRANTE', 377),
(440, 'DIMENSIONES', 377),
(441, 'DIMENSIONES DE JABALINA', 374),
(442, 'CONDUCTOR AISLADO', 374),
(443, 'MATERIAL MEJORADOR DE LA CONDUCTIVIDAD', 374),
(444, 'CÁMARA DE INSPECCIÓN 20x20 cm', 374),
(445, 'EL POZO DEBE TENER LA PROFUNDIDAD DE LA LONGITUD DE JABALINA', 374),
(446, 'TIPO DE POSTE (MATERIAL)', 376),
(447, 'ALTURA DEL POSTE', 376),
(448, 'DISTANCIA ENTRE POSTE', 376),
(449, 'PROFUNDIDAD DE BASE DEL POSTE', 376),
(450, 'LA  A DEMOLER O MAYOR DE 30 AÑOS', 179),
(451, 'CON N° Y CON NOMBRES', 180),
(452, 'EN LOCALES COMERCIALES', 318),
(453, 'EN  UNIDADES HABITACIONALES', 318),
(454, 'EN LOCALES INDUSTRIALES', 318),
(455, 'EN CONJUNTOS HABITACIONALES ', 318),
(456, 'EN LOCALES DE ESTACIONAMIENTO', 318),
(457, 'EN UNA UNIDAD HABITACIONAL', 318),
(458, 'VENTANAS PERPENDICULARES A EJE COLINDANCIA', 336),
(459, 'VENTANAS PARALELAS A EJE COLINDANCIA', 336),
(461, 'SEPARACION DE COLINDANCIA A 2,5 cm  DEL LIMITE TERRENO', 183),
(460, 'RETIROS (SEGÚN SECTOR DE FACTIBILIDAD)', 183),
(462, 'ELECTRODUCTOS', 183),
(463, 'SERVIDUMBRES DE RIEGO', 183),
(464, 'UBICACIÓN DE POZO ABSORBENTE', 183),
(465, 'MININO DOS CORTES PERPENDICULARES POR PLANTA', 319),
(466, 'DESIGNARLO CON LETRAS  O N°', 319),
(467, 'DE ELECTRODUCTO', 317),
(468, 'PEATONALES Y/O VEHICULAR', 317),
(469, 'DE RIEGO', 317),
(470, 'O AFECTADA A ENSANCHES', 317),
(471, 'INDICAR CON LINEA LOS CAMBIOS  DE NIVEL', 177),
(475, 'DE LOS BAÑOS', 339),
(476, 'DEL LAVADERO', 339),
(477, 'DE LA SALA DE MAQUINAS', 339),
(478, 'SEGUN CALCULO', 338),
(481, 'CARPINTERIA', 204),
(482, 'CONDUCTOS DE VENTILACION', 204),
(491, 'EN m2  con el N° de Expte ', 190),
(492, 'EN m2', 341),
(493, 'CARPINTERIA', 206),
(494, 'CONSTRUCCIONES ', 206),
(615, 'OCHAVAS ', 183),
(498, 'REPRESENTAR TODAS CONSTRUCCIONES ', 188),
(499, 'INDICAR LECHOS PERCOLADORES', 188),
(500, 'INDICAR Y ACOTAR PILETAS', 188),
(502, 'INDICAR CUNETAS ', 189),
(503, 'INDICAR PUENTES PEATONAL', 189),
(504, 'INDICAR PUENTE VEHICULAR', 189),
(505, 'INDICAR FORESTALES', 189),
(506, 'INDICAR LINEAS DE MEDIA Y ALTA TENSION', 189),
(507, 'ESPACIOS SUJETOS A ENSANCHA DE CALLE', 189),
(511, 'PUESTA A TIERRA', 386),
(512, 'TERMOMÁGNETICA ', 386),
(513, 'DISTANCIA MÍNIMA ', 386),
(514, 'ELEMENTOS  QUE NO SEAN DE BAJA  TENSION', 390),
(516, 'E-(numero de plano que corresponde a electricidad)', 257),
(521, 'LA UBICACIÓN REAL DE LA OBRA', 263),
(523, 'COLOCAR EL NUMERO DE EXPEDIENTE MUNICIPAL', 264),
(525, 'DEBE FIRMAR EL PROPIETARIO', 265),
(526, 'DE TECHOS', 207),
(527, 'CONFINAMIENTO DE BORDE', 216),
(528, 'FUNDACION DETALLE DE ARMADURA', 216),
(529, 'FUNDACION DETALLE DE ARMADURA', 321),
(530, 'ARMADURAS EN LOSA', 321),
(531, 'VIGAS DE APOYO', 321),
(532, 'INDICAR LONGITUDES Y ESPESORES', 322),
(533, 'TIPO Y DIÁMETRO DEL TORNILLO', 322),
(534, 'LONGITUDES DE SOLDADURAS', 322),
(535, 'E HIPOTISIS', 325),
(536, 'COMPROBACIÓN Y VERIFICACION', 325),
(537, 'DIMENSIONES Y ARMADURAS', 329),
(538, 'SOLICITACIONES  ', 329),
(539, 'DIMENSIONES Y ARMADURAS', 328),
(540, 'SOLICITACIONES', 328),
(541, 'DESIGNACIONES  ', 329),
(542, 'DESIGNACIONES', 328),
(543, 'DESIGNACIONES', 221),
(544, 'DESIGNACIONES', 330),
(545, 'DESIGNACIONES', 220),
(546, 'DESIGNACIONES', 218),
(547, 'DESIGNACIONES', 365),
(548, 'LUZ DE CALCULO', 221),
(549, 'SOLICITACIÓN REACCIONES Y MOMENTOS', 221),
(550, 'SERIES', 221),
(551, 'ALTURA DE LADRILLO', 221),
(552, 'ALTURA CAPA DE COMPRESION', 221),
(553, 'MALLA DE REPARTICION', 221),
(554, 'ARMADURAS LONG Y TRANSV,', 330),
(555, 'SOLICITACIONES', 330),
(556, 'ESPESOR DEL TABIQUE', 330),
(557, 'SEPARADORES Y RECUBRIMIENTO', 330),
(558, 'VERIFICACIÓN TENSIÓN Y FLECHA', 220),
(559, 'LUZ DE CÁLCULO', 218),
(560, 'MAS Y/O PESOS  SÍSMICOS,', 365),
(561, 'RIGIDEZ RELATIVA DEL ELEMENTO', 365),
(562, 'GEOMETRÍA Y UBICACIÓN DEL ELEMENTO', 365),
(563, 'MOMENTOS TORSORES EN X e Y', 365),
(564, 'EXCENTRICIDAD DE CALCULO', 365),
(565, 'UBICACION CENTRO DE MAZA Y DE RIGIDEZ', 365),
(566, 'FUERZAS SISMICA TOTAL EN X e Y', 365),
(567, 'SOLICITACIÓN POR CORTE DIRECTO', 365),
(568, 'SOLICITACIÓN POR TORSION', 365),
(569, 'TENSIONES DE CORTE', 365),
(570, 'VERIFICACIÓN DE SUMA DE CORTE DIRECTOS', 365),
(571, 'MOMENTO VUELCO e INCREMENTO SISMICO', 365),
(572, 'DESIGNACIÓN DE ELEMENTOS ESTRUCTURALES', 366),
(573, 'FIRMAS', 399),
(574, 'LUGAR Y FECHA', 399),
(575, 'RESPONSABLE', 399),
(576, 'LUGAR, FECHA, RESPONSABLE, FIRMA', 399),
(577, '   ', 395),
(578, '    ', 397),
(579, '  ', 396),
(583, ' DE ALTURA MÁXIMA Y MINIMAS', 400),
(581, '   ', 397),
(582, '   ', 398),
(584, 'CONEXION ENTRE MED. Y TG', 292),
(585, 'LOS PROTO SE INDICAN CON LINEAS DE TRAZOS', 290),
(586, 'EL NEUTRO LINEA DE TRAZOS, TIERRA LINEA Y PUNTO, LAS FASES LINEA CONTINUAS', 401),
(587, 'EL NEUTRO LINEA DE TRAZOS, TIERRA LINEA Y PUNTO, LAS FASES LINEA CONTINUAS', 386),
(588, '', 387),
(589, 'EL NEUTRO LINEA DE TRAZOS, TIERRA LINEA Y PUNTO, LAS FASES LINEA CONTINUAS', 387),
(590, 'LLAVES COMBIMADAS', 292),
(591, 'NOM CAT', 274),
(592, 'LINEA DE TRAZO Y PUNTO', 403),
(593, 'ACOTAR DISTANCIA A PLANTA', 402),
(594, 'PISO', 256),
(595, ' DE LOS LOCALES', 404),
(596, ' DE ARTEFACTOS', 404),
(597, ' DE LOS CORTES ', 404),
(598, ' DE LAS REDES ', 404),
(599, ' PLANTA BAJA', 404),
(600, 'PISO', 404),
(601, 'DESIGNACIÓN DE LETRAS', 335),
(602, 'AGREGAR ', 248),
(603, 'CORREGIR', 248),
(604, 'TITULO DEL CORTE', 404),
(605, 'TITULO DEL CORTE', 405),
(652, 'FUNDACIONES-ESTRUCTURA Y MUROS', 207),
(607, 'Y SUS PORCENTAJES', 357),
(608, 'VENTILACIONES Y TANQUE DE AGUA', 407),
(609, 'VENTILACIONES', 407),
(610, 'TANQUE DE AGUA', 407),
(611, 'DIBUJAR GARGOLAS', 358),
(612, 'LEYENDA SI ES LIBRE DESBORDE', 358),
(613, 'DIBUJAR  ARBOLES ', 189),
(614, 'INDICAR NORTE MAGNETICO', 356),
(617, 'INGRESOS A GARAGE Y ACOTAR LA LONGITUD LIBRE', 183),
(618, 'LAS LABORES QUE CORRESPONDAN ', 136),
(619, ' PARA EVITAR LOS SELLOS ANTIREGLAMENTARIO', 408),
(620, 'EN EL SIMBOLO UTILIZADO CON', 409),
(621, '  DECLARANDO SOBRES LAS SERVIDUMBRES', 410),
(622, ' PROYECTO', 266),
(623, ' RELEVAMIENTO', 266),
(624, ' COMPLETAR RECUADRO', 411),
(625, ' V° B° OFICINA TÉCNICA  A IZQUIERDA', 277),
(626, ' VISADO A LA DERECHA', 277),
(629, ' .-', 412),
(628, 'DE ACUERDO A CARATULA MODELO', 413),
(631, ' EN REVELAMIENTO VAN SIN RELLENO', 290),
(632, ' DIBUJARLO SOBRE LINEA DE CIERRE', 414),
(633, ' CABLEADO A TABLERO GENERAL', 414),
(634, ' NO COINCIDE CON CAPACIDAD DE TERMICAS', 415),
(635, ' PUESTA A TIERRA', 416),
(636, ' INDICAR SALIDAS ', 386),
(637, '  INDICAR CARACTERÍSTICAS TÉCNICAS', 417),
(638, ' FALTA CALCULO', 292),
(639, ' NO LLEVA TIERRA', 417),
(640, ' DE TIERRA', 418),
(641, ' NO SE ACEPTAN CABLES DESNUDOS', 374),
(642, 'CAÑERIA ENTRE MEDIDOR Y TABLERO', 414),
(643, ' LAS BAJADAS ', 333),
(644, '.-', 419),
(645, ' SU CALCULO INCLUYENDO LOS COEFICIENTES SISMICOS', 420),
(646, ' VERIFICACION DEL TERRENO', 328),
(647, 'CALLES PERPENDICULARES', 135),
(649, '', 204),
(650, '.-', 421),
(651, 'SI EXISTEN, REPRESENTARLAS Y ACOTARLAS', 422),
(653, '.-', 423),
(654, ' CORREGIR DIMENSIONES DE ', 318),
(655, ' FALTA REPRESENTACIÓN BARANDA', 318),
(656, '', 318),
(657, ' PROYECCIÓN CONDUCTOS DE VENTILACIÓN', 185),
(658, ' BASES Y VIGAS', 196),
(659, 'NO ACEPTADOS EN ESPACIO PÚBLICO', 424),
(660, '.-', 425),
(661, ' COLOCAR N° PADRON MUNICIPAL ', 275),
(662, 'NO  VA NADA', 228),
(663, ' LEYENDA CONEXIÓN DE AGUA', 429),
(664, ' COLOCAR LEYENDA CONEXIÓN DE AGUA', 430),
(665, ' COLOCAR LEYENDA CONEXION CLOACAS', 431),
(666, ' AMPLIACIÓN', 432),
(667, ' CONSERVACIÓN DE INSTALACIÓN SANITARIA EXISTENTE', 433),
(668, 'DESAGÜE PROVISORIO A POZO', 433),
(669, ' AGREGAR SISTERNA ', 434),
(670, ' AGREGAR SISTERNA CON EQUIPOS DE BOMBEO', 435),
(671, '.-', 436),
(672, 'SERVICIOS EN CALLE', 396),
(673, 'NOM CAT - PADRON  - TERRITORIAL - CALLE', 399),
(674, 'CUANDO EL PLANO ES RELEVAMIENTO', 173);

-- --------------------------------------------------------

--
-- Table structure for table `destino`
--

CREATE TABLE IF NOT EXISTS `destino` (
  `iddestino` int(10) NOT NULL AUTO_INCREMENT,
  `nombredestino` varchar(50) DEFAULT NULL,
  `coeficienteSuperficie` bigint(20) NOT NULL,
  PRIMARY KEY (`iddestino`),
  KEY `Index 1` (`iddestino`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `destino`
--

INSERT INTO `destino` (`iddestino`, `nombredestino`, `coeficienteSuperficie`) VALUES
(1, 'Edificios Publicos', 0),
(2, 'Pileta de Natacion cap < 100 m3', 0),
(3, 'Mausoleos', 0),
(4, 'Fosa Pileta', 0),
(5, 'Tinglados cerrado hasta 50%', 0),
(7, 'Oficina', 0),
(8, 'Tinglados', 1000),
(9, 'Galpones', 1000),
(10, 'Hoteles', 0),
(11, 'Bodegas y/o Destiilerias', 0),
(13, 'Salones Comercios', 0),
(14, 'Vivienda', 180),
(15, 'Boca', 0),
(16, 'Recinto', 0),
(18, 'Antena en ml', 0),
(19, 'Pileta de Natacion cap de 100 a 200 m3', 0),
(20, 'Pileta de Natacion cap > 200 m3', 0),
(21, 'Chimeneas en ml', 0),
(22, 'Tanques Elevados', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `iddescripcion` int(10) DEFAULT '0',
  `nombre` varchar(150) DEFAULT NULL,
  `iddetalle` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=839 ;

--
-- Dumping data for table `detalle`
--

INSERT INTO `detalle` (`iddescripcion`, `nombre`, `iddetalle`) VALUES
(47, '--', 1),
(2, 'UNIFAMILIAR\r\n', 2),
(2, 'MULTIFAMILIAR\r\n', 3),
(2, 'Y DEPARTAMENTOS\r\n', 4),
(2, 'Y SALON  COMERCIAL\r\n', 5),
(2, 'Y OFICINAS\r\n', 6),
(2, 'Y CONSULTORIOS\r\n', 7),
(2, 'Y TINGLADO\r\n', 8),
(2, 'Y GALPON\r\n', 9),
(2, 'Y AMPLIACION DE DEPARTAMENTOS\r', 10),
(2, 'Y AMPLIACION DE  SALON  COMERCiIAL', 11),
(2, 'Y AMPLIACION DE OFICINAS\r\n', 12),
(2, 'Y AMPLIACION DECONSULTORIOS\r\n', 13),
(2, 'Y AMPLIACION DE TINGLADO\r\n', 14),
(2, 'Y AMPLIACION DE GALPON\r\n', 15),
(2, 'Y RELEVAMIENTO DE DEPARTAMENTOS\r\n', 16),
(2, 'Y RELEVAMIENTO N DE  SALON  COMERCIAL\r\n', 17),
(2, 'Y RELEVAMIENTO  DE  OFICINAS\r\n', 18),
(2, 'Y RELEVAMIENTO  DE CONSULTORIOS', 19),
(2, ' Y RELEVAMIENTO DE TINGLADO', 20),
(2, 'Y RELEVAMIENTO  DE  GALPON\r\n', 21),
(3, 'Y DE DEPARTAMENTOS\r\n', 22),
(3, 'Y DE  SALON  COMERCIAL\r\n', 23),
(3, 'Y DE  OFICINAS\r\n', 24),
(3, 'Y DE CONSULTORIOS\r\n', 25),
(3, 'Y DE TINGLADO\r\n', 26),
(3, 'Y DE GALPON\r\n', 27),
(3, ' Y CONSTRUCCION DE DEPARTAMENTOS\r\n', 28),
(3, ' Y CONSTRUCCION DE  SALON  COMERCIAL\r\n', 29),
(3, ' Y CONSTRUCCION DE OFICINAS\r\n', 30),
(3, ' Y CONSTRUCCION DE CONSULTORIOS\r\n', 31),
(3, ' Y CONSTRUCCION DE  TINGLADO\r\n', 32),
(3, ' Y CONSTRUCCION DE  GALPON\r\n', 33),
(3, ' Y RELEVAMIENTO DE DEPARTAMENTOS\r\n', 34),
(3, ' Y RELEVAMIENTO DE  SALON  COMERCIAL\r\n', 35),
(3, ' Y RELEVAMIENTO DE OFICINAS\r\n', 36),
(3, ' Y RELEVAMIENTO DE CONSULTORIOS\r\n', 37),
(3, ' Y RELEVAMIENTO DE TINGLADO\r\n', 38),
(3, ' Y RELEVAMIENTO DE  GALPON\r\n', 39),
(4, '--\r\n', 40),
(4, 'Y DE DEPARTAMENTOS\r\n', 41),
(4, 'Y DE  SALON  COMERCIAL\r\n', 42),
(4, 'Y DE  OFICINAS\r\n', 43),
(4, 'Y DE CONSULTORIOS\r\n', 44),
(4, 'Y DE TINGLADO\r\n', 45),
(4, 'Y DE GALPON\r\n', 46),
(5, '--\r\n', 47),
(3, '--\r\n', 48),
(5, 'Y SALON  COMERCIAL\r\n', 49),
(5, 'Y OFICINAS\r\n', 50),
(5, 'Y CONSULTORIOS\r\n', 51),
(5, 'Y TINGLADO\r\n', 52),
(5, 'Y GALPON\r\n', 53),
(5, 'Y RELEVAMIENTO DE VIVIENDA\r\n', 54),
(5, 'Y RELEVAMIENTO DE SALON  COMERCIAL\r\n', 55),
(5, 'Y RELEVAMIENTO DE OFICINAS\r\n', 56),
(5, 'Y RELEVAMIENTO DECONSULTORIOS\r\n', 57),
(5, 'Y RELEVAMIENTO DE TINGLADO\r\n', 58),
(5, 'Y RELEVAMIENTO DE GALPON\r\n', 59),
(6, '--\r\n', 60),
(6, 'Y SALON  COMERCIAL\r\n', 61),
(6, 'Y OFICINAS\r\n', 62),
(6, 'Y CONSULTORIOS\r\n', 63),
(6, 'Y TINGLADO\r\n', 64),
(6, 'Y GALPON\r\n', 65),
(6, 'Y RELEVAMIENTO DE VIVIENDA\r\n', 66),
(6, 'Y RELEVAMIENTO DE SALON  COMERCIAL\r\n', 67),
(6, 'Y RELEVAMIENTO DE OFICINAS\r\n', 68),
(6, 'Y RELEVAMIENTO DE CONSULTORIOS\r\n', 69),
(6, 'Y RELEVAMIENTO DE TINGLADO\r\n', 70),
(6, 'Y RELEVAMIENTO DE GALPON\r\n', 71),
(7, '--\r\n', 72),
(7, 'Y DE SALON  COMERCIAL\r\n', 73),
(7, 'Y DE OFICINAS\r\n', 74),
(7, 'Y DE CONSULTORIOS\r\n', 75),
(7, 'Y DE TINGLADO\r\n', 76),
(7, 'Y DE GALPON\r\n', 77),
(8, '--\r\n', 78),
(8, 'Y OFICINAS\r\n', 79),
(8, 'Y CONSULTORIOS\r\n', 80),
(8, 'Y TINGLADO\r\n', 81),
(8, 'Y GALPON\r\n', 82),
(8, ' Y AMPLIACION DE OFICINAS\r\n', 83),
(8, ' Y AMPLIACION DE CONSULTORIOS\r\n', 84),
(8, ' Y AMPLIACION DE DEPARTAMENTO\r\n', 85),
(8, ' Y AMPLIACION DE GALPON\r\n', 86),
(8, 'Y RELEVAMIENTO DE OFICINAS\r\n', 87),
(8, 'Y RELEVAMIENTO DE CONSULTORIOS\r\n', 88),
(8, 'Y RELEVAMIENTO DE TINGLADO\r\n', 89),
(8, 'Y RELEVAMIENTO DE GALPON\r\n', 90),
(8, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 91),
(9, '--\r\n', 92),
(9, 'Y OFICINAS\r\n', 93),
(9, 'Y CONSULTORIOS\r\n', 94),
(9, 'Y TINGLADO\r\n', 95),
(9, 'Y GALPON\r\n', 96),
(9, ' Y CONSTRUCCION DE OFICINAS\r\n', 97),
(9, ' Y CONSTRUCCION DECONSULTORIOS\r\n', 98),
(9, ' Y CONSTRUCCION DE TINGLADO\r\n', 99),
(9, ' Y CONSTRUCCION DE GALPON\r\n', 100),
(9, 'Y RELEVAMIENTO DE OFICINAS\r\n', 101),
(9, 'Y RELEVAMIENTO DE CONSULTORIOS\r\n', 102),
(9, 'Y RELEVAMIENTO DE TINGLADO\r\n', 103),
(9, 'Y RELEVAMIENTO DEGALPON\r\n', 104),
(9, 'Y RELEVAMIENTO DE DEPARTAMENTOS\r\n', 105),
(10, '--\r\n', 106),
(10, 'Y DE OFICINAS\r\n', 107),
(10, 'Y DE  CONSULTORIOS\r\n', 108),
(10, 'Y DETINGLADO\r\n', 109),
(10, 'Y DE GALPON\r\n', 110),
(10, 'Y DE DEPARTAMENTOS\r\n', 111),
(11, '--\r\n', 112),
(11, 'Y CONSULTORIOS\r\n', 113),
(11, 'Y TINGLADO\r\n', 114),
(11, '--\r\n', 115),
(11, 'Y GALPON\r\n', 116),
(11, 'Y AMPLIACION DE CONSULTORIOS\r\n', 117),
(11, 'Y AMPLIACION DE TINGLADO\r\n', 118),
(11, 'Y DE DEPARTAMENTOS\r\n', 119),
(11, 'Y RELEVAMIENTO DE CONSULTORIOS\r\n', 120),
(11, 'Y RELEVAMIENTO DE TINGLADO\r\n', 121),
(11, 'Y RELEVAMIENTO DE GALPON\r\n', 122),
(11, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 123),
(12, '--\r\n', 124),
(12, 'Y CONSULTORIOS\r\n', 125),
(12, 'Y TINGLADO\r\n', 126),
(12, 'Y GALPON\r\n', 127),
(12, 'Y CONSTRUCCION DE CONSULTORIOS \r\n', 128),
(12, 'Y CONSTRUCCION DE TINGLADO\r\n', 129),
(12, 'Y CONSTRUCCION DE GALPON\r\n', 130),
(12, 'Y RELEVAMIENTO DE CONSULTORIOS\r\n', 131),
(12, 'Y RELEVAMIENTO DE TINGLADO\r\n', 132),
(12, 'Y RELEVAMIENTO DE GALPON\r\n', 133),
(12, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 134),
(13, '--\r\n', 135),
(13, 'Y DE CONSULTORIOS\r\n', 136),
(13, 'Y DETINGLADO\r\n', 137),
(13, 'Y DEGALPON\r\n', 138),
(14, '--\r\n', 139),
(14, 'Y TINGLADO\r\n', 140),
(14, 'Y GALPON\r\n', 141),
(14, ' Y AMPLIACION DE TINGLADO\r\n', 142),
(14, ' Y AMPLIACION DE GALPON\r\n', 143),
(14, 'Y RELEVAMIENTO DE TINGLADO\r\n', 144),
(14, 'Y RELEVAMIENTO DE GALPON\r\n', 145),
(14, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 146),
(15, '--\r\n', 147),
(15, 'Y TINGLADO\r\n', 148),
(15, 'Y GALPON\r\n', 149),
(15, 'Y CONSTRUCCION DE TINGLADO\r\n', 150),
(15, 'Y CONSTRUCCION DE GALPON\r\n', 151),
(15, ' Y RELEVAMIENTO DE TINGLADO\r\n', 152),
(15, ' Y RELEVAMIENTO DE GALPON\r\n', 153),
(15, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 154),
(16, '--\r\n', 155),
(16, 'Y DE TINGLADO\r\n', 156),
(16, 'Y DE GALPON\r\n', 157),
(17, '--\r\n', 158),
(17, 'Y DE TINGLADO\r\n', 159),
(17, 'Y AMPLIACION DE TINGLADO\r\n', 160),
(17, ' Y RELEVAMIENTO DE TINGLADO\r\n', 161),
(18, '--\r\n', 162),
(18, 'Y DE TINGLADO\r\n', 163),
(18, 'Y CONSTRUCCION DE TINGLADO\r\n', 164),
(18, 'Y RELEVAMIENTO DE TINGLADO\r\n', 165),
(18, 'Y RELEVAMIENTO DE DEPARTAMENTO\r\n', 166),
(19, '--\r\n', 167),
(19, 'Y DE TINGLADO\r\n', 168),
(19, 'Y DE DEPARTAMENTO\r\n', 169),
(20, '--\r\n', 170),
(20, 'Y AMPLIACION DEPARTAMENTO\r\n', 171),
(21, '--\r\n', 172),
(22, '--\r\n', 173),
(22, 'Y RELEVAMIENTO DEPARTAMENTO\r\n', 174),
(23, 'VIVIENDA UNIFAMILIAR\r\n', 175),
(23, 'VIVIENDA MULTIFAMILIAR\r\n', 176),
(23, 'DEPARTAMENTOS\r\n', 177),
(23, 'SALON  COMERCIAL\r\n', 178),
(23, 'borrar', 179),
(23, 'CONSULTORIOS\r\n', 180),
(23, 'TINGLADO\r\n', 181),
(23, 'GALPON\r\n', 182),
(24, '--\r\n', 183),
(24, ' COINCIDENTE CON LOS DATOS DE CATASTRO', 184),
(25, '--\r\n', 185),
(25, 'coincidentes con datos de catastro\r\n', 186),
(26, 'y colocar abajo POSEEDOR :', 187),
(27, 'coincidente con documentacion adjunta\r\n', 188),
(28, '--', 189),
(28, 'coincidentes con datos de catastro\r\n', 190),
(30, '--\r\n', 191),
(29, '--\r\n', 192),
(31, 'SUPERFICIE RELEVADA DE VIVIENDA\r\n', 193),
(31, 'SUPERFICIE RELEVADA DE DEPARTAMENTO\r\n', 194),
(31, 'SUPERFICIE RELEVADA DE SALON COMERCIAL\r\n', 195),
(31, 'SUPERFICIE RELEVADA DE OFICINAS\r\n', 196),
(31, 'SUPERFICIE RELEVADA DE CONSULTORIOS\r\n', 197),
(31, 'SUPERFICIE RELEVADA DE GALPONES\r\n', 198),
(31, 'SUPERFICIE RELEVADA DE TINGLADOS\r\n', 199),
(31, 'SUPERFICIE PROYECTADA DE VIVIENDA\r\n', 200),
(31, 'SUPERFICIE PROYECTADA  DE DEPARTAMENTO\r\n', 201),
(31, 'SUPERFICIE PROYECTADA DE SALON COMERCIAL', 202),
(31, 'SUPERFICIE PROYECTADA DE OFICINAS\r\n', 203),
(31, 'PROYECTADA DE CONSULTORIOS \r\n', 204),
(31, 'SUPERFICIE  PROYECTADA DE GALPONES \r\n', 205),
(31, 'SUPERFICIE  PROYECTADA DE TINGLADOS \r\n', 206),
(45, 'TOTAL DE SUPERFICIES ', 207),
(46, '--', 208),
(47, '"Firma del propietario"\r\n', 209),
(47, '"Firma del poseedor"\r\n', 210),
(47, '"Firma del apoderado"\r\n', 211),
(48, 'coincidentes con datos de catastro\r\n', 212),
(48, 'coincidente con datos del titulo\r\n', 213),
(48, '--', 214),
(49, 'Sup del terreno-Sup proyectada-Spr const', 215),
(50, '---', 216),
(51, '--', 217),
(50, 'Y CORTES', 218),
(50, 'Y FACHADA', 219),
(50, 'Y PLANIMETRIA', 220),
(52, '--', 222),
(51, 'Y PLANIMETRIA', 223),
(51, ' Y FACHADAS', 224),
(53, '--', 225),
(50, 'CORTES Y PLANIMETRIA', 226),
(50, 'CORTE Y FACHADA', 227),
(50, 'FACHADA Y PLANIMETRIA', 228),
(54, '50', 230),
(54, '100', 231),
(55, '50', 232),
(56, ' a elecciÃ?Â³n pero siempre legible ', 233),
(57, 'comenzando por "1"', 234),
(58, '--', 235),
(58, 'indicado la direcciÃ?Â³n hacia arriba', 236),
(59, 'medidas perimetrales', 237),
(59, 'distancia a calle mas prÃ?Â³xima (perpendi', 238),
(63, 'coincidente con certificado del colegio', 239),
(62, 'coincidente con certificado del colegio', 240),
(64, 'coincidente con certificado del colegio', 241),
(65, 'coincidente con certificado del colegio', 243),
(68, 'coincidente con certificado del colegio', 244),
(70, 'coincidente con certificado del colegio', 245),
(71, 'coincidente con certificado del colegio', 246),
(74, 'TITULAR', 247),
(74, 'Poseedor', 248),
(74, 'Apoderado', 249),
(75, '"VISACION PREVIA"', 250),
(76, '"APROBACION  PREVIA"', 251),
(77, '"VISACION PREVIA DE SUBSISTENCIA"', 252),
(2, '"VISACION CALCULO"', 253),
(78, '"VISACION CALCULO"', 254),
(79, '"APROBACION CALCULO"', 255),
(80, '"VISACION CALCULO"', 256),
(81, '"VISACION"', 257),
(81, '"VISACION"', 258),
(82, '"APROBACION"', 259),
(83, '"VISACION SUBSISTENCIA"', 260),
(84, 'coincidente con datos de catastro', 261),
(84, 'coincidente con datos del Titulo', 262),
(88, 'CON RAYADOS DIFERENTES', 263),
(97, 'Municipal  "L.M."', 264),
(97, 'de Vialidad "L.E.D.V.P" o "L.E.D.N.V."', 265),
(99, 'Sup min 6 m2 inscribrir rectang  de 1,70x2,00 m como minimo', 266),
(100, 'SUP MIN. 3 m2 CIRCUNSCRIBIR RECTANG LADO MÍNIMO de 1,60 m2', 267),
(101, '1,60 mts de ancho min', 268),
(102, 'ancho min 2,80 mts sup min 14 m2', 269),
(103, 'Sup min 4 m2 inscribrir rectang de lados de 1,70x2,00 m como', 270),
(104, 'Sup min 4 m2', 271),
(105, 'DISTANCIA DE ARTEFACTOS A PARED 0,15 mts', 272),
(106, 'entre lavatorios y ducha o baÃ?Â±eras min 0,05 mts', 273),
(105, 'ANCHO MIN. PUERTAS 0,60 mts', 274),
(105, 'ABATIMIENTO DE PUERTA DEJAR ESPACIO DE  0,5 x SU ANCHO DEL ARTEFACTO', 275),
(105, 'FRENTE A DUCHA O BAÑERA DEJAR ESPACIO  0,70x0,70 mts', 276),
(105, 'banera o duchas la pared de cierre no supera del 30% del la', 277),
(105, 'ANCHO MIN. 0.75 SI NO POSEE LAVAMANOS Y 0,90 SI LO POSEE', 278),
(107, 'A patios de sup min 9 m2 y circunscribe un circulo de 3 m de', 279),
(107, 'A patios Sup. min. 10 m2 perminte lado min 2,50 mts', 280),
(108, 'A patios Sup. min. 10 m2 perminte lado min 2,50 mts', 281),
(115, 'a patio sup min 6 m2 lado min 2 mts', 282),
(109, 'la ventilacion se puede realizar por tubos o ventanas', 283),
(110, 'Apatios de sup min 9m2 y circunscribe un circulo de 3 m de d', 284),
(110, 'A patios Sup. min. 10 m2 perminte lado min 2,50 mts', 285),
(111, 'a patio sup min 6 m2 lado min 2 mts', 286),
(112, 'Por conducto o por ventanas', 287),
(114, 'Apatios de sup min 9m2 y circunscribe un circulo de 3 m de d', 288),
(114, 'A patios Sup. min. 10 m2 perminte lado min 2,50 mts', 289),
(116, 'sin obstaculizar circulacion ni invadir la via publica', 290),
(117, 'GRISADOS O COLOREADOS A CRITERIO (NO RAYA)', 291),
(123, 'acotarlo a linea Municipal y limites del terreno', 292),
(124, ' ACOTARLOS CON REFERENCIA LA LIMITE DE LA PROPIEDAD', 293),
(125, 'acotarlos con referencia al limite de propiedad', 294),
(126, 'min 4 m en linea municipal', 295),
(126, 'min 15  m en linea D.P.V.', 296),
(128, 'DE ZONA DE SEGURIDAD DE ELECTRODUCTO "', 298),
(128, 'DE ZONA DE SEGURIDAD DE ELECTRODUCTO Y GASODUCTOS"', 299),
(128, 'DE ZONA DE SEGURIDAD DE  GASODUCTOS"', 300),
(128, 'SERVIDUMBRES DE RIEGO', 301),
(129, 'diferenciar con rayado lo existente, colocar NÃ?Â° de Expte ex', 302),
(129, 'diferenciar con rayado distinto sup. relevada', 303),
(130, 'acotarlas con referencia a las construcciones', 304),
(129, 'acotar a los limites de propiedad y entre ellas', 305),
(131, 'acotarla a eje de calle y designarlas como L.E.D.P.V', 306),
(131, 'acotarla a eje de calle y designarlas como L.E.M.', 307),
(132, 'ACOTARLO A LIMITE DE TERRENO ', 309),
(133, 'la planta de techo, fuera de planimetria a otra esc mayor', 310),
(134, 'indicar pendientes', 311),
(134, 'indicar tipo de desague', 312),
(134, 'indicar tanque de agua', 313),
(134, 'indicar los elementos de ventilacion ', 314),
(134, 'colocar por separado en mayor escala', 315),
(135, '0,80mts para viviendas', 316),
(136, 'y un total de superficie por cada grupo utilizado', 318),
(138, 'minimo de 2,10 mts', 319),
(138, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 321),
(139, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 322),
(137, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 323),
(145, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 324),
(147, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 325),
(148, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 326),
(155, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 327),
(146, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 328),
(149, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 329),
(150, 'PUEDE BAJARSE El 20% DE LAS PROYECCIONES TOTALES DEL TECHO A 2,10mts', 330),
(151, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 331),
(152, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 332),
(153, 'con las proy horizontal de sup salientes del cielo-raso < al 20% de la sup total', 333),
(142, 'debe tomar veredas exist. u otro elemento a criterio del profesional', 335),
(165, ' INDICANDO MATERIAL Y CAPACIDAD', 336),
(168, 'viviendas y/o departamentos', 337),
(168, 'Oficinas', 338),
(168, 'Consultorios', 339),
(168, 'Locales Comerciales', 340),
(169, 'gs', 341),
(169, 'Naves Industriales', 342),
(176, 'diferenciando los tipos utlizados', 343),
(177, 'diferenciando los tipos utlizados', 344),
(185, '"Firma del propietario"', 345),
(185, '"Firma del poseedor"', 346),
(185, '"Firma del apoderado"', 347),
(186, 'Y PLANILLAS', 348),
(188, '1:50 o 1:100', 349),
(189, 'comenzando por "1"', 350),
(190, 'indicando la direccion hacia arriba', 351),
(191, 'medidas perimetrales', 352),
(191, 'distancia a calle mas prÃ?Â³xima (perpendicular a la principal)', 353),
(204, '"VISACION PREVIA"', 354),
(205, '"APROBACIÃ?â??N PREVIA"', 355),
(206, '"VISACIÃ?â??N CALCULO"', 356),
(207, '"APROBACION CALCULO"', 357),
(208, '"VISACIÃ?â??N CALCULO"', 358),
(209, '"VISACION"', 359),
(210, '"APROBACION"', 360),
(211, '"VISACION SUBSISTENCIA"', 361),
(212, 'coincidente con datos de catastro', 362),
(212, 'coincidente con datos del Titulo', 363),
(214, 'coincidente con datos de catastro', 364),
(214, 'Fuera de Zona', 365),
(216, 'en encuentro de muros', 366),
(216, 'distancia > 1,5 de otra columna', 367),
(217, 'de carga (trazo lleno)', 368),
(217, 'de fundacion (trazo discontinuio)', 369),
(217, 'de techo (trazo discontinuio)', 370),
(217, 'de dintel (trazo discontinuo)', 371),
(223, 'preferentemente muros y vigas de carga continuas, distinto espesor', 372),
(220, 'rayados diferenciados de los otros', 373),
(232, 'coincidencia de detalles con memorias de calculo', 374),
(238, 'indicando recubrimiento', 375),
(240, 'cara superior', 376),
(240, 'cara inferior', 377),
(243, 'Coeficiente zonal Co=0,30', 378),
(243, 'Coeficiente de destino', 379),
(243, 'coeficiente de estructura', 380),
(243, 'coeficiente de estructura de ductibilidad', 381),
(243, 'coeficiente de suelo', 382),
(244, 'respetando los ejes designados', 383),
(245, 'longitud', 384),
(245, 'Ancho', 385),
(245, 'Alto', 386),
(245, 'superficies', 387),
(245, 'distancia a eje de origen', 388),
(246, 'rigidez absoluto y relativa del elemento', 389),
(246, 'rigidez torsional', 390),
(247, 'permanentes y accidentales ', 391),
(248, 'corte directo', 392),
(248, 'corte por torsion directo', 393),
(248, 'corte por torsion indirecto', 394),
(248, 'corte total', 395),
(246, 'centro de rigidez en ambas direcciones', 396),
(246, 'centro de masas en ambas direcciones', 397),
(246, 'longitudes maximas de planta en ambas direcciones', 398),
(248, 'Momento torsor directo', 399),
(248, 'Momento torsor indirecto', 400),
(248, 'Tensiones del elemento <=que admisible', 401),
(249, 'indicar muros armados', 402),
(250, 'luz de calculo', 403),
(250, 'Alto del elemento', 404),
(250, 'Ancho del elemento', 405),
(250, 'diametro del rollizo', 406),
(251, 'permanente', 407),
(251, 'Accidentales', 408),
(251, 'puntuales con su distancia al apoyo', 409),
(252, 'maximos momentos flectores', 410),
(252, 'reacciones en apoyo', 411),
(252, 'Tensiones del elemento <=que admisible', 412),
(252, 'flecha <= que la admisible', 413),
(255, 'NUEVO', 414),
(255, 'RELEVAMIENTO', 415),
(255, 'CONFORME A OBRA', 416),
(255, 'AMPLIACION', 417),
(256, 'EN CONSTRUCCION', 418),
(256, 'AMPLIACION ', 419),
(256, 'EXISTENTE', 420),
(256, 'CONSTRUIDO', 421),
(257, 'el nombre de la calle y el nÃ?Â° unicamente', 422),
(258, 'coincidente con datos de catastro', 423),
(258, 'coincidente con datos del Titulo', 424),
(259, 'colocar "POSEEDOR:" nombre y apellido del poseedor', 425),
(263, 'coincidente con certificado del colegio', 426),
(264, 'coincidente con certificado del colegio', 427),
(266, 'con sus medidas perimetrales', 428),
(266, 'distancia a calle mas proxima', 429),
(268, 'distancia a boca de registro ', 430),
(269, 'Y ACOTAR A  PR (REGISTRO DE CLOACAS)', 431),
(272, 'coincidente con datos de catastro', 432),
(273, 'coincidente con datos de catastro', 433),
(274, 'coincidente con la obra de acuerdo a planos de arquitectura', 434),
(277, 'SOBRE LA CANERIA', 435),
(278, 'ABAJO DE LA CANERIA', 436),
(280, 'a menos de 10 mts de Linea de cierre a calle publica', 437),
(280, 'a menos de 30 entre camaras', 438),
(283, 'las camara de inspeccion y/o bocas de inspeccion', 439),
(283, 'el ultimo inodoro', 440),
(283, 'los tramos de pisos superiores', 441),
(284, 'inodoros', 442),
(284, 'bocas de acceso', 443),
(286, 'de pileta de patio a caneria primaria conectado a 45Ã?Â° ', 444),
(286, 'pileta de patio y la red primaria', 445),
(287, 'artefatos a pileta de patios', 446),
(289, 'de cocina a ventanas', 447),
(289, 'de lavanderia por  ventanas', 448),
(289, 'de banos por tubos dto min 110 mm ', 449),
(290, 'las camaras de inspeccion (o boca de tapa de inspeccion)', 450),
(290, 'ultimo inodoro', 451),
(291, 'debe ubicarse entre camara septica y el pozo', 452),
(293, 'cano de descarga vertical (CDV), prosigue y ventila hacia arriba', 453),
(292, 'siempre de trazo continuo', 454),
(295, 'a no menos de 60 cm del piso', 455),
(297, 'con artefactos fijos ', 456),
(298, 'inodoros color rojo o bermellon', 457),
(298, 'lavatorios, videt, receptadulo de ducha en marron o sepia', 458),
(298, 'boca de acceso de color rojo o bermellon', 459),
(300, 'a linea de refrencia ubicada a 3 mts del nivel de terreno natural (NTN)', 460),
(307, 'pasando al tanque de agua', 462),
(307, 'no menos de un metro', 463),
(309, 'en estremos de inferior izp a sup derecha', 464),
(310, ' SI LA PLANTA LA REALIZO EN 1:50', 465),
(317, '.-', 466),
(319, 'y el NÃ?Â° de piso del que se dibujo la planta', 468),
(322, 'Y AMPLIACION', 469),
(322, 'Y RELEVAMIENTO', 470),
(322, 'Y REMODELACION', 471),
(322, 'Y CAMBIO DE SITIO DE MEDIDOR', 472),
(322, 'Y SEPARACION DE SERVICIO', 473),
(324, 'colocar a 1,50 como maximo de linea municipal', 474),
(325, 'colocar a 1,50 como maximo de linea municipal', 475),
(327, 'a menos de 1,50 mts de linea municipal', 476),
(329, 'conector dto de acuerdo a calculo', 477),
(329, 'llave de paso en subida', 478),
(329, 'en conector valvula de limpieza', 479),
(329, 'en conector, las bajas necesarias cada una con llave de paso', 480),
(329, 'las bajadas son con linea de trazo', 481),
(329, 'cano de ventilacion', 482),
(330, 'obligatoria para construccion mayor de dos pisos', 483),
(329, 'xx', 484),
(330, 'conector de acuerdo a calculo', 485),
(330, 'llave de paso de salida', 486),
(330, 'en conector, las salidas necesarias cada una con llave de paso', 487),
(330, 'llave de paso al ingreso', 488),
(330, 'cano de ventilacion', 489),
(331, 'las bajadas con doble circulos', 490),
(333, 'Y RELEVAMIENTO', 491),
(333, 'Y REMODELACION', 492),
(333, 'Y AUMENTO DE POTENCIA', 493),
(333, 'Y CAMBIO DE SITIO DE MEDIDOR', 494),
(333, 'Y SEPARACION DE SERVICIO', 495),
(334, 'Y REMODELACION', 496),
(334, 'Y AUMENTO DE POTENCIA', 497),
(334, 'Y CAMBIO DE SITIO DE MEDIDOR', 498),
(334, 'Y SEPARACION DE SERVICIO', 499),
(335, 'Y  AUMENTO DE POTENCIA', 500),
(335, 'Y CAMBIO DE SITIO DE MEDIDOR', 501),
(335, 'Y SEPARACION DE SERVICIO', 502),
(337, 'Y ASCENSORES', 503),
(337, 'Y CALDERAS', 504),
(337, 'Y RAYOS X', 505),
(337, 'YLETREROS DE ALTA Y BAJA TENSION', 506),
(337, 'YVIDRIERAS - MARQUESINAS', 507),
(337, 'Y ILUMINACION DE EMERGENCIA', 508),
(338, 'Y RAYOS X', 509),
(338, 'Y LETREROS DE ALTA Y BAJA TENSION', 510),
(338, 'Y VIDRIERAS - MARQUESINAS', 511),
(339, 'Y RAYOS X', 512),
(339, 'YLETREROS DE ALTA Y BAJA TENSION', 513),
(339, 'Y VIDRIERAS - MARQUESINAS', 514),
(339, 'Y ILUMINACION DE EMERGENCIA', 515),
(340, 'Y LETREROS DE ALTA Y BAJA TENSION', 516),
(340, 'Y ILUMINACION DE EMERGENCIA', 518),
(341, 'Y VIDRIERAS - MARQUESINAS', 519),
(341, 'Y ILUMINACION DE EMERGENCIA', 520),
(342, 'Y ILUMINACION DE EMERGENCIA', 521),
(344, 'Y CAÃ?â??ERIAS A LA VISTA', 522),
(344, 'Y CONDUCTORES SOBRE AISLADORES', 523),
(344, 'Y CONDUCTORES EN BANDEJA', 524),
(344, 'Y CONDUCTORES SUBTERRANEOS', 525),
(345, 'Y CONDUCTORES SOBRE AISLADORES', 526),
(345, 'Y CONDUCTORES EN BANDEJA', 527),
(345, 'Y CONDUCTORES SUBTERRANEOS', 528),
(346, 'Y CONDUCTORES EN BANDEJA', 529),
(346, 'Y CONDUCTORES SUBTERRANEOS', 530),
(347, 'Y CONDUCTORES SUBTERRANEOS', 531),
(349, ' Y COMERCIO', 532),
(349, 'E INDUSTRIA', 533),
(349, 'Y TALLER', 534),
(349, 'Y OFICINAS PÃ?Å¡BLICAS', 535),
(349, 'Y HOSPITAL', 536),
(349, 'Y LOCALES COMERCIALES', 537),
(349, 'Y OFICINAS', 538),
(349, 'Y CLUBES', 539),
(349, 'Y ESTACION DE SERVICIO', 540),
(349, 'Y ESTADIOS DEPORTIVOS', 541),
(350, 'E INDUSTRIA', 542),
(350, 'Y TALLER', 543),
(350, 'Y OFICINAS PÃ?Å¡BLICAS', 544),
(350, 'Y HOSPITAL', 545),
(350, 'Y LOCALES COMERCIALES', 546),
(350, 'Y OFICINAS', 547),
(350, 'Y CLUBES', 548),
(350, 'Y ESTACION DE SERVICIO', 549),
(350, 'Y ESTADIOS DEPORTIVOS', 550),
(351, 'Y TALLER', 551),
(351, 'Y OFICINAS PÃ?Å¡BLICAS', 552),
(351, 'Y HOSPITAL', 553),
(351, 'Y LOCALES COMERCIALES', 554),
(351, 'Y OFICINAS', 555),
(351, 'Y CLUBES', 556),
(351, 'Y ESTACION DE SERVICIO', 557),
(351, 'Y ESTADIOS DEPORTIVOS', 558),
(352, 'Y OFICINAS PÃ?Å¡BLICAS', 559),
(352, 'Y HOSPITAL', 560),
(352, 'Y LOCALES COMERCIALES', 561),
(352, 'Y OFICINAS', 562),
(352, 'Y CLUBES', 563),
(352, 'Y ESTACION DE SERVICIO', 564),
(352, 'Y ESTADIOS DEPORTIVOS', 565),
(1, 'esto es para borrar', 567),
(393, 'DE LA RED SECUNDARIA CEPIA', 569),
(406, 'SU SECCIÓN IGUAL A SECCIÓN DE FASE Y > 1,5', 570),
(406, 'DEBEN ESTAR FORRADOS', 571),
(408, 'FALTA SECCIÓN DEBE SER (4X6)/34', 572),
(408, 'SOLAMENTE HASTA DOS TOMAS SE PERMITE 1,5 cm2', 573),
(409, 'LA SECCION A UTILIZAR POR LOS CONDUCTORES <= AL35%', 574),
(409, 'COLOCAR REGISTRO EN TRAMOS >= 9 MTS', 575),
(407, 'DEBE SER INDEPENDIENTE POR CIRCUITOS', 576),
(399, 'AIREA ACONDICIONADO', 577),
(399, 'FUERZA MOTRIZ', 578),
(399, 'CALEFACCION', 579),
(404, 'EN MAS DE DOS CIRUCITOS ', 580),
(404, 'DE AIRE ACONDICIONADO', 581),
(404, 'DE FUERZA MOTRIZ', 582),
(404, 'DE CALEFACCIÓN', 583),
(414, 'VER SIMBOLOGIA', 584),
(413, 'VER SIMBOLOGIA', 585),
(409, 'SI NO ES DE HIERRO  COLOCAR EL MATERIAL', 586),
(431, 'ES DEL 100% HASTA 20 KW PARA MAS 70%', 587),
(432, 'ES DEL 100% HASTA 15  KW PARA MAS 50%', 588),
(428, 'ES DEL 50% HASTA 20 KW - EL 40% DE 20 KW A 100 KW - ES DE 30% PARA MAS DE 100 KW ', 589),
(429, 'ES DE 100% HASTA 20 KW - ES DE 70% PARA MAS DE 20 KW', 590),
(393, 'RED PRIMARIA ROJO', 591),
(393, 'DE DESAGÜE  PLUVIAL AMARILLO', 592),
(393, 'DE VENTILACIONES  COLOR VERDE', 593),
(393, 'DE TANQUE DE RESERVA  AZUL', 594),
(394, '', 595),
(435, 'BOCAS DE DESAGUE ABIERTA  "BDA" CON 1 CIRCULO AMARILLO', 596),
(435, 'BAJADAS CON N° DENTRO DE DOBLE CIRCULO AMARILLO', 597),
(434, 'LAS BOCAS TAPAS INSPECCIÓN', 600),
(434, 'LAS CÁMARAS DE INSPECCION CON 1 CIRCULO ROJO', 601),
(426, 'SE DEBE APLICAR UN FACTOR DEL 60%', 602),
(439, 'MATERIAL DE DRENAJE CON SU PROFUNDIDAD', 603),
(439, 'MÍNIMO 60 CM BAJO EL PROTO', 604),
(440, '20x20x120 cm', 605),
(440, '20x20x120 cm', 606),
(371, 'PARA MENDOZA ES 81 Km/hora', 607),
(354, 'DE TIPOS DE ABERTURAS', 608),
(355, 'HACIA DONDE ABRE', 609),
(116, 'SIN INVADIR CIRCULACIONES ', 610),
(88, 'COLOCAR  N° EXPEDIENTES EXISTENTES', 612),
(450, 'CON RAYADOS DIFERENTES', 613),
(363, 'DE ACUERDO A DATOS DE FACTIBILIDAD (POR ZONA)', 614),
(364, 'DE ACUERDO A DATOS DE FACTIBILIDAD (POR ZONA)', 615),
(360, 'SIN OCUPAR ESPACIOS PÚBLICOS', 616),
(361, 'SIN OCUPAR ESPACIOS PÚBLICOS', 617),
(100, 'ESPACIO ENTRE MESADAS ENFRENTADA A PARED MININO 1 mt', 618),
(457, 'ANCHO MINIMO PARA LAS INTERNAS 0,80m mts', 619),
(453, 'RESPETAR ANCHO MINIMO + VER FORMULAS', 620),
(455, 'ANCHO MINIMO + VER FORMULAS', 621),
(452, 'ANCHO MINIMO + VER FORMULAS', 622),
(456, 'ANCHO MINIMO + VER FORMULAS', 623),
(454, 'ANCHO MINIMO + VER FORMULAS', 624),
(459, 'RETIRADAS A 3mts O MAS', 625),
(458, 'SEPARARLAS A 0,70 mts O MAS', 626),
(86, 'O EL DE CALLE A -0,20 mts, SOBRE EJE CALZADA O PROMEDIO ENTRE BOCAS DE REGISTROS COLACAS', 627),
(117, 'DIFERENCIADO LOS QUE CORRESPONDE A SUP CUBIERTA DE LA DESCUBIERTA', 628),
(371, 'EN MENDOZA 81 Km/hora', 629),
(154, 'PUEDE BAJARSE El 20% DE LAS PROYECCIONES TOTALES DEL TECHO A 2,10mts', 630),
(473, 'HASTA EL 50% DE ENTREPISO ABIERTO BAJO Y SOBRE EL ENTREPISO DEBE SER 2,40 mts', 632),
(473, 'LA ALTURA DE LAS BARANDA DE ENTREPISO DEBE SER ENTRE 80 cm Y EL 40% DE LA ALTURA DEL ENTREPISO', 634),
(481, 'PUERTAS', 635),
(481, 'VENTANAS', 636),
(481, 'MUEBLES FIJOS', 637),
(481, 'REJAS', 638),
(482, 'DE COCINA', 639),
(482, 'DE TERMOTANQUE', 640),
(482, 'DE CALEFON', 641),
(482, 'DE UNIDADES FUNCIONALES NO HABITABLES', 642),
(482, 'DE CLOACAS', 643),
(482, 'DE CHURRASQUERA', 644),
(480, 'DE COCINA', 645),
(480, 'DE BAÑOS', 646),
(480, 'DE LAVADEROS', 647),
(480, 'SALA DE MAQUINAS', 648),
(479, 'DE VIGAS DE CARGA', 649),
(479, 'DE VIGAS DE FUNDACION', 650),
(479, 'DE TECHO', 651),
(164, 'DE MUROS', 652),
(164, 'DE TECHOS', 653),
(493, 'PUERTAS', 654),
(493, 'VENTANAS', 655),
(493, 'PORTON', 656),
(494, 'TANQUE DE AGUA', 657),
(494, 'ALEROS', 658),
(494, 'MUROS', 659),
(494, 'PROYECIONES DE ELEMENTOS  POSTERIORES', 660),
(513, 'A MENOS DE 2 mts DEL MEDIDOR', 661),
(513, 'A MAS DE 50 CM DEL MEDIDOR DE GAS', 662),
(511, 'COLOCAR CÁMARA DE INSPECCIÓN (20x20)', 663),
(511, 'COINCIDENCIA ENTRE ESQUEMA Y PLANTA', 664),
(511, 'CORREGIR SIMBOLOGIA', 665),
(512, 'INTENSIDAD NOMINAL  DE ACUERDO  POTENCIA INSTALADA', 666),
(512, 'SIMBOLOGIA DE ACUERDO A NORMATIVAS', 667),
(520, 'Y ABAJO COLOCAR "POSEEDOR" APELLEDO Y NOMBRE DEL PASEEDOR', 668),
(519, 'COINCIDENTE CON DATOS DE CATASTRO Y/O ESCRITURA', 669),
(387, 'POR DUCTIBILIDAD', 670),
(387, 'POR VINCULACIÓN INTERNA', 671),
(213, ' coincidentes con datos de Catastro Municipal', 672),
(576, '  ', 673),
(577, '  ', 674),
(91, '  ', 675),
(583, ' DE LOS MUROS MAS BAJO Y MAS ALTO', 676),
(584, '  (4x6)/34', 677),
(408, ' DEBE SER 3X6+T6', 678),
(585, 'CON RAYITAS CRUZADAS UNA POR CADA FASE', 679),
(586, '.-', 680),
(398, ' CORRECTAMENTE', 681),
(590, ' REVISAR CANTIDAD DE CONDUCTORES', 682),
(441, 'NO MENOR DE 1,50 mts x 5/8"', 683),
(591, 'IDEM A DATOS DE CATASTRO', 684),
(253, ',-', 685),
(261, 'PROYECTO', 686),
(261, 'PROYECTO Y DIRECCIÓN TECNICA', 687),
(261, 'RELEVO', 688),
(593, ',-', 689),
(592, '.-', 690),
(594, ' AGREGAR EL N° QUE CORRESPONDE', 691),
(595, 'dentro de cada local', 693),
(599, ' como titulo', 694),
(600, 'y el numero que corresponde al piso (como titulo)', 695),
(597, 'colocados en las esquinas', 696),
(601, '.-', 697),
(602, 'CON SUS DENOMINACIÓN', 698),
(603, 'CON SUS DENOMINACIONES', 699),
(605, 'COINCIDENTE CON EL INDICADO EN PLANTA', 700),
(495, 'COMPLETAS DE VERTICE A VERTICE', 701),
(133, 'PUEDE  RECORTAR LOS LADOS, ', 702),
(610, '.-', 705),
(609, 'DE COCINA', 706),
(609, 'DE BAÑO', 707),
(609, '.-', 708),
(608, '.-', 709),
(611, 'O COLOCAR LEYENDA POR SIMPLE DESBORDE', 710),
(612, 'O DIBUJAR GARGOLAS', 711),
(613, 'Y ACOTARLOS ENTRE ELLOS Y REFERIRLO A UN LIMITE', 712),
(132, 'ACOTARLO AL LIMITE DE LA CONSTRUCCION', 714),
(610, 'ACOTARLO A NO MENOS DE 60 CM DEL VECINO', 715),
(610, 'SI ES TODO CERRADO NO HACE FALTA ACOTARLO', 716),
(615, ' Y ACOTARLAS (4,00 mts)', 717),
(617, 'A NO MENOS DE 10 mts DE LA  INTERSECCION DE LINEAS MUNICIPALES', 718),
(618, 'EN ESTE CASO PROYECTO', 719),
(618, 'EN ESTE CASO PROYECTO Y RELEVAMIENTO', 720),
(618, 'EN ESTE CASO RELEVAMIENTO', 721),
(619, ' DE ESTA FORMA EL SELLO IRA SOLAMENTE EN LO RELEVADO', 722),
(620, ' CON EL UTILIZADO EN LA PLANTA', 723),
(620, ' CON EL UTILIZADO EN EL CORTE', 724),
(620, ' CON EL UTILIZADO EN LA PLANTAFACHADA', 725),
(620, ' CON EL UTILIZADO EN LA PLANIMETRIA', 726),
(496, 'CON SIMBOLOGIA O LEYENDA', 727),
(496, 'SEPARACION DE COLINDANCIA A 2,5 cm  DEL LIMITE TERRENO', 728),
(133, ' SEP DE COLINDANCIA 2,5 CM DE LA CONSTRUCCIÓN AL LIMITE', 729),
(504, 'A NO MENOS DE 10 mts DE LA  INTERSECCION DE LINEAS MUNICIPALES', 730),
(621, ' SI EXISTEN O NO,  SI ES SI MARCARLA EN PLANIMETRIA', 732),
(311, '.-', 733),
(313, '.-', 735),
(314, '', 736),
(314, '.-', 737),
(312, '', 739),
(333, ',-', 741),
(523, '.-', 742),
(622, ' Y RELEVAMIENTO', 743),
(622, '.-', 744),
(624, ' DE ACUERDO A LAS LABORES PROFESIONALES', 745),
(625, ' Y VISADO A LA DERECHA', 746),
(626, '.-', 747),
(628, '.-', 748),
(631, '.-', 749),
(633, ' 2 X 4 mm', 750),
(634, ' DISMINUIR TÉRMICA O AUMENTAR SECCIÓN CONDUCTORES', 751),
(633, ' 2X6 mm', 752),
(633, ' 4x6 mm', 753),
(633, ' 4x4 mm', 754),
(633, ' 4 x 10 mm', 755),
(633, ' 4x 16 mm', 756),
(635, ' DEBE IR DENTRO DE LA PROPIEDAD', 757),
(635, ' COLOCAR C.I.', 758),
(636, ' HACIA DONDE VAN DIRIGIDAS', 759),
(637, 'I.N.   D.I.', 760),
(638, ' DE LLAVE A FOCO', 761),
(639, '.-', 762),
(640, ' EN CADA TABLERO', 763),
(641, '.-', 764),
(256, 'EXISTENTE Y AMPLIACION', 765),
(261, 'PROYECTO Y RELEVO', 766),
(271, ' EL N° DE EXPTE ACTUAL', 767),
(27, ' y abajo el del titutlar', 768),
(96, ' DE LAS PROPIEDADES COLINDANTES', 769),
(406, ' A BOCAS DE ILUMINACION', 770),
(642, ' DE 34 mm', 771),
(643, ' DEBEN IR EN LINEAS DE TRAZOS', 772),
(644, '.-', 773),
(645, '.-', 774),
(646, 'INCLUIDO EL INCREMENTO SISMICO', 775),
(60, '.-', 776),
(647, '.-', 777),
(59, '.-', 778),
(87, '.-', 779),
(357, '.-', 780),
(362, ' ACOTANDO MÍNIMA DISTANCIA ENTRE OBJETOS', 781),
(356, '.-', 782),
(358, '.-', 783),
(648, ' A MENOS DE 3 METROS DEL EJE COLINDANCIA', 784),
(459, ' A MENOS DE 3 METROS DE EJE DE COLINDANCIA', 785),
(501, '.-', 786),
(507, '  ACOTÀNDOLO', 787),
(502, ' ACOTÁNDOLA', 788),
(506, '  GRAFICARLA Y ACOTARLA', 789),
(504, 'ACOTARLO', 790),
(503, 'ACOTARLO', 791),
(126, 'GRAFICARLO Y ACOTARLO', 792),
(508, 'GRAFICARLAS Y ACOTARLAS', 793),
(486, ' INDICAR ESTRUCTURA Y CUBIERTA', 794),
(485, ' DE  ESTRUCTURA Y CUBIERTA', 795),
(487, '.-', 796),
(484, '.-', 797),
(505, ' Y ACOTARLOS ', 798),
(460, '.-', 799),
(629, '-', 800),
(650, '-', 801),
(651, ' Y SI NO EXISTEN, EN REFERENCIAS HACERLO CONSTAR', 802),
(362, 'PERPENDICULARES AL EJE DE CALLE', 803),
(652, '.-', 805),
(653, '.-', 807),
(654, ' ANCHO TRAMO Y ANCHO LIMÓN INTERIOR', 808),
(655, '.-', 809),
(655, '', 810),
(657, ' EN LÍNEA DE TRAZOS', 811),
(658, '.-', 812),
(659, '.-', 813),
(660, '--', 814),
(254, ' SIN COLOCAR NINGÚN N°', 815),
(322, '.-', 816),
(661, '.-', 817),
(662, '.-', 818),
(662, ' EN DOMICILIO VA EN 24', 819),
(665, ' DE ACUERDO LO INDICADO EN CARATULA DIGITALIZADA', 820),
(663, ' DE ACUERDO LO INDICADO EN CARATULA DIGITALIZADA', 821),
(265, '.-', 822),
(666, '  VIVIENDA', 823),
(666, ' DEPARTAMENTO', 824),
(667, ' CAP XI ( EN ROJO)', 825),
(668, ' ART. 1:10:1 RV (EN ROJO)', 826),
(669, ' PARA AGUA POTABLE', 827),
(669, '', 828),
(670, 'PARA AGUA POTABLE', 829),
(671, '', 830),
(671, '--', 831),
(672, '.-', 832),
(673, '.-', 833),
(675, ' SUP. DE PISO/300', 834),
(666, 'GALPON', 835),
(666, 'SALON COMERCIAL', 836),
(437, ' Y PARA MAS >= 2,5 wts', 837),
(436, 'O INDICAR QUE SON DE BAJO CONSUMO', 838);

-- --------------------------------------------------------

--
-- Table structure for table `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `iddistrito` int(2) NOT NULL AUTO_INCREMENT,
  `nombredistrito` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`iddistrito`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `distritos`
--

INSERT INTO `distritos` (`iddistrito`, `nombredistrito`) VALUES
(1, 'Coquimbito'),
(2, 'Cruz de Piedra'),
(3, 'Fray Luis Beltran'),
(4, 'General Gutierrez'),
(5, 'General Ortega'),
(6, 'Barrancas'),
(7, 'Lulunta'),
(8, 'Luzuriaga'),
(9, 'Ciudad'),
(10, 'Rodeo del Medio'),
(11, 'Russell'),
(12, 'San Roque');

-- --------------------------------------------------------

--
-- Table structure for table `ensancheapertura`
--

CREATE TABLE IF NOT EXISTS `ensancheapertura` (
  `idensancheapertura` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idensancheapertura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ensancheapertura`
--

INSERT INTO `ensancheapertura` (`idensancheapertura`, `nombre`) VALUES
(1, '15 mts del eje de calle'),
(2, '----');

-- --------------------------------------------------------

--
-- Table structure for table `espacioocupar`
--

CREATE TABLE IF NOT EXISTS `espacioocupar` (
  `idespacioocupar` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idespacioocupar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `espacioocupar`
--

INSERT INTO `espacioocupar` (`idespacioocupar`, `nombre`) VALUES
(1, 'Debe ser cerrado'),
(2, 'Debe ser cerrado y cubierto'),
(3, 'Puede desarrollarse a cielo abierto'),
(4, 'Debe desarrollarse a cielo abierto');

-- --------------------------------------------------------

--
-- Table structure for table `estacionamiento`
--

CREATE TABLE IF NOT EXISTS `estacionamiento` (
  `idestacionamiento` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idestacionamiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `estacionamiento`
--

INSERT INTO `estacionamiento` (`idestacionamiento`, `nombre`) VALUES
(1, 'SI presentar propuesta'),
(2, 'NO presentar propuesta');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idestado` int(2) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idestado`, `estado`) VALUES
(1, 'Previa'),
(2, 'Observado'),
(3, 'Aprobado'),
(4, 'Solicitud'),
(5, 'Conforme A'),
(6, 'Habitabili');

-- --------------------------------------------------------

--
-- Table structure for table `expedientes`
--

CREATE TABLE IF NOT EXISTS `expedientes` (
  `zonater` varchar(100) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titular` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `manzanaLote` varchar(100) DEFAULT NULL,
  `distrito` varchar(100) DEFAULT NULL,
  `departemento` varchar(100) DEFAULT NULL,
  `poseedor` varchar(100) DEFAULT NULL,
  `dnip` varchar(100) DEFAULT NULL,
  `domiciliop` varchar(100) DEFAULT NULL,
  `zonap` varchar(100) DEFAULT NULL,
  `manzanaLotep` varchar(100) DEFAULT NULL,
  `distritop` varchar(100) DEFAULT NULL,
  `departementop` varchar(100) DEFAULT NULL,
  `padronmun` varchar(100) DEFAULT NULL,
  `nomcat` varchar(100) DEFAULT NULL,
  `calleppal` varchar(100) DEFAULT NULL,
  `calle1` varchar(100) DEFAULT NULL,
  `discalle1` varchar(100) DEFAULT NULL,
  `calle2` varchar(100) DEFAULT NULL,
  `discalle2` varchar(100) DEFAULT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `distritot` varchar(100) DEFAULT NULL,
  `supterr` varchar(100) DEFAULT NULL,
  `servcirc` varchar(100) DEFAULT NULL,
  `servgas` varchar(100) DEFAULT NULL,
  `servelect` varchar(100) DEFAULT NULL,
  `servriego` varchar(100) DEFAULT NULL,
  `baldio` varchar(100) DEFAULT NULL,
  `demoler` varchar(100) DEFAULT NULL,
  `clavearq` varchar(100) DEFAULT NULL,
  `clavedirtec` varchar(100) DEFAULT NULL,
  `clavecal` varchar(100) DEFAULT NULL,
  `clavedirest` varchar(100) DEFAULT NULL,
  `claveelec` varchar(100) DEFAULT NULL,
  `claveelecdirtec` varchar(100) DEFAULT NULL,
  `clavesani` varchar(100) DEFAULT NULL,
  `clavesanidirtec` varchar(100) DEFAULT NULL,
  `cajaproy` varchar(100) DEFAULT NULL,
  `cajadittec` varchar(100) DEFAULT NULL,
  `cajacal` varchar(100) DEFAULT NULL,
  `cajadirest` varchar(100) DEFAULT NULL,
  `cajaelec` varchar(100) DEFAULT NULL,
  `cajaelectdirtec` varchar(100) DEFAULT NULL,
  `cajasani` varchar(100) DEFAULT NULL,
  `cajasanidirtec` varchar(100) DEFAULT NULL,
  `certproy` varchar(100) DEFAULT NULL,
  `certdittec` varchar(100) DEFAULT NULL,
  `certcal` varchar(100) DEFAULT NULL,
  `certdirest` varchar(100) DEFAULT NULL,
  `certelec` varchar(100) DEFAULT NULL,
  `certelectdirtec` varchar(100) DEFAULT NULL,
  `certasani` varchar(100) DEFAULT NULL,
  `certsanidirtec` varchar(100) DEFAULT NULL,
  `planosarq` int(4) DEFAULT NULL,
  `ventilum` int(4) DEFAULT NULL,
  `planoestruc` int(4) DEFAULT NULL,
  `memocal` int(4) DEFAULT NULL,
  `planoselec` int(4) DEFAULT NULL,
  `planosanit` int(4) DEFAULT NULL,
  `certflinea` int(4) DEFAULT NULL,
  `fotescritura` int(4) DEFAULT NULL,
  `certfactibilidad` int(4) DEFAULT NULL,
  `planosmensura` int(4) DEFAULT NULL,
  `expnumero` int(6) DEFAULT NULL,
  `idusuario` bigint(20) DEFAULT NULL,
  `definitivo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `expedientes`
--

INSERT INTO `expedientes` (`zonater`, `id`, `titular`, `dni`, `domicilio`, `zona`, `manzanaLote`, `distrito`, `departemento`, `poseedor`, `dnip`, `domiciliop`, `zonap`, `manzanaLotep`, `distritop`, `departementop`, `padronmun`, `nomcat`, `calleppal`, `calle1`, `discalle1`, `calle2`, `discalle2`, `lote`, `distritot`, `supterr`, `servcirc`, `servgas`, `servelect`, `servriego`, `baldio`, `demoler`, `clavearq`, `clavedirtec`, `clavecal`, `clavedirest`, `claveelec`, `claveelecdirtec`, `clavesani`, `clavesanidirtec`, `cajaproy`, `cajadittec`, `cajacal`, `cajadirest`, `cajaelec`, `cajaelectdirtec`, `cajasani`, `cajasanidirtec`, `certproy`, `certdittec`, `certcal`, `certdirest`, `certelec`, `certelectdirtec`, `certasani`, `certsanidirtec`, `planosarq`, `ventilum`, `planoestruc`, `memocal`, `planoselec`, `planosanit`, `certflinea`, `fotescritura`, `certfactibilidad`, `planosmensura`, `expnumero`, `idusuario`, `definitivo`) VALUES
('', 66, 'Lucchetti Erica Sylvana', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 51, 0),
('', 69, 'Lazzaro', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 53, 0),
('', 71, 'ad', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 31, 0),
('', 74, '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '20', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 31, 0),
('Ciudad', 97, 'Luis Alberto Jimenez', '12345678', 'Pablo Pescara 190', 'Centro', '', 'Ciudad', 'Maipú', '', '', '', '', '', 'Barrancas', '', '12122', '0701001001001', 'Pablo Pescara', 'Sarmiento', '30', '', '', '', 'Ciudad', '270', '0', '0', '0', '0', 'no', 'no', '12345678', '87654321', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, NULL, 64, 0),
('', 129, 'Ruiz', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 73, 0),
('', 130, 'perez', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 92, 0),
('', 131, 'rete', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 96, 0),
('', 132, 'er', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 96, 0),
('', 133, 'VILLCA VANINA LORENA', '24461962', 'PATRICIAS ARGENTINAS 382 MAIPU', 'CIUDAD', '382', 'Ciudad', 'MAIPU', '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', '', '', '', 'Barrancas', '', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 73, 0),
('', 134, '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '898', '07-01-10-0010-000013', 'PATRICIAS ARGENTINAS', 'PRESIDENTE PERON', '60 m', 'MITRE', '40', '', 'Ciudad', '303.60 M2', '0', '0', '0', '0', 'SI', 'NO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 73, 0),
('', 135, '', '', '', '', '', 'Barrancas', '', '', '', '', '', '', 'Barrancas', '', '898', '07-01-10-0010-000013', 'PATRICIAS ARGENTINAS', 'PRESIDENTE PERON', '60 m', 'MITRE', '40', '', 'Ciudad', '303.60 M2', '0', '0', '0', '0', 'SI', 'NO', '2248', '2248', '2248', '2248', '2248', '2248', '2248', '2248', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 73, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factibilidad`
--

CREATE TABLE IF NOT EXISTS `factibilidad` (
  `idfactibilidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `idexpediente` int(10) NOT NULL,
  `idnumerozona` bigint(20) NOT NULL,
  `iduso` bigint(20) NOT NULL,
  `idlote` bigint(20) NOT NULL,
  `idaltura` bigint(20) NOT NULL,
  `idancho` bigint(20) NOT NULL,
  `idretiro` bigint(20) NOT NULL,
  `idvivienda` bigint(20) NOT NULL,
  `idgalpon` bigint(20) NOT NULL,
  `idfos` bigint(20) NOT NULL,
  `idfot` bigint(20) NOT NULL,
  `idcumplirordenanza` bigint(20) NOT NULL,
  `idensancheapertura` bigint(20) NOT NULL,
  `idafectacionlimite` bigint(20) NOT NULL,
  `idactividadcompleja` bigint(20) NOT NULL,
  `idiniciarexpediente` bigint(20) NOT NULL,
  `idfuerzamotriz` bigint(20) NOT NULL,
  `idestacionamiento` bigint(20) NOT NULL,
  `idespacioocupar` bigint(20) NOT NULL,
  PRIMARY KEY (`idfactibilidad`),
  KEY `iduso` (`iduso`),
  KEY `idnumerozona` (`idnumerozona`),
  KEY `idlote` (`idlote`),
  KEY `idaltura` (`idaltura`),
  KEY `idancho` (`idancho`),
  KEY `idretiro` (`idretiro`),
  KEY `idvivienda` (`idvivienda`),
  KEY `idgalpon` (`idgalpon`),
  KEY `idfos` (`idfos`),
  KEY `idfot` (`idfot`),
  KEY `idexpediente` (`idexpediente`),
  KEY `cumplir` (`idcumplirordenanza`),
  KEY `ensancheapertura` (`idensancheapertura`),
  KEY `limites` (`idafectacionlimite`),
  KEY `actividadcompleja` (`idactividadcompleja`),
  KEY `iniciarexpediente` (`idiniciarexpediente`),
  KEY `fuerzamotriz` (`idfuerzamotriz`),
  KEY `estacionamiento` (`idestacionamiento`),
  KEY `espacioocupar` (`idespacioocupar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `factibilidad`
--

INSERT INTO `factibilidad` (`idfactibilidad`, `idexpediente`, `idnumerozona`, `iduso`, `idlote`, `idaltura`, `idancho`, `idretiro`, `idvivienda`, `idgalpon`, `idfos`, `idfot`, `idcumplirordenanza`, `idensancheapertura`, `idafectacionlimite`, `idactividadcompleja`, `idiniciarexpediente`, `idfuerzamotriz`, `idestacionamiento`, `idespacioocupar`) VALUES
(92, 66, 6, 1, 12, 2, 8, 6, 10, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(96, 69, 6, 40, 12, 2, 8, 6, 10, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(98, 71, 5, 2, 12, 4, 8, 6, 10, 2, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(103, 74, 5, 2, 12, 4, 8, 6, 10, 2, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(113, 97, 5, 40, 12, 4, 8, 6, 10, 2, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(121, 129, 6, 35, 12, 2, 8, 6, 10, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fos`
--

CREATE TABLE IF NOT EXISTS `fos` (
  `idfos` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idfos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fos`
--

INSERT INTO `fos` (`idfos`, `nombre`) VALUES
(1, '0,05'),
(2, '0,38'),
(3, '0,4'),
(4, '0,5'),
(5, '0,6'),
(6, '0,8'),
(7, '0,8'),
(8, '0,9'),
(9, 'NO TIENE'),
(10, '0');

-- --------------------------------------------------------

--
-- Table structure for table `fot`
--

CREATE TABLE IF NOT EXISTS `fot` (
  `idfot` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idfot`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fot`
--

INSERT INTO `fot` (`idfot`, `nombre`) VALUES
(1, '0,07'),
(2, '0,6'),
(3, '0,8'),
(4, '0.8'),
(5, '1'),
(6, '1,00'),
(7, '1,2'),
(8, '0'),
(9, 'LIBRE');

-- --------------------------------------------------------

--
-- Table structure for table `fuerzamotriz`
--

CREATE TABLE IF NOT EXISTS `fuerzamotriz` (
  `idfuerzamotriz` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idfuerzamotriz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fuerzamotriz`
--

INSERT INTO `fuerzamotriz` (`idfuerzamotriz`, `nombre`) VALUES
(1, '< 15 KW   y >200KW');

-- --------------------------------------------------------

--
-- Table structure for table `galpon`
--

CREATE TABLE IF NOT EXISTS `galpon` (
  `idgalpon` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idgalpon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `galpon`
--

INSERT INTO `galpon` (`idgalpon`, `nombre`) VALUES
(1, 'SE AUTORIZA CON UN RETIRO DE 4 Mts DESDE L. EDIF.'),
(2, 'NO PERMITIDOS');

-- --------------------------------------------------------

--
-- Table structure for table `gremioobservacion`
--

CREATE TABLE IF NOT EXISTS `gremioobservacion` (
  `idgremioobs` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `externo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'true,si se muestra externamente',
  PRIMARY KEY (`idgremioobs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabla que asocia las observaciones segÃºn los gremios. \r\n' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gremioobservacion`
--

INSERT INTO `gremioobservacion` (`idgremioobs`, `nombre`, `externo`) VALUES
(1, 'ARQUITECTURA ;  EN ', 0),
(2, 'ESTRUCTURA : EN', 1),
(3, 'ELECTRICIDAD ; EN ', 1),
(4, 'SANITARIO : EN ', 1),
(5, 'DOCUMENTACIÓN :', 0),
(9, 'OBRA CIVIL', 1),
(10, 'RELEVAMIENTO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iniciarexpediente`
--

CREATE TABLE IF NOT EXISTS `iniciarexpediente` (
  `idiniciarexpediente` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idiniciarexpediente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `iniciarexpediente`
--

INSERT INTO `iniciarexpediente` (`idiniciarexpediente`, `nombre`) VALUES
(1, 'SI debe iniciar Expte de factibilidad previo Exp. de Obra Privada'),
(2, 'NO debe iniciar Expte de factibilidad');

-- --------------------------------------------------------

--
-- Table structure for table `inspecciones`
--

CREATE TABLE IF NOT EXISTS `inspecciones` (
  `idinspeccion` int(10) NOT NULL AUTO_INCREMENT,
  `idobras` int(10) DEFAULT NULL,
  `fechasolicitud` datetime DEFAULT NULL,
  `gremio` varchar(20) DEFAULT NULL,
  `librodeobra` varchar(10) DEFAULT NULL,
  `inspeccion` varchar(20) DEFAULT NULL,
  `idexpte` int(11) DEFAULT NULL,
  `iddistritoubicacion` int(2) NOT NULL DEFAULT '0',
  `fechainspeccion` date DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `cartel` varchar(10) DEFAULT NULL,
  `inspector` varchar(30) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `comentarios` text NOT NULL,
  `idgremioobs` int(10) DEFAULT NULL,
  `idnivel` int(10) DEFAULT NULL,
  `idlistado` int(11) NOT NULL DEFAULT '1',
  `idusuario` bigint(20) NOT NULL DEFAULT '12',
  KEY `idinspeccion` (`idinspeccion`),
  KEY `gremioobs` (`idgremioobs`) COMMENT 'relacion gremio observacion',
  KEY `nivel` (`idnivel`) COMMENT 'relacion nivel',
  KEY `listado` (`idlistado`) COMMENT 'relacion con inspeccionobra'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `inspecciones`
--

INSERT INTO `inspecciones` (`idinspeccion`, `idobras`, `fechasolicitud`, `gremio`, `librodeobra`, `inspeccion`, `idexpte`, `iddistritoubicacion`, `fechainspeccion`, `total`, `cartel`, `inspector`, `observaciones`, `sector`, `estado`, `comentarios`, `idgremioobs`, `idnivel`, `idlistado`, `idusuario`) VALUES
(1, 1, '2014-06-25 09:01:50', 'gremio', 'libro', 'inspeccion', 1, 0, '2014-07-31', 'totalhoy', '0', 'inspectorhoy', 'observacioneshoy', 'sectorhoy', 'estadohoy', 'comentariohoy', 2, 3, 6, 12),
(2, NULL, '2014-06-26 00:27:04', NULL, NULL, NULL, NULL, 0, '2014-06-27', NULL, '1', NULL, NULL, 'sector24', NULL, 'sin co', 3, 4, 1, 13),
(3, NULL, '2014-06-26 18:41:09', NULL, NULL, NULL, NULL, 0, '2014-12-17', NULL, '0', NULL, NULL, '', NULL, '', 1, 13, 1, 13),
(4, NULL, '2014-06-26 18:42:04', NULL, NULL, NULL, NULL, 0, '2014-06-30', NULL, '0', NULL, NULL, 'sector total', NULL, 'comentarios', 3, 1, 1, 13),
(5, NULL, '2014-07-06 19:49:04', NULL, NULL, NULL, 1, 0, '2014-07-29', 'total', '1', 'inspector', 'observaciones', 'sector', 'estado', 'comentarios', 3, 2, 11, 12),
(7, NULL, '2014-07-17 19:59:47', NULL, NULL, NULL, 12, 0, '2014-07-18', '', '0', 'Martin', '', '', 'observado', '', 3, 13, 11, 12),
(8, NULL, '2014-07-18 10:40:46', NULL, NULL, NULL, 14, 0, '2014-07-21', '', '1', '', '', '', '', '', 2, 13, 2, 12),
(9, NULL, '2014-07-20 09:32:52', NULL, NULL, NULL, 2, 0, '2014-07-22', '', '0', 'Inspector1', '', '', 'Estado1', '', 2, 13, 7, 12),
(10, NULL, '2014-07-23 09:40:54', NULL, NULL, NULL, 14, 0, NULL, '', '0', '', '', '', '', '', 2, 1, 4, 12),
(11, NULL, '2014-07-24 10:02:49', NULL, NULL, NULL, 12, 0, '2014-07-25', '', '1', '', '', 'total', '', 'me gusta', 2, 1, 6, 12),
(12, NULL, '2014-07-24 10:21:19', NULL, NULL, NULL, 14, 0, '2014-07-29', '', '0', '', '', '', '', '', 3, 13, 10, 12),
(13, NULL, '2014-07-24 10:56:58', NULL, NULL, NULL, 14, 0, '2014-07-25', '', '0', '', '', '', '', '', 3, 1, 9, 12),
(14, NULL, '2014-07-24 12:40:29', NULL, NULL, NULL, 12, 0, '2014-08-13', '', '1', '', '', '', '', '', 3, 1, 10, 12),
(15, NULL, '2014-07-27 18:31:08', NULL, NULL, NULL, 2, 0, '2015-03-23', 'Total', '1', '', 'observaciones', 'sector', '', 'comentarios', 3, 1, 11, 12),
(16, NULL, '2014-07-27 18:48:26', NULL, NULL, NULL, 2, 0, '2015-03-23', 'Parcial', '1', '', 'observaciones2', 'sector2', '', 'comentarios2', 2, 1, 2, 12),
(17, NULL, '2014-07-28 10:36:36', NULL, NULL, NULL, 14, 0, '2014-07-29', '', '0', NULL, '', '', NULL, '', 2, 2, 5, 12),
(18, NULL, '2014-07-31 12:57:31', NULL, NULL, NULL, 22, 0, '2014-08-05', '', '1', NULL, '', 'total', NULL, 'Se compactara el fondo de escavacion', 2, 1, 1, 12),
(19, NULL, '2014-08-04 08:57:41', NULL, NULL, NULL, 25, 0, '2014-08-05', '', '0', NULL, '', 'TOTAL', NULL, '', 2, 1, 2, 12),
(20, NULL, '2014-08-05 08:46:38', NULL, NULL, NULL, 25, 0, NULL, '', '0', NULL, '', '', NULL, '', 3, 13, 9, 12),
(21, NULL, '2014-08-06 10:42:29', NULL, NULL, NULL, 25, 0, '2014-08-07', '', '0', NULL, '', '', NULL, '', 2, 13, 5, 12),
(22, NULL, '2014-08-13 11:53:24', NULL, NULL, NULL, 25, 0, '2014-08-14', '', '1', NULL, '', '', NULL, '', 2, 1, 7, 12),
(23, NULL, '2014-08-15 12:29:36', NULL, NULL, NULL, 25, 0, '2014-09-02', '', '0', NULL, '', '', NULL, '', 2, 13, 5, 12),
(24, NULL, '2014-08-21 09:02:54', NULL, NULL, NULL, 25, 0, '2014-08-22', '', '0', NULL, '', '', NULL, '', 2, 13, 5, 12),
(25, NULL, '2014-09-12 12:46:09', NULL, NULL, NULL, 25, 0, '2014-09-16', '', '0', NULL, '', '', NULL, '', 2, 13, 6, 12),
(26, NULL, '2014-09-16 10:54:20', NULL, NULL, NULL, 1, 0, NULL, '', '0', '', '', '', '', '', 2, 13, 5, 12),
(27, NULL, '2014-10-28 12:33:14', NULL, NULL, NULL, 25, 0, NULL, '', '0', NULL, '', '', NULL, '', 2, 13, 2, 12),
(28, NULL, '2014-11-05 12:32:46', NULL, NULL, NULL, 19, 0, '2014-11-06', '', '0', '', '', '', '', '', 2, 13, 5, 12),
(29, NULL, '2014-11-17 12:49:38', NULL, NULL, NULL, 25, 0, '2014-11-18', '', '1', NULL, '', '', NULL, '', 2, 1, 4, 12),
(30, NULL, '2014-12-21 12:23:08', NULL, NULL, NULL, 31, 0, '2014-12-25', 'coloco si es parcial', '1', NULL, 'este es un espacio llenado por la Municipalidad', 'Total', NULL, 'sin comentarios', 2, 1, 2, 12),
(31, NULL, '2015-01-05 11:07:06', NULL, NULL, NULL, 31, 0, '2015-01-28', '', '0', '', '', '', '', '', 2, 13, 3, 12),
(32, NULL, '2015-01-07 11:54:31', NULL, NULL, NULL, 31, 0, '2015-01-08', '', '0', NULL, '', '', NULL, '', 2, 1, 4, 12),
(33, NULL, '2015-01-09 09:51:33', NULL, NULL, NULL, 31, 0, '2015-01-21', '', '0', NULL, '', '', NULL, '', 2, 13, 7, 12),
(34, NULL, '2015-01-13 11:04:36', NULL, NULL, NULL, 25, 0, '2015-01-14', '', '0', NULL, '', '', NULL, '', 2, 13, 3, 12),
(35, NULL, '2015-01-14 08:59:10', NULL, NULL, NULL, 25, 0, '2015-01-20', '', '0', NULL, '', '', NULL, '', 2, 2, 2, 12),
(36, NULL, '2015-01-20 12:12:47', NULL, NULL, NULL, 2, 0, '2015-01-27', '', '1', '', '', '', '', '', 2, 2, 5, 12),
(37, NULL, '2015-01-21 10:36:43', NULL, NULL, NULL, 19, 0, '2015-01-28', '', '0', '', '', '', '', '', 2, 13, 4, 12),
(38, NULL, '2015-02-04 11:13:18', NULL, NULL, NULL, 49, 0, '2015-02-10', '', '1', '', '', '', '', '', 2, 1, 1, 12),
(39, NULL, '2015-02-09 12:40:06', NULL, NULL, NULL, 27, 0, '2015-02-25', '', '0', '', '', '', '', '', 2, 13, 7, 12),
(40, NULL, '2015-02-11 12:35:37', NULL, NULL, NULL, 2, 0, '2015-02-18', '', '0', '', '', '', '', '', 2, 1, 4, 12),
(41, NULL, '2015-02-12 10:15:06', NULL, NULL, NULL, 19, 0, '2015-02-16', '', '0', '', '', '', '', '', 3, 13, 9, 12),
(42, NULL, '2015-02-13 11:49:45', NULL, NULL, NULL, 19, 0, '2015-02-19', '', '0', '', '', '', '', '', 2, 7, 5, 12),
(44, NULL, '2015-02-24 11:31:22', NULL, NULL, NULL, 19, 0, '2015-03-03', '', '0', '', '', '', '', '', 2, 13, 4, 12),
(46, NULL, '2015-03-17 22:19:40', NULL, NULL, NULL, 99, 0, '2015-03-20', '', '0', NULL, '', '', NULL, '', 2, 1, 1, 12),
(47, NULL, '2015-03-22 19:48:31', NULL, NULL, NULL, 2, 0, NULL, 'Total', '0', '', NULL, '', '', '', 3, 13, 8, 12),
(48, NULL, '2015-11-25 10:01:08', NULL, NULL, NULL, 114, 0, '2015-11-26', 'Total', '1', NULL, NULL, '', NULL, '', 2, 2, 3, 12),
(49, NULL, '2016-03-07 12:17:27', NULL, NULL, NULL, 25, 0, '2016-03-09', 'Total', '1', '', NULL, '', '', '', 3, 1, 9, 12),
(57, NULL, '2016-03-16 10:31:36', NULL, NULL, NULL, 126, 0, '2016-04-06', 'Total', '1', '', NULL, '', '', '', 3, 1, 9, 12),
(60, NULL, '2016-03-21 12:16:51', NULL, NULL, NULL, 126, 0, '2016-03-23', 'Total', '1', '', NULL, '', '', '', 2, 1, 3, 12),
(61, NULL, '2016-03-22 09:38:43', NULL, NULL, NULL, 126, 0, '2016-03-29', 'Total', '0', '', NULL, '', '', '', 3, 13, 8, 12),
(62, NULL, '2016-03-30 09:42:27', NULL, NULL, NULL, 66, 0, '2016-04-04', 'Total', '1', '', NULL, 'total', '', 'De 8 a 18 ', 2, 1, 1, 12),
(63, NULL, '2016-03-30 11:20:27', NULL, NULL, NULL, 66, 0, '2016-03-31', 'Total', '0', '', NULL, '', '', '', 2, 13, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `inspeccionesobra`
--

CREATE TABLE IF NOT EXISTS `inspeccionesobra` (
  `concepto` varchar(50) DEFAULT NULL,
  `idgremioobs` int(10) DEFAULT NULL,
  `idlistado` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idlistado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inspeccionesobra`
--

INSERT INTO `inspeccionesobra` (`concepto`, `idgremioobs`, `idlistado`) VALUES
('ZANJAS BASES Y ARRANQUE COLUMNAS', 2, 1),
('VIGAS DE FUNDACION', 2, 2),
('VIGAS DE DINTEL', 2, 3),
('VIGAS DE CARGA', 2, 4),
('LOSA Y VIGA DE TECHO', 2, 5),
('HABITABILIDAD', 2, 6),
('CONFORME A OBRA', 2, 7),
('POSTE DE OBRA', 3, 8),
('Cañeria de bajada', 3, 9),
('Cañeria de losa', 3, 10),
('cableado', 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `idlote` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idlote`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lote`
--

INSERT INTO `lote` (`idlote`, `nombre`) VALUES
(1, '1 Hectarea'),
(2, '1000 m2'),
(3, '1500 m2'),
(4, '750 m2'),
(5, '200 m2'),
(6, '250 m2'),
(7, '300 m2'),
(8, '500 m2'),
(9, '5000 m2'),
(10, '1 Hectarea'),
(11, 'NO PERMITIDOS'),
(12, 'EMPRENDIMIENTO PRIV 300m2 CON FRENTE VIA PUB. (< 5fracc) 100m2 (>5fracc) 200m2');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  `urlimagen` varchar(250) DEFAULT NULL,
  `idpadre` bigint(20) DEFAULT NULL,
  `idtipomenu` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmenu`),
  KEY `fk_padre_menu` (`idpadre`),
  KEY `fk_menu_tipomenu` (`idtipomenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `codigo`, `nombre`, `url`, `visible`, `urlimagen`, `idpadre`, `idtipomenu`) VALUES
(1, 'Rol', 'Roles', 'Rol', 1, 'pictures.png', 23, 1),
(2, 'Usuario', 'Personas', 'Usuario', 1, 'groupofusers.png', 23, 1),
(3, 'Inspecciones', 'Inspecciones', 'Inspecciones', 0, '', NULL, 2),
(9, 'Permiso', 'Permisos', 'Permiso', 0, '', 23, 1),
(10, 'Welcome', 'Welcome', 'Welcome', 0, '', NULL, 2),
(11, 'Menu', 'Menu', 'Menu', 1, 'textfile.png', 23, 1),
(12, 'User', 'Usuario', 'User', 1, 'adduser.png', 23, 1),
(22, 'Administracion', 'Administracion', 'Administracion', 0, '', NULL, 1),
(23, 'Seguridad', 'Seguridad', '', 1, 'fa fa-desktop', NULL, 1),
(29, 'Parametro', 'Parametro', 'Parametro', 1, 'parametro.jpg', 77, 1),
(49, 'TipoMenu', 'Tipo Menu', 'TipoMenu', 1, 'hd.png', 23, 1),
(50, 'CargaParametros', 'Carga de Datos', '', 1, 'fa fa-desktop', NULL, 1),
(51, 'Gremioobservacion', 'Observaciones x Gremio', 'Gremioobservacion', 1, 'gremioObs.png', 99, 1),
(52, 'Inspeccionesobra', 'Inspecciones Obra', 'Inspeccionesobra', 1, 'inspeccionObra.png', 50, 1),
(53, 'Nivel', 'Niveles', 'Nivel', 1, 'nivel00.png', 50, 1),
(54, 'InspeccionObraPorGremioAjax', 'Inspecciones de Obra por Gremio', 'InspeccionObraPorGremioAjax', 0, '', NULL, 1),
(55, 'Expedientes', 'abm expedientes', 'Expedientes', 0, '', NULL, 2),
(56, 'expedienteForm', 'Datos del Expediente', 'expedienteForms/expedienteForm.php', 1, '', NULL, 4),
(57, 'titularForm', 'Datos del Titular', 'expedienteForms/titularForm.php', 1, '', NULL, 4),
(58, 'terrenoForm', 'Datos del Terreno', 'expedienteForms/terrenoForm.php', 1, '', NULL, 4),
(59, 'profesionalesForm', 'Datos de Profesionales', 'expedienteForms/profesionalesForm.php', 1, '', NULL, 4),
(60, 'documentacionForm', 'Documentacion Adjunta', 'expedienteForms/documentacionForm.php', 1, '', NULL, 4),
(61, 'Obras', 'Obras', 'Obras', 0, '', NULL, 2),
(62, 'Temporales', 'abm temporales', 'Temporales', 0, '', NULL, 2),
(63, 'Cargarexpediente', 'Cargar Expediente', 'Cargarexpediente', 0, '', NULL, 2),
(64, 'Paneltemporal', 'DATOS DE PREVIA', 'Paneltemporal', 1, '', NULL, 2),
(65, 'Panelexpediente', 'EXPEDIENTES', 'Panelexpediente', 1, '', NULL, 2),
(66, 'TemporalesCargarPanel', 'Cargar Datos Generales', 'Temporales/new', 1, 'glyphicon-plus', NULL, 5),
(67, 'TemporalesBuscarPanel', 'Cargar Obras, Adicionales y Factibilidad', 'Temporales', 1, 'glyphicon-search', NULL, 5),
(68, 'ExpedientesPanel', 'Buscar Expedientes', 'Expedientes', 1, 'glyphicon-search', NULL, 6),
(69, 'Movimiento', 'Historico de movimientos de expediente', 'Movimiento', 0, '', NULL, 2),
(70, 'ConsultaobservacionesPanel', 'Consulta de Observaciones', 'Consultaobservaciones', 1, 'glyphicon-search', NULL, 5),
(71, 'Consultaobservaciones', 'Consulta de Observaciones', 'Observaciones', 0, '', NULL, 2),
(72, 'Tarea', 'Tarea', 'Tarea', 1, 'add.png', 77, 1),
(73, 'Imprimirexpediente', 'Impresion de datos de expediente', 'Imprimirexpediente', 0, '', NULL, 2),
(74, 'Expedientesadmin', 'Administrar Expedientes', 'Expedientesadmin', 1, '', NULL, 2),
(75, 'Inspeccionesadmin', 'Inspeccionesadmin', 'Inspeccionesadmin', 0, '', NULL, 7),
(76, 'Obrasadmin', 'Obrasadmin', 'Obrasadmin', 0, '', NULL, 7),
(77, 'Configuracion', 'Configuración', '', 1, 'fa fa-desktop', NULL, 1),
(78, 'Distritos', 'Distritos', 'Distritos', 1, '', 50, 1),
(79, 'Movimientoadmin', 'Historico de movimientos de expediente - Admi', 'Movimientoadmin', 0, '', NULL, 7),
(80, 'Observacionexpte', 'Observaciones realizadas a un expediente', 'Observacionexpte', 0, '', NULL, 2),
(81, 'Observacionexpteadmin', 'Observaciones realizadas a un expediente - ad', 'Observacionexpteadmin', 0, '', NULL, 7),
(82, 'Tipodeobra', 'Tipos de Obra', 'Tipodeobra', 1, '', 50, 1),
(83, 'Destino', 'Destinos', 'Destino', 1, 'destino.jpg', 50, 1),
(84, 'Trabajo', 'Trabajos', 'Trabajo', 1, '', 50, 1),
(85, 'Obrasadicional', 'Adicionales Electricos', 'Obrasadicional', 1, '', 86, 1),
(86, 'Adicionales', 'Adicionales', '', 1, 'fa fa-desktop', NULL, 1),
(87, 'Reparacion', 'Reparación', 'Reparacion', 1, '', 86, 1),
(88, 'Agua', 'Agua', 'Agua', 1, '', 86, 1),
(89, 'Cloacas', 'Cloacas', 'Cloacas', 1, '', 86, 1),
(90, 'Adicionales', 'Adicionales', 'Adicionales', 0, '', NULL, 2),
(91, 'Adicionalesadmin', 'Adicionalesadmin', 'Adicionalesadmin', 0, '', NULL, 7),
(92, 'Permisorotura', 'Permiso de Rotura', 'Permisorotura', 1, '', 86, 1),
(93, 'Obrastemporal', 'Obrastemporal', 'Obrastemporal', 0, '', NULL, 2),
(94, 'Adicionalestemporal', 'Adicionalestemporal', 'Adicionalestemporal', 0, '', NULL, 2),
(95, 'Derecho', 'Derecho', 'Derecho', 1, '', 50, 1),
(96, 'Expedientesinterno', 'Administrar Expedientes (Interno)', 'Expedientesinterno', 1, '', NULL, 2),
(97, 'Zona', 'Zona', 'Zona', 0, '', NULL, 2),
(98, 'Calle', 'Calle', 'Calle', 0, '', NULL, 2),
(99, 'Observaciones', 'Observaciones', '', 1, 'fa fa-desktop', NULL, 1),
(100, 'Sectoroficial', 'Sector Oficial', 'Sectoroficial', 1, '', 99, 1),
(101, 'Observacionoficial', 'Observación Oficial', 'Observacionoficial', 1, '', 99, 1),
(102, 'Descripcionoficial', 'Descripción Oficial', 'Descripcionoficial', 1, '', 99, 1),
(103, 'Detalle', 'Detalle', 'Detalle', 1, '', 99, 1),
(104, 'Factibilidad', 'Factibilidad', '', 1, 'fa fa-desktop', NULL, 1),
(105, 'Zonas', 'Zonas', 'Zonas', 1, '', 104, 1),
(106, 'Numerozona', 'Numero de Zona', 'Numerozona', 1, '', 104, 1),
(107, 'Usogeneral', 'Uso General', 'Usogeneral', 1, '', 104, 1),
(108, 'Uso', 'Uso', 'Uso', 1, '', 104, 1),
(109, 'Lote', 'Lote', 'Lote', 1, '', 104, 1),
(110, 'Altura', 'Altura', 'Altura', 1, '', 104, 1),
(111, 'Ancho', 'Ancho', 'Ancho', 1, '', 104, 1),
(112, 'Retiro', 'Retiro', 'Retiro', 1, '', 104, 1),
(113, 'Vivienda', 'Vivienda', 'Vivienda', 1, '', 104, 1),
(114, 'Galpon', 'Galpon', 'Galpon', 1, '', 104, 1),
(115, 'Fos', 'FOS', 'Fos', 1, '', 104, 1),
(116, 'Fot', 'FOT', 'Fot', 1, '', 104, 1),
(117, 'Imprimiraforoadmin', 'Imprimiraforoadmin', 'Imprimiraforoadmin', 0, '', NULL, 2),
(118, 'Imprimiraforo', 'Imprimiraforo', 'Imprimiraforo', 0, '', NULL, 2),
(119, 'Zonascargadas', 'Zonas Cargadas', 'Zonascargadas', 1, '', 104, 1),
(120, 'Zonascargadasuso', 'Zonas Cargadas Uso', 'Zonascargadasuso', 0, '', NULL, 2),
(121, 'Factibilidadadmin', 'Factibilidadadmin', 'Factibilidadadmin', 0, '', NULL, 2),
(122, 'Factibilidadtemporal', 'Factibilidadtemporal', 'Factibilidadtemporal', 0, '', NULL, 2),
(123, 'Factibilidad', 'Factibilidad', 'Factibilidad', 0, '', NULL, 2),
(124, 'Imprimiraforotemporal', 'Imprimiraforotemporal', 'Imprimiraforotemporal', 0, '', NULL, 2),
(125, 'Cumplirordenanza', 'Cumplir Ordenanza', 'Cumplirordenanza', 1, '', 104, 1),
(126, 'Ensancheapertura', 'Afectación de Ensanche o Apertura', 'Ensancheapertura', 1, '', 104, 1),
(127, 'Afectacionlimite', 'Afectación de Limites', 'Afectacionlimite', 1, '', 104, 1),
(128, 'Actividadcompleja', 'Actividades Complejas', 'Actividadcompleja', 1, '', 104, 1),
(129, 'Iniciarexpediente', 'Iniciar Expediente', 'Iniciarexpediente', 1, '', 104, 1),
(130, 'Estacionamiento', 'Estacionamiento', 'Estacionamiento', 1, '', 104, 1),
(131, 'Fuerzamotriz', 'Fuerza Motriz', 'Fuerzamotriz', 1, '', 104, 1),
(132, 'Espacioocupar', 'Espacio a Ocupar', 'Espacioocupar', 1, '', 104, 1),
(133, 'Inspeccionesreporte', 'Reporte de Inspecciones', 'Inspeccionesreporte', 1, '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `idmovimiento` int(10) NOT NULL AUTO_INCREMENT,
  `idexpte` int(10) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `origen` varchar(30) DEFAULT NULL,
  `destino` varchar(30) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechaegreso` date DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  `resultado` varchar(20) DEFAULT NULL,
  `fojas` int(10) DEFAULT NULL,
  `observaciones` varchar(60) DEFAULT NULL,
  `pasado` int(10) DEFAULT NULL,
  PRIMARY KEY (`idmovimiento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34791 ;

--
-- Dumping data for table `movimiento`
--

INSERT INTO `movimiento` (`idmovimiento`, `idexpte`, `usuario`, `origen`, `destino`, `fechaingreso`, `fechaegreso`, `fechasalida`, `resultado`, `fojas`, `observaciones`, `pasado`) VALUES
(34789, 2, 'responsable', 'origen', 'destino', '2014-07-01', '2014-07-08', '2014-07-15', 'resultado', 0, 'observaciones', NULL),
(34790, 2, 'responsable2', 'origen2', 'destino2', '2014-07-03', '2014-07-10', '2014-07-17', 'resultado2', 10, 'observaciones2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movimiento1`
--

CREATE TABLE IF NOT EXISTS `movimiento1` (
  `idmovimiento` int(10) NOT NULL AUTO_INCREMENT,
  `idexpte` int(10) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `origen` varchar(30) DEFAULT NULL,
  `destino` varchar(30) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechaegreso` date DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  `resultado` varchar(20) DEFAULT NULL,
  `fojas` int(10) DEFAULT NULL,
  `observaciones` varchar(60) DEFAULT NULL,
  `pasado` int(10) DEFAULT NULL,
  PRIMARY KEY (`idmovimiento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=875 ;

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `idnivel` int(10) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`idnivel`, `nivel`) VALUES
(1, 'P.B.'),
(2, 'P.A.'),
(3, 'ENTREPISO'),
(4, '1° PISO'),
(5, '2° PISO'),
(7, '4° PISO'),
(8, '5° PISO'),
(9, '6° PISO'),
(10, '7° PISO'),
(11, '8° PISO'),
(12, '9° PISO'),
(13, '10° Piso'),
(14, '11° PISO'),
(15, '12° PISO'),
(16, '3° PISO');

-- --------------------------------------------------------

--
-- Table structure for table `numerozona`
--

CREATE TABLE IF NOT EXISTS `numerozona` (
  `idnumerozona` bigint(20) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `idzonas` bigint(20) NOT NULL,
  PRIMARY KEY (`idnumerozona`),
  KEY `idzonas` (`idzonas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;

--
-- Dumping data for table `numerozona`
--

INSERT INTO `numerozona` (`idnumerozona`, `numero`, `idzonas`) VALUES
(1, '001', 48),
(2, '002', 48),
(3, '003', 1),
(4, '004', 48),
(5, '005', 2),
(6, '006', 2),
(7, '007', 3),
(8, '008', 3),
(9, '009', 3),
(10, '010', 3),
(11, '011', 3),
(12, '012', 3),
(13, '013', 3),
(14, '014', 3),
(15, '015', 3),
(16, '016', 3),
(17, '017', 3),
(18, '018', 4),
(20, '020', 5),
(21, '021', 5),
(22, '022', 5),
(23, '023', 5),
(24, '024', 5),
(25, '025', 6),
(26, '026', 6),
(27, '027', 6),
(28, '028', 7),
(29, '029', 7),
(30, '030', 8),
(31, '031', 8),
(32, '032', 8),
(33, '033', 8),
(34, '034', 8),
(35, '035', 8),
(36, '036', 9),
(37, '037', 9),
(38, '038', 9),
(39, '039', 9),
(40, '040', 9),
(41, '041', 9),
(42, '042', 11),
(43, '043', 10),
(44, '044', 10),
(45, '045', 10),
(46, '046', 10),
(47, '047', 49),
(48, '048', 49),
(49, '049', 12),
(50, '050', 12),
(51, '051', 12),
(52, '052', 12),
(53, '053', 13),
(54, '054', 13),
(55, '055', 13),
(56, '056', 13),
(57, '057', 13),
(58, '058', 13),
(59, '059', 13),
(60, '060', 13),
(61, '061', 14),
(62, '062', 14),
(63, '063', 14),
(64, '064', 14),
(65, '065', 15),
(66, '066', 15),
(67, '067', 49),
(68, '068', 49),
(69, '069', 12),
(70, '070', 17),
(71, '071', 17),
(72, '072', 17),
(73, '073', 17),
(74, '074', 17),
(76, '076', 17),
(77, '077', 17),
(78, '078', 17),
(79, '075', 17),
(80, '079', 18),
(81, '080', 19),
(82, '081', 20),
(83, '082', 21),
(84, '083', 21),
(85, '084', 21),
(86, '085', 21),
(87, '086', 23),
(88, '087', 24),
(89, '088', 26),
(90, '089', 27),
(91, '090', 27),
(92, '091', 27),
(93, '092', 27),
(94, '093', 27),
(95, '094', 27),
(96, '095', 27),
(97, '096', 27),
(98, '097', 27),
(99, '098', 50),
(100, '099', 50),
(101, '100', 50),
(102, '101', 29),
(103, '102', 29),
(104, '103', 51),
(105, '104', 51),
(106, '105', 30),
(107, '106', 30),
(108, '107', 34),
(109, '108', 34),
(110, '109', 34),
(111, '110', 34),
(112, '111', 34),
(113, '112', 34),
(114, '113', 34),
(115, '114', 52),
(116, '115', 52),
(117, '116', 52),
(118, '117', 52),
(119, '118', 52),
(120, '119', 52),
(121, '120', 52),
(122, '121', 52),
(123, '122', 52),
(124, '123', 52),
(125, '124', 52),
(126, '127', 36),
(127, '125', 36),
(128, '126', 36),
(129, '128', 36),
(130, '129', 36),
(131, '130', 36),
(132, '131', 36),
(133, '132', 36),
(134, '133', 36),
(135, '134', 36),
(136, '135', 36),
(137, '136', 38),
(138, '138', 39),
(139, '137', 39),
(140, '139', 39),
(141, '140', 39),
(142, '142', 39),
(143, '143', 39),
(144, '144', 39),
(145, '145', 39),
(146, '146', 39),
(147, '148', 39),
(148, '149', 40),
(149, '150', 40),
(150, '151', 40),
(151, '152', 40),
(152, '153', 41),
(153, '154', 41),
(154, '155', 42),
(155, '156', 42),
(156, '157', 42),
(157, '158', 42),
(158, '159', 42),
(159, '160', 31),
(160, '161', 31),
(161, '170', 43),
(162, '162', 31),
(163, '163', 31),
(164, '164', 31),
(165, '165', 31),
(166, '166', 31),
(167, '167', 31),
(168, '168', 31),
(169, '169', 31),
(170, '171', 43),
(171, '172', 43),
(172, '173', 43),
(173, '174', 43),
(174, '175', 43),
(175, '176', 43),
(176, '177', 53),
(177, '178', 53),
(178, '179', 53),
(179, '180', 44),
(180, '181', 44),
(181, '182', 44),
(182, '183', 44),
(183, '184', 44),
(184, '185', 44),
(185, '186', 44),
(186, '187', 44),
(187, '196', 44),
(188, '188', 44),
(189, '189', 44),
(190, '190', 44),
(191, '191', 44),
(192, '192', 44),
(193, '193', 44),
(194, '194', 44),
(195, '195', 44),
(196, '197', 44),
(197, '198', 44),
(198, '199', 44),
(199, '200', 44),
(200, '201', 45),
(201, '202', 45),
(202, '203', 45),
(203, '204', 45),
(204, '205', 45),
(205, '206', 46),
(206, '207', 46),
(207, '208', 46),
(208, '209', 46),
(209, '209', 46),
(210, '210', 46),
(211, '211', 46),
(212, '212', 46),
(213, '213', 46),
(214, '214', 46),
(215, '215', 46),
(216, '216', 46),
(217, '217', 46),
(218, '218', 46),
(219, '219', 46),
(220, '220', 46),
(221, '221', 46),
(222, '222', 47),
(223, '223', 47),
(224, '224', 47),
(225, '019', 5);

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `idobra` int(10) NOT NULL AUTO_INCREMENT,
  `expediente` int(10) NOT NULL DEFAULT '0',
  `nivel` int(10) DEFAULT NULL,
  `sup` int(10) DEFAULT NULL,
  `supaleros` int(10) DEFAULT NULL,
  `bocas` int(10) DEFAULT NULL,
  `potencia` int(10) DEFAULT NULL,
  `recintos` int(10) DEFAULT NULL,
  `tipoobra` varchar(10) DEFAULT NULL,
  `destino` varchar(20) DEFAULT NULL,
  `puntaje` int(4) DEFAULT NULL,
  `montosup` double DEFAULT NULL,
  `montobocas` double DEFAULT NULL,
  `montorecintos` double DEFAULT NULL,
  `trabajo` varchar(20) DEFAULT NULL,
  `estadoobra` varchar(20) DEFAULT NULL,
  `nrorecibo` int(10) DEFAULT NULL,
  `fechapago` date DEFAULT NULL,
  `iddestino` int(10) NOT NULL,
  `idtrabajo` int(10) NOT NULL,
  PRIMARY KEY (`idobra`,`expediente`),
  KEY `iddestino` (`iddestino`),
  KEY `idtrabajo` (`idtrabajo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`idobra`, `expediente`, `nivel`, `sup`, `supaleros`, `bocas`, `potencia`, `recintos`, `tipoobra`, `destino`, `puntaje`, `montosup`, `montobocas`, `montorecintos`, `trabajo`, `estadoobra`, `nrorecibo`, `fechapago`, `iddestino`, `idtrabajo`) VALUES
(1, 1, 3, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, '2014-07-03', 0, 0),
(2, 2, 1, 90, 0, 60, 8, 4, 'A Construi', 'Vivienda', 80, NULL, NULL, NULL, 'Estudio-Inspeccion', '', 0, '2014-07-04', 14, 2),
(3, 5, 13, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, NULL, 0, 0),
(4, 7, 13, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, NULL, 0, 0),
(5, 7, 2, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, NULL, 0, 0),
(6, 7, 1, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, NULL, 0, 0),
(7, 12, 2, 200, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, NULL, 0, 0),
(8, 14, 2, 252, 23, 94, 7, 4, 'NUEVA', 'VIVIENDA', 84, NULL, NULL, NULL, 'Estudio-Inspeccion', 'conforme a Obra', 43252, '2014-05-06', 0, 0),
(10, 2, 2, 0, 0, 0, 0, 0, '', '', 0, NULL, NULL, NULL, '', '', 0, '2014-07-06', 0, 0),
(14, 1, 1, 0, 0, 2, 0, 0, 'Ampliacion', '', 9, NULL, NULL, NULL, '', '', 0, '2014-07-05', 6, 2),
(15, 1, 13, 0, 0, 0, 0, 0, 'Ampliacion', 'Vivienda', 63, NULL, NULL, NULL, 'Estudio', '', 0, NULL, 6, 2),
(17, 22, 1, 109, 21, 92, 8, 5, 'TipoObra', 'Destino', 70, NULL, NULL, NULL, 'Trabajo2', NULL, NULL, NULL, 0, 0),
(18, 26, 1, 125, 20, 45, 41, 10, 'TipoObra2', 'Destino', 0, NULL, NULL, NULL, 'Trabajo', NULL, NULL, NULL, 0, 0),
(19, 25, 1, 154, 50, 45, 4, 0, 'Ampliacion', 'Vivienda', 80, NULL, NULL, NULL, 'Estudio-Inspeccion', NULL, NULL, NULL, 0, 0),
(20, 30, 1, 200, 23, 45, 7, 4, 'A Construi', 'Vivienda', 80, NULL, NULL, NULL, 'Estudio-Inspeccion', NULL, NULL, NULL, 14, 1),
(21, 1, 13, 0, 0, 0, 0, 0, 'Ampliacion', 'Antena', 47, NULL, NULL, NULL, 'Estudio', '', 0, NULL, 0, 0),
(22, 32, 1, 200, 20, 50, 15, 5, 'Nueva', 'Vivienda', 100, NULL, NULL, NULL, 'Estudio-Inspeccion', NULL, NULL, NULL, 0, 0),
(23, 30, 13, 20, 0, 0, 0, 0, 'Ampliacion', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2),
(24, 37, 13, 100, 0, 50, 0, 4, 'Construcci', NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(25, 39, 1, 100, 0, 50, 5, 4, 'Ampliacion', NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(26, 31, 1, 152, 15, 50, 7, 4, 'A Construi', NULL, 80, NULL, NULL, NULL, NULL, 'previa', 101554, '2014-12-16', 14, 1),
(27, 41, 1, 100, 0, 50, 7, 4, 'Relevada', NULL, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(28, 32, 13, 100, 50, 25, 7, 5, 'Relevada', NULL, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(29, 41, 1, 100, 0, 0, 0, 0, 'Relevada', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 2),
(30, 42, 1, 108, 9, 30, 5, 2, 'A Construi', NULL, 58, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(31, 46, 2, 141, 40, 0, 0, 0, 'A Construi', NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(32, 30, 13, 0, 0, 0, 0, 0, 'Relevada', NULL, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(33, 49, 1, 40, 0, 13, 3, 2, 'A Construi', NULL, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(34, 49, 1, 50, 0, 17, 2, 2, 'Relevada', NULL, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(35, 24, 1, 1401, 52, 51, 7, 0, 'A Construi', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(36, 2, 1, 252, 120, 50, 40, 4, 'Relevada', NULL, 80, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(37, 24, 1, 2555, 52, 52, 7, 4, 'A Construi', NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(38, 51, 13, 122, 23, 51, 7, 4, 'A Construi', NULL, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(39, 52, 1, 120, 5, 18, 120, 2, 'A Construi', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(40, 54, 1, 120, 20, 52, 5, 5, 'A Construi', NULL, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(41, 56, 1, 10000, 20, 50, 7, 4, 'A Construi', NULL, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(42, 57, 1, 200, 10, 50, 7, 4, 'A Construi', NULL, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(43, 24, 1, 1000, 20, 50, 7, 4, 'A Construi', NULL, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(44, 58, 1, 100, 20, 50, 25, 4, 'A Construi', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(45, 59, 2, 100, 20, 50, 7, 4, 'A Construi', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(46, 36, 13, 1501, 120, 520, 2, 2, 'A Construi', NULL, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(47, 60, 1, 104, 0, 79, 6, 3, 'A Construi', NULL, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(48, 64, 1, 200, 13, 56, 8, 3, 'A Construi', NULL, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(49, 65, 1, 245, 34, 30, 6, 7, 'A Construi', NULL, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(51, 67, 4, 138, 10, 0, 0, 0, 'A Construi', NULL, 85, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(52, 68, 1, 100, 0, 50, 7, 3, 'A Construi', NULL, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(54, 70, 1, 149, 2, 150, 7, 4, 'A Construi', NULL, 84, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(55, 73, 1, 95, 10, 50, 7, 4, 'A Construi', NULL, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(56, 75, 1, 109, 0, 29, 3, 3, 'Relevada', NULL, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(57, 76, 1, 108, 1, 109, 7, 4, 'A Construi', NULL, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(58, 77, 1, 147, 5, 97, 10, 4, 'A Construi', NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(59, 78, 1, 84, 2, 0, 0, 0, 'A Construi', NULL, 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(61, 88, 2, 409, 82, 174, 9, 6, 'A Construi', NULL, 70, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(62, 89, 1, 0, 0, 86, 9, 5, 'A Construi', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(63, 19, 1, 100, 50, 42, 7, 6, 'A Construi', NULL, 85, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(64, 91, 2, 83, 0, 50, 7, 3, 'A Construi', NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(65, 96, 1, 1662, 0, 532, 66, 70, 'A Construi', NULL, 70, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(67, 98, 1, 100, 6, 50, 7, 5, 'A Construi', NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(68, 99, 1, 100, 50, 30, 7, 4, 'A Construi', NULL, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1),
(69, 103, 1, 0, 0, 74, 8, 3, 'A Construi', NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(70, 104, 13, 0, 0, 12, 9, 0, 'Relevada', NULL, 70, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(71, 106, 1, 0, 0, 118, 9, 4, 'A Construi', NULL, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(72, 107, 2, 396, 34, 169, 11, 6, 'A Construi', NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(73, 110, 1, 193, 0, 50, 5, 2, 'Relevada', NULL, 100, NULL, NULL, NULL, NULL, '', 0, NULL, 8, 1),
(74, 114, 1, 100, 30, 50, 15, 2, 'A Construi', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(75, 126, 2, 234, 50, 50, 8, 4, 'A Construi', NULL, 70, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(93, 126, 1, 234, 56, 65, 7, 4, 'A Construi', NULL, 78, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(95, 159, 1, 345, 23, 43, 4, 4, 'A Construi', NULL, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(96, 66, 1, 200, 10, 50, 7, 4, 'A Construi', NULL, 80, NULL, NULL, NULL, NULL, '', 0, NULL, 14, 1),
(97, 131, 1, 234, 34, 45, 7, 4, 'A Construi', NULL, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1),
(98, 133, 2, 100, 0, 98, 15, 4, 'A Construi', NULL, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obrasadicional`
--

CREATE TABLE IF NOT EXISTS `obrasadicional` (
  `idobrasadic` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT '0',
  `dimension` varchar(100) DEFAULT '0',
  `idexpediente` int(11) DEFAULT '0',
  PRIMARY KEY (`idobrasadic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `obrasadicional`
--

INSERT INTO `obrasadicional` (`idobrasadic`, `descripcion`, `dimension`, `idexpediente`) VALUES
(1, 'Inst Temporaria hasta 3 Kw', 'Unidad', 0),
(2, 'Inst Temporaria mayor 3 Kw', 'Unidad', 0),
(3, 'Letrero Luminoso', 'm2', 0),
(4, 'Instalacion funcionamiento temporario', 'Kw', 0),
(5, 'Reconexiones (sin modificación)', 'Unidad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `observacionestado`
--

CREATE TABLE IF NOT EXISTS `observacionestado` (
  `idobsestado` int(10) NOT NULL AUTO_INCREMENT,
  `nombreestado` varchar(50) DEFAULT NULL,
  KEY `idobsestado` (`idobsestado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='se almacenan los posibles estados de las observaciones\r\n\r\n\r\n' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `observacionexpte`
--

CREATE TABLE IF NOT EXISTS `observacionexpte` (
  `idobsexpte` int(10) NOT NULL AUTO_INCREMENT,
  `expte` int(10) DEFAULT NULL,
  `obra` int(10) DEFAULT NULL,
  `observacion` text,
  `fechaobs` date DEFAULT NULL,
  `fechaaprobacion` date DEFAULT NULL,
  `profesional` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `gremio` varchar(50) DEFAULT NULL,
  KEY `idobsexpte` (`idobsexpte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabla que asocia el expediente con una o mas observaciones\r\n' AUTO_INCREMENT=227 ;

--
-- Dumping data for table `observacionexpte`
--

INSERT INTO `observacionexpte` (`idobsexpte`, `expte`, `obra`, `observacion`, `fechaobs`, `fechaaprobacion`, `profesional`, `estado`, `gremio`) VALUES
(4, 1111123456, 1, 'ARQUITECTURA: en CARATULA ( ver Caratula digitalizada)  Medidas reglamentarias , --   ---, esta  observacion PERSISTE', '2014-05-09', NULL, 'Pulenta Atilio E', 'PERSISTE', 'ARQUITECTURA'),
(10, 1111123456, 1, 'ARQUITECTURA: en <font><font>CARATULA (ver Caratula digitalizada)</  en "1" debe decir , CONSTRUCCION VIVIENDA   MULTIFAMILIAR\r\n, esta  observacion PERSISTE', '2014-06-12', NULL, 'Pulenta Atilio E', 'PERSISTE', 'ARQUITECTURA'),
(11, 1111123456, 1, 'ARQUITECTURA: en <font><font>CARATULA (ver Caratula digitalizada)</  en "1" debe decir , CONSTRUCION SALON COMERCIAL\r\n   Y TINGLADO\r\n, esta  observacion PERSISTE', '2014-06-12', NULL, 'Pulenta Atilio E', 'PERSISTE', 'ARQUITECTURA'),
(12, 1111123456, 1, 'ARQUITECTURA: en CORTES  niveles con la referencia  , En calles de tierra al promedio entre bocas de cloacas   0, esta  observacion PERSISTE', '2014-06-12', NULL, 'Pulenta Atilio E', 'PERSISTE', 'ARQUITECTURA'),
(13, 1111123456, 1, 'ARQUITECTURA: en CORTES  alturas min de base tanque de agua , 1,50 mts desde la canilla mas alta de ducha   0, esta  observacion PERSISTE', '2014-06-12', NULL, 'Pulenta Atilio E', 'PERSISTE', 'ARQUITECTURA'),
(19, 28, NULL, 'ARQUITECTURAPLANIMETRIA  espacio privado  marcar y ubicar piletas   acotarlas con referencia a las construcciones', '2014-08-19', NULL, '', '', 'ARQUITECTURA'),
(20, 28, NULL, 'ARQUITECTURAenPLANIMETRIA el espacio publico o urbano debe representar cordon banquina cuneta y acotarlos con referencia al limite de proiedad', '2014-08-19', NULL, '', '', 'ARQUITECTURA'),
(22, 28, NULL, 'ARQUITECTURAenPLANTA la  dimensiones minimas de Codigo  locales principales de ancho min 2,80 mts sup min 14 m2', '2014-09-08', NULL, '', '', 'ARQUITECTURA'),
(23, 28, NULL, 'ARQUITECTURAPLANTA  dimensiones minimas de Codigo  de los banos  entre abatimiento de puerta y artefacto espacio 0,5 x ancho ', '2014-09-16', NULL, '', '', 'ARQUITECTURA'),
(24, 28, NULL, 'ARQUITECTURAENPLANTA LAS dimensiones minimas de Codigo  de los banos  frente a la ducha o baÃ?Â±era dejar espacio de  0,70x0,70 mts', '2014-10-02', NULL, '', '', 'ARQUITECTURA'),
(25, 26, NULL, 'ARQUITECTURAPLANTA  DIMENSIONES MÍNIMAS   de los banos  banera o duchas la pared de cierre no supera del 30% del la', '2014-10-29', NULL, '', '', 'ARQUITECTURA'),
(37, 31, NULL, 'ARQUITECTURA EN LA PLANTA  LAS DIMENSIONES MÍNIMAS   DENTRO  DE LOS BAÑOS  FRENTE A DUCHA O BAÑERA DEJAR ESPACIO  0,70x0,70 mts', '2015-01-05', NULL, '', '', 'ARQUITECTURA'),
(40, 42, NULL, 'ARQUITECTURA<font><font>CARATULA (ver Caratula digitalizada)  en "31" debe decir   LA NOMENCLATURA CATASTRAL  coincidente con datos de catastro', '2015-01-19', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(41, 42, NULL, 'ARQUITECTURA  EN  PLANTA   FALTA  PROYECCIONES EN LINEAS DE TRAZO  DEL   TANQUE DE AGUA    ', '2015-01-19', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(42, 42, NULL, 'DOCUMENTACION  EN EL FORMULARIO DE CATEGORIZACION    COMPLETAR AL PIE DE PAGINA     LUGAR, FECHA, RESPONSABLE, FIRMA    ', '2015-01-19', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'DOCUMENTACION'),
(44, 42, NULL, 'DOCUMENTACION EN LA PLANILLA DEIE (DIREC.ESTADISTICAS)    FALTAN  FIRMAS         ', '2015-01-19', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'DOCUMENTACION'),
(45, 42, NULL, 'ARQUITECTURA EN LOS CORTES  FALTAN  COTAS     DE ALTURA MÁXIMA Y MINIMAS      DE LOS MUROS MAS BAJO Y MAS ALTO', '2015-01-19', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(48, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   EN EL  CIRCUITOS ENTRE MED. Y TG DEBE  CORREGIR CALCULOS   FALTA SECCIÓN DEBE SER (4X6)/34', '2015-01-19', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(49, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   EN  CIRCUITOS ENTRE TG Y TS CORREGIR CALCULOS   DEBE SER 3X6+T6', '2015-01-19', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(50, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   LA  SIMBOLOGIA  DE  LOS PROTO SE INDICAN CON LINEAS DE TRAZOS    CON RAYITAS CRUZADAS UNA POR CADA FASE', '2015-01-19', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(51, 42, NULL, 'ELECTRICIDAD EN EL DETALLE TABLERO  EN  TODOS  DEBE IR  EL NEUTRO LINEA DE TRAZOS, TIERRA LINEA Y PUNTO, LAS FASES LINEA CONTINUAS  .-', '2015-01-20', NULL, '', '', 'ELECTRICIDAD'),
(53, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   LOS  CIRCUITOS     SE DEBEN IDENTIFICAR   C/U   CORRECTAMENTE', '2015-01-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(55, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   EN EL  CIRCUITOS  C1 LAS  LLAVES COMBIMADAS  DEBE   REVISAR CANTIDAD DE CONDUCTORES', '2015-01-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(56, 42, NULL, 'ELECTRICIDAD EN LA PLANTA   EN LOS  CIRCUITOS  LOS CONDUCTORES DE TIERRA  DEBEN SER  SU SECCIÓN IGUAL A SECCIÓN DE FASE Y > 1,5', '2015-01-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(59, 42, NULL, 'ELECTRICIDAD EN EL DETALLE DE MONTAJES  LA  DE PUESTA TIERRA  SUS  DIMENSIONES DE JABALINA ,  NO MENOR DE 1,50 mts', '2015-01-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(60, 42, NULL, 'SANITARIO EN LA CARATULA (ver Caratula digitalizada)   en "1"    en R.O. colocar el DISTRITO Y DEPARTAMENTO  ,-', '2015-01-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(61, 42, NULL, 'SANITARIO EN LA CARATULA (ver Caratula digitalizada)    en "9" debe decir    LABOR DE ACUERDO AL CERTIFICADO PROFESIONAL  EN ESTE CASO  PROYECTO Y DIRECCIÓN TECNICA', '2015-01-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(62, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LA  LINEA MUNICIPAL  DEBE  ACOTAR DISTANCIA A PLANTA  ,-', '2015-01-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(63, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LOS EJES DE COLINDANCIA  MARCALOS  LINEA DE TRAZO Y PUNTO  .-', '2015-01-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(65, 42, NULL, 'ESTRUCTURA EN LA CARATULA (ver Caratula digitalizada)    en "16" debe decir    el Norte Magnetico     indicando la direccion hacia arriba', '2015-01-20', NULL, 'TORRES LEANDRO', 'OBSERVADO', 'ESTRUCTURA'),
(66, 42, NULL, 'ELECTRICIDAD EN LA CARATULA (ver Caratula digitalizada)  en "3"   DEBE IR  PLANTA BAJA -   .-', '2015-01-21', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD'),
(67, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LAS  DESIGNACIONES     DE LOS LOCALES ,  dentro de cada local', '2015-01-21', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(69, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LAS LINEA DE CORTE EN LOS EXTREMOS CONTRARIOS  FALTA LA DESIGNACIÓN DE LETRAS  .-', '2015-01-21', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(71, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LOS ARTEFACTOS  SUS COLORES  EN  DE LA RED SECUNDARIA CEPIA', '2015-01-21', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(72, 42, NULL, 'SANITARIO EN LA <font><font>PLANTA</font></font>  LOS ARTEFACTOS  DEBEN  AGREGAR   PC, Be CON SUS DENOMINACIÓN', '2015-01-21', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO'),
(74, 42, NULL, 'ARQUITECTURA EN LA PLANTA  LAS DIMENSIONES MÍNIMAS  DE  DE LAVADERO  DEBEN TENER 1,60 mts de ancho min', '2015-01-28', '2015-01-05', 'LUIS MANCUZZO', '0', 'ARQUITECTURA'),
(77, 49, NULL, 'ARQUITECTURA EN LA <font><font>CARATULA (ver Caratula digitalizada)    en "32" debe decir   EL PADRÓN MUNICIPAL    coincidentes con datos de Catastro Municipal', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(78, 49, NULL, 'ARQUITECTURA EN LA FACHADA    FALTAN ELEMENTOS DE VISTA  LAS CONSTRUCCIONES   DE DOS TANQUE DE AGUA', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(79, 49, NULL, 'ARQUITECTURA EN LAPLANTA    INDICAR LINEAS DE  DE  OCHAVAS      Y ACOTARLAS (4,00 mts)', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(80, 49, NULL, 'ARQUITECTURA EN LAPLANTA    INDICAR LINEAS DE    INGRESOS A GARAGE Y ACOTAR LA LONGITUD LIBRE    A NO MENOS DE 10 mts DE LA  INTERSECCION DE LINEAS MUNICIPALES', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(81, 49, NULL, 'ARQUITECTURA<font><font>CARATULA (ver Caratula digitalizada)  en "18" colocar  LAS LABORES QUE CORRESPONDAN   EN ESTE CASO PROYECTO Y RELEVAMIENTO', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(82, 49, NULL, 'RELEVAMIENTO SI NO SE REALIZA CALCULO DE ESTRUCTURA   DEBE PRESENTAR PLANOS POR SEPARADOS    PARA EVITAR LOS SELLOS ANTIREGLAMENTARIO   DE ESTA FORMA EL SELLO IRA SOLAMENTE EN LO RELEVADO', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'RELEVAMIENTO'),
(83, 49, NULL, 'ARQUITECTURA EN LA PLANIMETRIA   DEL TERRENO  LAS DIMENSIONES DE SUS LIMITES  DEBEN SER  COMPLETAS DE VERTICE A VERTICE', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA'),
(87, 49, NULL, 'ARQUITECTURA  EN PLANIMETRIA  ESPACIO URBANO  DIBUJAR  ARBOLES   Y ACOTARLOS ENTRE ELLOS Y REFERIR LO A UN LIMITE', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(88, 49, NULL, 'ARQUITECTURA  EN REFERENCIAS  DESCRIBIR EL MATERIAL DE  MUROS  diferenciando los tipos utlizados', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(90, 49, NULL, 'ARQUITECTURA  EN REFERENCIAS   INDICAR LEYENDA     DECLARANDO SOBRES LAS SERVIDUMBRES   SI EXISTEN O NO,  SI ES SI MARCARLA EN PLANIMETRIA', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(91, 49, NULL, 'ARQUITECTURA  EN <font><font>CARATULA (ver Caratula digitalizada)  en "32" debe decir   EL PADRÓN MUNICIPAL   coincidentes con datos de Catastro Municipal', '2015-02-02', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(92, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  en "1"   ESC:50   SI LA PLANTA LA REALIZO EN 1:50', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(93, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  en "2"   ILUMINACION  ', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(94, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  en "5"   NUEVA  Y RELEVAMIENTO', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(95, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  DEL 13 AL 16   COMPLETAR RECUADRO COINCIDENTE CON ARQUITECTURA   DE ACUERDO A LAS LABORES PROFESIONALES', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(96, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  en "24"    VISADO A LA DERECHA  EN LUGAR DE APROBACION .-', '2015-02-03', NULL, 'B', 'OBSERVADO', 'ELECTRICIDAD EN '),
(97, 49, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)   RESPETAR COTAS Y RECUADROS  DE ACUERDO A CARATULA MODELO  ULTIMO RECUADRO DE 18 x 3 CM .-', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(98, 49, NULL, 'ELECTRICIDAD EN  LAPLANTA   LAS  SIMBOLOGIA   EN REVELAMIENTO VAN SIN RELLENO  .-', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(99, 49, NULL, 'ELECTRICIDAD EN PLANTA   EL  MEDIDOR ELECTRICO  EL  CABLEADO A TABLERO GENERAL  DEBE SER MINIMO   2 X 4 mm', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(100, 49, NULL, 'ELECTRICIDAD EN  LAPLANTA   EN   TABLERO  T.G LA  PUESTA A TIERRA   DEBE IR DENTRO DE LA PROPIEDAD', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(101, 49, NULL, 'ELECTRICIDAD EN DETALLE TABLERO  T.G LA   SALIDA DE CONDUCTORES   NO COINCIDE CON CAPACIDAD DE TERMICAS   DISMINUIR TÉRMICA O AUMENTAR SECCIÓN CONDUCTORES', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(102, 49, NULL, 'ELECTRICIDAD EN DETALLE TABLERO  EL DISYUNTOR DIFERENCIAL  DEB   INDICAR CARACTERÍSTICAS TÉCNICAS CORRESPONDIENTESNTE I.N.   D.I.', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(103, 49, NULL, 'ELECTRICIDAD EN  LAPLANTA   LOS   CIRCUITOS  BEBEN TENER CONDUCTORES DE TIERRA  CON SU SECCIÓN IGUAL A SECCIÓN DE FASE Y > 1,5', '2015-02-03', NULL, 'B', 'OBSERVADO', 'ELECTRICIDAD EN '),
(104, 49, NULL, 'ELECTRICIDAD EN PLANTA   CIRCUITOS   FALTA CALCULO  EN VARIOS  DE LLAVE A FOCO', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(105, 49, NULL, 'ELECTRICIDAD EN DETALLE TABLERO  DISYUNTOR DIFERENCIAL   NO LLEVA TIERRA  .-', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(106, 49, NULL, 'ELECTRICIDAD EN  LOSDETALLE TABLERO  LLEVA   TORNILLO      DE TIERRA     EN CADA TABLERO', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(107, 49, NULL, 'ELECTRICIDAD EN DETALLE DE MONTAJES  DE PUESTA TIERRA  DIMENSIONES DE JABALINA  NO MENOR DE 1,50 mts x 5/8"', '2015-02-03', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(108, 49, NULL, 'SANITARIO EN CARATULA (ver Caratula digitalizada)  en "4" debe decir  EDIFICIO :  EXISTENTE Y AMPLIACION', '2015-02-04', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO EN '),
(110, 49, NULL, 'SANITARIO EN CARATULA (ver Caratula digitalizada)  en"17"  MARCAR SALIDA CONEXIÓN CLOACAS (BERMELLÓN)  Y ACOTAR A  PR (REGISTRO DE CLOACAS)', '2015-02-04', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO EN '),
(111, 49, NULL, 'SANITARIO EN  EN LA CARATULA (ver Caratula digitalizada)  en"19"  EXP. DE CONSTRUCCIÓN :  COLOCAR   EL N° DE EXPTE ACTUAL', '2015-02-04', NULL, 'CONTRERAS GUSTAVO', 'O', 'SANITARIO EN '),
(112, 49, NULL, 'SANITARIO EN CARATULA (ver Caratula digitalizada)  en "9" debe decir  LABOR DE ACUERDO AL CERTIFICADO PROFESIONAL  Y SEGUN PALNOS DE ARQUITECTURA ES  PROYECTO Y RELEVO', '2015-02-04', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO EN '),
(117, 54, NULL, 'ARQUITECTURA  EN PLANTA  DIMENSIONES MÍNIMAS   DE LOS BAÑOS  FRENTE A DUCHA O BAÑERA DEJAR ESPACIO  0,70x0,70 mts', '2015-02-11', NULL, 'LUIS MANCUZZO', 'o', 'ARQUITECTURA  EN '),
(118, 27, NULL, 'ARQUITECTURA  EN <font><font>CARATULA (ver Caratula digitalizada)  en "3" debe decir  apellido y nombre del titular\r\n  coincidentes con datos de catastro\r\n', '2015-02-12', NULL, '', '', 'ARQUITECTURA  EN '),
(119, 2, NULL, 'ARQUITECTURA  EN  LAPLANTA  LAS DIMENSIONES MÍNIMAS   DE LOS BAÑOS  FRENTE A DUCHA O BAÑERA DEJAR ESPACIO  0,70x0,70 mts', '2015-02-12', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(120, 58, NULL, 'ARQUITECTURA  EN  EN LA PLANTA  LAS DIMENSIONES MÍNIMAS     DE LOS BAÑOS  FRENTE A DUCHA O BAÑERA DEJAR ESPACIO  0,70x0,70 mts', '2015-02-13', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(121, 60, NULL, 'ARQUITECTURA  EN  EN LA <font><font>CARATULA (ver Caratula digitalizada)    en "3" debe decir el  apellido y nombre del titular\r\n   debe ser  coincidentes con datos de catastro\r\n', '2015-02-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(124, 60, NULL, 'ARQUITECTURA  EN  EN LA PLANTA DE TECHO    DIBUJAR TODO LO EMERGENTE  LAS VENTILACIONES DE CALEFON Y  DE COCINA', '2015-02-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(126, 60, NULL, 'ARQUITECTURA  EN PLANTA  SEPARACIÓN DE COLINDANCIA  DEBE INDICARSE min 2,5 cm DE LA LINEA DE DIVISION   DE LAS PROPIEDADES COLINDANTES', '2015-02-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(127, 60, NULL, 'ARQUITECTURA  EN  EN LA PLANTA  DEBE  INDICAR LINEAS DE   INGRESOS A GARAGE Y ACOTAR LA LONGITUD LIBRE  A NO MENOS DE 10 mts DE LA  INTERSECCION DE LINEAS MUNICIPALES', '2015-02-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(128, 60, NULL, 'ARQUITECTURA  EN EN LA <font><font>CARATULA (ver Caratula digitalizada)  en "3" debe decir  si es possedor cambiar "TITULAR" por "PROPIETARIO"\r\n  y colocar abajo POSEEDOR :', '2015-02-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA  EN '),
(130, 60, NULL, 'ELECTRICIDAD EN CARATULA (ver Caratula digitalizada)  en "11"   COLOCAR EL NUMERO DE EXPEDIENTE MUNICIPAL  2015004097 .-', '2015-02-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(131, 60, NULL, 'ELECTRICIDAD EN  EN LACARATULA (ver Caratula digitalizada)    en "3"   DEBE IR  PLANTA BAJA -   .-', '2015-02-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(132, 60, NULL, 'ELECTRICIDAD EN  EN LA PLANTA   EN EL  MEDIDOR ELECTRICO  LA CAÑERIA ENTRE MEDIDOR Y TABLERO  DEBE SER DE  DE 34 mm', '2015-02-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(133, 60, NULL, 'SANITARIO EN CARATULA (ver Caratula digitalizada)  en "1"   en R.O. colocar el DISTRITO Y DEPARTAMENTO  ,-', '2015-02-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO EN '),
(134, 60, NULL, 'SANITARIO EN <font><font>PLANTA</font></font>  RED DE AGUA INDIRECTA   LAS BAJADAS    DEBEN IR EN LINEAS DE TRAZOS', '2015-02-20', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO EN '),
(135, 60, NULL, 'ESTRUCTURA EN EN LA PLANILLA DE CALCULO  VER LO  DE FUNDACIONES  CON   VERIFICACION DEL TERRENO    INCLUIDO EL INCREMENTO SISMICO', '2015-02-20', NULL, 'TORRES LEANDRO', 'OBSERVADO', 'ESTRUCTURA EN'),
(136, 60, NULL, 'ESTRUCTURA EN EN LA CARATULA (ver Caratula digitalizada)  LAS  OBSERVACIONES IGUALES A ARQUITECTURA  .-  .-', '2015-02-20', NULL, 'T', 'OBSERVADO', 'ESTRUCTURA EN'),
(137, 60, NULL, 'ELECTRICIDAD EN  LAPLANTA   EL  CIRCUITOS  DEL PASILLO FALTA  CONDUCTORES DE TIERRA    A BOCAS DE ILUMINACION', '2015-02-20', NULL, 'BARRERA JORGE', 'OBSERVADO', 'ELECTRICIDAD EN '),
(138, 70, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "17" debe decir  CALLE PRINCIPAL Y CALLES PERPENDICULARES .-', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(139, 70, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "17" debe decir  COLOCAR EN   CALLES PERPENDICULARES   DISTANCIA A ESQUINA MÀS PRÒXIMA  .-', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(140, 70, NULL, 'ARQUITECTURA ;  EN PLANTA  SEPARACIÓN DE COLINDANCIA  min 2,5 cm DE LA LINEA DE DIVISION  MURO SUR OESTE  DE LAS PROPIEDADES COLINDANTES', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(141, 70, NULL, 'ARQUITECTURA ;  EN PLANTA  COTAS  PARCIALES   DISTANCIA DE POZO INFILTRACION A EJE COLINDANTE .-', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(143, 70, NULL, 'ARQUITECTURA ;  EN PLANTA  EVITAR VISUALES A TERRENOS VECINOS    DESDE BALCONES Y/O TERRAZAS   A MENOS DE 3 METROS DEL EJE COLINDANCIA', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(144, 70, NULL, 'ARQUITECTURA ;  EN PLANTA  REPRESENTACIÓN  DE LOS MUROS  GRISADOS O COLOREADOS A CRITERIO (NO RAYA)', '2015-03-02', NULL, 'LUIS MANCUZO', 'O', 'ARQUITECTURA ;  EN '),
(145, 70, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA  DEL TERRENO  TIPO DE CIERRE  CON SIMBOLOGIA O LEYENDA', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(147, 70, NULL, 'ARQUITECTURA ;  EN CORTES  FALTAN ELEMENTOS DE  VISTA  Y/O CORTE DEL TANQUE DE AGUA   INDICANDO MATERIAL Y CAPACIDAD', '2015-03-02', NULL, 'LUIS MANCUZO', 'O', 'ARQUITECTURA ;  EN '),
(148, 70, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA  ESPACIO URBANO  REPRESENTAR CORDÓN SI LO HAY   ACOTARLOS CON REFERENCIA LA LIMITE DE LA PROPIEDAD', '2015-03-02', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(150, 84, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "30" debe decir  En obra proyectada  "VISACION"', '2015-03-04', NULL, '', '', 'ARQUITECTURA ;  EN '),
(151, 84, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "17" debe decir  CROQUIS DE LA PROPIEDAD  medidas perimetrales', '2015-03-04', NULL, '', '', 'ARQUITECTURA ;  EN '),
(152, 84, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "3" debe decir  apellido y nombre del poseedor  coincidente con documentacion adjunta\r\n', '2015-03-04', NULL, '', '', 'ARQUITECTURA ;  EN '),
(153, 84, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA  DEL TERRENO  DIMENSIONES DE SUS LIMITES  COMPLETAS DE VERTICE A VERTICE', '2015-03-04', NULL, 'NATALIA FARES', '', 'ARQUITECTURA ;  EN '),
(155, 84, NULL, 'ARQUITECTURA ;  EN PLANTA  INDICAR LINEAS DE  RETIROS (SEGÚN SECTOR DE FACTIBILIDAD) SOLICITARLO EN PLANIFICACION  .-', '2015-03-04', NULL, 'NATALIA FARES', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(156, 84, NULL, 'ARQUITECTURA ;  EN PLANTA  CARPINTERIA  INDICAR APERTURA VENTANAS O PUERTAS VENTANAS? HACIA DONDE ABRE', '2015-03-04', NULL, 'NATALIA FARES', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(160, 86, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA   SOBRE LAS SERVIDUMBRES  SI EXISTEN, REPRESENTARLAS Y ACOTARLAS   Y SI NO EXISTEN, EN REFERENCIAS HACERLO CONSTAR', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(161, 86, NULL, 'ARQUITECTURA ;  EN PLANTA Y PLANIMETRIA LAS  COTAS  NORMALIZADAS  PERPENDICULARES AL EJE DE CALLE', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(163, 86, NULL, 'ARQUITECTURA ;  EN PLANTA  COTAS  NORMALIZADAS  DISTANCIA ENTR EJE Y LC-LE PERPENDICULARES AL EJE DE CALLE', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(164, 94, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  Medidas reglamentarias  BORDE SUPERIOR ROTULO medidas reglamentarias  CON P.M. Y N.C. esto es para borrar', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(165, 86, NULL, 'ARQUITECTURA ;  EN PLANTA  COTAS  NORMALIZADAS  DE  LC. Y LE PERPENDICULARES AL EJE DE CALLE', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(167, 95, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "32" debe decir   EL PADRÓN MUNICIPAL   coincidentes con datos de Catastro Municipal', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(168, 95, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "31" debe decir   LA NOMENCLATURA CATASTRAL  coincidente con datos de catastro', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(169, 94, NULL, 'DOCUMENTACIÓN :FOTOCOPIA CERTIFICADO DE FACTIBILIDAD  DEBE SOLICITARLA . EN PLANIFICACIÓN TERRITORIAL  .-  .-', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'DOCUMENTACIÓN :'),
(170, 94, NULL, 'ARQUITECTURA ;  EN PLANTA  ALTA LA  SEPARACIÓN DE COLINDANCIA  EN SU  min 2,5 cm DE LA LINEA DE DIVISION  ESTÁ MAL REPRESENTADA   DE LAS PROPIEDADES COLINDANTES', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(171, 94, NULL, 'ARQUITECTURA ;  EN PLANTA  ESCALERA NO REGLAMENTARIA   CORREGIR DIMENSIONES DE   DE  ANCHO TRAMO Y ANCHO LIMÓN INTERIOR', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(172, 94, NULL, 'ARQUITECTURA ;  EN PLANTA  ESCALERA NO REGLAMENTARIA   FALTA REPRESENTACIÓN BARANDA  .-', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(173, 94, NULL, 'ARQUITECTURA ;  EN PLANTA  VENTILACIÓN - ILUMINACIÓN   PROYECCIÓN CONDUCTOS DE VENTILACIÓN  DE CALEFÓN Y/O COCINA  EN LÍNEA DE TRAZOS', '2015-03-12', NULL, 'LUIS MANCUZO', 'O', 'ARQUITECTURA ;  EN '),
(174, 94, NULL, 'ARQUITECTURA ;  EN REFERENCIAS  DESCRIBIR EL MATERIAL DE  FUNDACIONES-ESTRUCTURA Y MUROS  .-', '2015-03-12', NULL, 'L', '', 'ARQUITECTURA ;  EN '),
(175, 94, NULL, 'ARQUITECTURA ;  EN CORTES  INDICAR ESTRUCTURAS DIFERENCIANDOLA SEGUN MATERIAL   BASES Y VIGAS DE  FUNDACIÓN .-', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(176, 94, NULL, 'ARQUITECTURA ;  EN PLANTA DE TECHO  CONDUCTOS PLUVIALES  NO ACEPTADOS EN ESPACIO PÚBLICO  .-', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(177, 94, NULL, 'ARQUITECTURA ;  EN PLANTA  REPRESENTACIÓN  DE LOS MUROS  GRISADOS O COLOREADOS A CRITERIO (NO RAYA)', '2015-03-12', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(178, 94, NULL, 'DOCUMENTACIÓN :PLANOS DE ESTRUCTURA  CON MEMORIA DE CALCULOS  .-  --', '2015-03-13', NULL, 'PULENTA ATILIO', 'OBSERVADO', 'DOCUMENTACIÓN :'),
(179, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "3"   PLANTA BAJA -   .-', '2015-03-16', NULL, 'QUIROGA HORACIO', 'OBSERVADO', 'ELECTRICIDAD ; EN '),
(181, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "11"   COLOCAR EL NUMERO DE EXPEDIENTE MUNICIPAL  20015005481 .-', '2015-03-16', NULL, 'QUIROGA HORACIO', 'O', 'ELECTRICIDAD ; EN '),
(182, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "21"   NOM CAT  IDEM A DATOS DE CATASTRO', '2015-03-16', NULL, 'QUIROGA HORACIO', 'OBSERVADO', 'ELECTRICIDAD ; EN '),
(183, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "22"    COLOCAR N° PADRON MUNICIPAL  30217 .-', '2015-03-16', NULL, 'QUIROGA HORACIO', 'OBSERVADO', 'ELECTRICIDAD ; EN '),
(184, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "5"   OBRA:  AMPLIACION  ,-', '2015-03-16', NULL, 'QUIROGA HORACIO', 'OBSERVADO', 'ELECTRICIDAD ; EN '),
(185, 94, NULL, 'ELECTRICIDAD ; EN CARATULA (ver Caratula digitalizada)  en "24"   EN LUGAR DE APROBACION   VISADO A LA DERECHA  .-', '2015-03-16', NULL, 'QUIROGA HORACIO', 'OBSERVADO', 'ELECTRICIDAD ; EN '),
(186, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)  en "7"  NO  VA NADA   EN DOMICILIO VA EN 24', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(187, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)   EN 26   LEYENDA CONEXIÓN DE AGUA   DE ACUERDO LO INDICADO EN CARATULA DIGITALIZADA', '2015-03-16', NULL, 'CONTRERAS GUSTAVOO', 'OBSERVADO', 'SANITARIO : EN '),
(188, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)   EN 27    COLOCAR LEYENDA CONEXION CLOACAS   DE ACUERDO LO INDICADO EN CARATULA DIGITALIZADA', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(189, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)  en "13" debe decir  NOMBRES DE CALLE PERPENDICULARES A LA PRINCIPAL  .-', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(190, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)  en"20"  P.Municipal: debe colocarse el padron municipal de la propiedad  30217  coincidente con datos de catastro', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(191, 94, NULL, 'SANITARIO : EN CARATULA (ver Caratula digitalizada)  en"21"  NOM. CAT. colocar el numero catastral de la propiedad  coincidente con datos de catastro', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(195, 94, NULL, 'ARQUITECTURA ;  EN PLANTA   POR SER EDIFICIO DE MAS DE UNA PLANTA   AGREGAR SISTERNA    PARA AGUA POTABLE', '2015-03-16', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(196, 94, NULL, 'SANITARIO : EN <font><font>PLANTA</font></font>   CON PLANTA ALTA O MAS DE 2    AGREGAR SISTERNA CON EQUIPOS DE BOMBEO  PARA AGUA POTABLE', '2015-03-16', NULL, 'CONTRERAS GUSTAVO', 'OBSERVADO', 'SANITARIO : EN '),
(197, 86, NULL, 'DOCUMENTACIÓN :PLANOS DE ESTRUCTURA  y PLANOS DE ELECTRICIDAD Y SANITARIOS  .-  --', '2015-03-17', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'DOCUMENTACIÓN :'),
(198, 42, NULL, 'ELECTRICIDAD ; EN DETALLE TABLERO  GENERAL (continuación del Medidor)  TERMOMÁGNETICA   SIMBOLOGIA DE ACUERDO A NORMATIVAS', '2015-03-17', '2015-03-17', '', '', 'ELECTRICIDAD ; EN '),
(199, 42, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA  ESPACIO URBANO  INDICAR CUNETAS    ACOTÁNDOLA', '2015-03-17', '2015-03-17', '', '', 'ARQUITECTURA ;  EN '),
(201, 101, NULL, 'ARQUITECTURA ;  EN PLANTA  REPRESENTACIÓN  DE LOS MUROS  GRISADOS O COLOREADOS A CRITERIO (NO RAYA)', '2015-03-18', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(202, 101, NULL, 'ARQUITECTURA ;  EN PLANTA  EVITAR VISUALES A TERRENOS VECINOS    DESDE BALCONES Y/O TERRAZAS   A MENOS DE 3 METROS DEL EJE COLINDANCIA', '2015-03-18', NULL, 'LUIS MANCUZO', 'o', 'ARQUITECTURA ;  EN '),
(203, 101, NULL, 'DOCUMENTACIÓN :PLANILLA DEIE (DIREC.ESTADISTICAS)  COMPLETAR CASILLEROS  SERVICIOS EN CALLE  .-', '2015-03-18', NULL, 'LUIS MANCUZO', 'OBSERVADO', 'DOCUMENTACIÓN :'),
(204, 88, NULL, 'DOCUMENTACIÓN :FORMULARIO DE CATEGORIZACION  COMPLETAR AL PIE DE PAGINA  NOM CAT - PADRON  - TERRITORIAL - CALLE  .-', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'DOCUMENTACIÓN :'),
(205, 88, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "30" debe decir EN LUGAR DE APROBACION  CUANDO LA OBRA ES PROYECTADA  "VISACION"', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(206, 88, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "28" debe decir  CUANDO LA OBRA ES PROYECTADA , EN LUGAR DE APROBACION  PREVIA  "VISACION PREVIA"', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(207, 88, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "29" debe decir  CUANDO LA OBRA ES PROYECTADA  "VISACION CALCULO"', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(208, 88, NULL, 'ARQUITECTURA ;  EN PLANTA  VENTILACIÓN  DE LOS   DEPOSITOS  DEBE SER LA   SUP. DE PISO/300', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(209, 88, NULL, 'ARQUITECTURA ;  EN PLANTA  VENTILACIÓN   DEPOSITOS  (EN CAVA)  SUP. DE PISO/300', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(210, 88, NULL, 'ARQUITECTURA ;  EN CORTES  ALTURAS MINIMAS  EN LOCALES NO HABITABLES 2,20 mts DE PISO A CIELO RASO  PUEDE BAJARSE El 20% DE LAS PROYECCIONES TOTALES DEL TECHO A 2,10mts', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(212, 88, NULL, 'ARQUITECTURA ;  EN <font><font>CARATULA (ver Caratula digitalizada)  en "2" debe decir  LA DIRECCIÓN DE LA UBICACIÓN DE LA OBRA  (EL LOTE 14 ES EL 18)??  COINCIDENTE CON LOS DATOS DE CATASTRO', '2015-03-20', NULL, 'LUIS MANCUZZO', 'OBSERVADO', 'ARQUITECTURA ;  EN '),
(213, 2, NULL, 'ARQUITECTURA ;  EN PLANTA  COTAS  PARCIALES  .-', '2015-11-18', NULL, '', '', 'ARQUITECTURA ;  EN '),
(214, 113, NULL, 'ARQUITECTURA ;  EN PLANTA  DIFERENCIAR SUPERFICIES  LA EXISTENTE DE LA PROYECTADA O DE LA RELEVADA  CON RAYADOS DIFERENTES', '2015-11-18', NULL, '', '', 'ARQUITECTURA ;  EN '),
(215, 113, NULL, 'ARQUITECTURA ;  EN PLANTA  DIFERENCIAR SUPERFICIES  LA  A DEMOLER O MAYOR DE 30 AÑOS  CON RAYADOS DIFERENTES', '2015-11-18', NULL, '', '', 'ARQUITECTURA ;  EN '),
(216, 114, NULL, 'ARQUITECTURA ;  EN  LAPLANTA  FALTAN PROYECCIONES EN LINEAS DE TRAZO  DE TANQUE DE AGUA    ', '2015-11-25', NULL, '', '', 'ARQUITECTURA ;  EN '),
(217, 2, NULL, 'ARQUITECTURA ;  EN PLANTA  COTAS  PARCIALES  .-', '2016-03-03', NULL, '', '', 'ARQUITECTURA ;  EN '),
(221, 126, NULL, 'SANITARIO : EN  <font><font>PLANTA</font></font>  los EJES DE COLINDANCIA  deben ser  LINEA DE TRAZO Y PUNTO  .-', '2016-03-21', NULL, '', '', 'SANITARIO : EN '),
(224, 126, NULL, 'ARQUITECTURA ;  EN PLANIMETRIA  ESPACIO URBANO  INDICAR LINEAS DE MEDIA Y ALTA TENSION    GRAFICARLA Y ACOTARLA', '2016-03-23', NULL, '', '', 'ARQUITECTURA ;  EN '),
(225, 66, NULL, 'ARQUITECTURA ;  EN  laPLANTA  las DIMENSIONES MÍNIMAS    DE LOS BAÑOS  ABATIMIENTO DE PUERTA DEJAR ESPACIO DE  0,5 x SU ANCHO DEL ARTEFACTO', '2016-03-30', NULL, '', '', 'ARQUITECTURA ;  EN '),
(226, 131, NULL, 'ARQUITECTURA ;  EN  LAPLANTA  LAS DIMENSIONES MÍNIMAS   DE LOS BAÑOS  los ABATIMIENTO DE PUERTA DEJAR ESPACIO DE  0,5 x SU ANCHO DEL ARTEFACTO', '2016-03-30', NULL, '', '', 'ARQUITECTURA ;  EN ');

-- --------------------------------------------------------

--
-- Table structure for table `observacionoficial`
--

CREATE TABLE IF NOT EXISTS `observacionoficial` (
  `idobservacion` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `idsectoroficial` int(30) DEFAULT '0',
  PRIMARY KEY (`idobservacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=437 ;

--
-- Dumping data for table `observacionoficial`
--

INSERT INTO `observacionoficial` (`idobservacion`, `nombre`, `idsectoroficial`) VALUES
(118, 'Medidas reglamentarias', 63),
(374, 'DE PUESTA TIERRA', 92),
(120, 'en "2" debe decir', 63),
(121, 'en "3" debe decir', 63),
(122, 'en "4" debe decir', 63),
(123, 'en "5"', 63),
(124, 'en "6" debe decir', 63),
(125, 'en "7" debe decir', 63),
(126, 'en "8" debe decir', 63),
(127, 'en "9" debe decir', 63),
(128, 'en "10" debe decir', 63),
(129, 'en "11" debe colocar', 63),
(130, 'en "12" debe colocar', 63),
(131, 'en "13" debe decir', 63),
(132, 'en "14" debe decir', 63),
(133, 'en "15" debe decir', 63),
(134, 'en "16" debe decir', 63),
(135, 'en "17" debe decir', 63),
(136, 'en "18" colocar', 63),
(137, 'en "19" debe decir', 63),
(138, 'en "20" debe decir', 63),
(139, 'en "21" debe decir', 63),
(140, 'en "22" debe decir', 63),
(141, 'en "23" debe decir', 63),
(142, 'en "24" debe colocar', 63),
(143, 'en "25" debe colocar', 63),
(144, 'en "26" debe colocar', 63),
(145, 'en "1" debe quedar', 70),
(146, 'en "2" debe quedar', 70),
(147, 'en "3" debe quedar', 70),
(148, 'en "4" debe quedar', 70),
(149, 'en "5" ', 70),
(150, 'en "10" ', 70),
(151, 'en "13" debe decir', 70),
(152, 'en "14" debe decir', 70),
(153, 'en "15" debe decir', 70),
(154, 'en "16" debe decir', 70),
(155, 'en "17" debe decir', 70),
(156, 'en "18" debe decir', 70),
(157, 'en "19" debe decir', 70),
(158, 'en "20" debe decir', 70),
(159, 'en "21" debe decir', 70),
(160, 'en "22" debe decir', 70),
(161, 'en "23" debe decir', 70),
(162, 'en "27" debe decir', 63),
(163, 'en "24" debe decir', 70),
(164, 'en "25" debe decir', 70),
(165, 'en "26" debe decir', 70),
(166, 'en "27" debe decir', 70),
(167, 'en "28" debe decir', 70),
(168, 'en "29" debe decir', 70),
(169, 'en "30" debe decir', 70),
(170, 'en "31" debe decir', 70),
(171, 'en "32" debe decir', 70),
(172, 'en "28" debe decir', 63),
(173, 'en "29" debe decir', 63),
(174, 'en "30" debe decir', 63),
(175, 'en "31" debe decir', 63),
(176, 'en "32" debe decir', 63),
(177, 'NIVELES DE REFERENCIA', 64),
(178, 'COTAS', 64),
(179, 'DIFERENCIAR SUPERFICIES', 64),
(180, 'ENUMERAR Y DESIGNAR', 64),
(181, 'PROYECCIONES EN LINEAS DE TRAZO', 64),
(182, 'SEPARACIÓN DE COLINDANCIA', 64),
(183, 'INDICAR LINEAS DE', 64),
(184, 'DIMENSIONES MÍNIMAS ', 64),
(185, 'VENTILACIÓN', 64),
(186, 'CARPINTERIA', 64),
(187, 'REPRESENTACIÓN', 64),
(188, 'ESPACIO PRIVADO', 66),
(189, 'ESPACIO URBANO', 66),
(190, 'COLOCAR SUP CUBIERTA EXISTENTE DECLARADA', 69),
(191, 'COLOCAR SUP CUBIERTA  EXISTENTE SIN DECLARAR', 69),
(192, 'COLOCAR SUP CUBIERTA A CONSTRUIR', 69),
(382, 'COLOCAR LA DESIGNACIÓN A QUE FACHADA CORRESPONDE', 67),
(195, 'NIVELES', 65),
(196, 'INDICAR ESTRUCTURAS DIFERENCIANDOLA SEGUN MATERIAL', 65),
(197, 'Medidas reglamentarias', 70),
(198, 'en "1" ', 81),
(199, 'xxx', 70),
(200, 'REFERENCIAS DE:', 65),
(201, 'ALTURAS MINIMAS', 65),
(203, 'REPRESENTAR  SUP COINCIDENTE CON LA DE PLANTA', 65),
(202, 'ALTURAS MÁXIMAS', 65),
(204, 'FALTAN ELEMENTOS DE', 65),
(205, 'Escala 1:1OO y/o 1:50', 67),
(206, 'FALTAN ELEMENTOS DE VISTA', 67),
(207, 'DESCRIBIR EL MATERIAL DE', 68),
(208, 'ESC 1:50 o 1:100', 71),
(209, 'DESIGNACIÓN ELEMENTOS ESTRUCTURALES', 71),
(210, 'DIFERENCIAR TRAZOS DE LINEAS', 71),
(211, 'COLOCAR ELEMENTOS ESTRUCTURALES Y DESIGNARLOS', 75),
(212, 'ESCALA IGUAL A LA PLANTA', 75),
(214, 'INDICAR ESCALA', 73),
(215, 'DE ENCUENTRO DE PORTICOS', 73),
(216, 'DE TABIQUE DE H° A°', 73),
(217, 'PUEDE PRESENTAR PLANILLAS SEPARADAS AL PLANO', 74),
(218, 'DE VIGAS', 72),
(220, 'DE TIRANTES y/o CABIOS', 72),
(221, 'DE LOSAS', 72),
(222, 'en "1" ', 76),
(223, 'eN  "2"   ', 76),
(224, 'en "3" debe decir', 76),
(225, 'en "4" debe decir', 76),
(226, 'en "5" debe decir', 76),
(227, 'en "6" debe decir', 76),
(228, 'en "7"', 76),
(229, 'en "8" ', 76),
(230, 'en "9" debe decir', 76),
(231, 'en "10" debe decir', 76),
(232, 'en "11" debe decir', 76),
(233, 'en "12" debe decir', 76),
(234, 'en "13" debe decir', 76),
(235, 'en "14" ', 76),
(236, 'en "15"', 76),
(237, 'en "16"', 76),
(238, 'en"17"', 76),
(239, 'en"18"', 76),
(240, 'en"19"', 76),
(241, 'en"20"', 76),
(242, 'en"21"', 76),
(243, 'en"22"', 76),
(244, 'RED PRIMARIA', 77),
(375, 'DE TENDIDO SUBTERRANEO', 92),
(246, 'VENTILACIONES', 77),
(247, 'ENUMERAR Y DESIGNAR', 77),
(248, 'ARTEFACTOS', 77),
(372, 'RED PLUVIAL', 77),
(250, 'COINCIDENTE CON PLANOS DE ARQUITECTURA', 77),
(251, 'su dibujo de la obra civil', 78),
(252, 'RED PRIMARIA', 78),
(253, 'RED SECUNDARIA', 78),
(254, 'VENTILACIONES', 78),
(255, 'en "2" ', 81),
(256, 'en "3" ', 81),
(257, 'en "4" ', 81),
(258, 'en "5" ', 81),
(259, 'en "6" ', 81),
(260, 'en "7" ', 81),
(261, 'en "8" ', 81),
(262, 'en "9" ', 81),
(263, 'en "10" ', 81),
(264, 'en "11" ', 81),
(265, 'en "12" ', 81),
(266, 'en "13" ', 81),
(267, 'en "14" ', 81),
(268, 'en "15" ', 81),
(269, 'en "16" ', 81),
(270, 'en "17" ', 81),
(271, 'en "18" ', 81),
(272, 'en "19" ', 81),
(273, 'en "20" ', 81),
(274, 'en "21" ', 81),
(275, 'en "22" ', 81),
(276, 'en "23" ', 81),
(277, 'en "24" ', 81),
(278, 'en "25" ', 81),
(279, 'RED DE AGUA', 78),
(280, 'RED DE DESAGUES', 78),
(283, 'trare borradorwa', 83),
(282, '23', 79),
(284, 'RED SECUNDARIA', 0),
(285, 'hola', 0),
(289, 'COINCIDENTE CON PLANO ARQUITECTURA', 89),
(422, ' SOBRE LAS SERVIDUMBRES', 66),
(290, 'SIMBOLOGIA', 89),
(291, 'ESC 1:50 o 1:100', 89),
(292, 'CIRCUITOS', 89),
(293, 'COTAS ELECTRICAS', 89),
(294, 'SUPERFICIE EXISTENTE', 89),
(295, 'IDENTIFICAR', 89),
(296, 'DE BOCAS DE ILUMINACION', 93),
(297, 'DE TOMAS CORRIENTES', 93),
(298, 'DE TOMAS ESPECIALES', 93),
(299, 'FACTOR DE SIMULTANEIDAD', 93),
(300, 'POTENCIA TOTAL', 93),
(301, 'MÁXIMO 15 BOCAS POR CIRCUITOS MIXTOS', 94),
(302, 'MAXIMO 10 BOCAS POR CIRCUITOS TOMAS EXCLUSIVOS', 94),
(303, 'MÁXIMO 20 BOCAS POR ILUMINACION', 94),
(371, 'RED SECUNDARIA', 77),
(308, 'DE CARGA TECHO MADERA', 95),
(307, 'DE CARGA LOSAS', 95),
(309, 'DE CARGA TECHO METALICO', 95),
(310, 'DE COEFICIENTE SISMICO', 95),
(312, 'DIBUJAR POR SEPARADO FUERA DE LA PLANTA', 75),
(313, 'en "33" debe decir', 63),
(314, 'Doc - Cert Hab Prof', 100),
(316, 'DIMENSIONES MÁXIMAS', 64),
(317, 'INDICAR ZONA DE SERVIDUMBRE', 64),
(318, 'ESCALERA NO REGLAMENTARIA', 64),
(319, 'INDICAR LINEAS DE CORTE', 64),
(320, 'DE CARGA DE VIENTO', 95),
(321, 'ESCALERAS', 73),
(322, 'UNIONES Y ANCLAJES EST. METALICAS', 73),
(323, 'CARACTERISTICAS Y DATOS DE MATERIALES', 74),
(324, 'CÓDIGOS Y NORMAS USADAS', 74),
(325, 'CRITERIOS DE CALCULO', 74),
(326, 'COLUMNAS AL VUELCO', 74),
(327, 'SISMO CUBIERTA RIGIDA', 74),
(328, 'DE FUNDACIONES', 72),
(329, 'DE COLUMNAS', 72),
(330, 'DE TABIQUES DE H° A°', 72),
(391, 'DESIGNACIÓN DE LA PLANTA', 71),
(331, 'RED DE AGUA CALIENTE', 77),
(332, 'RED DE AGUA FRIA', 77),
(333, 'RED DE AGUA INDIRECTA', 77),
(334, 'ESC : 1:100', 77),
(335, 'LINEA DE CORTE EN LOS EXTREMOS CONTRARIOS', 77),
(336, 'EVITAR VISUALES A TERRENOS VECINOS ', 64),
(337, 'UBICACIÓN POZO ABSORBENTE', 64),
(338, 'DIBUJAR FUNDACIONES', 65),
(339, 'DIBUJAR EQUIPAMIENTOS FIJOS', 65),
(340, 'COLOCAR SUP CUBIERTA A DEMOLER', 69),
(341, 'COLOCAR SUP CUBIERTA TOTAL', 69),
(342, 'REFERENCIA DE MATERIALES', 67),
(343, 'DESIGNAR N° Y UNIDAD FUNCIONAL S/ PLANTA', 103),
(344, 'INDICAR TIPO PISO', 103),
(345, 'INDICAR TIPO CARPINTERIA', 103),
(346, 'INDICAR TIPO HERRAJES', 103),
(347, 'INDICAR TIPO DE REVESTIMIENTO', 103),
(348, 'INDICAR TIPO DE REVESTIMIENTO', 103),
(349, 'INDICAR TIPO DE CIELORRASO', 103),
(350, 'INDICAR TIPO DE PINTURA', 103),
(351, 'DESIGNAR N° Y UNIDAD FUNCIONAL S/ PLANTA', 104),
(352, 'INDICAR TIPO ZOCALO', 103),
(353, 'COLOCAR % REQUERIDO DE ILUMINACIÓN Y VENTILACIÓN', 104),
(354, 'DESIGNAR CARPINTERÍA S/ PLANTA', 104),
(355, 'INDICAR EL ÁREA PROYECTADA', 104),
(356, 'DEL TERRENO', 66),
(357, 'INDICAR PENDIENTE CON SU SENTIDO', 87),
(358, 'INDICAR TIPO DE DESAGUE', 87),
(359, 'INDICAR CUBIERTA DE TECHO', 68),
(360, 'TIPO DE MUROS', 68),
(361, 'TIPO DE FUNDACIONES', 68),
(362, 'TIPO ESTRUCTURA RESISTENTE', 68),
(363, 'INDICAR SUP EXIST CON N° EXPTE y/o NO DECLARADA', 68),
(364, 'DE MATERIAL DE  FACHADA', 68),
(365, 'DISTRIBUCION FUERZAS SISMICAS', 72),
(366, 'COLOCAR ELEMENTOS ESTRUCTURALES', 71),
(367, 'DIFERENCIAR MUROS SÍSMICOS Y DESIGNARLOS', 71),
(368, 'UBICAR Y ACOTAR CENTRO DE MASA Y DE RIGIDEZ', 71),
(369, 'PROYECCIÓN TANQUE DE AGUA', 71),
(373, 'SUPERFICIE RELEVADA', 89),
(376, 'DE TENDIDO AEREO', 92),
(377, 'DE CÁMARA DE INSPECCIÓN PARA PROTO', 92),
(378, 'EVITAR VENTILACIÓN A TERRENO VECINOS', 64),
(380, 'DESIGNACIÓN CON NUMEROS O LETRAS', 65),
(383, 'COLOCAR NIVELES', 67),
(384, 'BAJA TENSION', 94),
(388, 'SIMBOLOGIA', 90),
(386, 'GENERAL (continuación del Medidor)', 91),
(387, 'SECUNDARIOS', 91),
(389, 'Escala 1:1OO y/o 1:50', 90),
(390, 'NO CORRESPONDE COLOCAR', 90),
(392, 'DE TANQUE DE AGUA', 71),
(393, 'DEMARCAR FUNDACIONES EN LINEA DE TRAZO', 71),
(423, 'DEBE SOLICITARLA . EN PLANIFICACIÓN TERRITORIAL', 99),
(395, 'FALTAN  FIRMAS', 107),
(396, 'COMPLETAR CASILLEROS', 107),
(397, 'SUPERFICIE CUBIERTA', 107),
(398, 'COMPLETAR  PUNTAJE', 106),
(399, 'COMPLETAR AL PIE DE PAGINA', 106),
(400, 'COTAS', 65),
(401, 'TODOS', 91),
(402, 'LINEA MUNICIPAL', 77),
(403, 'EJES DE COLINDANCIA', 77),
(404, ' DESIGNACIONES ', 77),
(405, 'DESIGNACIONES', 78),
(406, 'MARCAR LOS QUIEBRES DE TECHO', 87),
(407, 'DIBUJAR TODO LO EMERGENTE', 87),
(408, 'DEBE PRESENTAR PLANOS POR SEPARADOS', 108),
(409, 'COINCIDENCIAS DE REPRESENTACIÓN', 68),
(410, ' INDICAR LEYENDA ', 68),
(411, 'DEL 13 AL 16', 81),
(412, ' RESPETAR LAS MEDIDAS DE CARATULA MODELO', 63),
(413, ' RESPETAR COTAS Y RECUADROS', 81),
(414, ' MEDIDOR ELECTRICO', 89),
(415, ' SALIDA DE CONDUCTORES', 91),
(416, ' TABLERO', 89),
(417, 'DISYUNTOR DIFERENCIAL', 91),
(418, ' TORNILLO ', 91),
(419, ' OBSERVACIONES IGUALES A ARQUITECTURA', 70),
(420, ' VERIFICACION SISMICA', 75),
(421, ' PARA DETERMINAR LA LINEA DE EDIFICACION', 109),
(424, 'CONDUCTOS PLUVIALES', 87),
(425, 'CON MEMORIA DE CALCULOS', 110),
(426, 'EN 23 ', 76),
(427, ' EN 24', 76),
(428, ' EN 25 ', 76),
(429, ' EN 26', 76),
(430, ' EN 26', 76),
(431, ' EN 27 ', 76),
(432, ' EN "1" DEBE DECIR', 63),
(433, ' EN "28" DEBE DECIR', 76),
(434, ' POR SER EDIFICIO DE MAS DE UNA PLANTA', 64),
(435, ' CON PLANTA ALTA O MAS DE 2 ', 77),
(436, 'y PLANOS DE ELECTRICIDAD Y SANITARIOS', 110);

-- --------------------------------------------------------

--
-- Table structure for table `observobras`
--

CREATE TABLE IF NOT EXISTS `observobras` (
  `idobservobra` int(10) NOT NULL DEFAULT '0',
  `gremio` varchar(50) DEFAULT NULL,
  `pofesional` varchar(50) DEFAULT NULL,
  `expte` varchar(50) DEFAULT NULL,
  `obra` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idobservobra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oficinaexterna`
--

CREATE TABLE IF NOT EXISTS `oficinaexterna` (
  `idoficexterna` int(10) DEFAULT NULL,
  `oficinaexterna` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oficinas`
--

CREATE TABLE IF NOT EXISTS `oficinas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `oficinternas`
--

CREATE TABLE IF NOT EXISTS `oficinternas` (
  `idofic` int(10) NOT NULL AUTO_INCREMENT,
  `oficinainterna` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idofic`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `orientacion`
--

CREATE TABLE IF NOT EXISTS `orientacion` (
  `idorientacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idorientacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `idparametro` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `valor` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idparametro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `parametro`
--

INSERT INTO `parametro` (`idparametro`, `nombre`, `valor`, `descripcion`) VALUES
(4, 'nombresistema', 'Sistema de Gestión de Expedientes Externo', 'Nombre que se mostrará en el encabezado del sistema'),
(5, 'mensajehello', 'Hola  {nombre} {apellido} ({username}) - {fecha} - ', 'Mensaje de bienvenida de arriba a la derecha'),
(7, 'abreviaturasistema', 'Municipalidad de Maipu', 'Abreviatura del sistema'),
(8, 'pathLogo', 'app32.png', 'path donde esta la imagen del logo. A partir de ccs/images'),
(9, 'minDateFechaInspeccion', '1', 'MinDate para la fecha de inspeccion en inspecciones'),
(10, 'paginaInicial', 'Temporales/new', 'Pagina a la que se dirige cuando entra'),
(11, 'leyendaCargaDatos', 'leyendaCargaDatos', 'Las multas por omision del pedido de inspecciones seran aplicadas al propietario del terreno, si el propietario acusa recibo u orden escrita firmada por el profesional las sanciones se aplicaran al profesional. Por orden del propietario, se podra cam'),
(12, 'firmasCargaDatos', 'Firma del Propietario;Firma del Profesional', 'Lista de las etiquetas que se muestran debajo de las firmas separadas por coma'),
(13, 'pie2', 'Ing. Civil Atilio Pulenta', 'Texto que se va a mostrar como pie de página'),
(14, 'valorIndice', '1495', 'Valor en pesos que se utiliza para el cálculo de aforo'),
(15, 'derechoBocas', 'Boca', 'nombre  con el que se buscará el derecho para boca'),
(16, 'derechoRecintos', 'Recinto', 'nombre  con el que se buscará el derecho para recinto'),
(17, 'numerozona', '3;245;1', 'cantidad de dígitos;cantidad de números;desplazamiento inicial'),
(18, 'etiquetasABM', 'nuevoLabel:Nuevo;editarLabel:Editar;eliminarLabel:Borrar;confirmarLabel:Confirmar;cancelarLabel:Cancelar;volverLabel:Volver;confirmSi:Si;confirmNo:No;confirmMsj:Continuar?', 'Valores para etiquetas genericas'),
(19, 'tipoObraRelevada', 'Relevada', 'Nombre del tipo de obra RELEVADA. TABLA: tipodeobra');

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `orden` bigint(20) NOT NULL,
  `idusuario` bigint(20) NOT NULL,
  `idmenu` bigint(20) NOT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `fk_permiso_rol` (`idusuario`),
  KEY `fk_permiso_menu` (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `orden`, `idusuario`, `idmenu`) VALUES
(79, 1, 12, 1),
(80, 1, 12, 2),
(81, 1, 12, 3),
(87, 1, 12, 11),
(88, 1, 12, 9),
(89, 1, 12, 10),
(97, 1, 12, 12),
(128, 1, 12, 22),
(130, 40, 12, 23),
(137, 800, 12, 29),
(158, 9999999999999, 12, 49),
(159, 10, 1, 50),
(160, 40, 1, 23),
(161, 1, 1, 10),
(162, 1, 1, 22),
(164, 21, 1, 2),
(165, 22, 1, 11),
(166, 1, 1, 9),
(167, 23, 1, 29),
(168, 24, 1, 12),
(169, 25, 1, 1),
(170, 26, 1, 49),
(171, 100, 1, 3),
(172, 11, 1, 51),
(173, 12, 1, 52),
(174, 13, 1, 53),
(175, 999, 1, 54),
(178, 20, 1, 57),
(179, 30, 1, 58),
(180, 40, 1, 59),
(182, 20, 1, 61),
(183, 50, 1, 60),
(184, 20, 1, 55),
(185, 1, 1, 56),
(186, 10, 1, 62),
(187, 999, 1, 63),
(190, 300, 1, 69),
(191, 1, 14, 10),
(192, 10, 14, 64),
(193, 20, 14, 65),
(194, 1, 2, 10),
(197, 1, 14, 62),
(198, 10, 14, 57),
(199, 20, 14, 58),
(200, 30, 14, 59),
(201, 40, 14, 60),
(202, 10, 14, 55),
(203, 10, 14, 3),
(204, 20, 14, 61),
(205, 30, 14, 69),
(206, 40, 14, 63),
(207, 50, 14, 54),
(208, 999, 1, 71),
(209, 1, 14, 71),
(210, 300, 1, 72),
(211, 1, 2, 62),
(212, 1, 2, 70),
(213, 5, 2, 56),
(214, 10, 2, 57),
(215, 10, 2, 55),
(216, 10, 2, 3),
(217, 20, 2, 58),
(218, 20, 2, 61),
(219, 30, 2, 59),
(220, 30, 2, 69),
(221, 40, 2, 60),
(222, 40, 2, 63),
(223, 50, 2, 54),
(224, 1, 1, 73),
(225, 1, 14, 73),
(226, 1, 2, 73),
(228, 30, 1, 74),
(229, 10, 1, 75),
(230, 20, 1, 76),
(231, 30, 1, 78),
(232, 30, 1, 77),
(233, 1, 1, 79),
(234, 1, 1, 80),
(235, 1, 1, 81),
(236, 40, 1, 82),
(237, 50, 1, 83),
(238, 60, 1, 84),
(239, 10, 1, 85),
(240, 20, 1, 86),
(242, 30, 1, 88),
(243, 40, 1, 89),
(244, 1, 1, 91),
(245, 50, 1, 90),
(246, 50, 1, 92),
(247, 1, 1, 93),
(248, 1, 1, 94),
(249, 1, 14, 94),
(250, 1, 14, 93),
(251, 1, 14, 80),
(252, 1, 14, 90),
(253, 70, 1, 95),
(255, 1, 1, 97),
(256, 1, 1, 98),
(257, 30, 2, 78),
(258, 30, 2, 97),
(259, 30, 2, 98),
(260, 10, 2, 76),
(261, 20, 2, 91),
(262, 30, 2, 75),
(263, 40, 2, 79),
(264, 50, 2, 81),
(265, 10, 2, 74),
(266, 15, 1, 99),
(267, 20, 1, 100),
(268, 30, 1, 101),
(269, 40, 1, 102),
(270, 50, 1, 103),
(271, 25, 1, 104),
(272, 10, 1, 105),
(273, 20, 1, 106),
(274, 30, 1, 107),
(275, 40, 1, 108),
(276, 50, 1, 109),
(277, 60, 1, 110),
(278, 70, 1, 111),
(279, 80, 1, 112),
(280, 90, 1, 113),
(281, 100, 1, 114),
(282, 110, 1, 115),
(283, 120, 1, 116),
(284, 1, 1, 117),
(285, 1, 1, 118),
(286, 130, 1, 119),
(287, 1, 2, 117),
(288, 1, 1, 120),
(289, 10, 1, 121),
(290, 20, 1, 122),
(291, 30, 1, 123),
(292, 1, 14, 122),
(293, 2, 14, 123),
(294, 1, 14, 124),
(295, 1, 14, 118),
(296, 140, 1, 125),
(297, 150, 1, 126),
(298, 160, 1, 127),
(299, 170, 1, 128),
(300, 1, 1, 64),
(301, 180, 1, 129),
(302, 190, 1, 131),
(303, 200, 1, 130),
(304, 210, 1, 132),
(305, 50, 1, 133);

-- --------------------------------------------------------

--
-- Table structure for table `permisorotura`
--

CREATE TABLE IF NOT EXISTS `permisorotura` (
  `Idpermiso` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Idpermiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `permisorotura`
--

INSERT INTO `permisorotura` (`Idpermiso`, `descripcion`) VALUES
(1, 'Permiso Excv. Calle de Tierra'),
(2, 'Permiso  Rot. y Excav Calle de Asfalto'),
(3, 'Permiso Rot y Exc Calle de Hormigón'),
(4, 'Permiso Rotura Puentes y Cordon'),
(5, 'Reparacion Calle Hormigón'),
(6, 'Reparacion Calle Asfalto'),
(7, 'Reparacion Calle Tierra'),
(8, 'Permiso Rotura de Vereda');

-- --------------------------------------------------------

--
-- Table structure for table `reparacion`
--

CREATE TABLE IF NOT EXISTS `reparacion` (
  `idreparacion` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idreparacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reparacion`
--

INSERT INTO `reparacion` (`idreparacion`, `descripcion`) VALUES
(1, 'Rep 1'),
(2, 'Rep 2');

-- --------------------------------------------------------

--
-- Table structure for table `reposicion`
--

CREATE TABLE IF NOT EXISTS `reposicion` (
  `idreposicion` int(10) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retiro`
--

CREATE TABLE IF NOT EXISTS `retiro` (
  `idretiro` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idretiro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `retiro`
--

INSERT INTO `retiro` (`idretiro`, `nombre`) VALUES
(1, '2,5 m fondo'),
(2, '2m frontal y 50% con construcción'),
(3, '3 m frontal'),
(4, '3 m lateral'),
(5, '7 m lateral'),
(6, 'NO TIENE');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(5, 1),
(21, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(1, 2),
(4, 2),
(21, 2),
(71, 2),
(80, 2),
(85, 2),
(87, 2),
(98, 2),
(99, 2),
(121, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sectoroficial`
--

CREATE TABLE IF NOT EXISTS `sectoroficial` (
  `idsector` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `idgremioobs` int(4) NOT NULL DEFAULT '0',
  `codsector` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`idsector`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `sectoroficial`
--

INSERT INTO `sectoroficial` (`idsector`, `nombre`, `idgremioobs`, `codsector`) VALUES
(63, '<font><font>CARATULA (ver Caratula digitalizada)', 1, ''),
(64, 'PLANTA', 1, ''),
(65, 'CORTES', 1, ''),
(66, 'PLANIMETRIA', 1, ''),
(67, 'FACHADA', 1, ''),
(68, 'REFERENCIAS', 1, ''),
(69, 'CUADRO RESUMEN DE SUPERFICIE', 1, ''),
(70, 'CARATULA (ver Caratula digitalizada)', 2, ''),
(71, 'PLANTA', 2, ''),
(72, 'PLANILLA DE CALCULO', 2, ''),
(73, 'DETALLES', 2, ''),
(74, 'MEMORIAS DE CALCULO', 2, ''),
(79, 'PLANIMETRIA', 4, ''),
(78, 'CORTES', 4, ''),
(77, '<font><font>PLANTA</font></font>', 4, ''),
(75, 'PLANTA TANQUE DE AGUA', 2, ''),
(76, 'CARATULA (ver Caratula digitalizada)', 4, ''),
(80, 'CUADRO DE SUPERFICIE (ver cuadro digitalizado)', 4, ''),
(81, 'CARATULA (ver Caratula digitalizada)', 3, ''),
(82, 'PLANTA DE TECHO', 4, ''),
(83, 'PLANILLA DE ILUMINACION Y VENTILACION', 5, ''),
(87, 'PLANTA DE TECHO', 1, ''),
(88, 'PLANILLA DE LOCALES', 5, ''),
(89, 'PLANTA ', 3, ''),
(90, 'PLANTA BAJA TENSION', 3, ''),
(91, 'DETALLE TABLERO', 3, ''),
(92, 'DETALLE DE MONTAJES', 3, ''),
(93, 'CALCULO DE POTENCIA', 3, ''),
(94, 'COMPUTO DE BOCAS', 3, ''),
(95, 'ANALISIS', 2, ''),
(96, 'CERTIFICADO LINEA D.P.V', 5, ''),
(97, 'CERTIFICADO LINEA D.N.V', 5, ''),
(98, 'FOTOCOPIA DE ESCRITURA', 5, ''),
(99, 'FOTOCOPIA CERTIFICADO DE FACTIBILIDAD', 5, ''),
(100, 'CERTIFICADO HABILITACION PROFESIONAL', 5, ''),
(101, 'MEMORIA DE CALCULO', 5, ''),
(102, 'ESTUDIO DE SUELO', 5, ''),
(103, 'PLANILLAS DE LOCALES', 1, ''),
(104, 'PLANILLAS DE VENTILACIONES E ILUMINACION', 1, ''),
(105, 're', 4, ''),
(106, 'FORMULARIO DE CATEGORIZACION', 5, ''),
(107, 'PLANILLA DEIE (DIREC.ESTADISTICAS)', 5, ''),
(108, 'SI NO SE REALIZA CALCULO DE ESTRUCTURA', 10, ''),
(109, ' PLANO DE MENSURA ', 5, ''),
(110, 'PLANOS DE ESTRUCTURA', 5, ''),
(111, 'PLANOS DE SANITARIOS', 5, ''),
(112, 'PLANOS DE ELECTRICIDAD', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `idtarea` bigint(20) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `finalizada` int(11) NOT NULL DEFAULT '0',
  `prioridad` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`idtarea`, `tema`, `descripcion`, `finalizada`, `prioridad`) VALUES
(1, 'Expedientes - Impresion en PDF', 'Impresion de los datos de un expediente en pdf', 0, 1),
(2, 'Expedientes - Para administrador', 'Crear una opción solo para administradores para modificar expedientes', 1, 1),
(3, 'Inspecciones - validaciones', 'no permitir modificar una inspeccion luego de la fecha de inspeccion', 0, 1),
(4, 'Datos del terreno', '+ Distrito por combo.\n+ Todas las servidumbres: Si/No', 1, 1),
(6, 'Impresion de datos', 'agregar leyenda.\nagregar firma del propietario\nagregar firma del profesional', 1, 2),
(7, 'Consulta de observaciones', 'Error: se quedo pegado el valor por defecto de gremio', 1, 3),
(8, 'Ver observaciones', 'Mostrar las observaciones para un expediente- Buscar en la tabla observacionexpte', 1, 3),
(9, 'Solicitar inspecciones', 'usuario externo:\nno puede elegir estado y inspector\nUsuario interno\nagregar funcionalidad para asociar estado e inspector. LO puede hacer el administrador de expedientes', 1, 1),
(10, 'Obras solicitadas', '+ Tipo de obra es un combo a la tabla tipodeobra\n+ Destino es un combo a la tabla destino\n+ Trabajo profesional es un combo a la tabla trabajo', 1, 3),
(11, 'Adicionales de Obra', '+ Agregar adicionales a un expediente:\n+ No mostrar el monto para externo\n+ permiso -> permisorotura\n+ reposicion -> reparacion\n+ obraadicional -> obrasadicional\neliminar idexpediente\n+ agua -> \n+ cloacas', 1, 3),
(12, 'Historico', 'Cambiarlo por movimiento de expedientes', 1, 3),
(13, 'Historico', 'Agregar tooltip\n+ Origen -> Oficina donde se encuentra actualmente el expediente\n+ Destino -> Oficina donde se enviara\n\n+ Mostrar ingreso antes de destino y agregarle fecha\n+ Agregar fecha a la salida\n+ fecha cuando se termina de revisar el trabajo\n\n+ Agregar fecha de egreso\n+ fecha para pasar a otra oficina', 1, 2),
(14, 'Derecho', 'Crear ABM para la tabla derecho', 1, 2),
(15, 'Adicionales de Obra', '- Permiso -> Permiso y Reparación Rotura\n- Sacamos el combo de reparación', 1, 2),
(16, 'Inspecciones solicitadas', 'Sacar sábados y domingos de la fecha', 1, 2),
(17, 'Datos del Terreno', 'Tratar de mejorar la copia de datos', 0, 1),
(18, 'Carga de Observaciones', 'Permitir la carga de observaciones para usuarios internos', 1, 3),
(19, 'Zonas', 'Cargar zonas relacionadas a un distrito', 1, 2),
(20, 'Derecho - Aforo', 'Agregar dos campos para indicar el límite superior e inferior para determinar a que categoria pertenece.', 1, 3),
(21, 'Trabajo - Aforo', 'Agregar un campo para indicar el porcentaje que se le aplica al valor de obra y determinar el aforo', 1, 3),
(22, 'Destino - Aforo', 'Agregar un campo para indicar la multa que se aplica cuando calculamos el aforo en caso de relevamiento', 1, 3),
(23, 'Calculo de aforo', 'Realizar el calculo de aforo para adicionales de obra.', 1, 3),
(24, 'Impresión de aforo', 'Realizar la impresión de aforo', 1, 3),
(25, 'Observaciones', 'Crear nuevas observaciones', 1, 3),
(26, 'Creación de observaciones', 'Crear una pantalla para cada tipo.\nYa está creada las observaciones de gremio.\nFalta crear:\nSector\nObservación Oficial\nDescripción\nDetalle', 1, 3),
(27, 'Derecho', 'Eliminar la relación con el destino.\nCargar la tabla destino con todos los destino:\ndestino\npermiso\nadicional de obra\nagua\ncloaca', 1, 3),
(28, 'Adicionales de obra', 'A los 4 combos, agregarle una opción nula para que no guarde y no calcule aforo.', 1, 3),
(29, 'Aforo', 'Para calcular el aforo de boca, busco en derecho Boca.\nPara calcular el aforo de sanitario, busco en derecho Recinto.', 1, 3),
(30, 'Factibilidad - Zona y Numero', 'INTERNO\nCrear la tabla Zona.\nCrear la tabla Número que está relacionada con una zona.\nAutogenerar los números de 000 a un número indicado en la tabla parámetro.', 1, 3),
(31, 'Factibilidad - Uso general y Uso', 'INTERNO\nCrear la tabla uso general.\nCrear la tabla uso que está relacionada con un único uso general', 1, 3),
(32, 'Factibilidad - Otras tablas', 'INTERNO\n- Lote\n- Altura\n- Ancho Lote\n- Retiros\n- Viviendas\n- Galpon\n- FOS\n- FOT', 1, 3),
(33, 'Factibilidad - Zonas cargadas', 'INTERNO\nPermitir elegir un número, mostrar la zona.\nElegir un uso.\nCargar las otras tablas.', 1, 3),
(34, 'Factibilidad - Asociar a un expediente', 'EXTERNO\n- En el listado de expedientes agregar una columna que permita ingresar una factibilidad.\n- En la pagina de asociación de factibilidades mostrar:\nEL usuario ingresa el número.\nCon ese numero trae la zona cargada y una lista de los posibles usos.\nEl usuario elige un uso y lo guarda.', 1, 3),
(35, 'Impresión de aforo', '- Agregar una columna con el puntaje de la obra solicitada.\n- Juntar todo el aforo en una tabla única', 1, 3),
(36, 'Factibilidad', 'Zona cargada pueda estar relacionada a más de un uso', 1, 3),
(37, 'Observaciones', '- A cada página, agregar un combo para filtrar.\n- Tambien agregar combo para crear nuevos y editar.', 1, 3),
(38, 'Impresión de aforo', 'Salida a excel:\n- agregar título\n- agregar logo', 0, 1),
(39, 'Adicionales de obra', '- Sacar el 2 numero. Dejar solo la cantidad.\n- Al hacer el calculo del aforo, usar la cantidad en lugar del monto', 1, 3),
(40, 'Calculo de aforo', 'Calcular relevamiento:\n- Solo cuando el tipo de obra es relevada entonces\nCalculamos el porcentaje de multa y se lo aplicamos a toda la obra: aforo, bocas y recinto.\nSi la superficie es menor que el coeficiente que obtuvimos de destinos, aplicamos un porcentaje sobre 1000. Sino aplicamos los 1000.', 1, 3),
(41, 'Zonas Cargadas', 'Agregar una tabla nota aclaratoria con: id, codigo y nota.\nLuego realcionar la zona cargada y la nota.', 0, 2),
(42, 'Factibilidad', 'En factibilidad,\n- Para los usos, solo mostramos el uso.\n- Para la factibilidad, mostramos todo. Ya está bien así.\n- Solo permitir elegir una única factibilidad para todas las zonas.\n- En expediente no se puede modificar. En datos de previa si se puede.', 0, 3),
(43, 'Datos de previa', 'En el listado de expedientes, en lugar de editar ponemos "Ver Datos Generales"', 0, 1),
(44, 'Impresion de aforo', 'Dimension se llama Cantidad\nUnidad se llama Dimension\nMover las cantidades a la nueva columna cantidad, excepto para relevamiento que ya está bien.\nMostrar la dimensión segun el tipo. Para el caso de adicional de obra, tomarlo de la base de datos.', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tarifarias`
--

CREATE TABLE IF NOT EXISTS `tarifarias` (
  `idtarifaria` int(3) NOT NULL AUTO_INCREMENT,
  `articulo` char(3) DEFAULT NULL,
  `inciso` char(3) DEFAULT NULL,
  `apartado` char(3) DEFAULT NULL,
  `concepto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtarifaria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipodeobra`
--

CREATE TABLE IF NOT EXISTS `tipodeobra` (
  `idtipoobra` int(10) NOT NULL AUTO_INCREMENT,
  `nombreobra` varchar(50) DEFAULT NULL,
  KEY `Index 1` (`idtipoobra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tipodeobra`
--

INSERT INTO `tipodeobra` (`idtipoobra`, `nombreobra`) VALUES
(1, 'A Construir'),
(2, 'Relevada'),
(3, 'Anteproyecto'),
(4, 'Ampliacion'),
(5, 'Plan Fomento'),
(6, 'Refaccion');

-- --------------------------------------------------------

--
-- Table structure for table `tipomenu`
--

CREATE TABLE IF NOT EXISTS `tipomenu` (
  `idtipomenu` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipomenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tipomenu`
--

INSERT INTO `tipomenu` (`idtipomenu`, `nombre`) VALUES
(1, 'Administrativo'),
(2, 'Menu Principal'),
(3, 'Gadget'),
(4, 'Expediente'),
(5, 'Panel Carga Datos'),
(6, 'Panel Expedientes'),
(7, 'Super Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `trabajo`
--

CREATE TABLE IF NOT EXISTS `trabajo` (
  `idtrabajo` int(10) NOT NULL AUTO_INCREMENT,
  `nombretrabajo` varchar(50) DEFAULT NULL,
  `porcentaje` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idtrabajo`),
  KEY `Index 1` (`idtrabajo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trabajo`
--

INSERT INTO `trabajo` (`idtrabajo`, `nombretrabajo`, `porcentaje`) VALUES
(1, 'Estudio-Inspeccion', '0.45'),
(2, 'Estudio', '0.25'),
(3, 'Inspeccion', '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `type`, `created`, `expires`) VALUES
(3, 1, 'a9660bb0ff694424cb86b10498a28bebfb050c73', '7426dc2894717bf82926d71e55e3e4615fce54ec', '', 0, 1407069132),
(4, 1, 'fd766f9f901af3a7e802f7de212748c4df12d09e', 'e7525037f3a88100abd1df8d3724a90ed1a58616', '', 0, 1413069587),
(6, 5, 'f2520279ea185eb69893c4e84cc73f2d08df8294', 'fbee9c3d6016941d436b26a9c2a8fdb8aeb5a180', '', 0, 1413659363),
(7, 1, 'fd766f9f901af3a7e802f7de212748c4df12d09e', '9608b5bd767e0933cc7b64fae9923019c9aa2bff', '', 0, 1414451624),
(8, 1, '1c3f9b3e754ad1845355a7634e63080e13c1db12', '27c136833d1100793eff656540790903c5ee7a34', '', 0, 1415490449),
(9, 5, '73960b946663570f0b915d5ddabe311c7c54357e', '9a5e653709d4ee1019ffb5af97e340307af6443f', '', 0, 1417214766),
(13, 1, '9db7a72dc65a8525231b8d68fb18baa17d4424c2', '4f831172894dcd10c17549c62b11cd2a6fca5411', '', 0, 1427462046),
(19, 67, '0a5f289d804f405f459ef7cd66c4bfa106461dbb', '33bc763578910deb692eac0f7800a06eb8c4bce3', '', 0, 1458762405);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'diegobq@hotmail.com', 'diegobq', 'd5aef3828af0686ffc38bb854e0a883d04c5493075e371aae420cb4f3ed612f8', 1247, 1459348309),
(4, 'interno@mail.com', 'interno', 'd5aef3828af0686ffc38bb854e0a883d04c5493075e371aae420cb4f3ed612f8', 157, 1457712542),
(5, 'externo@mail.com', 'externo', 'd5aef3828af0686ffc38bb854e0a883d04c5493075e371aae420cb4f3ed612f8', 257, 1458851726),
(21, 'ingatiliopulenta@hotmail.com', 'enrique8', '43669db527906f0b903aa44a97eb25dbcf78c7ef0aab2c15411dee6eeb34885b', 33, 1458745352),
(65, 'claudiogustavo80@gmail.com', 'cgo123', '5e525652a560778540f96dd30dd2a16cd9bd6f17f99876e2c791b50a787f8f72', 21, 1457701884),
(66, 'leivaezequiel@hotmail.com', 'leolem', 'b0fe5bf773b6b7a9c93ee0b83fe7f717a9019f36b869dd6ee985b3569998d4b5', 7, 1461026937),
(67, 'vnerviani@hotmail.com', 'valerianerviani', 'dc5829d8907d7edd77f0e601973b16001636c1db7c14a088f7f7b51fd7854b19', 3, 1457625758),
(68, 'diego@pgarq.com.ar', 'pgarq', '0c1b3c5edb58d3ff92f9310308c83ba31b41199ae5b26fecdf6966cf452449fc', 1, 1457528689),
(69, 'arquitectohml@hotmail.com', 'waica', '93f2d6e18e9cad727c9820f9284ffbe27b48409959999d9a35548d5ab00898b8', 1, 1457531047),
(70, 'arquitectocanal@gmail.com', 'diegoc', 'ef1ea30a422943182c98898b8183e7a5f3bd15dc0e6d9fae411b411295f2d953', 1, 1457538677),
(71, 'leotorres@gmail.com', 'leotorres', '7c02988540e1dd124a587c6a0d7d3167c9244d141e1794a324ab1aae050c06cc', 2, 1458670473),
(72, 'robertojosenunez@yahoo.com.ar', 'roberto', 'b60f99a5792508a97ce91d39638608aec60ba8258bfb32cfff8806d644b281a9', 3, 1457616569),
(73, 'salaterraarq@gmail.com', 'saloterra', '9702fed1f5bdfeb93e7367e00a3be2c7aaebf78298f168624c9120bf228aa9a0', 1, 1457618170),
(74, 'gobras.sa@gmail.com', 'oagaldame', 'c2e883d3249d56b6a45ddbd712475661bc1460289acbfe20ff07f2f0b6009ceb', 2, 1457713338),
(75, 'diazangelf7@hotmail.com.ar', 'angel', 'c693d25d27ee94617d256eef56fe89d89aca17812ae981a3104ea4cebf52206a', 2, 1457620751),
(76, 'rociojurado22@gmail.com', 'rocioes', '3c84edbb4f62d63e9ddddbff6f1b6c8e2212dd9e879fe0d4fb1213b65a393aca', 3, 1457701098),
(77, 'lincura.sa@gmail.com', 'dgarciagei', '64b2fab8eda7a65336bfca41d4c1a614c6dd4b4d8ead2ae862998804bed791e7', 3, 1457702273),
(78, 'martinjofre16@hotmail.com', 'martin', '980653bba1f480582d07e7a60424645e6f562f498fa2453f8a4aa1a81f4bcb66', 1, 1457625048),
(79, 'arqcarlostercero@gmail.com', 'pasacate', '724515d6ccafa890aa87b086faa0d00ebbc2baeb982f11bfc8f71a1ff06ca314', 2, 1458214978),
(80, 'ingcivilmunafo@yahoo.com.ar', 'cicloneta_56', 'e7ab297e7239648a88e3ded3c2ca200ad771175028d0228291f59e1600ed15c9', 1, 1458143910),
(81, 'aqr.mautino@gmail.com', 'arqmautino', '1065dd54b7ac202419c32cc36e32a15b979d33d9598f15ed1346c13a29d3a97d', 2, 1457699551),
(82, 'joromo@volsinectis.com.ar', 'joromo', '28c8867636f2468820730bf1323ecd58fa9c4e5f04f37a102778c72d3753a4cc', 3, 1457705036),
(83, 'emiliapareja@gmail.com', 'emiliap', 'a30b1839e9931feab43b6bb483460afb3aee71834cc61554b1681b662255cb9e', 1, 1457713453),
(84, 'loesclar@gmail.com', 'leosclar', 'f46f94831eb319df927be56e852c52ff54c61b040810281dab2cfb3c71f58ad4', 2, 1457713932),
(85, 'carmelosimo@yahoo.com', 'carmelo', 'e9b23911128efe434273ea3f57ac21b2aa1230a63c3b293778db14b4b45b1c25', 6, 1459341056),
(86, 'luceroandina@yahoo.com.ar', 'luisluc', 'e1a4fde789c1b5a56233433074fa21026fe92cd89b9b3375d6a3a4726f04c524', 1, 1457734671),
(87, 'gac2007@hotmail.com', 'contrerasg', '217e7a195c60a42b1e266b88b2e107bd7a6f32a3137d876fedd228e672710277', 4, 1458662421),
(88, 'arq.martin.erario@gmail.com', 'martin462', '72622f4b9ebc7215512b4516c5428cd0e0a16b6edd2daa808bbd0f3a2d0925b3', 2, 1457966705),
(89, 'danvar3721@gmail.com', 'daniel16', '606253b03f384f072f31b8fb7c49edd1d74185e61752ea184f040771479b864c', 8, 1459347968),
(90, 'rodolfocperrone@yahoo.com.ar', 'hidrogeo', '0af28e1d34537d287ab2a671bebaec109f4338a02137eb2aecacb2858fff17d2', 3, 1458306987),
(91, 'paula.montoza@gmail.com', 'paulam', '191df24ebbbeeeadf61dd619d213ce1972530a36be68feafbc746962cac2fd40', 1, 1458134715),
(92, 'arquitectalucero@hotmail.com', 'elena33', 'ce36de61327f2f91d1f802146fcc141cdd6af3695643b2e53adeb4ddb4f8e312', 1, 1458137917),
(93, 'flavi_mza@hotmal.com', 'flaviabr', '5de9b80b844d76f05dc0ef302bdacf462f9757946fbbf4b48702983e4e1971d3', 2, 1458139396),
(94, 'soledad_olmos30@hotmail.com', 'sole31', '124d33b853d325b6c90a397e7279532506f49e8c81475c43f504289904cb0ceb', 2, 1458139899),
(95, 'carton@hotmail.com', 'antoniolu', '91a67bbada9a6100c72f2d9ccc653f0517ce87efd49ceedab650a9361521a7dd', 6, 1458142378),
(96, 'francisco@francampalans.com', 'fran79', 'eec792061373dafa40e5e5978c3477b3eb8ed2cc1d8a9b306cf1d6cf7527ee80', 1, 1458143626),
(97, 'natufares@hotmail.com', 'natifa', 'f49766cd3a5e96665f216b0e59273172d01239528f325fd86abeb38a0880baeb', 8, 1458851461),
(98, 'jorgedbarrera@hotmail.com', 'jorgee', '66805207a7d4a15621b0ab0daa3017247496f0dce1091f224ced0bd99b9da962', 5, 1458743343),
(99, 'hmq_mza@yahoo.com.ar', 'horacio', '1c18b08911fd8452c8690059f48a70f5ab7b4c3612a22291f4a56bbb89b11ef0', 0, NULL),
(100, 'dabusteindarquitectas@yahoo.com.ar', 'nurida', 'c1453ce0954381410627e19b3d81a1f8787019c345943fc7b064d4e318d1463d', 4, 1458225786),
(101, 'robertomarabini@yahoo.com.ar', 'roberto1', 'b9c1b2bce55e5183049d15f844907da886d1d777c7959e639fceb77b96251353', 1, 1458226563),
(102, 'mlmichelan@yahoo.com.ar', 'marily', 'b636262d4dcb763eef1c5422ffd9209e16b570db443fa84f3dc33324fd9a9deb', 2, 1458569505),
(103, 'lgviviendas@hotmail.com', 'zaric', '7a13b17023a14bbb99e1b2b984fe2b515095589f35e48a78448f1f1f4f735c0d', 3, 1458660271),
(104, 'ingnlopez@yahoo.com.ar', 'lopecito', 'f422c9155d76ae4f6c5320bc4abca2e3b1e67806588b2c467a2774233c1c4174', 3, 1458297761),
(105, 'carolarago@hotmail.comr', 'tati', '846de47f70adab6ab542515181647f1cd24789b212f4721ba39fb5095bbc636f', 1, 1458233143),
(106, 'colinarolando@speedy.com.ar', 'rodrigo', '2d30452a08eba9103b3f6c1d838d47ccaa5bcbde6b98ec70f1463033572e98e4', 1, 1458305608),
(107, 'oriolanifabio@gmail.com', 'fejo', 'a9ff0c08834d42c013beaa399f5989b0486871cf8d4ddaab32d862f56a297c04', 1, 1458307834),
(108, 'joseluis_guzman@yahoo.com.ar', 'joseluis', '40ad47c06a2c702db0582d7568c6e4341bc389a44bcda21468ac370e89ce2e84', 1, 1458309579),
(109, 'marianolubo@htmail.com', 'marianolu', 'd0c1f17158ffe1aaa846ba452ac87efb23b91b51e0a7247f17b2f721365e0bde', 1, 1458310450),
(110, 'elbagualmza_ar@hotmail.com', 'elbagual', '99732aa987f5100b689892038e3255b8dc250c9fe5b1e1f9b266768229b26bda', 1, 1458311456),
(111, 'a.ledda.arq@hotmail.com', 'aledda', '0450b2a411612be3c5e550785b65afcad12d49731dabc38c7c9d7868a633f5e0', 1, 1458312267),
(112, 'mabelprevitera@hotmail.com', 'mabelpre', 'd032fcf8f05df5e1bee6950619f94f96167e57a4d4bb1a6c0a76982ba9f281ea', 1, 1458312128),
(113, 'esteban@yahoo.com.ar', 'nolverto', 'c6daa8204f5393d3f54233ffb72f3b9b7e2c57f81035a9cb48fbd4978b69227f', 1, 1458313932),
(114, 'gaticagabriela@gmail.com', 'gabriela', 'd41deb832694394bfb4f7fdcf3a2a25980e4085eb5cdf7a7fd777b4ddc89acf5', 1, 1458317304),
(115, 'mliliabalasch@yahoo.com.ar', 'marialilia', 'ac1928ca5f925740c319b083d48d812e83162eb737c8250cc3c374a53672d01a', 2, 1458570484),
(116, 'lopezmartosarq@hotmail.com', 'laura', 'de3ca6411acde2e5af7eb956dd41a6bffead404d6f2bf2ae0f1704d915f19671', 2, 1458569532),
(117, 'leonardo@liinenieria.com.ar', 'leopollopel', '023e20a9608f956b85a4a727186411aceb996e1bc947ec8fb818dbf11fb15f91', 1, 1458572670),
(118, 'marianabalacco@gmail.com', 'mariana', '3ea19870bb5ea2b1b3b181326cefea0fe68e6afaea6ee69f151e4033d6b93b6c', 2, 1458574384),
(119, 'danieldiezc@yahoo.com.ar', 'agustin10', '5c3c4bab4ec85db15c30daa6ca52b35576958ba9b204b4b7cea6d8f5f8cd007c', 2, 1458657251),
(120, 'gustavogujardo07@yahoo.com.ar', 'gustavo07', '1cb6f5aae8e5bae1244a519686749bc8ae9b2e8a2595e8fbab20928e871c98f6', 1, 1458659225),
(121, 'hnq_mza@yahoo.com.ar', 'horacioqu', 'c522f6646a9fe76023afb12e5ec74921e114a5512ca91b200dc1d1f464a32fcc', 4, 1458742424),
(122, 'internodiego@hotmail.com', 'internodiego', '9b612b526185ca374079917c8531510602cc6edb24fd939c8dab6865ee73be1d', 1, 1458851647);

-- --------------------------------------------------------

--
-- Table structure for table `uso`
--

CREATE TABLE IF NOT EXISTS `uso` (
  `iduso` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `idusogeneral` bigint(20) NOT NULL,
  PRIMARY KEY (`iduso`),
  KEY `idusogeneral` (`idusogeneral`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `uso`
--

INSERT INTO `uso` (`iduso`, `nombre`, `idusogeneral`) VALUES
(1, 'vivienda unifamiliar', 1),
(2, 'vivienda colectiva', 1),
(3, 'edificio en altura', 1),
(4, 'motel', 1),
(5, 'hoteles de 1 a 5 estrellas', 1),
(6, 'internados', 1),
(7, 'aparthotel', 1),
(8, 'escuela primaria', 2),
(9, 'jardin de infantes / guarderia ', 2),
(10, 'escuelas tecnicas', 2),
(11, 'academias, institutos, escuales esp.', 2),
(12, 'escuela de seguridad', 2),
(13, 'enseñanza universitaria', 2),
(14, 'escuela secundaria', 2),
(15, 'centros de salud (sin internacion)', 3),
(16, 'sala primeros auxilios (10 camas)', 3),
(17, 'clinicas y sanitarios', 3),
(18, 'hospitales y policlinicos', 3),
(19, 'inst. especial de sanidad y serv. Publico', 3),
(20, 'consultorias particulares', 3),
(21, 'Destacamentos y centrales de policia y bomberos', 3),
(22, 'biblioteca', 4),
(23, 'museos de artes', 4),
(24, 'museos especiales', 4),
(25, 'salas exposiciones- auditorios', 4),
(26, 'asociasiones culturales', 4),
(27, 'club deportivo', 5),
(28, 'club social', 5),
(29, 'cines teatro', 5),
(30, 'bailes y cabaret', 5),
(31, 'restaurante y confiterias', 5),
(32, 'circos y parques de diversiones', 5),
(33, 'iglesias', 6),
(34, 'parroquias', 6),
(35, 'capillas', 6),
(37, 'oficinas nacionales', 10),
(38, 'oficinas provinciales', 10),
(40, 'agencias de turismo', 10),
(41, 'oficinas privadas', 10),
(42, 'bancos', 10),
(43, 'instituciones de creditos', 10),
(44, 'asociasion de comercio e industria', 10),
(45, 'oficinas municipales', 10),
(46, 'estaciones de servicios', 7),
(47, 'gomerias', 7),
(48, 'garages colectivos', 7),
(49, 'garages individuales', 7),
(50, 'estacionamiento colectivo', 7),
(51, 'tintorerias', 7),
(53, 'talleres de chaperias', 7),
(54, 'talleres de madera', 7),
(55, 'mayoristas regional y zonal', 8),
(56, 'mayoristas influencia urbana', 8),
(57, 'minoristas', 8),
(58, 'grupo I (nocivas)', 9),
(59, 'grupo II (molestias corregibles)', 9),
(60, 'grupo III (inocuas)', 9),
(61, 'talleres metálicos (sin chaperia)', 7),
(62, 'oficinas especiales', 10),
(63, 'SOLICITAR AUTORIZACION A DIRECCION DE PATRIMONIO Y CULTURA MUNICIPAL', 4),
(64, 'Petit Hotel 3 a 4 estrellas', 1),
(65, 'Apart Hotel 1 a 4 estrellas', 1),
(66, 'Motel 1 a 3 estrellas', 1),
(67, 'Hostería o Posada 1 a 3 estrellas', 1),
(68, ' Cabañas 1 a 4 estrellas', 1),
(69, ' Camping', 1),
(70, 'Campamento 1 a 2 estrellas', 10),
(71, ' Refugio 1 a 2 estrellas', 1),
(72, ' Hospedaje', 1),
(73, 'Hospedaje Rural', 1),
(74, 'Bed & Breakfast', 1),
(75, 'Hostel o Albergue Turístico', 1),
(76, 'PAT: propiedad de alquiler temporario', 1),
(77, 'Para todos los usos', 11),
(78, 'Hipermercado', 8),
(79, 'Hotel Alojamiento', 1),
(80, 'Kiosco de Diarios y Revistas', 8),
(81, 'Tenencia de Animales', 11),
(82, 'Feria Persa', 8),
(83, 'Cria de Animales', 11),
(84, 'Juegos en Red / internet', 8),
(85, 'Piletas de Natacion', 5),
(86, 'Antena                                       ', 7),
(87, 'Galpon de Empaque ', 9),
(88, 'Canchas de Futbol', 5);

-- --------------------------------------------------------

--
-- Table structure for table `usogeneral`
--

CREATE TABLE IF NOT EXISTS `usogeneral` (
  `idusogeneral` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idusogeneral`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `usogeneral`
--

INSERT INTO `usogeneral` (`idusogeneral`, `nombre`) VALUES
(1, 'RESIDENCIAL'),
(2, 'ENSEÑANZA'),
(3, 'ASISTENCIA'),
(4, 'CULTURA'),
(5, 'ESPARCIMIENTO'),
(6, 'CULTO'),
(7, 'SERVICIOS'),
(8, 'COMERCIO'),
(9, 'INDUSTRIA'),
(10, 'OFICINAS'),
(11, 'GENERAL');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `domicilio` varchar(500) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `tipousuario` bigint(20) NOT NULL,
  `idrol` bigint(20) DEFAULT NULL,
  `iduser` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_user` (`iduser`),
  KEY `fk_usuario_rol` (`idrol`),
  KEY `fk_usuario_usuario` (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `domicilio`, `telefono`, `celular`, `email`, `habilitado`, `tipousuario`, `idrol`, `iduser`) VALUES
(1, 'Administrador', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(2, 'Usuario Interno', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(12, 'Diego', 'Bevaqua', 'Laguna', '4393904', '155606293', 'diegobq@hotmail.com', 1, 1, 1, 1),
(14, 'Usuario Externo', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(16, 'Interno', '', '', '', '', '', 1, 1, 2, 4),
(17, 'Usuario Externo', '', '', '', '', '', 1, 1, 14, 5),
(26, 'Atilio Enrique', 'Pulenta', 'T. de Carrizo 105 Rodeo del Medio Maipu Mza', '4951184', '154546174', 'ingatiliopulenta@hotmail.com', 1, 1, 2, 21),
(72, 'Claudio', 'Ortiz', 'II B° Soeva -Loberiaa 1529 godoy Cruz', '', '', 'claudiogustavo80@gmail.com', 1, 1, 14, 65),
(73, 'Oscar', 'Leiva', 'B° Jardin Cristal Mz D C 20 Maipu', '4972449', '', 'leivaezequiel@hotmail.com', 1, 1, 14, 66),
(74, 'Valeria', 'Nerviani', 'Furlotti 327 Maipu', '4816085', '155171296', 'vnerviani@hotmail.com', 1, 1, 14, 67),
(75, 'Diego', 'Rubio', 'Tiburcio Benegas', '4204849', '155575397', 'diego@pgarq.com.ar', 1, 1, 14, 68),
(76, 'Horacio', 'Marin', 'Lago Hermoso 1385 Godoy Cruz', '4393857', '155184104', 'arquitectohml@hotmail.com', 1, 1, 14, 69),
(77, 'Diego', 'Canal', 'B° Solares de Palma Aguaribay 40 Maipu', '', '155191899', 'arquitectocanal@gmail.com', 1, 1, 14, 70),
(78, 'Leandro', 'Torres', '2°Barrio CEC M25 C5 San martin', '02634430488', '02634648542', 'leotorres@gmail.com', 1, 1, 1, 71),
(79, 'Roberto', 'Nuñez', 'M Tm de San Martin 35 Maipu', '4973102', '155940204', 'robertojosenunez@yahoo.com.ar', 1, 1, 14, 72),
(80, 'Andres', 'Salomone', 'Bahia Blanca 3416 B° Supe Godoy Cruz', '4280201', '153820573', 'salaterraarq@gmail.com', 1, 1, 14, 73),
(81, 'Oscar', 'Galdame', 'Cerro Tolosa 1449 Godoy Cruz', '4524740', '156766959', 'gobras.sa@gmail.com', 1, 1, 14, 74),
(82, 'Angel', 'Daz', 'Bahia Blanca 3452 B° Supe Godoy Cruz', '427353', '155062139', 'diazangelf7@hotmail.com.ar', 1, 1, 14, 75),
(83, 'Rocio', 'Jurado', 'Sarmiento 156 F.L.Beltran Maipu', '', '156048466', 'rociojurado22@gmail.com', 1, 1, 14, 76),
(84, 'Daniel', 'Garcia gei', 'Paraguay 1240 dpto 5 Godoy cruz', '2614274417', '2614181102', 'lincura.sa@gmail.com', 1, 1, 14, 77),
(85, 'Felipe', 'Jofre', 'Ferer 98 Km11 guaymallen', '4912184', '153645018', 'martinjofre16@hotmail.com', 1, 1, 14, 78),
(86, 'Carlos', 'Tercero', 'B° Pinares B-16 Maipu', '4973206', '155866560', 'arqcarlostercero@gmail.com', 1, 1, 14, 79),
(87, 'Marcelo', 'Munafo', 'Peru 55 Ciudad Mendoza', '', '155967290', 'ingcivilmunafo@yahoo.com.ar', 1, 1, 1, 80),
(88, 'Roxana del Carmen', 'Mautino', 'B° Haras de Pedriel  C14 A', '', '2615904129', 'arq.mautino', 1, 1, 14, 81),
(89, 'Javier', 'Romo', 'Verdaguer 485 Godoy Cruz', '', '155542098', 'joromo@volsinectis.com.ar', 1, 1, 14, 82),
(90, 'Emilia', 'Pareja', '20 de Junio 148 Maipu', '', '152193248', 'emiliapareja@gmail.com', 1, 1, 14, 83),
(91, 'leonor', 'Sclar', '', '', '155551035', 'leosclar@gmail.com', 1, 1, 14, 84),
(92, 'Carmelo', 'Simo', '', '', '', 'carmelosimo@yahoo.com', 1, 1, 2, 85),
(93, 'LUIS', 'LUCERO', 'B° Beltran Norte M.L.Beltran Maipu', '', '2615100607', 'luceroandina@yahoo.com.ar', 1, 1, 14, 86),
(94, 'Gustavo', 'Contreras', '', '', '', 'gac2007@hotmail.com', 1, 1, 2, 87),
(95, 'Martin', 'Erario', '', '', '2615108552', 'arq.martin.erario@gmail.com', 1, 1, 14, 88),
(96, 'Daniel', 'Varela', 'B° Sute Mz F C 6   Guaymallen', '', '156183591', 'jorgedbarrer@ahotmail.com', 1, 1, 14, 89),
(97, 'Rodolfo', 'Perrone', 'Ozamis 899', '', '156512856', '	rodolfocperrone@yahoo.com.a', 1, 1, 14, 90),
(98, 'Paula', 'Montoza', '', '', '2616929963', 'paula.montoza@gmail.com', 1, 1, 14, 91),
(99, 'Elena', 'Lucero', 'Guiralde 427 Godoy Cruz', '', '155127246', 'arquitetalucer@hotmail.com', 1, 1, 14, 92),
(100, 'Flavia', 'Brugnola', 'Mitre 480 Maipu', '', '155170532', 'fla_mza@hotmail.com', 1, 1, 14, 93),
(101, 'Soledad', 'Olmos', 'Lemmos 47 Maipu', '', '156507732', 'soledad_olmos30@hotmail.com', 1, 1, 14, 94),
(102, 'Antonio', 'Lucas', 'Avelino Maure 1055 Guaymallen', '', '152203252', 'carton@hotmail.com', 1, 1, 14, 95),
(103, 'Francisco', 'Campalans', 'T.Benegas 889 Ciudad', '', '156641752', 'francisco@francampalans.com', 1, 1, 14, 96),
(104, 'Natalia', 'Fares', '', '', '152015872', 'natufares@hotmail.com', 1, 1, 2, 97),
(105, 'Jorge', 'Barrera ', 'Mz F C 6 B° Sute Guaymallen', '', '156183591', 'jorgedbarrera@hotmail.com', 1, 1, 2, 98),
(106, 'Horacio', 'Quiroga', '', '', '2615789104', 'hmq_mza@yahoo.com.ar', 1, 1, 2, 99),
(107, 'Nora', 'Dabul', '', '', '', 'dabusteindarquitectas@yahoo.com.ar', 1, 1, 14, 100),
(108, 'Roberto', 'Maravini', '', '0263154517099', '', 'robertomarabini@yahoo.com.ar', 1, 1, 14, 101),
(109, 'Marilin', 'Michelan', 'ozamis 701 Maipu', '', '2615676807', 'mlmichelan@yahoo.com.ar', 1, 1, 14, 102),
(110, 'Erneesto', 'Lorenzo', 'maza 3135 Gutierrez', '', '2615676807', 'lgviviendas@hotmail.com', 1, 1, 14, 103),
(111, 'Nelson', 'Lopez', 'B° Ant. Arg. L 16 Gutierrez', '', '153643640', 'ingnlopez@yahoo.com.ar', 1, 1, 14, 104),
(112, 'Carola', 'Rago', '', '', '165414304', 'carolarago@hotmail.comr', 1, 1, 14, 105),
(113, 'Rolando', 'Colina', 'Panamericana1599 La Puntilla', '', '156735338', 'corinarolando@speedy.com.ar', 1, 1, 14, 106),
(114, 'Fabio', 'Oriolani', 'chacabuqueo 250 Dpto 19 Godoy Cruz', '', '155388801', 'oriolanifabio@gmail.com', 1, 1, 14, 107),
(115, 'Jose Luis', 'Guzman', 'Zapiola 789 Guaymallen', '', '26153940', 'joseluis_guzman@yahoo.com.ar', 1, 1, 14, 108),
(116, 'Mariano', 'Lubo', 'B° Balbino Mz J C 1° Coquimbito', '', '156115111', 'marianolubo@htmail.com', 1, 1, 14, 109),
(117, 'Rafael', 'Nieva', '', '', '152098266', 'elbagualmza_ar@hotmail.com', 1, 1, 14, 110),
(118, 'Adrian', 'Ledda', 'Bruno Moron 1419 Coquimbito', '', '155638321', 'elbagualmza_ar@hotmail.com', 1, 1, 14, 111),
(119, 'Mabel', 'Previtera', 'Alto Maipu 60 Graaderos y Massi Maipu', '', '154660426', 'mabelprevitera@hotmail.com', 1, 1, 14, 112),
(120, 'Norberto', 'Esteban', 'Montecaseros 675 Godoy Cruz', '', '155384740', 'esteborrs@yahoo.com.ar', 1, 1, 14, 113),
(121, 'Gabriela', 'Gatica', 'Maure 4057 GUAYMALLEN', '', '152401022', 'gaticagabriela@gmail.com', 1, 1, 14, 114),
(122, 'Maria Llia', 'Balasch', ' 565 Of  25 Ciudad', '', '155991776', 'mliliabalasch@yahoo.com.ar', 1, 1, 14, 115),
(123, 'Laura', 'Lopez Martos', 'Ozamis 273 Maipu', '', '261561199', 'lopezmartosarq@hotmail.com', 1, 1, 14, 116),
(124, 'Leonardo', 'Pellegrino', 'B° Virgen del Torreon  Lote I-4', '', '26152274047', 'leonardo@liinenieria.com.ar', 1, 1, 14, 117),
(125, 'Mariana', 'Balacco', '', '15382784', '15382784', 'marianabalacco@gmail.com', 1, 1, 14, 118),
(126, 'Daniel', 'Diez', 'Necochea 1205 San Jose Guaymallen', '', '156521831', 'danieldiezc@yahoo.com.ar', 1, 1, 14, 119),
(127, 'Gustavo', 'Guajardo', 'Pedro Vargas 66 Godoy Cruz', '', '1539909883', 'gustavogujardo07@yahoo.com.ar', 1, 1, 14, 120),
(128, 'Horacio', 'Quiroga', '', '', '2615789104', 'hnq_mza@yahoo.com.ar', 1, 1, 2, 121),
(129, 'internodiego', 'apellido', '', '', '', '', 1, 1, 2, 122);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) DEFAULT NULL,
  `claves` varchar(6) DEFAULT NULL,
  `domicilio` varchar(40) DEFAULT NULL,
  `distrito` varchar(20) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `nombrel` varchar(20) DEFAULT NULL,
  `passwordl` varchar(20) DEFAULT NULL,
  `oficina` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `claves`, `domicilio`, `distrito`, `departamento`, `profesion`, `matricula`, `mail`, `telefono`, `perfil`, `nombrel`, `passwordl`, `oficina`) VALUES
(49, 'Pulenta Atilio E', 'cacho', 't de carrizo 105', 'Rodeo del medio', 'MaipÃº', 'Ing. Civil', '2914', 'ing', NULL, 'ADMINISTRADOR', NULL, NULL, 'jejefatura');

-- --------------------------------------------------------

--
-- Table structure for table `valorindice`
--

CREATE TABLE IF NOT EXISTS `valorindice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vivienda`
--

CREATE TABLE IF NOT EXISTS `vivienda` (
  `idvivienda` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idvivienda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `vivienda`
--

INSERT INTO `vivienda` (`idvivienda`, `nombre`) VALUES
(1, '1 unica viv. x lote o una c/ 1000 m2'),
(2, 'Const. de 70 m2 x lote'),
(3, 'UNA VIVIENDA  C/  200 m2'),
(4, 'Una unica viv. x lote o una c/ 300 m2'),
(5, 'UNA UNICA VIV x LOTE o UNA CADA 750 m2'),
(6, 'Una única vivienda x lote o cada 1000 m2'),
(7, 'Una única vivienda x lote o cada 500 m2'),
(8, 'NO PERMITIDAS'),
(9, 'NO PERMITIDAS'),
(10, 'APLICA ORDENANZA 4900 '),
(11, '1 UNICA VIVIENDA POR LOTE');

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `idzona` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `iddistrito` int(2) NOT NULL,
  PRIMARY KEY (`idzona`),
  KEY `iddistrito` (`iddistrito`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`idzona`, `nombre`, `iddistrito`) VALUES
(1, 'Zona1', 1),
(2, 'Zona2', 1),
(3, 'Zona1', 6),
(4, 'Zona2', 6),
(5, 'Zona1', 9),
(6, 'Zona2', 9),
(7, 'Zona3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zonas`
--

CREATE TABLE IF NOT EXISTS `zonas` (
  `idzonas` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`idzonas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `zonas`
--

INSERT INTO `zonas` (`idzonas`, `nombre`) VALUES
(1, 'Área de Reserva Arqueologica Verde'),
(2, 'Comercial'),
(3, 'Comercial Mixta 1'),
(4, 'Comercial Mixta 1A'),
(5, 'Comercial Mixta 2'),
(6, 'Comercial Mixta 3'),
(7, 'Comercial Mixta II'),
(8, 'Comercial Mixta II (Ortega y Rodeo del Medio)'),
(9, 'Desarrollo de Servicios'),
(10, 'Desarrollo de Servicios - Coquimbito'),
(11, 'Desarrollo de Servicios (Fray Luis Beltrán Norte)'),
(12, 'Desarrollo de Servicios Rurales - Rodeo del Medio'),
(13, 'Especiales Barrios'),
(14, 'Industrial Subzona A'),
(15, 'Industrial Subzona B'),
(16, 'Lecho del Río Mendoza'),
(17, 'Lineal de Servicios Rurales'),
(18, 'Parque Chachingo'),
(19, 'Parque Industrial'),
(20, 'Primera Zona Alcoholera/Res. Urb. de Control Amb. 1'),
(21, 'Productiva Agropecuaria Controlada'),
(22, 'Reserva Industrial'),
(23, 'Reserva Industrial'),
(24, 'Reserva Industrial - Subzona A'),
(25, 'Reserva Parque Costero'),
(26, 'Reserva Residencial Especial I (Alto Maipú con frente a Maza)'),
(27, 'Reserva Residencial Especial I (Sector Norte y Oeste)'),
(29, 'Reserva Residencial Especial II'),
(30, 'Reserva Residencial Especial II (Sector Centro Sur)'),
(31, 'Reserva Urbana de Control Ambiental 1'),
(32, 'Reserva Urbana de Control Ambiental 1'),
(33, 'Reserva Urbana de Control Ambiental 3'),
(34, 'Reserva Urbana Inmediata'),
(36, 'Reserva Urbana Mediata Residencial Especial II'),
(37, 'Reserva Urbana Mediata Residencial Especial III'),
(38, 'Reserva Urbana Parque Metropolitano Sur'),
(39, 'Reserva Urbana Residencial'),
(40, 'Reserva Urbana Residencial Especial 1'),
(41, 'Reserva Urbana Residencial Especial 2'),
(42, 'Reserva Urbana Residencial Especial 4'),
(43, 'Residencial'),
(44, 'Residencial Mixta'),
(45, 'Residencial Mixta (Luzuriaga)'),
(46, 'Rural'),
(47, 'Subzona Industrial C'),
(48, 'Área de Reserva Arqueologica Negra'),
(49, 'Desarrollo de Servicios Rurales'),
(50, 'Reserva Residencial Especial I (Sector SudEste)'),
(51, 'Reserva Residencial Especial II (Sector Centro Norte)'),
(52, 'Reserva Urbana Mediata'),
(53, 'Residencial Luzuriaga');

-- --------------------------------------------------------

--
-- Table structure for table `zonascargadas`
--

CREATE TABLE IF NOT EXISTS `zonascargadas` (
  `idzonascargadas` bigint(20) NOT NULL AUTO_INCREMENT,
  `idnumerozona` bigint(20) NOT NULL,
  `iduso` bigint(20) NOT NULL,
  `idlote` bigint(20) NOT NULL,
  `idaltura` bigint(20) NOT NULL,
  `idancho` bigint(20) NOT NULL,
  `idretiro` bigint(20) NOT NULL,
  `idvivienda` bigint(20) NOT NULL,
  `idgalpon` bigint(20) NOT NULL,
  `idfos` bigint(20) NOT NULL,
  `idfot` bigint(20) NOT NULL,
  `idcumplirordenanza` bigint(20) NOT NULL,
  `idensancheapertura` bigint(20) NOT NULL,
  `idafectacionlimite` bigint(20) NOT NULL,
  `idactividadcompleja` bigint(20) NOT NULL,
  `idiniciarexpediente` bigint(20) NOT NULL,
  `idfuerzamotriz` bigint(20) NOT NULL,
  `idestacionamiento` bigint(20) NOT NULL,
  `idespacioocupar` bigint(20) NOT NULL,
  PRIMARY KEY (`idzonascargadas`),
  KEY `iduso` (`iduso`),
  KEY `idnumerozona` (`idnumerozona`),
  KEY `idlote` (`idlote`),
  KEY `idaltura` (`idaltura`),
  KEY `idancho` (`idancho`),
  KEY `idretiro` (`idretiro`),
  KEY `idvivienda` (`idvivienda`),
  KEY `idgalpon` (`idgalpon`),
  KEY `idfos` (`idfos`),
  KEY `idfot` (`idfot`),
  KEY `cumplir` (`idcumplirordenanza`),
  KEY `ensanche` (`idensancheapertura`),
  KEY `afectacionlimite` (`idafectacionlimite`),
  KEY `actividadcompleja` (`idactividadcompleja`),
  KEY `iniciarexpediente` (`idiniciarexpediente`),
  KEY `fuerzamotriz` (`idfuerzamotriz`),
  KEY `estacionamiento` (`idestacionamiento`),
  KEY `espacioocupar` (`idespacioocupar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `zonascargadas`
--

INSERT INTO `zonascargadas` (`idzonascargadas`, `idnumerozona`, `iduso`, `idlote`, `idaltura`, `idancho`, `idretiro`, `idvivienda`, `idgalpon`, `idfos`, `idfot`, `idcumplirordenanza`, `idensancheapertura`, `idafectacionlimite`, `idactividadcompleja`, `idiniciarexpediente`, `idfuerzamotriz`, `idestacionamiento`, `idespacioocupar`) VALUES
(3, 3, 7, 11, 3, 6, 6, 8, 2, 9, 9, 1, 1, 2, 2, 2, 1, 2, 2),
(5, 5, 7, 12, 4, 8, 6, 10, 2, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 6, 7, 12, 2, 8, 6, 10, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 7, 7, 12, 4, 8, 6, 10, 1, 6, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(8, 8, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(9, 9, 7, 7, 1, 2, 1, 10, 1, 6, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(10, 10, 7, 12, 4, 8, 6, 10, 1, 6, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(11, 11, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(12, 12, 7, 12, 4, 8, 6, 10, 1, 7, 4, 1, 1, 1, 1, 1, 1, 1, 1),
(13, 13, 7, 7, 1, 2, 1, 10, 1, 6, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(14, 14, 7, 12, 4, 8, 6, 10, 1, 7, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(15, 15, 7, 12, 4, 8, 6, 10, 1, 6, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(16, 16, 7, 12, 4, 8, 6, 10, 1, 7, 4, 1, 1, 1, 1, 1, 1, 1, 1),
(17, 17, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(18, 18, 7, 7, 1, 2, 1, 10, 1, 7, 4, 1, 1, 1, 1, 1, 1, 1, 1),
(20, 225, 7, 12, 4, 8, 6, 10, 1, 6, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(21, 20, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(22, 21, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(23, 22, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(24, 23, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(25, 24, 7, 12, 4, 8, 6, 10, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(26, 25, 7, 2, 4, 5, 6, 1, 2, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(27, 26, 7, 2, 4, 5, 6, 1, 1, 7, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(28, 27, 7, 2, 4, 5, 6, 1, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(29, 28, 7, 7, 4, 2, 1, 11, 1, 8, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(30, 28, 7, 7, 4, 2, 1, 11, 1, 8, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(31, 30, 7, 7, 4, 2, 1, 11, 1, 8, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(32, 31, 7, 7, 4, 2, 1, 11, 1, 8, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(33, 55, 69, 10, 4, 1, 1, 1, 2, 10, 8, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zonascargadasuso`
--

CREATE TABLE IF NOT EXISTS `zonascargadasuso` (
  `idzonascargadasuso` bigint(20) NOT NULL AUTO_INCREMENT,
  `idzonascargadas` bigint(20) NOT NULL,
  `iduso` bigint(20) NOT NULL,
  PRIMARY KEY (`idzonascargadasuso`),
  KEY `idzonascargadas` (`idzonascargadas`),
  KEY `iduso` (`iduso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `zonascargadasuso`
--

INSERT INTO `zonascargadasuso` (`idzonascargadasuso`, `idzonascargadas`, `iduso`) VALUES
(1, 6, 7),
(2, 6, 3),
(6, 3, 63),
(9, 5, 5),
(11, 5, 4),
(12, 5, 2),
(13, 5, 1),
(14, 5, 11),
(15, 5, 13),
(16, 5, 12),
(17, 5, 8),
(18, 5, 9),
(19, 5, 15),
(20, 5, 20),
(21, 5, 26),
(22, 5, 22),
(23, 5, 23),
(24, 5, 24),
(25, 5, 25),
(26, 5, 30),
(27, 5, 29),
(28, 5, 27),
(29, 5, 28),
(30, 5, 31),
(31, 5, 31),
(32, 5, 35),
(33, 5, 33),
(34, 5, 34),
(35, 5, 50),
(36, 5, 48),
(37, 5, 49),
(38, 5, 51),
(39, 5, 57),
(40, 5, 60),
(41, 5, 40),
(42, 5, 44),
(43, 5, 42),
(44, 5, 43),
(45, 5, 62),
(46, 5, 45),
(47, 5, 37),
(48, 5, 41),
(49, 5, 38),
(50, 6, 5),
(51, 6, 4),
(52, 6, 2),
(53, 6, 1),
(54, 6, 11),
(55, 6, 13),
(56, 6, 12),
(57, 6, 8),
(58, 6, 9),
(59, 6, 15),
(60, 6, 20),
(61, 6, 26),
(62, 6, 22),
(63, 6, 23),
(64, 6, 24),
(65, 6, 25),
(66, 6, 30),
(67, 6, 29),
(68, 6, 27),
(69, 6, 28),
(70, 6, 31),
(71, 6, 31),
(72, 6, 35),
(73, 6, 33),
(74, 6, 34),
(75, 6, 50),
(76, 6, 48),
(77, 6, 49),
(78, 6, 51),
(79, 6, 57),
(80, 6, 60),
(81, 6, 40),
(82, 6, 44),
(83, 6, 42),
(84, 6, 43),
(85, 6, 62),
(86, 6, 45),
(87, 6, 37),
(88, 6, 41),
(89, 6, 38),
(90, 3, 71);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calle`
--
ALTER TABLE `calle`
  ADD CONSTRAINT `fk_calle_zona` FOREIGN KEY (`idzona`) REFERENCES `zona` (`idzona`);

--
-- Constraints for table `factibilidad`
--
ALTER TABLE `factibilidad`
  ADD CONSTRAINT `fk_fact_altura` FOREIGN KEY (`idaltura`) REFERENCES `altura` (`idaltura`),
  ADD CONSTRAINT `fk_fact_ancho` FOREIGN KEY (`idancho`) REFERENCES `ancho` (`idancho`),
  ADD CONSTRAINT `fk_fact_expediente` FOREIGN KEY (`idexpediente`) REFERENCES `expedientes` (`id`),
  ADD CONSTRAINT `fk_fact_fos` FOREIGN KEY (`idfos`) REFERENCES `fos` (`idfos`),
  ADD CONSTRAINT `fk_fact_fot` FOREIGN KEY (`idfot`) REFERENCES `fot` (`idfot`),
  ADD CONSTRAINT `fk_fact_galpon` FOREIGN KEY (`idgalpon`) REFERENCES `galpon` (`idgalpon`),
  ADD CONSTRAINT `fk_fact_lote` FOREIGN KEY (`idlote`) REFERENCES `lote` (`idlote`),
  ADD CONSTRAINT `fk_fact_nzona` FOREIGN KEY (`idnumerozona`) REFERENCES `numerozona` (`idnumerozona`),
  ADD CONSTRAINT `fk_fact_retiro` FOREIGN KEY (`idretiro`) REFERENCES `retiro` (`idretiro`),
  ADD CONSTRAINT `fk_fact_uso` FOREIGN KEY (`iduso`) REFERENCES `uso` (`iduso`),
  ADD CONSTRAINT `fk_fact_vivienda` FOREIGN KEY (`idvivienda`) REFERENCES `vivienda` (`idvivienda`);

--
-- Constraints for table `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD CONSTRAINT `gremioobs_fk` FOREIGN KEY (`idgremioobs`) REFERENCES `gremioobservacion` (`idgremioobs`),
  ADD CONSTRAINT `inspeccionobra_fk` FOREIGN KEY (`idlistado`) REFERENCES `inspeccionesobra` (`idlistado`),
  ADD CONSTRAINT `nivel_fk` FOREIGN KEY (`idnivel`) REFERENCES `nivel` (`IDNIVEL`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_tipomenu` FOREIGN KEY (`idtipomenu`) REFERENCES `tipomenu` (`idtipomenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_padre_menu` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `numerozona`
--
ALTER TABLE `numerozona`
  ADD CONSTRAINT `fk_numero_zonas` FOREIGN KEY (`idzonas`) REFERENCES `zonas` (`idzonas`);

--
-- Constraints for table `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_permiso_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permiso_rol` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uso`
--
ALTER TABLE `uso`
  ADD CONSTRAINT `fk_usogeneral_uso` FOREIGN KEY (`idusogeneral`) REFERENCES `usogeneral` (`idusogeneral`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_usuario` FOREIGN KEY (`idrol`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_zona_distrito` FOREIGN KEY (`iddistrito`) REFERENCES `distritos` (`iddistrito`);

--
-- Constraints for table `zonascargadas`
--
ALTER TABLE `zonascargadas`
  ADD CONSTRAINT `fk_cargada_altura` FOREIGN KEY (`idaltura`) REFERENCES `altura` (`idaltura`),
  ADD CONSTRAINT `fk_cargada_ancho` FOREIGN KEY (`idancho`) REFERENCES `ancho` (`idancho`),
  ADD CONSTRAINT `fk_cargada_fos` FOREIGN KEY (`idfos`) REFERENCES `fos` (`idfos`),
  ADD CONSTRAINT `fk_cargada_fot` FOREIGN KEY (`idfot`) REFERENCES `fot` (`idfot`),
  ADD CONSTRAINT `fk_cargada_galpon` FOREIGN KEY (`idgalpon`) REFERENCES `galpon` (`idgalpon`),
  ADD CONSTRAINT `fk_cargada_lote` FOREIGN KEY (`idlote`) REFERENCES `lote` (`idlote`),
  ADD CONSTRAINT `fk_cargada_numero` FOREIGN KEY (`idnumerozona`) REFERENCES `numerozona` (`idnumerozona`),
  ADD CONSTRAINT `fk_cargada_retiro` FOREIGN KEY (`idretiro`) REFERENCES `retiro` (`idretiro`),
  ADD CONSTRAINT `fk_cargada_uso` FOREIGN KEY (`iduso`) REFERENCES `uso` (`iduso`),
  ADD CONSTRAINT `fk_cargada_vivienda` FOREIGN KEY (`idvivienda`) REFERENCES `vivienda` (`idvivienda`);

--
-- Constraints for table `zonascargadasuso`
--
ALTER TABLE `zonascargadasuso`
  ADD CONSTRAINT `fk_zcu_uso` FOREIGN KEY (`iduso`) REFERENCES `uso` (`iduso`),
  ADD CONSTRAINT `fk_zcu_zonascargadas` FOREIGN KEY (`idzonascargadas`) REFERENCES `zonascargadas` (`idzonascargadas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
