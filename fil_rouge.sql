-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 mars 2023 à 14:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fil_rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 's.leininger@live.fr', '$2y$10$n0fmqB6VrKJ9mHVf.oTwsO2P0YMmJC2on8HRi1vBCcE78gVpWbWmS'),
(2, 'sebastien', 'ohm-services@outlook.fr', '$2y$10$BEN8A.IE4WWsZ.NDC7y7JO6h9jnuqD77dp3CyUBDQqPdaQRS8YRNu');

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident_orders` int(11) NOT NULL,
  `ident_clients` int(11) DEFAULT NULL,
  `product` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `comment` text,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_enable` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_enable`) VALUES
(1, 'HOMME ', 1),
(2, 'FEMME ', 1),
(3, 'ENFANT ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) NOT NULL,
  `is_enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `color`, `is_enable`) VALUES
(1, 'ROUGE', 1),
(3, 'NOIR', 1),
(4, 'BLEU', 1);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  PRIMARY KEY (`id_product`,`id_color`,`id_size`),
  KEY `id_colors` (`id_color`),
  KEY `id_size` (`id_size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id_product`, `id_color`, `id_size`) VALUES
(74, 1, 4),
(74, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(250) NOT NULL,
  `name_product` varchar(50) DEFAULT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name_client` varchar(250) DEFAULT NULL,
  `first_name_client` varchar(50) DEFAULT NULL,
  `adress` text,
  `email_client` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id`, `chemin`, `name`) VALUES
(124, 'uploads/01_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_demi-tete_de_lion_tatouee_sur_le_dos.jpg', '01_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_demi-tete_de_lion_tatouee_sur_le_dos.jpg'),
(125, 'uploads/07_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_oiseau_en_chute_libre.jpg', '07_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_oiseau_en_chute_libre.jpg'),
(126, 'uploads/09_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_femme_au_masque_de_papillon.jpg', '09_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_femme_au_masque_de_papillon.jpg'),
(127, 'uploads/10_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_damerindien_au_regard_fier.jpg', '10_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_damerindien_au_regard_fier.jpg'),
(128, 'uploads/11_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_boussole_encadree_par_des_roses.jpg', '11_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_boussole_encadree_par_des_roses.jpg'),
(129, 'uploads/12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg', '12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg'),
(130, 'uploads/2_-_bro_vanthorn_tatoueur_a_paris_-_mushu_dragon_confident_de_mulan_tatoue_par_bro_vanthorn.jpg', '2_-_bro_vanthorn_tatoueur_a_paris_-_mushu_dragon_confident_de_mulan_tatoue_par_bro_vanthorn.jpg'),
(131, 'uploads/12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg', '12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg'),
(132, 'uploads/12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg', '12_-_vladimir_vynosliv_tatoueur_russe_guest_au_studio_de_tatouage_a_paris_la_bete_humaine_-_portrait_de_femme_des_annees_folles.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident_time` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `is_enable` int(11) NOT NULL,
  `id_sous_categories` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sous_categories` (`id_sous_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `ident_time`, `price`, `name`, `description`, `is_enable`, `id_sous_categories`) VALUES
(74, 1678201102, 12555, '151', 'az', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `products_pictures`
--

DROP TABLE IF EXISTS `products_pictures`;
CREATE TABLE IF NOT EXISTS `products_pictures` (
  `id_product` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  PRIMARY KEY (`id_product`,`id_picture`),
  KEY `id_picture` (`id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_pictures`
--

INSERT INTO `products_pictures` (`id_product`, `id_picture`) VALUES
(74, 124),
(74, 125),
(74, 126),
(74, 127),
(74, 128),
(74, 131),
(74, 132);

-- --------------------------------------------------------

--
-- Structure de la table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(50) NOT NULL,
  `is_enable` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `is_enable`) VALUES
(1, 'xl ', 1),
(4, 'XXL ', 1),
(5, 'XXXL ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_enable` int(11) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categories` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `is_enable`, `id_categories`) VALUES
(2, 'Pantalons', NULL, 2),
(3, 'Pantalons ', 1, 1),
(4, 'Pantalons', NULL, 3),
(5, 'Jupes', NULL, 2),
(7, 'Chemises ', 1, 1),
(8, 'Vestes ', 1, 1),
(9, 'Pantalons', NULL, 3),
(10, 'Robe', NULL, 3),
(11, 'Jupes', NULL, 3),
(12, 'Robe', NULL, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `id_clients` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `id_colors` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `products_pictures`
--
ALTER TABLE `products_pictures`
  ADD CONSTRAINT `id_picture` FOREIGN KEY (`id_picture`) REFERENCES `pictures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `id_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
