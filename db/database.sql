-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 02 Juillet 2017 à 18:54
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
  `art_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_date`) VALUES
(2, 'Loin, très loin', '<p style=\"text-align: justify;\">Loin, tr&egrave;s loin, au del&agrave; des monts Mots, &agrave; mille lieues des pays Voyellie et Consonnia, demeurent les Bolos Bolos. Ils vivent en retrait, &agrave; Bourg-en-Lettres, sur les c&ocirc;tes de la S&eacute;mantique, un vaste oc&eacute;an de langues. Un petit ruisseau, du nom de Larousse, coule en leur lieu et les approvisionne en r&egrave;glalades n&eacute;cessaires en tout genre; un pays paradisiagmatique, dans lequel des pans entiers de phrases pr&eacute;m&acirc;ch&eacute;es vous volent lit&eacute;ralement tout cuit dans la bouche.</p>\r\n<p style=\"text-align: justify;\">Pas m&ecirc;me la toute puissante Ponctuation ne r&eacute;git les Bolos Bolos - une vie on ne peut moins orthodoxographique. Un jour pourtant, une petite ligne de Bolo Bolo du nom de Lorem Ipsum d&eacute;cida de s\'aventurer dans la vaste Grammaire. Le grand Oxymore voulut l\'en dissuader, le prevenant que l&agrave;-bas cela fourmillait de vils Virgulos, de sauvages Pointdexclamators et de sournois Semicolons qui l\'attendraient pour s&ucirc;r au prochain paragraphe, mais ces mots ne firent &eacute;cho dans l\'oreille du petit Bolo qui ne se laissa point d&eacute;concerter.</p>\r\n<p style=\"text-align: justify;\">Il pacqua ses 12 lettrines, glissa son initiale dans sa panse et se mit en route. Alors qu\'il avait gravi les premiers flancs de la cha&icirc;ne des monts Italiques, il jeta un dernier regard sur la skyline de la vie.</p>', '2017-02-03 23:00:00'),
(3, 'Tous mes sens', '<p style=\"text-align: justify;\">Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie. Je suis si heureux, mon ami, si absorb&eacute; dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible &eacute;bauche, jamais pourtant je ne fus si grand peintre.</p>\r\n<p style=\"text-align: justify;\">Quand mon vallon ch&eacute;ri se couvre autour de moi d\'une l&eacute;g&egrave;re vapeur; qu\'au-dessus de ma t&ecirc;te le soleil de midi darde ses rayons embras&eacute;s sur la sombre vo&ucirc;te de mon bois, au fond duquel, comme d\'un sanctuaire, il introduit &agrave; peine une tremblante lumi&egrave;re; qu\'&eacute;tendu sur le gazon touffu, &agrave; la chute d\'un ruisseau, je d&eacute;couvre avec ravissement une multitude de plantes, de fleurs d\'une d&eacute;licatesse infinie; que je vois s\'agiter entre les brins d\'herbe des milliers de vermisseaux, d\'insectes, de moucherons, aux formes vari&eacute;es et innombrables; que j\'entends r&eacute;sonner &agrave; mon oreille le murmure confus de ce petit monde; quand l\'auguste pr&eacute;sence de l\'&Ecirc;tre tout-puissant qui cr&eacute;a l\'homme &agrave; son image, le souffle vivifiant du Dieu d\'amour et de bont&eacute; qui nous porte et nous soutient sur un oc&eacute;an de d&eacute;lices &eacute;ternels, me p&eacute;n&egrave;trent de toutes parts, et que le ciel et la terre se r&eacute;fl&eacute;chissent dans mon &acirc;me sous le traits d\'une amante ador&eacute;e, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement!</p>\r\n<p style=\"text-align: justify;\">Ces &eacute;motions br&ucirc;lantes, que ne m\'est-il donn&eacute; de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majest&eacute; de ces sublimes merveilles! Tous mes sens sont &eacute;mus d\'une volupt&eacute; douce et pure, comme l\'haleine du matin dans cette saison d&eacute;licieuse. Seul, au milieu d\'une contr&eacute;e qui semble fait expr&egrave;s pour un coeur tel que mien, j\'y go&ucirc;te &agrave; longs traits l\'ivresse de la vie.</p>', '2017-01-31 23:00:00'),
(5, 'At solmen va esser', '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 0px; line-height: normal; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 10px;\"><strong>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 0px; line-height: normal; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 10px;\"><strong>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues.</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 0px; line-height: normal; color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 10px;\"><strong>It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</strong></p>', '2017-05-13 15:37:10');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_content` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `usr_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `com_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `com_advert` varchar(2500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`com_id`, `com_date`, `com_content`, `usr_id`, `art_id`, `com_user`, `com_advert`) VALUES
(5, '2017-06-26 16:51:49', 'Excogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.', 0, 5, 'césars', NULL),
(34, '2017-06-29 22:34:03', 'commentaire aussi poétique que l article', 0, 5, 'fleur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_title` varchar(250) NOT NULL,
  `contact_content` text NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_author` varchar(250) NOT NULL,
  `contact_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_title`, `contact_content`, `contact_email`, `contact_author`, `contact_date`) VALUES
(1, 'bonjour', 'je me présente je m\'appelle henri', 'aaaa@aaaaa.com', 'jerome C', '2017-04-17 17:28:58'),
(3, 'aaaa', 'aaaah', 'aaaa', 'aaa', '2017-04-27 16:34:44'),
(4, 'aaaaa', 'aaaaaaa', 'aaaa', 'aaa', '2017-05-02 08:44:27'),
(5, 'aaa', 'aaaah', 'aaaa', 'aaaa', '2017-05-03 18:56:41'),
(6, 'test réussi', 'test encore réussi', 'cedgeorge@yahoo.fr', 'teste', '2017-05-10 15:03:47'),
(7, 'aaaaa', 'aaaaaa', 'aaa@yahoo.fr', 'aaaa', '2017-05-11 16:09:16');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `newsletter_lastname` varchar(250) NOT NULL,
  `newsletter_name` varchar(250) NOT NULL,
  `newsletter_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_lastname`, `newsletter_name`, `newsletter_email`) VALUES
(3, '', 'george cedric', 'aaaa@yahoo.fr'),
(5, '', 'Mary Hatoutprix', 'mary@gmail.fr'),
(7, '', 'aaaa', 'aaaa@yahoo.fr'),
(8, '', 'aaaaaa', 'aaaa@yahoo.com');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `rep_id` int(11) NOT NULL,
  `rep_content` text NOT NULL,
  `rep_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rep_user` varchar(100) NOT NULL,
  `com_id` int(11) NOT NULL,
  `rep_advert` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`rep_id`, `rep_content`, `rep_date`, `rep_user`, `com_id`, `rep_advert`) VALUES
(1, 'on teste encore et toujours', '2017-06-30 10:33:09', 'jen fun', 5, ''),
(2, 'test pour signalement', '2017-06-30 15:59:30', 'toujours moi', 5, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `reponsereply`
--

CREATE TABLE `reponsereply` (
  `reply_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply_user` varchar(100) NOT NULL,
  `rep_id` int(11) NOT NULL,
  `reply_advert` varchar(2500) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `reponsereply`
--

INSERT INTO `reponsereply` (`reply_id`, `reply_content`, `reply_date`, `reply_user`, `rep_id`, `reply_advert`, `text`) VALUES
(4, 'tout a fait d accord avec toi', '2017-07-01 15:52:56', 'Jean Forteroche', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `usr_salt` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `usr_role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `user_mail`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(1, 'JohnDoe', '', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_USER'),
(2, 'JaneDoe', '', '$2y$13$qOvvtnceX.TjmiFn4c4vFe.hYlIVXHSPHfInEG21D99QZ6/LM70xa', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER'),
(3, 'admin', '', '$2y$13$A8MQM2ZNOi99EW.ML7srhOJsCaybSbexAj/0yXrJs4gQ/2BqMMW2K', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN');

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
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`rep_id`);

--
-- Index pour la table `reponsereply`
--
ALTER TABLE `reponsereply`
  ADD PRIMARY KEY (`reply_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reponsereply`
--
ALTER TABLE `reponsereply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;