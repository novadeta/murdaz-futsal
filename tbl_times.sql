-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2023 at 04:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `murdaz_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_times`
--

CREATE TABLE `tbl_times` (
  `id_time` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `time` time DEFAULT NULL,
  `purchased_time` time DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `type_price` enum('Normal','Malam','Libur') DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `status_payment` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_times`
--

INSERT INTO `tbl_times` (`id_time`, `id_user`, `date`, `time`, `purchased_time`, `price`, `type_price`, `payment`, `status_payment`) VALUES
(2, 2, '2023-08-04 09:11:35', NULL, '13:00:00', '', 'Normal', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_times`
--
ALTER TABLE `tbl_times`
  ADD PRIMARY KEY (`id_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_times`
--
ALTER TABLE `tbl_times`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
