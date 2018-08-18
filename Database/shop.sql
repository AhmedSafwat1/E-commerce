-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 08:21 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT '0',
  `Ordering` int(11) NOT NULL,
  `Visiblity` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_Comments` tinyint(4) NOT NULL DEFAULT '0',
  `Allow_Ads` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `Parent`, `Ordering`, `Visiblity`, `Allow_Comments`, `Allow_Ads`) VALUES
(2, 'mobile', ' This device for Talk', 0, 1, 0, 0, 0),
(3, 'Hand Made', 'Hand made items', 0, 2, 0, 0, 0),
(4, 'Computers', 'Computer slles', 0, 4, 0, 0, 0),
(5, 'Cell phones', 'Cell phones', 0, 5, 0, 0, 0),
(6, 'Clothing', 'Clothing Adventure', 0, 6, 0, 0, 0),
(7, 'Tools', 'Home Tools', 0, 9, 0, 0, 0),
(9, 'fsdfasd', 'afdf', 4, 9, 0, 0, 0),
(10, 'asf', 'fa', 2, 9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `C_ID` int(11) NOT NULL,
  `Comments` text NOT NULL,
  `States` tinyint(4) NOT NULL DEFAULT '0',
  `Comment_Date` date NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`C_ID`, `Comments`, `States`, `Comment_Date`, `Item_ID`, `Member_ID`) VALUES
(11, 'Nice home', 1, '2018-05-17', 20, 1),
(12, 'fwfw', 1, '2018-05-17', 20, 1),
(13, 'Nice item', 1, '2018-05-17', 20, 11);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `Approve` tinyint(4) NOT NULL DEFAULT '0',
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `Tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_ID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `Status`, `Rating`, `Approve`, `Cat_ID`, `Member_ID`, `Tags`) VALUES
(18, 'Iphone s6', 'mobile phone', '10', '2018-05-17', 'chinia', '../uploads/6617-05-18_2.jpg', '1', 0, 1, 7, 11, 'test,tag'),
(20, 'drs', 'this is the version 4 product in 2017', '4000', '2018-05-17', 'chinia', '../uploads/4517-05-18_6.jpg', '4', 0, 1, 6, 1, 'test,tag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL COMMENT 'USE to identify the user',
  `UserName` varchar(255) NOT NULL COMMENT 'user name to login',
  `Password` varchar(255) NOT NULL COMMENT 'password to login',
  `Email` varchar(255) NOT NULL COMMENT 'Email ',
  `FullName` varchar(255) NOT NULL DEFAULT 'Unknown' COMMENT 'Full name to display in page',
  `Avater` varchar(255) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '0' COMMENT 'identify user group',
  `TrustStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'saller Rank',
  `RegStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'user approvel',
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Email`, `FullName`, `Avater`, `GroupID`, `TrustStatus`, `RegStatus`, `Date`) VALUES
(1, 'safwat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 't@yahoo.com', 'ali Abo baker', '', 1, 1, 1, '2018-05-15'),
(9, 'ali', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 't@yahoo.com', 'ddd', '', 0, 0, 1, '2018-05-22'),
(11, 'saeed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 't@yahoo.com', 'ahmed saeed', '../uploads/2517-05-18_img_avatar4.png', 0, 0, 1, '2018-05-08'),
(14, 'alitest', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'da@yahoo.com', 'ali test', '', 0, 0, 1, '2018-05-14'),
(15, 'test', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 't@yahoo.com', 'Unknown', '../uploads/4717-05-18_img_avatar5.png', 0, 0, 0, '0000-00-00'),
(18, 'hannen', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kingktoy@yahoop.com', 'Unknown', '../uploads/6417-05-18_6.jpg', 0, 0, 1, '2018-05-16'),
(25, 'tttttttt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kingktoy@yahoop.com', 'ds', '../uploads/717-05-18_img_avatar5.png', 0, 0, 1, '2018-05-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`C_ID`),
  ADD KEY `item_fk` (`Item_ID`),
  ADD KEY `c_member_fk` (`Member_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `member_fk` (`Member_ID`),
  ADD KEY `cat_fk` (`Cat_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'USE to identify the user', AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `c_member_fk` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_fk` FOREIGN KEY (`Item_ID`) REFERENCES `items` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_fk` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
