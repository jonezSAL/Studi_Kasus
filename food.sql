-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:20 PM
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
  `id_deli` int(11) NOT NULL,
  `Score_deli` int(11) NOT NULL,
  `contak_deli` int(11) NOT NULL,
  `peru_deli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foood`
--

CREATE TABLE `foood` (
  `Menu_id` varchar(15) NOT NULL,
  `Score` int(15) NOT NULL,
  `Rating` int(15) NOT NULL,
  `customer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foood`
--

INSERT INTO `foood` (`Menu_id`, `Score`, `Rating`, `customer_id`) VALUES
('Paket Rendang', 4, 4, 101);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pay`
--

CREATE TABLE `tabel_pay` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `proces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`id_deli`);

--
-- Indexes for table `foood`
--
ALTER TABLE `foood`
  ADD PRIMARY KEY (`Menu_id`);

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
