-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 03:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `people_status`
--

CREATE TABLE `people_status` (
  `people_number` int(11) NOT NULL,
  `people_name` varchar(256) NOT NULL,
  `covid_status` tinyint(1) NOT NULL,
  `number_of_vaccination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `people_status`
--

INSERT INTO `people_status` (`people_number`, `people_name`, `covid_status`, `number_of_vaccination`) VALUES
(1, 'John Smith', 0, 3),
(2, 'Iradukinda Yvonne', 1, 1),
(3, 'Nirere Bobo', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people_status`
--
ALTER TABLE `people_status`
  ADD PRIMARY KEY (`people_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people_status`
--
ALTER TABLE `people_status`
  MODIFY `people_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
