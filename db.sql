-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 12:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_flutter`
--
DROP DATABASE IF EXISTS `api_flutter`;
CREATE DATABASE IF NOT EXISTS `api_flutter` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `api_flutter`;

-- --------------------------------------------------------

--
-- Table structure for table `lh_contact`
--
-- Creation: Mar 28, 2021 at 07:35 AM
-- Last update: Mar 28, 2021 at 09:52 AM
--

DROP TABLE IF EXISTS `lh_contact`;
CREATE TABLE IF NOT EXISTS `lh_contact` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `phone_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `lh_contact`:
--

--
-- Dumping data for table `lh_contact`
--

INSERT INTO `lh_contact` (`id`, `name`, `email`, `birth_day`, `sex`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'kWN1xSbJtByCrmWsjx4c', 'cbOaPijKs4RrkhBSvopS.600VntQZDuffzIeou0dq@j6R0N4Hc7j.com', '2021-03-28', 0, '0536509084', 'hkGq498jEeL43gIGvIRydGtVZB87W4', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(2, 'YO4simbdng5wVy9TlErz', 'X1acHZt91sWL3HTaDkNy.ztVEZl5k4VScaJbjTl5X@As5d8gfn5s.com', '2021-03-28', 1, '0957438220', 'zBmUWCppXWmWBkntktyuqGcVA7bYqi', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(3, 'W2B9RfCVbcVNqZgiyGos', '2tWEmUqs9tTr9beoJ08D.wGhHuLXZxIMlfvS52jtS@Axstr78IxU.com', '2021-03-28', 1, '0263855337', '0CsaNTpEElcdicVW4f9XVrtpPw3131', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(4, '8zctEjK9Ay2ecTdyY62i', 'uvy48lvimQKGgMFQcJIq.rKZr8ZMCOUU71gZ4AMO3@B4nztrykga.com', '2021-03-28', 1, '0121792516', 'XE7dKgvdHIa99PtEMcq0weqckByVgn', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(5, 'k2L9eSQSt8nW5IoJKNAC', 'hZwSSHaV4iGlXXeZN4Tc.iUeoDYUsUGnVvdJMQ6ly@qmfDQHOpGm.com', '2021-03-28', 1, '0621430529', 'TFGTzgI4tEDkQ7MqhKQG6rzbYQ1vGE', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(6, 'jd3oEbnzz5OcrbkaLbDh', 'G8Cq5jNs6SGBhKqjzshs.BXTuCWeRrnWv5FlvMZqu@sjfbDAtB6O.com', '2021-03-28', 1, '0627574682', 'PcCgjsFDsS4I1rs9NyRJh5dBOhYcfn', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(7, 'XupEVABeMoMbhNtpompr', 'UKIbz5d1ule5GZsetH8c.sDNFEqiGRaAG5hbfXITR@zHs1dXzIDY.com', '2021-03-28', 0, '0615624179', 'L49O12XvovEu7i0gWwpXbHOgUlQSnG', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(8, 'I30a9jcp1JhBi1nFlcca', '8lzs8VHojOvmLjwE7OdA.s1Cbg8xS9FMK7pciB1m2@H0CvWJQ8jz.com', '2021-03-28', 0, '0846775527', 'X86xxzXUUoTfFr8htW1EDYnakywBI1', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(9, '1o9po7HWtx3poZftD4Ov', 'yfHJPZmEn0zNz8Y1I8Js.Do0gxjkRO6SahURvhJ5I@gRsPhozCL2.com', '2021-03-28', 0, '0867306146', 'fkOSzwTg9LigFuxh54KrMwWotdgiko', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(10, 'neffbpQT9CZoyRiy8JfX', 'SqrH7qgEQR5WtvCDZxGO.KUlN2SDx9N8jeYNZWMqb@gDzGY9upZW.com', '2021-03-28', 0, '0556724355', 'xnWKmAV9ewYvG9VGea6Qo52sGfbX4G', '2021-03-28 07:35:28', '0000-00-00 00:00:00'),
(13, 'adaaa453543', 'fafaf@fsf.vn', '2020-11-10', 0, '3432424424', 'fa', '2021-03-28 09:25:15', '2021-03-28 09:51:38'),
(15, 'adaaa', 'fafaf@fsf.vn', '2020-10-10', 1, '3432424424', 'fa', '2021-03-28 09:36:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lh_migrations`
--
-- Creation: Mar 28, 2021 at 07:35 AM
-- Last update: Mar 28, 2021 at 07:35 AM
--

DROP TABLE IF EXISTS `lh_migrations`;
CREATE TABLE IF NOT EXISTS `lh_migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `lh_migrations`:
--

--
-- Dumping data for table `lh_migrations`
--

INSERT INTO `lh_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_28_064317_contact', 1);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
