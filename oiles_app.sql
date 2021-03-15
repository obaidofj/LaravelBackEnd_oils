-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 مارس 2021 الساعة 11:52
-- إصدار الخادم: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oiles_app`
--

-- --------------------------------------------------------

--
-- بنية الجدول `ads`
--
-- الإنشاء: 11 مارس 2021 الساعة 21:10
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_only` tinyint(1) NOT NULL,
  `content_only` tinyint(1) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date_to_dis` date NOT NULL,
  `date_created` date NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cars`
--
-- الإنشاء: 11 مارس 2021 الساعة 21:29
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_type` int(6) NOT NULL,
  `car_plate_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_model_year` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_type` int(3) NOT NULL,
  `injection` tinyint(1) NOT NULL,
  `tearpo` tinyint(1) NOT NULL,
  `hydroleak_system` tinyint(1) NOT NULL,
  `normal_system` tinyint(1) NOT NULL,
  `first_time` date NOT NULL,
  `last_time` date NOT NULL,
  `times` int(6) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `car_type`
--
-- الإنشاء: 12 مارس 2021 الساعة 09:41
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `car_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_model` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `customer`
--
-- الإنشاء: 11 مارس 2021 الساعة 21:19
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `times` int(6) NOT NULL,
  `first_date` date NOT NULL,
  `last_date` date NOT NULL,
  `sex` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `customer_cars`
--
-- الإنشاء: 12 مارس 2021 الساعة 08:30
--

CREATE TABLE `customer_cars` (
  `cust_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `maintenance_done`
--
-- الإنشاء: 12 مارس 2021 الساعة 09:49
-- آخر تحديث: 12 مارس 2021 الساعة 09:49
--

CREATE TABLE `maintenance_done` (
  `id` int(11) NOT NULL,
  `car_id` int(100) NOT NULL,
  `man_date` date NOT NULL,
  `current_meter` int(60) NOT NULL,
  `distance_to_reach` int(20) NOT NULL,
  `coming_meter` int(60) NOT NULL,
  `type_of_oil` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oil_filter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `air_filter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solar_filter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benzen_filter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conditioner_filter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bojehat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_break` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_break` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rodater_water` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timing_Scrap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gear_oil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bkaks_oil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lubrication` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `axat_lubrication` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_cars`
--
ALTER TABLE `customer_cars`
  ADD PRIMARY KEY (`cust_id`,`car_id`),
  ADD KEY `cust_id_2` (`cust_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `maintenance_done`
--
ALTER TABLE `maintenance_done`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_done`
--
ALTER TABLE `maintenance_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `customer_cars`
--
ALTER TABLE `customer_cars`
  ADD CONSTRAINT `car_id_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cust_id_cust` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
