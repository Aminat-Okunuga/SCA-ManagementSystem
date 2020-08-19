-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2020 at 04:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cohorts`
--

DROP TABLE IF EXISTS `cohorts`;
CREATE TABLE IF NOT EXISTS `cohorts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: Inactive, 3:Pending',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cohorts`
--

INSERT INTO `cohorts` (`id`, `name`, `start_date`, `end_date`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Cohort 1', NULL, NULL, 0, '2020-08-12 15:30:01', NULL),
(2, 'Cohort 2', NULL, NULL, 0, '2020-08-12 16:02:01', NULL),
(3, 'Cohort 3', NULL, NULL, 0, '2020-08-12 20:15:05', NULL),
(4, 'Hello', NULL, NULL, 1, '2020-08-13 22:05:03', NULL),
(5, 'Cohort 4', NULL, NULL, 1, '2020-08-19 10:05:58', NULL),
(6, 'Aminat', NULL, NULL, 1, '2020-08-19 12:25:04', NULL),
(7, 'gsh', NULL, NULL, 1, '2020-08-19 16:28:02', NULL),
(8, 'dghjj', NULL, NULL, 1, '2020-08-19 16:34:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `commentor_id` int(11) DEFAULT NULL,
  `commentee_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1. Active; 2. Inactive; 3. Pending',
  `featured` int(11) NOT NULL DEFAULT '1' COMMENT '1. Active; 2. Inactive',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `commentor_id`, `commentee_id`, `status`, `featured`, `date_created`, `date_updated`) VALUES
(1, 'Just in', NULL, NULL, 1, 1, '2020-08-16 18:34:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentees`
--

DROP TABLE IF EXISTS `mentees`;
CREATE TABLE IF NOT EXISTS `mentees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cohort_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1. Active 2. Inactive 3. Pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentees`
--

INSERT INTO `mentees` (`id`, `cohort_id`, `track_id`, `mentor_id`, `status`, `date_created`, `date_updated`) VALUES
(1, 3, 2, 1, 1, '2020-08-16 18:23:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

DROP TABLE IF EXISTS `mentors`;
CREATE TABLE IF NOT EXISTS `mentors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cohort_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1. Active 2. Inactive 3. Pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `cohort_id`, `track_id`, `status`, `date_created`, `date_updated`) VALUES
(1, 3, 3, 1, '2020-08-16 17:52:37', '2020-08-16 17:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: Inactive, 3:Pending',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `level`, `name`, `status`, `date_created`, `date_updated`) VALUES
(1, '2', 'PHP Backend', 0, '2020-08-12 20:00:55', '2020-08-12 20:00:55'),
(2, '34', 'Node', 0, '2020-08-12 20:13:06', '2020-08-12 20:13:06'),
(3, 'beginner', 'hello track', 1, '2020-08-13 22:03:41', '2020-08-13 22:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `bio` text,
  `picture` text,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: Inactive, 3:Pending',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `password`, `email`, `user_type`, `bio`, `picture`, `status`, `date_created`, `date_updated`) VALUES
(1, 'aminat', 'Aminat', 'Okunuga', 'Aminathhvfdrft2', 'makadeaminat@gmail.com', 'birthday3.jpg', NULL, NULL, 1, '2020-08-15 13:03:44', NULL),
(2, 'Makade', 'Makanjuola', 'Okunaga', 'OkunagaAm', 'makadeaminat@gmail.com', 'mentor', 'I am successful', 'birthday.jpg', 1, '2020-08-16 14:34:01', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
