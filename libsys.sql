-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 04:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `libsys_admin`
--

CREATE TABLE `libsys_admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_contact` varchar(20) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_admin`
--

INSERT INTO `libsys_admin` (`a_id`, `a_name`, `a_contact`, `a_password`, `a_status`) VALUES
(10, 'Abid', '01922262323', '7b47ec1a52f0704f4437070e077ae105', 1),
(11, 'Mishu', '01726833399', 'a76ac59a6e17a3a04a5d04f4676f4162', 1),
(12, 'Hasan', '01800001111', 'cc03e747a6afbbcbf8be7668acfebee5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `libsys_author`
--

CREATE TABLE `libsys_author` (
  `au_id` int(11) NOT NULL,
  `au_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_author`
--

INSERT INTO `libsys_author` (`au_id`, `au_name`) VALUES
(1, 'Imdadul Haque Milon'),
(2, 'Humayun Ahmed'),
(3, 'Muntassir Mamoon'),
(4, 'Muhammed Zafar Iqbal'),
(5, 'Anisul Hoque'),
(6, 'Rabindranath Tagore'),
(7, 'Syed Shamsul Haque'),
(8, 'Selina Hossain'),
(9, 'Arif Azad');

-- --------------------------------------------------------

--
-- Table structure for table `libsys_books`
--

CREATE TABLE `libsys_books` (
  `b_id` int(11) NOT NULL,
  `b_code` varchar(50) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_author` int(11) NOT NULL,
  `b_publishar` int(11) NOT NULL,
  `b_qty` int(11) NOT NULL,
  `b_self` int(11) NOT NULL,
  `b_price` decimal(10,2) NOT NULL,
  `b_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_books`
--

