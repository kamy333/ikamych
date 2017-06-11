-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 08:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhbz_ikamych3`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklist_ip`
--

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
DROP VIEW IF EXISTS transport_view_adresse;


CREATE TABLE `blacklist_ip` (
  `id`           INT(11)     NOT NULL,
  `ip`           VARCHAR(50) NOT NULL,
  `login_failed` INT(11)     NOT NULL,
  `input_date`   TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `blacklist_ip`
--

INSERT INTO `blacklist_ip` (`id`, `ip`, `login_failed`, `input_date`) VALUES
  (1, '::1', 2, '2017-05-09 00:42:19');

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

INSERT INTO `currency` (`id`, `currency`, `currency_country`, `rate`, `date`, `rank`, `comment`, `input_date`) VALUES
  (1, 'CHF', 'CH', '1.00000', '2016-04-03', 1, '<p><strong>enjoy This contry is great</strong></p>',
   '2016-04-02 21:38:56'),
  (2, 'USD', 'US', '0.98000', '2016-04-19', 2, '', '2016-04-19 19:23:14'),
  (3, 'EUR', 'EU', '1.18000', '2016-04-30', 3, NULL, '2016-04-30 21:49:38'),
  (4, 'YEN', 'JP', '1.00000', '2016-10-21', 7, '', '2016-10-21 08:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `'DataBaseClient`
--

CREATE TABLE `DataBaseClient` (
  `id`                     INT(11) UNSIGNED    NOT NULL,
  `Client_ID`              INT(11) UNSIGNED    NOT NULL,
  `Pseudo`                 VARCHAR(255)        NOT NULL,
  `Pseudo_Consolide`       VARCHAR(255)                 DEFAULT NULL,
  `Genre`                  VARCHAR(255)                 DEFAULT NULL,
  `Nom`                    VARCHAR(255)                 DEFAULT NULL,
  `Prenom`                 VARCHAR(255)                 DEFAULT NULL,
  `Adresse`                VARCHAR(255)                 DEFAULT NULL,
  `Residence`              VARCHAR(255)                 DEFAULT NULL,
  `Service`                VARCHAR(255)                 DEFAULT NULL,
  `Tel_Privee`             VARCHAR(255)                 DEFAULT NULL,
  `CCP`                    VARCHAR(255)                 DEFAULT NULL,
  `Ville`                  VARCHAR(255)                 DEFAULT NULL,
  `Pays`                   VARCHAR(255)                 DEFAULT NULL,
  `Date_Entree`            DATE                         DEFAULT NULL,
  `Date_Mise_A_Jour`       DATE                         DEFAULT NULL,
  `Frequence_Facturation`  VARCHAR(255)                 DEFAULT NULL,
  `Client_CloturerYesNo`   TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `FacturationYesNo`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `Type_Facturation`       VARCHAR(255)                 DEFAULT NULL,
  `ListeBon_YesNo`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `ListePatient_YesNo`     TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `AdresseEnvoie_YesNo`    TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `AdresseEnvoie_1`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_2`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_3`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_4`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseConcerne_5`      VARCHAR(255)                 DEFAULT NULL,
  `AdresseConcerne_6`      VARCHAR(255)                 DEFAULT NULL,
  `Mobile`                 VARCHAR(255)                 DEFAULT NULL,
  `Fax`                    VARCHAR(255)                 DEFAULT NULL,
  `Email`                  VARCHAR(255)                 DEFAULT NULL,
  `Bon`                    VARCHAR(255)                 DEFAULT NULL,
  `No_AVS`                 VARCHAR(255)                 DEFAULT NULL,
  `No_AI`                  VARCHAR(255)                 DEFAULT NULL,
  `OCPA`                   VARCHAR(255)                 DEFAULT NULL,
  `Police_Assurance`       VARCHAR(255)                 DEFAULT NULL,
  `Nom_Assureur`           VARCHAR(255)                 DEFAULT NULL,
  `Payeur_Assurance`       VARCHAR(255)                 DEFAULT NULL,
  `Transport`              VARCHAR(255)                 DEFAULT NULL,
  `Date_de_Naissance`      VARCHAR(255)                 DEFAULT NULL,
  `ParcoursDe`             VARCHAR(255)                 DEFAULT NULL,
  `ParcoursA`              VARCHAR(255)                 DEFAULT NULL,
  `Habituel_Chauffeur`     VARCHAR(255)                 DEFAULT NULL,
  `Habituel_HeureDepart`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_HeureRetour`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_AllerRetour`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_PrixCourse`    DECIMAL(10, 2)               DEFAULT '0.00',
  `Habituel_TypeTransport` VARCHAR(255)                 DEFAULT NULL,
  `Habituel_Bon`           VARCHAR(255)                 DEFAULT NULL,
  `Dernier_De`             VARCHAR(255)                 DEFAULT NULL,
  `Dernier_A`              VARCHAR(255)                 DEFAULT NULL,
  `Commentaires`           TEXT,
  `EntryBy`                VARCHAR(255)                 DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DatabaseCourse`
--

CREATE TABLE `DatabaseCourse` (
  `id`                       INT(11) UNSIGNED    NOT NULL,
  `CourseID`                 INT(11) UNSIGNED    NOT NULL,
  `StautCourse`              VARCHAR(255)                 DEFAULT NULL,
  `Pseudo`                   VARCHAR(255)                 DEFAULT NULL,
  `Date`                     DATE                         DEFAULT NULL,
  `Aller_Retour`             VARCHAR(255)                 DEFAULT NULL,
  `Heure`                    VARCHAR(255)                 DEFAULT NULL,
  `Depart`                   VARCHAR(255)                 DEFAULT NULL,
  `Arrivee`                  VARCHAR(255)                 DEFAULT NULL,
  `Prix_Course`              DECIMAL(10, 2)               DEFAULT '0.00',
  `Type_Transport`           VARCHAR(255)                 DEFAULT NULL,
  `Chauffeur`                VARCHAR(255)                 DEFAULT NULL,
  `Bon_No`                   VARCHAR(255)                 DEFAULT NULL,
  `Nom_Patient`              VARCHAR(255)                 DEFAULT NULL,
  `Autres_prestations`       VARCHAR(255)                 DEFAULT NULL,
  `Remarque`                 VARCHAR(255)                 DEFAULT NULL,
  `Facture_ID`               INT(11) UNSIGNED    NOT NULL,
  `Facture_ID_Client`        INT(11) UNSIGNED    NOT NULL,
  `Facture_Ref`              VARCHAR(255)                 DEFAULT NULL,
  `Fact_ouverte`             TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `Date_Saisie`              VARCHAR(255)                 DEFAULT NULL,
  `EntryBy`                  VARCHAR(255)                 DEFAULT NULL,
  `Annee`                    INT(11) UNSIGNED    NOT NULL,
  `Mois`                     INT(11) UNSIGNED    NOT NULL,
  `Jour`                     INT(11) UNSIGNED    NOT NULL,
  `Semaine`                  VARCHAR(255)                 DEFAULT NULL,
  `Mois_Nom`                 VARCHAR(255)                 DEFAULT NULL,
  `Année_Mois`               VARCHAR(255)                 DEFAULT NULL,
  `Pseudo_Annee_Mois`        VARCHAR(255)                 DEFAULT NULL,
  `Année_Mois_Nom`           VARCHAR(255)                 DEFAULT NULL,
  `Pseudo_Mois_Annee_Nom`    VARCHAR(255)                 DEFAULT NULL,
  `Chauffeur_Annee_Mois`     VARCHAR(255)                 DEFAULT NULL,
  `Chauffeur_Mois_Annee_Nom` VARCHAR(255)                 DEFAULT NULL,
  `Username`                 VARCHAR(255)                 DEFAULT NULL,
  `Trimestre`                VARCHAR(255)                 DEFAULT NULL,
  `Jour_ddd`                 VARCHAR(255)                 DEFAULT NULL,
  `jour_dddd`                VARCHAR(255)                 DEFAULT NULL,
  `JourNo_w`                 VARCHAR(255)                 DEFAULT NULL,
  `SemaineAnnee_ww`          VARCHAR(255)                 DEFAULT NULL,
  `NojourdeAnnee`            VARCHAR(255)                 DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DatabaseCourse_programe`
--

CREATE TABLE `DatabaseCourse_Programe` (
  `id`                     INT(11) UNSIGNED    NOT NULL,
  `CourseID`               INT(11) UNSIGNED    NOT NULL,
  `StatutCourse`           VARCHAR(255)                 DEFAULT NULL,
  `Pseudo`                 VARCHAR(255)                 DEFAULT NULL,
  `Date`                   DATE                         DEFAULT NULL,
  `Heure`                  VARCHAR(255)                 DEFAULT NULL,
  `Heure_Arrive`           VARCHAR(255)                 DEFAULT NULL,
  `Depart`                 VARCHAR(255)                 DEFAULT NULL,
  `Arrivee`                VARCHAR(255)                 DEFAULT NULL,
  `Prix_Course`            DECIMAL(10, 2)               DEFAULT '0.00',
  `Type_Transport`         VARCHAR(255)                 DEFAULT NULL,
  `Chauffeur`              VARCHAR(255)                 DEFAULT NULL,
  `Bon_No`                 VARCHAR(255)                 DEFAULT NULL,
  `Nom_patient`            VARCHAR(255)                 DEFAULT NULL,
  `Autres_prestations`     VARCHAR(255)                 DEFAULT NULL,
  `Remarque`               VARCHAR(255)                 DEFAULT NULL,
  `Date_Saisie`            DATE                         DEFAULT NULL,
  `EntryBy`                VARCHAR(255)                 DEFAULT NULL,
  `FacturationYesNo`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `Type_Facturation`       VARCHAR(255)                 DEFAULT NULL,
  `ListeBon_YesNo`         TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `ListePatient_YesNo`     TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `AdresseEnvoie_YesNo`    TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `AdresseEnvoie_1`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_2`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_3`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseEnvoie_4`        VARCHAR(255)                 DEFAULT NULL,
  `AdresseConcerne_5`      VARCHAR(255)                 DEFAULT NULL,
  `AdresseConcerne_6`      VARCHAR(255)                 DEFAULT NULL,
  `Mobile`                 VARCHAR(255)                 DEFAULT NULL,
  `Fax`                    VARCHAR(255)                 DEFAULT NULL,
  `Email`                  VARCHAR(255)                 DEFAULT NULL,
  `Bon`                    VARCHAR(255)                 DEFAULT NULL,
  `No_AVS`                 VARCHAR(255)                 DEFAULT NULL,
  `No_AI`                  VARCHAR(255)                 DEFAULT NULL,
  `OCPA`                   VARCHAR(255)                 DEFAULT NULL,
  `Police_Assurance`       VARCHAR(255)                 DEFAULT NULL,
  `Nom_Assureur`           VARCHAR(255)                 DEFAULT NULL,
  `Payeur_Assurance`       VARCHAR(255)                 DEFAULT NULL,
  `Transport`              VARCHAR(255)                 DEFAULT NULL,
  `Note_Client`            VARCHAR(255)                 DEFAULT NULL,
  `ParcoursDe`             VARCHAR(255)                 DEFAULT NULL,
  `ParcoursA`              VARCHAR(255)                 DEFAULT NULL,
  `Habituel_Chauffeur`     VARCHAR(255)                 DEFAULT NULL,
  `Habituel_HeureDepart`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_HeureRetour`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_AllerRetour`   VARCHAR(255)                 DEFAULT NULL,
  `Habituel_PrixCourse`    DECIMAL(10, 2)               DEFAULT '0.00',
  `Habituel_TypeTransport` VARCHAR(255)                 DEFAULT NULL,
  `Habituel_Bon`           VARCHAR(255)                 DEFAULT NULL,
  `Dernier_De`             VARCHAR(255)                 DEFAULT NULL,
  `Dernier_A`              VARCHAR(255)                 DEFAULT NULL,
  `Commentaires`           VARCHAR(255)                 DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DataBaseFacturation`
--

CREATE TABLE `DataBaseFacturation` (
  `id`                 INT(11) UNSIGNED NOT NULL,
  `Facture_ID`         INT(11) UNSIGNED NOT NULL,
  `Facture_ID_Client`  INT(11) UNSIGNED NOT NULL,
  `Date_Saisie`        DATE           DEFAULT NULL,
  `Pseudo`             VARCHAR(255)   DEFAULT NULL,
  `Ref_Facture`        VARCHAR(255)   DEFAULT NULL,
  `Montant`            DECIMAL(10, 2) DEFAULT '0.00',
  `Statut`             VARCHAR(255)   DEFAULT NULL,
  `Date_Fact_Envoi`    DATE           DEFAULT NULL,
  `Fact_Date_Paiement` DATE           DEFAULT NULL,
  `Date_Rappel`        DATE           DEFAULT NULL,
  `No_BVR`             VARCHAR(255)   DEFAULT NULL,
  `Course_Periode_Du`  DATE           DEFAULT NULL,
  `Course_Periode_Au`  DATE           DEFAULT NULL,
  `Remarque_Fact`      VARCHAR(255)   DEFAULT NULL,
  `Ref_Fact_MsftWord`  VARCHAR(255)   DEFAULT NULL,
  `NombreCourse`       INT(11) UNSIGNED NOT NULL,
  `Pseudo_Consolide`   VARCHAR(255)   DEFAULT NULL,
  `Alerte`             VARCHAR(255)   DEFAULT NULL,
  `Num_Facture`        VARCHAR(255)   DEFAULT NULL,
  `Num_Facture_Pseudo` VARCHAR(255)   DEFAULT NULL,
  `Champ1`             VARCHAR(255)   DEFAULT NULL,
  `Champ2`             VARCHAR(255)   DEFAULT NULL,
  `Champ3`             VARCHAR(255)   DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DatabasePaiement`
--

CREATE TABLE `DatabasePaiement` (
  `id`            INT(11) UNSIGNED NOT NULL,
  `ID_p`          INT(11) UNSIGNED NOT NULL,
  `Num_Facture`   INT(11) UNSIGNED NOT NULL,
  `Pseudo`        VARCHAR(255)   DEFAULT NULL,
  `Paiement`      DECIMAL(10, 2) DEFAULT '0.00',
  `Date_Paiement` DATE           DEFAULT NULL,
  `Type_Paiement` VARCHAR(255)   DEFAULT NULL,
  `Lien_Pdf`      VARCHAR(255)   DEFAULT NULL,
  `Date_Saisie`   DATE           DEFAULT NULL,
  `Entry_By`      VARCHAR(255)   DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

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

--
-- Dumping data for table `failed_logins`
--

INSERT INTO `failed_logins` (`id`, `username`, `login_attempt`, `last_time`, `ip`, `host`, `input_date`) VALUES
  (1, 'kamy', 0, 1494776928, '::1', '', '0000-00-00 00:00:00'),
  (2, 'root', 2, 1494776921, '::1', '', '0000-00-00 00:00:00');

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

INSERT INTO `links` (`id`, `name`, `web_address`, `description`, `category_id`, `category`, `sub_category_1`, `sub_category_2`, `privacy`, `rank`, `username`)
VALUES
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
  (46, 'Debugging PHP: Advanced Techniques with Jon Peck', 'http://www.lynda.com/PHP-tutorials/Debugging-PHP-Advanced-Techniques/112414-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Demonstrates how to leverage PHP\'s built-in tools, as well as the Xdebug and Firebug extensions and FirePHP library to improve the quality of your code and reduce troubleshooting overhead.', 2, 'PHP', '', '', 0, 10, 'kamy'),
  (47, 'Create an Interactive Map with jQuery with Chris C', 'http://www.lynda.com/jQuery-1-5-tutorials/Create-an-Interactive-Map-with-jQuery/87636-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'JQuery', '', '', 0, 10, 'kamy'),
  (49, 'How to handle handicap', 'https://www.facebook.com/spinal.cord.injuries/videos/1169089156449992/?fref=nf', 'An interesting take on how to act around people with disabilities.', 9, 'Handicap', '', '', 0, 1, 'kamy'),
  (50, 'Up and Running with Ember.js with Kai Gittens', 'http://www.lynda.com/Emberjs-tutorials/Review-routes-Ember-Inspector/178116/191826-4.html?autoplay=true', 'Ember.js is a JavaScript framework for creating robust, complex web apps while writing very little code. Ember\'s attraction lies in its built-in template library and rich feature set, which seems to grow almost every day. Understanding the core concepts behind Ember will help you use it now—no matter what enhancements are added in the future. So join Kai Gittens as he introduces Ember\'s routers, templates, and models, and shows how to use templates to create simple pages and dynamically load content using components and Ember Data. Let our training light the spark of learning, and get up and running with Ember today.\r\nTopics include:\r\nInstalling Ember Inspector\r\nReviewing routes with Ember Inspector\r\nLoading templates with routes\r\nCreating links with the link-to helper\r\nAdding component templates\r\nLoading model data\r\nCustomizing components\r\nBuilding nested routes and route objects\r\nLoading data with object and array controllers\r\nCreating interfaces', 4, 'Javascript', '', '', 0, 100, ''),
  (51, 'Texte savoureux, vu sur la page du groupe Yiddish ', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :\n\n\"Israel c\'est le seul pays\" d\'Ephraim Kishon :\n\nC\'est le seul pays où les chômeurs font la grève\n\n\nC\'est le seul pays qui a deux ministres du trésor et pas un rond.\n\nC\'est le seul pays au monde où le gouvernement finance l\'éducation sectaire et ou l\'éducation gratuite est financée par les parents d\'élèves.\n\nC\'est le seul pays où chaque mère a le numéro du portable du sergent de son fils à l\'armée.\n\nC\'est le seul pays qui importe de l\'eau par bateaux citernes au moment où le pays est inondé par les pluies.\n\nC\'est le seul pays où la chanson la plus populaire dans les clubs de musique transe s\'intitule : « fleurs dans les fusils et filles dans les chars ».\n\nC\'est le seul pays qui a envoyé un satellite de communications dans l\'espace, où on ne vous laisse jamais terminer une phrase.\n\nC\'est le seul pays où sont déjà tombées des fusées d\'Irak, des katyouchas du Liban, des Qassam de Gaza et où un appartement de trois pièces coûte plus cher qu\'à Paris.\n\nC\'est le seul pays où on demande une star porno : qu\'en pense ta mère ?\n\nC\'est le seul pays où on va dîner chez ses parents le vendredi et on occupe le même siège qu\'à l\'âge de 5 ans.\n\nC\'est le seul pays où un repas Israélien est composé d\'une salade arabe, d\'une pita irakienne, d\'un kebab roumain et d\'une crème bavaroise.\n\nC\'est le seul pays où le gars avec la chemise pleine de taches est le ministre et le gars au complet gris, son chauffeur.\n\nC\'est le seul pays où des musulmans vendent des articles religieux aux chrétiens en échange de billets portant l\'effigie du Rambam.\n\nC\'est le seul pays où les jeunes quittent la maison à l\'âge de 18 ans pour revenir y habiter à l\'âge de 24.\n\nC\'est le seul pays où aucune femme n\'est en bons termes avec sa mère mais où elles se parlent néanmoins trois fois par jour.\n\nC\'est le seul pays où on vous montre des photos des enfants alors qu\'ils sont présents.\n\nC\'est le seul pays où on peut connaître la situation sécuritaire selon les chansons à la radio.\n\nC\'est le seul pays où les riches sont à gauche, les pauvres sont à droite et la classe moyenne paie tout.\n\nC\'est le seul pays où on peut obtenir en dix minutes un logiciel pour lancer des vaisseaux spatiaux et où il faut attendre une semaine pour réparer la machine à laver.\n\nC\'est le seul pays où la première fois qu\'on sort avec une fille, on lui demande dans quelle unité elle a servi a l\'armée, et on découvre qu\'elle était parachutiste alors que vous n\'aviez été que caporal à la cantine militaire.\n\nC\'est le seul pays où le décalage entre le jour le plus heureux et le jour le plus triste n\'est souvent que soixante secondes.\n\nC\'est le seul pays où lorsque vous détestez les hommes politiques, les fonctionnaires, les taxes, la qualité du service et la situation en général, vous prouvez que vous aimez le pays et qu\'en fin de compte c\'est le seul pays dans lequel vous pouvez vivre.\"', 7, 'Israel', '', '', 0, 2, 'kamy'),
  (52, 'Design Patterns in PHP with Keith Casey', 'http://www.lynda.com/PHP-tutorials/What-you-should-know-before-watching-course/186870/370504-4.html', 'Write better PHP code by following these popular (and time-tested) design patterns. Developer Keith Casey introduces 11 design patterns that will help you solve common coding challenges and make your intentions clear to future architects of your application. Keith explores use cases for:\n\nAccessing data with the active record and table data gateway patterns\nCreating objects with the factory, singleton, and mock objects patterns\nExtending code with decorator and adapter patterns\nStructuring applications with MVC and Action-Domain-Responder patterns\n\n\nEach chapter features a design pattern in a real-world coding scenario, and closes with a practice challenge to test your new skills.', 2, 'PHP', '', '', 0, 7, 'kamy'),
  (53, 'Test-Driven Development with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/What-kind-testing/124398/137958-4.html', 'Prove your code is working every step of the way using a formalized test-driven development (TDD) process. TDD can be done in every modern programming environment, and for desktop, mobile, or web apps. In this course, Simon Allardice teaches you exactly how to get started with TDD: what makes a good test, why we\'re more interested in failure than success, and how to measure and repeatedly run tests. \n\nThe course explores the jargon of TDD—test suites, test harness, mock and stub objects, and more—and covers how TDD is used in the most common programming languages and environments. Plus learn to create, run, and manage the tests and move to a test-first mindset.\nTopics include:\nWhat is test-driven development?\nUsing unit testing frameworks\nCreating tests\nUsing assertions\nCreating multiple test methods\nNaming unit tests and test methods\nTesting return values\nSetting up and tearing down\nIntroducing mock objects\nMeasuring code coverage', 11, 'Programming', 'Foundations of Programming', '', 0, 2, 'kamy'),
  (54, 'Unit Testing with PHPUnit with Kristian Secor', 'http://www.lynda.com/PHPUnit-tutorials/Unit-Testing-PHPUnit/175019-2.html', 'Unit testing is a way to confirm proper execution of a computer program. PHPUnit provides a testing framework for PHP developers to do it right. This brief course covers everything you\'ll need to get up and running with PHPUnit: where to download it, how to install it, and how to use it to unit test your code. Kristian Secor provides a high-level overview of this invaluable framework, helping you guide test-driven development at your organization.\nTopics include:\nWorking with assertions, annotations, and template methods of testing\nUsing mock and stub objects\nTesting private and protected methods\nLooking for weak spots in your testing, with code coverage\nTesting inherited projects', 2, 'PHP', '', '', 0, 100, 'kamy'),
  (55, 'Fundamentals with Simon Allardice', 'http://www.lynda.com/JavaScript-tutorials/Foundations-of-Programming-Fundamentals/83603-2.html', 'This course provides the core knowledge to begin programming in any language. Simon Allardice uses JavaScript to explore the core syntax of a programming language, and shows how to write and execute your first application and understand what\'s going on under the hood. The course covers creating small programs to explore conditions, loops, variables, and expressions; working with different kinds of data and seeing how they affect memory; writing modular code; and how to debug, all using different approaches to constructing software applications.\n\nFinally, the course compares how code is written in several different languages, the libraries and frameworks that have grown around them, and the reasons to choose each one.\nTopics include:\nWriting source code\nUnderstanding compiled and interpreted languages\nRequesting input\nWorking with numbers, characters, strings, and operators\nWriting conditional code\nMaking the code modular\nWriting loops\nFinding patterns in strings\nWorking with arrays and collections\nAdopting a programming style\nReading and writing to various locations\nDebugging\nManaging memory usage\nLearning about other languages', 11, 'Programming', 'Foundations of Programming', '', 0, 1, 'kamy'),
  (56, 'Object-Oriented Design with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Object-Oriented-Design/96949-2.html', 'Most modern programming languages, such as Java, C#, Ruby, and Python, are object-oriented languages, which help group individual bits of code into a complex and coherent application. However, object-orientation itself is not a language; it\'s simply a set of ideas and concepts.\n\nLet Simon Allardice introduce you to the terms—words like abstraction, inheritance, polymorphism, subclass—and guide you through defining your requirements and identifying use cases for your program. The course also covers creating conceptual models of your program with design patterns, class and sequence diagrams, and unified modeling language (UML) tools, and then shows how to convert the diagrams into code.\nTopics include:\nWhy use object-oriented design (OOD)?\nPinpointing use cases, actors, and scenarios\nIdentifying class responsibilities and relationships\nCreating class diagrams\nUsing abstract classes\nWorking with inheritance\nCreating advanced UML diagrams\nUnderstanding object-oriented design principles', 11, 'Programming', 'Foundations of Programming', '', 0, 3, 'kamy'),
  (57, 'Databases with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Databases/112585-2.html', 'Discover how a database can benefit both you and your architecture, whatever the programming language, operating system, or application type you use. In this course, explore options that range from personal desktop databases to large-scale geographically distributed database servers and classic relational databases to modern document-oriented systems and data warehouses—and learn how to choose the best solution for you. Author Simon Allardice covers key terminology and concepts, such as normalization, \"deadly embraces\" and \"dirty reads,\" ACID and CRUD, referential integrity, deadlocks, and rollbacks. The course also explores data modeling step by step through hands-on examples to design the best system for our data. Plus, learn to juggle the competing demands of storage, access, performance, and security—management tasks that are critical to your database\'s success.\nTopics include:\nWhat is a database?\nWhy do you need a database?\nChoosing primary keys\nIdentifying columns and selecting data types\nDefining relationships: one-to-one, one-to-many, and many-to-many\nUnderstanding normalization\nCreating queries to create, insert, update, and delete data\nUnderstanding indexing and stored procedures\nExploring your database options', 11, 'Programming', 'Foundations of Programming', '', 0, 4, 'kamy'),
  (58, 'Design Patterns with Elisabeth Robson and Eric Fre', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Design-Patterns/135365-2.html', 'Design patterns are reusable solutions that solve the challenges software developers face over and over again. Rather than reinventing the wheel, learn how to make use of these proven and tested patterns that will make your software more reliable and flexible to change. This course will introduce you to design patterns and take you through seven of the most used object-oriented patterns that will make your development faster and easier. Elisabeth Robson and Eric Freeman, coauthors of Head First Design Patterns, join forces to provide an overview of each pattern and examples of the pattern in action. Featured design patterns include the strategy, observer, decorator, singleton, collection, state, and factory method patterns.\nTopics include:\nWhat are design patterns?\nEncapsulating code that varies with the strategy pattern\nSetting behavior dynamically\nImplementing the observer pattern\nCreating chaos with inheritance\nExtending behavior with composition\nDealing with multithreading and the singleton pattern\nRevising the design for a state machine\nEncapsulating iteration with the collection pattern\nEncapsulating object creation with the factory method pattern', 11, 'Programming', 'Foundations of Programming', '', 0, 5, 'kamy'),
  (59, 'Data Structures with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Data-Structures/149042-2.html', 'Once you get past simplistic computer programs with one or two variables, you\'ll use a data structure to store the values—and groups of values— in your applications. While they are sometimes taken for granted in modern programming environments, a deeper understanding of data structures is vital for any programmer who wants to know what\'s going on \"under the hood\" and understand how to defend the choices they\'ve made for performance and efficiency. Simon Allardice offers that understanding to you in this Foundations of Programming course.\n\nStarting with simple ways of grouping data like arrays and structs, together you\'ll explore gradually more complex data structures, like dictionaries, sets, hash tables, queues and stacks, links and linked lists, and trees and graphs. Simon keeps the lessons grounded in the real world and answers the \"why\" behind many data-structuring decisions: Why use a hash table? Why is a set useful? Why avoid arrays? When you\'re finished with the course, you\'ll have a clear understanding of data structures and understand how to use them in whatever language you\'re programming in, today or 5 years from now.\nTopics include:\nWhat is a data structure?\nUsing C-style structs and arrays\nSorting and searching arrays\nWorking with singly and doubly linked lists\nUsing stacks for last-in, first-out (LIFO) structures\nUsing queues for first-in, first-out (FIFO) structures\nWorking with hash tables\nUnderstanding binary search trees (BSTs)\nLearning about graphs', 11, 'Programming', 'Foundations of Programming', '', 0, 7, 'kamy'),
  (60, 'Fundamentals of Software Version Control with Mich', 'http://www.lynda.com/Version-Control-tutorials/Fundamentals-Software-Version-Control/106788-2.html', 'This course is a gateway to learning software version control (SVC), process management, and collaboration techniques. Author Michael Lehman reviews the history of version control and demonstrates the fundamental concepts: check-in/checkout, forking, merging, commits, and distribution. The choice of an SVC system is critical to effectively managing and versioning the assets in a software development project (from source code, images, and compiled binaries to installation packages), so the course also surveys the solutions available. Michael examines Git, Perforce, Subversion, Mercurial, and Microsoft Team Foundation Server (TFS) in particular, describing the appropriate use, features, benefits, and optimal group size for each one.\nTopics include:\nComparing centralized vs. distributed systems\nSaving changes and tracking history\nUsing revert or rollback\nWorking with the GUI tools\nUsing IDE and shell integration\nInstalling different systems\nCreating a repository\nTagging code\nBranching and merging code\nSelecting a software version control system that\'s right for you', 11, 'Programming', 'Foundations of Programming', '', 0, 8, 'kamy'),
  (61, 'Code Efficiency with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Code-Efficiency/122461-2.html', 'Code efficiency. There are other words we can use (optimization, performance, speed), but it\'s all about making existing code run faster. Whether for desktop, mobile, or web apps, in this course you\'ll see how to identify pain points and measure them accurately, as well as view multiple approaches to improve the performance. Author Simon Allardice covers everything from \"quick fixes\" to more complex (but more accurate) algorithms.\n\nLearn to choose the right data types, understand the pitfalls of using high-level languages, and decide where to spend your time. Plus, see how the underlying memory management model may have more of an impact than you realize, and what performance issues you can expect working with databases and web services.\nTopics include:\nIdentifying problems in the code\nEmbracing constraints\nUsing code analysis tools to measure performance\nManaging memory\nManaging disk-based and network resources', 11, 'Programming', 'Foundations of Programming', '', 0, 9, 'kamy'),
  (62, 'Software Quality Assurance with Aaron Dolberg', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Software-Quality-Assurance/126119-2.html', 'tart incorporating quality into your software development process today. Author Aaron Dolberg demonstrates the different kinds of software testing (from black box to white box) and how to fit each one into your development cycle. Learn how to make sure your team is on the same page when it comes to quality by developing criteria for ranking the priority and severity of issues. Then find out how to test and report issues, and how to use a tracking system to manage the process and the results. Lastly, Aaron explains how automating some of the testing can make the QA process more efficient and objective. In the end, you\'ll be able to better understand the overall health of your product, and ensure your team is meeting quality goals with every release.\nTopics include:\nHow to think about quality\nIncorporating black box, white box, and grey box testing into your process\nUnderstanding your quality goals\nRanking issues by priority and severity\nTesting core functionality\nTesting the backend\nUsing a test case management system\nInterpreting bug models\nRecording defects automatically', 11, 'Programming', 'Foundations of Programming', '', 0, 10, 'kamy'),
  (63, 'Refactoring Code with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Refactoring-Code/122457-2.html', 'ctoring is the process of taking existing code and improving it. While it makes code more readable and understandable, it also becomes much easier to add new features, build larger applications, and spot and fix bugs. In this course, staff author Simon Allardice introduces the formalized, disciplined approach to refactoring that tells you exactly what to look for in your code, and how to fix it, through a series of \"code smells\"—clues that let you look at a block of code and realize when there\'s something wrong with it.\nTopics include:\nWhat is refactoring?\nRecognizing common code smells\nSimplifying method calls\nMaking conditions easier to read', 11, 'Programming', 'Foundations of Programming', '', 0, 11, 'kamy'),
  (64, 'Insights on Software Quality Engineering with Aaro', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Insights-Software-Quality-Engineering/142444-2.html', 'Software quality engineering plays a vital role in the development cycle, saving companies time and money and ensuring that customers have exactly the experience they expect. It\'s also a lucrative and underappreciated career path. Here, software quality engineer Aaron Dolberg draws on his years of experience in quality assurance (QA) to share his personal insights and cautionary tales. Aaron discusses how to get started in QA, how it fits in at companies small and large, and how it has changed since the rise of agile workflows.', 11, 'Programming', 'Foundations of Programming', '', 0, 12, 'kamy'),
  (65, 'Multidevice Prototyping with Ratchet with Chris Gr', 'http://www.lynda.com/Ratchet-tutorials/Using-exercise-files/170056/359870-4.html', 'Ratchet is a fantastic framework for prototyping mobile apps. Ratchet prototypes look and act just like native iOS and Android apps, but they\'re programmed with languages familiar to almost all web designers and developers: HTML, CSS, and JavaScript. Join Chris Griffith in this course, as he shows how to configure your development environment to work with Ratchet, and build your first app prototype, from creating the initial screen and adding transitions between pages, with Push.js, to using Ratchet\'s iOS and Android built-in themes, which make your app immediately look at home on either platform.\nTopics include:\nInstalling Ratchet\nSetting up a web server\nCreating your first screen\nConfiguring meta tags\nAdding content\nConnecting pages with Push.js\nAdding icons, buttons, form elements, and lists\nDefining your app theme with Ratchet', 6, 'Bootstrap', '', '', 0, 36, 'kamy'),
  (66, 'CakePHP-MVC Up and Running with  with Jon Peck', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 12, 'MVC Framework', '', '', 0, 100, 'kamy'),
  (67, 'MVC PHP CodeIgniter  Up and Running with PHP CodeI', 'http://www.lynda.com/CodeIgniter-tutorials/Introducing-MVC-development-pattern/126122/141743-4.html', 'Speed up your development with CodeIgniter, a fast and powerful PHP web application framework. Author Jon Peck shows how to build a magazine cataloging system while describing how to use a MVC (Model-View-Controller) framework like CodeIgniter.\n\nStarting with the what and why of CodeIgniter, Jon introduces key concepts such as the MVC pattern and libraries by demonstrating how to create static pages, then storing and displaying magazine info in a database. Advanced topics like classes and helpers are explored to validate user input, upload files, and much more. By creating a complete system, you\'ll have the foundation to build your own applications with CodeIgniter.\nTopics include:\nWhat is CodeIgniter?\nCreating a static page controller\nGenerating output with a view\nWhat is a model?\nSaving data with Active Records\nCreating forms\nValidating user input\nListing records in tables\nUploading images\nViewing and deleting records', 12, 'MVC Framework', '', '', 0, 37, 'kamy'),
  (68, 'MVC Frameworks for Building PHP Web Applications', 'http://www.lynda.com/CakePHP-tutorials/MVC-Frameworks-Building-PHP-Web-Applications/315196-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:MVC%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'PHP developers have a choice: they can design their own architecture, essentially re-inventing the wheel, or they can use a framework. Frameworks speed up development, enhance collaboration, and help keep code organized. So why start from scratch? In this course, Drew Falkman introduces the six most popular PHP frameworks: Zend, Symfony, CodeIgniter, CakePHP, Yii, and Laravel. He\'ll describe each framework\'s advantages, show how to get and install the software, and then demonstrate how to get the default pages for each framework up and running, so viewers can see how the code is structured. In the final chapter, Drew compares all the frameworks and provides resources to move forward with each one. Your framework choice is one of the biggest factors affecting the success of your project; start here to get the information you need to make the right decision.\nTopics include:\nWhy use a framework?\nIntroducing MVC-framework concepts\nExamining each framework\'s components\nSetting up the software\nWalking through sample apps built in each framework\nComparing frameworks', 12, 'MVC Framework', 'MVC', '', 0, 4, 'kamy'),
  (69, 'Laravel MVC framework Essential', 'http://www.lynda.com/Laravel-tutorials/Up-Running-Laravel/166513-2.html', 'Join Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel\'s advanced templating engine, Blade. Next, you\'ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you\'ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code', 12, 'MVC Framework', 'MVC', '', 0, 30, 'kamy'),
  (70, 'Ruby on Rails 4 Essential Training with Kevin Skog', 'http://www.lynda.com/Ruby-Rails-tutorials/Ruby-Rails-4-Essential-Training/139989-2.html', 'Join Kevin Skoglund as he shows how to create full-featured, object-oriented web applications with the latest version of the popular, open-source Ruby on Rails framework. This course explores each part of the framework, best practices, and real-world development techniques. Plus, get hands-on experience by building a complete content management system with dynamic, database-driven content. Kevin teaches how to design an application; route browser requests to return dynamic page content; structure and interact with databases using object-oriented programming; create, update, and delete records; and implement user authentication. Previous experience with Ruby is recommended, but not required.\r\nTopics include:\r\nWhy use Ruby on Rails?\r\nInstalling Ruby on Rails on Mac and Windows\r\nRendering templates and redirecting requests\r\nGenerating and running database migrations\r\nCreating, updating, and deleting records\r\nUnderstanding association types\r\nUsing layouts, partials, and view helpers\r\nIncorporating assets using asset pipeline\r\nValidating form data\r\nAuthenticating users and managing user access\r\nArchitecting RESTful applications\r\nDebugging and error handing', 13, 'Other Programing', '', '', 0, 1, ''),
  (71, 'RSpec Testing Framework with Ruby with Kevin Skogl', 'http://www.lynda.com/Ruby-tutorials/RSpec-Testing-Framework-Ruby/183884-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:ruby%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to use RSpec, the Ruby testing framework that can help developers be more productive, write better code, and reduce bugs during development. Kevin Skoglund explains the basic syntax of RSpec and then dives straight into writing and running test examples. He shows how to use a variety of matchers to test for expected conditions, provides techniques for testing efficiently, and demonstrates how test doubles can stand in for objects and methods. He also explains the additional RSpec features available for Ruby on Rails, and walks through a step-by-step example of test-driven development.\r\nTopics include:\r\nInstalling and configuring RSpec\r\nWriting and running examples\r\nDefining expectations using matchers\r\nUsing helper methods, before/after hooks, and shared examples\r\nCreating test doubles using mocks and stubs\r\nTesting Ruby on Rails with RSpec\r\nPutting test-driven development into practice', 13, 'Other Programing', '', '', 0, 2, ''),
  (72, 'CSS with LESS and Sass with Joe Marini', 'http://www.lynda.com/CSS-tutorials/CSS-LESS-SASS/107921-2.html', 'Ever find yourself wishing that CSS had features like variables, functions, or reusable classes? Look no further. LESS and Sass are CSS style sheet tools called preprocessors that add these features and more, simplifying the creation of complex CSS styles. In this course, author Joe Marini introduces the LESS and Sass tools in a two-part manner.\n\nThe first section focuses on LESS (Leaner CSS) and how it can be used on both the client and the server. The lessons show how to work with variables, mixins, nested rules, and other features to easily create maintainable CSS. \n\nThe second section introduces Sass (Syntactically awesome stylesheets), which contains many of the same features as LESS, along with a few new ones. Joe also compares and contrasts the two tools, and explains how your platform and needs may influence which tool you choose.\nTopics include:\nWhat are LESS and Sass?\nUsing variables in your CSS\nWorking with reusable and parameterized mixins\nImplementing nested rules\nCombining CSS rules with operations\nUsing the built-in functions in LESS and Sass\nControlling the CSS output formatting\nImporting external files\nSubject:\nWeb', 6, 'Bootstrap', '', '', 0, 6, 'kamy'),
  (73, 'Customizing Bootstrap 3 with LESS with Jen Kramer', 'http://www.lynda.com/Bootstrap-tutorials/Customizing-Bootstrap-3-LESS/161086-2.html', 'Do more with LESS in Bootstrap. In this course, Jen Kramer shows you how to customize the look and feel of your Bootstrap site with LESS CSS, as well as LESS mixins and Bootstap\'s own customization screens. You\'ll learn how to configure Prepros, a LESS compiler; work within the LESS file structure; and start modifying fonts, color, spacing, and more with the variables.less file. Then LESS\'s mixins will allow you to make advanced customizations like custom buttons and tab styles. Just press Play to start learning.\nTopics include:\nSetting up your working environment for Bootstrap and LESS\nUnderstanding the LESS file structure\nCreating and manipulating LESS variables\nWorking with LESS mixins\nCreating custom styles using mixins and variables', 6, 'Bootstrap', '', '', 0, 7, 'kamy'),
  (74, 'Bootstrap 3: Advanced Web Development with Ray Vil', 'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-3-Advanced-Web-Development/124079-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:bootstrap%2Badvanced%2Bweb%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Generate your own interactive website from scratch with Bootstrap, the mobile-friendly framework from Twitter, in this start-to-finish course with developer and author Ray Villalobos. First, you\'ll plan and prototype the interface with MindMaps and Balsamiq Mockups. Next, download Bootstrap and dive into organizing your site structure with its scaffolding feature—adding PHP includes to break your code into reusable modules and building in the core navigation. Ray then shows you how to build interactive carousels, modal features, and forms, and control these features with JavaScript. Finally, learn to style it all with LESS and prepare to publish the results online.\nTopics include:\nPrototyping the site\nWorking with a local web server\nCreating a baseline template with Git\nScaffolding the main columns\nMaking the site modular with PHP includes\nAdding basic navigation\nAdding a carousel\nWorking with buttons\nCreating and activating tabs\nAdding page and structure LESS styles', 6, 'Bootstrap', '', '', 0, 3, 'kamy'),
  (75, 'Laravel 4 Essential Training with Joseph Lowery', 'http://www.lynda.com/Laravel-tutorials/Laravel-4-Essential-Training/181242-2.html', 'oin Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel\'s advanced templating engine, Blade. Next, you\'ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you\'ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\n\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\nTopics include:\nInstalling Laravel and Composer\nRouting requests\nFiltering routes\nIncorporating advanced controllers\nCreating a basic Blade template\nDeveloping a layout with child pages and forms\nIntegrating a database\nCreating tables via migrations\nOutputting data\nBuilding a Laravel app\nAuthenticating users\nDeploying Laravel code', 12, 'MVC Framework', '', '', 0, 5, 'kamy'),
  (76, 'Foundations of Programming: Web Security with Kevi', 'http://www.lynda.com/Developer-Web-Development-tutorials/Foundations-Programming-Web-Security/133330-2.html', 'Learn about the most important security concerns when developing websites, and what you can do to keep your servers, software, and data safe from harm. Instructor Kevin Skoglund explains what motivates hackers and their most common methods of attacks, and then details the techniques and mindset needed to craft solutions for these web security challenges. Learn the eight fundamental principles that underlie all security efforts, the importance of filtering input and controlling output, and smart strategies for encryption and user authentication. Kevin also covers special considerations when it comes to credit cards, regular expressions, source code managers, and databases.\n\nThis course is great for developers who want to secure their client\'s websites, and for anyone else who wants to learn more about web security.\nTopics include:\nWhy security matters\nWhat is a hacker?\nHow to write a security policy\nCross-site scripting (XSS)\nCross-site request forgery (CSRF)\nSQL injection\nSession hijacking and fixation\nPasswords and encryption\nSecure credit card payments', 11, 'Programming', '', '', 0, 1, 'kamy'),
  (77, 'Kevin-Skoglund Lynda', 'http://www.lynda.com/Kevin-Skoglund/104-1.html', 'Kevin Skoglund is the founder of Nova Fabrica, a web development agency specialized in delivering custom, scalable solutions using Ruby on Rails, PHP, SQL, and related technologies. Nova Fabrica clients include An Event Apart, Atlas Carpet Mills, Consulate Film, Gregorius|Pineo, Maharam, Oakley, and The Bold Italic. Kevin is a lynda.com author with over 15 years of teaching and web development experience.', 1, 'Others', '', '', 0, 5, 'kamy'),
  (78, 'Git Essential Training with Kevin Skoglund', 'http://www.lynda.com/Git-tutorials/Understanding-version-control/100222/111248-4.html', '', 13, 'Other Programing', '', '', 0, 1, ''),
  (79, 'Amazing story of how Bulgaria\'s Jews were saved in', 'http://edition.cnn.com/videos/world/2015/07/24/intv-amanpour-bulgaria-king-a.cnn/video/playlists/amanpour/', '', 8, 'Antisémitisme', '', '', 0, 5, 'kamy'),
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
  (92, 'origines du judaïsme - C\'est pas sorcier', 'http://education.francetv.fr/antiquite/sixieme/video/les-origines-du-judaisme-c-est-pas-sorcier', '', 7, 'Israel', '', '', 0, 1, ''),
  (93, 'Malek Boutih, le Ps et le conflit Israël / Gaza', 'https://www.dailymotion.com/video/x822pf_malek-boutih-le-ps-et-le-conflit-is_news', '', 7, 'Israel', '', '', 0, 1, ''),
  (94, 'ASP.NET Essential Training with David Gassner', 'http://www.lynda.com/ASP-NET-tutorials/ASP-NET-Essential-Training/784-2.html', '', 14, 'SQLServer', '', '', 0, 1, ''),
  (95, 'www.asp.net/', 'http://www.asp.net/', '', 14, 'SQLServer', '', '', 0, 7, ''),
  (96, 'Up and Running with ASP.NET 5 with Jess Chadwick', 'http://www.lynda.com/ASP-NET-tutorials/Up-Running-ASP-NET-5/368051-2.html', 'ASP.NET 5, Microsoft\'s latest web development framework, includes an optimized developer experience, better performing runtime, and cross-platform support for Windows, Mac, and Linux. With all this change, many developers find they could use a refresher. In this course, Jess Chadwick introduces the basics to get you up and running with ASP.NET 5, and creating and deploying your own professional quality applications. He explores setup and installation, working with the ASP.NET MVC 6 framework, and the techniques you need to manage data, reuse code, construct web APIs, and secure your new applications. After you\'ve built your application, Jess will show you how to deploy it to both IIS server and Microsoft Azure.\r\nTopics include:\r\nUnderstanding ASP.NET 5\'s new request processing pipeline\r\nDownloading client-side libraries using Grunt and Bower in Visual Studio\r\nAdding ASP.NET MVC 6 to your application\r\nHandling web requests with controllers\r\nRendering dynamic views with Razor markup\r\nUsing Entity Framework to write and read data to a database\r\nUsing TagHelpers to create simple dynamic HTML forms\r\nRegistering and authenticating users with Identity services\r\nDynamically update portions on the server using partial rendering\r\nUsing dynamic routing logic to customize URLs\r\nExposing data with web APIs\r\nLeveraging custom configuration and logging\r\nIncreasing application maintainability with dependency injection\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nASP.NET\r\nAuthor:\r\nJess Chadwick', 14, 'SQLServer', '', '', 0, 9, '');
INSERT INTO `links` (`id`, `name`, `web_address`, `description`, `category_id`, `category`, `sub_category_1`, `sub_category_2`, `privacy`, `rank`, `username`)
VALUES
  (97, 'From: ASP.NET MVC 5 Essential Training with Michae',
       'http://www.lynda.com/ASP-NET-tutorials/What-you-should-know-before-watching-course/170334/191097-4.html',
       'ASP.NET MVC gives you a potent, patterns-based way to build dynamic websites. MVC 5 includes features that enable rapid, test-driven development—and it\'s a version every .NET developer needs to know to meet the latest web standards. Join Michael Sullivan for an in-depth look at the MVC 5 framework. He demonstrates how a typical MVC application is structured, and shows how to work with views, models, and data, including developing database objects with the Entity Framework. Michael also explores how to secure applications with the ASP.NET Identity system, create and conduct unit tests, use JavaScript libraries to communicate with controllers and pass data to client-side scripts, and deploy to cloud-based platforms like Azure and AppHarbor. Two hands-on practice challenges allow you to test what you\'ve learned along the way.\r\nTopics include:\r\nExploring ASP.NET routing\r\nApplying action selectors\r\nWorking with layouts\r\nEmploying HTML helpers\r\nDisplaying and validating model properties\r\nGenerating database objects with Entity Framework\r\nAdding transactions\r\nAuthenticating users\r\nUnit testing\r\nPerforming partial page updates with Ajax and jQuery\r\nDeploying ASP.NET MVC applications',
       14, 'SQLServer', '', '', 0, 10, ''),
  (98, 'C#', 'http://www.lynda.com/C-tutorials/Up-Running-C/164452-2.html', '# is the language at the heart of many Windows applications, including Windows Phone and Windows Store apps. And if you have a programming background, you can get up and running with C# in as little as three hours using this course. Author Gerry O\'Brien introduces C# and the Visual Studio IDE; the core language elements such as data types, variables, constants, functions, and loops; and object-oriented programming with classes and namespaces. Plus, learn how to handle exceptions with the try-catch-finally mechanism and manage memory resources. Then get a brief tour of two fully functional Windows Phone and Windows Store apps to see what the final results look like. There are also five challenge videos that allow you to test your C# prowess, and five matching videos where Gerry explains the correct solutions.\r\nTopics include:\r\nInstalling C#\r\nWorking with loops\r\nControlling program flow\r\nUsing variables\r\nBuilding functions\r\nCreating and instantiating classes\r\nCatching errors\r\nManaging resources with the garbage collector\r\nBuilding collections\r\nSubject:\r\nDeveloper\r\nSoftware:\r\nC#\r\nAuthor:\r\nGerry O\'Brien', 14, 'SQLServer', '', '', 0, 1, ''),
  (99, 'Visual Basic Essential Training with David Gassner', 'http://www.lynda.com/Visual-Basic-tutorials/Visual-Basic-Essential-Training/114902-2.html', '', 14, 'SQLServer', '', '', 0, 11, ''),
  (100, 'Etgar Keret : \"J’aimerais un Premier ministre', 'http://www.atlantico.fr/decryptage/etgar-keret-j-aimerais-premier-ministre-qui-defaut-avoir-idees-favorables-paix-en-ait-au-moins-folles-pourquoi-ne-pas-essayer-2406117.html/page/0/1', '', 7, 'Israel', '', '', 0, 1, ''),
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
  (117, 'Dieudonné propagandiste \"national-socialiste\" selo', 'http://www.memorial98.org/2015/11/dieudonne-propagandiste-national-socialiste-selon-la-justice.html', '', 8, 'Antisémitisme', '', '', 0, 1, ''),
  (119, 'telekurs', 'https://www.tkflink.com/fda?X=b64-U2VzYW1lLVzu9IOdS9P6pamZ4fKC1lCuqFz3NDEO0Lruj0gJIpsH9Ivl19G6unHE9qCqfqjh9oDni$qDjYIJZ32Cx8Dn68Tcl6yPwvcs72QUt$f2fevHyPMlHklLtkcK88iXOIywJ4JdpTXPvQTB1-HiVdD9SZo69NdIxDn3OA', 'Antonio:CH543; U55209\r\nPassword: 131158\r\n\r\nStefano:CH543: U55003\r\nPassword: Lugano', 1, 'Others', '', '', 0, 1, ''),
  (120, 'Design the Web: CSS-Controlled SVG with PHP with C', 'http://www.lynda.com/CSS-tutorials/Design-Web-CSS-Controlled-SVG-PHP/424048-2.html', '', 2, 'PHP', '', '', 0, 1, ''),
  (121, 'AngularJS: Building a Data-Driven App with Ray Vil', 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Building-Data-Driven-App/421230-2.html', '', 4, 'Javascript', '', '', 0, 1, ''),
  (122, 'AngularJS: Adding Registration to Your Application', 'http://www.lynda.com/AngularJS-tutorials/AngularJS-Adding-Registration-Your-Application/438887-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:angularjs%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 4, 'Javascript', '', '', 0, 1, ''),
  (123, 'Developing Android Apps Essential Training with Da', 'http://www.lynda.com/Android-tutorials/Developing-Android-Apps-Essential-Training-Revision-Q2-2015/369905-2.html', '', 17, 'Java Android', '', '', 0, 2, ''),
  (124, 'Java Essential Training with David Gassner', 'http://www.lynda.com/Java-tutorials/Java-Essential-Training/377484-2.html', '', 17, 'Java Android', '', '', 0, 1, ''),
  (125, 'lynda Android', 'http://www.lynda.com/search?q=android', '', 17, 'Java Android', '', '', 0, 1, ''),
  (126, 'Les Réfugiés Oubliés - documentaire complet', 'https://www.youtube.com/watch?v=5JwW1kefTvU', '', 7, 'Israel', '', '', 0, 1, ''),
  (127, 'Microsoft course', 'https://channel9.msdn.com/Series/Choose-to-Code?sort=viewed&page=2', '', 15, 'Visual Studio', '', '', 0, 1, ''),
  (128, 'udemy Mobile App Design In Sketch 3: UX and UI Des', 'https://www.udemy.com/the-complete-design-course/learn/#/', '', 18, 'Udemy', 'Others', '', 0, 1, ''),
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
  (139, 'udemy Python Network Programming', 'https://www.udemy.com/python-programming-for-real-life-networking-use/learn/', '', 18, 'Udemy', 'Udemy', '', 0, 1, ''),
  (140, 'udemy Mobile App Design In Sketch 3: UX and UI Des', 'https://www.udemy.com/the-complete-design-course/learn/', '<p>Need a mac Mobile App Design In Sketch 3: UX and UI Design From Scratch</p>', 18, 'Udemy', 'Udemy', '', 0, 1, ''),
  (141, 'udemy  Learning JavaScript Programming Tutorial. A', 'https://www.udemy.com/programming-javascript/learn/', '', 4, 'Javascript', 'Udemy', '', 0, 1, ''),
  (142, 'CSS3', 'https://www.udemy.com/learning-css3/learn/', '', 5, 'HTML', 'Udemy', '', 0, 1, ''),
  (143, 'microspot', 'http://www.microspot.ch/msp/index.jsf', '', 1, 'Others', '', '', 0, 1, ''),
  (144, 'GIMP Essential Training', 'http://www.lynda.com/GIMP-tutorials/Welcome/112673/117897-4.html', '', 11, 'Programming', '', '', 0, 2, ''),
  (145, 'Lumonisity brain exercise', 'https://www.lumosity.com/app/v4/dashboard', '', 1, 'Others', '', '', 0, 1, ''),
  (146, 'Schindler List Violon', 'https://www.facebook.com/soutien.a.israel/videos/840988722690870/?fref=nf', '', 7, 'Israel', 'Music', 'Shoah', 0, 1, ''),
  (147, 'Laure Adler Robert Badinter antisémitisme', 'http://www.franceinter.fr/player/reecouter?play=1252509', '', 8, 'Antisémitisme', 'Antisémitisme', 'Antisémitisme', 0, 1, ''),
  (148, 'Groupe Mutuel', 'https://access.groupemutuel.ch/authent/auth/login?execution=e2s1&APPLICATION=ext-extranet-assure', '', 1, 'Others', '', 'Me', 0, 1, ''),
  (149, 'Tailor Made sur mesure', 'https://www.tailorstore.ch/fr', '', 1, 'Others', 'Me', 'Me', 0, 1, ''),
  (150, 'Yvan Attal On est pas couché', 'http://defense-medias-israel.com/yvan-attal-on-nest-couche-28-mai-2016', '', 8, 'Antisémitisme', 'Amtisémitisme', '', 0, 1, ''),
  (151, 'Iran réseau sociaux', 'http://fr.timesofisrael.com/reseaux-sociaux-liran-exige-le-transfert-des-donnees-sur-ses-citoyens/', '', 1, 'Others', 'Iran', 'Iran', 0, 1, ''),
  (152, 'NodeJs Security YT 1', 'https://www.youtube.com/watch?v=yvviEA1pOXw', '<p>https://speakerdeck.com/rdegges/everything-you-ever-wanted-to-know-about-authentication-in-node-dot-js</p>\r\n<p>&nbsp;</p>\r\n<p>https://github.com/rdegges/svcc-auth</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 20, 'NodeJs Security', '', '', 0, 1, ''),
  (153, 'GitHub Node sec', 'https://github.com/rdegges/svcc-auth', '<p>github security code</p>', 20, 'NodeJs Security', '', '', 0, 1, ''),
  (154, 'Randall speaker decker Node', 'https://speakerdeck.com/rdegges/everything-you-ever-wanted-to-know-about-authentication-in-node-dot-js', '', 20, 'NodeJs Security', '', '', 0, 1, ''),
  (155, 'pleur-larme-empathie', 'http://www.demotivateur.fr/article/pleur-larme-empathie-faiblesse-force-emotion-film-serie-ecran-science-7498', '', 1, 'Others', ':)', '', 0, 1, ''),
  (156, 'Zone telechargement', 'http://www.zone-telechargement.com/homep.html', '', 1, 'Others', '', '', 0, 1, ''),
  (157, 'fiverr -offer service', 'https://www.fiverr.com/', '', 1, 'Others', '', '', 0, 1, ''),
  (158, 'kickstarter', 'https://www.kickstarter.com/?ref=nav', '', 1, 'Others', '', '', 0, 1, '');

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
  (19, 'SuperLearning', 4),
  (20, 'NodeJs Security', 9);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

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
-- Table structure for table `transport_addresse`
--

CREATE TABLE `transport_addresse` (
  `id`                INT(11) UNSIGNED    NOT NULL,
  `adresse`           VARCHAR(255)        NOT NULL,
  `zone_id`           INT(11) UNSIGNED    NOT NULL,
  `zone`              VARCHAR(255)        NOT NULL,
  `zone_client`       TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `rank`              INT(11)             NOT NULL DEFAULT '500',
  `comment`           TEXT,
  `username`          VARCHAR(255)        NOT NULL,
  `input_date`        TIMESTAMP           NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_time` TIMESTAMP           NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_article`
--

CREATE TABLE `transport_article` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `zone_depart_id`    INT(11) UNSIGNED NOT NULL,
  `zone_arrivee_id`   INT(11) UNSIGNED NOT NULL,
  `zone_depart`       VARCHAR(255)     NOT NULL,
  `zone_arrivee`      VARCHAR(255)     NOT NULL,
  `zone_nom`          VARCHAR(255)     NOT NULL,
  `currency_id`       INT(11) UNSIGNED NOT NULL,
  `prix_course`       DECIMAL(10, 2)            DEFAULT '0.00',
  `rank`              INT(11)          NOT NULL DEFAULT '1',
  `comment`           TEXT,
  `username`          VARCHAR(255)     NOT NULL,
  `input_date`        DATE             NOT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
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

INSERT INTO `transport_chauffeurs` (`id`, `chauffeur_name`, `initial`, `company`, `user_id`, `input_date`, `modification_time`, `username`)
VALUES
  (1, 'Pablo ARZA', 'PAB', 'Transmed', 2, NULL, '0000-00-00 00:00:00', ''),
  (2, 'Luan HAZIRI', 'LUA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL),
  (3, 'Djamila AMRANI', 'DJA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL),
  (4, 'Pierre-Alain BONFILS', 'PIA', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL),
  (5, 'Vincent DUBOULOZ', 'VCT', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL),
  (6, 'Autres', 'AUT', 'Transmed', NULL, NULL, '0000-00-00 00:00:00', NULL),
  (11, 'Felix D AGOSTINO', '6a5', 'Transmed', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (12, 'Aurélien BLANC', 'c20', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (13, 'Hèchmi HAMDI', 'd99', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (14, 'ALOHA', 'a7b', 'Autres', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (15, 'TPNA', 'a6a', 'Autres', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (16, 'Medi TRANSPORT', '455', 'Autres', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (17, 'PARTNERS', '462', 'Autres', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (18, 'Islam', '819', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (19, 'Djamel CHIBANI', '5fc', 'Transmed', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (20, 'Machado', 'b43', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (21, 'André CALCI', 'e37', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (22, 'André VIERA', 'ac3', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (23, 'Liridon DEMIRI', '697', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (24, 'Laurie ALVAREZ', '766', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', ''),
  (25, 'Patrick GIGANDET', '8fb', 'Interime', 0, '2017-05-03', '2017-05-03 21:44:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `transport_clients`
--

CREATE TABLE `transport_clients` (
  `id`                     INT(11) UNSIGNED NOT NULL,
  `pseudo`                 VARCHAR(50)      NOT NULL,
  `liste_restrictive`      TINYINT(1)       NOT NULL DEFAULT '0',
  `web_view`               VARCHAR(50)               DEFAULT NULL,
  `last_name`              VARCHAR(50)               DEFAULT NULL,
  `first_name`             VARCHAR(50)               DEFAULT NULL,
  `address`                VARCHAR(50)               DEFAULT NULL,
  `cp`                     VARCHAR(50)               DEFAULT NULL,
  `city`                   VARCHAR(50)               DEFAULT NULL,
  `country`                VARCHAR(50)               DEFAULT NULL,
  `default_price`          DECIMAL(10, 2)            DEFAULT '0.00',
  `default_depart`         VARCHAR(70)               DEFAULT NULL,
  `default_arrivee`        VARCHAR(70)               DEFAULT NULL,
  `default_transport_type` VARCHAR(255)              DEFAULT NULL,
  `liste_rank`             INT(11)                   DEFAULT NULL,
  `remarque`               TEXT,
  `input_date`             DATE                      DEFAULT NULL,
  `modification_time`      TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`               VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transport_clients`
--

INSERT INTO `transport_clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_depart`, `default_arrivee`, `default_transport_type`, `liste_rank`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (4, 'COLLINE', 1, 'COLLINE', 'COLLINE', '', '', '', 'Genève', 'Suisse', '0.00', '', '', '', 1, '', '0000-00-00',
   '0000-00-00 00:00:00', ''),
  (5, 'AUTRES', 1, 'AUTRES', 'AUTRES', '', '', '', 'Genève', 'Suisse', '0.00', '', '', '', 1, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (6, 'Tour_Patient', 1, 'comptabilité', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 2, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (7, 'Tour_Sang', 0, 'comptabilité', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 3, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (8, 'Carouge_Sang', 0, 'comptabilité', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 4, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (9, 'AURELIE', 0, 'ASSEO', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse', '60.00', '', '', '', 50, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (10, 'AURELIE_Med', 0, 'ASSEO', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse', '60.00', '', '', '', 50, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (11, 'ELZIZOUNE', 1, 'ELZIZOUNE', 'ELZIZOUNE', 'Bouchaib', 'Rue de Berne 60', '1202', 'Genève', 'Suisse', '45.00', 'Domicile', 'HUG Dialyse', '', 50, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (12, 'NAF_Kamy', 0, 'NAFISSPOUR', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève', 'Suisse', '0.00', '', '', '', 50, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (13, 'NAFISSPOUR', 1, 'NAFISSPOUR', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève', 'Suisse', '40.00', 'Travail', 'Domicile', '', 50, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (14, 'AUDE', 0, 'AUDE', '', 'Aude', 'Route de Saint-Julien 297', '1258', 'Perly', 'Suisse', '0.00', '', '', '', 100, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (15, 'TAG', 0, 'TAG', '', 'Isaac', 'Case postale 575', '1211', 'Genève 13', 'Suisse', '0.00', '', '', '', 100, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (16, 'ALOHA', 0, 'HUBER', 'HUBER', 'Rolf', 'Rue de la Fontaine 13', '1204', 'Genève', 'Suisse', '0.00', '', '', '', 100, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (17, 'PARTNERS', 0, 'BOUDINA', 'BOUDINA', 'James', 'Route de Saint-Georges 83', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 100, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (18, 'Mines_ICBL', 0, 'BRASSIER', 'BRASSIER', 'Audrey', 'Rue de Cornavin 9', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 100, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (19, 'ALBER', 0, 'ALBER', 'ALBER', 'Clotilde', 'Avenue de Champel 64', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (20, 'AMEZ_DROZ', 0, 'AMEZ-DROZ', 'AMEZ-DROZ', 'Edouard', 'Chemin de la Vieille-Ferme 8', '1255', 'Veyrier', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (21, 'AMREIN', 0, 'AMREIN', 'AMREIN', 'Suzanne', 'Cité Vieussieux 8', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (22, 'ANDEREGG', 0, 'ANDEREGG', 'ANDEREGG', 'Paul', 'Rue du Vieux Moulin 9', '1213', 'OnexLE', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (23, 'ANDREY', 0, 'ANDREY', 'ANDREY', 'Christophe', 'Rue Gardiol 5', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (24, 'ANKER_M', 0, 'ANKER', 'ANKER', 'Marc', 'Promenade de l\'Europe 59', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 26 rue Guiseppe Motta', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (25, 'ANKER', 0, 'ANKER', 'ANKER', 'Yvonne', 'Promenade de l\'Europe 59', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 26 rue Guiseppe Motta', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (26, 'ARIAS', 0, 'ARIAS', 'ARIAS', 'José-Miguel', 'Chemin Bournoud 13-15', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (27, 'ARMAND', 0, 'ARMAND', 'ARMAND', 'Henry', 'Chemin de la Caroline 24', '1213', 'Petit - Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (28, 'AUBERT', 0, 'AUBERT', 'AUBERT', 'Roselyne', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (29, 'AVONDO', 0, 'AVONDO', 'AVONDO', 'Marie', 'Avenue de la Pruley 44', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (30, 'BALBWIN', 0, 'BALDWIN', 'BALDWIN', 'Théo', 'Grand-Montfleury 50', '1290', 'Versoix', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (31, 'BAZZACCHI', 0, 'BAZZACCHI', 'BAZZACCHI', 'Lucienne', 'Grand-Pré 37', '1202', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (32, 'BEGER', 0, 'BEGER', 'BEGER', 'Iris', 'Chemin Perrault-de-Jotemps 9\r\n', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (33, 'BENOIST_FILLE', 0, 'BENOIST', 'BENOIST', 'Stéphanie', 'C§hemin du Velours 20', '1231', 'Conches', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (34, 'BERNASCONI', 0, 'BERNASCONI', 'BERNASCONI', 'Alexandre', 'Chemin des Crêts-de-Pregny 7A', '1218', 'le Grand-Saconnex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (35, 'BIBES', 0, 'BIBES', 'BIBES', 'Jeanne', 'Rue de la Poterie 20', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (36, 'BLANDIN', 0, 'BLANDIN', 'BLANDIN', 'Jean-François', 'Chemin Crétoillet 30', '1256', 'Troinex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (37, 'BLOEDHORN', 0, 'BLOEDHORN', 'BLOEDHORN', 'Alexandre', 'Rue de la Tambourine 38', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (38, 'BOLOMEY', 0, 'BOLOMEY', 'BOLOMEY', 'Ignace', 'Chemin de la Citadelle 71', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (39, 'BONZON', 0, 'BONZON', 'BONZON', 'Edith', 'Rue Soubeyran 8', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 10 rue Galatin', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (40, 'BONZON_Mich', 0, 'BONZON', 'BONZON', 'Michèle', 'Chemin de Blonay 4', '1234', 'Vessy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (41, 'BORNOZ', 0, 'BORNOZ', 'BORNOZ', 'Marcel', 'Avenue des Morgines 37', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (42, 'BOSSENS', 0, 'BOSSENS', 'BOSSENS', 'Hélène', 'Chemin Briquet 26', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (43, 'BOSTEELS', 0, 'BOSTEELS', 'BOSTEELS', 'Michel', 'Chemin de Gaillard 276', ' 01160', 'Challex', 'France', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (44, 'BOUCHET', 0, 'BOUCHET', 'BOUCHET', 'Raymond', 'Rue Fort-Barreau 19', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (45, 'BROILLET', 0, 'BROILLET', 'BROILLET', 'Bernard', 'Avenue du Pont-Butin 70', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (46, 'BUDEYRI', 0, 'BUDEYRI', 'BUDEYRI', 'Wijdan', 'Rue du Nant 34', '1207', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (47, 'BURGENER', 0, 'BURGENER', 'BURGENER', 'André', 'Rue de Moillebeau 57', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (48, 'BURNAT', 0, 'BURNAT', 'BURNAT', 'Janine', 'Place Sigsimond 2', '1227', 'Carouge', 'Suisse', '35.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (49, 'CARNAL_Mme', 0, 'CARNAL', 'CARNAL', 'Liliane', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (50, 'CARNAL_R', 0, 'CARNAL', 'CARNAL', 'Raymond', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', '45.00', 'Domicile', 'HUG Dialyse', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (51, 'CARUANA', 0, 'CARUANA', 'CARUANA', 'Paul', 'Maison familiale du Genevois', '74160', 'Collonge s/Salève', 'France', '60.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (52, 'CERROTI', 0, 'CERROTI', 'CERROTI', 'Georges', 'Avenue du Lignon 21', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (53, 'CHARLET', 0, 'CHARLET', 'CHARLET', 'Sylvette', 'Avenue de Crozet 4', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (54, 'CHERVAZ', 0, 'CHERVAZ', 'CHERVAZ', 'Gérard', 'Chemin De-La-Montagne 106', '1224', 'Chêne-Bougeries', 'Suisse', '50.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (55, 'CHERVET', 0, 'CHERVET', 'CHERVET', 'Alfred', 'Rue des Bossons 19', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (56, 'CHEVALLIER', 0, 'CHEVALLIER', 'CHEVALLIER', 'Françoise', 'Rue des Délices 1', '1204', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (57, 'CHTIOUI', 0, 'CHTIOUI', 'CHTIOUI', 'Sanaa', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', '40.00', 'Domicile', 'Service Industriel de Genève', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (58, 'CLERC', 0, 'CLERC', 'CLERC', 'Jean-daniel', 'Rue des Bossons 15', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (59, 'COLOMB', 0, 'COLOMB', 'COLOMB', 'Gilles', 'Chemin du Villaret 1', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (60, 'COSTA', 0, 'COSTA', 'COSTA', 'Tania', 'Avenue de Feuillasse 1', '1217', 'Meyrin', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (61, 'COURT', 0, 'COURT', 'COURT', 'Elisa', 'Quai du Seulet 34', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (62, 'DAUDIN', 0, 'DAUDIN', 'DAUDIN', 'Jean', 'Rue de Lyon 65bis', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (63, 'DE_MONFALCON', 0, 'DE MONFALCON', 'DE MONFALCON', 'Juliette', 'Rue des Vollandes 1', '1207', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (64, 'DE_MORAWITZ', 0, 'DE MORAWITZ', 'DE MORAWITZ', 'Karl', 'Place du Marché 15', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (65, 'DE_REMY', 0, 'DE REMY', 'DE REMY', 'Jean', 'Plateau de Champel 18', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (66, 'DECONYNK', 0, 'DECONYNK', 'DECONYNK', 'Yvon', 'Chemin de la Prulay 72', '1217', 'Meyrin', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (67, 'DERBIGNY', 0, 'DERBIGNY', 'DERBIGNY', 'Jeanne', 'Route d\'Aire-la-Ville 226', '1242', 'Satigny', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (68, 'DESAUTEZ', 0, 'DESAUTEZ', 'DESAUTEZ', 'Pauline', 'Rue de Livron 29', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (69, 'DESCOMBES', 0, 'DESCOMBES', 'DESCOMBES', 'Michel', 'Rue des Bossons 24', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (70, 'DI_BENEDETTO_Cal', 0, 'DI BENEDETTO', 'DI BENEDETTO', 'Calogero', 'Chemin Longe-l\'Aire 18', '1212', 'Grand-Lancy', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (71, 'DI_BENEDETTO', 0, 'DI BENEDETTO', 'DI BENEDETTO', 'Margueritte', 'Chemin Longe-l\'Aire 18', '1212', 'Grand-Lancy', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (72, 'DOCTOR', 0, 'DOCTOR', 'DOCTOR', 'Narad', 'Chemin de Pont-Céard 42', '1290', 'Versoix', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (73, 'DORSAZ', 0, 'DORSAZ', 'DORSAZ', 'Agnès', 'Avenue Bois-de-la-Chapelle 9', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (74, 'DUBOIS', 0, 'DUBOIS', 'DUBOIS', 'Marie-Jeanne', 'Chemin Moïse-Duboule 17', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (75, 'DUFRENE', 0, 'DUFRÊNE', 'DUFRÊNE', 'Chantal', 'Rue Curé-Descloud 17', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (76, 'DUMONT', 0, 'DUMONT', 'DUMONT', 'Benoît', 'Avenue Eugène-Pittard 11', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (77, 'DUPERREX', 0, 'DUPERREX', 'DUPERREX', 'Aloys', 'Rue de Monbrillant 61', '1202', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (78, 'EHRAT', 0, 'EHRAT', 'EHRAT', 'Danièle', 'Avenue Peschier 16', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (79, 'ELOUARET', 0, 'ELOUARET', 'ELOUARET', 'Soraya', 'Rue de Bandol 12', '1213', 'Onex', 'Suisse', '30.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (80, 'FARTACH_Mme', 0, 'FARTACH', 'FARTACH', ' Bernadette', 'Chemin de la Tourelle 16', '1209', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (81, 'FARTACH_Suz', 0, 'FARTACH', 'FARTACH', 'Suzanne', 'Ecole de Médecine 16', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (82, 'FAUQUEX', 0, 'FAUQUEX', 'FAUQUEX', 'Jean-Paul  ', 'Rue des Minoteries 7', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (83, 'FAVRE_Puplinge', 0, 'FAVRE', 'FAVRE', 'Christianne', 'Chemin de Pré-Marquis 7b', '1241', 'Puplinge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (84, 'FAVRE_Onex', 0, 'FAVRE', 'FAVRE', 'Ruth', 'Chemin de la Calle 38', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (85, 'FAVRE_ANNE', 0, 'FAVRE-LUISIER ', 'FAVRE-LUISIER ', 'Anne Marie', 'Route de la Capite 157', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (86, 'FELL', 0, 'FELL', 'FELL', 'Christine', 'Chemin Colladon 22', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (87, 'FIRME', 0, 'FIRME', 'FIRME', 'José Manuel', 'rue des peupliers 6', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (88, 'FLAHAULT', 0, 'FLAHAULT', 'FLAHAULT', 'Françoise', 'Rue de Genève 94', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (89, 'FORAY_Herve', 0, 'FORAY', 'FORAY', 'Hervé', 'Avenue de Mategnin 59', '1217', 'Meyrin', 'Suisse', '35.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (90, 'FORAY_Mme', 0, 'FORAY', 'FORAY', 'Roberte', 'Avenue de Mategnin 49', '1217', 'Meyrin', 'Suisse', '35.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (91, 'FOURNIER', 0, 'FOURNIER', 'FOURNIER', 'Charles', 'Rue Charles-Bonnet 10', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (92, 'FRACHET', 0, 'FRACHET', 'FRACHET', 'Margueritte', 'Avenue de Joli-Mont 3', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (93, 'GARBANI', 0, 'GARBANI', 'GARBANI', 'Roger', 'Rue des Allobroges 13', '1227', 'Les Acacias', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (94, 'GAY_BALMAT', 0, 'GAY-BALMAT', 'GAY-BALMAT', 'Jeannine', 'Boulevard du Pont-d\'Arve 44', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (95, 'GIANOLI', 0, 'GIANOLI', 'GIANOLI', 'Carlo', 'Avenue du Lignon 20', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (96, 'GIAUQUE', 0, 'GIAUQUE', 'GIAUQUE', 'Rémy', 'Rue des Bossons 17', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (97, 'GIGON', 0, 'GIGON', 'GIGON', 'Jean-Pierre', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (98, 'GIGON_Mme', 0, 'GIGON', 'GIGON', 'Radmila', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (99, 'VM_Gilabert', 0, 'GILABERT', 'GILABERT', '', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (100, 'GIRAUD', 0, 'GIRAUD', 'GIRAUD', 'Christian', 'Chemin de Maisonneuve 12c', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (101, 'GONZALEZ', 0, 'GONZALEZ', 'GONZALEZ', 'Antonio', 'Route de Meyrin 17', '1202', 'Genève', 'Suisse', '40.00', 'Domicile', 'Cressy Santé, Physio', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (102, 'GORGE', 0, 'GORGE', 'GORGE', 'Pierre', 'Chemin de l´Ancien-Péage 2', '1290', 'Versoix', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (103, 'GRANFAR', 0, 'GRANFAR', 'GRANFAR', 'Ebrahim', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse', '45.00', 'Domicile', 'Relais Dumas, Grand-Saconnex', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (104, 'GRANFAR_Mme', 0, 'GRANFAR', 'GRANFAR', 'Vida', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (105, 'GRIN', 0, 'GRIN', 'GRIN', 'Denis', 'Avenue Wendt 38', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (106, 'GROSSE', 0, 'GROSSE', 'GROSSE', 'Christel', 'Rue du Loup 3', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (107, 'GUILLERMIN', 0, 'GUILLERMIN', 'GUILLERMIN', 'Jean', 'Route de Bernex 392', '1233', 'Bernex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (108, 'CHRISTINE', 0, 'GUTKNECHT', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (109, 'GUTKNECHT', 0, 'GUTKNECHT', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (110, 'HAAS', 0, 'HAAS', 'HAAS', 'Karoline', 'Chemin de Saule 94', '1233', 'Bernex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (111, 'HALPERIN', 0, 'HALPÉRIN', 'HALPÉRIN', 'Noemi', 'Avenue Alfred-Bertrand 13', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (112, 'HAUSSER', 0, 'HAUSSER', 'HAUSSER', 'Josianne', 'Chemin des Rayes 33', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (113, 'HERZI', 0, 'HERZI', 'HERZI', 'Taoufik', 'Route d\'Hermance 296', '1229', 'Anières', 'Suisse', '45.00', 'Domicile', 'Hôpital de Beau-Séjour', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (114, 'HEURTEUX', 0, 'HEURTEUX', 'HEURTEUX', 'Philippe', 'Route d\'Hermance 401', '1229', 'Anières', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (115, 'HORVATH', 0, 'HORVATH', 'HORVATH', 'Giovanna', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (116, 'HUISSOUD', 0, 'HUISSOUD', 'HUISSOUD', 'Maurice', 'Chemin Etienne-Chennaz 10', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (117, 'ILG', 0, 'ILG', 'ILG', 'Colette', 'Chemin des Tulipiers 23', '1208', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (118, 'CHO_IMERETINSKY', 0, 'IMERETINSKY', 'IMERETINSKY', 'Nadeja', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (119, 'IMHOF', 0, 'IMHOF', 'IMHOF', 'Edouard', 'Rue Vautier 26', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (120, 'INEICHEN', 0, 'INEICHEN', 'INEICHEN', 'Marie-Elisabeth', 'Avenue Calas 20', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (121, 'ROBERTA', 0, 'ISABELLA-VALENZI', 'ISABELLA-VALENZI', 'Roberta', 'Rue de la Croix-du-Levant 7', '1220', 'Les Avanchets', 'Suisse', '50.00', 'Domicile', 'Centre de jour Solaris, Collonge-Bellerive', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (122, 'JANNER', 0, 'JANNER', 'JANNER', 'Claude', 'Avenue Wendt 23', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (123, 'JEANNET', 0, 'JEANNET', 'JEANNET', 'Madeleine Pierrette', 'Chemin des Coquelicots 29', '1214', 'Vernier', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (124, 'KHAN_Mme', 0, 'KHAN', 'KHAN', 'Shamim', 'Chemin des Bugnons 10', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (125, 'KOCHER', 0, 'KOCHER ZELLER', 'KOCHER ZELLER', 'Gaby', 'Chemin Rieu 10', '1208', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (126, 'KRASNOPOLSKY', 0, 'KRASNOPOLSKY', 'KRASNOPOLSKY', 'Lucie', 'Route de Frontenex 51', '1207', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (127, 'KREBS', 0, 'KREBS', 'KREBS', 'André', 'Avenue d\'Aïre 89', '1203', 'Genève', 'Suisse', '35.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (128, 'LALIVE', 0, 'LALIVE D\'EPINAY', 'LALIVE D\'EPINAY', 'Pierre', 'Rue des Sources 13', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (129, 'LEHR', 0, 'LEHR-BYRDE', 'LEHR-BYRDE', 'Paule', 'Chemin de Grange-Falquet 51', '1224', 'Chêne-Bougeries', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (130, 'LEQUINT', 0, 'LEQUINT', 'LEQUINT', 'Claudine', 'Chemin de Chapelly 22', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (131, 'LEVY', 0, 'LEVY', 'LEVY', 'Melita', 'Rue Robert-De-Traz 2', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (132, 'LIARDON', 0, 'LIARDON', 'LIARDON', 'Lydie', 'Quai Charles-Page 45', '1205', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (133, 'LIFTON', 0, 'LIFTON', 'LIFTON', 'Danielle', 'Lotissement Trélatoun 77', '01170', 'Cessy', 'France', '60.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (134, 'LINDER', 0, 'LINDER', 'LINDER', 'Willi', 'Rue Carteret 38', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (135, 'LUCINI', 0, 'LUCINI', 'LUCINI', 'Lily', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (136, 'LUGASSY', 0, 'LUGASSY', 'LUGASSY', 'Raphaël', 'Route de Chêne 70', '1208', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (137, 'MAGNIN', 0, 'MAGNIN', 'MAGNIN', 'Mario', 'Chemin Briquet 18', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (138, 'MAIO', 0, 'MAIO', 'MAIO', 'Sabatino', 'Avenue de Thônex 8', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (139, 'MALEH', 0, 'MALEH', 'MALEH', 'Suha', 'Route de Florissant 70', '1206', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (140, 'MANSON', 0, 'MANSON-CAEN', 'MANSON-CAEN', 'Joëlle', 'Avenue d\'Aïre 73B', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (141, 'MARCHAND', 0, 'MARCHAND', 'MARCHAND', 'Chantal', 'Rue François Besson 14', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (142, 'MARES', 0, 'MARES', 'MARES', 'Eketharrina', 'Avenue Ernest-Pictet 16', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (143, 'MARESCA', 0, 'MARESCA', 'MARESCA', 'Gisela', 'Rue de la Dôle 2', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (144, 'MARTIN_MA', 0, 'MARTIN', 'MARTIN', 'Marie-Augusta', 'Cours Saint-Pierre 1', '1204', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (145, 'MATHIEU', 0, 'MATHIEU', 'MATHIEU', '', 'Chemin du Pré-du-Couvent 1', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (146, 'MATHYS', 0, 'MATHYS', 'MATHYS', 'Jean', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (147, 'MATHYS_Simone', 0, 'MATHYS', 'MATHYS', 'Simone', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (148, 'MAURON', 0, 'MAURON', 'MAURON', 'Francine', 'Rue du Grand Pré 30', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (149, 'MECCA', 0, 'MECCA', 'MECCA', 'Vincenzo', 'Rue Caroline 53', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (150, 'MESIN', 0, 'MESIN', 'MESIN', 'Mehmet', 'Chemin du Fief-de-Chapitre 9', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (151, 'MESOT', 0, 'MESOT', 'MESOT', 'André', 'Chemin de la Mère Voie 78', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (152, 'MEYLAN', 0, 'MEYLAN', 'MEYLAN', 'xxx', 'Chemin de Saule 10', '1233', 'Bernex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (153, 'MONNAY_Mariette', 0, 'MONNAY', 'MONNAY', 'Mariette', 'Route d\'Aïre 141', '1219', 'Aïre', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (154, 'MOTTET_Pat', 0, 'MOTTET', 'MOTTET', 'Patricia', 'Route de Frontenex 37', '1207', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (155, 'MULLER', 0, 'MULLER', 'MULLER', 'Elisabeth', 'Rue Henri-Mussard 14', '1208', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (156, 'MUNSPERGER', 0, 'MUNSPERGER', 'MUNSPERGER', 'Johann', 'Avenue François-Besson 20', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (157, 'MURATOVIC', 0, 'MURATOVIC', 'MURATOVIC', 'Enver', 'Avenue Louis-Casaï 39', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (158, 'MURISIER', 0, 'MURISIER', 'MURISIER', 'Etienne', 'Chemin du Stade 7A', '1252', 'Meinier', 'Suisse', '45.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (159, 'MUSINA', 0, 'MUSINA', 'MUSINA', 'Jean', 'Rue Adhémar-Fabri 4', '1201', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (160, 'MUTZENBERG', 0, 'MUTZENBERG', 'MUTZENBERG', 'Andrée', 'Avenue du Mail 24', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (161, 'MUXUDIIN', 0, 'MUXUDIIN KHAALI', 'MUXUDIIN KHAALI', 'Abuukar', 'Rue des Lilas 11', '1202', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (162, 'Neuenschwander', 0, 'NEUENSCHWANDER', 'NEUENSCHWANDER', 'Irène', 'Route de Chancy 154', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (163, 'NICOLA', 0, 'NICOLA', 'NICOLA', 'Jacques-Bernard', 'Chemin Fief-de-Chapitre 10', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (164, 'NIEMINEN', 0, 'NIEMINEN', 'NIEMINEN', 'Leena', 'Rue Marius Cadoz 204', '01170', 'Gex', 'France', '60.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (165, 'NORTE', 0, 'NORTE', 'NORTE', 'Diane', 'Communes Réunies 72', '1212', 'Gand-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (166, 'ODEMS_', 0, 'ODEMS ', 'ODEMS ', 'Mary-Ann', 'Rue de la Servette 71', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (167, 'OHANA', 0, 'OHANA', 'OHANA', 'Olivier Paul', 'Chemin des Crêts 10', '01610', 'Saint Genis ', 'France', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (168, 'MOMO', 0, 'OMAIS', 'OMAIS', 'Mohamed', 'Rue Daniel Gervil, 17', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (169, 'ORTEGA', 0, 'ORTEGA', 'ORTEGA', 'Carmen', 'Avenue du Gros-Chêne 37', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (170, 'PACHON', 0, 'PACHON', 'PACHON', 'Roger', 'Chemin des Vidolets 25', '1214', 'Vernier', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (171, 'PANT', 0, 'PANT', 'PANT', 'Sudhir', 'Rue Cherbuliez 7', '1207', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (172, 'PAUX', 0, 'PAUX', 'PAUX', 'Marcelle', 'Rue Vermont 31', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (173, 'PERRNOUD', 0, 'PERRNOUD', 'PERRNOUD', 'Jean-Pierre', 'Chemin de Saule 98', '1233', 'Bernex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (174, 'PFAUTI', 0, 'PFAUTI', 'PFAUTI', 'Marc', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', '35.00', 'Domicile', 'Dialyse GMO, Onex', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (176, 'PIGUET_Adèle', 0, 'PIGUET', 'PIGUET', 'Adda Marcel', 'Avenue Vibert 17', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (177, 'PIGUET', 0, 'PIGUET', 'PIGUET', 'Martiale', 'Chemin De-Vincy 3', '1202', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (178, 'PILLET_France', 0, 'PILLET', 'PILLET', 'Annamma', 'Rue du Château 10', '01170', 'Cessy', 'France', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (179, 'PILLOUD', 0, 'PILLOUD', 'PILLOUD', 'Nicolas', 'ManqueManque', '', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (180, 'PISONI', 0, 'PISONI', 'PISONI', 'Vladimir', 'Boid-dde-la-Chapelle 67', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (181, 'PLOJOUX', 0, 'PLOJOUX', 'PLOJOUX', 'Marie-Noëlle', 'Route d\'Aire-la-Ville 219', '1242', 'Satigny', 'Suisse', '60.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (182, 'POSS', 0, 'POSS', 'POSS', 'Marie-Louise', 'Route de Bernex 359', '1233', 'Bernex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (183, 'PROBST_Mme', 0, 'PROBST', 'PROBST', 'Liliane', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (184, 'PROBST_Walter', 0, 'PROBST', 'PROBST', 'Walter', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (185, 'PROUZET', 0, 'PROUZET', 'PROUZET', 'René', 'Avenue Wendt 1', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (186, 'PYTHON', 0, 'PYTHON', 'PYTHON', 'Georges', 'Chemin Taverney 12', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (187, 'VM_RAEMY', 0, 'RAEMY', 'RAEMY', 'Margit', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (188, 'RANIERI', 0, 'RANIERI', 'RANIERI', 'Sabine', 'Rue de la Fontenette 28', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (190, 'RAY', 0, 'RAY', 'RAY', 'Clelia', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (191, 'RAYMONDON', 0, 'RAYMONDON', 'RAYMONDON', 'Jacques', 'Route d\'Avully 107', '1237', 'Avully', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (192, 'REBMANN', 0, 'REBMANN', 'REBMANN', 'Véréna', 'Rue de Vermont 16', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (193, 'RENCHET', 0, 'RENCHET', 'RENCHET', 'Georges', 'Chemin de la Bâtie 7', '1213', 'Petit-Lancy', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (194, 'RENFER', 0, 'RENFER', 'RENFER', 'Marcel', 'Rue de la Dôle 18', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (195, 'RICCARDELLI', 0, 'RICCARDELLI', 'RICCARDELLI', 'Maria', 'Avenue du Ligon 50-53', '1219', 'Le Lignon', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (196, 'RITSCHARD', 0, 'RITSCHARD', 'RITSCHARD', '', 'Rue Cavour 3', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (197, 'RITSCHARD_Rudolf', 0, 'RITSCHARD', 'RITSCHARD', 'Jure Rudolf', 'Route de Chancy 98', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (198, 'RKIZA', 0, 'RKIZA', 'RKIZA', 'Silvia', 'Avenue d\'Aire 91A', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (199, 'ROCHANAKORN', 0, 'ROCHANAKORN', 'ROCHANAKORN', 'Kasidis', 'Chemin Sansonnets 4', '1291', 'Commugny', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (200, 'ROCHAT', 0, 'ROCHAT', 'ROCHAT', 'Philippe', 'Rue Emile-Nicolet 13', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (201, 'RODAK', 0, 'RODAK', 'RODAK', 'Irène', 'Chemin de la Charrue 11', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (202, 'ROLLIER', 0, 'ROLLIER', 'ROLLIER', 'Jean-Pierre', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (203, 'CHO_Rosset', 0, 'ROSSET', 'ROSSET', 'Jacqueline', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (204, 'ROSSET', 0, 'ROSSET', 'ROSSET', 'René', 'Rue Dancet 3', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (205, 'RUSCITO', 0, 'RUSCITO', 'RUSCITO', 'Bruno', 'Route des Vainges 282', '74380', 'Nangy', 'France', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (206, 'SALLIN', 0, 'SALLIN', 'SALLIN', 'Marc', 'Parc Dinu-Lipatti 5', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (207, 'SALZ', 0, 'SALZMANN', 'SALZMANN', 'Angèle', 'Route de Malagnou 16', '1208', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (208, 'SALZMANN', 0, 'SALZMANN', 'SALZMANN', 'Johana', 'Avenue des Cavaliers Avenue des Cavaliers 5', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (209, 'SANT', 0, 'SANT', 'SANT', 'Mira', 'Croix-du-Levant 14', '1220', 'Les Avanchets', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (210, 'SANTINES', 0, 'SANTINES', 'SANTINES', 'Joseph', 'Grand-Monfleury 2', '1290', 'Versoix', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (211, 'SAUVAIN_CHARLY', 0, 'SAUVAIN', 'SAUVAIN', 'Charly', 'Rue du Village 3', '1214', 'Vernier', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (212, 'SAUVAIN_Mme', 0, 'SAUVAIN', 'SAUVAIN', 'Christiane', 'Rue du Village 3', '1214', 'Vernier', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (213, 'SAUVET', 0, 'SAUVET', 'SAUVET', 'Olivier', 'Rue de l\'Aubépine 13', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (214, 'SCHALTEGGER', 0, 'SCHALTEGGER', 'SCHALTEGGER', 'Marguerite', 'Chemin de Saule  71', '1233', 'Bernex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (215, 'SCHNEiDER', 0, 'SCHNEiDER', 'SCHNEiDER', 'André', 'Chemin du Champs-d\'Anier 8', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (216, 'SCHROETER', 0, 'SCHROETER', 'SCHROETER', 'Sonia', 'Avenue du Mail 20', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (217, 'SCHURMANN', 0, 'SCHURMANN', 'SCHURMANN', 'Agnès', 'Promenade de Champs-Fréchets 14', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (218, 'SCHWERI', 0, 'SCHWERI', 'SCHWERI', 'Ernest', 'Avenue de France 31', '1202', 'Genève', 'Suisse', '35.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (219, 'SCHWERZMANN', 0, 'SCHWERZMANN', 'SCHWERZMANN', 'Simone', 'Rue des evaux 7', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (220, 'SEN', 0, 'SEN', 'SEN', 'Omer', 'Avenue Frédéric-Soret 24', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (221, 'SHAHADAT', 0, 'SHAHADAT', 'SHAHADAT', 'Naseerha', 'Cité Vieusseux  7', '1203', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (222, 'SICOVIER', 0, 'SICOVIER', 'SICOVIER', 'Ivan', 'Rue Chabrey 9', '1202', 'Genève', 'Suisse', '40.00', 'Domicile', 'Hôpital de La Tour, Hemodialyse', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (223, 'SICURANZA', 0, 'SICURANZA', 'SICURANZA', 'Norma', 'Route de Colovray 4', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', 'Domicile', 'Dr Ilic, 4 rue Gourgas', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (224, 'SIEBERT', 0, 'SIEBERT', 'SIEBERT', 'Margit', 'Avenue Soret 4', '1203', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (225, 'SOMMERHALDER', 0, 'SOMMERHALDER', 'SOMMERHALDER', 'Anita', 'Avenue de Vaudagne 35', '1217', 'Meyrin', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (226, 'SORDAT', 0, 'SORDAT', 'SORDAT', 'Olivier', 'Chemin de la Traille 30', '1213', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (227, 'STOPFER', 0, 'STOPFER', 'STOPFER', 'Hans', 'Rue louis-Favre 37', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (228, 'TALLEUX', 0, 'TALLEUX', 'TALLEUX', 'Denise', 'Chemin De-La-Montagne 112', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (229, 'THEVOZ', 0, 'THEVOZ', 'THEVOZ', 'Geneviève', 'Rue Jean-Robert-Chouet 17', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (230, 'VM_Torello', 0, 'TORELLO', 'TORELLO', 'Jacqueline', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (231, 'TOSCANO', 0, 'TOSCANO', 'TOSCANO', 'Sandro', 'Rue Moïse Duboule 31', '1209', 'Genève', 'Suisse', '40.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (232, 'TRENTAZ', 0, 'TRENTAZ', 'TRENTAZ', 'Georgette', 'Rue du Grand-Pré 55', '1202', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (233, 'TZORTIS', 0, 'TZORTIS-WIEDMER', 'TZORTIS-WIEDMER', 'Christiane Aline', 'Route de Chancy 42', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (234, 'VALLAT', 0, 'VALLAT', 'VALLAT', 'Brigitte', 'Boulevard des Promenades 20', '1227', 'Carouge', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (235, 'VALLEPIN', 0, 'VALLEPIN', 'VALLEPIN', 'Daniel', 'Rue des Mésanges 6', '74160', 'Saint-Julien', 'France', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (236, 'VALLET', 0, 'VALLET', 'VALLET', 'Patricia', 'Avenue du Lignon 67', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (237, 'VINCI', 0, 'VINCI', 'VINCI', 'Maria', 'Chemin de Vi-Longe13', '1213', 'Onex', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (238, 'VUSICKI', 0, 'VUSICKI', 'VUSICKI', 'Nevenka', 'Rroute Antoine-Martin 31A', '1234', 'Vessy', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (239, 'WASMER', 0, 'WASMER', 'WASMER', 'Rose-Marie', 'Rue Le-Corbusier 21a', '1208', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 25 rue Jacques-Grosselin', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (240, 'WEBER_F', 0, 'WEBER', 'WEBER', 'Francine', 'Rue de Moillebeau 3A', '1209', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (241, 'WOOD', 0, 'WOOD', 'WOOD', 'Jonathan', 'Quai Wilson 41', '1201', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (242, 'YERSIN', 0, 'YERSIN', 'YERSIN', 'Pierre', 'Chemin de Tré-la-Villa 40', '1236', 'Cartigny', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (243, 'ZAKAR', 0, 'ZAKAR', 'ZAKAR', 'Thérèse', 'Rue Du Bois-Melly 2', '1205', 'Genève', 'Suisse', '0.00', '', '', '', 200, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (244, 'ABBE', 0, 'ABBÉ', 'ABBÉ', 'Edmée', 'Rue de la Faïencerie 7', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (245, 'ABDALLA', 0, 'ABDALLA GERGIS', 'ABDALLA GERGIS', 'Samira', 'Boulevars Saint-Georges 71', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (246, 'ABDOULA', 0, 'ABDOULA', 'ABDOULA', 'Mumbaz', 'Chemin des Voirons 1', '1291', 'Commugny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (247, 'ABRAHAM_Col', 0, 'ABRAHAM', 'ABRAHAM', 'Paula', 'Route du Vallon 19', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (248, 'AELLEN', 0, 'AELLEN', 'AELLEN', 'Pierre', 'Croix-du-Levant 7', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (249, 'AESCHBACH', 0, 'AESCHBACH', 'AESCHBACH', 'Gertrud', 'Route de Frontenex 61', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (250, 'AGREBI', 0, 'AGREBI', 'AGREBI', 'Sabah', 'Rue Robert-de-Traz 15', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (251, 'AIELLO', 0, 'AIELLO', 'AIELLO', 'Maria', 'Rue du Buis 3', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (252, 'AKKAYAN', 0, 'AKKAYAN', 'AKKAYAN', 'Rita', 'Place des Augustins  11', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (253, 'AKRIB', 0, 'AKRIB', 'AKRIB', 'Hanon', 'Rue Jean-Antoine Gautier 18', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (254, 'AL_JADIR', 0, 'AL-JADIR', 'AL-JADIR', 'Adib', 'Avenue de Trembley 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (255, 'ALFANDARY', 0, 'ALFANDARY', 'ALFANDARY', 'Nissim', 'Avenue des Cavaliers 15', '1224', 'Chênes-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (256, 'ALLIOD', 0, 'ALLIOD', 'ALLIOD', 'Marguerite', 'C/O EPAD Le Clos Chevalier Rue du Père Adam 7', '01210', 'Ornex', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (257, 'ALVAREZ_HERRERA', 0, 'ALVAREZ - HERRERA', 'ALVAREZ - HERRERA', 'Ana', 'Chemin de la menuiserie 13', '1293', 'Bellevue', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (258, 'AMATI', 0, 'AMATI', 'AMATI', 'Orlando', 'Route des Acasias 5', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (259, 'AMAUDRUZ', 0, 'AMAUDRUZ', 'AMAUDRUZ', 'Eliane', 'Chemin des Rasses 6', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (260, 'AMEZ_DROZ_Algar', 0, 'AMEZ-DROZ', 'AMEZ-DROZ', 'Algar', 'Chemin de Castelver', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (261, 'AMSTUTZ', 0, 'AMSTUTZ', 'AMSTUTZ', 'Suzy', 'Chemin du Renard 27', '1219', 'Aire', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (262, 'ANDERSSON_Col', 0, 'ANDERSSON', 'ANDERSSON', 'Gustave', 'Chemin des Fleurs 13', '01210', 'Ferney-Voltaire', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (263, 'ANNEN', 0, 'ANNEN', 'ANNEN', 'Georgette', 'Chemin des Vignes 14', '1027', 'Lonay', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (264, 'ANTAL', 0, 'ANTAL', 'ANTAL', 'Monique', 'Rue Taverney 16', '1218', 'Le Gand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (265, 'APTER_Col', 0, 'APTER', 'APTER', 'Yvette', 'Avenue Bertrand 13', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (266, 'ARANDEL', 0, 'ARANDEL', 'ARANDEL', 'Dominique', 'Rue de Vermont 46', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (267, 'ARBEZ', 0, 'ARBEZ', 'ARBEZ', 'Annabelle', 'Rue du Vivier 2636', '39220', 'Bois d\'Amont', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (268, 'ARCOVIC', 0, 'ARCOVIC', 'ARCOVIC', 'Radisav', 'Rue de Lyon 65 bis', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (269, 'ARMANIOS_Col', 0, 'ARMANIOS', 'ARMANIOS', 'Ramsis', 'Rue Beau-Site 3', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (270, 'ARRABAL', 0, 'ARRABAL', 'ARRABAL', 'Marie-Luz', 'Avenue Wendt 39', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (271, 'ASSOCIATION_Revivre', 0, 'LAZZAROTTO', 'LAZZAROTTO', 'Loreno', 'Rue Grange-Levrier 6', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (272, 'ASTORE_Col', 0, 'ASTORE', 'ASTORE', 'Maria', 'Avenue Pictet-de-Rochemond 23', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (273, 'AUBERSON_Col', 0, 'AUBERSON', 'AUBERSON', 'Andrée', 'Avenue d\'Aïre 56', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (274, 'AUVERGNE', 0, 'AUVERGNE', 'AUVERGNE', 'Martine', 'Avenue Léon-Gaud 9', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (275, 'AYMON', 0, 'AYMON', 'AYMON', 'Pierre', 'Quai du Seujet 36', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (276, 'BAATARD', 0, 'BAATARD', 'BAATARD', 'Margueritte', 'Rue de Lausanne 48', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (277, 'BADECHE', 0, 'BADECHE', 'BADECHE', 'Malika', 'Avenue du Lignon 50', '1219', 'Le Lignon', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (278, 'BADET', 0, 'BADET', 'BADET', 'Josiane', 'Avenue de Bois-de-la -Chapelle 71', '1213', 'Onex', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (279, 'BAERTSCHI', 0, 'BAERTSCHI', 'BAERTSCHI', 'Rodolphe', 'Route des Arales 110', '74140', 'Saint-Cergues',
        'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (280, 'BAGNOUD', 0, 'BAGNOUD', 'BAGNOUD', 'Marie-Françoise & René-Jean', 'Avenue des Grande-Communes 22', '1213',
        'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (281, 'BAHLER_Col', 0, 'BAHLER-SCHNEIDER', 'BAHLER-SCHNEIDER', 'Elise', 'Avenue Ernest-Hentsch 12', '1207', 'Genève',
        'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (282, 'BAIKER', 0, 'BAIKER', 'BAIKER', 'Charles', 'Rue du Conseil-Général 18', '1205', 'Genève', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (283, 'BAL_DU_PRINTEMPS', 0, 'BOISSONNAS', 'BOISSONNAS', 'Phillippe', 'Rue François-Perréard 14', '1225',
        'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', '');
INSERT INTO `transport_clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_depart`, `default_arrivee`, `default_transport_type`, `liste_rank`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (284, 'BALLANDE_Col', 0, 'BALLANDE', 'BALLANDE', 'Colette', 'Rue de la Dôle 19', '1203', 'Genève', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (285, 'BANDERET', 0, 'BANDERET', 'BANDERET', 'Rosa', 'Rue Berthet 10', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (286, 'BARBASINI', 0, 'BARBASINI', 'BARBASINI', 'Virginia', 'Avenue Edouard Vallet 43', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (287, 'BARBEZAT', 0, 'BARBEZAT', 'BARBEZAT', 'Cosette', 'Rue des Bossons 17', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (288, 'BARBIER_Col', 0, 'BARBIER', 'BARBIER', 'Denise', 'Quai Wilson 41', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (289, 'BARNIER_Col', 0, 'BARNIER', 'BARNIER', 'Annie', 'Chemin Frank-Thomas 94', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (290, 'BARRAS', 0, 'BARRAS', 'BARRAS', 'Emilia', 'Rue de Bernex 342', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (291, 'BARROSO_Col', 0, 'BARROSO', 'BARROSO', 'Camila', 'Avenue William-Lescaze 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (292, 'BASSAND', 0, 'BASSAND', 'BASSAND', 'Michel', 'Route de Loëx 4', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (293, 'BAUD', 0, 'BAUD', 'BAUD', 'Monique', 'Avenue Théodore-Flournoy 3', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (294, 'BAUDOIN', 0, 'BAUDOIN', 'BAUDOIN', 'Yvan', 'Rue de Lyon 61', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (295, 'BAUER_Col', 0, 'BAUER OPPERMANN', 'BAUER OPPERMANN', 'Ingeborg', 'Rue Alberto-Giacometti 2', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (296, 'BAUMANN_Ch', 0, 'BAUMANN', 'BAUMANN', 'Chritiane', 'Route de Thônon 278', '1246', 'Corsier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (297, 'BAUNAZ', 0, 'BAUNAZ', 'BAUNAZ', 'Michel', 'Avenue Vibert 18', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (298, 'BAUR', 0, 'BAUR', 'BAUR', 'Siegfried', 'Rue De-Livron 17', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (299, 'BECHIR', 0, 'BECHIR', 'BECHIR', 'Renée', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (300, 'BEDESCHI', 0, 'BEDESCHI', 'BEDESCHI', 'Eileen', 'Rue Virginio Malnati 67', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (301, 'BEGERT', 0, 'BEGERT', 'BEGERT', 'Marie', 'Rue des Bossons 6', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (302, 'BEGUIN', 0, 'BEGUIN', 'BEGUIN', 'René', 'Rue des Alpes 5', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (303, 'BEL_HAMMAR', 0, 'BEL HAMMAR', 'BEL HAMMAR', 'Inès', 'EMS St-Loup', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (304, 'BELAZ', 0, 'BELAZ', 'BELAZ', 'Daniel', 'Rue de Lausanne 31', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (305, 'BELILOS_Col', 0, 'BELILOS', 'BELILOS', 'Andreina', 'Chemin de la Tour de Champel 2', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (306, 'BELLON_Col', 0, 'BELLON', 'BELLON', 'Jacqueline', 'Place des Philosophes 6', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (307, 'BELOTTI', 0, 'BELOTTI', 'BELOTTI', 'Juliette', 'Rue de la Prulay 45', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (308, 'BENEDICT', 0, 'BENEDICT', 'BENEDICT', 'Lydia', 'Chemin Auguste-Vilbert 42', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (309, 'BENI', 0, 'BENI', 'BENI', 'Anne', 'Avenue de la Grenade 26', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (310, 'BENNANI', 0, 'BENNANI', 'BENNANI', 'Karima', 'Rue Samuel-Constant 5', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (311, 'BENNINGHOFF', 0, 'BENNINGHOFF', 'BENNINGHOFF', 'Agnes', 'Rue Oscar Bider 2', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (312, 'BENVENUTI', 0, 'BENVENUTI', 'BENVENUTI', 'Bianca', 'Chemin des Couleuvres 6', '1295', 'Tanay', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (313, 'BENZ', 0, 'BENZ', 'BENZ', 'Gabrielle', 'Route de Saint-Cergue 40 B', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (314, 'BERCLAZ_Bernadette', 0, 'BERCLAZ', 'BERCLAZ', 'Bernardette', 'Chemin Etienne-Chennaz 10', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (315, 'BERENDSON', 0, 'BERENDSON', 'BERENDSON', 'Betty', 'Chemin des Coudriers 44', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (316, 'BEREZIAT', 0, 'BEREZIAT', 'BEREZIAT', 'Claire', 'Rue des Racettes 55', '1213 Onex', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (317, 'BERGMANN_Col', 0, 'BERGMANN', 'BERGMANN', 'Francine', 'Chemin Champs d\'Anier 8', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (318, 'BERLANI', 0, 'BERLANI', 'BERLANI', 'Monique', 'Route d\'Aire-la-Ville 215', '1242', 'Satigny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (319, 'BERLI_Rosette', 0, 'BERLI', 'BERLI', 'Rosette', 'Rue des Délices 10', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (320, 'BERLIE', 0, 'BERLIE', 'BERLIE', '', 'Rue des Déciles', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (321, 'BERLINERBLAU', 0, 'BERLINERBLAU', 'BERLINERBLAU', 'Renée', 'Chemin Briquet 22', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (322, 'BERNEY', 0, 'BERNEY', 'BERNEY', 'Jean-Bernard', 'Rue Virginio-Malnati 70', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (323, 'BERNEY_Mme', 0, 'BERNEY', 'BERNEY', '', 'Rue Virginio-Malnati 70', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (324, 'BERNINI', 0, 'BERNINI', 'BERNINI', 'Hedwig', 'Rue de Moillebeau 33', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (325, 'BERSET', 0, 'BERSET', 'BERSET', 'Jean-Claude', '112 rue de la Dôle', '01170', 'Ségny', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (326, 'BERSIER', 0, 'BERSIER', 'BERSIER', 'Jean-Pierre', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (327, 'BERTI', 0, 'BERTI', 'BERTI', 'Mario', 'Rue de Carouge 102', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (328, 'BERTIN_Col', 0, 'BERTIN', 'BERTIN', 'Gérard', 'Rue de la Prulay 60', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (329, 'BESSON', 0, 'BESSON', 'BESSON', 'Françoise', 'Rue du Vidollet 31', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (330, 'BETZ', 0, 'BETZ', 'BETZ', 'Engelbert', 'Chemin des Rayes 17', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (331, 'BEYELER', 0, 'BEYELER', 'BEYELER', 'Raymond', 'Route de Meyrin 12a', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (332, 'BEZZOLA_Col', 0, 'BEZZOLA EMONET', 'BEZZOLA EMONET', 'Hélène', 'Crêts-de-Champel 4', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (333, 'BIBAWI_MANSOUR', 0, 'BIBAWI MANSOUR', 'BIBAWI MANSOUR', 'Tewfik', 'Chemin du Pommier 18', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (334, 'BIGNENS', 0, 'BIGNENS', 'BIGNENS', 'Nicole', 'Avenue de Vaudagne 29', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (335, 'BINER', 0, 'BINER', 'BINER', 'Gilbert', 'Rue de Vermont 30', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (336, 'xxx_BINGGELI', 0, 'BINGGELI', 'BINGGELI', 'Jacqueline', 'Avenue Adrien-Jeandin 25', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (337, 'BLANC', 0, 'BLANC', 'BLANC', 'France', 'Avenue Pictet-de-Rochemont 37', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (338, 'BLANC_Col', 0, 'BLANC', 'BLANC', 'Janine', 'Chemin Bizot 4', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (339, 'BLANC_KELLER', 0, 'BLANC_KELLER', 'BLANC_KELLER', 'Margueritte', 'Route de Thonon 64', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (340, 'BLEICHENBACHER', 0, 'BLEICHENBACHER', 'BLEICHENBACHER', 'Hilda', 'Rue Lamartine 17A', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (341, 'BLESSEMAILLE', 0, 'BLESSEMAILLE', 'BLESSEMAILLE', 'Suzanne', 'Rue Edmond Rochar 1', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (342, 'BLONDEL', 0, 'BLONDEL', 'BLONDEL', 'Dominique', 'Rue Georges Charpak 56', '01630', 'Saint-Genis-Pouilly', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (343, 'BOCHONS_Col', 0, 'BOCHONS GARRIDO', 'BOCHONS GARRIDO', 'Amparo', 'Route du Nant d\'Avril 72', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (344, 'BODART_Col', 0, 'BODART', 'BODART', 'Marie-Catherine', 'Avenue de Mirmont 1', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (345, 'BONNAZ', 0, 'BONNAZ', 'BONNAZ', 'Roger', 'Rue des Minoteries 3', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (346, 'BORDIER_BERTHOUD', 0, 'BORDIER-BERTHOUD', 'BORDIER-BERTHOUD', 'Françoise', 'Chemin de Sierne 9', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (347, 'BORGEL_Col', 0, 'BORGEL', 'BORGEL', 'Anne', 'Avenue Eugène-Pittard 15', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (348, 'BORGHANS', 0, 'BORGHANS', 'BORGHANS', 'Arlette', 'Avenue d Aïre 48', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (349, 'BOSSARD', 0, 'BOSSARD', 'BOSSARD', 'Brigitte', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (350, 'BOSSARD_Brigitte', 0, 'BOSSARD', 'BOSSARD', 'Brigitte', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (351, 'BOSSARD_Col', 0, 'BOSSARD', 'BOSSARD', 'Yann', 'Chemin de la Milice 42', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (352, 'BOSSEL_Col', 0, 'BOSSEL MOUDARRIR', 'BOSSEL MOUDARRIR', 'Naima', 'Boulevard des Promenades 10 B', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (353, 'BOSSON', 0, 'BOSSON', 'BOSSON', 'Roger', 'Chemin de Clair-Vue 14', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (354, 'BOSSY_Col', 0, 'BOSSY', 'BOSSY', 'Gilberte', 'Chemon des coudriers 50', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (355, 'BOTHEREAU_Col', 0, 'BOTHEREAU', 'BOTHEREAU', 'Jacqueline', 'Rue des Bossons 17', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (356, 'BOTTINELI', 0, 'BOTTINELLI', 'BOTTINELLI', 'Anne-Marie', 'Rue de la Servette 87', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (357, 'BOUALAM', 0, 'BOUALAM', 'BOUALAM', 'Liliane', 'Chemin du Petit-Saconnex 28 A', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (358, 'BOURIOT', 0, 'BOURIOT', 'BOURIOT', 'Lucie', 'Boulevard de la Cluse 29', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (359, 'xxx_BOUVARD_Col', 0, 'BOUVARD', 'BOUVARD', 'Christiane', 'Route de Loëx 2', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (360, 'BOVEY_Col', 0, 'BOVEY', 'BOVEY', 'Marie-Louise', 'Rue Ernest-Bloch 56', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (361, 'BOVIGNY', 0, 'BOVIGNY', 'BOVIGNY', 'Charles', 'Rue de Carouge 55', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (362, 'BOZOLO', 0, 'BOZZOLO', 'BOZZOLO', 'Pierre', 'Chemin Vert-Pré 6', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (363, 'BRANDER_Col', 0, 'BRANDER', 'BRANDER', 'Gunilla', 'Chemin du Levrioux 8', '1263', 'Crassier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (364, 'BRANDON', 0, 'BRANDON', 'BRANDON', 'Claudette', 'Rue Liotard 8', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (365, 'BRAUNINGER', 0, 'BRÄUNINGER', 'BRÄUNINGER', 'Frabçoise', 'Avenue de Mategnin 69', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (366, 'Brg_ALIGE', 0, 'ALIGE', 'ALIGE', 'Paulette', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (367, 'Brg_BARBEY', 0, 'BARBEY', 'BARBEY', '', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (368, 'Brg_BELLOTTI', 0, 'BELLOTTI', 'BELLOTTI', 'Jeannine', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (369, 'Brg_BROSSARD', 0, 'BROSSARD', 'BROSSARD', 'Gisèle', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (370, 'Brg_BUCHER', 0, 'BUCHER', 'BUCHER', '', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (371, 'Brg_CANALS', 0, 'CANALS', 'CANALS', 'Ramon', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (372, 'Brg_CORDEY', 0, 'CORDEY', 'CORDEY', 'Claudine', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (373, 'Brg_DOTTO', 0, 'DOTTO', 'DOTTO', 'Antonia', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (374, 'Brg_FILIPPINI', 0, 'FILIPPINI', 'FILIPPINI', 'Laura', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (375, 'Brg_FISHER', 0, 'FISCHER', 'FISCHER', 'Sonia', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (376, 'Brg_GATTUSO', 0, 'SICLARI GATTUSO', 'SICLARI GATTUSO', 'Maria', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (377, 'Brg_GENIER', 0, 'GENIER', 'GENIER', 'Denise', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (378, 'Brg_HUTZLI', 0, 'HUTZLI', 'HUTZLI', 'Alexandrine', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (379, 'Brg_JUNOD', 0, 'JUNOD', 'JUNOD', 'Blanche', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (380, 'Brg_KAUFFMANN', 0, 'KAUFFMANN', 'KAUFFMANN', 'Juliette', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (381, 'Brg_KROUTINSKY', 0, 'KROUTINSKY', 'KROUTINSKY', 'Denise', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (382, 'Brg_LANDERBERGUE', 0, 'LANDENBERGUE', 'LANDENBERGUE', 'Carmela', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (383, 'Brg_LUTHY', 0, 'LUTHY', 'LUTHY', '', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (384, 'Brg_MARTINEZ_Mme', 0, 'MARTINEZ', 'MARTINEZ', 'Amelia', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (385, 'Brg_MARTINEZ_Mr', 0, 'MARTINEZ', 'MARTINEZ', 'Jesus', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (386, 'Brg_PATRU', 0, 'PATRU', 'PATRU', 'Mireille', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (387, 'Brg_PIPOZ', 0, 'PIPOZ', 'PIPOZ', 'Marlies', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (388, 'Brg_PONTAROLO', 0, 'PONTAROLO', 'PONTAROLO', '', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (389, 'Brg_SIGLARI', 0, 'SIGLARI', 'SIGLARI', '', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (390, 'Brg_STURLESI', 0, 'STURLESI', 'STURLESI', 'Giuditta', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (391, 'Brg_ZINK', 0, 'ZINC', 'ZINC', 'Paulette', 'Chemin de Cressy 67', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (392, 'BROSSARD', 0, 'BROSSARD', 'BROSSARD', 'Jean-Pierre', 'Chemin François-Chavaz 12', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (393, 'BRUDER', 0, 'BRUDER', 'BRUDER', 'Marianne', 'Rue du Clos 5', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (394, 'BRUNISHOLZ', 0, 'BRUNISHOLZ', 'BRUNISHOLZ', 'Pierrette', 'Cité Vieusseux 11', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (395, 'BRUNNER', 0, 'BRUNNER', 'BRUNNER', 'Jacques', 'Chemin Ami-Argand 11', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (396, 'BRUTSCH', 0, 'BRÜTSCH', 'BRÜTSCH', 'Ernest', 'Rue Alberto Giacometti 2', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (397, 'BRUTSCH_CG', 0, 'BRUTSCH', 'BRUTSCH', 'Monique', 'Chemin des Primevères 11', '1258', 'Perly Certoux', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (398, 'BRYNER', 0, 'BRYNER', 'BRYNER', 'Ursula', 'Rue de la Dôle 18', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (399, 'BUCHLER', 0, 'BUCHLER', 'BUCHLER', 'Louis-Frederich', 'Rue Edouard-Vallet 18', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (400, 'BUEHLER_Col', 0, 'BUEHLER', 'BUEHLER', 'Louise', 'Place de l Etrier 4', '1224', 'Chênes-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (401, 'BUFFO_Col', 0, 'BUFFO', 'BUFFO', 'Jean-Claude', 'Avenue Gasparin 17', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (402, 'BUISSARD', 0, 'BUISSARD', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (403, 'BULHMANN', 0, 'BULHMANN', 'BULHMANN', 'Françoise', 'Avenue de Miremont 35D', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (404, 'BULHMANN_Rolf', 0, 'BÜLHMANN', 'BÜLHMANN', 'Rolf', 'Chemin des Colombettes 4', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (405, 'BUNGENER_Col', 0, 'BUNGENER THOMAS', 'BUNGENER THOMAS', 'Françoise', 'Route de Troinex 46', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (406, 'BURGISSER', 0, 'BURGISSER', 'BURGISSER', 'Michel', 'Route de Borly 18', '74380', 'Cranves Sales', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (407, 'BURK', 0, 'BURK', 'BURK', 'Betty', 'Poststrasse 20', '6300', 'Zug', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (408, 'BURRI', 0, 'BURRI', 'BURRI', 'Armand', 'Avenue Wendt 58', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (409, 'BUSSARD', 0, 'BUSSARD', 'BUSSARD', 'Robert', 'Chemin François-Lehmann 2', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (410, 'BUSSARD_D', 0, 'BUSSARD', 'BUSSARD', 'Daniel-Gérard', 'Avenue Giuseppe Motta 18', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (411, 'BUTORA', 0, 'BUTORA', 'BUTORA', 'Joseph', 'Chemin Ami-Argand 74', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (412, 'BUTTIGNOL', 0, 'BUTTIGNOL', 'BUTTIGNOL', 'Marie-Madeleine', 'Rue Benjamin-Franklin 6', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (413, 'BUVELOT', 0, 'BUVELOT', 'BUVELOT', 'Huguette', 'Boulevard des Philosphes 2', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (414, 'CAGGIULA', 0, 'CAGGIULA', 'CAGGIULA', 'Salvatore', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (415, 'CAILLIER', 0, 'CAILLIER', 'CAILLIER', 'Jean', 'Chemin Tricouni 20', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (416, 'CALABRESE', 0, 'CALABRESE', 'CALABRESE', 'Carmen', 'Avenue du Petit-Lancy 31', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (417, 'CALCOEN_Col', 0, 'CALCOEN', 'CALCOEN', 'Daniel', 'Rue des Moraines', '01170', 'Chevry', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (418, 'CALLERI', 0, 'CALLERI', 'CALLERI', 'Francesco', 'Rue Muzy 3', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (419, 'CALLO', 0, 'CALLO', 'CALLO', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (420, 'CALZAVARA', 0, 'CALZAVARA', 'CALZAVARA', 'Zafira', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (421, 'CAMERON', 0, 'CAMERON', 'CAMERON', 'Sheena', 'Résidence Jardin du Rhône', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (422, 'CANNATA_GANOZA', 0, 'CANNATA GANOZA', 'CANNATA GANOZA', 'Maria', 'Rue de la Cannonière 9', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (423, 'CAPELLA_Col', 0, 'CAPELLA SERRA', 'CAPELLA SERRA', 'Asuncion', 'Chemin des Crêts-de-Campel 7', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (424, 'CAROLINGHI', 0, 'CAROLINGHI', 'CAROLINGHI', 'Marie-Thérèse', 'Rue de Vermont 32', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (425, 'CARRUZZO', 0, 'CARRUZZO', 'CARRUZZO', 'Lucienne', 'Rue Daubin 4', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (426, 'CASH', 0, 'Cash', 'Cash', '', '', '', '', '', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (427, 'CASTAGNA_SCALET', 0, 'CASTAGNA-SCALET', 'CASTAGNA-SCALET', 'Josiane', 'Avenue Henri Gaulet 24 Bis', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (428, 'CASTELLINI', 0, 'CASTELLINI', 'CASTELLINI', 'Irène', 'Rue du Collège 3', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (429, 'CAUSSARD_Col', 0, 'CAUSSARD', 'CAUSSARD', 'Jeanine', 'Chemin De-Normandie 6', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (430, 'CAVADINI_Col', 0, 'CAVADINI', 'CAVADINI', 'Charlotte', 'Chemn du Gué 69', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (431, 'CHABLOZ', 0, 'CHABLOZ', 'CHABLOZ', 'Marie-Thérèse', 'Rue du Grand-Bureau 31', '1227', 'Les Acasias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (432, 'CHABLOZ_Gertrude', 0, 'CHABLOZ', 'CHABLOZ', 'Gertrude', 'Route de la Capite 272', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (433, 'CHABLOZ_YP', 0, 'CHABLOZ', 'CHABLOZ', 'Yvan-Pierre', 'Rue de Vermont 14', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (434, 'CHABOT', 0, 'CHABOT', 'CHABOT', 'Georgette', 'Rue de la Servette 85', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (435, 'CHABRY', 0, 'CHABRY', 'CHABRY', 'Christiane', 'Route de Ferney 181', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (436, 'CHAMBENOIT', 0, 'CHAMBENOIT', 'CHAMBENOIT', 'Monique', 'Avenue du Curé Baud 47', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (437, 'CHANGKAKOTI_Col', 0, 'CHANGKAKOTI', 'CHANGKAKOTI', 'Oksana', 'Avenue de Gallatin 12', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (438, 'CHAPPUIS', 0, 'CHAPPUIS', 'CHAPPUIS', 'Liliane', 'Rue Liotard 75', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (439, 'CHAPUIS_Rog', 0, 'CHAPUIS', 'CHAPUIS', 'Roger', 'Rue Guye 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (440, 'CHARREZ', 0, 'CHARREZ', 'CHARREZ', 'Lucie', 'Avenue Eugene Pittard 9', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (441, 'CHASSOT', 0, 'CHASSOT', 'CHASSOT', 'Chantal', 'Avenue Ernest-Hentsch 11', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (442, 'CHATELAIN', 0, 'CHÂTELAIN', 'CHÂTELAIN', 'Michel', 'Rue Carqueron 3', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (443, 'CHAUVET', 0, 'CHAUVET', 'CHAUVET', 'Jackie', 'Avenue des Grandes-Communes 22', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (444, 'CHAUVET_MRPS', 0, 'CHAUVET', 'CHAUVET', 'Denyse', 'Avenue de Trenbley 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (445, 'CHAVES', 0, 'CHAVES', 'CHAVES', 'Annette', 'Chemin de l\'Aulne 8', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (446, 'CHETTA', 0, 'CHETTE', 'CHETTE', 'Sonja', 'Rue De-Livron 27', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (447, 'CHEVALIER_Fern', 0, 'CHEVALIER', 'CHEVALIER', 'Fernand', 'Avenue de Mirmont 35', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (448, 'CHIKR', 0, 'CHIKR', 'CHIKR', 'M\'Hamed', 'Rue Pradier 8', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (449, 'CHILIKIN', 0, 'CHILIKIN', 'CHILIKIN', 'Ludmina', 'Plateau de Frontenex 9B', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (450, 'CHILLIER', 0, 'CHILIER', 'CHILIER', 'Marie-Thérèse', 'Chemin des Vidollets 22', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (451, 'CHRISTIN_Col', 0, 'CHRISTIN AUDEOUD', 'CHRISTIN AUDEOUD', 'Jeanine', 'Rue Jean-Violette 1', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (452, 'CHRISTIN_G', 0, 'CHRISTIN', 'CHRISTIN', 'Gilbert', 'Rue Michel-Chauvet 2', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (453, 'CHRISTINET', 0, 'CHRISTINET', 'CHRISTINET', 'Micheline', 'Chemin Auguste Vilbert 3', '1218', 'Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (454, 'CHRONOPOULOU', 0, 'CHRONOPOULOU', 'CHRONOPOULOU', 'Joanna', 'Chemin de la Presse 4', '1288', 'Aire-la-Ville', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (455, 'CLASSEM', 0, 'CLASSEM', 'CLASSEM', '', 'Chemin des Chèvres 10', '1292', 'Chambésy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (456, 'CLEMENT', 0, 'CLEMENT', 'CLEMENT', 'Ginette', 'Rue du Vélodrome 92', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (457, 'CLOT_Col', 0, 'CLOT', 'CLOT', 'Alain', 'Route de Choulex 5', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (458, 'COCCA', 0, 'COCCA', 'COCCA', 'Ida', 'Rue Liotard 56', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (459, 'COET', 0, 'COET', 'COET', 'Pierre', 'Route de Loëx 15D', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (460, 'Col_AKKAYAN', 0, 'AKKAYAN', 'AKKAYAN', 'Rita', 'Place des Augustins 11', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (461, 'Col_AMSLER', 0, 'AMSLER', 'AMSLER', 'Pierre', 'Chemin du Clos-des-Buclines 8', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (462, 'BARBEY_Col', 0, 'BARBEY', 'BARBEY', 'René', 'Route du Déluge 2128', '74250', 'Viuz En Sallaz', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (463, 'Col_BARBIER', 0, 'BARBIER-SCHMID', 'BARBIER-SCHMID', 'Marie', 'Route de Soral 301', '1286', 'Soral', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (464, 'BARBIERI_Col', 0, 'BARBIERI', 'BARBIERI', 'Monique', 'Avenue Calas 7', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (465, 'Col_BAUMANN', 0, 'BAUMANN', 'BAUMANN', 'Andrée', 'Chemin du Notaire 5', '1245', 'Collonge-Bellerive', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (466, 'Col_BENBOW', 0, 'BENBOW', 'BENBOW', 'Keir', 'Avenue Pierre Odier 32', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (467, 'BINGGELI_Col', 0, 'BINGGELI RIME', 'BINGGELI RIME', 'Jacqueline', 'Avenue Adrien-Jeandin 25', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (468, 'BORDIER_Col', 0, 'BORDIER', 'BORDIER', 'Claire', 'Chemin Rieu 6', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (469, 'Col_BORGEL', 0, 'BORGEL', 'BORGEL', 'Anne', 'Avenue Eugène-Pittard 15', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (470, 'Col_BOSSARD', 0, 'BOSSARD', 'BOSSARD', 'Yann', 'Chemin de la Milice 42', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (471, 'BOUVARD_Col', 0, 'BOUVARD TRENY', 'BOUVARD TRENY', 'Christiane', 'Route de Loëx 2', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (472, 'BRUPPACHER_Col', 0, 'BRUPPACHER', 'BRUPPACHER', 'Martine', 'Route de Ferney 161 c', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (473, 'Col_BUEHLER', 0, 'BUEHLER', 'BUEHLER', 'Louise', 'Place de l Etrier 4', '1224', 'Chênes-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (474, 'BURKHALTER_Col', 0, 'BURKHALTER', 'BURKHALTER', 'Francine', 'Chemin de Maisonneuve 12a', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (475, 'COLLET_Col', 0, 'COLLET', 'COLLET', 'France', 'Chemin Colladon 5', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (476, 'COLLOMBAT_Col', 0, 'COLLOMBAT', 'COLLOMBAT', 'Gérard', 'Rue du Village 72b', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (477, 'Col_COMBER', 0, 'COMBER', 'COMBER', 'Thomas', 'Rue de la Muse 9', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (478, 'COMMISSO_Col', 0, 'COMMISSO PIANEZZO', 'COMMISSO PIANEZZO', 'Olinda', 'Route de Chatillon 1', '1295', 'Mies', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (479, 'CONCA_Col', 0, 'CONCA KNAPPS', 'CONCA KNAPPS', 'Geneviève', 'Boulevard d\'Yvoy 13', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (480, 'CORETH_Col', 0, 'CORETH', 'CORETH', 'Julia', 'Rue de la Fourchy 9', '1908', 'Riddes', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (481, 'COTTIER_Col', 0, 'COTTIER', 'COTTIER', 'Vera', 'Route de la Guérite 2', '1753', 'Matran', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (482, 'Col_CRISPINI', 0, 'CRISPINI', 'CRISPINI', 'Georges', 'Rue Jean-Antoine Gautier 16', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (483, 'DE_PACHTERE_Col', 0, 'DE-PACHTERE', 'DE-PACHTERE', 'Patrick', 'En Vuichime', '1148', 'Cuarnens', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (484, 'Col_DELOR', 0, 'DELOR-QUAGLIA', 'DELOR-QUAGLIA', 'Anne-Marie', 'Rue Antoine-Carteret 12', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (485, 'Col_DESBAILLET', 0, 'DESBAILLET-FORESTIER', 'DESBAILLET-FORESTIER', 'Claire-Lise', 'Chemin Colladon 5-7', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (486, 'Col_DESHAYER', 0, 'DESHAYER', 'DESHAYER', 'Jacques', 'Chemin Lullin 32', '1256', 'Troinex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (487, 'DEUKMEDJIAN_Col', 0, 'DEUKMEDJIAN', 'DEUKMEDJIAN', 'Marlise', 'Avenue Krieg 15', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (488, 'DEVILLE_Col', 0, 'DEVILLE-BOHME', 'DEVILLE-BOHME', 'Ingrid', 'Rue Lamartine 26', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (489, 'DICKINSON_Col', 0, 'DICKINSON', 'DICKINSON', 'Keith', 'Chemin des Palettes 27', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (490, 'DOMINGOS_Col', 0, 'DOMINGOS', 'DOMINGOS', 'Maria Horta', 'Chemin des Semailles 40', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (491, 'DUBOIS_Col', 0, 'DUBOIS-DIT-BONCLAUDE', 'DUBOIS-DIT-BONCLAUDE', 'Marcelle', 'Chemin du Champ-d\'Anier 8', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (492, 'EHRETSMANN_Col', 0, 'EHRETSMANN', 'EHRETSMANN', 'Jacque', 'Chemin Eugène-Charlet 8', '1228', 'Plan-Les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (493, 'Col_ETIENNE', 0, 'ETIENNE', 'ETIENNE', 'Gilbert', 'Chemin de Grange-Bonnet 10', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (494, 'Col_FERLONI', 0, 'FERLONI', 'FERLONI', 'Enrika', 'Grand-Bay 16', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (495, 'Col_FISCHER', 0, 'FISCHER', 'FISCHER', 'André', 'Place de la Taconnerie 5', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (496, 'Col_FOGGIN', 0, 'FOGGIN', 'FOGGIN', 'Lucy', 'Route des Fayards 2262', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (497, 'Col_FORSTER', 0, 'FORSTER BONHOTE', 'FORSTER BONHOTE', 'Catherine', 'Rue de Saint-Jean 28A', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (498, 'Col_FURRER', 0, 'FURRER-WUTHRICH', 'FURRER-WUTHRICH', 'Janine', 'Rue Dancet 31', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (499, 'Col_GELY', 0, 'GELY', 'GELY', 'Armand', 'Rue de Pestalozzi 5', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (500, 'GERMOND_Col', 0, 'GERMOND', 'GERMOND', 'Monique', 'Chemin de Saule 102', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (501, 'GERSTEL_Col', 0, 'GERSTEL', 'GERSTEL', 'Véronique', 'Chemin du Pont 18', '1246', 'Coriser', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (502, 'Col_GIRARD', 0, 'GIRARD', 'GIRARD', 'Claudine', 'Route de Malagnou 24', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (503, 'GOBELI_Col', 0, 'GOBELI', 'GOBELI', 'Jean', 'Avenue de Crozet 56', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (504, 'Col_GONZALEZ', 0, 'GONZALEZ', 'GONZALEZ', 'Luzdivina', 'Chemin des Vignes 25', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (505, 'Col_GREUTER', 0, 'GRAUTER', 'GRAUTER', 'Rodolf', 'Chemin Antoine-Pasteur 6a', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (506, 'HABEL_Col', 0, 'HABEL', 'HABEL', 'Charles', 'Impasse de la Charniaz 220', '74380', 'Cranves-Sales', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (507, 'HAEMMERLI_Col', 0, 'HAEMMERLI ESTEVES', 'HAEMMERLI ESTEVES', 'Bénédicte', 'Chemin De Daru 3', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (508, 'HANCHOZ_Col', 0, 'HANCHOZ-GALLEY', 'HANCHOZ-GALLEY', 'Maria', 'Passage de Saint-François 2', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (509, 'HARDMEIER_Col', 0, 'HARDMEIER', 'HARDMEIER', 'Alice', 'Rue Micheli-du-Crest 2', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (510, 'HAUSENSTEIN_Col', 0, 'HAUSENSTEIN', 'HAUSENSTEIN', 'Anne-Marie', 'Chemin du Trèfle-Blanc 14', '1228', 'Chemin du Trèfle-Blanc 14', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (511, 'HONEGGER_Col', 0, 'HONEGGER', 'HONEGGER', 'Alain', 'Chemin de Conches 31', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (512, 'HOWALD_Col', 0, 'HOWALD', 'HOWALD', 'Renée', 'Rue de la Croix-du-Levant 9', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (513, 'HUG_MarieRose_Col', 0, 'HUG', 'HUG', 'Marie-Rose', 'Chemin de la Pommeraie 9', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (514, 'INGRASSIA_Col', 0, 'INGRASSIA CASTRO', 'INGRASSIA CASTRO', 'Evangelina', 'Rue du Vieux-Moulin 10', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (515, 'Col_KAPANCI', 0, 'KAPANCI', 'KAPANCI', 'Yusuf', 'Route de Veyrier 85', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (516, 'KELLER_Sandra_Col', 0, 'KELLER', 'KELLER', 'Sandra', 'Chemin Charles Georg 24', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (517, 'KIBBEL_Col', 0, 'KIBBEL', 'KIBBEL', 'Sabine', 'Chemin Saladin 7b', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (518, 'KISTLER_Col', 0, 'KISTLER', 'KISTLER', 'Eric', 'Place de Frontenex 9c', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (519, 'KONIG_Col', 0, 'KONIG', 'KONIG', 'Denise', 'Chemin du Champ-d\'Anier 22', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (520, 'KOSTENBAUM_Col', 0, 'KOSTENBAUM', 'KOSTENBAUM', 'Mannia', 'Chemin d\'Orgobet 9', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (521, 'KUENZER_Col', 0, 'KUENZER WENGER', 'KUENZER WENGER', 'Josette', 'Rue de Bernex 359', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (522, 'KUPFERSCHMID_Col', 0, 'KUPFERSCHMID', 'KUPFERSCHMID', 'André', 'Place de l\'Octroi 3', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (523, 'Col_LENPERNESSE', 0, 'LENPERNESSE', 'LENPERNESSE', 'Claudine', 'Avenue Henri Golay 12D', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (524, 'MANDOFIA_Col', 0, 'MANDOFIA', 'MANDOFIA', 'Veronica', 'Rue  De-Candolle 36', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (525, 'MARZI_Col', 0, 'MARZI', 'MARZI', 'Mario', 'Cité Vieusseux 7', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (526, 'MATAS_Col', 0, 'MATAS', 'MATAS', 'Loa', 'Rue de Carouge 38', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (527, 'Col_MATHIEU', 0, 'MATHIEU', 'MATHIEU', 'Jean', 'Chemin du Pré-du-Couvent 1', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (528, 'MONNET_Col', 0, 'MONNET', 'MONNET', 'Francis', 'Route d\'Aïre-la-Ville 224', '1242', 'Satigny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (529, 'Col_MONTI', 0, 'MONTI-MARCHAND', 'MONTI-MARCHAND', 'Denise', 'Rue Jacque-Grosselin 7', '1227', 'Caouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (530, 'MORGENTHALER_Col', 0, 'MORGENTHALER', 'MORGENTHALER', 'Corinne', 'Avenue du Petit-Senn 28', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (531, 'MORIER_Col', 0, 'MORIER', 'MORIER', 'Guiditta Lucia', 'Route de Florissant 3', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (532, 'NEF_Col', 0, 'NEF', 'NEF', 'Gisèle', 'Avenue de Crozet 42', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (533, 'NIKLAN_Col', 0, 'NIKLAN', 'NIKLAN', 'Alexandre', 'Chemin du Nant-D\'Argent 3', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (534, 'OPPLIGUER_Col', 0, 'OPPLIGUER-SPICHER', 'OPPLIGUER-SPICHER', 'Georgette', 'Chemin des Mésanges 5', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (535, 'Col_OTT', 0, 'OTT', 'OTT', 'Margueritte', 'Route de Thonon 107', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (536, 'PACHOUD_Col', 0, 'PACHOUD', 'PACHOUD', 'René', 'Chemin de la Tourelle 10', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (537, 'PALFFY_Col', 0, 'PALFFY', 'PALFFY', 'Christine', 'Chemin de Semailles 13 b', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (538, 'Col_PASCHE', 0, 'PASCHE', 'PASCHE', 'Lisette', 'Avenue des Communes-Réunies 58', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (539, 'PERDICHIZZI_Col', 0, 'PERDICHIZZI', 'PERDICHIZZI', 'Guiseppa', 'Rue du Grand-Bureau 37', '1227', 'Les Acacias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (540, 'PERRNOUD_Col', 0, 'PERRNOUD', 'PERRNOUD', 'Danièle', 'Rue de la Poterie 2', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (541, 'Col_PHILIPPOSSIAN', 0, 'PHILIPPOSSIAN', 'PHILIPPOSSIAN', 'Patricia', 'Route de Saconnex-d\'Arve 271', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (542, 'PIGUET_Col', 0, 'PIGUET', 'PIGUET', 'Alfred', 'Chemin du Devancet 13', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (543, 'Col_PLANTIN', 0, 'PLANTIN', 'PLANTIN', 'Guy', 'Avenue de Beau-Séjour 21', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (544, 'POZHIGAYLO_Col', 0, 'POZHIGAYLO', 'POZHIGAYLO', 'Pavel', '', '', '', 'Russie', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (545, 'RAPPAZ_Col', 0, 'RAPPAZ', 'RAPPAZ', 'Anne', 'Chemin des Courbres 80', '1247', 'Anières', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (546, 'RIESEN_Col', 0, 'RIESEN', 'RIESEN', 'Alain', 'Chemin Frank Thomas 20', '1208', 'Genève', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (547, 'ROSSI_Col', 0, 'ROSSI MOSSIERE', 'ROSSI MOSSIERE', 'Josiane', 'Route du Prieur 29', '1257',
        'La Croix-De-Rozon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (548, 'ROSSILLION_Col', 0, 'ROSSILLION', 'ROSSILLION', 'Claude', 'Route de Meyrin 12B', '1202', 'Genève', 'Suisse',
        '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (549, 'ROULLET_Col', 0, 'ROULLET', 'ROULLET', 'Odile', 'Rue du Rhône 57', '1204', 'Genève', 'Suisse', '0.00', '', '',
   'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', '');
INSERT INTO `transport_clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_depart`, `default_arrivee`, `default_transport_type`, `liste_rank`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (550, 'RUPP_Col', 0, 'RUPP BISCHOF', 'RUPP BISCHOF', 'Marie-Thérèse', 'Rue Lamartine 8', '1203', 'Genève', 'Suisse',
        '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (551, 'Col_SAVARIOUD', 0, 'SAVARIOUD-BARI', 'SAVARIOUD-BARI', 'Bernadette', 'Avenue Blanc 8', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (552, 'SAVOLDELLI_Col', 0, 'SAVOLDELLI', 'SAVOLDELLI', 'Vincenzina', 'Avenue Pictet-de-Rechemont 2', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (553, 'Col_SAVOLDELLI_BAJAJ', 0, 'SAVOLDELLI BAJAJ', 'SAVOLDELLI BAJAJ', 'Monica', 'Route de Jussy 18 A', '1126', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (554, 'Col_SCHIEFERDECKER', 0, 'SCHIEFERDECKER', 'SCHIEFERDECKER', 'Jannine', 'Rue del\'Aubépine 10', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (555, 'Col_SCHMID', 0, 'SCHMID', 'SCHMID', 'Suzy', 'Avenue de Champel 73', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (556, 'Col_SCHMITT', 0, 'SCHMITT', 'SCHMITT', 'Charlotte', 'Chemin du Gué 41', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (557, 'STADLER_Col', 0, 'STADLER', 'STADLER', 'Heide', 'Chemin des Crêts-de-Champel 1', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (558, 'STENGELE_Col', 0, 'STENGELE', 'STENGELE', 'Marco', 'Rue de la Terrasière 7', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (559, 'STOPIN_Col', 0, 'STOPIN', 'STOPIN', 'Christine', 'Chemin de la Chevillarde 42', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (560, 'STUCKLI_Col', 0, 'STUCKLI', 'STUCKLI', 'Claude', 'Chemin de la Greube 8', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (561, 'STUTZ_Col', 0, 'STUTZ-FONTAINE', 'STUTZ-FONTAINE', 'Pierrette', 'Rue Daniel-Gevril 8c', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (562, 'TANFERRI_Col', 0, 'TANFERRI', 'TANFERRI', 'Adèle', 'Rue De-Miléant 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (563, 'Col_TELLENBACH', 0, 'TELLENBACH', 'TELLENBACH', 'Rozelia-Maria', 'Bvd du Pont d\'Arve 7', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (564, 'THEVENAZ_Col', 0, 'THEVENOZ', 'THEVENOZ', 'Lucienne', 'Avenue de Champel 55', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (565, 'TINGUELY_Col', 0, 'TINGUELY-FELLAY', 'TINGUELY-FELLAY', 'Marie', 'Chemin du Champ-d\'Anier 10', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (566, 'TOSCANI_Col', 0, 'TOSCANI', 'TOSCANI', 'Candida', 'Avenue Trembley 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (567, 'VOSHCHININA_Col', 0, 'VOSHCHININA', 'VOSHCHININA', 'Nina', 'Rue Maurice-Braillard 22', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (568, 'WAGNER_Col', 0, 'WAGNER', 'WAGNER', 'Eliane', 'Avenue des Frênes 1', '1256', 'Troinex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (569, 'COLLE', 0, 'COLLE', 'COLLE', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (570, 'COLLET', 0, 'COLLET', 'COLLET', 'Alice', 'Avenue d\'Aïre 89', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (571, 'COLLIARD', 0, 'COLLIARD', 'COLLIARD', 'Emile', 'Rue des Vaudres 11', '1815', 'Clarens', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (572, 'COLLOMBIN', 0, 'COLLOMBIN', 'COLLOMBIN', 'Andre-Marcel', 'Grand-Montfleury 50', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (573, 'COLLOUD', 0, 'COLLOUD', 'COLLOUD', 'Emilie Suzanne', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (574, 'COMBA', 0, 'COMBA', 'COMBA', 'Benjamin', 'Avenue Vibert 25', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (575, 'CORBETTA', 0, 'CORBETTA', 'CORBETTA', 'Maria-Anna', 'Avenue du Lignon 60', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (576, 'CORNILLON', 0, 'CORNILLON', 'CORNILLON', 'Elena', 'Route de Florissant 16', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (577, 'CORNUZ', 0, 'CORNUZ', 'CORNUZ', 'Madeleine', '75 Rue de Liotard', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (578, 'COSTELLO', 0, 'COSTELLO', 'COSTELLO', 'Michael', 'Route de Colovrex 57', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (579, 'COTAND', 0, 'COTAND', 'COTAND', 'Gilbert', 'Avenue De-Budé 8', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (580, 'COTTE', 0, 'COTTE', 'COTTE', 'Marie', 'Rue de Lyon 65 bis', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (581, 'COTTIER', 0, 'COTTIER', 'COTTIER', 'Hélène', 'Rue Voltaire 14', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (582, 'COURT_Col', 0, 'COURT', 'COURT', 'Arlette', 'Chemin de Tressy-Cordy 6', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (583, 'COURVOISIER', 0, 'COURVOISIER', 'COURVOISIER', 'François', 'Chemin des Roses 6', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, 'Code 6080', '0000-00-00', '0000-00-00 00:00:00', ''),
  (584, 'COVO_Col', 0, 'COVO', 'COVO', 'Jacques', 'Chemin de l\'Escalade 7', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (585, 'CRAMATTE', 0, 'CRAMATTE', 'CRAMATTE', 'Georges', 'Route d\'Annecy 229', '1257', 'La-Croix-de-Rozon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (586, 'CRECHARD', 0, 'CRECHARD', 'CRECHARD', 'Jeanne', 'Avenue des Morgines 39', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (587, 'CRETTAZ_Col', 0, 'CRETTAZ', 'CRETTAZ', 'Jean', 'Rue de l\'Eveché 5', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (588, 'CROCHET', 0, 'CROCHET', 'CROCHET', 'Louis', 'Rue des Allobroges 21', '1227', 'Les Acacias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (589, 'CROISIER_Col', 0, 'CROISIER', 'CROISIER', 'Daniel', 'Route de Mon-Idée 65', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (590, 'CROUZET', 0, 'CROUZET', 'CROUZET', 'Anne-Lise', 'Chemin De-Vincy 3', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (591, 'CRUSI', 0, 'CRUZI', 'CRUZI', 'Nunzio', 'Avenue du Gros-Chêne 25', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (592, 'CUNNINGHAM_Col', 0, 'CUNNINGHAM', 'CUNNINGHAM', 'Joyce', 'Rue de Lyon 59', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (593, 'CUPELLO_Col', 0, 'CUPELLO', 'CUPELLO', 'Jeanine', 'Chemin des Clochettes 19', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (594, 'CURETTI', 0, 'CURETTI', 'CURETTI', 'Glauco', 'Chemin Haccius 15', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (595, 'CUTTAT', 0, 'CUTTAT', 'CUTTAT', 'Suzanne', 'Avenue du Jura 44', '01210', 'Ferney-Voltaire', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (596, 'CUVIT_Col', 0, 'CUVIT', 'CUVIT', 'Denis', 'Route de Frontenex 37', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (597, 'DA_RIVA', 0, 'DA RIVA', 'DA RIVA', 'Rino', 'Chemin de la Fontaine 24 b', '1292', 'Chambésy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (598, 'DA_ROS', 0, 'DA ROS', 'DA ROS', 'Amalia', 'Avenue des Verchères 19', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (599, 'DAFGHANISTAN_Col', 0, 'D\'AFGHANISTAN', 'D\'AFGHANISTAN', 'Ehsan', 'Rue Michel-Servet 18', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (600, 'DALLAL', 0, 'DALLAL', 'DALLAL', 'Rose', 'Chemin Chabrey 15', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (601, 'DAMBRUYN', 0, 'DAMBRUYN', 'DAMBRUYN', 'Lucien', 'Avenue du Devin-du-Village 10', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (602, 'DAROCHA', 0, 'DA ROCHA', 'DA ROCHA', '', 'Chemin des Pugins 330', '01280', 'Prévessin-Moëns', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (603, 'DAUM', 0, 'DAUM', 'DAUM', 'Cornelis', 'Route de Saint-Georges 51', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (604, 'DAVID_Denise', 0, 'DAVID', 'DAVID', 'Denise', 'Rue du Clos-du-Bief 65', '01170', 'Thoiry', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (605, 'DE LEITO', 0, 'DE LEITO', 'DE LEITO', 'Edouard', 'Rue Merle-d\'Aubigne 10', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (606, 'DE POLO', 0, 'DE POLO', 'DE POLO', 'Genevève', 'CP 106', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (607, 'DE RIZ', 0, 'DE RIZ', 'DE RIZ', 'Anna-Maria', 'Rue de Dauphine 16', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (608, 'De_BERNARDINI', 0, 'DE BERNADINI', 'DE BERNADINI', 'Cécile', 'Chemin du Fief-de-Chapitre 6', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (609, 'DE_CORTEN', 0, 'DE_CORTEN', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (610, 'DE_COURTEN', 0, 'DE COURTEN', 'DE COURTEN', 'Marie-José', 'Chemin Champ-Claude 1A', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (611, 'DE_MARCHI', 0, 'DE MARCHI', 'DE MARCHI', 'Michelle', 'Chemin du Village-de-Perly 20', '1258', 'Perly', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (612, 'DE_MARCO_Col', 0, 'DE MARCO', 'DE MARCO', 'Marthe', 'Chemin du Pont-Noir 13', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (613, 'DE_MENDOCA', 0, 'DE MENDOCA', 'DE MENDOCA', 'Frieda', 'Rue du 31 décembre 38', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (614, 'DE_MORPUGO', 0, 'DE MORPUGO', 'DE MORPUGO', 'Renée', 'Chemin de la Dode 6', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (615, 'DE_SZADAY', 0, 'DE SZADAY', 'DE SZADAY', 'Anne', 'chemin de Beau-Soleil 7\n chemin de Beau-Soleil 7\n ', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (616, 'DE_VRIES', 0, 'DE VRIES - ROTELLI', 'DE VRIES - ROTELLI', '', 'Route Suisse', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (617, 'DEBESAY', 0, 'DEBESAY', 'DEBESAY', 'Milian', 'Centre requérant d\'asile,  Av de Mategnin 54', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (618, 'DEBOURGOGNE', 0, 'DEBOURGOGNE', 'DEBOURGOGNE', 'Chantal', 'Avenue de Montchoisi  29', '1006', 'Lausanne', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (619, 'DELABY', 0, 'DELABY', 'DELABY', 'Odile', 'Boulevard Georges Favon 24', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (620, 'DELAPORTE', 0, 'DELAPORTE', 'DELAPORTE', 'Gilbert', 'Rue Chabrey 13', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (621, 'DELAVAUX', 0, 'DELAVAUX', 'DELAVAUX', 'Albert', 'Avenue des Communes-Réunis 88', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (622, 'DELAVY', 0, 'DELAVY', 'DELAVY', 'Roger', 'Chemin des Troenes 6', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (623, 'DELEZE', 0, 'DELÈZE', 'DELÈZE', 'Annw-Marie', 'Avenue Frédéric-Soret 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (624, 'DELEZE_Berthe', 0, 'DELÈZE', 'DELÈZE', 'Berthe', 'Rte d\'Aïre-La-Ville 219', '1242', 'Satigny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (625, 'DELLABIANCA', 0, 'DELLABIANCA', 'DELLABIANCA', 'Maria', 'Avenue d\'Aïre 46', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (626, 'DENOREAZ', 0, 'DENOREAZ', 'DENOREAZ', 'Michel', 'Grand-Montfleury 18', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (627, 'DENOYEL', 0, 'DENOYEL', 'DENOYEL', 'Paul', 'Praz-Simon 8', '1807', 'Blonay', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (628, 'DEROBERT_Col', 0, 'DEROBERT', 'DEROBERT', 'Margueritte', 'Rue Michel Chauvet 2', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (629, 'DESBIOLLES_Col', 0, 'DESBIOLLES', 'DESBIOLLES', 'Theresia', 'Chemin de Trémoulin 10', '1252', 'Meinier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (630, 'DESCLOUX', 0, 'DESCLOUX', 'DESCLOUX', 'Marcelle', 'Avenue des Communes-Réunies 52', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (631, 'DESFAYES', 0, 'DESFAYES', 'DESFAYES', 'Fabien', 'Rue des Vollandes 7', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (632, 'DESMEULES', 0, 'DESMEULES', 'DESMEULES', 'Rose-Marie', 'Chemin des Palettes 11', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (633, 'DESPOND', 0, 'DESPOND', 'DESPOND', 'Christiane', 'Rue des Lattes 9', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (634, 'DEVAUD', 0, 'DEVAUD', 'DEVAUD', 'Monique', 'Rue de la Prulay 32', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (635, 'DEVELEY_Col', 0, 'DEVELEY', 'DEVELEY', 'Jaqueline', 'Avenue des Morgines 29', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (636, 'DI_DIO', 0, 'DI DIO', 'DI DIO', 'Antonia', 'Route de Saint-Jean 46', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (637, 'DI_MARTI', 0, 'DI MARTI', 'DI MARTI', 'Marina', 'Rue des noirettes 25', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (638, 'DI_SALVATORE', 0, 'DI SALVATORE', 'DI SALVATORE', 'Carmela', 'Chemin de la Caroline 22', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (639, 'DIVORNE', 0, 'DIVORNE', 'DIVORNE', 'Rosemary', 'Avenue de Miremont 33', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (640, 'DOLDER_CHESSEX', 0, 'DOLDER-CHESSEX', 'DOLDER-CHESSEX', 'Denise', 'Chemin des Tulipiers 13', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (641, 'DOMINICE_Col', 0, 'DOMINICE', 'DOMINICE', 'Clemonde', 'Route de Lausanne 348', '1293', 'Bellevue', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (642, 'DOMON', 0, 'DOMON', 'DOMON', 'Charles', 'Rue Colladon 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (643, 'DOUGOUD', 0, 'DOUGOUD', 'DOUGOUD', 'Renée', 'Chemin du Foron 5', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (644, 'DRECHSLER', 0, 'DRECHSLER', 'DRECHSLER', 'Yolande', 'Rue de l\'Athénée 38', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (645, 'DROZE', 0, 'DROZE', 'DROZE', 'Hélène', 'Route des Acasias 28', '1227', 'Les Acasias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (646, 'DUBAS_Bernard_Col', 0, 'DUBAS', 'DUBAS', 'Bernard', 'Chemin des Bougeries 15A', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (647, 'DUBAS_Mme_Col', 0, 'DUBAS', 'DUBAS', 'Marie-Thérèse', 'Chemin des Bougeries 15A', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (648, 'DUBOIS_G', 0, 'DUBOIS', 'DUBOIS', 'Germaine', 'Rue Gilbert 44', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (649, 'DUBOIS_Jura', 0, 'DUBOIS', 'DUBOIS', 'Marcelle', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (650, 'DUBOUCHET_COL', 0, 'DUBOUCHET', 'DUBOUCHET', 'Danielle', 'Route de Rougemont 71', '1286', 'Soral', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (651, 'DUC', 0, 'DUC', 'DUC', 'Gabriel', 'Rue du Grand-Bay 7', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (652, 'DUCRET_Col', 0, 'DUCRET', 'DUCRET', 'Marlise', 'Avenue Krieg 30', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (653, 'DUFOURNET', 0, 'DUFOURNET', 'DUFOURNET', 'Madelaine', 'Route d\'Athenaz 6', '1285', 'Athenaz - Avusy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (654, 'DUNAND', 0, 'DUNAND', 'DUNAND', 'Emilie', 'Chemin des Princes 3', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (655, 'DUPERREX_Mme', 0, 'DUPERREX', 'DUPERREX', 'Zlata', 'Rue de Monbrillant 61', '1202', 'Genève', 'Suisse', '40.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (656, 'DUPONT_Col', 0, 'DUPONT', 'DUPONT', 'Anna-Maria', 'Rue des Pervenches 7', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (657, 'DUQUENOY', 0, 'DUQUENOY', 'DUQUENOY', 'Michel', 'Clos des Vignes 6', '01630', 'Saint-Genis-Poully', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (658, 'DURAND', 0, 'DURAND', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (659, 'DUSONCHET', 0, 'DUSONCHET', 'DUSONCHET', 'Monique', 'Chemin Ami-Argand 70', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (660, 'DUTSCH', 0, 'DUTSCH', 'DUTSCH', 'Suzy', 'Rue du Grand-Pré 16', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (661, 'EBERLIN', 0, 'EBERLIN', 'EBERLIN', 'Georges', 'Avenue de Mategnin 103 A', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (662, 'ECOFFEY_Col', 0, 'ECOFFEY', 'ECOFFEY', 'Michel', 'Chemin de la Mousse 45', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (663, 'EGGER', 0, 'EGGER', 'EGGER', 'Viviane', 'Chemin Ami-Argand 68', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (664, 'EGGER_Irma', 0, 'EGGER', 'EGGER', 'Irma', 'Chemin des Coudriers 50', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (665, 'EICHENBERGER', 0, 'EICHENBERGER', 'EICHENBERGER', 'Paulette', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (666, 'EL_NAGGAR', 0, 'ELNAGGAR', 'ELNAGGAR', 'Gerd', 'Chemin de la Planche-Brûlée 24', '01120', 'Ferney-Voltaire', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (667, 'ELBINDARI', 0, 'ELBINDARI', 'ELBINDARI', 'Samiha', 'C/O Salaledi Chemin du Tamit 5 Bât B', '06160', 'Juan-Les-Pins', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (668, 'ELEAUME', 0, 'ELEAUME', 'ELEAUME', 'Thérèse', 'Avenue du Comte Géraud 7', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (669, 'ELIA', 0, 'ELIA', 'ELIA', 'Ippazia', 'Avenue de Champel 63', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (670, 'EMS_LES_TILLEULS', 0, 'service', 'service', 'comptable', 'Rue Moillebeau 1', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (671, 'ENGELS_Col', 0, 'ENGELS', 'ENGELS', 'Johanna', 'Quai di Cheval-Blanc 16', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (672, 'ETIENNE', 0, 'ETIENNE', 'ETIENNE', 'Nouhreza', 'Rue des Lattes 45', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (673, 'FAAS', 0, 'FAAS', 'FAAS', 'Maya', 'Carrefour de  Rive 2', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (674, 'FABBRI', 0, 'FABBRI', 'FABBRI', 'Fernanda', 'Route de Saint-Julien 71', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (675, 'FAGUE_Col', 0, 'FAGUE', 'FAGUE', 'Jean', 'Chemin Faguillon 5', '1223', 'COLOGNY', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (676, 'FALCIOLA', 0, 'FALCIOLA', 'FALCIOLA', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (677, 'FALQUET', 0, 'FALQUET', 'FALQUET', 'Bernadette', 'Cité du Lignon 54', '1219', 'Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (678, 'FARTACH_Mr', 0, 'FARTACH', 'FARTACH', 'Manoutchehr', 'Chemin de la Tourelle 16', '1209', 'Genève', 'Suisse', '40.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (679, 'FASEL', 0, 'FASEL', 'FASEL', 'Marthe', 'Chemin du Gué 69', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (680, 'FAVARGER', 0, 'FAVARGER', 'FAVARGER', 'Charles', 'Avenue de Champel 61', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (681, 'FAVRE_ANDRE', 0, 'FAVRE', 'FAVRE', 'André', 'Rue du Stand 3', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (682, 'FAVRE_Louis_Col', 0, 'FAVRE', 'FAVRE', 'Louis', 'Rue de Bernex 268', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (683, 'FAYOLLE_Col', 0, 'FAYOLLE', 'FAYOLLE', 'Pierre', 'Chemin de Mancy 26', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (684, 'FEHLMANN', 0, 'FEHLMANN', 'FEHLMANN', 'Madelaine', 'Chemin des Verjus 14', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (685, 'FELIX', 0, 'FÉLIX', 'FÉLIX', 'Marie-Jeanne', 'Avenue Eugène-Pittard 1', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (686, 'FERNANDEZ-KREIS', 0, 'FERNANDEZ-KREIS', 'FERNANDEZ-KREIS', 'Carmen', 'Route de Malagnou 12', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (687, 'FIGUERAS', 0, 'FIGUERAS', 'FIGUERAS', 'Jaime', 'Rue Cavour 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (688, 'FINTZEL_Col', 0, 'FINTZEL', 'FINTZEL', 'Richard', 'Avenue du Devin-du-Village', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (689, 'FISCHER', 0, 'FISCHER', 'FISCHER', 'Andre', 'Chemin des Larderes 10', '1222', 'Vesenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (690, 'FISCHER_Col', 0, 'FISCHER', 'FISCHER', 'Léo', 'Chemin du Champ-d\'Anier 22', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (691, 'FISCHER_Margrit', 0, 'FISHER', 'FISHER', 'Margrit', 'Rue des Délices 4', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (692, 'FIVAZ', 0, 'FIVAZ', 'FIVAZ', 'Alfred', 'Route de Loëx 37', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (693, 'FLAHAULT_M', 0, 'FLAHAULT', 'FLAHAULT', 'Daniel', 'Rue de Genève 94', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (694, 'FLAMENT', 0, 'FLAMENT', 'FLAMENT', 'Ivon', 'Chemin de la Boisserette 11', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (695, 'FLEURY_Col', 0, 'FLEURY', 'FLEURY', 'Jacques', 'Rue de Hesse 12', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (696, 'FLUCKIGER', 0, 'FLUCKIGER', 'FLUCKIGER', 'Hans', 'Rue Soubeyran 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (697, 'FONTAINE', 0, 'FONTAINE', 'FONTAINE', 'Valesia', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (698, 'FONTAINE_G', 0, 'FONTAINE', 'FONTAINE', 'Georges', 'Rue de Montchoisy 17', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (699, 'FOULOPP', 0, 'FOULOPP', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (700, 'FOURNIER_Col', 0, 'FOURNIER', 'FOURNIER', 'Suzanne', 'Route du Camp 63', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (701, 'FRANK', 0, 'FRANK', 'FRANK', 'Imelda', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (702, 'FREIERMUTH', 0, 'FREIERMUTH', 'FREIERMUTH', 'Viviane', 'Rue Jean Violette 23', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (703, 'FRESCO', 0, 'FRESCO', 'FRESCO', 'Antoula', 'Chemin des Palettes 39', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (704, 'FRETAY_Col', 0, 'FRETEY', 'FRETEY', 'Odette', 'Route de Florissant 72', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (705, 'FRIAUT_Col', 0, 'FRIAUT', 'FRIAUT', 'Yves', 'Chemin de la Retuelle 11', '1252', 'Meinier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (706, 'FRIES', 0, 'FRIES', 'FRIES', 'Marcel', 'Rue de la Prulay 51', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (707, 'FRY', 0, 'FRY', 'FRY', 'Simone', 'Chemin des Crêts-de-Champel 38', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (708, 'GAMBA', 0, 'GAMBA', 'GAMBA', 'Linda', 'Chemin de Carabot 37b', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (709, 'GARCIA_Alb', 0, 'GARCIA', 'GARCIA', 'Albertine', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (710, 'GARDET', 0, 'GARDET', 'GARDET', 'Paul', 'Rue du Grand-Pre 16', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (711, 'GARIN_Col', 0, 'GARIN', 'GARIN', 'René', 'Chemin Mouille-Galland 9C', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (712, 'GATTI', 0, 'GATTI', 'GATTI', 'Maria', 'Avenue Bois-de-la-Chapelle 67', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (713, 'GATTO', 0, 'GATTO', 'GATTO', 'Raffaele', 'Rue des Bugnons 14', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (714, 'GENCY_Col', 0, 'GENCY TONGWAH', 'GENCY TONGWAH', 'Valentina', 'Rue de Genève 107', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (715, 'GENIN', 0, 'GENIN', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (716, 'GENOUD', 0, 'GENOUD', 'GENOUD', 'Thérèse', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (717, 'GENOUX', 0, 'GENOUX', 'GENOUX', 'Marcelle', 'Rue du Tir 4', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (718, 'GENTINETTA', 0, 'GENTINETTA', 'GENTINETTA', 'Felicitas', 'Rue Emile-Yung 6', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (719, 'GERMANN', 0, 'GERMANE', 'GERMANE', 'Ruth', 'Boulevard des Promenades 4', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (720, 'GHADJAR_Col', 0, 'GHADJAR DOWLATCHAHI', 'GHADJAR DOWLATCHAHI', 'Siavoche', 'Route du Bout-du-Monde 19', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (721, 'GHEBREZGHI_Col', 0, 'GHEBREZGHI', 'GHEBREZGHI', 'Biniam', 'Chemin des Deux-Communes 29', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (722, 'GHERARDELLI_Col', 0, 'GHERARDELLI', 'GHERARDELLI', 'Anne-Marie', 'Rue de la Gabelle 24', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (723, 'GIEGER', 0, 'GIEGER', 'GIEGER', 'Jean', 'Avenue des Libellules 8', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (724, 'GILABERT', 0, 'GILABERT', 'GILABERT', 'Maria-Cinta', 'Rue Liotard 45', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (725, 'GIRARD', 0, 'GIRARD', 'GIRARD', 'Jeanne', 'Avenue Henri Golay 12 E', '1219', 'Genève', 'CHATELAINE', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (726, 'GIROD_Col', 0, 'GIROD', 'GIROD', 'Gisèle', 'Parc du Château-Banquet 14', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (727, 'GISSELBAEK', 0, 'GISSELBAEK', 'GISSELBAEK', 'Rita', 'Rue de Vermont 26', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (728, 'GLAUS_Col', 0, 'GLAUS', 'GLAUS', 'André', 'Chemin Sur-Rang 8 A', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (729, 'GLAUSER', 0, 'GLAUSER', 'GLAUSER', 'Suzanne', 'Avenue de Crozet 46', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (730, 'GOBELI', 0, 'GOBELI', 'GOBELI', 'Jean', 'Avenue de Crozet 56', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (731, 'GOEBEL', 0, 'GOEBEL', 'GOEBEL', 'Elfriede', 'Chemin du Crêts-de-Champel', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (732, 'GOETSCHMANN', 0, 'GOETSCHMANN', 'GOETSCHMANN', 'Marie', 'Rue du Loup 6', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (733, 'GOLAY', 0, 'GOLAY', 'GOLAY', 'Madelaine', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (734, 'GOLAY_BB', 0, 'GOLAY', 'GOLAY', 'Rita', 'Route de la Scie 14', '1271', 'Givrins', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (735, 'GOLCHAN', 0, 'GOLCHAN', 'GOLCHAN', 'Rosa', 'Avenue de Champel 28', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (736, 'GOLLUT_Col', 0, 'GOLLUT REY', 'GOLLUT REY', 'Chreistianne', 'Chemin Adolphe Pasteur 27', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (737, 'GONIN', 0, 'GONIN', 'GONIN', 'Nicole', 'Chemin François-Lehmann 14', '1218', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (738, 'GOOD_Col', 0, 'GOOD', 'GOOD', 'Bernard', 'Chemin de l\'Esplanade 26', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (739, 'GOUANOU_Col', 0, 'GOUANOU', 'GOUANOU', 'Thérèse', 'Avenue de Châtelaine 67', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (740, 'GOVANOU_Col', 0, 'GOVANOU', 'GOVANOU', 'Thérèse', 'Avenue de Châtelaine 67', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (741, 'GRAEZER', 0, 'GRAEZER', 'GRAEZER', 'Hubert', 'Chemin de la Belle Cour 93', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (742, 'GRAF_Col', 0, 'GRAF', 'GRAF', 'Monique', 'Avenue du Mail 20', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (743, 'GRAHAM_Col', 0, 'GRAHAM', 'GRAHAM', 'Dorothea', 'Rue de Genève 71', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (744, 'GREENWOOD', 0, 'GREENWOOD', 'GREENWOOD', 'Tanya', 'Chemin de la Pralay 41', '1294', 'Genthod', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (745, 'GREGORIADES', 0, 'GREGORIADES', 'GREGORIADES', 'Dimitra', 'Chemin des Crêts de Champel 7', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (746, 'GREMAUD', 0, 'GREMAUD', 'GREMAUD', 'Gustave', 'Avenue des Morgines 38', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (747, 'GREMION', 0, 'GREMION', 'GREMION', 'Roland', 'Rue Nestlé 8', '1636', 'Broc', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (748, 'GRIN_BB', 0, 'GRIN', 'GRIN', 'Augusta', 'Route e Divonne 45', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (749, 'GRIOT', 0, 'GRIOT', 'GRIOT', 'Lucie', 'Avenue de Crozet 56', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (750, 'GRISCOM_Col', 0, 'GRISCOM', 'GRISCOM', 'Gertrud', 'Chemin de la montagne 134', '1124', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (751, 'GROENENDIJK', 0, 'GROENENDIJK', 'GROENENDIJK', 'Gunnel', 'Chemin Villa Rose 1', '1291', 'Commugny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (752, 'GROLLIER', 0, 'GROLLIER', 'GROLLIER', 'Danielle', 'Chemin Taverney 14', '1218', 'Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (753, 'GRONSTEIN', 0, 'GRONSTEIN', 'GRONSTEIN', 'Yvette', 'Rue Dancet 22', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (754, 'GROSJEAN', 0, 'GROSJEAN', 'GROSJEAN', 'Linette', 'Route de La-Chapelle 44', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (755, 'GRUNER_Col', 0, 'GRUNER', 'GRUNER', 'Danielle', 'Avenue Bertrand 9', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (756, 'GUELBERT', 0, 'GUELBERT', 'GUELBERT', 'Irène', 'Avenue des Tilleuls 36', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (757, 'GUENDOUZ', 0, 'GUENDOUZ', 'GUENDOUZ', 'Ali', 'Rue Moillebeau 32', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (758, 'GUENIN', 0, 'GUENIN', 'GUENIN', 'Bernadette', 'Avenue d\' Aire 89', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (759, 'GUEX', 0, 'GUEX', 'GUEX', 'André', 'Chemin des Baules 4', '1268', 'Begnins', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (760, 'GUGGENHEIM', 0, 'GUGGENHEIM', 'GUGGENHEIM', 'Paul', 'Avenue Peschier 24', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (761, 'GUGGER_Col', 0, 'GUGGER', 'GUGGER', 'Christine', 'Rue des Délices 14', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (762, 'GUILLE', 0, 'GUILLE', 'GUILLE', 'Augustin', 'Rue de Vermont 42', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (763, 'GUINE', 0, 'GUINÉ', 'GUINÉ', 'Christiane', 'Rue des Bugnons 12', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (764, 'GUIRAUD', 0, 'GUIRAUD', 'GUIRAUD', 'Jacqueline', 'Chemin de la Ravoire 148', '01280', 'Prevessin-Moens', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (765, 'GURTLER', 0, 'GURTLER', 'GURTLER', 'Eric', 'Chemin des Falquets 25', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (766, 'GYGAX', 0, 'GYGAX', 'GYGAX', 'Andrée', 'Rue Daubin 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (767, 'HAAG', 0, 'HAAG', 'HAAG', 'Anne-Marie', 'Boulevard de la Tour 6', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (768, 'HAEBERLI', 0, 'HAEBERLI', 'HAEBERLI', 'Heinz', 'Chemin de l Erse 4', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (769, 'HAEGI', 0, 'HAEGI', 'HAEGI', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (770, 'HAENI', 0, 'HAENI', 'HAENI', 'Conrad', 'Route du Centre 162', '1025', 'Saint-Sulpice', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (771, 'HAERMMERLI_Col', 0, 'HAEMMERLI', 'HAEMMERLI', 'Christianne', 'Chemin de Concava 5', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (772, 'HAGGENMULLER_Col', 0, 'HAGGENMULLER', 'HAGGENMULLER', 'Ulrich', 'Route de Sallivaz 4', '1279', 'Chavannes-de-Bogis', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (773, 'HAJJAR', 0, 'HAJJAR', 'HAJJAR', 'Jean', 'Chemin des Rayes 33', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (774, 'HASHAM_Col', 0, 'HASHAM', 'HASHAM', 'Rahemet', 'Parc Château-Banquet 16', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (775, 'HAUSWIRTH', 0, 'HAUSWIRTH', 'HAUSWIRTH', 'Aude', 'Route du Vélodrome 8', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (776, 'HAWKINS', 0, 'HAWKINS', 'HAWKINS', 'Jennifer', 'Rue de Carouge 48', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (777, 'HEGER', 0, 'HEGER', 'HEGER', 'Urs', 'Route de Duiller 16', '1270', 'Trélex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (778, 'HEIDET_Col', 0, 'HEIDET', 'HEIDET', 'Liliane', 'Chemin De-La-Montagne 124', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (779, 'HEINIGER_Col', 0, 'HEINIGER', 'HEINIGER', 'Emma', 'Avenue Peschier 12', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (780, 'HELBLING', 0, 'HELBLING', 'HELBLING', 'Monique', 'Chemin du Foron 11', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (781, 'HELBLING_Col', 0, 'HELBLING', 'HELBLING', 'Clemens', 'Chemin de Lussy 8', '1806', 'St-Legier-La-Chiesaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (782, 'HELGEN', 0, 'HELGEN', 'HELGEN', 'Carmen', 'Avenue de Frontenex 34', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (783, 'HENRIOD_Col', 0, 'HENRIOD', 'HENRIOD', 'Luce', 'Chemin des Beaux-Champs 7', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (784, 'HERMANN', 0, 'HERMANN', 'HERMANN', 'Maria', 'Avenue du Devin-du-Village 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (785, 'HERMANSEDER_Col', 0, 'HERMANSEDER', 'HERMANSEDER', 'Elena', 'Avenue des Communes Réunies 66', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (786, 'HERRMANN_Col', 0, 'HERRMANN', 'HERRMANN', 'Liliane', 'Grand-Pré 39', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (787, 'HESS', 0, 'HESS', 'HESS', 'Pedro', 'Chemin des Vergers 4', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (788, 'HEUSSEUR', 0, 'HEUSSEUR', 'HEUSSEUR', 'Ginette', 'Rue Albert-Gos 14', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (789, 'HILTBRAND_ANDRA', 0, 'HILTBRAND-ANDRA', 'HILTBRAND-ANDRA', 'Edith', 'Avenue Devin-du-Village 10', '1211', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (790, 'HINNI', 0, 'HINNI', 'HINNI', 'Jean', 'Avenue de Crozet 8', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (791, 'HINTERMANN', 0, 'HINTERMANN', 'HINTERMANN', 'Monique', 'Chemin Grange Canal 35', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (792, 'HOF', 0, 'HOF', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (793, 'HOFER', 0, 'HOFER', 'HOFER', 'Lotti', 'Rue du Grand-Bay 8', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (794, 'HOFSTETTER', 0, 'HOFSTETTER', 'HOFSTETTER', 'Raymonde', 'Chemin des Charmettes 9', '1003', 'Lausanne', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (795, 'HOSPICE', 0, 'PIETERSEN', 'PIETERSEN', 'Elodie', 'Route de Meyrin 49', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (796, 'HUEGLI', 0, 'HUEGLI', 'HUEGLI', 'Nelly', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (797, 'HUELIN', 0, 'HUELIN', 'HUELIN', 'Maurice', 'Route de Malagnou 54bis', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (798, 'HUMM', 0, 'HUMM', 'HUMM', 'Nelly', 'Rue de Vermont 24', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (799, 'HYAMS_Col', 0, 'HYAMS', 'HYAMS', 'Bernard', 'Chemin David Munier 18B', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (800, 'IGOLEN', 0, 'IGOLEN', 'IGOLEN', 'Christine', 'Avenue des Communes-Réunies 54', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (801, 'IRLE', 0, 'IRLÉ', 'IRLÉ', 'Claudius', 'Avenue J.-D.-Maillard 11', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (802, 'JACCARD_Col', 0, 'JACCARD-GOLAY', 'JACCARD-GOLAY', 'Madelaine', 'Chemin Ami-Argand 50', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (803, 'JACOBSON', 0, 'JACOBSON', 'JACOBSON', 'Danuta', 'Avenue De-Luserna 6', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (804, 'JACQUEMOUD', 0, 'JACQUEMOUD', 'JACQUEMOUD', 'Arlette', 'Route de Frontenex 59', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (805, 'JACQUEROUD', 0, 'JACQUEROUD', 'JACQUEROUD', 'Jean-Noël', 'Chemin des Monts 11', '1630', 'Bulle', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (806, 'JACQUES', 0, 'JACQUES', 'JACQUES', 'Arianne', 'Rue Hoffmann 5', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (807, 'JACQUET', 0, 'JACQUET', 'JACQUET', 'Georgette', 'Cité Vieusseux 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (808, 'JAFFAL', 0, 'JAFFAL', 'JAFFAL', 'Zenab', 'Avenue des Bugnons 4', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (809, 'JAGGI', 0, 'JAGGI', 'JAGGI', 'Raoul', 'Chemin du Repentance 5', '1279', 'Chavannes-de-Bogis', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (810, 'JAGLIANI', 0, 'JAGLIANI GILLIARD', 'JAGLIANI GILLIARD', 'Françoise', 'Avenue d\'Aïre 89', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (811, 'JANIN_Col', 0, 'JANIN', 'JANIN', 'Lucie', 'Route de Bardonnex 58 A', '1228', 'Plan-Les-Ouates', 'Suisse',
        '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (812, 'JAQUET', 0, 'JAQUET', 'JAQUET', 'Gisèle', 'Avenue du Petit-Lancy 12', '1213', 'Petit-Lancy', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (813, 'JAQUIER_Col', 0, 'JAQUIER', 'JAQUIER', 'Thérèse', 'Avenue de Croset 34', '1219', 'Châtelain', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (814, 'JATON', 0, 'JATON', 'JATON', 'Suzanne', 'Avenue de Warens 4', '1203', 'Genève', 'Suisse', '0.00', '', '',
   'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (815, 'JEANDUPEUX', 0, 'JEANDUPEUX', 'JEANDUPEUX', 'Paule', 'Chemin de Mancy 21', '1222', 'Vésenaz', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (816, 'JEANMONOD', 0, 'JEANMONOD', 'JEANMONOD', 'May', 'Rue J.-A. Gautier 12', '1201', 'Genève', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (817, 'JEANNERET', 0, 'JEANNERET', 'JEANNERET', 'Roger', 'Chemin Henri Berner 12', '1234', 'Vessy', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (818, 'JEANNERET_GRIS_Col', 0, 'JEANNERET-GRIS', 'JEANNERET-GRIS', 'René', 'Rue du Village-Suisse 34', '1205',
        'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (819, 'JEANNIN_M', 0, 'JEANNIN', 'JEANNIN', 'André', 'Chemin de Cressy 39', '1232', 'Confignon', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', '');
INSERT INTO `transport_clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_depart`, `default_arrivee`, `default_transport_type`, `liste_rank`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (820, 'JEANNIN_Mme', 0, 'JEANNIN', 'JEANNIN', 'Andrée', 'Chemin de Cressy 39', '1232', 'Confignon', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (821, 'JEQUIER', 0, 'JEQUIER', 'JEQUIER', 'Claudette', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (822, 'JESPIERRE', 0, 'JESPIERRE', 'JESPIERRE', 'Ariane', 'Rue du Lignon 55', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (823, 'JESSING', 0, 'JESSING', 'JESSING', 'Patricia', 'Rue de la Fontaine 161', '01170', 'Thoiry', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (824, 'JIMENEZ', 0, 'JIMENEZ', 'JIMENEZ', 'Ginette', 'Promenade de l\'Europe 25', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (825, 'JOEHL-QUERRO_Col', 0, 'JOEHL-QUERRO', 'JOEHL-QUERRO', 'Arlette', 'Chemin des Marais 33', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (826, 'JOKONYA', 0, 'JOKONYA', 'JOKONYA', 'Chievo', 'Promenades des Artisans  32', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (827, 'JOLIAT_Col', 0, 'JOLIAT', 'JOLIAT', 'Jeanne', 'Avenue Dumas 14Bis', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (828, 'JOLIDON', 0, 'JOLIDON', 'JOLIDON', 'Jean-Paul', 'Avenue des Morgines 37', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (829, 'JOLIMONT', 0, 'JOLIMONT', '', 'du service comptable', 'Avenue Trembley 45', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (830, 'JOLY', 0, 'JOLY', 'JOLY', 'Eliane', 'Rue du Pré-Jérôme 14', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (831, 'JOST', 0, 'JOST', 'JOST', 'Lucette', 'Quai Ernest Ansermet 38', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (832, 'JOST_Col', 0, 'JOST', 'JOST', 'Paulette', 'Rue Henri Mussard 16', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (833, 'JUFFA', 0, 'JUFFA', 'JUFFA', 'Estelle', 'Rue du Colombier 4', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (834, 'JUILLAND', 0, 'JUILLAND', 'JUILLAND', 'Michel', 'Chemin du Bois Noir 14', '1890', 'Saint-Maurice', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (835, 'JULIEN', 0, 'JULIEN', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (836, 'JULITA', 0, 'JULITA', 'JULITA', 'Liliane', 'Rue Dancet 20', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (837, 'JUNGO', 0, 'JUNGO', 'JUNGO', 'Suzanne', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (838, 'KABELKA_Col', 0, 'KABELKA', 'KABELKA', 'Vladimir', 'Chemin des Crêts-de-Champel 2', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (839, 'KAISER_Jean', 0, 'KAISER', 'KAISER', 'Jean', 'Chemin des Palettes 16 bis', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (840, 'KAISER_Mme', 0, 'KAISER', 'KAISER', 'Anne-Joséphine', 'Chemin des Palettes 16 bis', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (841, 'KALYONCU', 0, 'KALYONCU', 'KALYONCU', 'Erdogan', 'Rue Ancienne 13', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (842, 'KAMMACHER', 0, 'KAMMACHER', 'KAMMACHER', 'Hubert', 'Champ des Noyers', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (843, 'KARAKASH_Col', 0, 'KARAKASH-VARSAMI', 'KARAKASH-VARSAMI', 'Roxane', 'Crêts de Champel 22', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (844, 'KARAM', 0, 'KARAM-CLEUSIX', 'KARAM-CLEUSIX', 'Micheline', 'Route de Certoux 114', '1258', 'Perly', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (845, 'KARARA_Col', 0, 'KARARA', 'KARARA', 'Sigrun', 'Rue du Premier Juin 3', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (846, 'KARARA_D', 0, 'KARARA', 'KARARA', 'Delbare', 'Chemin des Coudriers 54', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (847, 'KASANGAKI', 0, 'KASANGAKI', 'KASANGAKI', 'Pantaleo', 'Chemin des Palettes 3', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (848, 'KEATS', 0, 'KEATS', 'KEATS', 'Graham', 'Promenade de l\'Europe 5', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (849, 'KELLER', 0, 'KELLER', 'KELLER', 'Patrick', 'Chemin du Chamoliet 44', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (850, 'KELLER_Col', 0, 'KELLER', 'KELLER', 'Nicholas', 'Rue de Villereuse 18', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (851, 'KELLER_R', 0, 'KELLER', 'KELLER', 'Ramon', 'Chemin du Chamoliet 44', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (852, 'KEY', 0, 'KEY', 'KEY', 'DONALD', 'Avenue krieg 9', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (853, 'KHAN_Fille', 0, 'KHAN', 'KHAN', 'Afshan', 'Rue Hoffmann 18', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (854, 'KISTLER_Yvette', 0, 'KISTLER', 'KISTLER', 'Yvette', 'Chemin de la Tuillière 1A', '1197', 'Prangins', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (855, 'KLAAS', 0, 'KLAAS', 'KLAAS', 'Herbert', 'Chemin du Champ d\'Anier 9', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (856, 'KLAUS', 0, 'KLAUS', 'KLAUS', 'Zita', 'Cité Vieusseux 5', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (857, 'KLOOS_Col', 0, 'KLOOS', 'KLOOS', 'Jan Piet', 'Route de Certoux 36', '1258', 'Perly', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (858, 'KOBEL', 0, 'KOBEL', 'KOBEL', 'Jean', 'Avenue du Petit-Lancy 8', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (859, 'KOHL', 0, 'GILBERT de VAUTIBAULAAT', 'GILBERT de VAUTIBAULAAT', 'Patrick', 'Chemin de la Tour 24', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, 'M. Patrick GILBERT de VAUTIBAULAAT', '0000-00-00', '0000-00-00 00:00:00', ''),
  (860, 'KONRAD', 0, 'KONRAD', 'KONRAD', 'Ilse', 'Chemin de l\'Esplanade 28', '1214', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (861, 'KRACHT', 0, 'KRACHT', 'KRACHT', 'Anna-Maria', 'Chemin de Coudrier 46', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (862, 'KRAUER_Col', 0, 'KRAUER', 'KRAUER', 'Janine', 'Chemin François-Chavaz 10', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (863, 'KREUTZER', 0, 'KREUTZER', 'KREUTZER', 'Yvonne', 'Rue Daubin 27', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (864, 'KRIPPNER', 0, 'KRIPPNER', 'KRIPPNER', 'Roselyne', 'Rue Camille-Martin 17', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (865, 'KUHN', 0, 'KUHN', 'KUHN', 'Marianne', 'Avenue François-Besson 17', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (866, 'KUHN_Gisela', 0, 'KUHN', 'KUHN', 'Gisela', 'Rue Jean-Violette 30', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (867, 'KUNZ_Col', 0, 'KUNZ', 'KUNZ', 'Georges', 'Chemin du Renard 8', '1219', 'Aire', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (868, 'KUNZI', 0, 'KUNZI', 'KUNZI', 'Liliane', 'Contrat Social 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (869, 'KUNZI_Mr', 0, 'KUNZI', 'KUNZI', 'Charly', 'Contrat Social 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (870, 'KYAMBEL', 0, 'KYAMBEL', 'KYAMBEL', 'M.', 'Place De-Grenus 4', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (871, 'LACROIX', 0, 'LACROIX', 'LACROIX', 'Nunzia', 'Rue Thomas Masaryk 4', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (872, 'LAESSIG', 0, 'LAESSIG', 'LAESSIG', 'Elisabeth', 'Avenue François-Besson 20', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (873, 'LAGAST_Col', 0, 'LAGAST BEYELER', 'LAGAST BEYELER', 'Lise', 'Avenue du Petit-Senn 44', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (874, 'LAGNEL', 0, 'LAGNEL', 'LAGNEL', 'Catherine', 'Rue Cramer 9', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (875, 'LAMBERT', 0, 'LAMBERT', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (876, 'LANCON', 0, 'LANCON', 'LANCON', 'Georgette', 'Rue de Lausanne 42', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (877, 'LANG', 0, 'LANG', 'LANG', 'Fritz', 'Chemin des Verjus 53', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (878, 'LANG_Martina', 0, 'LANG', 'LANG', 'Martina', 'Rue du Clos 5', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (879, 'LAWI', 0, 'LAWI', 'LAWI', 'Selim', 'Rue Robert-De-Traz 4', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (880, 'LAYAT_Col', 0, 'LAYAT', 'LAYAT', '', 'Chemin du Foron 11', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (881, 'LAZARO', 0, 'LAZARO', 'LAZARO', 'Juan', 'Rue du Grand Bay 11', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (882, 'LAZOVIC', 0, 'LAZOVIC', 'LAZOVIC', 'Renée', 'Place du Bourg-de-Four 18', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (883, 'LE_TEXIER', 0, 'Le TEXIER', 'Le TEXIER', 'Daniel', 'Chemin des Oliviers 6', '1184', 'Vinzel', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (884, 'LEDDY', 0, 'LEDDY', 'LEDDY', 'Marie-Christine', 'Chemin Mont Gond 16', '1997', 'Haute-Nendaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (885, 'LEGLISE', 0, 'LEGLISE', 'LEGLISE', 'Suzanne', 'Avenue des Communes-Réunies 76', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (886, 'LEIDNER_Col', 0, 'LEIDNER', 'LEIDNER', 'Claudine', 'Avenue F.-A. Grison 5', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (887, 'LENZOTTI', 0, 'LENZOTTI', 'LENZOTTI', 'Césarine', 'Route de Frontenex 57', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (888, 'LEUENBERGER_Col', 0, 'LEUENBERGER', 'LEUENBERGER', 'Marie-Hélène', 'Chemin du Tir-au-Cannon 1', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (889, 'LEVY_Elena', 0, 'LEVY', 'LEVY', 'Elena', 'Chemin de la Cocuaz 25', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (890, 'LEYVRAZ', 0, 'LEYVRAZ', 'LEYVRAZ', 'Georgette-Hélène', 'Rue du Comte-Géraud 10', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (891, 'LIDET', 0, 'LIDET', 'LIDET', 'Abinet', 'Rue Gilbert 7b', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (892, 'LIEBICH', 0, 'LIEBICH', 'LIEBICH', 'André', 'chemin des Tulipiers 19', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (893, 'LIFTON_Roger', 0, 'LIFTON', 'LIFTON', 'Roger', 'Lotissement Trélatoun 77', '01170', 'Cessy', 'France', '60.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (894, 'LIGIER', 0, 'LIGIER', 'LIGIER', 'Denise', 'Chemin de Passoret 15', '1234', 'Vessy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (895, 'LIGNIERE', 0, 'LIGNIERE', '', 'Comptabilité', 'La Lignière 5', '1196', 'Gland', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (896, 'LILIVE', 0, 'LALIVE D\'EPINAY', 'LALIVE D\'EPINAY', 'Pierre', 'Rue des Sources 13', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (897, 'LIONTI', 0, 'LIONTI', 'LIONTI', 'Giuseppe', 'Route de Saint - Cergue 26', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (898, 'LITSHI', 0, 'LITSHI', 'LITSHI', 'Marie-Thérèse', 'Chemin de la Gravière 27', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (899, 'LIVRON_PIRCHE', 0, 'LIVRON - PIRCHE', 'LIVRON - PIRCHE', 'Paulette', 'Route de Frontenex 94', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (900, 'LOFFET', 0, 'LOFFET', 'LOFFET', 'Thierry', 'Rue Daubin 16', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (901, 'LOPES', 0, 'LOPES', 'LOPES', 'José', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (902, 'LORENTE', 0, 'LORENTE', 'LORENTE', 'Trinidad', 'Rue de la Pruley 41', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (903, 'LORENZI_Col', 0, 'LORENZI', 'LORENZI', 'Rosetta', 'Avenue de Foretaille 10', '1292', 'Chambesy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (904, 'LOURENCO', 0, 'LOURENCO', 'LOURENCO', 'Luiz Félipe', 'Route de Sauverny 45', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (905, 'LUCAS', 0, 'LUCAS', 'LUCAS', 'Patrice', 'Les Grands Champs 28 / Rue Jean de Gingins 899', '01220', 'Divonne-Les-Bains', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (906, 'LUCHSINGER', 0, 'LUCHSINGER', 'LUCHSINGER', 'Andreas', 'Rue de Conches 34', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (907, 'LUCIEN', 0, 'LUCIEN', 'LUCIEN', 'Jean', 'Rue de Lausanne 87', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (908, 'LUMBROSO_Col', 0, 'LUMBROSO', 'LUMBROSO', 'Albert', 'Route de Chevrens 102', '1247', 'Anières', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (909, 'LUTHI', 0, 'LUTHI', 'LUTHI', 'Thérèse', 'Avenue du Lignon 8', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (910, 'MAGNIN_Monique', 0, 'MAGNIN', 'MAGNIN', 'Monique', 'Chemin des Rases 86', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (911, 'MAHASSEN', 0, 'MAHASSEN', 'MAHASSEN', 'Réga Noury', 'Chemin Dr-Adolphe-Pasteur 9', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (912, 'MAIER', 0, 'MAIER', 'MAIER', 'Tessa', 'Chemin des Mollies 9', '1293', 'Bellevue', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (913, 'MAILLAR', 0, 'MAILLAR TABASCO', 'MAILLAR TABASCO', 'Angeles', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (914, 'MAIN', 0, 'MAIN', 'MAIN', 'Agnès', 'Rue Michel-Simon 7', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (915, 'MAIRE', 0, 'MAIRE', 'MAIRE', 'Marie-Madelaine', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (916, 'MAIRIE_GENTHOD', 0, 'de comptabilité', 'de comptabilité', 'de service', 'Rue du Village 37', '1294', 'Genthod', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (917, 'MAISONNEUVE', 0, 'MAISONNEUVE', '', 'du service comptable', 'Avenue de Châtelaine 60-62', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (918, 'MALARD', 0, 'MALARD', 'MALARD', 'Raoul', 'Chemin des Ceps 13', '1926', 'Fully', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (919, 'MALIQI_RIZAHU_Col', 0, 'MALIQI-RIZAHU', 'MALIQI-RIZAHU', 'Bukurije', 'Route de Choulex 153', '1244', 'Choulex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (920, 'MANZEROLI', 0, 'MANZEROLI', 'MANZEROLI', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (921, 'MARCHAND_Patrick', 0, 'MARCHAND', 'MARCHAND', 'Patrick', 'Chemin de la Troupe 31', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (922, 'MARCHETTI', 0, 'MARCHETTI', 'MARCHETTI', 'Angelo Elio', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (923, 'MARDAM', 0, 'MARDAM SHEIKH ELARD', 'MARDAM SHEIKH ELARD', 'Faïzah', 'Avenue De-Budé 6', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (924, 'MAREDA', 0, 'MAREDA', 'MAREDA', 'Ivan', 'Route d\'Epeisses 55', '1237', 'AVULLY', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (925, 'MARET', 0, 'MARET', 'MARET', 'Gertrude', 'Route de Cortenaz 1', '1247', 'Anière', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (926, 'MARET_Val', 0, 'MARET', 'MARET', 'Renée', 'CP 683 - 7 rue d\'Oche', '1920', 'Martigny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (927, 'MARGRAS', 0, 'MARGRAF', 'MARGRAF', 'Daisy', 'Rue du Grand-Pré 36', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (928, 'MARGUERAT_Col', 0, 'MARGUERAT', 'MARGUERAT', 'Janina', 'Rue Prévost-Martin 37', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (929, 'MARIAUX', 0, 'MARIAUX', 'MARIAUX', 'Aime', 'Avenue Theodore-Weber 15', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (930, 'MARINI', 0, 'MARINI', 'MARINI', 'Claire-Lyse', 'Chemin de la Petite-Boissière 40', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (931, 'MARMILLOD', 0, 'MARMILLOD', 'MARMILLOD', 'Andrée', 'Rue Viollier 7', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (932, 'MARQUET', 0, 'MARQUET', 'MARQUET', 'Gisèle', 'Chemin des Clochettes 22', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (933, 'MARTELLINI_OSTINELLI_Col', 0, 'MARTELLINI-OSTINELLI', 'MARTELLINI-OSTINELLI', 'Christiane', 'Chemin du Pont-De-Ville 26', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (934, 'MARTI', 0, 'MARTI', 'MARTI', '', 'Avenue d\'Aïre 89', '1203', 'Genève', 'Suisse', '35.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (935, 'MARTIN', 0, 'MARTIN', 'MARTIN', 'Roland', 'Rue de la Prulay 58', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (936, 'MARTIN_Alain_Col', 0, 'MARTIN', 'MARTIN', 'Alain', 'Route d\'Hermance 139', '1245', 'Collonge-Bellerive', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (937, 'MARTIN_Alice', 0, 'MARTIN', 'MARTIN', 'Alice Anne', 'Chenin Taverney 17', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (938, 'MARTIN_PERRIN', 0, 'MARTIN-PERRIN', 'MARTIN-PERRIN', 'Mireille', 'Rue Tronchin 32', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (939, 'MARTINET', 0, 'MARTINET', 'MARTINET', 'Bluette', 'Route du Grand-Lancy 166', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (940, 'MASSON', 0, 'MASSON', 'MASSON', 'René', 'Chemin Briquet 26', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (941, 'MATILE', 0, 'MATILE', 'MATILE', 'Jacques', 'Rue de Vermont 13', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (942, 'MATINTALO', 0, 'MATINTALO', 'MATINTALO', 'Joaquina', 'Rue des Bossons 14', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (943, 'MATTER', 0, 'MATTER', 'MATTER', 'Werner', 'route de Frontenex 57', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (944, 'MATTER_Béatrice', 0, 'MATTER', 'MATTER', 'Béatrice', 'Chemin des Crêts-de-Champel 37', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (945, 'MAULET', 0, 'MAULET', 'MAULET', 'Brigitte', 'Chemin Victor-Duret 4', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (946, 'MEDICI RINA', 0, 'MEDICI RINA', 'MEDICI RINA', 'Liliane', 'Rue de Carouge 12', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (947, 'MEIER_Teresa', 0, 'CAMPUSSANO MEIER', 'CAMPUSSANO MEIER', 'Teresa', 'Route de Suisse 95', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (948, 'MEISTER', 0, 'MEISTER', 'MEISTER', 'Germaine', 'Rue du Grand Bay 11', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (949, 'MENDEZ-GAGLIARDI', 0, 'MENDEZ-GAGLIARDI', 'MENDEZ-GAGLIARDI', 'Mariana', 'Avenue Sainte-Cécile 33', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (950, 'MENNET', 0, 'MENNET', 'MENNET', 'Edmée', 'Chemin des Châtaigniers 24', '1292', 'Chambésy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (951, 'MERCIER', 0, 'MERCIER', 'MERCIER', 'Elisabeth', 'Chemin des Failles 2', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (952, 'MERCKX_Col', 0, 'MERCKX', 'MERCKX', 'Georges', 'Chemin du Rebiolon 11', '1283', 'Dardagny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (953, 'MESSERLI', 0, 'MESSERLI', 'MESSERLI', 'Yvonne', 'Avenue du Gros-Chêne 34', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (954, 'MEUTEMEDIAN', 0, 'MEUTÉMÉDIAN', 'MEUTÉMÉDIAN', 'Anaïs', 'Rue de Vermont 32', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (955, 'MEUTEMEDIAN_Col', 0, 'MEUTEMEDIAN', 'MEUTEMEDIAN', 'Monique', 'Route de Malagnou 54 Bis', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (956, 'MEX', 0, 'MEX', 'MEX', 'Odette', 'Rue des Minoteries 1', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (957, 'MEYNET', 0, 'MEYNET', 'MEYNET', 'Madeleine', 'Rue du Comte-Géraud 8', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (958, 'MIAMA', 0, 'MIAMA', 'MIAMA', 'Etiane', 'Route des Hauts-de-Thoiry', '01170', 'Thoiry', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (959, 'MICHAUD', 0, 'MICHAUD', 'MICHAUD', 'Elisabeth', 'Rue du Bouchet 22', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (960, 'MICHIELINI', 0, 'MICHIELINI', 'MICHIELINI', 'Maurice', 'Chemin en Vuaracaux', '1297', 'Founex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (961, 'MICHON', 0, 'MICHON', 'MICHON', 'Eric', 'Chemin Nicolas-Bogueret 15', '1219', 'Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (962, 'MILLER', 0, 'MILLER', 'MILLER', '', 'Avenue de Mategnin 77', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (963, 'MILLOT', 0, 'MILLOT', 'MILLOT', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (964, 'MIRELESSE_Col', 0, 'MIRLESSE', 'MIRLESSE', 'Hélène', 'Chemin Beau-Soleil 8', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (965, 'MIVELAZ', 0, 'MIVELAZ', 'MIVELAZ', 'Albertina Maria', 'Chemin Moise-Duboule 57', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (966, 'MIVILLE', 0, 'MIVILLE', 'MIVILLE', 'Lucette', 'Cité Vieussieux 8', '1203', 'Genève', 'Suisse', '40.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (967, 'MOCK', 0, 'MOCK', 'MOCK', 'Judith', 'Route de Lausanne 352', '1294', 'Genthod', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (968, 'MOJON', 0, 'MOJON', 'MOJON', 'Claude', 'Rue Klébert 8', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (969, 'MONNET_Jacq', 0, 'MONNET', 'MONNET', 'Jacqueline', 'Gare-des-Eaux-Vives 24', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (970, 'MONNEY_Danielle', 0, 'MONNEY', 'MONNEY', 'Daniel', 'Rue Carolie 36', '1227', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (971, 'MONNEY_Simone', 0, 'MONNEY', 'MONNEY', 'Simone', 'Avenue du Lignon 50', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (972, 'MONNIER_Col', 0, 'MONNIER', 'MONNIER', 'Suzanne', 'Chemin Colladon 5', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (973, 'MONNIER_Doris', 0, 'MONNIER', 'MONNIER', 'Doris', 'Chemin Fr. Lehmann 32', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (974, 'MONNIER_JC', 0, 'MONNIER', 'MONNIER', 'Jean-Marc', 'Chemin des Prés 5', '1279', 'Chavannes-de-Bogis', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (975, 'MONNIER_Phil', 0, 'MONNIER', 'MONNIER', 'Philippe', 'Chemin des Ramiers 7', '1245', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (976, 'MONTAVON', 0, 'MONTAVON', 'MONTAVON', 'Chantal', 'Chemin de la Grande-Pièce 3C', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (977, 'MONTEMAGNO_Col', 0, 'MONTEMAGNO OLIVERA', 'MONTEMAGNO OLIVERA', 'Teresa', 'Chemin Ladame 3', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (978, 'MONTES', 0, 'MONTES', 'MONTES', 'Suzanne', 'Avenue de Bijou 5', '01210', 'Ferney Voltaire', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (979, 'MONTI', 0, 'MONTI', 'MONTI', 'Bernard-Charles', 'Route d\'Hermance 116', '1245', 'Collonge-Bellerive', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (980, 'MOREAU', 0, 'MOREAU', 'MOREAU', 'Jean', 'Route d\'Epeisses 47', '1237', 'Avully', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (981, 'MOREL_Col', 0, 'MOREL', 'MOREL', 'Louise', 'Rue des Voisins 3', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (982, 'MORESI', 0, 'MORESI', 'MORESI', 'Arianna', 'Chemin Frank-Thomas 52', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (983, 'MORESI_M', 0, 'MORESI', 'MORESI', '', 'Chemin Frank-Thomas 52', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (984, 'MORET_Arianne', 0, 'MORET', 'MORET', 'Arianne', 'Route de St-Julien 18', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (985, 'MORGANTINI', 0, 'MORGANTINI', 'MORGANTINI', 'Antoinette', 'Chemin de la Fin 11', '1295', 'Tannay', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (986, 'MOROZ', 0, 'MOROZ', 'MOROZ', 'Angèle', 'Rue de Moillebeau 59', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (987, 'MOSCA', 0, 'MOSCA', 'MOSCA', 'Anna', 'Chemin du Fief-de-Chapitre 10', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (988, 'MOSCA_Col', 0, 'MOSCA', 'MOSCA', 'Anna', 'Chemin du Fief-de-Chapitre 10', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (989, 'MOSER', 0, 'MOSER', 'MOSER', 'Pierre', 'Avenue des Communes-Réunies 84', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (990, 'MOTTAZ', 0, 'MOTTAZ', 'MOTTAZ', 'Françoise', 'Rue de la Calle 40', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (991, 'MOTTET_Avuly', 0, 'MOTTET', 'MOTTET', 'Antoine', 'Place Saint-Gervais 12', '1237', 'Avully', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (992, 'MOTTET_Claude', 0, 'MOTTET', 'MOTTET', 'Claude', 'Avenue du Petit-Lancy 29', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (993, 'MOTTIER_Monique', 0, 'MOTTIER', 'MOTTIER', 'Monique', 'Rue du Prieuré 3', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, 'Code 0105\n7è', '0000-00-00', '0000-00-00 00:00:00', ''),
  (994, 'MOUATAZIL', 0, 'MOUATAZIL', 'MOUATAZIL', 'Ahmed', 'Rue de Bandol 9', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (995, 'MOUCHET', 0, 'MOUCHET', 'MOUCHET', 'Jean', 'Avenue du Petit-Lancy 42', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (996, 'MUEHLEBACH', 0, 'MUEHLEBACH MASIA', 'MUEHLEBACH MASIA', 'Evelyne', 'Chemin des Crêts-de-Champel 21', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (997, 'MUFFAT_Col', 0, 'MUFFAT', 'MUFFAT', 'Ghislaine', 'Route des Tournettes 45', '1255', 'Veyrier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (998, 'MUGNAIO', 0, 'MUGNAIO', 'MUGNAIO', 'Maria', 'Avenue du Bois-de-la-Chapelle 69', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (999, 'MUGNIER', 0, 'MUGNIER', 'MUGNIER', 'Françoise', 'Rue des Vertes Campagnes', '01170', 'Gex', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1000, 'MULLER_Andrée_Col', 0, 'MULLER', 'MULLER', 'Andrée', 'Avenue de Champel 41', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1001, 'MULLER_Frontenex', 0, 'MULLER', 'MULLER', 'Giovana', 'Avenue de Frontenex 60bis', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1002, 'MULLER_Otto_Col', 0, 'MULLER', 'MULLER', 'Otto', 'Chemin de Vuillonnex 11', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1003, 'MUSITELLI', 0, 'MUSITELLI', 'MUSITELLI', 'Andrée', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1004, 'MUSSO_Col', 0, 'MUSSO', 'MUSSO', 'Emma-Hélène', 'Chemin des Bougeries 24', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1005, 'NARDINO', 0, 'NARDINO', 'NARDINO', 'Lida', 'Avenue des Grandes Communes 74', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1006, 'NEUMEIER', 0, 'NEUMEIER', 'NEUMEIER', 'Walter', 'Chemin Frank-Thomas 10', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1007, 'NICHOLS', 0, 'NICHOLS', 'NICHOLS', 'Elinor Mary', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1008, 'NICOLLERAT', 0, 'NICOLLERAT', 'NICOLLERAT', 'Yvette', 'Chemin de la Troupe 10', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1009, 'NINGHETTO', 0, 'NINGHETTO', 'NINGHETTO', 'Louise', 'Rue Jean-Charles Amat 6', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1010, 'NYFFELER', 0, 'NYFFELER', 'NYFFELER', 'Gilbert', 'Chemin Taverney 4', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1011, 'OBERSON', 0, 'OBERSON', 'OBERSON', 'Janine', 'Rue des Delices 3', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1012, 'ODERMATT', 0, 'ODERMATT', 'ODERMATT', 'Erika', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1013, 'OFFMANN', 0, 'OFFMANN', 'OFFMANN', 'Chantal', 'Rue du Comte-Géraud 15', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1014, 'OLIVARY_Col', 0, 'OLIVARY', 'OLIVARY', 'Jacqueline', 'Chemin des Ailes 37', '1216', 'Cointrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1015, 'OLIVIER', 0, 'OLIVIER', 'OLIVIER', 'Heidi', 'Avenue de Mirmont 10', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1016, 'OMANBELE', 0, 'OMANBELE', 'OMANBELE', 'Mara', 'Avenue Sainte-Clotilde 22', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1017, 'ORMOND', 0, 'ORMOND', 'ORMOND', 'Richard', 'Chemin de la Méssine 7', '1244', 'Choulex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1018, 'OSTINI', 0, 'OSTINI', 'OSTINI', 'Enrico', 'Avenue de Miremont 26', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1019, 'PALLUD_Col', 0, 'PALLUD GARIN', 'PALLUD GARIN', 'Violette', 'Chemin Plein-Vent 12', '1228', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1020, 'PARTHE', 0, 'PARTHE', 'PARTHE', 'Christa', 'Chemin François-Lehmann 10', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1021, 'PASTEUR', 0, 'PASTEUR', 'PASTEUR', 'Jean-Paul', 'chemin Dr-Adolphe-Pasteur 25', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1022, 'PAULIAN', 0, 'PAULIAN', 'PAULIAN', 'Benoît', 'Rue Saint-Jean 90', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1023, 'PELLATON', 0, 'PELLATON', 'PELLATON', 'Rosmarie', 'Route de Pré-Marais 23', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1024, 'PELLET', 0, 'PELLET', 'PELLET', 'Marguerite', 'Avenue du Bois-de-la-Chapelle 79', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1025, 'PELLIER', 0, 'PELLIER', 'PELLIER', 'Agnès', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1026, 'PELOFI', 0, 'PELOFI', 'PELOFI', 'Lucie', 'Route de Pregny 27', '1292', 'Chambésy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1027, 'PERIZOLLO', 0, 'PERIZOLLO', 'PERIZOLLO', 'Daniela', 'Rue des Tambourinnes 27', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1028, 'PERONA_Col', 0, 'PERONA', 'PERONA', 'Claire', 'Quai Charles-Page 27', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1029, 'PERRENOUD', 0, 'PERRENOUD', 'PERRENOUD', 'Germaine', 'Chemin du Bac 14', '1213', 'Genève', 'Petit-Lancy', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1030, 'PERRET', 0, 'PERRET', 'PERRET', 'Jacqueline', 'Rue du Vidollet 15', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1031, 'PERRIER', 0, 'PERRIER', 'PERRIER', 'Christiane', 'Avenue Bois-de-la-Chapelle 13', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1032, 'PERRIN_Col', 0, 'PERRIN', 'PERRIN', 'Françoise', 'Avenue des Amazones 16', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1033, 'PERROT_Col', 0, 'PERROT-FEBO', 'PERROT-FEBO', 'Anne-Marie', 'Chemin de la Montagne 114', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1034, 'PERROUD_Col', 0, 'PERROUD', 'PERROUD', 'Monique', 'Avenue A.-M. Mirany 3', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1035, 'PERRY', 0, 'PERRY', 'PERRY', 'Rose-Anne', 'Chemin des Châtaigniers', '1195', 'Dully-Bursinel', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1036, 'PETERHANS', 0, 'PETERHANS', 'PETERHANS', 'Joseph', 'Rue de Carouge 7', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1037, 'PEVERADA', 0, 'PEVERADA', 'PEVERADA', 'Anna', 'Rue du Grand Bay 16', '1220', 'Les Avanchets', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1038, 'PEYROT', 0, 'PEYROT', 'PEYROT', 'Yves', 'Rue Le-Corbusier 21a', '1208', 'Genève', 'Suisse', '40.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1039, 'PHOCAS', 0, 'PHOCAS', 'PHOCAS', 'Olivier', 'Chemin du Vignoble 263', '01630', 'France', 'Challex', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1040, 'PIACHAUD_Col', 0, 'PIACHAUD', 'PIACHAUD', 'Georgette', 'Rue Benjamin - Franklin 2', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1041, 'PICCOT', 0, 'PICCOT', 'PICCOT', 'Jeanine', 'Chemin Galiffe 2', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1042, 'PILLONEL', 0, 'PILLONEL', 'PILLONEL', 'Odette', 'Avenue De-Luserna 42', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1043, 'PILLONEL_Col', 0, 'PILLONEL', 'PILLONEL', 'Odette', 'Avenue Luzerna 42', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1044, 'PINTO_Col', 0, 'PINTO', 'PINTO', 'Francesco', 'Boulevard Carl-Vogt 8', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1045, 'PIPOZ', 0, 'PIPOZ', 'PIPOZ', 'Marlies', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1046, 'PISANI', 0, 'PISANI', 'PISANI', 'Alexendre', 'Route de Florisant 64', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1047, 'PISTEUR', 0, 'PISTEUR', 'PISTEUR', 'Pia Antonia', 'Chemin du Renard 68', '1219', 'Aïre', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1048, 'PITTET', 0, 'PITTET', 'PITTET', 'Sonia', 'Chemin Carabot 25', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1049, 'PIZZETTA', 0, 'PIZZETTA', 'PIZZETTA', 'Gilbert', 'Boulevard des Promenades 20', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1050, 'PLACIDI', 0, 'PLACIDI', 'PLACIDI', 'Reymonde', 'Rue Taverney 5', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1051, 'PLAUTIN_Col', 0, 'PLAUTIN', 'PLAUTIN', 'Andrée', 'Route de Certoux 25', '1258', 'Perly', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1052, 'PLUG_Col', 0, 'PLUG-OTTO', 'PLUG-OTTO', 'Elisabeth', 'Avenue de Suisse 14 b', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1053, 'POCHON', 0, 'POCHON', 'POCHON', 'Constant', 'Route des Acacias 11', '1227', 'Les Acacias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1054, 'POLASTRI', 0, 'POLASTRI', 'POLASTRI', 'Fabienne', 'Chemin des Plantées 1', '1285', 'Athenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1055, 'POLETTI KARAMFILOV', 0, 'POLETTI KARAMFILOV', 'POLETTI KARAMFILOV', 'Christiane', 'Chemin de Saule 109', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1056, 'POLETTI_Col', 0, 'POLETTI KARAMFILOV', 'POLETTI KARAMFILOV', 'Christiane', 'Chemin de Saule 109', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1057, 'POLIAKOV', 0, 'POLIAKOV', 'POLIAKOV', 'Lioubov', 'Rue de Vermont 8', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1058, 'POLLI', 0, 'POLLI', 'POLLI', 'Angelo', 'Route de Malagnou 34', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1059, 'POLONI_Col', 0, 'POLONI', 'POLONI', 'Cesare', 'Rue Louis Favre 23', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1060, 'POMETTA_Col', 0, 'POMETTA', 'POMETTA', 'Francesca', 'Route de Creux de Genthod', '1294', 'Genthod', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1061, 'PORTIER', 0, 'PORTIER', 'PORTIER', 'Jeannine', 'Rue du Vieux-Billard 14', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1062, 'POUGTASCH', 0, 'POUGTASCH', 'POUGTASCH', 'Ita', 'Rue Jean-Robert-Chouet 17', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1063, 'POUJOULY', 0, 'POUJOULY', 'POUJOULY', 'Numa', 'Rue de la Tambourine 27', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1064, 'POUZOLS_Col', 0, 'POUZOLS SAINT PHAR', 'POUZOLS SAINT PHAR', 'Jasmina', 'Chemin de Beau-Soleil 2', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1065, 'POWELL_Col', 0, 'POWELL', 'POWELL', 'Richard', 'Route de Choulex 117', '1244', 'Choulex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1066, 'PUNDUYANGE', 0, 'PUNDUYANGE', 'PUNDUYANGE', 'Béatrice', 'Avenue du Gros-Chêne 14A', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1067, 'PURRO', 0, 'PURRO', 'PURRO', 'Maria', 'Avenue de Crozet 54', '1219', 'Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1068, 'RABE', 0, 'RABE', 'RABE', 'Ursula', 'Rue des Vernes 24', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1069, 'RABINNOVICI_Col', 0, 'RABINNOVICI', 'RABINNOVICI', 'Malka', 'Rue Pedro-Meylan 2', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1070, 'RACINE', 0, 'RACINE', 'RACINE', 'Elisabeth', 'Chemin des Jaquines 16A', '1197', 'Prangins', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1071, 'RACOVITZA_Col', 0, 'RACOVITZA', 'RACOVITZA', 'Monica', 'Chemin des Champs-Gottreux 14', '1212', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1072, 'RAES_DE_BREE', 0, 'RAES DE BREE', 'RAES DE BREE', 'Suzanne', 'Chemin de Taverney 9', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1073, 'RAEVSKY', 0, 'RAEVSKY', 'RAEVSKY', 'Catharina', 'Chemin du Champ d Anier 6', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1074, 'RAISIN', 0, 'RAISIN', 'RAISIN', 'Jacqueline', 'Clos Belmont 20', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1075, 'RAMOS', 0, 'RAMOS', 'RAMOS', 'Jean', 'Avenue des Lattes 21', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1076, 'RASSINOUX', 0, 'RASSINOUX', 'RASSINOUX', 'Patrick', 'Rue de la Prulay 48', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1077, 'RELAIS_DUMAS', 0, 'comptabilité', 'comptabilité', '', 'Chemin des Fins 27', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1078, 'REMUND', 0, 'REMUND', 'REMUND', 'Suzanne', 'Boulevard Georges-Favon 43', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1079, 'REMY_CG', 0, 'REMY', 'REMY', 'Ulrika', 'Route de Loëx 12', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1080, 'RENAUD', 0, 'RENAUD', 'RENAUD', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1081, 'RESHTIA', 0, 'RESHTIA', 'RESHTIA', 'Golalai', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1082, 'REUMKENS_Col', 0, 'REUMKENS', 'REUMKENS', 'Marie-Louise', 'Rue Chausse-Coq 5', '1204', 'Genève', 'Suisse',
         '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1083, 'REY_Col', 0, 'REY', 'REY', 'Millan', 'Rue de Roveray 5', '1207', 'Genève', 'Suisse', '0.00', '', '',
   'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1084, 'REY_WORKER_Col', 0, 'REY WORKER', 'REY WORKER', 'Shirkey', 'Route de Thonon 68', '1222 Vésenaz', 'Genève',
         'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1085, 'REYMOND_Col', 0, 'REYMOND', 'REYMOND', 'Janine', 'Chemin des Rayes 33', '1222', 'Vésenaz', 'Suisse', '0.00',
   '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1086, 'RICARD', 0, 'RICARD', 'RICARD', 'Christophe', 'Pre-de-la-Reine 15', '1236', 'Cartigny', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1087, 'RICHARD_Col', 0, 'RICHARD', 'RICHARD', 'HUGUETTE', 'Chemin Rieu 22', '1206', 'Genève', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1088, 'RICKENBACH', 0, 'RICKENBACH', 'RICKENBACH', 'Philippe', 'Rue de Contamines 9', '1206', 'Genève', 'Suisse',
         '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', '');
INSERT INTO `transport_clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_depart`, `default_arrivee`, `default_transport_type`, `liste_rank`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (1089, 'RICKLI_Col', 0, 'RICKLI', 'RICKLI', 'Hélène', 'Rue du Bachet 5', '1212', 'Grand-Lancy', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1090, 'RIES_Col', 0, 'RIES', 'RIES', 'Claudine', 'Rue des Contamines 21', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1091, 'RINCON', 0, 'RINCON', 'RINCON', 'Ana', 'Chemin des Pléaides', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1092, 'ROBERT_NICOUD', 0, 'ROBERT-NICOUD', 'ROBERT-NICOUD', 'Paulette', 'Avenue d\'Aire 89', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1093, 'ROBERT_TISSOT', 0, 'ROBERT - TISSOT', 'ROBERT - TISSOT', 'François', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1094, 'ROBIN', 0, 'ROBIN', 'ROBIN', 'Christian', 'Route de la Louvière 3', '1243', 'Presinge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1095, 'ROCH', 0, 'ROCH', 'ROCH', 'René', 'Avenue des Morgines 35', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1096, 'RODEL', 0, 'RODEL', 'RODEL', 'Volker', 'Chemin Ph.-De-Sauvage 20', '1219', 'La Châtelaine', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1097, 'RODIE', 0, 'RODIÉ', 'RODIÉ', 'Dirce', 'Rue du Grand-Pré 37', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1098, 'ROECK', 0, 'ROECK', 'ROECK', 'Hermine', 'Avenue Pictet-de-Rochemont 33', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1099, 'ROMER', 0, 'ROMER', 'ROMER', 'Marguerite', 'Avenue des Libellules 4', '1219', 'Aïre', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1100, 'ROPRAZ_Col', 0, 'ROPRAZ-GRIVEL', 'ROPRAZ-GRIVEL', 'Marcelle', 'Rue du Vidolet 11', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1101, 'ROSA', 0, 'ROSA', 'ROSA', 'Alain', 'Chemin Champ-Claude 3', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1102, 'ROSSET_Marc', 0, 'ROSSET', 'ROSSET', 'Marc', 'Rue du 31 Décembre 38', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1103, 'ROTH', 0, 'ROTH', 'ROTH', 'Bernard', 'Chemin de la Seymaz 60', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1104, 'ROTH_Mon', 0, 'ROTH', 'ROTH', 'Monique', 'Chemin de la Redoute 4', '1226', 'Plan-les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1105, 'ROUGE_Claude_Col', 0, 'ROUGE', 'ROUGE', 'Claude', 'Chemin J.-des-Arts 8', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1106, 'ROUGE_Col', 0, 'ROUGE', 'ROUGE', 'Jean-Pierre', 'Chemin J.-des-Arts 8', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1107, 'ROUGE_Jean', 0, 'ROUGE', 'ROUGE', 'Jean-Claude', 'Chemin Etienne-Chennaz 10', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1108, 'ROUGEMONT', 0, 'ROUGEMONT', 'ROUGEMONT', 'Jean-Pierre', 'Rue des Délices 10', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1109, 'ROULET', 0, 'ROULET', 'ROULET', 'Henri', 'Rue Pierre Grise 3', '1294', 'Genthod', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1110, 'ROUX', 0, 'ROUX', 'ROUX', 'Marie-Jeanne', 'Rue Beauregard 11', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1111, 'ROUX_ MOLLARD', 0, 'ROUX MOLLARD', 'ROUX MOLLARD', 'Claude', 'Rue de la Prulay 43', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1112, 'ROUX_Col', 0, 'ROUX', 'ROUX', 'Andrée', 'Chemin des Merles 40', '1213', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1113, 'RUAU', 0, 'RUAU', 'RUAU', 'Jean', 'Avenue du Gros-Chêne 25', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1114, 'RUBAD', 0, 'RUBAD', 'RUBAD', 'Hélène', 'Chemin de l\'Erse 2', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1115, 'RUDMANN', 0, 'RUDMANN', 'RUDMANN', 'Frantz', 'Chemin des Crêts-de-Champel 12', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1116, 'RUEGGER', 0, 'RUEGGER', 'RUEGGER', 'Paul', 'Route de Collex 37', '1293', 'Bellevue', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1117, 'RUESCH', 0, 'RUESCH ZAUGG', 'RUESCH ZAUGG', 'Rose-Marie', 'Chemin de Bonvent 25', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1118, 'RUESCH_Kurt', 0, 'RUESCH ZAUGG', 'RUESCH ZAUGG', 'Kurt', 'Chemin de Bonvent 25', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1119, 'RUPIL', 0, 'RUPIL', 'RUPIL', 'Trepicina', 'Rue du Village 18c', '1214', 'Vernier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1120, 'RUTISHAUSER', 0, 'RUTISHAUSER', 'RUTISHAUSER', 'Daniele', 'Chemin Pont-Céard 36', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1121, 'SALAMIN', 0, 'SALAMIN', 'SALAMIN', 'Marie-Elisabeth', 'Rue de Monbrillant 33', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1122, 'SALMASSI', 0, 'SALMASSI', 'SALMASSI', 'Gisèle', 'Rue de la Poterie 35', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1123, 'SAMSON', 0, 'SAMSON', 'SAMSON', 'Mariane', 'Avenue des Lattes 27', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1124, 'SANDOULOFF', 0, 'SANDOULOFF', 'SANDOULOFF', 'Michel', 'Chemin du Pommier 34', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1125, 'SANDOZ', 0, 'SANDOZ', 'SANDOZ', 'Monique', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', '35.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1126, 'SANDRI', 0, 'SANDRI', 'SANDRI', 'Antonio', 'Avenue de Mategnin 61', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1127, 'SANSONETTI_Col', 0, 'SANSONETTI', 'SANSONETTI', 'Adelheld', 'Place de l\'Octroi 6', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1128, 'SARTORE', 0, 'SARTORE', 'SARTORE', 'Monique', 'Rue du Grand-Pré 4', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1129, 'SAUTEBIN', 0, 'SAUTEBIN', 'SAUTEBIN', 'Gilbert', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1130, 'SAUTHIER', 0, 'SAUTHIER', 'SAUTHIER', 'Michel', 'Cité Vieusseux 6', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1131, 'SCARAMELLA', 0, 'SCARAMELLA', 'SCARAMELLA', 'Anna-Maria', 'Route d-Ormaret 377', '74120', 'Demi Quartier', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1132, 'SCHAFER', 0, 'SCHAFER', 'SCHAFER', 'Marie-Thérèse', 'Rue Caroline 35', '1227', 'Les Acacias', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1133, 'SCHAFFNER', 0, 'SCHAFFNER', 'SCHAFFNER', 'Nelly', 'Rue Gilbert 8', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1134, 'SCHAFHEITLE_Col', 0, 'SCHAFHEITLE', 'SCHAFHEITLE', 'Renate', 'Chemin de la Montagne 124', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1135, 'SCHAR_Col', 0, 'SCHAR', 'SCHAR', 'Adolf', 'Chemin Colladon 7', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1136, 'SCHAYA', 0, 'SCHAYA', 'SCHAYA', 'Régine', 'Rue Albert-Gos 3', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1137, 'SCHENKEL', 0, 'SCHENKEL', 'SCHENKEL', 'Frédéric', 'Rue des Maraichers 10', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1138, 'SCHIERMANN', 0, 'SCHIERMANN', 'SCHIERMANN', 'Rosemarie', 'Avenue Wendt 58', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1139, 'SCHILLING', 0, 'SCHILLING', 'SCHILLING', 'Jean-Pierre', 'Route du Village 49', '1195', 'Bursinel', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1140, 'SCHINDLER', 0, 'SCHINDLER', 'SCHINDLER', 'Lliliane', 'Chemin de la Traille 21', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1141, 'SCHLOSSER', 0, 'SCHLOSSER', 'SCHLOSSER', 'Brigitte', 'Chemin de Saussac 41', '1256', 'Toinex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1142, 'SCHLUCHTER_Col', 0, 'SCHLUCHTER', 'SCHLUCHTER', 'Ursula', 'Chemin des Fraisiers 9', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1143, 'SCHMIDHAUSER', 0, 'SCHMIDHAUSER', 'SCHMIDHAUSER', 'Albert', 'Rue Giovanni-Gambini 3', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1144, 'SCHNEEBELI', 0, 'SCHNEEBELI-MUME', 'SCHNEEBELI-MUME', 'Vrenely Verena', 'Chemin de la Dode 12', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1145, 'SCHNEEBELI_Col', 0, 'SCHNEEBELI', 'SCHNEEBELI', 'Elsa', 'Avenue du Petit-Senn 9', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1146, 'SCHOFIELD', 0, 'SCHOFIELD', 'SCHOFIELD', 'Douglas', 'Chemin des Crêts-de-Champel 29', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1147, 'SCHONI_BAUDRILLARD', 0, 'SCHONI', 'SCHONI', 'Max', 'Avenue du Devin-Du-Village 10', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1148, 'SCHULTE_Col', 0, 'SCHULTE ELTE', 'SCHULTE ELTE', 'Edda', 'Chemin de Carabot 46', '1232', 'Confignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1149, 'SCHUWEY', 0, 'SCHUWEY', 'SCHUWEY', 'Jean', 'Route de Saint-Cergue 23', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1150, 'SCHWAB', 0, 'SCHWAB', 'SCHWAB', '', 'Rue de Vermont 13', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1151, 'SCHWAB_G', 0, 'SCHWAB', 'SCHWAB', 'Geneviève', 'Chemin du Fief-Du-Chapitre 1', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1152, 'SCHWAB_M', 0, 'SCHWAB', 'SCHWAB', 'Michèle', 'Avenue du Bois-de-La-Chapelle 59', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1153, 'SCHWARTZ_Col', 0, 'SCHWARTZ', 'SCHWARTZ', 'Nicolas', 'Chemin de Beau-Soleil 3', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1154, 'SCIOSCIA', 0, 'SCIOSCIA', 'SCIOSCIA', 'Angela', 'Rue Alberto-Giacometti 2', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1155, 'SEIFFERT_Col', 0, 'SEIFFERT', 'SEIFFERT', 'Erica', 'Résidence Colladon', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1156, 'SEILAZ_CAPT', 0, 'SEILAZ-CAPT', 'SEILAZ-CAPT', 'Claire-Lise', 'Chemin Tavernay 12', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1157, 'SEILER', 0, 'SEILER', 'SEILER', 'Adriana', 'Chemin De-la-Montagne 116', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1158, 'SELLEFYAN', 0, 'SELLEFYAN', 'SELLEFYAN', 'Yercanik', 'Avenue De-Budé 13', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1159, 'SENE', 0, 'SENE', 'SENE', 'Fatima', 'Chemin de l\'Abri 2', '1253', 'Vandoeuvres', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1160, 'SENN_Marcel', 0, 'SENN', 'SENN', 'Marcel', 'Rue de Saint-Jean 14', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1161, 'SEPPEY', 0, 'SEPPEY', 'SEPPEY', 'Isaline', 'Rue des Eaux-Vives 116', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1162, 'SERENO_Col', 0, 'SERENO', 'SERENO', 'Pascale', 'Rue Rodolphe-Toepffer 19', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1163, 'SERMONDADE', 0, 'SERMONDADE', 'SERMONDADE', 'Fernanda', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1164, 'SERVETTAZ', 0, 'SERVETTAZ', 'SERVETTAZ', 'Sabine', 'Rue Cavour 4', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1165, 'SERVOUZE', 0, 'SERVOUZE', 'SERVOUZE', 'Jeanne', 'Rue Camille-Cavour 4', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1166, 'SIDLER_JP', 0, 'SILDER', 'SILDER', 'Jean-Paul', 'Chemin du Sillon 4', '1256', 'Troinex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1167, 'SIEGRIST', 0, 'SIEGRIST', 'SIEGRIST', 'Marcelle', 'Rue Liotard 75', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1168, 'SIMOND-SERIS', 0, 'SIMOND-SERIS', 'SIMOND-SERIS', 'Angèle Emma', 'Rue du Vidollet 39', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1169, 'SIMONITSCH', 0, 'SIMONITSCH', 'SIMONITSCH', 'Silvia', 'Chemin des Fraisier 15', '1212', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1170, 'SLAVIVEC', 0, 'SLAVICEK', 'SLAVICEK', 'Jaroslav', 'Chemin des Champs Magnin 14', '1278', 'La Rippe', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1171, 'SLEKYTE_Col', 0, 'SLEKYTE', 'SLEKYTE', 'Silvia', 'Rue de la Tambourine 34', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1172, 'SMAZA_Col', 0, 'SMAZA-PETERER', 'SMAZA-PETERER', 'Marie', 'Chemin de la Gradelle 20bis', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1173, 'SMIT', 0, 'SMIT', 'SMIT', 'Peter', 'Chemin de Tavernay 8', '1218', 'Grand Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1174, 'SONCINI', 0, 'SONCINI', 'SONCINI', 'Giacomo', 'Chemin de Saule 107', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1175, 'SORDET', 0, 'SORDET', 'SORDET', 'Philippe', 'Chemin des Gentianes 9', '1264', 'St-Cergue', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1176, 'SOTIROFF', 0, 'SOTIROFF', 'SOTIROFF', 'Jacqueline', 'Parc du Château-Briquet 18', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1177, 'SOTTAS', 0, 'SOTTAS', 'SOTTAS', 'Claire', 'Avenue Ernest-Pictet 22', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1178, 'SPACK', 0, 'SPACK', 'SPACK', 'Esther', 'Cité Vieussieux 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1179, 'SPENGLER', 0, 'SPENGLER', 'SPENGLER', 'ANNICK', 'Square Clair-Martin 13', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1180, 'SPICHER', 0, 'SPICHER', 'SPICHER', 'Marie-Alice', 'Chemin des Deux-Communes 13', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1181, 'STAERKLE', 0, 'STAERKLE', 'STAERKLE', 'Etienne', 'Route d\'Avully 45', '1237', 'Avully', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1182, 'STAHLI', 0, 'STAHLI', 'STAHLI', 'Marie-Thérèse', 'Avenue Bois-De-La-Chapelle 67', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1183, 'STAMPLI', 0, 'STAMPFLI', 'STAMPFLI', 'Roland', 'Rue Antoine-Carteret 26', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1184, 'STAUB_Col', 0, 'STAUB', 'STAUB', 'Ulrica', 'Rue de la Coline 16', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1185, 'STAUFFER', 0, 'STAUFFER', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1186, 'STEFFEN', 0, 'STEFFEN', 'STEFFEN', 'Anne-Marie Louise', 'Rue de la Terrassière 52', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1187, 'STEINER', 0, 'STEINER', 'STEINER', 'Dora', 'Chemin de Joinville 8', '1216', 'Cointrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1188, 'STEINHAUSER', 0, 'STEINHAUSER', 'STEINHAUSER', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1189, 'STENGELE', 0, 'STENGELE', 'STENGELE', 'Florance', 'Chemin Salomon Penay 2', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1190, 'STETTLER', 0, 'STETTLER', 'STETTLER', 'Eugène', 'Avenue Eugène-Lance 48', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1191, 'STEVENS_BB', 0, 'STEVENS', 'STEVENS', 'Prescott', 'Avenue des Uttins 12', '1180', 'Rolle', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1192, 'STRIGINI', 0, 'STRIGINI', 'STRIGINI', 'Simone', 'Avenue du Gros-Chêne 50', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1193, 'STRUYE', 0, 'STRUYE', 'STRUYE', 'Jean', 'Chemin Frank-Thomas 104', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1194, 'STUDER', 0, 'STUDER', 'STUDER', 'Pierre', 'Avenue des Communes-Réunies  76', '1212', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1195, 'SUNTAY', 0, 'SUNTAY', 'SUNTAY', 'Murat', 'Chemin de Bellefontaine 18', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1196, 'SUSSLAND', 0, 'SUSSLAND', 'SUSSLAND', 'Willy', 'Avenue Krieg 9', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1197, 'SUTTER', 0, 'SUTTER', 'SUTTER', 'Pierre', 'Avenue de Gennecy 46', '1237', 'Avully', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1198, 'SUTTER_Rene', 0, 'SUTTER', 'SUTTER', 'René', 'Rue des Delices 21', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1199, 'SY', 0, 'SY', 'SY', 'Mamadou', 'Route d\'Ornex 35', '1239', 'Collex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1200, 'SZALAI', 0, 'SZALAI', 'SZALAI', 'Joseph', 'Rue de la Prulay 61', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1201, 'TABIBI', 0, 'TABIBI', 'TABIBI', 'Najiba', 'Chemin du Pommier 26', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1202, 'TADOADA', 0, 'TABOADA', 'TABOADA', '', 'Avenue Bois-de-la-Chappelle 63', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1203, 'TAGNARD_Col', 0, 'TAGNARD', 'TAGNARD', 'Françoise', 'Rue de l\'Athénée 4', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1204, 'TALLENBACH', 0, 'TALLENBACH', 'TALLENBACH', 'Rozalia-Maria', 'Boulevard du Pont-d\'Arve 7', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1205, 'TAPERNOUX', 0, 'TAPERNOUX', 'TAPERNOUX', 'Pauline', 'Rue Zurlinden 3', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1206, 'TAVEL', 0, 'TAVEL', 'TAVEL', 'Hubert', 'Chemin de Coudrée 12 bis', '1223', 'Cologny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1207, 'TEDJOSASMITO', 0, 'TEDJOSASMITO', 'TEDJOSASMITO', 'Sudjono', 'Rue de Contamines 26', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1208, 'TER BRUGGEN HUGENHOLTZ', 0, 'TER BRUGGEN HUGENHOLTZ', 'TER BRUGGEN HUGENHOLTZ', 'Lily', 'Avenue du Lignon 8', '1219', 'Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1209, 'TERRIZZI', 0, 'TERRIZZI', 'TERRIZZI', 'Giorgio', 'Rue de la Prulay 6', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1210, 'TEZA', 0, 'TEZA', 'TEZA', 'Jeanne', 'Rue du Village-Suisse 22', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1211, 'THEVENOZ', 0, 'THEVENOZ', 'THEVENOZ', 'Lucienne', 'Avenue de Champel 55', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1212, 'THOME', 0, 'THOMÉ', 'THOMÉ', 'Alice', 'Rue de la Calle 36', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1213, 'THORENS', 0, 'THORENS', 'THORENS', 'Léoni', 'Route du Vallon 16', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1214, 'TINKAS', 0, 'TINKAS', 'TINKAS', 'Heins', 'Chemin Rieu 15', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1215, 'TIREFORT', 0, 'TIREFORT', 'TIREFORT', 'Denise', 'Rue Jean-Violette 25', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1216, 'TOLBA', 0, 'TOLBA', 'TOLBA', 'Mostafa', 'Rue Louis-Curval 8', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1217, 'TOMISAWA_Col', 0, 'TOMISAWA', 'TOMISAWA', 'Luce-Léa', 'Chemin de la Rochette 15', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1218, 'TONINELLI', 0, 'TONINELLI', 'TONINELLI', 'Rosetta', 'Avenue de la Foretaille 10', '1292', 'Chambésy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1219, 'TOURNIER', 0, 'TOURNIER', 'TOURNIER', 'Isabelle', 'Avenue Krieg 3', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1220, 'TPNA', 0, 'SCALETTA', 'SCALETTA', 'Pietro', 'Chemin des Fraisiers 1', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Liste Patients', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1221, 'TRAN_Col', 0, 'TRAN', 'TRAN', 'Ngoc Mai', 'Rue du Quartier Neuf 7', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1222, 'TREMBLEY', 0, 'TREMBLEY', 'TREMBLEY', 'Jacques', 'Avenue de Champel 53', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1223, 'TRIBOULLER', 0, 'TRIBOULLER', 'TRIBOULLER', 'Boris', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '45.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1224, 'TROILLET', 0, 'TROILLET', 'TROILLET', 'Vanessa', 'Route de Chavornay 10', '1435', 'Essert-Pittet', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1225, 'TRUHAN', 0, 'TRUHAN', 'TRUHAN', 'Solange', 'Rue Jean Violette 3', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1226, 'TSCHAN', 0, 'TSCHAN', 'TSCHAN', 'Willy', 'Avenue Ernest-Pictet 22', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1227, 'TUNIK', 0, 'TUNIK', 'TUNIK', 'David', 'Avenue des Amazones 16', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1228, 'UBALDI', 0, 'UBALDI', 'UBALDI', 'Joséphine', 'Chemin de la grosse Pierre 4', '1110', 'Morges', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1229, 'UDRISARD', 0, 'UDRISARD', 'UDRISARD', 'Marguerite', 'Rue du Vidollet 12', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1230, 'ULBRICHT', 0, 'ULBRICHT', 'ULBRICHT', 'Jutta', 'Grand-Montfleury 16', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1231, 'VAENA', 0, 'VAËNA', 'VAËNA', 'Augusta', 'Avenue Bois-de-la-Chapelle 69', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1232, 'VALLELIAN_Col', 0, 'VALLELIAN', 'VALLELIAN', 'Gilbert', 'Boulevard des Prommenades 10', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1233, 'VALLOTTON_Col', 0, 'VALLOTTON DE VELEY', 'VALLOTTON DE VELEY', 'Rodolphe', 'Rue de la Rôtisserie 6', '1211', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1234, 'VALMONT', 0, 'VALMONT', '', 'du service comptable', 'Route de Valmont 22', '1823', 'Glion', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1235, 'VAN_DERMEER', 0, 'VAN_DERMEER', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1236, 'VAN_MOPPES', 0, 'VAN MOPPES', 'VAN MOPPES', '', 'Rue Michel-Chauvet 15', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1237, 'VAN_VLAANDEREN', 0, 'VAN VLAANDEREN', 'VAN VLAANDEREN', 'Chantal', 'Chemin de Botterel 4', '1222', 'Vésenaz', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1238, 'VANDEWARDT', 0, 'VAN DE WARDT', 'VAN DE WARDT', 'Geurt', 'Rue des Bossons 24', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1239, 'VAUCHER_Col', 0, 'VAUCHER', 'VAUCHER', 'Michel', 'Chemin Rournil 1', '1246', 'Corsier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1240, 'VENGETO', 0, 'VENGETO', 'VENGETO', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1241, 'VENTURI', 0, 'VENTURI', 'VENTURI', 'Michel', 'Avenue des Cavaliers 7', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, 'Code : 5609 A', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1242, 'VERNAY_Col', 0, 'VERNAY', 'VERNAY', 'Jo-Pierre', 'Rue Peillonnex 3', '1225', 'Chêne-Bourg', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1243, 'VETTER_Col', 0, 'VETTER', 'VETTER', 'Claire', 'Avenue de Trembley 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1244, 'VEUTHEY', 0, 'VEUTHEY', 'VEUTHEY', 'Fernande', 'Avenue de Feuillasse 1', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1245, 'VIDONNE', 0, 'VIDONNE', 'VIDONNE', 'Christiane', 'Chemin des Vers 11', '1228', 'Plan-Les-Ouates', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1246, 'VIDONNE_P', 0, 'VIDONNE', 'VIDONNE', 'Pierrette', 'Chemin de la Vendée 1', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1247, 'VIERA', 0, 'VIERA', 'VIERA', 'Veremunda', 'Avenue Edmond Vaucher 35', '1219', 'Aire', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1248, 'VIGNY_Col', 0, 'VIGNY', 'VIGNY', 'Claude-Lyne', 'Route Alphonse Ferrand 5', '1233', 'Bernex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1249, 'VINCENT', 0, 'VINCENT', 'VINCENT', 'Marie-Antoinette', 'Chemin de la Chevillarde 9', '1208', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1250, 'VINZIO', 0, 'VINZIO', 'VINZIO', 'Raymond', 'Rue Baudit 8', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1251, 'VITALE_Col', 0, 'VITALE', 'VITALE', 'Bruno', 'Rue des Gares 27', '1201', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1252, 'VITTOZ_Col', 0, 'VITTOZ', 'VITTOZ', 'Marie-Louise', 'Rue Gilbert 30', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1253, 'VODOZ', 0, 'VODOZ', 'VODOZ', 'Jean', 'Chemin des Verjus 17', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1254, 'VOGT', 0, 'VOGT', 'VOGT', 'Béatrice', 'Avenue De-Luserna 34', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1255, 'VOLKI', 0, 'VOLKI', 'VOLKI', 'Jeanine', 'Avenue du Lignon 57', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1256, 'VON_WARTENSLEBEN_Col', 0, 'VON WARTENSLEBEN', 'VON WARTENSLEBEN', 'Aurélie', 'Chemin François Lehmann 24', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1257, 'VOUILLAMOZ', 0, 'VOUILLAMOZ', 'VOUILLAMOZ', 'Marcelle', 'Chemin Beau-Soleil 34', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1258, 'VOUILLAMOZ_Col', 0, 'VOUILLAMOZ', 'VOUILLAMOZ', '', 'Rue Jean-Robert-Chouet 9', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1259, 'VUAGNAT', 0, 'VUAGNAT', 'VUAGNAT', 'Marie-Anne', 'Chemin de Combarat 2', '1283', 'Dardagny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1260, 'VUICHARD_Col', 0, 'VUICHARD', 'VUICHARD', 'René', 'Avenue Trembley 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1261, 'VUILLAMY_Col', 0, 'VUILLAMY', 'VUILLAMY', 'Andrée', 'Rue de Genève 119', '1226', 'Thônex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1262, 'VUILLEUMIER_Col', 0, 'VUILLEUMIER', 'VUILLEUMIER', 'Jean', 'Avenue de Champel 28', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1263, 'VUILLEUMIER_Thér', 0, 'VUILLEUMIER', 'VUILLEUMIER', 'Thérèse', 'Route de Meyrin 7', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1264, 'WAEBER', 0, 'WAEBER', 'WAEBER', 'Carmen', 'Avenue des Morgines 29', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1265, 'WAGENKNECHT_Luc', 0, 'WAGENKNECHT', 'WAGENKNECHT', 'Luc', 'Chemin du Facteur 11', '1288', 'Aire-la-Ville', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1266, 'WAGENKNECHT_Mme', 0, 'WAGENKNECHT', 'WAGENKNECHT', 'Arielle', 'Chemin du Facteur 11', '1288', 'Aire-la-Ville', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1267, 'WASSEUR', 0, 'WASSEUR', 'WASSEUR', 'Christian', 'Avenue du Petit-Lancy 29', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1268, 'WEBER_Col', 0, 'WEBER-FONTAINE', 'WEBER-FONTAINE', 'Renée-Claire', 'Route de la Chapelle 14E', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1269, 'WEBER_Irène_Col', 0, 'WEBER', 'WEBER', 'Irène', 'Route du Vallon 41', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1270, 'WEBER_Madelaine_Col', 0, 'WEBER', 'WEBER', 'Madelaine', 'Avenue de Beau-Séjour 21', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1271, 'WEIGEL', 0, 'WEIGEL', 'WEIGEL', 'Brigitte', 'Avenue De-Budé 33', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1272, 'WEIGEL_Col', 0, 'WEIGEL', 'WEIGEL', 'Brigitte', 'Avenue de Budé 33', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1273, 'WEIL', 0, 'WEIL', 'WEIL', 'Joanne', 'Chemin Tavernay 17', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1274, 'WENK', 0, 'WENK', 'WENK', 'Brian', 'Route des Alpes 435A', '01280', 'Prévessin-Moëns', 'France', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1275, 'WERNLI_Col', 0, 'WERNLI', 'WERNLI', 'Fieda', 'Rue Lamartine 11 A', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1276, 'WIDMER_BB', 0, 'WIDMER', 'WIDMER', 'Hilde', 'Route du Reposoir 1', '1260', 'Nyon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1277, 'WINK', 0, 'WINK', 'WINK', 'Renée', 'Chemin de la Vendée 29', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1278, 'WINKELMANN_Col', 0, 'WINKELMANN', 'WINKELMANN', 'Alain', 'Avenue de Champel 35', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1279, 'WIRTH_SCHYRR', 0, 'WIRTH-SCHYRR', 'WIRTH-SCHYRR', 'Marie-Dominique', 'Rue des Lattes 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1280, 'WOLF', 0, 'WOLF', 'WOLF', 'Christa', 'Avenue Eugène-Lance 50', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1281, 'WOLTZ', 0, 'WOLTZ', 'WOLTZ', 'Thérèsa', 'Chemin Frarnçois Lehmann 22', '1218', 'Le Grand-Saconnex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1282, 'WORTLEY_Col', 0, 'WORTLEY', 'WORTLEY', 'Anne-Marie', 'Chemin de la Gradelle 36', '1224', 'Chêne-Bougeries', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1283, 'WRAIGHT', 0, 'WRAIGHT', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1284, 'WUICHET', 0, 'WUICHET', 'WUICHET', 'Marcel', 'Boulevard des Prommenades 4', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1285, 'WÜNSCHE', 0, 'WÜNSCHE', 'WÜNSCHE', 'Suzanne', 'Chemin des Avettes 17', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1286, 'ZAGNI', 0, 'ZAGNI', 'ZAGNI', 'Anne-Marie', 'Avenue J.-D. Maillard 7', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1287, 'ZAHNO', 0, 'ZAHNO', 'ZAHNO', 'Lucie', 'Rue de la Calle 21', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1288, 'ZAMBELLI', 0, 'ZAMBELLI', 'ZAMBELLI', 'Georges', 'Rue Saint-Victor 5', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1289, 'ZANETTA', 0, 'ZANETTA', 'ZANETTA', 'Hubert', 'Rue des Bossons 26', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1290, 'ZANIN_Col', 0, 'ZANIN', 'ZANIN', 'Umberto', 'Rue de Montchoisy 2', '1207', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1291, 'ZANONI', 0, 'ZANONI', 'ZANONI', 'Yvonne', 'Chemin des Fraisiers 35', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1292, 'ZAUGG', 0, 'ZAUGG', 'ZAUGG', 'René', 'Route de Covéry 3', '1252', 'Meinier', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1293, 'ZAZONE', 0, 'ZAZONE', 'ZAZONE', 'Eliane', 'Avenue Cardinal-Mermillod 3', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1294, 'ZEYER', 0, 'ZEYER', 'ZEYER', 'Marie-Thérèse', 'Chemin Briquet 24', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1295, 'ZILLWEGER', 0, 'ZILLWEGER', 'ZILLWEGER', 'Irène', 'Route de Saint-Julien 82', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1296, 'ZIMMERMANN_Col', 0, 'ZIMMERMANN', 'ZIMMERMANN', 'Françoise', 'Place du Marché 7', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1297, 'ZUPPONI', 0, 'ZUPPONI', 'ZUPPONI', 'Mario', 'Chemin de Conches 38', '1231', 'Conches', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1298, 'ZURCHER', 0, 'ZURCHER', 'ZURCHER', 'Hans', 'Rue de la Prulay 29', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1299, 'ZYS', 0, 'ZYS', 'ZYS', 'Danuta', 'Rue de Lausanne 143', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1300, 'MUNSPERGER_Mme', 0, 'MUNDSPERGER', 'MUNDSPERGER', 'Sieglinde', 'Avenue François-Besson 20', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1301, 'MAGNIN_B', 0, 'MAGNIN', 'MAGNIN', 'Brigitte', 'Chemin de la Vendée 1', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1302, 'PRINS', 0, 'PRINS', 'PRINS', 'Lilian', 'chemin des Crêts-de-Champel 18', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1303, 'BERNARD', 0, 'BERNARD', 'BERNARD', 'Viviane Martine', 'Rue des Charmilles 1', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1304, 'KNAPP_DEPERAZ', 0, 'KNAPP-DEPERAZ', 'KNAPP-DEPERAZ', 'Janine', 'EMS Les Hauts d\'anières / Chemin des Courbes 9', '1247', 'Anières', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1305, 'FOGLI', 0, 'FOGLI', 'FOGLI', 'Pierre', '120 Avenue de l\'Aqueduc Bat b 120', '01220', 'Divonne les Bains', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1306, 'GANDER', 0, 'GANDER', 'GANDER', 'Mathilde', 'Chemin de Pont César 32', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1307, 'SANZ_DE_ACEDO', 0, 'SANZ DE ACEDO', 'SANZ DE ACEDO', 'Dominique', 'EMS Les Hauts d\'Anières Chemin des Courbes 9', '1247', 'Anières', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1308, 'RYSER', 0, 'RYSER', 'RYSER', 'Sabine', 'Avenue du Lignon 50', '1219', 'Le Lignon', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1309, 'BORY', 0, 'BORY', 'BORY', 'Annelise', 'Rue Grand-Montfleury 30', '1290', 'Versoix', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1310, 'BONNET', 0, 'BONNET', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1311, 'GRILLET', 0, 'GRILLET', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1312, 'BENDER', 0, 'BENDER', 'BENDER', 'Marie-Madeleine', 'Rue Beauregard 1', '1204', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1313, 'GEX', 0, 'GEX', 'GEX', 'Milada', 'Boulevard de la Cluse 55', '1205', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1314, 'PERREAU_DE_LAUNAY', 0, 'PERREAU_DE_LAUNAY', 'PERREAU_DE_LAUNAY', 'Rose-Hélène', 'Chemin du Champ-d\'Anier 13', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1315, 'VITTAL', 0, 'VITTAL', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1316, 'QUILGARS', 0, 'QUILGARS', 'QUILGARS', 'Annie', 'Chemin du Champ-d\'Anier 12', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1317, 'DENTZ', 0, 'DENTZ', 'DENTZ', 'Martial', 'Avenue du Petit-Lancy 12', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1318, 'PETRI', 0, 'PETRI', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1319, 'STROBEL', 0, 'STROBEL', 'STROBEL', 'Hannelore', 'Avenue De-Warens 8', '1203', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1320, 'NAGELI', 0, 'NAGELI', 'NAGELI', 'Catherine', 'Rue de la Poterie 20', '1202', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1321, 'BERNER-COCHARD', 0, 'BERNER-COCHARD', 'BERNER-COCHARD', 'Jacqueline', 'Chemin Adolphe Pasteur 10', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1322, 'MABILE', 0, 'MABILE', 'MABILE', 'Maria', 'Avenue du Curé Baud 51', '1212', 'Grand-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1323, 'MERGUIN-PONCET_Col', 0, 'MERGUIN-PONCET', 'MERGUIN-PONCET', 'Jacqueline', 'Chemin Moïse-Duboule 39', '1209', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1324, 'RUEFF', 0, 'RUEFF', 'RUEFF', 'René', 'Rue de la Golette 5C', '1217', 'Meyrin', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1325, 'SPRENG', 0, 'SPRENG', 'SPRENG', 'Magaly', 'Avenue du Bois de la Chapelle 59', '1213', 'Onex', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1326, 'FRENTZEL_Col', 0, 'FRENTZEL', 'FRENTZEL', 'Ulrike', 'Avenue Calas 5', '1206', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1327, 'ALKABES', 0, 'ALKABES', 'ALKABES', 'Sybille', 'Rue du Grand-Pré 26 A', '1299', 'Crans-près-Céligny', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1328, 'PARISI', 0, 'PARISI', 'PARISI', 'Jeanne', 'Chemin du Bac 14', '1213', 'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1329, 'BERGER', 0, 'BERGER', 'BERGER', 'Nicole', 'Rue Caroline 14', '1227', 'Carouge', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1330, 'MAURER_PERROUD', 0, 'MAURER-PERROUD', 'MAURER-PERROUD', 'Louise', 'Avenue des Morgines 21', '1213',
         'Petit-Lancy', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1331, 'PAKENHAM', 0, 'PAKENHAM', 'PAKENHAM', 'Patrick', 'Avenue De-Budé 2', '1202', 'Genève', 'Suisse', '0.00', '',
   '', 'Standard', 0, '', '0000-00-00', '0000-00-00 00:00:00', ''),
  (1332, 'BEZENCON', 0, 'BEZENCON', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00',
   '0000-00-00 00:00:00', ''),
  (1333, 'SPIMOZDO', 0, 'SPIMOZDO', '', '', '', '', 'Genève', 'Suisse', '0.00', '', '', 'Standard', 0, '', '0000-00-00',
   '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transport_programming`
--

CREATE TABLE `transport_programming` (
  `id`                     INT(11) UNSIGNED NOT NULL,
  `validated_chauffeur`    TINYINT(1)       NOT NULL DEFAULT '0',
  `validated_mgr`          TINYINT(1)       NOT NULL DEFAULT '0',
  `validated_final`        TINYINT(1)       NOT NULL DEFAULT '0',
  `course_date`            DATE                      DEFAULT NULL,
  `model_id`               INT(11) UNSIGNED          DEFAULT NULL,
  `client_id`              INT(11) UNSIGNED          DEFAULT NULL,
  `pseudo`                 VARCHAR(50)               DEFAULT NULL,
  `pseudo_autres`          VARCHAR(50)               DEFAULT NULL,
  `heure`                  VARCHAR(5)       NOT NULL,
  `drive_mode`             TINYINT(1)       NOT NULL DEFAULT '0',
  `aller_retour`           TINYINT(1)       NOT NULL DEFAULT '0',
  `appel`                  TINYINT(1)       NOT NULL DEFAULT '0',
  `aller_retour_origin_id` INT(11)          NOT NULL DEFAULT '0',
  `retour_appel`           TINYINT(1)       NOT NULL DEFAULT '0',
  `aller_appel`            TINYINT(1)       NOT NULL DEFAULT '0',
  `chauffeur_id`           INT(11) UNSIGNED          DEFAULT NULL,
  `depart`                 VARCHAR(70)               DEFAULT NULL,
  `arrivee`                VARCHAR(70)               DEFAULT NULL,
  `end_drive`              DATETIME                  DEFAULT NULL,
  `start_drive`            DATETIME                  DEFAULT NULL,
  `type_transport_id`      INT(11) UNSIGNED NOT NULL,
  `nom_patient`            VARCHAR(60)               DEFAULT NULL,
  `bon_no`                 VARCHAR(60)               DEFAULT NULL,
  `prix_course`            DECIMAL(10, 2)            DEFAULT '0.00',
  `remarque`               TEXT,
  `input_date`             DATE                      DEFAULT NULL,
  `modification_time`      TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `username`               VARCHAR(20)               DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transport_programming`
--

INSERT INTO `transport_programming` (`id`, `validated_chauffeur`, `validated_mgr`, `validated_final`, `course_date`, `model_id`, `client_id`, `pseudo`, `pseudo_autres`, `heure`, `drive_mode`, `aller_retour`, `appel`, `aller_retour_origin_id`, `retour_appel`, `aller_appel`, `chauffeur_id`, `depart`, `arrivee`, `end_drive`, `start_drive`, `type_transport_id`, `nom_patient`, `bon_no`, `prix_course`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (1, 0, 0, 0, '2017-05-07', 1, 244, 'ABBE', '', '09:00', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', NULL, NULL, 1, '', '',
   '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (2, 0, 0, 0, '2017-05-07', 2, 245, 'ABDALLA', '', '16:34', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', NULL, NULL, 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (3, 0, 0, 0, '2017-05-07', 4, 262, 'ANDERSSON_Col', '', '17:40', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', NULL, NULL, 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (4, 0, 0, 0, '2017-05-09', 0, 247, 'ABRAHAM_Col', '', '21:00', 0, 0, 0, 0, 1, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-10', '0000-00-00 00:00:00', NULL),
  (5, 0, 0, 0, '2017-05-07', 7, 247, 'ABRAHAM_Col', '', '15:32', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', NULL, NULL, 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (6, 1, 0, 0, '2017-05-08', 8, 247, 'ABRAHAM_Col', '', '19:34', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (7, 0, 0, 0, '2017-05-07', 9, 245, 'ABDALLA', '', '08:20', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', NULL, NULL, 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (8, 0, 0, 0, '2017-05-07', 11, 13, 'NAFISSPOUR', '', '15:03', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (9, 0, 0, 0, '2017-05-08', 12, 13, 'NAFISSPOUR', '', '11:29', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-07', '0000-00-00 00:00:00', NULL),
  (10, 0, 0, 0, '2017-05-08', 1, 244, 'ABBE', '', '16:59', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (11, 0, 0, 0, '2017-05-10', 2, 245, 'ABDALLA', '', '13:33', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (12, 0, 0, 0, '2017-05-10', 0, 262, 'ANDERSSON_Col', '', '22:55', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-10', '0000-00-00 00:00:00', NULL),
  (13, 1, 0, 0, '2017-05-10', 0, 247, 'ABRAHAM_Col', '', '13:23', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-10', '0000-00-00 00:00:00', NULL),
  (14, 0, 0, 0, '2017-05-08', 7, 247, 'ABRAHAM_Col', '', '22:43', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (15, 0, 0, 0, '2017-05-08', 8, 247, 'ABRAHAM_Col', '', '10:49', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (16, 0, 0, 0, '2017-05-08', 9, 245, 'ABDALLA', '', '08:20', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (17, 0, 0, 0, '2017-05-08', 11, 13, 'NAFISSPOUR', '', '11:18', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (18, 0, 0, 0, '2017-05-08', 12, 13, 'NAFISSPOUR', '', '07:22', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (19, 0, 0, 0, '2017-05-08', 0, 244, 'ABBE', '', '09:00', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-11', '0000-00-00 00:00:00', NULL),
  (20, 0, 0, 0, '2017-05-08', 2, 245, 'ABDALLA', '', '16:34', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (21, 0, 0, 0, '2017-05-08', 4, 262, 'ANDERSSON_Col', '', '17:40', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (22, 0, 0, 0, '2017-05-08', 6, 247, 'ABRAHAM_Col', '', '07:30', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (23, 0, 0, 0, '2017-05-08', 7, 247, 'ABRAHAM_Col', '', '21:54', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (24, 0, 0, 0, '2017-05-08', 8, 247, 'ABRAHAM_Col', '', '08:05', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (25, 0, 0, 0, '2017-05-08', 9, 245, 'ABDALLA', '', '08:20', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (26, 0, 0, 0, '2017-05-08', 11, 13, 'NAFISSPOUR', '', '21:44', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-08', '0000-00-00 00:00:00', NULL),
  (27, 0, 0, 0, '2017-05-08', 0, 13, 'NAFISSPOUR', '', '23:35', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-11', '0000-00-00 00:00:00', NULL),
  (28, 0, 0, 0, '2017-05-10', 0, 244, 'ABBE', '', '14:33', 0, 0, 0, 0, 0, 0, 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-10', '0000-00-00 00:00:00', NULL),
  (42, 0, 0, 0, '2017-05-10', 0, 245, 'ABDALLA', '', '18:00', 0, 0, 0, 0, 0, 0, 1, 'depart', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-11', '0000-00-00 00:00:00', NULL),
  (47, 0, 0, 0, '2017-05-12', 0, 245, 'ABDALLA', '', '03:10', 0, 1, 0, 0, 0, 0, 22, 'Domicile', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-12', '0000-00-00 00:00:00', NULL),
  (48, 0, 0, 0, '2017-05-12', 0, 244, 'ABBE', '', '03:27', 1, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '2017-05-12 14:21:00', 1, '', '', '0.01', '', '2017-05-12', '0000-00-00 00:00:00', NULL),
  (49, 0, 0, 0, '2017-05-09', 10, 13, 'NAFISSPOUR', '', '04:35', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (50, 0, 0, 0, '2017-05-09', 10, 13, 'NAFISSPOUR', '', '04:35', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (51, 0, 0, 0, '2017-05-13', 1, 244, 'ABBE', '', '09:00', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (52, 0, 0, 0, '2017-05-13', 2, 245, 'ABDALLA', '', '16:34', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (53, 0, 0, 0, '2017-05-13', 4, 262, 'ANDERSSON_Col', '', '17:40', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (54, 0, 0, 0, '2017-05-13', 6, 247, 'ABRAHAM_Col', '', '07:30', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (55, 0, 0, 0, '2017-05-13', 7, 247, 'ABRAHAM_Col', '', '07:05', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (56, 0, 0, 0, '2017-05-13', 8, 247, 'ABRAHAM_Col', '', '08:05', 0, 0, 0, 0, 0, 0, 1, 'Domicile', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (57, 0, 0, 0, '2017-05-13', 9, 245, 'ABDALLA', '', '08:20', 0, 0, 0, 0, 0, 0, 1, 'depart', 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL),
  (58, 0, 0, 0, '2017-05-13', 0, 13, 'NAFISSPOUR', '', '04:35', 0, 0, 0, 0, 0, 0, 1, 'helloxxxxxxxxxxxxxx', 'kamranv hztfxxxxxdd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', ''),
  (59, 0, 0, 0, '2017-05-13', 12, 13, 'NAFISSPOUR', '', '23:35', 0, 0, 0, 0, 0, 0, 1, 'cc', 'arrivee',
                                                                    '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '',
   '', '0.00', '', '2017-05-13', '0000-00-00 00:00:00', NULL);

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
  `appel`             TINYINT(1)       NOT NULL DEFAULT '0',
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

--
-- Dumping data for table `transport_programming_model`
--

INSERT INTO `transport_programming_model` (`id`, `visible`, `week_day_rank_id`, `client_habituel`, `client_id`, `heure`, `inverse_address`, `depart`, `arrivee`, `appel`, `prix_course`, `chauffeur_id`, `type_transport_id`, `remarque`, `input_date`, `modification_time`, `username`)
VALUES
  (1, 1, 1, 1, 244, '09:00:00.00000', 0, 'Domicile', 'ddd', 0, '0.00', 1, 1, '', '2017-05-05', '2017-05-05 01:11:14',
   'kamy'),
  (2, 1, 1, 1, 245, '16:34:00.00000', 0, 'depart', 'ddd', 0, '0.00', 1, 1, '', '2017-05-05', '2017-05-05 00:53:34', 'kamy'),
  (3, 1, 5, 1, 250, '17:41:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 1, 1, '', '2017-05-05', '2017-05-05 00:54:04', 'kamy'),
  (4, 1, 1, 1, 262, '17:40:00.00000', 0, 'Domicile', 'ddd', 0, '0.00', 1, 1, '', '2017-05-05', '2017-05-06 06:20:25', 'kamy'),
  (5, 1, 3, 1, 13, '04:35:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 1, 1, '', '2017-05-05', '2017-05-05 00:55:10', 'kamy'),
  (6, 1, 1, 1, 247, '07:30:00.00000', 0, 'Domicile', 'ddd', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 05:24:32', 'kamy'),
  (7, 1, 1, 1, 247, '07:05:00.00000', 0, 'Domicile', 'ddd', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 05:27:15', 'kamy'),
  (8, 1, 1, 1, 247, '08:05:00.00000', 0, 'Domicile', 'ddd', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 05:51:20', 'kamy'),
  (9, 1, 1, 1, 245, '08:20:00.00000', 0, 'depart', 'ddd', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 06:20:12', 'kamy'),
  (10, 0, 2, 1, 13, '04:35:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-07 13:28:36', 'kamy'),
  (11, 1, 1, 1, 13, '04:35:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 06:20:56', 'kamy'),
  (12, 1, 1, 1, 13, '23:35:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 1, 1, '', '2017-05-06', '2017-05-06 06:22:13',
   'kamy'),
  (13, 1, 6, 1, 13, '09:05:00.00000', 0, 'cc', 'arrivee', 0, '0.00', 21, 1, '', '2017-05-06', '2017-05-06 19:53:08',
   'kamy');

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

INSERT INTO `transport_type` (`id`, `type_transport`, `input_date`, `modification_time`, `username`) VALUES
  (1, 'standard', '2017-04-05', '2017-04-05 02:52:53', 'kamy'),
  (2, 'Cash', '2017-05-03', '2017-05-03 21:45:24', 'kamy'),
  (3, 'Liste Patients', '2017-05-03', '2017-05-03 21:45:24', 'kamy'),
  (4, 'Sang', '2017-05-03', '2017-05-03 21:45:24', 'kamy');

-- --------------------------------------------------------

--
-- Table structure for table `transport_type_facturation`
--

CREATE TABLE `transport_type_facturation` (
  `id`                      INT(11) UNSIGNED NOT NULL,
  `type_facturation`        VARCHAR(255)     NOT NULL,
  `type_facture_nom`        VARCHAR(255)     NOT NULL,
  `report_name_facturation` VARCHAR(255)     NOT NULL,
  `rank`                    INT(11)          NOT NULL DEFAULT '500',
  `comment`                 TEXT,
  `username`                VARCHAR(255)     NOT NULL,
  `input_date`              TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_time`       TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_type_pricing`
--

CREATE TABLE `transport_type_pricing` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `type_pricing`      VARCHAR(255)     NOT NULL,
  `type_pricing_nom`  VARCHAR(255)     NOT NULL,
  `rank`              INT(11)          NOT NULL DEFAULT '500',
  `comment`           TEXT,
  `username`          VARCHAR(255)     NOT NULL,
  `input_date`        TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport_zone`
--

CREATE TABLE `transport_zone` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `zone`              VARCHAR(255)     NOT NULL,
  `zone_exception`    VARCHAR(255)              DEFAULT NULL,
  `rank`              INT(11)          NOT NULL DEFAULT '1',
  `comment`           TEXT,
  `username`          VARCHAR(255)     NOT NULL,
  `input_date`        DATE             NOT NULL,
  `modification_time` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Adresse`
--

CREATE TABLE `T_Adresse` (
  `id`    INT(11) UNSIGNED NOT NULL,
  `Annee` INT(11) UNSIGNED NOT NULL,
  `De_A`  VARCHAR(255)     NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Aller_Retour`
--

CREATE TABLE `T_Aller_Retour` (
  `id`              INT(11) UNSIGNED NOT NULL,
  `Aller_Retour`    VARCHAR(255)     NOT NULL,
  `Aller_Retour_ID` INT(11) UNSIGNED NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Chauffeur`
--

CREATE TABLE `T_Chauffeur` (
  `id`           INT(11) UNSIGNED NOT NULL,
  `Chauffeur_ID` INT(11) UNSIGNED NOT NULL,
  `Chauffeur`    VARCHAR(255)     NOT NULL,
  `Company`      VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Frequence_Facturation`
--

CREATE TABLE `T_Frequence_Facturation` (
  `id`                         INT(11) UNSIGNED NOT NULL,
  `FrequenceID`                INT(11) UNSIGNED NOT NULL,
  `Frequence_Facturation`      VARCHAR(255)     NOT NULL,
  `Note_Frequence_Facturation` VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Genre`
--

CREATE TABLE `T_Genre` (
  `id`       INT(11) UNSIGNED NOT NULL,
  `Genre_ID` INT(11) UNSIGNED NOT NULL,
  `Genre`    VARCHAR(255) DEFAULT NULL,
  `Genre1`   VARCHAR(255) DEFAULT NULL,
  `Genre2`   VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Heure`
--

CREATE TABLE `T_Heure` (
  `id`           INT(11) UNSIGNED NOT NULL,
  `Heure`        VARCHAR(255)     NOT NULL,
  `Heure_format` TIME DEFAULT '08:00:00',
  `Heure_ID`     INT(11) UNSIGNED NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Pays`
--

CREATE TABLE `T_Pays` (
  `id`      INT(11) UNSIGNED NOT NULL,
  `Pays`    VARCHAR(255)     NOT NULL,
  `Pays_ID` INT(11) UNSIGNED NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Prix_Course`
--

CREATE TABLE `T_Prix_Course` (
  `id`             INT(11) UNSIGNED NOT NULL,
  `Prix_Course`    DECIMAL(10, 2) DEFAULT '0.00',
  `Prix_Course_ID` INT(11) UNSIGNED NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Type_Facturation`
--

CREATE TABLE `T_Type_Facturation` (
  `id`                    INT(11) UNSIGNED NOT NULL,
  `TypeFacturationID`     INT(11) UNSIGNED NOT NULL,
  `Type_Facturation`      VARCHAR(255) DEFAULT NULL,
  `TypeFactureNom`        VARCHAR(255) DEFAULT NULL,
  `ReportNameFacturation` VARCHAR(255) DEFAULT NULL,
  `Note_Type_Facturation` VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Type_Transport`
--

CREATE TABLE `T_Type_Transport` (
  `id`                INT(11) UNSIGNED NOT NULL,
  `Type_Transport_ID` INT(11) UNSIGNED NOT NULL,
  `Type_Transport`    VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Table structure for table `T_Ville`
--

CREATE TABLE `T_Ville` (
  `id`       INT(11) UNSIGNED NOT NULL,
  `Ville`    VARCHAR(255)     NOT NULL,
  `Ville_ID` INT(11) UNSIGNED NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

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

INSERT INTO `users` (`id`, `username`, `hashed_password`, `nom`, `email`, `user_type`, `user_type_id`, `first_name`, `last_name`, `user_image`, `reset_token`, `block_user`, `unread_message`, `unread_notification`, `address`, `cp`, `city`, `country`, `phone`, `mobile`, `input_date`)
VALUES
  (1, 'admin', '$2y$10$ODU3MGE4MWI4ODc5ZWNjZeBb7xpadu0zGQzdMkk9IqeF1UE8a44bK', 'admin', 'webmaster@ikamy.ch', 'admin',
      1, '', '', 'kamy01.JPG', '', 0, 0, 0, '', '', '', '', '', '', '2015-09-17 21:10:25'),
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
                                                                                                                    '2016-04-02 19:32:55'),
  (3, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch',
      'employee', 4, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 21:10:25'),
  (4, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com',
      'manager', 2, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-17 21:10:25'),
  (5, 'gmail', '$2y$10$Zjk1YzgxMjY1MmU3ODY1Mueclgm6AKXXH4OBRRnoU/WTfvHs7q1uC', 'Kamy employee',
      'kamran.nafisspour@gmail.com', 'visitor', 6, 'Kamran', 'Gmail', '', '', 0, 0, 0, '68 rue des Vollandes', '1207',
                                                                              'Geneva', 'Switzerland',
                                                                              '+41 22 735 01 20', '+41 79 350 21 32',
                                                                              '2015-09-17 21:10:25'),
  (28, 'Captainbraliaji', '$2y$10$NDcyNDViYTc3NmZkMWEyZe7C5VEZrhtcG5Ll19DDPVrZW65Nyt/vi', 'Bralia Bral',
       'bralia@wanadoo.fr', 'visitor', 5, 'Bralia', 'Bral', 'bralia.PNG', '', 0, 0, 0, '', '', '', '', '', '',
                                                                              '2016-05-26 19:05:47'),
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

INSERT INTO `user_type` (`id`, `user_type`, `comment`) VALUES
  (1, 'admin', NULL),
  (2, 'manager', NULL),
  (3, 'secretary', NULL),
  (4, 'employee', NULL),
  (5, 'visitor', NULL),
  (6, 'chauffeur', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist_ip`
--
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
-- Indexes for table `'DataBaseClient`
--
ALTER TABLE `DataBaseClient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Pseudo` (`Pseudo`);

--
-- Indexes for table `DatabaseCourse`
--
ALTER TABLE `DatabaseCourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DatabaseCourse_Programe`
--
ALTER TABLE `DatabaseCourse_Programe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DataBaseFacturation`
--
ALTER TABLE `DataBaseFacturation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DatabasePaiement`
--
ALTER TABLE `DatabasePaiement`
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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `message_ibfk_1` (`user_id`);

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
-- Indexes for table `transport_addresse`
--
ALTER TABLE `transport_addresse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adresse` (`adresse`),
  ADD UNIQUE KEY `zone` (`zone`),
  ADD KEY `transport_addresse_ibfk_3` (`zone_id`);

--
-- Indexes for table `transport_article`
--
ALTER TABLE `transport_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zone_nom` (`zone_nom`),
  ADD KEY `transport_article_ibfk_1` (`currency_id`),
  ADD KEY `transport_article_ibfk_2` (`zone_depart_id`),
  ADD KEY `transport_article_ibfk_3` (`zone_arrivee_id`);

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
-- Indexes for table `transport_type_facturation`
--
ALTER TABLE `transport_type_facturation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_facturation` (`type_facturation`),
  ADD UNIQUE KEY `type_facture_nom` (`type_facture_nom`),
  ADD UNIQUE KEY `report_name_facturation` (`report_name_facturation`);

--
-- Indexes for table `transport_type_pricing`
--
ALTER TABLE `transport_type_pricing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_pricing` (`type_pricing`),
  ADD UNIQUE KEY `type_pricing_nom` (`type_pricing_nom`);

--
-- Indexes for table `transport_zone`
--
ALTER TABLE `transport_zone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zone` (`zone`);

--
-- Indexes for table `T_Adresse`
--
ALTER TABLE `T_Adresse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `De_A` (`De_A`);

--
-- Indexes for table `T_Aller_Retour`
--
ALTER TABLE `T_Aller_Retour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Aller_Retour` (`Aller_Retour`);

--
-- Indexes for table `T_Chauffeur`
--
ALTER TABLE `T_Chauffeur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Chauffeur` (`Chauffeur`);

--
-- Indexes for table `T_Frequence_Facturation`
--
ALTER TABLE `T_Frequence_Facturation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Frequence_Facturation` (`Frequence_Facturation`);

--
-- Indexes for table `T_Genre`
--
ALTER TABLE `T_Genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `T_Heure`
--
ALTER TABLE `T_Heure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Heure` (`Heure`);

--
-- Indexes for table `T_Pays`
--
ALTER TABLE `T_Pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Pays` (`Pays`);

--
-- Indexes for table `T_Prix_Course`
--
ALTER TABLE `T_Prix_Course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `T_Type_Facturation`
--
ALTER TABLE `T_Type_Facturation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Type_Facturation` (`Type_Facturation`);

--
-- Indexes for table `T_Type_Transport`
--
ALTER TABLE `T_Type_Transport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Type_Transport` (`Type_Transport`);

--
-- Indexes for table `T_Ville`
--
ALTER TABLE `T_Ville`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Ville` (`Ville`);

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
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_friend`
--
ALTER TABLE `chat_friend`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `'DataBaseClient`
--
ALTER TABLE `DataBaseClient`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 1378;
--
-- AUTO_INCREMENT for table `DatabaseCourse`
--
ALTER TABLE `DatabaseCourse`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 14859;
--
-- AUTO_INCREMENT for table `DatabaseCourse_Programe
--
ALTER TABLE `DatabaseCourse_Programe`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DataBaseFacturation`
--
ALTER TABLE `DataBaseFacturation`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DatabasePaiement`
--
ALTER TABLE `DatabasePaiement`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
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
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_addresse`
--
ALTER TABLE `transport_addresse`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_article`
--
ALTER TABLE `transport_article`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_chauffeurs`
--
ALTER TABLE `transport_chauffeurs`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 26;
--
-- AUTO_INCREMENT for table `transport_clients`
--
ALTER TABLE `transport_clients`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 1387;
--
-- AUTO_INCREMENT for table `transport_programming`
--
ALTER TABLE `transport_programming`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 60;
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
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `transport_type_facturation`
--
ALTER TABLE `transport_type_facturation`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_type_pricing`
--
ALTER TABLE `transport_type_pricing`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_zone`
--
ALTER TABLE `transport_zone`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Adresse`
--
ALTER TABLE `T_Adresse`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Aller_Retour`
--
ALTER TABLE `T_Aller_Retour`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `T_Chauffeur`
--
ALTER TABLE `T_Chauffeur`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 22;
--
-- AUTO_INCREMENT for table `T_Frequence_Facturation`
--
ALTER TABLE `T_Frequence_Facturation`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Genre`
--
ALTER TABLE `T_Genre`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Heure`
--
ALTER TABLE `T_Heure`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Pays`
--
ALTER TABLE `T_Pays`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Prix_Course`
--
ALTER TABLE `T_Prix_Course`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Type_Facturation`
--
ALTER TABLE `T_Type_Facturation`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Type_Transport`
--
ALTER TABLE `T_Type_Transport`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `T_Ville`
--
ALTER TABLE `T_Ville`
  MODIFY `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 43;
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

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `links_category` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transport_addresse`
--
ALTER TABLE `transport_addresse`
  ADD CONSTRAINT `transport_addresse_ibfk_3` FOREIGN KEY (`zone_id`) REFERENCES `transport_zone` (`id`);

--
-- Constraints for table `transport_article`
--
ALTER TABLE `transport_article`
  ADD CONSTRAINT `transport_article_ibfk_1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `transport_article_ibfk_2` FOREIGN KEY (`zone_depart_id`) REFERENCES `transport_zone` (`id`),
  ADD CONSTRAINT `transport_article_ibfk_3` FOREIGN KEY (`zone_arrivee_id`) REFERENCES `transport_zone` (`id`);

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
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
