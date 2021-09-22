-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 04:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u134789687_ust`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `pword` varchar(70) NOT NULL,
  `access` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `gender`, `pword`, `access`, `status`, `date_added`, `department_id`) VALUES
(1, 'Emmer Grace', 'Delos Santos', 'Logronio', 'emmer.logronio@ust.edu.ph', '090900911111', 1, '$2y$10$k2oxCzIaYgLGjksYPwEWfecrh.wQUul1PBCvoqIksUcNx3ce/Bc/K', 1, '0', '2021-04-11 16:35:46', 1),
(30, 'Faith Ann', 'De Guzman', 'Vidallo', 'faith.vidallo@ust.edu.ph', '09154123108', 1, '$2y$10$zT2sNvJ2YV3wUkrh7SE03..ckqFajBjp5Nn.yCcxHtJMINdnWWF3W', 1, '1', '2021-02-13 19:38:32', 1),
(31, 'Krizzia Mae', 'Padelan', 'Padernal', 'krizzia.padernal@ust.edu.ph', '09225874492', 1, '$2y$10$DssoSOyCnIoXyrXf6X/Y1OlXdfwYCAx0Dcfi86u.cILhxn/4MxBXy', 1, '1', '2021-02-13 19:47:34', 1),
(32, 'Ian Paul', 'De Guzman', 'Cantada', 'ian.cantada@ust.edu.ph', '09154123108', 0, '$2y$10$dg1hMnh.yiI5H3rTvp4lEe.oyxHpZMkqCWJilOee6B2pKlwoc0Wi2', 1, '1', '2021-02-13 19:48:19', 1),
(33, 'Ezekiel', 'Paulate', 'Laresma', 'ezekiel.laresma@ust.edu.ph', '09445218875', 0, '$2y$10$Hix/bOBnvDMNoQZfbgtxzOOhRB7iC578cZL3xJmHd11BB.vLhAZQ.', 1, '1', '2021-02-13 19:49:08', 1),
(34, 'Maynard', 'Aliling', 'Dela Cruz', 'maynard.aliling@ust.edu.ph', '09884153368', 0, '$2y$10$yWeLSmLxBA/lBmFhtkrp7Oknhe/od0WAVtKz8ipbco4ythFZjEKBe', 1, '1', '2021-02-13 19:49:49', 1),
(35, 'Richmond', 'Cruz', 'Cajigas', 'richmond.cajigas@ust.edu.ph', '09154157824', 0, '$2y$10$qJNrChIKZOmNljBnwn2WfuSproDw3QE6dBeYpQVcdV7Q1iQdJ9i5m', 1, '1', '2021-02-13 19:50:54', 1),
(36, 'Caryl', 'Jaime', 'Jaca', 'caryl.jaca@ust.edu.ph', '09223657715', 1, '$2y$10$uGVeZQhZgPhUdQC/2RGHGOfTt3IuLd8YpxPKHSbmdmmjhkGX4PHqO', 0, '1', '2021-02-13 21:12:55', 1),
(37, 'Gerald', 'Kiesse', 'Merced', 'gerald.merced@ust.edu.ph', '09441257795', 0, '$2y$10$5uctcGseqIBL6WYosv8zi.gBD02E/ob2M3KpbLMwr4s2iMN5aS5t.', 0, '1', '2021-02-13 21:13:43', 1),
(38, 'Kenneth', 'Abi', 'Turco', 'kenneth.turco@ust.edu.ph', '09336524495', 0, '$2y$10$N.6xyRxtqStIeExUooihoeQ9MkfGTq0doxLv0M7zJ7CjjTWD6znDu', 0, '0', '2021-02-13 21:14:35', 1),
(39, 'Geraldine', 'Tubera', 'Panceles', 'geraldine.panceles@ust.edu.ph', '09625483659', 1, '$2y$10$.71.sRcM0VHITHUn8dgcBeWTyouERsCaA.qgYOQEBZYIVpYpBRy6.', 0, '0', '2021-02-13 21:15:28', 1),
(40, 'Bernadette Ann', 'Baguio', 'Sarmiento', 'bernadette.sarmiento@ust.edu.ph', '09441579935', 1, '$2y$10$P.KdIeXwwwAWmKil79RnV.U9RXJh8pR14iwZXcze/OfRMzMldP7Uu', 0, '1', '2021-02-13 21:16:19', 1),
(41, 'Jennifer', 'Kito', 'Banga', 'jennifer.banga@ust.edu.ph', '09558741695', 1, '$2y$10$.Zg4XGSd1Bm6FgYCUExZwO5NlA89Uoic/VPA0hsgjhBDcQNZEKGQG', 0, '1', '2021-02-13 21:17:23', 1),
(42, 'Paulo', 'Diaz', 'Cruz', 'paulo.cruz@ust.edu.ph', '09365472298', 0, '$2y$10$8c32L5Rgh.5f33NnLQ04kuqAfyMKl8Eku1KS64ltq/eWxFDDHLNWS', 0, '1', '2021-02-13 21:18:06', 1),
(43, 'Eric John', 'Cruz', 'Mariano', 'eric.mariano@ust.edu.ph', '09775418836', 0, '$2y$10$/s3iK54Ku1UzSgmckHqBc.O3ygBSqWbAsIBspiu0Jn8nBSZQqdLD6', 0, '1', '2021-02-13 21:18:50', 1),
(44, 'Faculty', 'Middle', 'Last', 'faculty.last@ust.edu.ph', '09528593318', 0, '$2y$10$UMtwa38zvnqZkG42J2F2w.q/3EURv9pEjFxi7W8seUaOIMrwu9U7i', 0, '0', '2021-09-12 21:30:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pword` varchar(65) NOT NULL,
  `department` varchar(100) NOT NULL,
  `abbreviation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `uname`, `pword`, `department`, `abbreviation`) VALUES
(1, 'John Doe', 'bsit_admin@ust.edu.ph', '$2y$10$uGVeZQhZgPhUdQC/2RGHGOfTt3IuLd8YpxPKHSbmdmmjhkGX4PHqO', 'Bachelor of Science in Information Technology', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `ip_reg` varchar(20) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(700) NOT NULL,
  `year` varchar(20) NOT NULL,
  `tech_adv` varchar(100) NOT NULL,
  `document` varchar(300) NOT NULL,
  `document_id` varchar(300) NOT NULL,
  `conference` varchar(300) NOT NULL,
  `conference_id` varchar(300) NOT NULL,
  `avp` varchar(300) NOT NULL,
  `avp_id` varchar(300) NOT NULL,
  `code` varchar(300) NOT NULL,
  `code_id` varchar(300) NOT NULL,
  `approval` varchar(300) NOT NULL,
  `approval_id` varchar(300) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `award` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `ip_reg`, `spec_id`, `title`, `author`, `year`, `tech_adv`, `document`, `document_id`, `conference`, `conference_id`, `avp`, `avp_id`, `code`, `code_id`, `approval`, `approval_id`, `keywords`, `award`, `status`, `department_id`, `date_added`) VALUES
(3, '223-456', 3, 'BATTERY-INDEPENDENT MOBILE PHONE BOOT-UP CIRCUIT WITH  ISOLATED UNIVERSAL BATTERY CHARGER', 'Ana Liza R. Publico, Dennis Llander D. Vidar, Ian Paul D. Cantada', '2020', 'MRS. SOCORRO M. ESPAÑOLA', 'Group-7-Final-Document.pdf', '16313557981286070606613c83969e70c', 'August Bill.pdf', '1631355798745042145613c83969e71b', 'N/A', 'N/A', 'N/A', 'N/A', 'Group-7-Final-Document.pdf', '16313557981906215361613c83969e721', 'yea', 1, 1, 1, '2021-09-11 18:23:18'),
(4, '123124-12312321', 3, 'GSM-BASED SENSOR SYSTEM FOR SOLAR DEHYDRATOR IN  MONITORING THE MANGO DRYING PROCESS', 'Krizzia Mae V. Padernal, Geneveve C. Dumlao, Ezekiel P. Laresma', '2020', 'tech adv', 'demo cert.pdf', '1631421294246920551613d836eb81df', 'demo cert 2.pdf', '1631421294311615782613d836eb81e9', 'N/A', 'N/A', 'N/A', 'N/A', 'demo cert 2.pdf', '1631421294832814830613d836eb81f0', '12345', 0, 1, 1, '2021-09-12 12:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `category`, `dept_id`, `date_added`) VALUES
(1, 'Network and Security', 1, '2021-09-12 11:57:18'),
(2, 'Web and Mobile App Development', 1, '2021-09-12 11:57:18'),
(3, 'Robotics', 1, '2021-09-12 11:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
