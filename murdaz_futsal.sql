-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2023 at 05:22 AM
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
-- Table structure for table `tbl_fields`
--

CREATE TABLE `tbl_fields` (
  `id_field` int(11) NOT NULL,
  `field_code` text NOT NULL,
  `field_name` varchar(30) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `qrcode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type_price` enum('Pagi','Siang','Libur') DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `status_payment` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id_transaction` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_field` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `date_play` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `payment` text DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` enum('1','2') NOT NULL,
  `token` varchar(30) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `role`, `token`, `status`) VALUES
(1, 'admin', '12345', '1', '', 'Aktif'),
(2, 'ade123', '123', '2', 'Aktif', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  ADD PRIMARY KEY (`id_field`);

--
-- Indexes for table `tbl_times`
--
ALTER TABLE `tbl_times`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  MODIFY `id_field` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_times`
--
ALTER TABLE `tbl_times`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
