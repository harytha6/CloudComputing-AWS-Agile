-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 04:22 PM
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
(113, 'MAP Agreement Partner 1', 'test@test.com', 'test', '534331a36506911a5eb873191820d918', 1, '1928310057Picture1.jpg'),
(114, 'kha', 'kha@kha.com', 'fcd88a44f6c2becd383aad3351736f14', 'b35c22a4427b38d3beaae761071af1b7', 1, '18513308853.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapservice`
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
  `response` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapservice`
--

INSERT INTO `mapservice` (`globalid`, `profileid`, `employeeid`, `employeename`, `location`, `skilllevel`, `skillset`, `submission_status`, `bid_status`, `agreed_status`, `durationavailablefor`, `currentcompany`, `language`, `comments`, `profileuploadedon`, `price`, `negotiateprice`, `created_by`, `question`, `response`) VALUES
(4847, 113, 0, '', 'sd', 2, 'hh', 1, 0, 0, 'i', 'MAP Agreement Partner 1', '', 'iu', '2022-01-10 17:25:15.645320', 10000, 0, 'Testy Test', '', ''),
(2204, 114, 0, 'efre', 'er', 0, '3', 1, 0, 0, '', 'MAP Agreement Partner 1', 'ewr', '', '2022-01-11 07:23:58.723135', 0, 0, 'Testy Test', '', ''),
(534239, 115, 9090, 'charu', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 1', 'hhh', '', '2022-01-11 13:11:52.580053', 20000, 0, '', '', ''),
(8080, 116, 9090, 'charu', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 1', 'hhh', '', '2022-01-11 13:33:58.015455', 15000, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
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
  `Submission_status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `globalid`, `Created_by_userid`, `is_open_for_bidding`, `cycle`, `role`, `skilllevel`, `location`, `skillset`, `duration`, `projectname`, `taskdescription`, `comments`, `weight`, `created_at`, `created_by`, `updated_at`, `Submission_status`) VALUES
(1000, 8879899, 0, 0, 1, 'Software Consultant', 2, 'Hamburg', 'Familiar with Agile workflow,HTML,CSS', '3 years', 'Deutsche-Bahn ticketing system', 'Must coordinate deliverables with team members', '', 'functional 100%', NULL, '', '2022-01-05 10:14:54.845689', NULL),
(1001, 563434, 0, 0, 1, 'fgu', 2, 'fytfy', 'ghg', 'hh', 'yg', 'guh', '', 'hjh', NULL, '', '2022-01-05 12:26:56.306886', NULL),
(1002, 138986, 0, 0, 1, 'Infrastructure Maintenance', 3, 'Munich', '', '3 months', 'CMRL', 'Need somebody with 3+ years of experience with Metro train infrastructure', '', 'Functional 80%', NULL, '', '2022-01-06 12:21:14.594320', NULL),
(1003, 534239, 3, 1, 1, 'erer', 1, 'rrr', 'sr', 'erer', 'tht', 'erer', 'hrt', 'wee', '2022-01-08 05:49:52.000000', 'Testy test', '2022-01-08 05:49:52.880859', 1),
(1004, 8080, 0, 1, 1, 'ds', 2, 'sd', 'hh', 'i', 'jn', 'ui', 'iu', 'u', '2022-01-10 09:57:59.000000', 'root', '2022-01-10 09:57:59.576251', 1),
(1005, 2204, 3, 1, 1, 'Security Expert', 2, 'Chennai', 'Networking and Routing principles knowledge preferred', '10 months', 'CMRL', 'Maintain servers', 'Need experience with CISCO routers', '90% functional', '2022-01-10 17:32:45.000000', 'Testy Test', '2022-01-10 17:32:45.722300', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `service_requests` ADD `template_status` INT(3) NULL DEFAULT NULL AFTER `Submission_status`;

ALTER TABLE `service_requests` ADD `negotiateprice` int(10) NOT NULL;

ALTER TABLE `mapservice` ADD `feedback` varchar(200) NOT NULL;

ALTER TABLE `service_requests` ADD `deadline` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `template_status`;

ALTER TABLE `service_requests` ADD `deadline_new` DATE NULL DEFAULT NULL AFTER `deadline`;

ALTER TABLE `service_requests` ADD `expired_status` INT NULL DEFAULT NULL AFTER `deadline_new`;

ALTER TABLE `service_requests` ADD `role_id` INT NOT NULL AFTER `skilllevel`;

--

DROP TABLE IF EXISTS `map_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `map_contracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT NULL,
  `map_id` int DEFAULT NULL,
  `cluster` varchar(45) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `bid_status` int DEFAULT NULL,
  `aggrement_status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  `skill_level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `roles` VALUES (1,'software engineer','1'),(6,'Programmer','1'),(7,'Programmer','2');

ALTER TABLE `map_contracts` CHANGE `role_id` `role_name` VARCHAR(255) NULL;

ALTER TABLE `map_contracts` CHANGE `map_id` `map_username` VARCHAR(100) NULL;

ALTER TABLE `map_contracts` ADD `skill_level` INT(3) NOT NULL AFTER `price`;

ALTER TABLE `map_contracts`
  DROP `bid_status`,
  DROP `updated_at`,
  DROP `created_by`,
  DROP `updated_by`;

ALTER TABLE `service_requests` DROP `role_id`;

ALTER TABLE `mapservice` ADD `feedback` VARCHAR(255) NOT NULL AFTER `response`;