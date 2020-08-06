-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 10:23 AM
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
-- Table structure for table `carlist`
--

CREATE TABLE `carlist` (
  `id` int(11) NOT NULL,
  `CarName` text NOT NULL,
  `SeatNo` varchar(100) NOT NULL,
  `Image` text NOT NULL,
  `Model` varchar(100) NOT NULL,
  `cartype_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carlist`
--

INSERT INTO `carlist` (`id`, `CarName`, `SeatNo`, `Image`, `Model`, `cartype_id`, `brand_id`) VALUES
(2, 'BMW', '4seats', 'sbmw.jpg', '2017Model', 2, 4),
(3, 'Toyota', '4seats', '2020-toyota.jpg', '2020model', 2, 1),
(4, 'Honda', '4seats', 'shonda1.jpg', '2017Model', 2, 2),
(5, 'Nissan', '4seats', 'Nissan-Leaf-EV.jpg', '2016Model', 2, 5),
(6, 'Suzuki', '4seats', 'maruti-suzuki-celerio-2017.jpg', '2014Model', 2, 3),
(7, 'Land Cruiser', '5seats', 'land cruiser.jpg', '2015Model', 1, 1),
(8, 'Mercedes-Benz', '5seats', 'Mercedes-Benz-GLS-2019.jpg', '2020model', 1, 1),
(9, 'Vivo', '5seats', 'vivo.jpg', '2020model', 1, 2),
(10, 'Alphard', '6seats', 'btoyota.jpg', '2015Model', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carlist`
--
ALTER TABLE `carlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartype-constraint` (`cartype_id`),
  ADD KEY `brand-constraint` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carlist`
--
ALTER TABLE `carlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carlist`
--
ALTER TABLE `carlist`
  ADD CONSTRAINT `brand-constraint` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `cartype-constraint` FOREIGN KEY (`cartype_id`) REFERENCES `cartype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
