-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2022 at 06:18 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuenstlerforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

DROP TABLE IF EXISTS `adds`;
CREATE TABLE IF NOT EXISTS `adds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `title`, `text`, `useremail`) VALUES
(4, 'Bassspielen kann Jeder Depp', 'Das ist doch so leicht, dass es jeder kann!\r\n\r\nMan kann natürlich kann!', 'imelflorianingerl@gmail.com'),
(6, 'Gitarre ist leicht', 'Gitarre ist leicht\r\nGitarre ist leicht\r\nGitarre ist leicht', 'imelflorianingerl@gmail.com'),
(7, 'Schlagzeug ist leicht', 'Schlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht', 'imelflorianingerl@gmail.com'),
(8, 'Klavier', 'Klavier ist einfach.\r\n\r\n\r\nKlavier ist einfach.\r\n\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n', 'imelflorianingerl@gmail.com'),
(9, 'Deine Gitarre günstig', 'Zum Preis 50 Euro', 'imelflorianingerl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `addid` int NOT NULL,
  `fromemail` varchar(50) NOT NULL,
  `toemail` varchar(50) NOT NULL,
  `text` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `addid`, `fromemail`, `toemail`, `text`) VALUES
(1, 4, 'imelflorianingerl@gmail.com', 'imelflorianingerl@gmail.com', 'Hallo Flori');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `password`) VALUES
('imelflorianingerl@gmail.com', 'Florian', 'Ingerl', 'ABC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
