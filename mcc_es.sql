-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcc_es`
--

-- --------------------------------------------------------

--
-- Table structure for table `// your database connection and configuration`
--

CREATE TABLE `// your database connection and configuration` (
  `Id` int(11) NOT NULL,
  `record` varchar(10000) DEFAULT NULL,
  `applicant_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `academic_id` int(11) NOT NULL,
  `academic_start` int(4) DEFAULT NULL,
  `academic_end` int(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`academic_id`, `academic_start`, `academic_end`, `status`) VALUES
(1, 2023, 2024, 0),
(2, 2024, 2025, 0),
(3, 2025, 2026, 1),
(4, 2022, 2023, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `profile`) VALUES
(1, 'mcc.es.2022@gmail.com', 'medallofrancisjude@gmail.com', '0192023a7bbd73250516f069df18b500', '', 'mcc2.png');

-- --------------------------------------------------------

--
-- Table structure for table `admission_list`
--

CREATE TABLE `admission_list` (
  `list_id` int(11) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `sched_date` varchar(255) DEFAULT NULL,
  `sched_time` varchar(255) DEFAULT NULL,
  `wish_course` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_list`
--

INSERT INTO `admission_list` (`list_id`, `applicant_id`, `sched_date`, `sched_time`, `wish_course`, `student_id`) VALUES
(20, 'APP10000003', '2023-04-19', '08:00-08:45', 'BSIT', '127');

-- --------------------------------------------------------

--
-- Table structure for table `admission_sched`
--

CREATE TABLE `admission_sched` (
  `sched_id` int(11) NOT NULL,
  `sched_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_sched`
--

INSERT INTO `admission_sched` (`sched_id`, `sched_date`, `status`) VALUES
(10, '2023-04-19', '1'),
(11, '2023-04-20', '1'),
(12, '2023-04-29', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admission_score`
--

CREATE TABLE `admission_score` (
  `admission_id` int(11) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `comp` varchar(255) DEFAULT NULL,
  `com_cate` varchar(255) DEFAULT NULL,
  `reas` varchar(255) DEFAULT NULL,
  `reas_cat` varchar(255) DEFAULT NULL,
  `verbal` varchar(255) DEFAULT NULL,
  `verbal_stanine` varchar(255) DEFAULT NULL,
  `verbal_percen` varchar(255) DEFAULT NULL,
  `verbal_cat` varchar(255) DEFAULT NULL,
  `quan` varchar(255) DEFAULT NULL,
  `quan_cat` varchar(255) DEFAULT NULL,
  `figu` varchar(255) DEFAULT NULL,
  `figu_cat` varchar(255) DEFAULT NULL,
  `nonver` varchar(255) DEFAULT NULL,
  `nonver_stanine` varchar(255) DEFAULT NULL,
  `nonver_percen` varchar(255) DEFAULT NULL,
  `nonver_cat` varchar(255) DEFAULT NULL,
  `total_raw` varchar(255) DEFAULT NULL,
  `total_stanine` varchar(255) DEFAULT NULL,
  `total_percen` varchar(255) DEFAULT NULL,
  `total_cat` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_score`
--

INSERT INTO `admission_score` (`admission_id`, `applicant_id`, `comp`, `com_cate`, `reas`, `reas_cat`, `verbal`, `verbal_stanine`, `verbal_percen`, `verbal_cat`, `quan`, `quan_cat`, `figu`, `figu_cat`, `nonver`, `nonver_stanine`, `nonver_percen`, `nonver_cat`, `total_raw`, `total_stanine`, `total_percen`, `total_cat`, `age`) VALUES
(22, 'APP10000003', '10', 'Above', '10', 'Above', '10', '10', '10', 'Above', '10', 'Above', '10', 'Above', '10', '10', '10', 'Above', '10', '10', '10', 'Above', '18 years');

-- --------------------------------------------------------

--
-- Table structure for table `admission_time`
--

CREATE TABLE `admission_time` (
  `sched_time_id` int(11) NOT NULL,
  `sched_time_start` varchar(255) DEFAULT NULL,
  `sched_time_stop` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_time`
--

INSERT INTO `admission_time` (`sched_time_id`, `sched_time_start`, `sched_time_stop`, `status`) VALUES
(2, '10:00', '10:45', '1'),
(3, '11:00', '11:45', '1'),
(4, '08:00', '08:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`) VALUES
(1, 'BS in Information Technology', 'BSIT'),
(2, 'BS in Business Administration Financial Management', 'BSBA'),
(3, 'BS in Hospitality Management', 'BSHM'),
(4, 'Bachelor of Elementary Education', 'BEED'),
(5, 'Bachelor of Secondary Education - Filipino', 'BSED');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `nso` varchar(255) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `good_moral` varchar(255) DEFAULT NULL,
  `exam_remarks` varchar(255) DEFAULT NULL,
  `findings` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `applicant_id`, `id_number`, `nso`, `card`, `good_moral`, `exam_remarks`, `findings`) VALUES
(21, 'APP10000001', '', '', '', '', '', ''),
(22, 'APP10000002', '', '', '', '', '', ''),
(23, 'APP10000003', '2023-0001', 'Available', 'Available', 'Available', 'Strong Academic Probation', 'HAHA'),
(24, 'APP10000004', '', '', '', '', '', ''),
(25, 'APP10000005', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(11) NOT NULL,
  `enroll_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `enroll_name`, `status`) VALUES
(1, 'New Students', '1'),
(2, 'Transferee Students', '0'),
(3, 'Old Students', '0'),
(4, 'Shift Students', '0'),
(5, 'All', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fees_id` int(11) NOT NULL,
  `library` varchar(255) DEFAULT NULL,
  `computer` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `athletic` varchar(255) DEFAULT NULL,
  `admission` varchar(255) DEFAULT NULL,
  `development` varchar(255) DEFAULT NULL,
  `guidance` varchar(255) DEFAULT NULL,
  `handbook` varchar(255) DEFAULT NULL,
  `entrance` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `medical` varchar(255) DEFAULT NULL,
  `cultural` varchar(255) DEFAULT NULL,
  `semester_id` varchar(11) NOT NULL DEFAULT '',
  `course_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `figu_cat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fees_id`, `library`, `computer`, `school_id`, `athletic`, `admission`, `development`, `guidance`, `handbook`, `entrance`, `registration`, `medical`, `cultural`, `semester_id`, `course_id`, `year_id`, `figu_cat`) VALUES
(16, '150.00', '100.00', '200.00', '150.00', '100.00', '150.00', '100.00', '200.00', '200.00', '300.00', '300.00', '200.00', 'First Sem', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guidance_record`
--

CREATE TABLE `guidance_record` (
  `Id` int(11) NOT NULL,
  `record` text DEFAULT NULL,
  `applicant_id` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidance_record`
--

INSERT INTO `guidance_record` (`Id`, `record`, `applicant_id`, `date_created`) VALUES
(15, '{\"applicant_id\":\"132132\",\"fname\":\"asdas\",\"mname\":\"asd\",\"lname\":\"asd\",\"nname\":\"asd\",\"dbirth\":\"asd\",\"age\":\"21\",\"pbirth\":\"wqe\",\"cadd\":\"asdas\",\"padd\":\"asdsad\",\"height\":\"sadas\",\"weight\":\"asdasd\",\"complex\":\"asdasd\",\"religion\":\"asdsad\",\"langdi\":\"asdasd\",\"email\":\"asdasd\",\"ffullname\":\"None\",\"fdbirth\":\"None\",\"fage\":\"None\",\"fcontact\":\"None\",\"foccopation\":\"None\",\"femploy\":\"None\",\"feducattend\":\"None\",\"fhomeadd\":\"None\",\"mfullname\":\"None\",\"mdbirth\":\"None\",\"mage\":\"None\",\"mcontact\":\"None\",\"moccupation\":\"None\",\"meploy\":\"None\",\"meducattend\":\"None\",\"madd\":\"None\",\"gfullname\":\"None\",\"gdbirth\":\"None\",\"gage\":\"None\",\"gcontact\":\"None\",\"goccupation\":\"None\",\"gemploy\":\"None\",\"geducattend\":\"None\",\"gadd\":\"None\",\"radios1_others\":\"None\",\"radios2_others\":\"None\",\"sincome\":\"None\",\"brank\":\"None\",\"sname\":\"None\",\"sdbirth\":\"None\",\"sage\":\"None\",\"scontact\":\"None\",\"semploy\":\"None\",\"seducattend\":\"None\",\"sadd\":\"None\",\"enameschool\":\"None\",\"eincdate\":\"None\",\"ehonor\":\"None\",\"hnameschool\":\"None\",\"hincdate\":\"None\",\"hhonor\":\"None\",\"cnameschool\":\"None\",\"cincdate\":\"None\",\"chonor\":\"None\",\"vnameschool\":\"None\",\"vincdate\":\"None\",\"vhonor\":\"None\",\"fyname\":\"None\",\"syname\":\"None\",\"tyname\":\"None\",\"fthyname\":\"None\",\"mdheight\":\"None\",\"mdweight\":\"None\",\"mdvisual\":\"None\",\"mdhearing\":\"None\",\"mdfreq\":\"None\",\"mdillness\":\"None\",\"mddiablities\":\"None\",\"mdaccex\":\"None\",\"mdopexp\":\"None\",\"mdvisit\":\"None\",\"mdaddhi\":\"None\",\"oaname1\":\"None\",\"oadate1\":\"None\",\"oaposition1\":\"None\",\"oaname2\":\"None\",\"oadate2\":\"None\",\"oaposition2\":\"None\",\"oaname3\":\"None\",\"oadate3\":\"None\",\"oaposition3\":\"None\",\"oaname4\":\"None\",\"oadate4\":\"None\",\"oaposition4\":\"None\",\"ptname1\":\"None\",\"ptdate1\":\"None\",\"ptscore1\":\"None\",\"ptinter1\":\"None\",\"ptname2\":\"None\",\"ptdate2\":\"None\",\"ptscore2\":\"None\",\"ptinter2\":\"None\",\"ptname3\":\"None\",\"ptdate3\":\"None\",\"ptscore3\":\"None\",\"ptinter3\":\"None\",\"ptname4\":\"None\",\"ptdate4\":\"None\",\"ptscore4\":\"None\",\"ptinter4\":\"None\",\"checkbox1_others\":\"None\",\"hobbies\":\"None\",\"talent\":\"None\",\"interest\":\"None\",\"sport\":\"None\",\"msubject\":\"None\",\"lsubject\":\"None\",\"plan\":\"None\"}', '132132', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `qr_id` int(11) NOT NULL,
  `qrimage` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`qr_id`, `qrimage`, `student_id`, `signature`, `picture`) VALUES
(38, '1683426490.png', '2023-0001', '64570cc19671d.png', 'temporary.png');

-- --------------------------------------------------------

--
-- Table structure for table `que`
--

CREATE TABLE `que` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `que_number` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `que`
--

INSERT INTO `que` (`id`, `student_id`, `que_number`, `date_created`, `status`) VALUES
(45, '82', '8333', '2023/05/01', 4),
(46, '126', '0394', '2023/05/03', 3),
(47, '127', '0934', '2023/05/07', 6),
(48, '128', '3430', '2023/05/08', 4),
(49, '128', '8934', '2023/05/10', 3),
(50, '131', '0923', '2023/05/11', 3),
(51, '132', '9353', '2023/05/14', 3),
(52, '127', '', '2023/06/29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `Id` int(11) NOT NULL,
  `units_rate` decimal(10,2) DEFAULT NULL,
  `lab_rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`Id`, `units_rate`, `lab_rate`) VALUES
(1, '159.40', '230.30');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `sections` varchar(255) NOT NULL DEFAULT '',
  `year_id` int(11) NOT NULL,
  `section_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `sections`, `year_id`, `section_code`) VALUES
(1, 'NE', 1, 'BSIT 1 NE'),
(2, 'N', 1, 'BSIT 1 N'),
(3, 'S', 1, 'BSIT 1 S'),
(4, 'A', 2, 'BSBA 1 A'),
(5, 'B', 2, 'BSBA 1 B'),
(6, 'A', 3, 'BSHM 1 A'),
(7, 'B', 3, 'BSHM 1 B'),
(8, 'A', 4, 'BEED 1 A'),
(9, 'B', 4, 'BEED 1 B'),
(10, 'A', 5, 'BSED 1 A'),
(11, 'B', 5, 'BSED 1 B'),
(12, 'N', 6, 'BSIT 2 N'),
(13, 'S', 6, 'BSIT 2 S'),
(14, 'A', 7, 'BSBA 2 A'),
(15, 'B', 7, 'BSBA 2 B'),
(16, 'A', 8, 'BSHM 2 A'),
(17, 'B', 8, 'BSHM 2 B'),
(18, 'A', 9, 'BEED 2 A'),
(19, 'B', 9, 'BEED 2 B'),
(20, 'A', 10, 'BSED 2 A'),
(21, 'B', 10, 'BSED 2 B'),
(22, 'N', 11, 'BSIT 3 N'),
(23, 'S', 11, 'BSIT 3 S'),
(24, 'A', 12, 'BSBA 3 A'),
(25, 'B', 12, 'BSBA 3 B'),
(26, 'A', 13, 'BSHM 3 A'),
(27, 'B', 13, 'BSHM 3 B'),
(28, 'A', 14, 'BEED 3 A'),
(29, 'B', 14, 'BEED 3 B'),
(30, 'A', 15, 'BSED 3 A'),
(31, 'B', 15, 'BSED 3 B'),
(32, 'N', 16, 'BSIT 4 N'),
(33, 'S', 16, 'BSIT 4 S'),
(34, 'A', 17, 'BSBA 4 A'),
(35, 'B', 17, 'BSBA 4 B'),
(36, 'A', 18, 'BSHM 4 A'),
(37, 'B', 18, 'BSHM 4 B'),
(38, 'A', 19, 'BEED 4 A'),
(39, 'B', 19, 'BEED 4 B'),
(40, 'A', 20, 'BSED 4 A'),
(41, 'B', 20, 'BSED 4 B'),
(42, 'E', 1, 'BSIT 1 E'),
(43, 'W', 1, 'BSIT 1 W'),
(44, 'C', 2, 'BSBA 1 C'),
(45, 'D', 2, 'BSBA 1 D'),
(46, 'C', 3, 'BSHM 1 C'),
(47, 'D', 3, 'BSHM 1 D'),
(48, 'C', 4, 'BEED 1 C'),
(49, 'D', 4, 'BEED 1 D'),
(50, 'C', 5, 'BSED 1 C'),
(51, 'D', 5, 'BSED 1 D'),
(52, 'E', 6, 'BSIT 2 E'),
(53, 'W', 6, 'BSIT 2 W'),
(54, 'C', 7, 'BSBA 2 C'),
(55, 'D', 7, 'BSBA 2 D'),
(56, 'C', 8, 'BSHM 2 C'),
(57, 'D', 8, 'BSHM 2 D'),
(58, 'C', 9, 'BEED 2 C'),
(59, 'D', 9, 'BEED 2 D'),
(60, 'C', 10, 'BSED 2 C'),
(61, 'D', 10, 'BSED 2 D'),
(62, 'E', 11, 'BSIT 3 E'),
(63, 'W', 11, 'BSIT 3 W'),
(64, 'C', 12, 'BSBA 3 C'),
(65, 'D', 12, 'BSBA 3 D'),
(66, 'C', 13, 'BSHM 3 C'),
(67, 'D', 13, 'BSHM 3 D'),
(68, 'C', 14, 'BEED 3 C'),
(69, 'D', 14, 'BEED 3 D'),
(70, 'C', 15, 'BSED 3 C'),
(71, 'D', 15, 'BSED 3 D'),
(72, 'E', 16, 'BSIT 4 E'),
(73, 'W', 16, 'BSIT 4 W'),
(74, 'C', 17, 'BSBA 4 C'),
(75, 'D', 17, 'BSBA 4 D'),
(76, 'C', 18, 'BSHM 4 C'),
(77, 'D', 18, 'BSHM 4 D'),
(78, 'C', 19, 'BEED 4 C'),
(79, 'D0', 19, 'BEED 4 D'),
(80, 'C', 20, 'BSED 4 C'),
(81, 'D', 20, 'BSED 4 D');

-- --------------------------------------------------------

--
-- Table structure for table `selected_subject`
--

CREATE TABLE `selected_subject` (
  `select_id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) DEFAULT NULL,
  `sem_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `sem_status`) VALUES
(1, 'First Sem', '1'),
(2, 'Second Sem', '0'),
(3, 'Summer', '0');

-- --------------------------------------------------------

--
-- Table structure for table `shift_students`
--

CREATE TABLE `shift_students` (
  `shift_id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `semester_id` varchar(30) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL DEFAULT '',
  `age` varchar(255) DEFAULT NULL,
  `strand` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `home_zipcode` varchar(11) DEFAULT NULL,
  `nsat_score` varchar(255) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `elementary` varchar(255) DEFAULT NULL,
  `elem_year` varchar(255) DEFAULT NULL,
  `elem_address` varchar(255) DEFAULT NULL,
  `high_school` varchar(255) DEFAULT NULL,
  `high_year` varchar(255) DEFAULT NULL,
  `high_address` varchar(255) DEFAULT NULL,
  `school_graduated` varchar(255) DEFAULT NULL,
  `school_year` varchar(20) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status_type` varchar(255) DEFAULT NULL,
  `academic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `applicant_id`, `fname`, `mname`, `lname`, `semester_id`, `course_id`, `year_id`, `section_id`, `id_number`, `age`, `strand`, `address`, `status`, `gender`, `place_of_birth`, `date_of_birth`, `religion`, `contact`, `email`, `guardian`, `occupation`, `guardian_address`, `home_zipcode`, `nsat_score`, `year`, `elementary`, `elem_year`, `elem_address`, `high_school`, `high_year`, `high_address`, `school_graduated`, `school_year`, `school_address`, `type`, `status_type`, `academic`) VALUES
(123, '', 'asdad', 'asdasd', 'asdasd', 'First Sem', 0, 0, 0, '', '21', 'dasdsa', 'd', 'Single', 'Male', 'asdasds', 'adasds', 'dasd', '2323232232', 'medallofrancisjude@gmail.com', 'asdasds', 'asdasdas', 'd', '2323', 'asdasd', 'dad', 'asda', 'adads', 'asdsa', 'dasd', 'asda', 'asda', 'dasd', 'asdas', 'asda', 'New', 'Accept Applicant', '2023-2024'),
(124, 'APP10000001', 'asdsd', 'dasds', 'dadas', 'First Sem', 0, 0, 0, '', '22', 'Transferee', 'asdasd', 'Married', 'Male', 'asdasda', 'sadasd', 'asasd', '2322322323', 'medallofrancisjude@gmail.com', 'asda', 'dd', 'da', 'sd232asd', 'asdasd', 'adas', 'dasd', 'asd', 'das', 'a', 'asd', 'das', 'dsad', 'ada', 'sd', 'Transferee', 'Accept_form', '2023-2024'),
(125, 'APP10000002', 'wsdasd', 'asdasd', 'asdasd', 'First Sem', 0, 0, 0, '', '21', 'asd', 'asdasdadd', 'Single', 'Male', 'asds', 'ds', 'das', '2323232322', 'medallofrancisjude@gmail.com', 'asdas', 'dd', 'sda', '232', 'as', 'dsa', 'd', 'da', 'asdasdd', 'ad', 'da', 'dsa', 's', 'sa', 'ada', 'New', 'Accept_form', '2023-2024'),
(126, '', 'zczcscs', 'asdas', 'asdas', 'First Sem', 1, 1, 0, '2019-0349', '21', '', '2adasd', '3', 'Male', 'asdasd', 'asdasd', 'dasdas', '09090909999', 'sdasd@asdad', 'dasd', 'sd', 'sadasd', '223', 'asdad', 'sda', 'asd', 'dasd', 'asdd', 'sd', 'asdas', 'dasd', 'sad', 'asd', 'asd', 'Regular', 'Old Students', '2023-2024'),
(127, 'APP10000003', 'Francis Jude', 'Mancio', 'Medallo', 'First Sem', 1, 1, 42, '2023-0001', '22', 'TVL', 'Talangnan, Madridejos, Cebu', 'Single', 'Male', 'Talangnan, Madridejos, Cebu', 'October 04, 2000', 'sdasd', '2312222232', 'medallofrancisjude@gmail.com', 'asdasd', 'asdasda', 'sddasd', '2323', 'dad', 'd', 'asd', 'sd', 'sda', 'sd', 'da', 'sdasasd', 'asdasd', 'adasd', 'sadasd', 'New', 'Enroll New Students', '2023-2024'),
(128, '', 'asda', 'asd', 'asd', 'First Sem', 1, 1, 1, '2020-0002', '23', '', 'sdssad', 'Single', 'Female', 'asda', 'd', 'dad', '2223223232', 'asdad@asdad', 'a', 'add', 'da', '223', 'sda', 'sddad', 'ad', 'asd', 'ds', 'ad', 'as', 'asd', 'sad', 'sa', 'das', 'Regular', 'Enroll Old Students', '2025-2026'),
(129, '', 'assa', 'adas', 'asda', 'First Sem', 1, 1, 0, 'adasd', '23', '', 'sdad', 'Single', 'Male', 'asdasd', 'sdasd', 'sdas', '2323232232', 'asdsa@adad', 'dsa', 'sdas', 'd', '2323', 'awd', 'ad', 's', 'da', 'sa', 'dad', 'as', 'dad', 'asd', 'as', 'dasd', 'Regular', 'Old Students', '2025-2026'),
(130, '', 'assad', 'sadasd', 'asd', 'First Sem', 2, 2, 0, 'adasdd', '21', '', 'sadd', 'Single', 'Male', 'dsad', 'dds', 'sdas', '2232322322', 'asas@asd', 's', 'ds', 'dd', '232', 'asd', 'das', 'a', 'a', 'd', 'as', 'dasd', 'sd', 'asdas', 'asd', 'sada', 'Regular', 'Old Students', '2025-2026'),
(131, '', 'asdas', 'asd', 'asd', 'First Sem', 1, 1, 0, '202-0009', '21', '', 'asdasd', 'Married', 'Male', 'asda', 'd', 'asds', '23232323223', 'medaasd@ASDAS', 'DSD', 'ADAS', 'DAD', '232', 'ASDASD', 'DASD', 'DAS', 'ASDAS', 'SDAS', 'SDS', 'ASDAS', 'ASD', 'ASDASD', 'ASD', 'ASD', 'Regular', 'Pre Old Students', '2025-2026'),
(132, '', 'sadas', 'asd', 'adsa', 'First Sem', 1, 1, 0, '020202', '21', '', 'dsad', 'Single', 'Male', 'asdasd', 'asda', 'dsds', '23232322323', 'measdas@sddasd', 'sadds', 'sdsa', 's', '2323', 'dasd', 'sdda', 'asd', 'ddas', 'dasdsa', 'dasd', 'asdsa', 'sadd', 'asdas', 'dasd', 'sad', 'Regular', 'Pre Old Students', '2025-2026'),
(133, 'APP10000004', 'asdsad', 'asdsad', 'asdasd', 'First Sem', 0, 0, 0, '', '21', 'sadsad', 'asdsadsadsad', 'Single', 'Male', 'asdsad', 'Octobersadsad', 'sadsad', '09876546231', 'jdc.cafe@gmail.com', 'asdsad', 'asdsad', 'asdsad', '6053', 'asdsads', 'asdsad', 'asdsadsadsad', 'asdsadsad', 'asdsad', 'asdsadas', 'Form Done', 'asdsad', 'asdsad', 'asdsad', 'asdsad', 'New', 'Accept Applicant', '2025-2026'),
(134, 'APP10000005', 'aksdkjsh', 'asjhdj', 'akjdhakjh', 'First Sem', 0, 0, 0, '', '26', 'ajksdsjkah', 'asd', 'Single', 'Male', 'asdas', 'dasdad', 'asdasd', '09213677154', 'jdc.cafe@gmail.com', 'asdasd', 'asdsad', 'asdsad', '6053', 'asdsad', 'asdsad', 'asdasd', 'asdasdas', 'asdsad', 'asdsad', 'asdasdas', 'asdasd', 'asdasd', 'asdsad', 'asdsadsad', 'New', 'Accept', '2025-2026');

-- --------------------------------------------------------

--
-- Table structure for table `student_acc`
--

CREATE TABLE `student_acc` (
  `Id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_acc`
--

INSERT INTO `student_acc` (`Id`, `id_number`, `pass`) VALUES
(45, '2019-0349', '07d4a5ce0e'),
(46, '2023-0001', '3b457015f9'),
(47, '2020-0002', '55edd73caf');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `lab_unit` int(11) DEFAULT 0,
  `days` varchar(255) DEFAULT NULL,
  `time_sched` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `semester_id` varchar(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_name`, `units`, `lab_unit`, `days`, `time_sched`, `room`, `instructor`, `semester_id`, `course_id`, `year_id`, `section_id`) VALUES
(163, 'ITE 111', 'INTRODUCTION TO COMPUTING LAB', '1', 3, 'MWF', '8:30 - 9:30', '-', '-', 'First Sem', 1, 1, 42),
(164, 'SOCSCI 110', 'UNDERSTANDING THE SELF', '3', 0, 'MWF', '9:30 - 10:30', '-', '-', 'First Sem', 1, 1, 42),
(165, 'ITE 112', 'COMPUTER PROGRAMMING 1 LAB', '1', 3, 'MWF', '10:30 - 11:30', '-', '-', 'First Sem', 1, 1, 42),
(166, 'HIST 110', 'READINGS IN THE PHILIPPINE HISTORY', '3', 0, 'MWF', '1:00 - 2:00', '-', '-', 'First Sem', 1, 1, 42),
(167, 'NSTP 1', 'NATIONAL SERVICE TRAINING PROGRAM 1', '3', 0, 'MWF', '2:00 - 3:00', '-', '-', 'First Sem', 1, 1, 42),
(168, 'PE1', 'MOVEMENT ENHANCEMENT', '2', 0, 'FRIDAY', '3:00 - 5:00', '-', '-', 'First Sem', 1, 1, 42),
(169, 'MATH 110', 'MATHEMATICS IN THE MODERN WORLD', '3', 0, 'MWF', '5:15 - 6:15', '-', '-', 'First Sem', 1, 1, 42),
(170, 'FIL 110', 'KOMUNIKASYON SA AKADEMIKONG FILIPINO', '3', 0, 'MWF', '6:15 - 7:15', '-', '-', 'First Sem', 1, 1, 42),
(171, 'ITE 111', 'INTRODUCTION TO COMPUTING LEC', '2', 0, 'TTH', '8:00 - 9:00', '-', '-', 'First Sem', 1, 1, 42),
(172, 'LIT 110', 'THE CONTEMPORARY WORLD', '3', 0, 'TTH', '9:00 - 10:30', '-', '-', 'First Sem', 1, 1, 42),
(173, 'ITE 112', 'COMPUTER PROGRAMMING 1 LEC', '2', 0, 'TTH', '11:00 - 12:00', '-', '-', 'First Sem', 1, 1, 42),
(174, '', 'GENERAL BIOLOGY', '3', 0, 'TTH', '1:00 - 2:30', '-', '-', 'First Sem', 1, 1, 42),
(175, '', 'PRE-CALCULUS', '3', 0, 'TTH', '2:30 - 4:00', '-', '-', 'First Sem', 1, 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `system_id` int(11) NOT NULL,
  `email_subject` text DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `email_pass` varchar(255) DEFAULT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `email_enroll` text DEFAULT NULL,
  `email_enroll_sub` text DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`system_id`, `email_subject`, `email_body`, `email_user`, `email_pass`, `email_name`, `email_enroll`, `email_enroll_sub`, `domain`) VALUES
(1, 'MCC - Entrance Exam Schedule', 'Madridejos Community College verified your form.\r\nYou may now select a date and time schedule for admission test/entrance exam.\r\nLink provided below. Thank you!', 'jdc.cafe@gmail.com', 'xisejqvudpipwneb', 'Madridejos Community College', 'Madridejos Community College Enrollment is now going on.\r\nHere is the schedule\r\nBSIT - March 10 2023\r\nBSBA - March 11 2023\r\nBSHM - March 12 2023\r\nBSED - March 13 2023\r\nBEED - March 14 2023', 'MCC - Enrollment Scheduled', 'https://madridejoscommunitycollege.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Guidance Office','BSIT Portal','BSBA Portal','BSHM Portal','BSED Portal','BEED Portal','Registrar Office','ID Section','COR Section') NOT NULL DEFAULT 'Guidance Office',
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `online` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `address`, `code`, `profile`, `contact`, `department`, `status`, `online`) VALUES
(1, 'guidance@gmail.com', 'guidance', 'Guidance Office', 'Guidance Nameasdsd', 'Try', '', 'picture.png', '090909090999', 'Guidance Office Department', 'Admin', 1),
(3, 'bsit@gmail.com', 'bsit', 'BSIT Portal', 'BSIT NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(4, 'registrar@gmail.com', 'registrar', 'Registrar Office', 'REGISTRAR NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(5, 'medallofrancisjude@gmail.com', 'cor', 'COR Section', 'COR NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(6, 'id@gmail.com', 'id', 'ID Section', 'ID NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(7, 'bsba@gmail.com', 'bsba', 'BSBA Portal', 'BSBA-FM NAMe', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(8, 'bshm@gmail.com', 'bshm', 'BSHM Portal', 'BSHM NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(9, 'bsed@gmail.com', 'bsed', 'BSED Portal', 'BSED NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1),
(10, 'beed@gmail.com5', 'beed', 'BEED Portal', 'BEED NAME', 'Try', '', 'picture.png', '090909090999', 'Department', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year_lvl`
--

CREATE TABLE `year_lvl` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `year_lvl`
--

INSERT INTO `year_lvl` (`year_id`, `year_name`, `course_id`) VALUES
(1, '1st Year', 1),
(2, '1st Year', 2),
(3, '1st Year', 3),
(4, '1st Year', 4),
(5, '1st Year', 5),
(6, '2nd Year', 1),
(7, '2nd Year', 2),
(8, '2nd Year', 3),
(9, '2nd Year', 4),
(10, '2nd Year', 5),
(11, '3rd Year', 1),
(12, '3rd Year', 2),
(13, '3rd Year', 3),
(14, '3rd Year', 4),
(15, '3rd Year', 5),
(16, '4th Year', 1),
(17, '4th Year', 2),
(18, '4th Year', 3),
(19, '4th Year', 4),
(20, '4th Year', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `// your database connection and configuration`
--
ALTER TABLE `// your database connection and configuration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_list`
--
ALTER TABLE `admission_list`
  ADD PRIMARY KEY (`list_id`,`applicant_id`);

--
-- Indexes for table `admission_sched`
--
ALTER TABLE `admission_sched`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `admission_score`
--
ALTER TABLE `admission_score`
  ADD PRIMARY KEY (`admission_id`,`applicant_id`);

--
-- Indexes for table `admission_time`
--
ALTER TABLE `admission_time`
  ADD PRIMARY KEY (`sched_time_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`,`applicant_id`,`id_number`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `guidance_record`
--
ALTER TABLE `guidance_record`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`qr_id`,`student_id`);

--
-- Indexes for table `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`,`student_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`,`year_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `selected_subject`
--
ALTER TABLE `selected_subject`
  ADD PRIMARY KEY (`select_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `shift_students`
--
ALTER TABLE `shift_students`
  ADD PRIMARY KEY (`shift_id`,`id_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`,`applicant_id`,`id_number`,`course_id`,`year_id`,`section_id`),
  ADD KEY `semester_id` (`semester_id`,`course_id`,`year_id`,`section_id`),
  ADD KEY `students_ibfk_1` (`section_id`),
  ADD KEY `students_ibfk_3` (`year_id`),
  ADD KEY `students_ibfk_4` (`course_id`);

--
-- Indexes for table `student_acc`
--
ALTER TABLE `student_acc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`,`course_id`,`year_id`,`section_id`),
  ADD KEY `sections` (`semester_id`,`course_id`,`year_id`,`section_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_lvl`
--
ALTER TABLE `year_lvl`
  ADD PRIMARY KEY (`year_id`),
  ADD KEY `course_id` (`course_id`,`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `// your database connection and configuration`
--
ALTER TABLE `// your database connection and configuration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_list`
--
ALTER TABLE `admission_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admission_sched`
--
ALTER TABLE `admission_sched`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admission_score`
--
ALTER TABLE `admission_score`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admission_time`
--
ALTER TABLE `admission_time`
  MODIFY `sched_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `guidance_record`
--
ALTER TABLE `guidance_record`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `que`
--
ALTER TABLE `que`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `selected_subject`
--
ALTER TABLE `selected_subject`
  MODIFY `select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift_students`
--
ALTER TABLE `shift_students`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `student_acc`
--
ALTER TABLE `student_acc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `year_lvl`
--
ALTER TABLE `year_lvl`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `year_lvl`
--
ALTER TABLE `year_lvl`
  ADD CONSTRAINT `year_lvl_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
