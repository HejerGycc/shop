-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 fév. 2019 à 20:49
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Total` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `Id` int(11) NOT NULL,
  `Commande_id` int(11) NOT NULL,
  `Produit_Id` int(11) NOT NULL,
  `Quantité` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pants`
--

CREATE TABLE `pants` (
  `Id` int(11) NOT NULL,
  `Size` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Matiere` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Produit_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Description` text COLLATE utf8mb4_bin NOT NULL,
  `Couleur` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Prix` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Categorie` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `shoes`
--

CREATE TABLE `shoes` (
  `Id` int(11) NOT NULL,
  `Size` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Matiere` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Produit_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `tshirt`
--

CREATE TABLE `tshirt` (
  `Id` int(11) NOT NULL,
  `Size` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Matiere` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Produit_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Pwd` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `Adresse` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Role` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_id` (`User_id`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Commande_id` (`Commande_id`),
  ADD KEY `Produit_Id` (`Produit_Id`);

--
-- Index pour la table `pants`
--
ALTER TABLE `pants`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Produit_Id` (`Produit_Id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Produit_Id` (`Produit_Id`);

--
-- Index pour la table `tshirt`
--
ALTER TABLE `tshirt`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Produit_Id` (`Produit_Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pants`
--
ALTER TABLE `pants`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tshirt`
--
ALTER TABLE `tshirt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`Produit_Id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`Commande_id`) REFERENCES `commande` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pants`
--
ALTER TABLE `pants`
  ADD CONSTRAINT `pants_ibfk_1` FOREIGN KEY (`Produit_Id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`Produit_Id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tshirt`
--
ALTER TABLE `tshirt`
  ADD CONSTRAINT `tshirt_ibfk_1` FOREIGN KEY (`Produit_Id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
