-- Adminer 4.8.1 MySQL 8.0.27 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `house_architecture`;
CREATE TABLE `house_architecture` (
  `House_id` int NOT NULL AUTO_INCREMENT,
  `Facilities` varchar(40) NOT NULL,
  `Area` varchar(40) NOT NULL,
  `Price` varchar(40) NOT NULL,
  `BuildedMaterial` varchar(40) NOT NULL,
  `CeilingMaterial` varchar(40) NOT NULL,
  `WaterFacility` varchar(40) NOT NULL,
  `HouseAddress` varchar(40) NOT NULL,
  `RentorSell` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  PRIMARY KEY (`House_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `house_id`;
CREATE TABLE `house_id` (
  `id` int NOT NULL AUTO_INCREMENT,
  `House_id` varchar(80) NOT NULL,
  `RentorSell` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_id` varchar(40) NOT NULL,
  `pic1` varchar(80) NOT NULL,
  `pic2` varchar(80) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pic2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `rent_houses`;
CREATE TABLE `rent_houses` (
  `House_id` varchar(80) NOT NULL,
  `image_id` varchar(40) NOT NULL,
  `Facilities` varchar(40) NOT NULL,
  `Area` varchar(40) NOT NULL,
  `Price` varchar(40) NOT NULL,
  `District` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `WaterFacility` varchar(40) NOT NULL,
  `HouseAddress` varchar(40) NOT NULL,
  `RentorSell` varchar(40) NOT NULL,
  `Contact` varchar(40) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`House_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `sell_houses`;
CREATE TABLE `sell_houses` (
  `House_id` varchar(80) NOT NULL,
  `image_id` varchar(40) NOT NULL,
  `Facilities` varchar(40) NOT NULL,
  `Area` varchar(40) NOT NULL,
  `Price` varchar(40) NOT NULL,
  `District` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL,
  `WaterFacility` varchar(40) NOT NULL,
  `HouseAddress` varchar(40) NOT NULL,
  `RentorSell` varchar(40) NOT NULL,
  `Contact` varchar(40) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`House_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `token` varchar(80) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `signup`;
CREATE TABLE `signup` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2022-07-05 04:58:20
