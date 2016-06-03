-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 05:35 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asana`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(5) NOT NULL,
  `tid` int(5) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `delflag` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `tid`, `comment`, `delflag`) VALUES
(1, 3, 'ddddddd', 1),
(2, 3, 'ddddddd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `wnid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `woPwdord` varchar(100) NOT NULL,
  `contraPsena` varchar(100) NOT NULL,
  `sringclave` varchar(3) NOT NULL,
  `del_flag` varchar(1) NOT NULL DEFAULT '1',
  `cts` datetime NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`wnid`, `name`, `user_name`, `woPwdord`, `contraPsena`, `sringclave`, `del_flag`, `cts`, `mts`) VALUES
(1, 'OTPanel', 'asana@gmail.com', '12345678', '84d7809c67b4e558b94b54c7f31ce1c9efc815134f0146fb59b869931ad03f64', 'fbf', '1', '2015-10-20 00:00:00', '2016-05-22 03:32:27'),
(2, 'AsanaPanel', 'amol@gmail.com', '12345678', '84d7809c67b4e558b94b54c7f31ce1c9efc815134f0146fb59b869931ad03f64', 'fbf', '1', '2016-05-21 00:00:00', '2016-05-22 03:25:17'),
(3, 'Amol Katkar', 'a@gmail.com', '12345678', '', '', '1', '2016-05-26 00:00:00', '2016-05-25 21:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delflag` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mid`, `pid`, `mname`, `cts`, `mts`, `delflag`) VALUES
(1, 6, 'Bhushan', '2016-05-28', '2016-05-28 02:42:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personalsubtask`
--

CREATE TABLE `personalsubtask` (
  `pstid` int(5) NOT NULL,
  `ptid` int(5) NOT NULL,
  `psubtask` varchar(100) NOT NULL,
  `pcomment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalsubtask`
--

INSERT INTO `personalsubtask` (`pstid`, `ptid`, `psubtask`, `pcomment`) VALUES
(1, 1, 'aaaa', ''),
(2, 1, 'dddddd', ''),
(3, 2, 'cccc', ''),
(4, 2, 'cccc', ''),
(5, 2, 'xxxx', '');

-- --------------------------------------------------------

--
-- Table structure for table `personaltask`
--

CREATE TABLE `personaltask` (
  `ptid` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `task` varchar(100) NOT NULL,
  `descrition` varchar(100) NOT NULL,
  `duedate` date NOT NULL,
  `attatchment` varchar(100) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delflag` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaltask`
--

INSERT INTO `personaltask` (`ptid`, `username`, `task`, `descrition`, `duedate`, `attatchment`, `cts`, `mts`, `delflag`) VALUES
(1, 'a@gmail.com', 'Add Form In Project', 'Add Table Also', '0000-00-00', '', '2016-05-29', '2016-05-29 02:10:05', 1),
(2, 'a@gmail.com', 'Add Table', 'Employee Table Add', '2016-05-30', '', '2016-05-29', '2016-05-29 02:14:02', 1),
(3, 'a@gmail.com', 'ttttt', 'ttttttt', '2016-05-28', '', '2016-05-31', '2016-05-30 23:49:42', 1),
(4, 'a@gmail.com', 'yyyyyyyy', 'yyyyyyyyy', '2016-05-21', '', '2016-05-31', '2016-05-30 23:52:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdesciption` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delflag` int(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `pname`, `pdesciption`, `user_name`, `cts`, `mts`, `delflag`) VALUES
(1, 'HighCourt', 'Convert php to angularjs', 'asana@gmail.com', '0000-00-00', '2016-05-27 23:15:50', 1),
(2, 'assana', 'assana', 'asana@gmail.com', '0000-00-00', '2016-05-27 23:15:45', 1),
(5, 'xyz', 'xyz', 'asana@gmail.com', '0000-00-00', '2016-05-27 23:15:57', 1),
(6, 'SSC', 'Create ssc project', 'a@gmail.com', '0000-00-00', '2016-05-27 23:41:06', 1),
(7, 'D Gang', 'DDD', 'a@gmail.com', '0000-00-00', '2016-05-31 01:59:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `rid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `orgname` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `del_flag` int(5) NOT NULL DEFAULT '1',
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`rid`, `name`, `orgname`, `user_name`, `pass`, `del_flag`, `cts`, `mts`) VALUES
(1, 'Amol Katkar', 'dotweb', 'a@gmail.com', 'amol1234', 1, '2016-05-26', '2016-05-25 21:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subtasck`
--

CREATE TABLE `subtasck` (
  `subid` int(10) NOT NULL,
  `pid` int(5) NOT NULL,
  `tid` int(10) NOT NULL,
  `subtask` varchar(100) NOT NULL,
  `assignee` varchar(100) NOT NULL,
  `duedate` date NOT NULL,
  `comment` varchar(100) NOT NULL,
  `del_flag` int(5) DEFAULT '1',
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtasck`
--

INSERT INTO `subtasck` (`subid`, `pid`, `tid`, `subtask`, `assignee`, `duedate`, `comment`, `del_flag`, `cts`, `mts`) VALUES
(1, 6, 1, 'add sub task for table', 'a@gmail.com', '0000-00-00', '', 1, '2016-05-28', '2016-05-27 20:06:53'),
(2, 6, 1, 'add sub task for table', 'amol@gmail.com', '0000-00-00', '', 1, '2016-05-28', '2016-05-27 20:09:09'),
(4, 6, 3, 'sssssss', 'a@gmail.com', '0000-00-00', '', 1, '2016-05-28', '2016-05-28 03:30:05'),
(5, 6, 3, 'kkkkk', 'a@gmail.com', '0000-00-00', '', 1, '2016-05-28', '2016-05-28 03:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `tasck`
--

CREATE TABLE `tasck` (
  `tid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `task` varchar(100) NOT NULL,
  `assignee` varchar(50) NOT NULL,
  `tdescription` varchar(100) NOT NULL,
  `duedate` date NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `popular` int(5) DEFAULT '1',
  `comid` int(5) NOT NULL DEFAULT '1',
  `del_flag` int(5) NOT NULL DEFAULT '1',
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasck`
--

INSERT INTO `tasck` (`tid`, `pid`, `task`, `assignee`, `tdescription`, `duedate`, `attachment`, `comment`, `popular`, `comid`, `del_flag`, `cts`, `mts`) VALUES
(1, 6, 'This Is First Task', 'first@Gmail.com', 'First Description', '2016-06-05', '', '', 1, 1, 1, '2016-06-03', '2016-06-03 03:08:00'),
(2, 6, 'Secand Task', 'a@gmail.com', 'Secand TAsk', '2016-06-10', '', '', 0, 1, 1, '2016-06-03', '2016-06-03 03:13:25'),
(3, 6, 'Complete Task', 'a@gmail.com', 'Complete Task', '2016-06-17', '', '', 1, 0, 1, '2016-06-03', '2016-06-03 03:08:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`wnid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `personalsubtask`
--
ALTER TABLE `personalsubtask`
  ADD PRIMARY KEY (`pstid`);

--
-- Indexes for table `personaltask`
--
ALTER TABLE `personaltask`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subtasck`
--
ALTER TABLE `subtasck`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `tasck`
--
ALTER TABLE `tasck`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `wnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personalsubtask`
--
ALTER TABLE `personalsubtask`
  MODIFY `pstid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personaltask`
--
ALTER TABLE `personaltask`
  MODIFY `ptid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subtasck`
--
ALTER TABLE `subtasck`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tasck`
--
ALTER TABLE `tasck`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
