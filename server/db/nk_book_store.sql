-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 03:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nk_book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Godstime', 'godstimeonyibe@gmail.com', '$2y$10$OZMAS2PXd9eDxDlABi8QkOLzlKzFrYeqEvhu676MTpkcu93vAXqWi'),
(3, 'Godstime Onyibe', 'godstime@gmail.com', '$2y$10$2vfrT/oc.YoW2imMYduDbO0U5kwK6ieOyaAcoM0fSpCueab0bdrIi');

-- --------------------------------------------------------

--
-- Table structure for table `booklists`
--

CREATE TABLE `booklists` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `author` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booklists`
--

INSERT INTO `booklists` (`id`, `name`, `description`, `author`, `price`, `image`) VALUES
(1, 'Compiler Construction', 'Launching his creative career in the late ?50s, Bikash Bhattacharjee stood out among his contemporaries by making hard-edged chiseled realism the core appeal of his canvases when realism.', 'Mmadu Chike', '200', 'calc.PNG'),
(3, 'Naccos Constitution.', ' Bikash?s strengths were his exceptional technical mastery and his power to charge the tangible appearance of the surface with the reality of the depth beneath. He was admired.', 'Skwash Cona', '9000', 'Capture.PNG'),
(4, 'Social Studies', 'His portrait-based images enact the artist?s own experience of our time with all its dark social and moral tones and textures.', 'Sylvester Scot', '677', 'bggenerator.PNG'),
(7, 'Intro to Physio', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 			quis nostrud exercitation ullamco laboris', 'Scot Maker', '2404', 'css.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `bookid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `book` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `bookid`, `username`, `book`, `price`, `quantity`) VALUES
(1, 4, '::1', 'Social Studies', '677', 0),
(2, 4, '::1', 'Social Studies', '677', 0),
(3, 3, '::1', 'Naccos Constitution.', '9000', 0),
(4, 4, 'miriam@gmail.com', 'Social Studies', '677', 4),
(7, 6, 'miriam@gmail.com', 'Intro to Physio', '3500', 1),
(8, 3, 'miriam@gmail.com', 'Naccos Constitution.', '9000', 3),
(9, 1, 'miriam@gmail.com', 'Compiler Construction', '200', 3),
(10, 7, 'miriam@gmail.com', 'Intro to Physio', '2404', 4);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `accountname` varchar(40) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `card` int(20) NOT NULL,
  `cv` int(4) NOT NULL,
  `pin` varchar(256) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `name`, `accountname`, `bank`, `card`, `cv`, `pin`, `time`, `date`) VALUES
(7, '', 'Onyibe Godstime', 'Fcmb', 5555555, 123, '0', '', '23-01-2022'),
(8, '', 'Godstime', 'First City monument ', 2147483647, 888, '$2y$10$FZ26u4jsqK8PzOkSxwtXRegENrgrWDbVbSMLzVWTbhRtwSCZAzGLa', '', '23-01-2022'),
(9, '', 'Basil', 'Zenith Bank', 99839764, 123, '$2y$10$ZNZafSg738oNRMzHAP30HejfTuowwkdmfZIpXUftQkEBi21yM2d1.', '02:25:47  pm', '23-01-2022'),
(10, 'miriam@gmail.com', 'Onyibe Godstime', 'First City monument ', 2147483647, 888, '$2y$10$vcsSe.3N4EPMmaNgHocP0.HO9kL1ldpYapN8tuGrhh.h2HJhHi9XW', '02:35:04  pm', '23-01-2022');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regid` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `email`, `regid`, `password`) VALUES
(4, 'Miriam', '8144657154', 'miriam@gmail.com', 'Ebsu/2016/83904', '$2y$10$AzQXZ2D5hxTYwJdlSfGV6.XkncepdTt5G0RcK2ijty8qZI4D8YudK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booklists`
--
ALTER TABLE `booklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booklists`
--
ALTER TABLE `booklists`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
