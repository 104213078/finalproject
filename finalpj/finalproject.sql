-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-28 16:51:12
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `finalproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `butterfly`
--

CREATE TABLE `butterfly` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nickname` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `field` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gender` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `stage` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `season` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `butterfly`
--

INSERT INTO `butterfly` (`id`, `name`, `nickname`, `field`, `gender`, `stage`, `season`, `description`) VALUES
(1, '臺灣麝香鳳蝶', '長尾麝鳳蝶', '鳳蝶科', '雌', '成蟲期', '春', '展翅寬約9公分，底色黑色，後翅有6~7枚明顯的桃紅色斑及狹長的尾突。雌蝶桃紅色斑紋較大。'),
(2, '臺灣麝香鳳蝶', '長尾麝鳳蝶', '鳳蝶科', '雄', '幼蟲期', '夏', '以馬兜鈴科的異葉馬兜鈴、瓜葉馬兜鈴、大葉馬兜鈴及港口馬兜鈴等植物之葉片為食。'),
(3, '臺灣麝香鳳蝶', '長尾麝鳳蝶', '鳳蝶科', '/', '變態期', '秋', '呈淡橘色滿布白色斜紋。'),
(4, '臺灣紋白蝶', '緣點白粉蝶', '粉蝶科', '雄', '成蟲期', '冬', '展翅寬約4.5公分，底色白色，前翅背面翅端黑斑呈鋸齒狀，後翅被面前緣及外緣有一排小黑點。雄蝶前翅背面中央有1枚黑點，雌蝶前翅背面端部黑斑較大，中央有2枚黑點。'),
(5, '臺灣紋白蝶', '緣點白粉蝶', '粉蝶科', '雌', '幼蟲期', '春', '以十字花科的葶藶，焊菜及高麗菜等栽培蔬菜、山柑科的毛瓣蝴蝶木、魚木、白花菜、平伏莖白花菜、醉蝶花等及鐘萼木科的鐘萼木等植物之葉片、花序與果實為食。'),
(6, '臺灣紋白蝶', '緣點白粉蝶', '粉蝶科', '/', '變態期', '春', '呈綠或暗灰褐色，胸腹節間有一尖細的突起。'),
(7, '青斑蝶', '大絹斑蝶', '蛺蝶科', '雄', '成蟲期', '春', '展翅寬約8~10公分，前翅背面底色黑褐色，後翅背面底色紅褐色，前翅基部除翅脈外，為半透明的淡青色，後翅中室有寬大的半透明淡青色斑，中央有1條不明顯的褐色細線文，半透明淡青色斑尖端的2枚斑紋成二叉狀尖突，腹部黑褐色。雄蝶後翅腹面近肛角有1個黑色性斑。'),
(8, '青斑蝶', '大絹斑蝶', '蛺蝶科', '雌', '幼蟲期', '夏', '以蘿摩科的臺灣牛彌菜、絨毛芙蓉蘭、鷗蔓、臺灣牛皮消、薄葉牛皮消及毬蘭等植物之葉片為食。'),
(9, '青斑蝶', '大絹斑蝶', '蛺蝶科', '/', '變態期', '秋', '有多種顏色，綠色、淡藍色，淡褐色等，蛹體並不一定會附著於寄主上，通常吊掛在附近的木柱或牆角等隱密的地方。'),
(10, '埔里波紋小灰蝶', '大娜波灰蝶', '灰蝶科', '雌', '成蟲期', '春', '展翅寬約3公分，後翅有1枚尾突。雄蝶背面為帶金屬光澤的紫灰色，外緣線纖細，雌蝶則有金屬光澤的淡藍色紋，其外側有白紋。翅膀腹面灰色或淺褐色，前後翅中央及近基部各有一組鑲白線的深褐色帶紋，中室端有類似的短條，前翅腹面翅基的帶紋前方有深色斑紋。'),
(11, '埔里波紋小灰蝶', '大娜波灰蝶', '灰蝶科', '雌', '幼蟲期', '春', '以紫金牛科的臺灣山桂花、黑星紫金牛、樹杞、春不老、硃砂根及賽山椒等植物之花苞、新芽與幼葉為食。'),
(12, '埔里波紋小灰蝶', '大娜波灰蝶', '灰蝶科', '/', '變態期', '夏', '蛹為褐色縊蛹，體表具黑褐色小斑點。'),
(13, '竹紅弄蝶', '寬邊橙斑弄蝶', '弄蝶科', '雄', '成蟲期', '春', '展翅寬約3~3.5公分，背面黑褐色，前後翅均有鮮麗的橙黃色縱帶，帶紋外側沿翅脈向外延伸。腹面暗橙色，後翅中央橙色斑帶顏色與周圍差異明顯。雄蝶前翅背面黑褐色斑中有細帶狀黑黃色性斑，性斑偏向翅膀外側。'),
(14, '竹紅弄蝶', '寬邊橙斑弄蝶', '弄蝶科', '雄', '幼蟲期', '春', '以禾本科的棕葉狗尾草、象草、舖地黍及大黍等植物之葉片為食。'),
(15, '竹紅弄蝶', '寬邊橙斑弄蝶', '弄蝶科', '/', '變態期', '夏', '蛹體在葉子內呈淡黃褐色，外觀近長棒狀，後半部逐漸變細，體表白粉蠟質保護防水,無其他花紋。');

-- --------------------------------------------------------

--
-- 資料表結構 `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `b_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `b_stage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `img`
--

