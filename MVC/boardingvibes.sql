-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 05:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boardingvibes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cateringad`
--

CREATE TABLE `cateringad` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `photolink` varchar(255) DEFAULT NULL,
  `confirmCustomerId` mediumtext,
  `CustomerId` varchar(2552) DEFAULT '',
  `chatCus` longtext,
  `chatPro` longtext,
  `rated` int(10) DEFAULT '0',
  `ratedType` varchar(100) DEFAULT '',
  `completed` varchar(1000) DEFAULT '',
  `reported` int(11) DEFAULT NULL,
  `reportedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cateringad`
--

INSERT INTO `cateringad` (`id`, `topic`, `user_id`, `area`, `description`, `capacity`, `delivery`, `rating`, `schedule`, `menu`, `photolink`, `confirmCustomerId`, `CustomerId`, `chatCus`, `chatPro`, `rated`, `ratedType`, `completed`, `reported`, `reportedBy`) VALUES
(2, 'dasdas', 80, 'Moratuwa', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0, '', '', NULL, NULL),
(3, 'Colombo', 80, 'Colombo', 'Colombo', NULL, NULL, NULL, NULL, NULL, NULL, '', '74,75', '', '', 0, '', '', 0, NULL),
(4, 'Colombo ADD', 80, 'Colombo', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '', '74,75', '', '', 0, '', '', 0, NULL),
(5, 'Matale ADD', 80, 'Matale', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0, '', '', 0, NULL),
(7, 'CATERINGADVERTISEMENT', 74, 'Colombo', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 12, '79,79,79', '', 0, NULL),
(8, 'NEWCATECATECATE', 74, 'Colombo', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '75,75', '75', '', '', 0, '', '', 0, NULL),
(9, 'TESTFOoooRTODAYCLEANINGADD', 74, 'Colombo', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, NULL, '79,75', '75,79,83', '', '', 14, 'udarap,customer,75,79', NULL, 2, 0),
(10, 'CateringAdd1Mahim', 106, 'Gampaha', 'CateringAdd1Mahim', NULL, NULL, NULL, NULL, NULL, NULL, '', '105', '', '', 0, '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cleaningad`
--

