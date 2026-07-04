-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 juil. 2026 à 16:57
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpiutea`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` varchar(225) COLLATE utf32_unicode_ci NOT NULL,
  `destination_commande` text COLLATE utf32_unicode_ci NOT NULL,
  `numéro_telephone_client` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `statut_commande` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `produit_et_quantité` text COLLATE utf32_unicode_ci NOT NULL,
  `prix_total` int NOT NULL,
  `date_commande` date NOT NULL,
  `date_livraison` date NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='table de commande des produits';

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` varchar(225) COLLATE utf32_unicode_ci NOT NULL,
  `nom_compte` varchar(535) COLLATE utf32_unicode_ci NOT NULL,
  `prenom_compte` varchar(535) COLLATE utf32_unicode_ci NOT NULL,
  `email_compte` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `numero_telephone` varchar(15) COLLATE utf32_unicode_ci NOT NULL,
  `mot_de_passe` varchar(225) COLLATE utf32_unicode_ci NOT NULL,
  `type_compte` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `date_creation_compte` date NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='table des comptes';

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `nom_compte`, `prenom_compte`, `email_compte`, `numero_telephone`, `mot_de_passe`, `type_compte`, `date_creation_compte`) VALUES
('', 'gest1', 'gest1prenom', 'gest1@gmail.com', '0100000000', '0102', 'gestionnaire_stock', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `nom_produit` varchar(535) COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `quantite_produit` int NOT NULL,
  `prix_par_kilo` int NOT NULL,
  `quantite_seuil` int NOT NULL,
  `disponibilite_prevue_produit` date NOT NULL,
  `statut_stock_produit` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `image_produit` varchar(535) COLLATE utf32_unicode_ci NOT NULL,
  `date_ajout_produit` date NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='table des produits';

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description`, `quantite_produit`, `prix_par_kilo`, `quantite_seuil`, `disponibilite_prevue_produit`, `statut_stock_produit`, `image_produit`, `date_ajout_produit`) VALUES
('iuteaProd - 749277194', 'aubergine', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam deserunt officiis molestiae saepe tempora pariatur quam error modi, praesentium beatae sunt doloribus illum at voluptatem officia, ut, quae ex cumque!', 50, 400, 20, '0000-00-00', '', 'images/aubergine/aubergine.jpeg', '0000-00-00'),
('iuteaProd - 867575678', 'laitue', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam deserunt officiis molestiae saepe tempora pariatur quam error modi, praesentium beatae sunt doloribus illum at voluptatem officia, ut, quae ex cumque!', 100, 250, 20, '0000-00-00', '', 'images/laitue/laitue.jpg', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
