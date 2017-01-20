-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 01:51 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ssa17`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `broj_telefona` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tip_admina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_tip_admina1_idx` (`tip_admina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fakultet`
--

CREATE TABLE IF NOT EXISTS `fakultet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) DEFAULT NULL,
  `univerzitet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakultet_univerzitet1_idx` (`univerzitet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `fakultet`
--

INSERT INTO `fakultet` (`id`, `naziv`, `univerzitet_id`) VALUES
(1, 'Elektrotehnički fakultet', 1),
(2, 'Ekonomski fakultet', 1),
(23, 'Arhitektonski fakultet', 1),
(24, 'Građevinski fakultet', 1),
(25, 'Mašinski fakultet', 1),
(26, 'Poljoprivredno-prehrambeni fakultet', 1),
(27, 'Prirodno-matematički fakultet', 1),
(28, 'Fakultet za saobraćaj i komunikacije', 1),
(29, 'International University of Sarajevo', 2),
(30, 'Sarajevo School of Science and Technology', 3),
(31, 'International Burch University', 4),
(32, 'Veterinarski fakultet', 1),
(33, 'Fakultet za kriminalistiku, kriminologiju i sigurnosne studije', 1),
(35, 'Pravni fakultet', 1),
(36, 'Akademija scenskih umjetnosti', 1),
(37, 'Akademija likovnih umjetnosti', 1),
(38, 'Medicinski fakultet', 1),
(39, 'Fakultet zdravstvenih studija', 1),
(40, 'Fakultet sporta i tjelesnog odgoja', 1),
(41, 'Muzička akademija', 1),
(42, 'Pedagoški fakultet', 1),
(43, 'American University in BiH', 5),
(44, 'Fakultet za upravu', 1),
(45, 'Fakultet islamskih nauka', 1),
(46, 'Katolički bogoslovni fakultet', 1),
(47, 'Farmaceutski fakultet', 1),
(48, 'Filozofski fakultet', 1),
(51, 'Fakultet političkih nauka', 1),
(52, 'Šumarski fakultet', 1),
(53, 'Stomatološki fakultet sa klinikama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jezik`
--

CREATE TABLE IF NOT EXISTS `jezik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jezik`
--

INSERT INTO `jezik` (`id`, `naziv`) VALUES
(1, 'Engleski jezik');

-- --------------------------------------------------------

--
-- Table structure for table `kakostesaznali`
--

CREATE TABLE IF NOT EXISTS `kakostesaznali` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kakostesaznali`
--

INSERT INTO `kakostesaznali` (`id`, `naziv`) VALUES
(1, 'Promocija na fakultetu'),
(2, 'Društvene mreže'),
(3, 'Mediji'),
(4, 'Web stranica'),
(5, 'Preporuka prijatelja'),
(6, 'Promotivni leci i plakati'),
(7, 'Ništa od navedenog');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE IF NOT EXISTS `novost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(45) DEFAULT NULL,
  `opis` text,
  `tekst` text,
  `datum_objave` datetime DEFAULT NULL,
  `slika` mediumtext,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_novost_admin1_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `broj_telefona` varchar(45) DEFAULT NULL,
  `datum_rodjenja` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `velicina_majice` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `participant_has_fakultet`
--

CREATE TABLE IF NOT EXISTS `participant_has_fakultet` (
  `participant_id` int(11) NOT NULL,
  `fakultet_id` int(11) NOT NULL,
  `odsjek` varchar(45) DEFAULT NULL,
  `godina_studija` int(11) DEFAULT NULL,
  PRIMARY KEY (`participant_id`,`fakultet_id`),
  KEY `fk_participant_has_fakultet_fakultet1_idx` (`fakultet_id`),
  KEY `fk_participant_has_fakultet_participant1_idx` (`participant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participant_has_jezik`
--

CREATE TABLE IF NOT EXISTS `participant_has_jezik` (
  `participant_id` int(11) NOT NULL,
  `jezik_id` int(11) NOT NULL,
  `razumijevanje` int(11) DEFAULT NULL,
  `govor` int(11) DEFAULT NULL,
  PRIMARY KEY (`participant_id`,`jezik_id`),
  KEY `fk_participant_has_jezik_jezik1_idx` (`jezik_id`),
  KEY `fk_participant_has_jezik_participant1_idx` (`participant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE IF NOT EXISTS `prijava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivaciono_pismo` text,
  `ss_iskustvo` text,
  `seminari_iskustvo` text,
  `nvo_iskustvo` text,
  `napomene` text,
  `ranije_ucesce` tinyint(1) DEFAULT NULL,
  `radno_iskustvo` text,
  `participant_id` int(11) NOT NULL,
  `trenutno_zaposlenje` tinyint(4) NOT NULL,
  `kako_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prijava_participant1_idx` (`participant_id`),
  KEY `fk_kako` (`kako_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tip_admina`
--

CREATE TABLE IF NOT EXISTS `tip_admina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pozicija` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univerzitet`
--

CREATE TABLE IF NOT EXISTS `univerzitet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `univerzitet`
--

INSERT INTO `univerzitet` (`id`, `naziv`) VALUES
(1, 'Univerzitet u Sarajevu'),
(2, 'Internacionalni univerzitet u Sarajevu'),
(3, 'Sarajevo School of Science and Technology'),
(4, 'International Burch University Sarajevo'),
(5, 'American University in BiH');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_tip_admina1` FOREIGN KEY (`tip_admina_id`) REFERENCES `tip_admina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fakultet`
--
ALTER TABLE `fakultet`
  ADD CONSTRAINT `fk_fakultet_univerzitet1` FOREIGN KEY (`univerzitet_id`) REFERENCES `univerzitet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `novost`
--
ALTER TABLE `novost`
  ADD CONSTRAINT `fk_novost_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participant_has_fakultet`
--
ALTER TABLE `participant_has_fakultet`
  ADD CONSTRAINT `fk_participant_has_fakultet_fakultet1` FOREIGN KEY (`fakultet_id`) REFERENCES `fakultet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participant_has_fakultet_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participant_has_jezik`
--
ALTER TABLE `participant_has_jezik`
  ADD CONSTRAINT `fk_participant_has_jezik_jezik1` FOREIGN KEY (`jezik_id`) REFERENCES `jezik` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participant_has_jezik_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prijava`
--
ALTER TABLE `prijava`
  ADD CONSTRAINT `fk_prijava_kako` FOREIGN KEY (`kako_id`) REFERENCES `kakostesaznali` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prijava_participant1` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
