-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 mars 2022 à 11:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
CREATE TABLE IF NOT EXISTS `candidats` (
  `APOGEE` int(10) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `NOM` varchar(20) NOT NULL,
  `PRENOM` varchar(20) NOT NULL,
  `FILIERE` varchar(4) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `IDmob` int(10) NOT NULL,
  `NOMmob` varchar(30) NOT NULL,
  `FICHIERS` varchar(40) DEFAULT NULL,
  UNIQUE KEY `UN_C` (`CIN`,`IDmob`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`APOGEE`, `CIN`, `NOM`, `PRENOM`, `FILIERE`, `EMAIL`, `IDmob`, `NOMmob`, `FICHIERS`) VALUES
(147852, 'I11223', 'TEST', 'Test', 'GI', 'test@gmail.com', 1, 'INSA Toulouse', 'C:/wamp64/www/Projet/admin'),
(147852, 'I11223', 'TEST', 'Test', 'GI', 'test@gmail.com', 3, 'POLYTECH Angers', 'C:/wamp64/www/Projet/admin'),
(123789, 'L1245', 'TEST1', 'Test1', 'GI', 'test1@usms.ac.ma', 1, 'INSA Toulouse', 'C:/wamp64/www/Projet/admin'),
(12345678, 'I23456', 'ALLAMImodif', 'Ahmedmodif', 'GI', 'alami@usms.ac.ma', 1, 'INSA Toulouse', 'C:/wamp64/www/Projet/admin'),
(12345678, 'I23456', 'ALLAMI', 'Ahmed', 'GI', 'alami@usms.ac.ma', 3, 'POLYTECH Angers', 'C:/wamp64/www/Projet/admin'),
(1234567, 'I101010', 'MACHIN', 'Sanae', 'GI', 'machin@usms.ac.ma', 1, 'INSA Toulouse', 'C:/wamp64/www/Projet/admin'),
(1234567, 'I101010', 'MACHIN', 'Sanae', 'GI', 'machin@usms.ac.ma', 3, 'POLYTECH Angers', 'C:/wamp64/www/Projet/admin'),
(12345678, 'I23456', 'ALLAMI', 'Ahmed', 'GI', 'alami@usms.ac.ma', 2, 'INSA Centre Val De Loire', 'C:/wamp64/www/Projet/admin');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

DROP TABLE IF EXISTS `comptes`;
CREATE TABLE IF NOT EXISTS `comptes` (
  `APOGEE` int(20) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `NOM` varchar(20) NOT NULL,
  `PRENOM` varchar(20) NOT NULL,
  `FILIERE` varchar(4) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  PRIMARY KEY (`CIN`),
  UNIQUE KEY `APOGEE` (`APOGEE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`APOGEE`, `CIN`, `NOM`, `PRENOM`, `FILIERE`, `EMAIL`, `PASSWORD`) VALUES
(12345678, 'I23456', 'ALLAMI', 'Ahmed', 'GE', 'alami@usms.ac.ma', 'ab4f63f9ac65152575886860dde480a1'),
(1010101, 'I012345', 'KAMAL', 'Said', 'GPEE', 'kamal@usms.ac.ma', 'e10adc3949ba59abbe56e057f20f883e'),
(1234567, 'I101010', 'MACHIN', 'Sanae', 'IID', 'machin@usms.ac.ma', 'd6a9a933c8aafc51e55ac0662b6e4d4a'),
(147852, 'I11223', 'TEST', 'Test', 'GI', 'test@gmail.com', 'dcddb75469b4b4875094e14561e573d8'),
(123789, 'L1245', 'TEST1', 'Test1', 'GI', 'test1@usms.ac.ma', '01720eacf7b5d6f2a5382683ae07d4b3');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `ID` int(4) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mobilites`
--

DROP TABLE IF EXISTS `mobilites`;
CREATE TABLE IF NOT EXISTS `mobilites` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PROCEDURES` varchar(30) NOT NULL,
  `CALENDRIER` date NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `ETAT` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mobilites`
--

INSERT INTO `mobilites` (`ID`, `PROCEDURES`, `CALENDRIER`, `NOM`, `ETAT`) VALUES
(1, 'Candidature avec preslection', '2022-01-20', 'INSA Toulouse', 'ouvert'),
(2, 'Preselection et entretien', '2022-01-25', 'INSA Centre Val De Loire', 'ferme'),
(3, 'Preselection et entretien', '2022-01-27', 'POLYTECH Angers ', 'ouvert'),
(4, 'Preselection et entretien', '2022-01-31', 'EIL Cote Opale', 'ouvert');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

DROP TABLE IF EXISTS `resultats`;
CREATE TABLE IF NOT EXISTS `resultats` (
  `APOGEE` int(20) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `NOM` varchar(20) NOT NULL,
  `PRENOM` varchar(20) NOT NULL,
  `FILIERE` varchar(4) NOT NULL,
  `IDmob` varchar(10) NOT NULL,
  `NOMmob` varchar(30) NOT NULL,
  `ETAT` varchar(15) NOT NULL,
  UNIQUE KEY `UQ_AP_ID` (`APOGEE`,`IDmob`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`APOGEE`, `CIN`, `NOM`, `PRENOM`, `FILIERE`, `IDmob`, `NOMmob`, `ETAT`) VALUES
(147852, 'I11223', 'TEST', 'Test', 'GI', '1', 'INSA Toulouse', 'accepte'),
(147852, 'I11223', 'TEST', 'Test', 'GI', '3', 'POLYTECH Angers', 'accepte'),
(123789, 'L1245', 'TEST1', 'Test1', 'GI', '4', 'EIL Cote Opale', 'accepte'),
(123789, 'L1245', 'TEST1', 'Test1', 'GI', '1', 'INSA Toulouse', 'refuse'),
(12345678, 'I23456', 'ALLAMImodif', 'Ahmedmodif', 'GI', '1', 'INSA Toulouse', 'refuse'),
(12345678, 'I23456', 'ALLAMI', 'Ahmed', 'GI', '3', 'POLYTECH Angers', 'refuse'),
(1234567, 'I101010', 'MACHIN', 'Sanae', 'GI', '1', 'INSA Toulouse', 'accepte'),
(1234567, 'I101010', 'MACHIN', 'Sanae', 'GI', '3', 'POLYTECH Angers', 'refuse');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
