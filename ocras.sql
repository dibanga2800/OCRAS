-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 02:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocras`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `PatientId` int(255) NOT NULL,
  `PatientName` varchar(255) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` varchar(255) NOT NULL,
  `PaymentStatus` varchar(255) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` date NOT NULL DEFAULT current_timestamp(),
  `deleted` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `PatientId`, `PatientName`, `doctorSpecialization`, `doctorId`, `PaymentStatus`, `appointmentDate`, `appointmentTime`, `doctorStatus`, `postingDate`, `updatedDate`, `deleted`) VALUES
(42, 28, 'Joan Peter', 'Optician', '9', 'paid', '2020-05-27', '12:00 PM', 1, '2019-12-12 16:45:51', '2020-05-20', 0),
(43, 29, 'Philip Bellamy', 'Optician', '11', 'paid', '2019-12-26', '2:00 PM', 1, '2019-12-12 16:46:32', '2020-05-20', 0),
(44, 30, 'James Simon', 'Optician', '9', 'paid', '2019-12-24', '3:00 PM', 1, '2019-12-12 16:47:00', '2020-05-20', 0),
(45, 31, 'David Ibanga', 'Optician', '11', 'paid', '2019-12-18', '2:30 PM', 1, '2019-12-12 16:47:39', '2020-05-20', 1),
(47, 34, 'Jeremy David', 'Optician', '9', 'Paid', '2020-05-01', '10:30 AM', 1, '2020-04-30 10:17:25', '2020-05-20', 1),
(48, 37, 'Christian Perosky', '', '12', 'paid', '2020-05-28', '11:30 AM', 1, '2020-05-20 10:31:40', '2020-05-20', 0),
(50, 37, 'Christian Perosky', 'Orthoptist', '12', 'paid', '2020-05-30', '1:45 PM', 1, '2020-05-20 10:33:05', '2020-05-20', 0),
(51, 34, 'Jeremy David', 'Optometry and Optometrists', '12', 'paid', '2020-05-26', '10:45 AM', 1, '2020-05-20 10:33:26', '2020-05-20', 0),
(52, 37, 'Christian Perosky', 'Orthoptist', '12', 'paid', '2020-05-31', '4:30 PM', 1, '2020-05-20 15:25:23', '2020-05-20', 0),
(53, 41, 'Viva Test', 'Optician', '9', 'paid', '2020-05-26', '10:45 AM', 1, '2020-05-26 09:05:51', '2020-05-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bills_id` int(11) NOT NULL,
  `PatientId` varchar(255) CHARACTER SET latin1 NOT NULL,
  `PatientName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Consultancy_Charge` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Payment_Status` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bills_id`, `PatientId`, `PatientName`, `Consultancy_Charge`, `Payment_Status`) VALUES
