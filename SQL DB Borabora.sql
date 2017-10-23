-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Septembre 2017 à 01:23
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `borabora`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `est_libre_cabine`(`num_cabine` INT, `date_res` DATE, `debut_res` INT, `fin_res` INT) RETURNS tinyint(1)
    READS SQL DATA
begin
If exists(select * from reservation where numCabine = num_cabine AND debRes<=fin_res AND finRes>=debut_res AND dateRes = date_res) 
then
	return 0;
else
	return 1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `est_libre_cabine_modif`(`num_cabine` INT, `date_res` DATE, `debut_res` INT, `fin_res` INT, `num_res` INT) RETURNS tinyint(1)
    READS SQL DATA
begin
If exists(select * from reservation where numCabine = num_cabine AND debRes<=fin_res AND finRes>=debut_res AND dateRes = date_res AND numRes not IN (num_res)) 
then
	return 0;
else
	return 1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `est_libre_employe`(`num_Emp` INT, `date_res` DATE, `debut_res` INT, `fin_res` INT) RETURNS tinyint(1)
    READS SQL DATA
begin
If exists(select * from reservation where numEmp = num_Emp AND debRes<=fin_res AND finRes>=debut_res AND dateRes = date_res) 
then
	return 0;
else
	return 1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `es_libre_employe_modif`(`num_Emp` INT, `date_res` DATE, `debut_res` INT, `fin_res` INT, `num_res` INT) RETURNS tinyint(1)
    READS SQL DATA
begin
If exists(select * from reservation where numEmp = num_Emp AND debRes<=fin_res AND finRes>=debut_res AND dateRes = date_res AND numRes not in (num_res)) 
then
	return 0;
else
	return 1;
end if;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `brasserie`
--

