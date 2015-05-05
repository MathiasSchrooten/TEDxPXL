-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 04 mei 2015 om 14:24
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `tedxpxl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`CategorieId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`CategorieId`, `Name`) VALUES
(1, 'Test categorie 1'),
(2, 'Test categorie 2'),
(3, 'Test categorie 3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`CommentId` int(11) NOT NULL,
  `Text` varchar(250) NOT NULL,
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`EventId` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `UserId` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`EventId`, `Title`, `Description`, `Date`, `Time`, `UserId`, `Image`) VALUES
(1, 'Test', 'Test omschrijving', '2015-04-22', '12:00:00', 1, 'p8.jpg'),
(2, 'Test2', 'Dit is een extra lange omschrijving om te testen hoe dit er uit ziet op de website, hopelijk gaat het er goed uit zien!', '2015-04-23', '12:22:00', 1, 'p6.jpg'),
(3, 'Test3', 'Test omschrijving3', '2015-04-24', '12:40:00', 1, 'p1.jpg'),
(4, 'Test4', 'Test omschrijving4', '2015-04-14', '06:40:00', 1, 'p7.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`PostId` int(11) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CategorieId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`PostId`, `Description`, `Title`, `UserId`, `CategorieId`) VALUES
(1, 'Dit is wel een vette site zeg!', 'Vette site!', 1, 1),
(2, 'Wat een stomme site...', 'Stomme site!', 1, 2),
(3, 'sgfsg', 'Test titel', 1, 2),
(4, '12314254', 'Test', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserId` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL,
  `Picture` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Email`, `Firstname`, `Lastname`, `Role`, `Picture`) VALUES
(1, 'StephanB', '123', 'stephanbisschop@hotmail.com', 'Stephan', 'Bisschop', 2, 'test.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`CategorieId`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`CommentId`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`EventId`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`PostId`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
MODIFY `CategorieId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
