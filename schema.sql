-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `app`;
CREATE DATABASE `app` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `app`;

DROP TABLE IF EXISTS `fach`;
CREATE TABLE `fach` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(255) NOT NULL,
  `kuerzel` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  CONSTRAINT `fach_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `user` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `lektion`;
CREATE TABLE `lektion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fach` int(11) NOT NULL,
  `lektionsTag` int(11) NOT NULL,
  `lektionsBeginn` datetime NOT NULL,
  `lektionsEnde` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fach` (`fach`),
  CONSTRAINT `lektion_ibfk_1` FOREIGN KEY (`fach`) REFERENCES `fach` (`Id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rolle`;
CREATE TABLE `rolle` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rolleid` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2017-06-24 12:22:08
