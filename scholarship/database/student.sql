-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 11:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college_name` text NOT NULL,
  `state_id` int(11) DEFAULT 1,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `state_id`, `district_id`) VALUES
(1, 'srinivas', 1, 42),
(2, 'nmam', 1, 58),
(3, 'MVJ', 1, 36),
(4, 'Dayanandh sagar', 1, 36),
(5, 'Nitte meenakshi', 1, 36),
(6, 'St.Joseph', 1, 42),
(7, 'MIT', 1, 58),
(8, 'MITT', 1, 42),
(9, 'Sri devi', 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `district_name` text NOT NULL,
  `state_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `state_id`) VALUES
(32, 'Bagalkote', 1),
(33, 'Ballary', 1),
(34, 'Belagavi', 1),
(35, 'Bengaluru Rural', 1),
(36, 'Bengaluru Urban', 1),
(37, 'Bidar', 1),
(38, 'Chamarajanagara', 1),
(39, 'Chikkaballapura', 1),
(40, 'Chikkamagaluru', 1),
(41, 'Chitradurga', 1),
(42, 'Dakshina Kannada', 1),
(43, 'Davanagere', 1),
(44, 'Dharwad', 1),
(45, 'Gadag', 1),
(46, 'Hassan', 1),
(47, 'Haveri', 1),
(48, 'Kalaburagi', 1),
(49, 'Kodagu', 1),
(50, 'Kolara', 1),
(51, 'Koppala', 1),
(52, 'Mandya', 1),
(53, 'Mysuru', 1),
(54, 'Ramanagara', 1),
(55, 'Raichur', 1),
(56, 'Shivamogga', 1),
(57, 'Tumakuru', 1),
(58, 'Udupi', 1),
(59, 'Uttara Kannada', 1),
(60, 'Vijayanagara', 1),
(61, 'Vijayapura', 1),
(62, 'Yadgiri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `date` date NOT NULL,
  `msg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`date`, `msg`) VALUES
('2023-12-14', 'scholarship open now.'),
('2023-12-14', 'scholarship is open now.');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `scholarship_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `scholarship_name`, `start_date`, `end_date`) VALUES
(1, 'nitte scholarship', '2023-10-28', '2023-12-30'),
(2, 'ssp', '2022-02-01', '2022-07-06'),
(3, 'bangalore scholarsship', '2023-12-06', '2024-02-13'),
(4, 'ssp', '2023-12-05', '2024-01-23'),
(5, 'MHRD', '2023-11-10', '2024-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `name` varchar(255) NOT NULL,
  `Occ` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `ph` bigint(20) NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`name`, `Occ`, `ad`, `ph`, `amt`) VALUES
('subhash', 'it', 'byndoor', 8961327602, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`) VALUES
(1, 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` bigint(20) NOT NULL,
  `selected_scholarship` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `gn` char(10) NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `cn` bigint(10) NOT NULL,
  `cls` text NOT NULL,
  `course` text NOT NULL,
  `year` varchar(50) NOT NULL,
  `bnh` text NOT NULL,
  `rn` bigint(20) NOT NULL,
  `mark` decimal(10,2) NOT NULL,
  `income` bigint(20) NOT NULL,
  `ad` varchar(500) NOT NULL,
  `dis` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `gn` char(10) NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `adhar` text NOT NULL,
  `cn` bigint(10) NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `college` text NOT NULL,
  `cls` text NOT NULL,
  `course` text NOT NULL,
  `year` varchar(50) NOT NULL,
  `bnh` text NOT NULL,
  `rn` bigint(20) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `fname`, `gn`, `dob`, `email`, `adhar`, `cn`, `state`, `district`, `college`, `cls`, `course`, `year`, `bnh`, `rn`, `role`) VALUES
('admin', '', '', '0000-00-00', 'admin@gmail.com', '0', 0, '', '', '', '', '', '', '', 123456, 'admin'),
('sandeep', 'shridhar', 'Male', '2023-12-01', 'sandeep@gmail.com', '321456987123', 2587413690, 'karnataka', 'Dakshina Kannada', 'srinivas', 'PUC', 'Commerce', 'II year', 'CS', 951159, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`ph`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rn` (`rn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`rn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud`
--
ALTER TABLE `stud`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `colleges_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `stud`
--
ALTER TABLE `stud`
  ADD CONSTRAINT `stud_ibfk_1` FOREIGN KEY (`rn`) REFERENCES `user` (`rn`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
