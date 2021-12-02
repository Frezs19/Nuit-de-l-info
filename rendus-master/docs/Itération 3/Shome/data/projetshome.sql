-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 12 déc. 2020 à 12:49
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetshome`
--

-- --------------------------------------------------------

--
-- Structure de la table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_benevole` int(11) NOT NULL,
  `dateCreation` timestamp NOT NULL,
  `dateModification` timestamp NOT NULL,
  `etat` varchar(20) NOT NULL,
  `favoris` tinyint(1) NOT NULL,
  `prixTotal` float NOT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lists`
--

INSERT INTO `lists` (`id_list`, `id_user`, `id_benevole`, `dateCreation`, `dateModification`, `etat`, `favoris`, `prixTotal`) VALUES
(67, 26, 29, '2020-11-23 15:47:06', '2020-11-23 15:47:06', 'Terminee', 0, 0),
(66, 27, 29, '2020-11-22 14:47:32', '2020-11-22 14:47:32', 'En Cours', 0, 0),
(65, 27, 29, '2020-11-22 14:36:02', '2020-11-22 14:36:02', 'En Cours', 0, 0),
(64, 28, 0, '2020-11-22 14:35:52', '2020-11-22 14:35:52', 'Postee', 0, 0),
(63, 28, 29, '2020-11-22 12:53:41', '2020-11-22 12:53:41', 'Terminee', 0, 20),
(68, 26, 29, '2020-11-25 11:24:26', '2020-11-25 11:24:26', 'En Cours', 0, 0),
(70, 28, 0, '2020-11-25 16:16:10', '2020-11-25 16:16:10', 'Postee', 0, 0),
(69, 28, 0, '2020-11-25 16:03:29', '2020-11-25 16:03:29', 'Postee', 0, 0),
(71, 28, 0, '2020-11-25 16:35:34', '2020-11-25 16:35:34', 'Postee', 0, 0),
(72, 28, 0, '2020-12-04 18:25:13', '2020-12-04 18:25:13', 'Postee', 0, 0),
(73, 28, 0, '2020-12-04 18:26:06', '2020-12-04 18:26:06', 'Postee', 0, 0),
(74, 28, 0, '2020-12-04 18:30:58', '2020-12-04 18:30:58', 'Postee', 0, 0),
(75, 28, 0, '2020-12-05 11:10:43', '2020-12-05 11:10:43', 'Postee', 1, 0),
(76, 28, 0, '2020-12-05 11:45:21', '2020-12-05 11:45:21', 'Postee', 0, 0),
(78, 28, 29, '2020-12-06 12:20:39', '2020-12-06 12:20:39', 'Terminee', 0, 5),
(79, 28, 29, '2020-12-06 12:21:16', '2020-12-06 12:21:16', 'Terminee', 1, 27),
(82, 28, 29, '2020-12-12 09:49:12', '2020-12-12 09:49:12', 'Terminee', 0, 9);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `nom` varchar(20) NOT NULL,
  `prixMax` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `quantite` varchar(20) NOT NULL,
  `nomSubstitut` varchar(20) NOT NULL,
  `prixMaxSubstitut` varchar(20) NOT NULL,
  `marqueSubstitut` varchar(20) NOT NULL,
  `quantiteSubstitut` varchar(20) NOT NULL,
  `idListe` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`nom`, `prixMax`, `marque`, `quantite`, `nomSubstitut`, `prixMaxSubstitut`, `marqueSubstitut`, `quantiteSubstitut`, `idListe`, `idProduit`) VALUES
('pneu', '500', 'pirelli', '2', '', '', '', '', 67, 19),
('banane', '5', 'carrefour', '4', 'orange', '5', 'carrefour', '5', 67, 18),
('Pneu', '100', 'Michellin', '4', 'Pneu', '500', 'Pirelli', '4', 66, 17),
('pates', '', '', '', 'riz', '', '', '', 65, 16),
('pates', '', '', '', 'riz', '', '', '', 64, 15),
('Chocapic', '10', 'Kellogs', '1 paquet', '', '', '', '', 63, 14),
('Orange', '3', 'eco+', '300g', 'Mandarine', '5', 'carefour', '3', 63, 13),
('Banane', '3', 'Bio', '200g', 'concombre', '5', 'Bio', '300g', 63, 12),
('tomate', '4', 'any', '200g', '', '', '', '', 68, 20),
('patate douce', '5', '', '', '', '', '', '', 69, 21),
('Carottes', '5', '', '', '', '', '', '', 70, 22),
('Montdor', '', '', '1', 'Raclette', '', '', '1', 71, 23),
('chaussures', '100', 'adidas', '1', '', '', '', '', 72, 24),
('beurre', '5', 'amora', '200g', 'beurre', '5', 'any', '200g', 73, 25),
('gre', '10', 're', 'rez', '', '', '', '', 74, 26),
('Carottes', '1', 'fez', '5', 'ze', '5', 'e', 'gfd', 75, 27),
('rez', '5', 're', 'tyr', '', '', '', '', 76, 28),
('raz', '5', 'rza', 'rzer', '', '', '', '', 78, 30),
('rez', '4', 'rze', '', '', '', '', '', 79, 31),
('rez', '5', '', '', '', '', '', '', 79, 32),
('rze', '4', '', '', '', '6', '', '', 79, 33),
('rez', '8', '', '', '', '', '', '', 79, 34),
('rze', '4', 'rez', 'uyt', 'eza', '5', 'tr', 'oui', 82, 38);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `codePostal` int(10) NOT NULL,
  `tel` int(11) NOT NULL,
  `mdp` text NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `tel` (`tel`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `mail`, `nom`, `prenom`, `adresse`, `codePostal`, `tel`, `mdp`, `type`) VALUES
(30, 'gre@gmail.com', 'garfield', 'lasagne', '45 place du chocolat', 38000, 68687, '$2y$10$cCQ/9/M9s72Q9AE5Cm81Q.OPu7LpkFqpwKzsh6MeBX4KhmxAktN6i', 'benevole'),
(22, 'henry.papier@gmail.com', 'Papier', 'Henry', '11 rue du silex', 38000, 478468956, '$2y$10$vCjXPTFRBwLs/XQhiJFBeep9hKAs5zk8OvkBiuOG1vnfLOK3sna4K', 'benevole'),
(25, 'pierre.cailloux@gmail.com', 'Cailloux', 'Pierre', '25 avenue du marteau', 38000, 54054040, '$2y$10$qqbpv.KRt2KsRTltW7SuveMzEjxZ1Bi.sjCXukMJZiJSjS0iQiA8K', 'benevole'),
(26, 'henry.calvier@gmail.com', 'Calvier', 'Henry', '11 rue du jambon', 38000, 4054045, '$2y$10$rmyx.fIu8Jja3cvXiQ.MfOZgAL9auAevMr3Q8F33ZeB1f83gcxT9K', 'client'),
(27, 'francois.dubois@gmail.com', 'Dubois', 'Francois', '47 place du corbeau', 38000, 545643543, '$2y$10$hyqCf13kuZ7FS1F.ebzM.uwbR7KYiEp5dgaGijUPbCnc52Vrx/V3a', 'client'),
(28, 'client.test@gmail.com', 'Test', 'Client', '78 avenue du paon', 38000, 485987845, '$2y$10$L36lQjAX87pv095yNpMs8u573DPM61TDOfdJMJ1/Onu7bCtT1Qnl.', 'client'),
(29, 'benevole.test@gmail.com', 'Test', 'Benevole', '45 place du chocolat', 38000, 4564568, '$2y$10$IZI0Njuhfky.8b2Co4Dqhu/10fFbNlyLyi5/QEXkajLLi4IFUj/bC', 'benevole');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
