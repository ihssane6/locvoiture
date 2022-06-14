-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2022 at 01:13 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locationvoiture`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `voiture_id` int(10) UNSIGNED NOT NULL,
  `utilisateur_id` int(10) UNSIGNED NOT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `actionDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `voiture_id` (`voiture_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `voiture_id`, `utilisateur_id`, `fromDate`, `toDate`, `actionDate`) VALUES
(1, 2, 2, '2021-11-05', '2021-11-08', '2021-11-04 10:50:56'),
(2, 3, 3, '2021-11-05', '2021-11-10', '2021-11-04 10:52:43'),
(3, 3, 4, '2021-11-15', '2021-11-19', '2021-11-06 19:03:02'),
(4, 1, 8, '2021-11-20', '2021-11-30', '2021-11-06 20:01:45'),
(7, 4, 9, '2021-11-16', '2021-11-21', '2021-11-15 19:39:03'),
(8, 5, 10, '2021-11-18', '2021-11-22', '2021-11-15 19:42:36'),
(9, 4, 2, '2021-11-24', '2021-11-26', '2021-11-15 20:02:20'),
(11, 17, 12, '2022-01-13', '2022-01-19', '2022-01-09 18:23:51'),
(12, 6, 15, '2022-01-13', '2022-01-22', '2022-01-10 13:23:49'),
(13, 2, 15, '2022-01-27', '2022-01-29', '2022-01-10 13:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `utilisateurEmail` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `cDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `utilisateurEmail`, `message`, `cDate`) VALUES
(22, 'KGFSDFGHJK@gmail.com', 'jlk', '2022-01-08 20:48:50'),
(23, 'KGFSDFGHJK@gmail.com', 'hjkl', '2022-01-10 11:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `perm_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `perm_desc`) VALUES
(1, 'Admin options');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_nom` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_nom`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `perm_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `perm_id` (`perm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `perm_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numTel` varchar(100) NOT NULL,
  `permis` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `email`, `numTel`, `permis`, `cin`, `adresse`, `motdepasse`) VALUES
(11, 'Ait', 'ihssane', 'ihssane.aitidir@gmail.com', '0663291888', 'jsdc', 'jwx', 'jsc', '$2y$10$p1tZy7yWGNSA2ZpRnGQNRezigu7hrOIU0P22LFQt5ESn9OasYYrY2'),
(12, 'hk', 'kk', 'aa@gmail.com', '0663291888', 'hf734994', 'JF8303347', 'jjokok', '$2y$10$rcMPuGikg/W3sTwdfKvawupXQCxAA0HAqVb.ZwFa.vKlO.ZqnfzRW'),
(15, 'ahmed', 'rami', 'rami.ahmed@gmail.com', '08656788', 'hf734994', 'JF8303347', 'oko', '$2y$10$6JxRbdhHaAoBwJ0buS9YDOWjjhdUIDS8n0EK2BDxZ1IPVTOZWvqtW'),
(16, 'ahmed', 'hj', 'hssj@gmail.com', '0663291888', 'CCJSDF', '32328', 'oko', '$2y$10$wYVMwhADFHmufA3A.VLwV.jtK0OAToNVYLTIX38WB0oS4cA6bbnXW');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_roles`
--

DROP TABLE IF EXISTS `utilisateur_roles`;
CREATE TABLE IF NOT EXISTS `utilisateur_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `utilisateur_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur_roles`
--

INSERT INTO `utilisateur_roles` (`id`, `role_id`, `utilisateur_id`) VALUES
(1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marque` varchar(100) DEFAULT NULL,
  `nomV` varchar(100) DEFAULT NULL,
  `annee` varchar(6) DEFAULT NULL,
  `moteur` varchar(20) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `clim` varchar(5) DEFAULT NULL,
  `airbag` varchar(5) DEFAULT NULL,
  `carburant` varchar(50) DEFAULT NULL,
  `boitevitesse` varchar(11) DEFAULT NULL,
  `puissance` varchar(5) DEFAULT NULL,
  `info` text,
  `image1` varchar(200) DEFAULT NULL,
  `image2` varchar(200) DEFAULT NULL,
  `image3` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `nomV`, `annee`, `moteur`, `prix`, `capacite`, `clim`, `airbag`, `carburant`, `boitevitesse`, `puissance`, `info`, `image1`, `image2`, `image3`) VALUES
(1, 'Audi', 'R8', '2020', 'V10 5,2L atmo', 1600, 2, 'oui', 'oui', 'Essence', 'Automatique', '540 c', 'nous y trouvons des sieges sport en cuir ', 'audir8front.jpeg', 'audir8back.jpeg', 'audir8inside.jpeg'),
(2, 'Audi', 'RS6', '2019', 'En V, Biturbo, 32 S', 1800, 5, 'oui', 'oui', 'Essence', 'Automatique', '600 c', '', 'audirs6.jpeg', 'audirs6back.jpeg', 'audirs6interior.jpeg'),
(3, 'Mercedes', 'CLASSE G ', '2021', 'V', 2000, 5, 'oui', 'oui', 'diesel', 'Automatique', '540 n', '', 'classG.jpeg', 'classgback.jpeg', 'classginterior.jpeg'),
(4, 'Volkswagen', 'golf8', '2020', '11 CV', 1700, 5, 'oui', 'oui', 'diesel', 'Automatique', '115 c', '', 'golf8.jpeg', 'golf8back.jpeg', 'golf8interior.jpeg'),
(5, 'Lamborghini', 'aventador', '2021', 'V12 inj. directe', 2500, 2, 'oui', 'oui', 'Essence', 'Automatique', '740 c', '', 'lamboave.jpeg', 'lamboaveback.jpeg', 'lamboaveinterior.jpeg'),
(6, 'lamborghini', 'urus matte orange', '2021', 'V8 biturbo', 3000, 5, 'oui', 'oui', 'Essence', 'Automatique', '650 C', '', 'lambourus.jpeg', 'lambourusback.jpeg', 'lamborusuinterior.jpeg'),
(17, 'Nissan', 'GT-R', '2020', '1,5', 2000, 5, 'oui', 'oui', 'Essence', 'AUTO', '133', '', 'nissgtr.jpeg', 'nissgtrback.jpeg', 'nissgtrinterior.jpeg'),
(18, 'Land rover', 'Range Sport SVR', '2021', 'V8 Superchared', 2500, 5, 'oui', 'oui', 'Essence', 'AUTO', '575 c', '', 'rangesvr.jpeg', 'rangesvrback.png', 'rangesvrinterior.jpeg'),
(19, 'Mercedes', 'GLE', '2020', '330 ch', 2800, 5, 'oui', 'oui', 'Essence', 'AUTO', '575 c', '', 'mergle.jpeg', 'mergleback.jpg', 'mergleinterior.jpg'),
(33, 'jjdsd', 'dsqd', '2000', '1,5', 200, 5, 'oui', 'oui', 'Essence', 'AUTO', '133', '', 'mclareninterior.jpeg', '', ''),
(38, 'Mercedes', 'dsqd', '2000', 'dsd', 2456, 100, 'oui', 'oui', 'Essence', 'AUTO', '575 c', '', 'audir8back.jpeg', 'audir8front.jpeg', 'classginterior.jpeg'),
(39, 'jjdsd', 'dsqd', '2000', '1,5', 2456, 100, 'oui', 'oui', 'Essence', 'AUTO', '575 c', '', NULL, NULL, NULL),
(40, 'jjdsd', 'dsqd', '2000', '1,5', 2456, 100, 'oui', 'oui', 'Essence', 'AUTO', '575 c', '', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
