-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 11:49 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_cisco`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_keys`
--

CREATE TABLE `access_keys` (
  `access_key` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `expired_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_keys`
--

INSERT INTO `access_keys` (`access_key`, `status`, `expired_at`, `user_id`) VALUES
('sfhdsgfsf3sd4fsd56f6d5', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routerproperty`
--

CREATE TABLE `routerproperty` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `spid` varchar(200) DEFAULT NULL,
  `hostname` varchar(200) DEFAULT NULL,
  `loopback` varchar(200) DEFAULT NULL,
  `macaddress` varchar(200) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routerproperty`
--

INSERT INTO `routerproperty` (`id`, `status`, `created_at`, `updated_at`, `spid`, `hostname`, `loopback`, `macaddress`, `type`) VALUES
(14, 1, '2020-06-27 12:54:17', '2020-06-27 09:42:54', '123456789012345678', '12345678901234', '1234', '12345678901234567', NULL),
(15, 1, '2020-06-27 12:54:17', '2020-06-27 12:54:17', '123456789012345679', '12345678901235', '1235', '12345678901234568', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `routerproperty`
--
ALTER TABLE `routerproperty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`spid`),
  ADD UNIQUE KEY `hostname` (`hostname`),
  ADD UNIQUE KEY `loopback` (`loopback`),
  ADD UNIQUE KEY `macaddress` (`macaddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routerproperty`
--
ALTER TABLE `routerproperty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
