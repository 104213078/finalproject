-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-19 00:18:08
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `book1.0`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` enum('中','英','日','其他') COLLATE utf8_unicode_ci NOT NULL,
  `uID` int(20) NOT NULL,
  `likebook` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `lang`, `uID`, `likebook`, `views`, `1`, `2`, `3`) VALUES
(1, 'Progamming', 'ssyu', '日', 2, 13, 6, 0, 0, 1),
(2, 'Web Programming', 'ycchen', '中', 2, 6, 0, 0, 0, 0),
(3, 'Chinese History', 'pinyin', '中', 1, 4, 0, 0, 0, 0),
(4, 'Bible', 'Shakespeare', '英', 1, 4, 0, 0, 0, 0),
(5, 'Chemical Principles', 'Madame Curie', '英', 3, 8, 2, 0, 0, 0),
(6, 'Civil Law', 'Dr. Sun', '中', 3, 7, 0, 0, 0, 0),
(7, 'Statistics', 'R. A. Fisher', '英', 3, 13, 2, 1, 0, 0),
(8, 'Management', 'Peter Drucker', '中', 2, 1, 0, 0, 0, 0),
(9, 'National Chi Nan University', 'R. C. T.', '中', 1, 100, 9, 1, 1, 0),
(10, 'Architecture', 'Toyo Ito', '日', 3, 12, 0, 0, 0, 0),
(14, 'software', 'tus.', '中', 2, 13, 1, 0, 0, 0),
(15, 'japanese', 'nihon', '日', 1, 1, 0, 0, 0, 0),
(17, 'aaaa', 'bbbbb', '英', 1, 0, 0, 0, 0, 0),
(18, '123', '456', '英', 1, 0, 0, 0, 0, 0),
(19, '666', '7777', '日', 2, 0, 0, 0, 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
