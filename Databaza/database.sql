-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 11:21 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admins`
--

CREATE TABLE `table_admins` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_admins`
--

INSERT INTO `table_admins` (`id`, `username`, `password`) VALUES
(1, 'ermir_shabani', '$2y$10$hpJ/oKekulYrobcZWiU.0eMkVXRpFGCrRB9CxNBRL10nYud4iai.2');

-- --------------------------------------------------------

--
-- Table structure for table `table_comments`
--

CREATE TABLE `table_comments` (
  `id` int(255) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_comments`
--

INSERT INTO `table_comments` (`id`, `Name`, `Comment`) VALUES
(1, 'Kristina', 'Good Job..Keep up'),
(2, 'Christina', 'Keep up the good work'),
(3, 'Johny', 'Hey guys .. When you are going to respond to my request?'),
(4, 'Bento', 'This is a really good cause .. We need to protect nature'),
(5, 'Bella', 'Would love to come to the next event'),
(6, 'Artoni', 'Keep up guys . Where i can donate?'),
(7, 'Sonic', 'I had such a good exprience with u guys'),
(8, 'Daps', 'We need to protect our nature more'),
(9, 'JT', 'I love u guys');

-- --------------------------------------------------------

--
-- Table structure for table `table_requests`
--

CREATE TABLE `table_requests` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_requests`
--

INSERT INTO `table_requests` (`id`, `Name`, `Lastname`, `Email`, `Phonenumber`) VALUES
(1, 'Engjull', 'Berisha', 'e.berisha2015@gmail.com', '045947425'),
(2, 'Johny', 'English', 'johny.english@gmail.com', '+383494000443');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admins`
--
ALTER TABLE `table_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_comments`
--
ALTER TABLE `table_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_requests`
--
ALTER TABLE `table_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admins`
--
ALTER TABLE `table_admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_comments`
--
ALTER TABLE `table_comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_requests`
--
ALTER TABLE `table_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
