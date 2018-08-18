-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2018 at 11:47 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r_p_w_copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `writerId` varchar(255) NOT NULL,
  `paperTopic` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `paperSubject` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `numberOfPages` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `blog_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `header` text NOT NULL,
  `blog_url` text NOT NULL,
  `blog_content` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `show` varchar(20) NOT NULL DEFAULT 'no' COMMENT 'yes, no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `percentage` int(255) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `orderId` int(255) NOT NULL,
  `reasons` text NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'dispute, revision',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not visible' COMMENT 'visible, not visible'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_table`
--

CREATE TABLE `file_table` (
  `id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `orderId` int(255) DEFAULT NULL,
  `uploaded_by` varchar(20) NOT NULL DEFAULT 'client',
  `time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `writer_id` varchar(255) NOT NULL,
  `client_id` varchar(20) NOT NULL,
  `initial_amount` varchar(255) DEFAULT NULL,
  `past_ETR` varchar(20) NOT NULL,
  `revision` varchar(20) NOT NULL,
  `disputed` varchar(20) NOT NULL,
  `final_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gen`
--

CREATE TABLE `gen` (
  `id` int(255) NOT NULL,
  `notification_id` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` int(255) NOT NULL,
  `orderId` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `writerId` varchar(255) NOT NULL DEFAULT '' COMMENT 'everyone, writers, students, a specific user',
  `studentId` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL DEFAULT '' COMMENT 'viewed, not viewed ',
  `notification` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not viewd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(255) NOT NULL,
  `clientId` varchar(255) NOT NULL,
  `writerId` varchar(255) DEFAULT NULL,
  `paperSubject` varchar(255) NOT NULL,
  `paperTopic` text NOT NULL,
  `paperStyle` varchar(255) NOT NULL,
  `spacing` varchar(255) NOT NULL,
  `typeOfWork` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `numberOfPages` varchar(255) NOT NULL,
  `numberOfsources` varchar(255) NOT NULL,
  `digitalSources` varchar(5) NOT NULL DEFAULT 'No',
  `total` varchar(255) NOT NULL,
  `instructions` text NOT NULL,
  `datePosted` varchar(100) NOT NULL,
  `dateCompleted` varchar(100) NOT NULL,
  `orderStatus` varchar(255) NOT NULL DEFAULT 'not taken' COMMENT 'taken, not taken, completed, revision, disputed, done, admin deleted, client deleted',
  `dateDue` varchar(100) NOT NULL,
  `requestWriter` varchar(255) DEFAULT 'writerId',
  `paymentMode` varchar(20) NOT NULL DEFAULT 'paypal',
  `transactionCode` varchar(255) NOT NULL DEFAULT 'not set'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderfiles`
--

CREATE TABLE `orderfiles` (
  `id` int(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `file1` varchar(255) DEFAULT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `file4` varchar(255) DEFAULT NULL,
  `file5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderstats`
--

CREATE TABLE `orderstats` (
  `id` int(255) NOT NULL,
  `taken` int(255) NOT NULL,
  `completed` int(255) NOT NULL,
  `revision` int(255) NOT NULL,
  `disputed` int(255) NOT NULL,
  `bids` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` varchar(255) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Id` int(255) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `clientId` varchar(255) NOT NULL,
  `writerId` varchar(255) NOT NULL,
  `writerEmail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `eligible` varchar(255) NOT NULL DEFAULT 'not eligible' COMMENT 'Eligible, Not eligible, Revision',
  `dateCompleted` varchar(255) NOT NULL,
  `dateDue` varchar(255) NOT NULL,
  `dateRequested` varchar(255) NOT NULL,
  `datePaid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unrequested' COMMENT 'unrequested, requested',
  `transactionCode` varchar(255) NOT NULL,
  `requestCode` varchar(255) NOT NULL DEFAULT 'not set'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profilepict`
--

CREATE TABLE `profilepict` (
  `id` int(255) NOT NULL,
  `regId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `online_status` varchar(255) NOT NULL DEFAULT 'offline',
  `zone` varchar(50) DEFAULT NULL,
  `activation_status` varchar(255) NOT NULL DEFAULT 'not active',
  `account_status` varchar(255) NOT NULL DEFAULT 'active',
  `registration_date` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` int(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `pages` varchar(255) DEFAULT NULL,
  `urgency` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `sources` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sample_url` varchar(255) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(255) NOT NULL,
  `page_column` text NOT NULL,
  `url` text NOT NULL,
  `url_name` text NOT NULL,
  `meta` text NOT NULL,
  `title` text NOT NULL,
  `header_1` text NOT NULL,
  `header_2` text NOT NULL,
  `content_1` text NOT NULL,
  `content_2` text NOT NULL,
  `content_3` text NOT NULL,
  `content_4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(255) NOT NULL,
  `reg_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_session` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `logout_time` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `orderId` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `clientId` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeleft`
--

CREATE TABLE `timeleft` (
  `orderId` int(255) DEFAULT NULL,
  `clientId` varchar(255) DEFAULT NULL,
  `writerId` varchar(255) DEFAULT NULL,
  `paperSubject` varchar(255) DEFAULT NULL,
  `paperTopic` text,
  `paperStyle` varchar(255) DEFAULT NULL,
  `spacing` varchar(255) DEFAULT NULL,
  `typeOfWork` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `numberOfPages` varchar(255) DEFAULT NULL,
  `numberOfsources` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `instructions` text,
  `datePosted` varchar(100) DEFAULT NULL,
  `dateCompleted` varchar(100) DEFAULT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `dateDue` varchar(100) DEFAULT NULL,
  `requestWriter` varchar(255) DEFAULT NULL,
  `paymentMode` varchar(20) DEFAULT NULL,
  `transactionCode` varchar(255) DEFAULT NULL,
  `Days` int(4) DEFAULT NULL,
  `Hours` int(2) DEFAULT NULL,
  `Minutes` int(2) DEFAULT NULL,
  `Seconds` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeleft_copy`
--

CREATE TABLE `timeleft_copy` (
  `orderId` int(255) DEFAULT NULL,
  `clientId` varchar(255) DEFAULT NULL,
  `writerId` varchar(255) DEFAULT NULL,
  `paperSubject` varchar(255) DEFAULT NULL,
  `paperTopic` text,
  `paperStyle` varchar(255) DEFAULT NULL,
  `spacing` varchar(255) DEFAULT NULL,
  `typeOfWork` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `numberOfPages` varchar(255) DEFAULT NULL,
  `numberOfsources` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `instructions` text,
  `datePosted` varchar(100) DEFAULT NULL,
  `dateCompleted` varchar(100) DEFAULT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `dateDue` varchar(100) DEFAULT NULL,
  `requestWriter` varchar(255) DEFAULT NULL,
  `paymentMode` varchar(20) DEFAULT NULL,
  `transactionCode` varchar(255) DEFAULT NULL,
  `Days` int(4) DEFAULT NULL,
  `Hours` int(2) DEFAULT NULL,
  `Minutes` int(2) DEFAULT NULL,
  `Seconds` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wcd_rate`
--

CREATE TABLE `wcd_rate` (
  `id` int(255) NOT NULL,
  `studentId` varchar(100) NOT NULL,
  `writerId` varchar(100) NOT NULL,
  `orderId` int(255) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `writeraccount`
--

CREATE TABLE `writeraccount` (
  `id` int(255) NOT NULL,
  `reg_Id` varchar(255) NOT NULL,
  `paypalEmail` varchar(255) NOT NULL,
  `paypalName` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL DEFAULT 'default',
  `status` varchar(255) NOT NULL DEFAULT 'not verified',
  `verificationCode` varchar(255) NOT NULL DEFAULT 'not set',
  `maxOrders` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `writer_stats`
--

CREATE TABLE `writer_stats` (
  `id` int(255) NOT NULL,
  `writerId` varchar(255) NOT NULL,
  `taken` int(255) NOT NULL,
  `completed` int(255) NOT NULL,
  `revision` int(255) NOT NULL,
  `disputed` int(255) NOT NULL,
  `bids` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_table`
--
ALTER TABLE `file_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messageSender` (`sender`),
  ADD KEY `messageRecipient` (`recipient`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderfiles`
--
ALTER TABLE `orderfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstats`
--
ALTER TABLE `orderstats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `order_Id` (`orderId`) USING BTREE,
  ADD KEY `reg_Id` (`clientId`),
  ADD KEY `writer_email` (`writerEmail`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepict`
--
ALTER TABLE `profilepict`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg` (`regId`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`reg_id`),
  ADD UNIQUE KEY `user_session` (`user_session`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wcd_rate`
--
ALTER TABLE `wcd_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writeraccount`
--
ALTER TABLE `writeraccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regsr_id` (`reg_Id`);

--
-- Indexes for table `writer_stats`
--
ALTER TABLE `writer_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_table`
--
ALTER TABLE `file_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gen`
--
ALTER TABLE `gen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderfiles`
--
ALTER TABLE `orderfiles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderstats`
--
ALTER TABLE `orderstats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profilepict`
--
ALTER TABLE `profilepict`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wcd_rate`
--
ALTER TABLE `wcd_rate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `writeraccount`
--
ALTER TABLE `writeraccount`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `writer_stats`
--
ALTER TABLE `writer_stats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
