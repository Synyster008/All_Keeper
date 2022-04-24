-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2022 at 04:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
('101', 'Manav', 'hello', '1');

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
  `req_status` tinyint(1) NOT NULL DEFAULT 0,
  `report_id` int(11) DEFAULT NULL,
  `feedback_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cleanrequest`
--

INSERT INTO `cleanrequest` (`request_id`, `rollnumber`, `worker_id`, `date`, `cleaningtime`, `req_status`, `report_id`, `feedback_id`) VALUES
(4370, 1000, 1014, '2022-03-14', '18:02:00', 2, 26, 20);

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
(19, 20, 1000, 'ewfefer');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryguy`
--

CREATE TABLE `deliveryguy` (
  `deliveryguy_id` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'qwerty',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `delivery_completed` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryguy`
--

INSERT INTO `deliveryguy` (`deliveryguy_id`, `name`, `password`, `startDate`, `endDate`, `schedule`, `delivery_completed`) VALUES
(3, 'sahil', 'qwerty', '2022-04-01', '2022-04-30', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryreport`
--

CREATE TABLE `deliveryreport` (
  `report_id` int(11) NOT NULL,
  `report` varchar(255) NOT NULL,
  `time_in` time NOT NULL,
  `storerequest_id` int(11) NOT NULL,
  `deliveryguy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryreport`
--

INSERT INTO `deliveryreport` (`report_id`, `report`, `time_in`, `storerequest_id`, `deliveryguy_id`) VALUES
(1, 'azsx', '21:48:00', 12, 4);

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
(20, 1000, 4370, 2, '18:40:00', '17:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeper`
--

CREATE TABLE `housekeeper` (
  `worker_id` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `floor` tinyint(4) NOT NULL,
  `rooms_cleaned` int(5) DEFAULT 0,
  `complaints` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `schedule` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `housekeeper`
--

INSERT INTO `housekeeper` (`worker_id`, `name`, `floor`, `rooms_cleaned`, `complaints`, `password`, `startDate`, `endDate`, `schedule`) VALUES
(1013, 'aman', 1, 1, 0, 'qwerty', '2022-03-31', '2022-04-30', '1'),
(1014, 'sam', 1, 1, 1, 'qwerty', '2022-03-31', '2022-04-30', '2');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report` varchar(255) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `request_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report`, `time_in`, `time_out`, `request_id`, `worker_id`) VALUES
(26, 'gyhgjgh', '17:39:00', '17:44:00', 4370, 1014);

-- --------------------------------------------------------

--
-- Table structure for table `storekeeper`
--

CREATE TABLE `storekeeper` (
  `storekeeper_id` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'qwerty',
  `hostel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storekeeper`
--

INSERT INTO `storekeeper` (`storekeeper_id`, `username`, `password`, `hostel`) VALUES
(1, 'farhan', 'qwerty', '1');

-- --------------------------------------------------------

--
-- Table structure for table `storerequest`
--

CREATE TABLE `storerequest` (
  `storerequest_id` int(12) NOT NULL,
  `rollnumber` int(12) NOT NULL,
  `deliveryguy_id` varchar(12) DEFAULT NULL,
  `reqdate` date NOT NULL,
  `requesttime` time NOT NULL,
  `delivery` varchar(11) NOT NULL,
  `req_status` tinyint(1) NOT NULL DEFAULT 0,
  `reqpen` varchar(32) NOT NULL DEFAULT '0',
  `reqpencil` varchar(32) NOT NULL DEFAULT '0',
  `reqeraser` varchar(32) NOT NULL DEFAULT '0',
  `reqnotebook` varchar(32) NOT NULL DEFAULT '0',
  `reqsharpner` varchar(32) NOT NULL DEFAULT '0',
  `reqcalculator` varchar(32) NOT NULL DEFAULT '0',
  `reqpapers` varchar(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storerequest`
--

INSERT INTO `storerequest` (`storerequest_id`, `rollnumber`, `deliveryguy_id`, `reqdate`, `requesttime`, `delivery`, `req_status`, `reqpen`, `reqpencil`, `reqeraser`, `reqnotebook`, `reqsharpner`, `reqcalculator`, `reqpapers`) VALUES
(22, 1000, NULL, '2022-04-30', '16:05:00', 'Pickup', 2, 'Pen-3', 'Pencil-3', 'Eraser-2', 'Notebook-1', '', '', 'Papers-4');

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
(1000, '12345', '5', 5, 3),
(1010, '12345', '101', 1, 1),
(1011, '12345', '102', 1, 1);

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
(19, 20, 1000, 'werfewfew');

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
-- Indexes for table `deliveryguy`
--
ALTER TABLE `deliveryguy`
  ADD PRIMARY KEY (`deliveryguy_id`);

--
-- Indexes for table `deliveryreport`
--
ALTER TABLE `deliveryreport`
  ADD PRIMARY KEY (`report_id`);

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
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `storekeeper`
--
ALTER TABLE `storekeeper`
  ADD PRIMARY KEY (`storekeeper_id`);

--
-- Indexes for table `storerequest`
--
ALTER TABLE `storerequest`
  ADD PRIMARY KEY (`storerequest_id`);

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
  MODIFY `request_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4382;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deliveryguy`
--
ALTER TABLE `deliveryguy`
  MODIFY `deliveryguy_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deliveryreport`
--
ALTER TABLE `deliveryreport`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `housekeeper`
--
ALTER TABLE `housekeeper`
  MODIFY `worker_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `storekeeper`
--
ALTER TABLE `storekeeper`
  MODIFY `storekeeper_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storerequest`
--
ALTER TABLE `storerequest`
  MODIFY `storerequest_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
