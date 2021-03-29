-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 15 mars 2021 à 15:01
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
(14, 'Sortie en catamaran', '<p>Profitez des couleurs du lagon en catamaran pour une sortie entre amis ou en famille. Laissez vous glisser sur le plus grand lagon du monde le temps d&rsquo;une journ&eacute;e ou sur plusieurs jours.</p>', 'pictures/activities/7catamaran.jpg'),
(15, 'Golf a Noumea', '<p>Le golf de Tina se partage entre parcours verdoyants et bord de mer, de quoi combler les amateurs de ce sports. D&eacute;marrez le parcours dans la foret s&egrave;che pour ensuite vous retrouver au bord du lagon, un v&eacute;ritable plaisir pour les yeux.</p>', 'pictures/activities/7golf.jpg'),
(16, 'Musee de Noumea', '<p>Le mus&eacute;e du Noum&eacute;a, place des cocotiers, retrace l&rsquo;ensemble de l&rsquo;histoire de la Nouvelle Cal&eacute;donie ainsi que l&rsquo;histoire de France avec la Premi&egrave;re et la Seconde Guerre Mondiale.</p>', 'pictures/activities/7musée.jpg');

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
  `airport_shuttle` tinyint(1) NOT NULL DEFAULT '0',
  `air_conditioner` tinyint(1) NOT NULL DEFAULT '0',
  `no_smokers` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `hotels` (`id`, `name`, `content`, `location`, `rooms`, `prices`, `picture`, `swimming_pool`, `beach_access`, `car_park`, `free_wifi`, `restaurant`, `family_rooms`, `television`, `airport_shuttle`, `air_conditioner`, `no_smokers`, `animals`, `strongbox`, `mini_bar`, `luggage`, `elevator`, `sauna`) VALUES
(4, 'Le Megalodon', '<p>Le M&eacute;galodon est le lieu id&eacute;al pour se relaxer dans l&rsquo;ensemble de nos services propos&eacute;s comprenant spa, hammam et piscine chauff&eacute;e int&eacute;rieures et ext&eacute;rieures.</p>', '<p>Kouaoua - COTE-EST</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 30m2, lit simple, douche, WC, balcon.</li>\r\n<li>Chambre double : 40m2, lit double, vue sur piscine ou oc&eacute;an, balcon, baignoire, WC.</li>\r\n<li>Suite : 60m2, lit double, canap&eacute;, vue sur oc&eacute;an, baignoire, douche, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 60&euro;</li>\r\n<li>Double : 85&euro;</li>\r\n<li>Suite : 110&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 15&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7megalodon.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Noumea sunset', '<p>Cet hotel est le meilleur endroit pour admirer les plus beaux couch&eacute;s de soleil de cette ile merveilleuse. Admirez le rendu de l&rsquo;un d&rsquo;entre eux avec cette photo.</p>', '<p>Ouvea - Iles Loyaute</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 30m2, lit simple, douche, WC, balcon.</li>\r\n<li>Chambre double : 40m2, lit double, vue sur piscine, balcon, baignoire, WC.</li>\r\n<li>Suite Familiale : 75m2, lit double, 1 lit simple, canap&eacute;, vue sur oc&eacute;an orient&eacute; coucher de soleil, baignoire, douche, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 80&euro;</li>\r\n<li>Double : 105&euro;</li>\r\n<li>Suite Familiale : 150&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 20&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7noumea-sunset.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Hotel pour afficher les services', '<p>Description de l\'hotel</p>', '<p>Noumea Grande Terre</p>', '<p>Chambre simple chambre double suite</p>', '<p>20&euro; 40&euro; 70&euro;</p>', 'pictures/hotels/7hotel19.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 'Lagon Hotel', '<p>Comme son nom l&rsquo;indique, Le Lagon hotel vous offre une sublime vue sur une partie du lagon de l&rsquo;&icirc;le. Profitez des suites familiales vous loger votre famille.</p>', '<p>Noumea - COTE-OUEST</p>', '<ul>\r\n<ul>\r\n<li>Chambre double : 30m2, lit double, vue sur piscine uniquement, balcon, baignoire, WC.</li>\r\n<li>Chambre familiale : 50m2, 2 lit double et 2 lits simple, vue sur piscine de l&rsquo;hotel, balcon avec table et fauteuils.</li>\r\n</ul>\r\n</ul>', '<ul>\r\n<ul>\r\n<li>Double : 80&euro;</li>\r\n<li>Familiale : 110&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 7&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7lagon-hotel.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(6, 0, 'viovio8', '$2y$10$2XygzZ4nJQdt7phUnhmsbeRlpapYtTF9ArahSvfPSqsyRVK6vcFZS', 'violette.danjou@hotmail.fr', '2021-03-11 09:55:59', 'pictures/profile/6img-profil.jpeg'),
(7, 1, 'administrateur', '$2y$10$FYPvsgA6.Q46UCvXJARb0ORvgzIwM3EnE7tOizQ3TF3mP0BLPoiQy', 'violette.danjou@openclassrooms.com', '2021-03-11 09:55:59', NULL),
(8, 0, 'lise10', '$2y$10$zbma0NU2hWCBz7Qb096Ks.Y34.Hi1BCCdyewX5YnWqyVKbHacsh5m', 'lili10@free.fr', '2021-03-11 09:59:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL DEFAULT '0',
  `id_hotel` int(11) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_opinion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(4) NOT NULL DEFAULT '0',
  `useful` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `opinions`
--

INSERT INTO `opinions` (`id`, `id_activity`, `id_hotel`, `author`, `content`, `date_opinion`, `report`, `useful`) VALUES
(11, 15, 0, 8, '<p>Les terrains de golf sont immenses avec des vues incroyables sur la Grande Terre mais aussi sur le lagon. Je reviendrais et je recommande cette activit&eacute; m&ecirc;me pour les d&eacute;butants.</p>', '2021-03-14 22:38:18', 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
