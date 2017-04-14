-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: mysql.ikamy.ch
-- Generation Time: Oct 21, 2016 at 05:27 AM
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
-- Table structure for table `blacklist_ip`
--

CREATE TABLE IF NOT EXISTS `blacklist_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `login_failed` int(11) NOT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blacklist_ip`
--

INSERT INTO `blacklist_ip` (`id`, `ip`, `login_failed`, `input_date`) VALUES
(4, '83.78.95.42', 1, '2016-02-07 10:02:11'),
(5, '212.126.103.3', 1, '2016-03-15 21:33:48'),
(6, '160.176.142.249', 2, '2016-03-27 17:17:04'),
(7, '62.203.13.182', 4, '2016-04-02 21:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(90) NOT NULL,
  `category_1_id` int(11) NOT NULL,
  `category_1` varchar(40) DEFAULT NULL,
  `category_2_id` int(11) NOT NULL,
  `category_2` varchar(40) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT '0.00',
  `company_unit_price` decimal(10,2) DEFAULT '0.00',
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`),
  KEY `category_1_id` (`category_1_id`),
  KEY `category_2_id` (`category_2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `category_1_id`, `category_1`, `category_2_id`, `category_2`, `unit_price`, `company_unit_price`, `comment`) VALUES
(4, 'Production../.. Dancer', 4, 'Production', 4, 'Dancer', '45.00', '0.00', ''),
(5, 'Post-production../.. Premises', 6, 'Post-production', 9, 'Premises', '1500.00', '0.00', ''),
(6, 'Pre-production../.. Insurance', 5, 'Pre-production', 12, 'Insurance', '720.00', '0.00', ''),
(7, 'Pre-production../.. Crew', 5, 'Pre-production', 7, 'Crew', '450.00', '300.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `category_1`
--

CREATE TABLE IF NOT EXISTS `category_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_1` varchar(40) NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_1` (`category_1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category_1`
--

INSERT INTO `category_1` (`id`, `category_1`, `comment`) VALUES
(4, 'Production', ''),
(5, 'Pre-production', ''),
(6, 'Post-production', '');

-- --------------------------------------------------------

--
-- Table structure for table `category_2`
--

CREATE TABLE IF NOT EXISTS `category_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_2` varchar(40) NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_2` (`category_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category_2`
--

INSERT INTO `category_2` (`id`, `category_2`, `comment`) VALUES
(4, 'Dancer', ''),
(6, 'Renting', ''),
(7, 'Crew', ''),
(8, 'Rental material', ''),
(9, 'Premises', ''),
(10, 'Hotel', ''),
(11, 'car rental', ''),
(12, 'Insurance', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `to_user_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `chat_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `to_user_id`, `message`, `date`) VALUES
(1, 20, '1', 'hi from gva', '2016-04-21 23:43:14'),
(2, 1, '20', 'new test the feature', '2016-04-23 12:58:33'),
(3, 20, '20', 'i''m testing my new mesaages from people i want to know', '2016-04-23 14:30:17'),
(4, 20, NULL, 'hi from gva', '2016-04-23 15:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `restricted_list` tinyint(1) NOT NULL DEFAULT '0',
  `company_name` varchar(50) DEFAULT '',
  `web_view` varchar(50) DEFAULT '',
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT '',
  `website` text,
  `address` varchar(50) DEFAULT '',
  `cp` varchar(50) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `country` varchar(50) DEFAULT '',
  `phone` varchar(50) DEFAULT '',
  `mobile` varchar(50) DEFAULT '',
  `comment` text,
  `liste_rank` int(11) DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `pseudo_2` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `restricted_list`, `company_name`, `web_view`, `last_name`, `first_name`, `email`, `website`, `address`, `cp`, `city`, `country`, `phone`, `mobile`, `comment`, `liste_rank`, `input_date`) VALUES
(4, 'COLLINE', 1, '', 'COLLINE', 'COLLINE', '', NULL, NULL, NULL, NULL, 'Gen', 'Suisse', NULL, NULL, NULL, 1, '2015-09-25 09:49:22'),
(5, 'AUTRES', 1, '', 'AUTRES', 'AUTRES', '', NULL, NULL, NULL, NULL, 'Gen', 'Suisse', NULL, NULL, NULL, 1, '2015-09-25 09:49:22'),
(6, 'Tour_Patient', 1, '', 'Tour Patient', 'comptabilit', 'Service', NULL, NULL, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 2, '2015-09-25 09:49:22'),
(7, 'Tour_Sang', 0, '', 'Tour Sang', 'comptabilit', 'Service', NULL, NULL, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 3, '2015-09-25 09:49:22'),
(8, 'Carouge_Sang', 0, '', 'Carouge Sang', 'comptabilit', 'Service', NULL, NULL, 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 4, '2015-09-25 09:49:22'),
(33, 'BENOIST_FILLE', 0, '', 'BENOIST St', 'BENOIST', 'St', NULL, NULL, 'C', '1231', 'Conches', 'Suisse', NULL, NULL, NULL, 200, '2015-09-25 09:49:22'),
(34, 'BERNASCONI', 0, '', 'BERNASCONI Alexandre', 'BERNASCONI', 'Alexandre', NULL, NULL, 'Chemin des Cr', '1218', 'le Grand-Saconnex', 'Suisse', NULL, NULL, NULL, 200, '2015-09-25 09:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(3) DEFAULT NULL,
  `currency_country` varchar(50) DEFAULT NULL,
  `rate` decimal(10,5) DEFAULT NULL,
  `date` date NOT NULL,
  `rank` int(11) unsigned DEFAULT '1',
  `comment` text,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`, `currency_country`, `rate`, `date`, `rank`, `comment`, `input_date`) VALUES
(1, 'USD', 'US', '0.98000', '2016-04-03', 1, '<p><strong>enjoy This contry is great</strong></p>', '2016-04-02 23:38:56'),
(2, 'CHF', 'CH', '1.00000', '2016-04-19', 1, '', '2016-04-19 21:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE IF NOT EXISTS `failed_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `login_attempt` int(11) NOT NULL,
  `last_time` int(11) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `host` varchar(80) DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `failed_logins`
--

INSERT INTO `failed_logins` (`id`, `username`, `login_attempt`, `last_time`, `ip`, `host`, `input_date`) VALUES
(4, 'kamy', 0, 1461423099, '62.203.13.182', '', '2015-10-13 07:28:31'),
(5, 'EMAIL', 1, 1454839331, '83.78.95.42', '', '2016-02-07 10:02:11'),
(6, '''''=''''or''', 1, 1458077628, '212.126.103.3', '', '2016-03-15 21:33:48'),
(7, 'ADMIN'' OR 1=1#', 1, 1459099024, '160.176.142.249', '', '2016-03-27 17:17:04'),
(8, '''or''''=''', 1, 1459099076, '160.176.142.249', '', '2016-03-27 17:17:56'),
(9, 'gmail', 0, 1459632614, '62.203.13.182', '', '2016-04-02 21:30:14'),
(10, 'admin', 0, 1460711770, '95.211.185.41', '', '2016-04-02 21:31:02'),
(11, 'test.sql', 1, 1460301654, '62.203.13.182', '', '2016-04-10 15:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_actual`
--

CREATE TABLE IF NOT EXISTS `invoice_actual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `project_code` varchar(10) DEFAULT '',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `company_unit_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `category_id` int(11) NOT NULL,
  `category` varchar(40) DEFAULT NULL,
  `ref_upload` varchar(70) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoiced` tinyint(1) DEFAULT '0',
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoice_actual`
--

INSERT INTO `invoice_actual` (`id`, `project_id`, `project_code`, `start_date`, `end_date`, `quantity`, `unit_price`, `company_unit_price`, `category_id`, `category`, `ref_upload`, `invoice_id`, `invoiced`, `comment`) VALUES
(4, 4, 'RAJAH', '2015-10-07', '2015-10-13', 1, '62.00', '99.00', 5, 'Post-production../.. Premises', '', 0, 0, ''),
(7, 5, 'KAMY', '2015-01-01', '2015-10-30', 6, '0.00', '0.00', 6, 'Pre-production../.. Insurance', '', 0, 0, ''),
(8, 5, 'KAMY', '2015-10-19', '2015-10-19', 1, '0.00', '0.00', 7, 'Pre-production../.. Crew', '', 0, 0, ''),
(9, 5, 'KAMY', '2015-10-19', '2015-10-19', 8, '450.00', '888.00', 7, 'Pre-production../.. Crew', '', 0, 0, ''),
(10, 5, 'KAMY', '2015-11-11', '2015-11-11', 1, '300.00', '200.00', 5, 'Post-production../.. Premises', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_estimate`
--

CREATE TABLE IF NOT EXISTS `invoice_estimate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estimate_no` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `project_code` varchar(10) DEFAULT '',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(40) DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoiced` tinyint(1) DEFAULT '0',
  `ref_upload` varchar(70) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_send`
--

CREATE TABLE IF NOT EXISTS `invoice_send` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `project_code` varchar(10) DEFAULT '',
  `invoice_date` date NOT NULL,
  `gross_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `canceled` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` enum('prepared','send','paid','partially_paid') DEFAULT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1002 ;

--
-- Dumping data for table `invoice_send`
--

INSERT INTO `invoice_send` (`id`, `project_id`, `project_code`, `invoice_date`, `gross_amount`, `vat`, `amount`, `canceled`, `status`, `payment_date`) VALUES
(1001, 5, 'KAMY', '2016-04-04', '1.00', '8.00', '999.00', 'No', 'prepared', '2016-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `web_address` text,
  `description` text,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `category` varchar(50) NOT NULL DEFAULT 'Others',
  `sub_category_1` varchar(50) DEFAULT NULL,
  `sub_category_2` varchar(50) DEFAULT NULL,
  `privacy` tinyint(1) DEFAULT '0',
  `rank` int(11) DEFAULT '0',
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `web_address`, `description`, `category_id`, `category`, `sub_category_1`, `sub_category_2`, `privacy`, `rank`, `username`) VALUES
(4, 'Facebook', 'https://www.facebook.com/', '', 1, 'Others', '', '', 0, 127, 'kamy'),
(5, 'Lotto Suisse', 'https://jeux.loro.ch/FR/1/homepage?cid=ppc/fr/google/Loro/Adwords//tous/juin2012#action=play', '', 1, 'Others', '', '', 0, 127, 'kamy'),
(6, 'Linkedin', 'https://www.linkedin.com/nhome/', '', 1, 'Others', '', '', 0, 127, 'kamy'),
(7, 'Introducing-PHP', 'http://www.lynda.com/PHP-tutorials/Introducing-PHP/123485-2.html', '', 2, 'PHP', '', '', 0, 1, 'kamy'),
(8, 'PHP-MySQL-Essential-Training Kevin Skoglund', 'http://www.lynda.com/MySQL-tutorials/PHP-MySQL-Essential-Training/119003-2.html', '', 2, 'PHP', '', '', 0, 2, 'kamy'),
(9, 'php-with-OOP-beyond-the-basics Kevin Skoglund', 'http://www.lynda.com/PHP-tutorials/php-with-OOP-beyond-the-basics/653-2.html', '', 2, 'PHP', '', '', 0, 3, 'kamy'),
(10, 'PHP Date Time', 'http://www.lynda.com/PHP-tutorials/Setting-date-time-independently/188214/375112-4.html', '', 2, 'PHP', '', '', 0, 5, 'kamy'),
(11, 'Exporting Data to Files with PHP', 'http://www.lynda.com/PHP-tutorials/Exporting-Data-Files-PHP/158375-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 2, 'PHP', '', '', 0, 5, 'kamy'),
(12, 'Uploading Files Securely with PHP', 'http://www.lynda.com/PHP-tutorials/Uploading-Files-Securely-PHP/158374-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 2, 'PHP', '', '', 0, 127, 'kamy'),
(13, 'Up and Running with PHP SimpleXML David Powers', 'http://www.lynda.com/PHP-tutorials/Up-Running-PHP-SimpleXML/370013-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 2, 'PHP', '', '', 0, 7, 'kamy'),
(14, 'Creating Secure PHP Websites Kevin Skoglund', 'http://www.lynda.com/PHP-tutorials/Creating-Secure-PHP-Websites/133321-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 2, 'PHP', '', '', 0, 6, 'kamy'),
(15, 'Up and Running - Standard PHP Library David Powers', 'http://www.lynda.com/PHP-tutorials/Up-Running-Standard-PHP-Library/175038-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 2, 'PHP', '', '', 0, 10, 'kamy'),
(16, 'Accessing Databases with Object-Oriented PHP', 'http://www.lynda.com/PHP-tutorials/Accessing-Databases-Object-Oriented-PHP/169106-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 2, 'PHP', '', '', 0, 4, 'kamy'),
(17, 'Object-Oriented Programming with PHP', 'http://www.lynda.com/PHP-tutorials/Object-Oriented-Programming-PHP/107953-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', 'John Peck  \nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.', 2, 'PHP', '', '', 0, 4, 'kamy'),
(18, 'Up-Running-MySQL-Development', 'http://www.lynda.com/MySQL-tutorials/Up-Running-MySQL-Development/158373-2.html', '', 3, 'SQL', '', '', 0, 1, 'kamy'),
(19, 'MySQL-Essential-Training', 'http://www.lynda.com/MySQL-tutorials/MySQL-Essential-Training/139986-2.html', '', 3, 'SQL', '', '', 0, 1, 'kamy'),
(20, 'Lynda Search PHP', 'http://www.lynda.com/search?q=php', 'John Peck  \nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.', 2, 'PHP', '', '', 0, 127, 'kamy'),
(21, 'Up-Running-phpMyAdmin', 'http://www.lynda.com/MySQL-tutorials/Up-Running-phpMyAdmin/418255-2.html', '', 2, 'PHP', '', '', 0, 127, ''),
(22, 'JQuery-Essential', 'http://www.lynda.com/jQuery-tutorials/jQuery-Essential-Training/183382-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'Javascript', '', '', 0, 1, ''),
(23, 'Jquery Mobile Esstl', 'http://www.lynda.com/jQuery-Mobile-tutorials/jQuery-Mobile-Essential-Training/167067-2.html', '', 4, 'JQuery', '', '', 0, 2, 'kamy'),
(24, 'Lynda search jquery', 'http://www.lynda.com/search?q=jquery', '', 4, 'JQuery', '', '', 0, 3, 'kamy'),
(25, 'Lynda search jquery mobile', 'http://www.lynda.com/search?q=jquery+mobile', '', 4, 'JQuery', '', '', 0, 4, 'kamy'),
(26, 'Ajax Lynda', 'http://www.lynda.com/Ajax-tutorials/Updating-information-without-reloading-page-using-AJAX/150163/155367-4.html', '', 4, 'JQuery', '', '', 0, 4, 'kamy'),
(27, 'HTML-Essential-Training', 'http://www.lynda.com/HTML-tutorials/HTML-Essential-Training-2012/99326-2.html', '', 5, 'HTML', '', '', 0, 1, 'kamy'),
(28, 'Creating a Responsive Web Design', 'http://www.lynda.com/CSS-tutorials/Accessing-code-HTML-CSS-Dreamweaver/110716/114021-4.html?autoplay=true', '', 5, 'HTML', '', '', 0, 2, 'kamy'),
(29, 'Responsive-Design-Fundamentals', 'Responsive-Design-Fundamentals', '', 5, 'HTML', '', '', 0, 3, 'kamy'),
(30, 'Bootstrap Site', 'http://getbootstrap.com/', '', 6, 'Bootstrap', '', '', 0, 1, 'kamy'),
(31, 'bootstrap search Lynda', 'http://www.lynda.com/search?q=bootstrap', '', 6, 'Bootstrap', '', '', 0, 2, 'kamy'),
(32, 'Bootstrap-Lynda Basic', 'http://www.lynda.com/Bootstrap-tutorials/Using-exercise-files/133339/151271-4.html?autoplay=true', '', 6, 'Bootstrap', '', '', 0, 3, 'kamy'),
(33, 'Bootstrap Lynda interactive', 'http://www.lynda.com/Bootstrap-tutorials/Planning-thumbnail-gallery/161098/176516-4.html', '', 6, 'Bootstrap', '', '', 0, 3, 'kamy'),
(34, 'Google map geolocalisation', 'http://www.sitepoint.com/find-a-route-using-the-geolocation-and-the-google-maps-api/', '', 6, 'Bootstrap', '', '', 0, 4, 'kamy'),
(35, 'Bootstrap Layouts: Responsive Single-Page Design', 'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-Layouts-Responsive-Single-Page-Design/186538-2.html', '', 6, 'Bootstrap', '', '', 0, 5, 'kamy'),
(36, 'lynda.search Bootstrap', 'http://www.lynda.com/search?q=Bootstrap', '', 6, 'Bootstrap', '', '', 0, 6, 'kamy'),
(38, 'Bootstrap Site', 'http://getbootstrap.com/', '', 6, 'Bootstrap', '', '', 0, 1, ''),
(39, 'Advanced Topics in MySQL and MariaDB', 'http://www.lynda.com/MariaDB-tutorials/Advanced-Topics-MySQL-MariaDB/175635-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:mysql%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to perform a variety of advanced administration tasks in both MariaDB and MySQL, two powerful database solutions that work in slightly different ways.', 3, 'SQL', '', '', 0, 3, 'kamy'),
(40, 'Search Lynda mysql', 'http://www.lynda.com/search?q=mysql', '', 3, 'SQL', '', '', 0, 4, 'kamy'),
(41, 'Jquery UI', 'http://www.lynda.com/jQuery-tutorials/Up-Running-jQuery-UI/186963-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 6, 'kamy'),
(42, 'Jquery AJAX', 'http://www.lynda.com/jQuery-tutorials/jQuery-Data-AJAX/150163-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 7, 'kamy'),
(43, 'Jquery web designers', 'http://www.lynda.com/jQuery-tutorials/jQuery-Web-Designers/144204-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 7, 'kamy'),
(44, 'jQuery: Creating Plugins', 'http://www.lynda.com/jQuery-tutorials/jQuery-Creating-Plugins/364350-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 7, 'kamy'),
(45, 'Managing PHP Persistent Sessions David Powers', 'http://www.lynda.com/PHP-tutorials/Managing-PHP-Persistent-Sessions/382572-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to store persistent PHP session data in a SQL server and create an auto-login system that recognizes returning users.', 2, 'PHP', '', '', 0, 10, 'kamy'),
(46, 'Debugging PHP: Advanced Techniques with Jon Peck', 'http://www.lynda.com/PHP-tutorials/Debugging-PHP-Advanced-Techniques/112414-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Demonstrates how to leverage PHP''s built-in tools, as well as the Xdebug and Firebug extensions and FirePHP library to improve the quality of your code and reduce troubleshooting overhead.', 2, 'PHP', '', '', 0, 10, 'kamy'),
(47, 'Create an Interactive Map with jQuery with Chris C', 'http://www.lynda.com/jQuery-1-5-tutorials/Create-an-Interactive-Map-with-jQuery/87636-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 10, 'kamy'),
(49, 'How to handle handicap', 'https://www.facebook.com/spinal.cord.injuries/videos/1169089156449992/?fref=nf', 'An interesting take on how to act around people with disabilities.', 9, 'Handicap', '', '', 0, 1, 'kamy'),
(50, 'Up and Running with Ember.js with Kai Gittens', 'http://www.lynda.com/Emberjs-tutorials/Review-routes-Ember-Inspector/178116/191826-4.html?autoplay=true', 'Ember.js is a JavaScript framework for creating robust, complex web apps while writing very little code. Ember''s attraction lies in its built-in template library and rich feature set, which seems to grow almost every day. Understanding the core concepts behind Ember will help you use it now—no matter what enhancements are added in the future. So join Kai Gittens as he introduces Ember''s routers, templates, and models, and shows how to use templates to create simple pages and dynamically load content using components and Ember Data. Let our training light the spark of learning, and get up and running with Ember today.\r\nTopics include:\r\nInstalling Ember Inspector\r\nReviewing routes with Ember Inspector\r\nLoading templates with routes\r\nCreating links with the link-to helper\r\nAdding component templates\r\nLoading model data\r\nCustomizing components\r\nBuilding nested routes and route objects\r\nLoading data with object and array controllers\r\nCreating interfaces', 4, 'Javascript', '', '', 0, 100, ''),
(51, 'Texte savoureux, vu sur la page du groupe Yiddish ', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :\n\n"Israel c''est le seul pays" d''Ephraim Kishon :\n\nC''est le seul pays où les chômeurs font la grève\n\n\nC''est le seul pays qui a deux ministres du trésor et pas un rond.\n\nC''est le seul pays au monde où le gouvernement finance l''éducation sectaire et ou l''éducation gratuite est financée par les parents d''élèves.\n\nC''est le seul pays où chaque mère a le numéro du portable du sergent de son fils à l''armée.\n\nC''est le seul pays qui importe de l''eau par bateaux citernes au moment où le pays est inondé par les pluies.\n\nC''est le seul pays où la chanson la plus populaire dans les clubs de musique transe s''intitule : « fleurs dans les fusils et filles dans les chars ».\n\nC''est le seul pays qui a envoyé un satellite de communications dans l''espace, où on ne vous laisse jamais terminer une phrase.\n\nC''est le seul pays où sont déjà tombées des fusées d''Irak, des katyouchas du Liban, des Qassam de Gaza et où un appartement de trois pièces coûte plus cher qu''à Paris.\n\nC''est le seul pays où on demande une star porno : qu''en pense ta mère ?\n\nC''est le seul pays où on va dîner chez ses parents le vendredi et on occupe le même siège qu''à l''âge de 5 ans.\n\nC''est le seul pays où un repas Israélien est composé d''une salade arabe, d''une pita irakienne, d''un kebab roumain et d''une crème bavaroise.\n\nC''est le seul pays où le gars avec la chemise pleine de taches est le ministre et le gars au complet gris, son chauffeur.\n\nC''est le seul pays où des musulmans vendent des articles religieux aux chrétiens en échange de billets portant l''effigie du Rambam.\n\nC''est le seul pays où les jeunes quittent la maison à l''âge de 18 ans pour revenir y habiter à l''âge de 24.\n\nC''est le seul pays où aucune femme n''est en bons termes avec sa mère mais où elles se parlent néanmoins trois fois par jour.\n\nC''est le seul pays où on vous montre des photos des enfants alors qu''ils sont présents.\n\nC''est le seul pays où on peut connaître la situation sécuritaire selon les chansons à la radio.\n\nC''est le seul pays où les riches sont à gauche, les pauvres sont à droite et la classe moyenne paie tout.\n\nC''est le seul pays où on peut obtenir en dix minutes un logiciel pour lancer des vaisseaux spatiaux et où il faut attendre une semaine pour réparer la machine à laver.\n\nC''est le seul pays où la première fois qu''on sort avec une fille, on lui demande dans quelle unité elle a servi a l''armée, et on découvre qu''elle était parachutiste alors que vous n''aviez été que caporal à la cantine militaire.\n\nC''est le seul pays où le décalage entre le jour le plus heureux et le jour le plus triste n''est souvent que soixante secondes.\n\nC''est le seul pays où lorsque vous détestez les hommes politiques, les fonctionnaires, les taxes, la qualité du service et la situation en général, vous prouvez que vous aimez le pays et qu''en fin de compte c''est le seul pays dans lequel vous pouvez vivre."', 7, 'Israel', '', '', 0, 2, 'kamy'),
(52, 'Design Patterns in PHP with Keith Casey', 'http://www.lynda.com/PHP-tutorials/What-you-should-know-before-watching-course/186870/370504-4.html', 'Write better PHP code by following these popular (and time-tested) design patterns. Developer Keith Casey introduces 11 design patterns that will help you solve common coding challenges and make your intentions clear to future architects of your application. Keith explores use cases for:\n\nAccessing data with the active record and table data gateway patterns\nCreating objects with the factory, singleton, and mock objects patterns\nExtending code with decorator and adapter patterns\nStructuring applications with MVC and Action-Domain-Responder patterns\n\n\nEach chapter features a design pattern in a real-world coding scenario, and closes with a practice challenge to test your new skills.', 2, 'PHP', '', '', 0, 7, 'kamy'),
(53, 'Test-Driven Development with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/What-kind-testing/124398/137958-4.html', 'Prove your code is working every step of the way using a formalized test.sql-driven development (TDD) process. TDD can be done in every modern programming environment, and for desktop, mobile, or web apps. In this course, Simon Allardice teaches you exactly how to get started with TDD: what makes a good test.sql, why we''re more interested in failure than success, and how to measure and repeatedly run tests. \n\nThe course explores the jargon of TDD—test.sql suites, test.sql harness, mock and stub objects, and more—and covers how TDD is used in the most common programming languages and environments. Plus learn to create, run, and manage the tests and move to a test.sql-first mindset.\nTopics include:\nWhat is test.sql-driven development?\nUsing unit testing frameworks\nCreating tests\nUsing assertions\nCreating multiple test.sql methods\nNaming unit tests and test.sql methods\nTesting return values\nSetting up and tearing down\nIntroducing mock objects\nMeasuring code coverage', 11, 'Programming', 'Foundations of Programming', '', 0, 2, 'kamy'),
(54, 'Unit Testing with PHPUnit with Kristian Secor', 'http://www.lynda.com/PHPUnit-tutorials/Unit-Testing-PHPUnit/175019-2.html', 'Unit testing is a way to confirm proper execution of a computer program. PHPUnit provides a testing framework for PHP developers to do it right. This brief course covers everything you''ll need to get up and running with PHPUnit: where to download it, how to install it, and how to use it to unit test.sql your code. Kristian Secor provides a high-level overview of this invaluable framework, helping you guide test.sql-driven development at your organization.\nTopics include:\nWorking with assertions, annotations, and template methods of testing\nUsing mock and stub objects\nTesting private and protected methods\nLooking for weak spots in your testing, with code coverage\nTesting inherited projects', 2, 'PHP', '', '', 0, 100, 'kamy'),
(55, 'Fundamentals with Simon Allardice', 'http://www.lynda.com/JavaScript-tutorials/Foundations-of-Programming-Fundamentals/83603-2.html', 'This course provides the core knowledge to begin programming in any language. Simon Allardice uses JavaScript to explore the core syntax of a programming language, and shows how to write and execute your first application and understand what''s going on under the hood. The course covers creating small programs to explore conditions, loops, variables, and expressions; working with different kinds of data and seeing how they affect memory; writing modular code; and how to debug, all using different approaches to constructing software applications.\n\nFinally, the course compares how code is written in several different languages, the libraries and frameworks that have grown around them, and the reasons to choose each one.\nTopics include:\nWriting source code\nUnderstanding compiled and interpreted languages\nRequesting input\nWorking with numbers, characters, strings, and operators\nWriting conditional code\nMaking the code modular\nWriting loops\nFinding patterns in strings\nWorking with arrays and collections\nAdopting a programming style\nReading and writing to various locations\nDebugging\nManaging memory usage\nLearning about other languages', 11, 'Programming', 'Foundations of Programming', '', 0, 1, 'kamy'),
(56, 'Object-Oriented Design with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Object-Oriented-Design/96949-2.html', 'Most modern programming languages, such as Java, C#, Ruby, and Python, are object-oriented languages, which help group individual bits of code into a complex and coherent application. However, object-orientation itself is not a language; it''s simply a set of ideas and concepts.\n\nLet Simon Allardice introduce you to the terms—words like abstraction, inheritance, polymorphism, subclass—and guide you through defining your requirements and identifying use cases for your program. The course also covers creating conceptual models of your program with design patterns, class and sequence diagrams, and unified modeling language (UML) tools, and then shows how to convert the diagrams into code.\nTopics include:\nWhy use object-oriented design (OOD)?\nPinpointing use cases, actors, and scenarios\nIdentifying class responsibilities and relationships\nCreating class diagrams\nUsing abstract classes\nWorking with inheritance\nCreating advanced UML diagrams\nUnderstanding object-oriented design principles', 11, 'Programming', 'Foundations of Programming', '', 0, 3, 'kamy'),
(57, 'Databases with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Databases/112585-2.html', 'Discover how a database can benefit both you and your architecture, whatever the programming language, operating system, or application type you use. In this course, explore options that range from personal desktop databases to large-scale geographically distributed database servers and classic relational databases to modern document-oriented systems and data warehouses—and learn how to choose the best solution for you. Author Simon Allardice covers key terminology and concepts, such as normalization, "deadly embraces" and "dirty reads," ACID and CRUD, referential integrity, deadlocks, and rollbacks. The course also explores data modeling step by step through hands-on examples to design the best system for our data. Plus, learn to juggle the competing demands of storage, access, performance, and security—management tasks that are critical to your database''s success.\nTopics include:\nWhat is a database?\nWhy do you need a database?\nChoosing primary keys\nIdentifying columns and selecting data types\nDefining relationships: one-to-one, one-to-many, and many-to-many\nUnderstanding normalization\nCreating queries to create, insert, update, and delete data\nUnderstanding indexing and stored procedures\nExploring your database options', 11, 'Programming', 'Foundations of Programming', '', 0, 4, 'kamy'),
(58, 'Design Patterns with Elisabeth Robson and Eric Fre', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Design-Patterns/135365-2.html', 'Design patterns are reusable solutions that solve the challenges software developers face over and over again. Rather than reinventing the wheel, learn how to make use of these proven and tested patterns that will make your software more reliable and flexible to change. This course will introduce you to design patterns and take you through seven of the most used object-oriented patterns that will make your development faster and easier. Elisabeth Robson and Eric Freeman, coauthors of Head First Design Patterns, join forces to provide an overview of each pattern and examples of the pattern in action. Featured design patterns include the strategy, observer, decorator, singleton, collection, state, and factory method patterns.\nTopics include:\nWhat are design patterns?\nEncapsulating code that varies with the strategy pattern\nSetting behavior dynamically\nImplementing the observer pattern\nCreating chaos with inheritance\nExtending behavior with composition\nDealing with multithreading and the singleton pattern\nRevising the design for a state machine\nEncapsulating iteration with the collection pattern\nEncapsulating object creation with the factory method pattern', 11, 'Programming', 'Foundations of Programming', '', 0, 5, 'kamy'),
(59, 'Data Structures with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Data-Structures/149042-2.html', 'Once you get past simplistic computer programs with one or two variables, you''ll use a data structure to store the values—and groups of values— in your applications. While they are sometimes taken for granted in modern programming environments, a deeper understanding of data structures is vital for any programmer who wants to know what''s going on "under the hood" and understand how to defend the choices they''ve made for performance and efficiency. Simon Allardice offers that understanding to you in this Foundations of Programming course.\n\nStarting with simple ways of grouping data like arrays and structs, together you''ll explore gradually more complex data structures, like dictionaries, sets, hash tables, queues and stacks, links and linked lists, and trees and graphs. Simon keeps the lessons grounded in the real world and answers the "why" behind many data-structuring decisions: Why use a hash table? Why is a set useful? Why avoid arrays? When you''re finished with the course, you''ll have a clear understanding of data structures and understand how to use them in whatever language you''re programming in, today or 5 years from now.\nTopics include:\nWhat is a data structure?\nUsing C-style structs and arrays\nSorting and searching arrays\nWorking with singly and doubly linked lists\nUsing stacks for last-in, first-out (LIFO) structures\nUsing queues for first-in, first-out (FIFO) structures\nWorking with hash tables\nUnderstanding binary search trees (BSTs)\nLearning about graphs', 11, 'Programming', 'Foundations of Programming', '', 0, 7, 'kamy'),
(60, 'Fundamentals of Software Version Control with Mich', 'http://www.lynda.com/Version-Control-tutorials/Fundamentals-Software-Version-Control/106788-2.html', 'This course is a gateway to learning software version control (SVC), process management, and collaboration techniques. Author Michael Lehman reviews the history of version control and demonstrates the fundamental concepts: check-in/checkout, forking, merging, commits, and distribution. The choice of an SVC system is critical to effectively managing and versioning the assets in a software development project (from source code, images, and compiled binaries to installation packages), so the course also surveys the solutions available. Michael examines Git, Perforce, Subversion, Mercurial, and Microsoft Team Foundation Server (TFS) in particular, describing the appropriate use, features, benefits, and optimal group size for each one.\nTopics include:\nComparing centralized vs. distributed systems\nSaving changes and tracking history\nUsing revert or rollback\nWorking with the GUI tools\nUsing IDE and shell integration\nInstalling different systems\nCreating a repository\nTagging code\nBranching and merging code\nSelecting a software version control system that''s right for you', 11, 'Programming', 'Foundations of Programming', '', 0, 8, 'kamy'),
(61, 'Code Efficiency with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Code-Efficiency/122461-2.html', 'Code efficiency. There are other words we can use (optimization, performance, speed), but it''s all about making existing code run faster. Whether for desktop, mobile, or web apps, in this course you''ll see how to identify pain points and measure them accurately, as well as view multiple approaches to improve the performance. Author Simon Allardice covers everything from "quick fixes" to more complex (but more accurate) algorithms.\n\nLearn to choose the right data types, understand the pitfalls of using high-level languages, and decide where to spend your time. Plus, see how the underlying memory management model may have more of an impact than you realize, and what performance issues you can expect working with databases and web services.\nTopics include:\nIdentifying problems in the code\nEmbracing constraints\nUsing code analysis tools to measure performance\nManaging memory\nManaging disk-based and network resources', 11, 'Programming', 'Foundations of Programming', '', 0, 9, 'kamy'),
(62, 'Software Quality Assurance with Aaron Dolberg', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Software-Quality-Assurance/126119-2.html', 'tart incorporating quality into your software development process today. Author Aaron Dolberg demonstrates the different kinds of software testing (from black box to white box) and how to fit each one into your development cycle. Learn how to make sure your team is on the same page when it comes to quality by developing criteria for ranking the priority and severity of issues. Then find out how to test.sql and report issues, and how to use a tracking system to manage the process and the results. Lastly, Aaron explains how automating some of the testing can make the QA process more efficient and objective. In the end, you''ll be able to better understand the overall health of your product, and ensure your team is meeting quality goals with every release.\nTopics include:\nHow to think about quality\nIncorporating black box, white box, and grey box testing into your process\nUnderstanding your quality goals\nRanking issues by priority and severity\nTesting core functionality\nTesting the backend\nUsing a test.sql case management system\nInterpreting bug models\nRecording defects automatically', 11, 'Programming', 'Foundations of Programming', '', 0, 10, 'kamy'),
(63, 'Refactoring Code with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Refactoring-Code/122457-2.html', 'ctoring is the process of taking existing code and improving it. While it makes code more readable and understandable, it also becomes much easier to add new features, build larger applications, and spot and fix bugs. In this course, staff author Simon Allardice introduces the formalized, disciplined approach to refactoring that tells you exactly what to look for in your code, and how to fix it, through a series of "code smells"—clues that let you look at a block of code and realize when there''s something wrong with it.\nTopics include:\nWhat is refactoring?\nRecognizing common code smells\nSimplifying method calls\nMaking conditions easier to read', 11, 'Programming', 'Foundations of Programming', '', 0, 11, 'kamy'),
(64, 'Insights on Software Quality Engineering with Aaro', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Insights-Software-Quality-Engineering/142444-2.html', 'Software quality engineering plays a vital role in the development cycle, saving companies time and money and ensuring that customers have exactly the experience they expect. It''s also a lucrative and underappreciated career path. Here, software quality engineer Aaron Dolberg draws on his years of experience in quality assurance (QA) to share his personal insights and cautionary tales. Aaron discusses how to get started in QA, how it fits in at companies small and large, and how it has changed since the rise of agile workflows.', 11, 'Programming', 'Foundations of Programming', '', 0, 12, 'kamy'),
(65, 'Multidevice Prototyping with Ratchet with Chris Gr', 'http://www.lynda.com/Ratchet-tutorials/Using-exercise-files/170056/359870-4.html', 'Ratchet is a fantastic framework for prototyping mobile apps. Ratchet prototypes look and act just like native iOS and Android apps, but they''re programmed with languages familiar to almost all web designers and developers: HTML, CSS, and JavaScript. Join Chris Griffith in this course, as he shows how to configure your development environment to work with Ratchet, and build your first app prototype, from creating the initial screen and adding transitions between pages, with Push.js, to using Ratchet''s iOS and Android built-in themes, which make your app immediately look at home on either platform.\nTopics include:\nInstalling Ratchet\nSetting up a web server\nCreating your first screen\nConfiguring meta tags\nAdding content\nConnecting pages with Push.js\nAdding icons, buttons, form elements, and lists\nDefining your app theme with Ratchet', 6, 'Bootstrap', '', '', 0, 36, 'kamy'),
(66, 'CakePHP-MVC Up and Running with  with Jon Peck', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 12, 'MVC Framework', '', '', 0, 100, 'kamy'),
(67, 'MVC PHP CodeIgniter  Up and Running with PHP CodeI', 'http://www.lynda.com/CodeIgniter-tutorials/Introducing-MVC-development-pattern/126122/141743-4.html', 'Speed up your development with CodeIgniter, a fast and powerful PHP web application framework. Author Jon Peck shows how to build a magazine cataloging system while describing how to use a MVC (Model-View-Controller) framework like CodeIgniter.\n\nStarting with the what and why of CodeIgniter, Jon introduces key concepts such as the MVC pattern and libraries by demonstrating how to create static pages, then storing and displaying magazine info in a database. Advanced topics like classes and helpers are explored to validate user input, upload files, and much more. By creating a complete system, you''ll have the foundation to build your own applications with CodeIgniter.\nTopics include:\nWhat is CodeIgniter?\nCreating a static page controller\nGenerating output with a view\nWhat is a model?\nSaving data with Active Records\nCreating forms\nValidating user input\nListing records in tables\nUploading images\nViewing and deleting records', 12, 'MVC Framework', '', '', 0, 37, 'kamy'),
(68, 'MVC Frameworks for Building PHP Web Applications', 'http://www.lynda.com/CakePHP-tutorials/MVC-Frameworks-Building-PHP-Web-Applications/315196-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:MVC%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'PHP developers have a choice: they can design their own architecture, essentially re-inventing the wheel, or they can use a framework. Frameworks speed up development, enhance collaboration, and help keep code organized. So why start from scratch? In this course, Drew Falkman introduces the six most popular PHP frameworks: Zend, Symfony, CodeIgniter, CakePHP, Yii, and Laravel. He''ll describe each framework''s advantages, show how to get and install the software, and then demonstrate how to get the default pages for each framework up and running, so viewers can see how the code is structured. In the final chapter, Drew compares all the frameworks and provides resources to move forward with each one. Your framework choice is one of the biggest factors affecting the success of your project; start here to get the information you need to make the right decision.\nTopics include:\nWhy use a framework?\nIntroducing MVC-framework concepts\nExamining each framework''s components\nSetting up the software\nWalking through sample apps built in each framework\nComparing frameworks', 12, 'MVC Framework', 'MVC', '', 0, 4, 'kamy'),
(69, 'Laravel MVC framework Essential', 'http://www.lynda.com/Laravel-tutorials/Up-Running-Laravel/166513-2.html', 'Join Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel''s advanced templating engine, Blade. Next, you''ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you''ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code', 12, 'MVC Framework', 'MVC', '', 0, 30, 'kamy'),
(70, 'Ruby on Rails 4 Essential Training with Kevin Skog', 'http://www.lynda.com/Ruby-Rails-tutorials/Ruby-Rails-4-Essential-Training/139989-2.html', 'Join Kevin Skoglund as he shows how to create full-featured, object-oriented web applications with the latest version of the popular, open-source Ruby on Rails framework. This course explores each part of the framework, best practices, and real-world development techniques. Plus, get hands-on experience by building a complete content management system with dynamic, database-driven content. Kevin teaches how to design an application; route browser requests to return dynamic page content; structure and interact with databases using object-oriented programming; create, update, and delete records; and implement user authentication. Previous experience with Ruby is recommended, but not required.\r\nTopics include:\r\nWhy use Ruby on Rails?\r\nInstalling Ruby on Rails on Mac and Windows\r\nRendering templates and redirecting requests\r\nGenerating and running database migrations\r\nCreating, updating, and deleting records\r\nUnderstanding association types\r\nUsing layouts, partials, and view helpers\r\nIncorporating assets using asset pipeline\r\nValidating form data\r\nAuthenticating users and managing user access\r\nArchitecting RESTful applications\r\nDebugging and error handing', 13, 'Other Programing', '', '', 0, 1, ''),
(71, 'RSpec Testing Framework with Ruby with Kevin Skogl', 'http://www.lynda.com/Ruby-tutorials/RSpec-Testing-Framework-Ruby/183884-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:ruby%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to use RSpec, the Ruby testing framework that can help developers be more productive, write better code, and reduce bugs during development. Kevin Skoglund explains the basic syntax of RSpec and then dives straight into writing and running test.sql examples. He shows how to use a variety of matchers to test.sql for expected conditions, provides techniques for testing efficiently, and demonstrates how test.sql doubles can stand in for objects and methods. He also explains the additional RSpec features available for Ruby on Rails, and walks through a step-by-step example of test.sql-driven development.\r\nTopics include:\r\nInstalling and configuring RSpec\r\nWriting and running examples\r\nDefining expectations using matchers\r\nUsing helper methods, before/after hooks, and shared examples\r\nCreating test.sql doubles using mocks and stubs\r\nTesting Ruby on Rails with RSpec\r\nPutting test.sql-driven development into practice', 13, 'Other Programing', '', '', 0, 2, ''),
(72, 'CSS with LESS and Sass with Joe Marini', 'http://www.lynda.com/CSS-tutorials/CSS-LESS-SASS/107921-2.html', 'Ever find yourself wishing that CSS had features like variables, functions, or reusable classes? Look no further. LESS and Sass are CSS style sheet tools called preprocessors that add these features and more, simplifying the creation of complex CSS styles. In this course, author Joe Marini introduces the LESS and Sass tools in a two-part manner.\n\nThe first section focuses on LESS (Leaner CSS) and how it can be used on both the client and the server. The lessons show how to work with variables, mixins, nested rules, and other features to easily create maintainable CSS. \n\nThe second section introduces Sass (Syntactically awesome stylesheets), which contains many of the same features as LESS, along with a few new ones. Joe also compares and contrasts the two tools, and explains how your platform and needs may influence which tool you choose.\nTopics include:\nWhat are LESS and Sass?\nUsing variables in your CSS\nWorking with reusable and parameterized mixins\nImplementing nested rules\nCombining CSS rules with operations\nUsing the built-in functions in LESS and Sass\nControlling the CSS output formatting\nImporting external files\nSubject:\nWeb', 6, 'Bootstrap', '', '', 0, 6, 'kamy'),
(73, 'Customizing Bootstrap 3 with LESS with Jen Kramer', 'http://www.lynda.com/Bootstrap-tutorials/Customizing-Bootstrap-3-LESS/161086-2.html', 'Do more with LESS in Bootstrap. In this course, Jen Kramer shows you how to customize the look and feel of your Bootstrap site with LESS CSS, as well as LESS mixins and Bootstap''s own customization screens. You''ll learn how to configure Prepros, a LESS compiler; work within the LESS file structure; and start modifying fonts, color, spacing, and more with the variables.less file. Then LESS''s mixins will allow you to make advanced customizations like custom buttons and tab styles. Just press Play to start learning.\nTopics include:\nSetting up your working environment for Bootstrap and LESS\nUnderstanding the LESS file structure\nCreating and manipulating LESS variables\nWorking with LESS mixins\nCreating custom styles using mixins and variables', 6, 'Bootstrap', '', '', 0, 7, 'kamy'),
(74, 'Bootstrap 3: Advanced Web Development with Ray Vil', 'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-3-Advanced-Web-Development/124079-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:bootstrap%2Badvanced%2Bweb%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Generate your own interactive website from scratch with Bootstrap, the mobile-friendly framework from Twitter, in this start-to-finish course with developer and author Ray Villalobos. First, you''ll plan and prototype the interface with MindMaps and Balsamiq Mockups. Next, download Bootstrap and dive into organizing your site structure with its scaffolding feature—adding PHP includes to break your code into reusable modules and building in the core navigation. Ray then shows you how to build interactive carousels, modal features, and forms, and control these features with JavaScript. Finally, learn to style it all with LESS and prepare to publish the results online.\nTopics include:\nPrototyping the site\nWorking with a local web server\nCreating a baseline template with Git\nScaffolding the main columns\nMaking the site modular with PHP includes\nAdding basic navigation\nAdding a carousel\nWorking with buttons\nCreating and activating tabs\nAdding page and structure LESS styles', 6, 'Bootstrap', '', '', 0, 3, 'kamy'),
(75, 'Laravel 4 Essential Training with Joseph Lowery', 'http://www.lynda.com/Laravel-tutorials/Laravel-4-Essential-Training/181242-2.html', 'oin Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel''s advanced templating engine, Blade. Next, you''ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you''ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code', 12, 'MVC Framework', '', '', 0, 5, 'kamy'),
(76, 'Foundations of Programming: Web Security with Kevi', 'http://www.lynda.com/Developer-Web-Development-tutorials/Foundations-Programming-Web-Security/133330-2.html', 'Learn about the most important security concerns when developing websites, and what you can do to keep your servers, software, and data safe from harm. Instructor Kevin Skoglund explains what motivates hackers and their most common methods of attacks, and then details the techniques and mindset needed to craft solutions for these web security challenges. Learn the eight fundamental principles that underlie all security efforts, the importance of filtering input and controlling output, and smart strategies for encryption and user authentication. Kevin also covers special considerations when it comes to credit cards, regular expressions, source code managers, and databases.\n\nThis course is great for developers who want to secure their client''s websites, and for anyone else who wants to learn more about web security.\nTopics include:\nWhy security matters\nWhat is a hacker?\nHow to write a security policy\nCross-site scripting (XSS)\nCross-site request forgery (CSRF)\nSQL injection\nSession hijacking and fixation\nPasswords and encryption\nSecure credit card payments', 11, 'Programming', '', '', 0, 1, 'kamy'),
(77, 'Kevin-Skoglund Lynda', 'http://www.lynda.com/Kevin-Skoglund/104-1.html', 'Kevin Skoglund is the founder of Nova Fabrica, a web development agency specialized in delivering custom, scalable solutions using Ruby on Rails, PHP, SQL, and related technologies. Nova Fabrica clients include An Event Apart, Atlas Carpet Mills, Consulate Film, Gregorius|Pineo, Maharam, Oakley, and The Bold Italic. Kevin is a lynda.com author with over 15 years of teaching and web development experience.', 1, 'Others', '', '', 0, 5, 'kamy'),
(78, 'Git Essential Training with Kevin Skoglund', 'http://www.lynda.com/Git-tutorials/Understanding-version-control/100222/111248-4.html', '', 13, 'Other Programing', '', '', 0, 1, ''),
(79, 'Amazing story of how Bulgaria''s Jews were saved in', 'http://edition.cnn.com/videos/world/2015/07/24/intv-amanpour-bulgaria-king-a.cnn/video/playlists/amanpour/', '', 8, 'Antisémitisme', '', '', 0, 5, 'kamy'),
(80, 'Practical Apache Web Server Administration with Jo', 'http://www.lynda.com/Apache-tutorials/Practical-Apache-Web-Server-Administration/164983-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:apache%2Bserver%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 13, 'Other Programing', '', '', 0, 1, ''),
(81, '7 Things to Consider Before Choosing Sides in the', 'http://www.huffingtonpost.com/ali-a-rizvi/picking-a-side-in-israel-palestine_b_5602701.html', '', 7, 'Israel', 'Gaza', '', 0, 1, ''),
(82, 'Database Fundamentals: Creating and Manipulating D', 'http://www.lynda.com/SQL-Server-tutorials/Database-Fundamentals-Creating-Manipulating-Data/385697-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(83, 'Migrating Access Databases to SQL Server with Adam', 'http://www.lynda.com/Access-tutorials/Migrating-Access-Databases-SQL-Server/397389-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(84, 'Installing and Administering Microsoft SQL Server ', 'http://www.lynda.com/SQL-Server-tutorials/Installing-Administering-Microsoft-SQL-Server-2014/383046-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(85, 'Database Fundamentals: Core Concepts with Adam Wil', 'http://www.lynda.com/SQL-Server-tutorials/Database-Fundamentals-Core-Concepts/385693-2.html', '', 14, 'SQLServer', '', '', 0, 0, ''),
(86, 'SQL Server 2014 Essential Training with Martin Gui', 'http://www.lynda.com/SQL-Server-tutorials/SQL-Server-2014-Essential-Training/363873-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(87, 'Implementing a Data Warehouse with Microsoft SQL S', 'http://www.lynda.com/SQL-Server-tutorials/Implementing-Data-Warehouse-Microsoft-SQL-Server-2012/156150-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(88, 'Amazon.fr', 'http://www.amazon.fr/', '', 1, 'Others', '', '', 0, 9, ''),
(89, 'lotto', 'https://jeux.loro.ch/FR/1/homepage?cid=sis/fr/Brand/Nav///tous/juin2015#action=homepage', '', 1, 'Others', '', '', 0, 9, ''),
(90, 'icorner', 'https://www.login.icorner.ch/public/Login1.html', '', 1, 'Others', '', '', 0, 9, ''),
(91, 'Mufti', 'https://vimeo.com/14203664', '', 8, 'Antisémitisme', '', '', 0, 1, ''),
(92, 'origines du judaïsme - C''est pas sorcier', 'http://education.francetv.fr/antiquite/sixieme/video/les-origines-du-judaisme-c-est-pas-sorcier', '', 7, 'Israel', '', '', 0, 1, ''),
(93, 'Malek Boutih, le Ps et le conflit Israël / Gaza', 'https://www.dailymotion.com/video/x822pf_malek-boutih-le-ps-et-le-conflit-is_news', '', 7, 'Israel', '', '', 0, 1, ''),
(94, 'ASP.NET Essential Training with David Gassner', 'http://www.lynda.com/ASP-NET-tutorials/ASP-NET-Essential-Training/784-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
(95, 'www.asp.net/', 'http://www.asp.net/', '', 14, 'SQLServer', '', '', 0, 7, ''),
(96, 'Up and Running with ASP.NET 5 with Jess Chadwick', 'http://www.lynda.com/ASP-NET-tutorials/Up-Running-ASP-NET-5/368051-2.html', 'ASP.NET 5, Microsoft''s latest web development framework, includes an optimized developer experience, better performing runtime, and cross-platform support for Windows, Mac, and Linux. With all this change, many developers find they could use a refresher. In this course, Jess Chadwick introduces the basics to get you up and running with ASP.NET 5, and creating and deploying your own professional quality applications. He explores setup and installation, working with the ASP.NET MVC 6 framework, and the techniques you need to manage data, reuse code, construct web APIs, and secure your new applications. After you''ve built your application, Jess will show you how to deploy it to both IIS server and Microsoft Azure.\r\nTopics include:\r\nUnderstanding ASP.NET 5''s new request processing pipeline\r\nDownloading client-side libraries using Grunt and Bower in Visual Studio\r\nAdding ASP.NET MVC 6 to your application\r\nHandling web requests with controllers\r\nRendering dynamic views with Razor markup\r\nUsing Entity Framework to write and read data to a database\r\nUsing TagHelpers to create simple dynamic HTML forms\r\nRegistering and authenticating users with Identity services\r\nDynamically update portions on the server using partial rendering\r\nUsing dynamic routing logic to customize URLs\r\nExposing data with web APIs\r\nLeveraging custom configuration and logging\r\nIncreasing application maintainability with dependency injection\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nASP.NET\r\nAuthor:\r\nJess Chadwick', 14, 'SQLServer', '', '', 0, 9, '');
INSERT INTO `links` (`id`, `name`, `web_address`, `description`, `category_id`, `category`, `sub_category_1`, `sub_category_2`, `privacy`, `rank`, `username`) VALUES
(97, 'From: ASP.NET MVC 5 Essential Training with Michae', 'http://www.lynda.com/ASP-NET-tutorials/What-you-should-know-before-watching-course/170334/191097-4.html', 'ASP.NET MVC gives you a potent, patterns-based way to build dynamic websites. MVC 5 includes features that enable rapid, test.sql-driven development—and it''s a version every .NET developer needs to know to meet the latest web standards. Join Michael Sullivan for an in-depth look at the MVC 5 framework. He demonstrates how a typical MVC application is structured, and shows how to work with views, models, and data, including developing database objects with the Entity Framework. Michael also explores how to secure applications with the ASP.NET Identity system, create and conduct unit tests, use JavaScript libraries to communicate with controllers and pass data to client-side scripts, and deploy to cloud-based platforms like Azure and AppHarbor. Two hands-on practice challenges allow you to test.sql what you''ve learned along the way.\r\nTopics include:\r\nExploring ASP.NET routing\r\nApplying action selectors\r\nWorking with layouts\r\nEmploying HTML helpers\r\nDisplaying and validating model properties\r\nGenerating database objects with Entity Framework\r\nAdding transactions\r\nAuthenticating users\r\nUnit testing\r\nPerforming partial page updates with Ajax and jQuery\r\nDeploying ASP.NET MVC applications', 14, 'SQLServer', '', '', 0, 10, ''),
(98, 'C#', 'http://www.lynda.com/C-tutorials/Up-Running-C/164452-2.html', '# is the language at the heart of many Windows applications, including Windows Phone and Windows Store apps. And if you have a programming background, you can get up and running with C# in as little as three hours using this course. Author Gerry O''Brien introduces C# and the Visual Studio IDE; the core language elements such as data types, variables, constants, functions, and loops; and object-oriented programming with classes and namespaces. Plus, learn how to handle exceptions with the try-catch-finally mechanism and manage memory resources. Then get a brief tour of two fully functional Windows Phone and Windows Store apps to see what the final results look like. There are also five challenge videos that allow you to test your C# prowess, and five matching videos where Gerry explains the correct solutions.\r\nTopics include:\r\nInstalling C#\r\nWorking with loops\r\nControlling program flow\r\nUsing variables\r\nBuilding functions\r\nCreating and instantiating classes\r\nCatching errors\r\nManaging resources with the garbage collector\r\nBuilding collections\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nC#\r\nAuthor:\r\nGerry O''Brien', 14, 'SQLServer', '', '', 0, 1, ''),
(99, 'Visual Basic Essential Training with David Gassner', 'http://www.lynda.com/Visual-Basic-tutorials/Visual-Basic-Essential-Training/114902-2.html', '', 14, 'SQLServer', '', '', 0, 11, ''),
(100, 'Etgar Keret : "J’aimerais un Premier ministre', 'http://www.atlantico.fr/decryptage/etgar-keret-j-aimerais-premier-ministre-qui-defaut-avoir-idees-favorables-paix-en-ait-au-moins-folles-pourquoi-ne-pas-essayer-2406117.html/page/0/1', '', 7, 'Israel', '', '', 0, 1, ''),
(101, 'Visual Studio 2015 01: Exploring the Visual Studio', 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-01-Exploring-Visual-Studio-Ecosystem/408411-2.html', '', 15, 'Visual Studio', '', '', 0, 1, ''),
(102, 'Visual Studio 2015 02: Getting Comfortable with th', 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-02-Getting-Comfortable-IDE/415312-2.html', '', 15, 'Visual Studio', '', '', 0, 1, ''),
(103, 'Visual Studio 2015 03: Exploring Projects and Solu', 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-03-Exploring-Projects-Solutions/415313-2.html', '', 15, 'Visual Studio', '', '', 0, 1, ''),
(104, 'Visual Studio 2015  04: Surveying the Programming ', 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015--04-Surveying-programming-languages/415314-2.html', '', 15, 'Visual Studio', '', '', 0, 4, ''),
(105, 'C# Essential Training with David Gassner', 'http://www.lynda.com/C-tutorials/C-Essential-Training/188207-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:C%23%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 15, 'Visual Studio', '', '', 0, 8, ''),
(106, 'LES REFUGIES DU SILENCE ( mise à jour 2015 )', 'https://www.youtube.com/watch?v=_B6qkypTDa0&feature=youtu.be', '', 7, 'Israel', '', '', 0, 1, ''),
(107, 'From: Visual Studio 2010 Essential Training with W', 'http://www.lynda.com/ASP-NET-tutorials/Understanding-Visual-Studio-versions/67159/76568-4.html', '', 15, 'Visual Studio', '', '', 0, 5, ''),
(108, 'Up and Running Angular JS', 'http://www.lynda.com/AngularJS-tutorials/Installing-running-basic-application/154414/167519-4.html', '', 4, 'JQuery', '', '', 0, 1, ''),
(109, 'Angular forms Validation', 'http://www.lynda.com/AngularJS-tutorials/Adding-Angular-JS-our-form/438886/445592-4.html', '', 4, 'JQuery', '', '', 0, 1, ''),
(110, 'javascript functions', 'http://www.lynda.com/JavaScript-tutorials/JavaScript-Functions/148137-2.html', '', 4, 'Javascript', '', '', 0, 1, ''),
(111, 'Comment les jeunes', 'http://www.danilette.com/2015/11/comment-les-jeunes-de-mon-quartier-dans-le-93-ont-ils-vecu-les-carnages-de-la-nuit-alexandra-laignel-lavastine.html?utm_source=_ob_share&utm_medium=_ob_facebook&utm_campaign=_ob_sharebar', '', 8, 'Antisémitisme', '', '', 0, 1, ''),
(112, 'Introducing OOP Excel VBA', 'http://www.lynda.com/Excel-tutorials/Introducing-object-oriented-programming/62906/68825-4.html', '', 13, 'Other Programing', '', '', 0, 1, ''),
(113, 'Setting up and configuring your local server with ', 'http://www.lynda.com/Moodle-tutorials/Setting-up-configuring-your-local-server-XAMPP-LAMP/372439/416662-4.html', '', 1, 'Others', '', '', 0, 1, ''),
(114, 'Up and Running with Node.js with Alexander Zanfir', 'http://www.lynda.com/Node-js-tutorials/What-you-should-know/370605/408260-4.html?autoplay=true', '', 4, 'JQuery', '', '', 0, 1, ''),
(115, 'Amazon.ch', 'http://www.amazon.de/', '', 1, 'Others', '', '', 0, 1, ''),
(116, 'Modern Javascript playlist', 'http://www.lynda.com/SharedPlaylist/0a5348d96ae04fb48690a5137ccadced', '', 1, 'Others', 'Playlist', '', 0, 0, ''),
(117, 'Dieudonné propagandiste "national-socialiste" selo', 'http://www.memorial98.org/2015/11/dieudonne-propagandiste-national-socialiste-selon-la-justice.html', '', 8, 'Antisémitisme', '', '', 0, 1, ''),
(118, 'electronic-star.ch', 'http://www.electronic-star.ch/', '', 1, 'Others', '', '', 0, 1, ''),
(119, 'telekurs', 'https://www.tkflink.com/fda?X=b64-U2VzYW1lLVzu9IOdS9P6pamZ4fKC1lCuqFz3NDEO0Lruj0gJIpsH9Ivl19G6unHE9qCqfqjh9oDni$qDjYIJZ32Cx8Dn68Tcl6yPwvcs72QUt$f2fevHyPMlHklLtkcK88iXOIywJ4JdpTXPvQTB1-HiVdD9SZo69NdIxDn3OA', 'Antonio:CH543; U55209\r\nPassword: 131158\r\n\r\nStefano:CH543: U55003\r\nPassword: Lugano', 1, 'Others', '', '', 0, 1, ''),
(120, 'Design the Web: CSS-Controlled SVG with PHP with C', 'http://www.lynda.com/CSS-tutorials/Design-Web-CSS-Controlled-SVG-PHP/424048-2.html', '', 2, 'PHP', '', '', 0, 1, ''),
(121, 'AngularJS: Building a Data-Driven App with Ray Vil', 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Building-Data-Driven-App/421230-2.html', '', 4, 'Javascript', '', '', 0, 1, ''),
(122, 'AngularJS: Adding Registration to Your Application', 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Adding-Registration-Your-Application/438887-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:angularjs%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'Javascript', '', '', 0, 1, ''),
(123, 'Developing Android Apps Essential Training with Da', 'http://www.lynda.com/Android-tutorials/Developing-Android-Apps-Essential-Training-Revision-Q2-2015/369905-2.html', '', 17, 'Java Android', '', '', 0, 2, ''),
(124, 'Java Essential Training with David Gassner', 'http://www.lynda.com/Java-tutorials/Java-Essential-Training/377484-2.html', '', 17, 'Java Android', '', '', 0, 1, ''),
(125, 'lynda Android', 'http://www.lynda.com/search?q=android', '', 17, 'Java Android', '', '', 0, 1, ''),
(126, 'Les Réfugiés Oubliés - documentaire complet', 'https://www.youtube.com/watch?v=5JwW1kefTvU', '', 7, 'Israel', '', '', 0, 1, ''),
(127, 'Microsoft course', 'https://channel9.msdn.com/Series/Choose-to-Code?sort=viewed&page=2', '', 15, 'Visual Studio', '', '', 0, 1, ''),
(128, 'udemy Mobile App Design In Sketch 3: UX and UI Des', 'https://www.udemy.com/the-complete-design-course/learn/#/', '', 1, 'Others', '', '', 0, 1, ''),
(129, 'Javasxript 6', 'https://github.com/lukehoban/es6features', 'Next generation javascript', 4, 'Javascript', '', '', 0, 1, ''),
(130, 'typescriptlang', 'http://www.typescriptlang.org/', 'https://www.udemy.com/learn-angularjs/learn/?couponCode=YOUTUBE119#/lecture/1992064', 4, 'Javascript', '', '', 0, 1, ''),
(131, 'JavaScript Essential Training with Simon Allardice', 'http://www.lynda.com/JavaScript-tutorials/JavaScript-Essential-Training/81266-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:javascript%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'Javascript', '', '', 0, 1, ''),
(132, 'Super learning material', 'http://www.ikamy.ch/public/SuperLearning/CourseSyllabusSuperLearner2.html', '', 19, 'SuperLearning', '', '', 0, 1, ''),
(133, 'Course Syllabus Super Learning', 'http://www.ikamy.ch/public/SuperLearning/CourseSyllabusSuperLearnerV2.0Udemy.pdf', '', 19, 'SuperLearning', '', '', 0, 1, ''),
(134, 'Super learning Udemy', 'https://www.udemy.com/become-a-superlearner-2-speed-reading-memory-accelerated-learning/learn/#/', '', 19, 'SuperLearning', 'Udemy', '', 0, 1, ''),
(135, 'Udemy Learn Java Script Server Technologies From S', 'https://www.udemy.com/learn-java-script-server-technologies-from-scratch/learn/#/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
(136, 'Udemy Projects In JavaScript & JQuery', 'https://www.udemy.com/projects-in-javascript-jquery/learn/#/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
(137, 'Udemy Comprehensive TypeScript', 'https://www.udemy.com/typescript101/learn/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
(138, 'udemy Build Web Apps with React JS and Flux', 'https://www.udemy.com/learn-and-understand-reactjs/learn/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
(139, 'udemy Python Network Programming', 'https://www.udemy.com/python-programming-for-real-life-networking-use/learn/', '', 1, 'Others', 'Udemy', '', 0, 1, ''),
(140, 'udemy Mobile App Design In Sketch 3: UX and UI Des', 'https://www.udemy.com/the-complete-design-course/learn/', '<p>Need a mac Mobile App Design In Sketch 3: UX and UI Design From Scratch</p>', 1, 'Others', 'Udemy', '', 0, 1, ''),
(141, 'udemy  Learning JavaScript Programming Tutorial. A', 'https://www.udemy.com/programming-javascript/learn/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
(142, 'CSS3', 'https://www.udemy.com/learning-css3/learn/', '', 5, 'HTML', 'Udemy', '', 0, 1, ''),
(143, 'microspot', 'http://www.microspot.ch/msp/index.jsf', '', 1, 'Others', '', '', 0, 1, ''),
(144, 'GIMP Essential Training', 'http://www.lynda.com/GIMP-tutorials/Welcome/112673/117897-4.html', '', 11, 'Programming', '', '', 0, 2, ''),
(145, 'Lumonisity brain exercise', 'https://www.lumosity.com/app/v4/dashboard', '', 1, 'Others', '', '', 0, 1, ''),
(146, 'Schindler List Violon', 'https://www.facebook.com/soutien.a.israel/videos/840988722690870/?fref=nf', '', 7, 'Israel', 'Music', 'Shoah', 0, 1, ''),
(147, 'Laure Adler Robert Badinter antisémitisme', 'http://www.franceinter.fr/player/reecouter?play=1252509', '', 8, 'Antisémitisme', 'Antisémitisme', 'Antisémitisme', 0, 1, ''),
(148, 'Groupe Mutuel', 'https://access.groupemutuel.ch/authent/auth/login?execution=e2s1&APPLICATION=ext-extranet-assure', '', 1, 'Others', '', 'Me', 0, 1, ''),
(149, 'Tailor Made sur mesure', 'https://www.tailorstore.ch/fr', '', 1, 'Others', 'Me', 'Me', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `links_category`
--

CREATE TABLE IF NOT EXISTS `links_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `rank` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `links_category`
--

INSERT INTO `links_category` (`id`, `category`, `rank`) VALUES
(1, 'Others', 0),
(2, 'PHP', 1),
(3, 'SQL', 4),
(4, 'Javascript', 5),
(5, 'HTML', 7),
(6, 'Bootstrap', 6),
(7, 'Israel', 15),
(8, 'Antisémitisme', 16),
(9, 'Handicap', 17),
(11, 'Programming', 8),
(12, 'MVC Framework', 14),
(13, 'Other Programing', 9),
(14, 'SQLServer', 2),
(15, 'Visual Studio', 3),
(16, 'JQuery', 5),
(17, 'Java Android', 3),
(18, 'Udemy', 10),
(19, 'SuperLearning', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mycigarette`
--

CREATE TABLE IF NOT EXISTS `mycigarette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_cig` int(11) NOT NULL DEFAULT '1',
  `cig_date` date NOT NULL,
  `cig_date_time` datetime NOT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `mycigarette`
--

INSERT INTO `mycigarette` (`id`, `number_cig`, `cig_date`, `cig_date_time`, `comment`) VALUES
(1, 5, '2015-12-29', '2015-12-29 13:37:39', ''),
(2, 1, '2015-12-29', '2015-12-29 16:04:20', 'Added automatically!'),
(3, 1, '2015-12-29', '2015-12-29 16:04:22', 'Added automatically!'),
(4, 1, '2015-12-29', '2015-12-29 16:06:56', 'Added automatically!'),
(5, 1, '2015-12-29', '2015-12-29 16:07:36', 'Added automatically!'),
(6, 1, '2015-12-29', '2015-12-29 16:08:43', 'Added automatically!'),
(7, 1, '2015-12-29', '2015-12-29 16:08:46', 'Added automatically!'),
(8, 1, '2015-12-29', '2015-12-29 16:08:49', 'Added automatically!'),
(9, 1, '2015-12-29', '2015-12-29 16:09:25', 'Added automatically!'),
(10, 1, '2015-12-29', '2015-12-29 16:11:31', 'Added automatically!'),
(11, 1, '2015-12-29', '2015-12-29 16:19:48', 'Added automatically!'),
(12, 1, '2015-12-29', '2015-12-29 17:50:12', 'Added automatically!'),
(13, 1, '2015-12-29', '2015-12-29 18:48:28', 'Added automatically!'),
(14, 1, '2015-12-29', '2015-12-29 19:30:36', 'Added automatically!'),
(15, 1, '2015-12-29', '2015-12-29 20:20:25', 'Added automatically!'),
(16, 1, '2015-12-29', '2015-12-29 22:39:51', 'Added automatically!'),
(17, 1, '2015-12-29', '2015-12-29 23:05:10', 'Added automatically!'),
(18, 1, '2015-12-30', '2015-12-30 00:46:53', 'Added automatically!'),
(19, 1, '2015-12-30', '2015-12-30 01:01:43', 'Added automatically!'),
(20, 1, '2015-12-30', '2015-12-30 12:53:08', 'Added automatically!'),
(21, 1, '2015-12-30', '2015-12-30 13:19:36', 'Added automatically!'),
(22, 1, '2015-12-30', '2015-12-30 13:51:07', 'Added automatically!'),
(23, 1, '2015-12-30', '2015-12-30 14:45:50', 'Added automatically!'),
(24, 1, '2015-12-30', '2015-12-30 15:03:30', 'Added automatically!'),
(25, 1, '2015-12-30', '2015-12-30 16:29:28', 'Added automatically!'),
(26, 1, '2015-12-30', '2015-12-30 16:57:49', 'Added automatically!'),
(27, 5, '2015-12-30', '2015-12-30 20:12:00', ''),
(28, 1, '2015-12-30', '2015-12-30 20:21:40', 'Added automatically!'),
(29, 1, '2015-12-30', '2015-12-30 21:24:11', 'Added automatically!'),
(30, 1, '2015-12-30', '2015-12-30 22:25:15', 'Added automatically!'),
(31, 1, '2015-12-30', '2015-12-30 22:33:59', 'Added automatically!'),
(32, 1, '2015-12-30', '2015-12-30 23:23:17', 'Added automatically!'),
(33, 1, '2015-12-30', '2015-12-30 23:23:20', 'Added automatically!'),
(35, 1, '2015-12-31', '2015-12-31 00:12:34', 'Added automatically!'),
(36, 1, '2015-12-31', '2015-12-31 10:52:54', 'Added automatically!'),
(37, 1, '2015-12-31', '2015-12-31 10:52:56', 'Added automatically!'),
(38, 1, '2015-12-31', '2015-12-31 11:15:14', 'Added automatically!'),
(39, 1, '2015-12-31', '2015-12-31 12:07:29', 'Added automatically!'),
(40, 1, '2015-12-31', '2015-12-31 12:24:14', 'Added automatically!'),
(41, 1, '2015-12-31', '2015-12-31 13:51:54', 'Added automatically!'),
(42, 1, '2015-12-31', '2015-12-31 17:01:29', 'Added automatically!'),
(43, 4, '2015-12-31', '2015-12-31 17:02:08', ''),
(44, 1, '2015-12-31', '2015-12-31 17:43:01', 'Added automatically!'),
(45, 1, '2015-12-31', '2015-12-31 19:47:17', 'Added automatically!'),
(46, 1, '2015-12-31', '2015-12-31 21:07:44', 'Added automatically!'),
(47, 1, '2015-12-31', '2015-12-31 21:37:35', 'Added automatically!'),
(48, 1, '2015-12-31', '2015-12-31 23:25:16', 'Added automatically!'),
(49, 1, '2015-12-31', '2015-12-31 23:54:53', 'Added automatically!'),
(50, 1, '2016-01-01', '2016-01-01 00:06:29', 'Added automatically!'),
(51, 1, '2016-01-01', '2016-01-01 00:50:26', 'Added automatically!'),
(52, 1, '2016-01-01', '2016-01-01 01:34:54', 'Added automatically!'),
(53, 1, '2016-01-01', '2016-01-01 12:36:29', 'Added automatically!'),
(54, 1, '2016-01-01', '2016-01-01 13:02:32', 'Added automatically!'),
(55, 1, '2016-01-01', '2016-01-01 13:06:51', 'Added automatically!'),
(56, 1, '2016-01-01', '2016-01-01 13:49:08', 'Added automatically!'),
(57, 1, '2016-01-01', '2016-01-01 14:10:15', 'Added automatically!'),
(58, 1, '2016-01-01', '2016-01-01 14:25:21', 'Added automatically!'),
(59, 1, '2016-01-01', '2016-01-01 15:17:29', 'Added automatically!'),
(60, 1, '2016-01-01', '2016-01-01 15:36:02', 'Added automatically!'),
(61, 1, '2016-01-01', '2016-01-01 16:16:48', 'Added automatically!'),
(62, 1, '2016-01-01', '2016-01-01 16:27:50', 'Added automatically!'),
(63, 1, '2016-01-01', '2016-01-01 18:12:08', 'Added automatically!'),
(64, 1, '2016-01-01', '2016-01-01 19:10:54', 'Added automatically!'),
(65, 1, '2016-01-01', '2016-01-01 19:32:49', 'Added automatically!'),
(66, 1, '2016-01-01', '2016-01-01 20:37:11', 'Added automatically!'),
(67, 1, '2016-01-01', '2016-01-01 21:24:38', 'Added automatically!'),
(68, 1, '2016-01-01', '2016-01-01 21:30:25', 'Added automatically!'),
(69, 1, '2016-01-01', '2016-01-01 23:06:15', 'Added automatically!'),
(70, 1, '2016-01-01', '2016-01-01 23:54:41', 'Added automatically!'),
(71, 1, '2016-01-02', '2016-01-02 11:48:41', 'Added automatically!'),
(73, 1, '2016-01-02', '2016-01-02 12:26:09', 'Added automatically!'),
(74, 1, '2016-01-02', '2016-01-02 12:44:16', 'Added automatically!'),
(75, 1, '2016-01-02', '2016-01-02 13:07:23', 'Added automatically!'),
(76, 1, '2016-01-02', '2016-01-02 13:24:15', 'Added automatically!'),
(77, 1, '2016-01-02', '2016-01-02 13:57:27', 'Added automatically!'),
(78, 1, '2016-01-02', '2016-01-02 15:25:53', 'Added automatically!'),
(79, 1, '2016-01-02', '2016-01-02 16:07:33', 'Added automatically!'),
(80, 1, '2016-01-02', '2016-01-02 17:09:06', 'Added automatically!'),
(81, 1, '2016-01-02', '2016-01-02 17:30:37', 'Added automatically!'),
(82, 1, '2016-01-02', '2016-01-02 17:50:34', 'Added automatically!'),
(83, 1, '2016-01-02', '2016-01-02 18:07:09', 'Added automatically!'),
(84, 1, '2016-01-02', '2016-01-02 18:40:41', 'Added automatically!'),
(85, 1, '2016-01-02', '2016-01-02 18:59:03', 'Added automatically!'),
(86, 1, '2016-01-02', '2016-01-02 19:20:09', 'Added automatically!'),
(87, 1, '2016-01-02', '2016-01-02 19:25:05', 'Added automatically!'),
(88, 1, '2016-01-02', '2016-01-02 20:13:36', 'Added automatically!'),
(89, 1, '2016-01-02', '2016-01-02 21:04:35', 'Added automatically!'),
(90, 1, '2016-01-02', '2016-01-02 22:30:23', 'Added automatically!'),
(91, 1, '2016-01-02', '2016-01-02 23:43:41', 'Added automatically!'),
(92, 1, '2016-01-03', '2016-01-03 00:53:06', 'Added automatically!'),
(93, 1, '2016-01-03', '2016-01-03 11:44:36', 'Added automatically!'),
(94, 1, '2016-01-03', '2016-01-03 11:44:39', 'Added automatically!'),
(95, 1, '2016-01-03', '2016-01-03 17:56:32', 'Added automatically!'),
(96, 1, '2016-01-03', '2016-01-03 17:56:34', 'Added automatically!'),
(97, 1, '2016-01-03', '2016-01-03 17:56:35', 'Added automatically!'),
(98, 1, '2016-01-03', '2016-01-03 17:56:36', 'Added automatically!'),
(99, 1, '2016-01-03', '2016-01-03 18:16:24', 'Added automatically!'),
(100, 1, '2016-01-03', '2016-01-03 18:56:11', 'Added automatically!'),
(101, 1, '2016-01-03', '2016-01-03 20:43:46', 'Added automatically!'),
(102, 1, '2016-01-03', '2016-01-03 21:11:10', 'Added automatically!'),
(103, 1, '2016-01-03', '2016-01-03 21:38:44', 'Added automatically!'),
(104, 1, '2016-01-03', '2016-01-03 22:20:06', 'Added automatically!'),
(105, 1, '2016-01-03', '2016-01-03 22:41:37', 'Added automatically!'),
(106, 1, '2016-01-03', '2016-01-03 23:14:21', 'Added automatically!'),
(107, 1, '2016-01-03', '2016-01-03 23:52:57', 'Added automatically!'),
(108, 1, '2016-01-04', '2016-01-04 00:05:18', 'Added automatically!'),
(109, 1, '2016-01-04', '2016-01-04 10:49:46', 'Added automatically!'),
(110, 1, '2016-01-04', '2016-01-04 10:49:50', 'Added automatically!'),
(111, 1, '2016-01-04', '2016-01-04 11:13:17', 'Added automatically!'),
(112, 1, '2016-01-04', '2016-01-04 11:33:56', 'Added automatically!'),
(113, 7, '2016-01-04', '2016-01-04 19:01:23', ''),
(114, 1, '2016-01-04', '2016-01-04 19:01:49', 'Added automatically!'),
(115, 1, '2016-01-04', '2016-01-04 19:11:24', 'Added automatically!'),
(116, 1, '2016-01-04', '2016-01-04 20:41:06', 'Added automatically!'),
(117, 1, '2016-01-04', '2016-01-04 20:41:09', 'Added automatically!'),
(118, 1, '2016-01-04', '2016-01-04 20:43:01', 'Added automatically!'),
(119, 1, '2016-01-04', '2016-01-04 20:50:22', 'Added automatically!'),
(120, 1, '2016-01-04', '2016-01-04 22:38:54', 'Added automatically!'),
(121, 1, '2016-01-04', '2016-01-04 23:17:55', 'Added automatically!'),
(122, 1, '2016-01-04', '2016-01-04 23:57:43', 'Added automatically!'),
(123, 1, '2016-01-05', '2016-01-05 10:41:35', 'Added automatically!'),
(124, 1, '2016-01-05', '2016-01-05 10:41:37', 'Added automatically!'),
(125, 1, '2016-01-05', '2016-01-05 11:04:23', 'Added automatically!'),
(126, 1, '2016-01-05', '2016-01-05 11:11:26', 'Added automatically!'),
(127, 1, '2016-01-05', '2016-01-05 12:19:34', 'Added automatically!'),
(128, 1, '2016-01-05', '2016-01-05 12:47:33', 'Added automatically!'),
(129, 1, '2016-01-05', '2016-01-05 13:54:41', 'Added automatically!'),
(130, 1, '2016-01-05', '2016-01-05 13:54:44', 'Added automatically!'),
(131, 4, '2016-01-05', '2016-01-05 19:18:43', ''),
(132, 1, '2016-01-05', '2016-01-05 21:29:18', 'Added automatically!'),
(133, 1, '2016-01-05', '2016-01-05 21:49:06', 'Added automatically!'),
(134, 1, '2016-01-05', '2016-01-05 22:29:21', 'Added automatically!'),
(135, 1, '2016-01-05', '2016-01-05 23:03:01', 'Added automatically!'),
(136, 1, '2016-01-05', '2016-01-05 23:27:19', 'Added automatically!'),
(137, 1, '2016-01-06', '2016-01-06 11:20:59', 'Added automatically!'),
(138, 1, '2016-01-06', '2016-01-06 11:27:51', 'Added automatically!'),
(139, 1, '2016-01-06', '2016-01-06 12:43:03', 'Added automatically!'),
(140, 1, '2016-01-06', '2016-01-06 12:43:06', 'Added automatically!'),
(141, 9, '2016-01-06', '2016-01-06 19:17:07', ''),
(142, 1, '2016-01-07', '2016-01-07 00:05:32', 'Added automatically!'),
(150, 6, '2016-01-06', '2016-01-07 00:06:36', ''),
(151, 1, '2016-01-07', '2016-01-07 00:24:34', 'Added automatically!'),
(152, 1, '2016-01-07', '2016-01-07 00:24:36', 'Added automatically!'),
(153, 1, '2016-01-07', '2016-01-07 01:34:58', 'Added automatically!'),
(154, 1, '2016-01-07', '2016-01-07 01:50:17', 'Added automatically!'),
(155, 1, '2016-01-07', '2016-01-07 11:28:20', 'Added automatically!'),
(156, 1, '2016-01-07', '2016-01-07 11:41:00', 'Added automatically!'),
(157, 1, '2016-01-07', '2016-01-07 12:47:06', 'Added automatically!'),
(158, 1, '2016-01-07', '2016-01-07 12:47:09', 'Added automatically!'),
(159, 1, '2016-01-07', '2016-01-07 12:48:12', 'Added automatically!'),
(160, 1, '2016-01-07', '2016-01-07 18:43:18', 'Added automatically!'),
(161, 1, '2016-01-07', '2016-01-07 18:43:20', 'Added automatically!'),
(162, 1, '2016-01-07', '2016-01-07 18:43:21', 'Added automatically!'),
(163, 1, '2016-01-07', '2016-01-07 18:43:23', 'Added automatically!'),
(164, 1, '2016-01-07', '2016-01-07 18:43:24', 'Added automatically!'),
(165, 1, '2016-01-07', '2016-01-07 18:43:24', 'Added automatically!'),
(166, 1, '2016-01-07', '2016-01-07 19:12:36', 'Added automatically!'),
(167, 1, '2016-01-07', '2016-01-07 19:12:49', 'Added automatically!'),
(168, 1, '2016-01-07', '2016-01-07 23:59:13', 'Added automatically!'),
(169, 1, '2016-01-07', '2016-01-07 23:59:15', 'Added automatically!'),
(170, 1, '2016-01-07', '2016-01-07 23:59:16', 'Added automatically!'),
(171, 1, '2016-01-07', '2016-01-07 23:59:17', 'Added automatically!'),
(172, 1, '2016-01-08', '2016-01-08 00:00:33', 'Added automatically!'),
(173, 1, '2016-01-08', '2016-01-08 00:24:00', 'Added automatically!'),
(174, 1, '2016-01-08', '2016-01-08 08:10:18', 'Added automatically!'),
(175, 1, '2016-01-08', '2016-01-08 15:52:47', 'Added automatically!'),
(176, 1, '2016-01-08', '2016-01-08 15:52:49', 'Added automatically!'),
(177, 1, '2016-01-08', '2016-01-08 16:31:57', 'Added automatically!'),
(178, 1, '2016-01-08', '2016-01-08 17:45:01', 'Added automatically!'),
(179, 1, '2016-01-08', '2016-01-08 17:45:02', 'Added automatically!'),
(180, 1, '2016-01-08', '2016-01-08 20:54:31', 'Added automatically!'),
(181, 1, '2016-01-08', '2016-01-08 21:08:49', 'Added automatically!'),
(182, 1, '2016-01-08', '2016-01-08 21:22:04', 'Added automatically!'),
(183, 1, '2016-01-09', '2016-01-09 00:00:40', 'Added automatically!'),
(184, 1, '2016-01-09', '2016-01-09 00:00:58', 'Added automatically!'),
(185, 1, '2016-01-09', '2016-01-09 10:43:10', 'Added automatically!'),
(186, 1, '2016-01-09', '2016-01-09 11:16:55', 'Added automatically!'),
(187, 1, '2016-01-09', '2016-01-09 11:55:01', 'Added automatically!'),
(188, 1, '2016-01-09', '2016-01-09 23:18:32', 'Added automatically!'),
(189, 1, '2016-01-09', '2016-01-09 23:18:34', 'Added automatically!'),
(190, 1, '2016-01-09', '2016-01-09 23:18:35', 'Added automatically!'),
(191, 1, '2016-01-09', '2016-01-09 23:18:35', 'Added automatically!'),
(192, 1, '2016-01-09', '2016-01-09 23:18:36', 'Added automatically!'),
(193, 1, '2016-01-09', '2016-01-09 23:18:37', 'Added automatically!'),
(194, 1, '2016-01-09', '2016-01-09 23:18:37', 'Added automatically!'),
(195, 1, '2016-01-09', '2016-01-09 23:46:45', 'Added automatically!'),
(196, 1, '2016-01-10', '2016-01-10 00:15:16', 'Added automatically!'),
(197, 1, '2016-01-10', '2016-01-10 11:26:08', 'Added automatically!'),
(198, 1, '2016-01-10', '2016-01-10 11:26:13', 'Added automatically!'),
(199, 1, '2016-02-06', '2016-02-06 01:48:33', 'Added automatically!'),
(200, 1, '2016-02-11', '2016-02-11 23:02:09', 'Added automatically!'),
(201, 1, '2016-03-15', '2016-03-15 12:03:25', 'Added automatically!'),
(202, 1, '2016-03-25', '2016-03-25 01:10:45', 'Added automatically!'),
(203, 1, '2016-03-25', '2016-03-25 01:52:45', 'Added automatically!'),
(204, 1, '2016-03-25', '2016-03-25 10:59:48', 'Added automatically!'),
(205, 1, '2016-04-01', '2016-04-01 19:09:02', 'Added automatically!'),
(206, 1, '2016-04-15', '2016-04-15 11:18:35', 'Added automatically!'),
(207, 1, '2016-04-15', '2016-04-15 11:19:53', 'Added automatically!'),
(208, 1, '2016-04-15', '2016-04-15 11:20:42', 'Added automatically!');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mycigarette_view_by_day`
--
CREATE TABLE IF NOT EXISTS `mycigarette_view_by_day` (
`year` int(4)
,`month` varchar(9)
,`date` date
,`total` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mycigarette_view_by_month`
--
CREATE TABLE IF NOT EXISTS `mycigarette_view_by_month` (
`year` int(4)
,`monthno` int(2)
,`month` varchar(14)
,`total` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mycigarette_view_by_year`
--
CREATE TABLE IF NOT EXISTS `mycigarette_view_by_year` (
`year` int(4)
,`total` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Table structure for table `myexpense`
--

CREATE TABLE IF NOT EXISTS `myexpense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `person_name` varchar(50) DEFAULT NULL,
  `expense_type` varchar(50) DEFAULT NULL,
  `expense_date` date NOT NULL,
  `comment` text,
  `modification_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `myexpense`
--

INSERT INTO `myexpense` (`id`, `amount`, `person_name`, `expense_type`, `expense_date`, `comment`, `modification_time`) VALUES
(2, '20000.00', 'Pablo', 'Pret', '2014-04-14', '', '2016-04-14 00:39:24'),
(3, '1700.00', 'Pablo', 'Pret', '2016-03-31', '', '2016-04-14 00:41:24'),
(4, '5000.00', 'Pablo', 'Rbt', '2016-04-14', '', '2016-04-14 00:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `myexpense_person`
--

CREATE TABLE IF NOT EXISTS `myexpense_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(50) DEFAULT NULL,
  `rank` int(11) unsigned DEFAULT '1',
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `myexpense_person`
--

INSERT INTO `myexpense_person` (`id`, `person_name`, `rank`, `comment`) VALUES
(1, 'Pablo', 1, ''),
(2, 'Maman', 2, ''),
(3, 'Papa', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `myexpense_type`
--

CREATE TABLE IF NOT EXISTS `myexpense_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type` varchar(50) DEFAULT NULL,
  `rank` int(11) unsigned DEFAULT '1',
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `myexpense_type`
--

INSERT INTO `myexpense_type` (`id`, `expense_type`, `rank`, `comment`) VALUES
(1, 'Pret', 1, ''),
(3, 'Rbt', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `notifications_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(10) NOT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `closed` tinyint(1) DEFAULT '0',
  `currency_iso` varchar(3) DEFAULT 'CHF',
  `vat` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `comment` text,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_code` (`project_code`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_code`, `project_name`, `client_id`, `pseudo`, `start_date`, `end_date`, `closed`, `currency_iso`, `vat`, `comment`, `input_date`) VALUES
(4, 'RAJAH', 'India inc', 6, 'Tour_Patient', '2015-10-02', '2015-10-15', 0, 'CHF', 'Yes', '', '2015-10-13 01:14:30'),
(5, 'KAMY', 'kamy', 4, 'COLLINE', '2015-10-20', '0000-00-00', 0, 'INR', 'Yes', '', '2015-10-15 14:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `reset_token` varchar(70) DEFAULT NULL,
  `block_user` tinyint(1) DEFAULT '0',
  `address` varchar(100) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `img` longblob,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hashed_password`, `nom`, `email`, `user_type`, `user_type_id`, `first_name`, `last_name`, `user_image`, `reset_token`, `block_user`, `address`, `cp`, `city`, `country`, `phone`, `mobile`, `img`, `input_date`) VALUES
(1, 'admin', '$2y$10$YzYyN2U3MjBkNGQ4MTliOOYg0RfXSbg5pFOVsO1vOeEFamBhPdnYS', 'admin', 'webmaster@ikamy.ch', 'admin', 1, '', '', 'kamy3.jpg', '', 0, '', '', '', '', '', '', NULL, '2015-09-17 23:10:25'),
(4, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch', 'employee', 4, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 23:10:25'),
(5, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com', 'manager', 2, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 23:10:25'),
(7, 'gmail', '$2y$10$MWU4N2E5MDcwNDRjYjM1Mu2URCsGI9fUp9JCdmPZCX1cYOlmzeu5O', 'Kamy employee', 'kamran.nafisspour@gmail.com', 'employee', 4, '', '', '', '', 0, '', '', '', '', '', '', NULL, '2015-09-17 23:10:25'),
(20, 'kamy', '$2y$10$ZDJlYTI1OWU3NjA1ODYxZ.CcW4.WWIlMWs6qVo9KvgjjpaonJR0AC', 'Kamran Nafisspour', 'nafisspour@bluewin.ch', 'admin', 1, 'Kamran', 'Nafisspour', '', '', 0, '', '', '', '', '', '', NULL, '2016-04-02 21:32:55'),
(26, 'test.sql', '$2y$10$MTI5OWUyNzdiYWEzMjJjO.aOmJYfHzX0QikejYi8qxnA6NrEIGp3q', 'test.sql test.sql', 'test@me.com', 'visitor', 5, 'test', 'test', '', '', 0, '', '', '', '', '', '', NULL, '2016-04-13 09:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_type` (`user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `comment`) VALUES
(1, 'admin', NULL),
(2, 'manager', NULL),
(3, 'secretary', NULL),
(4, 'employee', NULL),
(5, 'visitor', NULL);

-- --------------------------------------------------------

--
-- Structure for view `mycigarette_view_by_day`
--
DROP TABLE IF EXISTS `mycigarette_view_by_day`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `mycigarette_view_by_day` AS (select year(`mycigarette`.`cig_date`) AS `year`,monthname(`mycigarette`.`cig_date`) AS `month`,`mycigarette`.`cig_date` AS `date`,sum(`mycigarette`.`number_cig`) AS `total` from `mycigarette` group by `mycigarette`.`cig_date` desc);

-- --------------------------------------------------------

--
-- Structure for view `mycigarette_view_by_month`
--
DROP TABLE IF EXISTS `mycigarette_view_by_month`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `mycigarette_view_by_month` AS (select year(`c`.`cig_date`) AS `year`,month(`c`.`cig_date`) AS `monthno`,concat_ws(' ',monthname(`c`.`cig_date`),year(`c`.`cig_date`)) AS `month`,sum(`c`.`number_cig`) AS `total` from `mycigarette` `c` group by year(`c`.`cig_date`) desc,concat_ws(' ',monthname(`c`.`cig_date`),year(`c`.`cig_date`)) desc);

-- --------------------------------------------------------

--
-- Structure for view `mycigarette_view_by_year`
--
DROP TABLE IF EXISTS `mycigarette_view_by_year`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `mycigarette_view_by_year` AS (select year(`mycigarette`.`cig_date`) AS `year`,sum(`mycigarette`.`number_cig`) AS `total` from `mycigarette` group by year(`mycigarette`.`cig_date`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`category_1_id`) REFERENCES `category_1` (`id`),
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`category_2_id`) REFERENCES `category_2` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice_actual`
--
ALTER TABLE `invoice_actual`
  ADD CONSTRAINT `invoice_actual_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `invoice_actual_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `invoice_estimate`
--
ALTER TABLE `invoice_estimate`
  ADD CONSTRAINT `invoice_estimate_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `invoice_estimate_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `invoice_send`
--
ALTER TABLE `invoice_send`
  ADD CONSTRAINT `invoice_send_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `links_category` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
