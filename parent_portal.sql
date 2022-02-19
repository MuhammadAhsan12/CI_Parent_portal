-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 07:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_student`
--

CREATE TABLE `add_student` (
  `id` int(11) NOT NULL,
  `stdid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_student`
--

INSERT INTO `add_student` (`id`, `stdid`, `name`, `email`, `phone`, `dob`, `address`, `subject`, `campus`, `created_at`, `updated_at`) VALUES
(1, 12343, 'Muhmmad Ahsan', 'ahan.muh123@gmail.com', 2147483647, '2022-02-11', 'l-155 sec 15/A', 'English', 'Gulshan', '2022-02-14 10:09:00', '2022-02-19 07:03:03'),
(3, 1233, 'ahsan', 'm.ahsan@cedar.edu.pk', 2147483647, '2022-02-10', 'l-155 sec 15/A ', 'Music', 'PECHS', '2022-02-14 10:11:12', '2022-02-16 05:54:57'),
(14, 1235, 'ahsan', '1.m@gmail.com', 2147483647, '2022-02-17', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-14 09:39:47', '2022-02-16 05:59:45'),
(20, 1567, 'ahsan', 'admin@techlozi.com', 2147483647, '2022-02-09', 'l-155 sec 15/A ', 'Arts', 'PECHS', '2022-02-14 10:01:51', '2022-02-16 05:54:22'),
(21, 13579, 'ahsan', 'wq@wqqw', 2147483647, '2022-02-07', 'l-155 sec 15/A ', 'Urdu', 'Clifton', '2022-02-14 10:07:52', '2022-02-16 05:54:06'),
(22, 14796, 'Muhmmad Ahsan', 'ahsan.muh123@gmail.com', 2147483647, '2022-02-06', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-14 10:14:28', '2022-02-16 05:58:22'),
(23, 13678, 'kashif', 'k@gmail.com', 2147483647, '2022-02-02', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-15 09:29:48', '2022-02-16 05:53:28'),
(24, 22325, 'w', 'ab@gmail.com', 2147483647, '2022-02-05', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-15 10:18:42', '2022-02-16 05:51:32'),
(26, 123321, 'asad', 's@gmail.com', 2147483647, '2022-02-01', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-16 05:44:09', '2022-02-16 05:45:59'),
(27, 12344, 'kaleem', 'kaleem@gmail.com', 2147483647, '2022-02-10', 'l-155 sec 15/A ', 'Science', 'PECHS', '2022-02-16 06:01:46', '0000-00-00 00:00:00'),
(33, 3331, 'ahsan', 'assaa@gmail.com', 2147483647, '2022-02-11', 'l-155 sec 15/A ', 'English', 'Gulshan', '2022-02-19 07:02:55', '2022-02-19 07:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `campus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `campus`) VALUES
(1, 'Gulshan'),
(2, 'PECHS'),
(5, 'Clifton');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`) VALUES
(1, 'English'),
(2, 'Pst'),
(3, 'Urdu'),
(4, 'Science'),
(5, 'Arts'),
(6, 'Music'),
(7, 'Rebotics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Muhmmad Ahsan', 'ahan.muh123@gmail.com', 'ahsan'),
(4, 'Admin', 'm.ahsan@cedar.edu.pk', 'ahsan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_student`
--
ALTER TABLE `add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT for table `add_student`
--
ALTER TABLE `add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
