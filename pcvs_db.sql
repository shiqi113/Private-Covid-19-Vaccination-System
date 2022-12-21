-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 03:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcvs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `vaccinationID` int(11) NOT NULL,
  `v_ID` int(11) NOT NULL,
  `patient` varchar(50) NOT NULL,
  `ic` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `batchNo` varchar(50) NOT NULL,
  `vaccineName` varchar(20) NOT NULL,
  `centerID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `registered_date` date NOT NULL,
  `usedVaccineDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`vaccinationID`, `v_ID`, `patient`, `ic`, `date`, `batchNo`, `vaccineName`, `centerID`, `status`, `remark`, `registered_date`, `usedVaccineDate`) VALUES
(1, 1, 'tan shi qi', '000113-01-1268', '2021-11-13', 'FG2975', 'Pfizer', 1, 'Administered', 'done(9.28pm)', '2021-11-13', '2021-11-13'),
(2, 1, 'tan shi qi', '000113-01-1268', '2021-11-27', 'FG2975', 'Pfizer', 1, 'Administered', 'done(9.42pm)', '2021-11-13', '2021-11-27'),
(3, 5, 'test', '000113-01-1111', '2021-11-13', '202105064K', 'Sinovac', 1, 'Administered', 'done(9.49pm)', '2021-11-13', '2021-11-13'),
(4, 7, 'test', '000113-01-1111', '2021-11-27', '2021060510', 'Sinovac', 1, 'Administered', 'done(9.50pm)', '2021-11-13', '2021-11-27'),
(5, 9, 'test2', '000113-01-2222', '2021-11-13', 'A1013', 'AstraZeneca', 1, 'Administered', 'done(10.19pm)', '2021-11-13', '2021-11-13'),
(6, 9, 'test2', '000113-01-2222', '2021-11-27', 'A1013', 'AstraZeneca', 1, 'Administered', 'done(10.24pm)', '2021-11-13', '2021-11-27'),
(7, 15, 'test3', '000113-01-3333', '2021-11-16', '202105064K', 'Sinovac', 2, 'Administered', 'done(10.31pm)', '2021-11-13', '2021-11-13'),
(8, 15, 'test3', '000113-01-3333', '2021-11-30', '202105064K', 'Sinovac', 2, 'Confirmed', '', '2021-11-13', '0000-00-00'),
(9, 14, 'test4', '000113-01-4444', '2021-11-18', 'FG6272', 'Pfizer', 2, 'Administered', 'done(10.34pm)', '2021-11-13', '2021-11-13'),
(10, 13, 'test4', '000113-01-4444', '2021-12-02', 'FG2975', 'Pfizer', 2, 'Confirmed', '', '2021-11-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `centerID` int(11) NOT NULL,
  `centername` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`centerID`, `centername`, `address`) VALUES
(1, 'Hospital Pulau Pinang', 'Jalan Residensi, 10990 George Town, Pulau Pinang  '),
(2, 'Hospital Sungai Buluh', 'Jalan Hospital, 47000 Sungai Buloh, Selangor ');

-- --------------------------------------------------------

--
-- Table structure for table `healcareadmin`
--

