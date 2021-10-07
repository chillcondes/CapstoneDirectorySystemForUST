-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 07:33 AM
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
  `department_id` int(10) NOT NULL,
  `collaboration_id` varchar(11) DEFAULT NULL,
  `collaboration_status` varchar(11) DEFAULT NULL,
  `project_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `gender`, `pword`, `access`, `status`, `date_added`, `department_id`, `collaboration_id`, `collaboration_status`, `project_id`) VALUES
(1, 'Emmer Grace', 'Delos Santos', 'Logronio', 'emmer.logronio@ust.edu.ph', '090900911111', 1, '$2y$10$u4ZAT8iG2hzZHdsCdV1vlOx.ngwX9KlcEIQbcwwY9C4cKJ4PnvcQK', 1, '1', '2021-04-11 16:35:46', 1, '5', '', NULL),
(30, 'Faith Ann', 'De Guzman', 'Vidallo', 'faith.vidallo@ust.edu.ph', '09154123108', 1, '$2y$10$zT2sNvJ2YV3wUkrh7SE03..ckqFajBjp5Nn.yCcxHtJMINdnWWF3W', 1, '1', '2021-02-13 19:38:32', 1, '7', '1', NULL),
(31, 'Krizzia Mae', 'Padelan', 'Padernal', 'krizzia.padernal@ust.edu.ph', '09225874492', 1, '$2y$10$DssoSOyCnIoXyrXf6X/Y1OlXdfwYCAx0Dcfi86u.cILhxn/4MxBXy', 1, '1', '2021-02-13 19:47:34', 1, '2', '1', NULL),
(32, 'Ian Paul', 'De Guzman', 'Cantada', 'ian.cantada@ust.edu.ph', '09154123108', 0, '$2y$10$dg1hMnh.yiI5H3rTvp4lEe.oyxHpZMkqCWJilOee6B2pKlwoc0Wi2', 1, '1', '2021-02-13 19:48:19', 1, '2', '1', NULL),
(33, 'Ezekiel', 'Paulate', 'Laresma', 'ezekiel.laresma@ust.edu.ph', '09445218875', 0, '$2y$10$Hix/bOBnvDMNoQZfbgtxzOOhRB7iC578cZL3xJmHd11BB.vLhAZQ.', 1, '1', '2021-02-13 19:49:08', 1, '2', '1', NULL),
(34, 'Maynard', 'Aliling', 'Dela Cruz', 'maynard.aliling@ust.edu.ph', '09884153368', 0, '$2y$10$yWeLSmLxBA/lBmFhtkrp7Oknhe/od0WAVtKz8ipbco4ythFZjEKBe', 1, '1', '2021-02-13 19:49:49', 1, '3', '3', NULL),
(35, 'Richmond', 'Cruz', 'Cajigas', 'richmond.cajigas@ust.edu.ph', '09154157824', 0, '$2y$10$b.BxCKezrB6g3rTCTArAxOqrEcyCK5bVFCy4rnv4AyPC2mz7pOIkm', 1, '1', '2021-02-13 19:50:54', 1, '3', '1', '12'),
(36, 'Caryl', 'Jaime', 'Jaca', 'caryl.jaca@ust.edu.ph', '09223657715', 1, '$2y$10$uGVeZQhZgPhUdQC/2RGHGOfTt3IuLd8YpxPKHSbmdmmjhkGX4PHqO', 0, '1', '2021-02-13 21:12:55', 1, NULL, NULL, NULL),
(37, 'Gerald', 'Kiesse', 'Merced', 'gerald.merced@ust.edu.ph', '09441257795', 0, '$2y$10$5uctcGseqIBL6WYosv8zi.gBD02E/ob2M3KpbLMwr4s2iMN5aS5t.', 0, '1', '2021-02-13 21:13:43', 1, NULL, NULL, NULL),
(38, 'Kenneth', 'Abi', 'Turco', 'kenneth.turco@ust.edu.ph', '09336524495', 0, '$2y$10$N.6xyRxtqStIeExUooihoeQ9MkfGTq0doxLv0M7zJ7CjjTWD6znDu', 0, '0', '2021-02-13 21:14:35', 1, NULL, NULL, NULL),
(39, 'Geraldine', 'Tubera', 'Panceles', 'geraldine.panceles@ust.edu.ph', '09625483659', 1, '$2y$10$.71.sRcM0VHITHUn8dgcBeWTyouERsCaA.qgYOQEBZYIVpYpBRy6.', 0, '1', '2021-02-13 21:15:28', 1, NULL, NULL, NULL),
(40, 'Bernadette Ann', 'Baguio', 'Sarmiento', 'bernadette.sarmiento@ust.edu.ph', '09441579935', 1, '$2y$10$bfT1rA2kaV0aWvJ7WWXL0O2ZmI7t2/w08/5l7rymhBEsnhy1AFvEW', 0, '1', '2021-02-13 21:16:19', 1, NULL, NULL, NULL),
(41, 'Jennifer', 'Kito', 'Banga', 'jennifer.banga@ust.edu.ph', '09558741695', 1, '$2y$10$.Zg4XGSd1Bm6FgYCUExZwO5NlA89Uoic/VPA0hsgjhBDcQNZEKGQG', 0, '1', '2021-02-13 21:17:23', 1, NULL, NULL, NULL),
(42, 'Paulo', 'Diaz', 'Cruz', 'paulo.cruz@ust.edu.ph', '09365472298', 0, '$2y$10$8c32L5Rgh.5f33NnLQ04kuqAfyMKl8Eku1KS64ltq/eWxFDDHLNWS', 0, '1', '2021-02-13 21:18:06', 1, NULL, NULL, NULL),
(43, 'Eric John', 'Cruz', 'Mariano', 'eric.mariano@ust.edu.ph', '09775418836', 0, '$2y$10$/s3iK54Ku1UzSgmckHqBc.O3ygBSqWbAsIBspiu0Jn8nBSZQqdLD6', 0, '1', '2021-02-13 21:18:50', 1, NULL, NULL, NULL),
(44, 'Faculty', 'Middle', 'Last', 'faculty.last@ust.edu.ph', '09528593318', 0, '$2y$10$UMtwa38zvnqZkG42J2F2w.q/3EURv9pEjFxi7W8seUaOIMrwu9U7i', 0, '0', '2021-09-12 21:30:11', 1, NULL, NULL, NULL),
(45, 'Dwadaw', 'DWA', 'Dwad', 'cheeeezymozzaaarella@ust.edu.ph', '09225407738', 0, '$2y$10$u4ZAT8iG2hzZHdsCdV1vlOx.ngwX9KlcEIQbcwwY9C4cKJ4PnvcQK', 1, '0', '2021-09-12 23:36:27', 1, NULL, NULL, NULL);

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
(1, 'John Doe', 'bsit_admin@ust.edu.ph', '$2y$10$Uq8znSVfYUBAiRa83taR/e6KIDHL0dPdLIqbsbQunQrQF/TbRtJse', 'Bachelor of Science in Information Technology', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `collaboration_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `group_num` varchar(20) NOT NULL,
  `subj_coordinator` varchar(100) NOT NULL,
  `tech_adv` varchar(100) NOT NULL,
  `representative_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `panel_1` varchar(50) NOT NULL,
  `panel_2` varchar(50) NOT NULL,
  `panel_3` varchar(50) NOT NULL,
  `client` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`collaboration_id`, `title`, `subject`, `group_num`, `subj_coordinator`, `tech_adv`, `representative_id`, `faculty_id`, `department_id`, `panel_1`, `panel_2`, `panel_3`, `client`, `code`, `link`, `date_added`, `status`) VALUES
(2, 'BATTERY-INDEPENDENT MOBILE PHONE BOOT-UP CIRCUIT WITH ISOLATED UNIVERSAL BATTERY CHARGERr', 'THESIS', '4', 'KARLO P. MALABANAN', 'RICKY R. TEPORA', 32, 36, 1, 'RONEL E. ASAS', 'GIECEL B. RODERO', 'SHEY B. FAFARDO', 'ACE HARDWARE', '61503e67e4277', NULL, '2021-09-26 17:33:27', 1),
(3, 'GSM-BASED SENSOR SYSTEM FOR SOLAR DEHYDRATOR IN  MONITORING THE MANGO DRYING PROCESS', 'THESIS', '5', 'GIECEL B. RAMOS', 'EZEKIEL D. GUZMAN', 35, 36, 1, 'ZALDY B. ROXAS', 'ARMAND T. TORRES', 'ANDREA B. MONTALAN', 'MAYNILAD', '615136d2b9609', NULL, '2021-09-27 11:13:22', 1),
(4, 'dwa', 'dwa', 'dwa', 'dwa', 'daw', 0, 36, 1, 'daw', 'wadaw', 'daw', 'dwa', '61528a3e49a55', NULL, '2021-09-28 11:21:34', 1),
(7, 'Sluggers snitch 2nd straight softball tourneyyyZZZ', 'sdsdsdsdasd', '31231233', 'DWADAW', 'DWADWA', 30, 36, 1, '1', '2', '3', 'client', '615292913667c', NULL, '2021-09-28 11:57:05', 1);

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
(4, '123124-12312321', 3, 'GSM-BASED SENSOR SYSTEM FOR SOLAR DEHYDRATOR IN  MONITORING THE MANGO DRYING PROCESS', 'Krizzia Mae V. Padernal, Geneveve C. Dumlao, Ezekiel P. Laresma', '2020', 'tech adv', 'demo cert.pdf', '1631421294246920551613d836eb81df', 'demo cert 2.pdf', '1631421294311615782613d836eb81e9', 'N/A', 'N/A', 'N/A', 'N/A', 'demo cert 2.pdf', '1631421294832814830613d836eb81f0', '12345', 0, 3, 1, '2021-09-12 12:34:54'),
(5, '123456-12345', 3, 'Job Satisfaction and Employee Turnover Intention', 'Harry D. Lovecraft, Robert E.Howard, Edgar Allan C. Poe', '2021', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469309374752200613e3efd89b07', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314693091900463842613e3efd89b26', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314693091303463498613e3efd89b2f', 'edwadawdawaw', 0, 3, 1, '2021-09-13 01:55:09'),
(6, '32432-23423', 2, 'Hotel Reservation and Billing System using C#/MSAccess', 'Nina O. Desales', '2020', 'Ronel E. Asas', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469549599715748613e3fed13289', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314695491707998578613e3fed13297', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469549697707049613e3fed1329f', 'keywords', 0, 1, 1, '2021-09-13 01:59:09'),
(7, '6666-6666', 2, 'Online Hotel Reservation with Drag and Drop Using PHP/MySQL', 'Jee Ann Rafael', '2019', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469686984463961613e4076948fd', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314696861578953989613e40769490a', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314696861851061523613e407694913', 'keywords', 0, 1, 1, '2021-09-13 02:01:26'),
(8, '123124-2133123', 2, 'Sluggers snitch 2nd straight softball tourney', 'Darwin C. Frias', '2021', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375734273369496146eac55bd69', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375739409296846146eac55be2a', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '163203757316810457466146eac55be36', 'Diagnostic Results of Gameloop.zip', '163203757310695711706146eac55be42', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375731094723506146eac55be4d', 'keywords', 0, 1, 1, '2021-09-19 15:46:13'),
(9, '66666666-7', 3, 'TITLEISMSJHAHKA HAHAHAHA', 'Nina O. Desales', '2023', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320381602863543906146ed1053b7b', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163203816018692542286146ed1053b8b', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '163203816011335689836146ed1053b94', 'Diagnostic Results of Gameloop.zip', '1632038160897653456146ed1053b9d', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320381602662899016146ed1053ba6', 'keywordssssssssssssssss1', 1, 1, 1, '2021-09-19 15:56:00'),
(10, '123124-12312321', 3, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. Desales', '2023', 'tech adv', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320390843005470036146f0acecf50', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163203908415685422146146f0acecf5d', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '16320390845841461296146f0acecf66', 'Diagnostic Results of Gameloop.zip', '163203908415954004686146f0acecf6f', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320390845267642606146f0acecf77', 'keywords', 0, 1, 1, '2021-09-19 16:11:24'),
(11, '123124-12312321', 2, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. Desales', '2021', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163204025813811298366146f542a0279', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320402586452906586146f542a0287', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '16320402587161141426146f542a0290', 'Diagnostic Results of Gameloop.zip', '163204025818744176836146f542a0299', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320402588254011256146f542a02a1', 'Keywords', 0, 3, 1, '2021-09-19 16:30:58'),
(12, 'DWADAW-DWADAW', 3, 'DWADAWD', 'DWADAWDAWD', 'DWADAWDA', 'DWADAWDAWDAW', 'demo cert 2.pdf', '163214163318793012206148814151f4b', 'demo cert 2.pdf', '163214163310733908746148814151f63', 'video.mp4', '16321416334185027536148814151f69', 'nicla.zip', '163214163320428366676148814151f6d', 'DEMO Region B1.pdf', '16321416331132359046148814151f71', 'DWADAWAW', 0, 1, 1, '2021-09-20 20:40:33'),
(13, '123124-12312321', 2, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. DesalesDAW', '2019', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163214426145525141661488b8543632', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163214426155752049061488b8543643', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '1632144261167810390161488b8543650', 'Diagnostic Results of Gameloop.zip', '1632144261189530607261488b854365d', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1632144261149960064861488b8543669', 'edwadawdawaw', 0, 1, 1, '2021-09-20 21:24:21');

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
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`collaboration_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `collaboration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
