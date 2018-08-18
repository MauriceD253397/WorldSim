-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 aug 2018 om 12:27
-- Serverversie: 10.1.34-MariaDB
-- PHP-versie: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `world_domination`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_highscores`
--

CREATE TABLE `tbl_highscores` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_highscores`
--

INSERT INTO `tbl_highscores` (`id`, `score`, `name`) VALUES
(1, 10, 'name10'),
(2, 9, 'name9'),
(3, 10, 'name10'),
(4, 9, 'name9'),
(5, 10, 'name10'),
(6, 9, 'name9');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_highscores`
--
ALTER TABLE `tbl_highscores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_highscores`
--
ALTER TABLE `tbl_highscores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
