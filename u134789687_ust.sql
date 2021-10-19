-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 10:07 AM
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
(1, 'Emmer Grace', 'Delos Santos', 'Logronio', 'emmer.logronio@ust.edu.ph', '090900911111', 1, '$2y$10$u4ZAT8iG2hzZHdsCdV1vlOx.ngwX9KlcEIQbcwwY9C4cKJ4PnvcQK', 1, '1', '2021-04-11 16:35:46', 1, '7', '1', '17'),
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
(45, 'Cheezy', 'DWA', 'Sticks', 'cheeeezymozzaaarella@ust.edu.ph', '09225407738', 0, '$2y$10$u4ZAT8iG2hzZHdsCdV1vlOx.ngwX9KlcEIQbcwwY9C4cKJ4PnvcQK', 1, '0', '2021-09-12 23:36:27', 1, '3', '1', NULL),
(48, 'Ghieann', 'Dwa', 'Vidar', 'vidarghieann@ust.edu.ph', '09225407738', 0, '$2y$10$XTwrq1R4vInvNf8I0z.KR.DudcIcxcSennPPowWQ7Z31Bia4Y7iJO', 1, '1', '2021-10-04 14:24:45', 1, '3', '2', NULL),
(49, 'Motlu', 'Presnent', 'Patlu', 'vidarghieann.iics@ust.edu.ph', '09154123108', 0, '$2y$10$LCL2zoeiPzZE5jY0xSeDCez2cI7fOq7xcBoR1uDRsua0TNIlkJMki', 1, '1', '2021-10-04 14:45:59', 1, '9', '1', NULL),
(50, 'Dawdaw', 'Dwad', 'Awdwa', 'cheadezymozzarella.cics@ust.edu.ph', '234234234234', 0, '$2y$10$UXUabP9KVtRVB48dJZirV.6uNDjoEHwEjf2gjs.ZLpAeaVYTKY0i6', 1, '1', '2021-10-04 14:46:46', 1, '', '', '14'),
(51, 'Jose Maria Edito', 'K.', 'Tirol', 'joseedito.cics@ust.edu.ph', '09154123108', 0, '$2y$10$IWwjkFYtimkUdfzu/okvae05uxuPJsaVoiyc2.xcvZejWGdndbCCi', 1, '1', '2021-10-11 16:06:20', 1, NULL, NULL, NULL),
(52, 'Jose Maria Edito', 'K.', 'Tirol', 'joseedito@ust.edu.ph', '2025550123', 0, '$2y$10$wHBUU52GTL/pNWlvrJyHP..HIcmB0dwVSvoZoaBHoix2CdQwSliPm', 0, '1', '2021-10-11 16:07:06', 1, NULL, NULL, NULL);

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
  `client` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`collaboration_id`, `title`, `subject`, `group_num`, `subj_coordinator`, `tech_adv`, `representative_id`, `faculty_id`, `department_id`, `client`, `code`, `link`, `date_added`, `status`) VALUES
