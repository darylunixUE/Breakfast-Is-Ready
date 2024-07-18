-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone_number` float NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email_address`, `username`, `password`, `phone_number`, `birth_date`, `address`, `gender`) VALUES
(1, 'Blaze Jace', 'BlazeJake@gmail.com', 'Blazing', 'Blaze123', 9594040000, '2002-09-17', 'Navotas City', 'male'),
(2, 'Garen Mckenzie', 'GarenMckenzie@gmail.com', 'Garen', 'Garen123', 9172940000, '2002-09-17', 'Navotas City', 'male'),
(3, 'Garen Mcdonald', 'Garen@gmail.com', 'Garenz', 'Garen123', 9172950000, '2001-09-17', 'Navotas City', 'male'),
(5, 'Victor Elderblood', 'Victor@gmail.com', 'Victor', 'Elderblood123', 9674840000, '2001-09-17', 'Malabon city', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email_address`,`username`,`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
