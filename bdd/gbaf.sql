-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 avr. 2021 à 16:21
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gbaf`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id_user`, `nom`, `prenom`, `username`, `password`, `question`, `reponse`) VALUES
(153, 'Rigal ', 'Thomas', 'kihoru', '$2y$10$hLdKiZWboRLyMVV0UccY3ukt8BovptOtIC7BucAUx/CddYY4UvQ1e', 'sur quel temporis je suis ?', '6'),
(148, 'aze', 'azer', 'aze', '$2y$10$ZUbmwSnoK2OAqxq82NsKOetYmrrMmfvwFVxqgT9Tom5g15PQQ8LMC', 'Quel est votre film favori ?', 'aze'),
(149, 'albert', 'alberto', 'jean_michel', '$2y$10$8CGmjcI2GWewJM59sNfOnOT65R5EhkH8E1KRTqZ5b5l/4qhAJytpy', 'quel est le nom de ma grand mere ? ', 'gastonne'),
(150, 'Laderriere', 'jean', 'lucaschocolat', '$2y$10$GZotgljH7yik/hYDQKz9JuRCcDUE7BZ/UmeangCb0WU.G0RbM.sIi', 'quelle est la réponse secrète ? ', 'berlingo'),
(151, 'a', 'a', 'a', '$2y$10$A5TUK91lJITFX4xfK3JmHuM12dVXofU7ipDfTbAyEhXc1Wn8ts12.', 'a', 'a'),
(152, 'za', 'za', 'za', '$2y$10$.a3y19AfWFobjiDRbbbdpO76nz.6axjqe/RyRJmtopuyIc.49pAsy', 'za', 'za');

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `acteur` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id_acteur`, `logo`, `acteur`, `description`) VALUES
(1, 'media/formation_co.png', 'Formation & Co', 'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\nNotre proposition : \r\nun financement jusqu’à 30 000€ ;\r\nun suivi personnalisé et gratuit ;\r\nune lutte acharnée contre les freins sociétaux et les stéréotypes.\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n'),
(2, 'media/protectpeople', 'ProtectPeople', 'Protectpeople finance la solidarité nationale.\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :\r\nsociale : nous garantissons la fiabilité des données sociales ;\r\néconomique : nous apportons une contribution aux activités économiques.\r\n'),
(3, 'media/dsa_france', 'DSA France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.\r\nNotre philosophie : s’adapter à chaque entreprise.\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises\r\n'),
(4, 'media/cde', 'CDE', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. \r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_acteur` int(11) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post` longtext,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `id_acteur`, `date_add`, `post`) VALUES
(98, 152, 1, '2021-04-22 01:32:00', 'jhfg'),
(97, 153, 2, '2021-04-21 20:28:40', 'gvy'),
(96, 153, 2, '2021-04-21 20:28:25', 'post'),
(95, 152, 2, '2021-04-20 18:32:20', 'test protect'),
(94, 152, 1, '2021-04-20 18:22:43', 'test 2'),
(93, 152, 1, '2021-04-20 18:22:34', 'test 1');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) DEFAULT NULL,
  `vote` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_user`, `id_acteur`, `vote`) VALUES
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 1),
(152, NULL, 0),
(152, NULL, 0),
(152, NULL, 0),
(152, NULL, 0),
(152, NULL, 1),
(152, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
