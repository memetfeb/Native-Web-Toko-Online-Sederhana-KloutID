-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 01:13 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klout_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` varchar(10) NOT NULL,
  `namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
('a0001', 'Shirts'),
('a0002', 'T-Shirt'),
('a0003', 'Jacket'),
('a0004', 'Pants'),
('a0005', 'Accessories'),
('a0006', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `level_pegawai`
--

CREATE TABLE `level_pegawai` (
  `idlevel` varchar(2) NOT NULL,
  `nama_level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_pegawai`
--

INSERT INTO `level_pegawai` (`idlevel`, `nama_level`) VALUES
('1', 'manager'),
('2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idlevel` varchar(2) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `username`, `nama_lengkap`, `email`, `idlevel`, `password`, `foto`) VALUES
('5da0870e05', 'memet', 'Memet Febriyanto', 'memet@memet.com', '2', 'memet', NULL),
('5da1900a52', 'mamibos', 'Kanjeng Mami', 'mami@mami.com', '1', 'hoho', '500x500.jpg'),
('A01', 'jokokojo', 'Joko', 'joko@joko.com', '2', 'jokojoko', NULL),
('Z01', 'bigpapa', 'Pak Bambang', 'bambang@kuy.cas', '1', 'bambang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` varchar(20) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `idkategori` varchar(10) NOT NULL,
  `idsub_kategori` varchar(10) NOT NULL,
  `file_gambar` varchar(500) NOT NULL,
  `berat` int(7) NOT NULL,
  `kuantitas` int(5) NOT NULL,
  `last_update` datetime NOT NULL,
  `idpegawai` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `deskripsi`, `idkategori`, `idsub_kategori`, `file_gambar`, `berat`, `kuantitas`, `last_update`, `idpegawai`, `price`) VALUES
('5da1ce2fcaffa', 'Boots Adidas', 'Ultraboost yang didesain ulang. Sepatu running ini menghidupkan kembali teknologi performa andalan untuk menghasilkan aktivitas lari yang percaya diri dan bertenaga. Upper berbahan rajut pada sepatu ini memiliki second-skin fit dan didesain dengan teknologi motion-weave untuk menghasilkan elastisitas dan topangan yang adaptif.', 'a0006', 'a0006c', 'adidas1.jpg', 3, 20, '2019-10-14 15:49:14', '5da0870e05', 600000),
('5da2c0808ec92', 'Eiger Riding Gaea MID', 'Gaea Sneaker Boots Mid Cut adalah sepatu yang dirancang untuk penggunaan harian bagi pengendara roda dua. Sepatu ini dilengkapi dengan shifter pad berbahan karet yang berfungsi untuk melindungi permukaan sepatu saat berkendara, khususnya akibat terkena gesekan tuas persneling motor. Insole Ortholite mempercepat pengeringan serta sebagai bantalan untuk menjaga kaki tetap nyaman saat berjalan dan berkendara. Detail reflektif pada backcounter membantu sepatu mudah terlihat dalam keadaan minim cahay', 'a0006', 'a0006a', 'sepatueiger.jpg', 800, 12, '2019-10-14 16:05:20', '5da0870e05', 599000),
('5da4820ced118', 'Chinopants Argus Khaki', 'Chinopants Argus Khaki adalah celana berbahan berwarna cokelat.', 'a0004', 'a0004b', 'pants1.jpg', 200, 30, '2019-10-14 16:11:24', '5da0870e05', 200000),
('5da4882223a9a', 'Hoodie Girl Black', 'Hoodie berwarna hitam yang memiliki desain unik pada bagian belakang hoodie.', 'a0003', 'a0003a', 'hoodie1.jpg', 200, 10, '2019-10-14 16:37:22', '5da0870e05', 250000),
('5da493a9276be', 'Totebag Cutie', 'Totebag gradasi berwarna biru kuning yang indah dan menarik.', 'a0005', 'a0005b', 'totebag1.jpg', 100, 25, '2019-10-14 17:26:33', '5da0870e05', 50000),
('5da49417ac6e0', 'Kemeja Flannel Kotak', 'Kemeja Flannel kotak-kotak berwarna hitam-merah maroon yang menarik dan stylish.', 'a0001', 'a0001b', 'flannel.jpg', 100, 15, '2019-10-14 17:28:23', '5da0870e05', 150000),
('5da494b410429', 'High Heels Wanita', 'High Heels wanita yang sangat stylish dan dewasa, cocok untuk keperluan pesta dan acara formal', 'a0006', 'a0006b', 'high-heels-1327020__340.jpg', 300, 34, '2019-10-14 17:31:00', '5da0870e05', 630000),
('5da49539693d0', 'Backpack hitam', 'Tas backpack hitam yang cocok untuk murid sekolah dan mahasiswa. Muat barang yang cukup banyak.', 'a0005', 'a0005d', 'backpack1.jpg', 250, 37, '2019-10-14 17:33:13', '5da0870e05', 350000),
('5da49658bc966', 'Kaos Ramen Girl', 'Kaos dengan desain berlogo RamenGirl yang sangat keren. Cocok dipakai untuk beraktifitas.', 'a0002', 'a0002a', 'ramengirl.jpg', 100, 50, '2019-10-14 17:40:37', '5da0870e05', 500000),
('5da496b175508', 'Waistbag Hitam', 'Waistbag berwarna hitam yang keren. Cocok dipakai oleh semua kalangan, baik yang muda atau yang tua.', 'a0005', 'a0005c', 'waistbag1.jpg', 200, 30, '2019-10-14 17:39:29', '5da0870e05', 120000),
('5da4976e2cad6', 'Parka Hijau', 'Parka Hijau yang keren, cocok digunakan untuk wanita.', 'a0003', 'a0003b', 'parka.jpg', 250, 70, '2019-10-14 17:42:38', '5da0870e05', 840000),
('5da497f36f078', 'Kaos Hitam', 'Kaos hitam berlengan panjang, cocok digunakan untuk laki-laki. Berbahan katun yang berkualitas', 'a0002', 'a0002b', 'kaoshitams.jpeg', 150, 66, '2019-10-14 17:44:51', '5da0870e05', 135000),
('5da4986a849a5', 'Brown Short Pants', 'Celana pendek laki-laki berwarna cokelat yang keren. Cocok untuk digunakan berpetualang.', 'a0004', 'a0004a', 'brownpants.jpg', 120, 54, '2019-10-14 17:46:50', '5da0870e05', 160000),
('5da49c5adaa21', 'Wristband Positive Warrior', 'Wrisrband dengan positif warrior menjadikan anda pribadi yang lebih positif', 'a0005', 'a0005a', 'wristband1.jpg', 10, 50, '2019-10-14 18:05:43', '5da0870e05', 15000),
('5da49df678dac', 'Wedges Coklat', 'Wedges coklat sangat cocok untuk digunakan acara formal.', 'a0006', 'a0006b', 'download.jpg', 300, 40, '2019-10-14 18:10:30', '5da0870e05', 250000),
('5da4a00d1227d', 'Kemeja Batik', 'Kemeja batik yang sesuai untuk acara formal ataupun non-formal.', 'a0001', 'a0001c', 'batik kemeja.jpg', 250, 20, '2019-10-14 18:19:25', '5da0870e05', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `idsub_kategori` varchar(10) NOT NULL,
  `namasubkategori` varchar(50) NOT NULL,
  `idkategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`idsub_kategori`, `namasubkategori`, `idkategori`) VALUES
('a0001a', 'Standart', 'a0001'),
('a0001b', 'Flannel', 'a0001'),
('a0001c', 'Batik', 'a0001'),
('a0002a', 'Short', 'a0002'),
('a0002b', 'Long', 'a0002'),
('a0003a', 'Hoodie', 'a0003'),
('a0003b', 'Parka', 'a0003'),
('a0003c', 'Trucker', 'a0003'),
('a0004a', 'Short', 'a0004'),
('a0004b', 'Long', 'a0004'),
('a0005a', 'Wristband', 'a0005'),
('a0005b', 'Totebag', 'a0005'),
('a0005c', 'Waistbag', 'a0005'),
('a0005d', 'Backpack', 'a0005'),
('a0006a', 'Sneakers', 'a0006'),
('a0006b', 'Formal', 'a0006'),
('a0006c', 'Sport', 'a0006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `level_pegawai`
--
ALTER TABLE `level_pegawai`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD KEY `idlevel` (`idlevel`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idsub_kategori` (`idsub_kategori`),
  ADD KEY `idpegawai` (`idpegawai`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`idsub_kategori`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idlevel`) REFERENCES `level_pegawai` (`idlevel`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`idsub_kategori`) REFERENCES `sub_kategori` (`idsub_kategori`),
  ADD CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`idpegawai`);

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
