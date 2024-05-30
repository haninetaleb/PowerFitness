-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 mai 2024 à 22:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(10) NOT NULL,
  `ClassName` enum('Zumba','Aerobic','Yoga','Tabata','Body Attack') NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `community`
--

CREATE TABLE `community` (
  `Com_id` int(11) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `community`
--

INSERT INTO `community` (`Com_id`, `FullName`, `Email`, `Message`) VALUES
(1, 'taleb hanine', 'haninetaleb2@gmail.com', 'hey'),
(2, 'lefgoum serine', 'serine1@gmail.com', 'i love this commuity'),
(3, 'Chiahi Mounira', 'Mounira@gmail.com', 'this community is the best fr'),
(4, 'imen', 'imy@gmail.com', 'this community is the best fr'),
(5, 'haninetaleb', 'lol@gmail.com', 'loveee'),
(6, 'hanine', 'hanine@gmail.com', 'heyy');

-- --------------------------------------------------------

-- Structure de la table `members`
--

CREATE TABLE `members` (
  `MemberID` int(10) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` int(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`MemberID`, `FullName`, `Email`, `Phone`, `BirthDate`, `Password`) VALUES
(2, 'taleb hanine', 'haninetaleb2@gmail.com', 695847455, '2003-07-21', 'hanine123'),
(3, 'yanis', 'yanis@gmail.com', 582937146, '2008-12-04', 'yanis123'),
(4, 'nedjla', 'nedjla@gmail.com', 699784152, '1994-07-08', 'nedjla123'),
(5, 'hammari amira', 'hammariamira@gmail.com', 695855771, '2003-11-15', 'amira123'),
(20, 'Zennoun Maya', 'zennounmaya@gmail.com', 612457836, '2003-02-11', 'maya123'),
(21, 'maalem salma', 'salma@gmail.com', 582937140, '2008-02-12', 'salma123');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `Product_ref` int(20) NOT NULL,
  `Product_name` varchar(20) NOT NULL,
  `Price` int(4) NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Res_id` int(10) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `ClassName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Res_id`, `FullName`, `Email`, `Date`, `Time`, `ClassName`) VALUES
(1, 'lefgoum serine', 'serine1@gmail.com', '2024-05-30', '17:00:00', 'tabata'),
(2, 'taleb nedjla', 'nedjla1@gmail.com', '2024-05-30', '16:00:00', 'body attack'),
(3, 'hanine', 'hanine1@gmail.com', '2024-05-30', '14:00:00', 'Yoga'),
(4, 'taleb faycel', 'faycel@gmail.com', '2023-02-15', '17:00:00', 'Body Attack');

-- --------------------------------------------------------


--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Index pour la table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`Com_id`);


--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ref`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Res_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `community`
--
ALTER TABLE `community`
  MODIFY `Com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Res_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
