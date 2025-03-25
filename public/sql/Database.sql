SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE admin;

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Middletname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Contactno` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Accesslevel` enum('admin','user') DEFAULT 'user',
  `Status` enum('active','disabled') DEFAULT 'active',
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

  ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;