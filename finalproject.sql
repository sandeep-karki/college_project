-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:52 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `full_marks`
--

CREATE TABLE `full_marks` (
  `fullmarks_id` int(11) NOT NULL,
  `asst_full` varchar(11) NOT NULL,
  `th_full` int(11) NOT NULL,
  `pr_full` varchar(10) DEFAULT NULL,
  `sub_code` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `full_marks`
--

INSERT INTO `full_marks` (`fullmarks_id`, `asst_full`, `th_full`, `pr_full`, `sub_code`) VALUES
(5, '20', 60, '20', 'CSC301'),
(6, '20', 60, '20', 'CSC302'),
(7, '20', 80, '-', 'CSC303'),
(8, '20', 60, '20', 'CSC304'),
(9, '20', 60, '20', 'CSC307'),
(10, '20', 60, '20', 'CSC313'),
(11, '-', 0, '0', 'CSC303');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(3, 'sandeep', 'sandeep');

-- --------------------------------------------------------

--
-- Table structure for table `majmin`
--

CREATE TABLE `majmin` (
  `id` int(11) NOT NULL,
  `major_minor` varchar(150) NOT NULL,
  `symbol_num` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majmin`
--

INSERT INTO `majmin` (`id`, `major_minor`, `symbol_num`, `sub_code`) VALUES
(1, 'major', 5303, 'CSC307'),
(2, 'minor', 5303, 'CSC313'),
(6, 'major', 5304, 'CSC313'),
(7, 'minor', 5304, 'CSC307');

-- --------------------------------------------------------

--
-- Table structure for table `pass_marks`
--

CREATE TABLE `pass_marks` (
  `passmarks_id` int(11) NOT NULL,
  `asst_pass` int(11) NOT NULL,
  `th_pass` int(11) NOT NULL,
  `pr_pass` varchar(10) DEFAULT NULL,
  `sub_code` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_marks`
--

INSERT INTO `pass_marks` (`passmarks_id`, `asst_pass`, `th_pass`, `pr_pass`, `sub_code`) VALUES
(1, 8, 24, '8', 'CSC301'),
(2, 8, 24, '8', 'CSC302'),
(3, 8, 32, '-', 'CSC303'),
(4, 8, 24, '8', 'CSC304'),
(5, 8, 24, '8', 'CSC307'),
(6, 8, 24, '8', 'CSC313');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `symbol_num` int(11) NOT NULL,
  `registration_num` varchar(150) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `college_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_num` bigint(20) NOT NULL,
  `batch` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`symbol_num`, `registration_num`, `student_name`, `college_name`, `email`, `contact_num`, `batch`, `id`) VALUES
(5303, '5-2-1180-21-2014', 'sandeep karki', '   sagarmatha college of science and technology   ', 'karkisandeep12@gmail.com', 9866952760, 2071, 0),
(5304, '5-2-1180-20-2014', 'kushal bhattarai', ' himalayan college of science and technology', 'karkisandeep870@gmail.com', 9866952706, 2071, 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `symbol_num` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sem_id` int(11) DEFAULT NULL,
  `sub_code` varchar(20) DEFAULT NULL,
  `th_marks` varchar(11) DEFAULT NULL,
  `pr_marks` varchar(10) DEFAULT NULL,
  `asst_marks` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`symbol_num`, `id`, `sem_id`, `sub_code`, `th_marks`, `pr_marks`, `asst_marks`) VALUES
(5304, 87, 5, 'CSC301', '30', '18', '16'),
(5304, 88, 5, 'CSC302', '31', '17', '17'),
(5304, 89, 5, 'CSC303', '30', '-', '16'),
(5304, 90, 5, 'CSC304', '30', '19', '15'),
(5304, 91, 5, 'CSC307', '40', '19', '18'),
(5304, 92, 5, 'CSC313', '35', '19', '20');

-- --------------------------------------------------------

--
-- Table structure for table `sem_detail`
--

CREATE TABLE `sem_detail` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_detail`
--

INSERT INTO `sem_detail` (`sem_id`, `sem_name`) VALUES
(1, 'first'),
(2, 'second'),
(3, 'third'),
(4, 'fourth'),
(5, 'fifth'),
(6, 'sixth'),
(7, 'seventh'),
(8, 'eighth');

-- --------------------------------------------------------

--
-- Table structure for table `subject_detail`
--

CREATE TABLE `subject_detail` (
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(50) DEFAULT NULL,
  `sem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_detail`
--

INSERT INTO `subject_detail` (`sub_code`, `sub_name`, `sem_id`) VALUES
('CSC109', 'Introduction to Information Technology', 1),
('CSC110', 'C Programming', 1),
('CSC111', 'Digital Logic', 1),
('CSC160', 'Discrete Structure', 2),
('CSC162', 'Microprocessor', 2),
('CSC165', 'Object Oriented Programming', 2),
('CSC206', 'Data Structure and Algorithms', 3),
('CSC207', 'Numerical Method', 3),
('CSC208', 'Computer Architecture', 3),
('CSC209', 'Computer Graphics', 3),
('CSC257', 'Theory of Computation', 4),
('CSC259', 'Operating Systems', 4),
('CSC260', 'Database Management System', 4),
('CSC301', 'Computer Networks', 4),
('CSC302', 'Simulation and Modeling', 5),
('CSC303', 'Design and Analysis of Algorithms', 5),
('CSC304', 'Artificial Intelligence', 4),
('CSC307', 'egovernance', 5),
('CSC313', 'Cryptography', 5),
('CSC315', 'System Analysis and Design', 5),
('CSC318', 'Web Technology', 5),
('CSC319', 'Multimedia Computing ', 5),
('CSC320', 'Wireless Networking', 5),
('CSC321', 'Image Processing', 5),
('CSC322', 'Knowledge Managemen', 5),
('CSC324', 'Microprocessor Based Design', 5),
('CSC364', 'Software Engineering', 6),
('CSC365', 'Complier Design and Construction', 6),
('CSC366', 'E-Governance', 6),
('CSC367', 'NET Centric Computing', 6),
('CSC368', 'Technical Writing', 6),
('CSC369', 'Applied Logic', 6),
('CSC370', 'E-commerce ', 6),
('CSC371', 'Automation and Robotics', 6),
('CSC372', 'Neural Networks', 6),
('CSC373', 'Computer Hardware Design', 6),
('CSC374', 'Cognitive Science \r\n', 6),
('CSC409', 'Advanced Java Programming', 7),
('CSC410', 'Data Warehousing and Data Mining', 7),
('CSC411', 'Principles of Management', 7),
('CSC412', 'Project Work', 7),
('CSC413', 'Information Retrieval', 7),
('CSC414', 'Database Administration', 7),
('CSC415', 'Software Project Management ', 7),
('CSC416', 'Network Securit', 7),
('CSC417', 'Digital System Design', 7),
('CSC461', 'Advanced Database', 8),
('CSC462', 'Internship', 8),
('CSC463', 'Advanced Networking with IPV6', 8),
('CSC464', 'Distributed Networking \r\n', 8),
('CSC465', 'Game Technology ', 8),
('CSC466', 'Distributed and Object Oriented Database', 8),
('CSC467', 'Introduction to Cloud  Computing ', 8),
('CSC468', 'Geographical Information System', 8),
('CSC469', 'Decision Support System and Expert System', 8),
('CSC470', 'Mobile Application Development', 8),
('CSC471', 'Real Time Systems', 8),
('CSC472', 'Network and System Administration', 8),
('CSC473', 'Embedded Systems Programming \r\n', 8),
('MGT418', 'International Marketing ', 7),
('MGT474', 'International Business Management', 8),
('MTH112', 'Mathematics I', 1),
('MTH163', 'Mathematics II', 2),
('PHY113', 'Physics', 1),
('STA164', 'Statistics I', 2),
('STA210', 'Statistics II', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `full_marks`
--
ALTER TABLE `full_marks`
  ADD PRIMARY KEY (`fullmarks_id`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majmin`
--
ALTER TABLE `majmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `symbol_num` (`symbol_num`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `pass_marks`
--
ALTER TABLE `pass_marks`
  ADD PRIMARY KEY (`passmarks_id`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`symbol_num`),
  ADD UNIQUE KEY `contact_num` (`contact_num`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `symbol_num` (`symbol_num`),
  ADD KEY `sub_code` (`sub_code`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `sem_detail`
--
ALTER TABLE `sem_detail`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `subject_detail`
--
ALTER TABLE `subject_detail`
  ADD PRIMARY KEY (`sub_code`),
  ADD KEY `sem_id` (`sem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `full_marks`
--
ALTER TABLE `full_marks`
  MODIFY `fullmarks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majmin`
--
ALTER TABLE `majmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pass_marks`
--
ALTER TABLE `pass_marks`
  MODIFY `passmarks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `full_marks`
--
ALTER TABLE `full_marks`
  ADD CONSTRAINT `full_marks_ibfk_1` FOREIGN KEY (`sub_code`) REFERENCES `subject_detail` (`sub_code`);

--
-- Constraints for table `majmin`
--
ALTER TABLE `majmin`
  ADD CONSTRAINT `majmin_ibfk_1` FOREIGN KEY (`symbol_num`) REFERENCES `registration` (`symbol_num`),
  ADD CONSTRAINT `majmin_ibfk_2` FOREIGN KEY (`sub_code`) REFERENCES `subject_detail` (`sub_code`);

--
-- Constraints for table `pass_marks`
--
ALTER TABLE `pass_marks`
  ADD CONSTRAINT `pass_marks_ibfk_1` FOREIGN KEY (`sub_code`) REFERENCES `subject_detail` (`sub_code`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`symbol_num`) REFERENCES `registration` (`symbol_num`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`sub_code`) REFERENCES `subject_detail` (`sub_code`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`sem_id`) REFERENCES `sem_detail` (`sem_id`);

--
-- Constraints for table `subject_detail`
--
ALTER TABLE `subject_detail`
  ADD CONSTRAINT `subject_detail_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `sem_detail` (`sem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
