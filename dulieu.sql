-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2024 at 10:11 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

DROP TABLE IF EXISTS `dangky`;
CREATE TABLE IF NOT EXISTS `dangky` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `signup_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `otp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `activate_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `name`, `email`, `password`, `phone`, `signup_time`, `otp`, `activate_code`, `status`) VALUES
(3, 'Võ Thanh Trường Long', 'longvo04100000@gmail.com', '123', '', '0000-00-00 00:00:00', '', '', ''),
(37, 'dadkjmakdja', '123@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '0364964897', '0000-00-00 00:00:00', '', '', ''),
(38, 'ASDASCD', '123@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '0364964897', '0000-00-00 00:00:00', '', '', ''),
(39, 'DLKASDLKA', 'MAMA1@GMAIL.COM', '601f1889667efaebb33b8c12572835da3f027f78', '0364964897', '0000-00-00 00:00:00', '', '', ''),
(40, 'Long Vo', 'longvo041001000@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0364964897', '0000-00-00 00:00:00', '07365', '3fnmo9cd8behai1078l55jgk', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
