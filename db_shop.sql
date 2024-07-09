-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-03-02 00:46:52
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_shop`
--
CREATE DATABASE IF NOT EXISTS `db_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_shop`;

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--

CREATE TABLE `city` (
  `cityId` int(11) NOT NULL,
  `cityName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`cityId`, `cityName`) VALUES
(1, 'Keelung'),
(2, 'Taipei'),
(3, 'NewTaipei'),
(4, 'Taoyuan'),
(5, 'Hsinchu'),
(6, 'HsinchuCity'),
(7, 'Miaoli'),
(8, 'Taichung'),
(9, 'Changhua'),
(10, 'Nantou'),
(11, 'Yunlin'),
(12, 'Chiayi'),
(13, 'ChiayiCity'),
(14, 'Tainan'),
(15, 'Kaohsiung'),
(16, 'Pingtung'),
(17, 'Yilan'),
(18, 'Hualien'),
(19, 'Taitung'),
(20, 'Penghu'),
(21, 'Kinmen'),
(22, 'Lienchiang');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `memberId` int(11) NOT NULL,
  `account` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`memberId`, `account`, `password`, `firstName`, `lastName`, `tel`, `cityId`, `address`) VALUES
(1, 'admin', '0000', 'A', 'dmin', '0912-345678', 8, 'ababox'),
(2, 'test', 'test', 'T', 'est', '09XX-XXXXXX', 19, 'a1b2c3'),
(3, 'test1', 'test1', 'T', 'est1', '09XX-XXXXXX', 12, 'a1b2c3666');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
