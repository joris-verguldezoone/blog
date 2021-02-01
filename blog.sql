-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 fév. 2021 à 15:52
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `article` text COLLATE latin1_general_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(17, 'CS', 'Counter-Strike (CS) est une série de jeux vidéo de tir à la première personne dans lesquels deux équipes s\'affrontent pour perpétrer ou empêcher un acte terroriste (attentat à la bombe, prise d\'otage, etc.).\r\n\r\nLa série est nommée d\'après le premier jeu de la série, Counter-Strike (2000), qui est initialement publié comme mod pour le jeu vidéo Half-Life (1998)', 7, 1, '2021-02-01 12:17:00'),
(16, 'Planetary Annihilation', 'Planetary Annihilation est un jeu vidéo de stratégie en temps réel développé et édité par Uber Entertainment, sorti en 2014 sur Windows, Mac et Linux.', 7, 3, '2021-02-01 12:16:00'),
(15, 'KENSHI', 'Kenshi est un jeu vidéo de rôle développé et édité par Lo-Fi Games pour Windows. Le jeu se concentre sur la fourniture de fonctionnalités de jeu sandbox qui donnent au joueur la liberté de faire ce qu\'il veut dans son monde au lieu de se concentrer sur une histoire linéaire.', 6, 3, '2021-02-01 12:14:00'),
(14, 'Resistance', 'Resistance 2 est la suite du jeu de tir à la première personne Resistance: Fall of Man. Le jeu est développé par Insomniac Games et édité par Sony Computer Entertainment. Il est disponible depuis le 4 novembre 2008 aux États-Unis et le 26 novembre en Europe sur PlayStation 3.', 5, 1, '2021-02-01 12:13:00'),
(13, 'Age of empire', 'Age of Empires est une série de jeux de stratégie en temps réel développés par Ensemble Studios et publiés par Microsoft Studios. Le premier titre de la série — Age of Empires — est un jeu de stratégie en temps réel publié en 1997.', 5, 3, '2021-02-01 12:12:00'),
(18, 'DOTA 2', 'Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation avec l\'aide de certains des créateurs du jeu d\'origine : Defense of the Ancients, un mod de carte personnalisée pour le jeu de stratégie en temps réel Warcraft III: Reign of Chaos et son extension Warcraft III: The Frozen Throne.', 6, 2, '2021-02-01 12:18:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'fps'),
(2, 'moba'),
(3, 'Jeux de gestion');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) COLLATE latin1_general_ci NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'nique tes morts', 2, 2, '2021-01-30 16:06:41'),
(2, 'Franchement le sang tyabuse', 13, 5, '2021-02-01 13:44:00'),
(3, 'Y\'a une couille dans le potagé c\'est moi qui te ldit', 13, 5, '2021-02-01 14:35:00');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(7, 'Kiri-Kiri', '$2y$10$J8bfS0NaSSW8Lu7C9z.KcOAYIY8pJ1yrnLC3HCYixNtP0tr2mxHgO', 'Kiri-Kiri', 1),
(6, 'Golum', '$2y$10$8RPQiaArI1vZmC/JkHqDfO8EEM/Uggdz5zu9pHyb/PyhJdrsIZfZq', 'Golum@lanneau.fr', 1),
(5, 'HARDJOJO', '$2y$10$cVL8dIbmihx9P/fO8dGvme.AlMOh8Hx6h8Gj595zNcK3/.QKYJR3S', 'HARDJOJO@ok.fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
