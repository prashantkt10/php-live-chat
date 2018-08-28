-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2017 at 07:38 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `public_chat`
--

CREATE TABLE `public_chat` (
  `id` int(100) NOT NULL,
  `fromid` varchar(100) DEFAULT NULL,
  `fromName` varchar(200) NOT NULL,
  `messages` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_chat`
--

INSERT INTO `public_chat` (`id`, `fromid`, `fromName`, `messages`) VALUES
(170, 'mkt', 'Mohit', 'Hi'),
(171, 'mkt', 'Mohit', 'Gola'),
(172, 'mkt', 'Mohit', 'Hmm'),
(173, 'pkt', 'Prashant', 'okk'),
(174, 'pkt', 'Prashant', 'aur?'),
(175, 'pkt', 'Prashant', 'thik hai na?'),
(176, 'pkt', 'Prashant', 'hiii'),
(177, 'pkt', 'Prashant Kumar Tripathi', 'hii'),
(178, 'pkt', 'Prashant Kumar Tripathi', 'dfdfd'),
(179, 'pkt', 'Prashant Kumar Tripathi', 'dxfsdfsdfs'),
(180, 'pkt', 'Prashant Kumar Tripathi', 'dxf'),
(181, 'pkt', 'Prashant Kumar Tripathi', 'dxf'),
(182, 'pkt', 'Prashant Kumar Tripathi', 'dsfsdfsdf\nDSFSDFS\nDSFSDF\nSDFSDF\nXFSDFSDF\nDFSDF\n'),
(183, 'pkt', 'Prashant Kumar Tripathi', 'how are you'),
(184, 'pkt', 'Prashant Kumar Tripathi', ';;;'),
(185, 'anit', 'Anit', 'Hii, I am Java Developer'),
(186, 'pkt', 'Prashant Kumar Tripathi', 'are bhai bhai'),
(187, 'pkt', 'Prashant Kumar Tripathi', 'Hmm'),
(188, 'pkt', 'Prashant Kumar Tripathi', 'Okk'),
(189, 'pkt', 'Prashant Kumar Tripathi', 'Hmm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `name`, `mobile`, `email`, `pass`) VALUES
(47, 'pkt', 'Prashant Kumar Tripathi', 0, 'prashant@tripathi.tech', '1234'),
(48, 'mkt', 'My Blog', 0, 'mkt@pkt.com', '1111'),
(49, 'anit', 'Anit', 2147483647, 'anit@mail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user` varchar(200) DEFAULT NULL,
  `last_seen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user`, `last_seen`) VALUES
('pkt', '2017-12-29 00:01:40'),
('mkt', '2017-12-28 19:52:31'),
('anit', '2017-12-29 00:08:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `public_chat`
--
ALTER TABLE `public_chat`
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
-- AUTO_INCREMENT for table `public_chat`
--
ALTER TABLE `public_chat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
