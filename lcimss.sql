-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcimss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('lawyer', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `caseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `date`, `time`, `clientid`, `lawyerid`, `caseid`) VALUES
(1, '0001-01-01', 2, 1, 1, 1),
(2, '0001-01-01', 2, 2, 2, 2),
(3, '0001-01-01', 2, 3, 3, 3),
(4, '0001-01-01', 2, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `caseid` int(11) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `case_description` text NOT NULL,
  `evidence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`caseid`, `lawyerid`, `case_description`, `evidence`) VALUES
(1, 1, 'No description', 'No evidence'),
(2, 2, 'No description', 'No evidence'),
(3, 3, 'No description', 'No evidence'),
(4, 4, 'No description', 'No evidence');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `picture` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL,
  `cnic` varchar(400) NOT NULL,
  `phone` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `picture`, `name`, `cnic`, `phone`, `email`, `description`) VALUES
(1, 'images/Screenshot (2).png', 'Siddiq Akbar', '4240104164389', '03454813604', 'siddiqakbar932@gmail.com', 'No description'),
(7, 'images/Screenshot (2).png', 'Siddiq Akbar', '4240104164389', '03454813604', 'siddiqakbar932@gmail.com', 'No description'),
(8, 'images/Screenshot (2).png', 'Siddiq Akbar', '4240104164389', '03454813604', 'siddiqakbar932@gmail.com', 'No description');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `accountid` int(11) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `caseid` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `paid` int(11) NOT NULL,
  `unpaid` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`accountid`, `lawyerid`, `clientid`, `caseid`, `address`, `date`, `paid`, `unpaid`, `total`) VALUES
(0, 1, 1, 0, '1', '2024-12-18', 500, 500, 1000),
(1, 1, 1, 1, 'chalyar', '2024-12-10', 500, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `lawyerid` int(11) NOT NULL,
  `licenseNo` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`lawyerid`, `licenseNo`, `qualification`, `experience`) VALUES
(1, 3, 'LLB', '5 Year experience'),
(2, 2, 'LLB', '5 Year experience');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentid`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `lawyerid` (`lawyerid`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`caseid`),
  ADD KEY `lawyerid` (`lawyerid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`accountid`),
  ADD KEY `lawyerid` (`lawyerid`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `caseid` (`caseid`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`lawyerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `appointment` (`appointmentid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`lawyerid`) REFERENCES `appointment` (`appointmentid`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`caseid`) REFERENCES `appointment` (`appointmentid`);

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`lawyerid`) REFERENCES `cases` (`caseid`);

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`lawyerid`) REFERENCES `finance` (`accountid`),
  ADD CONSTRAINT `finance_ibfk_2` FOREIGN KEY (`clientid`) REFERENCES `finance` (`accountid`),
  ADD CONSTRAINT `finance_ibfk_3` FOREIGN KEY (`caseid`) REFERENCES `finance` (`accountid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
