-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 11:32 AM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alert_cloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(110) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `password`, `created_at`, `modified_at`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-04-14 00:00:00', '2014-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_sid` varchar(50) NOT NULL,
  `auth_token` varchar(50) NOT NULL,
  `version` date NOT NULL,
  `phone_no` varchar(20) NOT NULL COMMENT 'From Phone no',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `account_sid`, `auth_token`, `version`, `phone_no`, `created_at`, `modified_at`) VALUES
(1, 'AC10c4e4d0a6a6904758da0c43410fecf4', '91b37fb27b9ebdbf01eeb33b776d3155', '2010-04-01', '(316) 854-1368', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `conversion_history`
--

DROP TABLE IF EXISTS `conversion_history`;
CREATE TABLE IF NOT EXISTS `conversion_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `conversion_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `scheduled_call`
--

DROP TABLE IF EXISTS `scheduled_call`;
CREATE TABLE IF NOT EXISTS `scheduled_call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phno` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `call_content` varchar(100) NOT NULL,
  `isCall` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `scheduled_call`
--

INSERT INTO `scheduled_call` (`id`, `phno`, `date`, `name`, `call_content`, `isCall`, `created_at`, `modified_at`) VALUES
(1, '9978919971', '2014-04-30 00:00:00', '', 'Call to remind the Blood Test', '0', '2014-04-22 09:01:48', '2014-04-22 09:01:48'),
(2, '3234733078', '2014-04-30 00:00:00', '', 'Please ken, Come at 4 PM to collect your report', '0', '2014-04-22 10:04:23', '2014-04-22 10:04:23'),
(3, '1234567890', '2014-04-30 00:00:00', '', 'Hey, your report is ready. please pickup', '0', '2014-04-23 13:14:59', '2014-04-23 13:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_message`
--

DROP TABLE IF EXISTS `scheduled_message`;
CREATE TABLE IF NOT EXISTS `scheduled_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phno` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `message_body` varchar(100) NOT NULL,
  `isMessage` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `scheduled_message`
--

INSERT INTO `scheduled_message` (`id`, `phno`, `date`, `name`, `message_title`, `message_body`, `isMessage`, `created_at`, `modified_at`) VALUES
(1, '9978919971', '2014-04-30 00:00:00', '', 'Reports Reminder', 'Hi Mr. John, Please collect your report on 04/30', 0, '2014-04-22 09:04:09', '2014-04-22 09:04:09'),
(2, '3234733078', '2014-05-01 00:00:00', '', 'Appointment for second report', 'Hi Ken, Lets meet at 3PM for further diagnosis.', 0, '2014-04-22 10:05:15', '2014-04-22 10:05:15'),
(3, '3106132394', '2014-04-22 00:00:00', '', 'testeroni', 'this is a test', 0, '2014-04-22 18:51:18', '2014-04-22 18:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_patient`
--

DROP TABLE IF EXISTS `scheduled_patient`;
CREATE TABLE IF NOT EXISTS `scheduled_patient` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message_body` varchar(100) NOT NULL,
  `no_of_messages` int(100) NOT NULL,
  `no_of_call` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `scheduled_patient`
--

INSERT INTO `scheduled_patient` (`id`, `name`, `age`, `gender`, `address`, `phno`, `email`, `message_body`, `no_of_messages`, `no_of_call`, `created_at`, `modified_at`) VALUES
(1, 'ken', '30', 'Male', 'address1', '+1 456678778', 'ken@gmail.com', 'Hello Ken sir', 0, 0, '2014-04-28 14:51:40', '2014-04-28 14:51:57');
