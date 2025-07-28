-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2025 at 05:49 PM
-- Server version: 10.4.34-MariaDB-log
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejongeg_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `age`, `email`, `phone`, `department`) VALUES
(1, 'John', 20, 'john@gmail.com', '276-475-3788', 'accounting'),
(2, 'Tom', 46, 'tom@gmail.com', '321-555-1874', 'marketing'),
(3, 'Julie', 24, 'julie@gmail.com', '298-443-7210', 'programming'),
(4, 'Jane', 46, 'jane@gmail.com', '315-912-4381', 'sales'),
(5, 'Jacob', 54, 'jacob@gmail.com', '226-784-1120', 'testing'),
(6, 'Manny', 30, 'manny@gmail.com', '403-657-2231', 'reception'),
(7, 'Troy', 52, 'troy@gmail.com', '613-209-8735', 'accounting'),
(8, 'Fred', 27, 'fred@gmail.com', '705-482-9944', 'marketing'),
(9, 'Jess', 41, 'jess@gmail.com', '289-337-2233', 'testing'),
(10, 'Paul', 21, 'paul@gmail.com', '519-673-1010', 'sales'),
(11, 'Matt', 48, 'matt@gmail.com', '613-444-7851', 'programming'),
(12, 'Jake', 31, 'jake@gmail.com', '416-901-2743', 'reception'),
(13, 'Randy', 35, 'randy@gmail.com', '905-333-9221', 'accounting'),
(14, 'Joy', 60, 'joy@gmail.com', '343-888-2271', 'sales'),
(15, 'Nate', 53, 'nate@gmail.com', '613-712-1134', 'marketing'),
(16, 'Ben', 25, 'ben@gmail.com', '289-555-7862', 'programming'),
(17, 'Cane', 27, 'cane@gmail.com', '807-123-5412', 'testing'),
(18, 'Yen', 42, 'yen@gmail.com', '519-321-7871', 'reception'),
(19, 'Kass', 27, 'kass@gmail.com', '647-231-0043', 'sales'),
(20, 'Andy', 31, 'andy@gmail.com', '226-009-7731', 'accounting'),
(21, 'Erin', 56, 'erin@gmail.com', '613-559-0038', 'marketing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
