-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 08:55 PM
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
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `Title` varchar(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`ID`, `Title`, `FirstName`, `Surname`, `EmailAddress`, `Mobile`) VALUES
(8, 'mr', '4', '4', 'krabs@krabs', '23456789'),
(11, 'mr', 'dds', 'dds', 'dds@dds', '3456765432345'),
(12, 'mr', 'David', 'Butler', 'df@Df', '098736333'),
(13, 'mr', 'David', 'asdasd', 'asdasd@Asdasd', 'asdasd'),
(15, 'ms', 'mary', 'white', 'mary@white.com', '0876645522'),
(16, 'ms', 'james', 'webb', 'webb@james.ie', '0890003355'),
(17, 'mx', 'brian', 'tallow', 'brallow@php.ie', '0866666660'),
(18, 'mr', 'volde', 'mort', 'DmanVolde@darkarts.org', '97528639'),
(19, 'ms', 'emma', 'hatcher', 'mshatcher@evileye.org', '0000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
