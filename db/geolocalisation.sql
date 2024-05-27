-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 mai 2024 à 12:34
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geolocalisation`
--

-- --------------------------------------------------------

--
-- Structure de la table `maintenancier`
--

CREATE TABLE `maintenancier` (
  `id` int(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `structure` varchar(40) NOT NULL,
  `numero` int(10) NOT NULL,
  `longitude` int(15) NOT NULL,
  `lattitude` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maintenancier`
--

INSERT INTO `maintenancier` (`id`, `nom`, `structure`, `numero`, `longitude`, `lattitude`) VALUES
(1, 'LAISSOU', 'Choco', 2147483647, 1234568, 1123455),
(2, 'aurel', 'beto', 2147483647, 41868462, 24818964),
(4, 'Nike', 'audo', 0, 0, 0),
(5, 'oscar', 'Nike', 6395545, 746523, 86531165),
(6, 'Oscar AZAYIMNILI LAISSOU', 'Nike', 95516185, 486831, 48946598),
(7, 'Oscar AZAYIMNILI LAISSOU', 'Nike', 95516185, 486831, 48946598),
(8, 'beto', 'adidas', 95516185, 486831, 48946598),
(9, 'beto', 'adidas', 95516185, 486831, 48946598);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(2, 'AZAYIMNILI LAISSOU', 'Oscar', 'oscarlaissou35@gmail.com', 'Azerty12345@'),
(4, 'beto', 'aurel', 'betoaurel@gmail.com', 'A123456789@'),
(9, 'ANTINALAO', 'Rafael', 'rafael@gmail.com', 'A123456*');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `maintenancier`
--
ALTER TABLE `maintenancier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `maintenancier`
--
ALTER TABLE `maintenancier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
