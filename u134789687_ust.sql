-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2021 at 12:59 PM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'John Malvin', 'bsece@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Electronics Engineering', 'BSECE'),
(3, 'Rajon Rondo', 'bsme@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Mechanical Engineering', 'BSME'),
(4, 'Driggs Ron', 'bscpe@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Computer Engineering', 'BSCPE'),
(5, 'Trixie Mae', 'bsce@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Civil Engineering', 'BSCE'),
(6, 'Ghieann Kim', 'bsie@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Industrial Engineering', 'BSIE'),
(7, 'Dennis Ezekiel', 'bsie@pup.com', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', 'Bachelor of Science in Railway Engineering', 'BSRE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `pword` varchar(70) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `thesis_id` int(11) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stud_id`, `fname`, `mname`, `lname`, `year`, `section`, `email`, `contact`, `gender`, `birth_date`, `pword`, `status`, `date_added`, `thesis_id`, `department_id`) VALUES
(1, '2016-00082-MN-0', 'minecraft', 'Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ ', 'Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ Ñ ', 1, 'Ñ ', 'admission@bene.edu.ph', '090900911111', 1, '2021-04-11', '$2y$10$k2oxCzIaYgLGjksYPwEWfecrh.wQUul1PBCvoqIksUcNx3ce/Bc/K', '2', '2021-04-11 16:35:46', 0, 1),
(30, '2019-00001-MN-0', 'Faith Ann', 'De Guzman', 'Vidallo', 3, '1', 'cheezymozzarella@gmail.com', '09154123108', 1, '1995-02-13', '$2y$10$zT2sNvJ2YV3wUkrh7SE03..ckqFajBjp5Nn.yCcxHtJMINdnWWF3W', '1', '2021-02-13 19:38:32', 13, 1),
(31, '2019-00002-MN-1', 'Krizzia Mae', 'Padelan', 'Padernal', 4, '1', 'krizzia@gmail.com', '09225874492', 1, '1992-02-13', '$2y$10$DssoSOyCnIoXyrXf6X/Y1OlXdfwYCAx0Dcfi86u.cILhxn/4MxBXy', '0', '2021-02-13 19:47:34', 14, 1),
(32, '2019-00003-MN-1', 'Ian Paul', 'De Guzman', 'Cantada', 4, '2', 'ianpaul@gmail.com', '09154123108', 0, '1991-02-13', '$2y$10$dg1hMnh.yiI5H3rTvp4lEe.oyxHpZMkqCWJilOee6B2pKlwoc0Wi2', '1', '2021-02-13 19:48:19', 15, 1),
(33, '2019-00004-MN-0', 'Ezekiel', 'Paulate', 'Laresma', 5, '2', 'ezekiel@gmail.com', '09445218875', 0, '1998-02-13', '$2y$10$Hix/bOBnvDMNoQZfbgtxzOOhRB7iC578cZL3xJmHd11BB.vLhAZQ.', '1', '2021-02-13 19:49:08', 16, 1),
(34, '2019-00005-MN-1', 'Maynard', 'Aliling', 'Dela Cruz', 4, '1', 'maynard@gmail.com', '09884153368', 0, '1999-02-13', '$2y$10$yWeLSmLxBA/lBmFhtkrp7Oknhe/od0WAVtKz8ipbco4ythFZjEKBe', '1', '2021-02-13 19:49:49', 17, 1),
(35, '2019-00006-MN-1', 'Richmond', 'Cruz', 'Cajigas', 4, '1', 'richmond@gmail.com', '09154157824', 0, '2000-02-13', '$2y$10$qJNrChIKZOmNljBnwn2WfuSproDw3QE6dBeYpQVcdV7Q1iQdJ9i5m', '1', '2021-02-13 19:50:54', 18, 1),
(36, '2020-15478-MN-0', 'Caryl', 'Jaime', 'Jaca', 3, '2', 'caryljaca@gmail.com', '09223657715', 1, '1998-02-13', '$2y$10$Qr0rkZ9OyclcUS0FxAQ9nOj3Ut0AiDPauTG1naTqqbdU7cThAtwqe', '1', '2021-02-13 21:12:55', 19, 1),
(37, '2020-85249-MN-1', 'Gerald', 'Kiesse', 'Merced', 5, '2', 'gerald.merced@gmail.com', '09441257795', 0, '1993-02-13', '$2y$10$5uctcGseqIBL6WYosv8zi.gBD02E/ob2M3KpbLMwr4s2iMN5aS5t.', '1', '2021-02-13 21:13:43', 20, 1),
(38, '2020-36527-MN-0', 'Kenneth', 'Abi', 'Turco', 3, '2', 'kennethturks@gmail.com', '09336524495', 0, '1998-02-13', '$2y$10$N.6xyRxtqStIeExUooihoeQ9MkfGTq0doxLv0M7zJ7CjjTWD6znDu', '1', '2021-02-13 21:14:35', 21, 1),
(39, '2020-85416-MN-1', 'Geraldine', 'Tubera', 'Panceles', 5, '2', 'ghe.panceles@gmail.com', '09625483659', 1, '2002-02-13', '$2y$10$.71.sRcM0VHITHUn8dgcBeWTyouERsCaA.qgYOQEBZYIVpYpBRy6.', '1', '2021-02-13 21:15:28', 22, 1),
(40, '2020-63548-MN-1', 'Bernadette Ann', 'Baguio', 'Sarmiento', 4, '1', 'berna.sarmiento@gmail.com', '09441579935', 1, '2001-02-13', '$2y$10$P.KdIeXwwwAWmKil79RnV.U9RXJh8pR14iwZXcze/OfRMzMldP7Uu', '1', '2021-02-13 21:16:19', 23, 1),
(41, '2020-22259-MN-1', 'Jennifer', 'Kito', 'Banga', 5, '1', 'jennifer.banga@gmail.com', '09558741695', 1, '1996-02-13', '$2y$10$.Zg4XGSd1Bm6FgYCUExZwO5NlA89Uoic/VPA0hsgjhBDcQNZEKGQG', '1', '2021-02-13 21:17:23', 24, 1),
(42, '2020-95865-MN-1', 'Paulo', 'Diaz', 'Cruz', 3, '3', 'paulo.cruz@gmail.com', '09365472298', 0, '1997-02-13', '$2y$10$8c32L5Rgh.5f33NnLQ04kuqAfyMKl8Eku1KS64ltq/eWxFDDHLNWS', '1', '2021-02-13 21:18:06', 25, 1),
(43, '2020-48527-MN-1', 'Eric John', 'Cruz', 'Mariano', 4, '3', 'ericjoihn.mariano@gmail.com', '09775418836', 0, '1994-02-13', '$2y$10$/s3iK54Ku1UzSgmckHqBc.O3ygBSqWbAsIBspiu0Jn8nBSZQqdLD6', '1', '2021-02-13 21:18:50', 26, 1),
(48, '2021-12345-MN-1', 'Dennis', 'Ezekiel', 'Vidar', 4, '1', 'cheezymozzarella@gmail.com', '092578411341', 0, '1994-02-13', '$2y$10$j.vknCAFn3y8J26NPcgUgOKBYoTIrk0xHilTOLgkf/Gxbr4kN25XW', '1', '2021-02-20 10:14:30', 44, 1),
(49, 'a', 'a', 'a', 'a', 0, 'a', '', '', 0, '0000-00-00', '', '', '2021-04-16 19:09:40', 0, 1),
(50, 'asdd', 'a', 'a', 'a', 0, 'a', '', '', 0, '0000-00-00', '', '', '2021-04-16 19:11:51', 41, 1),
(51, 'asdsdadasdadsda', 'asd', 'asd', 'dsa', 0, 'asd', '', '', 0, '0000-00-00', '', '', '2021-04-17 13:43:39', 42, 1),
(52, '2027-69982-MN-0', 'first name', 'middle name', 'last name', 3, 'section', 'admission@bene.edu.ph', '019201129102', 0, '2021-04-26', '$2y$10$QbVhmzLWZXID9L5IbUl77eIxQ/5MtB2ZSejOc/6I1OUhY4VK.GO.i', '2', '2021-04-26 14:16:44', 0, 1),
(53, '2026-11082-MN-0', 'Dennis', 'Martinez', 'Vidar', 1, 'aasdsda', 'admission@bene.edu.ph', '09122222222', 0, '2021-04-26', '$2y$10$q2N0UKpRawVcOkcNDkXntuxSmSORXA92O3BzAcKYWyJpzLJFY4Lh6', '2', '2021-04-26 20:34:36', 0, 1),
(57, '2001-00087-MN-1', 'dwadaw', 'dwada', 'wdawdawd', 2, 'daw', 'dennisllandervidar@gmail.com', '0915413108', 1, '2021-03-29', '$2y$10$8cNFRGPH9PGS5GC0BZjGV..d/d9bB09S1I0AD.gRf4Saycwu59L1.', '2', '2021-04-28 19:53:21', 0, 4),
(58, '2001-00087-MN-8', 'llander', 'de guzmaqn', 'vidar', 0, '1', '', '', 0, '0000-00-00', '', '', '2021-04-28 20:03:35', 43, 1),
(59, 'Array', 'Array', 'Array', 'Array', 0, 'Array', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:23:37', 45, 1),
(61, '2112-85416-MN-1', 'asdasdasd', 'asdasdasd', 'asdasdasd', 0, 'asdasdasd', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:30:38', 46, 1),
(62, '2112-85416-MN-2', 'asdasasds', 'asdasdsdaasd', 'asdasdasd', 0, 'sadasdasd', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:30:38', 46, 1),
(63, '2112-85416-MN-3', 'asdasdasd', 'asdasdasd', 'asdasdasd', 0, 'asdasdasd', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:33:09', 47, 1),
(64, '696996969669699', 'asdasdsas', 'sasdasdasd', 'asdasdas', 0, 'asdasdas', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:33:44', 48, 1),
(65, '420020200200200', 'asdads', 'asdasdasdasd', 'asdasdasd', 0, 'asasdasdds', '', '', 0, '0000-00-00', '', '', '2021-04-28 21:33:44', 48, 1),
(66, '2112-85416-MN-8', 'one', 'two', 'three', 0, '2', '', '', 0, '0000-00-00', '', '1', '2021-04-28 22:55:38', 49, 1),
(67, '2112-85416-MN-9', 'two', 'twom', 'twol', 0, '2', '', '', 0, '0000-00-00', '', '1', '2021-04-28 22:55:38', 49, 1),
(68, '2117-85416-MN-9', 'wda', 'dwa', 'dwa', 0, 'dwa', '', '', 0, '0000-00-00', '', '1', '2021-04-28 23:03:58', 52, 1),
(69, '213213123123123', 'asdasdasdas', 'dasdasdasd', 'asdasdasd', 0, 'asdasdasd', '', '', 0, '0000-00-00', '', '1', '2021-04-28 23:06:12', 53, 1),
(70, '123122142356234', 'dasdd', 'asdasdad', 'asdasd', 0, 'dasdasd', '', '', 0, '0000-00-00', '', '1', '2021-04-28 23:07:52', 54, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
