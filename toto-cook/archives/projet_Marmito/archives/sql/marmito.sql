--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `cli_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(200) NOT NULL,
  `cli_prenom` varchar(200) NOT NULL,
  `cli_genre` enum('0','1') NOT NULL DEFAULT '0',
  `cli_email` varchar(100) NOT NULL,
  `cli_adresse` varchar(255) NOT NULL,
  `cli_cp` varchar(5) NOT NULL,
  `cli_ville` varchar(100) NOT NULL,
  `cli_tel` varchar(15) NOT NULL,
  `cli_mdp` varchar(32) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`cli_id`, `cli_nom`, `cli_prenom`, `cli_genre`, `cli_email`, `cli_adresse`, `cli_cp`, `cli_ville`, `cli_tel`, `cli_mdp`) VALUES
(1, 'Min', 'Ad', '0', 'test@test.fr', 'rue des Admins', '31000', 'Toulouse', '01.02.03.0', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `cmd`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `cmd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cmd_date` date NOT NULL,
  `cmd_cli_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cmd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `detail_cmd`
--

CREATE TABLE IF NOT EXISTS `details` (
  `det_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `det_cmd_id` int(10) unsigned NOT NULL,
  `det_pla_id` int(10) unsigned NOT NULL,
  `det_date` date NOT NULL,
  PRIMARY KEY (`det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `ing_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ing_pla_id` int(10) unsigned NOT NULL,
  `ing_descr` varchar(255) NOT NULL,
  PRIMARY KEY (`ing_id`),
  KEY `ing_pla_id` (`ing_pla_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `ing_pla_id`, `ing_descr`) VALUES
(1, 1, '1 barquette de St Môret de 150g'),
(2, 1, '4 bagels au sésame'),
(3, 1, '400 g de bar cru'),
(4, 1, '1 concombre épluché'),
(5, 1, '4 tomates moyennes'),
(6, 1, 'quelques feuilles de salades de couleurs'),
(7, 1, 'cerfeuil'),
(8, 1, 'ciboulette'),
(9, 1, 'graines de moutarde'),
(10, 1, 'graines de coriandre'),
(11, 1, '½ jus de citron'),
(12, 1, '1c. à café d''huile d''olive'),
(13, 1, 'sel et poivre'),
(14, 2, '200 g de farine'),
(15, 2, '½ sachet de levure'),
(16, 2, '2 œufs'),
(17, 2, '50 g de beurre'),
(18, 1, '15 cl de lait'),
(19, 2, '2 tranches de viande des Grisons très fines'),
(20, 2, '12 rosettes de Tête de Moine AOP'),
(21, 2, 'sel'),
(22, 2, '200 g de sucre glace'),
(23, 2, '1 cuil. à soupe de blanc d''œuf'),
(24, 2, '1 cuil. à soupe de jus de betterave'),
(25, 3, '12 œufs'),
(26, 3, '150 g de gruyère râpé'),
(27, 3, '3 tranches de jambon blanc'),
(28, 3, '25 cl de crême liquide'),
(29, 3, '20 g de beurre'),
(30, 3, 'sel, poivre'),
(31, 4, '300 g de pâte brisée'),
(32, 4, '2 tranches de jambon cru'),
(33, 4, '40 g de fromage de cantal'),
(34, 4, '40 g de fourme d''ambert'),
(35, 4, '3 œufs'),
(36, 4, '30 g de beurre'),
(37, 4, '250 g de crême fraiche'),
(38, 4, 'sel, poivre et muscade râpée'),
(39, 5, '1 rouleau de pâte brisée'),
(40, 5, '1 botte d''asperges vertes'),
(41, 5, '3 œufs'),
(42, 5, '20 cl de crême fraiche'),
(43, 5, '10 cl de lait'),
(44, 5, '100 g de gruyère râpé'),
(45, 5, '3 oignons nouveaux'),
(46, 5, 'sel, poivre');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE IF NOT EXISTS `plats` (
  `pla_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pla_titre` varchar(255) NOT NULL,
  `pla_descr` text NOT NULL,
  `pla_prix` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`pla_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `plats`
--

INSERT INTO `plats` (`pla_id`, `pla_titre`, `pla_descr`, `pla_prix`) VALUES
(1, 'Bagel au St Môret et bar mariné', 'C''est le sandwich qui monte dans le snacking branché. En forme d''anneau, il se déguste souvent garni de fromage frais, de saumon fumé et de quelques légumes et herbes... Voici la version Marmito !', 49),
(2, 'Cupcakes à la tête de moine', 'Les fromages ont une vie en dehors du plateau. Dans les plats salés on connait, mais dans des gâteaux... c''est pas banal. Grâce à Marmito, découvrez l''alliance inédite du fromage et de la pâtisserie.', 52),
(3, 'Omelette au jambon', 'Un grand classique revisité façon Tony. Vous allez vous régaler.', 39),
(4, 'La quiche auvergnate', 'Si vous voulez satisfaire les appétits les plus voraces, lancez-vous sans hésiter dans cette recette. Marmito vous conseille un accompagnement de salade verte ou quelques tomates en morceaux. Simple et efficace.', 45),
(5, 'La quiche aux asperges', 'Une jolie tarte toute verte et originale qui saura ravir vos invités.', 65);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `cle_ingredient` FOREIGN KEY (`ing_pla_id`) REFERENCES `plats` (`pla_id`);
