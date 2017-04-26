-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: hhbz.myd.infomaniak.com
-- Generation Time: Apr 24, 2017 at 03:46 AM
-- Server version: 5.6.33-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhbz_ikamych2`
--
CREATE DATABASE IF NOT EXISTS `hhbz_ikamych3`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE `hhbz_ikamych3`;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_ip`
--

DROP TABLE IF EXISTS transport_addresse;
DROP TABLE IF EXISTS transport_type_pricing;


DROP TABLE IF EXISTS DatabaseCourse_Programe;
DROP TABLE IF EXISTS DatabaseCourse;
DROP TABLE IF EXISTS DatabaseFacturation;
DROP TABLE IF EXISTS DatabasePaiement;
DROP TABLE IF EXISTS DatabaseClient;


DROP TABLE IF EXISTS transport_programming;
DROP TABLE IF EXISTS transport_programming_model;


DROP TABLE IF EXISTS transport_type_facturation;

DROP TABLE IF EXISTS transport_article;

DROP TABLE IF EXISTS transport_zone;

DROP TABLE IF EXISTS transport_chauffeurs;
DROP TABLE IF EXISTS transport_clients;
DROP TABLE IF EXISTS transport_type;


DROP TABLE IF EXISTS blacklist_ip;
DROP TABLE IF EXISTS chat;
DROP TABLE IF EXISTS chat_friend;
DROP TABLE IF EXISTS failed_logins;
DROP TABLE IF EXISTS links;
DROP TABLE IF EXISTS links_category;
DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS note;
DROP TABLE IF EXISTS notifications;
DROP TABLE IF EXISTS to_do_list;
DROP TABLE IF EXISTS currency;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_type;

DROP VIEW IF EXISTS transport_model;
DROP VIEW IF EXISTS transport_model_visible_no;
DROP VIEW IF EXISTS transport_model_visible_yes;
DROP VIEW IF EXISTS transport_model_pivot;
DROP VIEW IF EXISTS transport_model_pivot_visible_yes;
DROP VIEW IF EXISTS transport_model_pivot_visible_no;
DROP VIEW IF EXISTS transport_summary_by_course_date_program;


