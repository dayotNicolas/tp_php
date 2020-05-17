-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 17 mai 2020 à 14:10
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `getjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id_candidat` int(11) NOT NULL,
  `id_manager` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `id_manager`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(1, 1, 'Dayot', 'nicolas', 'nicolas.dayot@ynov.com', 'Wpxocivubyn1'),
(7, 1, 'John', 'Dreyfus', 'j.dreyfus@gmail.com', 'motdepasses'),
(8, 1, 'max', 'payne', 'm.p@gmail.com', 'mp'),
(9, 1, 'Michel', 'Poireaux', 'M.poireaux@gmail.com', 'michelle'),
(10, 1, 'Poireaux', 'Jackie', 'J.p@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `id_CV` int(11) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `diplomes` varchar(100) DEFAULT NULL,
  `emploi_precedent` varchar(200) DEFAULT NULL,
  `permis` varchar(10) NOT NULL,
  `competences` varchar(150) DEFAULT NULL,
  `loisirs` varchar(150) DEFAULT NULL,
  `pdf_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`id_CV`, `id_candidat`, `diplomes`, `emploi_precedent`, `permis`, `competences`, `loisirs`, `pdf_path`) VALUES
(10, 8, 'bbbbbb', 'bbbbbbb', 'bbbbb', 'bbbbbb', 'bbbbb', NULL),
(11, 1, 'bac l ', 'menuisier', 'C', 'joyeux', 'musique', 'C:/xampp/htdocs/tp_php/upload/cv_ex.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `id_manager` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `id_manager`, `nom`, `mail`, `mdp`) VALUES
(1, 1, 'bigcorp', 'bigcorp@gmail.com', 'bce');

-- --------------------------------------------------------

--
-- Structure de la table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `manager`
--

INSERT INTO `manager` (`id_manager`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(1, 'Big', 'Boss', 'big.boss@gmmail.com', 'bigboss');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description_offre` varchar(255) NOT NULL,
  `experience` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `id_entreprise`, `titre`, `description_offre`, `experience`) VALUES
(1, 1, 'aegzrhzg', 'aefageagaeg', 'agaega'),
(7, 1, 'encore', 'une offre parce que ', 'c est joli'),
(8, 1, 'un', 'petit', 'changement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_candidat`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_CV`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Index pour la table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `id_CV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `id_manager` FOREIGN KEY (`id_manager`) REFERENCES `manager` (`id_manager`);

--
-- Contraintes pour la table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `id_candidat` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `blabla` FOREIGN KEY (`id_manager`) REFERENCES `manager` (`id_manager`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
