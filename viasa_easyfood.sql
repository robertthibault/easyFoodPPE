-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 20 mai 2018 à 15:04
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `viasa_easyfood`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IDC` int(2) NOT NULL,
  `IDU` int(5) NOT NULL,
  `DATEC` date DEFAULT NULL,
  `COMMENTAIRECLIENTC` varchar(255) DEFAULT NULL,
  `DATELIVRC` date DEFAULT NULL,
  `MODEREGLEMENTC` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`IDC`, `IDU`, `DATEC`, `COMMENTAIRECLIENTC`, `DATELIVRC`, `MODEREGLEMENTC`) VALUES
(1, 2, '2018-03-13', 'C\'était très bon mais manque un peu de sel', '2018-03-13', 'CB'),
(2, 2, '2018-03-13', NULL, '2018-03-14', 'espece');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `IDP` int(5) NOT NULL,
  `IDC` int(2) NOT NULL,
  `QUANTITE` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`IDP`, `IDC`, `QUANTITE`) VALUES
(1, 1, 2),
(1, 2, 3),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

CREATE TABLE `evaluer` (
  `IDR` int(5) NOT NULL,
  `IDU` int(5) NOT NULL,
  `NOTEQUALITENOURRITURE` decimal(2,1) DEFAULT NULL,
  `NOTERESPECTRECETTE` decimal(2,1) DEFAULT NULL,
  `NOTEESTHETIQUE` decimal(2,1) DEFAULT NULL,
  `NOTECOUT` decimal(2,1) DEFAULT NULL,
  `COMMENTAIRERESTO` varchar(255) DEFAULT NULL,
  `COMMENTAIRERESTOVISIBLE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evaluer`
--

INSERT INTO `evaluer` (`IDR`, `IDU`, `NOTEQUALITENOURRITURE`, `NOTERESPECTRECETTE`, `NOTEESTHETIQUE`, `NOTECOUT`, `COMMENTAIRERESTO`, `COMMENTAIRERESTOVISIBLE`) VALUES
(2, 2, '1.0', '1.0', '1.5', '1.5', 'Je recommande très froidement ce restaurateur\r\nje trouve que c\'est une abomination', 0),
(3, 2, '4.5', '5.0', '3.5', '3.0', 'Dans la globalité tout est bien mais je trouve que les prix ne sont pas justifiés', 0),
(3, 3, '5.0', '5.0', '3.5', '2.5', 'J\'adoooore, c\'est trooop bon. Mais c\'est ultra chère, et le plat est mal présenté...', 1);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `IDP` int(5) NOT NULL,
  `IDR` int(5) NOT NULL,
  `IDT` int(5) NOT NULL,
  `NOMP` varchar(128) DEFAULT NULL,
  `PRIXFOURNISSEURP` decimal(10,2) DEFAULT NULL,
  `PRIXCLIENTP` decimal(10,2) DEFAULT NULL,
  `PLATVISIBLE` tinyint(1) DEFAULT NULL,
  `DESCRIPTIONP` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`IDP`, `IDR`, `IDT`, `NOMP`, `PRIXFOURNISSEURP`, `PRIXCLIENTP`, `PLATVISIBLE`, `DESCRIPTIONP`) VALUES
(1, 3, 4, 'Upper Burger', '15.00', '18.00', 1, 'Petit bout de paradis dans ta bouche'),
(2, 2, 10, 'Macaron Galaxy', '4.00', '5.00', 1, 'Sa saveur est en pleine expansion.'),
(3, 3, 9, 'Spaghettis', '7.30', '9.50', 0, 'Pâtes complètes'),
(4, 1, 4, 'Tennessee Burger', '8.50', '11.90', 0, 'Un authentique burger avec steak haché de boeuf façon bouchère.'),
(5, 1, 3, 'Demi Poulet Kentucky', '10.00', '14.90', 0, 'Tendre et généreux, 450 g de poulet mariné et finement aromatisé.'),
(6, 1, 10, 'Choco coco cake', '5.00', '6.50', 0, 'Un gâteau moelleux au chocolat et à la noix de coco nappé de sauce chocolat.');

-- --------------------------------------------------------

--
-- Structure de la table `resto`
--

CREATE TABLE `resto` (
  `IDR` int(5) NOT NULL,
  `IDU` int(5) NOT NULL,
  `NOMR` varchar(128) DEFAULT NULL,
  `NUMADRR` char(2) DEFAULT NULL,
  `RUEADRR` varchar(128) DEFAULT NULL,
  `CPR` char(5) DEFAULT NULL,
  `VILLER` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `resto`
--

INSERT INTO `resto` (`IDR`, `IDU`, `NOMR`, `NUMADRR`, `RUEADRR`, `CPR`, `VILLER`) VALUES
(1, 4, 'Restaurant Influences', '36', 'Rue Saint-Sernin', '33000', 'Bordeaux'),
(2, 5, 'Le Pavillon des Boulevards', '12', 'Rue Croix-de-Seguey', '33000', 'Bordeaux'),
(3, 6, 'Au Petit Palais', '16', 'Rue Jean Burguet', '33000', 'Bordeaux'),
(4, 7, 'Saïdoune', '35', 'Rue Legendre', '75017', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `type_plat`
--

CREATE TABLE `type_plat` (
  `IDT` int(5) NOT NULL,
  `LIBELLET` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_plat`
--

