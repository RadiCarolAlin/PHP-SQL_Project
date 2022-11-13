-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 05:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_date`) VALUES
(1, 'admin', 'admin@yahoo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `experienta_profesionala`
--

CREATE TABLE `experienta_profesionala` (
  `ep_id` int(100) NOT NULL,
  `ep_usr_id` int(100) NOT NULL,
  `ep_usr_name` varchar(255) NOT NULL,
  `ep_usr_email` varchar(255) NOT NULL,
  `ep_usr_skill` varchar(255) NOT NULL,
  `ep_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experienta_profesionala`
--

INSERT INTO `experienta_profesionala` (`ep_id`, `ep_usr_id`, `ep_usr_name`, `ep_usr_email`, `ep_usr_skill`, `ep_date`) VALUES
(1, 5, 'mere', 'andrei.razvan@yahoo.com', 'profesorasdasd21mnk.j', '2021-11-15'),
(10, 5, 'mere', 'andrei.razvan@yahoo.com', 'sdfsdf', '2021-11-19'),
(11, 11, 'deadassassin27', 'andrei.razvan5@yahoo.com', 'sdfsdfs', '2021-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fe_id` int(100) NOT NULL,
  `fe_usr_id` int(100) NOT NULL,
  `fe_usr_name` varchar(255) NOT NULL,
  `fe_usr_email` varchar(255) NOT NULL,
  `fe_usr_comment` varchar(255) NOT NULL,
  `fe_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fe_id`, `fe_usr_id`, `fe_usr_name`, `fe_usr_email`, `fe_usr_comment`, `fe_date`) VALUES
(17, 1, 'admin', 'admin@yahoo.com', 'sadas2', '2021-11-15 18:24:26'),
(20, 5, 'mere', 'andrei.razvan@yahoo.com', 'mesaj nou', '2021-11-16 00:32:21'),
(24, 0, '', 'nousr@yahoo.com', 'mesaj', '2021-12-06 21:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(100) NOT NULL,
  `usr_name` varchar(255) NOT NULL,
  `usr_prenume` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_parola` varchar(255) DEFAULT NULL,
  `usr_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_prenume`, `usr_email`, `usr_parola`, `usr_date`) VALUES
(5, 'a', 'mere', 'andrei.razvan@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2021-11-14'),
(10, 'admin', 'razvan', 'andrei.razvan52@yahoo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2021-11-14'),
(11, 'andrei', 'deadassassin27', 'andrei.razvan5@yahoo.com', '7de22f3660dee603cb86c47213c5423961657e4c', '2021-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `experienta_profesionala`
--
ALTER TABLE `experienta_profesionala`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fe_id`),
  ADD UNIQUE KEY `fe_id` (`fe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `email` (`usr_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experienta_profesionala`
--
ALTER TABLE `experienta_profesionala`
  MODIFY `ep_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fe_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
