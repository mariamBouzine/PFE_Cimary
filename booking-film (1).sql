-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 12:50
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `booking-film`
--
CREATE DATABASE IF NOT EXISTS `booking-film` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `booking-film`;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `ID_Booking` int(11) NOT NULL,
  `ID_Show` int(11) DEFAULT NULL,
  `ID_User` int(11) DEFAULT NULL,
  `Time_` datetime DEFAULT NULL,
  `total` float DEFAULT NULL,
  `Payement_methode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`ID_Booking`, `ID_Show`, `ID_User`, `Time_`, `total`, `Payement_methode`) VALUES
(1, 2, 4, '2022-06-23 00:00:00', 12, NULL),
(2, 1, 4, '2022-06-23 04:05:40', 80, NULL),
(3, 2, 4, '2022-06-23 04:09:12', 65, NULL),
(4, 10, 4, '2022-06-23 04:27:41', 80, NULL),
(5, 10, 4, '2022-06-23 04:28:03', 80, NULL),
(6, 10, 4, '2022-06-23 08:08:52', 65, NULL),
(7, 10, 4, '2022-06-24 12:50:33', 45, NULL),
(8, 1, 4, '2022-06-24 10:05:49', 80, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

DROP TABLE IF EXISTS `cinema`;
CREATE TABLE `cinema` (
  `ID_Cinema` int(11) NOT NULL,
  `Name_Cinema` varchar(254) DEFAULT NULL,
  `Adress` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cinema`
--

INSERT INTO `cinema` (`ID_Cinema`, `Name_Cinema`, `Adress`) VALUES
(1, 'Cinema RIF', 'Grand Socco'),
(2, 'Cinema Roxy', 'Rue du Moulay, Avenue Sidi Mohamed Ben Abdellah, Tanger'),
(3, 'Megarama Goya', 'Avenue Prince Moulay Abdellah'),
(4, 'Cinema Tariq', 'Rue Moulay Ali Cherif '),
(5, 'Cine Alcazar', 'Rue Italie'),
(6, 'Cinema Megarama ', 'City Mall Tanger');

-- --------------------------------------------------------

--
-- Structure de la table `cinema_hall`
--

