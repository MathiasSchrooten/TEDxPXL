-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 18 mei 2015 om 14:51
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`CategorieId`, `Name`) VALUES
(1, 'Human experimentation'),
(2, 'Information technology'),
(3, 'Dark magic'),
(4, 'Game of Thrones');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`CommentId` int(11) NOT NULL,
  `Text` varchar(250) NOT NULL,
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`CommentId`, `Text`, `PostId`, `UserId`) VALUES
(1, 'Test1', 1, 1),
(2, 'test', 1, 1);

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
  `Image` varchar(100) NOT NULL,
  `Place` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`EventId`, `Title`, `Description`, `Date`, `Time`, `UserId`, `Image`, `Place`) VALUES
(1, 'Internationale dag', 'Gratis bier, tequila. Be there', '2015-05-16', '13:00:00', 3, 'p30.jpg', 'khlim+hasselt'),
(2, 'Les wiskunde', 'Dit is de wiskunde les van het jaar! Mevrouw Tans gaat ons alle hoeken van de kamer laten zien!', '2015-04-23', '12:22:00', 1, 'p6.jpg', 'PXL'),
(3, 'Koproltornooi', 'Rol rol rollen maar', '2015-04-24', '12:40:00', 4, 'p1.jpg', 'Amentstraat+11,+Stramproy');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`PostId`, `Description`, `Title`, `UserId`, `CategorieId`) VALUES
(1, 'Dit is wel een vette site zeg!', 'Vette site!', 1, 1),
(2, 'Wat een stomme site...', 'Stomme site!', 1, 2),
(3, 'Herpederp', 'Dit is een titel', 1, 2),
(4, 'The king in the north!', 'Game of thrones is da best', 6, 4),
(5, 'I will kill you all!', 'I Am The Dark Soully', 3, 3);

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
  `Picture` varchar(50) NOT NULL,
  `Signature` varchar(250) NOT NULL,
  `About` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Email`, `Firstname`, `Lastname`, `Role`, `Picture`, `Signature`, `About`) VALUES
(1, 'StephanB', '123', 'stephanbisschop@hotmail.com', 'Stephan', 'Bisschop', 1, 'Profiel.jpg', 'I am a cool guy!', 'I am a programmer'),
(2, 'DylanGomes', '216692', 'dylangomes@live.be', 'Dylan', 'Gomes', 0, '', '', ''),
(3, 'DarkSoully', '123', 'darkstormakadylan@gmail.com', 'Dylan', 'Gomes', 0, '', '', ''),
(4, 'MathiasS', '123', 'mathiass@gmail.com', 'Mathias', 'Schrooten', 0, '', '', '');

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
MODIFY `CategorieId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
