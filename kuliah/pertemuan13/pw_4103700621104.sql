-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_4103700621104`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`) VALUES
(2, 'Rakha Muhammad Nauval', 'rakha@gmail.com', 'raknau17', '$2y$10$.J9iY0cxlufp7pz2RK79xu15RLsL2QIrhLb.FGYbaZh3oWixejmBW'),
(3, 'Rika Permani Dewi', 'Rikapermasi@gmail.com', 'rikapermani', '$2y$10$OIioy10FbzIEmPes.6Fj2eCwdj7X0ByyCDydRT7qzCIs01xufFDUO');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `detail_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `nama_produk`, `harga_produk`, `detail_produk`) VALUES
(1, 'aceraspire3.jpg', 'Laptop acer Aspire 3', '6700000', 'Laptop dengan Merek acer Ram 8gb, HDMI 2.1'),
(2, 'Zyrex-Kntmn.jpg', 'Zyrek kintamani', '3200000', 'Laptop keluaran baru dari Zyrex ini menawarkan layar besar 14 inci yang cukup bertenaga, kinerjanya didukung dengan prosesor AMD A9 9400 dengan kecepatan 3.2 GHz. Laptop ini juga membawa RAM 4GB DDR4 yang mampu mendongkrak kinjerja otaknya.'),
(3, '20240211073210Lenovo-ThinkPad-X1-Carbon.jpg', 'Lenovo ThinkPad X1 Carbon', '7000000', 'Spesifikasi Lenovo ThinkPad X1 Carbon:\r\n\r\nScreen: 14-inch; 1080p dan 4K\r\nCPU: Intel Core i5 / i7 generasi 8\r\nGPU: Intel UHD 620\r\nRAM: 8 GB / 16 GB\r\nMemory: 256 GB / 512 GB / 1 TB SSD\r\nBerat: 2,5 pound\r\nHarga: 26,2 jutaan'),
(6, '65cc3ea09fd5d.jpg', 'Apple Iphone 15 plus', '15500000', '                              Layar	Super Retina XDR OLED 6.7 inci\r\nChipset	Apple A16 Bionic\r\nRAM/ROM	6 GB / 128 GB, 256 GB, 512 GB\r\nKamera	48 MP (wide)12 MP (ultrawide)\r\nHarga	Rp 15.499.000 (6/128 GB)                                                                                  '),
(10, '65cc3bb71f0af.png', ' Iphone XS-Max XR X 8 7, 6, 5c, 5s, 4s ', '23999000', 'Layar	LTPO Super Retina XDR OLED 6.7 inci\r\nChipset	Apple A17 Pro\r\nRAM/ROM	8 GB / 256 GB, 512 GB, 1 TB\r\nKamera	48 MP (wide)12 MP (ultrawide)12 MP (telephoto)\r\n(8/256 GB)'),
(12, '65cc3c9eaccfc.jpg', 'iphone 15 promax', '19999000', 'Layar	LTPO Super Retina XDR OLED 6.1 inci\r\nChipset	Apple A17 Pro\r\nRAM/ROM	8 GB / 128 GB, 256 GB, 512 GB, 1 TB\r\nKamera	48 MP (wide)12 MP (ultrawide)12 MP (telephoto)\r\n (8/128 GB)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
