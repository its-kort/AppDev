-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_Id` int(11) NOT NULL,
  `res_Time` time NOT NULL,
  `res_Duration` time NOT NULL,
  `res_Name` varchar(255) NOT NULL,
  `res_PhoneNum` varchar(12) NOT NULL,
  `table_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_Id`, `res_Time`, `res_Duration`, `res_Name`, `res_PhoneNum`, `table_Number`) VALUES
(40, '12:00:00', '00:00:00', 'Allen', '09218452863', 1),
(41, '12:00:00', '20:00:00', 'Allen', '09218452863', 1),
(42, '21:00:00', '04:00:00', 'Allen', '09218452863', 1),
(43, '21:00:00', '01:00:00', 'Allen', '09218452863', 1),
(45, '21:00:00', '22:00:00', 'Allen', '09218452863', 1),
(46, '12:00:00', '22:00:00', 'Allen', '09218452863', 2),
(47, '12:00:00', '16:00:00', 'Allen', '09218452863', 3),
(48, '17:00:00', '18:00:00', 'Allen', '09218452863', 3),
(49, '19:00:00', '21:00:00', 'Allen', '09218452863', 3),
(50, '19:00:00', '21:00:00', 'Allen', '09218452863', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
