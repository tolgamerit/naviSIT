-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2019 at 06:31 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navisit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_araba`
--

CREATE TABLE `tbl_araba` (
  `id` int(11) NOT NULL,
  `baslik` varchar(150) NOT NULL,
  `araba` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_araba`
--

INSERT INTO `tbl_araba` (`id`, `baslik`, `araba`) VALUES
(1, 'Opel', 'upload/pictures/4e62d376a3.png'),
(2, 'BMW', 'upload/pictures/0fccc60f40.png'),
(3, 'Mercedes', 'upload/pictures/3236c4ae6c.png'),
(4, 'volkswagen', 'upload/pictures/c6723c2b42.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kullanici`
--

CREATE TABLE `tbl_kullanici` (
  `id` int(11) NOT NULL,
  `kullanici` varchar(34) NOT NULL,
  `parola` varchar(34) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kullanici`
--

INSERT INTO `tbl_kullanici` (`id`, `kullanici`, `parola`) VALUES
(1, '9db3f02f0826b7027a9691b4b88fed0e', '9db3f02f0826b7027a9691b4b88fed0e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marka`
--

CREATE TABLE `tbl_marka` (
  `id` int(11) NOT NULL,
  `baslik` varchar(150) NOT NULL,
  `resim` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marka`
--

INSERT INTO `tbl_marka` (`id`, `baslik`, `resim`) VALUES
(1, 'Cyclone', 'upload/pictures/740dfa5434.png'),
(2, 'Necvox', 'upload/pictures/1215d34941.png'),
(3, 'Naviin', 'upload/pictures/169a68f061.png'),
(4, 'Convex', 'upload/pictures/d549ba895d.png'),
(5, 'Universal', 'upload/pictures/fc2d3f234a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_urun`
--

CREATE TABLE `tbl_urun` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_marka` varchar(150) NOT NULL,
  `urun_uyumlu_araba` varchar(100) NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_urun`
--

INSERT INTO `tbl_urun` (`id`, `urun_adi`, `urun_marka`, `urun_uyumlu_araba`, `urun_stok`, `urun_durum`) VALUES
(1, 'deneme', 'Convex', 'Opel', 1, 1),
(2, 'VOLKSWAGEN 8`` NVN 503', 'Cyclone', 'volkswagen', 54, 0),
(3, 'BMW E 90 NVN 518', 'Cyclone', 'Mercedes', 70, 1),
(4, 'Mercedes B Class – 9 İnç DVD ve Multimedya Sistemi', 'Cyclone', 'Mercedes', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `urun_ozellikler`
--

CREATE TABLE `urun_ozellikler` (
  `urun_id` int(11) NOT NULL,
  `urun_ekran` varchar(50) NOT NULL,
  `urun_sistem` varchar(50) NOT NULL,
  `urun_depolama` varchar(50) NOT NULL,
  `urun_cpu` varchar(50) NOT NULL,
  `urun_ram` varchar(50) NOT NULL,
  `urun_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_resim1` varchar(100) DEFAULT NULL,
  `urun_resim2` varchar(100) DEFAULT NULL,
  `urun_resim3` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urun_ozellikler`
--

INSERT INTO `urun_ozellikler` (`urun_id`, `urun_ekran`, `urun_sistem`, `urun_depolama`, `urun_cpu`, `urun_ram`, `urun_detay`, `urun_resim1`, `urun_resim2`, `urun_resim3`) VALUES
(1, '5\"', 'Windows CE', '4 GB', 'Dual Core', '512 MB', '1', '/upload/pictures/fc920304a5.jpg', '', ''),
(2, '8\"', 'Windows CE', '4 GB', 'Dual Core', '1 GB', '* Dijital 800xRGBx480 TFT monitör\r\n\r\n* Dokunmatik ekran\r\n\r\n* MP3 / MP4 / WMA / DVD / DVD-R / VCD / CD / CD-R\r\n\r\n* CD-RW / DivX vb. uyumlu\r\n\r\n* Grafikli kullanıcı arayüzü\r\n\r\n* 8 çeşit seçilebilir duvar kağıdı\r\n\r\n* SD kart ve USB\r\n\r\n* Oyun\r\n\r\n* Hesap makinası fonksiyonu\r\n\r\n* Direksiyon kumandası\r\n\r\n* Floresan ışıklı tam fonksiyonlu\r\n\r\n* OSD uzaktan kumanda\r\n\r\n* 30 istasyon hafızalı FM / AM stereo alıcı\r\n\r\n* 4x45 watt amfi\r\n\r\n* Gerçek zamanlı saat fonksiyonu\r\n\r\n* 2 video çıkışı, 4 ses çıkışı, 2 video girişi, 2 ses girişi\r\n\r\n* Elektronik ve mekanik antişok system\r\n\r\n* Otomatik arka görüntüleme fonksiyonu\r\n\r\n* Manuel fren kapanış ekran fonksiyonu\r\n\r\n* Dahili GPS sistemi\r\n\r\n* Dahili Bluetooth, A2DP desteği\r\n\r\n * Harici IPOD oynatıcı desteği', '/upload/pictures/221c87c3c0.jpg', NULL, NULL),
(3, '7\"', 'Windows CE', '8 GB', 'Dual Core', '1 GB', '* 800*480 TFT Monitör\r\n\r\n* Android 4.4 Sistem \r\n\r\n* DVR Kamera Kayıt Desteği\r\n\r\n* Dahili Gps Sistemi \r\n\r\n* Dahili Bluetooth , A2DP desteği\r\n\r\n* DVD/VCD/CD/CD-RW/CD-R/MEPG4/JPG\r\n\r\n* USB/ SD Kart Desteği \r\n\r\n* 30 İstasyon Hafızalı  Fm Am Stereo Alıcı\r\n\r\n* Direksiyon kontrolü\r\n\r\n* 4*48 Watt Amfi\r\n\r\n* Geri Görüş Kamerası Desteği\r\n\r\n* Çoklu Dil Seçeneği\r\n\r\n* Wi-Fi ( Modeme ya da Kablosuz İnternet Paylaşım Desteği Olan Telefonlara Bağlanabilme Özelliği ) 3G * Modem ile İnternet Bağlantı Özelliği\r\n\r\n* Iphone İçin Air Play Desteği \r\n\r\n* Telefon Ekran Görüntüsü Paylaşabilme Özelliği', '/upload/pictures/6520f0431e.jpg', NULL, NULL),
(4, '10\"', 'Android', '8 GB', 'Dual Core', '2 GB', 'Mercedes B Class – 9 İnç DVD ve Multimedya Sistemi\r\n', '/upload/pictures/2181096499.jpg', '/upload/pictures/94eba7d399.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_araba`
--
ALTER TABLE `tbl_araba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kullanici`
--
ALTER TABLE `tbl_kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marka`
--
ALTER TABLE `tbl_marka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_urun`
--
ALTER TABLE `tbl_urun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urun_ozellikler`
--
ALTER TABLE `urun_ozellikler`
  ADD PRIMARY KEY (`urun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_araba`
--
ALTER TABLE `tbl_araba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_kullanici`
--
ALTER TABLE `tbl_kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_marka`
--
ALTER TABLE `tbl_marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_urun`
--
ALTER TABLE `tbl_urun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `urun_ozellikler`
--
ALTER TABLE `urun_ozellikler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
