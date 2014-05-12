-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2013 at 06:40 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `c_email` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `did` int(11) NOT NULL,
  KEY `commentfk1` (`c_email`),
  KEY `commentfk2` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `did` int(30) NOT NULL,
  `delcode` text NOT NULL,
  `d_email` varchar(30) NOT NULL,
  `pdata` varchar(100) DEFAULT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`did`),
  KEY `datafk` (`d_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`did`, `delcode`, `d_email`, `pdata`, `type`) VALUES
(1367822122, '1367822121180', 'abhishek.uvce@gmail.com', 'http://localhost/final/upload3/51874f29d88bc1367822121.mp4', 'video'),
(1367835711, '1367835689002', 'vrd.mangalgi@gmail.com', 'hi abhi', 'text'),
(1367837705, '1367837703067', 'vrd.mangalgi@gmail.com', 'http://localhost/final/upload3/51878c082f4a31367837704.mp4', 'video'),
(1367837809, '1367837808705', 'vrd.mangalgi@gmail.com', 'http://localhost/final/upload3/51878c70c8d9d1367837808.mp4', 'video'),
(1367837829, '1367837821881', 'vrd.mangalgi@gmail.com', 'http://localhost/final/upload3/51878c8435a921367837828.mp4', 'video'),
(1367841134, '1367841133090', 'vrd.mangalgi@gmail.com', 'http://localhost/final/upload3/5187996dc7ac71367841133.mp4', 'video'),
(1368429564, '1368429446294', 'abhishek.uvce@gmail.com', 'cvbvb', 'text'),
(1368535100, '1368535093365', 'abhishek.uvce@gmail.com', 'http://www.youtube.com/watch?v=Y7EWNpcj-QI', 'text'),
(1368861147, '', 'kashif.in@in.com', 'hi am kashif', 'text'),
(1368861462, '1368861460228', 'kashif.in@in.com', 'http://localhost/final/upload2/51972b1543b06.jpg', 'image'),
(1368861479, '1368861475867', 'kashif.in@in.com', 'http://localhost/final/upload3/51972b26df1621368861478.MOV', 'video'),
(1368873644, '', 'kashif.in@in.com', 'dff', 'text'),
(1368984684, '1368984682112', 'gundu@gmail.com', 'http://localhost/final/upload3/51990c6bb2a5a1368984683.mp4', 'video'),
(1368984711, '1368984708064', 'gundu@gmail.com', 'http://localhost/final/upload3/51990c8677fcc1368984710.FLV', 'video'),
(1369053004, '', 'abhishek.uvce@gmail.com', 'hello ', 'text'),
(1370240686, '', 'abhishek.uvce@gmail.com', 'dfd', 'text'),
(1370248855, '', 'kashif.in@in.com', 'bnmbnm', 'text'),
(1370248877, '1370248874597', 'kashif.in@in.com', 'http://localhost/final/upload3/51ac56ac4ac7c1370248876.mp4', 'video'),
(1370688887, '', 'abhishek.uvce@gmail.com', 'asas', 'text'),
(1370696098, '', 'abhishek.uvce@gmail.com', 'fhhfh', 'text'),
(1370696117, '1370696115696', 'abhishek.uvce@gmail.com', 'http://localhost/final/upload2/51b329b4c085f.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `data2`
--

CREATE TABLE IF NOT EXISTS `data2` (
  `did` int(30) NOT NULL,
  `d_email` varchar(30) NOT NULL,
  `image` text,
  PRIMARY KEY (`did`),
  KEY `d_email` (`d_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `specification` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`name`, `email`, `specification`) VALUES
