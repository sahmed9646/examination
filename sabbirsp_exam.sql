-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2020 at 08:29 AM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabbirsp_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `ansId` int(11) NOT NULL,
  `questionNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT 0,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`ansId`, `questionNo`, `rightAns`, `answer`) VALUES
(1, 1, 0, 'Less than 6 months'),
(2, 1, 0, '1 year to less than 3 years'),
(3, 1, 1, '3 years to less than 5 years'),
(4, 1, 0, '5 years or more'),
(5, 2, 0, 'Every day'),
(6, 2, 1, 'Every week'),
(7, 2, 0, 'Every 2 - 3 weeks'),
(8, 2, 0, 'Every month'),
(9, 3, 0, 'Very likely'),
(10, 3, 0, 'Somewhat likely'),
(11, 3, 0, 'Neutral'),
(12, 3, 1, 'Somewhat unlikely'),
(13, 4, 0, 'Very likely'),
(14, 4, 0, 'Somewhat likely'),
(15, 4, 1, 'Neutral'),
(16, 4, 0, 'Somewhat unlikely'),
(17, 5, 1, 'Very likely'),
(18, 5, 0, 'Somewhat likely'),
(19, 5, 0, 'Neutral'),
(20, 5, 0, 'unlikely');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `questionId` int(11) NOT NULL,
  `questionNo` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`questionId`, `questionNo`, `question`) VALUES
(1, 1, 'How long have you used\r\nour products/service?'),
(2, 2, 'How frequently do you purchase\r\nfrom us?'),
(3, 3, 'How would you rate your\r\noverall satisfaction with us?'),
(4, 4, 'How likely is it that you would recommend us to a friend/colleague?'),
(5, 5, 'Do you have any suggestions for improving our products/ services?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(32) NOT NULL,
  `userName` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `fullName`, `userName`, `password`, `email`, `status`) VALUES
(1, 'Sabbir Ahmed', 'sabbir', '202cb962ac59075b964b07152d234b70', 'sabbir@gmail.com', 0),
(2, 'ahmed sumon', 'ahmed', '202cb962ac59075b964b07152d234b70', 'ahmed@gmail.com', 0),
(3, 'sumon ahmed', 'sumon', '202cb962ac59075b964b07152d234b70', 'sumon@gmail.con', 0),
(4, 'jabed ahmed', 'jabed', '202cb962ac59075b964b07152d234b70', 'jabed@gmail.com', 0),
(5, 'Asif ahmed', 'asif', '202cb962ac59075b964b07152d234b70', 'asif@gmail.com', 0),
(6, 'Shahed Ahmed', 'shahed', '202cb962ac59075b964b07152d234b70', 'shahed@gmail.com', 0),
(7, 'sabbir', 'sabbir1', '496afd89a952492adf3e630ee9eb06f7', 'sabbir1@gmail.com', 0),
(8, 'Jabed Ahmed', 'asdf', 'c44a471bd78cc6c2fea32b9fe028d30a', 'ajabed396@gmail.com', 0),
(9, 'YTRLcmzmbN www.yandex.ru/42', 'YTRLcmzmbN www.yandex.ru/42', '80d9897608ab7da8939d2b8ce4da2f51', 'artemmakd5@mail.ru', 0),
(10, 'sabbir', 'sabbir', 'e10adc3949ba59abbe56e057f20f883e', 'sabbir9646@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`ansId`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`questionId`);

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
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `ansId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