CREATE TABLE `cleaningad` (
  `topic` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `area` varchar(2555) DEFAULT NULL,
  `description` varchar(25555) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `schedule` varchar(2555) DEFAULT NULL,
  `photolink` varchar(255) DEFAULT NULL,
  `confirmCustomerId` varchar(10000) DEFAULT '',
  `CustomerId` varchar(2552) DEFAULT '',
  `chatCus` longtext,
  `chatPro` longtext,
  `rated` int(10) DEFAULT '0',
  `ratedType` varchar(100) DEFAULT '',
  `completed` varchar(1000) DEFAULT '',
  `reported` int(11) DEFAULT NULL,
  `reportedBy` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaningad`
--

INSERT INTO `cleaningad` (`topic`, `id`, `user_id`, `area`, `description`, `delivery`, `schedule`, `photolink`, `confirmCustomerId`, `CustomerId`, `chatCus`, `chatPro`, `rated`, `ratedType`, `completed`, `reported`, `reportedBy`) VALUES
('Dilshara', 1, 80, 'Moratuwa', 'I am going to ', NULL, NULL, NULL, '', '', '', '', 0, '', '', 0, NULL),
('search', 4, 80, 'Colombo', 'I am going to ..', NULL, NULL, NULL, '74', '74,75', 'from :- provider to :- customer MESSAGE??: xzczx,from :- cHJvdmlkZXI= to :- c2hhbW1p MESSAGE??: c28gd2hhdCBjYW4gaSBkbw==,from :- cHJvdmlkZXI= to :- c2hhbW1p MESSAGE??: c28gd2hhdCBjYW4gaSBkbw==', 'from :- provider to :- customer MESSAGE??: xzczx,from :- cHJvdmlkZXI= to :- c2hhbW1p MESSAGE??: c28gd2hhdCBjYW4gaSBkbw==,from :- cHJvdmlkZXI= to :- c2hhbW1p MESSAGE??: c28gd2hhdCBjYW4gaSBkbw==', 0, '', '', 6, ',75,104,79,80'),
('Matale ADD', 6, 80, 'Matale', 'I am going to ..', NULL, NULL, NULL, '', '', '', '', 0, '', '', 0, NULL),
('CLEANING', 7, 76, 'Colombo', 'BNMNBNN', NULL, NULL, NULL, '', '75', '', '', 0, '', '', 0, NULL),
('Dilshara', 8, 80, 'Matara', 'I am going to ..', NULL, NULL, '5', '', '', '', '', 0, '', '', 0, NULL),
('CLEANINGADVERTISEMENT', 9, 74, 'Colombo', 'I am going to ..', NULL, NULL, NULL, '', '75', '', 'from :- shammi to :- udarap MESSAGE??: hello i am shammi,from :- shammi to :- customer MESSAGE??: I have a problem,from :- customer to :- shammi MESSAGE??: me too,from :- udarap to :- shammi MESSAGE??: yes,from :- shammi to :- udarap MESSAGE??: jyduydfyudyiydf,from :- shammi to :- udarap MESSAGE??: asadsadfafd,from :- shammi to :- udarap MESSAGE??: ask doubt,from :- udarap to :- shammi MESSAGE??: I have a problem,from :- shammi to :- udarap MESSAGE??: I have a problem,from :- shammi to :- udarap MESSAGE??: I have a problem,from :- shammi to :- udarap MESSAGE??: sdasd,from :- customer to :- shammi MESSAGE??: so what can i do', 21, 'udarap,customer,75,79', '', 0, NULL),
('NEWCLEANCLEAN', 10, 74, 'Colombo', 'I am going to ..', NULL, NULL, NULL, '', '', '', '', 0, '', '', 0, NULL),
('CleaningMahim1', 12, 106, 'Gampaha', 'CleaningMahim111', NULL, NULL, NULL, '', '105', '', '', 0, '', NULL, 0, NULL),
('CleaningAddmahim2', 14, 106, 'Gampaha', 'CleaningAddmahim2', NULL, NULL, NULL, '', '105', '', '', 0, '', NULL, 0, NULL),
('CleaningaddDumindu1', 15, 107, 'Badulla', 'CleaningaddDumindu1', NULL, NULL, NULL, '104,105', '104,105', 'from :- dumindu to :- chirath MESSAGE??: Hi I am provider,from :- dumindu to :- chirath MESSAGE??: I have a problem,from :- dumindu to :- chirath MESSAGE??: I want it,from :- dumindu to :- chirath MESSAGE??: hi i,from :- chirath to :- dumindu MESSAGE??: hey I am chirath,from :- dumindu to :- devnith MESSAGE??: dasdasddevnith,from :- dumindu to :- devnith MESSAGE??: 113213', 'from :- dumindu to :- chirath MESSAGE??: Hi I am provider,from :- dumindu to :- chirath MESSAGE??: I have a problem,from :- dumindu to :- chirath MESSAGE??: I want it,from :- dumindu to :- chirath MESSAGE??: hi i,from :- chirath to :- dumindu MESSAGE??: hey I am chirath,from :- dumindu to :- devnith MESSAGE??: dasdasddevnith,from :- dumindu to :- devnith MESSAGE??: 113213', 17, 'chirath,devnith,104,105', NULL, 0, NULL),
('CleaningAddDumindu2', 16, 107, 'Badulla', 'CleaningAddDumindu2', NULL, NULL, NULL, '', '', '', '', 0, '', NULL, 0, NULL),
('After Report', 17, 74, 'Colombo', 'After Report', 'Yes', 'After Report', NULL, '', '', '', '', 0, '', NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(65) DEFAULT NULL,
  `home_phone` varchar(122) NOT NULL,
  `cell_phone` varchar(122) NOT NULL,
  `work_phone` varchar(122) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `address` varchar(1024) NOT NULL,
  `city` varchar(222) NOT NULL,
  `service` varchar(100) NOT NULL,
  `serviceType` varchar(100) NOT NULL,
  `currentRate` int(2) DEFAULT NULL,
  `comments` varchar(1024) DEFAULT NULL,
  `experience` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `fname`, `lname`, `email`, `age`, `state`, `zip`, `home_phone`, `cell_phone`, `work_phone`, `deleted`, `address`, `city`, `service`, `serviceType`, `currentRate`, `comments`, `experience`) VALUES
(37, 74, 'Contact', 'Contact', 'abcd@gmai', NULL, 'no', NULL, '011011011011', '5465464', '556', 0, 'Contact', 'Angoda', 'washdassd', 'shammikolonne', NULL, NULL, NULL),
(38, 74, 'sasindu', 'Alahakoon', 'customer@customer.com', NULL, 'no', NULL, '7074', '5465464', 'fggdfsgdfsgdfsfdg', 0, 'sasinduRequestsRequests', '', 'abcdef', 'no', NULL, NULL, NULL),
(39, 79, 'Udara1', 'Pathum', 'hwupathum@gmail.com', NULL, '', NULL, '711986554', '', '', 0, 'Kamburugamuwa', 'Matara', '', '', NULL, NULL, NULL),
(40, 80, 'Udaraa', 'Pathum', 'hwupathum@gmail.com', NULL, '', NULL, '711986554', '', '', 0, 'Kamburugamuwa', 'Matara', '', '', NULL, NULL, NULL),
(41, 80, 'Udarasadadsadsef', 'Pathum', 'hwupathum@gmail.com', NULL, '', NULL, '711986554', '', '', 0, 'Kamburugamuwa', 'Matara', '', '', NULL, NULL, NULL),
(42, 80, 'Udarazokdsfoskfod', 'Pathum', 'hwupathum@gmail.com', NULL, '', NULL, '711986554', '', '', 0, 'Kamburugamuwa', 'Matara', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `launderingad`
--

CREATE TABLE `launderingad` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `area` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `capacity` int(10) DEFAULT NULL,
  `delivery` varchar(5) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `schedule` mediumtext,
  `photolink` varchar(255) DEFAULT NULL,
  `confirmCustomerId` varchar(10) DEFAULT '',
  `CustomerId` varchar(2552) DEFAULT '',
  `chatCus` longtext,
  `chatPro` longtext,
  `rated` int(10) DEFAULT '0',
  `ratedType` varchar(100) DEFAULT '',
  `completed` varchar(1000) DEFAULT '',
  `reported` int(11) DEFAULT NULL,
  `reportedBy` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `launderingad`
--

INSERT INTO `launderingad` (`id`, `user_id`, `area`, `topic`, `description`, `capacity`, `delivery`, `rating`, `schedule`, `photolink`, `confirmCustomerId`, `CustomerId`, `chatCus`, `chatPro`, `rated`, `ratedType`, `completed`, `reported`, `reportedBy`) VALUES
(3, 80, 'Colombo', 'ColomboColombo', 'ColomboColombo', NULL, NULL, NULL, NULL, NULL, '', '75,79', '', '', 0, '', '', 3, '0,79'),
(4, 74, 'Colombo', 'Colombo ADD', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, '75', '75,79', '', '', 0, '', '', 4, '0,79'),
(5, 74, 'Matale', 'Matale ADD', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0, '', '', 0, NULL),
(6, 74, 'Colombo', 'LAUNDERINGADVERTISEMENT', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, '75,79', '75,79', '', '', 11, 'udarap,79,79', '', 0, NULL),
(7, 74, 'Colombo', 'NEWLAUNLAUNLAUN', 'I am going to ..', NULL, NULL, NULL, NULL, NULL, '75', '75', '', '', 0, '', '', 0, NULL),
(8, 106, 'Gampaha', 'LanderingMahim1', 'LanderingMahim1', NULL, NULL, NULL, NULL, NULL, '', '105', '', '', 0, '', NULL, 0, NULL),
(10, 107, 'Badulla', 'LauendringAddDumindu1', 'LauendringAddDumindu1', NULL, NULL, NULL, NULL, NULL, '', '104,105', '', '', 0, '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `service` varchar(100) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `photolink` varchar(10000) DEFAULT NULL,
  `confirmProviderId` int(255) DEFAULT '0',
  `providerId` varchar(150) DEFAULT NULL,
  `providerName` varchar(255) DEFAULT NULL,
  `chat` longtext,
  `chatCus` longtext,
  `chatPro` longtext,
  `accepted` int(10) DEFAULT '0',
  `completed` int(11) DEFAULT '0',
  `completeId` int(255) DEFAULT NULL,
  `rated` int(2) DEFAULT '0',
  `ratedType` varchar(255) DEFAULT NULL,
  `reported` int(11) DEFAULT NULL,
  `reportedBy` varchar(20000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `customer`, `service`, `area`, `description`, `photolink`, `confirmProviderId`, `providerId`, `providerName`, `chat`, `chatCus`, `chatPro`, `accepted`, `completed`, `completeId`, `rated`, `ratedType`, `reported`, `reportedBy`) VALUES
(6, 79, 'customer', 'washingclothes', 'Moratuwa', 'I am going to wash', NULL, 80, '80,76', 'provider,yasith', '', 'customer : c28gd2hhdCBjYW4gaSBkbw==,customer : bm8=,provider : aGk=,provider : c2Q=', 'customer : c28gd2hhdCBjYW4gaSBkbw==,customer : bm8=,provider : aGk=,provider : c2Q=', 0, 0, 0, 0, '', 0, NULL),
(8, 79, 'customer', 'Matale', 'Matale', 'I am going to ..', NULL, 0, '', '', '', NULL, NULL, 0, 0, NULL, 0, '', 0, NULL),
(10, 79, 'customer', 'shammikolonne', 'Kandy', 'sadasdasd', NULL, 80, '80', 'provider', '', NULL, NULL, 1, 1, 80, 5, 'Provider', 1, ',80'),
(12, 79, 'customer', 'Brandnew', 'Colombo', 'I am going to ..', NULL, 74, '74,80', 'shammi,provider', '', '', '', 1, 0, NULL, 0, '', 0, NULL),
(14, 79, 'customer', 'HiImjaffna', 'Colombo', 'I am going to ..', NULL, 76, '74,76', 'shammi,yasith', '', '', '', 1, 1, 76, 0, '', 0, NULL),
(16, 75, 'udarap', 'HTestOne', 'Jaffna', 'Test', NULL, 74, '74', 'shammi', '', '', '', 1, 1, 74, 4, 'Provider', 0, NULL),
(20, 75, 'udarap', 'AAAAAA', 'Colombo', 'AAAAAA', NULL, 0, '76,74', 'yasith,shammi', '', '', '', 0, 0, 0, 0, '', 0, NULL),
(22, 104, 'chirath', 'chirathReq1', 'Angoda', 'chirathReq1', NULL, 0, '', '', '', '', '', 0, 0, NULL, NULL, '', 5, ',74,76,107,106,80'),
(23, 104, 'chirath', 'chirathReq2', 'Angoda', 'chirathReq2', NULL, 106, '106', 'mahimm ', '', '', '', 1, 1, 106, 6, 'Customer,Provider', 0, NULL),
(26, 105, 'devnith', 'MahimReq2', 'Matara', 'MahimReq2', NULL, 0, '107,106', 'dumindu,mahimm ', '', '', '', 0, 0, NULL, NULL, '', 0, NULL),
(27, 105, 'devnith', 'MahimReq3', 'Matara', 'MahimReq3', NULL, 0, '107,106', 'dumindu,mahimm ', '', '', '', 0, 0, NULL, NULL, '', 0, NULL),
(28, 104, 'chirath', 'chirathRequest4', 'Angoda', 'chirathRequest4', NULL, 0, '', NULL, '', '', '', 0, 0, NULL, NULL, '', 0, ''),
(31, 104, 'chirath', 'Delete123', 'Angoda', 'Delete123', NULL, 0, '', NULL, '', '', '', 0, 0, NULL, NULL, '', 0, ''),
(33, 104, 'chirath', 'Delete12353', 'Angoda', 'Delete12343', NULL, 0, '', NULL, '', '', '', 0, 0, NULL, NULL, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `photolink` varchar(20202) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `userType` varchar(11) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `phoneNumber2` varchar(100) DEFAULT NULL,
  `overallRating` float DEFAULT NULL,
  `ratingtimes` int(10) DEFAULT '0',
  `notifications` mediumtext,
  `deleted` tinyint(1) DEFAULT '0',
  `active` int(3) DEFAULT '0',
  `reported` int(11) DEFAULT NULL,
  `reportedBy` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `photolink`, `address`, `area`, `userType`, `phoneNumber`, `phoneNumber2`, `overallRating`, `ratingtimes`, `notifications`, `deleted`, `active`, `reported`, `reportedBy`) VALUES
(74, 'shammi', 'shammi@shammi.com', 'shammi', 'Shammi', 'Kolonne', 'shammi', 'shammi', 'Colombo', 'Provider', '0112567074', '', 4.07143, 14, 'Your Colombo ADD advertisement has been reported in several times.,customer has been cancelled the acceptance to your CATERINGADVERTISEMENT,customer has been cancelled the acceptance to your CLEANINGADVERTISEMENT,You confirm the Colombo ADD which was accepted by the provider,Your user account has been reported in several times.,You confirm the Brandnew which was accepted by the customer,You confirm the search which was accepted by the provider,Another one 33,Your user account has been reported in several times.,Your user account has been reported in several times.,Another one ,I am the new admin,I am the new admin,Your user account has been banned for several times.,You mark complete as the HTestOne serviced of udarap,You accepted the AAAAAA which was requested by the udarap,You accepted the TestChat which was requested by the customer,You accepted the washdassd which was requested by the customer,You cancelled acceptance of the washdassd which was request by the customer,You accepted the washdassd which was requested by the customer,You cancelled acceptance of the washdassd which was request by the customer,You accepted the Brandnew which was requested by the customer,You accepted the washdassd which was requested by the customer,You accepted the Theadd which was requested by the customer,You cancelled the CLEANINGADVERTISEMENT confirmation of udarap,You mark not completed yet as the HTestOne serviced of udarap,You mark complete as the HTestOne serviced of udarap,You mark not completed yet as the HTestOne serviced of udarap,You mark not completed yet as the  serviced of udarap,You mark not completed yet as the  serviced of udarap,You mark not completed yet as the  serviced of udarap,You mark complete as the HTestOne serviced of udarap,You mark not completed yet as the HTestOne serviced of udarap,You mark complete as the HTestOne serviced of udarap,Your acceptance for the TESTFOoooRTODAYCLEANINGADD request has been confirmed by udarap,You cancelled the TESTFOoooRTODAYCLEANINGADD confirmation of udarap,You cancelled the TESTFOoooRTODAYCLEANINGADD confirmation of customer1,Your acceptance for the TESTFOoooRTODAYCLEANINGADD request has been confirmed by customer,Your acceptance for the TESTFOoooRTODAYCLEANINGADD request has been confirmed by udarap', 0, 1, 6, ',104,105,75,79,83,80'),
(75, 'udarap', 'hwupathum@gmail.com', 'udarap', 'Udara', 'Udara', NULL, 'address', 'Jaffna', 'Customer', '1236547891', '4569871232', 3.61906, 42, 'Confirmation for your search acceptance has been cancelled by provider,You confirm the search which was accepted by the provider,You confirm the Colombo ADD which was accepted by the provider,Confirmation for your Colombo ADD acceptance has been cancelled by provider,You confirm the Colombo ADD which was accepted by the provider,shammi mark complete as the HTestOne serviced of you,You accepted the search which was requested by the provider,You cancelled acceptance of the search which was request by the provider,Your AAAAAA has been aceepted by shammi,You accepted the CLEANING which was requested by the yasith,You accepted the Colombo ADD which was requested by the provider,Confirmation for your CLEANINGADVERTISEMENT acceptance has been cancelled by shammi,shammi mark not completed yet as the HTestOne serviced of you,shammi mark complete as the HTestOne serviced of you,shammi mark not completed yet as the HTestOne serviced of you,shammi mark not completed yet as the  serviced of you,shammi mark not completed yet as the  serviced of you,shammi mark not completed yet as the  serviced of you,shammi mark complete as the HTestOne serviced of you,shammi mark not completed yet as the HTestOne serviced of you,shammi mark complete as the HTestOne serviced of you,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,Confirmation for your TESTFOoooRTODAYCLEANINGADD acceptance has been cancelled by shammi,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,Confirmation for your TESTFOoooRTODAYCLEANINGADD acceptance has been cancelled by shammi,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,Confirmation for your  acceptance has been cancelled by shammi,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,You accepted the TESTFOoooRTODAYCLEANINGADD which was requested by the shammi,You cancelled acceptance of the TESTFOoooRTODAYCLEANINGADD which was request by the shammi', 0, 1, 0, NULL),
(76, 'yasith', 'yasith@yasith.com', 'yasith', 'yasith', 'yasith', NULL, 'yasith', 'Kandy', 'Provider', '1236547896', '', 4.2, 5, 'customer mark complete as the HiImjaffna serviced of you,Your CLEANING has been aceepted by udarap,customer mark not completed yet as the HiImjaffna serviced of you,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap,AAAAAA has been given to another service provider by udarap', 0, 1, 0, NULL),
(79, 'customer', 'customer@customer.com', '91ec1f9324753048c0096d036a694f86', 'customer', 'customer', '5cec4483a232c2.09894241.jpg', 'colombo', 'Colombo', 'Customer', '+94112365478', '', 4, 4, '', 0, 1, 0, ''),
(80, 'provider', 'provider@provider.com', '9e9f3d70bd8c8957627eada96d967706', 'provider', 'provider', '5cee41a8dd8b74.10296796.jpg', 'provider', 'Kandy', 'Provider', '1236547896', '', 2, 1, 'You mark complete as the shammikolonne serviced of customer,You mark not completed yet as the washingclothes serviced of customer,You mark not completed yet as the shammikolonne serviced of customer,You mark complete as the washingclothes serviced of customer,You mark complete as the shammikolonne serviced of customer,You confirm the shammikolonne which was accepted by the customer,You accepted the shammikolonne which was requested by the customer,You accepted the Brandnew which was requested by the customer,You mark not completed yet as the washingclothes serviced of customer,Your ColomboColombo has been aceepted by customer', 0, 1, 0, NULL),
(81, 'abcde@abcde.com', 'abcde@abcde.com', 'abcde@abcde.com', 'abcde@abcde.com', 'abcde@abcde.com', NULL, 'abcde@abcde.com', 'Matara', 'Customer', 'abcde@abcde.com', 'abcde@abcde.com', 0, 0, '', 0, 1, 0, NULL),
(83, 'customer1', 'customer1@customer1.com', 'customer1', 'customer1', 'customer1', NULL, 'customer1', 'customer1', 'Customer', '1231231123', '1231231121', 0, 0, 'Confirmation for your TESTFOoooRTODAYCLEANINGADD acceptance has been cancelled by shammi,You confirm the TESTFOoooRTODAYCLEANINGADD which was accepted by the shammi,You accepted the TESTFOoooRTODAYCLEANINGADD which was request by the shammi', 0, 1, 0, NULL),
(84, 'newPro', 'newPro@newPro.com', 'newPro', 'newPro', 'newPro', NULL, 'newPro', 'newPro', 'Provider', '1231231231', '', 0, 0, '', 0, 1, 0, NULL),
(85, 'abcde@abc.com', 'abcde@abc.com', 'abcde@abc.com', 'abcde@abc.com', 'abcde@abc.com', NULL, 'abcde@abc.com', 'abcde@abc.com', 'Customer', '1231231231', '', 0, 0, '', 0, 1, 0, NULL),
(104, 'chirath', 'mnbv@gmail.com', 'chirath', 'chirath', 'chirath', NULL, 'chirath', 'Angoda', 'Customer', '0112567074', '', 4.5, 2, 'Your chirathReq1 request has been reported in several times.,Your chirathReq1 request has been reported in several times.,I am the new admin,Your  advertisement has been banned for several times.,You cancelled acceptance of the CleaningAddDumindu2 which was request by the dumindu,You confirm the CleaningAddDumindu2 which was accepted by the dumindu,You confirm the CleaningAddDumindu2 which was accepted by the dumindu,Confirmation for your CleaningAddDumindu2 acceptance has been cancelled by dumindu,Confirmation for your CleaningAddDumindu2 acceptance has been cancelled by dumindu,You confirm the CateringAddDumindu1 which was accepted by the dumindu,You confirm the CleaningAddDumindu2 which was accepted by the dumindu,You confirm the CleaningaddDumindu1 which was accepted by the dumindu,You accepted the LauendringAddDumindu2 which was requested by the dumindu,You accepted the LauendringAddDumindu1 which was requested by the dumindu,You accepted the CateringAddDumindu2 which was requested by the dumindu,You accepted the CateringAddDumindu1 which was requested by the dumindu,You accepted the CleaningAddDumindu2 which was requested by the dumindu,You accepted the CleaningAddDumindu1 which was requested by the dumindu,You cancelled acceptance of the CleaningAddDumindu1 which was request by the dumindu,You accepted the CleaningAddDumindu1 which was requested by the dumindu,You cancelled acceptance of the CleaningAddDumindu1 which was request by the dumindu', 0, 1, 0, NULL),
(105, 'devnith', 'dilsharasasindu@gmail.com', 'devnith', 'Devnith', '', NULL, 'devnith', 'Matara', 'Customer', '1236547891123', '', 3, 1, 'You cancelled acceptance of the CleaningAddDumindu2 which was request by the dumindu,You confirm the CateringAddDumindu1 which was accepted by the dumindu,You confirm the CateringAddDumindu1 which was accepted by the dumindu,You confirm the CleaningAddDumindu2 which was accepted by the dumindu,You confirm the CleaningaddDumindu1 which was accepted by the dumindu,You accepted the LaunderingAddMahim2 which was requested by the mahimm ,You accepted the LanderingMahim1 which was requested by the mahimm ,You accepted the cateringaddMahim2 which was requested by the mahimm ,You accepted the CateringAdd1Mahim which was requested by the mahimm ,You accepted the CleaningAddmahim2 which was requested by the mahimm ,You accepted the CleaningMahim1 which was requested by the mahimm ,You accepted the LauendringAddDumindu2 which was requested by the dumindu,You accepted the LauendringAddDumindu1 which was requested by the dumindu,You accepted the CateringAddDumindu2 which was requested by the dumindu,You accepted the CateringAddDumindu1 which was requested by the dumindu,You accepted the CleaningAddDumindu2 which was requested by the dumindu,You accepted the CleaningAddDumindu1 which was requested by the dumindu,Your MahimReq3 has been aceepted by mahimm ,Your MahimReq2 has been aceepted by mahimm ,Your MahimReq1 has been aceepted by mahimm ,Your MahimReq3 has been aceepted by dumindu,Your MahimReq2 has been aceepted by dumindu,Your MahimReq1 has been aceepted by dumindu', 1, 1, 0, NULL),
(106, 'mahimm ', 'abc1d@gmail.com', 'mahimm', 'Mahimm', 'Mahimm', NULL, 'Mahimm', 'Gampaha', 'Provider', '12365478911', '', 4.25, 4, 'Your LaunderingAddMahim2 has been aceepted by devnith,Your LanderingMahim1 has been aceepted by devnith,Your cateringaddMahim2 has been aceepted by devnith,Your CateringAdd1Mahim has been aceepted by devnith,Your CleaningAddmahim2 has been aceepted by devnith,Your CleaningMahim1 has been aceepted by devnith,chirath mark complete as the chirathReq2 serviced of you,chirath mark not completed yet as the chirathReq2 serviced of you,chirath mark complete as the chirathReq2 serviced of you,chirath mark not completed yet as the chirathReq2 serviced of you,chirath mark complete as the chirathReq2 serviced of you,chirath mark not completed yet as the chirathReq2 serviced of you,chirath mark complete as the chirathReq2 serviced of you,You mark not completed yet as the chirathReq2 serviced of chirath,chirath mark complete as the chirathReq2 serviced of you,chirath mark not completed yet as the chirathReq2 serviced of you,chirath mark complete as the chirathReq2 serviced of you,You confirm the chirathReq2 which was accepted by the chirath,Confirmation for your chirathReq2 acceptance has been cancelled by chirath,You confirm the chirathReq2 which was accepted by the chirath,chirathReq2 has been given to another service provider by chirath,You cancelled acceptance of the chirathReq1 which was request by the chirath,You accepted the MahimReq3 which was requested by the devnith,You accepted the MahimReq2 which was requested by the devnith,You accepted the MahimReq1 which was requested by the devnith,You accepted the chirathReq3 which was requested by the chirath,You accepted the chirathReq2 which was requested by the chirath,You accepted the chirathReq1 which was request by the chirath', 0, 1, 0, NULL),
(107, 'dumindu', 'dumindu@dumindu.com', 'dumindu', 'dumindu', 'dumindu', NULL, 'dumindu', 'Badulla', 'Provider', '1236547891123', '1236541236', 4, 4, 'chirath has been cancelled the acceptance to your CleaningAddDumindu2,Your acceptance for the CleaningAddDumindu2 request has been confirmed by chirath,Your acceptance for the CleaningAddDumindu2 request has been confirmed by chirath,devnith has been cancelled the acceptance to your CleaningAddDumindu2,You cancelled the CleaningAddDumindu2 confirmation of chirath,You cancelled the CleaningAddDumindu2 confirmation of chirath,Your acceptance for the CateringAddDumindu1 request has been confirmed by devnith,Your acceptance for the CateringAddDumindu1 request has been confirmed by devnith,Your acceptance for the CateringAddDumindu1 request has been confirmed by chirath,Your acceptance for the CleaningAddDumindu2 request has been confirmed by devnith,Your acceptance for the CleaningAddDumindu2 request has been confirmed by chirath,Your acceptance for the CleaningaddDumindu1 request has been confirmed by devnith,Your acceptance for the CleaningaddDumindu1 request has been confirmed by chirath,Your LauendringAddDumindu2 has been aceepted by devnith,Your LauendringAddDumindu1 has been aceepted by devnith,Your CateringAddDumindu2 has been aceepted by devnith,Your CateringAddDumindu1 has been aceepted by devnith,Your CleaningAddDumindu2 has been aceepted by devnith,Your CleaningAddDumindu1 has been aceepted by devnith,Your LauendringAddDumindu2 has been aceepted by chirath,Your LauendringAddDumindu1 has been aceepted by chirath,Your CateringAddDumindu2 has been aceepted by chirath,Your CateringAddDumindu1 has been aceepted by chirath,Your CleaningAddDumindu2 has been aceepted by chirath,Your CleaningAddDumindu1 has been aceepted by chirath,chirath has been cancelled the acceptance to your CleaningAddDumindu1,Your CleaningAddDumindu1 has been aceepted by chirath,chirath has been cancelled the acceptance to your CleaningAddDumindu1,Your CleaningAddDumindu1 has been aceepted by chirath,chirath has been cancelled the acceptance to your CleaningAddDumindu1,Your  has been aceepted by chirath,You cancelled acceptance of the chirathReq2 which was request by the chirath,You cancelled acceptance of the chirathReq1 which was request by the chirath,You confirm the chirathReq2 which was accepted by the chirath,You accepted the MahimReq3 which was requested by the devnith,You accepted the MahimReq2 which was requested by the devnith,You accepted the MahimReq1 which was requested by the devnith,You accepted the chirathReq3 which was requested by the chirath,You accepted the chirathReq2 which was requested by the chirath,You accepted the chirathReq1 which was request by the chirath', 0, 1, 0, NULL),
(108, 'sasindu', 'sasindu.17@cse.mrt.ac.lk', 'sasindu', 'sasindu', 'sdilshara', NULL, '461/6B , N.T Perera Road, Mulleriyawa.', 'Angoda', 'Admin', '0774442781', '', 0, 0, 'search advertisement of provider has been exceded the maximum reported times..,user account of shammi has been exceded the maximum reported times..,chirathReq1 request of chirath has been exceded the maximum reported times..,search advertisement of provider has been exceded the maximum reported times..,user account of shammi has been exceded the maximum reported times..,user account of sasindu has been exceded the maximum reported times..,chirathReq1 request of sasindu has been exceded the maximum reported times..,search advertisement of sasindu has been exceded the maximum reported times..', 0, 1, 0, NULL),
(111, 'sasindu2', 'aaa.aaa.a@asa.com', 'sasindu2', 'sasindu2', 'sasindu2', NULL, 'sasindu2', 'sasindu2', 'Admin', '1231231231', '', 0, 0, 'search advertisement of provider has been exceded the maximum reported times..,user account of shammi has been exceded the maximum reported times..,chirathReq1 request of chirath has been exceded the maximum reported times..,search advertisement of provider has been exceded the maximum reported times..,user account of shammi has been exceded the maximum reported times..,user account of sasindu2 has been exceded the maximum reported times..,chirathReq1 request of sasindu2 has been exceded the maximum reported times..,search advertisement of sasindu2 has been exceded the maximum reported times..', 0, 1, 0, ''),
(112, 'sasindu3', 'dilsharasasindu@gmail.com', 'sasindu3', 'sasindu3', 'sasindu3', NULL, 'sasindu3', 'Angoda', 'Admin', '1236547891123', '', 0, 0, 'search advertisement of provider has been exceded the maximum reported times..,user account of shammi has been exceded the maximum reported times..', 0, 1, 0, ''),
(114, 'mama', 'abc@def.com', '5e7b5f0ef3cccfac9b9022576cca466d', 'Udara', 'Pathum', NULL, 'Kamburugamuwa', 'Matara', 'Customer', '0711986554', '', 0, 0, '', 0, 1, 0, ''),
(115, 'mamas', 'abcd@def.com', '5e7b5f0ef3cccfac9b9022576cca466d', 'Udara', 'Pathum', NULL, 'Kamburugamuwa', 'Matara', 'Customer', '0711986554', '', 0, 0, '', 0, 1, 0, ''),
(116, 'ammammm', 'abcdsdd@def.com', '30eee67775bb21354da8c0b47c35beda', 'Udara', 'Pathum', NULL, 'Kamburugamuwa', 'Matara', 'Customer', '711986554', '', 0, 0, '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `phone number` int(10) NOT NULL,
  `phone number2` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `housetype` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `state` varchar(255) NOT NULL,
  `rates` decimal(4,0) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fname`, `lname`, `username`, `email`, `phone number`, `phone number2`, `address`, `city`, `housetype`, `service`, `age`, `state`, `rates`, `active`) VALUES
