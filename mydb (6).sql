-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2024 at 06:11 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandID`, `brandName`) VALUES
(1, 'nike'),
(2, 'puma'),
(3, 'adidas'),
(4, 'converse'),
(5, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderItemsID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderItemsID`, `quantity`, `sizeID`, `userID`) VALUES
(9, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(255) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `brandID` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `prodImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prodName`, `brandID`, `price`, `prodImage`) VALUES
(1, 'AIRFORCE1\'07', 1, 4300, 'uploads\\NIKEAIRFORCE1\'07_4300.png'),
(2, 'AIRFORCE1\'07FLYEASY', 1, 4300, 'uploads\\NIKEAIRFORCE1\'07FLYEASE_4300.png'),
(3, 'AIRJORDAN1RETROLOWOGPSG', 1, 5700, 'uploads\\NikeAIRJORDAN1RETROLOWOGPSG_5700.png'),
(4, 'AIRMAXDN', 1, 5700, 'uploads\\NIKEAIRMAXDN_5700.png'),
(5, 'CORTEZ', 1, 4300, 'uploads\\NIKEDUNKLOWRETRO_3700.png'),
(6, 'DUNKLOWRETRO', 1, 3700, 'uploads\\NIKEDUNKLOWRETRO_3700.png'),
(7, 'JORDANTATUM3PF', 1, 4900, 'uploads\\NIKEJORDANTATUM3PF_4900.png'),
(8, 'P-6000', 1, 4300, 'uploads\\NIKEP-6000_4300.png'),
(9, 'ANJUN', 1, 2100, 'uploads\\NIKETANJUN_2100.png'),
(10, 'ZOOMVOMERO5', 1, 6000, 'uploads\\NIKEZOOMVOMERO5_6000.png'),
(11, 'AdizeroSl2', 3, 4500, 'uploads\\AdidasAdizeroSl2_4500.avif'),
(12, 'Forum_Low', 3, 3600, 'uploads\\AdidasForum_Low_3600.avif'),
(13, 'Grand_Court_Base_2.0', 3, 2100, 'uploads\\AdidasGrand_Court_Base_2.0_2100.avif'),
(14, 'NMD_R1', 3, 5500, 'uploads\\AdidasNMD_R1_5500.avif'),
(15, 'Samba', 3, 3800, 'uploads\\AdidasSamba_3800.avif'),
(16, 'StanSmith', 3, 4000, 'uploads\\AdidasStanSmith_4000.avif'),
(17, 'SUPERSTAR82', 3, 5000, 'uploads\\AdidasSUPERSTAR82_5000.avif'),
(18, 'Ultraboost_5x', 3, 6500, 'uploads\\AdidasUltraboost_5x_6500.avif'),
(19, 'Ultraboost1.0', 3, 6500, 'uploads\\AdidasUltraboost1.0_6500.avif'),
(20, 'Handball_Spezial', 3, 3800, 'uploads\\AdidasHandball_Spezial_3800.avif'),
(21, 'Shuffle', 2, 2500, 'uploads\\Puma-Shuffle_2500.avif'),
(22, 'x-SPONGEBOB-Rider-FV', 2, 4500, 'uploads\\PUMA-x-SPONGEBOB-Rider-FV_4500.avif'),
(23, 'AllDayActive', 2, 2200, 'uploads\\PumaAllDayActive_2200.avif'),
(24, 'ClubZone', 2, 2000, 'uploads\\PumaClubZone_2000.avif'),
(25, 'Playmaker-Core', 2, 2900, 'uploads\\PumaPlaymaker-Core_2900.avif'),
(26, 'RBDGameTapeLow', 2, 2900, 'uploads\\PumaRBDGameTapeLow_2900.avif'),
(27, 'Rebound-Lay-Up-Lo-SL', 2, 2500, 'uploads\\PumaRebound-Lay-Up-Lo-SL_2500.avif'),
(28, 'RX737TheNeverWornII', 2, 4000, 'uploads\\PumaRX737TheNeverWornII_4000.avif'),
(29, 'Smashv2', 2, 2500, 'uploads\\PumaSmashv2_2500.avif'),
(30, 'xPALOMOSlipstreamLo', 2, 55000, 'uploads\\PUMAxPALOMOSlipstreamLo_5500.avif'),
(31, 'Chuck 70 AT-CX Future Comfort Hi', 4, 3700, 'uploads\\Converse Chuck 70 AT-CX Future Comfort Hi_3700.jpg'),
(32, 'Chuck Taylor All Star Malden Street', 4, 2500, 'uploads\\Converse Chuck Taylor All Star Malden Street_2500.jpg'),
(33, 'El Distrito 2.0 Canvas', 4, 2000, 'uploads\\Converse El Distrito 2.0 Canvas_2000.png'),
(34, 'One Star Academy Pro', 4, 3500, 'uploads\\Converse One Star Academy Pro_3500.png'),
(35, 'Star Player 76 Canvas', 4, 3000, 'uploads\\Converse Star Player 76 Canvas_3000.jpg'),
(36, 'Chuck70', 4, 3400, 'uploads\\ConverseChuck70_3400.png'),
(37, 'ChuckTaylorAkkstarCanvas', 4, 2300, 'uploads\\ConverseChuckTaylorAkkstarCanvas_2300.png'),
(38, 'ChuckTaylorAllstarClassic Hi', 4, 2500, 'uploads\\ConverseChuckTaylorAllstarClassic Hi_2500.png'),
(39, 'JackPurcellCanvas', 4, 2600, 'uploads\\ConverseJackPurcellCanvas_2600.png'),
(40, 'Star Motion Canvas Platform', 4, 3700, 'uploads\\ConverseRun Star Motion Canvas Platform_3700.jpg'),
(41, 'Baya Clog', 5, 2190, 'uploads\\Crocs Baya Clog_2190.webp'),
(42, 'Baya Marbled Clog', 5, 2390, 'uploads\\Crocs Baya Marbled Clog_2390.webp'),
(43, 'Bayaband Clog', 5, 2390, 'uploads\\Crocs Bayaband Clog_2390.webp'),
(44, 'Brooklyn Buckle Low Wedge', 5, 2790, 'uploads\\Crocs Brooklyn Buckle Low Wedge_2790.webp'),
(45, 'Classic Clog', 5, 2190, 'uploads\\Crocs Classic Clog_2190.webp'),
(46, 'Newbalance530', 5, 1758, 'uploads\\Newbalance530_1758.webp'),
(47, 'ADDA 2Density', 5, 455, 'uploads\\ADDA 2Density_455.jpeg'),
(48, 'BATA RED LABEL AMY AND LEE', 5, 1299, 'uploads\\BATA RED LABEL AMY AND LEE_1299.jpg'),
(49, 'changdao nature', 5, 109, 'uploads\\changdao natureสีฟ้า_109.png'),
(50, 'FilaDisruptor II Premium', 5, 1790, 'uploads\\FilaDisruptor II Premium_1790.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `prodID` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`prodID`, `size`, `stock`, `sizeID`) VALUES
(1, 38, 8, 1),
(1, 39, 10, 2),
(1, 40, 10, 3),
(1, 41, 10, 4),
(1, 42, 10, 5),
(1, 43, 10, 6),
(2, 38, 10, 7),
(2, 39, 10, 8),
(2, 40, 10, 9),
(2, 41, 10, 10),
(2, 42, 10, 11),
(2, 43, 10, 12),
(3, 38, 10, 13),
(3, 39, 10, 14),
(4, 40, 10, 15),
(4, 41, 10, 16),
(4, 42, 10, 17),
(4, 43, 10, 18),
(5, 38, 10, 19),
(5, 39, 10, 20),
(5, 40, 10, 21),
(5, 41, 10, 22),
(5, 42, 10, 23),
(5, 43, 10, 24),
(6, 38, 10, 25),
(6, 39, 10, 26),
(6, 40, 10, 27),
(6, 41, 10, 28),
(7, 42, 10, 29),
(7, 43, 10, 30),
(7, 38, 10, 31),
(7, 39, 10, 32),
(7, 40, 10, 33),
(7, 41, 10, 34),
(7, 42, 10, 35),
(7, 43, 10, 36),
(8, 38, 10, 37),
(8, 39, 10, 38),
(8, 40, 10, 39),
(8, 41, 10, 40),
(8, 42, 10, 41),
(8, 43, 10, 42),
(9, 38, 10, 43),
(9, 39, 10, 44),
(9, 40, 10, 45),
(9, 41, 10, 46),
(9, 42, 10, 47),
(9, 43, 10, 48),
(10, 38, 10, 49),
(10, 39, 10, 50),
(10, 40, 10, 51),
(10, 41, 10, 52),
(10, 42, 10, 53),
(10, 43, 10, 54),
(11, 38, 10, 55),
(11, 39, 10, 56),
(11, 40, 10, 57),
(11, 41, 10, 58),
(11, 42, 10, 59),
(11, 43, 10, 60),
(12, 38, 10, 61),
(12, 39, 10, 62),
(12, 40, 10, 63),
(12, 41, 10, 64),
(12, 42, 10, 65),
(12, 43, 10, 66),
(13, 38, 10, 67),
(13, 39, 10, 68),
(13, 40, 10, 69),
(13, 41, 10, 70),
(13, 42, 10, 71),
(13, 43, 10, 72),
(14, 38, 10, 73),
(14, 39, 10, 74),
(14, 40, 10, 75),
(14, 41, 10, 76),
(14, 42, 10, 77),
(14, 43, 10, 78),
(15, 38, 10, 79),
(15, 39, 10, 80),
(15, 40, 10, 81),
(15, 41, 10, 82),
(15, 42, 10, 83),
(15, 43, 10, 84),
(16, 40, 10, 85),
(16, 41, 10, 86),
(16, 42, 10, 87),
(16, 43, 10, 88),
(17, 40, 10, 89),
(17, 41, 10, 90),
(17, 42, 10, 91),
(17, 43, 10, 92),
(18, 40, 10, 93),
(18, 41, 10, 94),
(18, 42, 10, 95),
(18, 43, 10, 96),
(19, 40, 10, 97),
(19, 41, 10, 98),
(19, 42, 10, 99),
(19, 43, 10, 100),
(20, 40, 10, 101),
(20, 41, 10, 102),
(20, 42, 10, 103),
(20, 43, 10, 104),
(21, 40, 10, 105),
(21, 41, 10, 106),
(21, 42, 10, 107),
(21, 43, 10, 108),
(22, 40, 10, 109),
(22, 41, 10, 110),
(22, 42, 10, 111),
(22, 43, 10, 112),
(23, 40, 10, 113),
(23, 41, 10, 114),
(23, 42, 10, 115),
(23, 43, 10, 116),
(24, 40, 10, 117),
(24, 41, 10, 118),
(24, 42, 10, 119),
(24, 43, 10, 120),
(25, 40, 10, 121),
(25, 41, 10, 122),
(25, 42, 10, 123),
(25, 43, 10, 124),
(26, 38, 10, 125),
(26, 39, 10, 126),
(26, 40, 10, 127),
(27, 38, 10, 128),
(27, 39, 10, 129),
(27, 40, 10, 130),
(28, 38, 10, 131),
(28, 39, 10, 132),
(28, 40, 10, 133),
(29, 38, 10, 134),
(29, 39, 10, 135),
(29, 40, 10, 136),
(30, 38, 10, 137),
(30, 39, 10, 138),
(30, 40, 10, 139),
(31, 38, 10, 140),
(31, 39, 10, 141),
(31, 40, 10, 142),
(32, 38, 10, 143),
(32, 39, 10, 144),
(32, 40, 10, 145),
(33, 38, 10, 146),
(33, 39, 10, 147),
(33, 40, 10, 148),
(34, 39, 10, 149),
(34, 40, 10, 150),
(34, 41, 10, 151),
(35, 38, 10, 152),
(35, 39, 10, 153),
(35, 40, 10, 154),
(36, 38, 10, 155),
(36, 39, 10, 156),
(36, 40, 10, 157),
(37, 38, 10, 158),
(37, 39, 10, 159),
(37, 40, 10, 160),
(38, 38, 10, 161),
(38, 39, 10, 162),
(38, 40, 10, 163),
(39, 38, 10, 164),
(39, 39, 10, 165),
(39, 40, 10, 166),
(40, 38, 10, 167),
(40, 39, 10, 168),
(40, 40, 10, 169),
(41, 38, 10, 170),
(41, 39, 10, 171),
(41, 40, 10, 172),
(42, 38, 10, 173),
(42, 39, 10, 174),
(42, 40, 10, 175),
(43, 38, 10, 176),
(43, 39, 10, 177),
(43, 40, 10, 178),
(44, 38, 10, 179),
(44, 41, 10, 180),
(44, 42, 10, 181),
(45, 38, 10, 182),
(45, 39, 10, 183),
(45, 40, 10, 184),
(46, 38, 10, 185),
(46, 39, 10, 186),
(46, 40, 10, 187),
(47, 38, 10, 188),
(47, 39, 10, 189),
(47, 40, 10, 190),
(48, 38, 10, 191),
(48, 39, 10, 192),
(48, 40, 10, 193),
(49, 38, 10, 194),
(49, 39, 10, 195),
(49, 40, 10, 196),
(50, 38, 10, 197),
(50, 39, 10, 198),
(50, 40, 10, 199);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin_user', 'admin@example.com', '12345678', 'admin'),
(2, 'regular_user', 'user@example.com', '12345678', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderItemsID`),
  ADD KEY `sizeID` (`sizeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `brandID` (`brandID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderItemsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_3` FOREIGN KEY (`sizeID`) REFERENCES `sizes` (`sizeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderitems_ibfk_4` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brandID`) REFERENCES `brands` (`brandID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
