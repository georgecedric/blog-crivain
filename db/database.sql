-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 16 Mars 2017 à 07:42
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `blogjf`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(255) NOT NULL,
  `art_content` longtext NOT NULL,
  `art_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_date`) VALUES
(1, 'Mon titre', 'Lorem Ipsum is the default filler text that is used on millions of web pages. It is a useful thing in the sense that it fills the space but not so much because it doesn’t make any sense to a regular user. Fillerama is a tool that changes this by letting you generate filler text with quotes from popular TV show Futurama.\r\n\r\nYou can choose to generate as many paragraphs you want and decide if you want to insert paragraph tags. While generating the text, you can instantly preview it and make any changes you want. Once it looks good, click generate and use it wherever you want. Nothing fancy or revolutionary but a nice break from the default Lorem Ipsum.', '2017-02-05'),
(2, 'Mon titre', 'Lorem Ipsum is the default filler text that is used on millions of web pages. It is a useful thing in the sense that it fills the space but not so much because it doesn’t make any sense to a regular user. Fillerama is a tool that changes this by letting you generate filler text with quotes from popular TV show Futurama.\r\n\r\nYou can choose to generate as many paragraphs you want and decide if you want to insert paragraph tags. While generating the text, you can instantly preview it and make any changes you want. Once it looks good, click generate and use it wherever you want. Nothing fancy or revolutionary but a nice break from the default Lorem Ipsum.', '2017-02-04'),
(3, 'Mon titre', 'Lorem Ipsum is the default filler text that is used on millions of web pages. It is a useful thing in the sense that it fills the space but not so much because it doesn’t make any sense to a regular user. Fillerama is a tool that changes this by letting you generate filler text with quotes from popular TV show Futurama.\r\n\r\nYou can choose to generate as many paragraphs you want and decide if you want to insert paragraph tags. While generating the text, you can instantly preview it and make any changes you want. Once it looks good, click generate and use it wherever you want. Nothing fancy or revolutionary but a nice break from the default Lorem Ipsum.', '2017-02-01');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `usr_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `rep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`com_id`, `com_date`, `com_content`, `usr_id`, `art_id`, `rep_id`) VALUES
(1, '2017-03-06 14:21:06', 'Great! Keep up the good work.', 1, 3, 0),
(2, '2017-03-06 14:21:06', 'Thank you, I\'ll try my best.', 2, 1, 0),
(3, '2017-03-09 18:53:17', 'très bon texte j\'adore', 1, 1, 0),
(4, '2017-03-11 11:48:07', 'bravo pour votre texte', 1, 1, 0),
(5, '2017-03-13 18:28:04', 'trop bien', 2, 3, 0),
(6, '2017-03-13 18:31:40', 'trop bien', 1, 3, 0),
(7, '2017-03-13 20:22:50', 'je suis et reste fan', 1, 1, 0),
(8, '2017-03-14 14:33:56', 'salut', 1, 1, 0),
(9, '2017-03-14 17:32:44', 'moi', 3, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `rep_id` int(11) NOT NULL,
  `rep_content` text NOT NULL,
  `rep_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`rep_id`, `rep_content`, `rep_date`, `usr_id`, `com_id`) VALUES
(1, 'comment vas tu?', '2017-03-08 15:16:19', 1, 1),
(2, 'waouhhhh trop bien et toi?', '2017-03-08 15:16:19', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `usr_salt` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `usr_role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(1, 'JohnDoe', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_USER'),
(2, 'JaneDoe', '$2y$13$qOvvtnceX.TjmiFn4c4vFe.hYlIVXHSPHfInEG21D99QZ6/LM70xa', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER'),
(3, 'admin', '$2y$13$A8MQM2ZNOi99EW.ML7srhOJsCaybSbexAj/0yXrJs4gQ/2BqMMW2K', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`art_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_com_art` (`art_id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`rep_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;