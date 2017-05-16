-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 06:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'Clean separation of design & content'),
(2, 1, 0, 'Minimal code duplication'),
(3, 1, 1, 'Highest priority'),
(4, 1, 0, 'Reduces page download time'),
(5, 2, 0, 'text-decoration line-throw'),
(6, 2, 1, 'Text-decoration in-line'),
(7, 2, 0, 'text-decoration : gyerline'),
(8, 2, 0, 'text-decoration : underline'),
(9, 3, 0, 'Cue'),
(10, 3, 0, 'Voice-family'),
(11, 3, 1, 'Load'),
(12, 3, 0, 'Speak'),
(13, 4, 0, 'Class'),
(14, 4, 1, 'Style'),
(15, 4, 0, 'Span'),
(16, 4, 0, 'Link'),
(41, 5, 0, 'in'),
(42, 5, 0, ' mm'),
(43, 5, 0, 'pc'),
(44, 5, 1, 'pt'),
(45, 6, 0, 'mysql_fetch_row'),
(46, 6, 1, 'mysql_fetch_array'),
(47, 6, 0, 'mysql_fetch_object'),
(48, 6, 0, 'mysql_fetch_assoc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'Which of the following does not apply to external styles?'),
(2, 2, 'Which of the following is not a valid text-decoration option?'),
(3, 3, 'Which of the following is not a valid property of an property of an aural style sheet?'),
(4, 4, 'Which element property is required to define internal styles?'),
(9, 5, 'Which of the following defines a measurement in points?'),
(10, 6, 'How we can retrieve the data in the result set of MySQL using PHP?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Bidhan Sutradhar', 'Bidhanvk', '202cb962ac59075b964b07152d234b70', 'Bidhanvk@gmail.com', 0),
(3, 'Razu saha', 'vkrazu', '202cb962ac59075b964b07152d234b70', 'Razusaha@gmail.com', 1),
(4, 'Hridoy Sutradhar', 'vkhridoy', '202cb962ac59075b964b07152d234b70', 'hridoy@gmail.com', 0),
(5, 'Virat', 'Kohli', '202cb962ac59075b964b07152d234b70', 'Viratkohli@gmail.com', 0),
(6, 'Sumon', 'Sumoncse', '202cb962ac59075b964b07152d234b70', 'sumon@gmail.com', 0),
(7, 'KL Rahul', 'Rahul', '202cb962ac59075b964b07152d234b70', 'klRahul@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
