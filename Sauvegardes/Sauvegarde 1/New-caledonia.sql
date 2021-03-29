-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 14 mars 2021 à 12:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `New-caledonia`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `title`, `content`, `picture`) VALUES
(13, 'test test', '<p>test</p>', 'pictures/activities/7canoe-2460657_1280.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `rooms` text NOT NULL,
  `prices` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `swimming_pool` tinyint(1) NOT NULL DEFAULT '0',
  `beach_access` tinyint(1) NOT NULL DEFAULT '0',
  `car_park` tinyint(1) NOT NULL DEFAULT '0',
  `free_wifi` tinyint(1) NOT NULL DEFAULT '0',
  `restaurant` tinyint(1) NOT NULL DEFAULT '0',
  `family_rooms` tinyint(1) NOT NULL DEFAULT '0',
  `television` tinyint(1) NOT NULL DEFAULT '0',
  `airport_suttle` tinyint(1) NOT NULL DEFAULT '0',
  `air_conditioner` tinyint(1) NOT NULL DEFAULT '0',
  `non_smoking_hotel` tinyint(1) NOT NULL DEFAULT '0',
  `animals` tinyint(1) NOT NULL DEFAULT '0',
  `strongbox` tinyint(1) NOT NULL DEFAULT '0',
  `mini_bar` tinyint(1) NOT NULL DEFAULT '0',
  `luggage` tinyint(1) NOT NULL DEFAULT '0',
  `elevator` tinyint(1) NOT NULL DEFAULT '0',
  `sauna` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `content`, `location`, `rooms`, `prices`, `picture`, `swimming_pool`, `beach_access`, `car_park`, `free_wifi`, `restaurant`, `family_rooms`, `television`, `airport_suttle`, `air_conditioner`, `non_smoking_hotel`, `animals`, `strongbox`, `mini_bar`, `luggage`, `elevator`, `sauna`) VALUES
(3, 'Alice\'s Beach', '<p>Venez profitez entre amis ou en famille des piscines de l\'h&ocirc;tel qui laisse place aux nageurs comme aux profiteurs.</p>', '<p>Pa&iuml;ta - COTE-OUEST</p>', '<ul>\r\n<ul>\r\n<li>\r\n<p><strong>Chambre simple</strong> : 25m2, lit simple, vue sur la piscine de l&rsquo;hotel, salle de bain classique (douche, WC).</p>\r\n</li>\r\n<li>\r\n<p><strong>Chambre double</strong> : 35m2, lit double, vue sur piscine ou sur oc&eacute;an, baignoire, WC.</p>\r\n</li>\r\n<li>\r\n<p><strong>Chambre familiale</strong> : 50m2, 1 lit double et 2 lits simple, vue sur piscine de l&rsquo;hotel, balcon, baignoire, WC.</p>\r\n</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 50&euro;/nuit</li>\r\n<li>Double : 75&euro;/nuit</li>\r\n<li>Familiale : 110&euro;/nuit</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7hotel14.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `admin`, `pseudo`, `pass`, `email`, `registration_date`, `picture`) VALUES
(6, 0, 'viovio8', '$2y$10$2XygzZ4nJQdt7phUnhmsbeRlpapYtTF9ArahSvfPSqsyRVK6vcFZS', 'violette.danjou@hotmail.fr', '2021-03-11 09:55:59', 'pictures/profile6img-profil.jpeg'),
(7, 1, 'administrateur', '$2y$10$FYPvsgA6.Q46UCvXJARb0ORvgzIwM3EnE7tOizQ3TF3mP0BLPoiQy', 'violette.danjou@openclassrooms.com', '2021-03-11 09:55:59', NULL),
(8, 0, 'lise10', '$2y$10$zbma0NU2hWCBz7Qb096Ks.Y34.Hi1BCCdyewX5YnWqyVKbHacsh5m', 'lili10@free.fr', '2021-03-11 09:59:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `opinion_id` int(11) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_opinion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(4) NOT NULL DEFAULT '0',
  `useful` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `opinions`
--

INSERT INTO `opinions` (`id`, `opinion_id`, `author`, `content`, `date_opinion`, `report`, `useful`) VALUES
(2, 1, 1, 'Super activité, nous en avons bien profiter avec notre famille. Le temps était radieux.', '2021-03-10 14:58:45', 1, 1),
(3, 1, 6, 'Avis test', '2021-03-10 19:12:41', 0, 0),
(5, 1, 6, 'Moment vraiment agréable entre amis.', '2021-03-11 17:54:00', 0, 0),
(6, 11, 7, '<p>Avis test</p>', '2021-03-13 16:20:17', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
