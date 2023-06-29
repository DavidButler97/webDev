-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 08:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `UserInfoID` int(11) NOT NULL,
  `Address_Line_1` varchar(255) NOT NULL,
  `Address_Line_2` varchar(255) NOT NULL,
  `Town` varchar(255) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Eircode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`UserInfoID`, `Address_Line_1`, `Address_Line_2`, `Town`, `County`, `Eircode`) VALUES
(8, '23456789', '12345678', '12345678', '2345678', '12345678'),
(11, 'dds', 'dds', 'dds', 'dds', 'dds'),
(12, 'asdasd', 'asdasd', 'dsasd', 'asdasd', 'dasdas'),
(13, 'asdasd', 'asdasd', 'asdasd', 'sdasadsd', 'asaddsa'),
(15, '5 arklow view', 'ennis', 'dublin', 'dublin', 'eirret5'),
(16, '5 moonntow ave', 'crevice park', 'dublin', 'dublin', 'yrue332'),
(17, '5 hilbert avenue', 'hilbert lane', 'birthstown', 'dublin', 'ei4440098'),
(18, '5 mort myre bog', 'mortaynia', 'sw', 'mistlania', 'ei57000'),
(19, '1 herbert road', 'herbert avenue', 'alhart', 'misc', 'eieiyt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD KEY `UserInfoID` (`UserInfoID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`UserInfoID`) REFERENCES `userinfo` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
