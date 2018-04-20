-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Apr 2018 um 14:49
-- Server-Version: 10.1.31-MariaDB
-- PHP-Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `artdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `private` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`id`, `picture`, `title`, `date`, `creator`, `private`) VALUES
(17, '/SuppArt/uploads/post1.jpg', 'Shroom', '2018-04-20', 'denis.chanmong@gmail.com', NULL),
(18, '/SuppArt/uploads/post2.jpg\r\n', 'flowerpower', '2018-04-20', 'denis.chanmong@gmail.com', NULL),
(19, '/SuppArt/uploads/post3.jpg', 'THISSHIT', '2018-04-20', 'denis.chanmong@gmail.com', NULL),
(20, '/SuppArt/uploads//20.jpg', '12313re2', '2018-04-20', 'sdfaerg.32@gmail.com', 0),
(21, '/SuppArt/uploads//21.jpg', '12313re2', '2018-04-20', 'denis.chanmong@gmail.com', 0),
(22, '/SuppArt/uploads//22.jpg', '123', '2018-04-20', 'denis.chanmong@gmail.com', 0),
(23, '/SuppArt/uploads//23.jpg', 'qerfqwefqwefq24', '2018-04-20', 'denis.chanmong@gmail.com', 1),
(24, '/SuppArt/uploads//24.jpg', '23', '2018-04-20', 'denis.chanmong@gmail.com', 0),
(25, '/SuppArt/uploads//25.jpg', 'thisbitch', '2018-04-20', 'denis.chanmong@gmail.com', 0),
(26, '/SuppArt/uploads//26.jpg', 'dude', '2018-04-20', 'kevin.sfsfrf@gmail.com', 0),
(27, '/SuppArt/uploads//27.jpg', 'water', '2018-04-20', 'denis.chanmong@gmail.com', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
