-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 août 2023 à 04:38
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `plateform_streaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_Categorie` int NOT NULL AUTO_INCREMENT,
  `categorie` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_Categorie`, `categorie`) VALUES
(1, 'Action'),
(2, 'Anime'),
(3, 'Humour'),
(4, 'Jeux vidéo'),
(5, 'Horreur'),
(6, 'Sport'),
(7, 'Documentaire'),
(8, 'Podcast'),
(9, 'Vlog'),
(10, 'Cuisine'),
(11, 'Télévision'),
(12, 'Education'),
(13, 'Géographie'),
(14, 'Histoire'),
(15, 'Politique'),
(16, 'Clip');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_video`
--

DROP TABLE IF EXISTS `categorie_video`;
CREATE TABLE IF NOT EXISTS `categorie_video` (
  `ID_Categorie_Video` int NOT NULL AUTO_INCREMENT,
  `ID_Categorie` int NOT NULL,
  `ID_Video` int NOT NULL,
  PRIMARY KEY (`ID_Categorie_Video`),
  KEY `categorie_video_fk0` (`ID_Categorie`),
  KEY `categorie_video_fk1` (`ID_Video`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie_video`
--

INSERT INTO `categorie_video` (`ID_Categorie_Video`, `ID_Categorie`, `ID_Video`) VALUES
(1, 1, 1),
(2, 14, 1),
(3, 2, 2),
(4, 11, 2),
(5, 4, 2),
(6, 3, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 4),
(10, 11, 5),
(11, 5, 6),
(12, 1, 6),
(13, 2, 5),
(14, 7, 6),
(15, 15, 7),
(16, 11, 7),
(17, 10, 8),
(18, 12, 8),
(19, 4, 9),
(20, 16, 9),
(21, 3, 9),
(22, 4, 9),
(23, 10, 10),
(24, 14, 11),
(25, 8, 12),
(26, 16, 12),
(27, 12, 13),
(28, 6, 14),
(29, 11, 15),
(30, 13, 15),
(31, 11, 13),
(32, 9, 14),
(33, 16, 16),
(34, 9, 16),
(35, 16, 17),
(36, 13, 18),
(37, 1, 18),
(38, 2, 19),
(39, 15, 20),
(40, 16, 21),
(42, 12, 21),
(43, 12, 22),
(44, 1, 22),
(45, 7, 23),
(46, 5, 24),
(47, 1, 25),
(48, 13, 25),
(49, 11, 25),
(50, 12, 26),
(51, 1, 26);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID_Commentaire` int NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int NOT NULL,
  `ID_Video` int NOT NULL,
  `Commentaire` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_Commentaire`),
  KEY `commentaire_fk0` (`ID_Utilisateur`),
  KEY `commentaire_fk1` (`ID_Video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `ID_Tag` int NOT NULL AUTO_INCREMENT,
  `tag` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_Tag`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`ID_Tag`, `tag`) VALUES
(1, 'league of legends'),
(2, 'advance wars'),
(3, 'Espagne'),
(4, 'Réunion'),
(5, 'Faker'),
(6, 'Catfish'),
(7, 'Gratin'),
(8, 'Athletisme'),
(9, 'Araignée'),
(10, 'Bairou'),
(11, 'maison'),
(12, 'decoration'),
(13, 'croissant'),
(14, 'crocodyle'),
(15, 'boisson'),
(16, 'japonais'),
(17, 'sushi'),
(18, 'serie');

-- --------------------------------------------------------

--
-- Structure de la table `tag_video`
--

DROP TABLE IF EXISTS `tag_video`;
CREATE TABLE IF NOT EXISTS `tag_video` (
  `ID_Tag_Video` int NOT NULL AUTO_INCREMENT,
  `ID_Tag` int NOT NULL,
  `ID_Video` int NOT NULL,
  PRIMARY KEY (`ID_Tag_Video`),
  KEY `tag_video_fk0` (`ID_Tag`),
  KEY `tag_video_fk1` (`ID_Video`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tag_video`
--

INSERT INTO `tag_video` (`ID_Tag_Video`, `ID_Tag`, `ID_Video`) VALUES
(1, 5, 1),
(2, 1, 1),
(3, 2, 1),
(4, 4, 2),
(5, 17, 2),
(6, 14, 2),
(7, 7, 2),
(8, 18, 2),
(9, 13, 3),
(10, 11, 3),
(11, 3, 3),
(12, 2, 3),
(13, 4, 4),
(14, 16, 4),
(15, 6, 4),
(16, 1, 4),
(17, 8, 5),
(18, 18, 5),
(19, 9, 5),
(20, 6, 5),
(21, 6, 6),
(22, 12, 6),
(23, 10, 6),
(24, 3, 6),
(25, 12, 7),
(26, 5, 7),
(27, 14, 8),
(28, 15, 8),
(29, 2, 8),
(30, 11, 8),
(31, 16, 9),
(32, 1, 9),
(33, 14, 9),
(34, 17, 9),
(35, 4, 10),
(36, 10, 10),
(37, 13, 10),
(38, 15, 10),
(39, 3, 11),
(40, 12, 11),
(41, 6, 11),
(42, 11, 11),
(43, 1, 12),
(44, 17, 12),
(45, 7, 12),
(46, 18, 12),
(47, 3, 13),
(48, 8, 13),
(49, 10, 13),
(50, 16, 14),
(51, 2, 15),
(52, 12, 16),
(53, 7, 17),
(54, 4, 17),
(55, 1, 18),
(56, 15, 18),
(57, 9, 19),
(58, 3, 20),
(59, 13, 20),
(60, 18, 20),
(61, 5, 21),
(62, 12, 22),
(63, 11, 23),
(64, 13, 24),
(65, 8, 25),
(66, 7, 26),
(67, 8, 26),
(68, 3, 26);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_Utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_Utilisateur`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `role`) VALUES
(1, 'Bebou', 'Bebou', 'Bebou', 'directeur@impeldown.com', 'fzefefregaqrgregragregreagrea', 'Abonnee'),
(2, 'Payet', 'Toto', 'Coco', 'tanuki@wanadoo.com', 'tsrhuyomoimoiutiliulut', 'Abonnee'),
(3, 'Zian', 'Chris', 'gok', 'CCthebest@laposte.fr', 'bgfnjukuykufukbfdgf', 'Abonnee'),
(4, 'Bob', 'Bobby', 'Max', 'CCthebest@laposte.fr', 'nghfhg,djkfjtfdfdg', 'Abonnee'),
(5, 'Doug', 'Frippon', 'Sassi', 'donutlover@wanadoo.com', 'klnffpppzqdmqe', 'Abonnee'),
(6, 'Petit dragon', 'Toto', 'rigo', 'tanuki@wanadoo.com', 'fdfqgdqhjsqdyzfyzafukjbshv', 'Abonnee'),
(8, 'Neymar', 'Jean', 'LSPD', 'neymarJean@gmail.com', 'cococoooo', 'Abonnee'),
(9, 'Neymar', 'Jean', 'LSPD', 'neymarJean@gmail.com', 'cococoooo', 'Abonnee'),
(10, 'toto', 'toto', 'toto', 'toto@toto.toto', '$2y$10$vXWHzCZEJZwmYKv5pJW0k.OFw6Mk.5GjdMjw/JyXdRGhLBIqbFS6G', 'Abonnee'),
(11, 'admin', 'admin', 'admin', 'admin@admin.admin', '$2y$10$eH8bD1uXFhWMh/zKg/jJeOzoXg6K2/G2T.CqXpdPRQb0po94UWJBS', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `ID_Video` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(70) NOT NULL,
  `duree` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Utilisateur` int NOT NULL,
  `lien` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_Video`),
  KEY `video_fk0` (`ID_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`ID_Video`, `titre`, `duree`, `description`, `publication`, `ID_Utilisateur`, `lien`) VALUES
(1, 'Advance wars 2', '1min15', 'l,d,nrongniniobobubguerbg\r\ngerogporejgjrepgjrejgkkf\r\ndlsldlslmdpzpzpe\r\nza,,kkebabzbuezabuebzaueza', '2023-08-10 05:41:33', 5, 'video\\Advance Wars 1.mp4'),
(2, 'Afterimage', '1m09', 'liedoofuezuobfmouezu\r\nrigreigoihoregois\r\ndqskdnqndknlsq\r\nsqdksqdkbvv dbxkdvuqs', '2023-08-10 05:41:33', 5, 'video\\Animal Crossing_ New Horizons .mp4'),
(3, 'Animal Crossing_ New Horizons ', '1 min 42', 'ithgohothrghhgopozpop\r\nofoezfjzef eofjoejzofjeojz eofjoejzfoez\r\nezofjozjef ozeofj\r\neofoojnbmmos zodk', '2023-08-10 05:54:30', 1, 'video\\Animal Crossing_ New Horizons .mp4'),
(4, 'ANIMAL WELL', '1m42', 'odeoodejf\r\nzoozooa oodjzajdap oazdozajdjza\r\nifdoizhfieh', '2023-08-10 05:54:30', 6, 'video\\ANIMAL WELL .mp4'),
(5, 'Bayonetta Origins_ Cereza and the Lost Demon', '2min31', 'regreg\r\nreytzytyztytzyzt\r\nytzytzy r\r\nergregregergre rgregre r er\r\nrett', '2023-08-10 06:26:40', 1, 'video\\Bayonetta Origins_ Cereza and the Lost Demon.mp4'),
(6, 'Blasphemous 2', '1min00', 'fdsfsdf ezezfezfez\r\nefezfez ez ze efrezfezr\r\ndefezfezgfrg rghyiiAAS\r\nghyj yuytuppassq', '2023-08-10 06:26:40', 4, 'video\\Blasphemous 2.mp4'),
(7, 'Bomb Rush Cyberfunk', '0min49', 'gregihreohog riehghre rugure\r\nreirehoig e\r\nrreoijrpjtier \r\neritjirejt', '2023-08-10 06:39:14', 6, 'video\\Bomb Rush Cyberfunk.mp4'),
(8, 'Brotato', '0min46', 'frfez\r\nezfezfezfrz eizfhezfozef ez\r\nezfez erjginionontr \r\notogppap,isdsd\r\nds^dpfkzinoiu', '2023-08-10 06:39:14', 6, 'video\\Brotato.mp4'),
(9, 'Disney Dreamlight Valley', '1min50', 'dfjkkjgbfrge oreurpaz\r\naziiehnbvhfhdpdus \r\nsihfieizfmoz^mkfugsd\r\nsidihfnfa^zhezazehn', '2023-08-10 06:41:55', 1, 'video\\Disney Dreamlight Valley.mp4'),
(10, 'Fae Farm', '1min38', 'dffoupihzoefez ezfoefjj \r\nzeojpozejrbabbzf\r\nzaiepaizih bdpoapzjjebb\r\naiizhupoqpqdf\r\nvihfo oezrkoquan azegrâzeuf puaz auiugzeeozgo \r\nazehaouzeai', '2023-08-10 06:41:55', 2, 'video\\Fae Farm.mp4'),
(11, 'Fire Emblem Engage', '3min11', 'fgfglrigregreg rooâopo fn\r\nflg,r,gnrgnnrign\r\neoo', '0000-00-00 00:00:00', 6, 'video\\Fire Emblem Engage.mp4'),
(12, 'Fitness Boxing_ Fist of the North Star', '1min18', 'rrgregregr\r\ngrgregregregn ieioezfoiezof zefez\r\nzoefojezfjz\r\nejfezjfpoeojfriggh', '2023-08-10 06:47:58', 10, 'video\\Fitness Boxing_ Fist of the North Star.mp4'),
(13, 'Fortnite Chapter 4 Season 3 WILDS', '1min09', 'ezfezljbbz enfozbeu zpoieofoz\r\nzoejorhj oiuzeoiuoioa\r\nzapiejpzjpeâonfbjuds\r\niziahozeba\r\nqsqposn oeje oezhfizefize', '2023-08-10 06:50:59', 3, 'video\\Fortnite Chapter 4 Season 3 WILDS .mp4'),
(14, 'Have a Nice Death', '1min58', 'eziigrg\r\nzeorjoezjrjze oezjrzejrojze\r\nezojroezja\r\nazpeazenkif\r\nôjjofnznfzjfezh iezfheizfiezfz', '2023-08-10 06:50:59', 1, 'video\\Have a Nice Death.mp4'),
(15, 'Just Dance 2024 Edition', '1min29', 'fezfezkjb oezfoezfouze iezfhezhf\r\nzeiiezhrizhpiapapienapn\r\naozjea deinfinz iezfinezfru', '2023-08-10 06:53:44', 6, 'video\\Just Dance 2024 Edition  .mp4'),
(16, 'Killer Frequency', '1min18', 'knrng\r\nreojoezj oepzjpjezprzierze\r\nerozjreoajr\r\nzaozajeoapc zaojzaje aoizjeizaeja az\r\nzaoe', '2023-08-10 06:53:44', 5, 'video\\Killer Frequency.mp4'),
(17, 'Kirby\'s Return to Dream Land Deluxe', '0min29', 'sgfnefnoez oezuofuezboufez ezfbeuzob ezufbuefbozb uebzfbuoezbfouezbf uzefbez\r\nezifzenib ozioebeozb\r\nzefezrozjjezirezorouezrouapiaz azpjepajzpjezjeja aojzjajzpezaej azojezaje\r\nazjeoazjea', '2023-08-10 06:57:18', 4, 'video\\Kirby\'s Return to Dream Land Deluxe.mp4'),
(18, 'Little Kitty, Big City', '1min16', 'oiuehfir \r\nezihohezgyefkuafacazieiuaz aijr bueruoz \r\nziehirhz poa \r\nahzihbgkugf\r\naouhfmeapie \r\nazeakoe aizjeiareiyrengza a', '2023-08-10 06:57:18', 3, 'video\\Little Kitty, Big City.mp4'),
(19, 'Maquette', '1min18', 'dsfsfefezfhez bzeihze zhehezpi hehzpfez pzab pafb zf iefbzebfzej ^zfhezfjfdbvââ fapahidfz fe eofnpizf zzpfz\r\n zefnezfnezfbzfbgkiz aanooza p', '2023-08-10 07:00:02', 10, 'video\\Maquette.mp4'),
(20, 'Mario Strikers_ Battle League Football _Vague 2 disponible ! (Nintendo', '1min25', 'gregrekbgreou zo ouez bzoeoueozeo z\r\neziehrizie \r\nzerizephria aizehaheha ahzehabgr aia\r\najbebajebzabeaz\r\nazezaeabfbrejz', '2023-08-10 07:00:02', 1, 'video\\Mario Strikers_ Battle League Football _Vague 2 disponible ! (Nintendo Switch).mp4'),
(21, 'Minecraft Trails', '1min52', 'irezfiohzfizefze zeojfezfi jze z\r\nezjzeijfzbburbfi \r\nazaipjeiaizjejfnnbbbbf\r\njjieiff', '2023-08-10 07:02:45', 4, 'video\\Minecraft Trails .mp4'),
(22, 'Mineko’s Night Marketr', '0min44', 'fezjbfebzf zefezbfuz bbea aza\r\nzaieiha azd hazh oiaohoza\r\nzaiheai bfjefezfuefzebfezubfubfaubaf auduzaphifhphp ahzhda dihdpihzanlbgor', '2023-08-10 07:02:45', 5, 'video\\Mineko’s Night Marketr .mp4'),
(23, 'Pikmin 4 — Venture Forth, Brave Explorer! — Nintendo Switch', '1min18', 'fefezpojfepizfezpfôezfvn dbabzi baipzdizan a\r\nzaoejajz a\r\nzaenaznepiaeiaipn nazneizaenipaiphjfbfaibpfazf', '2023-08-10 07:05:56', 5, 'video\\Pikmin 4 Venture Forth, Brave Explorer! Nintendo Switch.mp4'),
(24, 'Pokémon Stadium arrive le 12 avril sur Nintendo Switch', '1min26', 'fzreozhorz ez ezrihzh iaa iahzehazhe iahizeiaozihe ah hizahehaeha aihzeeapobf a jefbzaeb eb^bfa bbfa iaieaizhe oakdnfps^popq bpoqodoiap papzpnkfndobba aoabdakznd apihzihzankjbufbaza apepiazejaz piaheiaebajlbp hapjpjeajzeoab piazepiba ba', '2023-08-10 07:05:56', 3, 'video\\Pokémon Stadium arrive le 12 avril sur Nintendo Switch.mp4'),
(25, 'Rift of the NecroDancer _ Announcement Trailer Nintendo Switch', '0min43', 'lhfioezhi iheihez hzhhiz oheihz o ', '2023-08-10 07:08:07', 5, 'video\\Rift of the NecroDancer _ Announcement Trailer Nintendo Switch.mp4'),
(26, 'The Legend of Zelda_ Tears of the Kingdom Accolades Trailer  Nintendo ', '0min30', 'fezfez ezf ezezrz', '2023-08-10 07:08:07', 4, 'video\\The Legend of Zelda_ Tears of the Kingdom Accolades Trailer  Nintendo Switch.mp4');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_video`
--
ALTER TABLE `categorie_video`
  ADD CONSTRAINT `categorie_video_fk0` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID_Categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorie_video_fk1` FOREIGN KEY (`ID_Video`) REFERENCES `video` (`ID_Video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_fk0` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_fk1` FOREIGN KEY (`ID_Video`) REFERENCES `video` (`ID_Video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tag_video`
--
ALTER TABLE `tag_video`
  ADD CONSTRAINT `tag_video_fk0` FOREIGN KEY (`ID_Tag`) REFERENCES `tag` (`ID_Tag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_video_fk1` FOREIGN KEY (`ID_Video`) REFERENCES `video` (`ID_Video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_fk0` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
