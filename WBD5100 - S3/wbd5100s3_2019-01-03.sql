# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.28)
# Datenbank: wbd5100s3
# Erstellt am: 2017-01-12 17:11:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle session_logger
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session_logger`;

CREATE TABLE `session_logger` (
  `session_id` varchar(30) NOT NULL COMMENT 'generierte ID der aktuellen Session',
  `session_open` int(20) NOT NULL COMMENT 'Timestamp, zu der die Session geöffnet wurde',
  `session_user` decimal(50) NOT NULL COMMENT 'Der angemeldete User in der Session',
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL COMMENT 'User-ID als GUID',
  `username` varchar(30) NOT NULL COMMENT 'Username des jeweiligen User',
  `email` varchar(50) NOT NULL COMMENT 'Email- Adresse des User',
  `firstname` varchar(250) NOT NULL COMMENT 'Vorname des jeweiligen User',
  `lastname` longtext NOT NULL COMMENT 'Nachname des jeweiligen User',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `email`, `firstname`, `lastname`)
VALUES
	('15849b90-cca6-445d-b78b-466ebbbbd1be','testuser','testuser@systemtest.de','Albert','User'),
	('b87bd1de-7b5c-46f0-98a4-f9812212ea50','admin','admin@systemtest.de','Hermann','User');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
alter table user add column password varchar(30);
update user set password = 'ABC' where firstname = 'Albert';
update user set password = '123' where firstname = 'Hermann';
