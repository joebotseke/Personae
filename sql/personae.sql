-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 jan. 2024 à 16:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `personae`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `PersonnageID` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `ImageSrc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`PersonnageID`, `Nom`, `ImageSrc`) VALUES
(29, 'ST', 'https://www.shalomtabernacle.org/wp-content/uploads/2022/07/EGLISE-6-400x250.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `puissance`
--

CREATE TABLE `puissance` (
  `PuissanceID` int(11) NOT NULL,
  `NomPuissance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`PersonnageID`);

--
-- Index pour la table `puissance`
--
ALTER TABLE `puissance`
  ADD PRIMARY KEY (`PuissanceID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `PersonnageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `puissance`
--
ALTER TABLE `puissance`
  MODIFY `PuissanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