(34, '28', 'Joan Peter', '20', 'paid'),
(35, '29', 'Philip Bellamy', '20', 'paid'),
(36, '30', 'James Simon', '20', 'paid'),
(37, '31', 'David Ibanga', '20', 'paid'),
(38, '32', 'DMU user', '20', 'paid'),
(39, '34', 'Jeremy David', '50', 'Paid'),
(40, '34', 'Jeremy David', '23', 'paid'),
(41, '35', 'Simon Grace', '20', 'Paid'),
(42, '37', 'Christian Perosky', '20', 'paid'),
(43, '38', 'Helen Paul', '30', '3'),
(44, '39', 'David Mat', '20', 'Paid'),
(45, '41', 'Viva Test', '20', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Timberland'),
(2, 'Tommy Hilfiger'),
(3, 'Converse'),
(5, 'Hugo'),
(16, 'Ultralight'),
(17, 'Disney'),
(19, 'Aurora');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` int(11) NOT NULL,
  `shipped` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `items`, `expire_date`, `paid`, `shipped`) VALUES
(62, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-01-22 10:01:44', 0, 0),
(63, '[{\"id\":\"7\",\"quantity\":1,\"size\":\" small\"}]', '2020-01-22 13:35:49', 0, 0),
(64, '[{\"id\":\"3\",\"quantity\":4,\"size\":\"large\"},{\"id\":\"3\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-01-12 16:32:19', 1, 1),
(65, '[{\"id\":\"7\",\"quantity\":\"8\",\"size\":\" small\"},{\"id\":\"9\",\"quantity\":\"4\",\"size\":\"large\"}]', '2020-01-15 15:47:31', 1, 1),
(67, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"},{\"id\":\"1\",\"quantity\":\"2\",\"size\":\" small\"},{\"id\":\"1\",\"quantity\":5,\"size\":\"large\"},{\"id\":\"1\",\"quantity\":4,\"size\":\"medium\"},{\"id\":\"3\",\"quantity\":\"11\",\"size\":\"large\"}]', '2020-01-15 18:03:03', 0, 0),
(68, '[{\"id\":\"9\",\"quantity\":2,\"size\":\" small\"},{\"id\":\"2\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-01-16 15:49:06', 0, 0),
(69, '[{\"id\":\"10\",\"quantity\":\"1\",\"size\":\" medium\"}]', '2020-01-26 17:16:39', 1, 1),
(70, '[{\"id\":\"10\",\"quantity\":\"1\",\"size\":\" medium\"},{\"id\":\"9\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-01-16 17:18:45', 0, 0),
(72, '[{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"     large\"}]', '2020-02-01 14:07:29', 0, 0),
(74, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"medium\"}]', '2020-02-01 14:15:30', 0, 0),
(75, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"},{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"       small\"}]', '2020-01-22 16:27:00', 1, 0),
(76, '[{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 14:46:17', 0, 0),
(77, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 16:31:17', 1, 0),
(78, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 16:34:48', 1, 0),
(79, '[{\"id\":\"8\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 16:43:33', 0, 0),
(80, '[{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"large\"}]', '2020-02-01 16:45:55', 0, 0),
(81, '[{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-01-22 16:57:37', 0, 0),
(82, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 16:59:24', 1, 1),
(83, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 17:20:24', 1, 1),
(85, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-01 17:32:16', 1, 1),
(86, '[{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"medium\"}]', '2020-02-01 17:44:59', 1, 0),
(87, '[{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"large\"}]', '2020-02-02 10:24:04', 1, 0),
(88, '[{\"id\":\"4\",\"quantity\":7,\"size\":\"large\"}]', '2020-02-02 11:46:30', 1, 1),
(89, '[{\"id\":\"11\",\"quantity\":\"1\",\"size\":\"medium\"}]', '2020-02-02 12:03:01', 0, 0),
(90, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-02-02 12:17:34', 1, 0),
(91, '[{\"id\":\"4\",\"quantity\":\"7\",\"size\":\"large\"}]', '2020-02-02 12:33:17', 1, 1),
(92, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\"medium\"}]', '2020-02-02 12:42:14', 1, 0),
(93, '[{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"large\"}]', '2020-02-02 12:45:31', 1, 1),
(94, '[{\"id\":\"3\",\"quantity\":\"3\",\"size\":\"Large\"}]', '2020-02-02 12:57:53', 1, 0),
(95, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-02-02 13:19:47', 1, 1),
(96, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-02-02 13:29:10', 1, 1),
(97, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"medium\"},{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"large\"}]', '2020-01-28 22:11:19', 0, 0),
(98, '[{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"     small\"},{\"id\":\"11\",\"quantity\":\"1\",\"size\":\"medium\"}]', '2020-02-10 20:17:23', 0, 0),
(99, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-05-06 17:42:41', 1, 1),
(100, '[{\"id\":\"7\",\"quantity\":1,\"size\":\" small\"}]', '2020-05-09 11:57:35', 1, 1),
(102, '[{\"id\":\"4\",\"quantity\":10,\"size\":\"small\"},{\"id\":\"3\",\"quantity\":14,\"size\":\"     small\"}]', '2020-05-20 18:46:27', 0, 0),
(103, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\"medium\"},{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"     small\"},{\"id\":\"4\",\"quantity\":\"1\",\"size\":\"large\"}]', '2020-05-25 17:25:22', 1, 0),
(104, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-06-09 16:53:58', 0, 0),
(105, '[{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"     small\"}]', '2020-06-16 22:17:06', 1, 0),
(106, '[{\"id\":\"3\",\"quantity\":\"1\",\"size\":\"Large\"}]', '2020-06-17 19:54:25', 0, 0),
(107, '[{\"id\":\"7\",\"quantity\":\"1\",\"size\":\" small\"}]', '2020-06-29 15:29:32', 1, 0),
(108, '[{\"id\":\"2\",\"quantity\":\"1\",\"size\":\"small\"}]', '2020-06-29 17:27:40', 0, 0),
(109, '[{\"id\":\"2\",\"quantity\":1,\"size\":\"small\"}]', '2020-06-25 14:12:41', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Female', 0),
(2, 'Male', 0),
(3, 'Teens', 0),
(4, 'Designers', 3),
(9, 'Designers', 2),
(10, 'Optical', 2),
(13, 'Optical', 3),
(18, 'Designers1', 1),
(19, 'Optical', 1),
(20, 'Sun glasses', 1),
(21, 'Sun glasses', 2);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diag_id` int(11) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diag_id`, `diagnosis`, `medication`, `type`, `advice`, `days`, `qty`) VALUES
(1, 'cataract', 'Cyclogik', 'Eye drop', 'Before sleep at night', '2', '1'),
(2, 'Cataract hypermature', 'Ciplox', 'Ointment', 'One drop daily', '4', '2'),
(3, 'Cataract Immature', 'Domstal', 'Tablet', 'One drop two times', '6', '3'),
(4, 'Cataract mature', 'Atropine', '', 'One tablet daily', '8', '4'),
(5, 'Colour blindness Red green partial', 'Toba', '', '', '10', '5'),
(6, 'Chemical injury', '', '', '', '12', '6'),
(7, 'Complex Myopia', '', '', '', '', ''),
(8, 'Congenital Cataract', '', '', '', '', ''),
(9, 'Conjunctivities', '', '', '', '', ''),
(10, 'Conjunctivities viral', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specialization`, `doctorName`, `address`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(3, 'Low Vision Specialist', 'Nitesh James', 'London Eye centre new', 8523699999, 'nitesh@gmail.com', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '2017-01-07 07:43:35', '2020-05-20 11:19:24'),
(9, 'Optician', 'David Seesaw', 'Spec savers1', 2135445685, 'david.seesaw@specsavers.com', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '2019-10-14 09:57:08', '2020-05-20 10:47:53'),
(11, 'Ophthalmology and Ophthalmologists', 'Ben Carson', 'Leicester Eye Specialist', 12123654, 'ben.carson@gmail.com', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '2019-10-14 10:11:33', '2020-05-01 15:31:07'),
(12, 'Orthoptist', 'David Test', '2 Bank Rd', 25555588, 'davidtest@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-05-01 13:31:32', '2020-05-20 08:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecialization`
--

CREATE TABLE `doctorspecialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecialization`
--

INSERT INTO `doctorspecialization` (`id`, `specialization`, `creationDate`, `updationDate`) VALUES
(1, 'Low Vision Specialist', '2019-09-28 05:37:25', '2019-10-14 09:27:37'),
(2, 'Orthoptist', '2019-09-28 05:38:12', '2019-10-14 09:27:17'),
(3, 'Optician', '2019-09-28 05:38:48', '2019-10-14 09:27:02'),
(4, 'Optometry and Optometrists', '2019-09-28 05:39:26', '2019-10-14 09:27:55'),
(5, 'Ophthalmology and Ophthalmologists', '2019-09-28 05:39:51', '2019-10-14 09:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `etest`
--

CREATE TABLE `etest` (
  `Etest_id` int(11) NOT NULL,
  `Rfactor` varchar(255) NOT NULL,
  `Phistory` varchar(255) NOT NULL,
  `Ccomplaint` varchar(255) NOT NULL,
  `SPH` varchar(255) NOT NULL,
  `CYL` varchar(255) NOT NULL,
  `AXIS` varchar(255) NOT NULL,
  `Purpose` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Quality` varchar(255) CHARACTER SET latin1 NOT NULL,
  `vision` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etest`
--

INSERT INTO `etest` (`Etest_id`, `Rfactor`, `Phistory`, `Ccomplaint`, `SPH`, `CYL`, `AXIS`, `Purpose`, `Quality`, `vision`) VALUES
(1, 'Catract', 'RE H/o Injury', 'LE Defective vision for distance', '+1.00', '+1.00', '5°', 'Constant Use', 'Photo grey/brown ext', '6/6p'),
(2, 'Operated', 'LE H/o Trauma', 'RE Blinking of the eyes', '-1.00', '-1.00', '10°', 'For Near vision only', 'Resilens', '6/4'),
(3, 'Smoking', 'RE H/o Squinting of the eyes', 'LE Dryness, Irritation', '+2.00', '+2.00', '15°', 'For Distant vision only', 'Anti-Glare coating', '6/5'),
(4, 'No Risk', 'RE H/o Fever', 'LE Double vision', '-2.00', '-2.00', '20°', '', 'Dark Glasses', '6/6'),
(5, '', 'LE H/o Exposure to solar eclipe', 'RE Eye Itching', '+1.25', '+1.25', '25°', '', 'White Glass', '6/9p'),
(6, '', 'LE H/o Nothing Significant', 'Defective vision for near', '-0.25', '-0.25', '35°', '', 'High Index Glass', '6/18'),
(7, '', '', 'LE Defective vision for distance', '+1.50', '+1.50', '30°', '', 'Varilux Glass', '6/12p'),
(8, '', '', 'Feels Better now', '-1.50', '-1.50', '40°', '', 'Green Glass', '6/24p'),
(9, '', '', 'Discharge', '+0.25', '+0.25', '45°', '', '', ''),
(10, '', '', '', '+0.75', '+0.75', '50°', '', '', '6/27');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Address` longtext DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `Hospital_no` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `regDate` varchar(30) DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK',
  `updatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `Address`, `email`, `phone`, `occupation`, `gender`, `dob`, `Hospital_no`, `status`, `regDate`, `password`, `updatedDate`) VALUES
(28, 'Joan Peter', '88 sunlane  street', 'joan@gmail.com', '07746204908', 'Make-up Artist', 'female', '14-03-1985', '1212', 'Single', '12-12-2019', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(29, 'Philip Bellamy', 'Hanley', 'philip@gmail.com', '07746204903', 'Musician', 'male', '24-10-2000', '112', 'Single', '12-12-2019', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(30, 'James Simon', 'Wellesley street', 'james@gmail.com', '07746204903', 'Farmer', 'male', '27-07-2000', '115', 'Married', '10-12-2019', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(31, 'David Ibanga', 'Conway House', 'david@gmail.com', '07746204903', 'Web Developer', 'male', '31-07-1990', '114', 'Married', '11-12-2019', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(32, 'DMU user', 'leicester', 'dmu@gmail.com', '08168070044', 'student', 'female', '23-06-1971', '778', 'Single', '13-12-2019', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(34, 'Jeremy David', '202 Beaconsfield Road', 'jeremy@gmail.com', '07055642551', 'Stodent', 'male', '28-04-2020', '152438', 'Single', '30-04-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(35, 'Simon Grace', 'Tudor Road', 'simon@gmail.com', '07745621358', 'Student', 'female', '26-05-2020', '2313', 'Single', '20-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(36, 'Andrew Paul', 'Leicester', 'addrew@gmail.com', '077895666233', 'Student', 'male', '18-05-2020', '2233', 'Married', '25-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(37, 'Christian Perosky', 'Stoke on Trent', 'christian@yahoo.com', '01254488550', 'Engineer', 'male', '24-11-1960', '2233', 'Married', '26-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(38, 'Helen Paul', '12 Grace building, Manchester', 'helen@gmail.com', '789999995223', 'Student', 'female', '11-05-2020', '2222', 'Married', '26-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(39, 'David Matt', '23 Coventry Road', 'dave@gmail.com', '077889966550', 'Programmer', 'male', '19-05-1982', '333', 'Divorced', '20-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20'),
(40, 'Daniel Lazarus', '2 Mecca Street, Narborough', 'dan@gmail.com', '45698775666', 'Business Analyst', 'male', '17-07-2014', '323', 'Single', '26-05-2020', '$2y$10$/t7MtXKaVH6ubSqQVB0t6O9P6IBFyci/ZGeT04bk69MuhqRerMlOK', '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `pexam`
--

CREATE TABLE `pexam` (
  `Pexam_id` int(11) NOT NULL,
  `PatientId` int(11) NOT NULL,
  `Rfactor` varchar(255) NOT NULL,
  `Phistory` varchar(255) NOT NULL,
  `Ccomplaint` varchar(255) NOT NULL,
  `RSPH` varchar(255) NOT NULL,
  `RCYL` varchar(255) NOT NULL,
  `RAXIS` varchar(255) NOT NULL,
  `LSPH` varchar(255) NOT NULL,
  `LCYL` varchar(255) NOT NULL,
  `LAXIS` varchar(255) NOT NULL,
  `LHDIST` varchar(255) NOT NULL,
  `LVDIST` varchar(255) NOT NULL,
  `LHNEAR` varchar(255) NOT NULL,
  `LVNEAR` varchar(255) NOT NULL,
  `RHDIST` varchar(255) NOT NULL,
  `RVDIST` varchar(255) NOT NULL,
  `RHNEAR` varchar(255) NOT NULL,
  `RVNEAR` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pexam`
--

INSERT INTO `pexam` (`Pexam_id`, `PatientId`, `Rfactor`, `Phistory`, `Ccomplaint`, `RSPH`, `RCYL`, `RAXIS`, `LSPH`, `LCYL`, `LAXIS`, `LHDIST`, `LVDIST`, `LHNEAR`, `LVNEAR`, `RHDIST`, `RVDIST`, `RHNEAR`, `RVNEAR`, `purpose`, `quality`, `remark`) VALUES
(19, 11, 'Operated', 'RE H/o Squinting of the eyes', 'LE Dryness, Irritation', '-1.00', '+2.00', '20°', '+2.00', '-2.00', '25°', '-2.00', '+2.00', '20°', '6/9p', '+2.00', '-2.00', '15°', '6/6', 'Constant Use', 'Varilux Glass', '		11			\r\n															'),
(21, 23, 'Operated', 'LE H/o Trauma', 'RE Blinking of the eyes', '+0.25', '-1.00', '20°', '-1.00', '-1.00', '20°', '-1.00', '+2.00', '15°', '6/5', '+2.00', '-2.00', '15°', '6/5', 'For Distant vision only', 'Anti-Glare coating', '					\r\nSS															'),
(35, 25, 'Operated', 'LE H/o Trauma', 'RE Blinking of the eyes', '-1.50', '-1.00', '15°', '+1.00', '+1.00', '15°', '-1.00', '-1.00', '10°', '6/5', '-1.00', '+1.00', '10°', '6/4', 'For Near vision only', 'Varilux Glass', '		s			\r\n															'),
(36, 25, 'Smoking', 'LE H/o Trauma', 'RE Blinking of the eyes', '+0.25', '+2.00', '10°', '+2.00', '-1.00', '15°', '+1.00', '-1.00', '15°', '6/5', '-1.00', '+2.00', '10°', '6/5', 'For Distant vision only', 'Dark Glasses', '		w			\r\n															'),
(37, 24, 'Operated', 'RE H/o Fever', 'LE Double vision', '+2.00', '+2.00', '10°', '-1.00', '+2.00', '15°', '-1.00', '+2.00', '20°', '6/5', '+1.00', '-1.00', '15°', '6/4', 'For Near vision only', 'Resilens', '					\r\n	q														'),
(38, 23, 'Operated', 'RE H/o Fever', 'LE Dryness, Irritation', '-2.00', '+2.00', '15°', '-2.00', '+2.00', '25°', '+1.25', '+1.25', '35°', '6/12p', '-2.00', '+2.00', '15°', '6/18', 'For Near vision only', 'Resilens', '	jjj				\r\n															'),
(39, 23, 'Smoking', 'RE H/o Injury', 'Defective vision for near', '-1.00', '+2.00', '15°', '+2.00', '-1.00', '10°', '+2.00', '-2.00', '10°', '6/6', '-1.00', '+2.00', '15°', '6/5', 'For Near vision only', 'Resilens', 'l00000					\r\n															'),
(40, 25, 'Operated', 'LE H/o Trauma', 'LE Dryness, Irritation', '+2.00', '+2.00', '15°', '+2.00', '-2.00', '20°', '+2.00', '-2.00', '25°', '6/9p', '+2.00', '+2.00', '15°', '6/5', 'Constant Use', 'Photo grey/brown ext', 'jjifojojodjpdpokods					\r\n															'),
(43, 32, 'No Risk', 'LE H/o Nothing Significant', 'RE Eye Itching', '+1.00', '-2.00', '10°', '+1.00', '+1.00', '5°', '+2.00', '-1.00', '5°', '6/9p', '-1.00', '-1.00', '10°', '6/6p', 'For Distant vision only', 'Anti-Glare coating', 'Test completed'),
(46, 28, 'Operated', 'LE H/o Trauma', 'LE Defective vision for distance', '-1.00', '-1.00', '10°', '+2.00', '-1.00', '10°', '+2.00', '+2.00', '15°', '6/4', '-1.00', '-1.00', '10°', '6/5', 'For Near vision only', 'Dark Glasses', 'ddd'),
(47, 34, 'Operated', 'LE H/o Trauma', 'LE Defective vision for distance', '-1.00', '-1.00', '15°', '+2.00', '+2.00', '15°', '-2.00', '+2.00', '25°', '6/6', '-2.00', '-2.00', '25°', '6/9p', 'For Near vision only', 'White Glass', 'ty');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `brand` int(15) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `sizes` text NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`, `deleted`) VALUES
(2, 'Summer Fresh', '25.00', '32.00', 1, '13', '/OCRAS/images/products/1604577cc3f2cd423c87e0551989fcb3.png', 'Standard glass frame', 1, 'small:3:1,medium:3:2,Large:0:3', 0),
(3, 'Standard Frame', '44.00', '55.00', 2, '10', '/OCRAS/images/products/12451c95bde27d683925467fb2b68b43.jpg', 'This is lovely glass, buy it!', 1, '     small:25:2,Medium:3:2,Large:3:2', 0),
(4, 'Summer frame', '99.00', '105.00', 2, '18', '/OCRAS/images/products/76e175707d6dfa494058168215baff2c.png', 'This is the latest brand, buy i!', 1, 'large:1:2,medium:17:2,small:10:2', 0),
(7, 'Fashion Frames', '22.00', '23.00', 1, '20', '/OCRAS/images/products/a6d70124c1ed269533d37636d46d9689.png', 'This is a lovely frame, buy it!', 1, ' small:2:2,medium:9:2,large:4:2', 0),
(8, 'Fashion', '50.00', '55.00', 5, '19', '/OCRAS/images/products/21a69c3a731c0b27e49f98dee2a7d717.png', 'Fashionable frame, buy it!', 1, 'small:4:2,medium:8:2,large:4:2', 0),
(9, 'Test Frame', '50.00', '55.00', 1, '10', '/OCRAS/images/products/8c11cd07443d5fb8d72e900380e02c21.jpg', 'This product is very good, please buy it!', 1, ' small:7:2,medium:3:2,Large:7:2', 0),
(11, 'New Look', '12.00', '15.50', 2, '10', '/OCRAS/images/products/244e3c516acf29e5e31cc01c68a28cb0.png', 'Buy it!', 1, 'small:0:2,medium:12:2,Large:9:2', 0),
(12, 'Designers Black', '40.00', '42.50', 3, '21', '/OCRAS/images/products/db984356abe6f3533ca5107e6f71d290.png', 'This is male black designers frame, buy it!', 1, '23:5:2,15:10:2,10:15:2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`) VALUES
(8, 'David Ibanga', '88 sun street', 'stoke', 'male', 'dibanga2800@gmail.com', '9c51464123d44efdf145370266bc8e4a', '2019-10-14 09:11:39'),
(12, 'Joy Peter', 'Braunstone', '102, Narborough Road, Leicester', 'female', 'receptionist@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-12-12 16:36:19'),
(14, 'w', 'w', 'w', 'female', 'ww@ww', '698d51a19d8a121ce581499d7b701668', '2020-05-01 15:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `charge_id` varchar(255) NOT NULL,
  `cart_id` int(175) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(175) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street2` varchar(255) NOT NULL,
  `city` varchar(175) NOT NULL,
  `county` varchar(175) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `country` varchar(175) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `charge_id`, `cart_id`, `full_name`, `email`, `street`, `street2`, `city`, `county`, `post_code`, `country`, `sub_total`, `tax`, `grand_total`, `description`, `txn_type`, `txn_date`) VALUES
(21, 'ch_1FtBmnLgIVOzIwCOVXLIC90N', 92, 'David Ibanga', 'dibanga2800@gmail.com', 'dd', 'd', 'd', 'd', 'd', 'd', '22', '1', '23', '1 item from Dibanga Opticians. ', 'charge', '2019-11-24 11:42:50'),
(24, 'ch_1FtCN5LgIVOzIwCOOEiMXpnU', 95, 'David Ibanga', 'test@gmail.com', 'x', 'x', 'x', 'x', 'x', 'x', '22', '1', '23', '1 item from Dibanga Opticians. ', 'charge', '2019-10-24 12:20:19'),
(25, 'ch_1FtCX6LgIVOzIwCOTw2zxmmS', 96, 'Test Transaction', 'ben.carson@gmail.com', '10 Willow house', '', 'Leicester', 'Leicestershire', 'LE1 2HT', 'UK', '25', '1', '26', '1 item from Dibanga Opticians. ', 'charge', '2019-12-24 12:30:41'),
(26, 'ch_1GRLIALgIVOzIwCOKNu4BS9v', 99, 'dd', 'ddd@gmail.com', 'dd', 'd', 'dd', 'dd', 'dd', 'dd', '22', '1', '23', '1 item from Dibanga Opticians. ', 'charge', '2020-03-27 16:44:28'),
(27, 'ch_1GW1cvLgIVOzIwCOCd7xCnJJ', 100, 'ssssssssssssssss', 'ee@yah.com', 'ssssssssssssss', 'ssssssssssssss', 'sssssssssssssss', 'ssssssssssssssss', 'sssssssssss', 'ssssssssssss', '22', '1', '23', '1 item from Dibanga Opticians. ', 'charge', '2020-04-09 15:45:12'),
(28, 'ch_1Gc8tzLgIVOzIwCOkg2tWFLD', 103, 'David Ibanga', 'p2502356@my365.dmu.ac.uk', 'Apartment1 2-4 Wellesley Street', '102 Beaconsfield Rd, Leicester', 'Stoke On Trent', 'Staffordshire', 'ST1 4NW', 'United Kingdom', '165', '8', '173', '3 items from Dibanga Opticians. ', 'charge', '2020-04-26 12:44:10'),
(29, 'ch_1GgGBBLgIVOzIwCOdHcSOzML', 105, 'Jeremy Ibanga', 'dibanga2800@gmail.com', 'wellesley street', '', 'Stoke', 'staffordshire', 'ST1 4NW', 'UK', '44', '2', '46', '1 item from Dibanga Opticians. ', 'charge', '2020-05-07 21:18:55'),
(30, 'ch_1Gks17LgIVOzIwCOqEG04j5j', 107, 'Final Testing', 'talk2sirdave@yahoo.com', 'church Road', '', 'Leicester', 'Leicestershire', 'LE3 0FF', 'UK', '22', '1', '23', '1 item from Dibanga Opticians. ', 'charge', '2020-05-20 14:31:34'),
(31, 'ch_1Gn1gLLgIVOzIwCOofWwvspX', 109, 'Davisco Ltd', 'davisco@gmail.com', 'Sun Street', '', 'Nottingham', 'Nottinghamshire', 'NE2 01F', 'UK', '25', '1', '26', '1 item from Dibanga Opticians. ', 'charge', '2020-05-26 13:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(175) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(1, 'David Ibanga', 'dibanga2800@gmail.com', '$2y$10$9Q7nx6xpFX4iOLlbQoQZnu.qp.UcTqq667sGtyJF4hOq.yMJjriAS', '2019-11-19 22:25:28', '2020-05-26 14:15:30', 'admin,editor'),
(3, 'David Mark', 'admin@gmail.com', '$2y$10$wA38i35o1HYuraBay5aYQOgFYV4XMnAn8YF5KlkzVU/gxs0pbJcF.', '2019-12-12 20:17:33', '2020-04-09 12:29:00', 'editor'),
(4, 'dmu admin', 'dmu@gmail.com', '$2y$10$iIr5YxOZ2o/ztg6CIHCEdu491I/MqLJQe8HncM66gV45b3gsp2Ije', '2019-12-13 15:54:06', '2019-12-13 16:54:16', 'editor'),
(5, 'david Bassey', 'david@hotmail.com', '$2y$10$crRKN7Ckbm39e1YsCpkyneO6HYkI/jUFGpgtf/v5mEJWjDbDN3hB6', '2020-04-30 09:39:53', '0000-00-00 00:00:00', 'admin,editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bills_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diag_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etest`
--
ALTER TABLE `etest`
  ADD PRIMARY KEY (`Etest_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pexam`
--
ALTER TABLE `pexam`
  ADD PRIMARY KEY (`Pexam_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `etest`
--
ALTER TABLE `etest`
  MODIFY `Etest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pexam`
--
ALTER TABLE `pexam`
  MODIFY `Pexam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
