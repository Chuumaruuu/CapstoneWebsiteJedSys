-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 02:53 PM
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
-- Database: `cv_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `ID` int(11) NOT NULL,
  `CredentialName` varchar(255) NOT NULL,
  `Institution` varchar(255) DEFAULT NULL,
  `YearObtained` int(11) DEFAULT NULL,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `ID` int(11) NOT NULL,
  `Income` decimal(15,2) DEFAULT NULL,
  `IsPublic` tinyint(1) NOT NULL DEFAULT 1,
  `Location` varchar(255) DEFAULT NULL,
  `FK_ID_Member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv_viewstats`
--

CREATE TABLE `cv_viewstats` (
  `ViewCount` int(11) DEFAULT 0,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `ID` int(11) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `Duration` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `ID` int(11) NOT NULL,
  `Field` varchar(255) NOT NULL,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `ID` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemLink` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `ID` int(11) NOT NULL,
  `Role` enum('Employee','Employer') NOT NULL,
  `WorkContacts` text DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `CompanyDescription` text DEFAULT NULL,
  `CompanyAddress` varchar(255) DEFAULT NULL,
  `FK_ID_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `PhoneNum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `ID` int(11) NOT NULL,
  `Time` datetime NOT NULL,
  `FK_ID_Viewer` int(11) DEFAULT NULL,
  `FK_ID_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_Member` (`FK_ID_Member`);

--
-- Indexes for table `cv_viewstats`
--
ALTER TABLE `cv_viewstats`
  ADD UNIQUE KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_Users` (`FK_ID_Users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_Viewer` (`FK_ID_Viewer`),
  ADD KEY `FK_ID_CV` (`FK_ID_CV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credentials`
--
ALTER TABLE `credentials`
  ADD CONSTRAINT `credentials_ibfk_1` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`FK_ID_Member`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `cv_viewstats`
--
ALTER TABLE `cv_viewstats`
  ADD CONSTRAINT `cv_viewstats_ibfk_1` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`FK_ID_Users`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`FK_ID_Viewer`) REFERENCES `users` (`ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `view_ibfk_2` FOREIGN KEY (`FK_ID_CV`) REFERENCES `cv` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
