-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 12:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `name` varchar(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `menu_id` varchar(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `ongkos` int(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`menu_id`, `harga`, `ongkos`, `alamat`) VALUES
('Choco', 25000, 13000, 'karawang'),
('Rendang', 25000, 13000, 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pay`
--

CREATE TABLE `tabel_pay` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `process` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pay`
--

INSERT INTO `tabel_pay` (`payment_id`, `order_id`, `payment_date`, `process`) VALUES
(1, 1, '2023-05-28', 'Sedang di dapur'),
(2, 2, '2023-05-28', 'Sedang di dapur');

-- --------------------------------------------------------

--
-- Table structure for table `table_menu`
--

CREATE TABLE `table_menu` (
  `Menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `menu_type_id` int(11) NOT NULL,
  `menu_image` blob NOT NULL,
  `menu status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tabel_pay`
--
ALTER TABLE `tabel_pay`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `table_menu`
--
ALTER TABLE `table_menu`
  ADD PRIMARY KEY (`Menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