INSERT INTO `libsys_books` (`b_id`, `b_code`, `b_name`, `b_author`, `b_publishar`, `b_qty`, `b_self`, `b_price`, `b_status`) VALUES
(1, '100', 'PHP', 0, 0, 0, 10, '250.00', 0),
(2, '101', 'JAVA', 0, 0, 99, 11, '222.00', 1),
(3, '233', 'ANDROID', 0, 0, 0, 5, '778.00', 0),
(4, '567', 'WORDRESS', 0, 0, 98, 7, '678.00', 1),
(5, '679', 'PHYSICS', 0, 0, 100, 3, '545.00', 1),
(6, '673', 'MATH', 0, 0, 0, 9, '545.00', 0),
(7, '239', 'BIOLOGY', 0, 0, 100, 4, '345.00', 1),
(8, '559', 'C PROGRAMMING', 0, 0, 97, 6, '345.00', 1),
(11, '600', 'C++', 0, 0, 0, 4, '445.00', 0),
(12, '344', 'JAVASCRIPT', 0, 0, 199, 4, '767.00', 1),
(13, '835', 'PYTHON', 5, 6, 85, 2, '640.00', 1),
(14, '111000', 'ICT', 4, 6, 50, 14, '330.00', 1),
(15, '119', 'MA MA MA AND BABA', 9, 1, 10, 5, '118.00', 1),
(16, '222', 'MISHU SHISHU', 8, 2, 4, 5, '120.00', 1),
(17, '333', 'NONDITTO NOROKE', 1, 2, 19, 15, '150.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `libsys_departments`
--

CREATE TABLE `libsys_departments` (
  `d_id` int(11) NOT NULL,
  `d_code` varchar(100) NOT NULL,
  `d_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_departments`
--

INSERT INTO `libsys_departments` (`d_id`, `d_code`, `d_name`) VALUES
(1, 'PHY', 'PHYSICS'),
(2, 'BAN', 'BANGLA'),
(3, 'CSE', 'COMPUTER SCIENCE ENG'),
(4, 'ENG', 'ELL');

-- --------------------------------------------------------

--
-- Table structure for table `libsys_issue`
--

CREATE TABLE `libsys_issue` (
  `i_id` int(11) NOT NULL,
  `i_book_id` int(11) NOT NULL,
  `i_student_id` int(11) NOT NULL,
  `i_check` int(11) NOT NULL COMMENT 'book_id+student_id',
  `i_date` date NOT NULL,
  `i_e_date` date NOT NULL COMMENT 'End date',
  `i_r_date` date NOT NULL,
  `i_fine` decimal(10,2) NOT NULL,
  `i_status` int(11) NOT NULL COMMENT '0=return,1=issued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_issue`
--

INSERT INTO `libsys_issue` (`i_id`, `i_book_id`, `i_student_id`, `i_check`, `i_date`, `i_e_date`, `i_r_date`, `i_fine`, `i_status`) VALUES
(63, 2, 1, 21, '2018-10-28', '2018-11-12', '2018-10-28', '38.00', 1),
(67, 8, 17, 817, '2018-10-29', '2018-11-13', '0000-00-00', '0.00', 1),
(80, 13, 8, 0, '2018-10-30', '2018-11-14', '2018-11-25', '11.00', 0),
(81, 12, 17, 1217, '2018-11-07', '2018-11-22', '0000-00-00', '0.00', 1),
(82, 4, 17, 417, '2018-11-07', '2018-11-22', '0000-00-00', '0.00', 1),
(83, 4, 5, 45, '2018-11-07', '2018-11-22', '0000-00-00', '0.00', 1),
(84, 13, 5, 135, '2018-11-07', '2018-11-22', '0000-00-00', '0.00', 1),
(85, 3, 4, 34, '2018-11-07', '2018-11-22', '0000-00-00', '0.00', 1),
(86, 16, 1, 161, '2019-10-05', '2019-10-20', '0000-00-00', '0.00', 1),
(87, 17, 2, 172, '2019-10-21', '2019-11-05', '0000-00-00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `libsys_publisher`
--

CREATE TABLE `libsys_publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_publisher`
--

INSERT INTO `libsys_publisher` (`pub_id`, `pub_name`) VALUES
(1, 'SOMOY'),
(2, 'ANONNA'),
(3, 'OITIJJHYA'),
(4, 'AGAMEE PRAKASHANI'),
(5, 'UNIVERSITY PRESS'),
(6, 'KAKOLI PROKASHONI');

-- --------------------------------------------------------

--
-- Table structure for table `libsys_semester`
--

CREATE TABLE `libsys_semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_semester`
--

INSERT INTO `libsys_semester` (`sem_id`, `sem_name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th');

-- --------------------------------------------------------

--
-- Table structure for table `libsys_students`
--

CREATE TABLE `libsys_students` (
  `s_id` int(11) NOT NULL,
  `s_code` varchar(50) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_dept` int(11) NOT NULL,
  `s_semester` int(11) NOT NULL,
  `s_contact` varchar(50) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libsys_students`
--

INSERT INTO `libsys_students` (`s_id`, `s_code`, `s_name`, `s_dept`, `s_semester`, `s_contact`, `s_password`, `s_status`) VALUES
(1, 'C102030', 'XYZ', 1, 2, '01316377019', 'DSFADSFADSFASDFASDFADSFASDFASDFAASDFA', 1),
(2, 'C12345', 'Rakib', 2, 1, '00934243423', 'FDSFSDAFDSDSAFFDFFSADFADSFDSFFASDD', 1),
(3, 'C546766', 'Abid', 1, 1, '454545477567', 'RTTTTTTTRTTTTTFSDFDSGDSGDGDFGFDSG', 0),
(4, 'C56556', 'Emon', 1, 5, '934543405340', 'TTSDGDGSDSDFGFDSGDGSTFHJ', 1),
(5, 'C99977', 'Pqr', 4, 1, '09033043433', 'HDFAFDOGOAGAGFGOOAFSDOF', 0),
(6, 'C444544', 'Sourv', 2, 2, '045445994855', 'HYHHUUJSGFDGERDSFGDF', 1),
(7, 'C333343', 'Das', 4, 1, '04343433435', 'GADGDFGFDHYHDAASF', 0),
(8, '102', 'ifthekhar', 3, 0, '019283888', '96e79218965eb72c92a549dd5a330112', 1),
(11, '107', 'ASLKDFJLAKJD', 3, 0, 'rana93ctg', '698d51a19d8a121ce581499d7b701668', 0),
(12, '999', 'DEDAR', 2, 0, '0128288', '202cb962ac59075b964b07152d234b70', 1),
(17, 'C151022', 'MUHAMMAD HASAN', 3, 0, '01822262323', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(18, 'C141023', 'BODIUR RAHMAN', 3, 0, '01551478963', '331391f1a210be88682bb8c71550b54b', 0),
(19, 'C151023', 'ABDUR RAHMAN MISSION', 2, 0, '01726833399', 'a76ac59a6e17a3a04a5d04f4676f4162', 1),
(21, 'C141022', 'SAIMON UDDIN', 3, 0, '01820289664', 'cca07bda05121b0035484a9b6232439b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libsys_admin`
--
ALTER TABLE `libsys_admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_contact` (`a_contact`);

--
-- Indexes for table `libsys_author`
--
ALTER TABLE `libsys_author`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `libsys_books`
--
ALTER TABLE `libsys_books`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_code` (`b_code`);

--
-- Indexes for table `libsys_departments`
--
ALTER TABLE `libsys_departments`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_code` (`d_code`);

--
-- Indexes for table `libsys_issue`
--
ALTER TABLE `libsys_issue`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `i_check` (`i_check`);

--
-- Indexes for table `libsys_publisher`
--
ALTER TABLE `libsys_publisher`
  ADD PRIMARY KEY (`pub_id`),
  ADD UNIQUE KEY `pub_name` (`pub_name`);

--
-- Indexes for table `libsys_semester`
--
ALTER TABLE `libsys_semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD UNIQUE KEY `sem_name` (`sem_name`);

--
-- Indexes for table `libsys_students`
--
ALTER TABLE `libsys_students`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_code` (`s_code`),
  ADD UNIQUE KEY `s_contact` (`s_contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libsys_admin`
--
ALTER TABLE `libsys_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `libsys_author`
--
ALTER TABLE `libsys_author`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `libsys_books`
--
ALTER TABLE `libsys_books`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `libsys_departments`
--
ALTER TABLE `libsys_departments`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `libsys_issue`
--
ALTER TABLE `libsys_issue`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `libsys_publisher`
--
ALTER TABLE `libsys_publisher`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `libsys_semester`
--
ALTER TABLE `libsys_semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `libsys_students`
--
ALTER TABLE `libsys_students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