DROP TABLE IF EXISTS `cinema_hall`;
CREATE TABLE `cinema_hall` (
  `Id_cinema_Hall` int(11) NOT NULL,
  `ID_Cinema` int(11) DEFAULT NULL,
  `Name_cinema_Hall` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cinema_hall`
--

INSERT INTO `cinema_hall` (`Id_cinema_Hall`, `ID_Cinema`, `Name_cinema_Hall`) VALUES
(1, 1, 'HALL 1'),
(2, 1, 'HALL 2'),
(3, 1, 'HALL 3'),
(4, 2, 'HALL 1'),
(5, 2, 'HALL 2'),
(6, 2, 'HALL 3'),
(7, 2, 'HALL 4'),
(8, 3, 'HALL 1'),
(9, 3, 'HALL 2'),
(10, 3, 'HALL 3'),
(11, 4, 'HALL 1'),
(12, 4, 'HALL 2'),
(13, 4, 'HALL 3'),
(14, 5, 'HALL 1'),
(15, 6, 'HALL 1'),
(16, 6, 'HALL 2'),
(17, 6, 'HALL 3'),
(18, 6, 'HALL 4'),
(19, 6, 'HALL 5');

-- --------------------------------------------------------

--
-- Structure de la table `cinema_hall_seat`
--

DROP TABLE IF EXISTS `cinema_hall_seat`;
CREATE TABLE `cinema_hall_seat` (
  `Id_cinema_Hall` int(11) NOT NULL,
  `ID_cinema_Seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cinema_hall_show`
--

DROP TABLE IF EXISTS `cinema_hall_show`;
CREATE TABLE `cinema_hall_show` (
  `Id_cinema_Hall` int(11) NOT NULL,
  `ID_Show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cinema_hall_show`
--

INSERT INTO `cinema_hall_show` (`Id_cinema_Hall`, `ID_Show`) VALUES
(1, 1),
(1, 10),
(1, 13),
(2, 4),
(3, 1),
(3, 2),
(5, 2),
(6, 4),
(15, 10),
(19, 10);

-- --------------------------------------------------------

--
-- Structure de la table `cinema_seat`
--

DROP TABLE IF EXISTS `cinema_seat`;
CREATE TABLE `cinema_seat` (
  `ID_cinema_Seat` int(11) NOT NULL,
  `ID_Type_Seat` int(11) DEFAULT NULL,
  `Seat_Number` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cinema_seat`
--

INSERT INTO `cinema_seat` (`ID_cinema_Seat`, `ID_Type_Seat`, `Seat_Number`) VALUES
(1, 1, 'A1'),
(2, 1, 'A2'),
(3, 1, 'A3'),
(4, 1, 'A4'),
(5, 1, 'A5'),
(6, 1, 'A6'),
(7, 1, 'A7'),
(8, 1, 'A8'),
(9, 1, 'B1'),
(10, 1, 'B2'),
(11, 1, 'B3'),
(12, 1, 'B4'),
(13, 1, 'B5'),
(14, 1, 'B6'),
(15, 1, 'B7'),
(16, 1, 'B8'),
(17, 1, 'C1'),
(18, 1, 'C2'),
(19, 1, 'C3'),
(20, 1, 'C4'),
(21, 1, 'C5'),
(22, 1, 'C6'),
(23, 1, 'C7'),
(24, 1, 'C8'),
(41, 1, 'D1'),
(42, 1, 'D2'),
(43, 1, 'D3'),
(44, 1, 'D4'),
(45, 1, 'D5'),
(46, 1, 'D6'),
(47, 1, 'D7'),
(48, 1, 'D8'),
(49, 2, 'E1'),
(50, 2, 'E2'),
(51, 2, 'E3'),
(52, 2, 'E4'),
(53, 2, 'E5'),
(54, 2, 'E6'),
(55, 2, 'E7'),
(56, 2, 'E8'),
(57, 2, 'F1'),
(58, 2, 'F2'),
(59, 2, 'F3'),
(60, 2, 'F4'),
(61, 2, 'F5'),
(62, 2, 'F6'),
(63, 2, 'F7'),
(64, 2, 'F8'),
(65, 2, 'G1'),
(66, 2, 'G2'),
(67, 2, 'G3'),
(68, 2, 'G4'),
(69, 2, 'G5'),
(70, 2, 'G6'),
(71, 2, 'G7'),
(72, 2, 'G8'),
(73, 2, 'H1'),
(74, 2, 'H2'),
(75, 2, 'H3'),
(76, 2, 'H4'),
(77, 2, 'H5'),
(78, 2, 'H6'),
(79, 2, 'H7'),
(80, 2, 'H8'),
(81, 3, 'I1'),
(82, 3, 'I2'),
(83, 3, 'I3'),
(84, 3, 'I4'),
(85, 3, 'I5'),
(86, 3, 'I6'),
(87, 3, 'I7'),
(88, 3, 'I8'),
(89, 3, 'J1'),
(90, 3, 'J2'),
(91, 3, 'J3'),
(92, 3, 'J4'),
(93, 3, 'J5'),
(94, 3, 'J6'),
(95, 3, 'J7'),
(96, 3, 'J8'),
(97, 3, 'K1'),
(98, 3, 'K2'),
(99, 3, 'K3'),
(100, 3, 'K4'),
(101, 3, 'K5'),
(102, 3, 'K6'),
(103, 3, 'K7'),
(104, 3, 'K8'),
(105, 3, 'L1'),
(106, 3, 'L2'),
(107, 3, 'L3'),
(108, 3, 'L4'),
(109, 3, 'L5'),
(110, 3, 'L6'),
(111, 3, 'L7'),
(112, 3, 'L8');

-- --------------------------------------------------------

--
-- Structure de la table `cinema_seat_booking`
--

DROP TABLE IF EXISTS `cinema_seat_booking`;
CREATE TABLE `cinema_seat_booking` (
  `ID_Booking` int(11) DEFAULT NULL,
  `ID_cinema_Seat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cinema_seat_booking`
--

INSERT INTO `cinema_seat_booking` (`ID_Booking`, `ID_cinema_Seat`) VALUES
(5, 1),
(6, 49),
(7, 82),
(8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `ID_Genre` int(11) NOT NULL,
  `Name_genre` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_Genre`, `Name_genre`) VALUES
(1, 'comedy'),
(2, 'Fantastic'),
(3, 'Animation'),
(4, 'Action'),
(5, 'Romance'),
(6, 'Adventure'),
(7, 'Drama'),
(8, 'Science  Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `ID_Language` int(11) NOT NULL,
  `Name` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `language`
--

INSERT INTO `language` (`ID_Language`, `Name`) VALUES
(1, 'English'),
(2, 'Korean'),
(3, 'French'),
(4, 'China'),
(5, 'Japan'),
(6, 'Arabic'),
(7, 'Darija');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `ID_Movie` int(11) NOT NULL,
  `ID_Language` int(11) DEFAULT NULL,
  `ID_Genre` int(11) DEFAULT NULL,
  `Title` varchar(254) DEFAULT NULL,
  `Description_` varchar(2000) DEFAULT NULL,
  `Duration` time DEFAULT NULL,
  `Release_date` date DEFAULT NULL,
  `Country` varchar(254) DEFAULT NULL,
  `Image_film` varchar(254) DEFAULT NULL,
  `Image_header` varchar(254) DEFAULT NULL,
  `Video` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`ID_Movie`, `ID_Language`, `ID_Genre`, `Title`, `Description_`, `Duration`, `Release_date`, `Country`, `Image_film`, `Image_header`, `Video`) VALUES
(1, 1, 2, 'Fantastic Beasts: The Secrets of Dumbledore', 'Professor Albus Dumbledore knows the powerful Dark wizard Gellert Grindelwald is moving to seize control of the wizarding world.Unable to stop him alone, he entrusts Magizoologist Newt Scamander to lead an intrepid team of wizards, witches and one brave Muggle baker on a dangerous mission, where they encounter old and new beasts and clash with Grindelwalds growing legion of followers. But with the stakes so high, how long can Dumbledore remain on the sidelines?', '02:23:00', '2022-04-13', 'United States', 'img/film1.png', 'img/film1_header.png', 'https://www.youtube.com/embed/Y9dr2zw-TXQ'),
(2, 7, 1, ' “green card” قرعة دمريكان', 'قصة الفيلم تدور حول شابين لا يفترقان (حبيب) و(لبيب)تجمعهما صداقة متينة، و يوحدهما حلم مشترك هو التطلع إلى حياة أفضللتحقيق حلمهما يقرران المشاركة في قرعة أمريكا ،متعاهدين على شعار \"نهاجر معا أو نبقى معا\"، لكن الحظحالف(لبيب)، بينما يصاب (حبيب) بخيبة أمل كبيرة. أمام هذاالوضع الصعب، يصمم (حبيب) على التشبث بحلمه وركوبالمستحيل ليظل وفيا للعهد و لتحقيق ذلك يقرران خوض العديد من المغامرات المثيرة والكوميدية التي ستقلب حياتهما رأساعلى عقب -----------', '01:30:00', '2022-06-22', 'Morocco', 'img/film2.png', 'img/film2_header.png', 'https://www.youtube.com/embed/hdE7lDrb7mg&t=15s'),
(3, 5, 4, 'Doctor strange in the multiverse of madness', 'Doctor Strange teams up with a mysterious teenage girl from his dreams who can travel across multiverses, to battle multiple threats, including other-universe versions of himself, which threaten to wipe out millions across the multiverse. They seek help from Wanda the Scarlet Witch, Wong and others.', '02:15:00', '2022-06-15', 'United States', 'img/film3.png', 'img/film3_header.png', 'https://www.youtube.com/embed/Rt_UqUm38BI'),
(7, 1, 7, 'Top Gun: Maverick', 'After more than thirty years of service as one of the Navys top aviators, Pete Mitchell is where he belongs, pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him.', '02:11:00', '2022-05-27', 'United States', 'img/film4.JPG', 'img/film4_header.png', 'https://www.youtube.com/embed/giXco2jaZ_4'),
(8, 3, 3, 'Buzz l`éclair', 'After being stranded with his commander and his crew on a hostile planet located 4.2 million light years from Earth, Buzz Lightyear tries to bring everyone home safe and sound. For this, he can count on the support of a group of ambitious young recruits and on his adorable robot cat, Sox. But the arrival of the terrible Zurg and his army of ruthless robots will not make their task any easier, especially since the latter has a very specific plan in mind...', '01:47:00', '2022-06-08', 'États-Unis', 'img/film5.png', 'img/film5_header.png', 'https://www.youtube.com/embed/q41VoF95fmI'),
(9, 2, 4, 'My Name', 'Yoon Ji-woos father dies suddenly. She wants to desperately take revenge on whoever is responsible for her fathers death. Yoon Ji-woo works for drug crime group Dongcheonpa. Choi Moo-jin is the boss of the drug gang. With the help of Choi Moo-jin and to uncover the reason for her fathers death, Yoon Ji-woo joins the police department and becomes a mole for the drug group. Yoon Ji-woo is assigned to work in the drug investigation unit in the police department. Her partner there is Detective Jeon Pil-do.', '02:23:00', '2022-04-13', 'Korea', 'img/film6.jpg', 'img/film6_header.jpg', 'https://www.youtube.com/embed/v_8vL7LO4PI'),
(10, 2, 4, 'My Nmae', 'jgjhdfgjhdgjh', '14:46:00', '2022-06-24', 'Korea', '', 'film6_header.jpg', ',mvnb,mnb');

-- --------------------------------------------------------

--
-- Structure de la table `show_`
--

DROP TABLE IF EXISTS `show_`;
CREATE TABLE `show_` (
  `ID_Show` int(11) NOT NULL,
  `ID_Movie` int(11) DEFAULT NULL,
  `Date_` date DEFAULT NULL,
  `Start_Time` time DEFAULT NULL,
  `End_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `show_`
--

INSERT INTO `show_` (`ID_Show`, `ID_Movie`, `Date_`, `Start_Time`, `End_Time`) VALUES
(1, 1, '2022-06-09', '13:00:00', '15:23:00'),
(2, 2, '2022-06-09', '22:00:00', '23:30:00'),
(3, 3, '2022-06-09', '15:00:00', '17:06:00'),
(4, 1, '2022-06-16', '10:00:00', '12:23:00'),
(5, 2, '2022-06-09', '20:00:00', '21:30:00'),
(6, 3, '2022-06-09', '18:00:00', '20:06:00'),
(10, 7, '2022-06-30', '17:00:00', '17:15:00'),
(11, 7, '2022-06-25', '23:00:00', '12:15:00'),
(12, 7, '2022-06-25', '13:00:00', '14:15:00'),
(13, 7, '2022-06-25', '15:00:00', '16:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_seat`
--

DROP TABLE IF EXISTS `type_seat`;
CREATE TABLE `type_seat` (
  `ID_Type_Seat` int(11) NOT NULL,
  `Type_` varchar(80) DEFAULT NULL,
  `Trif` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_seat`
--

INSERT INTO `type_seat` (`ID_Type_Seat`, `Type_`, `Trif`) VALUES
(1, 'VIP', 80),
(2, 'PREMIUM', 65),
(3, 'ECONOME', 45);

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--

DROP TABLE IF EXISTS `user_`;
CREATE TABLE `user_` (
  `ID_User` int(11) NOT NULL,
  `Full_Name` varchar(254) DEFAULT NULL,
  `Phone` varchar(254) DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  `Password_` varchar(254) DEFAULT NULL,
  `Status_` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`ID_User`, `Full_Name`, `Phone`, `Email`, `Password_`, `Status_`) VALUES
(1, 'Bouzine Mariam', '0610509576', 'mariam@gmail.com', '123', 'Student'),
(2, 'mimi', '06202034563333', 'bouzine.mariam.solicode@gmail.com', '9cafeef08db2dd477098a0293e71f90a', 'JGHJDG'),
(3, 'mimi', '2345555555', 'bouzine.mariam.20@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'JGHJDG'),
(4, 'mariam', '1234567890', 'test@gmail.ma', 'e10adc3949ba59abbe56e057f20f883e', 'dfghjkl');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_Booking`),
  ADD KEY `ID_Show` (`ID_Show`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`ID_Cinema`);

--
-- Index pour la table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD PRIMARY KEY (`Id_cinema_Hall`),
  ADD KEY `ID_Cinema` (`ID_Cinema`);

--
-- Index pour la table `cinema_hall_seat`
--
ALTER TABLE `cinema_hall_seat`
  ADD PRIMARY KEY (`Id_cinema_Hall`,`ID_cinema_Seat`),
  ADD KEY `FK_cinema_Seat_` (`ID_cinema_Seat`);

--
-- Index pour la table `cinema_hall_show`
--
ALTER TABLE `cinema_hall_show`
  ADD PRIMARY KEY (`Id_cinema_Hall`,`ID_Show`),
  ADD KEY `FK_show` (`ID_Show`);

--
-- Index pour la table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD PRIMARY KEY (`ID_cinema_Seat`),
  ADD KEY `ID_Type_Seat` (`ID_Type_Seat`);

--
-- Index pour la table `cinema_seat_booking`
--
ALTER TABLE `cinema_seat_booking`
  ADD KEY `ID_Booking` (`ID_Booking`),
  ADD KEY `ID_cinema_Seat` (`ID_cinema_Seat`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_Genre`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`ID_Language`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID_Movie`),
  ADD KEY `ID_Language` (`ID_Language`),
  ADD KEY `ID_Genre` (`ID_Genre`);

--
-- Index pour la table `show_`
--
ALTER TABLE `show_`
  ADD PRIMARY KEY (`ID_Show`),
  ADD KEY `ID_Movie` (`ID_Movie`);

--
-- Index pour la table `type_seat`
--
ALTER TABLE `type_seat`
  ADD PRIMARY KEY (`ID_Type_Seat`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_Booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `ID_Cinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  MODIFY `Id_cinema_Hall` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  MODIFY `ID_cinema_Seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_Genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `ID_Language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID_Movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `show_`
--
ALTER TABLE `show_`
  MODIFY `ID_Show` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type_seat`
--
ALTER TABLE `type_seat`
  MODIFY `ID_Type_Seat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ID_Show`) REFERENCES `show_` (`ID_Show`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `user_` (`ID_User`);

--
-- Contraintes pour la table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD CONSTRAINT `cinema_hall_ibfk_1` FOREIGN KEY (`ID_Cinema`) REFERENCES `cinema` (`ID_Cinema`);

--
-- Contraintes pour la table `cinema_hall_seat`
--
ALTER TABLE `cinema_hall_seat`
  ADD CONSTRAINT `FK_cinema_Hall` FOREIGN KEY (`Id_cinema_Hall`) REFERENCES `cinema_hall` (`Id_cinema_Hall`),
  ADD CONSTRAINT `FK_cinema_Seat_` FOREIGN KEY (`ID_cinema_Seat`) REFERENCES `cinema_seat` (`ID_cinema_Seat`);

--
-- Contraintes pour la table `cinema_hall_show`
--
ALTER TABLE `cinema_hall_show`
  ADD CONSTRAINT `FK_cinema_Hall_` FOREIGN KEY (`Id_cinema_Hall`) REFERENCES `cinema_hall` (`Id_cinema_Hall`),
  ADD CONSTRAINT `FK_show` FOREIGN KEY (`ID_Show`) REFERENCES `show_` (`ID_Show`);

--
-- Contraintes pour la table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD CONSTRAINT `cinema_seat_ibfk_1` FOREIGN KEY (`ID_Type_Seat`) REFERENCES `type_seat` (`ID_Type_Seat`);

--
-- Contraintes pour la table `cinema_seat_booking`
--
ALTER TABLE `cinema_seat_booking`
  ADD CONSTRAINT `cinema_seat_booking_ibfk_1` FOREIGN KEY (`ID_Booking`) REFERENCES `booking` (`ID_Booking`),
  ADD CONSTRAINT `cinema_seat_booking_ibfk_2` FOREIGN KEY (`ID_cinema_Seat`) REFERENCES `cinema_seat` (`ID_cinema_Seat`);

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`ID_Language`) REFERENCES `language` (`ID_Language`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`ID_Genre`) REFERENCES `genre` (`ID_Genre`);

--
-- Contraintes pour la table `show_`
--
ALTER TABLE `show_`
  ADD CONSTRAINT `show__ibfk_1` FOREIGN KEY (`ID_Movie`) REFERENCES `movie` (`ID_Movie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
