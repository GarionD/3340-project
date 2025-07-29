-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2025 at 11:30 PM
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
  `department` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `age`, `email`, `phone`, `department`, `status`) VALUES
(1, 'Julie', 20, 'julie@gmail.com', '276-475-3788', 'accounting', 'active'),
(2, 'Jane', 46, 'jane@gmail.com', '321-555-1874', 'marketing', 'active'),
(3, 'John', 24, 'john@gmail.com', '298-443-7210', 'programming', 'active'),
(4, 'Tom', 46, 'tom@gmail.com', '315-912-4381', 'sales', 'active'),
(5, 'Kate', 54, 'kate@gmail.com', '226-784-1120', 'testing', 'active'),
(6, 'Marisa', 30, 'marisa@gmail.com', '403-657-2231', 'reception', 'active'),
(7, 'Troy', 52, 'troy@gmail.com', '613-209-8735', 'accounting', 'active'),
(8, 'Tori', 27, 'tori@gmail.com', '705-482-9944', 'marketing', 'active'),
(9, 'Jess', 41, 'jess@gmail.com', '289-337-2233', 'testing', 'active'),
(10, 'Paulina', 21, 'paulina@gmail.com', '519-673-1010', 'sales', 'active'),
(11, 'Mina', 48, 'mina@gmail.com', '613-444-7851', 'programming', 'active'),
(12, 'Jake', 31, 'jake@gmail.com', '416-901-2743', 'reception', 'active'),
(13, 'Randy', 35, 'randy@gmail.com', '905-333-9221', 'accounting', 'active'),
(14, 'Joy', 60, 'joy@gmail.com', '343-888-2271', 'sales', 'active'),
(15, 'Nate', 53, 'nate@gmail.com', '613-712-1134', 'marketing', 'active'),
(16, 'Brenda', 25, 'brenda@gmail.com', '289-555-7862', 'programming', 'active'),
(17, 'Cane', 27, 'cane@gmail.com', '807-123-5412', 'testing', 'active'),
(18, 'Warren', 42, 'warren@gmail.com', '519-321-7871', 'reception', 'active'),
(19, 'Kass', 27, 'kass@gmail.com', '647-231-0043', 'sales', 'active'),
(20, 'Andy', 31, 'andy@gmail.com', '226-009-7731', 'accounting', 'active'),
(21, 'Erin', 56, 'erin@gmail.com', '613-559-0038', 'marketing', 'active');

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
