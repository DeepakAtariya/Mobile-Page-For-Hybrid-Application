-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 06:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `serviceproduct_table`
--

CREATE TABLE `serviceproduct_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `NodalPerson` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceproduct_table`
--

INSERT INTO `serviceproduct_table` (`id`, `name`, `NodalPerson`, `email`) VALUES
(1, 'Mycorrhizae-based biofertilizers', 'Dr. Reena Singh', 'd@gmail.com'),
(2, 'Bollcure Biopesticide', 'Not being pursued right now - To be hidden on website ', 'd@gmail.com'),
(3, 'High-quality planting material through micropropagation', 'Dr. Nidhi Chanana', 'd@gmail.com'),
(4, 'Biomass gasifier for heat and power generation applications', 'Mr. Sunil Dhingra', 'd@gmail.com'),
(5, 'Smokeless, clean combustion cookstoves', 'Mr. Debajit Palit/Mr. Manish Pandey', 'd@gmail.com'),
(6, 'Oilzapper', 'Mr Veeranna Channashettar', 'd@gmail.com'),
(7, 'TEAM', 'Mr. Dinesh Pant', 'd@gmail.com'),
(8, 'Ceramic membranes for treating industrial waste', 'Dr. Malini Balakrishnan', 'd@gmail.com'),
(9, 'Energy performance benchmarking', 'Mr. Sachin Kumar', 'd@gmail.com'),
(10, 'Energy efficient and environment-friendly solutions', 'Mr. Alekhya Dutta', 'd@gmail.com'),
(11, 'CSR engagements to provide clean energy solutions', 'Mr. Amit Thakur', 'd@gmail.com'),
(12, 'Impact evaluation of CSR intiatives', 'Mr. Amit Thakur', 'd@gmail.com'),
(13, 'Policy research on the role of resources in national and global sustainable development', 'Dr. Divya Datt', 'd@gmail.com'),
(14, 'Multidisciplinary research and policy advice', 'Dr. Divya Datt', 'd@gmail.com'),
(15, 'Technology for reclaming wastelands', 'Dr Prakashkiran S Pawar', 'd@gmail.com'),
(16, 'Next generation technology to produce high-quality mycorrhiza', 'Dr. Reena Singh', 'd@gmail.com'),
(17, 'Climate change risk assessment', 'Mr. Karan Mangotra', 'd@gmail.com'),
(18, 'Carbon sequestration potential and biodiversity assessment', 'Mr. Siddharth Edake', 'd@gmail.com'),
(19, 'Capacity building for management of natural resources', 'Dr Yogesh Gokhale', 'd@gmail.com'),
(20, 'Enhanced oil recovery from mature oil reserves', 'Mr Veeranna Channashettar', 'd@gmail.com'),
(21, 'Multidisciplinary research on natural resource conservation', 'Dr. S K Sarkar', 'd@gmail.com'),
(22, 'Environmental design consultancy and advisory services', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com'),
(23, 'Training & Capacity Building', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com'),
(24, 'Resource conservation study/ energy audit/energy management programme', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com'),
(25, 'Research & development', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com'),
(26, 'Project Monitoring Unit', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com'),
(27, 'Policy intervention and analysis', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organisation` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `enquiry` text NOT NULL,
  `serviceProduct` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Id`, `name`, `organisation`, `email`, `mobile`, `enquiry`, `serviceProduct`) VALUES
(1, 'a', 'a', 'sample111@sample.com', '8377077777', 'asdadasdas', 2),
(2, 'd', 'd', 'sample111@sample.com', '8377077777', 'asdqweqfq', 2),
(3, 'd', 'fa', 'sample111@sample.com', '8377077777', '3fdsasfas', 3),
(4, 'a', 'asd', 'sample111@sample.com', '8377077777', 'sssssqqqww', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceproduct_table`
--
ALTER TABLE `serviceproduct_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `serviceProduct` (`serviceProduct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceproduct_table`
--
ALTER TABLE `serviceproduct_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