('auto', 'auto@gmail.com', 'spares');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `u_email` varchar(30) DEFAULT NULL,
  `f_email` varchar(30) DEFAULT NULL,
  `request` text NOT NULL,
  `chatfile` text NOT NULL,
  KEY `friendsfk1` (`u_email`),
  KEY `freindsfk2` (`f_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`u_email`, `f_email`, `request`, `chatfile`) VALUES
('abhishek.uvce@gmail.com', 'anantha.ani@gmail.com', 'sent', ''),
('vrd.mangalgi@gmail.com', 'abhishek.uvce@gmail.com', 'accepted', ''),
('abhishek.uvce@gmail.com', 'kashif.in@in.com', 'accepted', 'kashifabhishek.txt'),
('abhishek.uvce@gmail.com', 'gundu@gmail.com', 'sent', ''),
('kashif.in@in.com', 'gundu@gmail.com', 'sent', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE IF NOT EXISTS `login_table` (
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  KEY `login_tablefk` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`email`, `password`) VALUES
('abhishek.uvce@gmail.com', '5d41402abc4b2a76b9719d911017c592'),
('vrd.mangalgi@gmail.com', '1b3231655cebb7a1f783eddf27d254ca'),
('anantha.ani@gmail.com', '140b543013d988f4767277b6f45ba542'),
('kashif.in@in.com', 'd31237492a5b0b9a4b21494de800a400'),
('gundu@gmail.com', '5d41402abc4b2a76b9719d911017c592'),
('ranga@hotmail.com', '75819783c5ad99efaec29d8a7570da51'),
('srinivas19@gmail.com', '64c61dda744b311b51c064ea7760a968'),
('auto@gmail.com', '9df22f196a33acd0b372fe502de51211');

-- --------------------------------------------------------

--
-- Table structure for table `onlinestatus`
--

CREATE TABLE IF NOT EXISTS `onlinestatus` (
  `email` varchar(30) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinestatus`
--

INSERT INTO `onlinestatus` (`email`, `status`) VALUES
('abhishek.uvce@gmail.com', 'offline'),
('anantha.ani@gmail.com', 'offline'),
('auto@gmail.com', 'online'),
('gundu@gmail.com', 'offline'),
('kashif.in@in.com', 'offline'),
('ranga@hotmail.com', 'offline'),
('srinivas19@gmail.com', 'offline'),
('vrd.mangalgi@gmail.com', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE IF NOT EXISTS `profilepic` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `path` text,
  PRIMARY KEY (`p_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`p_id`, `email`, `path`) VALUES
(50, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/51874f145080a6b89589ead614f02b6759d42ee44d5f5.jpg'),
(51, 'vrd.mangalgi@gmail.com', 'http://localhost/final/upload/5187836d23d057255_10200766708518402_950737657_n.jpg'),
(52, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/51888a881eb8a515a4a5716b1d1339600776.jpg'),
(53, 'anantha.ani@gmail.com', 'http://localhost/final/upload/518c8f6cd4c3c01.jpg'),
(54, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/519093bcca5302012-suzuki-gsxr-1000-27.jpg'),
(55, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/51936d3b8ae42IMAG0584-1.jpg'),
(56, 'kashif.in@in.com', 'http://localhost/final/upload/519729d242ccfIMG_0958.jpg'),
(57, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/5197518e4d406IMG_1121.JPG'),
(58, 'gundu@gmail.com', 'http://localhost/final/upload/51990bece92a3lamborghini_veneno-wide.jpg'),
(59, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/51a1d5bd7dc0e6b89589ead614f02b6759d42ee44d5f5.jpg'),
(60, 'abhishek.uvce@gmail.com', 'http://localhost/final/upload/51a1d5cd5051fFerrari-LaFerrari_2014_1600x1200_wallpaper_01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `email` varchar(20) NOT NULL,
  `rqst` varchar(100) NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `requestfk` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `u_email` varchar(20) NOT NULL,
  `d_email` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `rid` int(11) NOT NULL,
  KEY `responsefk1` (`u_email`),
  KEY `responsefk2` (`d_email`),
  KEY `responsefk3` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `vno` int(11) NOT NULL,
  `vname` varchar(30) DEFAULT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`email`),
  KEY `userfk` (`vno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `age`, `sex`, `vno`, `vname`, `address`) VALUES
('abhishek.uvce@gmail.com', 'abhishek', 21, 'Male', 1, 'pulsar220', 'c-33,central avenue, iti colony,dooravaninagar,bangalore-16'),
('anantha.ani@gmail.com', 'sdsd', 21, 'Male', 1, 'ewrw', 'dooravaninagar,bangalore-16'),
('auto@gmail.com', 'auto', 21, 'Female', 3, 'acccord', 'bangalore-16'),
('gundu@gmail.com', 'gundu', 22, 'Male', 1, 'cbr', 'E-331,NORTH 3rd LANE,ITI COLONY,DOORAVANINAGAR,bangalore-16'),
('kashif.in@in.com', 'kashif', 21, 'Male', 1, 'thunderbird 350', 'sultan palya,bangalore'),
('ranga@hotmail.com', 'ranga', 33, 'Male', 1, 'rangas', 'bangalore-16'),
('rbharathsinghiscool@gmail.com', 'bharath', 21, 'Male', 1, 'honda', 'subbana palya,bangalore - 33'),
('srinivas19@gmail.com', 'srinivas', 21, 'Male', 1, 'pulsar220sf', 'bangalore-02'),
('vrd.mangalgi@gmail.com', 'varad', 23, 'Male', 6, 'BMW', 'E-331,NORTH 3rd LANE,ITI COLONY,DOORAVANINAGAR,bangalore-16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `type` varchar(15) NOT NULL,
  `capacity` int(11) NOT NULL,
  `vno` int(11) NOT NULL,
  PRIMARY KEY (`vno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`type`, `capacity`, `vno`) VALUES
('TWO WHEELER', 2, 1),
('FOUR WHEELER', 2, 2),
('FOUR WHEELER', 5, 3),
('FOUR WHEELER', 7, 4),
('TWO WHEELER', 1, 5),
('FOUR WHEELER', 4, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `commentfk1` FOREIGN KEY (`c_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentfk2` FOREIGN KEY (`did`) REFERENCES `data` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `datafk` FOREIGN KEY (`d_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data2`
--
ALTER TABLE `data2`
  ADD CONSTRAINT `data2_ibfk_1` FOREIGN KEY (`d_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `freindsfk2` FOREIGN KEY (`f_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friendsfk1` FOREIGN KEY (`u_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_table`
--
ALTER TABLE `login_table`
  ADD CONSTRAINT `login_tablefk` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onlinestatus`
--
ALTER TABLE `onlinestatus`
  ADD CONSTRAINT `onlinestatus_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD CONSTRAINT `profilepic_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `requestfk` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `responsefk1` FOREIGN KEY (`u_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responsefk2` FOREIGN KEY (`d_email`) REFERENCES `distributor` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responsefk3` FOREIGN KEY (`rid`) REFERENCES `request` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`vno`) REFERENCES `vehicles` (`vno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
