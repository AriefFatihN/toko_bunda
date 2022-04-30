-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 01:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_bunda`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Putra', 'L', '087867304204', '', '2021-07-05 22:59:38', NULL),
(2, 'Suparman', 'L', '', '', '2021-07-05 23:01:27', NULL),
(3, 'Gunawan', 'L', '089911106411', '', '2021-07-05 23:01:38', NULL),
(4, 'Dwi Yulia', 'P', '', '', '2021-07-05 23:01:54', NULL),
(5, 'Suminten', 'P', '', '', '2021-07-05 23:02:11', NULL),
(6, 'Susanti', 'P', '', '', '2021-07-05 23:02:27', NULL),
(7, 'Laksmini', 'P', '085739844768', '', '2021-07-05 23:02:48', NULL),
(8, 'Surya', 'L', '085902461191', '', '2021-07-05 23:03:00', NULL),
(9, 'Purnama', 'L', '081267190864', '', '2021-07-05 23:03:15', NULL),
(10, 'Talitha', 'L', '089668079354', '', '2021-07-05 23:03:32', NULL),
(11, 'Sriningsih', 'P', '081730008812 ', '', '2021-07-05 23:03:58', NULL),
(12, 'Bima', 'L', '089978950375', '', '2021-07-05 23:09:28', NULL),
(13, 'Eko', 'L', '', '', '2021-07-05 23:10:08', NULL),
(14, 'Dian', 'P', '', '', '2021-07-05 23:10:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Snack', '2021-07-05 22:31:31', NULL),
(2, 'Kopi', '2021-07-05 22:31:37', NULL),
(3, 'Teh', '2021-07-05 22:31:43', NULL),
(4, 'Susu', '2021-07-05 22:42:06', '2021-07-05 22:42:13'),
(5, 'Sabun Mandi', '2021-07-05 22:42:50', NULL),
(6, 'Shampoo', '2021-07-05 22:42:54', NULL),
(7, 'Body Lotion', '2021-07-05 22:43:02', NULL),
(8, 'Accessories', '2021-07-05 22:44:14', NULL),
(9, 'Obat Nyamuk, Kecoa, dan Semut', '2021-07-05 22:44:21', '2021-08-15 18:58:12'),
(10, 'Bumbu Dapur', '2021-07-05 22:45:37', NULL),
(11, 'Mie Instan', '2021-07-05 22:45:48', NULL),
(12, 'Parfum', '2021-07-05 22:46:15', NULL),
(13, 'Perlengkapan Sekolah', '2021-07-05 22:46:20', NULL),
(14, 'Sabun Muka', '2021-07-05 22:47:30', NULL),
(15, 'Sikat Gigi', '2021-07-05 22:47:34', NULL),
(16, 'Alat Cukur', '2021-07-05 22:47:40', NULL),
(17, 'Ice Cream', '2021-07-05 22:48:05', NULL),
(18, 'Soda', '2021-07-05 22:48:52', NULL),
(19, 'Minuman Kemasan', '2021-07-05 22:48:58', NULL),
(20, 'Pasta Gigi', '2021-07-05 22:50:41', '2021-07-05 22:50:46'),
(21, 'Masker', '2021-07-05 22:51:16', NULL),
(22, 'Skin Care', '2021-07-05 22:51:38', '2021-08-18 21:23:03'),
(23, 'Rokok', '2021-07-05 22:54:12', NULL),
(24, 'Obat-obatan', '2021-07-05 22:55:02', NULL),
(25, 'Roti Kemasan', '2021-07-05 22:55:10', NULL),
(26, 'Pakaian Dalam', '2021-07-05 22:56:42', NULL),
(27, 'Kaos Kaki', '2021-07-05 22:56:48', NULL),
(28, 'Kapas', '2021-07-05 22:57:18', NULL),
(29, 'Tissue', '2021-07-05 22:57:22', '2021-07-05 22:57:29'),
(33, 'Alat Tulis', '2021-08-02 10:34:59', NULL),
(34, 'Detergent', '2021-08-07 17:32:55', NULL),
(35, 'Deodorant', '2021-08-07 17:34:25', NULL),
(36, 'Makanan', '2021-08-07 17:38:47', NULL),
(37, 'Sirup', '2021-08-07 17:49:04', NULL),
(38, 'Pembalut', '2021-08-07 18:00:29', NULL),
(39, 'Antiseptik', '2021-08-07 18:08:38', NULL),
(40, 'Tembakau', '2021-08-15 18:30:55', NULL),
(41, 'Minuman Serbuk', '2021-08-15 19:07:52', NULL),
(42, 'Obat Keras', '2021-08-15 19:59:15', NULL),
(43, 'Pengharum Ruangan', '2021-08-15 20:10:48', NULL),
(44, 'Perekat', '2021-08-15 20:29:03', NULL),
(45, 'Yogurt', '2021-08-15 20:30:59', NULL),
(46, 'Elektronik', '2021-08-15 22:10:22', NULL),
(50, 'Alat Kecantikan', '2021-08-19 10:18:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `batasan_qty` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`item_id`, `barcode`, `name`, `category_id`, `price`, `stock`, `batasan_qty`, `potongan`, `image`, `created`, `updated`) VALUES
(1, '8992741905442', 'Yupi Fruit Cocktails 24g', 1, 4000, 10, 0, 0, NULL, '2021-08-07 17:18:32', NULL),
(2, '8999999706180', 'Pepsodent 190g', 20, 15000, 50, 3, 2000, NULL, '2021-08-07 17:25:52', '2021-08-07 17:26:11'),
(3, '8999999059323', 'Lifebuoy Lemon Fresh', 5, 2500, 19, 5, 1000, NULL, '2021-08-07 17:27:25', NULL),
(4, '8999999033132', 'Lifebuoy Shampoo Rambut Rontok 170ml', 6, 16000, 40, 0, 0, NULL, '2021-08-07 17:28:01', NULL),
(5, '8992759134117', 'NICE Facial Tissue 60 sets 2 ply', 29, 3500, 15, 0, 0, NULL, '2021-08-07 17:29:18', NULL),
(6, '8992856900547', 'Vitalis Perfume Moisturizing Body Wash 450ml', 5, 18000, 8, 0, 0, NULL, '2021-08-07 17:30:35', NULL),
(7, '8993053641103', 'Paseo Cleansing Wipes 25 sheets', 29, 4500, 15, 0, 0, NULL, '2021-08-07 17:31:30', NULL),
(8, '8999999528935', 'Citra Bengkoang Natural Glow UV 120ml', 22, 6000, 24, 0, 0, NULL, '2021-08-07 17:31:56', NULL),
(9, '8998866605816', 'SoKlin Smart Detergent Color Care 800g', 34, 19000, 12, 0, 0, NULL, '2021-08-07 17:33:28', NULL),
(10, '8999999534677', 'Rexona For Girls Glowing', 35, 14000, 24, 0, 0, NULL, '2021-08-07 17:34:47', NULL),
(11, '8999999555481', 'Pond\'s Vitamin Micellar Water 55ml', 22, 10000, 12, 0, 0, NULL, '2021-08-07 17:35:29', NULL),
(12, '8996001410042', 'Tora Bika Tora Mocca', 2, 1000, 110, 10, 1000, NULL, '2021-08-07 17:37:04', NULL),
(13, '8991002101630', 'ABC Kopi Susu 31g', 2, 1000, 118, 10, 1000, NULL, '2021-08-07 17:37:37', NULL),
(14, '8999999000189', 'Taro net Seaweed 36g', 1, 5100, 50, 0, 0, NULL, '2021-08-07 17:38:01', NULL),
(15, '8993110000188', 'Sosis SoNice Sapi 3 Pcs', 36, 8900, 24, 0, 0, NULL, '2021-08-07 17:39:25', NULL),
(16, '8992761147143', 'Sprite Watermelon 425ml', 19, 5000, 23, 0, 0, NULL, '2021-08-07 17:40:20', NULL),
(17, '8996001600221', 'Kopiko 78C Coffee Latte 240ml', 2, 4500, 24, 0, 0, NULL, '2021-08-07 17:42:01', NULL),
(18, '8998866202770', 'Mie Sedaap Goreng Salero Padang 86g', 11, 2700, 55, 10, 2000, NULL, '2021-08-07 17:43:09', NULL),
(19, '089686010947', 'Indomie Instant Goreng 85g', 11, 2600, 77, 10, 2000, NULL, '2021-08-07 17:43:49', NULL),
(20, '089686010046', 'Indomie Instant Rebus Ayam Spesial 68g', 11, 2500, 75, 10, 2000, NULL, '2021-08-07 17:44:26', NULL),
(21, '8888327831253', 'Mie Gaga 100 Extra Pedas Goreng Jalapeno 85', 11, 2800, 75, 5, 1000, NULL, '2021-08-07 17:45:46', NULL),
(22, '8998898842210', 'Sidomuncul Vit C 1000mg 6 Sachet', 24, 7000, 12, 0, 0, NULL, '2021-08-07 17:47:38', NULL),
(23, '8998866604932', 'Daia Lemon 850g', 34, 16500, 12, 0, 0, NULL, '2021-08-07 17:48:51', NULL),
(24, '8997021670089', 'Kartika Melon 620ml', 37, 20000, 12, 0, 0, NULL, '2021-08-07 17:51:04', NULL),
(25, '8998866602570', 'Nuvo Antibacterial Lemon Family Fresh 76g', 5, 2500, 16, 5, 1000, NULL, '2021-08-07 17:52:44', NULL),
(26, '8998866100144', 'Ciptadent Pasta Gigi Maxi 12 Plus 90g', 20, 7000, 24, 0, 0, NULL, '2021-08-07 17:53:34', NULL),
(27, '8999908273307', 'Marina Natural Avocado & Olive Oil Hand Body 335ml', 22, 11000, 24, 0, 0, NULL, '2021-08-07 17:54:33', NULL),
(28, '8993496001076', 'Sania Minyak Goreng 2L', 10, 27500, 12, 0, 0, NULL, '2021-08-07 17:55:31', NULL),
(29, '8998866607872', 'Sabun Krim Ekonomi Putih 174g', 34, 2000, 24, 5, 1000, NULL, '2021-08-07 17:56:22', NULL),
(30, '8998866670722', 'Sabun Krim Wings Biru 174g', 34, 2000, 24, 5, 1000, NULL, '2021-08-07 17:56:56', NULL),
(31, '8993408020980', 'Tepung Roti Mix 200g', 10, 11000, 22, 0, 0, NULL, '2021-08-07 17:57:43', NULL),
(32, '8991188943536', 'Sasa Santan Kelapa 65ml', 10, 4000, 20, 0, 0, NULL, '2021-08-07 17:58:53', NULL),
(33, '8992736925165', 'Sasa Tepung Bumbu Ayam Krispi 210g', 10, 24000, 17, 0, 0, NULL, '2021-08-07 18:00:03', NULL),
(34, '8992727003087', 'Lauriel Relax Night 35cm Wing 6pcs', 38, 8500, 10, 0, 0, NULL, '2021-08-07 18:01:26', NULL),
(35, '8992727000055', 'Lauriel Active Day Super Maxi 10 pcs', 38, 7000, 10, 0, 0, NULL, '2021-08-07 18:02:26', NULL),
(36, '8991038766100', 'Cotton Buds Cinderella 100pcs', 22, 5000, 50, 0, 0, NULL, '2021-08-07 18:03:27', NULL),
(37, '8992796011105', 'Viva Milk Cleanser 100ml', 22, 3000, 10, 0, 0, NULL, '2021-08-07 18:06:44', NULL),
(38, '8998866106320', 'Emeron Lovely White UV 500ml', 22, 16000, 23, 0, 0, NULL, '2021-08-07 18:07:06', NULL),
(39, '8992112014018', 'Neozep Forte Pereda Flu', 24, 3000, 15, 0, 0, NULL, '2021-08-07 18:07:52', NULL),
(40, '8998866605274', 'Nuvo Antibacterial Hand Sanitizer 85ml', 39, 5000, 12, 0, 0, NULL, '2021-08-07 18:09:55', NULL),
(41, '4902430553636', 'Head & Shoulders Lemon Segar+ 160ml', 6, 25000, 0, 0, 0, NULL, '2021-08-15 18:23:30', NULL),
(42, '8992727003537', 'Men\'s Biore Deep Fresh 100g', 14, 24000, 0, 0, 0, NULL, '2021-08-15 18:25:24', NULL),
(43, '8993560027254', 'Dettol Instant Hand Sanitizer ', 39, 24000, 0, 0, 0, NULL, '2021-08-15 18:26:56', NULL),
(44, '8992727003858', 'Biore Guard Body Foam Lively Refresh 100ml', 5, 12500, 0, 0, 0, NULL, '2021-08-15 18:28:51', NULL),
(45, '4902430110778', 'Head & Shoulders Anti-Apek Dengan Charcoal 160ml', 6, 30000, 0, 0, 0, NULL, '2021-08-15 18:29:58', NULL),
(46, '89981092', 'Mars Brand Super Kualitas Import 45g', 40, 15000, 0, 0, 0, NULL, '2021-08-15 18:31:23', NULL),
(47, '8996001600375', 'Le Minerale 330ml', 19, 1500, 0, 24, 2000, NULL, '2021-08-15 18:35:55', NULL),
(48, '8992770084064', 'Sajiku Tepung Bumbu Serba Guna 240g', 10, 5000, 0, 0, 0, NULL, '2021-08-15 18:39:22', NULL),
(49, '8995952008230', 'Morin Selai Coklat Kacang 150g', 10, 29000, 0, 0, 0, NULL, '2021-08-15 18:40:27', NULL),
(50, '110606IN', 'Nutrilite Cal Mag D Suplemen Makanan 180 Tablet', 24, 195000, 0, 0, 0, NULL, '2021-08-15 18:45:51', NULL),
(51, '8993496106504', 'Minyak Goreng Sawit Fortune 1L', 10, 18000, 0, 0, 0, NULL, '2021-08-15 18:47:22', NULL),
(52, '8992717781025', 'Santan Kelapa Sun Kara 65ml', 10, 2000, 0, 0, 0, NULL, '2021-08-15 18:51:13', NULL),
(53, '8994907001302', 'ABC Homestyle Sambal Terasi 20g', 10, 2000, 0, 8, 2000, NULL, '2021-08-15 18:53:41', NULL),
(54, '8886020033431', 'Bagus Kapur Ajaib Anti Kecoa dan Semut 3.5g', 9, 2000, 0, 2, 1000, NULL, '2021-08-15 18:59:37', NULL),
(55, '8997210720625', 'Dapur Kita Cabe Bubuk 5g', 10, 500, 0, 10, 1000, NULL, '2021-08-15 19:00:44', '2021-08-15 19:04:32'),
(56, '8997011930612', 'Ladaku 100% Merica Murni 4g', 10, 1000, 0, 10, 1000, NULL, '2021-08-15 19:02:37', NULL),
(57, '8997210720403', 'Dapur Kita Pala Bubuk 2g', 10, 500, 0, 10, 1000, NULL, '2021-08-15 19:05:35', NULL),
(58, '8998898853100', 'Sidomuncul Susu Jahe 27g', 41, 1500, 0, 10, 2000, NULL, '2021-08-15 19:09:35', NULL),
(59, '8995102703091', 'Mama Suka Bumbu Kuah Bakso Rasa Daging Sapi 8g', 10, 1500, 0, 10, 2000, NULL, '2021-08-15 19:10:53', NULL),
(60, '8997011931565', 'Desaku Kunyit Bubuk 10g', 10, 1000, 0, 10, 1000, NULL, '2021-08-15 19:11:51', NULL),
(61, '7622300761349', 'Oroe Mini Original 62g', 1, 8000, 0, 0, 0, NULL, '2021-08-15 19:14:12', NULL),
(62, '8996001440087', 'Energen Kacang Hijau 30g', 41, 2000, 0, 10, 4000, NULL, '2021-08-15 19:16:16', NULL),
(63, '8997018250218', 'Jahe Merah Herbal AMH 20g', 41, 1000, 0, 10, 1000, NULL, '2021-08-15 19:17:56', NULL),
(64, '8992696523494', 'Nescafe Americano Ice Black 13.5g', 2, 2000, 0, 8, 1000, NULL, '2021-08-15 19:23:17', NULL),
(65, '8991688889334', 'Mie Cap Burung Dara 200g', 11, 10000, 0, 0, 0, NULL, '2021-08-15 19:24:47', NULL),
(66, '8995102703046', 'Mama Suka Bumbu Instan Opor 16g', 10, 2000, 0, 0, 0, NULL, '2021-08-15 19:26:22', NULL),
(67, '8886015212261', 'Arnott\'s Good Time Double Choc 149g', 1, 30000, 0, 0, 0, NULL, '2021-08-15 19:29:13', NULL),
(68, '8991002105676', 'Kapal Api Kopi Susu 31g', 2, 1500, 0, 10, 2000, NULL, '2021-08-15 19:32:16', NULL),
(69, '8999999502409', 'Royco Bumbu Kaldu Rasa Sapi 9g', 10, 1000, 0, 3, 1000, NULL, '2021-08-15 19:35:53', NULL),
(70, '8997207580027', 'Gunung Madu Gula Kristal Putih 1kg', 10, 15000, 0, 0, 0, NULL, '2021-08-15 19:38:49', NULL),
(71, '8992770094513', 'Saori Saus Lada Hitam 26ml', 10, 2500, 0, 10, 2000, NULL, '2021-08-15 19:42:06', NULL),
(72, '8997011931107', 'Desaku Ketumbar Bubuk 15g', 10, 1500, 0, 0, 0, NULL, '2021-08-15 19:44:10', NULL),
(73, '8997210720601', 'Dapur Kita Kencur Bubuk 3g', 10, 500, 0, 0, 0, NULL, '2021-08-15 19:45:38', NULL),
(74, '8999999502393', 'Royco Bumbu Kaldu Rasa Ayam 8g', 10, 1000, 0, 8, 1000, NULL, '2021-08-15 19:48:31', NULL),
(75, 'MB8809718442759', 'Flip Book Renjun ', 33, 13000, 0, 0, 0, NULL, '2021-08-15 20:00:15', NULL),
(76, '8809718445699', 'Flip Book + Photo Card Set Yangyang', 33, 13000, 0, 0, 0, NULL, '2021-08-15 20:00:51', NULL),
(77, '314030086751', 'Buku Batik Cap Gelatik', 33, 30000, 0, 0, 0, NULL, '2021-08-15 20:02:08', NULL),
(78, '2089363', 'Soft Case Yume Mi Note 4 Cyan', 8, 75000, 0, 0, 0, NULL, '2021-08-15 20:03:02', '2021-08-15 20:03:43'),
(79, '2089360', 'Soft Case Yume Mi Note 4 Red', 8, 75000, 0, 0, 0, NULL, '2021-08-15 20:03:31', '2021-08-15 20:03:51'),
(80, '2803154905', 'Case Motif Fashion ', 8, 75000, 0, 0, 0, NULL, '2021-08-15 20:04:44', NULL),
(81, '2089359', 'Soft Case Yume Mi Note 4 Black', 8, 75000, 0, 0, 0, NULL, '2021-08-15 20:05:44', NULL),
(82, '9556174802236', 'Quaker Instant Oatmeal 200g', 36, 15000, 0, 0, 0, NULL, '2021-08-15 20:10:09', NULL),
(83, '8994016006120', 'Pengharum Ruangan Apple 50g', 43, 7000, 0, 0, 0, NULL, '2021-08-15 20:12:28', NULL),
(84, '8992779402203', 'Bay Fresh Hang \'n Go Frozen Lime', 43, 11000, 0, 0, 0, NULL, '2021-08-15 20:14:28', NULL),
(85, '8991102024808', 'Formula Sensitive Active Care Sikat Gigi 3 Pcs', 15, 25000, 0, 0, 0, NULL, '2021-08-15 20:15:56', NULL),
(86, '711844330153', 'ABC Sardines Dalam Saus Extra Pedas 425g', 10, 22500, 0, 0, 0, NULL, '2021-08-15 20:21:13', NULL),
(87, '8991001111289', 'SilverQueen Milk Chocolate with Cashews 28g', 1, 7000, 0, 0, 0, NULL, '2021-08-15 20:26:04', NULL),
(88, '8997014450216', 'Prochiz Gold Cheddar 170g', 10, 17000, 0, 0, 0, NULL, '2021-08-15 20:27:30', NULL),
(89, '8998888461124', 'Maestro Mayonais 180g', 10, 9000, 0, 0, 0, NULL, '2021-08-15 20:28:38', NULL),
(90, '8997016100522', 'Dextone Instant Glue Cyanoacrylate Adhesive 15g', 44, 7000, 0, 0, 0, NULL, '2021-08-15 20:30:03', NULL),
(91, '8993200666942', 'Cimory Squeeze Yogurt Strawberry 120g', 45, 10000, 0, 0, 0, NULL, '2021-08-15 20:31:56', NULL),
(92, '8993200668045', 'Cimory Squeeze Yogurt Aloe Vera 120g', 45, 10000, 0, 0, 0, NULL, '2021-08-15 20:32:23', NULL),
(93, '8993200667390', 'Cimory Squeeze Yogurt Honey 120g', 45, 10000, 0, 0, 0, NULL, '2021-08-15 20:32:45', NULL),
(94, '8992696422735', 'Nestle Danco FortiGro Cokelat 110ml', 19, 5000, 0, 0, 0, NULL, '2021-08-15 20:33:57', NULL),
(95, '8993189700149', 'Charm Extra Comfort Maxi 18+2 Pads', 38, 18000, 0, 0, 0, NULL, '2021-08-15 20:34:59', NULL),
(96, '8851818936805', 'Lauriel Relax Night 30cm Wing 8 Pcs', 38, 18000, 0, 0, 0, NULL, '2021-08-15 20:36:10', NULL),
(97, '8992761164492', 'Nutri Boost Rasa Coklat 200ml', 19, 5000, 0, 0, 0, NULL, '2021-08-15 20:51:13', NULL),
(98, '8992745120254', 'HIT Non Stop Xpress Set', 9, 27000, 0, 0, 0, NULL, '2021-08-15 20:52:54', NULL),
(99, '8992772195089', 'Kispray Violet Anti Kuman 318ml', 12, 12000, 0, 0, 0, NULL, '2021-08-15 21:47:37', NULL),
(100, '8886008101336', 'Aqua Air Mineral 330ml', 19, 1500, 0, 0, 0, NULL, '2021-08-15 21:49:17', NULL),
(101, '8998168002023', 'Minyak Kayu Putih Cap Dragon  100ml', 24, 27000, 0, 0, 0, NULL, '2021-08-15 21:50:29', NULL),
(102, '4970129726517', 'Snowman Permanent Marker Black', 33, 7000, 0, 0, 0, NULL, '2021-08-15 21:51:47', NULL),
(103, '8888103006882', 'Cussons Baby Wipes Almond Oil 50 Sheets', 29, 10000, 0, 0, 0, NULL, '2021-08-15 21:52:50', NULL),
(104, '6924093606373', 'Phoenix Magic Notes 8x25 Sheets Rainbow', 33, 10000, 0, 0, 0, NULL, '2021-08-15 21:53:48', NULL),
(105, '8995077609824', 'Deka Wafer Roll Choco Nut 125g', 1, 12000, 0, 0, 0, NULL, '2021-08-15 21:54:42', NULL),
(106, '8991038111757', 'Selection Facial Cotton Kapas Kecantikan', 22, 7000, 0, 0, 0, NULL, '2021-08-15 22:07:45', NULL),
(107, '8991038775416', 'Selection Cottod Bud 180 Pcs', 22, 8500, 0, 0, 0, NULL, '2021-08-15 22:08:52', NULL),
(108, '8888103006974', 'Cussons Baby Cotton Buds Extra Fine 100 Pcs', 22, 5500, 0, 0, 0, NULL, '2021-08-15 22:09:43', NULL),
(109, '8887549599491', 'Panasonic AAA Remote Control Battery 4 Pcs', 46, 17500, 0, 0, 0, NULL, '2021-08-15 22:11:03', NULL),
(110, '8999909085114', 'Sampoerna Kretek 12 Btg', 23, 13000, 0, 0, 0, NULL, '2021-08-15 22:13:02', NULL),
(111, '8999909028234', 'Dji Sam Soe Kretek 12', 23, 16000, 0, 0, 0, NULL, '2021-08-15 22:13:54', NULL),
(112, '8999909096004', 'Sampoerna Mild Filter 16', 23, 19000, 0, 0, 0, NULL, '2021-08-15 22:14:45', NULL),
(113, '89686600247', 'Cheetos Jagung Bakar 40g', 1, 4000, 0, 0, 0, NULL, '2021-08-15 22:15:30', NULL),
(114, '89686600049', 'Cheetos Ayam Bakar 40g', 1, 6000, 0, 0, 0, NULL, '2021-08-15 22:16:19', NULL),
(116, '8998866200301', 'Mie Sedaap Instant Goreng 90g', 11, 2500, 28, 5, 1500, NULL, '2021-08-19 09:17:58', NULL),
(118, '8998824551650', 'Swana Brightening Body Lotion Peach 100ml', 50, 17000, 19, 0, 0, NULL, '2021-08-19 10:49:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Swalayan Ada Pati', '+62295385295', 'Jl. Pemuda No.302 A, Cengkok, Sidoharjo, Kec. Pati, Kabupaten Pati, Jawa Tengah 59117', '', '2021-07-05 23:26:01', NULL),
(2, 'Luwes Pati', '', 'Jl. Dr. Sutomo No.26, Pati Kidul, Kec. Pati, Kabupaten Pati, Jawa Tengah 59114', '', '2021-07-05 23:26:34', NULL),
(3, 'Toko Plastik Mulia', '', 'Jl. Dr. Sutomo 38, Pati Kidul, Kec. Pati, Kabupaten Pati, Jawa Tengah 59114', '', '2021-07-05 23:27:57', NULL),
(4, 'Pasar Beras Pati', '', 'Semampir, Kec. Pati, Kabupaten Pati, Jawa Tengah 59116', '', '2021-07-05 23:28:53', NULL),
(5, 'Domingo Parfum', '+6285641453700', 'Jl. Kembang Joyo No.33, Klegen, Kalidoro, Kec. Pati, Kabupaten Pati, Jawa Tengah 59117', '', '2021-07-05 23:30:47', NULL),
(6, 'Daily Make Up & Skincare Store', '', 'Jl. Tunggul Wulung, Puri, Kec. Pati, Kabupaten Pati, Jawa Tengah 59113', '', '2021-07-05 23:32:20', NULL),
(8, 'Usaha Abadi Jaya', '087867304204', 'Pati', 'Toko Alat Sekolah', '2021-08-02 10:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_cart`
--