(2, 'BATTERY-INDEPENDENT MOBILE PHONE BOOT-UP CIRCUIT WITH ISOLATED UNIVERSAL BATTERY CHARGERr', 'BSIT 4-A', '4', 'KARLO P. MALABANAN', 'RICKY R. TEPORA', 32, 37, 1, 'ACE HARDWARE', '61503e67e4277', 'https://developer.mozilla.org/', '2021-09-26 17:33:27', 1),
(3, 'GSM-BASED SENSOR SYSTEM FOR SOLAR DEHYDRATOR IN  MONITORING THE MANGO DRYING PROCESS', 'BSIT 4-B', '5', 'GIECEL B. RAMOS', 'EZEKIEL D. GUZMAN', 35, 37, 1, 'MAYNILAD', '615136d2b9609', NULL, '2021-09-27 11:13:22', 1),
(7, 'Sluggers snitch 2nd straight softball tourneyyyZZZ', 'BSIT 4-C', '31231233', 'DWADAW', 'DWADWA', 30, 36, 1, 'client', '615292913667c', NULL, '2021-09-28 11:57:05', 1),
(9, 'TITLE', 'SECTION', 'GROUP', 'SUBJ', 'TECH', 49, 36, 1, 'CLIENT', '615b19fc8b7bc', NULL, '2021-10-04 23:13:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ip_code`
--

CREATE TABLE `ip_code` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ip_code`
--

INSERT INTO `ip_code` (`id`, `ip`, `department_id`) VALUES
(1, 'CP(IT)2022-2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ip_counter`
--

CREATE TABLE `ip_counter` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE `panels` (
  `id` int(11) NOT NULL,
  `collaboration_id` varchar(11) NOT NULL,
  `collaboration_status` varchar(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`id`, `collaboration_id`, `collaboration_status`, `account_id`) VALUES
(7, '3', '1', 36),
(9, '3', '2', 38);

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
(3, '223-456', 3, 'BATTERY-INDEPENDENT MOBILE PHONE BOOT-UP CIRCUIT WITH  ISOLATED UNIVERSAL BATTERY CHARGER', 'Ana Liza R. Publico, Dennis Llander D. Vidar, Ian Paul D. Cantada', '2020', 'MRS. SOCORRO M. ESPAÑOLA', 'Group-7-Final-Document.pdf', '16313557981286070606613c83969e70c', 'August Bill.pdf', '1631355798745042145613c83969e71b', 'N/A', 'N/A', 'N/A', 'N/A', 'Group-7-Final-Document.pdf', '16313557981906215361613c83969e721', 'yea', 1, 2, 1, '2021-09-11 18:23:18'),
(4, '123124-12312321', 3, 'GSM-BASED SENSOR SYSTEM FOR SOLAR DEHYDRATOR IN  MONITORING THE MANGO DRYING PROCESS', 'Krizzia Mae V. Padernal, Geneveve C. Dumlao, Ezekiel P. Laresma', '2020', 'tech adv', 'demo cert.pdf', '1631421294246920551613d836eb81df', 'demo cert 2.pdf', '1631421294311615782613d836eb81e9', 'N/A', 'N/A', 'N/A', 'N/A', 'demo cert 2.pdf', '1631421294832814830613d836eb81f0', '12345', 0, 3, 1, '2021-09-12 12:34:54'),
(5, '123456-12345', 3, 'Job Satisfaction and Employee Turnover Intention', 'Harry D. Lovecraft, Robert E.Howard, Edgar Allan C. Poe', '2021', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469309374752200613e3efd89b07', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314693091900463842613e3efd89b26', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314693091303463498613e3efd89b2f', 'edwadawdawaw', 0, 3, 1, '2021-09-13 01:55:09'),
(6, '32432-23423', 2, 'Hotel Reservation and Billing System using C#/MSAccess', 'Nina O. Desales', '2020', 'Ronel E. Asas', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469549599715748613e3fed13289', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314695491707998578613e3fed13297', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469549697707049613e3fed1329f', 'keywords', 0, 1, 1, '2021-09-13 01:59:09'),
(7, '6666-6666', 2, 'Online Hotel Reservation with Drag and Drop Using PHP/MySQL', 'Jee Ann Rafael', '2019', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1631469686984463961613e4076948fd', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314696861578953989613e40769490a', 'N/A', 'N/A', 'N/A', 'N/A', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16314696861851061523613e407694913', 'keywords', 0, 1, 1, '2021-09-13 02:01:26'),
(8, '123124-2133123', 2, 'Sluggers snitch 2nd straight softball tourney', 'Darwin C. Frias', '2021', 'Mr. Karlo P. Malabanan', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375734273369496146eac55bd69', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375739409296846146eac55be2a', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '163203757316810457466146eac55be36', 'Diagnostic Results of Gameloop.zip', '163203757310695711706146eac55be42', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320375731094723506146eac55be4d', 'keywords', 0, 1, 1, '2021-09-19 15:46:13'),
(9, '66666666-7', 3, 'TITLEISMSJHAHKA HAHAHAHA', 'Nina O. Desales', '2023', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320381602863543906146ed1053b7b', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163203816018692542286146ed1053b8b', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '163203816011335689836146ed1053b94', 'Diagnostic Results of Gameloop.zip', '1632038160897653456146ed1053b9d', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320381602662899016146ed1053ba6', 'keywordssssssssssssssss1', 1, 1, 1, '2021-09-19 15:56:00'),
(10, '123124-12312321', 3, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. Desales', '2023', 'tech adv', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320390843005470036146f0acecf50', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163203908415685422146146f0acecf5d', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '16320390845841461296146f0acecf66', 'Diagnostic Results of Gameloop.zip', '163203908415954004686146f0acecf6f', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320390845267642606146f0acecf77', 'keywords', 0, 1, 1, '2021-09-19 16:11:24'),
(11, '123124-12312321', 2, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. Desales', '2021', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163204025813811298366146f542a0279', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320402586452906586146f542a0287', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '16320402587161141426146f542a0290', 'Diagnostic Results of Gameloop.zip', '163204025818744176836146f542a0299', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '16320402588254011256146f542a02a1', 'Keywords', 0, 3, 1, '2021-09-19 16:30:58'),
(12, 'DWADAW-DWADAW', 3, 'DWADAWD', 'DWADAWDAWD', 'DWADAWDA', 'DWADAWDAWDAW', 'demo cert 2.pdf', '163214163318793012206148814151f4b', 'demo cert 2.pdf', '163214163310733908746148814151f63', 'video.mp4', '16321416334185027536148814151f69', 'nicla.zip', '163214163320428366676148814151f6d', 'DEMO Region B1.pdf', '16321416331132359046148814151f71', 'DWADAWAW', 0, 1, 1, '2021-09-20 20:40:33'),
(13, '123', 2, 'Sluggers snitch 2nd straight softball tourney', 'Nina O. DesalesDAW', '2019', 'MRS. SOCORRO M. ESPAÑOLA', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163214426145525141661488b8543632', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '163214426155752049061488b8543643', 'Genshin Impact 2021-09-13 15-56-36_Trim.mp4', '1632144261167810390161488b8543650', 'Diagnostic Results of Gameloop.zip', '1632144261189530607261488b854365d', 'WEEK 4-Health-LAS-(MELC 4-7).pdf', '1632144261149960064861488b8543669', 'edwadawdawaw', 0, 1, 1, '2021-09-20 21:24:21'),
(14, 'CP(IT)2021-2022-0001', 1, 'Sluggers snitch 2nd straight softball tourney', 'Darwin C. Frias', '2020', 'Mr. Karlo P. Malabanan', 'COORD roadshow.pdf', '163385150628496374461629872166fc', 'COORD roadshow.pdf', '16338515064003167286162987216716', 'tokyo-wonder.mp4', '1633851506236187947616298721671d', 'ffmpeg-4.4-essentials_build.zip', '16338515066866890216162987216722', 'COORD roadshow.pdf', '16338515061466288144616298721672a', 'keywordsssssssssssssssssssssssssss', 0, 2, 1, '2021-10-10 15:38:26'),
(17, 'CP(IT)2021-2022-0002', 1, 'Sluggers snitch 2nd straight softball tourney', 'Darwin C. Frias', '2020', 'Mr. Karlo P. Malabanan', 'COORD roadshow.pdf', '1633852296148448179561629b88822a3', 'COORD roadshow.pdf', '163385229611349765161629b88822ae', 'tokyo-wonder.mp4', '163385229685605014661629b88822b6', 'ffmpeg-4.4-essentials_build.zip', '1633852296148571516361629b88822bc', 'COORD roadshow.pdf', '163385229689273700061629b88822c4', 'Keywords', 0, 2, 1, '2021-10-10 15:51:36');

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
-- Indexes for table `ip_code`
--
ALTER TABLE `ip_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_counter`
--
ALTER TABLE `ip_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `collaboration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ip_code`
--
ALTER TABLE `ip_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ip_counter`
--
ALTER TABLE `ip_counter`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
