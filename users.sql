-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2017 at 09:21 AM
-- Server version: 10.2.9-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloomcol_nymbldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `state` varchar(256) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `address`, `city`, `state`, `zip`, `userType`, `token`) VALUES
(2, 'test', 'test@test.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'Hous#272-B', 'islamabad', 'ict', 44000, NULL, 'tok_1BHxXo4ze9mDQEKRdx9uTic4'),
(3, 'Zac Folk', 'zacfolk@gmail.com', '411e3652920739e1d141bb6e62e8eb08fbf30af120d4d497bdfadeee3372974a', '123 Ford', 'Denver', 'CO', 80212, NULL, 'tok_1BHydq4ze9mDQEKRXKPoR5cG'),
(4, 'tester', 'tester@mail.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'test address', 'ny', 'Ny', 65714, NULL, 'tok_1BHyfg4ze9mDQEKRcYVP0Swq'),
(5, 'admin', 'admin@nymbl.io', 'd0016e95a1ca051456b0673eebf906fced23d8449b7d307d23abcd0f44a122e5', 'denvor mountain', 'denvor', 'test', 25644, 'admin', 'tok_1BHyi54ze9mDQEKRJsrCgYJb'),
(8, 'Zac Man', 'zac@vulcaneyewear.com', '411e3652920739e1d141bb6e62e8eb08fbf30af120d4d497bdfadeee3372974a', '123 Go', 'Denver', 'CO', 80212, NULL, 'tok_1BIJSg4ze9mDQEKRLAnEFyUW'),
(11, 'shakil', 'shakilgalaxy@gmail.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'Hous#272-B', 'islamabad', 'ict', 44000, NULL, 'tok_1BIJp44ze9mDQEKRDrkJKLFj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
