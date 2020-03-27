-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 mars 2020 à 15:05
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetut`
--

-- --------------------------------------------------------

--
-- Structure de la table `tictactoe`
--

CREATE TABLE `tictactoe` (
  `id` int(11) NOT NULL,
  `PseudoJ1` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PseudoJ2` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tictactoe`
--

INSERT INTO `tictactoe` (`id`, `PseudoJ1`, `PseudoJ2`, `etat`) VALUES
(1, '1', '2', 2),
(3, '1', '2', 2),
(4, '1', '2', 2),
(5, '1', '2', 2),
(6, '2', '1', 2),
(7, '1', '2', 2),
(8, '2', '1', 2),
(9, '2', '1', 2),
(10, '2', '1', 2),
(11, '2', '1', 2),
(12, '2', '1', 2),
(13, '1', '2', 2),
(14, '2', '1', 2),
(15, '1', '2', 2),
(16, '2', '1', 2),
(17, '2', '1', 2),
(18, '2', '1', 2),
(19, '1', '2', 2),
(20, '1', '2', 2),
(21, '2', '1', 2),
(22, '1', '2', 2),
(23, '2', '1', 2),
(25, '1', '2', 2),
(26, '2', '1', 2),
(27, '2', '1', 2),
(28, '1', '2', 2),
(29, '1', '2', 2),
(30, '1', '2', 2),
(32, '2', '1', 2),
(33, '2', '1', 2),
(34, '2', '1', 2),
(37, '3', '1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Pseudo` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Level` int(64) NOT NULL DEFAULT 0,
  `ukey` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image/avatar/avatar1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Pseudo`, `Password`, `Level`, `ukey`, `Avatar`) VALUES
(1, 'test', 'jhhLuf0DfajXk', 0, 'zTFMSrsobAvB0RzJ36oOAXZU4dqlDplj', 'image/avatar/avatar8.png'),
(3, 'user', 'jhs3r3DOClheo', 0, 'Lg5LuLsNZuVZpxqvh1K1WklEJnUGgiZB', 'image/avatar/avatar1.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tictactoe`
--
ALTER TABLE `tictactoe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tictactoe`
--
ALTER TABLE `tictactoe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