CREATE TABLE IF NOT EXISTS `brasserie` (
  `num_plat` int(3) NOT NULL,
  `lib_plat` varchar(50) DEFAULT NULL,
  `prix_plat` float DEFAULT NULL,
  `cat` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`num_plat`),
  KEY `brasserie_ibfk_1` (`cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `brasserie`
--

INSERT INTO `brasserie` (`num_plat`, `lib_plat`, `prix_plat`, `cat`) VALUES
(1, 'Salade Tahitienne', 2050, 'ENTSAL'),
(2, 'Os à la Moelle au sel de Guérande', 1500, 'ENTSAL'),
(3, 'Salade Tiède au Jarret', 2050, 'ENTSAL'),
(4, 'Tartine au Chèvre Chaud sur Salade', 1750, 'ENTSAL'),
(5, 'Salade Jean Pierre', 2050, 'ENTSAL'),
(6, 'Salade Verte huile olive ou vinaigrette', 800, 'ENTSAL'),
(7, 'Salade Verta Roquefort et Noix', 950, 'ENTSAL'),
(8, 'Crevettes poelées et flambées', 2950, 'CREPAY'),
(9, 'Crevettes poelées au Curry et amandes', 2950, 'CREPAY'),
(10, 'Tartare de Thon à la moutarde et Garniture', 2450, 'PROMER'),
(11, 'Steack de Thon mi-cuit sauce vierge Fruits frais e', 2850, 'PROMER'),
(12, 'Noix d''Entrecôte 200g', 2850, 'VIANDE'),
(13, 'Noix d''Entrecôte 350g', 3750, 'VIANDE'),
(14, 'La Churascaia 500g', 5100, 'VIANDE'),
(15, 'Travers de Porc Sauce Barbecue', 3150, 'VIANDE'),
(16, 'Escalope de Veau Normande', 2650, 'VIANDE'),
(17, 'Os à la Moelle en accompagnement', 500, 'VIANDE'),
(18, 'Tartare de Boeuf aux Condiments', 2650, 'VIANDE'),
(19, 'Sauce au choix', 300, 'VIANDE'),
(20, 'Hamburger pur Boeuf Frites à Volonté', 2050, 'HAMBUR'),
(21, 'Tagliatelle Carbonara', 1700, 'PATES'),
(22, 'Tagliatelle au Saumon', 2800, 'PATES'),
(23, 'Tagliatelle Crevttes Décortiquées', 2800, 'PATES'),
(24, 'Flammekueche Formule à Volonté', 2050, 'FLAMME'),
(25, 'La Classique', 1200, 'FLAMME'),
(26, 'La Forestière', 1350, 'FLAMME'),
(27, 'La Gratinée', 1350, 'FLAMME'),
(28, 'La Spéciale', 1500, 'FLAMME'),
(29, 'La Chèvre Chaud', 1600, 'FLAMME'),
(30, 'La Choucroute', 1750, 'FLAMME'),
(31, 'La Napolitaine', 1450, 'FLAMME'),
(32, 'La Saumon', 1800, 'FLAMME'),
(33, 'La Végétarienne', 1500, 'FLAMME'),
(34, 'La Crevette', 1950, 'FLAMME'),
(35, 'Les Trois Fromages', 1700, 'FLAMME'),
(36, 'La Charcutière', 1800, 'FLAMME'),
(37, 'La Pomme', 950, 'FLAMME'),
(38, 'La Pomme Glacée', 1200, 'FLAMME'),
(39, 'La Belle Hélène', 1150, 'FLAMME'),
(40, 'La Ch''ti', 1200, 'FLAMME'),
(41, 'La Normande', 1200, 'FLAMME'),
(42, 'La Cococ', 1600, 'FLAMME'),
(43, 'La Spéciale Sucrée', 1100, 'FLAMME'),
(44, 'La Tout Chocolat', 1100, 'FLAMME'),
(45, 'La Martiniquaise', 1200, 'FLAMME');

-- --------------------------------------------------------

--
-- Structure de la table `cabines`
--

CREATE TABLE IF NOT EXISTS `cabines` (
  `numCabine` int(11) NOT NULL,
  `nomCabine` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`numCabine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cabines`
--

INSERT INTO `cabines` (`numCabine`, `nomCabine`) VALUES
(1, 'cabine1'),
(2, 'cabine2'),
(3, 'cabine3'),
(4, 'cabine4'),
(5, 'cabine5');

-- --------------------------------------------------------

--
-- Structure de la table `cat_brasserie`
--

CREATE TABLE IF NOT EXISTS `cat_brasserie` (
  `cat` varchar(6) NOT NULL,
  `lib_cat` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cat_brasserie`
--

INSERT INTO `cat_brasserie` (`cat`, `lib_cat`) VALUES
('CREPAY', 'Crevette Pays'),
('ENTSAL', 'Entrées, Salades'),
('FLAMME', 'Flammekueche '),
('HAMBUR', 'Hamburger'),
('PATES', 'Les Pâtes'),
('PROMER', 'Produits de la Mer'),
('VIANDE', 'Les Viandes');

-- --------------------------------------------------------

--
-- Structure de la table `cat_cons`
--

CREATE TABLE IF NOT EXISTS `cat_cons` (
  `cat` varchar(6) NOT NULL,
  `lib_cat` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cat_cons`
--

INSERT INTO `cat_cons` (`cat`, `lib_cat`) VALUES
('ALCOOL', 'Alcool'),
('APEBIE', 'Apéritif à la bière'),
('APERIT', 'Apéritif'),
('BIEAMB', 'Bière ambrée'),
('BIEBLA', 'Bière blanche'),
('BIEBLO', 'Bière blonde'),
('BIESCO', 'Bière scotch'),
('BIESPE', 'Bière spéciale'),
('COKBIE', 'Apéritif à la bière'),
('COKTAI', 'Coktail'),
('EAUMIN', 'Eaux minérales'),
('JUSFRA', 'Jus de fruits frais'),
('LACAVE', 'La cave'),
('NECTAR', 'Nectars'),
('SODAS', 'Sodas'),
('WHISKY', 'Whisky');

-- --------------------------------------------------------

--
-- Structure de la table `comprend_bar`
--

CREATE TABLE IF NOT EXISTS `comprend_bar` (
  `num_fact` int(11) NOT NULL,
  `num_cons` int(3) NOT NULL,
  `qte` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`num_fact`,`num_cons`),
  KEY `fk1_comprend_bar` (`num_cons`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comprend_brasserie`
--

CREATE TABLE IF NOT EXISTS `comprend_brasserie` (
  `num_fact` int(11) NOT NULL,
  `num_plat` int(3) NOT NULL,
  `qte` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`num_fact`,`num_plat`),
  KEY `comprend_brasseriefk_1` (`num_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
  `num_cons` int(3) NOT NULL,
  `lib_cons` varchar(50) DEFAULT NULL,
  `prix_cons` float DEFAULT NULL,
  `cat` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`num_cons`),
  KEY `consommation_ibfk_1` (`cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `consommation`
--

INSERT INTO `consommation` (`num_cons`, `lib_cons`, `prix_cons`, `cat`) VALUES
(1, 'Demi 25cl', 700, 'BIEBLA'),
(2, 'Taverne 33cl', 800, 'BIEBLA'),
(3, 'Brasseur 50cl', 1000, 'BIEBLA'),
(4, 'Formidable 100cl', 1900, 'BIEBLA'),
(5, 'Pichet 1,5l', 3200, 'BIEBLA'),
(6, 'Le mètre 25cl *10', 5000, 'BIEBLA'),
(7, 'Demi 25cl', 700, 'BIEBLO'),
(8, 'Taverne 33cl', 800, 'BIEBLO'),
(9, 'Brasseur 50cl', 1000, 'BIEBLO'),
(10, 'Formidable 100cl', 1900, 'BIEBLO'),
(11, 'Pichet 1,5l', 3200, 'BIEBLO'),
(12, 'Le mètre 25cl *10', 5000, 'BIEBLO'),
(13, 'Demi 25cl', 700, 'BIEBLO'),
(14, 'Taverne 33cl', 800, 'BIEBLO'),
(15, 'Brasseur 50cl', 1000, 'BIEBLO'),
(16, 'Formidable 100cl', 1900, 'BIEBLO'),
(17, 'Pichet 1,5l', 3200, 'BIEBLO'),
(18, 'Le mètre 25cl *10', 5000, 'BIEBLO'),
(19, 'Le Panaché 25cl', 650, 'APEBIE'),
(20, 'Le Panaché 33cl', 700, 'APEBIE'),
(21, 'Le Panaché 50cl', 900, 'APEBIE'),
(22, 'Le Panaché 1l', 1500, 'APEBIE'),
(23, 'Le Panaché Pitcher', 3200, 'APEBIE'),
(24, 'Le Tango 25 cl', 700, 'APEBIE'),
(25, 'Le Tango 33 cl', 800, 'APEBIE'),
(26, 'Le Tango 50 cl', 1100, 'APEBIE'),
(27, 'Le Tango 1l', 1100, 'APEBIE'),
(28, 'Le Tango Pitcher', 3200, 'APEBIE'),
(29, 'Le Monaco 25 cl', 700, 'APEBIE'),
(30, 'Le Monaco 33 cl', 800, 'APEBIE'),
(31, 'Le Monaco 50 cl', 1100, 'APEBIE'),
(32, 'Le Monaco 1l', 1100, 'APEBIE'),
(33, 'Le Monaco Pitcher', 3200, 'APEBIE'),
(34, 'Picon Bière 25 cl', 1100, 'APEBIE'),
(35, 'Picon Bière 33 cl', 1350, 'APEBIE'),
(36, 'Picon Bière 50 cl', 1900, 'APEBIE'),
(37, 'Picon Bière 1l', 2400, 'APEBIE'),
(38, 'Picon Bière Pitcher', 4200, 'APEBIE'),
(39, 'Le Nord Express 25 cl', 1100, 'APEBIE'),
(40, 'Le Nord Express 33 cl', 1350, 'APEBIE'),
(41, 'Le Nord Express 50 cl', 1900, 'APEBIE'),
(42, 'Le Nord Express 1l', 2400, 'APEBIE'),
(43, 'Le Nord Express Pitcher', 4200, 'APEBIE'),
(45, 'Le Mexicanos 25 cl', 1100, 'APEBIE'),
(46, 'Le Mexicanos 33 cl', 1350, 'APEBIE'),
(47, 'Le Mexicanos 50 cl', 1900, 'APEBIE'),
(48, 'Le Mexicanos 1l', 2400, 'APEBIE'),
(49, 'Le Mexicanos Pitcher', 4200, 'APEBIE'),
(50, 'Le Habana 25 cl', 1100, 'APEBIE'),
(51, 'Le Habana 33 cl', 1350, 'APEBIE'),
(52, 'Le Habana 50 cl', 1900, 'APEBIE'),
(53, 'Le Habana 1l', 2400, 'APEBIE'),
(54, 'Le Habana Pitcher', 4200, 'APEBIE'),
(55, 'L''Irlandais 25 cl', 1100, 'APEBIE'),
(56, 'L''Irlandais 33 cl', 1350, 'APEBIE'),
(57, 'L''Irlandais 50 cl', 1900, 'APEBIE'),
(58, 'L''Irlandais 1l', 2400, 'APEBIE'),
(59, 'L''Irlandais Pitcher', 4200, 'APEBIE'),
(60, 'Le Boucanier 25 cl', 1100, 'APEBIE'),
(61, 'Le Boucanier 33 cl', 1350, 'APEBIE'),
(62, 'Le Boucanier 50 cl', 1900, 'APEBIE'),
(63, 'Le Boucanier 1l', 2400, 'APEBIE'),
(64, 'Le Boucanier', 4200, 'APEBIE'),
(65, 'Campari 2 cl', 1000, 'APERIT'),
(66, 'Martini 2 cl', 1000, 'APERIT'),
(67, 'Ricard 2 cl', 1000, 'APERIT'),
(68, 'Coupe de champagne Taitin', 2100, 'APERIT'),
(69, 'Kir Royal Taitingeri 12 c', 2300, 'APERIT'),
(70, 'Whisky classique', 1050, 'WHISKY'),
(71, 'Bourbon:Jim Beam', 1300, 'WHISKY'),
(72, 'Vieux Scotch Chivas Regal', 1500, 'WHISKY'),
(73, 'Vieux Scotch Johnnie Black Label', 1500, 'WHISKY'),
(74, 'Single Pure Malt Glenfiddich', 1500, 'WHISKY'),
(75, 'Single Pure Malt Glenlivet', 1500, 'WHISKY'),
(76, 'Gin 4cl', 1000, 'ALCOOL'),
(77, 'Vodka 4cl', 1000, 'ALCOOL'),
(78, 'Tequila 4 cl', 1000, 'ALCOOL'),
(79, 'Rhum', 1000, 'ALCOOL'),
(80, 'Vodka Zubrowska 4cl', 1300, 'ALCOOL'),
(81, 'Vodka Absolut 4cl', 1300, 'ALCOOL'),
(82, 'Rhum Damoiseau 4cl', 1300, 'ALCOOL'),
(83, 'Rhum Bacardi 4cl', 1300, 'ALCOOL'),
(84, 'Gin Bombay 4cl', 1300, 'ALCOOL'),
(85, 'Gin Gordon''s 4cl', 1300, 'ALCOOL'),
(86, 'Vodka Red Bull 4cl', 1500, 'ALCOOL'),
(87, 'Pinacolada', 1500, 'COKTAI'),
(88, 'Planteur', 1500, 'COKTAI'),
(89, 'Punch Coco', 1500, 'COKTAI'),
(90, 'Sancerre Les Montachins Blanc 37,5cl', 3800, 'LACAVE'),
(91, 'Sancerre Les Montachins Blanc 75cl', 6200, 'LACAVE'),
(92, 'Riesling Hugel 37,5cl', 3250, 'LACAVE'),
(93, 'Riesling Hugel 75cl', 5500, 'LACAVE'),
(94, 'Muscadet sur Lie 37,5cl', 2200, 'LACAVE'),
(95, 'Muscadet sur Lie 75cl', 3900, 'LACAVE'),
(96, 'Cristal de Provence Rosé 37,5cl', 2300, 'LACAVE'),
(97, 'Cristal de Provence Rosé 75cl', 4200, 'LACAVE'),
(98, 'Beaujolais Village Georges Duboeuf 37,5cl', 2200, 'LACAVE'),
(99, 'Beaujolais Village Georges Duboeuf 75cl', 3800, 'LACAVE'),
(100, 'Bordeaux Manoir du Passager 75 l', 3900, 'LACAVE'),
(101, 'Clos La Maurasse Graves rouge ou blanc 75cl', 5500, 'LACAVE'),
(102, 'Château Castera Cru Bourgeois Medoc 75 cl', 5900, 'LACAVE'),
(103, 'Riesling Hugel 75cl', 5500, 'LACAVE'),
(104, 'Champagne Taittinger 75 cl', 12500, 'LACAVE'),
(105, 'Bordeaux Manoir du Passager Le Verre Rouge ou Blan', 950, 'LACAVE'),
(106, 'Medoc Château Castera le verre', 1300, 'LACAVE'),
(107, 'Les Nectars Poire 25cl', 700, 'NECTAR'),
(108, 'Les Nectars Abricot 25cl', 700, 'NECTAR'),
(109, 'Les Nectars Tomate 25cl', 700, 'NECTAR'),
(110, 'Coca Cola 33cl', 630, 'SODAS'),
(111, 'Coca Zéro 33cl', 630, 'SODAS'),
(112, 'Orangina 33cl', 630, 'SODAS'),
(113, 'Ice Tea 33cl', 630, 'SODAS'),
(114, '7 Up 33cl', 630, 'SODAS'),
(115, 'Schweppes Tonic 33cl', 630, 'SODAS'),
(116, 'Maxi Soda 50cl', 850, 'SODAS'),
(117, 'Red Bull', 900, 'SODAS'),
(118, 'Mont Dore 50cl', 500, 'EAUMIN'),
(119, 'Mont Dore 1,50l', 650, 'EAUMIN'),
(120, 'San Pellegrino 50cl', 650, 'EAUMIN'),
(121, 'San Pellegrino 75cl', 850, 'EAUMIN'),
(122, 'Perrier boîte 33cl', 630, 'EAUMIN');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `numEmp` int(11) NOT NULL,
  `nomEmp` varchar(25) DEFAULT NULL,
  `prenomEmp` varchar(25) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `mdp` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`numEmp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`numEmp`, `nomEmp`, `prenomEmp`, `login`, `mdp`) VALUES
(1, 'Noui', 'Eva', 'gestionnaire', 'gest'),
(2, 'blanchett', 'kate', 'gestionnaire', 'gest'),
(3, 'terieur', 'alain', 'gestionnaire', 'gest'),
(4, 'gator', 'ali', 'gestionnaire', 'gest');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `num_fact` int(11) NOT NULL AUTO_INCREMENT,
  `date_fact` date DEFAULT NULL,
  PRIMARY KEY (`num_fact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `numRes` int(11) NOT NULL,
  `debRes` int(11) DEFAULT NULL,
  `finRes` int(11) DEFAULT NULL,
  `dateRes` date DEFAULT NULL,
  `numSoin` int(11) DEFAULT NULL,
  `numCabine` int(11) DEFAULT NULL,
  `numEmp` int(11) DEFAULT NULL,
  PRIMARY KEY (`numRes`),
  KEY `FK_Reservation_numSoin` (`numSoin`),
  KEY `FK_Reservation_numCabine` (`numCabine`),
  KEY `FK_Reservation_numEmp` (`numEmp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numRes`, `debRes`, `finRes`, `dateRes`, `numSoin`, `numCabine`, `numEmp`) VALUES
(1, 960, 1055, '2017-09-28', 30, 4, 4),
(2, 870, 945, '2017-09-27', 1, 4, 3),
(3, 620, 670, '2017-09-26', 0, 1, 1),
(4, 480, 530, '2017-10-10', 0, 1, 1);

--
-- Déclencheurs `reservation`
--
DROP TRIGGER IF EXISTS `verif_res`;
DELIMITER //
CREATE TRIGGER `verif_res` BEFORE INSERT ON `reservation`
 FOR EACH ROW begin
set new.finRes =  (new.debres + (Select tempsSoin from soins where numsoin = new.numsoin) + 20);
If ((est_libre_employe(new.numEmp, new.dateRes, new.debRes, new.finRes)) = 			0)
	then
SIGNAL SQLSTATE '45000' set message_text='cet employe a deja une reservation sur ce creneau';
else If ((est_libre_cabine(new.numCabine, new.dateRes, new.debRes, 				new.finRes)) = 0) 
	then
SIGNAL SQLSTATE '45001' set message_text='cette cabine a deja une reservation sur ce creneau';
     end If;
end If;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `verif_update`;
DELIMITER //
CREATE TRIGGER `verif_update` BEFORE UPDATE ON `reservation`
 FOR EACH ROW begin
set new.finRes =  (new.debres + (Select tempsSoin from soins where numsoin = new.numsoin) + 20);
If ((est_libre_employe_modif(new.numEmp, new.dateRes, new.debRes, new.finRes, old.numRes)) = 			0)
	then
SIGNAL SQLSTATE '45000' set message_text='cet employe a deja une reservation sur ce creneau';
else If ((est_libre_cabine_modif(new.numCabine, new.dateRes, new.debRes, 				new.finRes, old.numRes)) = 0) 
	then
SIGNAL SQLSTATE '45001' set message_text='cette cabine a deja une reservation sur ce creneau';
     end If;
end If;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE IF NOT EXISTS `soins` (
  `numSoin` int(11) NOT NULL,
  `libelleSoin` varchar(25) DEFAULT NULL,
  `tempsSoin` int(11) DEFAULT NULL,
  `prixSoin` int(11) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`numSoin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soins`
--

INSERT INTO `soins` (`numSoin`, `libelleSoin`, `tempsSoin`, `prixSoin`, `description`) VALUES
(0, 'Soin contour des yeux écl', 30, 6500, 'Soin decongestionnant et '),
(1, 'Soin teen', 55, 6500, 'Gommage sous vapeur et ma'),
(2, 'Soin éclat immédiat aux f', 45, 9500, 'Soin éclat et dynamisant'),
(3, 'Soin prodigieux à l''immor', 60, 12500, 'Soin défatiguant et anti-'),
(4, 'Soin express aux extraits', 45, 9500, 'Soin anti-terne'),
(5, 'Soin aroma-lacté crème fr', 75, 13000, 'Soin hydratant et stimula'),
(6, 'Soin aroma-perfection aux', 75, 13000, 'Soin purifiant et détoxif'),
(7, 'Soin ultra-reconfortant a', 75, 13000, 'Soin apaisant et relipida'),
(8, 'Soin beau joueur', 75, 13000, 'Soin energisant, hydratan'),
(9, 'Soin bio-beauté', 75, 13000, 'Soin apaisant, clarifiant'),
(10, 'Soin nuxellence', 90, 16000, 'Soin lumière et jeunesse'),
(11, 'Soin Nirvanesque', 90, 16000, 'Soin redensifiant et comb'),
(12, 'Soin Merveillance', 90, 16000, 'Soin lissant et combleur'),
(13, 'Soin Nuxuriance', 90, 16000, 'Soin redensifiant et comb'),
(14, 'Enveloppement', 30, 6500, 'Soin nourrissant et hydra'),
(15, 'Soin révélateur déclat im', 45, 9000, 'Gommage du corps sous vap'),
(16, 'Soin body relaxant', 60, 13000, 'Gommage du corps sous vap'),
(17, 'Soin du dos', 75, 14000, 'Gommage du dos sous vapeu'),
(18, 'Soin prodigieux', 75, 14000, 'Gommage du corps sous vap'),
(19, 'Soin rêve de miel', 75, 14000, 'Gommage du corps sous vap'),
(20, 'Soin pureté du dos', 75, 14000, 'Gommage du dos sous vapeu'),
(21, 'Soin rêverie orientale', 120, 18000, 'Soin détoxifiant, relaxan'),
(22, 'Soin presso-minceur', 30, 6000, 'Drainage des jambes accom'),
(23, 'Soin body minceur', 75, 14000, 'Soin composé dun envelopp'),
(24, 'Soin aux fruits', 75, 14000, 'Gommage du corps et envel'),
(25, 'Crânien charismatic', 30, 6500, 'Ce modelage ciblé libère '),
(26, 'Détente', 45, 9000, 'Par son rythme lent et se'),
(27, 'Relaxation plantaire', 45, 9000, 'Modelage relaxant inspiré'),
(28, 'Pierres chaudes', 45, 9000, 'Modelage dorigine Amérind'),
(29, 'Modelage femme enceinte', 75, 13500, 'Pour aider la futur maman'),
(30, 'Energie', 75, 13500, 'Modelage dynamique et pro'),
(31, 'Ayur védique', 75, 13500, 'Modelage musculaire à lai'),
(32, 'Californien', 75, 13500, 'Avec des mouvements fluid'),
(33, 'Sérénité', 75, 13500, 'Grâce à la combinaison de');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `brasserie`
--
ALTER TABLE `brasserie`
  ADD CONSTRAINT `brasserie_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `cat_brasserie` (`cat`);

--
-- Contraintes pour la table `comprend_bar`
--
ALTER TABLE `comprend_bar`
  ADD CONSTRAINT `comprend_baribfk_1` FOREIGN KEY (`num_cons`) REFERENCES `consommation` (`num_cons`),
  ADD CONSTRAINT `comprend_baribfk_2` FOREIGN KEY (`num_fact`) REFERENCES `facture` (`num_fact`);

--
-- Contraintes pour la table `comprend_brasserie`
--
ALTER TABLE `comprend_brasserie`
  ADD CONSTRAINT `comprend_brasseriefk_1` FOREIGN KEY (`num_plat`) REFERENCES `brasserie` (`num_plat`),
  ADD CONSTRAINT `comprend_brasseriefk_2` FOREIGN KEY (`num_fact`) REFERENCES `facture` (`num_fact`);

--
-- Contraintes pour la table `consommation`
--
ALTER TABLE `consommation`
  ADD CONSTRAINT `consommation_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `cat_cons` (`cat`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Reservation_numEmp` FOREIGN KEY (`numEmp`) REFERENCES `employes` (`numEmp`),
  ADD CONSTRAINT `FK_Reservation_numCabine` FOREIGN KEY (`numCabine`) REFERENCES `cabines` (`numCabine`),
  ADD CONSTRAINT `FK_Reservation_numSoin` FOREIGN KEY (`numSoin`) REFERENCES `soins` (`numSoin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
