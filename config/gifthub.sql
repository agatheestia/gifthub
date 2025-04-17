-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 avr. 2025 à 08:01
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gifthub`
--

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_wish` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_like` (`id_user`,`id_wish`),
  KEY `wish_id` (`id_wish`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_wish`, `created_at`) VALUES
(1, 2, 1, '2025-04-16 09:03:44'),
(2, 2, 2, '2025-04-16 09:03:44'),
(3, 1, 5, '2025-04-16 09:03:44');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'anniversaire'),
(2, 'mariage');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Dupont', 'Marie', 'maried', 'marie@example.com', '$2y$10$abcdefgh...', '2025-04-16 09:03:44'),
(2, 'Martin', 'Jean', 'jeanm', 'jean@example.com', '$2y$10$ijklmnop...', '2025-04-16 09:03:44');

-- --------------------------------------------------------

--
-- Structure de la table `wishes`
--

DROP TABLE IF EXISTS `wishes`;
CREATE TABLE IF NOT EXISTS `wishes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `id_wishlist` int DEFAULT NULL,
  `is_purchased` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `wishlist_id` (`id_wishlist`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `wishes`
--

INSERT INTO `wishes` (`id`, `name`, `image`, `description`, `link`, `price`, `id_wishlist`, `is_purchased`, `created_at`) VALUES
(1, 'Casque Bose QC45', '/img/wishes/1.jpg', 'Casque anti-bruit pour les voyages', 'https://exemple.com/bose', 299.99, 1, 0, '2025-04-16 09:03:44'),
(2, 'Montre Garmin', '/img/wishes/2.jpg', 'Montre connectée pour le sport', 'https://exemple.com/garmin', 249.99, 1, 0, '2025-04-16 09:03:44'),
(3, 'Vaisselle vintage', '/img/wishes/3.jpg', 'Service de table 18 pièces', 'https://exemple.com/vaisselle', 120.00, 2, 0, '2025-04-16 09:03:44'),
(4, 'Machine à café', '/img/wishes/4.jpg', 'Cafetière automatique design', 'https://exemple.com/cafe', 180.00, 2, 1, '2025-04-16 09:03:44'),
(5, 'Kindle Paperwhite', '/img/wishes/5.jpg', 'Liseuse étanche pour lire partout', 'https://exemple.com/kindle', 139.99, 3, 1, '2025-04-16 09:03:44'),
(6, 'Sac photo', '/img/wishes/6.jpg', 'Sac à dos pour matériel photo', 'https://exemple.com/sac', 89.90, 3, 0, '2025-04-16 09:03:44');

-- --------------------------------------------------------

--
-- Structure de la table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `id_type` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `type_id` (`id_type`),
  KEY `user_id` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `wishlists`
--

INSERT INTO `wishlists` (`id`, `name`, `image`, `description`, `id_type`, `id_user`, `created_at`) VALUES
(1, 'Anniversaire Marie', '/img/wishlists/1.jpg', 'Liste pour mes 30 ans', 1, 1, '2025-04-16 09:03:44'),
(2, 'Mariage Marie & Alex', '/img/wishlists/2.jpg', 'Notre liste de mariage', 2, 1, '2025-04-16 09:03:44'),
(3, 'Anniversaire Jean', '/img/wishlists/3.jpg', 'Idées cadeaux pour mon anniversaire', 1, 2, '2025-04-16 09:03:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