INSERT INTO `img` (`id`, `src`, `b_name`, `b_stage`, `date`, `author`) VALUES
(1, '竹紅弄蝶-幼蟲期.jpg', '竹紅弄蝶', '幼蟲期', '2008-09-28', '拍攝者1'),
(2, '竹紅弄蝶-變態期.jpg', '竹紅弄蝶', '變態期', '2012-10-09', '拍攝者3'),
(3, '竹紅弄蝶-成蟲期.jpg', '竹紅弄蝶', '成蟲期', '2006-06-03', '拍攝者2'),
(4, '青斑蝶-幼蟲期.jpg', '青斑蝶', '幼蟲期', '2007-05-13', '拍攝者1'),
(5, '青斑蝶-變態期.jpg', '青斑蝶', '變態期', '2009-10-07', '拍攝者2'),
(6, '青斑蝶-成蟲期.jpg', '青斑蝶', '成蟲期', '2009-05-30', '拍攝者2'),
(7, '埔里波紋小灰蝶-幼蟲期.jpg', '埔里波紋小灰蝶', '幼蟲期', '2003-04-26', '拍攝者1'),
(8, '埔里波紋小灰蝶-變態期.jpg', '埔里波紋小灰蝶', '變態期', '2013-06-15', '拍攝者2'),
(9, '埔里波紋小灰蝶-成蟲期.jpg', '埔里波紋小灰蝶', '幼蟲期', '2014-03-18', '拍攝者3'),
(10, '臺灣紋白蝶-幼蟲期.jpg', '臺灣紋白蝶', '幼蟲期', '2009-03-10', '拍攝者1'),
(11, '臺灣紋白蝶-變態期.jpg', '臺灣紋白蝶', '變態期', '2009-02-17', '拍攝者2'),
(12, '臺灣紋白蝶-成蟲期.jpg', '臺灣紋白蝶', '成蟲期', '2003-07-07', '拍攝者3'),
(13, '臺灣麝香鳳蝶-幼蟲期.jpg', '臺灣麝香鳳蝶', '幼蟲期', '2003-02-13', '拍攝者1'),
(14, '臺灣麝香鳳蝶-變態期.jpg', '臺灣麝香鳳蝶', '變態期', '2009-06-15', '拍攝者2'),
(15, '臺灣麝香鳳蝶-成蟲期.jpg', '臺灣麝香鳳蝶', '成蟲期', '2010-06-19', '拍攝者3');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `uid`, `pwd`, `name`, `level`) VALUES
(1, 'admin', '123', 'manager', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `butterfly`
--
ALTER TABLE `butterfly`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `butterfly`
--
ALTER TABLE `butterfly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
