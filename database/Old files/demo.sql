-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 05:56 AM
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
-- Creation: Jan 10, 2022 at 01:12 AM
--

CREATE TABLE `maplogin` (
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
(113, 'MAP Agreement Partner 1', 'test1@test.com', 'test1', '534331a36506911a5eb873191820d918', 1, '1928310057Picture1.jpg'),
(114, 'kha', 'kha@kha.com', 'fcd88a44f6c2becd383aad3351736f14', 'b35c22a4427b38d3beaae761071af1b7', 1, '18513308853.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapservice`
--
-- Creation: Jan 16, 2022 at 01:31 PM
--

CREATE TABLE `mapservice` (
  `globalid` int(10) NOT NULL,
  `profileid` int(11) NOT NULL,
  `employeeid` int(10) NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `skilllevel` int(3) NOT NULL,
  `skillset` varchar(1000) NOT NULL,
  `submission_status` int(3) NOT NULL,
  `bid_status` int(3) NOT NULL,
  `agreed_status` int(3) NOT NULL,
  `durationavailablefor` varchar(255) NOT NULL,
  `currentcompany` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `comments` varchar(2000) NOT NULL,
  `profileuploadedon` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `price` int(10) NOT NULL,
  `negotiateprice` int(10) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapservice`
--

INSERT INTO `mapservice` (`globalid`, `profileid`, `employeeid`, `employeename`, `location`, `skilllevel`, `skillset`, `submission_status`, `bid_status`, `agreed_status`, `durationavailablefor`, `currentcompany`, `language`, `comments`, `profileuploadedon`, `price`, `negotiateprice`, `created_by`, `question`, `response`, `feedback`) VALUES
(4847, 113, 0, '', 'sd', 2, 'hh', 5, 0, 1, 'i', 'MAP Agreement Partner 1', '', 'iu', '2022-01-10 17:25:15.645320', 10000, 0, 'Testy Test', 'third', '', ''),
(2204, 114, 0, 'efre', 'er', 1, '3', 4, 0, 1, '', 'MAP Agreement Partner 1', 'ewr', '', '2022-01-11 07:23:58.723135', 849, 849, 'Testy Test', '', '', 'good fella'),
(534239, 115, 9090, 'charu', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 2', 'hhh', '', '2022-01-11 13:11:52.580053', 20000, 0, 'Testy Test', 'second question?', '', ''),
(89, 121, 0, 'geoffrey', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 1', 'game', 'of thrones', '2022-01-14 18:08:21.436134', 32, 0, 'Testy Test', 'Is winter coming?', 'no, tis not', ''),
(8080, 122, 78, 'ere', '', 1, '', 4, 0, 0, '', 'MAP Agreement Partner 1', '', 'multiple profile', '2022-01-14 18:12:23.015145', 12000, 0, '', '', '', ''),
(138986, 123, 78, 'erika', 'hamburg', 1, 'java', 2, 0, 0, '', 'MAP Agreement Partner 1', 'english, deutsch', 'colloborative', '2022-01-16 16:51:29.172166', 650, 0, '', '', '', ''),
(1103, 125, 666, 'olu', '', 0, '', 2, 0, 0, '', 'MAP Agreement Partner 1', '', '', '2022-01-16 19:37:39.089960', 890, 0, 'Testy Test', '', '', ''),
(8080, 126, 9010, 'rahul', 'india', 1, 'html', 2, 0, 0, '', 'MAP Agreement Partner 1', 'telugu', 'who', '2022-01-16 19:55:43.481694', 949, 0, 'Testy Test', '', '', ''),
(8080, 127, 8989, 'j', '', 1, '', 2, 0, 0, '', 'MAP Agreement Partner 1', '', '', '2022-01-16 20:15:18.953134', 947, 0, 'Testy Test', '', '', ''),
(8080, 128, 888, 'h', '', 1, '', 2, 0, 0, '', 'MAP Agreement Partner 1', '', '', '2022-01-16 20:26:16.778082', 851, 0, 'Testy Test', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `map_contracts`
--
-- Creation: Jan 15, 2022 at 06:22 PM
--

CREATE TABLE `map_contracts` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `map_username` varchar(100) DEFAULT NULL,
  `cluster` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `skill_level` int(3) NOT NULL,
  `aggrement_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map_contracts`
--

INSERT INTO `map_contracts` (`id`, `role_name`, `map_username`, `cluster`, `price`, `skill_level`, `aggrement_status`, `created_at`) VALUES
(1, 'software engineer', 'MAP Agreement Partner 1', '1', 950, 1, NULL, '2022-01-15 12:33:28'),
(2, 'marketing', 'MAP Agreement Partner 1', '1', 1050, 1, NULL, '2022-01-15 12:33:28'),
(3, 'Programmer', 'MAP Agreement Partner 1', '1', 850, 2, NULL, '2022-01-15 14:58:16'),
(4, 'Security Expert', 'MAP Agreement Partner 1', '2', 850, 1, NULL, '2022-01-15 14:58:16'),
(5, 'software engineer', 'MAP Agreement Partner 1', '2', 700, 1, NULL, '2022-01-15 12:33:28'),
(6, 'software engineer', 'MAP Agreement Partner 1', '2', 820, 2, NULL, '2022-01-15 12:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
-- Creation: Jan 15, 2022 at 11:38 AM
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL,
  `skill_level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `skill_level`) VALUES
(1, 'software engineer', '1'),
(5, 'ds', '2'),
(7, 'Programmer', '2');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--
-- Creation: Jan 15, 2022 at 06:26 PM
--

CREATE TABLE `service_requests` (
  `id` int(11) NOT NULL,
  `globalid` int(10) DEFAULT NULL,
  `Created_by_userid` int(11) NOT NULL,
  `is_open_for_bidding` int(2) NOT NULL,
  `cycle` int(2) NOT NULL DEFAULT 1,
  `role` varchar(100) NOT NULL,
  `skilllevel` int(3) NOT NULL,
  `location` varchar(255) NOT NULL,
  `skillset` varchar(1000) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `projectname` varchar(255) NOT NULL,
  `taskdescription` varchar(2000) DEFAULT NULL,
  `comments` varchar(2000) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Submission_status` int(3) DEFAULT NULL,
  `template_status` int(3) DEFAULT NULL,
  `deadline` date NOT NULL DEFAULT current_timestamp(),
  `deadline_new` date DEFAULT NULL,
  `expired_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `globalid`, `Created_by_userid`, `is_open_for_bidding`, `cycle`, `role`, `skilllevel`, `location`, `skillset`, `duration`, `projectname`, `taskdescription`, `comments`, `weight`, `created_at`, `created_by`, `updated_at`, `Submission_status`, `template_status`, `deadline`, `deadline_new`, `expired_status`) VALUES
(1000, 8879899, 0, 0, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, NULL, '2022-03-21', NULL, 0),
(1001, 563434, 0, 0, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, NULL, '2022-03-21', NULL, 0),
(1002, 138986, 0, 0, 2, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, NULL, '2022-03-21', '2022-04-20', 0),
(1003, 4847, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 3, NULL, '2022-03-21', NULL, 0),
(1004, 8080, 0, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 2, NULL, '2022-03-21', NULL, 0),
(1005, 2204, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'cha', 'ayyo', 'r', '2022-01-16 15:29:48.000000', 'Testy Test', '2022-01-16 15:29:48.000000', 1, 1, '2022-03-22', NULL, 1),
(1006, 2680, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, NULL, '2022-03-21', '2022-03-20', 0),
(1007, 2685, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, NULL, '2022-03-21', NULL, 0),
(1008, 1103, 3, 1, 2, 'software engineer', 2, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 2, NULL, '2022-03-21', NULL, 0),
(1011, 3549, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 1, 1, '2022-03-21', NULL, 0),
(1012, 3128, 3, 1, 1, 'software engineer', 1, 'Munich', 'er', 'er', 'fgfgfg', 'you know what', 'i mean', 'r', '2022-01-16 15:24:40.000000', 'Testy Test', '2022-01-16 15:24:40.000000', 5, 0, '2022-03-21', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jan 03, 2022 at 12:57 PM
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `token`, `status`, `photo`) VALUES
(2, 'Musab developer', 'musabwebdev@gmail.com', 'bedebb62a1716ada5fa7203f46c02723', '0cb5e63a18e45aadc68a9e894d88618d', 1, '907182248Screenshot 2021-05-17 115128.png'),
(3, 'Testy Test', 'test@test.com', 'testtest', '534331a36506911a5eb873191820d918', 1, '1928310057Picture1.jpg'),
(4, 'kha', 'kha@kha.com', 'fcd88a44f6c2becd383aad3351736f14', 'b35c22a4427b38d3beaae761071af1b7', 1, '18513308853.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maplogin`
--
ALTER TABLE `maplogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapservice`
--
ALTER TABLE `mapservice`
  ADD PRIMARY KEY (`profileid`);

--
-- Indexes for table `map_contracts`
--
ALTER TABLE `map_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
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
-- AUTO_INCREMENT for table `maplogin`
--
ALTER TABLE `maplogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `mapservice`
--
ALTER TABLE `mapservice`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `map_contracts`
--
ALTER TABLE `map_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