CREATE TABLE `transaction_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_sales`
--

CREATE TABLE `transaction_sales` (
  `sales_id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount_sale` int(11) NOT NULL,
  `discount_all` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_sales`
--

INSERT INTO `transaction_sales` (`sales_id`, `invoice`, `customer_id`, `total_price`, `discount_sale`, `discount_all`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(4, 'BUNDA1808210001', NULL, 20300, 300, 300, 20000, 20000, 0, '', '2021-08-18', 1, '2021-08-18 21:52:06'),
(5, 'BUNDA1808210002', NULL, 16000, 0, 1000, 15000, 15000, 0, '', '2021-08-18', 1, '2021-08-18 21:52:40'),
(6, 'BUNDA1808210003', NULL, 13500, 500, 500, 13000, 15000, 2000, '', '2021-08-18', 1, '2021-08-18 21:53:08'),
(7, 'BUNDA1805210001', NULL, 17500, 500, 1500, 16000, 20000, 4000, '', '2021-05-18', 1, '2021-05-18 21:53:39'),
(8, 'BUNDA1808210004', NULL, 10000, 0, 1000, 9000, 10000, 1000, '', '2021-08-18', 6, '2021-08-18 22:03:16'),
(10, 'BUNDA1908210001', NULL, 17000, 0, 0, 17000, 20000, 3000, '', '2021-08-19', 1, '2021-08-19 10:52:41');

--
-- Triggers `transaction_sales`
--
DELIMITER $$
CREATE TRIGGER `del_detail` AFTER DELETE ON `transaction_sales` FOR EACH ROW BEGIN
	DELETE FROM transaction_sales_detail
    WHERE sales_id = OLD.sales_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_sales_detail`
--

CREATE TABLE `transaction_sales_detail` (
  `detail_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_sales_detail`
--

INSERT INTO `transaction_sales_detail` (`detail_id`, `sales_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(5, 4, 20, 2500, 5, 2000, 12500),
(6, 4, 19, 2600, 3, 2000, 7800),
(7, 5, 13, 1000, 2, 1000, 2000),
(8, 5, 21, 2800, 5, 1000, 14000),
(9, 6, 18, 2700, 5, 2000, 13500),
(10, 7, 16, 5000, 1, 0, 5000),
(11, 7, 3, 2500, 5, 1000, 12500),
(12, 8, 12, 1000, 10, 1000, 10000),
(14, 10, 118, 17000, 1, 0, 17000);

--
-- Triggers `transaction_sales_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `transaction_sales_detail` FOR EACH ROW BEGIN
	UPDATE product_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_return` AFTER DELETE ON `transaction_sales_detail` FOR EACH ROW BEGIN
	UPDATE product_item SET stock = stock + OLD.qty
    WHERE item_id = OLD.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_stock`
--

CREATE TABLE `transaction_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('In','Out') NOT NULL,
  `detail` varchar(50) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_stock`
--

INSERT INTO `transaction_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 20, 'In', 'Kulakan', 2, 80, '2021-08-07', '2021-08-07 18:15:05', 1),
(2, 19, 'In', 'Kulakan', 2, 80, '2021-08-07', '2021-08-07 18:15:21', 1),
(3, 21, 'In', 'Kulakan', 2, 80, '2021-08-07', '2021-08-07 18:15:33', 1),
(4, 13, 'In', 'Kulakan', 1, 120, '2021-08-07', '2021-08-07 18:16:37', 1),
(5, 36, 'In', 'Kulakan', 2, 50, '2021-08-07', '2021-08-07 18:17:00', 1),
(6, 32, 'In', 'Kulakan', 8, 20, '2021-08-07', '2021-08-07 18:18:42', 1),
(7, 39, 'In', 'Kulakan', 2, 15, '2021-08-07', '2021-08-07 18:19:29', 1),
(8, 35, 'In', 'Kulakan', 2, 10, '2021-08-07', '2021-08-07 18:19:51', 1),
(9, 34, 'In', 'Kulakan', 8, 10, '2021-08-07', '2021-08-07 18:20:05', 1),
(10, 33, 'In', 'Kulakan', 2, 5, '2021-08-07', '2021-08-07 18:20:18', 1),
(11, 1, 'In', 'Kulakan', 2, 10, '2021-08-07', '2021-08-07 18:20:37', 1),
(12, 5, 'In', 'Kulakan', 2, 15, '2021-08-07', '2021-08-07 18:20:57', 1),
(14, 16, 'In', 'Kulakan', 2, 24, '2021-08-07', '2021-08-07 18:22:09', 1),
(15, 37, 'In', 'Kulakan', 6, 10, '2021-08-07', '2021-08-07 18:22:26', 1),
(16, 6, 'In', 'Kulakan', 5, 8, '2021-08-07', '2021-08-07 18:22:44', 1),
(17, 7, 'In', 'Kulakan', 2, 15, '2021-08-07', '2021-08-07 18:23:05', 1),
(18, 15, 'In', 'Kulakan', 1, 24, '2021-08-07', '2021-08-07 18:24:15', 1),
(19, 31, 'In', 'Kulakan', 1, 6, '2021-08-07', '2021-08-07 18:24:33', 1),
(20, 28, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:25:40', 1),
(21, 12, 'In', 'Kulakan', 1, 120, '2021-08-07', '2021-08-07 18:26:34', 1),
(22, 17, 'In', 'Restock', 1, 24, '2021-08-07', '2021-08-07 18:26:48', 1),
(23, 24, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:27:14', 1),
(24, 26, 'In', 'Kulakan', 1, 24, '2021-08-07', '2021-08-07 18:27:40', 1),
(25, 38, 'In', 'Restock', 6, 23, '2021-08-07', '2021-08-07 18:28:33', 1),
(26, 18, 'In', 'Restock', 8, 60, '2021-08-07', '2021-08-07 18:30:20', 1),
(27, 25, 'In', 'Restock', 6, 16, '2021-08-07', '2021-08-07 18:31:00', 1),
(28, 23, 'In', 'Kulakan', 2, 12, '2021-08-07', '2021-08-07 18:32:30', 1),
(29, 40, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:32:41', 1),
(30, 9, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:32:59', 1),
(31, 29, 'In', 'Restock', 1, 24, '2021-08-07', '2021-08-07 18:33:16', 1),
(32, 30, 'In', 'Kulakan', 1, 24, '2021-08-07', '2021-08-07 18:34:26', 1),
(33, 22, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:34:52', 1),
(34, 27, 'In', 'Restock', 6, 24, '2021-08-07', '2021-08-07 18:35:10', 1),
(35, 14, 'In', 'Kulakan', 1, 50, '2021-08-07', '2021-08-07 18:35:32', 1),
(36, 4, 'In', 'Restock', 2, 40, '2021-08-07', '2021-08-07 18:35:50', 1),
(37, 3, 'In', 'Kulakan', 2, 24, '2021-08-07', '2021-08-07 18:36:07', 1),
(38, 8, 'In', 'Kulakan', 6, 24, '2021-08-07', '2021-08-07 18:36:20', 1),
(39, 10, 'In', 'Restock', 6, 24, '2021-08-07', '2021-08-07 18:36:46', 1),
(40, 11, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:37:05', 1),
(41, 2, 'In', 'Kulakan', 1, 50, '2021-08-07', '2021-08-07 18:38:57', 1),
(42, 33, 'In', 'Kulakan', 1, 12, '2021-08-07', '2021-08-07 18:39:14', 1),
(43, 31, 'In', 'Kulakan', 2, 16, '2021-08-07', '2021-08-07 18:39:37', 1),
(44, 115, 'In', 'Belanja', 6, 24, '2021-08-18', '2021-08-18 21:31:42', 1),
(45, 115, 'Out', 'Rusak', NULL, 2, '2021-08-18', '2021-08-18 21:32:39', 1),
(46, 116, 'In', 'Belanja', 2, 30, '2021-08-19', '2021-08-19 10:20:09', 1),
(47, 116, 'Out', 'Rusak', NULL, 2, '2021-08-19', '2021-08-19 10:22:44', 1),
(48, 118, 'In', 'Belanja', 6, 20, '2021-08-19', '2021-08-19 10:51:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` int(2) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Arief Fatih Naufal', 'Semarang', 1),
(2, 'shila', '70b701a1699620631a7923e7d470a5b423295c88', 'Shila', 'Semarang\r\n', 1),
(10, 'badul', 'c17876773841b34ef3e674179023d6c3a9f15c22', 'Badul', 'Pati', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transaction_cart`
--
ALTER TABLE `transaction_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_sales`
--
ALTER TABLE `transaction_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `transaction_sales_detail`
--
ALTER TABLE `transaction_sales_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `transaction_stock`
--
ALTER TABLE `transaction_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_sales`
--
ALTER TABLE `transaction_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_sales_detail`
--
ALTER TABLE `transaction_sales_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction_stock`
--
ALTER TABLE `transaction_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
