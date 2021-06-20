-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 02:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `uid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `uid`) VALUES
(1, 'Go Green Veg Ecommerce Website', 'Go Green Veg Ecommerce Website Go Green Veg Ecommerce Website Go Green Veg Ecommerce Website Go Green Veg Ecommerce Website f', '1'),
(2, 'Ecommerce WordPress Website', 'Ecommerce WordPress Website Ecommerce WordPress Website Ecommerce WordPress Website Ecommerce WordPress Website dfdf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `image`, `role`) VALUES
(1, 'Nasim Ansari', 'admin@gmail.com', 'admin', '1624116497.jpg', 'admin'),
(2, 'ajay mishra', 'ajaymishra@gmail.com', '123', '1624192362.jpg', 'user'),
(3, 'ankit', 'ankit@gmail.com', 'ankit', '1624192541.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
