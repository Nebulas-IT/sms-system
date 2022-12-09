-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 06:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'ashraful@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ccode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birth_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`first_name`, `last_name`, `ccode`, `mobile`, `birth_day`) VALUES
('Ashraful', 'Islam', '+880', '1924198048', '1995-10-02'),
('mafijul', 'falak', '+880', '195685458', '0000-00-00'),
('shahrin', 'jahan', '+880', '155612212', '0000-00-00'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('shahrin', 'jahan', '+880', '155612212', '1195-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('shahrin', 'jahan', '+880', '155612212', '1195-10-02'),
('Shohel', 'Rana', '+88', '1684845904', '1992-12-08'),
('Ashraful', 'Islam', '+880', '1XXXXXXXXX', '1995-10-02'),
('Ashraful', 'Islam', '+880', '1XXXXXXXXX', '1995-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('Shaila', 'jahan', '+880', '155612212', '1195-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('Shaila', 'jahan', '+880', '155612212', '1195-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('Shaila', 'jahan', '+880', '155612212', '1195-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('Shaila', 'jahan', '+880', '155612212', '1195-10-02'),
('mafijul', 'falak', '+880', '195685458', '1996-02-10'),
('Shaila', 'jahan', '+880', '155612212', '1195-10-02'),
('Ashraful', 'Rana', '+880', '1924198048', '2018-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `subject`, `from`, `date`, `message`) VALUES
(1, 'Great Job', 'Coacher', '2018-05-17 00:00:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim'),
(2, 'Great Job', 'Araf', '2018-05-30 00:00:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim'),
(3, 'Nice Work', 'Anam', '2018-05-22 00:00:00', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim'),
(4, 'Good Job', 'Shamim', '2018-05-25 06:13:19', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `short_code` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `short_code`, `mobile`, `date_time`) VALUES
(4, '                  hdfhfk      ', '9653131', '1924198048', '2018-05-29 04:06:42'),
(5, '                  hdfhfk      ', '9653131', '1924198048', '2018-05-29 04:18:51'),
(6, 'Your dental appointment with Dr P. Delvour is scheduled for October 29, 4:00pm. ABC Dentist', '5315656', '1684845904', '2018-05-29 04:31:52'),
(7, '               Hello Asraful         ', '2565', '+8801924198048', '2018-07-06 11:11:06'),
(8, '           hi,,how are ashraf ?????            ', '2565', '+8801924198048', '2018-07-06 11:22:46'),
(9, '                   This Is Schedule Message     ', '25564', '+8801924198048', '0000-00-00 00:00:00'),
(10, '                        This is next Schedule Message', '2565', '+8801924198048', '0000-00-00 00:00:00'),
(11, '                        This is next Schedule Message', '2565', '+8801924198048', '0000-00-00 00:00:00'),
(12, '                        This is next Schedule Message', '2565', '+8801924198048', '0000-00-00 00:00:00'),
(13, '                    Thsis one of the next Schedule Messsage    ', '2565', '+8801924198048', '0000-00-00 00:00:00'),
(14, '                   iojom     ', '894', '+8801924198048', '2018-07-16 06:36:32'),
(15, '                   iojom     ', '894', '+8801924198048', '2018-07-16 06:36:37'),
(16, '                hello, twilio', '2565', '+8801924198048', '2018-07-16 07:04:23'),
(17, '                 hello twilio', '25564', '+8801924198048', '2018-07-19 02:58:21'),
(18, '                   hello 1     ', '25564', '+8801924198048', '2018-07-19 04:24:51'),
(19, '                   hello 1     ', '25564', '+8801738238012', '2018-07-19 04:24:53'),
(20, '                   hello 1     ', '25564', '+8801521105913', '2018-07-19 04:24:54'),
(21, '                   hello 1     ', '25564', '+8801850069465', '2018-07-19 04:24:56'),
(22, '                        HelloDDD', '2565', '+8801924198048', '2018-07-19 04:41:15'),
(23, '                        HelloDDD', '2565', '+8801738238012', '2018-07-19 04:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `recieve_sms`
--

CREATE TABLE `recieve_sms` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sent_message`
--

CREATE TABLE `sent_message` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_message`
--

INSERT INTO `sent_message` (`id`, `recipient`, `date`, `message`) VALUES
(1, 'Coacher', '2018-05-24 07:06:43', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim'),
(2, 'Shamim', '2018-05-21 05:38:30', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim');

-- --------------------------------------------------------

--
-- Table structure for table `template_message`
--

CREATE TABLE `template_message` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_message`
--

INSERT INTO `template_message` (`id`, `topic_name`, `message`) VALUES
(1, 'afgajhsfbjhabs', 'message'),
(4, 'dentists', 'jksndjknckc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD KEY `first_name` (`first_name`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`),
  ADD KEY `from` (`from`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recieve_sms`
--
ALTER TABLE `recieve_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_message`
--
ALTER TABLE `sent_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_message`
--
ALTER TABLE `template_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `recieve_sms`
--
ALTER TABLE `recieve_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sent_message`
--
ALTER TABLE `sent_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `template_message`
--
ALTER TABLE `template_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
