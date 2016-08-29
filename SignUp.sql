-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-08-29 21:41:30
-- 服务器版本： 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.9-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SignUp`
--

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `Id` int(4) NOT NULL,
  `Sex` int(1) NOT NULL COMMENT '性别',
  `Name` char(4) NOT NULL COMMENT '姓名',
  `Birthday` char(10) NOT NULL COMMENT '生日',
  `PhoneNumber` char(11) NOT NULL COMMENT '电话号码',
  `ShortPhoneNumber` char(6) NOT NULL COMMENT '短号',
  `QQNumber` char(11) NOT NULL,
  `Dormitory` char(2) NOT NULL COMMENT '楼号',
  `Room` char(3) NOT NULL COMMENT '房间号',
  `ClassNumber` char(4) NOT NULL COMMENT '班级',
  `FirstChoice` int(1) NOT NULL COMMENT '第一志愿',
  `SecondChoice` int(1) NOT NULL COMMENT '第二志愿',
  `AceptSwap` int(1) NOT NULL COMMENT '接受调剂',
  `Interest` char(255) NOT NULL COMMENT '兴趣',
  `SelfConception` char(255) NOT NULL COMMENT '自我认识',
  `SectorAwareness` char(255) NOT NULL COMMENT '部门认识',
  `Experience` char(255) NOT NULL COMMENT '相关经历'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='报名信息表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `QQNumber` (`QQNumber`),
  ADD KEY `Room` (`Room`),
  ADD KEY `Dormitory` (`Dormitory`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
