-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13. Apr, 2018 17:36 PM
-- Server-versjon: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vm_ski`
--
DROP DATABASE IF EXISTS vm_ski;
CREATE DATABASE vm_ski;
USE vm_ski;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `person`
--

CREATE TABLE `person` (
  `PersonID` int(11) NOT NULL,
  `Brukernavn` varchar(50) NOT NULL,
  `Passord` varchar(200) NOT NULL,
  `Fornavn` varchar(50) NOT NULL,
  `Etternavn` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Postnr` char(4) NOT NULL,
  `Poststed` varchar(50) NOT NULL,
  `Telefonnr` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `person`
--

INSERT INTO `person` (`PersonID`, `Brukernavn`, `Passord`, `Fornavn`, `Etternavn`, `Adresse`, `Postnr`, `Poststed`, `Telefonnr`) VALUES
(19, '', '', 'Cato', 'Akay', 'Granhaugsvingen 19B', '2070', 'Råholt', '99399561'),
(20, '', '', 'Victor', 'Pishva', 'Majorstua', '0252', 'OSLO', '45265896'),
(21, '', '', 'Bjørnar', 'Hoff', 'Bråtastien ', '2074', 'Eidsvoll Verk', '97691932'),
(22, '', '', 'Marius', 'Haugsand', 'Osloveien 54', '0056', 'Oslo', '45878965'),
(23, '', '', 'Jakob', 'Simonsen', 'Osloveien 89', '0056', 'Oslo', '48732896'),
(24, '', '', 'Elias', 'Pederstad', 'Nordstrand', '7845', 'Oslo', '98723546'),
(25, '', '', 'Mathias', 'Holst-Larsen', 'Sersjant Døhlies Veg 5', '2070', 'Råholt', '40019072'),
(27, '', '', 'Elise', 'Skaanes Thomassen', 'Karlstadgata 26', '0505', 'Oslo', '41583854'),
(28, '', '', 'Steffen', 'Bruvik', 'Holbergsplass 52', '0166', 'Oslo', '485965326'),
(29, 'Catoboy', '$2y$10$.bW9St.kQf2vohJwV/ob/eucpkTe4dNnwetIcBl6ZS9Grw3TFZ2U.', 'Cato', 'Akay', 'Granhaugsvingen 19B', '2070', 'Råholt', '99399561'),
(30, 'Admin', '$2y$10$YoHOcv7vStKP9zDXOnwd7uLp5aZVr1bkOF5/iINTyEheq8TZ8kDsK', 'Admin', 'Admin', 'Admin', '0000', 'Admin', '0'),
(31, 'sondre', '$2y$10$Fh5Jc5RV/Q5vOCa/gol3EOexQcbXG4LjIkAv4IkUSOTWKsK9MQC2q', 'sondre', 'morgedal', 'Admin', '0000', '0000', '0'),
(37, '', '', 'Aleksander', 'Helgaker', 'Lindebergåsen', '1068', 'OSLO', '95178828');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `publikum`
--

CREATE TABLE `publikum` (
  `Biletttype` varchar(50) NOT NULL,
  `person_PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `publikum`
--

INSERT INTO `publikum` (`Biletttype`, `person_PersonID`) VALUES
('VIP', 20),
('Diamondbilett', 23),
('VIP', 29);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `utøver`
--

CREATE TABLE `utøver` (
  `Nasjonalitet` varchar(50) NOT NULL,
  `person_PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `utøver`
--

INSERT INTO `utøver` (`Nasjonalitet`, `person_PersonID`) VALUES
('Norsk', 19),
('Norsk', 21),
('Norsk', 22),
('Norsk', 24),
('Norsk', 25),
('Norsk', 27),
('Norsk', 28),
('Norsk', 37);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `øvelse`
--

CREATE TABLE `øvelse` (
  `ØvelseID` int(11) NOT NULL,
  `Dato-Tid` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Sted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `øvelse`
--

INSERT INTO `øvelse` (`ØvelseID`, `Dato-Tid`, `Type`, `Sted`) VALUES
(14, '1 November 2018 12:00', 'Langrenn', 'Norge'),
(15, '1 November 2018 15:00', 'Skihopp', 'Norge'),
(16, '1 November 2018 18:00', 'Slalom', 'Sveits'),
(17, '1 November 2018 20:00', 'Snowboard', 'USA'),
(18, '1 November 2018 23:00', 'Skiskyting', 'Russland'),
(19, '2 November 2018 12:00', 'Skøyter', 'Tyskland'),
(20, '2 November 2018 15:00', 'Twin-Tip', 'USA');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `øvelse_has_person`
--

CREATE TABLE `øvelse_has_person` (
  `øvelse_ØvelseID` int(11) NOT NULL,
  `person_PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `øvelse_has_person`
--

INSERT INTO `øvelse_has_person` (`øvelse_ØvelseID`, `person_PersonID`) VALUES
(14, 23),
(14, 27),
(14, 29),
(14, 37),
(16, 22),
(16, 28),
(17, 19),
(17, 20),
(17, 29),
(20, 21),
(20, 24),
(20, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexes for table `publikum`
--
ALTER TABLE `publikum`
  ADD PRIMARY KEY (`person_PersonID`);

--
-- Indexes for table `utøver`
--
ALTER TABLE `utøver`
  ADD PRIMARY KEY (`person_PersonID`);

--
-- Indexes for table `øvelse`
--
ALTER TABLE `øvelse`
  ADD PRIMARY KEY (`ØvelseID`);

--
-- Indexes for table `øvelse_has_person`
--
ALTER TABLE `øvelse_has_person`
  ADD PRIMARY KEY (`øvelse_ØvelseID`,`person_PersonID`),
  ADD KEY `fk_øvelse_has_person_person1_idx` (`person_PersonID`),
  ADD KEY `fk_øvelse_has_person_øvelse1_idx` (`øvelse_ØvelseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `øvelse`
--
ALTER TABLE `øvelse`
  MODIFY `ØvelseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `publikum`
--
ALTER TABLE `publikum`
  ADD CONSTRAINT `fk_publikum_person` FOREIGN KEY (`person_PersonID`) REFERENCES `person` (`PersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `utøver`
--
ALTER TABLE `utøver`
  ADD CONSTRAINT `fk_utøver_person1` FOREIGN KEY (`person_PersonID`) REFERENCES `person` (`PersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Begrensninger for tabell `øvelse_has_person`
--
ALTER TABLE `øvelse_has_person`
  ADD CONSTRAINT `fk_øvelse_has_person_person1` FOREIGN KEY (`person_PersonID`) REFERENCES `person` (`PersonID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_øvelse_has_person_øvelse1` FOREIGN KEY (`øvelse_ØvelseID`) REFERENCES `øvelse` (`ØvelseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
