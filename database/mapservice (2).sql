-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 13, 2022 at 10:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
(1, 1, 200, 'Bilal shaikh', 'hamburg', 2, 'HTML, CSS, JS', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Bilal', '', ''),
(1, 2, 44, 'Michael', 'Frankfurt', 2, 'React, Jquery', 2, 1, 0, '3', 'MAP Agreement Partner 1', 'Spanish', 'Sample comment', '0000-00-00 00:00:00.000000', 3443443, 32323, '', '', ''),
(1, 3, 200, 'Bilal shaikh', 'hamburg', 2, 'HTML, CSS, JS', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Harris', '', ''),
(1, 23, 200, 'Lewis', 'hamburg', 2, 'HTML, CSS, JS', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'German', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Bilal', '', ''),
(4847, 113, 0, 'test name', 'sd', 2, 'hh', 1, 0, 1, 'i', 'MAP Agreement Partner 1', '', 'iu', '2022-01-10 17:25:15.645320', 10000, 0, 'Testy Test', '', ''),
(2204, 114, 0, 'efre', 'er', 0, '3', 1, 0, 1, '', 'MAP Agreement Partner 1', 'ewr', '', '2022-01-11 07:23:58.723135', 0, 0, 'Testy Test', '', ''),
(534239, 115, 9090, 'charu', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 1', 'hhh', '', '2022-01-11 13:11:52.580053', 20000, 0, '', '', ''),
(8080, 116, 9090, 'charu', '', 3, '', 2, 0, 0, '', 'MAP Agreement Partner 1', 'hhh', '', '2022-01-11 13:33:58.015455', 15000, 0, '', '', ''),
(434, 323, 1211, 'John', 'Spain', 3, 'UI', 1, 2, 1, '2', 'MAP Agreement Partner 1', 'English', 'Comments', '0000-00-00 00:00:00.000000', 4322, 1222, 'John', '', ''),
(1, 324, 200, 'Sodhi', 'hamburg', 2, 'HTML, CSS, JS', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Sodhi', '', ''),
(1, 325, 200, 'Tarak', 'hamburg', 3, 'Writer', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Mehta', '', ''),
(1, 326, 200, 'Jetha', 'hamburg', 3, 'Buisness', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Gujrati', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Bapuji', '', ''),
(1, 327, 200, 'Krishnan Iyer', 'Chennai', 1, 'Scientist', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 6455, 'Iyer', '', ''),
(1, 329, 200, 'Anjali', 'Rajasthan', 3, 'karela juice', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 7588, 'Tarak mehta', '', ''),
(1, 330, 200, 'Tapu', 'Gujrat', 3, 'Batsman', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Gujrati', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Tipendra gada', '', ''),
(1, 331, 200, 'Sonu', 'Ratnagiri', 2, 'Rangoli', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 8766, 'A. T. Bhide', '', ''),
(1, 332, 200, 'Goli', 'Indore', 2, 'fielder', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Goli', '', ''),
(1, 333, 200, 'Gogi', 'Punjab', 2, 'Wicket keeper', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Punjabi', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Roshan singh sodhi', '', ''),
(1, 334, 200, 'Madhvi', 'Nashik', 2, 'Aachar papad', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Marathi', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Bhide family', '', ''),
(1, 336, 200, 'Abdul', 'Hyderabad', 1, 'Soda', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Asit', '', ''),
(1, 337, 200, 'magan', 'Goregaon', 1, 'Sales person', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Gujrati', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Jethalal', '', ''),
(1, 338, 200, 'Natu kaka', 'Goregaon', 1, 'Sales person', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Gujrati', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Jethalal', '', ''),
(1, 339, 200, 'Baga', 'Goregaon', 1, 'Sales person', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'Gujrati', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Jethalal', '', ''),
(1, 340, 200, 'Irfan Bhai', 'Bhandup', 1, 'RTO Agent', 1, 0, 1, '3', 'Maharashtra Driving school', 'Urdu', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 6455, 'Imran', '', ''),
(1, 456, 48, 'Bryan', 'Spain', 3, 'Communication', 2, 0, 1, '6', 'Forto', 'Hindi', 'No comment', '2022-01-13 20:54:15.000000', 0, 7588, 'ILLI', '', ''),
(2204, 457, 0, 'Michael Scott', 'Scranton', 1, '3', 2, 0, 1, '6', 'Dunder Mifflin', 'English', 'TWSS', '2022-01-11 07:23:58.723135', 0, 0, 'BJ Novak', '', ''),
(1, 458, 5, 'KOLI', 'Bhandup', 2, 'Full stack', 2, 0, 1, '12', 'Fynd', 'Marathi', 'SAMPLE', '2022-01-19 20:58:45.000000', 0, 3755, 'Macha', '', ''),
(1, 459, 200, 'Bulli', 'Kolkata', 2, 'Support', 1, 0, 1, '5', 'Ubiquiti', 'English, Hindi', 'NO COMMENT', '2022-01-11 20:59:49.000000', 0, 3755, 'Bryan', '', ''),
(1, 460, 44, 'Sean', 'Berlin', 2, 'Support', 2, 1, 1, '5', 'Omio', 'German', 'Mate', '2022-01-11 21:00:32.000000', 500, 500, '', '', ''),
(1, 461, 200, 'Rachit', 'Bosto', 1, 'Data', 1, 0, 1, '3', 'Cisco', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Sodhi', '', ''),
(1, 462, 200, 'Rachit', 'Boston', 2, 'HTML', 1, 0, 1, '7', 'MAP Agreement Partner 1', 'HIndi', 'This is a sample comment', '2022-01-03 21:02:47.000000', 0, 3755, 'Ryan', '', ''),
(1, 463, 200, 'Anja', 'Berlin', 3, 'NOpE', 1, 0, 1, '8', 'GOkuldham', 'Malayalam', 'NOOO', '2022-01-04 21:03:46.000000', 0, 7588, 'ASit modi', '', ''),
(1, 464, 200, 'Narendra', 'mODI', 2, 'anti', 1, 0, 1, '4', 'BJP', 'Hindu', 'modi sarkaar', '2022-01-10 21:04:39.000000', 0, 3755, 'RSS', '', ''),
(1, 465, 200, 'Bru', 'der', 3, 'wASSS', 1, 0, 1, '6', 'INSTA', 'teleugu', 'bruda', '2022-01-04 21:05:49.000000', 0, 3755, 'nyan', '', ''),
(1, 466, 44, 'digga', 'spain', 2, 'RactJS', 2, 1, 1, '7', 'find', 'malayalam', 'digga', '2022-01-05 21:06:29.000000', 3443443, 32323, '', '', ''),
(1, 467, 200, 'Harris', 'ryan', 1, 'sapot', 1, 0, 1, '6', 'infosys', 'English', 'This is a sample comment', '2022-01-11 21:07:09.000000', 0, 3755, 'michael', '', ''),
(1, 468, 200, 'Bilal', 'Fra', 3, 'Suppprot', 1, 0, 1, '4', 'Forto GmbH', 'Hindi', 'DIgga', '2022-01-10 21:07:51.000000', 0, 3755, 'none', '', ''),
(1, 469, 200, 'Bilal shaikh', 'BHANDUP', 1, 'Java', 1, 0, 1, '2', 'TCS', 'English', 'This is a sampl', '2022-01-09 21:08:35.000000', 0, 3755, 'Michael', '', ''),
(1, 470, 44, 'Shivam', 'SInghFrankfurt', 1, 'backend', 2, 1, 0, '3', 'cognizant', 'Hindi', 'Sample comment', '2022-01-02 21:09:11.000000', 3443443, 32323, '', '', ''),
(1, 471, 200, 'Milton', 'Dublin', 2, 'AI', 1, 0, 1, '2', 'Amazon', 'English', 'This is a sample comment', '2022-01-04 21:09:44.000000', 0, 3755, 'jeffie', '', ''),
(1, 472, 5, 'KOLIS', 'BhandupS', 2, 'Full st', 2, 0, 1, '1', 'Fynd', 'Marathi', 'SAMPLE', '2022-01-11 20:58:45.000000', 0, 3755, 'Macha', '', ''),
(1, 473, 200, 'Bill', 'hamb', 2, 'HTML', 1, 0, 1, '2', 'MAP', 'English', 'Sample', '2022-01-05 21:11:31.000000', 0, 3755, 'brya', '', ''),
(4847, 474, 0, 'Testtt', 'SERUM', 2, 'lol', 1, 0, 1, '1', 'nop', 'Hindi', 'nil', '2022-01-10 17:25:15.645320', 10000, 0, 'Testy Test', '', ''),
(1, 475, 200, 'Lewis', 'Hamkton', 2, 'NOO', 1, 0, 1, '4', 'Mercedes', 'German', 'This is a\\', '2022-01-04 21:12:45.000000', 0, 3755, 'Lew', '', ''),
(534239, 476, 9090, 'FUAS', 'Frankfu', 1, '0', 2, 0, 0, '1', 'UNI', 'Ger', '', '2022-01-07 13:11:52.580053', 20000, 0, '', '', ''),
(4847, 477, 0, 'TTTTTTSSSSS', 'BHHHHH', 2, 'loi', 1, 0, 1, '5', 'NI', '', 'NA', '2022-01-02 17:25:15.645320', 10000, 0, 'BUY', '', ''),
(1, 478, 200, 'Jethilali', 'Dubai', 3, 'Kidney', 1, 0, 1, '4', 'Shaikh', 'Kacchii', 'deti', '2022-01-05 21:17:12.000000', 0, 3755, 'asity', '', ''),
(1, 479, 200, 'Max', 'AbuDahbi', 2, 'F1', 1, 0, 1, '6', 'Redbull', 'Dutch', 'checo', '2022-01-09 21:18:02.000000', 0, 3755, 'Timo', '', ''),
(4847, 480, 0, 'Ocon', 'Alpha', 2, 'hi', 1, 0, 1, '6', 'Aston', '', 'mil', '2022-01-12 17:25:15.645320', 10000, 0, 'slang', '', ''),
(1, 481, 200, 'Bilal shaikh', 'hamburg', 2, 'HTML, CSS, JS', 1, 0, 1, '2', 'MAP Agreement Partner 1', 'English', 'This is a sample comment', '0000-00-00 00:00:00.000000', 0, 3755, 'Harris', '', ''),
(1, 482, 44, 'BUII', 'Frankfurt', 2, 'React, Jquery', 2, 1, 0, '3', 'MAP Agreement Partner 1', 'Spanish', 'Sample comment', '0000-00-00 00:00:00.000000', 3443443, 32323, '', '', ''),
(1, 483, 200, 'Bhui', 'Berr', 2, 'IUK', 1, 0, 1, '2', 'TCS', 'German', 'This is a sample comment', '2022-01-04 21:19:47.000000', 0, 3755, 'HIU', '', ''),
(1, 484, 200, 'BUY', 'HAM', 2, 'JSSS', 1, 0, 1, '2', 'TCS', 'Hindi', 'hhuuu', '2022-01-03 21:20:15.000000', 0, 3755, 'KOI', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapservice`
--
ALTER TABLE `mapservice`
  ADD PRIMARY KEY (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapservice`
--
ALTER TABLE `mapservice`
  MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
