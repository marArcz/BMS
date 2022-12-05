-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `baranggay`
--

CREATE TABLE `baranggay` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `baranggayLogo` varchar(255) NOT NULL,
  `cityLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baranggay`
--

INSERT INTO `baranggay` (`id`, `name`, `province`, `city`, `baranggayLogo`, `cityLogo`) VALUES
(1, 'Simpatuyo', 'Cagayan', 'Sta. Teresita', 'uploads/download.png', 'uploads/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `id` int(11) NOT NULL,
  `complainant` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `complainant_age` int(11) NOT NULL,
  `complainant_address` varchar(255) NOT NULL,
  `complainant_phone` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`id`, `complainant`, `reason`, `action`, `date`, `time`, `status`, `complainant_age`, `complainant_address`, `complainant_phone`, `is_deleted`) VALUES
(25, 'Ng Technician', 'njnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnjkbnjkhnasji bfjiasjfisduii iosjfusdfu sdfua h7tuh  uygqya gyuasg a8 agauydhuaigdadajjpo ajpojisadjsdasjdijffjaojfjasfjasgjsfjij jzjs09s asfakfojsjfoisjfoisvkvlvpukzjfj q alapa d=as cadaipas a -asif a\r\na fasi fasf', 'None', '2022-12-05', '19:49', 1, 14, 'Philippines', '09691624065', 0),
(26, 'Ranie Martinez', 'Pinatay', 'None', '2022-12-14', '20:18', 1, 23, 'Philippines', '09691624065', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blotter_history`
--

CREATE TABLE `blotter_history` (
  `id` int(11) NOT NULL,
  `complainant` varchar(255) NOT NULL,
  `suspect` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `complainant_age` varchar(255) NOT NULL,
  `complainant_address` varchar(255) NOT NULL,
  `complainant_phone` varchar(255) NOT NULL,
  `suspect_phone` varchar(255) NOT NULL,
  `suspect_age` varchar(255) NOT NULL,
  `suspect_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`id`, `number`, `zone`, `family`, `head`) VALUES
