-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 aug 2018 om 13:31
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

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
-- Tabelstructuur voor tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tabelstructuur voor tabel `tbl_savegames`
--

CREATE TABLE `tbl_savegames` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_last_opened` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `population` int(11) NOT NULL DEFAULT 0,
  `mana` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tabelstructuur voor tabel `tbl_population`
--

CREATE TABLE `tbl_population` (
  `game_id` int(11) NOT NULL,
  `civilian_id` int(11) NOT NULL,
  `age` int(11) NOT NULL DEFAULT 0,
  `gender` bit NOT NULL, -- 0 = male  1 = female
  `parent_id_m` int(11),
  `parent_id_f` int(11),
  `strength` int(11) NOT NULL DEFAULT 0,
  `endurance` int(11) NOT NULL DEFAULT 0,
  `charisma` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
