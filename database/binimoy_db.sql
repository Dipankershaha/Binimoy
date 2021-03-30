-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 05:58 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `binimoy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bi_post`
--

CREATE TABLE IF NOT EXISTS `bi_post` (
`id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bi_post`
--

INSERT INTO `bi_post` (`id`, `user_id`, `p_name`, `rate`, `description`, `photo`, `category`, `status`) VALUES
(7, '1', 'Car', '500', 'vsdl\r\nvmnskhdv\r\nsvkdcs', '0.878343001543678460.jpg', '2', '0'),
(8, '1', 'Bike', '800', 'cbdls\r\nkjvskdnls', '0.500165001543678481.jpg', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bi_transition`
--

CREATE TABLE IF NOT EXISTS `bi_transition` (
`id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `way` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bi_transition`
--

INSERT INTO `bi_transition` (`id`, `user_id`, `post_id`, `way`, `status`) VALUES
(3, '1', '7', 'Exchange', 'done'),
(4, '1', '8', 'Buy', ''),
(5, '1', '8', 'Exchange', '');

-- --------------------------------------------------------

--
-- Table structure for table `bi_user`
--

CREATE TABLE IF NOT EXISTS `bi_user` (
`id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bi_user`
--

INSERT INTO `bi_user` (`id`, `u_name`, `phone`, `email`, `password`, `description`) VALUES
(1, 'Kundu', '123456789', 'temp@gmail.com', 'temp', 'csigcbnds\r\ncsbdclsn\r\nckjbsdks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bi_post`
--
ALTER TABLE `bi_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_transition`
--
ALTER TABLE `bi_transition`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_user`
--
ALTER TABLE `bi_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_post`
--
ALTER TABLE `bi_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bi_transition`
--
ALTER TABLE `bi_transition`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bi_user`
--
ALTER TABLE `bi_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
