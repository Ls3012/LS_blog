-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 23 jan. 2024 à 12:12
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lt_blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `lt_blog_article`
--

CREATE TABLE `lt_blog_article` (
  `idArticle` int(11) NOT NULL,
  `title` varchar(11) NOT NULL,
  `content_Art` varchar(9999) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `creationDate_Art` datetime NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lt_blog_article`
--

INSERT INTO `lt_blog_article` (`idArticle`, `title`, `content_Art`, `photo`, `creationDate_Art`, `idUser`) VALUES
(1, 'Article1', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'photo/photo', '2023-09-08 16:17:17', 1),
(10, 'Article 2', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'photo/photo', '2023-09-08 19:10:49', 1),
(12, 'Article 3', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset ', 'photo/photo', '2023-09-08 19:16:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lt_blog_comment`
--

CREATE TABLE `lt_blog_comment` (
  `idComment` int(11) NOT NULL,
  `content_Com` varchar(2500) NOT NULL,
  `creationDate_com` datetime NOT NULL,
  `comState` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lt_blog_comment`
--

INSERT INTO `lt_blog_comment` (`idComment`, `content_Com`, `creationDate_com`, `comState`, `idUser`, `idArticle`) VALUES
(1, 'Incroyable l\'article', '2023-09-08 16:20:54', NULL, 2, 1),
(5, 'C\'est nul j\'aime pas', '2023-09-11 14:39:49', NULL, 2, 10),
(7, 'Bof c\'est tres tres nul', '2023-09-11 14:55:28', NULL, 2, 10),
(8, 'cava', '2023-09-12 00:45:24', NULL, 1, 12),
(9, 'non', '2023-09-12 01:09:19', NULL, 2, 12),
(11, 'bah non ', '2023-09-12 01:09:41', NULL, 2, 12),
(13, 'cava pas non', '2023-09-12 01:09:56', NULL, 1, 12),
(14, 'bien', '2023-09-13 15:14:24', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lt_blog_user`
--

CREATE TABLE `lt_blog_user` (
  `idUser` int(11) NOT NULL,
  `lastName` varchar(11) NOT NULL,
  `firstName` varchar(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userRole` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lt_blog_user`
--

INSERT INTO `lt_blog_user` (`idUser`, `lastName`, `firstName`, `nickname`, `phone`, `email`, `password`, `userRole`) VALUES
(1, 'Trip', 'Louis', 'tripLouis', 712345678, 'triplouis3012@gmail.com', 'mdpDeLouis', 1),
(2, 'Jean', 'Visit', 'jeanJean', 123456789, 'jeanvisite@gmail.com', 'mdpDeJeanVisite', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `lt_blog_article`
--
ALTER TABLE `lt_blog_article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Index pour la table `lt_blog_comment`
--
ALTER TABLE `lt_blog_comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idUser_2` (`idUser`),
  ADD KEY `idArticle_2` (`idArticle`);

--
-- Index pour la table `lt_blog_user`
--
ALTER TABLE `lt_blog_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `lt_blog_article`
--
ALTER TABLE `lt_blog_article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `lt_blog_comment`
--
ALTER TABLE `lt_blog_comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `lt_blog_user`
--
ALTER TABLE `lt_blog_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lt_blog_article`
--
ALTER TABLE `lt_blog_article`
  ADD CONSTRAINT `lt_blog_article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `lt_blog_user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lt_blog_comment`
--
ALTER TABLE `lt_blog_comment`
  ADD CONSTRAINT `lt_blog_comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `lt_blog_user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_blog_comment_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `lt_blog_article` (`idArticle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