CREATE TABLE `healcareadmin` (
  `adminID` int(11) NOT NULL,
  `centerID` int(11) NOT NULL,
  `center` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `staffID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healcareadmin`
--

INSERT INTO `healcareadmin` (`adminID`, `centerID`, `center`, `address`, `username`, `password`, `fullname`, `email`, `staffID`) VALUES
(1, 1, 'Hospital Pulau Pinang', 'Jalan Residensi, 10990 George Town, Pulau Pinang  ', 'hppadmin', '88888888', 'tanshiqi', 'tanshiqi924@yahoo.com', 'hsp001'),
(2, 1, 'Hospital Pulau Pinang', 'Jalan Residensi, 10990 George Town, Pulau Pinang   ', 'hppadmin1', '88888888', 'tanshiqi', 'tanshiqi9424@yahoo.com', 'hsp002'),
(3, 2, 'Hospital Sungai Buluh', 'Jalan Hospital, 47000 Sungai Buloh, Selangor ', 'hsbadmin', '88888888', 'tanshiqi', 'tanshiqi9824@yahoo.com', 'hsb001'),
(4, 2, 'Hospital Sungai Buluh', 'Jalan Hospital, 47000 Sungai Buloh, Selangor  ', 'hsbadmin1', '88888888', 'tanshiqi', 'tanshiqi96624@yahoo.com', 'hsb002');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `ic` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vaccinationStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `username`, `password`, `fullname`, `ic`, `phone`, `email`, `vaccinationStatus`) VALUES
(1, 'shiqitan', '88888888', 'tan shi qi', '000113-01-1268', '01110972113', 'tanshiqi924@yahoo.com', 0),
(2, 'test', '88888888', 'test', '000113-01-1111', '01110971111', 'tanshiqi9424@yahoo.com', 0),
(3, 'test2', '88888888', 'test2', '000113-01-2222', '01110972222', 'tanshiqi222@yahoo.com', 0),
(4, 'test3', '88888888', 'test3', '000113-01-3333', '01110973333', 'tanshiqi333@yahoo.com', 1),
(5, 'test4', '88888888', 'test4', '000113-01-4444', '01110974444', 'tanshiqi444@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `ID` int(11) NOT NULL,
  `vaccineID` varchar(30) NOT NULL,
  `vaccineName` varchar(30) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `batchNo` varchar(30) NOT NULL,
  `expireDate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `availableQuantity` int(11) NOT NULL,
  `penAppointment` int(11) NOT NULL,
  `admAppointment` int(11) NOT NULL,
  `centerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`ID`, `vaccineID`, `vaccineName`, `manufacturer`, `batchNo`, `expireDate`, `quantity`, `availableQuantity`, `penAppointment`, `admAppointment`, `centerID`) VALUES
(1, 'V0001', 'Pfizer', 'USA', 'FG2975', '2021-12-31', 200, 198, 0, 2, 1),
(2, 'V0001', 'Pfizer', 'USA', 'FG4421', '2021-12-31', 200, 200, 0, 0, 1),
(3, 'V0001', 'Pfizer', 'USA', 'FG6272', '2021-12-31', 300, 300, 0, 0, 1),
(4, 'V0001', 'Pfizer', 'USA', 'FG9019', '2021-12-31', 400, 400, 0, 0, 1),
(5, 'V0002', 'Sinovac', 'China', '202105064K', '2022-01-25', 300, 299, 0, 1, 1),
(6, 'V0002', 'Sinovac', 'China', '202106057P', '2022-01-25', 200, 200, 0, 0, 1),
(7, 'V0002', 'Sinovac', 'China', '2021060510', '2022-01-25', 500, 499, 0, 1, 1),
(8, 'V0002', 'Sinovac', 'China', '2021060760N', '2021-12-25', 300, 300, 0, 0, 1),
(9, 'V0003', 'AstraZeneca', 'UK', 'A1013', '2021-12-25', 200, 197, 0, 2, 1),
(10, 'V0003', 'AstraZeneca', 'UK', 'A1044', '2021-12-25', 400, 400, 0, 0, 1),
(11, 'V0003', 'AstraZeneca', 'UK', 'A1071', '2021-12-25', 200, 200, 0, 0, 1),
(12, 'V0003', 'AstraZeneca', 'UK', 'D004A', '2021-12-25', 500, 500, 0, 0, 1),
(13, 'V0001', 'Pfizer', 'USA', 'FG2975', '2021-12-31', 500, 500, 1, 0, 2),
(14, 'V0001', 'Pfizer', 'USA', 'FG6272', '2021-12-31', 300, 299, 0, 1, 2),
(15, 'V0002', 'Sinovac', 'China', '202105064K', '2022-01-25', 400, 399, 1, 1, 2),
(16, 'V0002', 'Sinovac', 'China', '202106057P', '2022-01-25', 200, 200, 0, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`vaccinationID`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`centerID`);

--
-- Indexes for table `healcareadmin`
--
ALTER TABLE `healcareadmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `vaccinationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `centerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `healcareadmin`
--
ALTER TABLE `healcareadmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
