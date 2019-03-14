-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2019 at 02:52 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `npm` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `study` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `npm`, `name`, `email`, `study`, `photo`) VALUES
(1, '1907051001', 'padli yulian ajah', 'padliyulian@gmail.com', 'system engineering', 'julian.jpg'),
(2, '1907051002', 'iwan saputra', 'iwan@gmail.com', 'multimedia', 'iwan.png'),
(3, '1907051003', 'rudi agus susanto', 'gigabit@gmail.com', 'computer network', 'rudi.png'),
(4, '1907051004', 'lebron  james', 'james@king.com', 'computer science', 'james.png'),
(39, '1907051005', 'kyrie irving', 'irving@duke.com', 'computer AI', '5c7defc7b1bfe.png'),
(40, '1907051006', 'kahwi leonard', 'leonard@hotmail.com', 'computer AI', '5c7defedc2da0.png'),
(41, '1907051007', 'gianist ', 'giant@ymail.com', 'computer AI', '5c7df0106da10.png'),
(42, '1907051008', 'devin booker', 'booker@ymail.com', 'computer AI', '5c7df07b7ac9e.png'),
(43, '1907051009', 'james harden', 'j.harden@ymail.com', 'computer science', '5c7df093c4f14.png'),
(44, '1907051010', 'kevin love', 'love@ymail.com', 'computer AI', '5c7df0b8157bb.png'),
(45, '1907051011', 'stephen curry', 'padliyulian@ymail.com', 'computer science', '5c7df0df173d1.png'),
(46, '1907051012', 'deMarcus cousins', 'padliyulian@ymail.com', 'computer science', '5c7e2fced29ce.png'),
(47, '1907051013', 'ben simons', 'padliyulian@ymail.com', 'computer science', '5c7e2ff447301.png'),
(48, '1907051014', 'derick rose', 'padliyulian@ymail.com', 'computer science', '5c7e300e74c42.png'),
(49, '1907051016', 'luka doncic', 'padliyulian@ymail.com', 'computer science', '5c7e30340f88b.png'),
(50, '1907051019', 'lonzo ball', 'padliyulian@ymail.com', 'computer AI', '5c7e306267297.png');

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
(2, 'julian', 'padliyulian@ymail.com', 'julian', '$2y$10$IHQG7z76.81/77l.2Wk9..LXD0aZRp.GIFUv8VVfcT5zjCrl9BPlK', 4),
(5, 'admin', 'padliyulian@ymail.com', 'admin', '$2y$10$PiXaAJCD5.CjvcYucp645.RbiWq88zMNyUEmjsdwc3Zlec2HohQ9G', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
