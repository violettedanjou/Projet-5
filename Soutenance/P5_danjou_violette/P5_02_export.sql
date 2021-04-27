-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 27 avr. 2021 à 18:58
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
  `picture` varchar(255) DEFAULT NULL,
  `weather` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `title`, `content`, `picture`, `weather`) VALUES
(14, 'Sortie en catamaran', '<p>Profitez des couleurs du lagon en catamaran pour une sortie entre amis ou en famille. Laissez vous glisser sur le plus grand lagon du monde le temps d&rsquo;une journ&eacute;e ou sur plusieurs jours.</p>', 'pictures/activities/7catamaran.jpg', 1),
(15, 'Golf a Noumea', '<p>Le golf de Tina se partage entre parcours verdoyants et bord de mer, de quoi combler les amateurs de ce sports. D&eacute;marrez le parcours dans la foret s&egrave;che pour ensuite vous retrouver au bord du lagon, un v&eacute;ritable plaisir pour les yeux.</p>', 'pictures/activities/7golf.jpg', 1),
(16, 'Musee de Noumea', '<p>Le mus&eacute;e du Noum&eacute;a, place des cocotiers, retrace l&rsquo;ensemble de l&rsquo;histoire de la Nouvelle Cal&eacute;donie ainsi que l&rsquo;histoire de France avec la Premi&egrave;re et la Seconde Guerre Mondiale.</p>', 'pictures/activities/7musée.jpg', 0),
(26, 'Shopping a Noumea', '<p>L&rsquo;&icirc;le n&rsquo;est pas uniquement remplie de plages de sable blanc, elle a aussi son lot de boutiques. Rendez-vous dans la capitale, Noum&eacute;a, pour ramenez les plus beaux souvenirs &agrave; vos proches.</p>', 'pictures/activities/7shopping.jpg', 0),
(27, 'Plongee dans le lagon', '<p>&Agrave; vos palmes, pr&ecirc;ts, plongez ! Sautez au coeur du Pacifique entre les &laquo;&nbsp;patates de corail&nbsp;&raquo; abritant une faune multicolore. La Nouvelle Cal&eacute;donie rec&egrave;le de spots les plus magiques les uns que les autres.&nbsp;</p>', 'pictures/activities/7plongee.jpg', 1),
(28, 'Gastronomie kanak', '<p>La gastronomie locale kanak est un &eacute;l&eacute;ment &agrave; ne pas manquer lors d&rsquo;un voyage en Nouvelle-Cal&eacute;donie. Tentez de gouter le fameux Bougna, vous en serez ravie.</p>', 'pictures/activities/7bougna.jpg', 0),
(29, 'Paddle sur la plage de kikibeach', '<p>D&eacute;couvrez l&rsquo;une des plus belles plages de Lifou en paddle, kikibeach. Difficile d&rsquo;acc&egrave;s mais l&rsquo;endroit r&ecirc;v&eacute; pour admirer quelques tortues. Et si vous &ecirc;tes chanceux, un banc de dauphins pourrait bien pointer le bout de son nez.</p>', 'pictures/activities/7paddle.jpg', 1),
(30, 'Randonnees pedestres', '<p>La cote Ouest de la Nouvelle Cal&eacute;donie offre de une grande vari&eacute;t&eacute; de paysages avec magnifiques randonn&eacute;es comptant plusieurs dizaines de km. Aventurez vous dans ces grands espaces seuls ou accompagn&eacute;s de guides sp&eacute;cialis&eacute;s.</p>', 'pictures/activities/7rando-pédestres.jpg', 1),
(31, 'Saut en parachute au dessus des iles', '<p>Pour les amateurs de grandes sensations, l&rsquo;office de tourisme propose des sauts en parachutes au dessus d&rsquo;Ouv&eacute;a, Lifou et Mar&eacute;, les iles Loyaut&eacute;. Envolez vous le temps d&rsquo;un instant et admirez ce lieu de paradis.</p>', 'pictures/activities/7parachute.jpg', 1),
(33, 'Visite de la ville', '<p>Les villes comme Yat&eacute;, Thio, Koumac, Kon&eacute;, Noum&eacute;a et&nbsp; bien d&rsquo;autres encore valent le coup d&lsquo;&ecirc;tre visit&eacute;e. Prenez le temps de d&eacute;couvrir ces villes qui logent notre &icirc;le et qui vous r&eacute;servent de belles surprises.</p>', 'pictures/activities/7ville.jpg', 0),
(34, 'Aquarium grandiose', '<p>Noum&eacute;a poss&egrave;de aussi son aquarium qui vous fera d&eacute;couvrir l&rsquo;incroyable diversit&eacute; des lagons de Nouvelle Cal&eacute;donie. Il met en sc&egrave;ne la plupart des &eacute;cosyst&egrave;mes aquatiques cal&eacute;doniens.</p>', 'pictures/activities/7aquarium.jpg', 0),
(35, 'Decouverte de la Baie d\'Upi', '<p>Embarquez sur une pirogue depuis Saint-Joseph et naviguez autour de la baie d&rsquo;upi parsem&eacute;e d&rsquo;ilots coralliens pour une atmosph&egrave;re d&eacute;contract&eacute;e.</p>', 'pictures/activities/7baie-dupi.jpg', 1),
(36, 'Balades a cheval ', '<p>Les ranch sont &eacute;galement partie int&eacute;grante de la Nouvelle Cal&eacute;donie et les chevaux font partie du paysage de l&rsquo;archipel. D&eacute;couvrez, &agrave; dos de cheval, la vraie nature de la brousse cal&eacute;donienne.</p>', 'pictures/activities/7rando-chevaux.jpg', 1),
(37, 'Kitesurf autour du Lagon', '<p>Le kitesurf est un sport tr&egrave;s r&eacute;pandue en Nouvelle Cal&eacute;donie qui attire bon nombre de touristes. D&eacute;butants ou confirm&eacute;s surfez sur les vagues du Pacifique entour&eacute;s de professionnels du sport.</p>', 'pictures/activities/7kitesurf.jpg', 1),
(38, 'Culture kanak', '<p>Cases, avec matelas au sol, ou paillotes, &eacute;quip&eacute;es de lits, d&eacute;couvrez comment vivent les tribus kanak au quotidien et entrez en contacte avec cette population locale.</p>', 'pictures/activities/7kanak.jpg', 0);

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
(4, 'Le Megalodon', '<p>Le M&eacute;galodon est le lieu id&eacute;al pour se relaxer dans l&rsquo;ensemble de nos services propos&eacute;s comprenant spa, hammam et piscine chauff&eacute;e int&eacute;rieures et ext&eacute;rieures.</p>', '<p>Kouaoua - COTE-EST</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 30m2, lit simple, douche, WC, balcon.</li>\r\n<li>Chambre double : 40m2, lit double, vue sur piscine ou oc&eacute;an, balcon, baignoire, WC.</li>\r\n<li>Suite : 60m2, lit double, canap&eacute;, vue sur oc&eacute;an, baignoire, douche, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 60&euro;</li>\r\n<li>Double : 85&euro;</li>\r\n<li>Suite : 110&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 15&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7hotel56.jpg', 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0),
(5, 'Noumea sunset', '<p>Cet hotel est le meilleur endroit pour admirer les plus beaux couch&eacute;s de soleil de cette ile merveilleuse. Admirez le rendu de l&rsquo;un d&rsquo;entre eux avec cette photo.</p>', '<p>Ouvea - Iles Loyaute</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 30m2, lit simple, douche, WC, balcon.</li>\r\n<li>Chambre double : 40m2, lit double, vue sur piscine, balcon, baignoire, WC.</li>\r\n<li>Suite Familiale : 75m2, lit double, 1 lit simple, canap&eacute;, vue sur oc&eacute;an orient&eacute; coucher de soleil, baignoire, douche, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 80&euro;</li>\r\n<li>Double : 105&euro;</li>\r\n<li>Suite Familiale : 150&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 20&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7noumea-sunset.jpg', 1, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(7, 'Lagon Hotel', '<p>Comme son nom l&rsquo;indique, Le Lagon hotel vous offre une sublime vue sur une partie du lagon de l&rsquo;&icirc;le. Profitez des suites familiales vous loger votre famille.</p>', '<p>Noumea - COTE-OUEST</p>', '<ul>\r\n<ul>\r\n<li>Chambre double : 30m2, lit double, vue sur piscine uniquement, balcon, baignoire, WC.</li>\r\n<li>Chambre familiale : 50m2, 2 lit double et 2 lits simple, vue sur piscine de l&rsquo;hotel, balcon avec table et fauteuils.</li>\r\n</ul>\r\n</ul>', '<ul>\r\n<ul>\r\n<li>Double : 80&euro;</li>\r\n<li>Familiale : 110&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 7&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7lagon-hotel.jpg', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0),
(8, 'Paradis hotel', '<p>Cet h&ocirc;tel situ&eacute; sur l&rsquo;ile de Pins, surnomm&eacute;e aussi &laquo; ile la plus proche du paradis &raquo;, offre de splendides vues sur une partie des pins colonaires.</p>', '<p>Iles des Pins - SUD-EST</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 45m2, lit simple, canap&eacute;, douche, WC, balcon.</li>\r\n<li>Chambre double : 60m2, lit double, vue sur piscine, balcon, baignoire, WC.</li>\r\n<li>Suite : 95m2, lit double, canap&eacute;, vue sur le lagon, dressing, baignoire, douche, transats r&eacute;serv&eacute;s, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 100&euro;</li>\r\n<li>Double : 145&euro;</li>\r\n<li>Suite Familiale : 210&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 27&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7hotel58.jpg', 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1),
(18, 'Alice\'s Beach', '<p>Venez profitez en famille ou entre amis des piscine du Alice&rsquo;s Hotel qui laissent place aux nageurs et aux profiteurs.</p>', '<p>Pa&iuml;ta - COTE OUEST</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre simple : 25m2, lit simple, vue sur la piscine de l\'h&ocirc;tel, salle de bain classique (douche, WC).</li>\r\n<li>Chambre double : 35m2, lit double, vue sur piscine ou sur oc&eacute;an, baignoire, WC.</li>\r\n<li>Chambre familiale : 50m2, 1 lit double et 2 lits simple, vue sur piscine de l&rsquo;hotel, balcon, baignoire, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Simple : 50&euro;/nuit</li>\r\n<li>Double : 75&euro;</li>\r\n<li>Familiale : 110&euro;</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7hotel40.jpg', 1, 0, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 'Pilotis de We', '<p>Les Pilotis de W&eacute; sont le lieu pour s&rsquo;&eacute;vader le temps d&rsquo;un instant. Laissez vous flotter et emporter par l&rsquo;air cal&eacute;donien.</p>', '<p>W&eacute; - Ile de LIFOU</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre classique : 40m2, lit double, vue sur oc&eacute;an Pacifique uniquement, terrasse, (douche &amp; WC &agrave; l\'ext&eacute;rieur).</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Classique : 150&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 29&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7pilotis-we.jpg', 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0, 0),
(21, 'Le Wenene', '<p>Situ&eacute; &agrave; quelques pas du march&eacute; de W&eacute;n&eacute;n&eacute;, cet h&ocirc;tel vous offre une agr&eacute;able vue sur le fleuve Thio et &agrave; quelques minutes en voiture vous trouverez la plage me Moara bord&eacute;e de cocotiers.</p>', '<p>Thio - COTE EST</p>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Chambre classique : 40m2, lit double, canap&eacute;, baignoire, WC, balcon.</li>\r\n<li>Chambre familiale : 65m2, 2 lits double, vue sur piscine, balcon, baignoire, WC.</li>\r\n</ul>\r\n</ul>', '<ul class=\"ul1\">\r\n<ul class=\"ul1\" style=\"list-style-type: disc;\">\r\n<li>Classique : 100&euro;</li>\r\n<li>Familiale : 135&euro;</li>\r\n<li>Petit-d&eacute;jeuner : 22&euro;/personne</li>\r\n</ul>\r\n</ul>', 'pictures/hotels/7hotel13.jpg', 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0);

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
(6, 0, 'viovio8', '$2y$10$2XygzZ4nJQdt7phUnhmsbeRlpapYtTF9ArahSvfPSqsyRVK6vcFZS', 'violette.danjou@hotmail.fr', '2021-03-11 09:55:59', 'pictures/profile/6viovio8.jpeg'),
(7, 1, 'administrateur', '$2y$10$FYPvsgA6.Q46UCvXJARb0ORvgzIwM3EnE7tOizQ3TF3mP0BLPoiQy', 'violette.danjou@openclassrooms.com', '2021-03-11 09:55:59', 'pictures/profile/7admin.jpeg'),
(8, 0, 'lise10', '$2y$10$zbma0NU2hWCBz7Qb096Ks.Y34.Hi1BCCdyewX5YnWqyVKbHacsh5m', 'lili10@free.fr', '2021-03-11 09:59:03', 'pictures/profile/8lise10.jpeg'),
(9, 0, 'cece20', '$2y$10$ZMFKTssCE9PzwViaSFxVce4E2qKLcoaFb/tj8AcU/J5d97gJffO9y', 'clt20@gmail.com', '2021-04-20 14:30:30', 'pictures/profile/9cece20.jpeg'),
(10, 0, 'adri35', '$2y$10$tFam5dyR9BQTm11vK7mDqekmIdJHs79nCiltM7vryOUS/FKmmRpE.', 'adrilens35@hotmail.fr', '2021-04-27 18:55:07', 'pictures/profile/10adri35.jpeg'),
(11, 0, 'juju15', '$2y$10$eV9wBdWoA9/992fE59nCDeWpL3CLydRT9yj.yQtS6ZCLuqlYJ3P/m', 'justine15@free.fr', '2021-04-27 20:39:50', 'pictures/profile/11juju15.jpeg');

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
(11, 15, 0, 8, '<p>Les terrains de golf sont immenses avec des vues incroyables sur la Grande Terre mais aussi sur le lagon. Je reviendrais et je recommande cette activit&eacute; m&ecirc;me pour les d&eacute;butants.</p>', '2021-03-14 22:38:18', 1, 0),
(12, 16, 0, 9, '<p>Mus&eacute;e int&eacute;ressant et enrichissant. Id&eacute;al pour les enfants.</p>', '2021-04-20 14:35:05', 0, 1),
(13, 0, 4, 6, '<p>Prix abordables, h&ocirc;tel agr&eacute;able et calme, proche de la mer. Je recommande ++</p>', '2021-04-27 12:12:48', 0, 1),
(14, 0, 8, 10, '<p>Nous avons &eacute;t&eacute; tr&egrave;s d&eacute;&ccedil;us de la qualit&eacute; de cette h&ocirc;tel. Tous les canap&eacute;s (chambres et hall) avaient des t&acirc;ches. Le bois de la structure est vieillissant, ce qui donne un aspect d&eacute;lav&eacute;. Le repas du soir &eacute;tait tr&egrave;s mauvais. Je ne fait jamais de chichi sur la nourriture, mais l&agrave; ce n\'&eacute;tait pas possible ! les crevettes et crabes trop cuits, les desserts encore surgel&eacute;... Tr&egrave;s d&eacute;cus</p>', '2021-04-27 20:34:19', 0, 0),
(15, 34, 0, 10, '<p>Super sympa, voir toute la phone marine &agrave; un seul endroit est super cool.<br />Je recommande d\'y passer au moins 1 fois</p>', '2021-04-27 20:35:59', 1, 0),
(16, 35, 0, 10, '<p>Nous y sommes all&eacute;s en pirogue, nous avons vu au loin des dauphins, les couleurs sont magnifiques, les rochers sortant au fil de l\'eau sont un enchantement !</p>', '2021-04-27 20:38:49', 0, 0),
(17, 14, 0, 11, '<p>Nous avons profit&eacute; d\'une sortie entre amis avec des enfants, sur une semaine. Cyril notre skipper &eacute;tait au top, &agrave; l\'&eacute;coute de tout, toujours en qu&ecirc;te que tous profitent de la sortie selon leurs attentes : p&ecirc;che &agrave; la traine, kite, d&eacute;couverte du lagon, chasse sous marine, un vrai partage, etc... Toute cela dans le respect et la protection de l\'environnement.</p>', '2021-04-27 20:44:05', 1, 1),
(18, 16, 0, 11, '<p>Mus&eacute;e d une qualit&eacute; incroyable, mise en sc&egrave;ne, interactif, et qui permet de mieux comprendre le r&ocirc;le de la NC dans cette guerre.. Pour moi, un incontournable qu il faut vraiment visiter..</p>', '2021-04-27 20:45:04', 0, 0),
(19, 0, 5, 11, '<p>Merci beaucoup pour la qualit&eacute; de votre service, ya rien a dire accueille au top, des personnes souriantes et des chambre &amp; lits confortables ! merci beaucoup j\'ai bien aim&eacute; mon petit s&eacute;jour chez vous&nbsp;</p>', '2021-04-27 20:49:08', 0, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
