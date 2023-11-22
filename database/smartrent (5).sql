-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 08:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `vid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `vehicle` varchar(20) NOT NULL,
  `pick_up` timestamp NULL DEFAULT NULL,
  `return_up` timestamp NULL DEFAULT NULL,
  `license` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `vid`, `name`, `mobile`, `vehicle`, `pick_up`, `return_up`, `license`, `message`, `status`) VALUES
(34, 14, 30, 'Rohan', '9878978984', 'Activa', '2023-04-13 18:07:00', '2023-04-15 18:08:00', 'How to apply for driving license in India.jpg', '', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aimage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aimage1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`id`, `name`, `mobile`, `address`, `email`, `password`, `created_at`, `updated_at`, `status`, `aimage`, `aimage1`) VALUES
(30, 'Sharma Renter', '9856321452', 'Beach Road, Benualim, Salcete Goa', 'sharmarenter@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'dish-2.jpg', 'dish-2.jpg'),
(31, 'Costa Vehicle', '9854785632', 'Colva, Salcete Goa', 'costavehicle@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'dish-3.jpg', 'dish-7.jpg'),
(32, 'Raviraj Rental', '8856325987', 'Varca, Salcete Goa', 'ravirajrental@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'dish-1.jpg', 'dish-4.jpg'),
(33, 'Joseph Rental', '8856985632', 'Colva, Salcete Goa', 'josephrental@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'maxson.jpg', 'dish-6.jpg'),
(34, 'Vijay Rentals', '974536528', 'Vasco,Goa', 'vijayrental@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'dish-3.jpg', 'dish-7.jpg'),
(35, 'Masxson Rental Service', '9856321453', 'Colva beach road,Colva, Salcete Goa', 'MasxsonRentalService@gmail.com', '07b2e24766e28d9e34eb99f5a42f8d25', '2023-04-12 17:34:00', '2023-04-12 17:34:00', 'activate', 'dish-1.jpg', 'dish-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `status` int(1) NOT NULL DEFAULT 1,
  `profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `mobile`, `email`, `password`, `created_at`, `updated_at`, `role`, `status`, `profile`) VALUES
(1, 'Ishaan', '9876456781', 'Ishaan@gmail.com', 'e8d9fb1b43845938b03577cd9e621a7b', '2023-03-02 09:38:54', '2023-03-02 09:38:54', 'admin', 1, ''),
(14, 'Rohan', '8547856325', 'rohan@gmail.com', '6edf26f6e0badff12fca32b16db38bf2', '2023-04-12 18:07:36', '2023-04-12 18:07:36', 'user', 1, 'pro2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vid` int(100) NOT NULL,
  `rid` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `model` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fuel_type` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vid`, `rid`, `name`, `price`, `model`, `color`, `fuel_type`, `img`, `status`) VALUES
(26, 30, 'Jupiter', '500', '2015', 'Blue', 'Petrol', 'tvs-jupiter-matte-blue.png', 0),
(27, 32, 'Jupiter', '450', '2016', 'Blue', 'Petrol', 'tvs-jupiter-matte-blue.png', 0),
(28, 34, 'Jupiter', '550', '2011', 'Blue', 'Petrol', 'tvs-jupiter-matte-blue.png', 0),
(29, 35, 'Jupiter', '400', '2012', 'Blue', 'Petrol', 'tvs-jupiter-matte-blue.png', 0),
(30, 30, 'Activa', '400', '2013', 'Blue', 'Petrol', 'activa.png', 0),
(31, 31, 'Activa', '450', '2015', 'Blue', 'Petrol', 'activa.png', 0),
(32, 33, 'Activa', '500', '2017', 'Blue', 'Petrol', 'activa.png', 0),
(33, 35, 'Activa', '550', '2015', 'Blue', 'Petrol', 'activa.png', 0),
(34, 32, 'Verna', '1100', '2018', 'Red', 'Petrol', 'verna.png', 0),
(35, 34, 'Verna', '1150', '2019', 'Red', 'Petrol', 'verna.png', 0),
(36, 33, 'Honda City', '1200', '2016', 'White', 'Petrol', 'hcity.png', 0),
(37, 35, 'Verna', '1300', '2015', 'White', 'Diesel', 'verna.png', 0),
(38, 31, 'Verna', '1150', '2019', 'Red', 'Petrol', 'verna.png', 0),
(39, 32, 'Honda City', '1200', '2016', 'White', 'Petrol', 'hcity.png', 0),
(40, 34, 'Verna', '1300', '2015', 'White', 'Diesel', 'verna.png', 0),
(41, 30, 'Verna', '1300', '2015', 'White', 'Diesel', 'verna.png', 0),
(42, 31, 'Ertiga', '1350', '2017', 'Red', 'Diesel', 'ertiga.png', 0),
(43, 32, 'nexon', '1000', '2020', 'Red', 'Diesel', 'nexon.png', 0),
(44, 33, 'Swift', '950', '2018', 'Blue', 'Diesel', 'swift.png', 0),
(45, 30, 'Access', '500', '2015', 'Blue', 'Petrol', 'access.png', 0),
(46, 31, 'Access', '450', '2016', 'Blue', 'Petrol', 'access.png', 0),
(47, 32, 'Access', '550', '2011', 'Blue', 'Petrol', 'access.png', 0),
(48, 33, 'Access', '400', '2012', 'Blue', 'Petrol', 'access.png', 0),
(49, 34, 'Access', '400', '2013', 'Blue', 'Petrol', 'access.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
