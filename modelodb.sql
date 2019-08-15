-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2019 at 02:55 PM
-- Server version: 5.6.44
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nucliuz_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `gposts`
--

CREATE TABLE `gposts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `attributes` text COMMENT 'json',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gposts`
--

INSERT INTO `gposts` (`id`, `title`, `body`, `attributes`, `created_at`) VALUES
(1, 'Post 1', 'this is post one', '{\"caca\":\"caca\"}', '2019-02-03 00:46:16'),
(2, 'Post 2', 'This is post 2', '{\"numero\":\"giyfufxhjvhkju\",\"tipo\":\"Seguros\",\"alias\":\"yotidutxfhcgjvhkjlh\",\"imagen\":\"http://dolarseguro.intelcorp.xyz/banks/bbva.jpg\"}', '2019-02-03 00:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 1, 'Post One', 'This is post one', '2019-02-03 15:53:57'),
(2, 1, 'Post Two', 'This is post two', '2019-02-03 15:53:57'),
(3, 3, 'Laravel is rough', 'As with any third party framework, not having full control over what is written can be rough.', '2019-03-24 15:02:35'),
(4, 4, 'test', '123321', '2019-08-13 16:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Tony', 'tony@intelcorp.xyz', '$2y$10$/Bp.g2oI3AXvO6lKi/Ga9OAHox33mb8f3knrZw9ZAQZFA2ihc8ivC', '2019-02-03 14:22:17'),
(2, 'Rosita', 'rosita@gmail.com', '$2y$10$fyMfcIPpWNqRo1lvVJf4tuV0bd0Vbmz0GhH7zZFAJESAahLE8WaW2', '2019-02-03 14:41:40'),
(3, 'Tony', 'gcavanunez@gmail.com', '$2y$10$KvkBZlb2RxfijDCH8TrU3.0VQBuIDvRJEjkCmQfur9iFpiuzQDgZ2', '2019-03-17 01:04:34'),
(4, 'Frank', 'frank@intelcorp.xyz', '$2y$10$xIlnapZT1ZmIaerqLyRdG.9/pR76Ln6u1syCDoocRvJ2Lb0m9O.J6', '2019-08-13 16:23:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gposts`
--
ALTER TABLE `gposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `gposts`
--
ALTER TABLE `gposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
