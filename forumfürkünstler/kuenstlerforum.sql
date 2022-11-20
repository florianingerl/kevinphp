-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2022 at 05:44 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `title`, `text`, `useremail`) VALUES
(4, 'Bassspielen kann Jeder Depp', 'Das ist doch so leicht, dass es jeder kann!\r\n\r\nMan kann natürlich kann!', 'imelflorianingerl@gmail.com'),
(6, 'Gitarre ist leicht', 'Gitarre ist leicht\r\nGitarre ist leicht\r\nGitarre ist leicht', 'imelflorianingerl@gmail.com'),
(7, 'Schlagzeug ist leicht', 'Schlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht\r\nSchlagzeug ist leicht', 'imelflorianingerl@gmail.com'),
(8, 'Klavier', 'Klavier ist einfach.\r\n\r\n\r\nKlavier ist einfach.\r\n\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n\r\nKlavier ist einfach.\r\n', 'imelflorianingerl@gmail.com'),
(9, 'Deine Gitarre günstig', 'Zum Preis 50 Euro', 'imelflorianingerl@gmail.com'),
(10, 'Klavier', 'Ich kann gut spielen!', 'H-Ingerl@gmail.com');

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
  `premessageid` int DEFAULT NULL,
  `postmessageid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `addid`, `fromemail`, `toemail`, `text`, `premessageid`, `postmessageid`) VALUES
(1, 4, 'imelflorianingerl@gmail.com', 'imelflorianingerl@gmail.com', 'Hallo Flori', NULL, NULL),
(2, 10, 'H-Ingerl@gmail.com', 'H-Ingerl@gmail.com', 'Hallo Hermann', NULL, 5),
(3, 10, 'H-Ingerl@gmail.com', 'H-Ingerl@gmail.com', 'Kannst du das wirklich?', NULL, NULL),
(4, 10, 'H-Ingerl@gmail.com', 'H-Ingerl@gmail.com', 'Ja! Das kann cih!            ', 3, NULL),
(5, 10, 'H-Ingerl@gmail.com', 'H-Ingerl@gmail.com', 'Hallo Irgendwer!            ', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `password`) VALUES
('H-Ingerl@gmail.com', 'Hermman', 'Ingerl', '$2y$10$fGbykL1B1Qeb83Na5EgNnuBhW4WthHkbLTmriYe.ZWfMXNLMLm6E6'),
('imelflorianingerl@gmail.com', 'Florian', 'Ingerl', 'ABC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
