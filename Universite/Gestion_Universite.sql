-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 02 Juillet 2019 à 12:15
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Gestion_Universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `BATIMENT`
--

CREATE TABLE `BATIMENT` (
  `id_batiment` int(11) NOT NULL,
  `num_batiment` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `BATIMENT`
--

INSERT INTO `BATIMENT` (`id_batiment`, `num_batiment`) VALUES
(1, 'b1');

-- --------------------------------------------------------

--
-- Structure de la table `BOURSIER`
--

CREATE TABLE `BOURSIER` (
  `id_boursier` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `BOURSIER`
--

INSERT INTO `BOURSIER` (`id_boursier`, `id_etudiant`, `id_type`) VALUES
(1, 9, 1),
(2, 12, 1),
(3, 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `CHAMBRE`
--

CREATE TABLE `CHAMBRE` (
  `id_chambre` int(11) NOT NULL,
  `num_chambre` varchar(11) NOT NULL,
  `id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CHAMBRE`
--

INSERT INTO `CHAMBRE` (`id_chambre`, `num_chambre`, `id_batiment`) VALUES
(1, 'a1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ETUDIANT`
--

CREATE TABLE `ETUDIANT` (
  `id_etudiant` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(20) NOT NULL,
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ETUDIANT`
--

INSERT INTO `ETUDIANT` (`id_etudiant`, `matricule`, `nom`, `prenom`, `email`, `tel`, `date_de_naissance`) VALUES
(1, 'dms777', 'Sow', 'Djiby', 'sowdjiby@gmail.com', 775214789, '1986-12-26'),
(3, 'bbd111', 'Diallo', 'Binetou', 'bebe@gmail.com', 775410032, '2019-05-27'),
(5, 'derv', 'Ndiaye', 'Ndioufa', 'ndioufa@gmail.com', 765214789, '2019-06-01'),
(7, 'vbb', 'Ndiong', 'Lene', 'lanabienne@gmail.com', 774100114, '2019-06-06'),
(9, 'bbv', 'Ndiaye Seck', 'Kadidiatou', 'dija@gmail.com', 778188425, '2019-06-07'),
(11, 'nene001', 'Ndiaye', 'Kadidiatou', 'seck@gmail.com', 774103258, '2019-05-31'),
(12, 'qssw', 'Sow', 'Kadidiatou', 'khadija@gmail.com', 774562100, '2019-06-01'),
(14, 'qss', 'Gueye', 'Bassirou', 'bassman@gmail.com', 774562002, '2019-06-01'),
(15, 'dmd854', 'Gaye', 'Diaga', 'bamba@gmail.com', 702148569, '1979-01-08'),
(17, 'jol200', 'Ngom', 'Mariama', 'jolie@gmail.com', 785410010, '1993-03-12'),
(18, 'qaz001', 'Asta', 'Ababacar', 'asta@gmail.com', 701254789, '1960-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `LOGER`
--

CREATE TABLE `LOGER` (
  `id_boursier` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LOGER`
--

INSERT INTO `LOGER` (`id_boursier`, `id_chambre`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `NON_BOURSIER`
--

CREATE TABLE `NON_BOURSIER` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `NON_BOURSIER`
--

INSERT INTO `NON_BOURSIER` (`id`, `id_etudiant`, `adresse`) VALUES
(1, 14, 'keur massar'),
(2, 15, 'esp'),
(3, 17, 'sicap urbam');

-- --------------------------------------------------------

--
-- Structure de la table `Type_bourse`
--

CREATE TABLE `Type_bourse` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Type_bourse`
--

INSERT INTO `Type_bourse` (`id_type`, `libelle`, `montant`) VALUES
(1, 'pension_complete', 40000),
(2, 'demi_pension', 20000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `BATIMENT`
--
ALTER TABLE `BATIMENT`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  ADD PRIMARY KEY (`id_boursier`,`id_etudiant`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batiment` (`id_batiment`);

--
-- Index pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `LOGER`
--
ALTER TABLE `LOGER`
  ADD PRIMARY KEY (`id_boursier`),
  ADD KEY `id_boursier` (`id_boursier`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  ADD PRIMARY KEY (`id`,`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `Type_bourse`
--
ALTER TABLE `Type_bourse`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `BATIMENT`
--
ALTER TABLE `BATIMENT`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  MODIFY `id_boursier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Type_bourse`
--
ALTER TABLE `Type_bourse`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `BOURSIER`
--
ALTER TABLE `BOURSIER`
  ADD CONSTRAINT `BOURSIER_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `ETUDIANT` (`id_etudiant`),
  ADD CONSTRAINT `BOURSIER_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `Type_bourse` (`id_type`);

--
-- Contraintes pour la table `CHAMBRE`
--
ALTER TABLE `CHAMBRE`
  ADD CONSTRAINT `CHAMBRE_ibfk_1` FOREIGN KEY (`id_batiment`) REFERENCES `BATIMENT` (`id_batiment`);

--
-- Contraintes pour la table `LOGER`
--
ALTER TABLE `LOGER`
  ADD CONSTRAINT `LOGER_ibfk_1` FOREIGN KEY (`id_chambre`) REFERENCES `CHAMBRE` (`id_chambre`),
  ADD CONSTRAINT `LOGER_ibfk_2` FOREIGN KEY (`id_boursier`) REFERENCES `BOURSIER` (`id_boursier`);

--
-- Contraintes pour la table `NON_BOURSIER`
--
ALTER TABLE `NON_BOURSIER`
  ADD CONSTRAINT `NON_BOURSIER_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `ETUDIANT` (`id_etudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
