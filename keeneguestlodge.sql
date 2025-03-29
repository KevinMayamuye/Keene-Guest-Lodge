-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 05:22 AM
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
-- Database: `keeneguestlodge`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestregistration`
--

CREATE TABLE `guestregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneCode` int(11) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `roomtype` varchar(50) NOT NULL,
  `numberofguests` int(11) NOT NULL,
  `numberofrooms` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `CVV` int(3) NOT NULL,
  `cardNumber` bigint(20) NOT NULL,
  `exmonth` varchar(3) NOT NULL,
  `exyear` int(4) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guestregistration`
--

INSERT INTO `guestregistration` (`id`, `name`, `surname`, `gender`, `email`, `phoneCode`, `phoneno`, `checkin`, `checkout`, `roomtype`, `numberofguests`, `numberofrooms`, `owner`, `CVV`, `cardNumber`, `exmonth`, `exyear`, `totalPrice`) VALUES
(1, 'Dave', 'Smith', 'M', 'dave@gmail.com', 27, 712345678, '2024-09-29', '2024-10-03', 'single', 1, 1, '', 0, 0, '', 0, 0),
(2, 'omphile', 'gopane', 'M', 'omphilegopane913@gmail.com', 27, 785286100, '2024-10-19', '2024-10-21', 'suite', 2, 1, '', 0, 0, '', 0, 0),
(3, 'Davlin', 'Smithy', 'F', 'davey@gmail.com', 27, 712345674, '2024-09-29', '2024-10-03', 'single', 1, 1, '', 0, 0, '', 0, 0),
(4, 'Gregory', 'House', 'M', 'gregoryhouse@gmail.com', 28, 723456549, '2024-09-29', '2024-10-12', 'double', 4, 2, '', 0, 0, '', 0, 0),
(5, 'Another', 'One', 'F', 'another@gmail.com', 29, 812345678, '2024-10-05', '2024-10-08', 'single', 1, 1, '', 0, 0, '', 0, 0),
(6, 'Puddy', 'Smith', 'F', 'puddy@gmail.com', 210, 725648975, '2024-10-11', '2024-10-12', 'single', 1, 1, '', 0, 0, '', 0, 0),
(7, 'michelle', 'mnisi', 'F', 'michelle@gmail.com', 28, 832456987, '2024-10-10', '2024-10-12', 'single', 1, 1, '', 0, 0, '', 0, 0),
(8, 'michelle', 'mnisi', 'M', 'michelle@gmail.com', 27, 832456987, '2024-10-03', '2024-10-12', 'single', 2, 2, '', 0, 0, '', 0, 0),
(9, 'Harry', 'Mag', 'M', 'mag@gmail.com', 27, 781234567, '2024-10-05', '2024-10-23', 'single', 1, 1, '', 0, 0, '', 0, 0),
(10, 'Harrson', 'Mag', 'M', 'mag@gmail.com', 27, 781234567, '2024-10-04', '2024-10-05', 'single', 1, 1, '', 0, 0, '', 0, 0),
(11, 'Harrson', 'Mag', 'M', 'mag@gmail.com', 27, 781234567, '2024-10-10', '2024-10-18', 'double', 2, 1, '', 0, 0, '', 0, 0),
(12, 'Harrson', 'Mag', 'M', 'mag@gmail.com', 27, 781234567, '2024-10-09', '2024-10-10', 'single', 1, 1, '', 0, 0, '', 0, 0),
(13, 'Dave', 'Smith', 'M', 'dave@gmail.com', 27, 712345678, '2024-10-09', '2024-10-11', 'suite', 3, 3, '', 0, 0, '', 0, 0),
(14, 'Thabang', 'Maja', 'M', 'Tha@gmail.com', 27, 784563215, '2024-10-11', '2024-10-25', 'single', 1, 1, '', 0, 0, '', 0, 0),
(15, 'Dave', 'Smith', 'M', 'dave@gmail.com', 27, 712345678, '2024-10-10', '2024-10-11', 'single', 1, 1, 'D Smith', 311, 1235654298751235, 'Jan', 2020, 0),
(16, 'Dave', 'Smith', 'F', 'dave@gmail.com', 27, 712345678, '2024-10-10', '2024-10-11', 'double', 2, 1, 'D Smith', 211, 1235654298751235, 'Jan', 2020, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestregistration`
--
ALTER TABLE `guestregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestregistration`
--
ALTER TABLE `guestregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
