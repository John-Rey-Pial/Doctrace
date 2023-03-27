-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 02:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctrace`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `document_type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document`, `referral_code`, `status`, `office_id`, `date`, `document_type`) VALUES
(1, 'ICT Payroll (April)', 'vuqhdy', NULL, 1, '2021-04-08 09:39:07', '1'),
(2, 'Random docs', 'm2roea', NULL, 6, '2021-04-08 13:25:43', '0'),
(3, 'ICT Payroll (March)', 'sov0y2', NULL, 1, '2021-04-08 03:00:36', '1'),
(4, 'Payroll (April)', 'x0estn', NULL, 9, '2021-04-08 03:23:23', '1'),
(5, 'Random Docx', 'qunz98', 'cancel', 9, '2021-04-12 02:54:51', '0');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office`, `description`) VALUES
(1, 'ICT', 'Information and  Communication Technology'),
(2, 'CBO', 'City Budget Office'),
(3, 'Accounting', 'City Accounting Office'),
(4, 'CTO', 'City Treasurers\' Office'),
(5, 'Admin', 'City Administrative Office'),
(6, 'CMO', 'City Mayors Office'),
(7, 'BAC', ' '),
(8, 'IGSO', ' '),
(9, 'HR', 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `regular_steps`
--

CREATE TABLE `regular_steps` (
  `regular_id` int(11) NOT NULL,
  `regular_procedures` varchar(255) DEFAULT NULL,
  `description` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regular_steps`
--

INSERT INTO `regular_steps` (`regular_id`, `regular_procedures`, `description`) VALUES
(1, 'Payroll', NULL),
(2, 'Contracts', NULL),
(3, 'Voucher', NULL),
(4, 'Purchase Request', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `step_id` int(11) NOT NULL,
  `regular_id` int(11) DEFAULT NULL,
  `steps` varchar(255) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`step_id`, `regular_id`, `steps`, `office_id`) VALUES
(1, 1, '1', 5),
(2, 1, '1', 6),
(3, 1, '2', 2),
(4, 1, '3', 3),
(5, 1, '4', 4),
(6, 1, '5', 5),
(7, 2, '1', 9),
(8, 2, '2', 2),
(9, 2, '3', 6),
(10, 2, '4', 9),
(11, 3, '1', 5),
(12, 3, '1', 6),
(13, 3, '2', 2),
(14, 3, '3', 3),
(15, 3, '4', 4),
(16, 3, '5', 5),
(17, 4, '1', 5),
(18, 4, '2', 2),
(19, 4, '3', 7),
(20, 4, '3', 8),
(21, 4, '4', 3),
(22, 4, '5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trace`
--

CREATE TABLE `trace` (
  `trace_id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `note` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trace`
--

INSERT INTO `trace` (`trace_id`, `document_id`, `office_id`, `date`, `user_id`, `action`, `note`) VALUES
(27, 4, 5, '2021-04-11 04:51:47', 16, NULL, ''),
(20, 4, 6, '2021-04-09 02:50:54', 15, 1, ''),
(21, 4, 2, '2021-04-09 02:56:15', 20, 1, ''),
(22, 4, 3, '2021-04-11 03:02:23', 17, 1, 'Kulang Perma sa MPOR');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `office_id` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `birthdate`, `sex`, `contact`, `email`, `password`, `office_id`) VALUES
(14, 'Izzy', 'Anticamara', '1988-03-30 00:00:00', 'Female', '09777593138', 'izzy@gmail.com', '$2y$10$3tBNm7CI13KBTz/2oFomGOu6ueuHSA88nencx2CD6r2uJKRjm9NGG', 1),
(15, 'CMO', 'Mayor\'s Office', '2021-03-30 00:00:00', 'Male', '09777593138', 'cmo@gmail.com', '$2y$10$VuJgQCJYHzBuyfgBDP/4BO1AIa60lPJ2wek8W5ZdAymeHb32sHPcq', 6),
(16, 'Admin', 'Admin', '2021-03-30 00:00:00', 'Female', '09777593138', 'admin@gmail.com', '$2y$10$ppiYd35G2VYb2PSenteunOWVxo3anFkog9mgtRm9sX/vmpVhWfipy', 5),
(17, 'Accounting', 'Admin', '0000-00-00 00:00:00', 'Female', '09777593138', 'accounting@gmail.com', '$2y$10$pW4OyVHsaIRzsfpaHzcZJOfKW0GdIY3aoMFjKggfm4djApBIsgv9i', 3),
(20, 'CBO', 'Doe', '2021-04-06 00:00:00', 'Female', '09777593138', 'cbo@gmail.com', '$2y$10$mRNYGeKONXUXyZTaE6m5mOIv6pb5o43TS07BQwhncOaoZjmEz213e', 2),
(22, 'Gabriel', 'Nieve', '1997-05-13 00:00:00', 'Male', '09777593138', 'agabriel.nieve@gmail.com', '$2y$10$1FXqF2xzKTujd0u8xCm8bu9NJ986rIvLhrZ4owGoqeeDLP5QeOwre', 0),
(23, 'test', 'test', '2021-04-08 00:00:00', 'Male', '', 'test@gmail.com', '$2y$10$yaOYpDKfDhFUKo/w28tQBe7QbzsYkvpO4tl8PG0yYNWylZ5KNzRNC', 9),
(24, 'CTO', 'Tresurer', '2021-04-11 00:00:00', 'Female', '', 'cto@gmail.com', '$2y$10$.5HHvzT5ivj6gGb3nfGtJ.1SHOdg34ygAOyk8SCxNyw9nmoeMiq7i', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `regular_steps`
--
ALTER TABLE `regular_steps`
  ADD PRIMARY KEY (`regular_id`) USING BTREE;

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`step_id`);

--
-- Indexes for table `trace`
--
ALTER TABLE `trace`
  ADD PRIMARY KEY (`trace_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regular_steps`
--
ALTER TABLE `regular_steps`
  MODIFY `regular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trace`
--
ALTER TABLE `trace`
  MODIFY `trace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
