-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 22, 2022 at 08:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sasfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pwd`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announce_id` int(20) NOT NULL,
  `announce_title` varchar(100) NOT NULL,
  `announce_desc` varchar(1000) NOT NULL,
  `std_sem` varchar(100) NOT NULL,
  `due_date` varchar(10000) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tch_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announce_id`, `announce_title`, `announce_desc`, `std_sem`, `due_date`, `status`, `timestamp`, `tch_id`, `branch_id`, `subject`) VALUES
(1, 'python', 'kjsaxlisalx', '1', '2022-08-25', 0, '2022-08-19 07:46:27', 1, 1, 'Python'),
(2, 'functions', 'asjnxlajs', '2', '2022-09-20', 0, '2022-08-19 07:47:09', 1, 1, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `assignmnt`
--

CREATE TABLE `assignmnt` (
  `as_id` int(20) NOT NULL,
  `as_title` varchar(100) DEFAULT NULL,
  `as_desc` varchar(500) DEFAULT NULL,
  `as_status` tinyint(1) DEFAULT NULL,
  `as_file` varchar(100) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `announce_id` int(20) DEFAULT NULL,
  `tch_id` int(11) DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignmnt`
--

INSERT INTO `assignmnt` (`as_id`, `as_title`, `as_desc`, `as_status`, `as_file`, `file_path`, `timestamp`, `announce_id`, `tch_id`, `std_id`) VALUES
(1, 'python', 'ajdxjoiaodxa', 0, 'newfile/PYTHON.pdf', 'newfile/', '2022-08-19 07:48:45', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'BCA'),
(2, 'BCOM'),
(3, 'BSc'),
(4, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `std_tch` varchar(100) DEFAULT NULL,
  `msg` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `name`, `branch`, `email`, `std_tch`, `msg`) VALUES
(1, 'divi', 'BCA', 'divi@gmail.com', 'Student', 'asxkasjlxjals');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(20) NOT NULL,
  `fb_content` varchar(5000) NOT NULL,
  `std_id` int(11) NOT NULL,
  `tch_id` int(11) DEFAULT NULL,
  `tch_name` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `as_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `fb_content`, `std_id`, `tch_id`, `tch_name`, `timestamp`, `as_id`) VALUES
(1, 'askjnxlajsxliss', 1, 1, 'vidya', '2022-08-19 08:39:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) DEFAULT NULL,
  `std_no` int(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `std_sem` varchar(100) NOT NULL,
  `std_email` varchar(50) DEFAULT NULL,
  `std_pwd` varchar(200) DEFAULT NULL,
  `std_phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_no`, `branch`, `std_sem`, `std_email`, `std_pwd`, `std_phone`) VALUES
(1, 'divi', 1001, 'BCA', '1', 'divi@gmail.com', '123456', NULL),
(2, 'maggi', 1002, 'BCOM', '1', 'maggi@gmail.com', '123456', NULL),
(3, 'akki', 1003, 'BCA', '2', 'akki@gmail.com', '123456', NULL),
(4, 'ashu', 1004, 'BCOM', '2', 'ashu@gmail.com', '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tch_id` int(11) NOT NULL,
  `tch_name` varchar(50) DEFAULT NULL,
  `tch_emailid` varchar(50) DEFAULT NULL,
  `tch_pwd` varchar(200) DEFAULT NULL,
  `branch_name` varchar(20) DEFAULT '',
  `tch_phone` varchar(100) DEFAULT NULL,
  `tsubject` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tch_id`, `tch_name`, `tch_emailid`, `tch_pwd`, `branch_name`, `tch_phone`, `tsubject`) VALUES
(1, 'vidya', 'vidya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BCA', '9900299002', 'python'),
(2, 'ananya', 'ananya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BCOM', '9900399003', 'ecommerce');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announce_id`),
  ADD KEY `tch_id` (`tch_id`),
  ADD KEY `sub_id` (`branch_id`);

--
-- Indexes for table `assignmnt`
--
ALTER TABLE `assignmnt`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announce_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignmnt`
--
ALTER TABLE `assignmnt`
  MODIFY `as_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
