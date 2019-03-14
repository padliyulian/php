-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2019 at 02:58 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip-record`
--

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `mac` varchar(20) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `device` varchar(50) DEFAULT NULL,
  `info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`id`, `ip`, `mac`, `user`, `division`, `photo`, `device`, `info`) VALUES
(16, '192.168.1.1', '82:51:DC:DA:14:B1', 'padli yulian', 'it', '5c8870f586cea.jpg', 'laptop', 'manager it'),
(17, '192.168.1.2', '82:51:DC:DA:14:B2', 'kyrie irving', 'it', '5c88711d22ee0.png', 'pc', 'staff'),
(18, '192.168.1.3', '82:51:DC:DA:14:B3', 'james harden', 'it', '5c8871a354285.png', 'pc', 'staff'),
(19, '192.168.1.4', '82:51:DC:DA:14:B4', 'kevin durant', 'ui', '5c88722759373.png', 'pc', 'staff'),
(20, '192.168.1.5', '82:51:DC:DA:14:B5', 'lebron james', 'ui', '5c88725b01624.png', 'pc', 'staff'),
(21, '192.168.1.6', '82:51:DC:DA:14:B6', 'lonzo ball', 'ui', '5c887280ed435.png', 'pc', 'staff'),
(22, '192.168.1.7', '82:51:DC:DA:14:B7', 'luka doncic', 'ui', '5c8873ff95500.png', 'pc', 'manager'),
(23, '192.168.1.8', '82:51:DC:DA:14:B8', 'kawhi leonard', 'ux', '5c887438014a5.png', 'pc', 'staff'),
(24, '192.168.1.9', '82:51:DC:DA:14:B9', 'stephen curry', 'ux', '5c887472ae40f.png', 'pc', 'staff'),
(25, '192.168.1.10', '82:51:DC:DA:14:10', 'demarcus cousin', 'ux', '5c88749d88d1d.png', 'pc', 'staff'),
(26, '192.168.1.11', '82:51:DC:DA:14:11', 'ben simons', 'ux', '5c8874c258096.png', 'pc', 'staff'),
(27, '192.168.1.100', '82:51:DC:DA:14:22', 'derick rose', 'front-end', '5c8874ee6cf92.png', 'pc', 'staff'),
(28, '192.168.1.101', '82:51:DC:DA:14:77', 'gianist antetokumpou', 'front-end', '5c88753890843.png', 'pc', 'staff'),
(29, '192.168.1.144', '82:51:DC:DA:14:33', 'kevin love', 'front-end', '5c88757bd017f.png', 'pc', 'manager'),
(30, '192.168.1.88', '82:51:DC:DA:14:BB', 'devin booker', 'front-end', '5c88759cc6e1c.png', 'pc', 'staff'),
(31, '192.168.1.82', '82:51:DC:DA:14:BC', 'rusel westbrook', 'back-end', '5c8875ea9a830.png', 'pc', 'staff'),
(32, '192.168.1.84', '82:51:DC:DA:14:BA', 'eric bledsoe', 'back-end', '5c8876395147a.png', 'pc', 'staff'),
(35, '192.168.1.134', '82:51:DC:DA:14:BE', 'mamba', 'back-end', '5c89b9533eb23.png', 'laptop', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `level`) VALUES
(1, 'padli yulian', 'padliyulian@gmail.com', 'julian', '$2y$10$qnLGufUIBl7SY3LW14yTgu3B8OtRPZ67lW4U667EA/6fUej33x3QG', 1),
(2, 'iwan saputra', 'iwan.it@gmail.com', 'iwang', '$2y$10$xxcTF.VycnWH9OZ91BeW6OLQyJJYLg0vjZD1agSGW4irlU.dqFULe', 1),
(7, 'rudi agus susanto', 'gigabit@gmail.com', 'rudi', '$2y$10$rEoAv3gAwZQ9gyp1TNDiQevCksCDHmVUDnQKq3siXgDHC28J9/FVq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`),
  ADD UNIQUE KEY `mac` (`mac`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
