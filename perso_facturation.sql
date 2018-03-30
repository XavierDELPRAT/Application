-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 30 Mars 2018 à 12:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `perso_facturation`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id_cla` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `id_cli` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_cla`),
  KEY `id_cli` (`id_cli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id_cla`, `libelle`, `id_cli`) VALUES
(32, 'DEESWEB', 14),
(33, 'test', 17);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_cli` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `raison_social` varchar(75) DEFAULT NULL,
  `destinataire` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `emailcc` varchar(255) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `etat` int(11) DEFAULT '1',
  `id_encaiss` smallint(5) unsigned DEFAULT NULL,
  `id_type` smallint(5) unsigned DEFAULT NULL,
  `id_u` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_cli`),
  KEY `id_encaiss` (`id_encaiss`),
  KEY `id_type` (`id_type`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `raison_social`, `destinataire`, `email`, `emailcc`, `adresse`, `cp`, `ville`, `etat`, `id_encaiss`, `id_type`, `id_u`) VALUES
(14, 'IRIS', 'IPF C&R', 'j.sabarots@ecoleiris.fr', 'j.oliveira@ecoleiris.fr', '63, rue Ampère', '75017', 'Paris', 1, 1, 2, 1),
(17, 'ITIC', 'ITIC', 'margot@iticparis.com', 'mcamus@iticparis.com', '190bis, boulevard de Charonne', '75020', 'Paris', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `clients_prestations`
--

CREATE TABLE IF NOT EXISTS `clients_prestations` (
  `id_cli` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_presta` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tarif` decimal(7,0) DEFAULT NULL,
  PRIMARY KEY (`id_cli`,`id_presta`),
  KEY `id_presta` (`id_presta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients_prestations`
--

INSERT INTO `clients_prestations` (`id_cli`, `id_presta`, `tarif`) VALUES
(14, 1, '50'),
(14, 2, '50'),
(14, 5, '50'),
(17, 6, '50');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `ref_date` date NOT NULL,
  PRIMARY KEY (`ref_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `date`
--

INSERT INTO `date` (`ref_date`) VALUES
('0000-00-00'),
('2017-07-01'),
('2017-08-01'),
('2017-09-02'),
('2017-09-23'),
('2018-01-17'),
('2018-02-09'),
('2018-03-05'),
('2018-03-10'),
('2018-03-16'),
('2018-03-30');

-- --------------------------------------------------------

--
-- Structure de la table `encaissements`
--

CREATE TABLE IF NOT EXISTS `encaissements` (
  `id_encaiss` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_encaiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `encaissements`
--

INSERT INTO `encaissements` (`id_encaiss`, `libelle`) VALUES
(1, 'Virement'),
(2, 'Chèque'),
(3, 'Espèces'),
(4, 'Carte Bleue');

-- --------------------------------------------------------

--
-- Structure de la table `natures`
--

CREATE TABLE IF NOT EXISTS `natures` (
  `id_nature` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nature`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `natures`
--

INSERT INTO `natures` (`id_nature`, `libelle`) VALUES
(2, 'Conseil'),
(3, 'Prestation de services'),
(4, 'Vente');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE IF NOT EXISTS `prestations` (
  `id_presta` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `id_type` smallint(5) unsigned DEFAULT NULL,
  `id_nature` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_presta`),
  KEY `id_type` (`id_type`),
  KEY `id_nature` (`id_nature`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `prestations`
--

INSERT INTO `prestations` (`id_presta`, `libelle`, `id_type`, `id_nature`) VALUES
(1, 'Graphisme', 1, 2),
(2, 'SLAM5', 1, 2),
(3, 'SLAM3', 1, 2),
(4, 'SLAM2', 1, 2),
(5, 'SI6', 1, 2),
(6, 'SI4', 1, 2),
(7, 'SI3', 1, 2),
(8, 'PPE', 1, 2),
(9, 'Algorithmique', 1, 2),
(10, 'Conception web', 1, 2),
(11, 'Site web', 2, 3),
(12, 'Maquette', 2, 3),
(13, 'Logo', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE IF NOT EXISTS `suivi` (
  `id_cla` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id_presta` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ref_date` date NOT NULL,
  `nbh` decimal(4,0) DEFAULT NULL,
  PRIMARY KEY (`id_cla`,`id_presta`,`ref_date`),
  KEY `id_presta` (`id_presta`),
  KEY `ref_date` (`ref_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `suivi`
--

INSERT INTO `suivi` (`id_cla`, `id_presta`, `ref_date`, `nbh`) VALUES
(32, 1, '0000-00-00', '10'),
(32, 1, '2017-08-01', '10'),
(32, 1, '2018-01-17', '20'),
(32, 1, '2018-03-05', '20'),
(32, 1, '2018-03-10', '20'),
(32, 2, '2017-07-01', '5'),
(32, 5, '2017-07-01', '10'),
(33, 6, '2017-08-01', '10'),
(33, 6, '2017-09-02', '10'),
(33, 6, '2017-09-23', '10'),
(33, 6, '2018-02-09', '30'),
(33, 6, '2018-03-16', '20'),
(33, 6, '2018-03-30', '10');

-- --------------------------------------------------------

--
-- Structure de la table `types_client`
--

CREATE TABLE IF NOT EXISTS `types_client` (
  `id_type` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `types_client`
--

INSERT INTO `types_client` (`id_type`, `libelle`) VALUES
(1, 'Autre'),
(2, 'Ecole');

-- --------------------------------------------------------

--
-- Structure de la table `types_prestation`
--

CREATE TABLE IF NOT EXISTS `types_prestation` (
  `id_type` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `types_prestation`
--

INSERT INTO `types_prestation` (`id_type`, `libelle`) VALUES
(1, 'Cours informatique'),
(2, 'Prestation'),
(3, 'Surveillances'),
(4, 'Oraux'),
(5, 'Oraux blanc');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_u` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `raison_social` varchar(75) DEFAULT NULL,
  `siren` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `etat` int(11) DEFAULT '1',
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `raison_social`, `siren`, `adresse`, `cp`, `ville`, `tel`, `email`, `mdp`, `etat`) VALUES
(1, 'DELPRAT Xavier', '788 699 300', '15, rue de paris', '75010', 'Paris', '06 37 90 15 14', 'admin@laposte.net', '9cf95dacd226dcf43da376cdb6cbba7035218921', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `clients` (`id_cli`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_encaiss`) REFERENCES `encaissements` (`id_encaiss`) ON DELETE SET NULL,
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `types_client` (`id_type`) ON DELETE SET NULL,
  ADD CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clients_prestations`
--
ALTER TABLE `clients_prestations`
  ADD CONSTRAINT `clients_prestations_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `clients` (`id_cli`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_prestations_ibfk_2` FOREIGN KEY (`id_presta`) REFERENCES `prestations` (`id_presta`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD CONSTRAINT `prestations_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types_prestation` (`id_type`) ON DELETE SET NULL,
  ADD CONSTRAINT `prestations_ibfk_2` FOREIGN KEY (`id_nature`) REFERENCES `natures` (`id_nature`) ON DELETE SET NULL;

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `suivi_ibfk_1` FOREIGN KEY (`id_cla`) REFERENCES `classes` (`id_cla`) ON DELETE CASCADE,
  ADD CONSTRAINT `suivi_ibfk_2` FOREIGN KEY (`id_presta`) REFERENCES `prestations` (`id_presta`) ON DELETE CASCADE,
  ADD CONSTRAINT `suivi_ibfk_3` FOREIGN KEY (`ref_date`) REFERENCES `date` (`ref_date`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
