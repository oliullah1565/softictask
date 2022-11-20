-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 07:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softic`
--

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reffer_id` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `reffer_id`, `point`, `date`) VALUES
(1, 4, 3, 22, '2022-11-18'),
(2, 5, 3, 22, '2022-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reffer_id` varchar(11) DEFAULT NULL,
  `reffer_code` varchar(255) DEFAULT NULL,
  `utype` varchar(65) DEFAULT 'user',
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `address`, `reffer_id`, `reffer_code`, `utype`, `date`) VALUES
(1, 'oliullah', 'oliullah1565@gmail.com', '5408377518d9f0c512709b595c4b2f9d3ebf49e8', NULL, NULL, NULL, 'admin', '2022-11-18'),
(2, 'NGO', 'ngo@axesgl.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Dhaka', '', 'ZQwtMQX1A2', 'user', '2022-11-18'),
(3, 'rakib', 'rakib@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Dhaka', '', 'euM48MIJYu', 'user', '2022-11-18'),
(4, 'Mafia', 'mafia@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Dhaka', '3', 'ktCjWnpKy3', 'user', '2022-11-18'),
(5, 'shuvo', 'shuvo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Dhaka', '3', 'G64er14end', 'user', '2022-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
