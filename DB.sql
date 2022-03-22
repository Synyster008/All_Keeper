-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 07:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housekeeping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hostel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `hostel`) VALUES
('101', 'Manav', 'hello', '1'),
('102', 'Atousa', 'hi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cleanrequest`
--

CREATE TABLE `cleanrequest` (
  `request_id` int(12) NOT NULL,
  `rollnumber` int(12) NOT NULL,
  `worker_id` int(12) DEFAULT NULL,
  `date` date NOT NULL,
  `cleaningtime` time NOT NULL,
  `req_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cleanrequest`
--

INSERT INTO `cleanrequest` (`request_id`, `rollnumber`, `worker_id`, `date`, `cleaningtime`, `req_status`) VALUES
(4334, 1010, 6, '2022-02-23', '19:14:00', 2),
(4335, 1010, 6, '2022-02-22', '22:39:00', 2),
(4336, 1010, 6, '2022-02-16', '21:44:00', 2),
(4337, 1010, NULL, '2022-02-15', '07:30:00', 0),
(4338, 1010, NULL, '2022-02-28', '21:32:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(12) NOT NULL,
  `feedback_id` int(12) NOT NULL,
  `rollnumber` int(12) NOT NULL,
  `complaint` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `feedback_id`, `rollnumber`, `complaint`) VALUES
(1, 0, 1010, 'sfghghsghdf'),
(2, 2, 1010, 'ASDASDASDADAS'),
(3, 3, 1010, 'sdfsdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(12) NOT NULL,
  `rollnumber` int(12) NOT NULL,
  `request_id` int(12) NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `rollnumber`, `request_id`, `rating`, `timein`, `timeout`) VALUES
(1, 1010, 4334, 4, '22:15:00', '13:18:00'),
(2, 1010, 4335, 3, '12:44:00', '15:44:00'),
(3, 1010, 4336, 2, '22:45:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper`
--

CREATE TABLE `housekeeper` (
  `worker_id` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hostel` tinyint(5) NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `rooms_cleaned` int(5) NOT NULL,
  `complaints` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housekeeper`
--

INSERT INTO `housekeeper` (`worker_id`, `name`, `hostel`, `floor`, `rooms_cleaned`, `complaints`) VALUES
(6, 'pankaj', 1, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `rollnumber` int(12) NOT NULL,
  `password` varchar(40) NOT NULL,
  `room` varchar(8) NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `hostel` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollnumber`, `password`, `room`, `floor`, `hostel`) VALUES
(1010, '12345', '101', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `suggestion_id` int(12) NOT NULL,
  `feedback_id` int(12) NOT NULL,
  `rollnumber` int(12) NOT NULL,
  `suggestion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`suggestion_id`, `feedback_id`, `rollnumber`, `suggestion`) VALUES
(1, 0, 1010, 'adaSDASD'),
(2, 2, 1010, 'SDASDASDAS'),
(3, 3, 1010, 'fgszdfdsxfs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cleanrequest`
--
ALTER TABLE `cleanrequest`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `housekeeper`
--
ALTER TABLE `housekeeper`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollnumber`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cleanrequest`
--
ALTER TABLE `cleanrequest`
  MODIFY `request_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4339;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `housekeeper`
--
ALTER TABLE `housekeeper`
  MODIFY `worker_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
