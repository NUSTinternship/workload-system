-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 06:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competition`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'hubert', '123456', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `administrativetasks`
--

CREATE TABLE `administrativetasks` (
  `id` int(11) NOT NULL,
  `TaskName` varchar(255) NOT NULL,
  `TaskCode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrativetasks`
--

INSERT INTO `administrativetasks` (`id`, `TaskName`, `TaskCode`, `description`, `CreationDate`) VALUES
(1, 'Meeting Administrator', 'MAD111', 'Handle All Meeting Tasks.', '2021-10-16 12:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(11) NOT NULL,
  `CommunityName` varchar(255) NOT NULL,
  `CommunityCode` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseCode` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `CourseName`, `CourseCode`, `CreationDate`) VALUES
(1, 'Database Programming', 'DPG621s', '2021-10-15 21:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `mycommunity`
--

CREATE TABLE `mycommunity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycommunity`
--

INSERT INTO `mycommunity` (`id`, `name`, `description`, `emp_id`, `created`) VALUES
(1, 'Jan Mohr Secondary School Outreach', 'Visit Jan Mohr Secondary school and give a Seminar on Cyber Bullying and its side effects. \r\nDate 20 October 2021', 12, '2021-10-16 11:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `mycourses`
--

CREATE TABLE `mycourses` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `Theory` int(11) NOT NULL,
  `Practical` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `coursecoordinator` varchar(255) NOT NULL,
  `NoOfStudents` int(11) NOT NULL,
  `NoOfGroups` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycourses`
--

INSERT INTO `mycourses` (`id`, `course`, `coursecode`, `Theory`, `Practical`, `emp_id`, `coursecoordinator`, `NoOfStudents`, `NoOfGroups`, `Timestamp`) VALUES
(1, 'Database Programming', 'DPG621s', 1, 0, 12, 'John Doe', 200, 10, '2021-10-15 22:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `myresearch`
--

CREATE TABLE `myresearch` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myresearch`
--

INSERT INTO `myresearch` (`id`, `Name`, `description`, `emp_id`, `created`) VALUES
(1, '3 E\'s for Africa', 'Working to improve the quality of living for Africans all over the world.', 12, '2021-10-16 11:23:52'),
(2, 'Unite Africa ', 'Moving to eradicate inequality in Africa.', 12, '2021-10-16 11:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `mytasks`
--

CREATE TABLE `mytasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mytasks`
--

INSERT INTO `mytasks` (`id`, `name`, `emp_id`, `description`, `created`) VALUES
(0, 'Meeting Administrator', 12, 'Take charge of scheduling meetings,formulating agendas and handling meeting minutes.', '2021-10-16 11:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `researchprojects`
--

CREATE TABLE `researchprojects` (
  `id` int(11) NOT NULL,
  `ProjectName` varchar(255) NOT NULL,
  `ProjectCode` varchar(255) NOT NULL,
  `ProjectDescription` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentNo` int(11) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `StudentSurname` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `SupervisorId` int(11) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentNo`, `StudentName`, `StudentSurname`, `Type`, `SupervisorId`, `CreationDate`) VALUES
(1, 'Jacob', 'Zuma', 'Masters', 12, '2021-10-15 22:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `CreationDate`) VALUES
(5, 'Computing & Informatics', 'FCI', '2021-10-16 12:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `Phonenumber`, `RegDate`, `role`, `location`) VALUES
(10, 'Hubert', 'Mouton', 'hmou@gmail.com', '8f29971e57bcead61420c7da8eff93de', 'male', '10 February 2000', 'ICT', 'h park', '0818872158', '2021-09-16 10:50:59', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(11, 'Vemuna', 'Kaurimuje', 'VM@gmail.com', '9c40b571a45a4530d52529b72bce9ca7', 'female', '01 September 2021', 'FCI', 'h park', '0818872158', '2021-09-16 10:52:49', 'HOD', 'NO-IMAGE-AVAILABLE.jpg'),
(12, 'Vetara', 'Kaurimuje', 'VK@gmail.com', 'b70e2a0d855b4dc7b1ea34a8a9d10305', 'male', '02 September 2021', 'FCI', 'h park', '0818872158', '2021-09-16 10:53:42', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(13, 'Faith', 'Doe', 'FD@gmail.com', 'Faith', 'Female', '10-03-1999', 'FCI', 'TA', '0811294645', '2021-10-16 15:44:43', 'DVC', 'NO-IMAGE-AVAILABLE.jpg'),
(14, 'Marcus', 'Philander', 'MP@gmail.com', 'Marcus', 'Male', '05-06-1982', 'FCI', 'Julius Street', '081996626', '2021-10-16 15:44:43', 'Dean', 'NO-IMAGE-AVAILABLE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculties`
--

CREATE TABLE `tblfaculties` (
  `id` int(11) NOT NULL,
  `FacultyName` varchar(255) NOT NULL,
  `FacultyShortName` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfaculties`
--

INSERT INTO `tblfaculties` (`id`, `FacultyName`, `FacultyShortName`, `CreationDate`) VALUES
(1, 'Faculty of Computing & Informatics', 'FCI', '2021-10-15 18:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrativetasks`
--
ALTER TABLE `administrativetasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycommunity`
--
ALTER TABLE `mycommunity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `mycourses`
--
ALTER TABLE `mycourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `myresearch`
--
ALTER TABLE `myresearch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `mytasks`
--
ALTER TABLE `mytasks`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `researchprojects`
--
ALTER TABLE `researchprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentNo`),
  ADD KEY `fk_supervisorId` (`SupervisorId`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblfaculties`
--
ALTER TABLE `tblfaculties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administrativetasks`
--
ALTER TABLE `administrativetasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mycommunity`
--
ALTER TABLE `mycommunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mycourses`
--
ALTER TABLE `mycourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myresearch`
--
ALTER TABLE `myresearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `researchprojects`
--
ALTER TABLE `researchprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblfaculties`
--
ALTER TABLE `tblfaculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mycommunity`
--
ALTER TABLE `mycommunity`
  ADD CONSTRAINT `mycommunity_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tblemployees` (`emp_id`);

--
-- Constraints for table `mycourses`
--
ALTER TABLE `mycourses`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `tblemployees` (`emp_id`);

--
-- Constraints for table `myresearch`
--
ALTER TABLE `myresearch`
  ADD CONSTRAINT `myresearch_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tblemployees` (`emp_id`);

--
-- Constraints for table `mytasks`
--
ALTER TABLE `mytasks`
  ADD CONSTRAINT `mytasks_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `tblemployees` (`emp_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_supervisorId` FOREIGN KEY (`SupervisorId`) REFERENCES `tblemployees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
