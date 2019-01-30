-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Janvier 2019 à 00:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ccis_pvr`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDPVR` int(11) DEFAULT NULL,
  `SRC` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pvr`
--

CREATE TABLE IF NOT EXISTS `pvr` (
  `ID` int(11) NOT NULL,
  `OBJET` varchar(120) COLLATE utf8_bin NOT NULL,
  `DATE` date NOT NULL,
  `HEURE` varchar(120) COLLATE utf8_bin NOT NULL,
  `LIEU` varchar(120) COLLATE utf8_bin NOT NULL,
  `DEPARTEMENT` varchar(120) COLLATE utf8_bin NOT NULL,
  `SERVICE` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `ChargeSuivi` varchar(120) COLLATE utf8_bin NOT NULL,
  `SCAN` varchar(200) COLLATE utf8_bin NOT NULL,
  `IDEVENEMENT` int(120) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
