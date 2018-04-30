-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 04:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecofriendlycars`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_table`
--

CREATE TABLE `car_table` (
  `id` int(11) NOT NULL,
  `car` varchar(100) NOT NULL,
  `fueltype` text NOT NULL,
  `efficiency` varchar(100) NOT NULL,
  `ratings` int(11) NOT NULL,
  `description` text NOT NULL,
  `imagepath` varchar(300) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `newpath` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_table`
--

INSERT INTO `car_table` (`id`, `car`, `fueltype`, `efficiency`, `ratings`, `description`, `imagepath`, `extension`, `newpath`) VALUES
(14, 'Tesla', 'electric', '99%', 1, 'gfjkhkl', '../images/uploadedcars/Teslamainground.jpg', 'jpg', 'images/uploadedcars/Teslamainground.jpg'),
(15, 'new', 'hj', 'jh', 5, 'kjhlk;k', '../images/uploadedcars/new2018_Toyota_Camry_Hybrid_211.jpg', 'jpg', 'images/uploadedcars/new2018_Toyota_Camry_Hybrid_211.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forumconv`
--

CREATE TABLE `forumconv` (
  `id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `username` varchar(40) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forumconv`
--

INSERT INTO `forumconv` (`id`, `comment`, `username`, `postid`) VALUES
(1, 'this is commenting check attempt 3', 'nkr', 1),
(2, 'after succesful attempt this one is for confirmation', 'nkr', 2),
(3, 'let me comment', 'piyush', 1),
(4, 'radhey king comments here', 'piyush', 1),
(5, 'this is second check', 'piyush', 2),
(6, 'yeah! I commented here man', 'radhey', 1),
(7, 'yo! man radhey wat the heal is this , man', 'nkr', 6),
(8, 'ramro chha', 'i', 9),
(9, 'i also ', 'i', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forumquery`
--

CREATE TABLE `forumquery` (
  `id` int(11) NOT NULL,
  `status` longtext NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forumquery`
--

INSERT INTO `forumquery` (`id`, `status`, `username`) VALUES
(1, 'so lets check this out', 'nkr'),
(2, 'this is another \r\ntest for the post of post in\r\ncommunity forum', 'nkr'),
(3, 'Piyush has posted this post', 'piyush'),
(4, 'hey why this was not posted\r\nit should have been', 'radhey'),
(5, 'let me check jbasj kjskjh  qkjwd hkjshdkl kj dkjhakjsdkl  dkjhaskj dhklk adsakj dlk hdkl jdlkajs', 'radhey'),
(7, 'hvbj,\r\nvbn,m.\r\nnbnmnm,\r\nbvcvbbnmbnmb\r\nvcbnnn', 'radhey'),
(8, 'check check', 'nkr'),
(9, 'How is Tesla ?', 'i');

-- --------------------------------------------------------

--
-- Table structure for table `userfav`
--

CREATE TABLE `userfav` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `carname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfav`
--

INSERT INTO `userfav` (`id`, `username`, `carname`) VALUES
(1, 'nam', 'vc'),
(3, 'i', 'Tesla'),
(4, 'i', 'Tesla'),
(5, 'i', 'new'),
(6, 'i', 'Tesla'),
(7, 'i', 'Tesla');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `address`, `postal`, `gender`, `dob`, `email`, `phone`, `username`, `password`, `usertype`) VALUES
(2, 'niranjan subedi', 'multiverse', 'kathmandu', 'male', '2018-01-12', 'nkrsubedi@gmail.com', '98498153', 'nkr', 'passnkr', 'admin'),
(4, 'piyuhs', 'addd', 'pos', 'male', '2018-01-09', 'piyush@p.com', '54657', 'piyush', 'passpiyush', 'user'),
(5, 'piyuhs', 'addd', 'pos', 'male', '2018-01-09', 'piyush@p.com', '54657', 'piyush', '', 'user'),
(6, 'piyuhs', 'addd', 'pos', 'male', '2018-01-09', 'piyush@p.com', '54657', 'piyush', 'password', 'user'),
(8, 'i', 'm', 'new', 'male', '2018-01-11', 'u@u.com', 's', 'e', 'r', 'user'),
(9, 'radhey', 'nepal', 'nepal', 'male', '2018-01-09', 'rk@kk.com', '5678979', 'radhey', 'passradhey', 'user'),
(10, 'n', 'n', 'n', 'others', '2016-01-01', 'nm@m.com', '67', 'i', 'p', 'user'),
(11, 'n', 'n', 'n', 'male', '2018-01-01', 'nm@m.com', '67', 'in', 'vdghj', 'user'),
(12, 'n', 'n', 'n', 'male', '2018-01-01', 'nm@m.com', '67', 'ini', 'popo', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `viewer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `viewer`) VALUES
(1, 190);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_table`
--
ALTER TABLE `car_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumconv`
--
ALTER TABLE `forumconv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumquery`
--
ALTER TABLE `forumquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfav`
--
ALTER TABLE `userfav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_table`
--
ALTER TABLE `car_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `forumconv`
--
ALTER TABLE `forumconv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forumquery`
--
ALTER TABLE `forumquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `userfav`
--
ALTER TABLE `userfav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
