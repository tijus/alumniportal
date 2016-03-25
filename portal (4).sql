-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 03:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE DATABASE portal;
USE portal;

CREATE TABLE IF NOT EXISTS `achievements` (
  `achievement_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE IF NOT EXISTS `basic_info` (
  `basic_info_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `country` varchar(25) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `corr_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `website` varchar(40) DEFAULT NULL,
  `hobbies` varchar(50) DEFAULT NULL,
  `marital_status` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `first_login_date` date NOT NULL,
  `last_profile_update_date` date NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`basic_info_id`, `first_name`, `last_name`, `DOB`, `gender`, `country`, `mobile_no`, `corr_address`, `permanent_address`, `website`, `hobbies`, `marital_status`, `status`, `first_login_date`, `last_profile_update_date`, `batch`) VALUES
(1, 'SUJATA', 'SINGH', '12-Mar-201', 'F', 'India', 123456789, 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', '', '', 'Married', 'Student', '2015-11-04', '2015-11-04', 2017),
(2, 'SUJATA', 'SINGH', '12-Mar-201', 'F', 'India', 2147483647, 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', '', '', 'Engaged', 'Student', '2015-11-05', '2015-11-05', 2007),
(3, 'SUJATA', 'SINGH', '12-Mar-201', 'F', 'India', 2147483647, 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', 'Nandanvan Park, A/603, Plot-9, Kamothe\r\nNone', '', '', 'Married', 'Alumni', '2015-11-05', '2015-11-05', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE IF NOT EXISTS `educational_details` (
  `edu_det_id` int(11) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `stream` varchar(40) NOT NULL,
  `board` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`edu_det_id`, `degree`, `grade`, `stream`, `board`) VALUES
(1, 'TE', '9.82', 'ETX', ''),
(2, 'FE', '9.09', 'CS', ''),
(3, 'SE', '9.09', 'CS', '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_pics`
--

CREATE TABLE IF NOT EXISTS `profile_pics` (
  `profile_pic_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `proj_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` smallint(6) NOT NULL,
  `domain` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`proj_id`, `title`, `year`, `domain`, `description`) VALUES
(1, '', 0, 'sdfaf', 'fsdf'),
(2, '', 0, 'sdfsadf', ''),
(3, '', 0, 'sdfaf', 'fdsa');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(3) NOT NULL,
  `description` varchar(20) NOT NULL,
  `DateCreated` date NOT NULL,
  `LastUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technical_proficiency`
--

CREATE TABLE IF NOT EXISTS `technical_proficiency` (
  `tech_prof_id` int(11) NOT NULL,
  `skill` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_proficiency`
--

INSERT INTO `technical_proficiency` (`tech_prof_id`, `skill`, `level`) VALUES
(1, 'coding', 'Beginner'),
(2, 'coding', 'Beginner'),
(3, 'coding', 'Beginner');

-- --------------------------------------------------------

--
-- Table structure for table `topic_list`
--

CREATE TABLE IF NOT EXISTS `topic_list` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jitendra', '0-yZP5uHxmw4wjG7QGmfWxbzGa7TLgil', '$2y$13$yeaV6BZgj2GpcFpGyPMc8uIKQRTpfWmFbWtetEK06teqev.AIsIyS', NULL, 'jitendra@gmail.com', 10, 1446642269, 1446642269),
(2, 'amit', '5SgkOlH6A6r0sWu5nAn5pz1F2LSOsXSi', '$2y$13$AeDGYv98bcYK.XF6ox0/S.dKSgQlrzrjW.gCAZtsaTD/bGABHc2WG', NULL, 'amit@gmail.com', 10, 1446643429, 1446643429),
(3, 'tijus', 'XbMy6-QOfVhNv3Hhfy4340pNJRNND8No', '$2y$13$MLqcfVvYF8XU4YNcRVr08O/o0axwIT2iFJ/KD/V/G7wBEO7qN6rtW', NULL, 'tijussingh@gmail.com', 10, 1446731327, 1446731327);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `work_exp_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `job_title` varchar(25) NOT NULL,
  `start_date` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`work_exp_id`, `type`, `company_name`, `job_title`, `start_date`) VALUES
(1, 0, 'sdf', 'sdf', '16-10-1994'),
(2, 0, 'sdf', 'sdf', '16-10-1994'),
(3, 0, 'sdf', 'sdf', '16-10-1994');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`),
  ADD KEY `authitemchild_ibfk_2` (`child`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`basic_info_id`);

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD PRIMARY KEY (`edu_det_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile_pics`
--
ALTER TABLE `profile_pics`
  ADD PRIMARY KEY (`profile_pic_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technical_proficiency`
--
ALTER TABLE `technical_proficiency`
  ADD PRIMARY KEY (`tech_prof_id`);

--
-- Indexes for table `topic_list`
--
ALTER TABLE `topic_list`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`work_exp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `basic_info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educational_details`
--
ALTER TABLE `educational_details`
  MODIFY `edu_det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile_pics`
--
ALTER TABLE `profile_pics`
  MODIFY `profile_pic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `technical_proficiency`
--
ALTER TABLE `technical_proficiency`
  MODIFY `tech_prof_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topic_list`
--
ALTER TABLE `topic_list`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `work_exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
