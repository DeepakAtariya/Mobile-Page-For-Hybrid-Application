-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 07:58 AM
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
(1, 'Mycorrhizae-based biofertilizers', 'Dr. Reena Singh', 'reenas@teri.res.in'),
(2, 'Bollcure Biopesticide', 'Not being pursued right now - To be hidden on website ', 'pradeepd@teri.res.in'),
(3, 'High-quality planting material through micropropagation', 'Dr. Nidhi Chanana', 'nidhi@teri.res.in'),
(4, 'Biomass gasifier for heat and power generation applications', 'Mr. Sunil Dhingra', 'dhingras@teri.res.in'),
(5, 'Smokeless, clean combustion cookstoves', 'Mr. Debajit Palit/Mr. Manish Pandey', 'debajitp@teri.res.in'),
(6, 'Oilzapper', 'Mr Veeranna Channashettar', 'veerac@teri.res.in'),
(7, 'TEAM', 'Mr. Dinesh Pant', 'dpant@teri.res.in'),
(8, 'Ceramic membranes for treating industrial waste', 'Dr. Malini Balakrishnan', 'malinib@teri.res.in'),
(9, 'Energy performance benchmarking', 'Mr. Sachin Kumar', 'sachink@teri.res.in'),
(10, 'Energy efficient and environment-friendly solutions', 'Mr. Alekhya Dutta', 'alekhya.datta@teri.res.in'),
(11, 'CSR engagements to provide clean energy solutions', 'Mr. Amit Thakur', 'akthakur@teri.res.in'),
(12, 'Impact evaluation of CSR intiatives', 'Mr. Amit Thakur', 'akthakur@teri.res.in'),
(13, 'Policy research on the role of resources in national and global sustainable development', 'Dr. Divya Datt', 'divyad@teri.res.in'),
(14, 'Multidisciplinary research and policy advice', 'Dr. Divya Datt', 'divyad@teri.res.in'),
(15, 'Technology for reclaming wastelands', 'Dr Prakashkiran S Pawar', 'prakashkiran.pawar@teri.res.in'),
(16, 'Next generation technology to produce high-quality mycorrhiza', 'Dr. Reena Singh', 'reenas@teri.res.in'),
(17, 'Climate change risk assessment', 'Mr. Karan Mangotra', 'Karan.Mangotra@teri.res.in'),
(18, 'Carbon sequestration potential and biodiversity assessment', 'Mr. Siddharth Edake', 'siddharth.edake@teri.res.in'),
(19, 'Capacity building for management of natural resources', 'Dr Yogesh Gokhale', 'yogeshg@teri.res.in'),
(20, 'Enhanced oil recovery from mature oil reserves', 'Mr Veeranna Channashettar', 'veerac@teri.res.in'),
(21, 'Multidisciplinary research on natural resource conservation', 'Dr. S K Sarkar', 'SK.Sarkar@teri.res.in'),
(22, 'Environmental design consultancy and advisory services', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org'),
(23, 'Training & Capacity Building', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org'),
(24, 'Resource conservation study/ energy audit/energy management programme', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org'),
(25, 'Research & development', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org'),
(26, 'Project Monitoring Unit', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org'),
(27, 'Policy intervention and analysis', 'Mr. Akash Deep/Ms. Shabnam Bassi', 'akashdeep@grihaindia.org');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `Id` int(11) NOT NULL,
  `salut` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `organisation` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `enquiry` text NOT NULL,
  `serviceProduct` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Id`, `salut`, `first_name`, `last_name`, `organisation`, `email`, `mobile`, `enquiry`, `serviceProduct`) VALUES
(1, 'Mr.', 'a', 'b', 'teri', 'abc@gmail.com', '82277271727', 'enquiry', 1),
(2, '1', 'aaa', 'aaaa', 'a', 'sample@sample.com', '8377077777', 'asdadqfwerg', 2),
(3, '1', 'aa', 'aa', 'se', 'deepak@sample.com', '8377077777', 'ggggg', 3),
(4, 'Ms.', 'aa', 'aaa', 'asd', 'sample@sample.com', '8377077777', 'aa', 4);

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
