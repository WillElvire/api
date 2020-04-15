drop database if exists alertCorona;

create database if not exists alertCorona;

use alertCorona;


-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 15 avr. 2020 à 20:54
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alertCorona`
--

-- --------------------------------------------------------

--
-- Structure de la table `echange_usagers`
--

CREATE TABLE `echange_usagers` (
  `usagers` text NOT NULL,
  `date` datetime NOT NULL,
  `lieu` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `numero_equipement` int(11) NOT NULL,
  `nom_equipement` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne_infectée`
--

CREATE TABLE `personne_infectée` (
  `id_personne_infecté` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `genre` char(1) NOT NULL,
  `lieu_habitation` text NOT NULL,
  `numero_de_telephone` varchar(15) NOT NULL,
  `fonction` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `id_usager` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `genre` char(1) NOT NULL,
  `lieu_habitation` text NOT NULL,
  `numero_de_telephone` varchar(15) NOT NULL,
  `fonction` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usager_personneInfectée`
--

CREATE TABLE `usager_personneInfectée` (
  `id_rencontre` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `lieu` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`numero_equipement`),
  ADD KEY `fk_id_usager` (`id_utilisateur`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD KEY `fk_id_usagerlocalisation` (`id_utilisateur`);

--
-- Index pour la table `personne_infectée`
--
ALTER TABLE `personne_infectée`
  ADD PRIMARY KEY (`id_personne_infecté`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`id_usager`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `numero_equipement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne_infectée`
--
ALTER TABLE `personne_infectée`
  MODIFY `id_personne_infecté` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
  MODIFY `id_usager` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD CONSTRAINT `fk_id_usager` FOREIGN KEY (`id_utilisateur`) REFERENCES `usager` (`id_usager`);

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `fk_id_usagerlocalisation` FOREIGN KEY (`id_utilisateur`) REFERENCES `usager` (`id_usager`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