CREATE TABLE `blacklist_ip` (
  `id`           INT(11)     NOT NULL,
  `ip`           VARCHAR(50) NOT NULL,
  `login_failed` INT(11)     NOT NULL,
  `input_date`   TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id`            INT(11)      NOT NULL,
  `user_id`       INT(11)      NOT NULL,
  `to_user_id`    VARCHAR(255)          DEFAULT NULL,
  `to_user_id_cc` VARCHAR(255) NOT NULL DEFAULT '1',
  `readit`        TINYINT(1)   NOT NULL DEFAULT '0',
  `message`       VARCHAR(255)          DEFAULT NULL,
  `input_date`    TIMESTAMP    NULL     DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

CREATE TABLE `message` (
  `id`            INT(11)      NOT NULL,
  `user_id`       INT(11)      NOT NULL,
  `to_user_id`    VARCHAR(255)          DEFAULT NULL,
  `to_user_id_cc` VARCHAR(255) NOT NULL DEFAULT '1',
  `readit`        TINYINT(1)   NOT NULL DEFAULT '0',
  `message`       VARCHAR(255)          DEFAULT NULL,
  `input_date`    TIMESTAMP    NULL     DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- ----------
--
-- Table structure for table `chat_friend`
--

CREATE TABLE `chat_friend` (
  `id`       INT(11) UNSIGNED NOT NULL,
  `user_id`  VARCHAR(50)      NOT NULL,
  `username` VARCHAR(50)      NOT NULL,
  `message`  TEXT,
  `date`     TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img`      VARCHAR(259)              DEFAULT NULL,
  `read1`    TINYINT(1)       NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id`               INT(11) UNSIGNED NOT NULL,
  `currency`         VARCHAR(3)                DEFAULT NULL,
  `currency_country` VARCHAR(50)               DEFAULT NULL,
  `rate`             DECIMAL(10, 5)            DEFAULT NULL,
  `date`             DATE             NOT NULL,
  `rank`             INT(11) UNSIGNED          DEFAULT '1',
  `comment`          TEXT,
  `input_date`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` VALUES
  (1, 'CHF', 'CH', '1.00000', '2016-04-03', 1, '<p><strong>enjoy This contry is great</strong></p>',
   '2016-04-02 21:38:56');
INSERT INTO `currency` VALUES (2, 'USD', 'US', '0.98000', '2016-04-19', 2, '', '2016-04-19 19:23:14');
INSERT INTO `currency` VALUES (3, 'EUR', 'EU', '1.18000', '2016-04-30', 3, NULL, '2016-04-30 21:49:38');
INSERT INTO `currency` VALUES (4, 'YEN', 'JP', '1.00000', '2016-10-21', 7, '', '2016-10-21 08:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id`            INT(11)     NOT NULL,
  `username`      VARCHAR(50) NOT NULL,
  `login_attempt` INT(11)     NOT NULL,
  `last_time`     INT(11)     NOT NULL,
  `ip`            VARCHAR(50)          DEFAULT NULL,
  `host`          VARCHAR(80)          DEFAULT NULL,
  `input_date`    TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id`             INT(11)     NOT NULL,
  `name`           VARCHAR(50) NOT NULL,
  `web_address`    TEXT,
  `description`    TEXT,
  `category_id`    INT(11)     NOT NULL DEFAULT '1',
  `category`       VARCHAR(50) NOT NULL DEFAULT 'Others',
  `sub_category_1` VARCHAR(50)          DEFAULT NULL,
  `sub_category_2` VARCHAR(50)          DEFAULT NULL,
  `privacy`        TINYINT(1)           DEFAULT '0',
  `rank`           INT(11)              DEFAULT '0',
  `username`       VARCHAR(50) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` VALUES (4, 'Facebook', 'https://www.facebook.com/', '', 1, 'Others', '', '', 0, 127, 'kamy');
INSERT INTO `links` VALUES
  (5, 'Lotto Suisse', 'https://jeux.loro.ch/FR/1/homepage?cid=ppc/fr/google/Loro/Adwords//tous/juin2012#action=play',
      '', 1, 'Others', '', '', 0, 127, 'kamy');
INSERT INTO `links` VALUES (6, 'Linkedin', 'https://www.linkedin.com/nhome/', '', 1, 'Others', '', '', 0, 127, 'kamy');
INSERT INTO `links` VALUES
  (7, 'Introducing-PHP', 'http://www.lynda.com/PHP-tutorials/Introducing-PHP/123485-2.html', '', 2, 'PHP', '', '', 0, 1,
      'kamy');
INSERT INTO `links` VALUES (8, 'PHP-MySQL-Essential-Training Kevin Skoglund',
                               'http://www.lynda.com/MySQL-tutorials/PHP-MySQL-Essential-Training/119003-2.html', '', 2,
                               'PHP', '', '', 0, 2, 'kamy');
INSERT INTO `links` VALUES (9, 'php-with-OOP-beyond-the-basics Kevin Skoglund',
                               'http://www.lynda.com/PHP-tutorials/php-with-OOP-beyond-the-basics/653-2.html', '', 2,
                               'PHP', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES
  (10, 'PHP Date Time', 'http://www.lynda.com/PHP-tutorials/Setting-date-time-independently/188214/375112-4.html', '',
       2, 'PHP', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (11, 'Exporting Data to Files with PHP',
                                'http://www.lynda.com/PHP-tutorials/Exporting-Data-Files-PHP/158375-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 2, 'PHP', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (12, 'Uploading Files Securely with PHP',
                                'http://www.lynda.com/PHP-tutorials/Uploading-Files-Securely-PHP/158374-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 2, 'PHP', '', '', 0, 127, 'kamy');
INSERT INTO `links` VALUES (13, 'Up and Running with PHP SimpleXML David Powers',
                                'http://www.lynda.com/PHP-tutorials/Up-Running-PHP-SimpleXML/370013-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 2, 'PHP', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (14, 'Creating Secure PHP Websites Kevin Skoglund',
                                'http://www.lynda.com/PHP-tutorials/Creating-Secure-PHP-Websites/133321-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2',
                                '', 2, 'PHP', '', '', 0, 6, 'kamy');
INSERT INTO `links` VALUES (15, 'Up and Running - Standard PHP Library David Powers',
                                'http://www.lynda.com/PHP-tutorials/Up-Running-Standard-PHP-Library/175038-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2',
                                '', 2, 'PHP', '', '', 0, 10, 'kamy');
INSERT INTO `links` VALUES (16, 'Accessing Databases with Object-Oriented PHP',
                                'http://www.lynda.com/PHP-tutorials/Accessing-Databases-Object-Oriented-PHP/169106-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2',
                                '', 2, 'PHP', '', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES (17, 'Object-Oriented Programming with PHP',
                                'http://www.lynda.com/PHP-tutorials/Object-Oriented-Programming-PHP/107953-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2',
                                'John Peck  \nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.',
                                2, 'PHP', '', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES (18, 'Up-Running-MySQL-Development',
                                'http://www.lynda.com/MySQL-tutorials/Up-Running-MySQL-Development/158373-2.html', '',
                                3, 'SQL', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES
  (19, 'MySQL-Essential-Training', 'http://www.lynda.com/MySQL-tutorials/MySQL-Essential-Training/139986-2.html', '', 3,
       'SQL', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES (20, 'Lynda Search PHP', 'http://www.lynda.com/search?q=php',
                                'John Peck  \nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.',
                                2, 'PHP', '', '', 0, 127, 'kamy');
INSERT INTO `links` VALUES
  (21, 'Up-Running-phpMyAdmin', 'http://www.lynda.com/MySQL-tutorials/Up-Running-phpMyAdmin/418255-2.html', '', 2,
       'PHP', '', '', 0, 127, '');
INSERT INTO `links` VALUES (22, 'JQuery-Essential',
                                'http://www.lynda.com/jQuery-tutorials/jQuery-Essential-Training/183382-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES (23, 'Jquery Mobile Esstl',
                                'http://www.lynda.com/jQuery-Mobile-tutorials/jQuery-Mobile-Essential-Training/167067-2.html',
                                '', 4, 'JQuery', '', '', 0, 2, 'kamy');
INSERT INTO `links`
VALUES (24, 'Lynda search jquery', 'http://www.lynda.com/search?q=jquery', '', 4, 'JQuery', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES
  (25, 'Lynda search jquery mobile', 'http://www.lynda.com/search?q=jquery+mobile', '', 4, 'JQuery', '', '', 0, 4,
       'kamy');
INSERT INTO `links` VALUES (26, 'Ajax Lynda',
                                'http://www.lynda.com/Ajax-tutorials/Updating-information-without-reloading-page-using-AJAX/150163/155367-4.html',
                                '', 4, 'JQuery', '', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES
  (27, 'HTML-Essential-Training', 'http://www.lynda.com/HTML-tutorials/HTML-Essential-Training-2012/99326-2.html', '',
       5, 'HTML', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES (28, 'Creating a Responsive Web Design',
                                'http://www.lynda.com/CSS-tutorials/Accessing-code-HTML-CSS-Dreamweaver/110716/114021-4.html?autoplay=true',
                                '', 5, 'HTML', '', '', 0, 2, 'kamy');
INSERT INTO `links`
VALUES (29, 'Responsive-Design-Fundamentals', 'Responsive-Design-Fundamentals', '', 5, 'HTML', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES (30, 'Bootstrap Site', 'http://getbootstrap.com/', '', 6, 'Bootstrap', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES
  (31, 'bootstrap search Lynda', 'http://www.lynda.com/search?q=bootstrap', '', 6, 'Bootstrap', '', '', 0, 2, 'kamy');
INSERT INTO `links` VALUES (32, 'Bootstrap-Lynda Basic',
                                'http://www.lynda.com/Bootstrap-tutorials/Using-exercise-files/133339/151271-4.html?autoplay=true',
                                '', 6, 'Bootstrap', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES (33, 'Bootstrap Lynda interactive',
                                'http://www.lynda.com/Bootstrap-tutorials/Planning-thumbnail-gallery/161098/176516-4.html',
                                '', 6, 'Bootstrap', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES (34, 'Google map geolocalisation',
                                'http://www.sitepoint.com/find-a-route-using-the-geolocation-and-the-google-maps-api/',
                                '', 6, 'Bootstrap', '', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES (35, 'Bootstrap Layouts: Responsive Single-Page Design',
                                'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-Layouts-Responsive-Single-Page-Design/186538-2.html',
                                '', 6, 'Bootstrap', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES
  (36, 'lynda.search Bootstrap', 'http://www.lynda.com/search?q=Bootstrap', '', 6, 'Bootstrap', '', '', 0, 6, 'kamy');
INSERT INTO `links` VALUES (38, 'Bootstrap Site', 'http://getbootstrap.com/', '', 6, 'Bootstrap', '', '', 0, 1, '');
INSERT INTO `links` VALUES (39, 'Advanced Topics in MySQL and MariaDB',
                                'http://www.lynda.com/MariaDB-tutorials/Advanced-Topics-MySQL-MariaDB/175635-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:mysql%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'Learn how to perform a variety of advanced administration tasks in both MariaDB and MySQL, two powerful database solutions that work in slightly different ways.',
                                3, 'SQL', '', '', 0, 3, 'kamy');
INSERT INTO `links`
VALUES (40, 'Search Lynda mysql', 'http://www.lynda.com/search?q=mysql', '', 3, 'SQL', '', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES (41, 'Jquery UI',
                                'http://www.lynda.com/jQuery-tutorials/Up-Running-jQuery-UI/186963-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'JQuery', '', '', 0, 6, 'kamy');
INSERT INTO `links` VALUES (42, 'Jquery AJAX',
                                'http://www.lynda.com/jQuery-tutorials/jQuery-Data-AJAX/150163-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'JQuery', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (43, 'Jquery web designers',
                                'http://www.lynda.com/jQuery-tutorials/jQuery-Web-Designers/144204-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'JQuery', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (44, 'jQuery: Creating Plugins',
                                'http://www.lynda.com/jQuery-tutorials/jQuery-Creating-Plugins/364350-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'JQuery', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (45, 'Managing PHP Persistent Sessions David Powers',
                                'http://www.lynda.com/PHP-tutorials/Managing-PHP-Persistent-Sessions/382572-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'Learn how to store persistent PHP session data in a SQL server and create an auto-login system that recognizes returning users.',
                                2, 'PHP', '', '', 0, 10, 'kamy');
INSERT INTO `links` VALUES (46, 'Debugging PHP: Advanced Techniques with Jon Peck',
                                'http://www.lynda.com/PHP-tutorials/Debugging-PHP-Advanced-Techniques/112414-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'Demonstrates how to leverage PHP\'s built-in tools, as well as the Xdebug and Firebug extensions and FirePHP library to improve the quality of your code and reduce troubleshooting overhead.',
                                2, 'PHP', '', '', 0, 10, 'kamy');
INSERT INTO `links` VALUES (47, 'Create an Interactive Map with jQuery with Chris C',
                                'http://www.lynda.com/jQuery-1-5-tutorials/Create-an-Interactive-Map-with-jQuery/87636-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 4, 'JQuery', '', '', 0, 10, 'kamy');
INSERT INTO `links` VALUES
  (49, 'How to handle handicap', 'https://www.facebook.com/spinal.cord.injuries/videos/1169089156449992/?fref=nf',
       'An interesting take on how to act around people with disabilities.', 9, 'Handicap', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES (50, 'Up and Running with Ember.js with Kai Gittens',
                                'http://www.lynda.com/Emberjs-tutorials/Review-routes-Ember-Inspector/178116/191826-4.html?autoplay=true',
                                'Ember.js is a JavaScript framework for creating robust, complex web apps while writing very little code. Ember\'s attraction lies in its built-in template library and rich feature set, which seems to grow almost every day. Understanding the core concepts behind Ember will help you use it now—no matter what enhancements are added in the future. So join Kai Gittens as he introduces Ember\'s routers, templates, and models, and shows how to use templates to create simple pages and dynamically load content using components and Ember Data. Let our training light the spark of learning, and get up and running with Ember today.\r\nTopics include:\r\nInstalling Ember Inspector\r\nReviewing routes with Ember Inspector\r\nLoading templates with routes\r\nCreating links with the link-to helper\r\nAdding component templates\r\nLoading model data\r\nCustomizing components\r\nBuilding nested routes and route objects\r\nLoading data with object and array controllers\r\nCreating interfaces',
                                4, 'Javascript', '', '', 0, 100, '');
INSERT INTO `links` VALUES (51, 'Texte savoureux, vu sur la page du groupe Yiddish ',
                                'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :',
                                'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :\n\n\"Israel c\'est le seul pays\" d\'Ephraim Kishon :\n\nC\'est le seul pays où les chômeurs font la grève\n\n\nC\'est le seul pays qui a deux ministres du trésor et pas un rond.\n\nC\'est le seul pays au monde où le gouvernement finance l\'éducation sectaire et ou l\'éducation gratuite est financée par les parents d\'élèves.\n\nC\'est le seul pays où chaque mère a le numéro du portable du sergent de son fils à l\'armée.\n\nC\'est le seul pays qui importe de l\'eau par bateaux citernes au moment où le pays est inondé par les pluies.\n\nC\'est le seul pays où la chanson la plus populaire dans les clubs de musique transe s\'intitule : « fleurs dans les fusils et filles dans les chars ».\n\nC\'est le seul pays qui a envoyé un satellite de communications dans l\'espace, où on ne vous laisse jamais terminer une phrase.\n\nC\'est le seul pays où sont déjà tombées des fusées d\'Irak, des katyouchas du Liban, des Qassam de Gaza et où un appartement de trois pièces coûte plus cher qu\'à Paris.\n\nC\'est le seul pays où on demande une star porno : qu\'en pense ta mère ?\n\nC\'est le seul pays où on va dîner chez ses parents le vendredi et on occupe le même siège qu\'à l\'âge de 5 ans.\n\nC\'est le seul pays où un repas Israélien est composé d\'une salade arabe, d\'une pita irakienne, d\'un kebab roumain et d\'une crème bavaroise.\n\nC\'est le seul pays où le gars avec la chemise pleine de taches est le ministre et le gars au complet gris, son chauffeur.\n\nC\'est le seul pays où des musulmans vendent des articles religieux aux chrétiens en échange de billets portant l\'effigie du Rambam.\n\nC\'est le seul pays où les jeunes quittent la maison à l\'âge de 18 ans pour revenir y habiter à l\'âge de 24.\n\nC\'est le seul pays où aucune femme n\'est en bons termes avec sa mère mais où elles se parlent néanmoins trois fois par jour.\n\nC\'est le seul pays où on vous montre des photos des enfants alors qu\'ils sont présents.\n\nC\'est le seul pays où on peut connaître la situation sécuritaire selon les chansons à la radio.\n\nC\'est le seul pays où les riches sont à gauche, les pauvres sont à droite et la classe moyenne paie tout.\n\nC\'est le seul pays où on peut obtenir en dix minutes un logiciel pour lancer des vaisseaux spatiaux et où il faut attendre une semaine pour réparer la machine à laver.\n\nC\'est le seul pays où la première fois qu\'on sort avec une fille, on lui demande dans quelle unité elle a servi a l\'armée, et on découvre qu\'elle était parachutiste alors que vous n\'aviez été que caporal à la cantine militaire.\n\nC\'est le seul pays où le décalage entre le jour le plus heureux et le jour le plus triste n\'est souvent que soixante secondes.\n\nC\'est le seul pays où lorsque vous détestez les hommes politiques, les fonctionnaires, les taxes, la qualité du service et la situation en général, vous prouvez que vous aimez le pays et qu\'en fin de compte c\'est le seul pays dans lequel vous pouvez vivre.\"',
                                7, 'Israel', '', '', 0, 2, 'kamy');
INSERT INTO `links` VALUES (52, 'Design Patterns in PHP with Keith Casey',
                                'http://www.lynda.com/PHP-tutorials/What-you-should-know-before-watching-course/186870/370504-4.html',
                                'Write better PHP code by following these popular (and time-tested) design patterns. Developer Keith Casey introduces 11 design patterns that will help you solve common coding challenges and make your intentions clear to future architects of your application. Keith explores use cases for:\n\nAccessing data with the active record and table data gateway patterns\nCreating objects with the factory, singleton, and mock objects patterns\nExtending code with decorator and adapter patterns\nStructuring applications with MVC and Action-Domain-Responder patterns\n\n\nEach chapter features a design pattern in a real-world coding scenario, and closes with a practice challenge to test your new skills.',
                                2, 'PHP', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (53, 'Test-Driven Development with Simon Allardice',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/What-kind-testing/124398/137958-4.html',
                                'Prove your code is working every step of the way using a formalized test-driven development (TDD) process. TDD can be done in every modern programming environment, and for desktop, mobile, or web apps. In this course, Simon Allardice teaches you exactly how to get started with TDD: what makes a good test, why we\'re more interested in failure than success, and how to measure and repeatedly run tests. \n\nThe course explores the jargon of TDD—test suites, test harness, mock and stub objects, and more—and covers how TDD is used in the most common programming languages and environments. Plus learn to create, run, and manage the tests and move to a test-first mindset.\nTopics include:\nWhat is test-driven development?\nUsing unit testing frameworks\nCreating tests\nUsing assertions\nCreating multiple test methods\nNaming unit tests and test methods\nTesting return values\nSetting up and tearing down\nIntroducing mock objects\nMeasuring code coverage',
                                11, 'Programming', 'Foundations of Programming', '', 0, 2, 'kamy');
INSERT INTO `links` VALUES (54, 'Unit Testing with PHPUnit with Kristian Secor',
                                'http://www.lynda.com/PHPUnit-tutorials/Unit-Testing-PHPUnit/175019-2.html',
                                'Unit testing is a way to confirm proper execution of a computer program. PHPUnit provides a testing framework for PHP developers to do it right. This brief course covers everything you\'ll need to get up and running with PHPUnit: where to download it, how to install it, and how to use it to unit test your code. Kristian Secor provides a high-level overview of this invaluable framework, helping you guide test-driven development at your organization.\nTopics include:\nWorking with assertions, annotations, and template methods of testing\nUsing mock and stub objects\nTesting private and protected methods\nLooking for weak spots in your testing, with code coverage\nTesting inherited projects',
                                2, 'PHP', '', '', 0, 100, 'kamy');
INSERT INTO `links` VALUES (55, 'Fundamentals with Simon Allardice',
                                'http://www.lynda.com/JavaScript-tutorials/Foundations-of-Programming-Fundamentals/83603-2.html',
                                'This course provides the core knowledge to begin programming in any language. Simon Allardice uses JavaScript to explore the core syntax of a programming language, and shows how to write and execute your first application and understand what\'s going on under the hood. The course covers creating small programs to explore conditions, loops, variables, and expressions; working with different kinds of data and seeing how they affect memory; writing modular code; and how to debug, all using different approaches to constructing software applications.\n\nFinally, the course compares how code is written in several different languages, the libraries and frameworks that have grown around them, and the reasons to choose each one.\nTopics include:\nWriting source code\nUnderstanding compiled and interpreted languages\nRequesting input\nWorking with numbers, characters, strings, and operators\nWriting conditional code\nMaking the code modular\nWriting loops\nFinding patterns in strings\nWorking with arrays and collections\nAdopting a programming style\nReading and writing to various locations\nDebugging\nManaging memory usage\nLearning about other languages',
                                11, 'Programming', 'Foundations of Programming', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES (56, 'Object-Oriented Design with Simon Allardice',
                                'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Object-Oriented-Design/96949-2.html',
                                'Most modern programming languages, such as Java, C#, Ruby, and Python, are object-oriented languages, which help group individual bits of code into a complex and coherent application. However, object-orientation itself is not a language; it\'s simply a set of ideas and concepts.\n\nLet Simon Allardice introduce you to the terms—words like abstraction, inheritance, polymorphism, subclass—and guide you through defining your requirements and identifying use cases for your program. The course also covers creating conceptual models of your program with design patterns, class and sequence diagrams, and unified modeling language (UML) tools, and then shows how to convert the diagrams into code.\nTopics include:\nWhy use object-oriented design (OOD)?\nPinpointing use cases, actors, and scenarios\nIdentifying class responsibilities and relationships\nCreating class diagrams\nUsing abstract classes\nWorking with inheritance\nCreating advanced UML diagrams\nUnderstanding object-oriented design principles',
                                11, 'Programming', 'Foundations of Programming', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES (57, 'Databases with Simon Allardice',
                                'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Databases/112585-2.html',
                                'Discover how a database can benefit both you and your architecture, whatever the programming language, operating system, or application type you use. In this course, explore options that range from personal desktop databases to large-scale geographically distributed database servers and classic relational databases to modern document-oriented systems and data warehouses—and learn how to choose the best solution for you. Author Simon Allardice covers key terminology and concepts, such as normalization, \"deadly embraces\" and \"dirty reads,\" ACID and CRUD, referential integrity, deadlocks, and rollbacks. The course also explores data modeling step by step through hands-on examples to design the best system for our data. Plus, learn to juggle the competing demands of storage, access, performance, and security—management tasks that are critical to your database\'s success.\nTopics include:\nWhat is a database?\nWhy do you need a database?\nChoosing primary keys\nIdentifying columns and selecting data types\nDefining relationships: one-to-one, one-to-many, and many-to-many\nUnderstanding normalization\nCreating queries to create, insert, update, and delete data\nUnderstanding indexing and stored procedures\nExploring your database options',
                                11, 'Programming', 'Foundations of Programming', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES (58, 'Design Patterns with Elisabeth Robson and Eric Fre',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Design-Patterns/135365-2.html',
                                'Design patterns are reusable solutions that solve the challenges software developers face over and over again. Rather than reinventing the wheel, learn how to make use of these proven and tested patterns that will make your software more reliable and flexible to change. This course will introduce you to design patterns and take you through seven of the most used object-oriented patterns that will make your development faster and easier. Elisabeth Robson and Eric Freeman, coauthors of Head First Design Patterns, join forces to provide an overview of each pattern and examples of the pattern in action. Featured design patterns include the strategy, observer, decorator, singleton, collection, state, and factory method patterns.\nTopics include:\nWhat are design patterns?\nEncapsulating code that varies with the strategy pattern\nSetting behavior dynamically\nImplementing the observer pattern\nCreating chaos with inheritance\nExtending behavior with composition\nDealing with multithreading and the singleton pattern\nRevising the design for a state machine\nEncapsulating iteration with the collection pattern\nEncapsulating object creation with the factory method pattern',
                                11, 'Programming', 'Foundations of Programming', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (59, 'Data Structures with Simon Allardice',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Data-Structures/149042-2.html',
                                'Once you get past simplistic computer programs with one or two variables, you\'ll use a data structure to store the values—and groups of values— in your applications. While they are sometimes taken for granted in modern programming environments, a deeper understanding of data structures is vital for any programmer who wants to know what\'s going on \"under the hood\" and understand how to defend the choices they\'ve made for performance and efficiency. Simon Allardice offers that understanding to you in this Foundations of Programming course.\n\nStarting with simple ways of grouping data like arrays and structs, together you\'ll explore gradually more complex data structures, like dictionaries, sets, hash tables, queues and stacks, links and linked lists, and trees and graphs. Simon keeps the lessons grounded in the real world and answers the \"why\" behind many data-structuring decisions: Why use a hash table? Why is a set useful? Why avoid arrays? When you\'re finished with the course, you\'ll have a clear understanding of data structures and understand how to use them in whatever language you\'re programming in, today or 5 years from now.\nTopics include:\nWhat is a data structure?\nUsing C-style structs and arrays\nSorting and searching arrays\nWorking with singly and doubly linked lists\nUsing stacks for last-in, first-out (LIFO) structures\nUsing queues for first-in, first-out (FIFO) structures\nWorking with hash tables\nUnderstanding binary search trees (BSTs)\nLearning about graphs',
                                11, 'Programming', 'Foundations of Programming', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (60, 'Fundamentals of Software Version Control with Mich',
                                'http://www.lynda.com/Version-Control-tutorials/Fundamentals-Software-Version-Control/106788-2.html',
                                'This course is a gateway to learning software version control (SVC), process management, and collaboration techniques. Author Michael Lehman reviews the history of version control and demonstrates the fundamental concepts: check-in/checkout, forking, merging, commits, and distribution. The choice of an SVC system is critical to effectively managing and versioning the assets in a software development project (from source code, images, and compiled binaries to installation packages), so the course also surveys the solutions available. Michael examines Git, Perforce, Subversion, Mercurial, and Microsoft Team Foundation Server (TFS) in particular, describing the appropriate use, features, benefits, and optimal group size for each one.\nTopics include:\nComparing centralized vs. distributed systems\nSaving changes and tracking history\nUsing revert or rollback\nWorking with the GUI tools\nUsing IDE and shell integration\nInstalling different systems\nCreating a repository\nTagging code\nBranching and merging code\nSelecting a software version control system that\'s right for you',
                                11, 'Programming', 'Foundations of Programming', '', 0, 8, 'kamy');
INSERT INTO `links` VALUES (61, 'Code Efficiency with Simon Allardice',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Code-Efficiency/122461-2.html',
                                'Code efficiency. There are other words we can use (optimization, performance, speed), but it\'s all about making existing code run faster. Whether for desktop, mobile, or web apps, in this course you\'ll see how to identify pain points and measure them accurately, as well as view multiple approaches to improve the performance. Author Simon Allardice covers everything from \"quick fixes\" to more complex (but more accurate) algorithms.\n\nLearn to choose the right data types, understand the pitfalls of using high-level languages, and decide where to spend your time. Plus, see how the underlying memory management model may have more of an impact than you realize, and what performance issues you can expect working with databases and web services.\nTopics include:\nIdentifying problems in the code\nEmbracing constraints\nUsing code analysis tools to measure performance\nManaging memory\nManaging disk-based and network resources',
                                11, 'Programming', 'Foundations of Programming', '', 0, 9, 'kamy');
INSERT INTO `links` VALUES (62, 'Software Quality Assurance with Aaron Dolberg',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Software-Quality-Assurance/126119-2.html',
                                'tart incorporating quality into your software development process today. Author Aaron Dolberg demonstrates the different kinds of software testing (from black box to white box) and how to fit each one into your development cycle. Learn how to make sure your team is on the same page when it comes to quality by developing criteria for ranking the priority and severity of issues. Then find out how to test and report issues, and how to use a tracking system to manage the process and the results. Lastly, Aaron explains how automating some of the testing can make the QA process more efficient and objective. In the end, you\'ll be able to better understand the overall health of your product, and ensure your team is meeting quality goals with every release.\nTopics include:\nHow to think about quality\nIncorporating black box, white box, and grey box testing into your process\nUnderstanding your quality goals\nRanking issues by priority and severity\nTesting core functionality\nTesting the backend\nUsing a test case management system\nInterpreting bug models\nRecording defects automatically',
                                11, 'Programming', 'Foundations of Programming', '', 0, 10, 'kamy');
INSERT INTO `links` VALUES (63, 'Refactoring Code with Simon Allardice',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Refactoring-Code/122457-2.html',
                                'ctoring is the process of taking existing code and improving it. While it makes code more readable and understandable, it also becomes much easier to add new features, build larger applications, and spot and fix bugs. In this course, staff author Simon Allardice introduces the formalized, disciplined approach to refactoring that tells you exactly what to look for in your code, and how to fix it, through a series of \"code smells\"—clues that let you look at a block of code and realize when there\'s something wrong with it.\nTopics include:\nWhat is refactoring?\nRecognizing common code smells\nSimplifying method calls\nMaking conditions easier to read',
                                11, 'Programming', 'Foundations of Programming', '', 0, 11, 'kamy');
INSERT INTO `links` VALUES (64, 'Insights on Software Quality Engineering with Aaro',
                                'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Insights-Software-Quality-Engineering/142444-2.html',
                                'Software quality engineering plays a vital role in the development cycle, saving companies time and money and ensuring that customers have exactly the experience they expect. It\'s also a lucrative and underappreciated career path. Here, software quality engineer Aaron Dolberg draws on his years of experience in quality assurance (QA) to share his personal insights and cautionary tales. Aaron discusses how to get started in QA, how it fits in at companies small and large, and how it has changed since the rise of agile workflows.',
                                11, 'Programming', 'Foundations of Programming', '', 0, 12, 'kamy');
INSERT INTO `links` VALUES (65, 'Multidevice Prototyping with Ratchet with Chris Gr',
                                'http://www.lynda.com/Ratchet-tutorials/Using-exercise-files/170056/359870-4.html',
                                'Ratchet is a fantastic framework for prototyping mobile apps. Ratchet prototypes look and act just like native iOS and Android apps, but they\'re programmed with languages familiar to almost all web designers and developers: HTML, CSS, and JavaScript. Join Chris Griffith in this course, as he shows how to configure your development environment to work with Ratchet, and build your first app prototype, from creating the initial screen and adding transitions between pages, with Push.js, to using Ratchet\'s iOS and Android built-in themes, which make your app immediately look at home on either platform.\nTopics include:\nInstalling Ratchet\nSetting up a web server\nCreating your first screen\nConfiguring meta tags\nAdding content\nConnecting pages with Push.js\nAdding icons, buttons, form elements, and lists\nDefining your app theme with Ratchet',
                                6, 'Bootstrap', '', '', 0, 36, 'kamy');
INSERT INTO `links` VALUES (66, 'CakePHP-MVC Up and Running with  with Jon Peck',
                                'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html',
                                'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html',
                                12, 'MVC Framework', '', '', 0, 100, 'kamy');
INSERT INTO `links` VALUES (67, 'MVC PHP CodeIgniter  Up and Running with PHP CodeI',
                                'http://www.lynda.com/CodeIgniter-tutorials/Introducing-MVC-development-pattern/126122/141743-4.html',
                                'Speed up your development with CodeIgniter, a fast and powerful PHP web application framework. Author Jon Peck shows how to build a magazine cataloging system while describing how to use a MVC (Model-View-Controller) framework like CodeIgniter.\n\nStarting with the what and why of CodeIgniter, Jon introduces key concepts such as the MVC pattern and libraries by demonstrating how to create static pages, then storing and displaying magazine info in a database. Advanced topics like classes and helpers are explored to validate user input, upload files, and much more. By creating a complete system, you\'ll have the foundation to build your own applications with CodeIgniter.\nTopics include:\nWhat is CodeIgniter?\nCreating a static page controller\nGenerating output with a view\nWhat is a model?\nSaving data with Active Records\nCreating forms\nValidating user input\nListing records in tables\nUploading images\nViewing and deleting records',
                                12, 'MVC Framework', '', '', 0, 37, 'kamy');
INSERT INTO `links` VALUES (68, 'MVC Frameworks for Building PHP Web Applications',
                                'http://www.lynda.com/CakePHP-tutorials/MVC-Frameworks-Building-PHP-Web-Applications/315196-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:MVC%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'PHP developers have a choice: they can design their own architecture, essentially re-inventing the wheel, or they can use a framework. Frameworks speed up development, enhance collaboration, and help keep code organized. So why start from scratch? In this course, Drew Falkman introduces the six most popular PHP frameworks: Zend, Symfony, CodeIgniter, CakePHP, Yii, and Laravel. He\'ll describe each framework\'s advantages, show how to get and install the software, and then demonstrate how to get the default pages for each framework up and running, so viewers can see how the code is structured. In the final chapter, Drew compares all the frameworks and provides resources to move forward with each one. Your framework choice is one of the biggest factors affecting the success of your project; start here to get the information you need to make the right decision.\nTopics include:\nWhy use a framework?\nIntroducing MVC-framework concepts\nExamining each framework\'s components\nSetting up the software\nWalking through sample apps built in each framework\nComparing frameworks',
                                12, 'MVC Framework', 'MVC', '', 0, 4, 'kamy');
INSERT INTO `links` VALUES
  (69, 'Laravel MVC framework Essential', 'http://www.lynda.com/Laravel-tutorials/Up-Running-Laravel/166513-2.html',
       'Join Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel\'s advanced templating engine, Blade. Next, you\'ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you\'ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code',
       12, 'MVC Framework', 'MVC', '', 0, 30, 'kamy');
INSERT INTO `links` VALUES (70, 'Ruby on Rails 4 Essential Training with Kevin Skog',
                                'http://www.lynda.com/Ruby-Rails-tutorials/Ruby-Rails-4-Essential-Training/139989-2.html',
                                'Join Kevin Skoglund as he shows how to create full-featured, object-oriented web applications with the latest version of the popular, open-source Ruby on Rails framework. This course explores each part of the framework, best practices, and real-world development techniques. Plus, get hands-on experience by building a complete content management system with dynamic, database-driven content. Kevin teaches how to design an application; route browser requests to return dynamic page content; structure and interact with databases using object-oriented programming; create, update, and delete records; and implement user authentication. Previous experience with Ruby is recommended, but not required.\r\nTopics include:\r\nWhy use Ruby on Rails?\r\nInstalling Ruby on Rails on Mac and Windows\r\nRendering templates and redirecting requests\r\nGenerating and running database migrations\r\nCreating, updating, and deleting records\r\nUnderstanding association types\r\nUsing layouts, partials, and view helpers\r\nIncorporating assets using asset pipeline\r\nValidating form data\r\nAuthenticating users and managing user access\r\nArchitecting RESTful applications\r\nDebugging and error handing',
                                13, 'Other Programing', '', '', 0, 1, '');
INSERT INTO `links` VALUES (71, 'RSpec Testing Framework with Ruby with Kevin Skogl',
                                'http://www.lynda.com/Ruby-tutorials/RSpec-Testing-Framework-Ruby/183884-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:ruby%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'Learn how to use RSpec, the Ruby testing framework that can help developers be more productive, write better code, and reduce bugs during development. Kevin Skoglund explains the basic syntax of RSpec and then dives straight into writing and running test examples. He shows how to use a variety of matchers to test for expected conditions, provides techniques for testing efficiently, and demonstrates how test doubles can stand in for objects and methods. He also explains the additional RSpec features available for Ruby on Rails, and walks through a step-by-step example of test-driven development.\r\nTopics include:\r\nInstalling and configuring RSpec\r\nWriting and running examples\r\nDefining expectations using matchers\r\nUsing helper methods, before/after hooks, and shared examples\r\nCreating test doubles using mocks and stubs\r\nTesting Ruby on Rails with RSpec\r\nPutting test-driven development into practice',
                                13, 'Other Programing', '', '', 0, 2, '');
INSERT INTO `links` VALUES
  (72, 'CSS with LESS and Sass with Joe Marini', 'http://www.lynda.com/CSS-tutorials/CSS-LESS-SASS/107921-2.html',
       'Ever find yourself wishing that CSS had features like variables, functions, or reusable classes? Look no further. LESS and Sass are CSS style sheet tools called preprocessors that add these features and more, simplifying the creation of complex CSS styles. In this course, author Joe Marini introduces the LESS and Sass tools in a two-part manner.\n\nThe first section focuses on LESS (Leaner CSS) and how it can be used on both the client and the server. The lessons show how to work with variables, mixins, nested rules, and other features to easily create maintainable CSS. \n\nThe second section introduces Sass (Syntactically awesome stylesheets), which contains many of the same features as LESS, along with a few new ones. Joe also compares and contrasts the two tools, and explains how your platform and needs may influence which tool you choose.\nTopics include:\nWhat are LESS and Sass?\nUsing variables in your CSS\nWorking with reusable and parameterized mixins\nImplementing nested rules\nCombining CSS rules with operations\nUsing the built-in functions in LESS and Sass\nControlling the CSS output formatting\nImporting external files\nSubject:\nWeb',
       6, 'Bootstrap', '', '', 0, 6, 'kamy');
INSERT INTO `links` VALUES (73, 'Customizing Bootstrap 3 with LESS with Jen Kramer',
                                'http://www.lynda.com/Bootstrap-tutorials/Customizing-Bootstrap-3-LESS/161086-2.html',
                                'Do more with LESS in Bootstrap. In this course, Jen Kramer shows you how to customize the look and feel of your Bootstrap site with LESS CSS, as well as LESS mixins and Bootstap\'s own customization screens. You\'ll learn how to configure Prepros, a LESS compiler; work within the LESS file structure; and start modifying fonts, color, spacing, and more with the variables.less file. Then LESS\'s mixins will allow you to make advanced customizations like custom buttons and tab styles. Just press Play to start learning.\nTopics include:\nSetting up your working environment for Bootstrap and LESS\nUnderstanding the LESS file structure\nCreating and manipulating LESS variables\nWorking with LESS mixins\nCreating custom styles using mixins and variables',
                                6, 'Bootstrap', '', '', 0, 7, 'kamy');
INSERT INTO `links` VALUES (74, 'Bootstrap 3: Advanced Web Development with Ray Vil',
                                'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-3-Advanced-Web-Development/124079-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:bootstrap%2Badvanced%2Bweb%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                'Generate your own interactive website from scratch with Bootstrap, the mobile-friendly framework from Twitter, in this start-to-finish course with developer and author Ray Villalobos. First, you\'ll plan and prototype the interface with MindMaps and Balsamiq Mockups. Next, download Bootstrap and dive into organizing your site structure with its scaffolding feature—adding PHP includes to break your code into reusable modules and building in the core navigation. Ray then shows you how to build interactive carousels, modal features, and forms, and control these features with JavaScript. Finally, learn to style it all with LESS and prepare to publish the results online.\nTopics include:\nPrototyping the site\nWorking with a local web server\nCreating a baseline template with Git\nScaffolding the main columns\nMaking the site modular with PHP includes\nAdding basic navigation\nAdding a carousel\nWorking with buttons\nCreating and activating tabs\nAdding page and structure LESS styles',
                                6, 'Bootstrap', '', '', 0, 3, 'kamy');
INSERT INTO `links` VALUES (75, 'Laravel 4 Essential Training with Joseph Lowery',
                                'http://www.lynda.com/Laravel-tutorials/Laravel-4-Essential-Training/181242-2.html',
                                'oin Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel\'s advanced templating engine, Blade. Next, you\'ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you\'ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code',
                                12, 'MVC Framework', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (76, 'Foundations of Programming: Web Security with Kevi',
                                'http://www.lynda.com/Developer-Web-Development-tutorials/Foundations-Programming-Web-Security/133330-2.html',
                                'Learn about the most important security concerns when developing websites, and what you can do to keep your servers, software, and data safe from harm. Instructor Kevin Skoglund explains what motivates hackers and their most common methods of attacks, and then details the techniques and mindset needed to craft solutions for these web security challenges. Learn the eight fundamental principles that underlie all security efforts, the importance of filtering input and controlling output, and smart strategies for encryption and user authentication. Kevin also covers special considerations when it comes to credit cards, regular expressions, source code managers, and databases.\n\nThis course is great for developers who want to secure their client\'s websites, and for anyone else who wants to learn more about web security.\nTopics include:\nWhy security matters\nWhat is a hacker?\nHow to write a security policy\nCross-site scripting (XSS)\nCross-site request forgery (CSRF)\nSQL injection\nSession hijacking and fixation\nPasswords and encryption\nSecure credit card payments',
                                11, 'Programming', '', '', 0, 1, 'kamy');
INSERT INTO `links` VALUES (77, 'Kevin-Skoglund Lynda', 'http://www.lynda.com/Kevin-Skoglund/104-1.html',
                                'Kevin Skoglund is the founder of Nova Fabrica, a web development agency specialized in delivering custom, scalable solutions using Ruby on Rails, PHP, SQL, and related technologies. Nova Fabrica clients include An Event Apart, Atlas Carpet Mills, Consulate Film, Gregorius|Pineo, Maharam, Oakley, and The Bold Italic. Kevin is a lynda.com author with over 15 years of teaching and web development experience.',
                                1, 'Others', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (78, 'Git Essential Training with Kevin Skoglund',
                                'http://www.lynda.com/Git-tutorials/Understanding-version-control/100222/111248-4.html',
                                '', 13, 'Other Programing', '', '', 0, 1, '');
INSERT INTO `links` VALUES (79, 'Amazing story of how Bulgaria\'s Jews were saved in',
                                'http://edition.cnn.com/videos/world/2015/07/24/intv-amanpour-bulgaria-king-a.cnn/video/playlists/amanpour/',
                                '', 8, 'Antisémitisme', '', '', 0, 5, 'kamy');
INSERT INTO `links` VALUES (80, 'Practical Apache Web Server Administration with Jo',
                                'http://www.lynda.com/Apache-tutorials/Practical-Apache-Web-Server-Administration/164983-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:apache%2Bserver%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                '', 13, 'Other Programing', '', '', 0, 1, '');
INSERT INTO `links` VALUES (81, '7 Things to Consider Before Choosing Sides in the',
                                'http://www.huffingtonpost.com/ali-a-rizvi/picking-a-side-in-israel-palestine_b_5602701.html',
                                '', 7, 'Israel', 'Gaza', '', 0, 1, '');
INSERT INTO `links` VALUES (82, 'Database Fundamentals: Creating and Manipulating D',
                                'http://www.lynda.com/SQL-Server-tutorials/Database-Fundamentals-Creating-Manipulating-Data/385697-2.html',
                                '', 14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (83, 'Migrating Access Databases to SQL Server with Adam',
                                'http://www.lynda.com/Access-tutorials/Migrating-Access-Databases-SQL-Server/397389-2.html',
                                '', 14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (84, 'Installing and Administering Microsoft SQL Server ',
                                'http://www.lynda.com/SQL-Server-tutorials/Installing-Administering-Microsoft-SQL-Server-2014/383046-2.html',
                                '', 14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (85, 'Database Fundamentals: Core Concepts with Adam Wil',
                                'http://www.lynda.com/SQL-Server-tutorials/Database-Fundamentals-Core-Concepts/385693-2.html',
                                '', 14, 'SQLServer', '', '', 0, 0, '');
INSERT INTO `links` VALUES (86, 'SQL Server 2014 Essential Training with Martin Gui',
                                'http://www.lynda.com/SQL-Server-tutorials/SQL-Server-2014-Essential-Training/363873-2.html',
                                '', 14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (87, 'Implementing a Data Warehouse with Microsoft SQL S',
                                'http://www.lynda.com/SQL-Server-tutorials/Implementing-Data-Warehouse-Microsoft-SQL-Server-2012/156150-2.html',
                                '', 14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (88, 'Amazon.fr', 'http://www.amazon.fr/', '', 1, 'Others', '', '', 0, 9, '');
INSERT INTO `links` VALUES
  (89, 'lotto', 'https://jeux.loro.ch/FR/1/homepage?cid=sis/fr/Brand/Nav///tous/juin2015#action=homepage', '', 1,
       'Others', '', '', 0, 9, '');
INSERT INTO `links`
VALUES (90, 'icorner', 'https://www.login.icorner.ch/public/Login1.html', '', 1, 'Others', '', '', 0, 9, '');
INSERT INTO `links` VALUES (91, 'Mufti', 'https://vimeo.com/14203664', '', 8, 'Antisémitisme', '', '', 0, 1, '');
INSERT INTO `links` VALUES (92, 'origines du judaïsme - C\'est pas sorcier',
                                'http://education.francetv.fr/antiquite/sixieme/video/les-origines-du-judaisme-c-est-pas-sorcier',
                                '', 7, 'Israel', '', '', 0, 1, '');
INSERT INTO `links` VALUES (93, 'Malek Boutih, le Ps et le conflit Israël / Gaza',
                                'https://www.dailymotion.com/video/x822pf_malek-boutih-le-ps-et-le-conflit-is_news', '',
                                7, 'Israel', '', '', 0, 1, '');
INSERT INTO `links` VALUES (94, 'ASP.NET Essential Training with David Gassner',
                                'http://www.lynda.com/ASP-NET-tutorials/ASP-NET-Essential-Training/784-2.html', '', 14,
                                'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (95, 'www.asp.net/', 'http://www.asp.net/', '', 14, 'SQLServer', '', '', 0, 7, '');
INSERT INTO `links` VALUES (96, 'Up and Running with ASP.NET 5 with Jess Chadwick',
                                'http://www.lynda.com/ASP-NET-tutorials/Up-Running-ASP-NET-5/368051-2.html',
                                'ASP.NET 5, Microsoft\'s latest web development framework, includes an optimized developer experience, better performing runtime, and cross-platform support for Windows, Mac, and Linux. With all this change, many developers find they could use a refresher. In this course, Jess Chadwick introduces the basics to get you up and running with ASP.NET 5, and creating and deploying your own professional quality applications. He explores setup and installation, working with the ASP.NET MVC 6 framework, and the techniques you need to manage data, reuse code, construct web APIs, and secure your new applications. After you\'ve built your application, Jess will show you how to deploy it to both IIS server and Microsoft Azure.\r\nTopics include:\r\nUnderstanding ASP.NET 5\'s new request processing pipeline\r\nDownloading client-side libraries using Grunt and Bower in Visual Studio\r\nAdding ASP.NET MVC 6 to your application\r\nHandling web requests with controllers\r\nRendering dynamic views with Razor markup\r\nUsing Entity Framework to write and read data to a database\r\nUsing TagHelpers to create simple dynamic HTML forms\r\nRegistering and authenticating users with Identity services\r\nDynamically update portions on the server using partial rendering\r\nUsing dynamic routing logic to customize URLs\r\nExposing data with web APIs\r\nLeveraging custom configuration and logging\r\nIncreasing application maintainability with dependency injection\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nASP.NET\r\nAuthor:\r\nJess Chadwick',
                                14, 'SQLServer', '', '', 0, 9, '');
INSERT INTO `links` VALUES (97, 'From: ASP.NET MVC 5 Essential Training with Michae',
                                'http://www.lynda.com/ASP-NET-tutorials/What-you-should-know-before-watching-course/170334/191097-4.html',
                                'ASP.NET MVC gives you a potent, patterns-based way to build dynamic websites. MVC 5 includes features that enable rapid, test-driven development—and it\'s a version every .NET developer needs to know to meet the latest web standards. Join Michael Sullivan for an in-depth look at the MVC 5 framework. He demonstrates how a typical MVC application is structured, and shows how to work with views, models, and data, including developing database objects with the Entity Framework. Michael also explores how to secure applications with the ASP.NET Identity system, create and conduct unit tests, use JavaScript libraries to communicate with controllers and pass data to client-side scripts, and deploy to cloud-based platforms like Azure and AppHarbor. Two hands-on practice challenges allow you to test what you\'ve learned along the way.\r\nTopics include:\r\nExploring ASP.NET routing\r\nApplying action selectors\r\nWorking with layouts\r\nEmploying HTML helpers\r\nDisplaying and validating model properties\r\nGenerating database objects with Entity Framework\r\nAdding transactions\r\nAuthenticating users\r\nUnit testing\r\nPerforming partial page updates with Ajax and jQuery\r\nDeploying ASP.NET MVC applications',
                                14, 'SQLServer', '', '', 0, 10, '');
INSERT INTO `links` VALUES (98, 'C#', 'http://www.lynda.com/C-tutorials/Up-Running-C/164452-2.html',
                                '# is the language at the heart of many Windows applications, including Windows Phone and Windows Store apps. And if you have a programming background, you can get up and running with C# in as little as three hours using this course. Author Gerry O\'Brien introduces C# and the Visual Studio IDE; the core language elements such as data types, variables, constants, functions, and loops; and object-oriented programming with classes and namespaces. Plus, learn how to handle exceptions with the try-catch-finally mechanism and manage memory resources. Then get a brief tour of two fully functional Windows Phone and Windows Store apps to see what the final results look like. There are also five challenge videos that allow you to test your C# prowess, and five matching videos where Gerry explains the correct solutions.\r\nTopics include:\r\nInstalling C#\r\nWorking with loops\r\nControlling program flow\r\nUsing variables\r\nBuilding functions\r\nCreating and instantiating classes\r\nCatching errors\r\nManaging resources with the garbage collector\r\nBuilding collections\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nC#\r\nAuthor:\r\nGerry O\'Brien',
                                14, 'SQLServer', '', '', 0, 1, '');
INSERT INTO `links` VALUES (99, 'Visual Basic Essential Training with David Gassner',
                                'http://www.lynda.com/Visual-Basic-tutorials/Visual-Basic-Essential-Training/114902-2.html',
                                '', 14, 'SQLServer', '', '', 0, 11, '');
INSERT INTO `links` VALUES (100, 'Etgar Keret : \"J’aimerais un Premier ministre',
                                 'http://www.atlantico.fr/decryptage/etgar-keret-j-aimerais-premier-ministre-qui-defaut-avoir-idees-favorables-paix-en-ait-au-moins-folles-pourquoi-ne-pas-essayer-2406117.html/page/0/1',
                                 '', 7, 'Israel', '', '', 0, 1, '');
INSERT INTO `links` VALUES (101, 'Visual Studio 2015 01: Exploring the Visual Studio',
                                 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-01-Exploring-Visual-Studio-Ecosystem/408411-2.html',
                                 '', 15, 'Visual Studio', '', '', 0, 1, '');
INSERT INTO `links` VALUES (102, 'Visual Studio 2015 02: Getting Comfortable with th',
                                 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-02-Getting-Comfortable-IDE/415312-2.html',
                                 '', 15, 'Visual Studio', '', '', 0, 1, '');
INSERT INTO `links` VALUES (103, 'Visual Studio 2015 03: Exploring Projects and Solu',
                                 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015-Essentials-03-Exploring-Projects-Solutions/415313-2.html',
                                 '', 15, 'Visual Studio', '', '', 0, 1, '');
INSERT INTO `links` VALUES (104, 'Visual Studio 2015  04: Surveying the Programming ',
                                 'http://www.lynda.com/Visual-Studio-tutorials/Visual-Studio-2015--04-Surveying-programming-languages/415314-2.html',
                                 '', 15, 'Visual Studio', '', '', 0, 4, '');
INSERT INTO `links` VALUES (105, 'C# Essential Training with David Gassner',
                                 'http://www.lynda.com/C-tutorials/C-Essential-Training/188207-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:C%23%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                 '', 15, 'Visual Studio', '', '', 0, 8, '');
INSERT INTO `links` VALUES
  (106, 'LES REFUGIES DU SILENCE ( mise à jour 2015 )', 'https://www.youtube.com/watch?v=_B6qkypTDa0&feature=youtu.be',
        '', 7, 'Israel', '', '', 0, 1, '');
INSERT INTO `links` VALUES (107, 'From: Visual Studio 2010 Essential Training with W',
                                 'http://www.lynda.com/ASP-NET-tutorials/Understanding-Visual-Studio-versions/67159/76568-4.html',
                                 '', 15, 'Visual Studio', '', '', 0, 5, '');
INSERT INTO `links` VALUES (108, 'Up and Running Angular JS',
                                 'http://www.lynda.com/AngularJS-tutorials/Installing-running-basic-application/154414/167519-4.html',
                                 '', 4, 'JQuery', '', '', 0, 1, '');
INSERT INTO `links` VALUES (109, 'Angular forms Validation',
                                 'http://www.lynda.com/AngularJS-tutorials/Adding-Angular-JS-our-form/438886/445592-4.html',
                                 '', 4, 'JQuery', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (110, 'javascript functions', 'http://www.lynda.com/JavaScript-tutorials/JavaScript-Functions/148137-2.html', '', 4,
        'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES (111, 'Comment les jeunes',
                                 'http://www.danilette.com/2015/11/comment-les-jeunes-de-mon-quartier-dans-le-93-ont-ils-vecu-les-carnages-de-la-nuit-alexandra-laignel-lavastine.html?utm_source=_ob_share&utm_medium=_ob_facebook&utm_campaign=_ob_sharebar',
                                 '', 8, 'Antisémitisme', '', '', 0, 1, '');
INSERT INTO `links` VALUES (112, 'Introducing OOP Excel VBA',
                                 'http://www.lynda.com/Excel-tutorials/Introducing-object-oriented-programming/62906/68825-4.html',
                                 '', 13, 'Other Programing', '', '', 0, 1, '');
INSERT INTO `links` VALUES (113, 'Setting up and configuring your local server with ',
                                 'http://www.lynda.com/Moodle-tutorials/Setting-up-configuring-your-local-server-XAMPP-LAMP/372439/416662-4.html',
                                 '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES (114, 'Up and Running with Node.js with Alexander Zanfir',
                                 'http://www.lynda.com/Node-js-tutorials/What-you-should-know/370605/408260-4.html?autoplay=true',
                                 '', 4, 'JQuery', '', '', 0, 1, '');
INSERT INTO `links` VALUES (115, 'Amazon.ch', 'http://www.amazon.de/', '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (116, 'Modern Javascript playlist', 'http://www.lynda.com/SharedPlaylist/0a5348d96ae04fb48690a5137ccadced', '', 1,
        'Others', 'Playlist', '', 0, 0, '');
INSERT INTO `links` VALUES (117, 'Dieudonné propagandiste \"national-socialiste\" selo',
                                 'http://www.memorial98.org/2015/11/dieudonne-propagandiste-national-socialiste-selon-la-justice.html',
                                 '', 8, 'Antisémitisme', '', '', 0, 1, '');
INSERT INTO `links` VALUES (119, 'telekurs',
                                 'https://www.tkflink.com/fda?X=b64-U2VzYW1lLVzu9IOdS9P6pamZ4fKC1lCuqFz3NDEO0Lruj0gJIpsH9Ivl19G6unHE9qCqfqjh9oDni$qDjYIJZ32Cx8Dn68Tcl6yPwvcs72QUt$f2fevHyPMlHklLtkcK88iXOIywJ4JdpTXPvQTB1-HiVdD9SZo69NdIxDn3OA',
                                 'Antonio:CH543; U55209\r\nPassword: 131158\r\n\r\nStefano:CH543: U55003\r\nPassword: Lugano',
                                 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES (120, 'Design the Web: CSS-Controlled SVG with PHP with C',
                                 'http://www.lynda.com/CSS-tutorials/Design-Web-CSS-Controlled-SVG-PHP/424048-2.html',
                                 '', 2, 'PHP', '', '', 0, 1, '');
INSERT INTO `links` VALUES (121, 'AngularJS: Building a Data-Driven App with Ray Vil',
                                 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Building-Data-Driven-App/421230-2.html',
                                 '', 4, 'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES (122, 'AngularJS: Adding Registration to Your Application',
                                 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Adding-Registration-Your-Application/438887-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:angularjs%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                 '', 4, 'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES (123, 'Developing Android Apps Essential Training with Da',
                                 'http://www.lynda.com/Android-tutorials/Developing-Android-Apps-Essential-Training-Revision-Q2-2015/369905-2.html',
                                 '', 17, 'Java Android', '', '', 0, 2, '');
INSERT INTO `links` VALUES (124, 'Java Essential Training with David Gassner',
                                 'http://www.lynda.com/Java-tutorials/Java-Essential-Training/377484-2.html', '', 17,
                                 'Java Android', '', '', 0, 1, '');
INSERT INTO `links`
VALUES (125, 'lynda Android', 'http://www.lynda.com/search?q=android', '', 17, 'Java Android', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (126, 'Les Réfugiés Oubliés - documentaire complet', 'https://www.youtube.com/watch?v=5JwW1kefTvU', '', 7, 'Israel',
        '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (127, 'Microsoft course', 'https://channel9.msdn.com/Series/Choose-to-Code?sort=viewed&page=2', '', 15,
        'Visual Studio', '', '', 0, 1, '');
INSERT INTO `links` VALUES (128, 'udemy Mobile App Design In Sketch 3: UX and UI Des',
                                 'https://www.udemy.com/the-complete-design-course/learn/#/', '', 18, 'Udemy', 'Others',
                                 '', 0, 1, '');
INSERT INTO `links` VALUES
  (129, 'Javasxript 6', 'https://github.com/lukehoban/es6features', 'Next generation javascript', 4, 'Javascript', '',
        '', 0, 1, '');
INSERT INTO `links` VALUES (130, 'typescriptlang', 'http://www.typescriptlang.org/',
                                 'https://www.udemy.com/learn-angularjs/learn/?couponCode=YOUTUBE119#/lecture/1992064',
                                 4, 'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES (131, 'JavaScript Essential Training with Simon Allardice',
                                 'http://www.lynda.com/JavaScript-tutorials/JavaScript-Essential-Training/81266-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:javascript%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2',
                                 '', 4, 'Javascript', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (132, 'Super learning material', 'http://www.ikamy.ch/public/SuperLearning/CourseSyllabusSuperLearner2.html', '', 19,
        'SuperLearning', '', '', 0, 1, '');
INSERT INTO `links` VALUES (133, 'Course Syllabus Super Learning',
                                 'http://www.ikamy.ch/public/SuperLearning/CourseSyllabusSuperLearnerV2.0Udemy.pdf', '',
                                 19, 'SuperLearning', '', '', 0, 1, '');
INSERT INTO `links` VALUES (134, 'Super learning Udemy',
                                 'https://www.udemy.com/become-a-superlearner-2-speed-reading-memory-accelerated-learning/learn/#/',
                                 '', 19, 'SuperLearning', 'Udemy', '', 0, 1, '');
INSERT INTO `links` VALUES (135, 'Udemy Learn Java Script Server Technologies From S',
                                 'https://www.udemy.com/learn-java-script-server-technologies-from-scratch/learn/#/',
                                 '', 4, 'Javascript', 'Udemy', '', 0, 1, '');
INSERT INTO `links` VALUES
  (136, 'Udemy Projects In JavaScript & JQuery', 'https://www.udemy.com/projects-in-javascript-jquery/learn/#/', '', 4,
        'Javascript', 'Udemy', '', 0, 1, '');
INSERT INTO `links` VALUES
  (137, 'Udemy Comprehensive TypeScript', 'https://www.udemy.com/typescript101/learn/', '', 4, 'Javascript', 'Udemy',
        '', 0, 1, '');
INSERT INTO `links` VALUES
  (138, 'udemy Build Web Apps with React JS and Flux', 'https://www.udemy.com/learn-and-understand-reactjs/learn/', '',
        4, 'Javascript', 'Udemy', '', 0, 1, '');
INSERT INTO `links` VALUES (139, 'udemy Python Network Programming',
                                 'https://www.udemy.com/python-programming-for-real-life-networking-use/learn/', '', 18,
                                 'Udemy', 'Udemy', '', 0, 1, '');
INSERT INTO `links` VALUES
  (140, 'udemy Mobile App Design In Sketch 3: UX and UI Des', 'https://www.udemy.com/the-complete-design-course/learn/',
        '<p>Need a mac Mobile App Design In Sketch 3: UX and UI Design From Scratch</p>', 18, 'Udemy', 'Udemy', '', 0,
        1, '');
INSERT INTO `links` VALUES
  (141, 'udemy  Learning JavaScript Programming Tutorial. A', 'https://www.udemy.com/programming-javascript/learn/', '',
        4, 'Javascript', 'Udemy', '', 0, 1, '');
INSERT INTO `links`
VALUES (142, 'CSS3', 'https://www.udemy.com/learning-css3/learn/', '', 5, 'HTML', 'Udemy', '', 0, 1, '');
INSERT INTO `links`
VALUES (143, 'microspot', 'http://www.microspot.ch/msp/index.jsf', '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (144, 'GIMP Essential Training', 'http://www.lynda.com/GIMP-tutorials/Welcome/112673/117897-4.html', '', 11,
        'Programming', '', '', 0, 2, '');
INSERT INTO `links` VALUES
  (145, 'Lumonisity brain exercise', 'https://www.lumosity.com/app/v4/dashboard', '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (146, 'Schindler List Violon', 'https://www.facebook.com/soutien.a.israel/videos/840988722690870/?fref=nf', '', 7,
        'Israel', 'Music', 'Shoah', 0, 1, '');
INSERT INTO `links` VALUES
  (147, 'Laure Adler Robert Badinter antisémitisme', 'http://www.franceinter.fr/player/reecouter?play=1252509', '', 8,
        'Antisémitisme', 'Antisémitisme', 'Antisémitisme', 0, 1, '');
INSERT INTO `links` VALUES (148, 'Groupe Mutuel',
                                 'https://access.groupemutuel.ch/authent/auth/login?execution=e2s1&APPLICATION=ext-extranet-assure',
                                 '', 1, 'Others', '', 'Me', 0, 1, '');
INSERT INTO `links`
VALUES (149, 'Tailor Made sur mesure', 'https://www.tailorstore.ch/fr', '', 1, 'Others', 'Me', 'Me', 0, 1, '');
INSERT INTO `links` VALUES
  (150, 'Yvan Attal On est pas couché', 'http://defense-medias-israel.com/yvan-attal-on-nest-couche-28-mai-2016', '', 8,
        'Antisémitisme', 'Amtisémitisme', '', 0, 1, '');
INSERT INTO `links` VALUES (151, 'Iran réseau sociaux',
                                 'http://fr.timesofisrael.com/reseaux-sociaux-liran-exige-le-transfert-des-donnees-sur-ses-citoyens/',
                                 '', 1, 'Others', 'Iran', 'Iran', 0, 1, '');
INSERT INTO `links` VALUES (152, 'NodeJs Security YT 1', 'https://www.youtube.com/watch?v=yvviEA1pOXw',
                                 '<p>https://speakerdeck.com/rdegges/everything-you-ever-wanted-to-know-about-authentication-in-node-dot-js</p>\r\n<p>&nbsp;</p>\r\n<p>https://github.com/rdegges/svcc-auth</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',
                                 20, 'NodeJs Security', '', '', 0, 1, '');
INSERT INTO `links` VALUES
  (153, 'GitHub Node sec', 'https://github.com/rdegges/svcc-auth', '<p>github security code</p>', 20, 'NodeJs Security',
        '', '', 0, 1, '');
INSERT INTO `links` VALUES (154, 'Randall speaker decker Node',
                                 'https://speakerdeck.com/rdegges/everything-you-ever-wanted-to-know-about-authentication-in-node-dot-js',
                                 '', 20, 'NodeJs Security', '', '', 0, 1, '');
INSERT INTO `links` VALUES (155, 'pleur-larme-empathie',
                                 'http://www.demotivateur.fr/article/pleur-larme-empathie-faiblesse-force-emotion-film-serie-ecran-science-7498',
                                 '', 1, 'Others', ':)', '', 0, 1, '');
INSERT INTO `links`
VALUES (156, 'Zone telechargement', 'http://www.zone-telechargement.com/homep.html', '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links` VALUES (157, 'fiverr -offer service', 'https://www.fiverr.com/', '', 1, 'Others', '', '', 0, 1, '');
INSERT INTO `links`
VALUES (158, 'kickstarter', 'https://www.kickstarter.com/?ref=nav', '', 1, 'Others', '', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `links_category`
--

CREATE TABLE `links_category` (
  `id`       INT(11)          NOT NULL,
  `category` VARCHAR(50)      NOT NULL,
  `rank`     INT(10) UNSIGNED NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `links_category`
--

INSERT INTO `links_category` VALUES (1, 'Others', 0);
INSERT INTO `links_category` VALUES (2, 'PHP', 1);
INSERT INTO `links_category` VALUES (3, 'SQL', 4);
INSERT INTO `links_category` VALUES (4, 'Javascript', 5);
INSERT INTO `links_category` VALUES (5, 'HTML', 7);
INSERT INTO `links_category` VALUES (6, 'Bootstrap', 6);
INSERT INTO `links_category` VALUES (7, 'Israel', 15);
INSERT INTO `links_category` VALUES (8, 'Antisémitisme', 16);
INSERT INTO `links_category` VALUES (9, 'Handicap', 17);
INSERT INTO `links_category` VALUES (11, 'Programming', 8);
INSERT INTO `links_category` VALUES (12, 'MVC Framework', 14);
INSERT INTO `links_category` VALUES (13, 'Other Programing', 9);
INSERT INTO `links_category` VALUES (14, 'SQLServer', 2);
INSERT INTO `links_category` VALUES (15, 'Visual Studio', 3);
INSERT INTO `links_category` VALUES (16, 'JQuery', 5);
INSERT INTO `links_category` VALUES (17, 'Java Android', 3);
INSERT INTO `links_category` VALUES (18, 'Udemy', 10);
INSERT INTO `links_category` VALUES (19, 'SuperLearning', 4);
INSERT INTO `links_category` VALUES (20, 'NodeJs Security', 9);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id`                INT(11)             NOT NULL,
  `user_id`           INT(11) UNSIGNED    NOT NULL,
  `note`              VARCHAR(255)                 DEFAULT NULL,
  `rank`              INT(11)             NOT NULL DEFAULT '1',
  `web_address`       TEXT,
  `done`              TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `progress`          TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `comment`           TEXT,
  `modification_time` TIMESTAMP           NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `due_date`          DATE                NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id`      INT(11)      NOT NULL,
  `user_id` INT(11)      NOT NULL,
  `message` VARCHAR(255)          DEFAULT NULL,
  `link`    VARCHAR(255) NOT NULL,
  `read`    TINYINT(1)   NOT NULL DEFAULT '0',
  `date`    TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id`                INT(11)             NOT NULL,
  `user_id`           INT(11) UNSIGNED    NOT NULL,
  `todo`              VARCHAR(255)                 DEFAULT NULL,
  `web_address`       TEXT                NOT NULL,
  `done`              TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `progress`          TINYINT(3) UNSIGNED NOT NULL DEFAULT '0',
  `rank`              INT(11)             NOT NULL DEFAULT '1',
  `comment`           TEXT,
  `modification_time` TIMESTAMP           NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `due_date`          DATE                NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_chauffeurs`
--

CREATE TABLE `transport_chauffeurs` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `chauffeur_name`    VARCHAR(70)               DEFAULT NULL,
  `initial`           VARCHAR(3)                DEFAULT NULL,
  `company`           VARCHAR(70)               DEFAULT NULL,
  `user_id`           INT(11)                   DEFAULT NULL,
  `input_date`        DATE                      DEFAULT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`          VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transport_chauffeurs`
--

INSERT INTO `transport_chauffeurs` VALUES (1, 'Pablo ARZA', 'PAB', 'Transmed', 2, NULL, '0000-00-00 00:00:00', '');
INSERT INTO `transport_chauffeurs`
VALUES (2, 'Luan HAZIRI', 'LUA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_chauffeurs`
VALUES (3, 'Djamila AMRANI', 'DJA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_chauffeurs`
VALUES (4, 'Pierre-Alain BONFILS', 'PIA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_chauffeurs`
VALUES (5, 'Vincent DUBOULOZ', 'VCT', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_chauffeurs` VALUES (6, 'Autres', 'AUT', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_chauffeurs`
VALUES (7, 'Kamran NAFISSPOUR', 'KNA', 'Transmed', 2, NULL, '0000-00-00 00:00:00', '');
INSERT INTO `transport_chauffeurs`
VALUES (10, 'Patrick Molina', 'PAM', 'Transmed', 53, NULL, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transport_clients`
--

CREATE TABLE `transport_clients` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `pseudo`            VARCHAR(50)      NOT NULL,
  `liste_restrictive` TINYINT(1)       NOT NULL DEFAULT '0',
  `web_view`          VARCHAR(50)               DEFAULT NULL,
  `last_name`         VARCHAR(50)               DEFAULT NULL,
  `first_name`        VARCHAR(50)               DEFAULT NULL,
  `address`           VARCHAR(50)               DEFAULT NULL,
  `cp`                VARCHAR(50)               DEFAULT NULL,
  `city`              VARCHAR(50)               DEFAULT NULL,
  `country`           VARCHAR(50)               DEFAULT NULL,
  `default_price`     DECIMAL(10, 2)            DEFAULT '0.00',
  `default_depart`    VARCHAR(70)               DEFAULT NULL,
  `default_arrivee`   VARCHAR(70)               DEFAULT NULL,
  `liste_rank`        INT(11)                   DEFAULT NULL,
  `remarque`          TEXT,
  `input_date`        DATE                      DEFAULT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`          VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transport_clients`
--

INSERT INTO `transport_clients` VALUES
  (4, 'COLLINE', 1, 'COLLINE', 'COLLINE', '', NULL, NULL, 'Genève', 'Suisse', NULL, NULL, NULL, 1, NULL, NULL,
   '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (5, 'AUTRES', 1, 'AUTRES', 'AUTRES', '', NULL, NULL, 'Genève', 'Suisse', NULL, NULL, NULL, 1, NULL, NULL,
   '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (6, 'Tour_Patient', 1, 'Tour Patient', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin',
      'Suisse', NULL, NULL, NULL, 2, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (7, 'Tour_Sang', 0, 'Tour Sang', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse',
      NULL, NULL, NULL, 3, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (8, 'Carouge_Sang', 0, 'Carouge Sang', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin',
      'Suisse', NULL, NULL, NULL, 4, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (9, 'AURELIE', 0, 'Aurélie AI', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse', '60.00',
   NULL, NULL, 50, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (10, 'AURELIE_Med', 0, 'Aurélie Medecin', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse',
       '60.00', NULL, NULL, 50, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (11, 'ELZIZOUNE', 1, 'ELZIZOUNE Bouchaib', 'ELZIZOUNE', 'Bouchaib', 'Rue de Berne 60', '1202', 'Genève', 'Suisse',
       '45.00', 'Domicile', 'HUG Dialyse', 50, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (12, 'NAF_Kamy', 0, 'NAFISSPOUR Privee', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève', 'Suisse',
       NULL, NULL, NULL, 50, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (13, 'NAFISSPOUR', 1, 'NAFISSPOUR Travail', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève',
       'Suisse', '40.00', 'Travail', 'Domicile', 50, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (14, 'AUDE', 0, ' Aude', '', 'Aude', 'Route de Saint-Julien 297', '1258', 'Perly', 'Suisse', NULL, NULL, NULL, 100,
   NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (15, 'TAG', 0, ' Isaac', '', 'Isaac', 'Case postale 575', '1211', 'Genève 13', 'Suisse', NULL, NULL, NULL, 100, NULL,
   NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (16, 'ALOHA', 0, 'ALOHA', 'HUBER', 'Rolf', 'Rue de la Fontaine 13', '1204', 'Genève', 'Suisse', NULL, NULL, NULL, 100,
   NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (17, 'PARTNERS', 0, 'BOUDINA James', 'BOUDINA', 'James', 'Route de Saint-Georges 83', '1213', 'Petit-Lancy', 'Suisse',
       NULL, NULL, NULL, 100, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (18, 'Mines_ICBL', 0, 'BRASSIER Audrey', 'BRASSIER', 'Audrey', 'Rue de Cornavin 9', '1201', 'Genève', 'Suisse', NULL,
   NULL, NULL, 100, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (19, 'ALBER', 0, 'ALBER Clotilde', 'ALBER', 'Clotilde', 'Avenue de Champel 64', '1206', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (20, 'AMEZ_DROZ', 0, 'AMEZ-DROZ Edouard', 'AMEZ-DROZ', 'Edouard', 'Chemin de la Vieille-Ferme 8', '1255', 'Veyrier',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (21, 'AMREIN', 0, 'AMREIN Suzanne', 'AMREIN', 'Suzanne', 'Cité Vieussieux 8', '1203', 'Genève', 'Suisse', '40.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (22, 'ANDEREGG', 0, 'ANDEREGG Paul', 'ANDEREGG', 'Paul', 'Rue du Vieux Moulin 9', '1213', 'OnexLE', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (23, 'ANDREY', 0, 'ANDREY Christophe', 'ANDREY', 'Christophe', 'Rue Gardiol 5', '1218', 'Le Grand-Saconnex', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (24, 'ANKER_M', 0, 'ANKER Marc', 'ANKER', 'Marc', 'Promenade de l\'Europe 59', '1203', 'Genève', 'Suisse', '40.00',
   'Domicile', 'Physio, 26 rue Guiseppe Motta', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (25, 'ANKER', 0, 'ANKER Yvonne', 'ANKER', 'Yvonne', 'Promenade de l\'Europe 59', '1203', 'Genève', 'Suisse', '40.00',
   'Domicile', 'Physio, 26 rue Guiseppe Motta', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (26, 'ARIAS', 0, 'ARIAS José-Miguel', 'ARIAS', 'José-Miguel', 'Chemin Bournoud 13-15', '1217', 'Meyrin', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (27, 'ARMAND', 0, 'ARMAND Henry', 'ARMAND', 'Henry', 'Chemin de la Caroline 24', '1213', 'Petit - Lancy', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (28, 'AUBERT', 0, 'AUBERT Roselyne', 'AUBERT', 'Roselyne', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (29, 'AVONDO', 0, 'AVONDO Marie', 'AVONDO', 'Marie', 'Avenue de la Pruley 44', '1217', 'Meyrin', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (30, 'BALBWIN', 0, 'BALDWIN Théo', 'BALDWIN', 'Théo', 'Grand-Montfleury 50', '1290', 'Versoix', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (31, 'BAZZACCHI', 0, 'BAZZACCHI Lucienne', 'BAZZACCHI', 'Lucienne', 'Grand-Pré 37', '1202', 'Genève', 'Suisse',
       '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (32, 'BEGER', 0, 'BEGER Iris', 'BEGER', 'Iris', 'Chemin Perrault-de-Jotemps 9\r\n', '1217', 'Meyrin', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (33, 'BENOIST_FILLE', 0, 'BENOIST Stéphanie', 'BENOIST', 'Stéphanie', 'C§hemin du Velours 20', '1231', 'Conches',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (34, 'BERNASCONI', 0, 'BERNASCONI Alexandre', 'BERNASCONI', 'Alexandre', 'Chemin des Crêts-de-Pregny 7A', '1218',
       'le Grand-Saconnex', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (35, 'BIBES', 0, 'BIBES Jeanne', 'BIBES', 'Jeanne', 'Rue de la Poterie 20', '1202', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (36, 'BLANDIN', 0, 'BLANDIN Jean-François', 'BLANDIN', 'Jean-François', 'Chemin Crétoillet 30', '1256', 'Troinex',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (37, 'BLOEDHORN', 0, 'BLOEDHORN Alexandre', 'BLOEDHORN', 'Alexandre', 'Rue de la Tambourine 38', '1227', 'Carouge',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (38, 'BOLOMEY', 0, 'BOLOMEY Ignace', 'BOLOMEY', 'Ignace', 'Chemin de la Citadelle 71', '1217', 'Meyrin', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (39, 'BONZON', 0, 'BONZON Edith', 'BONZON', 'Edith', 'Rue Soubeyran 8', '1203', 'Genève', 'Suisse', '40.00',
   'Domicile', 'Physio, 10 rue Galatin', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (40, 'BONZON_Mich', 0, 'BONZON Michèle', 'BONZON', 'Michèle', 'Chemin de Blonay 4', '1234', 'Vessy', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (41, 'BORNOZ', 0, 'BORNOZ Marcel', 'BORNOZ', 'Marcel', 'Avenue des Morgines 37', '1213', 'Onex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (42, 'BOSSENS', 0, 'BOSSENS Hélène', 'BOSSENS', 'Hélène', 'Chemin Briquet 26', '1209', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (43, 'BOSTEELS', 0, 'BOSTEELS Michel', 'BOSTEELS', 'Michel', 'Chemin de Gaillard 276', ' 01160', 'Challex', 'France',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (44, 'BOUCHET', 0, 'BOUCHET Raymond', 'BOUCHET', 'Raymond', 'Rue Fort-Barreau 19', '1201', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (45, 'BROILLET', 0, 'BROILLET Bernard', 'BROILLET', 'Bernard', 'Avenue du Pont-Butin 70', '1213', 'Petit-Lancy',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (46, 'BUDEYRI', 0, 'BUDEYRI Wijdan', 'BUDEYRI', 'Wijdan', 'Rue du Nant 34', '1207', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (47, 'BURGENER', 0, 'BURGENER André', 'BURGENER', 'André', 'Rue de Moillebeau 57', '1209', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (48, 'BURNAT', 0, 'BURNAT Janine', 'BURNAT', 'Janine', 'Place Sigsimond 2', '1227', 'Carouge', 'Suisse', '35.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (49, 'CARNAL_Mme', 0, 'CARNAL Liliane', 'CARNAL', 'Liliane', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (50, 'CARNAL_R', 0, 'CARNAL Raymond', 'CARNAL', 'Raymond', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', '45.00',
   'Domicile', 'HUG Dialyse', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (51, 'CARUANA', 0, 'CARUANA Paul', 'CARUANA', 'Paul', 'Maison familiale du Genevois', '74160', 'Collonge s/Salève',
       'France', '60.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (52, 'CERROTI', 0, 'CERROTI Georges', 'CERROTI', 'Georges', 'Avenue du Lignon 21', '1219', 'Le Lignon', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (53, 'CHARLET', 0, 'CHARLET Sylvette', 'CHARLET', 'Sylvette', 'Avenue de Crozet 4', '1219', 'Châtelaine', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (54, 'CHERVAZ', 0, 'CHERVAZ Gérard', 'CHERVAZ', 'Gérard', 'Chemin De-La-Montagne 106', '1224', 'Chêne-Bougeries',
       'Suisse', '50.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (55, 'CHERVET', 0, 'CHERVET Alfred', 'CHERVET', 'Alfred', 'Rue des Bossons 19', '1213', 'Onex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (56, 'CHEVALLIER', 0, 'CHEVALLIER Françoise', 'CHEVALLIER', 'Françoise', 'Rue des Délices 1', '1204', 'Genève',
       'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (57, 'CHTIOUI', 0, 'CHTIOUI Sanaa', 'CHTIOUI', 'Sanaa', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', '40.00',
   'Domicile', 'Service Industriel de Genève', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (58, 'CLERC', 0, 'CLERC', 'CLERC', 'Jean-daniel', 'Rue des Bossons 15', '1213', 'Onex', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (59, 'COLOMB', 0, 'COLOMB Gilles', 'COLOMB', 'Gilles', 'Chemin du Villaret 1', '1224', 'Chêne-Bougeries', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (60, 'COSTA', 0, 'COSTA Tania', 'COSTA', 'Tania', 'Avenue de Feuillasse 1', '1217', 'Meyrin', 'Suisse', '45.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (61, 'COURT', 0, 'COURT Elisa', 'COURT', 'Elisa', 'Quai du Seulet 34', '1201', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (62, 'DAUDIN', 0, 'DAUDIN Jean', 'DAUDIN', 'Jean', 'Rue de Lyon 65bis', '1203', 'Genève', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (63, 'DE_MONFALCON', 0, 'DE MONFALCON Juliette', 'DE MONFALCON', 'Juliette', 'Rue des Vollandes 1', '1207', 'Genève',
       'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (64, 'DE_MORAWITZ', 0, 'DE MORAWITZ Karl', 'DE MORAWITZ', 'Karl', 'Place du Marché 15', '1227', 'Carouge', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (65, 'DE_REMY', 0, 'DE REMY Jean', 'DE REMY', 'Jean', 'Plateau de Champel 18', '1206', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (66, 'DECONYNK', 0, 'DECONYNK Yvon', 'DECONYNK', 'Yvon', 'Chemin de la Prulay 72', '1217', 'Meyrin', 'Suisse',
       '45.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (67, 'DERBIGNY', 0, 'DERBIGNY Jeanne', 'DERBIGNY', 'Jeanne', 'Route d\'Aire-la-Ville 226', '1242', 'Satigny',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (68, 'DESAUTEZ', 0, 'DESAUTEZ Pauline', 'DESAUTEZ', 'Pauline', 'Rue de Livron 29', '1217', 'Meyrin', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (69, 'DESCOMBES', 0, 'DESCOMBES Michel', 'DESCOMBES', 'Michel', 'Rue des Bossons 24', '1213', 'Onex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (70, 'DI_BENEDETTO_Cal', 0, 'DI BENEDETTO Calogero', 'DI BENEDETTO', 'Calogero', 'Chemin Longe-l\'Aire 18', '1212',
       'Grand-Lancy', 'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (71, 'DI_BENEDETTO', 0, 'DI BENEDETTO Margueritte', 'DI BENEDETTO', 'Margueritte', 'Chemin Longe-l\'Aire 18', '1212',
       'Grand-Lancy', 'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (72, 'DOCTOR', 0, 'DOCTOR Narad', 'DOCTOR', 'Narad', 'Chemin de Pont-Céard 42', '1290', 'Versoix', 'Suisse', '45.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (73, 'DORSAZ', 0, 'DORSAZ Agnès', 'DORSAZ', 'Agnès', 'Avenue Bois-de-la-Chapelle 9', '1213', 'Petit-Lancy', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (74, 'DUBOIS', 0, 'DUBOIS Marie-Jeanne', 'DUBOIS', 'Marie-Jeanne', 'Chemin Moïse-Duboule 17', '1209', 'Genève',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (75, 'DUFRENE', 0, 'DUFRÊNE Chantal', 'DUFRÊNE', 'Chantal', 'Rue Curé-Descloud 17', '1226', 'Thônex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (76, 'DUMONT', 0, 'DUMONT Benoît', 'DUMONT', 'Benoît', 'Avenue Eugène-Pittard 11', '1206', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (77, 'DUPERREX', 0, 'DUPERREX Aloys', 'DUPERREX', 'Aloys', 'Rue de Monbrillant 61', '1202', 'Genève', 'Suisse',
       '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (78, 'EHRAT', 0, 'EHRAT Danièle', 'EHRAT', 'Danièle', 'Avenue Peschier 16', '1206', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (79, 'ELOUARET', 0, 'ELOUARET Soraya', 'ELOUARET', 'Soraya', 'Rue de Bandol 12', '1213', 'Onex', 'Suisse', '30.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (80, 'FARTACH_Mme', 0, 'FARTACH  Bernadette', 'FARTACH', ' Bernadette', 'Chemin de la Tourelle 16', '1209', 'Genève',
       'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (81, 'FARTACH_Suz', 0, 'FARTACH Suzanne', 'FARTACH', 'Suzanne', 'Ecole de Médecine 16', '1205', 'Genève', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (82, 'FAUQUEX', 0, 'FAUQUEX Jean-Paul  ', 'FAUQUEX', 'Jean-Paul  ', 'Rue des Minoteries 7', '1205', 'Genève',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (83, 'FAVRE_Puplinge', 0, 'FAVRE Christianne', 'FAVRE', 'Christianne', 'Chemin de Pré-Marquis 7b', '1241', 'Puplinge',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (84, 'FAVRE_Onex', 0, 'FAVRE Ruth', 'FAVRE', 'Ruth', 'Chemin de la Calle 38', '1213', 'Onex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (85, 'FAVRE_ANNE', 0, 'FAVRE-LUISIER  Anne Marie', 'FAVRE-LUISIER ', 'Anne Marie', 'Route de la Capite 157', '1222',
       'Vésenaz', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (86, 'FELL', 0, 'FELL Christine', 'FELL', 'Christine', 'Chemin Colladon 22', '1209', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (87, 'FIRME', 0, 'FIRME José Manuel', 'FIRME', 'José Manuel', 'rue des peupliers 6', '1205', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (88, 'FLAHAULT', 0, 'FLAHAULT Françoise', 'FLAHAULT', 'Françoise', 'Rue de Genève 94', '1226', 'Thônex', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (89, 'FORAY_Herve', 0, 'FORAY Hervé', 'FORAY', 'Hervé', 'Avenue de Mategnin 59', '1217', 'Meyrin', 'Suisse', '35.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (90, 'FORAY_Mme', 0, 'FORAY Roberte', 'FORAY', 'Roberte', 'Avenue de Mategnin 49', '1217', 'Meyrin', 'Suisse',
       '35.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (91, 'FOURNIER', 0, 'FOURNIER Charles', 'FOURNIER', 'Charles', 'Rue Charles-Bonnet 10', '1206', 'Genève', 'Suisse',
       NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (92, 'FRACHET', 0, 'FRACHET Margueritte', 'FRACHET', 'Margueritte', 'Avenue de Joli-Mont 3', '1209', 'Genève',
       'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (93, 'GARBANI', 0, 'GARBANI Roger', 'GARBANI', 'Roger', 'Rue des Allobroges 13', '1227', 'Les Acacias', 'Suisse',
       '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (94, 'GAY_BALMAT', 0, 'GAY-BALMAT Jeannine', 'GAY-BALMAT', 'Jeannine', 'Boulevard du Pont-d\'Arve 44', '1205',
       'Genève', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (95, 'GIANOLI', 0, 'GIANOLI Carlo', 'GIANOLI', 'Carlo', 'Avenue du Lignon 20', '1219', 'Le Lignon', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (96, 'GIAUQUE', 0, 'GIAUQUE Rémy', 'GIAUQUE', 'Rémy', 'Rue des Bossons 17', '1213', 'Onex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (97, 'GIGON', 0, 'GIGON Jean-Pierre', 'GIGON', 'Jean-Pierre', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (98, 'GIGON_Mme', 0, 'GIGON Radmila', 'GIGON', 'Radmila', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (99, 'VM_Gilabert', 0, 'GILABERT ', 'GILABERT', '', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (100, 'GIRAUD', 0, 'GIRAUD Christian', 'GIRAUD', 'Christian', 'Chemin de Maisonneuve 12c', '1219', 'Châtelaine',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (101, 'GONZALEZ', 0, 'GONZALEZ Antonio', 'GONZALEZ', 'Antonio', 'Route de Meyrin 17', '1202', 'Genève', 'Suisse',
        '40.00', 'Domicile', 'Cressy Santé, Physio', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (102, 'GORGE', 0, 'GORGE Pierre', 'GORGE', 'Pierre', 'Chemin de l´Ancien-Péage 2', '1290', 'Versoix', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (103, 'GRANFAR', 0, 'GRANFAR Ebrahim', 'GRANFAR', 'Ebrahim', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse',
        '45.00', 'Domicile', 'Relais Dumas, Grand-Saconnex', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (104, 'GRANFAR_Mme', 0, 'GRANFAR Vida', 'GRANFAR', 'Vida', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (105, 'GRIN', 0, 'GRIN Denis', 'GRIN', 'Denis', 'Avenue Wendt 38', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200,
   NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (106, 'GROSSE', 0, 'GROSSE Christel', 'GROSSE', 'Christel', 'Rue du Loup 3', '1213', 'Onex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (107, 'GUILLERMIN', 0, 'GUILLERMIN Jean', 'GUILLERMIN', 'Jean', 'Route de Bernex 392', '1233', 'Bernex', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (108, 'CHRISTINE', 0, 'GUTKNECHT Christine', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix',
        'Suisse', '45.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (109, 'GUTKNECHT', 0, 'GUTKNECHT Christine', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix',
        'Suisse', '45.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (110, 'HAAS', 0, 'HAAS Karoline', 'HAAS', 'Karoline', 'Chemin de Saule 94', '1233', 'Bernex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (111, 'HALPERIN', 0, 'HALPÉRIN Noemi', 'HALPÉRIN', 'Noemi', 'Avenue Alfred-Bertrand 13', '1206', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (112, 'HAUSSER', 0, 'HAUSSER Josianne', 'HAUSSER', 'Josianne', 'Chemin des Rayes 33', '1222', 'Vésenaz', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (113, 'HERZI', 0, 'HERZI Taoufik', 'HERZI', 'Taoufik', 'Route d\'Hermance 296', '1229', 'Anières', 'Suisse', '45.00',
   'Domicile', 'Hôpital de Beau-Séjour', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (114, 'HEURTEUX', 0, 'HEURTEUX Philippe', 'HEURTEUX', 'Philippe', 'Route d\'Hermance 401', '1229', 'Anières',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (115, 'HORVATH', 0, 'HORVATH Giovanna', 'HORVATH', 'Giovanna', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (116, 'HUISSOUD', 0, 'HUISSOUD Maurice', 'HUISSOUD', 'Maurice', 'Chemin Etienne-Chennaz 10', '1226', 'Thônex',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (117, 'ILG', 0, 'ILG Colette', 'ILG', 'Colette', 'Chemin des Tulipiers 23', '1208', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (118, 'CHO_IMERETINSKY', 0, 'IMERETINSKY Nadeja', 'IMERETINSKY', 'Nadeja', 'Route des Jurets 12', '1244', 'Choulex',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (119, 'IMHOF', 0, 'IMHOF Edouard', 'IMHOF', 'Edouard', 'Rue Vautier 26', '1227', 'Carouge', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (120, 'INEICHEN', 0, 'INEICHEN Marie-Elisabeth', 'INEICHEN', 'Marie-Elisabeth', 'Avenue Calas 20', '1206', 'Genève',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (121, 'ROBERTA', 0, 'ISABELLA-VALENZI Roberta', 'ISABELLA-VALENZI', 'Roberta', 'Rue de la Croix-du-Levant 7', '1220',
        'Les Avanchets', 'Suisse', '50.00', 'Domicile', 'Centre de jour Solaris, Collonge-Bellerive', 200, NULL, NULL,
   '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (122, 'JANNER', 0, 'JANNER Claude', 'JANNER', 'Claude', 'Avenue Wendt 23', '1203', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (123, 'JEANNET', 0, 'JEANNET Madeleine Pierrette', 'JEANNET', 'Madeleine Pierrette', 'Chemin des Coquelicots 29',
        '1214', 'Vernier', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (124, 'KHAN_Mme', 0, 'KHAN Shamim', 'KHAN', 'Shamim', 'Chemin des Bugnons 10', '1217', 'Meyrin', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (125, 'KOCHER', 0, 'KOCHER ZELLER Gaby', 'KOCHER ZELLER', 'Gaby', 'Chemin Rieu 10', '1208', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (126, 'KRASNOPOLSKY', 0, 'KRASNOPOLSKY Lucie', 'KRASNOPOLSKY', 'Lucie', 'Route de Frontenex 51', '1207', 'Genève',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (127, 'KREBS', 0, 'KREBS André', 'KREBS', 'André', 'Avenue d\'Aïre 89', '1203', 'Genève', 'Suisse', '35.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (128, 'LALIVE', 0, 'LALIVE D\'EPINAY Pierre', 'LALIVE D\'EPINAY', 'Pierre', 'Rue des Sources 13', '1205', 'Genève',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (129, 'LEHR', 0, 'LEHR-BYRDE Paule', 'LEHR-BYRDE', 'Paule', 'Chemin de Grange-Falquet 51', '1224', 'Chêne-Bougeries',
        'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (130, 'LEQUINT', 0, 'LEQUINT Claudine', 'LEQUINT', 'Claudine', 'Chemin de Chapelly 22', '1226', 'Thônex', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (131, 'LEVY', 0, 'LEVY Melita', 'LEVY', 'Melita', 'Rue Robert-De-Traz 2', '1206', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (132, 'LIARDON', 0, 'LIARDON Lydie', 'LIARDON', 'Lydie', 'Quai Charles-Page 45', '1205', 'Genève', 'Suisse', '40.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (133, 'LIFTON', 0, 'LIFTON Danielle', 'LIFTON', 'Danielle', 'Lotissement Trélatoun 77', '01170', 'Cessy', 'France',
        '60.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (134, 'LINDER', 0, 'LINDER Willi', 'LINDER', 'Willi', 'Rue Carteret 38', '1202', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (135, 'LUCINI', 0, 'LUCINI Lily', 'LUCINI', 'Lily', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (136, 'LUGASSY', 0, 'LUGASSY Raphaël', 'LUGASSY', 'Raphaël', 'Route de Chêne 70', '1208', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (137, 'MAGNIN', 0, 'MAGNIN Mario', 'MAGNIN', 'Mario', 'Chemin Briquet 18', '1218', 'Le Grand-Saconnex', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (138, 'MAIO', 0, 'MAIO Sabatino', 'MAIO', 'Sabatino', 'Avenue de Thônex 8', '1225', 'Chêne-Bourg', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (139, 'MALEH', 0, 'MALEH Suha', 'MALEH', 'Suha', 'Route de Florissant 70', '1206', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (140, 'MANSON', 0, 'MANSON-CAEN Joëlle', 'MANSON-CAEN', 'Joëlle', 'Avenue d\'Aïre 73B', '1203', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (141, 'MARCHAND', 0, 'MARCHAND Chantal', 'MARCHAND', 'Chantal', 'Rue François Besson 14', '1217', 'Meyrin', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (142, 'MARES', 0, 'MARES Eketharrina', 'MARES', 'Eketharrina', 'Avenue Ernest-Pictet 16', '1203', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (143, 'MARESCA', 0, 'MARESCA Gisela', 'MARESCA', 'Gisela', 'Rue de la Dôle 2', '1203', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (144, 'MARTIN_MA', 0, 'MARTIN Marie-Augusta', 'MARTIN', 'Marie-Augusta', 'Cours Saint-Pierre 1', '1204', 'Genève',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (145, 'MATHIEU', 0, 'MATHIEU ', 'MATHIEU', '', 'Chemin du Pré-du-Couvent 1', '1224', 'Chêne-Bougeries', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (146, 'MATHYS', 0, 'MATHYS Jean', 'MATHYS', 'Jean', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (147, 'MATHYS_Simone', 0, 'MATHYS Simone', 'MATHYS', 'Simone', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (148, 'MAURON', 0, 'MAURON Francine', 'MAURON', 'Francine', 'Rue du Grand Pré 30', '1202', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (149, 'MECCA', 0, 'MECCA Vincenzo', 'MECCA', 'Vincenzo', 'Rue Caroline 53', '1227', 'Carouge', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (150, 'MESIN', 0, 'MESIN Mehmet', 'MESIN', 'Mehmet', 'Chemin du Fief-de-Chapitre 9', '1213', 'Petit-Lancy', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (151, 'MESOT', 0, 'MESOT André', 'MESOT', 'André', 'Chemin de la Mère Voie 78', '1228', 'Plan-les-Ouates', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (152, 'MEYLAN', 0, 'MEYLAN xxx', 'MEYLAN', 'xxx', 'Chemin de Saule 10', '1233', 'Bernex', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (153, 'MONNAY_Mariette', 0, 'MONNAY Mariette', 'MONNAY', 'Mariette', 'Route d\'Aïre 141', '1219', 'Aïre', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (154, 'MOTTET_Pat', 0, 'MOTTET Patricia', 'MOTTET', 'Patricia', 'Route de Frontenex 37', '1207', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (155, 'MULLER', 0, 'MULLER Elisabeth', 'MULLER', 'Elisabeth', 'Rue Henri-Mussard 14', '1208', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (156, 'MUNSPERGER', 0, 'MUNSPERGER Johann', 'MUNSPERGER', 'Johann', 'Avenue François-Besson 20', '1217', 'Meyrin',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (157, 'MURATOVIC', 0, 'MURATOVIC Enver', 'MURATOVIC', 'Enver', 'Avenue Louis-Casaï 39', '1220', 'Les Avanchets',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (158, 'MURISIER', 0, 'MURISIER Etienne', 'MURISIER', 'Etienne', 'Chemin du Stade 7A', '1252', 'Meinier', 'Suisse',
        '45.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (159, 'MUSINA', 0, 'MUSINA Jean', 'MUSINA', 'Jean', 'Rue Adhémar-Fabri 4', '1201', 'Genève', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (160, 'MUTZENBERG', 0, 'MUTZENBERG Andrée', 'MUTZENBERG', 'Andrée', 'Avenue du Mail 24', '1205', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (161, 'MUXUDIIN', 0, 'MUXUDIIN KHAALI Abuukar', 'MUXUDIIN KHAALI', 'Abuukar', 'Rue des Lilas 11', '1202', 'Genève',
        'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (162, 'Neuenschwander', 0, 'NEUENSCHWANDER Irène', 'NEUENSCHWANDER', 'Irène', 'Route de Chancy 154', '1213', 'Onex',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (163, 'NICOLA', 0, 'NICOLA Jacques-Bernard', 'NICOLA', 'Jacques-Bernard', 'Chemin Fief-de-Chapitre 10', '1213',
        'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (164, 'NIEMINEN', 0, 'NIEMINEN Leena', 'NIEMINEN', 'Leena', 'Rue Marius Cadoz 204', '01170', 'Gex', 'France', '60.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (165, 'NORTE', 0, 'NORTE Diane', 'NORTE', 'Diane', 'Communes Réunies 72', '1212', 'Gand-Lancy', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (166, 'ODEMS_', 0, 'ODEMS  Mary-Ann', 'ODEMS ', 'Mary-Ann', 'Rue de la Servette 71', '1202', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (167, 'OHANA', 0, 'OHANA Olivier Paul', 'OHANA', 'Olivier Paul', 'Chemin des Crêts 10', '01610', 'Saint Genis ',
        'France', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (168, 'MOMO', 0, 'OMAIS Mohamed', 'OMAIS', 'Mohamed', 'Rue Daniel Gervil, 17', '1227', 'Carouge', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (169, 'ORTEGA', 0, 'ORTEGA Carmen', 'ORTEGA', 'Carmen', 'Avenue du Gros-Chêne 37', '1213', 'Onex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (170, 'PACHON', 0, 'PACHON Roger', 'PACHON', 'Roger', 'Chemin des Vidolets 25', '1214', 'Vernier', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (171, 'PANT', 0, 'PANT Sudhir', 'PANT', 'Sudhir', 'Rue Cherbuliez 7', '1207', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (172, 'PAUX', 0, 'PAUX Marcelle', 'PAUX', 'Marcelle', 'Rue Vermont 31', '1202', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (173, 'PERRNOUD', 0, 'PERRNOUD Jean-Pierre', 'PERRNOUD', 'Jean-Pierre', 'Chemin de Saule 98', '1233', 'Bernex',
        'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (174, 'PFAUTI', 0, 'PFAUTI Marc', 'PFAUTI', 'Marc', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', '35.00',
   'Domicile', 'Dialyse GMO, Onex', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (175, 'PFAUTI1', 0, 'PFAUTI Marc', 'PFAUTI', 'Marc', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (176, 'PIGUET_Adèle', 0, 'PIGUET Adda Marcel', 'PIGUET', 'Adda Marcel', 'Avenue Vibert 17', '1227', 'Carouge',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (177, 'PIGUET', 0, 'PIGUET Martiale', 'PIGUET', 'Martiale', 'Chemin De-Vincy 3', '1202', 'Genève', 'Suisse', '40.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (178, 'PILLET_France', 0, 'PILLET Annamma', 'PILLET', 'Annamma', 'Rue du Château 10', '01170', 'Cessy', 'France',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (179, 'PILLOUD', 0, 'PILLOUD Nicolas', 'PILLOUD', 'Nicolas', 'ManqueManque', NULL, 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (180, 'PISONI', 0, 'PISONI Vladimir', 'PISONI', 'Vladimir', 'Boid-dde-la-Chapelle 67', '1213', 'Onex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (181, 'PLOJOUX', 0, 'PLOJOUX Marie-Noëlle', 'PLOJOUX', 'Marie-Noëlle', 'Route d\'Aire-la-Ville 219', '1242',
        'Satigny', 'Suisse', '60.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (182, 'POSS', 0, 'POSS Marie-Louise', 'POSS', 'Marie-Louise', 'Route de Bernex 359', '1233', 'Bernex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (183, 'PROBST_Mme', 0, 'PROBST Liliane', 'PROBST', 'Liliane', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (184, 'PROBST_Walter', 0, 'PROBST Walter', 'PROBST', 'Walter', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (185, 'PROUZET', 0, 'PROUZET René', 'PROUZET', 'René', 'Avenue Wendt 1', '1203', 'Genève', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (186, 'PYTHON', 0, 'PYTHON Georges', 'PYTHON', 'Georges', 'Chemin Taverney 12', '1218', 'Le Grand-Saconnex', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (187, 'VM_RAEMY', 0, 'RAEMY Margit', 'RAEMY', 'Margit', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (188, 'RANIERI', 0, 'RANIERI Sabine', 'RANIERI', 'Sabine', 'Rue de la Fontenette 28', '1227', 'Carouge', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (189, 'RANIERIE', 0, 'RANIERIE Sabine', 'RANIERIE', 'Sabine', 'Rue de la Fontenette 28', '1227', 'Carouge', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (190, 'RAY', 0, 'RAY Clelia', 'RAY', 'Clelia', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200,
   NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (191, 'RAYMONDON', 0, 'RAYMONDON Jacques', 'RAYMONDON', 'Jacques', 'Route d\'Avully 107', '1237', 'Avully', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (192, 'REBMANN', 0, 'REBMANN Véréna', 'REBMANN', 'Véréna', 'Rue de Vermont 16', '1202', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (193, 'RENCHET', 0, 'RENCHET Georges', 'RENCHET', 'Georges', 'Chemin de la Bâtie 7', '1213', 'Petit-Lancy', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (194, 'RENFER', 0, 'RENFER Marcel', 'RENFER', 'Marcel', 'Rue de la Dôle 18', '1203', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (195, 'RICCARDELLI', 0, 'RICCARDELLI Maria', 'RICCARDELLI', 'Maria', 'Avenue du Ligon 50-53', '1219', 'Le Lignon',
        'Suisse', '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (196, 'RITSCHARD', 0, 'RITSCHARD ', 'RITSCHARD', '', 'Rue Cavour 3', '1203', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (197, 'RITSCHARD_Rudolf', 0, 'RITSCHARD Jure Rudolf', 'RITSCHARD', 'Jure Rudolf', 'Route de Chancy 98', '1213',
        'Onex', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (198, 'RKIZA', 0, 'RKIZA Silvia', 'RKIZA', 'Silvia', 'Avenue d\'Aire 91A', '1203', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (199, 'ROCHANAKORN', 0, 'ROCHANAKORN Kasidis', 'ROCHANAKORN', 'Kasidis', 'Chemin Sansonnets 4', '1291', 'Commugny',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (200, 'ROCHAT', 0, 'ROCHAT Philippe', 'ROCHAT', 'Philippe', 'Rue Emile-Nicolet 13', '1205', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (201, 'RODAK', 0, 'RODAK Irène', 'RODAK', 'Irène', 'Chemin de la Charrue 11', '1218', 'Le Grand-Saconnex', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (202, 'ROLLIER', 0, 'ROLLIER Jean-Pierre', 'ROLLIER', 'Jean-Pierre', 'Avenue du Lignon 53', '1219', 'Le Lignon',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (203, 'CHO_Rosset', 0, 'ROSSET Jacqueline', 'ROSSET', 'Jacqueline', 'Route des Jurets 12', '1244', 'Choulex',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (204, 'ROSSET', 0, 'ROSSET René', 'ROSSET', 'René', 'Rue Dancet 3', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200,
   NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (205, 'RUSCITO', 0, 'RUSCITO Bruno', 'RUSCITO', 'Bruno', 'Route des Vainges 282', '74380', 'Nangy', 'France', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (206, 'SALLIN', 0, 'SALLIN Marc', 'SALLIN', 'Marc', 'Parc Dinu-Lipatti 5', '1225', 'Chêne-Bourg', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (207, 'SALZ', 0, 'SALZMANN Angèle', 'SALZMANN', 'Angèle', 'Route de Malagnou 16', '1208', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (208, 'SALZMANN', 0, 'SALZMANN Johana', 'SALZMANN', 'Johana', 'Avenue des Cavaliers Avenue des Cavaliers 5', '1224',
        'Chêne-Bougeries', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (209, 'SANT', 0, 'SANT Mira', 'SANT', 'Mira', 'Croix-du-Levant 14', '1220', 'Les Avanchets', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (210, 'SANTINES', 0, 'SANTINES Joseph', 'SANTINES', 'Joseph', 'Grand-Monfleury 2', '1290', 'Versoix', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (211, 'SAUVAIN_CHARLY', 0, 'SAUVAIN Charly', 'SAUVAIN', 'Charly', 'Rue du Village 3', '1214', 'Vernier', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (212, 'SAUVAIN_Mme', 0, 'SAUVAIN Christiane', 'SAUVAIN', 'Christiane', 'Rue du Village 3', '1214', 'Vernier',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (213, 'SAUVET', 0, 'SAUVET Olivier', 'SAUVET', 'Olivier', 'Rue de l\'Aubépine 13', '1205', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (214, 'SCHALTEGGER', 0, 'SCHALTEGGER Marguerite', 'SCHALTEGGER', 'Marguerite', 'Chemin de Saule  71', '1233',
        'Bernex', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (215, 'SCHNEiDER', 0, 'SCHNEiDER André', 'SCHNEiDER', 'André', 'Chemin du Champs-d\'Anier 8', '1209', 'Genève',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (216, 'SCHROETER', 0, 'SCHROETER Sonia', 'SCHROETER', 'Sonia', 'Avenue du Mail 20', '1205', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (217, 'SCHURMANN', 0, 'SCHURMANN Agnès', 'SCHURMANN', 'Agnès', 'Promenade de Champs-Fréchets 14', '1217', 'Meyrin',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (218, 'SCHWERI', 0, 'SCHWERI Ernest', 'SCHWERI', 'Ernest', 'Avenue de France 31', '1202', 'Genève', 'Suisse', '35.00',
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (219, 'SCHWERZMANN', 0, 'SCHWERZMANN Simone', 'SCHWERZMANN', 'Simone', 'Rue des evaux 7', '1213', 'Onex', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (220, 'SEN', 0, 'SEN Omer', 'SEN', 'Omer', 'Avenue Frédéric-Soret 24', '1203', 'Genève', 'Suisse', '40.00', NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (221, 'SHAHADAT', 0, 'SHAHADAT Naseerha', 'SHAHADAT', 'Naseerha', 'Cité Vieusseux  7', '1203', 'Genève', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (222, 'SICOVIER', 0, 'SICOVIER Ivan', 'SICOVIER', 'Ivan', 'Rue Chabrey 9', '1202', 'Genève', 'Suisse', '40.00',
   'Domicile', 'Hôpital de La Tour, Hemodialyse', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (223, 'SICURANZA', 0, 'SICURANZA Norma', 'SICURANZA', 'Norma', 'Route de Colovray 4', '1218', 'Le Grand-Saconnex',
        'Suisse', '40.00', 'Domicile', 'Dr Ilic, 4 rue Gourgas', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (224, 'SIEBERT', 0, 'SIEBERT Margit', 'SIEBERT', 'Margit', 'Avenue Soret 4', '1203', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (225, 'SOMMERHALDER', 0, 'SOMMERHALDER Anita', 'SOMMERHALDER', 'Anita', 'Avenue de Vaudagne 35', '1217', 'Meyrin',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (226, 'SORDAT', 0, 'SORDAT Olivier', 'SORDAT', 'Olivier', 'Chemin de la Traille 30', '1213', 'Genève', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (227, 'STOPFER', 0, 'STOPFER Hans', 'STOPFER', 'Hans', 'Rue louis-Favre 37', '1201', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (228, 'TALLEUX', 0, 'TALLEUX Denise', 'TALLEUX', 'Denise', 'Chemin De-La-Montagne 112', '1224', 'Chêne-Bougeries',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (229, 'THEVOZ', 0, 'THEVOZ Geneviève', 'THEVOZ', 'Geneviève', 'Rue Jean-Robert-Chouet 17', '1202', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (230, 'VM_Torello', 0, 'TORELLO Jacqueline', 'TORELLO', 'Jacqueline', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (231, 'TOSCANO', 0, 'TOSCANO Sandro', 'TOSCANO', 'Sandro', 'Rue Moïse Duboule 31', '1209', 'Genève', 'Suisse',
        '40.00', NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (232, 'TRENTAZ', 0, 'TRENTAZ Georgette', 'TRENTAZ', 'Georgette', 'Rue du Grand-Pré 55', '1202', 'Genève', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (233, 'TZORTIS', 0, 'TZORTIS-WIEDMER Christiane Aline', 'TZORTIS-WIEDMER', 'Christiane Aline', 'Route de Chancy 42',
        '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (234, 'VALLAT', 0, 'VALLAT Brigitte', 'VALLAT', 'Brigitte', 'Boulevard des Promenades 20', '1227', 'Carouge',
        'Suisse', NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (235, 'VALLEPIN', 0, 'VALLEPIN Daniel', 'VALLEPIN', 'Daniel', 'Rue des Mésanges 6', '74160', 'Saint-Julien', 'France',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (236, 'VALLET', 0, 'VALLET Patricia', 'VALLET', 'Patricia', 'Avenue du Lignon 67', '1219', 'Le Lignon', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (237, 'VINCI', 0, 'VINCI Maria', 'VINCI', 'Maria', 'Chemin de Vi-Longe13', '1213', 'Onex', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (238, 'VUSICKI', 0, 'VUSICKI Nevenka', 'VUSICKI', 'Nevenka', 'Rroute Antoine-Martin 31A', '1234', 'Vessy', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (239, 'WASMER', 0, 'WASMER Rose-Marie', 'WASMER', 'Rose-Marie', 'Rue Le-Corbusier 21a', '1208', 'Genève', 'Suisse',
        '40.00', 'Domicile', 'Physio, 25 rue Jacques-Grosselin', 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (240, 'WEBER_F', 0, 'WEBER Francine', 'WEBER', 'Francine', 'Rue de Moillebeau 3A', '1209', 'Genève', 'Suisse', NULL,
   NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (241, 'WOOD', 0, 'WOOD Jonathan', 'WOOD', 'Jonathan', 'Quai Wilson 41', '1201', 'Genève', 'Suisse', NULL, NULL, NULL,
   200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (242, 'YERSIN', 0, 'YERSIN Pierre', 'YERSIN', 'Pierre', 'Chemin de Tré-la-Villa 40', '1236', 'Cartigny', 'Suisse',
        NULL, NULL, NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `transport_clients` VALUES
  (243, 'ZAKAR', 0, 'ZAKAR Thérèse', 'ZAKAR', 'Thérèse', 'Rue Du Bois-Melly 2', '1205', 'Genève', 'Suisse', NULL, NULL,
   NULL, 200, NULL, NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transport_programming`
--

CREATE TABLE `transport_programming` (
  `id`                  INT(11) UNSIGNED NOT NULL,
  `validated_chauffeur` TINYINT(1)       NOT NULL DEFAULT '0',
  `validated_mgr`       TINYINT(1)       NOT NULL DEFAULT '0',
  `validated_final`     TINYINT(1)       NOT NULL DEFAULT '0',
  `course_date`         DATE                      DEFAULT NULL,
  `model_id`            INT(11) UNSIGNED          DEFAULT NULL,
  `client_id`           INT(11) UNSIGNED          DEFAULT NULL,
  `pseudo`              VARCHAR(50)               DEFAULT NULL,
  `pseudo_autres`       VARCHAR(50)               DEFAULT NULL,
  `heure`               VARCHAR(5)       NOT NULL,
  `aller_retour`        VARCHAR(20)      NOT NULL DEFAULT 'AllerSimple',
  `chauffeur_id`        INT(11) UNSIGNED          DEFAULT NULL,
  `depart`              VARCHAR(70)               DEFAULT NULL,
  `arrivee`             VARCHAR(70)               DEFAULT NULL,
  `type_transport_id`   INT(11) UNSIGNED NOT NULL,
  `nom_patient`         VARCHAR(60)               DEFAULT NULL,
  `bon_no`              VARCHAR(60)               DEFAULT NULL,
  `prix_course`         DECIMAL(10, 2)            DEFAULT '0.00',
  `remarque`            TEXT,
  `input_date`          DATE                      DEFAULT NULL,
  `modification_time`   TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`            VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_programming_model`
--

CREATE TABLE `transport_programming_model` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `visible`           TINYINT(1)       NOT NULL DEFAULT '1',
  `week_day_rank_id`  TINYINT(1)       NOT NULL,
  `client_habituel`   TINYINT(1)                DEFAULT '1',
  `client_id`         INT(11) UNSIGNED          DEFAULT NULL,
  `heure`             TIME(5)                   DEFAULT NULL,
  `inverse_address`   TINYINT(1)       NOT NULL DEFAULT '0',
  `depart`            VARCHAR(70)               DEFAULT NULL,
  `arrivee`           VARCHAR(70)               DEFAULT NULL,
  `prix_course`       DECIMAL(10, 2)            DEFAULT '0.00',
  `chauffeur_id`      INT(11) UNSIGNED NOT NULL,
  `type_transport_id` INT(11) UNSIGNED NOT NULL,
  `remarque`          TEXT,
  `input_date`        DATE                      DEFAULT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`          VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_type`
--

CREATE TABLE `transport_type` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `type_transport`    VARCHAR(50)      NOT NULL,
  `input_date`        DATE                      DEFAULT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`          VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transport_type`
--

INSERT INTO `transport_type` VALUES (1, 'standard', '2017-04-05', '2017-04-05 02:52:53', 'kamy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id`                  INT(11)      NOT NULL,
  `username`            VARCHAR(50)  NOT NULL,
  `hashed_password`     VARCHAR(60)  NOT NULL,
  `nom`                 VARCHAR(60)  NOT NULL,
  `email`               VARCHAR(60)           DEFAULT NULL,
  `user_type`           VARCHAR(60)           DEFAULT NULL,
  `user_type_id`        INT(11)      NOT NULL,
  `first_name`          VARCHAR(30)           DEFAULT NULL,
  `last_name`           VARCHAR(30)           DEFAULT NULL,
  `user_image`          VARCHAR(255) NOT NULL,
  `reset_token`         VARCHAR(70)           DEFAULT NULL,
  `block_user`          TINYINT(1)   NOT NULL DEFAULT '0',
  `unread_message`      TINYINT(11)  NOT NULL DEFAULT '0',
  `unread_notification` TINYINT(11)  NOT NULL DEFAULT '0',
  `address`             VARCHAR(100)          DEFAULT NULL,
  `cp`                  VARCHAR(20)           DEFAULT NULL,
  `city`                VARCHAR(20)           DEFAULT NULL,
  `country`             VARCHAR(60)           DEFAULT NULL,
  `phone`               VARCHAR(60)           DEFAULT NULL,
  `mobile`              VARCHAR(60)           DEFAULT NULL,
  `input_date`          TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES
  (1, 'admin', '$2y$10$ODU3MGE4MWI4ODc5ZWNjZeBb7xpadu0zGQzdMkk9IqeF1UE8a44bK', 'admin', 'webmaster@ikamy.ch', 'admin',
      1, '', '', 'kamy01.JPG', '', 0, 0, 0, '', '', '', '', '', '', '2015-09-17 21:10:25');
INSERT INTO `users` VALUES
  (2, 'kamy', '$2y$10$OTY2OGNlZjlmMTczOTI4NOb8ljdERGKd9X/y/M7JWne.0J8GEv0Ru', 'Kamran Nafisspour',
      'nafisspour@bluewin.ch', 'admin', 1, 'Kamran', 'Nafisspour', 'admin.JPG', '18594ba094414790c3744cd1cedc6bb8', 0,
                                                                                                                    0,
                                                                                                                    0,
                                                                                                                    '68 rue des Vollandes',
                                                                                                                    '1207',
                                                                                                                    'Geneva',
                                                                                                                    'Switzerland',
                                                                                                                    '+41 (22) 735 01 20',
                                                                                                                    '+41 (22) 350 21 32',
                                                                                                                    '2016-04-02 19:32:55');
INSERT INTO `users` VALUES
  (3, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch',
      'employee', 4, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 21:10:25');
INSERT INTO `users` VALUES
  (4, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com',
      'manager', 2, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 21:10:25');
INSERT INTO `users` VALUES (5, 'gmail', '$2y$10$Zjk1YzgxMjY1MmU3ODY1Mueclgm6AKXXH4OBRRnoU/WTfvHs7q1uC', 'Kamy employee',
                               'kamran.nafisspour@gmail.com', 'visitor', 6, 'Kamran', 'Gmail', '', '', 0, 0, 0,
                                                                                                       '68 rue des Vollandes',
                                                                                                       '1207', 'Geneva',
                                                                                                       'Switzerland',
                                                                                                       '+41 22 735 01 20',
                                                                                                       '+41 79 350 21 32',
                                                                                                       '2015-09-17 21:10:25');
INSERT INTO `users` VALUES
  (28, 'Captainbraliaji', '$2y$10$NDcyNDViYTc3NmZkMWEyZe7C5VEZrhtcG5Ll19DDPVrZW65Nyt/vi', 'Bralia Bral',
       'bralia@wanadoo.fr', 'visitor', 5, 'Bralia', 'Bral', 'bralia.PNG', '', 0, 0, 0, '', '', '', '', '', '',
                                                                              '2016-05-26 19:05:47');
INSERT INTO `users` VALUES
  (42, 'massoud', '$2y$10$YmJjZWEzNTkwMWY0MDgxOOPPR/zI3lY3FiVaL9NUK4baWVTY8kvQm', 'Massoud Refoa',
       'massoudr206@gmail.com', 'visitor', 5, 'Massoud', 'Refoa', '', '', 0, 0, 0, '', '', '', '', '', '',
                                                                          '2016-07-01 23:55:22');
-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id`        INT(11)     NOT NULL,
  `user_type` VARCHAR(50) NOT NULL,
  `comment`   VARCHAR(50) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` VALUES (1, 'admin', NULL);
INSERT INTO `user_type` VALUES (2, 'manager', NULL);
INSERT INTO `user_type` VALUES (3, 'secretary', NULL);
INSERT INTO `user_type` VALUES (4, 'employee', NULL);
INSERT INTO `user_type` VALUES (5, 'visitor', NULL);
INSERT INTO `user_type` VALUES (6, 'chauffeur', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist_ip`
--


CREATE TABLE IF NOT EXISTS `transport_zone` (
  `id`                INT(11) UNSIGNED      NOT NULL   AUTO_INCREMENT,
  `zone`              VARCHAR(255) UNIQUE   NOT NULL,
  `zone_exception`    VARCHAR(255)                     DEFAULT NULL,
  `rank`              INT(11)               NOT NULL   DEFAULT 1,
  `comment`           TEXT,
  `username`          VARCHAR(255)          NOT NULL,
  `input_date`        DATE                  NOT NULL,
  `modification_time` TIMESTAMP             NOT NULL   DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS transport_article;
CREATE TABLE IF NOT EXISTS `transport_article` (
  `id`                INT(11) UNSIGNED           NOT NULL AUTO_INCREMENT,
  `zone_depart_id`    INT(11) UNSIGNED           NOT NULL,
  `zone_arrivee_id`   INT(11) UNSIGNED           NOT NULL,
  `zone_depart`       VARCHAR(255)               NOT NULL,
  `zone_arrivee`      VARCHAR(255)               NOT NULL,
  `zone_nom`          VARCHAR(255) UNIQUE        NOT NULL,
  `currency_id`       INT(11) UNSIGNED           NOT NULL,
  `prix_course`       DECIMAL(10, 2)                      DEFAULT '0.00',
  `rank`              INT(11)                    NOT NULL DEFAULT '1',
  `comment`           TEXT,
  `username`          VARCHAR(255)               NOT NULL,
  `input_date`        DATE                       NOT NULL,
  `modification_time` TIMESTAMP                  NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS `transport_addresse` (
  `id`                INT(11) UNSIGNED                         NOT NULL            AUTO_INCREMENT,
  `adresse`           VARCHAR(255) UNIQUE                      NOT NULL,
  `zone_id`           INT(11) UNSIGNED                         NOT NULL,
  `zone`              VARCHAR(255) UNIQUE                      NOT NULL,
  `zone_client`       TINYINT(1) UNSIGNED                      NOT NULL            DEFAULT 0,
  `rank`              INT(11)                                  NOT NULL            DEFAULT 500,
  `comment`           TEXT,
  `username`          VARCHAR(255)                             NOT NULL,
  `input_date`        TIMESTAMP                                NOT NULL            DEFAULT CURRENT_TIMESTAMP,
  `modification_time` TIMESTAMP                                NOT NULL            DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


CREATE TABLE IF NOT EXISTS `transport_type_facturation` (
  `id`                      INT(11) UNSIGNED           NOT NULL AUTO_INCREMENT,
  `type_facturation`        VARCHAR(255) UNIQUE        NOT NULL,
  `type_facture_nom`        VARCHAR(255) UNIQUE        NOT NULL,
  `report_name_facturation` VARCHAR(255) UNIQUE        NOT NULL,
  `rank`                    INT(11)                    NOT NULL DEFAULT 500,
  `comment`                 TEXT,
  `username`                VARCHAR(255)               NOT NULL,
  `input_date`              TIMESTAMP                  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_time`       TIMESTAMP                  NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


CREATE TABLE IF NOT EXISTS `transport_type_pricing` (
  `id`                INT(11) UNSIGNED           NOT NULL AUTO_INCREMENT,
  `type_pricing`      VARCHAR(255) UNIQUE        NOT NULL,
  `type_pricing_nom`  VARCHAR(255) UNIQUE        NOT NULL,
  `rank`              INT(11)                    NOT NULL DEFAULT 500,
  `comment`           TEXT,
  `username`          VARCHAR(255)               NOT NULL,
  `input_date`        TIMESTAMP                  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_time` TIMESTAMP                  NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS `DatabasePaiement` (
  `id`          INT(11) UNSIGNED NOT NULL          AUTO_INCREMENT,
  ID_p          INT(11) UNSIGNED NOT NULL,
  Num_Facture   INT(11) UNSIGNED NOT NULL,
  Pseudo        VARCHAR(255)                       DEFAULT NULL,
  Paiement      DECIMAL(10, 2)                     DEFAULT '0.00',
  Date_Paiement DATE                               DEFAULT NULL,
  Type_Paiement VARCHAR(255)                       DEFAULT NULL,
  Lien_Pdf      VARCHAR(255)                       DEFAULT NULL,
  Date_Saisie   DATE                               DEFAULT NULL,
  Entry_By      VARCHAR(255)                       DEFAULT NULL,

  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


CREATE TABLE IF NOT EXISTS `DatabaseFacturation` (
  `id`               INT(11) UNSIGNED NOT NULL          AUTO_INCREMENT,
  Facture_ID         INT(11) UNSIGNED NOT NULL,
  Facture_ID_Client  INT(11) UNSIGNED NOT NULL,
  Date_Saisie        DATE                               DEFAULT NULL,
  Pseudo             VARCHAR(255)                       DEFAULT NULL,
  Ref_Facture        VARCHAR(255)                       DEFAULT NULL,
  Montant            DECIMAL(10, 2)                     DEFAULT '0.00',
  Statut             VARCHAR(255)                       DEFAULT NULL,
  Date_Fact_Envoi    DATE                               DEFAULT NULL,
  Fact_Date_Paiement DATE                               DEFAULT NULL,
  Date_Rappel        DATE                               DEFAULT NULL,
  No_BVR             VARCHAR(255)                       DEFAULT NULL,
  Course_Periode_Du  DATE                               DEFAULT NULL,
  Course_Periode_Au  DATE                               DEFAULT NULL,
  Remarque_Fact      VARCHAR(255)                       DEFAULT NULL,
  Ref_Fact_MsftWord  VARCHAR(255)                       DEFAULT NULL,
  NombreCourse       INT(11) UNSIGNED NOT NULL,
  Pseudo_Consolide   VARCHAR(255)                       DEFAULT NULL,
  Alerte             VARCHAR(255)                       DEFAULT NULL,
  Num_Facture        VARCHAR(255)                       DEFAULT NULL,
  Num_Facture_Pseudo VARCHAR(255)                       DEFAULT NULL,
  Champ1             VARCHAR(255)                       DEFAULT NULL,
  Champ2             VARCHAR(255)                       DEFAULT NULL,
  Champ3             VARCHAR(255)                       DEFAULT NULL,

  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


CREATE TABLE IF NOT EXISTS `DatabaseCourse_Programe` (
  `id`                   INT(11) UNSIGNED    NOT NULL          AUTO_INCREMENT,
  CourseID               INT(11) UNSIGNED    NOT NULL,
  StatutCourse           VARCHAR(255)                          DEFAULT NULL,
  Pseudo                 VARCHAR(255)                          DEFAULT NULL,
  Date                   DATE                                  DEFAULT NULL,
  Heure                  VARCHAR(255)                          DEFAULT NULL,
  Heure_Arrive           VARCHAR(255)                          DEFAULT NULL,
  Depart                 VARCHAR(255)                          DEFAULT NULL,
  Arrivee                VARCHAR(255)                          DEFAULT NULL,
  Prix_Course            DECIMAL(10, 2)                        DEFAULT '0.00',
  Type_Transport         VARCHAR(255)                          DEFAULT NULL,
  Chauffeur              VARCHAR(255)                          DEFAULT NULL,
  Bon_No                 VARCHAR(255)                          DEFAULT NULL,
  Nom_patient            VARCHAR(255)                          DEFAULT NULL,
  Autres_prestations     VARCHAR(255)                          DEFAULT NULL,
  Remarque               VARCHAR(255)                          DEFAULT NULL,
  Date_Saisie            DATE                                  DEFAULT NULL,
  EntryBy                VARCHAR(255)                          DEFAULT NULL,
  FacturationYesNo       TINYINT(1) UNSIGNED NOT NULL          DEFAULT 0,
  Type_Facturation       VARCHAR(255)                          DEFAULT NULL,
  ListeBon_YesNo         TINYINT(1) UNSIGNED NOT NULL          DEFAULT 0,
  ListePatient_YesNo     TINYINT(1) UNSIGNED NOT NULL          DEFAULT 0,
  AdresseEnvoie_YesNo    TINYINT(1) UNSIGNED NOT NULL          DEFAULT 0,
  AdresseEnvoie_1        VARCHAR(255)                          DEFAULT NULL,
  AdresseEnvoie_2        VARCHAR(255)                          DEFAULT NULL,
  AdresseEnvoie_3        VARCHAR(255)                          DEFAULT NULL,
  AdresseEnvoie_4        VARCHAR(255)                          DEFAULT NULL,
  AdresseConcerne_5      VARCHAR(255)                          DEFAULT NULL,
  AdresseConcerne_6      VARCHAR(255)                          DEFAULT NULL,
  Mobile                 VARCHAR(255)                          DEFAULT NULL,
  Fax                    VARCHAR(255)                          DEFAULT NULL,
  Email                  VARCHAR(255)                          DEFAULT NULL,
  Bon                    VARCHAR(255)                          DEFAULT NULL,
  No_AVS                 VARCHAR(255)                          DEFAULT NULL,
  No_AI                  VARCHAR(255)                          DEFAULT NULL,
  OCPA                   VARCHAR(255)                          DEFAULT NULL,
  Police_Assurance       VARCHAR(255)                          DEFAULT NULL,
  Nom_Assureur           VARCHAR(255)                          DEFAULT NULL,
  Payeur_Assurance       VARCHAR(255)                          DEFAULT NULL,
  Transport              VARCHAR(255)                          DEFAULT NULL,
  Note_Client            VARCHAR(255)                          DEFAULT NULL,
  ParcoursDe             VARCHAR(255)                          DEFAULT NULL,
  ParcoursA              VARCHAR(255)                          DEFAULT NULL,
  Habituel_Chauffeur     VARCHAR(255)                          DEFAULT NULL,
  Habituel_HeureDepart   VARCHAR(255)                          DEFAULT NULL,
  Habituel_HeureRetour   VARCHAR(255)                          DEFAULT NULL,
  Habituel_AllerRetour   VARCHAR(255)                          DEFAULT NULL,
  Habituel_PrixCourse    DECIMAL(10, 2)                        DEFAULT '0.00',
  Habituel_TypeTransport VARCHAR(255)                          DEFAULT NULL,
  Habituel_Bon           VARCHAR(255)                          DEFAULT NULL,
  Dernier_De             VARCHAR(255)                          DEFAULT NULL,
  Dernier_A              VARCHAR(255)                          DEFAULT NULL,
  Commentaires           VARCHAR(255)                          DEFAULT NULL,

  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS `DatabaseCourse` (
  `id`                     INT(11) UNSIGNED    NOT NULL          AUTO_INCREMENT,
  CourseID                 INT(11) UNSIGNED    NOT NULL,
  StautCourse              VARCHAR(255)                          DEFAULT NULL,
  Pseudo                   VARCHAR(255)                          DEFAULT NULL,
  Date                     DATE                                  DEFAULT NULL,
  Aller_Retour             VARCHAR(255)                          DEFAULT NULL,
  Heure                    VARCHAR(255)                          DEFAULT NULL,
  Depart                   VARCHAR(255)                          DEFAULT NULL,
  Arrivee                  VARCHAR(255)                          DEFAULT NULL,
  Prix_Course              DECIMAL(10, 2)                        DEFAULT '0.00',
  Type_Transport           VARCHAR(255)                          DEFAULT NULL,
  Chauffeur                VARCHAR(255)                          DEFAULT NULL,
  Bon_No                   VARCHAR(255)                          DEFAULT NULL,
  Nom_Patient              VARCHAR(255)                          DEFAULT NULL,
  Autres_prestations       VARCHAR(255)                          DEFAULT NULL,
  Remarque                 VARCHAR(255)                          DEFAULT NULL,
  Facture_ID               INT(11) UNSIGNED    NOT NULL,
  Facture_ID_Client        INT(11) UNSIGNED    NOT NULL,
  Facture_Ref              VARCHAR(255)                          DEFAULT NULL,
  Fact_ouverte             TINYINT(1) UNSIGNED NOT NULL          DEFAULT 0,
  Date_Saisie              VARCHAR(255)                          DEFAULT NULL,
  EntryBy                  VARCHAR(255)                          DEFAULT NULL,
  Annee                    INT(11) UNSIGNED    NOT NULL,
  Mois                     INT(11) UNSIGNED    NOT NULL,
  Jour                     INT(11) UNSIGNED    NOT NULL,
  Semaine                  VARCHAR(255)                          DEFAULT NULL,
  Mois_Nom                 VARCHAR(255)                          DEFAULT NULL,
  Année_Mois               VARCHAR(255)                          DEFAULT NULL,
  Pseudo_Annee_Mois        VARCHAR(255)                          DEFAULT NULL,
  Année_Mois_Nom           VARCHAR(255)                          DEFAULT NULL,
  Pseudo_Mois_Annee_Nom    VARCHAR(255)                          DEFAULT NULL,
  Chauffeur_Annee_Mois     VARCHAR(255)                          DEFAULT NULL,
  Chauffeur_Mois_Annee_Nom VARCHAR(255)                          DEFAULT NULL,
  Username                 VARCHAR(255)                          DEFAULT NULL,
  Trimestre                VARCHAR(255)                          DEFAULT NULL,
  Jour_ddd                 VARCHAR(255)                          DEFAULT NULL,
  jour_dddd                VARCHAR(255)                          DEFAULT NULL,
  JourNo_w                 VARCHAR(255)                          DEFAULT NULL,
  SemaineAnnee_ww          VARCHAR(255)                          DEFAULT NULL,

  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


CREATE TABLE IF NOT EXISTS `DatabaseClient` (
  `id`                   INT(11) UNSIGNED                       NOT NULL          AUTO_INCREMENT,
  Client_ID              INT(11) UNSIGNED                       NOT NULL,
  Pseudo                 VARCHAR(255) UNIQUE                    NOT NULL,
  Pseudo_Consolide       VARCHAR(255)                                             DEFAULT NULL,
  Genre                  VARCHAR(255)                                             DEFAULT NULL,
  Nom                    VARCHAR(255)                                             DEFAULT NULL,
  Prenom                 VARCHAR(255)                                             DEFAULT NULL,
  Adresse                VARCHAR(255)                                             DEFAULT NULL,
  Residence              VARCHAR(255)                                             DEFAULT NULL,
  Service                VARCHAR(255)                                             DEFAULT NULL,
  Tel_Privee             VARCHAR(255)                                             DEFAULT NULL,
  CCP                    VARCHAR(255)                                             DEFAULT NULL,
  Ville                  VARCHAR(255)                                             DEFAULT NULL,
  Pays                   VARCHAR(255)                                             DEFAULT NULL,
  Date_Entree            DATE                                                     DEFAULT NULL,
  Date_Mise_A_Jour       DATE                                                     DEFAULT NULL,
  Frequence_Facturation  VARCHAR(255)                                             DEFAULT NULL,
  Client_CloturerYesNo   TINYINT(1) UNSIGNED                    NOT NULL          DEFAULT 0,
  FacturationYesNo       TINYINT(1) UNSIGNED                    NOT NULL          DEFAULT 0,
  Type_Facturation       VARCHAR(255)                                             DEFAULT NULL,
  ListeBon_YesNo         TINYINT(1) UNSIGNED                    NOT NULL          DEFAULT 0,
  ListePatient_YesNo     TINYINT(1) UNSIGNED                    NOT NULL          DEFAULT 0,
  AdresseEnvoie_YesNo    TINYINT(1) UNSIGNED                    NOT NULL          DEFAULT 0,
  AdresseEnvoie_1        VARCHAR(255)                                             DEFAULT NULL,
  AdresseEnvoie_2        VARCHAR(255)                                             DEFAULT NULL,
  AdresseEnvoie_3        VARCHAR(255)                                             DEFAULT NULL,
  AdresseEnvoie_4        VARCHAR(255)                                             DEFAULT NULL,
  AdresseConcerne_5      VARCHAR(255)                                             DEFAULT NULL,
  AdresseConcerne_6      VARCHAR(255)                                             DEFAULT NULL,
  Mobile                 VARCHAR(255)                                             DEFAULT NULL,
  Fax                    VARCHAR(255)                                             DEFAULT NULL,
  Email                  VARCHAR(255)                                             DEFAULT NULL,
  Bon                    VARCHAR(255)                                             DEFAULT NULL,
  No_AVS                 VARCHAR(255)                                             DEFAULT NULL,
  No_AI                  VARCHAR(255)                                             DEFAULT NULL,
  OCPA                   VARCHAR(255)                                             DEFAULT NULL,
  Police_Assurance       VARCHAR(255)                                             DEFAULT NULL,
  Nom_Assureur           VARCHAR(255)                                             DEFAULT NULL,
  Payeur_Assurance       VARCHAR(255)                                             DEFAULT NULL,
  Transport              VARCHAR(255)                                             DEFAULT NULL,
  Date_de_Naissance      VARCHAR(255)                                             DEFAULT NULL,
  ParcoursDe             VARCHAR(255)                                             DEFAULT NULL,
  ParcoursA              VARCHAR(255)                                             DEFAULT NULL,
  Habituel_Chauffeur     VARCHAR(255)                                             DEFAULT NULL,
  Habituel_HeureDepart   VARCHAR(255)                                             DEFAULT NULL,
  Habituel_HeureRetour   VARCHAR(255)                                             DEFAULT NULL,
  Habituel_AllerRetour   VARCHAR(255)                                             DEFAULT NULL,
  Habituel_PrixCourse    DECIMAL(10, 2)                                           DEFAULT '0.00',
  Habituel_TypeTransport VARCHAR(255)                                             DEFAULT NULL,
  Habituel_Bon           VARCHAR(255)                                             DEFAULT NULL,
  Dernier_De             VARCHAR(255)                                             DEFAULT NULL,
  Dernier_A              VARCHAR(255)                                             DEFAULT NULL,
  Commentaires           TEXT,
  EntryBy                VARCHAR(255)                                             DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;


ALTER TABLE `blacklist_ip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_ibfk_1` (`user_id`);

--
-- Indexes for table `chat_friend`
--
ALTER TABLE `chat_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `links_category`
--
ALTER TABLE `links_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_ibfk_1` (`user_id`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transport_chauffeurs`
--
ALTER TABLE `transport_chauffeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chauffeur_name` (`chauffeur_name`),
  ADD UNIQUE KEY `initial` (`initial`),
  ADD KEY `chauffeur_name_2` (`chauffeur_name`);

--
-- Indexes for table `transport_clients`
--
ALTER TABLE `transport_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `pseudo_2` (`pseudo`);

--
-- Indexes for table `transport_programming`
--
ALTER TABLE `transport_programming`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`, `chauffeur_id`, `type_transport_id`),
  ADD KEY `transport_programming_ibfk_1` (`chauffeur_id`),
  ADD KEY `transport_programming_ibfk_3` (`type_transport_id`);

--
-- Indexes for table `transport_programming_model`
--
ALTER TABLE `transport_programming_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`, `chauffeur_id`, `type_transport_id`),
  ADD KEY `transport_programming_model_ibfk_1` (`chauffeur_id`),
  ADD KEY `transport_programming_model_ibfk_3` (`type_transport_id`);

--
-- Indexes for table `transport_type`
--
ALTER TABLE `transport_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_transport` (`type_transport`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklist_ip`
--
ALTER TABLE `blacklist_ip`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 77;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT for table `chat_friend`
--
ALTER TABLE `chat_friend`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 346;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 1;
--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 46;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 159;
--
-- AUTO_INCREMENT for table `links_category`
--
ALTER TABLE `links_category`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 21;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 33;
--
-- AUTO_INCREMENT for table `transport_chauffeurs`
--
ALTER TABLE `transport_chauffeurs`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT for table `transport_clients`
--
ALTER TABLE `transport_clients`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 244;
--
-- AUTO_INCREMENT for table `transport_programming`
--
ALTER TABLE `transport_programming`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_programming_model`
--
ALTER TABLE `transport_programming_model`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 14;
--
-- AUTO_INCREMENT for table `transport_type`
--
ALTER TABLE `transport_type`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 54;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
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
-- Constraints for table `transport_programming`
--
ALTER TABLE `transport_programming`
  ADD CONSTRAINT `transport_programming_ibfk_1` FOREIGN KEY (`chauffeur_id`) REFERENCES `transport_chauffeurs` (`id`),
  ADD CONSTRAINT `transport_programming_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `transport_clients` (`id`),
  ADD CONSTRAINT `transport_programming_ibfk_3` FOREIGN KEY (`type_transport_id`) REFERENCES `transport_type` (`id`);

--
-- Constraints for table `transport_programming_model`
--
ALTER TABLE `transport_programming_model`
  ADD CONSTRAINT `transport_programming_model_ibfk_1` FOREIGN KEY (`chauffeur_id`) REFERENCES `transport_chauffeurs` (`id`),
  ADD CONSTRAINT `transport_programming_model_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `transport_clients` (`id`),
  ADD CONSTRAINT `transport_programming_model_ibfk_3` FOREIGN KEY (`type_transport_id`) REFERENCES `transport_type` (`id`);

--
-- Constraints for table `users`
--


ALTER TABLE `transport_addresse`
  ADD CONSTRAINT `transport_addresse_ibfk_3` FOREIGN KEY (`zone_id`) REFERENCES `transport_zone` (`id`);


ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);

ALTER TABLE `transport_article`
  ADD CONSTRAINT `transport_article_ibfk_1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`);

ALTER TABLE `transport_article`
  ADD CONSTRAINT `transport_article_ibfk_2` FOREIGN KEY (`zone_depart_id`) REFERENCES `transport_zone` (`id`);

#
ALTER TABLE `transport_article`
  ADD CONSTRAINT `transport_article_ibfk_3` FOREIGN KEY (`zone_arrivee_id`) REFERENCES `transport_zone` (`id`);


ALTER TABLE `DatabaseCourse`
  ADD CONSTRAINT `DatabaseCourse_ibfk_3` FOREIGN KEY (`Pseudo`) REFERENCES `DatabaseClient` (`Pseudo`);


ALTER TABLE `DatabaseCourse_Programe`
  ADD CONSTRAINT `DatabaseCourse_Programe_ibfk_3` FOREIGN KEY (`Pseudo`) REFERENCES `DatabaseClient` (`Pseudo`);

ALTER TABLE `DatabaseFacturation`
  ADD CONSTRAINT `DatabaseFacturation_Programe_ibfk_3` FOREIGN KEY (`Pseudo`) REFERENCES `DatabaseClient` (`Pseudo`);


ALTER TABLE `DatabasePaiement`
  ADD CONSTRAINT `DatabaseFacturation_Programe_ibfk_3` FOREIGN KEY (`Pseudo`) REFERENCES `DatabaseClient` (`Pseudo`);


/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;