INSERT INTO `type_plat` (`IDT`, `LIBELLET`) VALUES
(1, 'Vins & boissons'),
(2, 'Poissons & fruits de mer'),
(3, 'Viandes & charcuterie'),
(4, 'Salades & sandwichs'),
(5, 'Fruits & légumes'),
(6, 'Riz & céréales'),
(7, 'Oeufs & produits laitiers'),
(8, 'Confitures, confiseries & chocol'),
(9, 'Pâtes'),
(10, 'Pâtisserie');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDU` int(5) NOT NULL,
  `CIVILITEU` char(5) DEFAULT NULL,
  `NOMU` char(30) DEFAULT NULL,
  `PRENOMU` char(30) DEFAULT NULL,
  `EMAILU` varchar(128) DEFAULT NULL,
  `MOTDEPASSEU` varchar(128) DEFAULT NULL,
  `TYPEU` char(20) DEFAULT NULL,
  `NOTEEASYFOOD` decimal(2,1) DEFAULT NULL,
  `COMMENTAIREEASYFOOD` varchar(255) DEFAULT NULL,
  `COMMENTAIREEASYFOODVISIBLE` tinyint(1) DEFAULT NULL,
  `NUMADRC` char(2) DEFAULT NULL,
  `RUEADRC` varchar(128) DEFAULT NULL,
  `CPR` char(5) DEFAULT NULL,
  `VILLEC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDU`, `CIVILITEU`, `NOMU`, `PRENOMU`, `EMAILU`, `MOTDEPASSEU`, `TYPEU`, `NOTEEASYFOOD`, `COMMENTAIREEASYFOOD`, `COMMENTAIREEASYFOODVISIBLE`, `NUMADRC`, `RUEADRC`, `CPR`, `VILLEC`) VALUES
(1, 'M', 'ROBERT', 'Thibault', 'thibault.robert@gmail.com', 'd269dc6fe35b4cab5cdf6e790f4f6533', 'administrateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'M', 'PERRIN', 'Théo', 'theo.perrin@gmail.com', '7938414aed691e4bf32edcad0d7df0c6', 'client', '1.5', 'Un SCANDALE', 0, '22', 'cours de la marne', '33000', 'Bordeaux'),
(3, 'Mme', 'LEMAIRE', 'Ariane', 'lemaire.ariane@gmail.com', 'd8d7b0944cf2b88336c9afe487329939', 'client', NULL, NULL, NULL, '65', 'rue nelson mandela', '33600', 'Pessac'),
(4, 'M', 'VIAS', 'Alexandre', 'alexandre.vias@hotmail.fr', '3d65fd70d95a4edfe9555d0ebeca2b17', 'restaurateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Mme', 'Sokingu', 'Aleriane', 'aleriane.sokingu@gmail.com', 'b57541937c94bc387df6c8f2bf768852', 'restaurateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'M', 'DESBIEYS', 'Maxime', 'maxime.desbiey@gmail.com', 'b238c13e822536cad3ac57a2280fbf45', 'restaurateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'M', 'CORBU', 'Julien', 'julien.corbu@hotmail.fr', '30d69d863dde81562ce277fbc0a3cf18', 'restaurateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'M', 'BERQUE', 'Justin', 'justin.berque@gmail.com', '53dd9c6005f3cdfc5a69c5c07388016d', 'moderateur', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IDC`),
  ADD KEY `FK_COMMANDE_UTILISATEUR` (`IDU`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`IDP`,`IDC`),
  ADD KEY `FK_CONTENIR_COMMANDE` (`IDC`);

--
-- Index pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD PRIMARY KEY (`IDR`,`IDU`),
  ADD KEY `FK_EVALUER_UTILISATEUR` (`IDU`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`IDP`),
  ADD KEY `FK_PLAT_RESTO` (`IDR`),
  ADD KEY `FK_PLAT_TYPE_PLAT` (`IDT`);

--
-- Index pour la table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`IDR`),
  ADD KEY `FK_RESTO_UTILISATEUR` (`IDU`);

--
-- Index pour la table `type_plat`
--
ALTER TABLE `type_plat`
  ADD PRIMARY KEY (`IDT`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDU`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE_UTILISATEUR` FOREIGN KEY (`IDU`) REFERENCES `utilisateur` (`IDU`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR_COMMANDE` FOREIGN KEY (`IDC`) REFERENCES `commande` (`IDC`),
  ADD CONSTRAINT `FK_CONTENIR_PLAT` FOREIGN KEY (`IDP`) REFERENCES `plat` (`IDP`);

--
-- Contraintes pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `FK_EVALUER_RESTO` FOREIGN KEY (`IDR`) REFERENCES `resto` (`IDR`),
  ADD CONSTRAINT `FK_EVALUER_UTILISATEUR` FOREIGN KEY (`IDU`) REFERENCES `utilisateur` (`IDU`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_PLAT_RESTO` FOREIGN KEY (`IDR`) REFERENCES `resto` (`IDR`),
  ADD CONSTRAINT `FK_PLAT_TYPE_PLAT` FOREIGN KEY (`IDT`) REFERENCES `type_plat` (`IDT`);

--
-- Contraintes pour la table `resto`
--
ALTER TABLE `resto`
  ADD CONSTRAINT `FK_RESTO_UTILISATEUR` FOREIGN KEY (`IDU`) REFERENCES `utilisateur` (`IDU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
