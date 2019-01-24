-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 24 jan. 2019 à 09:36
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maplan`
--

-- --------------------------------------------------------

--
-- Structure de la table `local`
--

CREATE TABLE `local` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `posx` float NOT NULL,
  `posy` float NOT NULL,
  `nomfichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `local`
--

INSERT INTO `local` (`id`, `nom`, `posx`, `posy`, `nomfichier`) VALUES
(7, 'LC0301', 246, 114, 'image_test_complete.png'),
(10, 'LC0304', 515, 301, 'image_test_complete.png'),
(13, 'LD0303', 1054, 300, 'image_test_complete.png'),
(14, 'LD0302', 795, 305, 'image_test_complete.png'),
(15, 'LD0305', 811, 353, 'image_test_complete.png'),
(16, 'ld0306', 996, 359, 'image_test_complete.png'),
(17, 'LD0307', 1075, 435, 'image_test_complete.png'),
(18, 'LD0308', 1173, 432, 'image_test_complete.png'),
(19, 'LD0313', 1121, 514, 'image_test_complete.png'),
(20, 'LD0312', 1036, 640, 'image_test_complete.png'),
(21, 'LD0311', 821, 567, 'image_test_complete.png'),
(22, 'LD0315', 1202, 746, 'image_test_complete.png'),
(23, 'LD0314', 1206, 629, 'image_test_complete.png'),
(24, 'LD0317', 1209, 880, 'image_test_complete.png'),
(25, 'LD0316', 1165, 820, 'image_test_complete.png'),
(26, 'LD0318', 1054, 882, 'image_test_complete.png'),
(27, 'LC0312', 475, 555, 'image_test_complete.png'),
(28, 'LC0311', 288, 625, 'image_test_complete.png'),
(29, 'LC0310', 182, 518, 'image_test_complete.png'),
(30, 'LC0314', 104, 630, 'image_test_complete.png'),
(31, 'LC0315', 102, 749, 'image_test_complete.png'),
(32, 'LC0317', 126, 860, 'image_test_complete.png'),
(33, 'LC0316', 152, 822, 'image_test_complete.png'),
(34, 'LC0303', 297, 302, 'image_test_complete.png'),
(35, 'LC0308', 329, 351, 'image_test_complete.png'),
(36, 'LC0306', 153, 437, 'image_test_complete.png'),
(37, 'LC0307', 244, 437, 'image_test_complete.png'),
(38, 'LC0309', 503, 352, 'image_test_complete.png'),
(39, 'RE0903', 474, 506, 'reacteur.png'),
(43, 'RD0905', 719, 852, 'reacteur.png'),
(66, 'RB0903', 477, 281, 'reacteur.png'),
(68, 'RE0904', 454, 692, 'reacteur.png'),
(69, 'RE0901', 560, 699, 'reacteur.png'),
(84, 'RC0904', 962, 287, 'reacteur.png'),
(86, 'RC0905', 969, 189, 'reacteur.png'),
(87, 'RE0902', 602, 554, 'reacteur.png'),
(88, 'RB0901', 587, 445, 'reacteur.png'),
(89, 'RC0902', 826, 442, 'reacteur.png'),
(90, 'RD0901', 819, 555, 'reacteur.png'),
(91, 'RD0902', 862, 695, 'reacteur.png'),
(93, 'RE0905', 409, 782, 'reacteur.png'),
(98, 'RC0901', 868, 312, 'reacteur.png'),
(99, 'RE0906', 391, 500, 'reacteur.png'),
(100, 'RA0903', 710, 777, 'reacteur.png'),
(102, 'RB0906', 540, 225, 'reacteur.png'),
(105, 'RD0903', 980, 688, 'reacteur.png'),
(106, 'RC0903', 1023, 550, 'reacteur.png'),
(112, 'LC0301', 1027, 104, 'image_test_complete.png'),
(114, 'LC0305', 16, 526, 'image_test_complete.png'),
(115, 'LC0302', 73, 224, 'image_test_complete.png'),
(116, 'RD0904', 1020, 772, 'reacteur.png'),
(117, 'RA0901', 708, 493, 'reacteur.png'),
(118, 'RA0902', 714, 369, 'reacteur.png'),
(119, 'RB0905', 707, 293, 'reacteur.png'),
(121, 'RB0902', 561, 309, 'reacteur.png'),
(122, 'RB0904', 467, 177, 'reacteur.png');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `id_groupe`) VALUES
(1, 'Thomas', '$2y$10$Ltq0z1lTcFwBT9kZ9uHdXeSAUTZCNZ82xbOe3Ub9iwM49NZMZwsoq', 2),
(2, 'admin', '$2y$10$p5k5sryCey5Yi4748fmbvuX8RB3mvp6Nfugx5qClDAYl6n1fNHFli', 2),
(6, 'Utilisateur', '$2y$10$jaAQlwPBhxQUTwHtmuwo5OYdE0pKW.j/kdVWkZ9ZTQGU0lUo8kDdG', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `local`
--
ALTER TABLE `local`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
