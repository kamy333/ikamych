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
-- Database: `ikamych`
--

-- --------------------------------------------------------
--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `hashed_password`, `nom`, `email`, `user_type`, `user_type_id`, `first_name`, `last_name`, `address`, `cp`, `city`, `country`, `phone`, `mobile`, `img`) VALUES
(1, 'admin', '$2y$10$YzYyN2U3MjBkNGQ4MTliOOYg0RfXSbg5pFOVsO1vOeEFamBhPdnYS', 'admin', 'webmaster@ikamy.ch', 'admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'kamy', '$2y$10$MmY3YTUwNTA4MzZjYWZiOORpVvLvjpsyBJ1a0p/vVfQLUNGu1e76W', 'Kamran NAFISSPOUR', 'nafisspour@bluewin.ch', 'admin', 1, 'Kamran', 'Nafisspour', '68 rue des Vollandes', '1207', 'Genève', 'Suisse', '+41 (22) 7350120', '+41 (79) 350 21 32', NULL),
(4, 'pablo', '$2y$10$OGEwYmRkMjc5NTNhMTVhNeS9iamczbZH3ag9qt2EXM8EliS2UwUTO', 'Pablo Arza', 'transmed@bluewin.ch', 'employee', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'kamy333', '$2y$10$OTAyYzczMGNmMzI2Y2ZjN.faDoYq2/ZSaAK42684GEbpTJ2/Q2Lyq', 'Kamy Manager', 'kamy333@hotmail.com', 'manager', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'gmail', '$2y$10$MWU4N2E5MDcwNDRjYjM1Mu2URCsGI9fUp9JCdmPZCX1cYOlmzeu5O', 'Kamy employee', 'kamran.nafisspour@gmail.com', 'employee', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chauffeurs`
--

CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chauffeur_name` varchar(70) DEFAULT NULL,
  `initial` varchar(3) DEFAULT NULL,
  `company` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chauffeur_name` (`chauffeur_name`),
  UNIQUE KEY `initial` (`initial`),
  KEY `chauffeur_name_2` (`chauffeur_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `chauffeurs`
--

INSERT INTO `chauffeurs` (`id`, `chauffeur_name`, `initial`, `company`) VALUES
(1, 'Pablo ARZA', 'PAB', 'Transmed'),
(2, 'Luan HAZIRI', 'LUA', 'Transmed'),
(3, 'Djamila AMRANI', 'DJA', 'Transmed'),
(4, 'Pierre-Alain BONFILS', 'PIA', 'Transmed'),
(5, 'Vincent DUBOULOZ', 'VCT', 'Transmed'),
(6, 'Autres', 'AUT', 'Transmed'),
(7, 'Kamran NAFISSPOUR', 'KNA', 'Transmed');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `liste_restrictive` tinyint(1) NOT NULL DEFAULT '0',
  `web_view` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `default_price` decimal(10,2) DEFAULT '0.00',
  `default_aller` varchar(70) DEFAULT NULL,
  `default_arrivee` varchar(70) DEFAULT NULL,
  `liste_rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `pseudo_2` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=244 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `liste_restrictive`, `web_view`, `last_name`, `first_name`, `address`, `cp`, `city`, `country`, `default_price`, `default_aller`, `default_arrivee`, `liste_rank`) VALUES
(4, 'COLLINE', 1, 'COLLINE', 'COLLINE', '', NULL, NULL, 'Genève', 'Suisse', NULL, NULL, NULL, 1),
(5, 'AUTRES', 1, 'AUTRES', 'AUTRES', '', NULL, NULL, 'Genève', 'Suisse', NULL, NULL, NULL, 1),
(6, 'Tour_Patient', 1, 'Tour Patient', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 2),
(7, 'Tour_Sang', 0, 'Tour Sang', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 3),
(8, 'Carouge_Sang', 0, 'Carouge Sang', 'comptabilité', 'Service', 'Avenue J.-D. Maillard 3', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 4),
(9, 'AURELIE', 0, 'Aurélie AI', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse', '60.00', NULL, NULL, 50),
(10, 'AURELIE_Med', 0, 'Aurélie Medecin', 'ASSEO', 'Aurélie', 'Route de Pressinge, 20', '1214', 'Puplinge', 'Suisse', '60.00', NULL, NULL, 50),
(11, 'ELZIZOUNE', 1, 'ELZIZOUNE Bouchaib', 'ELZIZOUNE', 'Bouchaib', 'Rue de Berne 60', '1202', 'Genève', 'Suisse', '45.00', 'Domicile', 'HUG Dialyse', 50),
(12, 'NAF_Kamy', 0, 'NAFISSPOUR Privee', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève', 'Suisse', NULL, NULL, NULL, 50),
(13, 'NAFISSPOUR', 1, 'NAFISSPOUR Travail', 'NAFISSPOUR', 'Kamran', 'Rue des Vollandes 68', '1207', 'Genève', 'Suisse', '40.00', 'Travail', 'Domicile', 50),
(14, 'AUDE', 0, ' Aude', '', 'Aude', 'Route de Saint-Julien 297', '1258', 'Perly', 'Suisse', NULL, NULL, NULL, 100),
(15, 'TAG', 0, ' Isaac', '', 'Isaac', 'Case postale 575', '1211', 'Genève 13', 'Suisse', NULL, NULL, NULL, 100),
(16, 'ALOHA', 0, 'ALOHA', 'HUBER', 'Rolf', 'Rue de la Fontaine 13', '1204', 'Genève', 'Suisse', NULL, NULL, NULL, 100),
(17, 'PARTNERS', 0, 'BOUDINA James', 'BOUDINA', 'James', 'Route de Saint-Georges 83', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 100),
(18, 'Mines_ICBL', 0, 'BRASSIER Audrey', 'BRASSIER', 'Audrey', 'Rue de Cornavin 9', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 100),
(19, 'ALBER', 0, 'ALBER Clotilde', 'ALBER', 'Clotilde', 'Avenue de Champel 64', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(20, 'AMEZ_DROZ', 0, 'AMEZ-DROZ Edouard', 'AMEZ-DROZ', 'Edouard', 'Chemin de la Vieille-Ferme 8', '1255', 'Veyrier', 'Suisse', NULL, NULL, NULL, 200),
(21, 'AMREIN', 0, 'AMREIN Suzanne', 'AMREIN', 'Suzanne', 'Cité Vieussieux 8', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(22, 'ANDEREGG', 0, 'ANDEREGG Paul', 'ANDEREGG', 'Paul', 'Rue du Vieux Moulin 9', '1213', 'OnexLE', 'Suisse', NULL, NULL, NULL, 200),
(23, 'ANDREY', 0, 'ANDREY Christophe', 'ANDREY', 'Christophe', 'Rue Gardiol 5', '1218', 'Le Grand-Saconnex', 'Suisse', NULL, NULL, NULL, 200),
(24, 'ANKER_M', 0, 'ANKER Marc', 'ANKER', 'Marc', 'Promenade de l''Europe 59', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 26 rue Guiseppe Motta', 200),
(25, 'ANKER', 0, 'ANKER Yvonne', 'ANKER', 'Yvonne', 'Promenade de l''Europe 59', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 26 rue Guiseppe Motta', 200),
(26, 'ARIAS', 0, 'ARIAS José-Miguel', 'ARIAS', 'José-Miguel', 'Chemin Bournoud 13-15', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(27, 'ARMAND', 0, 'ARMAND Henry', 'ARMAND', 'Henry', 'Chemin de la Caroline 24', '1213', 'Petit - Lancy', 'Suisse', NULL, NULL, NULL, 200),
(28, 'AUBERT', 0, 'AUBERT Roselyne', 'AUBERT', 'Roselyne', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(29, 'AVONDO', 0, 'AVONDO Marie', 'AVONDO', 'Marie', 'Avenue de la Pruley 44', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(30, 'BALBWIN', 0, 'BALDWIN Théo', 'BALDWIN', 'Théo', 'Grand-Montfleury 50', '1290', 'Versoix', 'Suisse', NULL, NULL, NULL, 200),
(31, 'BAZZACCHI', 0, 'BAZZACCHI Lucienne', 'BAZZACCHI', 'Lucienne', 'Grand-Pré 37', '1202', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(32, 'BEGER', 0, 'BEGER Iris', 'BEGER', 'Iris', 'Chemin Perrault-de-Jotemps 9\r\n', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(33, 'BENOIST_FILLE', 0, 'BENOIST Stéphanie', 'BENOIST', 'Stéphanie', 'C§hemin du Velours 20', '1231', 'Conches', 'Suisse', NULL, NULL, NULL, 200),
(34, 'BERNASCONI', 0, 'BERNASCONI Alexandre', 'BERNASCONI', 'Alexandre', 'Chemin des Crêts-de-Pregny 7A', '1218', 'le Grand-Saconnex', 'Suisse', NULL, NULL, NULL, 200),
(35, 'BIBES', 0, 'BIBES Jeanne', 'BIBES', 'Jeanne', 'Rue de la Poterie 20', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(36, 'BLANDIN', 0, 'BLANDIN Jean-François', 'BLANDIN', 'Jean-François', 'Chemin Crétoillet 30', '1256', 'Troinex', 'Suisse', NULL, NULL, NULL, 200),
(37, 'BLOEDHORN', 0, 'BLOEDHORN Alexandre', 'BLOEDHORN', 'Alexandre', 'Rue de la Tambourine 38', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(38, 'BOLOMEY', 0, 'BOLOMEY Ignace', 'BOLOMEY', 'Ignace', 'Chemin de la Citadelle 71', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(39, 'BONZON', 0, 'BONZON Edith', 'BONZON', 'Edith', 'Rue Soubeyran 8', '1203', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 10 rue Galatin', 200),
(40, 'BONZON_Mich', 0, 'BONZON Michèle', 'BONZON', 'Michèle', 'Chemin de Blonay 4', '1234', 'Vessy', 'Suisse', NULL, NULL, NULL, 200),
(41, 'BORNOZ', 0, 'BORNOZ Marcel', 'BORNOZ', 'Marcel', 'Avenue des Morgines 37', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(42, 'BOSSENS', 0, 'BOSSENS Hélène', 'BOSSENS', 'Hélène', 'Chemin Briquet 26', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(43, 'BOSTEELS', 0, 'BOSTEELS Michel', 'BOSTEELS', 'Michel', 'Chemin de Gaillard 276', ' 01160', 'Challex', 'France', NULL, NULL, NULL, 200),
(44, 'BOUCHET', 0, 'BOUCHET Raymond', 'BOUCHET', 'Raymond', 'Rue Fort-Barreau 19', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(45, 'BROILLET', 0, 'BROILLET Bernard', 'BROILLET', 'Bernard', 'Avenue du Pont-Butin 70', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(46, 'BUDEYRI', 0, 'BUDEYRI Wijdan', 'BUDEYRI', 'Wijdan', 'Rue du Nant 34', '1207', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(47, 'BURGENER', 0, 'BURGENER André', 'BURGENER', 'André', 'Rue de Moillebeau 57', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(48, 'BURNAT', 0, 'BURNAT Janine', 'BURNAT', 'Janine', 'Place Sigsimond 2', '1227', 'Carouge', 'Suisse', '35.00', NULL, NULL, 200),
(49, 'CARNAL_Mme', 0, 'CARNAL Liliane', 'CARNAL', 'Liliane', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(50, 'CARNAL_R', 0, 'CARNAL Raymond', 'CARNAL', 'Raymond', 'Rue de la Calle 19', '1213', 'Onex', 'Suisse', '45.00', 'Domicile', 'HUG Dialyse', 200),
(51, 'CARUANA', 0, 'CARUANA Paul', 'CARUANA', 'Paul', 'Maison familiale du Genevois', '74160', 'Collonge s/Salève', 'France', '60.00', NULL, NULL, 200),
(52, 'CERROTI', 0, 'CERROTI Georges', 'CERROTI', 'Georges', 'Avenue du Lignon 21', '1219', 'Le Lignon', 'Suisse', NULL, NULL, NULL, 200),
(53, 'CHARLET', 0, 'CHARLET Sylvette', 'CHARLET', 'Sylvette', 'Avenue de Crozet 4', '1219', 'Châtelaine', 'Suisse', NULL, NULL, NULL, 200),
(54, 'CHERVAZ', 0, 'CHERVAZ Gérard', 'CHERVAZ', 'Gérard', 'Chemin De-La-Montagne 106', '1224', 'Chêne-Bougeries', 'Suisse', '50.00', NULL, NULL, 200),
(55, 'CHERVET', 0, 'CHERVET Alfred', 'CHERVET', 'Alfred', 'Rue des Bossons 19', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(56, 'CHEVALLIER', 0, 'CHEVALLIER Françoise', 'CHEVALLIER', 'Françoise', 'Rue des Délices 1', '1204', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(57, 'CHTIOUI', 0, 'CHTIOUI Sanaa', 'CHTIOUI', 'Sanaa', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', '40.00', 'Domicile', 'Service Industriel de Genève', 200),
(58, 'CLERC', 0, 'CLERC', 'CLERC', 'Jean-daniel', 'Rue des Bossons 15', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(59, 'COLOMB', 0, 'COLOMB Gilles', 'COLOMB', 'Gilles', 'Chemin du Villaret 1', '1224', 'Chêne-Bougeries', 'Suisse', NULL, NULL, NULL, 200),
(60, 'COSTA', 0, 'COSTA Tania', 'COSTA', 'Tania', 'Avenue de Feuillasse 1', '1217', 'Meyrin', 'Suisse', '45.00', NULL, NULL, 200),
(61, 'COURT', 0, 'COURT Elisa', 'COURT', 'Elisa', 'Quai du Seulet 34', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(62, 'DAUDIN', 0, 'DAUDIN Jean', 'DAUDIN', 'Jean', 'Rue de Lyon 65bis', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(63, 'DE_MONFALCON', 0, 'DE MONFALCON Juliette', 'DE MONFALCON', 'Juliette', 'Rue des Vollandes 1', '1207', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(64, 'DE_MORAWITZ', 0, 'DE MORAWITZ Karl', 'DE MORAWITZ', 'Karl', 'Place du Marché 15', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(65, 'DE_REMY', 0, 'DE REMY Jean', 'DE REMY', 'Jean', 'Plateau de Champel 18', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(66, 'DECONYNK', 0, 'DECONYNK Yvon', 'DECONYNK', 'Yvon', 'Chemin de la Prulay 72', '1217', 'Meyrin', 'Suisse', '45.00', NULL, NULL, 200),
(67, 'DERBIGNY', 0, 'DERBIGNY Jeanne', 'DERBIGNY', 'Jeanne', 'Route d''Aire-la-Ville 226', '1242', 'Satigny', 'Suisse', NULL, NULL, NULL, 200),
(68, 'DESAUTEZ', 0, 'DESAUTEZ Pauline', 'DESAUTEZ', 'Pauline', 'Rue de Livron 29', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(69, 'DESCOMBES', 0, 'DESCOMBES Michel', 'DESCOMBES', 'Michel', 'Rue des Bossons 24', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(70, 'DI_BENEDETTO_Cal', 0, 'DI BENEDETTO Calogero', 'DI BENEDETTO', 'Calogero', 'Chemin Longe-l''Aire 18', '1212', 'Grand-Lancy', 'Suisse', '40.00', NULL, NULL, 200),
(71, 'DI_BENEDETTO', 0, 'DI BENEDETTO Margueritte', 'DI BENEDETTO', 'Margueritte', 'Chemin Longe-l''Aire 18', '1212', 'Grand-Lancy', 'Suisse', '40.00', NULL, NULL, 200),
(72, 'DOCTOR', 0, 'DOCTOR Narad', 'DOCTOR', 'Narad', 'Chemin de Pont-Céard 42', '1290', 'Versoix', 'Suisse', '45.00', NULL, NULL, 200),
(73, 'DORSAZ', 0, 'DORSAZ Agnès', 'DORSAZ', 'Agnès', 'Avenue Bois-de-la-Chapelle 9', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(74, 'DUBOIS', 0, 'DUBOIS Marie-Jeanne', 'DUBOIS', 'Marie-Jeanne', 'Chemin Moïse-Duboule 17', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(75, 'DUFRENE', 0, 'DUFRÊNE Chantal', 'DUFRÊNE', 'Chantal', 'Rue Curé-Descloud 17', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(76, 'DUMONT', 0, 'DUMONT Benoît', 'DUMONT', 'Benoît', 'Avenue Eugène-Pittard 11', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(77, 'DUPERREX', 0, 'DUPERREX Aloys', 'DUPERREX', 'Aloys', 'Rue de Monbrillant 61', '1202', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(78, 'EHRAT', 0, 'EHRAT Danièle', 'EHRAT', 'Danièle', 'Avenue Peschier 16', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(79, 'ELOUARET', 0, 'ELOUARET Soraya', 'ELOUARET', 'Soraya', 'Rue de Bandol 12', '1213', 'Onex', 'Suisse', '30.00', NULL, NULL, 200),
(80, 'FARTACH_Mme', 0, 'FARTACH  Bernadette', 'FARTACH', ' Bernadette', 'Chemin de la Tourelle 16', '1209', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(81, 'FARTACH_Suz', 0, 'FARTACH Suzanne', 'FARTACH', 'Suzanne', 'Ecole de Médecine 16', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(82, 'FAUQUEX', 0, 'FAUQUEX Jean-Paul  ', 'FAUQUEX', 'Jean-Paul  ', 'Rue des Minoteries 7', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(83, 'FAVRE_Puplinge', 0, 'FAVRE Christianne', 'FAVRE', 'Christianne', 'Chemin de Pré-Marquis 7b', '1241', 'Puplinge', 'Suisse', NULL, NULL, NULL, 200),
(84, 'FAVRE_Onex', 0, 'FAVRE Ruth', 'FAVRE', 'Ruth', 'Chemin de la Calle 38', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(85, 'FAVRE_ANNE', 0, 'FAVRE-LUISIER  Anne Marie', 'FAVRE-LUISIER ', 'Anne Marie', 'Route de la Capite 157', '1222', 'Vésenaz', 'Suisse', NULL, NULL, NULL, 200),
(86, 'FELL', 0, 'FELL Christine', 'FELL', 'Christine', 'Chemin Colladon 22', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(87, 'FIRME', 0, 'FIRME José Manuel', 'FIRME', 'José Manuel', 'rue des peupliers 6', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(88, 'FLAHAULT', 0, 'FLAHAULT Françoise', 'FLAHAULT', 'Françoise', 'Rue de Genève 94', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(89, 'FORAY_Herve', 0, 'FORAY Hervé', 'FORAY', 'Hervé', 'Avenue de Mategnin 59', '1217', 'Meyrin', 'Suisse', '35.00', NULL, NULL, 200),
(90, 'FORAY_Mme', 0, 'FORAY Roberte', 'FORAY', 'Roberte', 'Avenue de Mategnin 49', '1217', 'Meyrin', 'Suisse', '35.00', NULL, NULL, 200),
(91, 'FOURNIER', 0, 'FOURNIER Charles', 'FOURNIER', 'Charles', 'Rue Charles-Bonnet 10', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(92, 'FRACHET', 0, 'FRACHET Margueritte', 'FRACHET', 'Margueritte', 'Avenue de Joli-Mont 3', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(93, 'GARBANI', 0, 'GARBANI Roger', 'GARBANI', 'Roger', 'Rue des Allobroges 13', '1227', 'Les Acacias', 'Suisse', '40.00', NULL, NULL, 200),
(94, 'GAY_BALMAT', 0, 'GAY-BALMAT Jeannine', 'GAY-BALMAT', 'Jeannine', 'Boulevard du Pont-d''Arve 44', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(95, 'GIANOLI', 0, 'GIANOLI Carlo', 'GIANOLI', 'Carlo', 'Avenue du Lignon 20', '1219', 'Le Lignon', 'Suisse', NULL, NULL, NULL, 200),
(96, 'GIAUQUE', 0, 'GIAUQUE Rémy', 'GIAUQUE', 'Rémy', 'Rue des Bossons 17', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(97, 'GIGON', 0, 'GIGON Jean-Pierre', 'GIGON', 'Jean-Pierre', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(98, 'GIGON_Mme', 0, 'GIGON Radmila', 'GIGON', 'Radmila', 'Rue Pestalozzi 1', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(99, 'VM_Gilabert', 0, 'GILABERT ', 'GILABERT', '', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(100, 'GIRAUD', 0, 'GIRAUD Christian', 'GIRAUD', 'Christian', 'Chemin de Maisonneuve 12c', '1219', 'Châtelaine', 'Suisse', NULL, NULL, NULL, 200),
(101, 'GONZALEZ', 0, 'GONZALEZ Antonio', 'GONZALEZ', 'Antonio', 'Route de Meyrin 17', '1202', 'Genève', 'Suisse', '40.00', 'Domicile', 'Cressy Santé, Physio', 200),
(102, 'GORGE', 0, 'GORGE Pierre', 'GORGE', 'Pierre', 'Chemin de l´Ancien-Péage 2', '1290', 'Versoix', 'Suisse', NULL, NULL, NULL, 200),
(103, 'GRANFAR', 0, 'GRANFAR Ebrahim', 'GRANFAR', 'Ebrahim', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse', '45.00', 'Domicile', 'Relais Dumas, Grand-Saconnex', 200),
(104, 'GRANFAR_Mme', 0, 'GRANFAR Vida', 'GRANFAR', 'Vida', 'Plateau de Frontenex 9C', '1223', 'Cologny', 'Suisse', NULL, NULL, NULL, 200),
(105, 'GRIN', 0, 'GRIN Denis', 'GRIN', 'Denis', 'Avenue Wendt 38', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(106, 'GROSSE', 0, 'GROSSE Christel', 'GROSSE', 'Christel', 'Rue du Loup 3', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(107, 'GUILLERMIN', 0, 'GUILLERMIN Jean', 'GUILLERMIN', 'Jean', 'Route de Bernex 392', '1233', 'Bernex', 'Suisse', NULL, NULL, NULL, 200),
(108, 'CHRISTINE', 0, 'GUTKNECHT Christine', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix', 'Suisse', '45.00', NULL, NULL, 200),
(109, 'GUTKNECHT', 0, 'GUTKNECHT Christine', 'GUTKNECHT', 'Christine', 'Nant de Crève-Cœur 8', '1290', 'Versoix', 'Suisse', '45.00', NULL, NULL, 200),
(110, 'HAAS', 0, 'HAAS Karoline', 'HAAS', 'Karoline', 'Chemin de Saule 94', '1233', 'Bernex', 'Suisse', NULL, NULL, NULL, 200),
(111, 'HALPERIN', 0, 'HALPÉRIN Noemi', 'HALPÉRIN', 'Noemi', 'Avenue Alfred-Bertrand 13', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(112, 'HAUSSER', 0, 'HAUSSER Josianne', 'HAUSSER', 'Josianne', 'Chemin des Rayes 33', '1222', 'Vésenaz', 'Suisse', NULL, NULL, NULL, 200),
(113, 'HERZI', 0, 'HERZI Taoufik', 'HERZI', 'Taoufik', 'Route d''Hermance 296', '1229', 'Anières', 'Suisse', '45.00', 'Domicile', 'Hôpital de Beau-Séjour', 200),
(114, 'HEURTEUX', 0, 'HEURTEUX Philippe', 'HEURTEUX', 'Philippe', 'Route d''Hermance 401', '1229', 'Anières', 'Suisse', NULL, NULL, NULL, 200),
(115, 'HORVATH', 0, 'HORVATH Giovanna', 'HORVATH', 'Giovanna', 'Rue de Bourgogne 2', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(116, 'HUISSOUD', 0, 'HUISSOUD Maurice', 'HUISSOUD', 'Maurice', 'Chemin Etienne-Chennaz 10', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(117, 'ILG', 0, 'ILG Colette', 'ILG', 'Colette', 'Chemin des Tulipiers 23', '1208', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(118, 'CHO_IMERETINSKY', 0, 'IMERETINSKY Nadeja', 'IMERETINSKY', 'Nadeja', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', NULL, NULL, NULL, 200),
(119, 'IMHOF', 0, 'IMHOF Edouard', 'IMHOF', 'Edouard', 'Rue Vautier 26', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(120, 'INEICHEN', 0, 'INEICHEN Marie-Elisabeth', 'INEICHEN', 'Marie-Elisabeth', 'Avenue Calas 20', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(121, 'ROBERTA', 0, 'ISABELLA-VALENZI Roberta', 'ISABELLA-VALENZI', 'Roberta', 'Rue de la Croix-du-Levant 7', '1220', 'Les Avanchets', 'Suisse', '50.00', 'Domicile', 'Centre de jour Solaris, Collonge-Bellerive', 200),
(122, 'JANNER', 0, 'JANNER Claude', 'JANNER', 'Claude', 'Avenue Wendt 23', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(123, 'JEANNET', 0, 'JEANNET Madeleine Pierrette', 'JEANNET', 'Madeleine Pierrette', 'Chemin des Coquelicots 29', '1214', 'Vernier', 'Suisse', NULL, NULL, NULL, 200),
(124, 'KHAN_Mme', 0, 'KHAN Shamim', 'KHAN', 'Shamim', 'Chemin des Bugnons 10', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(125, 'KOCHER', 0, 'KOCHER ZELLER Gaby', 'KOCHER ZELLER', 'Gaby', 'Chemin Rieu 10', '1208', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(126, 'KRASNOPOLSKY', 0, 'KRASNOPOLSKY Lucie', 'KRASNOPOLSKY', 'Lucie', 'Route de Frontenex 51', '1207', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(127, 'KREBS', 0, 'KREBS André', 'KREBS', 'André', 'Avenue d''Aïre 89', '1203', 'Genève', 'Suisse', '35.00', NULL, NULL, 200),
(128, 'LALIVE', 0, 'LALIVE D''EPINAY Pierre', 'LALIVE D''EPINAY', 'Pierre', 'Rue des Sources 13', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(129, 'LEHR', 0, 'LEHR-BYRDE Paule', 'LEHR-BYRDE', 'Paule', 'Chemin de Grange-Falquet 51', '1224', 'Chêne-Bougeries', 'Suisse', '40.00', NULL, NULL, 200),
(130, 'LEQUINT', 0, 'LEQUINT Claudine', 'LEQUINT', 'Claudine', 'Chemin de Chapelly 22', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(131, 'LEVY', 0, 'LEVY Melita', 'LEVY', 'Melita', 'Rue Robert-De-Traz 2', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(132, 'LIARDON', 0, 'LIARDON Lydie', 'LIARDON', 'Lydie', 'Quai Charles-Page 45', '1205', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(133, 'LIFTON', 0, 'LIFTON Danielle', 'LIFTON', 'Danielle', 'Lotissement Trélatoun 77', '01170', 'Cessy', 'France', '60.00', NULL, NULL, 200),
(134, 'LINDER', 0, 'LINDER Willi', 'LINDER', 'Willi', 'Rue Carteret 38', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(135, 'LUCINI', 0, 'LUCINI Lily', 'LUCINI', 'Lily', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', NULL, NULL, NULL, 200),
(136, 'LUGASSY', 0, 'LUGASSY Raphaël', 'LUGASSY', 'Raphaël', 'Route de Chêne 70', '1208', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(137, 'MAGNIN', 0, 'MAGNIN Mario', 'MAGNIN', 'Mario', 'Chemin Briquet 18', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', NULL, NULL, 200),
(138, 'MAIO', 0, 'MAIO Sabatino', 'MAIO', 'Sabatino', 'Avenue de Thônex 8', '1225', 'Chêne-Bourg', 'Suisse', NULL, NULL, NULL, 200),
(139, 'MALEH', 0, 'MALEH Suha', 'MALEH', 'Suha', 'Route de Florissant 70', '1206', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(140, 'MANSON', 0, 'MANSON-CAEN Joëlle', 'MANSON-CAEN', 'Joëlle', 'Avenue d''Aïre 73B', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(141, 'MARCHAND', 0, 'MARCHAND Chantal', 'MARCHAND', 'Chantal', 'Rue François Besson 14', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(142, 'MARES', 0, 'MARES Eketharrina', 'MARES', 'Eketharrina', 'Avenue Ernest-Pictet 16', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(143, 'MARESCA', 0, 'MARESCA Gisela', 'MARESCA', 'Gisela', 'Rue de la Dôle 2', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(144, 'MARTIN_MA', 0, 'MARTIN Marie-Augusta', 'MARTIN', 'Marie-Augusta', 'Cours Saint-Pierre 1', '1204', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(145, 'MATHIEU', 0, 'MATHIEU ', 'MATHIEU', '', 'Chemin du Pré-du-Couvent 1', '1224', 'Chêne-Bougeries', 'Suisse', NULL, NULL, NULL, 200),
(146, 'MATHYS', 0, 'MATHYS Jean', 'MATHYS', 'Jean', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(147, 'MATHYS_Simone', 0, 'MATHYS Simone', 'MATHYS', 'Simone', 'Chemin Briquet 20', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(148, 'MAURON', 0, 'MAURON Francine', 'MAURON', 'Francine', 'Rue du Grand Pré 30', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(149, 'MECCA', 0, 'MECCA Vincenzo', 'MECCA', 'Vincenzo', 'Rue Caroline 53', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(150, 'MESIN', 0, 'MESIN Mehmet', 'MESIN', 'Mehmet', 'Chemin du Fief-de-Chapitre 9', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(151, 'MESOT', 0, 'MESOT André', 'MESOT', 'André', 'Chemin de la Mère Voie 78', '1228', 'Plan-les-Ouates', 'Suisse', NULL, NULL, NULL, 200),
(152, 'MEYLAN', 0, 'MEYLAN xxx', 'MEYLAN', 'xxx', 'Chemin de Saule 10', '1233', 'Bernex', 'Suisse', '40.00', NULL, NULL, 200),
(153, 'MONNAY_Mariette', 0, 'MONNAY Mariette', 'MONNAY', 'Mariette', 'Route d''Aïre 141', '1219', 'Aïre', 'Suisse', NULL, NULL, NULL, 200),
(154, 'MOTTET_Pat', 0, 'MOTTET Patricia', 'MOTTET', 'Patricia', 'Route de Frontenex 37', '1207', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(155, 'MULLER', 0, 'MULLER Elisabeth', 'MULLER', 'Elisabeth', 'Rue Henri-Mussard 14', '1208', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(156, 'MUNSPERGER', 0, 'MUNSPERGER Johann', 'MUNSPERGER', 'Johann', 'Avenue François-Besson 20', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(157, 'MURATOVIC', 0, 'MURATOVIC Enver', 'MURATOVIC', 'Enver', 'Avenue Louis-Casaï 39', '1220', 'Les Avanchets', 'Suisse', NULL, NULL, NULL, 200),
(158, 'MURISIER', 0, 'MURISIER Etienne', 'MURISIER', 'Etienne', 'Chemin du Stade 7A', '1252', 'Meinier', 'Suisse', '45.00', NULL, NULL, 200),
(159, 'MUSINA', 0, 'MUSINA Jean', 'MUSINA', 'Jean', 'Rue Adhémar-Fabri 4', '1201', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(160, 'MUTZENBERG', 0, 'MUTZENBERG Andrée', 'MUTZENBERG', 'Andrée', 'Avenue du Mail 24', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(161, 'MUXUDIIN', 0, 'MUXUDIIN KHAALI Abuukar', 'MUXUDIIN KHAALI', 'Abuukar', 'Rue des Lilas 11', '1202', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(162, 'Neuenschwander', 0, 'NEUENSCHWANDER Irène', 'NEUENSCHWANDER', 'Irène', 'Route de Chancy 154', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(163, 'NICOLA', 0, 'NICOLA Jacques-Bernard', 'NICOLA', 'Jacques-Bernard', 'Chemin Fief-de-Chapitre 10', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(164, 'NIEMINEN', 0, 'NIEMINEN Leena', 'NIEMINEN', 'Leena', 'Rue Marius Cadoz 204', '01170', 'Gex', 'France', '60.00', NULL, NULL, 200),
(165, 'NORTE', 0, 'NORTE Diane', 'NORTE', 'Diane', 'Communes Réunies 72', '1212', 'Gand-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(166, 'ODEMS_', 0, 'ODEMS  Mary-Ann', 'ODEMS ', 'Mary-Ann', 'Rue de la Servette 71', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(167, 'OHANA', 0, 'OHANA Olivier Paul', 'OHANA', 'Olivier Paul', 'Chemin des Crêts 10', '01610', 'Saint Genis ', 'France', NULL, NULL, NULL, 200),
(168, 'MOMO', 0, 'OMAIS Mohamed', 'OMAIS', 'Mohamed', 'Rue Daniel Gervil, 17', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(169, 'ORTEGA', 0, 'ORTEGA Carmen', 'ORTEGA', 'Carmen', 'Avenue du Gros-Chêne 37', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(170, 'PACHON', 0, 'PACHON Roger', 'PACHON', 'Roger', 'Chemin des Vidolets 25', '1214', 'Vernier', 'Suisse', NULL, NULL, NULL, 200),
(171, 'PANT', 0, 'PANT Sudhir', 'PANT', 'Sudhir', 'Rue Cherbuliez 7', '1207', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(172, 'PAUX', 0, 'PAUX Marcelle', 'PAUX', 'Marcelle', 'Rue Vermont 31', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(173, 'PERRNOUD', 0, 'PERRNOUD Jean-Pierre', 'PERRNOUD', 'Jean-Pierre', 'Chemin de Saule 98', '1233', 'Bernex', 'Suisse', '40.00', NULL, NULL, 200),
(174, 'PFAUTI', 0, 'PFAUTI Marc', 'PFAUTI', 'Marc', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', '35.00', 'Domicile', 'Dialyse GMO, Onex', 200),
(175, 'PFAUTI1', 0, 'PFAUTI Marc', 'PFAUTI', 'Marc', 'Chemin des Mouilles 3', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(176, 'PIGUET_Adèle', 0, 'PIGUET Adda Marcel', 'PIGUET', 'Adda Marcel', 'Avenue Vibert 17', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(177, 'PIGUET', 0, 'PIGUET Martiale', 'PIGUET', 'Martiale', 'Chemin De-Vincy 3', '1202', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(178, 'PILLET_France', 0, 'PILLET Annamma', 'PILLET', 'Annamma', 'Rue du Château 10', '01170', 'Cessy', 'France', NULL, NULL, NULL, 200),
(179, 'PILLOUD', 0, 'PILLOUD Nicolas', 'PILLOUD', 'Nicolas', 'ManqueManque', NULL, 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(180, 'PISONI', 0, 'PISONI Vladimir', 'PISONI', 'Vladimir', 'Boid-dde-la-Chapelle 67', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(181, 'PLOJOUX', 0, 'PLOJOUX Marie-Noëlle', 'PLOJOUX', 'Marie-Noëlle', 'Route d''Aire-la-Ville 219', '1242', 'Satigny', 'Suisse', '60.00', NULL, NULL, 200),
(182, 'POSS', 0, 'POSS Marie-Louise', 'POSS', 'Marie-Louise', 'Route de Bernex 359', '1233', 'Bernex', 'Suisse', NULL, NULL, NULL, 200),
(183, 'PROBST_Mme', 0, 'PROBST Liliane', 'PROBST', 'Liliane', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse', '40.00', NULL, NULL, 200),
(184, 'PROBST_Walter', 0, 'PROBST Walter', 'PROBST', 'Walter', 'Rue du Comte-Géraud 19', '1213', 'Onex', 'Suisse', '40.00', NULL, NULL, 200),
(185, 'PROUZET', 0, 'PROUZET René', 'PROUZET', 'René', 'Avenue Wendt 1', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(186, 'PYTHON', 0, 'PYTHON Georges', 'PYTHON', 'Georges', 'Chemin Taverney 12', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', NULL, NULL, 200),
(187, 'VM_RAEMY', 0, 'RAEMY Margit', 'RAEMY', 'Margit', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(188, 'RANIERI', 0, 'RANIERI Sabine', 'RANIERI', 'Sabine', 'Rue de la Fontenette 28', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(189, 'RANIERIE', 0, 'RANIERIE Sabine', 'RANIERIE', 'Sabine', 'Rue de la Fontenette 28', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(190, 'RAY', 0, 'RAY Clelia', 'RAY', 'Clelia', 'Quai du Seujet 32', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(191, 'RAYMONDON', 0, 'RAYMONDON Jacques', 'RAYMONDON', 'Jacques', 'Route d''Avully 107', '1237', 'Avully', 'Suisse', NULL, NULL, NULL, 200),
(192, 'REBMANN', 0, 'REBMANN Véréna', 'REBMANN', 'Véréna', 'Rue de Vermont 16', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(193, 'RENCHET', 0, 'RENCHET Georges', 'RENCHET', 'Georges', 'Chemin de la Bâtie 7', '1213', 'Petit-Lancy', 'Suisse', '40.00', NULL, NULL, 200),
(194, 'RENFER', 0, 'RENFER Marcel', 'RENFER', 'Marcel', 'Rue de la Dôle 18', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(195, 'RICCARDELLI', 0, 'RICCARDELLI Maria', 'RICCARDELLI', 'Maria', 'Avenue du Ligon 50-53', '1219', 'Le Lignon', 'Suisse', '40.00', NULL, NULL, 200),
(196, 'RITSCHARD', 0, 'RITSCHARD ', 'RITSCHARD', '', 'Rue Cavour 3', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(197, 'RITSCHARD_Rudolf', 0, 'RITSCHARD Jure Rudolf', 'RITSCHARD', 'Jure Rudolf', 'Route de Chancy 98', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(198, 'RKIZA', 0, 'RKIZA Silvia', 'RKIZA', 'Silvia', 'Avenue d''Aire 91A', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(199, 'ROCHANAKORN', 0, 'ROCHANAKORN Kasidis', 'ROCHANAKORN', 'Kasidis', 'Chemin Sansonnets 4', '1291', 'Commugny', 'Suisse', NULL, NULL, NULL, 200),
(200, 'ROCHAT', 0, 'ROCHAT Philippe', 'ROCHAT', 'Philippe', 'Rue Emile-Nicolet 13', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(201, 'RODAK', 0, 'RODAK Irène', 'RODAK', 'Irène', 'Chemin de la Charrue 11', '1218', 'Le Grand-Saconnex', 'Suisse', NULL, NULL, NULL, 200),
(202, 'ROLLIER', 0, 'ROLLIER Jean-Pierre', 'ROLLIER', 'Jean-Pierre', 'Avenue du Lignon 53', '1219', 'Le Lignon', 'Suisse', NULL, NULL, NULL, 200),
(203, 'CHO_Rosset', 0, 'ROSSET Jacqueline', 'ROSSET', 'Jacqueline', 'Route des Jurets 12', '1244', 'Choulex', 'Suisse', NULL, NULL, NULL, 200),
(204, 'ROSSET', 0, 'ROSSET René', 'ROSSET', 'René', 'Rue Dancet 3', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(205, 'RUSCITO', 0, 'RUSCITO Bruno', 'RUSCITO', 'Bruno', 'Route des Vainges 282', '74380', 'Nangy', 'France', NULL, NULL, NULL, 200),
(206, 'SALLIN', 0, 'SALLIN Marc', 'SALLIN', 'Marc', 'Parc Dinu-Lipatti 5', '1225', 'Chêne-Bourg', 'Suisse', NULL, NULL, NULL, 200),
(207, 'SALZ', 0, 'SALZMANN Angèle', 'SALZMANN', 'Angèle', 'Route de Malagnou 16', '1208', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(208, 'SALZMANN', 0, 'SALZMANN Johana', 'SALZMANN', 'Johana', 'Avenue des Cavaliers Avenue des Cavaliers 5', '1224', 'Chêne-Bougeries', 'Suisse', NULL, NULL, NULL, 200),
(209, 'SANT', 0, 'SANT Mira', 'SANT', 'Mira', 'Croix-du-Levant 14', '1220', 'Les Avanchets', 'Suisse', '40.00', NULL, NULL, 200),
(210, 'SANTINES', 0, 'SANTINES Joseph', 'SANTINES', 'Joseph', 'Grand-Monfleury 2', '1290', 'Versoix', 'Suisse', NULL, NULL, NULL, 200),
(211, 'SAUVAIN_CHARLY', 0, 'SAUVAIN Charly', 'SAUVAIN', 'Charly', 'Rue du Village 3', '1214', 'Vernier', 'Suisse', NULL, NULL, NULL, 200),
(212, 'SAUVAIN_Mme', 0, 'SAUVAIN Christiane', 'SAUVAIN', 'Christiane', 'Rue du Village 3', '1214', 'Vernier', 'Suisse', NULL, NULL, NULL, 200),
(213, 'SAUVET', 0, 'SAUVET Olivier', 'SAUVET', 'Olivier', 'Rue de l''Aubépine 13', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(214, 'SCHALTEGGER', 0, 'SCHALTEGGER Marguerite', 'SCHALTEGGER', 'Marguerite', 'Chemin de Saule  71', '1233', 'Bernex', 'Suisse', NULL, NULL, NULL, 200),
(215, 'SCHNEiDER', 0, 'SCHNEiDER André', 'SCHNEiDER', 'André', 'Chemin du Champs-d''Anier 8', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(216, 'SCHROETER', 0, 'SCHROETER Sonia', 'SCHROETER', 'Sonia', 'Avenue du Mail 20', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(217, 'SCHURMANN', 0, 'SCHURMANN Agnès', 'SCHURMANN', 'Agnès', 'Promenade de Champs-Fréchets 14', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(218, 'SCHWERI', 0, 'SCHWERI Ernest', 'SCHWERI', 'Ernest', 'Avenue de France 31', '1202', 'Genève', 'Suisse', '35.00', NULL, NULL, 200),
(219, 'SCHWERZMANN', 0, 'SCHWERZMANN Simone', 'SCHWERZMANN', 'Simone', 'Rue des evaux 7', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(220, 'SEN', 0, 'SEN Omer', 'SEN', 'Omer', 'Avenue Frédéric-Soret 24', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(221, 'SHAHADAT', 0, 'SHAHADAT Naseerha', 'SHAHADAT', 'Naseerha', 'Cité Vieusseux  7', '1203', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(222, 'SICOVIER', 0, 'SICOVIER Ivan', 'SICOVIER', 'Ivan', 'Rue Chabrey 9', '1202', 'Genève', 'Suisse', '40.00', 'Domicile', 'Hôpital de La Tour, Hemodialyse', 200),
(223, 'SICURANZA', 0, 'SICURANZA Norma', 'SICURANZA', 'Norma', 'Route de Colovray 4', '1218', 'Le Grand-Saconnex', 'Suisse', '40.00', 'Domicile', 'Dr Ilic, 4 rue Gourgas', 200),
(224, 'SIEBERT', 0, 'SIEBERT Margit', 'SIEBERT', 'Margit', 'Avenue Soret 4', '1203', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(225, 'SOMMERHALDER', 0, 'SOMMERHALDER Anita', 'SOMMERHALDER', 'Anita', 'Avenue de Vaudagne 35', '1217', 'Meyrin', 'Suisse', NULL, NULL, NULL, 200),
(226, 'SORDAT', 0, 'SORDAT Olivier', 'SORDAT', 'Olivier', 'Chemin de la Traille 30', '1213', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(227, 'STOPFER', 0, 'STOPFER Hans', 'STOPFER', 'Hans', 'Rue louis-Favre 37', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(228, 'TALLEUX', 0, 'TALLEUX Denise', 'TALLEUX', 'Denise', 'Chemin De-La-Montagne 112', '1224', 'Chêne-Bougeries', 'Suisse', NULL, NULL, NULL, 200),
(229, 'THEVOZ', 0, 'THEVOZ Geneviève', 'THEVOZ', 'Geneviève', 'Rue Jean-Robert-Chouet 17', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(230, 'VM_Torello', 0, 'TORELLO Jacqueline', 'TORELLO', 'Jacqueline', 'Ch. Etienne-Chennaz 14', '1226', 'Thônex', 'Suisse', NULL, NULL, NULL, 200),
(231, 'TOSCANO', 0, 'TOSCANO Sandro', 'TOSCANO', 'Sandro', 'Rue Moïse Duboule 31', '1209', 'Genève', 'Suisse', '40.00', NULL, NULL, 200),
(232, 'TRENTAZ', 0, 'TRENTAZ Georgette', 'TRENTAZ', 'Georgette', 'Rue du Grand-Pré 55', '1202', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(233, 'TZORTIS', 0, 'TZORTIS-WIEDMER Christiane Aline', 'TZORTIS-WIEDMER', 'Christiane Aline', 'Route de Chancy 42', '1213', 'Petit-Lancy', 'Suisse', NULL, NULL, NULL, 200),
(234, 'VALLAT', 0, 'VALLAT Brigitte', 'VALLAT', 'Brigitte', 'Boulevard des Promenades 20', '1227', 'Carouge', 'Suisse', NULL, NULL, NULL, 200),
(235, 'VALLEPIN', 0, 'VALLEPIN Daniel', 'VALLEPIN', 'Daniel', 'Rue des Mésanges 6', '74160', 'Saint-Julien', 'France', NULL, NULL, NULL, 200),
(236, 'VALLET', 0, 'VALLET Patricia', 'VALLET', 'Patricia', 'Avenue du Lignon 67', '1219', 'Le Lignon', 'Suisse', NULL, NULL, NULL, 200),
(237, 'VINCI', 0, 'VINCI Maria', 'VINCI', 'Maria', 'Chemin de Vi-Longe13', '1213', 'Onex', 'Suisse', NULL, NULL, NULL, 200),
(238, 'VUSICKI', 0, 'VUSICKI Nevenka', 'VUSICKI', 'Nevenka', 'Rroute Antoine-Martin 31A', '1234', 'Vessy', 'Suisse', NULL, NULL, NULL, 200),
(239, 'WASMER', 0, 'WASMER Rose-Marie', 'WASMER', 'Rose-Marie', 'Rue Le-Corbusier 21a', '1208', 'Genève', 'Suisse', '40.00', 'Domicile', 'Physio, 25 rue Jacques-Grosselin', 200),
(240, 'WEBER_F', 0, 'WEBER Francine', 'WEBER', 'Francine', 'Rue de Moillebeau 3A', '1209', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(241, 'WOOD', 0, 'WOOD Jonathan', 'WOOD', 'Jonathan', 'Quai Wilson 41', '1201', 'Genève', 'Suisse', NULL, NULL, NULL, 200),
(242, 'YERSIN', 0, 'YERSIN Pierre', 'YERSIN', 'Pierre', 'Chemin de Tré-la-Villa 40', '1236', 'Cartigny', 'Suisse', NULL, NULL, NULL, 200),
(243, 'ZAKAR', 0, 'ZAKAR Thérèse', 'ZAKAR', 'Thérèse', 'Rue Du Bois-Melly 2', '1205', 'Genève', 'Suisse', NULL, NULL, NULL, 200);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `programed` tinyint(1) NOT NULL DEFAULT '0',
  `invoiced` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_id` int(11) DEFAULT NULL,
  `course_date` date NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pseudo_autres` varchar(50) DEFAULT NULL,
  `heure` varchar(5) NOT NULL,
  `aller_retour` varchar(20) NOT NULL DEFAULT 'AllerSimple',
  `aller_retour1` tinyint(1) NOT NULL DEFAULT '0',
  `retour_booked` tinyint(1) NOT NULL DEFAULT '0',
  `heure_retour` varchar(5) DEFAULT NULL,
  `chauffeur` varchar(50) DEFAULT NULL,
  `depart` varchar(70) NOT NULL,
  `arrivee` varchar(70) NOT NULL,
  `type_transport` varchar(50) NOT NULL,
  `autres_prestations` varchar(50) DEFAULT NULL,
  `prix_course` decimal(10,2) DEFAULT '0.00',
  `nom_patient` varchar(60) DEFAULT NULL,
  `bon_no` varchar(60) DEFAULT NULL,
  `remarque` text,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_fullname` varchar(70) DEFAULT NULL,
  `username_validation` varchar(50) DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `Annulation_course` tinyint(1) DEFAULT '0',
  `export_course` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `web_address` text,
  `description` text,
  `category` varchar(50) NOT NULL DEFAULT 'Others',
  `sub_category_1` varchar(50) DEFAULT NULL,
  `sub_category_2` varchar(50) DEFAULT NULL,
  `privacy` tinyint(1) DEFAULT '0',
  `rank` int(11) DEFAULT '0',
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `web_address`, `description`, `category`, `sub_category_1`, `sub_category_2`, `privacy`, `rank`, `username`) VALUES
(4, 'Facebook', 'https://www.facebook.com/', '', 'Others', '', '', 0, 127, 'kamy'),
(5, 'Lotto Suisse', 'https://jeux.loro.ch/FR/1/homepage?cid=ppc/fr/google/Loro/Adwords//tous/juin2012#action=play', '', 'Others', '', '', 0, 127, 'kamy'),
(6, 'Linkedin', 'https://www.linkedin.com/nhome/', '', 'Others', '', '', 0, 127, 'kamy'),
(7, 'Introducing-PHP', 'http://www.lynda.com/PHP-tutorials/Introducing-PHP/123485-2.html', '', 'PHP', '', '', 0, 1, 'kamy'),
(8, 'PHP-MySQL-Essential-Training Kevin Skoglund', 'http://www.lynda.com/MySQL-tutorials/PHP-MySQL-Essential-Training/119003-2.html', '', 'PHP', '', '', 0, 2, 'kamy'),
(9, 'php-with-OOP-beyond-the-basics Kevin Skoglund', 'http://www.lynda.com/PHP-tutorials/php-with-OOP-beyond-the-basics/653-2.html', '', 'PHP', '', '', 0, 3, 'kamy'),
(10, 'PHP Date Time', 'http://www.lynda.com/PHP-tutorials/Setting-date-time-independently/188214/375112-4.html', '', 'PHP', '', '', 0, 5, 'kamy'),
(11, 'Exporting Data to Files with PHP', 'http://www.lynda.com/PHP-tutorials/Exporting-Data-Files-PHP/158375-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'PHP', '', '', 0, 5, 'kamy'),
(12, 'Uploading Files Securely with PHP', 'http://www.lynda.com/PHP-tutorials/Uploading-Files-Securely-PHP/158374-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'PHP', '', '', 0, 127, 'kamy'),
(13, 'Up and Running with PHP SimpleXML David Powers', 'http://www.lynda.com/PHP-tutorials/Up-Running-PHP-SimpleXML/370013-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'PHP', '', '', 0, 7, 'kamy'),
(14, 'Creating Secure PHP Websites Kevin Skoglund', 'http://www.lynda.com/PHP-tutorials/Creating-Secure-PHP-Websites/133321-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 'PHP', '', '', 0, 6, 'kamy'),
(15, 'Up and Running - Standard PHP Library David Powers', 'http://www.lynda.com/PHP-tutorials/Up-Running-Standard-PHP-Library/175038-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 'PHP', '', '', 0, 10, 'kamy'),
(16, 'Accessing Databases with Object-Oriented PHP', 'http://www.lynda.com/PHP-tutorials/Accessing-Databases-Object-Oriented-PHP/169106-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', '', 'PHP', '', '', 0, 4, 'kamy'),
(17, 'Object-Oriented Programming with PHP', 'http://www.lynda.com/PHP-tutorials/Object-Oriented-Programming-PHP/107953-2.html?srchtrk=index%3a1%0alinktypeid%3a2%0aq%3aPHP%0apage%3a1%0as%3arelevance%0asa%3atrue%0aproducttypeid%3a2', 'John Peck  \r\nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.', 'PHP', '', '', 0, 4, 'kamy'),
(18, 'Up-Running-MySQL-Development', 'http://www.lynda.com/MySQL-tutorials/Up-Running-MySQL-Development/158373-2.html', '', 'SQL', '', '', 0, 1, 'kamy'),
(19, 'MySQL-Essential-Training', 'http://www.lynda.com/MySQL-tutorials/MySQL-Essential-Training/139986-2.html', '', 'SQL', '', '', 0, 1, 'kamy'),
(20, 'Lynda Search PHP', 'http://www.lynda.com/search?q=php', 'John Peck  \r\nShows how to integrate the principles of object-oriented programming into the build of a PHP-driven web page or application.', 'PHP', '', '', 0, 127, 'kamy'),
(21, 'Up-Running-phpMyAdmin', 'http://www.lynda.com/phpMyAdmin-tutorials/Up-Running-phpMyAdmin/144202-2.html', '', 'PHP', '', '', 0, 127, 'kamy'),
(22, 'JQuery-Essential', 'http://www.lynda.com/jQuery-tutorials/jQuery-Essential-Training/183382-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 1, 'kamy'),
(23, 'Jquery Mobile Esstl', 'http://www.lynda.com/jQuery-Mobile-tutorials/jQuery-Mobile-Essential-Training/167067-2.html', '', 'JQuery', '', '', 0, 2, 'kamy'),
(24, 'Lynda search jquery', 'http://www.lynda.com/search?q=jquery', '', 'JQuery', '', '', 0, 3, 'kamy'),
(25, 'Lynda search jquery mobile', 'http://www.lynda.com/search?q=jquery+mobile', '', 'JQuery', '', '', 0, 4, 'kamy'),
(26, 'Ajax Lynda', 'http://www.lynda.com/Ajax-tutorials/Updating-information-without-reloading-page-using-AJAX/150163/155367-4.html', '', 'JQuery', '', '', 0, 4, 'kamy'),
(27, 'HTML-Essential-Training', 'http://www.lynda.com/HTML-tutorials/HTML-Essential-Training-2012/99326-2.html', '', 'HTML', '', '', 0, 1, 'kamy'),
(28, 'Creating a Responsive Web Design', 'http://www.lynda.com/CSS-tutorials/Accessing-code-HTML-CSS-Dreamweaver/110716/114021-4.html?autoplay=true', '', 'HTML', '', '', 0, 2, 'kamy'),
(29, 'Responsive-Design-Fundamentals', 'Responsive-Design-Fundamentals', '', 'HTML', '', '', 0, 3, 'kamy'),
(30, 'Bootstrap Site', 'http://getbootstrap.com/', '', 'Bootstrap', '', '', 0, 1, 'kamy'),
(31, 'bootstrap search Lynda', 'http://www.lynda.com/search?q=bootstrap', '', 'Bootstrap', '', '', 0, 2, 'kamy'),
(32, 'Bootstrap-Lynda Basic', 'http://www.lynda.com/Bootstrap-tutorials/Using-exercise-files/133339/151271-4.html?autoplay=true', '', 'Bootstrap', '', '', 0, 3, 'kamy'),
(33, 'Bootstrap Lynda interactive', 'http://www.lynda.com/Bootstrap-tutorials/Planning-thumbnail-gallery/161098/176516-4.html', '', 'Bootstrap', '', '', 0, 3, 'kamy'),
(34, 'Google map geolocalisation', 'http://www.sitepoint.com/find-a-route-using-the-geolocation-and-the-google-maps-api/', '', 'Bootstrap', '', '', 0, 4, 'kamy'),
(35, 'Bootstrap Layouts: Responsive Single-Page Design', 'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-Layouts-Responsive-Single-Page-Design/186538-2.html', '', 'Bootstrap', '', '', 0, 5, 'kamy'),
(36, 'lynda.search Bootstrap', 'http://www.lynda.com/search?q=Bootstrap', '', 'Bootstrap', '', '', 0, 6, 'kamy'),
(38, 'Bootstrap Site', 'http://getbootstrap.com/', '', 'Others', '', '', 0, 1, 'kamy'),
(39, 'Advanced Topics in MySQL and MariaDB', 'http://www.lynda.com/MariaDB-tutorials/Advanced-Topics-MySQL-MariaDB/175635-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:mysql%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to perform a variety of advanced administration tasks in both MariaDB and MySQL, two powerful database solutions that work in slightly different ways.', 'SQL', '', '', 0, 3, 'kamy'),
(40, 'Search Lynda mysql', 'http://www.lynda.com/search?q=mysql', '', 'SQL', '', '', 0, 4, 'kamy'),
(41, 'Jquery UI', 'http://www.lynda.com/jQuery-tutorials/Up-Running-jQuery-UI/186963-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 6, 'kamy'),
(42, 'Jquery AJAX', 'http://www.lynda.com/jQuery-tutorials/jQuery-Data-AJAX/150163-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 7, 'kamy'),
(43, 'Jquery web designers', 'http://www.lynda.com/jQuery-tutorials/jQuery-Web-Designers/144204-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 7, 'kamy'),
(44, 'jQuery: Creating Plugins', 'http://www.lynda.com/jQuery-tutorials/jQuery-Creating-Plugins/364350-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 7, 'kamy'),
(45, 'Managing PHP Persistent Sessions David Powers', 'http://www.lynda.com/PHP-tutorials/Managing-PHP-Persistent-Sessions/382572-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to store persistent PHP session data in a SQL server and create an auto-login system that recognizes returning users.', 'PHP', '', '', 0, 10, 'kamy'),
(46, 'Debugging PHP: Advanced Techniques with Jon Peck', 'http://www.lynda.com/PHP-tutorials/Debugging-PHP-Advanced-Techniques/112414-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:php%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Demonstrates how to leverage PHP''s built-in tools, as well as the Xdebug and Firebug extensions and FirePHP library to improve the quality of your code and reduce troubleshooting overhead.', 'PHP', '', '', 0, 10, 'kamy'),
(47, 'Create an Interactive Map with jQuery with Chris C', 'http://www.lynda.com/jQuery-1-5-tutorials/Create-an-Interactive-Map-with-jQuery/87636-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:jquery%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', '', 'JQuery', '', '', 0, 10, 'kamy'),
(49, 'How to handle handicap', 'https://www.facebook.com/spinal.cord.injuries/videos/1169089156449992/?fref=nf', 'An interesting take on how to act around people with disabilities.', 'Handicap', '', '', 0, 1, 'kamy'),
(50, 'Up and Running with Ember.js with Kai Gittens', 'http://www.lynda.com/Emberjs-tutorials/Review-routes-Ember-Inspector/178116/191826-4.html?autoplay=true', 'Ember.js is a JavaScript framework for creating robust, complex web apps while writing very little code. Ember''s attraction lies in its built-in template library and rich feature set, which seems to grow almost every day. Understanding the core concepts behind Ember will help you use it now—no matter what enhancements are added in the future. So join Kai Gittens as he introduces Ember''s routers, templates, and models, and shows how to use templates to create simple pages and dynamically load content using components and Ember Data. Let our training light the spark of learning, and get up and running with Ember today.\r\nTopics include:\r\nInstalling Ember Inspector\r\nReviewing routes with Ember Inspector\r\nLoading templates with routes\r\nCreating links with the link-to helper\r\nAdding component templates\r\nLoading model data\r\nCustomizing components\r\nBuilding nested routes and route objects\r\nLoading data with object and array controllers\r\nCreating interfaces', 'JQuery', '', '', 0, 100, 'kamy'),
(51, 'Texte savoureux, vu sur la page du groupe Yiddish ', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :', 'Texte savoureux, vu sur la page du groupe Yiddish pour les Nuls! :\r\n\r\n"Israel c''est le seul pays" d''Ephraim Kishon :\r\n\r\nC''est le seul pays où les chômeurs font la grève\r\n\r\n\r\nC''est le seul pays qui a deux ministres du trésor et pas un rond.\r\n\r\nC''est le seul pays au monde où le gouvernement finance l''éducation sectaire et ou l''éducation gratuite est financée par les parents d''élèves.\r\n\r\nC''est le seul pays où chaque mère a le numéro du portable du sergent de son fils à l''armée.\r\n\r\nC''est le seul pays qui importe de l''eau par bateaux citernes au moment où le pays est inondé par les pluies.\r\n\r\nC''est le seul pays où la chanson la plus populaire dans les clubs de musique transe s''intitule : « fleurs dans les fusils et filles dans les chars ».\r\n\r\nC''est le seul pays qui a envoyé un satellite de communications dans l''espace, où on ne vous laisse jamais terminer une phrase.\r\n\r\nC''est le seul pays où sont déjà tombées des fusées d''Irak, des katyouchas du Liban, des Qassam de Gaza et où un appartement de trois pièces coûte plus cher qu''à Paris.\r\n\r\nC''est le seul pays où on demande une star porno : qu''en pense ta mère ?\r\n\r\nC''est le seul pays où on va dîner chez ses parents le vendredi et on occupe le même siège qu''à l''âge de 5 ans.\r\n\r\nC''est le seul pays où un repas Israélien est composé d''une salade arabe, d''une pita irakienne, d''un kebab roumain et d''une crème bavaroise.\r\n\r\nC''est le seul pays où le gars avec la chemise pleine de taches est le ministre et le gars au complet gris, son chauffeur.\r\n\r\nC''est le seul pays où des musulmans vendent des articles religieux aux chrétiens en échange de billets portant l''effigie du Rambam.\r\n\r\nC''est le seul pays où les jeunes quittent la maison à l''âge de 18 ans pour revenir y habiter à l''âge de 24.\r\n\r\nC''est le seul pays où aucune femme n''est en bons termes avec sa mère mais où elles se parlent néanmoins trois fois par jour.\r\n\r\nC''est le seul pays où on vous montre des photos des enfants alors qu''ils sont présents.\r\n\r\nC''est le seul pays où on peut connaître la situation sécuritaire selon les chansons à la radio.\r\n\r\nC''est le seul pays où les riches sont à gauche, les pauvres sont à droite et la classe moyenne paie tout.\r\n\r\nC''est le seul pays où on peut obtenir en dix minutes un logiciel pour lancer des vaisseaux spatiaux et où il faut attendre une semaine pour réparer la machine à laver.\r\n\r\nC''est le seul pays où la première fois qu''on sort avec une fille, on lui demande dans quelle unité elle a servi a l''armée, et on découvre qu''elle était parachutiste alors que vous n''aviez été que caporal à la cantine militaire.\r\n\r\nC''est le seul pays où le décalage entre le jour le plus heureux et le jour le plus triste n''est souvent que soixante secondes.\r\n\r\nC''est le seul pays où lorsque vous détestez les hommes politiques, les fonctionnaires, les taxes, la qualité du service et la situation en général, vous prouvez que vous aimez le pays et qu''en fin de compte c''est le seul pays dans lequel vous pouvez vivre."', 'Israel', '', '', 0, 2, 'kamy'),
(52, 'Design Patterns in PHP with Keith Casey', 'http://www.lynda.com/PHP-tutorials/What-you-should-know-before-watching-course/186870/370504-4.html', 'Write better PHP code by following these popular (and time-tested) design patterns. Developer Keith Casey introduces 11 design patterns that will help you solve common coding challenges and make your intentions clear to future architects of your application. Keith explores use cases for:\r\n\r\nAccessing data with the active record and table data gateway patterns\r\nCreating objects with the factory, singleton, and mock objects patterns\r\nExtending code with decorator and adapter patterns\r\nStructuring applications with MVC and Action-Domain-Responder patterns\r\n\r\n\r\nEach chapter features a design pattern in a real-world coding scenario, and closes with a practice challenge to test your new skills.', 'PHP', '', '', 0, 7, 'kamy'),
(53, 'Test-Driven Development with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/What-kind-testing/124398/137958-4.html', 'Prove your code is working every step of the way using a formalized test.sql-driven development (TDD) process. TDD can be done in every modern programming environment, and for desktop, mobile, or web apps. In this course, Simon Allardice teaches you exactly how to get started with TDD: what makes a good test.sql, why we''re more interested in failure than success, and how to measure and repeatedly run tests. \r\n\r\nThe course explores the jargon of TDD—test.sql suites, test.sql harness, mock and stub objects, and more—and covers how TDD is used in the most common programming languages and environments. Plus learn to create, run, and manage the tests and move to a test.sql-first mindset.\r\nTopics include:\r\nWhat is test.sql-driven development?\r\nUsing unit testing frameworks\r\nCreating tests\r\nUsing assertions\r\nCreating multiple test.sql methods\r\nNaming unit tests and test.sql methods\r\nTesting return values\r\nSetting up and tearing down\r\nIntroducing mock objects\r\nMeasuring code coverage', 'Programming', 'Foundations of Programming', '', 0, 2, 'kamy'),
(54, 'Unit Testing with PHPUnit with Kristian Secor', 'http://www.lynda.com/PHPUnit-tutorials/Unit-Testing-PHPUnit/175019-2.html', 'Unit testing is a way to confirm proper execution of a computer program. PHPUnit provides a testing framework for PHP developers to do it right. This brief course covers everything you''ll need to get up and running with PHPUnit: where to download it, how to install it, and how to use it to unit test.sql your code. Kristian Secor provides a high-level overview of this invaluable framework, helping you guide test.sql-driven development at your organization.\r\nTopics include:\r\nWorking with assertions, annotations, and template methods of testing\r\nUsing mock and stub objects\r\nTesting private and protected methods\r\nLooking for weak spots in your testing, with code coverage\r\nTesting inherited projects', 'PHP', '', '', 0, 100, 'kamy'),
(55, 'Fundamentals with Simon Allardice', 'http://www.lynda.com/JavaScript-tutorials/Foundations-of-Programming-Fundamentals/83603-2.html', 'This course provides the core knowledge to begin programming in any language. Simon Allardice uses JavaScript to explore the core syntax of a programming language, and shows how to write and execute your first application and understand what''s going on under the hood. The course covers creating small programs to explore conditions, loops, variables, and expressions; working with different kinds of data and seeing how they affect memory; writing modular code; and how to debug, all using different approaches to constructing software applications.\r\n\r\nFinally, the course compares how code is written in several different languages, the libraries and frameworks that have grown around them, and the reasons to choose each one.\r\nTopics include:\r\nWriting source code\r\nUnderstanding compiled and interpreted languages\r\nRequesting input\r\nWorking with numbers, characters, strings, and operators\r\nWriting conditional code\r\nMaking the code modular\r\nWriting loops\r\nFinding patterns in strings\r\nWorking with arrays and collections\r\nAdopting a programming style\r\nReading and writing to various locations\r\nDebugging\r\nManaging memory usage\r\nLearning about other languages', 'Programming', 'Foundations of Programming', '', 0, 1, 'kamy'),
(56, 'Object-Oriented Design with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Object-Oriented-Design/96949-2.html', 'Most modern programming languages, such as Java, C#, Ruby, and Python, are object-oriented languages, which help group individual bits of code into a complex and coherent application. However, object-orientation itself is not a language; it''s simply a set of ideas and concepts.\r\n\r\nLet Simon Allardice introduce you to the terms—words like abstraction, inheritance, polymorphism, subclass—and guide you through defining your requirements and identifying use cases for your program. The course also covers creating conceptual models of your program with design patterns, class and sequence diagrams, and unified modeling language (UML) tools, and then shows how to convert the diagrams into code.\r\nTopics include:\r\nWhy use object-oriented design (OOD)?\r\nPinpointing use cases, actors, and scenarios\r\nIdentifying class responsibilities and relationships\r\nCreating class diagrams\r\nUsing abstract classes\r\nWorking with inheritance\r\nCreating advanced UML diagrams\r\nUnderstanding object-oriented design principles', 'Programming', 'Foundations of Programming', '', 0, 3, 'kamy'),
(57, 'Databases with Simon Allardice', 'http://www.lynda.com/Programming-tutorials/Foundations-Programming-Databases/112585-2.html', 'Discover how a database can benefit both you and your architecture, whatever the programming language, operating system, or application type you use. In this course, explore options that range from personal desktop databases to large-scale geographically distributed database servers and classic relational databases to modern document-oriented systems and data warehouses—and learn how to choose the best solution for you. Author Simon Allardice covers key terminology and concepts, such as normalization, "deadly embraces" and "dirty reads," ACID and CRUD, referential integrity, deadlocks, and rollbacks. The course also explores data modeling step by step through hands-on examples to design the best system for our data. Plus, learn to juggle the competing demands of storage, access, performance, and security—management tasks that are critical to your database''s success.\r\nTopics include:\r\nWhat is a database?\r\nWhy do you need a database?\r\nChoosing primary keys\r\nIdentifying columns and selecting data types\r\nDefining relationships: one-to-one, one-to-many, and many-to-many\r\nUnderstanding normalization\r\nCreating queries to create, insert, update, and delete data\r\nUnderstanding indexing and stored procedures\r\nExploring your database options', 'Programming', 'Foundations of Programming', '', 0, 4, 'kamy'),
(58, 'Design Patterns with Elisabeth Robson and Eric Fre', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Design-Patterns/135365-2.html', 'Design patterns are reusable solutions that solve the challenges software developers face over and over again. Rather than reinventing the wheel, learn how to make use of these proven and tested patterns that will make your software more reliable and flexible to change. This course will introduce you to design patterns and take you through seven of the most used object-oriented patterns that will make your development faster and easier. Elisabeth Robson and Eric Freeman, coauthors of Head First Design Patterns, join forces to provide an overview of each pattern and examples of the pattern in action. Featured design patterns include the strategy, observer, decorator, singleton, collection, state, and factory method patterns.\r\nTopics include:\r\nWhat are design patterns?\r\nEncapsulating code that varies with the strategy pattern\r\nSetting behavior dynamically\r\nImplementing the observer pattern\r\nCreating chaos with inheritance\r\nExtending behavior with composition\r\nDealing with multithreading and the singleton pattern\r\nRevising the design for a state machine\r\nEncapsulating iteration with the collection pattern\r\nEncapsulating object creation with the factory method pattern', 'Programming', 'Foundations of Programming', '', 0, 5, 'kamy'),
(59, 'Data Structures with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Data-Structures/149042-2.html', 'Once you get past simplistic computer programs with one or two variables, you''ll use a data structure to store the values—and groups of values— in your applications. While they are sometimes taken for granted in modern programming environments, a deeper understanding of data structures is vital for any programmer who wants to know what''s going on "under the hood" and understand how to defend the choices they''ve made for performance and efficiency. Simon Allardice offers that understanding to you in this Foundations of Programming course.\r\n\r\nStarting with simple ways of grouping data like arrays and structs, together you''ll explore gradually more complex data structures, like dictionaries, sets, hash tables, queues and stacks, links and linked lists, and trees and graphs. Simon keeps the lessons grounded in the real world and answers the "why" behind many data-structuring decisions: Why use a hash table? Why is a set useful? Why avoid arrays? When you''re finished with the course, you''ll have a clear understanding of data structures and understand how to use them in whatever language you''re programming in, today or 5 years from now.\r\nTopics include:\r\nWhat is a data structure?\r\nUsing C-style structs and arrays\r\nSorting and searching arrays\r\nWorking with singly and doubly linked lists\r\nUsing stacks for last-in, first-out (LIFO) structures\r\nUsing queues for first-in, first-out (FIFO) structures\r\nWorking with hash tables\r\nUnderstanding binary search trees (BSTs)\r\nLearning about graphs', 'Programming', 'Foundations of Programming', '', 0, 7, 'kamy'),
(60, 'Fundamentals of Software Version Control with Mich', 'http://www.lynda.com/Version-Control-tutorials/Fundamentals-Software-Version-Control/106788-2.html', 'This course is a gateway to learning software version control (SVC), process management, and collaboration techniques. Author Michael Lehman reviews the history of version control and demonstrates the fundamental concepts: check-in/checkout, forking, merging, commits, and distribution. The choice of an SVC system is critical to effectively managing and versioning the assets in a software development project (from source code, images, and compiled binaries to installation packages), so the course also surveys the solutions available. Michael examines Git, Perforce, Subversion, Mercurial, and Microsoft Team Foundation Server (TFS) in particular, describing the appropriate use, features, benefits, and optimal group size for each one.\r\nTopics include:\r\nComparing centralized vs. distributed systems\r\nSaving changes and tracking history\r\nUsing revert or rollback\r\nWorking with the GUI tools\r\nUsing IDE and shell integration\r\nInstalling different systems\r\nCreating a repository\r\nTagging code\r\nBranching and merging code\r\nSelecting a software version control system that''s right for you', 'Programming', 'Foundations of Programming', '', 0, 8, 'kamy'),
(61, 'Code Efficiency with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Code-Efficiency/122461-2.html', 'Code efficiency. There are other words we can use (optimization, performance, speed), but it''s all about making existing code run faster. Whether for desktop, mobile, or web apps, in this course you''ll see how to identify pain points and measure them accurately, as well as view multiple approaches to improve the performance. Author Simon Allardice covers everything from "quick fixes" to more complex (but more accurate) algorithms.\r\n\r\nLearn to choose the right data types, understand the pitfalls of using high-level languages, and decide where to spend your time. Plus, see how the underlying memory management model may have more of an impact than you realize, and what performance issues you can expect working with databases and web services.\r\nTopics include:\r\nIdentifying problems in the code\r\nEmbracing constraints\r\nUsing code analysis tools to measure performance\r\nManaging memory\r\nManaging disk-based and network resources', 'Programming', 'Foundations of Programming', '', 0, 9, 'kamy'),
(62, 'Software Quality Assurance with Aaron Dolberg', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Software-Quality-Assurance/126119-2.html', 'tart incorporating quality into your software development process today. Author Aaron Dolberg demonstrates the different kinds of software testing (from black box to white box) and how to fit each one into your development cycle. Learn how to make sure your team is on the same page when it comes to quality by developing criteria for ranking the priority and severity of issues. Then find out how to test.sql and report issues, and how to use a tracking system to manage the process and the results. Lastly, Aaron explains how automating some of the testing can make the QA process more efficient and objective. In the end, you''ll be able to better understand the overall health of your product, and ensure your team is meeting quality goals with every release.\r\nTopics include:\r\nHow to think about quality\r\nIncorporating black box, white box, and grey box testing into your process\r\nUnderstanding your quality goals\r\nRanking issues by priority and severity\r\nTesting core functionality\r\nTesting the backend\r\nUsing a test.sql case management system\r\nInterpreting bug models\r\nRecording defects automatically', 'Programming', 'Foundations of Programming', '', 0, 10, 'kamy'),
(63, 'Refactoring Code with Simon Allardice', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Foundations-Programming-Refactoring-Code/122457-2.html', 'ctoring is the process of taking existing code and improving it. While it makes code more readable and understandable, it also becomes much easier to add new features, build larger applications, and spot and fix bugs. In this course, staff author Simon Allardice introduces the formalized, disciplined approach to refactoring that tells you exactly what to look for in your code, and how to fix it, through a series of "code smells"—clues that let you look at a block of code and realize when there''s something wrong with it.\r\nTopics include:\r\nWhat is refactoring?\r\nRecognizing common code smells\r\nSimplifying method calls\r\nMaking conditions easier to read', 'Programming', 'Foundations of Programming', '', 0, 11, 'kamy'),
(64, 'Insights on Software Quality Engineering with Aaro', 'http://www.lynda.com/Developer-Programming-Foundations-tutorials/Insights-Software-Quality-Engineering/142444-2.html', 'Software quality engineering plays a vital role in the development cycle, saving companies time and money and ensuring that customers have exactly the experience they expect. It''s also a lucrative and underappreciated career path. Here, software quality engineer Aaron Dolberg draws on his years of experience in quality assurance (QA) to share his personal insights and cautionary tales. Aaron discusses how to get started in QA, how it fits in at companies small and large, and how it has changed since the rise of agile workflows.', 'Programming', 'Foundations of Programming', '', 0, 12, 'kamy'),
(65, 'Multidevice Prototyping with Ratchet with Chris Gr', 'http://www.lynda.com/Ratchet-tutorials/Using-exercise-files/170056/359870-4.html', 'Ratchet is a fantastic framework for prototyping mobile apps. Ratchet prototypes look and act just like native iOS and Android apps, but they''re programmed with languages familiar to almost all web designers and developers: HTML, CSS, and JavaScript. Join Chris Griffith in this course, as he shows how to configure your development environment to work with Ratchet, and build your first app prototype, from creating the initial screen and adding transitions between pages, with Push.js, to using Ratchet''s iOS and Android built-in themes, which make your app immediately look at home on either platform.\r\nTopics include:\r\nInstalling Ratchet\r\nSetting up a web server\r\nCreating your first screen\r\nConfiguring meta tags\r\nAdding content\r\nConnecting pages with Push.js\r\nAdding icons, buttons, form elements, and lists\r\nDefining your app theme with Ratchet', 'Bootstrap', '', '', 0, 36, 'kamy'),
(66, 'CakePHP-MVC Up and Running with  with Jon Peck', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 'http://www.lynda.com/CakePHP-tutorials/Introducing-MVC-development-pattern/126123/150319-4.html', 'MVC Framework', '', '', 0, 100, 'kamy'),
(67, 'MVC PHP CodeIgniter  Up and Running with PHP CodeI', 'http://www.lynda.com/CodeIgniter-tutorials/Introducing-MVC-development-pattern/126122/141743-4.html', 'Speed up your development with CodeIgniter, a fast and powerful PHP web application framework. Author Jon Peck shows how to build a magazine cataloging system while describing how to use a MVC (Model-View-Controller) framework like CodeIgniter.\r\n\r\nStarting with the what and why of CodeIgniter, Jon introduces key concepts such as the MVC pattern and libraries by demonstrating how to create static pages, then storing and displaying magazine info in a database. Advanced topics like classes and helpers are explored to validate user input, upload files, and much more. By creating a complete system, you''ll have the foundation to build your own applications with CodeIgniter.\r\nTopics include:\r\nWhat is CodeIgniter?\r\nCreating a static page controller\r\nGenerating output with a view\r\nWhat is a model?\r\nSaving data with Active Records\r\nCreating forms\r\nValidating user input\r\nListing records in tables\r\nUploading images\r\nViewing and deleting records', 'MVC Framework', '', '', 0, 37, 'kamy'),
(68, 'MVC Frameworks for Building PHP Web Applications', 'http://www.lynda.com/CakePHP-tutorials/MVC-Frameworks-Building-PHP-Web-Applications/315196-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:MVC%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'PHP developers have a choice: they can design their own architecture, essentially re-inventing the wheel, or they can use a framework. Frameworks speed up development, enhance collaboration, and help keep code organized. So why start from scratch? In this course, Drew Falkman introduces the six most popular PHP frameworks: Zend, Symfony, CodeIgniter, CakePHP, Yii, and Laravel. He''ll describe each framework''s advantages, show how to get and install the software, and then demonstrate how to get the default pages for each framework up and running, so viewers can see how the code is structured. In the final chapter, Drew compares all the frameworks and provides resources to move forward with each one. Your framework choice is one of the biggest factors affecting the success of your project; start here to get the information you need to make the right decision.\r\nTopics include:\r\nWhy use a framework?\r\nIntroducing MVC-framework concepts\r\nExamining each framework''s components\r\nSetting up the software\r\nWalking through sample apps built in each framework\r\nComparing frameworks', 'MVC Framework', 'MVC', '', 0, 4, 'kamy'),
(69, 'Laravel MVC framework Essential', 'http://www.lynda.com/Laravel-tutorials/Up-Running-Laravel/166513-2.html', 'Join Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel''s advanced templating engine, Blade. Next, you''ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you''ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\r\n\r\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\r\nTopics include:\r\nInstalling Laravel and Composer\r\nRouting requests\r\nFiltering routes\r\nIncorporating advanced controllers\r\nCreating a basic Blade template\r\nDeveloping a layout with child pages and forms\r\nIntegrating a database\r\nCreating tables via migrations\r\nOutputting data\r\nBuilding a Laravel app\r\nAuthenticating users\r\nDeploying Laravel code', 'MVC Framework', 'MVC', '', 0, 30, 'kamy'),
(70, 'Ruby on Rails 4 Essential Training with Kevin Skog', 'http://www.lynda.com/Ruby-Rails-tutorials/Ruby-Rails-4-Essential-Training/139989-2.html', 'Join Kevin Skoglund as he shows how to create full-featured, object-oriented web applications with the latest version of the popular, open-source Ruby on Rails framework. This course explores each part of the framework, best practices, and real-world development techniques. Plus, get hands-on experience by building a complete content management system with dynamic, database-driven content. Kevin teaches how to design an application; route browser requests to return dynamic page content; structure and interact with databases using object-oriented programming; create, update, and delete records; and implement user authentication. Previous experience with Ruby is recommended, but not required.\r\nTopics include:\r\nWhy use Ruby on Rails?\r\nInstalling Ruby on Rails on Mac and Windows\r\nRendering templates and redirecting requests\r\nGenerating and running database migrations\r\nCreating, updating, and deleting records\r\nUnderstanding association types\r\nUsing layouts, partials, and view helpers\r\nIncorporating assets using asset pipeline\r\nValidating form data\r\nAuthenticating users and managing user access\r\nArchitecting RESTful applications\r\nDebugging and error handing', 'Ruby', '', '', 0, 1, 'kamy'),
(71, 'RSpec Testing Framework with Ruby with Kevin Skogl', 'http://www.lynda.com/Ruby-tutorials/RSpec-Testing-Framework-Ruby/183884-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:ruby%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Learn how to use RSpec, the Ruby testing framework that can help developers be more productive, write better code, and reduce bugs during development. Kevin Skoglund explains the basic syntax of RSpec and then dives straight into writing and running test.sql examples. He shows how to use a variety of matchers to test.sql for expected conditions, provides techniques for testing efficiently, and demonstrates how test.sql doubles can stand in for objects and methods. He also explains the additional RSpec features available for Ruby on Rails, and walks through a step-by-step example of test.sql-driven development.\r\nTopics include:\r\nInstalling and configuring RSpec\r\nWriting and running examples\r\nDefining expectations using matchers\r\nUsing helper methods, before/after hooks, and shared examples\r\nCreating test.sql doubles using mocks and stubs\r\nTesting Ruby on Rails with RSpec\r\nPutting test.sql-driven development into practice', 'Ruby', '', '', 0, 2, 'kamy'),
(72, 'CSS with LESS and Sass with Joe Marini', 'http://www.lynda.com/CSS-tutorials/CSS-LESS-SASS/107921-2.html', 'Ever find yourself wishing that CSS had features like variables, functions, or reusable classes? Look no further. LESS and Sass are CSS style sheet tools called preprocessors that add these features and more, simplifying the creation of complex CSS styles. In this course, author Joe Marini introduces the LESS and Sass tools in a two-part manner.\r\n\r\nThe first section focuses on LESS (Leaner CSS) and how it can be used on both the client and the server. The lessons show how to work with variables, mixins, nested rules, and other features to easily create maintainable CSS. \r\n\r\nThe second section introduces Sass (Syntactically awesome stylesheets), which contains many of the same features as LESS, along with a few new ones. Joe also compares and contrasts the two tools, and explains how your platform and needs may influence which tool you choose.\r\nTopics include:\r\nWhat are LESS and Sass?\r\nUsing variables in your CSS\r\nWorking with reusable and parameterized mixins\r\nImplementing nested rules\r\nCombining CSS rules with operations\r\nUsing the built-in functions in LESS and Sass\r\nControlling the CSS output formatting\r\nImporting external files\r\nSubject:\r\nWeb', 'Bootstrap', '', '', 0, 6, 'kamy'),
(73, 'Customizing Bootstrap 3 with LESS with Jen Kramer', 'http://www.lynda.com/Bootstrap-tutorials/Customizing-Bootstrap-3-LESS/161086-2.html', 'Do more with LESS in Bootstrap. In this course, Jen Kramer shows you how to customize the look and feel of your Bootstrap site with LESS CSS, as well as LESS mixins and Bootstap''s own customization screens. You''ll learn how to configure Prepros, a LESS compiler; work within the LESS file structure; and start modifying fonts, color, spacing, and more with the variables.less file. Then LESS''s mixins will allow you to make advanced customizations like custom buttons and tab styles. Just press Play to start learning.\r\nTopics include:\r\nSetting up your working environment for Bootstrap and LESS\r\nUnderstanding the LESS file structure\r\nCreating and manipulating LESS variables\r\nWorking with LESS mixins\r\nCreating custom styles using mixins and variables', 'Bootstrap', '', '', 0, 7, 'kamy'),
(74, 'Bootstrap 3: Advanced Web Development with Ray Vil', 'http://www.lynda.com/Bootstrap-tutorials/Bootstrap-3-Advanced-Web-Development/124079-2.html?srchtrk=index:1%0Alinktypeid:2%0Aq:bootstrap%2Badvanced%2Bweb%0Apage:1%0As:relevance%0Asa:true%0Aproducttypeid:2', 'Generate your own interactive website from scratch with Bootstrap, the mobile-friendly framework from Twitter, in this start-to-finish course with developer and author Ray Villalobos. First, you''ll plan and prototype the interface with MindMaps and Balsamiq Mockups. Next, download Bootstrap and dive into organizing your site structure with its scaffolding feature—adding PHP includes to break your code into reusable modules and building in the core navigation. Ray then shows you how to build interactive carousels, modal features, and forms, and control these features with JavaScript. Finally, learn to style it all with LESS and prepare to publish the results online.\r\nTopics include:\r\nPrototyping the site\r\nWorking with a local web server\r\nCreating a baseline template with Git\r\nScaffolding the main columns\r\nMaking the site modular with PHP includes\r\nAdding basic navigation\r\nAdding a carousel\r\nWorking with buttons\r\nCreating and activating tabs\r\nAdding page and structure LESS styles', 'Bootstrap', '', '', 0, 3, 'kamy'),
(75, 'Laravel 4 Essential Training with Joseph Lowery', 'http://www.lynda.com/Laravel-tutorials/Laravel-4-Essential-Training/181242-2.html', 'oin Joseph Lowery as he introduces Laravel, a standout PHP framework that helps developers build standout applications. After installing Laravel, Joseph shows how to handle routing requests, filter routes, and apply controllers. Then he covers outputting code and working with Laravel''s advanced templating engine, Blade. Next, you''ll find out how to integrate a functional database with Schema Builder, query data with Eloquent ORM, and keep your schema up to date with migrations. All of these tutorials culminate in the final chapters, where you''ll learn how to build your first app and deploy it on the web. Joe issues hands-on practice challenges along the way to help you test your knowledge.\r\n\r\nNeed a quick dive into Laravel? Check out this short primer, Up and Running with Laravel.\r\nTopics include:\r\nInstalling Laravel and Composer\r\nRouting requests\r\nFiltering routes\r\nIncorporating advanced controllers\r\nCreating a basic Blade template\r\nDeveloping a layout with child pages and forms\r\nIntegrating a database\r\nCreating tables via migrations\r\nOutputting data\r\nBuilding a Laravel app\r\nAuthenticating users\r\nDeploying Laravel code', 'MVC Framework', '', '', 0, 5, 'kamy'),
(76, 'Foundations of Programming: Web Security with Kevi', 'http://www.lynda.com/Developer-Web-Development-tutorials/Foundations-Programming-Web-Security/133330-2.html', 'Learn about the most important security concerns when developing websites, and what you can do to keep your servers, software, and data safe from harm. Instructor Kevin Skoglund explains what motivates hackers and their most common methods of attacks, and then details the techniques and mindset needed to craft solutions for these web security challenges. Learn the eight fundamental principles that underlie all security efforts, the importance of filtering input and controlling output, and smart strategies for encryption and user authentication. Kevin also covers special considerations when it comes to credit cards, regular expressions, source code managers, and databases.\r\n\r\nThis course is great for developers who want to secure their client''s websites, and for anyone else who wants to learn more about web security.\r\nTopics include:\r\nWhy security matters\r\nWhat is a hacker?\r\nHow to write a security policy\r\nCross-site scripting (XSS)\r\nCross-site request forgery (CSRF)\r\nSQL injection\r\nSession hijacking and fixation\r\nPasswords and encryption\r\nSecure credit card payments', 'Programming', '', '', 0, 1, 'kamy'),
(77, 'Kevin-Skoglund Lynda', 'http://www.lynda.com/Kevin-Skoglund/104-1.html', 'Kevin Skoglund is the founder of Nova Fabrica, a web development agency specialized in delivering custom, scalable solutions using Ruby on Rails, PHP, SQL, and related technologies. Nova Fabrica clients include An Event Apart, Atlas Carpet Mills, Consulate Film, Gregorius|Pineo, Maharam, Oakley, and The Bold Italic. Kevin is a lynda.com author with over 15 years of teaching and web development experience.', 'Others', '', '', 0, 5, 'kamy'),
(78, 'Git Essential Training with Kevin Skoglund', 'http://www.lynda.com/Git-tutorials/Understanding-version-control/100222/111248-4.html', '', 'Others', '', '', 0, 1, 'kamy'),
(79, 'Amazing story of how Bulgaria''s Jews were saved in', 'http://edition.cnn.com/videos/world/2015/07/24/intv-amanpour-bulgaria-king-a.cnn/video/playlists/amanpour/', '', 'Antisémitisme', '', '', 0, 5, 'kamy');

-- --------------------------------------------------------

--
-- Table structure for table `links_category`
--

CREATE TABLE IF NOT EXISTS `links_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `links_category`
--

INSERT INTO `links_category` (`id`, `category`) VALUES
(8, 'Antisémitisme'),
(6, 'Bootstrap'),
(9, 'Handicap'),
(5, 'HTML'),
(7, 'Israel'),
(4, 'JQuery'),
(12, 'MVC Framework'),
(1, 'Others'),
(2, 'PHP'),
(11, 'Programming'),
(13, 'Ruby'),
(3, 'SQL');

-- --------------------------------------------------------

--
-- Stand-in structure for view `modele`
--
CREATE TABLE IF NOT EXISTS `modele` (
`PrimaryKey` varchar(68)
,`heure` varchar(5)
,`jour` tinyint(1)
,`client_id` int(11)
,`pseudo` varchar(50)
,`liste_restrictive` tinyint(1)
,`client_sort` int(11)
,`web_view` varchar(50)
,`modele_id` int(11)
,`inverse_addresse` tinyint(1)
,`depart` varchar(70)
,`arrivee` varchar(70)
,`prix_course` decimal(10,2)
,`default_aller` varchar(70)
,`default_arrivee` varchar(70)
,`default_price` decimal(10,2)
,`remarque` text
,`chauffeur` varchar(50)
,`client_habituel` tinyint(1)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `modele_pivot`
--
CREATE TABLE IF NOT EXISTS `modele_pivot` (
`heure` varchar(5)
,`pseudo` varchar(50)
,`web_view` varchar(50)
,`client_id` int(11)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `modele_pivot_visible_no`
--
CREATE TABLE IF NOT EXISTS `modele_pivot_visible_no` (
`heure` varchar(5)
,`pseudo` varchar(50)
,`web_view` varchar(50)
,`client_id` int(11)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `modele_pivot_visible_yes`
--
CREATE TABLE IF NOT EXISTS `modele_pivot_visible_yes` (
`heure` varchar(5)
,`pseudo` varchar(50)
,`web_view` varchar(50)
,`client_id` int(11)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `modele_visible_no`
--
CREATE TABLE IF NOT EXISTS `modele_visible_no` (
`PrimaryKey` varchar(68)
,`heure` varchar(5)
,`jour` tinyint(1)
,`client_id` int(11)
,`pseudo` varchar(50)
,`liste_restrictive` tinyint(1)
,`client_sort` int(11)
,`web_view` varchar(50)
,`modele_id` int(11)
,`inverse_addresse` tinyint(1)
,`depart` varchar(70)
,`arrivee` varchar(70)
,`prix_course` decimal(10,2)
,`default_aller` varchar(70)
,`default_arrivee` varchar(70)
,`default_price` decimal(10,2)
,`remarque` text
,`chauffeur` varchar(50)
,`client_habituel` tinyint(1)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `modele_visible_yes`
--
CREATE TABLE IF NOT EXISTS `modele_visible_yes` (
`PrimaryKey` varchar(68)
,`heure` varchar(5)
,`jour` tinyint(1)
,`client_id` int(11)
,`pseudo` varchar(50)
,`liste_restrictive` tinyint(1)
,`client_sort` int(11)
,`web_view` varchar(50)
,`modele_id` int(11)
,`inverse_addresse` tinyint(1)
,`depart` varchar(70)
,`arrivee` varchar(70)
,`prix_course` decimal(10,2)
,`default_aller` varchar(70)
,`default_arrivee` varchar(70)
,`default_price` decimal(10,2)
,`remarque` text
,`chauffeur` varchar(50)
,`client_habituel` tinyint(1)
,`Lundi` bigint(11)
,`Mardi` bigint(11)
,`Mercredi` bigint(11)
,`Jeudi` bigint(11)
,`Vendredi` bigint(11)
,`Samedi` bigint(11)
,`Dimanche` bigint(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `programmed_courses`
--

CREATE TABLE IF NOT EXISTS `programmed_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `validated_chauffeur` tinyint(1) NOT NULL DEFAULT '0',
  `validated_mgr` tinyint(1) NOT NULL DEFAULT '0',
  `validated_final` tinyint(1) NOT NULL DEFAULT '0',
  `course_date` date DEFAULT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `pseudo_autres` varchar(50) DEFAULT NULL,
  `heure` varchar(5) NOT NULL,
  `aller_retour` varchar(20) NOT NULL DEFAULT 'AllerSimple',
  `chauffeur` varchar(50) DEFAULT NULL,
  `depart` varchar(70) DEFAULT NULL,
  `arrivee` varchar(70) DEFAULT NULL,
  `type_transport` varchar(50) DEFAULT NULL,
  `nom_patient` varchar(60) DEFAULT NULL,
  `bon_no` varchar(60) DEFAULT NULL,
  `prix_course` decimal(10,2) DEFAULT '0.00',
  `remarque` text,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`,`course_date`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `programmed_courses`
--

INSERT INTO `programmed_courses` (`id`, `validated_chauffeur`, `validated_mgr`, `validated_final`, `course_date`, `modele_id`, `client_id`, `pseudo`, `pseudo_autres`, `heure`, `aller_retour`, `chauffeur`, `depart`, `arrivee`, `type_transport`, `nom_patient`, `bon_no`, `prix_course`, `remarque`, `input_date`, `username`) VALUES
(4, 0, 0, 0, '2015-08-08', 76, 8, 'Carouge_Sang', NULL, '01h00', 'AllerSimple', 'Pablo ARZA ', 'rue des Vollandes 68', '  ddddddd', 'Sang', NULL, NULL, '0.00', NULL, '2015-08-08 01:46:25', NULL),
(5, 0, 0, 0, '2015-08-08', 77, 16, 'ALOHA', NULL, '01h30', 'AllerSimple', 'Luan HAZIRI ', 'rue des Vollandes 68', ' travail', 'Liste Patients', NULL, NULL, '60.00', NULL, '2015-08-08 01:46:25', NULL),
(7, 0, 0, 0, '2015-08-10', 94, 6, 'Tour_Patient', NULL, '00h45', 'AllerSimple', '', '', '', 'Liste Patients', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(8, 0, 0, 0, '2015-08-10', 72, 9, 'AURELIE', NULL, '18h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(9, 0, 0, 0, '2015-08-10', 73, 9, 'AURELIE', NULL, '21h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(10, 0, 0, 0, '2015-08-10', 81, 9, 'AURELIE', NULL, '01h45', 'AllerSimple', 'Kamran NAFISSPOUR', 'rue des Vollandes 68', ' travail', 'Standard', NULL, NULL, '-2.00', NULL, '2015-08-10 15:57:37', NULL),
(11, 0, 0, 0, '2015-08-10', 40, 12, 'NAF_Kamy', NULL, '13h45', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(12, 0, 0, 0, '2015-08-10', 46, 12, 'NAF_Kamy', NULL, '18h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(13, 0, 0, 0, '2015-08-10', 79, 16, 'ALOHA', NULL, '00h30', 'AllerSimple', 'Djamila AMRANI ', 'travail', 'ddddddd', 'Liste Patients', NULL, NULL, '90.00', NULL, '2015-08-10 15:57:37', NULL),
(14, 0, 0, 0, '2015-08-10', 82, 16, 'ALOHA', NULL, '00h30', 'AllerSimple', 'Kamran NAFISSPOUR', '', 'null', 'Liste Patients', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(15, 0, 0, 0, '2015-08-10', 83, 16, 'ALOHA', NULL, '03h15', 'AllerSimple', 'Kamran NAFISSPOUR', '', 'null', 'Liste Patients', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(16, 0, 0, 0, '2015-08-10', 97, 16, 'ALOHA', NULL, '00h30', 'AllerSimple', '', '', 'null', 'Liste Patients', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(17, 0, 0, 0, '2015-08-10', 89, 19, 'ALBER', NULL, '04h30', 'AllerSimple', '', NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(18, 0, 0, 0, '2015-08-10', 86, 21, 'AMREIN', NULL, '04h15', 'AllerSimple', '', 'null', 'null', 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(19, 0, 0, 0, '2015-08-10', 63, 56, 'CHEVALLIER', NULL, '10h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(20, 0, 0, 0, '2015-08-10', 78, 56, 'CHEVALLIER', NULL, '10h00', 'AllerSimple', 'Luan HAZIRI ', 'rue des Vollandes 68', ' travail', 'Standard', NULL, NULL, '29.00', NULL, '2015-08-10 15:57:37', NULL),
(21, 0, 0, 0, '2015-08-10', 80, 56, 'CHEVALLIER', NULL, '10h00', 'AllerSimple', 'Luan HAZIRI ', 'rue des Vollandes 68', ' travail', 'Standard', NULL, NULL, '29.00', NULL, '2015-08-10 15:57:37', NULL),
(22, 0, 0, 0, '2015-08-10', 59, 120, 'INEICHEN', NULL, '08h30', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(23, 0, 0, 0, '2015-08-10', 51, 173, 'PERRNOUD', NULL, '07h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(24, 0, 0, 0, '2015-08-10', 66, 173, 'PERRNOUD', NULL, '11h30', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(25, 0, 0, 0, '2015-08-10', 69, 238, 'VUSICKI', NULL, '10h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(26, 0, 0, 0, '2015-08-10', 70, 238, 'VUSICKI', NULL, '11h45', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(27, 0, 0, 0, '2015-08-10', 54, 240, 'WEBER_F', NULL, '08h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-10 15:57:37', NULL),
(38, 0, 0, 0, '2015-08-18', 42, 12, 'NAF_Kamy', NULL, '13h45', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(39, 0, 0, 0, '2015-08-18', 47, 12, 'NAF_Kamy', NULL, '18h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(40, 2, 0, 0, '2015-08-18', 85, 19, 'ALBER', NULL, '04h00', 'AllerSimple', 'Kamran NAFISSPOUR', '', 'null', 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(41, 1, 0, 0, '2015-08-18', 88, 19, 'ALBER', NULL, '04h00', 'AllerSimple', 'Kamran NAFISSPOUR', '', 'null', 'Standard', NULL, NULL, '25.00', NULL, '2015-08-18 16:43:14', NULL),
(42, 0, 0, 0, '2015-08-18', 64, 56, 'CHEVALLIER', NULL, '09h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(43, 0, 0, 0, '2015-08-18', 60, 120, 'INEICHEN', NULL, '08h30', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(44, 0, 0, 0, '2015-08-18', 55, 240, 'WEBER_F', NULL, '08h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-08-18 16:43:14', NULL),
(45, 1, 0, 0, '2015-08-28', NULL, 6, 'Tour_Patient', '', '09h30', 'AllerSimple', 'Kamran NAFISSPOUR', 'tour', 'Jolimont', 'Liste Patients', 'Zwaroop', '', '0.00', 'Numéro Opale : 291319 \r\nNom du patient : Zwaroop \r\nPrénom du patient : Narendra \r\nDate de naissance : 18/05/2015', '2015-08-27 19:09:58', 'kamy'),
(46, 0, 0, 0, '2015-08-28', NULL, 6, 'Tour_Patient', '', '09h30', 'AllerSimple', 'Pablo ARZA', 'tour', 'Jolimont', 'Liste Patients', 'Goel', '', '0.00', 'Numéro Opale : 284357 \r\nNom du patient : Goel \r\nPrénom du patient : Jeanine \r\nDate de naissance : 13/01/1927', '2015-08-27 19:14:54', 'kamy'),
(47, 0, 0, 0, '2015-08-28', NULL, 6, 'Tour_Patient', '', '10h15', 'AllerSimple', 'Pablo ARZA', 'tour', 'Bois-Bougy', 'Liste Patients', 'TOLBA', '', '0.00', 'Numéro Opale : 152355 \r\nNom du patient : MR TOLBA \r\nPrénom du patient : MOSTAFA KAMAL \r\nDate de naissance : 08/12/1922', '2015-08-27 19:16:44', 'kamy'),
(48, 0, 0, 0, '2015-09-01', 42, 12, 'NAF_Kamy', NULL, '13h45', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL),
(49, 0, 0, 0, '2015-09-01', 47, 12, 'NAF_Kamy', NULL, '18h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL),
(50, 0, 0, 0, '2015-09-01', 85, 19, 'ALBER', NULL, '04h00', 'AllerSimple', '', '', 'null', 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL),
(51, 0, 0, 0, '2015-09-01', 88, 19, 'ALBER', NULL, '04h00', 'AllerSimple', '', '', 'null', 'Standard', NULL, NULL, '25.00', NULL, '2015-09-01 14:01:50', NULL),
(52, 0, 0, 0, '2015-09-01', 64, 56, 'CHEVALLIER', NULL, '09h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL),
(53, 0, 0, 0, '2015-09-01', 60, 120, 'INEICHEN', NULL, '08h30', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL),
(54, 0, 0, 0, '2015-09-01', 55, 240, 'WEBER_F', NULL, '08h00', 'AllerSimple', NULL, NULL, NULL, 'Standard', NULL, NULL, '0.00', NULL, '2015-09-01 14:01:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programmed_courses_modele`
--

CREATE TABLE IF NOT EXISTS `programmed_courses_modele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `week_day_rank` tinyint(1) NOT NULL,
  `client_habituel` tinyint(1) DEFAULT '1',
  `client_id` int(11) NOT NULL,
  `heure` varchar(5) NOT NULL,
  `inverse_addresse` tinyint(1) NOT NULL DEFAULT '0',
  `depart` varchar(70) DEFAULT NULL,
  `arrivee` varchar(70) DEFAULT NULL,
  `prix_course` decimal(10,2) DEFAULT '0.00',
  `chauffeur` varchar(50) DEFAULT NULL,
  `remarque` text,
  `type_transport` varchar(50) DEFAULT NULL,
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `week_day_rank` (`week_day_rank`,`client_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `programmed_courses_modele`
--

INSERT INTO `programmed_courses_modele` (`id`, `visible`, `week_day_rank`, `client_habituel`, `client_id`, `heure`, `inverse_addresse`, `depart`, `arrivee`, `prix_course`, `chauffeur`, `remarque`, `type_transport`, `input_date`, `username`) VALUES
(39, 1, 7, 1, 13, '04h00', 0, 'Travail', 'Domicile', '0.00', 'Vincent DUBOULOZ ', '', 'Standard', '2014-11-29 05:20:44', 'kamy'),
(40, 1, 1, 1, 12, '13h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(41, 0, 1, 1, 12, '13h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(42, 1, 2, 1, 12, '13h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(44, 0, 4, 1, 12, '13h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(45, 1, 5, 1, 12, '13h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(46, 1, 1, 1, 12, '18h00', 1, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(47, 1, 2, 1, 12, '18h00', 1, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(49, 1, 4, 1, 12, '18h00', 1, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(50, 1, 5, 1, 12, '18h00', 1, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(51, 1, 1, 1, 173, '07h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(53, 1, 5, 1, 173, '07h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(54, 1, 1, 1, 240, '08h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(55, 1, 2, 1, 240, '08h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(57, 1, 4, 1, 240, '08h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(58, 1, 5, 1, 240, '08h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(59, 1, 1, 1, 120, '08h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(60, 1, 2, 1, 120, '08h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(61, 1, 4, 1, 120, '08h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(62, 1, 5, 1, 120, '08h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(63, 1, 1, 1, 56, '10h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(64, 1, 2, 1, 56, '09h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(65, 1, 4, 1, 56, '09h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(66, 1, 1, 1, 173, '11h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(68, 1, 5, 1, 173, '11h30', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(69, 1, 1, 1, 238, '10h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(70, 1, 1, 1, 238, '11h45', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(72, 1, 1, 1, 9, '18h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(73, 1, 1, 1, 9, '21h00', 0, NULL, NULL, NULL, NULL, NULL, 'Standard', '2015-04-24 22:19:31', NULL),
(76, 1, 6, 1, 8, '01h00', 0, 'rue des Vollandes 68', '  ddddddd', '0.00', 'Pablo ARZA ', ' ', 'Sang', '2015-05-23 14:48:16', 'kamy'),
(77, 1, 6, 1, 16, '01h30', 0, 'rue des Vollandes 68', ' travail', '60.00', 'Luan HAZIRI ', ' ', 'Liste Patients', '2015-05-23 21:38:22', 'kamy'),
(78, 1, 1, 0, 56, '10h00', 0, 'rue des Vollandes 68', ' travail', '29.00', 'Luan HAZIRI ', ' ', 'Standard', '2015-05-24 07:50:55', 'kamy'),
(79, 0, 1, 0, 16, '00h30', 0, 'travail', 'ddddddd', '90.00', 'Djamila AMRANI ', 'Aloha est un très mauvais client et on doit impérativement faire comprendre cette problématique à tous les concernés', 'Liste Patients', '2015-05-24 12:52:49', 'kamy'),
(80, 1, 1, 0, 56, '10h00', 0, 'rue des Vollandes 68', ' travail', '29.00', 'Luan HAZIRI ', ' ', 'Standard', '2015-05-24 15:07:17', 'kamy'),
(81, 1, 1, 1, 9, '01h45', 0, 'rue des Vollandes 68', ' travail', '-2.00', 'Kamran NAFISSPOUR', '', 'Standard', '2015-05-25 16:31:27', 'kamy'),
(82, 0, 1, 1, 16, '00h30', 0, '', 'null', '0.00', 'Kamran NAFISSPOUR', '', 'Liste Patients', '2015-05-29 08:05:49', 'kamy'),
(83, 1, 1, 1, 16, '03h15', 0, '', 'null', '0.00', 'Kamran NAFISSPOUR', '', 'Liste Patients', '2015-05-30 13:51:42', 'kamy'),
(85, 1, 2, 1, 19, '04h00', 0, '', 'null', '0.00', '', '', 'Standard', '2015-05-30 19:57:15', 'kamy'),
(86, 1, 1, 1, 21, '04h15', 0, 'null', 'null', '0.00', '', '', 'Standard', '2015-05-30 20:55:18', 'kamy'),
(88, 1, 2, 1, 19, '04h00', 0, '', 'null', '25.00', '', '', 'Standard', '2015-05-30 21:02:59', 'kamy'),
(89, 1, 1, 1, 19, '04h30', 0, NULL, NULL, '0.00', '', '', 'Standard', '2015-05-30 21:16:56', 'kamy'),
(90, 0, 1, 1, 13, '00h15', 0, 'aaaaaaaa', 'bbbbbbbbb', '0.00', 'Autres ', '', 'Standard', '2015-05-30 21:21:19', 'kamy'),
(94, 1, 1, 1, 6, '00h45', 0, '', '', '0.00', '', '', 'Liste Patients', '2015-05-30 23:00:05', 'kamy'),
(97, 0, 1, 1, 16, '00h30', 0, '', 'null', '0.00', '', '', 'Liste Patients', '2015-05-30 23:07:09', 'kamy');

-- --------------------------------------------------------

--
-- Stand-in structure for view `summary_by_course_date_program`
--
CREATE TABLE IF NOT EXISTS `summary_by_course_date_program` (
`course_date` date
,`day_before` date
,`day_after` date
,`date_unix` bigint(10)
,`today` date
,`diff` int(7)
,`str_time` varchar(12)
,`str_time_fr` varchar(21)
,`date_format` varchar(510)
,`now_round_time` time
,`now_time_transmed` varchar(5)
,`monthname` varchar(9)
,`year` int(4)
,`week` int(2)
,`total_course` bigint(21)
,`valid_chauf_0` decimal(23,0)
,`valid_chauf_1` decimal(23,0)
,`valid_chauf_2` decimal(23,0)
,`valid_mgr_0` decimal(23,0)
,`valid_mgr_1` decimal(23,0)
,`valid_fina1_0` decimal(23,0)
,`valid_fina1_1` decimal(23,0)
,`prix_course_0` decimal(23,0)
,`erreur_chauffeur` decimal(23,0)
,`erreur_address` decimal(23,0)
,`erreur_autres` decimal(23,0)
,`erreur_patients` decimal(23,0)
,`erreur_sang` decimal(23,0)
,`erreur_general` decimal(23,0)
);
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `comment`) VALUES
(1, 'admin', NULL),
(2, 'manager', NULL),
(3, 'secretary', NULL),
(4, 'employee', NULL);

-- --------------------------------------------------------

--
-- Structure for view `modele`
--
DROP TABLE IF EXISTS `modele`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele` AS select concat_ws('-',`p`.`heure`,`c`.`pseudo`,`c`.`id`) AS `PrimaryKey`,`p`.`heure` AS `heure`,`p`.`week_day_rank` AS `jour`,`p`.`client_id` AS `client_id`,`c`.`pseudo` AS `pseudo`,`c`.`liste_restrictive` AS `liste_restrictive`,`c`.`liste_rank` AS `client_sort`,`c`.`web_view` AS `web_view`,`p`.`id` AS `modele_id`,`p`.`inverse_addresse` AS `inverse_addresse`,`p`.`depart` AS `depart`,`p`.`arrivee` AS `arrivee`,`p`.`prix_course` AS `prix_course`,`c`.`default_aller` AS `default_aller`,`c`.`default_arrivee` AS `default_arrivee`,`c`.`default_price` AS `default_price`,`p`.`remarque` AS `remarque`,`p`.`chauffeur` AS `chauffeur`,`p`.`client_habituel` AS `client_habituel`,(case when (`p`.`week_day_rank` = 1) then `p`.`id` end) AS `Lundi`,(case when (`p`.`week_day_rank` = 2) then `p`.`id` end) AS `Mardi`,(case when (`p`.`week_day_rank` = 3) then `p`.`id` end) AS `Mercredi`,(case when (`p`.`week_day_rank` = 4) then `p`.`id` end) AS `Jeudi`,(case when (`p`.`week_day_rank` = 5) then `p`.`id` end) AS `Vendredi`,(case when (`p`.`week_day_rank` = 6) then `p`.`id` end) AS `Samedi`,(case when (`p`.`week_day_rank` = 7) then `p`.`id` end) AS `Dimanche` from (`clients` `c` join `programmed_courses_modele` `p` on((`c`.`id` = `p`.`client_id`))) order by `p`.`heure`,`p`.`week_day_rank`,`c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `modele_pivot`
--
DROP TABLE IF EXISTS `modele_pivot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele_pivot` AS (select `modele`.`heure` AS `heure`,`modele`.`pseudo` AS `pseudo`,`modele`.`web_view` AS `web_view`,`modele`.`client_id` AS `client_id`,max(`modele`.`Lundi`) AS `Lundi`,max(`modele`.`Mardi`) AS `Mardi`,max(`modele`.`Mercredi`) AS `Mercredi`,max(`modele`.`Jeudi`) AS `Jeudi`,max(`modele`.`Vendredi`) AS `Vendredi`,max(`modele`.`Samedi`) AS `Samedi`,max(`modele`.`Dimanche`) AS `Dimanche` from `modele` group by `modele`.`heure`,`modele`.`pseudo`,`modele`.`web_view`,`modele`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `modele_pivot_visible_no`
--
DROP TABLE IF EXISTS `modele_pivot_visible_no`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele_pivot_visible_no` AS (select `modele_visible_no`.`heure` AS `heure`,`modele_visible_no`.`pseudo` AS `pseudo`,`modele_visible_no`.`web_view` AS `web_view`,`modele_visible_no`.`client_id` AS `client_id`,max(`modele_visible_no`.`Lundi`) AS `Lundi`,max(`modele_visible_no`.`Mardi`) AS `Mardi`,max(`modele_visible_no`.`Mercredi`) AS `Mercredi`,max(`modele_visible_no`.`Jeudi`) AS `Jeudi`,max(`modele_visible_no`.`Vendredi`) AS `Vendredi`,max(`modele_visible_no`.`Samedi`) AS `Samedi`,max(`modele_visible_no`.`Dimanche`) AS `Dimanche` from `modele_visible_no` group by `modele_visible_no`.`heure`,`modele_visible_no`.`pseudo`,`modele_visible_no`.`web_view`,`modele_visible_no`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `modele_pivot_visible_yes`
--
DROP TABLE IF EXISTS `modele_pivot_visible_yes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele_pivot_visible_yes` AS (select `modele_visible_yes`.`heure` AS `heure`,`modele_visible_yes`.`pseudo` AS `pseudo`,`modele_visible_yes`.`web_view` AS `web_view`,`modele_visible_yes`.`client_id` AS `client_id`,max(`modele_visible_yes`.`Lundi`) AS `Lundi`,max(`modele_visible_yes`.`Mardi`) AS `Mardi`,max(`modele_visible_yes`.`Mercredi`) AS `Mercredi`,max(`modele_visible_yes`.`Jeudi`) AS `Jeudi`,max(`modele_visible_yes`.`Vendredi`) AS `Vendredi`,max(`modele_visible_yes`.`Samedi`) AS `Samedi`,max(`modele_visible_yes`.`Dimanche`) AS `Dimanche` from `modele_visible_yes` group by `modele_visible_yes`.`heure`,`modele_visible_yes`.`pseudo`,`modele_visible_yes`.`web_view`,`modele_visible_yes`.`client_id`);

-- --------------------------------------------------------

--
-- Structure for view `modele_visible_no`
--
DROP TABLE IF EXISTS `modele_visible_no`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele_visible_no` AS select concat_ws('-',`p`.`heure`,`c`.`pseudo`,`c`.`id`) AS `PrimaryKey`,`p`.`heure` AS `heure`,`p`.`week_day_rank` AS `jour`,`p`.`client_id` AS `client_id`,`c`.`pseudo` AS `pseudo`,`c`.`liste_restrictive` AS `liste_restrictive`,`c`.`liste_rank` AS `client_sort`,`c`.`web_view` AS `web_view`,`p`.`id` AS `modele_id`,`p`.`inverse_addresse` AS `inverse_addresse`,`p`.`depart` AS `depart`,`p`.`arrivee` AS `arrivee`,`p`.`prix_course` AS `prix_course`,`c`.`default_aller` AS `default_aller`,`c`.`default_arrivee` AS `default_arrivee`,`c`.`default_price` AS `default_price`,`p`.`remarque` AS `remarque`,`p`.`chauffeur` AS `chauffeur`,`p`.`client_habituel` AS `client_habituel`,(case when (`p`.`week_day_rank` = 1) then `p`.`id` end) AS `Lundi`,(case when (`p`.`week_day_rank` = 2) then `p`.`id` end) AS `Mardi`,(case when (`p`.`week_day_rank` = 3) then `p`.`id` end) AS `Mercredi`,(case when (`p`.`week_day_rank` = 4) then `p`.`id` end) AS `Jeudi`,(case when (`p`.`week_day_rank` = 5) then `p`.`id` end) AS `Vendredi`,(case when (`p`.`week_day_rank` = 6) then `p`.`id` end) AS `Samedi`,(case when (`p`.`week_day_rank` = 7) then `p`.`id` end) AS `Dimanche` from (`clients` `c` join `programmed_courses_modele` `p` on((`c`.`id` = `p`.`client_id`))) where (`p`.`visible` = 0) order by `p`.`heure`,`p`.`week_day_rank`,`c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `modele_visible_yes`
--
DROP TABLE IF EXISTS `modele_visible_yes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `modele_visible_yes` AS select concat_ws('-',`p`.`heure`,`c`.`pseudo`,`c`.`id`) AS `PrimaryKey`,`p`.`heure` AS `heure`,`p`.`week_day_rank` AS `jour`,`p`.`client_id` AS `client_id`,`c`.`pseudo` AS `pseudo`,`c`.`liste_restrictive` AS `liste_restrictive`,`c`.`liste_rank` AS `client_sort`,`c`.`web_view` AS `web_view`,`p`.`id` AS `modele_id`,`p`.`inverse_addresse` AS `inverse_addresse`,`p`.`depart` AS `depart`,`p`.`arrivee` AS `arrivee`,`p`.`prix_course` AS `prix_course`,`c`.`default_aller` AS `default_aller`,`c`.`default_arrivee` AS `default_arrivee`,`c`.`default_price` AS `default_price`,`p`.`remarque` AS `remarque`,`p`.`chauffeur` AS `chauffeur`,`p`.`client_habituel` AS `client_habituel`,(case when (`p`.`week_day_rank` = 1) then `p`.`id` end) AS `Lundi`,(case when (`p`.`week_day_rank` = 2) then `p`.`id` end) AS `Mardi`,(case when (`p`.`week_day_rank` = 3) then `p`.`id` end) AS `Mercredi`,(case when (`p`.`week_day_rank` = 4) then `p`.`id` end) AS `Jeudi`,(case when (`p`.`week_day_rank` = 5) then `p`.`id` end) AS `Vendredi`,(case when (`p`.`week_day_rank` = 6) then `p`.`id` end) AS `Samedi`,(case when (`p`.`week_day_rank` = 7) then `p`.`id` end) AS `Dimanche` from (`clients` `c` join `programmed_courses_modele` `p` on((`c`.`id` = `p`.`client_id`))) where (`p`.`visible` = 1) order by `p`.`heure`,`p`.`week_day_rank`,`c`.`liste_rank`;

-- --------------------------------------------------------

--
-- Structure for view `summary_by_course_date_program`
--
DROP TABLE IF EXISTS `summary_by_course_date_program`;

CREATE ALGORITHM=UNDEFINED DEFINER=`kamy333`@`imu384.infomaniak.ch` SQL SECURITY DEFINER VIEW `summary_by_course_date_program` AS select distinct `programmed_courses`.`course_date` AS `course_date`,(`programmed_courses`.`course_date` - interval 1 day) AS `day_before`,(`programmed_courses`.`course_date` + interval 1 day) AS `day_after`,unix_timestamp(`programmed_courses`.`course_date`) AS `date_unix`,cast(now() as date) AS `today`,(to_days(`programmed_courses`.`course_date`) - to_days(now())) AS `diff`,(case when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = -(1)) then 'yesterday' when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = 1) then 'tomorrow' when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) < 0) then concat((to_days(`programmed_courses`.`course_date`) - to_days(now())),' day') when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) > 0) then concat('+',(to_days(`programmed_courses`.`course_date`) - to_days(now())),' day') when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = 0) then 'now' else 'now' end) AS `str_time`,(case when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = -(1)) then 'hier' when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = 1) then 'demain' when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) < 0) then concat('il y a ',-((to_days(`programmed_courses`.`course_date`) - to_days(now()))),' jours') when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) > 0) then concat('dans ',(to_days(`programmed_courses`.`course_date`) - to_days(now())),' jours') when ((to_days(`programmed_courses`.`course_date`) - to_days(now())) = 0) then 'aujourd\'hui' else 'now' end) AS `str_time_fr`,date_format(`programmed_courses`.`course_date`,get_format(DATE, 'EUR')) AS `date_format`,sec_to_time(((time_to_sec(now()) DIV 900) * 900)) AS `now_round_time`,replace(substr(sec_to_time(((time_to_sec(now()) DIV 900) * 900)),1,5),':','h') AS `now_time_transmed`,monthname(`programmed_courses`.`course_date`) AS `monthname`,year(`programmed_courses`.`course_date`) AS `year`,week(`programmed_courses`.`course_date`,0) AS `week`,count(`programmed_courses`.`course_date`) AS `total_course`,sum(if((`programmed_courses`.`validated_chauffeur` = 0),1,0)) AS `valid_chauf_0`,sum(if((`programmed_courses`.`validated_chauffeur` = 1),1,0)) AS `valid_chauf_1`,sum(if((`programmed_courses`.`validated_chauffeur` = 2),1,0)) AS `valid_chauf_2`,sum(if((`programmed_courses`.`validated_mgr` = 0),1,0)) AS `valid_mgr_0`,sum(if((`programmed_courses`.`validated_mgr` = 1),1,0)) AS `valid_mgr_1`,sum(if((`programmed_courses`.`validated_final` = 0),1,0)) AS `valid_fina1_0`,sum(if((`programmed_courses`.`validated_final` = 1),1,0)) AS `valid_fina1_1`,sum(if((`programmed_courses`.`prix_course` = 0),1,0)) AS `prix_course_0`,sum(((`programmed_courses`.`chauffeur` = '') or isnull(`programmed_courses`.`chauffeur`))) AS `erreur_chauffeur`,sum(((`programmed_courses`.`depart` = '') or isnull(`programmed_courses`.`depart`) or (`programmed_courses`.`arrivee` = '') or isnull(`programmed_courses`.`arrivee`))) AS `erreur_address`,sum(((`programmed_courses`.`pseudo` = 'autres') or ((`programmed_courses`.`pseudo` = 'colline') and ((`programmed_courses`.`pseudo_autres` = '') or isnull(`programmed_courses`.`pseudo_autres`))))) AS `erreur_autres`,sum((((`programmed_courses`.`pseudo` = 'tour_patient') or (`programmed_courses`.`pseudo` = 'tag') or (`programmed_courses`.`pseudo` = 'partners') or (`programmed_courses`.`pseudo` = 'mines_icbl') or (`programmed_courses`.`pseudo` = 'cash') or (`programmed_courses`.`pseudo` = 'aude') or (`programmed_courses`.`pseudo` = 'aloha')) and ((`programmed_courses`.`nom_patient` = '') or isnull(`programmed_courses`.`nom_patient`)))) AS `erreur_patients`,sum(((`programmed_courses`.`pseudo` = 'tour_sang') or ((`programmed_courses`.`pseudo` = 'carouge_sang') and ((`programmed_courses`.`bon_no` = '') or isnull(`programmed_courses`.`bon_no`))))) AS `erreur_sang`,sum(((`programmed_courses`.`depart` = '') or isnull(`programmed_courses`.`depart`) or (`programmed_courses`.`arrivee` = '') or isnull(`programmed_courses`.`arrivee`) or (((`programmed_courses`.`pseudo` = 'tour_patient') or (`programmed_courses`.`pseudo` = 'tag') or (`programmed_courses`.`pseudo` = 'partners') or (`programmed_courses`.`pseudo` = 'mines_icbl') or (`programmed_courses`.`pseudo` = 'cash') or (`programmed_courses`.`pseudo` = 'aude') or (`programmed_courses`.`pseudo` = 'aloha')) and ((`programmed_courses`.`nom_patient` = '') or isnull(`programmed_courses`.`nom_patient`))) or (`programmed_courses`.`pseudo` = 'autres') or ((`programmed_courses`.`pseudo` = 'colline') and ((`programmed_courses`.`pseudo_autres` = '') or isnull(`programmed_courses`.`pseudo_autres`))) or (`programmed_courses`.`pseudo` = 'tour_sang') or ((`programmed_courses`.`pseudo` = 'carouge_sang') and ((`programmed_courses`.`bon_no` = '') or isnull(`programmed_courses`.`bon_no`))))) AS `erreur_general` from `programmed_courses` group by `programmed_courses`.`course_date` order by `programmed_courses`.`course_date` desc;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `programmed_courses`
--
ALTER TABLE `programmed_courses`
  ADD CONSTRAINT `programmed_courses_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `programmed_courses_modele`
--
ALTER TABLE `programmed_courses_modele`
  ADD CONSTRAINT `programmed_courses_modele_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
