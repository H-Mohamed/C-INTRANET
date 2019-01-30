-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2018 at 12:35 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccis_bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibliotheque_document`
--

DROP TABLE IF EXISTS `bibliotheque_document`;
CREATE TABLE IF NOT EXISTS `bibliotheque_document` (
  `IDDOC` int(11) NOT NULL,
  `TYPE` varchar(120) NOT NULL,
  `SOUS_THEME` varchar(120) NOT NULL,
  `NOMDOC` varchar(300) NOT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `CHEMIN` varchar(1200) NOT NULL,
  `KEYWORDS` text,
  `DATEAJOUT` date NOT NULL,
  `Image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IDDOC`),
  KEY `FK_THEME_DOC` (`SOUS_THEME`),
  KEY `FK_TYPE_DOC` (`TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotheque_document`
--

INSERT INTO `bibliotheque_document` (`IDDOC`, `TYPE`, `SOUS_THEME`, `NOMDOC`, `Description`, `CHEMIN`, `KEYWORDS`, `DATEAJOUT`, `Image`) VALUES
(1, 'type1', 'sous_theme1', 'doc1', NULL, '/doc/uuuuu.doc', '', '2018-04-12', 'img/labelQ.png'),
(2, 'type1', 'sous_theme1', 'doc2', NULL, '/doc/uuuuu2.doc', '', '2018-04-12', 'img/labelQ.png'),
(3, 'type1', 'sous_theme1', 'doc3', 'iiiiiiiiiiiiiiiiiiiii', '/doc/uuuuu3.doc', '', '2018-04-12', 'img/labelQ.png'),
(4, 'type1', 'sous_theme1', 'doc4', NULL, '/doc/uuuuu4.doc', '', '2018-04-12', 'img/labelQ.png'),
(5, 'type1', 'sous_theme1', 'doc5', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '/doc/uuuuu5.doc', '', '2018-04-12', 'img/labelQ.png'),
(6, 'type1', 'sous_theme1', 'doc6', 'ggggggggggggggggg', '/doc/uuuuu6.doc', '', '2018-04-12', 'img/souss.jpg'),
(7, 'type1', 'sous_theme1', 'doc7', 'ppppppppppppppppppp', '/doc/uuuuu7.doc', '', '2018-04-12', 'img/statistique.png'),
(8, 'type1', 'sous_theme1', 'doc8', 'hhhhhhhhhhhhhhhhhhhh', '/doc/uuuuu8.doc', '', '2018-04-12', 'img/ff.jpg'),
(9, 'type1', 'sous_theme1', 'Le label qualité', '                                   Le label qualité du commerce des produits artisanaux signale et garantie aux consommateurs un niveau de savoir-faire élDOCé des ...                                                                                   \r\n                                       ', 'img/labelQ.png', '', '2018-04-12', 'img/labelQ.png'),
(10, 'type1', 'sous_theme1', 'doc10', 'hsdsdffdffdgdg', '/doc/uuuuu.doc', '', '2018-04-12', 'img/labelQ.png'),
(11, 'type1', 'sous_theme1', 'doc11', 'opoppompioimoilliuilliu', '/doc/uuuuu2.doc', '', '2018-04-12', 'img/labelQ.png'),
(12, 'type1', 'sous_theme1', 'doc12', 'iiiiiiiiiiiiiiiiiiiii', '/doc/uuuuu3.doc', '', '2018-04-12', 'img/labelQ.png'),
(13, 'type1', 'sous_theme1', 'doc13', 'azazzeaeazrfssd', '/doc/uuuuu4.doc', '', '2018-04-12', 'img/labelQ.png');

-- --------------------------------------------------------

--
-- Table structure for table `bibliotheque_sous_theme`
--

DROP TABLE IF EXISTS `bibliotheque_sous_theme`;
CREATE TABLE IF NOT EXISTS `bibliotheque_sous_theme` (
  `SOUS_THEME` varchar(120) NOT NULL,
  `THEME` varchar(120) NOT NULL,
  PRIMARY KEY (`SOUS_THEME`),
  KEY `FK_R_THEME_SOUSTHEME` (`THEME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotheque_sous_theme`
--

INSERT INTO `bibliotheque_sous_theme` (`SOUS_THEME`, `THEME`) VALUES
('sous_theme1', 'theme1'),
('sous_theme2', 'theme1'),
('sous_theme3', 'theme1'),
('2sous_theme1', 'theme2');

-- --------------------------------------------------------

--
-- Table structure for table `bibliotheque_theme`
--

DROP TABLE IF EXISTS `bibliotheque_theme`;
CREATE TABLE IF NOT EXISTS `bibliotheque_theme` (
  `THEME` varchar(120) NOT NULL,
  PRIMARY KEY (`THEME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotheque_theme`
--

INSERT INTO `bibliotheque_theme` (`THEME`) VALUES
('theme1'),
('theme2'),
('theme3'),
('theme4'),
('theme5'),
('theme6'),
('theme7');

-- --------------------------------------------------------

--
-- Table structure for table `bibliotheque_type`
--

DROP TABLE IF EXISTS `bibliotheque_type`;
CREATE TABLE IF NOT EXISTS `bibliotheque_type` (
  `TYPE` varchar(120) NOT NULL,
  PRIMARY KEY (`TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotheque_type`
--

INSERT INTO `bibliotheque_type` (`TYPE`) VALUES
('type1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bibliotheque_document`
--
ALTER TABLE `bibliotheque_document`
  ADD CONSTRAINT `FK_Sous_THEME_DOC` FOREIGN KEY (`SOUS_THEME`) REFERENCES `bibliotheque_sous_theme` (`SOUS_THEME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TYPE_DOC` FOREIGN KEY (`TYPE`) REFERENCES `bibliotheque_type` (`TYPE`);

--
-- Constraints for table `bibliotheque_sous_theme`
--
ALTER TABLE `bibliotheque_sous_theme`
  ADD CONSTRAINT `FK_R_THEME_SOUSTHEME` FOREIGN KEY (`THEME`) REFERENCES `bibliotheque_theme` (`THEME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
