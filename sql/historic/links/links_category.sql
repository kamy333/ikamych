-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: mysql.ikamy.ch
-- Generation Time: Nov 08, 2015 at 02:39 PM
-- Server version: 5.5.37-log
-- PHP Version: 5.5.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ikamych1`
--

-- --------------------------------------------------------

--
-- Table structure for table `links_category`
--

DROP TABLE IF EXISTS `links_category`;
CREATE TABLE IF NOT EXISTS `links_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `rank` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `links_category`
--

INSERT INTO `links_category` (`id`, `category`, `rank`) VALUES
(1, 'Others', 0),
(2, 'PHP', 0),
(3, 'SQL', 0),
(4, 'JQuery', 0),
(5, 'HTML', 0),
(6, 'Bootstrap', 0),
(7, 'Israel', 0),
(8, 'Antisémitisme', 0),
(9, 'Handicap', 0),
(11, 'Programming', 0),
(12, 'MVC Framework', 0),
(13, 'Ruby', 0),
(14, 'SQLServer', 0),
(15, 'Visual Studio', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
