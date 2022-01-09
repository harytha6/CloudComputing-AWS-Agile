-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 03:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
-- Table structure for table `Service_Requests`
--

CREATE TABLE `Service_Requests` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `skilllevel` INT(3) NOT NULL,
  `location` varchar(255) NOT NULL,
  `skillset` varchar(1000) NOT NULL,
  `duration` varchar(100) ,
  `projectname` varchar(255) NOT NULL,
  `taskdescription` varchar(2000) ,
  `weight` varchar(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Service_Requests`
--

INSERT INTO `Service_Requests` (`id`, `role`, `skilllevel`, `location`, `skillset`, `duration`, `projectname`,`taskdescription`,`weight`) VALUES
(1000, 'Software Consultant', '2', 'Hamburg', 'Familiar with Agile workflow,HTML,CSS', '3 years', 'Deutsche-Bahn ticketing system','Must coordinate deliverables with team members','functional 100%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Service_Requests`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Service_Requests`
--
ALTER TABLE `Service_Requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `service_requests` ADD `Created_by_userid` INT(11) NOT NULL AFTER `id`;

ALTER TABLE `service_requests` ADD `is_open_for_bidding` INT(2) NOT NULL AFTER `Created_by_userid`, ADD `cycle` INT(2) NOT NULL DEFAULT '1' AFTER `is_open_for_bidding`;

ALTER TABLE `service_requests` ADD `created_at` TIMESTAMP(6) NULL DEFAULT NULL AFTER `weight`, ADD `updated_at` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) AFTER `created_at`;

ALTER TABLE `service_requests` ADD `Submission_status` INT(3) NULL DEFAULT NULL AFTER `updated_at`;

ALTER TABLE `service_requests` ADD `comments` VARCHAR(2000) NOT NULL AFTER `taskdescription`;

ALTER TABLE `service_requests` ADD `status` VARCHAR(100) NOT NULL;
