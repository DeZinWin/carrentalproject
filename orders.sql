-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 04:49 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `FullName` text NOT NULL,
  `PhoneNo` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `TotalPrice` decimal(10,0) NOT NULL,
  `carlist_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `FullName`, `PhoneNo`, `Date`, `TotalPrice`, `carlist_id`, `location_id`) VALUES
(8, 'dezinwin', '091888', '2020-07-31to2020-08-01', '100000', 7, 4),
(9, 'dezinwin', '091888', '2020-07-31to2020-08-01', '100000', 7, 4),
(10, 'dezinwin', '091888', '2020-08-05to2020-08-07', '400000', 7, 1),
(11, 'dezinwin', '09188899', '2020-08-06to2020-08-15', '1800000', 2, 5),
(12, 'shwezintun', '097784455', '2020-08-03to2020-08-05', '800000', 7, 10),
(13, '', '', '2020-08-03to2020-08-05', '400000', 7, 1),
(14, '', '', '2020-08-03to2020-08-05', '400000', 7, 1),
(15, '', '', '2020-08-03to2020-08-05', '400000', 7, 1),
(16, '', '', '2020-08-03to2020-08-05', '480000', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`carlist_id`),
  ADD KEY `orders_ibfk_2` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`carlist_id`) REFERENCES `carlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`L_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