(1, 'sasa', 'assa', 'asa', 'sasas', 332, 2323434, 'dfsf', 'dfsds', 'dfs', 'dssd', 44, 'fdfsf', '3', 0),
(2, 'sasindu', 'dilshara', 'sasiya', 'abcd.com', 1234, 12345, 'abcd', 'abcde', 'abcdef', 'abcdef', 21, 'abcdefg', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `user_id`, `session`, `user_agent`) VALUES
(25, 7, '9a1158154dfa42caddbd0694a4e9bdc8', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(29, 1, '28dd2c7955ce926456240b2ff0100bde', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(30, 11, 'd645920e395fedad7bbbed0eca3fe2e0', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(32, 15, 'd82c8d1619ad8176d665453cfb2e55f0', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(33, 16, '68d30a9594728bc39aa24be94b319d21', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(34, 18, 'ed3d2c21991e3bef5e069713af9fa6ca', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(36, 19, '54229abfcfa5649e7003b83dd4755294', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(45, 22, '28dd2c7955ce926456240b2ff0100bde', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(46, 23, '735b90b4568125ed6c3f678819b6e058', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(47, 26, '9a1158154dfa42caddbd0694a4e9bdc8', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(48, 41, '1ff1de774005f8da13f42943881c655f', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(49, 12, 'c9e1074f5b3f9fc8ea15d152add07294', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cateringad`
--
ALTER TABLE `cateringad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaningad`
--
ALTER TABLE `cleaningad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `launderingad`
--
ALTER TABLE `launderingad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cateringad`
--
ALTER TABLE `cateringad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cleaningad`
--
ALTER TABLE `cleaningad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `launderingad`
--
ALTER TABLE `launderingad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
