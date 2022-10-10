-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2022 at 02:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_photo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `is_active` int NOT NULL,
  `create_time` int NOT NULL,
  `update_time` int NOT NULL,
  `create_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `description`, `photo`, `is_active`, `create_time`, `update_time`, `create_by`) VALUES
(179, 'Food 1', 'Through careful choice of words and phrasing, makes it seem real. Descriptive writing is vivid, colorful, and detailed.', '38727f69909d54ed6d94479adc40f644f35e79cd2232bb9e8280521cc14ea470c96ca5.png', 1, 1665369026, 1665369026, 1),
(180, 'Food 2', 'Her eyes were brighter than the sapphires in the armrests of the Tipu Sultan’s golden throne, yet sharper than the tulwars of his cruelest executioners', 'ecfcda43a965ed71600069d830e48a71f7ffb7422415ee470c0fcbd134033c38df5cff.png', 1, 1665369057, 1665369057, 1),
(181, 'Drink 1', 'descriptive writing has to offer specifics the reader can envision. Rather than “Her eyes were the color of blue rocks', '57d5fae9840493e2a41add7879beedb4856c81149efe9f0f8579e33e0099e65ff3414a.png', 1, 1665369081, 1665369081, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `id` bigint NOT NULL,
  `title` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `create_by` bigint NOT NULL,
  `create_time` int NOT NULL,
  `update_time` int NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `is_active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint NOT NULL,
  `email` char(100) NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` int NOT NULL,
  `create_time` int NOT NULL,
  `update_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `full_name`, `avatar`, `is_active`, `create_time`, `update_time`) VALUES
(12, 'voduchau01011997@gmail.com', '123', 'Vo Duc Hau', '4928e751.png', 1, 1665304292, 1665304292),
(13, 'voduchau01011997@gmail.com', '$2y$10$VlGp5SlKAHleRIy7hRh5KOn3A6ETD.8R3RXgrcY2.aJEzAirquMQS', 'Vo Duc Hau', 'c7be03f5.png', 1, 1665304633, 1665304633),
(14, 'voduchau01011997@gmail.com', '$2y$10$FFj7OrtCchqR4azHzAKaTOt41ziUnvoOoTOfoOGv0kRaOBh693qwW', 'asd', '2f4fe03d.png', 1, 1665364259, 1665364259),
(15, 'voduchau01011997@gmail.com', '$2y$10$AruNt2pKkK5L9aH5EpWRS.YcG357nkvmTKOpNSXGJTamqeD.M00om', '123', '173f0f6b.png', 1, 1665364305, 1665364305),
(16, 'h002250@cybozu.onmicrosoft.com', '$2y$10$kpOmLqNfK0JllnkWz29nvO9B9QubP8XODig.TsKtsBqLauD85j83e', 'asdasd', 'f3ac63c9.png', 1, 1665364994, 1665364994),
(17, 'h002250@cybozu.onmicrosoft.com', '$2y$10$6ocdt/Ae3LHC8UnQBPWz/OVf2Vv.u/1.JvsxP/ZYxnNMRfWFNZy3K', 'asd', '1665366032f51dc802.png', 1, 1665366032, 1665366032);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
