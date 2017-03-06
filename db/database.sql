-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 06 Mars 2017 à 17:25
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
  `com_author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`com_id`, `com_author`, `com_date`, `com_content`, `art_id`) VALUES
(1, 'John Doe', '2017-03-06 14:21:06', 'Great! Keep up the good work.', 1),
(2, 'Ann Yone', '2017-03-06 14:21:06', 'Thank you, I\'ll try my best.', 1);

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
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;