(2, '333', '4', '2', 'Mother'),
(3, '3334', '4', '7', 'Father'),
(4, '123', '1', '1', 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user`, `activity`, `date`) VALUES
(13, 5, 'Changed baranggay logo', 'January 31, 2022 10:41:pm'),
(14, 5, 'Changed city logo', 'January 31, 2022 10:41:pm'),
(15, 5, 'Added a new baranggay official', 'January 31, 2022 10:45:pm'),
(16, 5, 'Added a new household', 'January 31, 2022 10:46:pm'),
(17, 5, 'Added a new Resident', 'January 31, 2022 10:47:pm'),
(18, 5, 'Added a payment', 'January 31, 2022 10:50:pm'),
(19, 5, 'Updated account information', 'January 31, 2022 10:52:pm'),
(20, 5, 'Updated a household', 'February 14, 2022 08:28:pm'),
(21, 5, 'Added a system user', 'February 14, 2022 08:28:pm'),
(22, 5, 'Added a payment', 'February 14, 2022 08:30:pm'),
(23, 5, 'Added a payment', 'February 14, 2022 08:32:pm'),
(24, 5, 'Added a new Resident', 'February 14, 2022 08:35:pm'),
(25, 5, 'Added a new blotter record', 'March 02, 2022 03:46:pm'),
(26, 5, 'Updated a blotter status', 'March 02, 2022 03:47:pm'),
(27, 5, 'Updated a blotter status', 'March 02, 2022 03:47:pm'),
(28, 5, 'Updated a baranggay official\'s record', 'March 03, 2022 11:05:pm'),
(29, 5, 'Updated account information', 'March 03, 2022 11:06:pm'),
(31, 5, 'Added a system user', 'March 05, 2022 10:00:pm'),
(32, 5, 'Added a new Resident', 'March 10, 2022 02:40:pm'),
(34, 5, 'Changed a baranggay official photo', 'March 15, 2022 06:47:pm'),
(35, 5, 'Added a new household', 'March 16, 2022 08:31:pm'),
(36, 5, 'Updated account information', 'March 18, 2022 12:18:am'),
(37, 5, 'Added a new Resident', 'March 18, 2022 12:26:am'),
(38, 5, 'Updated a baranggay official\'s record', 'March 18, 2022 04:02:pm'),
(39, 5, 'Changed a baranggay official photo', 'March 18, 2022 04:03:pm'),
(40, 5, 'Changed city logo', 'March 18, 2022 04:06:pm'),
(41, 5, 'Changed baranggay logo', 'March 18, 2022 04:06:pm'),
(42, 5, 'Changed a baranggay official photo', 'March 18, 2022 04:08:pm'),
(43, 5, 'Changed a resident\'s photo', 'March 18, 2022 04:08:pm'),
(44, 5, 'Updated baranggay information', 'March 18, 2022 04:10:pm'),
(45, 5, 'Added a system user', 'March 18, 2022 04:15:pm'),
(46, 5, 'Added a system user', 'March 18, 2022 04:15:pm'),
(47, 5, 'Added a new blotter record', 'March 25, 2022 12:24:am'),
(48, 5, 'Added a Permit', 'March 25, 2022 12:30:am'),
(49, 5, 'Added a payment', 'March 25, 2022 12:30:am'),
(50, 5, 'Added a new blotter record', 'March 25, 2022 12:31:am'),
(51, 5, 'Added a new baranggay official', 'March 25, 2022 12:32:am'),
(54, 5, 'Added a new Resident', 'March 25, 2022 12:44:am'),
(55, 5, 'Added a new blotter record', 'March 25, 2022 12:45:am'),
(56, 5, 'Added a new Resident', 'March 28, 2022 09:29:am'),
(57, 5, 'Changed a resident\'s photo', 'March 28, 2022 09:31:am'),
(58, 5, 'Updated a resident record', 'March 28, 2022 09:33:am'),
(59, 5, 'Updated a resident record', 'March 28, 2022 09:33:am'),
(60, 5, 'Updated baranggay information', 'March 30, 2022 10:15:am'),
(61, 5, 'Added a system user', 'April 28, 2022 09:35:am'),
(62, 5, 'Added a new Resident', 'April 28, 2022 09:36:am'),
(63, 5, 'Updated account information', 'May 12, 2022 10:49:pm'),
(64, 5, 'Added a system user', 'May 19, 2022 02:54:pm'),
(65, 5, 'Added a system user', 'June 14, 2022 09:26:am'),
(66, 5, 'Added a new blotter record', 'July 15, 2022 09:55:pm'),
(67, 5, 'Updated a blotter status', 'July 15, 2022 09:57:pm'),
(68, 5, 'Added a system user', 'July 15, 2022 09:58:pm'),
(69, 5, 'Added a payment', 'July 15, 2022 10:24:pm'),
(70, 5, 'Added a payment', 'July 15, 2022 10:26:pm'),
(71, 5, 'Added a payment', 'July 15, 2022 10:26:pm'),
(72, 5, 'Added a new Resident', 'July 15, 2022 11:06:pm'),
(73, 5, 'Updated baranggay information', 'July 16, 2022 01:58:pm'),
(74, 5, 'Updated a resident record', 'July 17, 2022 10:44:pm'),
(75, 5, 'Added a new blotter record', 'July 17, 2022 10:44:pm'),
(76, 5, 'Added a payment', 'July 17, 2022 10:47:pm'),
(77, 5, 'Changed baranggay logo', 'July 17, 2022 10:48:pm'),
(78, 5, 'Changed city logo', 'July 17, 2022 10:48:pm'),
(79, 5, 'Changed baranggay logo', 'July 17, 2022 10:51:pm'),
(80, 5, 'Changed city logo', 'July 17, 2022 10:51:pm'),
(81, 5, 'Updated a resident record', 'November 02, 2022 02:05:pm'),
(82, 5, 'Added a new Resident', 'November 02, 2022 02:08:pm'),
(83, 5, 'Updated a blotter status', 'November 06, 2022 08:18:am'),
(84, 5, 'Updated a blotter status', 'November 06, 2022 08:18:am'),
(85, 5, 'Updated a blotter status', 'November 06, 2022 08:31:am'),
(86, 5, 'Added a new blotter record', 'November 06, 2022 09:19:am'),
(87, 5, 'Added a new blotter record', 'November 06, 2022 09:53:am'),
(88, 5, 'Updated a blotter status', 'November 06, 2022 01:30:pm'),
(89, 5, 'Updated a blotter status', 'November 06, 2022 01:30:pm'),
(90, 5, 'Added a new household', 'November 06, 2022 04:02:pm'),
(91, 5, 'Updated a household', 'November 06, 2022 04:02:pm'),
(92, 5, 'Updated account information', 'November 06, 2022 04:06:pm'),
(93, 5, 'Added a new Resident', 'November 06, 2022 07:54:pm'),
(94, 5, 'Added a new Resident', 'November 06, 2022 09:52:pm'),
(95, 5, 'Added a new blotter record', 'November 06, 2022 09:55:pm'),
(96, 5, 'Updated a blotter record', 'November 06, 2022 09:55:pm'),
(97, 5, 'Updated a resident record', 'November 09, 2022 08:03:pm'),
(98, 5, 'Updated a resident record', 'November 09, 2022 08:03:pm'),
(99, 5, 'Updated a resident record', 'November 09, 2022 08:03:pm'),
(100, 5, 'Added a payment', 'November 12, 2022 08:35:pm'),
(101, 5, 'Updated a blotter status', 'November 12, 2022 08:48:pm'),
(102, 5, 'Updated a blotter status', 'November 12, 2022 08:48:pm'),
(103, 5, 'Updated a blotter status', 'November 12, 2022 08:48:pm'),
(104, 5, 'Added a new blotter record', 'November 12, 2022 09:56:pm'),
(105, 5, 'Updated a blotter status', 'November 12, 2022 09:58:pm'),
(106, 5, 'Updated a blotter status', 'November 12, 2022 09:58:pm'),
(107, 5, 'Updated a blotter status', 'November 12, 2022 09:58:pm'),
(108, 5, 'Updated a blotter record', 'November 12, 2022 10:29:pm'),
(109, 5, 'Updated a blotter record', 'November 12, 2022 10:36:pm'),
(110, 5, 'Added a new blotter record', 'November 12, 2022 10:37:pm'),
(111, 5, 'Updated a blotter record', 'November 12, 2022 10:39:pm'),
(112, 5, 'Updated a blotter record', 'November 12, 2022 10:39:pm'),
(113, 5, 'Updated a blotter status', 'November 12, 2022 10:41:pm'),
(114, 5, 'Updated a blotter record', 'November 12, 2022 10:53:pm'),
(115, 5, 'Updated a blotter status', 'November 13, 2022 12:35:am'),
(116, 5, 'Added a new Resident', 'November 13, 2022 12:45:am'),
(117, 5, 'Updated a resident record', 'November 13, 2022 10:32:am'),
(118, 5, 'Updated a resident record', 'November 13, 2022 10:32:am'),
(119, 5, 'Updated a household', 'November 13, 2022 10:38:am'),
(120, 5, 'Updated a household', 'November 13, 2022 10:38:am'),
(121, 5, 'Updated a blotter status', 'November 13, 2022 10:44:pm'),
(122, 5, 'Updated a blotter record', 'November 13, 2022 10:44:pm'),
(123, 5, 'Added a new blotter record', 'December 05, 2022 07:41:pm'),
(124, 5, 'Added a new blotter record', 'December 05, 2022 07:50:pm'),
(125, 5, 'Updated a blotter status', 'December 05, 2022 08:14:pm'),
(126, 5, 'Updated a blotter status', 'December 05, 2022 08:14:pm'),
(127, 5, 'Updated a blotter status', 'December 05, 2022 08:14:pm'),
(128, 5, 'Added a new blotter record', 'December 05, 2022 08:16:pm'),
(129, 5, 'Updated a blotter status', 'December 05, 2022 08:38:pm'),
(130, 5, 'Updated a blotter status', 'December 05, 2022 08:38:pm'),
(131, 5, 'Updated a blotter status', 'December 05, 2022 08:38:pm'),
(132, 5, 'Updated a blotter status', 'December 05, 2022 08:38:pm'),
(133, 5, 'Updated a blotter status', 'December 05, 2022 10:10:pm'),
(134, 5, 'Updated a blotter status', 'December 05, 2022 10:10:pm'),
(135, 5, 'Updated a blotter status', 'December 05, 2022 10:10:pm'),
(136, 5, 'Updated a blotter status', 'December 05, 2022 10:10:pm'),
(137, 5, 'Updated a blotter record', 'December 05, 2022 11:47:pm'),
(138, 5, 'Updated a blotter record', 'December 05, 2022 11:47:pm');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `residentName` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `photo`, `residentName`, `dateTime`) VALUES
(1, 'uploads/id ni lolo.jpg', 'Arcilla, Efren Panti', '2022-03-06 21:30:05'),
(2, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:38:16'),
(3, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:43:31'),
(4, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:44:15'),
(5, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:44:15'),
(6, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:50:19'),
(7, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:55:35'),
(8, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:55:49'),
(9, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:56:42'),
(10, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-06 21:57:20'),
(11, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-09 14:58:29'),
(12, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-09 14:59:14'),
(13, 'uploads/Untitled-2.png', 'Zafe, Eunice Chesca Arcilla', '2022-03-09 15:07:16'),
(14, 'uploads/profile.jpg', 'Doe, John Dee', '2022-03-10 15:05:03'),
(15, 'uploads/276023909_1598777367145732_6577766713375944241_n.jpg', 'Cabanglan, Jaylord Perlas', '2022-03-19 21:19:40'),
(16, 'uploads/profile.jpg', 'De Guzman, jerick l', '2022-03-24 23:21:57'),
(17, 'uploads/profile.jpg', 'Martinez, Ranie Cutad', '2022-04-27 21:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `memos`
--

CREATE TABLE `memos` (
  `id` int(11) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memos`
--

INSERT INTO `memos` (`id`, `content`, `createdAt`) VALUES
(1, '                                                <div class=\"container-fluid py-5\">\r\n                            <div class=\"row justify-content-center form-header\">\r\n                                <div class=\"col\">\r\n                                    <div class=\"row justify-content-center\">\r\n                                        <div class=\"col-8\">\r\n                                            <img src=\"uploads/gogon seal.jpg\" alt=\"\" id=\"baranggayLogo\" class=\"img-fluid logo\">\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                                <div class=\"col-6\">\r\n                                    <div class=\"text-center\">\r\n                                        <p class=\"text-capitalize\">Republic of the Philippines</p>\r\n                                        <!-- <p class=\"text-capitalize\">Province of <span id=\"province-txt\">Catanduanes</span></p> -->\r\n                                        <p class=\"text-capitalize\">City of <span id=\"city-txt\">Virac</span></p>\r\n                                        <p class=\"text-uppercase\">\r\n                                            <strong>Baranggay <span id=\"baranggay-name\">Gogon Centro</span></strong>\r\n                                        </p>\r\n                                    </div>\r\n                                </div>\r\n                                <div class=\"col\">\r\n                                    <div class=\"row justify-content-center\">\r\n                                        <div class=\"col-8\">\r\n                                            <img id=\"cityLogo\" src=\"uploads/10295673_665387956832134_5976150555657543474_n.png\" alt=\"\" class=\"img-fluid logo\">\r\n                                        </div>\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                            <hr>\r\n                            <div class=\"container px-5 mt-5\">\r\n                                <div class=\"header\">\r\n                                <p><b>17 March 2022</b></p>\r\n\r\n                                <p><b>MEMORANDUM FOR: <span id=\"purpose-txt\">Concerned Residents</span></b></p>\r\n                                </div>\r\n                                <div class=\"mt-2\">\r\n                                    Write the content here...\r\n                                </div>\r\n\r\n                                <div class=\"position-absolute\" style=\"bottom:30px\">\r\n                                    <p><b>JOHN D. DOE</b></p>\r\n                                    <p>Punong Baranggay</p>\r\n                                </div>\r\n                            </div>\r\n\r\n                        </div>\r\n                        ', '2022-03-17 14:12:57'),
(2, '                                                <div class=\"container-fluid py-5\">\n                            <div class=\"row justify-content-center form-header\">\n                                <div class=\"col\">\n                                    <div class=\"row justify-content-center\">\n                                        <div class=\"col-8\">\n                                            <img src=\"uploads/download.png\" alt=\"\" id=\"baranggayLogo\" class=\"img-fluid logo\">\n                                        </div>\n                                    </div>\n                                </div>\n                                <div class=\"col-6\">\n                                    <div class=\"text-center\">\n                                        <p class=\"text-capitalize\">Republic of the Philippines</p>\n                                        <!-- <p class=\"text-capitalize\">Province of <span id=\"province-txt\">Catanduanes</span></p> -->\n                                        <p class=\"text-capitalize\">City of <span id=\"city-txt\">Sta. Teresita</span></p>\n                                        <p class=\"text-uppercase\">\n                                            <strong>Baranggay <span id=\"baranggay-name\">Simpatuyo</span></strong>\n                                        </p>\n                                    </div>\n                                </div>\n                                <div class=\"col\">\n                                    <div class=\"row justify-content-center\">\n                                        <div class=\"col-8\">\n                                            <img id=\"cityLogo\" src=\"uploads/download.jpg\" alt=\"\" class=\"img-fluid logo\">\n                                        </div>\n                                    </div>\n                                </div>\n                            </div>\n                            <hr>\n                            <div class=\"container px-5 mt-5\">\n                                <div class=\"header\">\n                                <p><b>17 March 2022</b></p>\n\n                                <p><b>MEMORANDUM FOR: <span id=\"purpose-txt\">Job application</span></b></p>\n                                </div>\n                                <div class=\"mt-2\"><br></div><div class=\"mt-2\"><br></div>\n\n                                <div class=\"position-absolute\" style=\"bottom:30px\">\n                                    <p><b>JOHN D. DOE</b></p>\n                                    <p>Punong Baranggay</p>\n                                </div>\n                            </div>\n\n                        </div>\n                        ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `position`, `photo`) VALUES
(2, 'Jaylord', 'Perlas', 'Cabanglan', 23, 'Male', 1, 'uploads/276023909_1598777367145732_6577766713375944241_n.jpg'),
(3, 'Jewil ', 'P', 'Cabanglan', 31, 'Female', 3, 'uploads/profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `residentID` int(11) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `residentID`, `amount`, `purpose`, `date`, `time`) VALUES
(4, NULL, '20', 'Baranggay Indigency', '2022-01-31', '10:50 pm'),
(5, NULL, '10', 'Baranggay Indigency', '2022-02-14', '08:30 pm'),
(6, NULL, '10', 'Baranggay Indigency', '2022-03-04', '12:12 am'),
(7, NULL, '15', 'Baranggay Clearance', '2022-03-11', '09:41 pm'),
(8, 7, '10000', 'Business Permit', '2022-03-25', '12:30 am'),
(9, 7, '2', 'Baranggay Clearance', '2022-03-25', '12:40 am'),
(10, 7, '2', 'Baranggay Indigency', '2022-03-25', '12:41 am'),
(11, 10, '12', 'Baranggay Indigency', '2022-07-15', '10:24 pm'),
(12, 7, '50', 'Baranggay Clearance', '2022-07-15', '10:26 pm'),
(13, 7, '50', 'Baranggay Clearance', '2022-07-15', '10:26 pm'),
(14, 9, '5', 'Baranggay Indigency', '2022-07-17', '10:47 pm');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `id` int(11) NOT NULL,
  `residentID` int(255) DEFAULT NULL,
  `businessName` varchar(255) NOT NULL,
  `businessAddress` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `orNumber` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`id`, `residentID`, `businessName`, `businessAddress`, `type`, `orNumber`, `amount`) VALUES
(1, 7, 'jewil', 'centro sta ana cagayan', 'store', '01', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`) VALUES
(1, 'Captain'),
(2, 'Kagawad'),
(3, 'Secretary'),
(4, 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `birthPlace` varchar(255) NOT NULL,
  `healthCondition` varchar(255) NOT NULL,
  `relationshipToHead` varchar(255) NOT NULL,
  `bloodType` varchar(255) NOT NULL,
  `civilStatus` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `household` int(11) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `voter` int(11) NOT NULL DEFAULT 1 COMMENT '1-true\r\n2-false',
  `phone` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `birthDate`, `birthPlace`, `healthCondition`, `relationshipToHead`, `bloodType`, `civilStatus`, `occupation`, `income`, `household`, `religion`, `nationality`, `education`, `photo`, `voter`, `phone`, `mother`, `father`) VALUES
(7, 'Jaylord', 'Perlas', 'Cabanglan', 60, 'Male', '2021-08-25', 'Centro, Sta Ana, Cagayan', 'PWD', 'Mother', 'AB', 'Single', 'Aircon Tech.', '10000', 2, 'INC', 'Filipino', 'College Graduate', 'uploads/276023909_1598777367145732_6577766713375944241_n.jpg', 1, '', '', ''),
(8, 'jerick', 'l', 'De Guzman', 24, 'Male', '1996-03-25', 'Sta ana cagayan', 'Normal', 'Mother', 'AB', 'Married', 'carpenter', '50000', 2, 'INC', 'pilipino', 'Highschool Graduate', 'uploads/profile.jpg', 1, '', '', ''),
(9, 'Ng', 'Bayan', 'Technician', 23, 'Male', '1999-08-25', 'Centro, Sta Ana, Cagayan', 'Normal', 'Mother', 'AB', 'Single', 'All around', '30000', 2, 'INC', 'Filipino', 'College Graduate', 'uploads/inbound8323485347457219292.jpg', 1, '', '', ''),
(10, 'Ranie', 'Cutad', 'Martinez', 20, 'Female', '2018-12-20', 'Sta teresita ', 'Normal', 'Spouse', 'AB', 'Single', 'Na', '1000', 2, 'Roman Catholic', 'Filipino', 'College Graduate', 'uploads/profile.jpg', 1, '', '', ''),
(14, 'John', 'Dee', 'Doe', 20, 'Male', '2002-12-03', 'Centro, Sta Ana, Cagayan', 'Normal', 'None', 'B', 'Married', 'dfhdfhdfhdf', '546', 2, 'dfhdfh', 'dfhdfhdfh', 'College Under Graduate', 'uploads/profile.jpg', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resident_files`
--

CREATE TABLE `resident_files` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident_files`
--

INSERT INTO `resident_files` (`id`, `resident_id`, `file`, `label`) VALUES
(4, 7, 'assets/documents/library-bg.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summon`
--

CREATE TABLE `summon` (
  `id` int(11) NOT NULL,
  `page1` varchar(1555) NOT NULL,
  `page2` varchar(1555) NOT NULL,
  `page3` varchar(1555) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summon`
--

INSERT INTO `summon` (`id`, `page1`, `page2`, `page3`, `createdAt`) VALUES
(1, '', '', '', '2022-07-17 14:46:56'),
(2, '\n                            <div class=\"container my-3 f-roman text-primary\">\n                                <div class=\"row my-0\">\n                                    <div class=\"col\">\n                                        <div class=\"row justify-content-end\">\n                                            <div class=\"col-6 \">\n                                                <img src=\"uploads/download.jpg\" class=\"img-fluid\" alt=\"\">\n                                            </div>\n                                        </div>\n                                    </div>\n                                    <div class=\"col-auto text-center\">\n                                        <p class=\"my-0\"><small>Republic of the Philippines</small></p>\n                                        <p class=\"my-0\"><small>Province of Cagayan</small></p>\n                                        <p class=\"text-uppercase my-0\"><small>Municipality of Sta. Teresita</small></p>\n                                        <p class=\"text-uppercase my-0\">\n                                            <small><strong>Barangay Simpatuyo</strong></small>\n                                        </p>\n                                        <p class=\"mt-3\">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>\n                                    </div>\n                                    <div class=\"col text-right\">\n                                        <div class=\"row justify-content-start\">\n                                            <div class=\"col-6 text-right\">\n                   ', '&nbsp; &nbsp; &nbsp; &nbsp;\n                            \n                        ', '<br>', '2022-07-17 14:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `suspect_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`id`, `name`, `phone`, `address`, `age`, `suspect_group`) VALUES
(1, 'Ranie Martinez', '09691624065', 'Philippines', '23', '2'),
(2, 'Ranie Martinez', '09691624065', 'Philippines', '23', '3'),
(3, 'Ranie Martinez', '09691624065', 'Philippines', '23', '4'),
(4, 'jerick De Guzman', '09691624065', 'Philippines', '22', '5'),
(5, 'jerick De Guzman', '09691624065', 'Philippines', '22', '6'),
(6, 'jerick De Guzman', '09691624065', 'Philippines', '22', '7'),
(11, 'John Doe', '09691624065', 'Philippines', '25', '8'),
(12, 'Jaylord Cabanglan', '09691624065', 'Philippines', '12', '8');

-- --------------------------------------------------------

--
-- Table structure for table `suspect_group`
--

CREATE TABLE `suspect_group` (
  `id` int(11) NOT NULL,
  `blotter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect_group`
--

INSERT INTO `suspect_group` (`id`, `blotter_id`) VALUES
(7, 25),
(8, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `gender`, `address`, `username`, `password`, `photo`, `type`) VALUES
(5, 'BMS', 'Male', 'Philippines', 'admin', 'admin', 'uploads/avatar-380-456332-512.webp', 3),
(8, 'John Doe', 'Male', 'Philippines', 'johndoe', '12345', 'uploads/profile.jpg', 3),
(11, 'paul', 'Male', 'gonzaga', 'paul', 'paul', 'uploads/profile.jpg', 1),
(12, 'Angel Palma', 'Female', 'Simpatuyo Sta. Teresita Cagayan', 'anghel', 'Palma', 'uploads/inbound3373105797101345184.jpg', 1),
(13, 'kkkk', 'Male', 'admin', 'admin', 'admin', 'uploads/profile.jpg', 1),
(14, 'John Doe', 'Male', 'United states', 'johndoe', '123456', 'uploads/profile.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `description`) VALUES
(1, 'Staff'),
(2, 'Zone Leader'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baranggay`
--
ALTER TABLE `baranggay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complainant` (`complainant`);

--
-- Indexes for table `blotter_history`
--
ALTER TABLE `blotter_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memos`
--
ALTER TABLE `memos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residentID` (`residentID`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residentID` (`residentID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `household` (`household`);

--
-- Indexes for table `resident_files`
--
ALTER TABLE `resident_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summon`
--
ALTER TABLE `summon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspect_group`
--
ALTER TABLE `suspect_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blotter_id` (`blotter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`type`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baranggay`
--
ALTER TABLE `baranggay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blotter_history`
--
ALTER TABLE `blotter_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `memos`
--
ALTER TABLE `memos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resident_files`
--
ALTER TABLE `resident_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summon`
--
ALTER TABLE `summon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suspect`
--
ALTER TABLE `suspect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suspect_group`
--
ALTER TABLE `suspect_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `officials`
--
ALTER TABLE `officials`
  ADD CONSTRAINT `officials_ibfk_1` FOREIGN KEY (`position`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`residentID`) REFERENCES `residents` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `permit`
--
ALTER TABLE `permit`
  ADD CONSTRAINT `permit_ibfk_1` FOREIGN KEY (`residentID`) REFERENCES `residents` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_ibfk_1` FOREIGN KEY (`household`) REFERENCES `household` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suspect_group`
--
ALTER TABLE `suspect_group`
  ADD CONSTRAINT `suspect_group_ibfk_1` FOREIGN KEY (`blotter_id`) REFERENCES `blotter` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `usertypes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
