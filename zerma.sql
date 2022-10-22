-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 oct. 2022 à 01:25
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zerma`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `booktitle` text DEFAULT NULL,
  `bookauthor` text DEFAULT NULL,
  `bookdescription` text DEFAULT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`booktitle`, `bookauthor`, `bookdescription`, `bookid`) VALUES
('Les Trois Mousquetaires', ' Alexandre Dumas', 'D\'Artagnan se lie d\'amitié avec Athos, Porthos et Aramis, mousquetaires du roi Louis XIII. Ces quatre hommes vont s\'opposer au premier ministre.', 1),
('L\'Étranger', 'Albert Camus', 'Sur une plage algérienne, Meursault a tué un Arabe. À cause du soleil, dira-t-il, parce qu\'il faisait chaud. Comment peut-il être si indifférent ?', 2),
('Les Misérables', 'Victor Hugo', 'Cosette et Marius sont 2 âmes disposées à s\'aimer. Mais Jean Valjean veille, lui, l\'ancien bagnard dont Cosette est devenue la seule raison de vivre.', 3),
('Le Petit Prince', 'Antoine de Saint-Exupéry', 'Le narrateur, un pilote qui est tombé en panne d\'essence dans le Sahara, fait la connaissance d’un prince extraordinaire venant d’une autre planète.', 4),
('Les Liaisons dangereuses', ' Choderlos de Laclos', 'Un duel pervers entre deux nobles manipulateurs et libertins du siècle des lumières qui se jouent de la société pudibonde dans laquelle ils vivent.', 13),
('Antigone', 'Jean Anouilh', 'Après un combat à mort, Le roi décida d\'accorder des funérailles à Étéocle et non à son frère Polynice. Leur sœur, Antigone, dérogera à cette règle.\r\n', 14),
('TEST', 'TEST', 'TEST', 17),
('Les Fourmis', 'Bernard Werber', 'Lorsqu\'il entre dans la cave de la maison léguée par un oncle entomologiste, Jonathan Wells est loin de se douter qu\'il va à la rencontre des fourmis.', 31),
('Le Spleen de Paris', ' Charles Baudelaire', 'Recueil posthume de poèmes en prose de Charles Baudelaire publié en 1869 et établi par Charles Asselineau et Théodore de Banville.', 32),
('HHhH', 'Laurent Binet', 'Derrière ce curieux titre, Laurent Binet revisite l’histoire vraie de l’opération « Anthropoïde ».', 33),
('Stendhal', 'Victor Del Litto', 'Fils de charpentier, Julien Sorel est trop sensible et trop ambitieux pour suivre la carrière familiale dans la scierie d’une petite ville de province', 34);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
