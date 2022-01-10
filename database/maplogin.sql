-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 01:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `maplogin`
--

CREATE TABLE demo.maplogin (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maplogin`
--

INSERT INTO `maplogin` (`id`, `full_name`, `email`, `password`, `token`, `status`, `photo`) VALUES
(112, 'Musab developer', 'musabwebdev@gmail.com', 'bedebb62a1716ada5fa7203f46c02723', '0cb5e63a18e45aadc68a9e894d88618d', 1, '907182248Screenshot 2021-05-17 115128.png'),
(113, 'MAP Agreement Partner 1', 'test@test.com', 'testtest', '534331a36506911a5eb873191820d918', 1, '1928310057Picture1.jpg'),
(114, 'kha', 'kha@kha.com', 'fcd88a44f6c2becd383aad3351736f14', 'b35c22a4427b38d3beaae761071af1b7', 1, '18513308853.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maplogin`
--
ALTER TABLE `maplogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maplogin`
--
ALTER TABLE `maplogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
