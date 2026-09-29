-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2026 at 10:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `qty`, `image`, `created_at`) VALUES
(12, 'hair powder', 15000, 20, '', '2026-09-21 14:17:36'),
(13, 'perfume', 90000, 20, '', '2026-09-21 14:17:54'),
(14, 'spray', 20000, 40, '', '2026-09-21 14:18:22'),
(18, 'Seal', 1000, 10, '1790048970_bulit.svg', '2026-09-22 03:49:30'),
(19, 'Built Seal', 1000, 10, '1790049159_bulit.svg', '2026-09-22 03:52:39'),
(23, 'product 1', 25000, 20, '1790082708_beautifulocean.jpg', '2026-09-22 13:11:48'),
(24, 'aa', 22, 1, '1790083337_beautifulgirl.jpg', '2026-09-22 13:22:17'),
(25, 'product2', 2000, 20, '1790083315_beautifulocean.jpg', '2026-09-22 13:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Han Gyi', '$2y$10$aly82ua.B13DKSbfYnU8uu6xIvMoMOsinW1ZsYARkgv1rewl4yLpu', '2026-09-23 08:44:14'),
(2, 'Han Lin Aung', '$2y$10$tbIkaDhg07c/8OGcpj/w7uzCUpYjXp8qMbkEh05IsM8qdRB94z95u', '2026-09-24 08:19:01'),
(3, 'Benjiro', '$2y$10$zIjDRdnhsEI/7R2RubzxM.A6Ng2Gf.cvkTSuP9v2Q1t1Dy2gYAQd2', '2026-09-24 08:20:16'),
(4, 'a', '$2y$10$gAFr7kIddIU8f7PMvCoFTeO2Z4/pM/TRVpYwDIuiUGa3hEbjjqOsy', '2026-09-24 08:23:14'),
(5, 'b', '$2y$10$TQXzjKZJNjztbvLraHcWb.ES/Avwg.4f.g58KX3UVKg0ILmLmqkau', '2026-09-24 08:39:30'),
(6, 'c', '$2y$10$ybwuLsVdF55zJzo3KvkxOezawkr15w.mNg11pbPT74XG/fxsD7HWC', '2026-09-24 08:42:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
