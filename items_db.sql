-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.10-MariaDB
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `items_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `itemId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品ID',
  `itemName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `itemImg` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品圖片',
  `itemCategoryId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品主類',
  `itemTypeId` int(10) NOT NULL COMMENT '商品子類',
  `itemDescription` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品描述',
  `itemMaterial` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品材質',
  `itemBrandId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品品牌',
  `itemSellerId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品賣家ID',
  `itemStatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active' COMMENT '商品狀態',
  `itemSize` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品規格',
  `itemPrice` int(5) NOT NULL COMMENT '商品價格',
  `itemQty` tinyint(2) NOT NULL COMMENT '商品庫存',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemImg`, `itemCategoryId`, `itemTypeId`, `itemDescription`, `itemMaterial`, `itemBrandId`, `itemSellerId`, `itemStatus`, `itemSize`, `itemPrice`, `itemQty`, `created_at`, `updated_at`) VALUES
('abc234567', 'DIVER - 碳纖維蛙鞋版 海洋之神', '20200115092202.jpg', '蛙鞋', 0, '澳洲頂級自潛/漁獵品牌，\r\n特製調配的環氧樹脂，\r\n航太級碳纖維，\r\n絕妙造成自潛蛙鞋最佳的彈性施力比。\r\n\r\n建議搭配腳套\r\nPathos \r\nS-wing    *(使用此腳套，因無腳套倒水條，腳套邊緣與板子邊條相差約2cm，但不影響使用效果)\r\nMares\r\nLeaderfins', '', '', '', 'active', '2', 13360, 5, '2020-01-15 09:22:02', '2020-01-15 12:11:35'),
('abc456456', 'MOBBY\'S - ACT APNEA COMPETITIO', '20200115121200.jpg', '蛙鞋', 0, '', '', '', '', 'active', '', 11200, 10, '2020-01-15 12:12:00', '2020-01-15 12:13:25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
