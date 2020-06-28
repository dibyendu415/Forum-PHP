-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 10:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created`) VALUES
(1, 'Python', 'python is an easy programming language', '2020-06-12 18:25:28'),
(2, 'Javascript', 'It is used for web develepment mainly', '2020-06-12 18:25:28'),
(3, 'Django', 'Python Framework', '2020-06-12 21:31:39'),
(4, 'Flask', 'Used for backend', '2020-06-12 21:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'got it', 1, 1, '2020-06-15 04:24:35'),
(2, 'hey', 1, 2, '2020-06-15 04:44:49'),
(3, 'hey', 1, 3, '2020-06-15 04:48:11'),
(4, 'hi admin how r u', 7, 9, '2020-06-21 02:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(7) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title`, `description`, `thread_cat_id`, `thread_user_id`, `created`) VALUES
(1, 'Unable to install python', 'python is not showing in cmd', 1, 1, '2020-06-12 23:23:14'),
(2, 'python string error', 'help please', 1, 4, '2020-06-12 23:36:57'),
(3, 'jhj', 'hh', 1, 2, '2020-06-15 03:18:22'),
(4, 'new title', 'new description', 1, 6, '2020-06-15 03:20:38'),
(5, 'hi', 'hello', 1, 3, '2020-06-15 03:24:58'),
(6, '', '', 1, 5, '2020-06-15 05:06:57'),
(7, 'hey this is admin', 'admin here', 1, 9, '2020-06-21 02:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_time`) VALUES
(1, 'dibs', 'dibs@gmail.com', 'asdfg', '2020-06-15 05:23:20'),
(2, 'dibyendu', 'dibyendu@gamil.com', '$2y$10$WhmLtx0Z5BsaNXLeQRKkAenEw1rhNwhltvDg1hxPdf0', '2020-06-15 05:41:05'),
(3, 'rohit', 'dibyendu@gmail.com', '$2y$10$ZZZP1ZzCJxKWCD3zaY06wu8nXipEcNJP0NJCtTRHOgj', '2020-06-15 05:41:30'),
(4, 'rohan', 'ro@gans', '$2y$10$qX13epanwpeLZSUOf3fvH.0JRbIkoaxzunYtS1WPG5n', '2020-06-15 05:57:08'),
(5, 'deep', 'deep@as', '$2y$10$zTNiCk4/r1IT3onzrTb1KOsh0y6KK60OpjuTMQs4lBT', '2020-06-15 06:25:31'),
(6, 'asdfg', 'asdfg@h', '$2y$10$/LI8xCdGVoBUKpg.18jb5.fzKTj6ta5ODh8It6ZFVxK', '2020-06-15 06:28:18'),
(7, 'asd', 'asd@f', 'asd', '2020-06-15 06:40:55'),
(8, 'harry', 'harry@mail', 'asdfg', '2020-06-17 16:40:57'),
(9, 'admin', 'admin@g', 'admin', '2020-06-21 02:56:44'),
(10, 'admin2', 'admin2@g', '$2y$10$5Fy.mdmJlnTDOJ3lp61ZluFmqddq5IY8qLmqL0NNQXu', '2020-06-21 03:01:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `title` (`title`,`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
