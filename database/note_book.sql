-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 mai 2021 à 11:15
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `note_book`
--

-- --------------------------------------------------------

--
-- Structure de la table `list_mangas`
--

CREATE TABLE `list_mangas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(40) NOT NULL,
  `note` varchar(10) NOT NULL,
  `valuation` varchar(50) NOT NULL,
  `image_name` varchar(200) NOT NULL DEFAULT 'Default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `list_mangas`
--

INSERT INTO `list_mangas` (`id`, `name`, `insert_date`, `state`, `note`, `valuation`, `image_name`) VALUES
(1, 'l\'attaque des titants', '2021-05-03 12:38:48', 'encour', '97%', 'excelant', 'ANIME-PICTURES.NET_-_445415-1391x1800-shingeki+no+kyojin-production+i.g-annie+leonhardt-armin+arlert-female+titan-sakimichan.jpg'),
(2, 'les 7péchés capitaux', '2021-05-03 12:40:38', 'saison3', '90%', 'très bien f', '4_5942887127250371753.png'),
(17, 'my hero academia', '2021-05-03 21:48:00', 'encour', '30%', 'bien', '7b4bc09acc9d4910b9c42836de4fefd1.jpg'),
(18, 'my hero academia', '2021-05-03 22:04:50', 'encour', '80%', 'cool', '0f0fbd9c836e8cccc7550b711ea07f8b.jpg'),
(19, 'ré zero', '2021-05-03 22:06:53', 'saison 2', '95%', 'j\'adore', 'final.mp4_snapshot_00.07_2018.11.08_00.17.49-1.jpg'),
(23, 'dr stone', '2021-05-04 06:54:26', 'saison 1', '92%', 'bien', 'vlcsnap-2021-01-01-07h06m27s602.png'),
(25, 'drago ball', '2021-05-04 10:20:28', 'infini', '80%', 'nostalgie', '121.jpg'),
(28, 'one punch man', '2021-05-04 21:52:47', 'fini', '85%', 'rigolo', '8e42f4072f804732a790020664f712d1.jpg'),
(29, 'Tokyo Ghoul', '2021-05-05 08:51:44', 'saison 2', '95%', 'Trop genial', '596610.jpg'),
(31, 'saint seiya', '2021-05-07 00:27:56', 'fini', '66%', 'j\'ai aimer', '[MCAshe]-Titan2.jpg'),
(43, 'gargantua', '2021-05-07 18:47:50', 'interompu', '80%', 'trop kiffer mais la fin a été annulé', '0be5d3aad6fb199a1dca4ed05362922e.jpg'),
(44, 'nisekoi', '2021-05-07 18:49:27', 'la suite en scan', '99%', 'c\'est mon bigup ❤❤❤', '1.jpg'),
(45, 'naruto', '2021-05-07 18:59:49', 'fini', '59%', 'c\'est culte mais j\'ai pas trop kiffer', 'a85e4ca55ec403f565575546dca65869.jpg'),
(46, 'one piece', '2021-05-07 19:03:01', 'trois arc', '12%', 'c\'est null et surcôté', 'af925322f4c29a79dfe9b43f086c40f1.jpg'),
(47, 'demon slayer', '2021-05-07 19:38:10', 'saison 1', '97%', 'c\'est un veritable kiff', 'e0628ee277d2cde8563542e1167178c9.gif'),
(51, 'saint seiya the lost canvas', '2021-05-08 18:23:06', 'fini', '82%', 'c\'était top', 'saint_seiya_the_lost_canvas_screenshot_by_nmaiolos-d73w08n.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name_profil` varchar(200) NOT NULL DEFAULT 'default_profil.png',
  `email` varchar(200) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sexe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `name_profil`, `email`, `join_date`, `sexe`) VALUES
(19, 'mohamed', 'salim', 'azerty', 'ppadm.jpg', 'jimsky699@gmail.com', '2021-05-06 23:12:10', 'homme'),
(22, 'mabom', 'dimi', 'mouopelice', '0eb43ebc4e24c22e62e3c507477aeb7c176afea2_hq.jpg', 'dimitrymabom@gmail.com', '2021-05-07 12:00:16', 'homme'),
(25, 'gumball', 'waterson', 'azerty', 'kisspng-gumball-watterson-anais-watterson-darwin-watterson-gumball-5b1ff54df37113.7823947915288210699972.png', 'dragononez250@gmail.com', '2021-05-09 14:23:00', 'homme'),
(30, 'fuck', 'fuck', 'azerty', '[MCAshe]-Titan2.jpg', 'vegeta@gmail.com', '2021-05-10 11:10:21', 'homme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `list_mangas`
--
ALTER TABLE `list_mangas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `list_mangas`
--
ALTER TABLE `list_mangas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
