-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 14. Nov 2022 um 12:31
-- Server-Version: 8.0.28
-- PHP-Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wbd5100s3`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session_logger`
--

DROP TABLE IF EXISTS `session_logger`;
CREATE TABLE IF NOT EXISTS `session_logger` (
  `session_id` varchar(30) NOT NULL COMMENT 'generierte ID der aktuellen Session',
  `session_open` int NOT NULL COMMENT 'Timestamp, zu der die Session geöffnet wurde',
  `session_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `session_logger`
--

INSERT INTO `session_logger` (`session_id`, `session_open`, `session_user`) VALUES
('32db5cc2b10cc19f8c7d1ee19', 1668429069, '15849b90-cca6-445d-b78b-466ebbbbd1be'),
('47db95cfe843e74fc8e627268', 1668427205, 'b87bd1de-7b5c-46f0-98a4-f9812212ea50'),
('5d46fac274cbc6137907ff314', 1668427647, 'b87bd1de-7b5c-46f0-98a4-f9812212ea50'),
('825c49fa19ee4493ee22c37f3', 1668428189, 'b87bd1de-7b5c-46f0-98a4-f9812212ea50'),
('c432434d326a06a57e139b162', 1668428587, '15849b90-cca6-445d-b78b-466ebbbbd1be');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(50) NOT NULL COMMENT 'User-ID als GUID',
  `username` varchar(30) NOT NULL COMMENT 'Username des jeweiligen User',
  `email` varchar(50) NOT NULL COMMENT 'Email- Adresse des User',
  `firstname` varchar(250) NOT NULL COMMENT 'Vorname des jeweiligen User',
  `lastname` longtext NOT NULL COMMENT 'Nachname des jeweiligen User',
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `firstname`, `lastname`, `password`) VALUES
('15849b90-cca6-445d-b78b-466ebbbbd1be', 'testuser', 'testuser@systemtest.de', 'Albert', 'User', 'ABC'),
('b87bd1de-7b5c-46f0-98a4-f9812212ea50', 'admin', 'admin@systemtest.de', 'Hermann', 'User', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
