-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2019 at 10:45 PM
-- Server version: 5.5.59-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adananav_navisit`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `product_id` int(11) NOT NULL,
  `product_screen` varchar(50) NOT NULL,
  `product_os` varchar(50) NOT NULL,
  `product_storage` varchar(50) NOT NULL,
  `product_cpu` varchar(50) NOT NULL,
  `product_ram` varchar(50) NOT NULL,
  `product_detail` text NOT NULL,
  `product_picture1` varchar(100) NOT NULL,
  `product_picture2` varchar(100) NOT NULL,
  `product_picture3` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`product_id`, `product_screen`, `product_os`, `product_storage`, `product_cpu`, `product_ram`, `product_detail`, `product_picture1`, `product_picture2`, `product_picture3`) VALUES
(1, '7\"', 'Android', '16 GB', 'Quad Core', '1 GB', 'Araç Uyumlulu?u\r\n:	Astra-Corsa-Vectra-Combo\r\n??letim Sistemi\r\n:	Android 7.1.2 Nougat\r\n??lemci\r\n:	Cortex A9 4 Çekirdek\r\nRAM\r\n:	1 Gb\r\nHaf?za\r\n:	16 Gb\r\nEkran\r\n:	7 Inch HD Dokunmatik Panel\r\nÇözünürlük\r\n:	1024x600\r\nAç?l?? Logosu\r\n:	Orjinal marka logosu ile aç?lma\r\nDireksiyon Kumanda Deste?i\r\n:	Var\r\nDVD\r\n:	Var\r\nBluetooth\r\n:	Var\r\nDahili Mikrofon\r\n:	Var\r\nTelefon Rehberi Aktarma\r\n:	Var\r\nUSB\r\n:	Var\r\nSD Kart\r\n:	Var\r\nRadyo\r\n:	18 Kanal Haf?zas? Am/FM\r\nSes Ç?k???\r\n:	4x45 watt surround stero\r\nEQ\r\n:	10 band grafik\r\nGeri Görü? Kameras?\r\n:	Var\r\nGPS\r\n:	Var\r\nVideo Format\r\n:	1080p / AVI, MKV, MP4, WMV, RMVB, MPG\r\nSes Format\r\n:	MP3, WMA, WAV, AC3, OGG, FLAC\r\nResim Biçimleri\r\n:	JPEG, BMP, PNG, TIFF\r\nWi-fi\r\n:	Var\r\nAmfi Ç?k???\r\n:	4 Kanal\r\nGaranti\r\n:	2 Y?l', 'upload/pictures/fc920304a5.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `title`, `picture`) VALUES
(1, 'Cyclone', 'upload/pictures/740dfa5434.png'),
(2, 'Necvox', 'upload/pictures/1215d34941.png'),
(3, 'Naviin', 'upload/pictures/169a68f061.png'),
(4, 'Convex', 'upload/pictures/d549ba895d.png'),
(5, 'Universal', 'upload/pictures/fc2d3f234a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cars`
--

CREATE TABLE `tbl_cars` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cars`
--

INSERT INTO `tbl_cars` (`id`, `title`, `picture`) VALUES
(1, 'Opel', 'upload/pictures/4e62d376a3.png'),
(2, 'BMW', 'upload/pictures/0fccc60f40.png'),
(3, 'Mercedes', 'upload/pictures/3236c4ae6c.png'),
(4, 'volkswagen', 'upload/pictures/c6723c2b42.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_brand` varchar(150) NOT NULL,
  `product_compatible_car` varchar(100) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_enabled` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_name`, `product_brand`, `product_compatible_car`, `product_stock`, `product_enabled`) VALUES
(1, 'Multimedya Navigasyon Sistemi Vectra*Astra*Corsa*Combo', 'Convex', 'Opel', 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(34) NOT NULL,
  `pass` varchar(34) NOT NULL,
  `permission` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `pass`, `permission`) VALUES
(1, '9db3f02f0826b7027a9691b4b88fed0e', '9db3f02f0826b7027a9691b4b88fed0e', 1),
(2, '', '', 0),
(3, '9db3f02f0826b7027a9691b4b88fed0e', '9db3f02f0826b7027a9691b4b88fed0e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
