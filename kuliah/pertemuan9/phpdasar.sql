-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 03:05 AM
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
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` char(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Rakha Muhammad Nauval', '4103700601', 'rakhanauval@gmail.com', 'Teknikinformatika', 'rakha.jpg'),
(2, 'Rifansyah Hidayatullah', '4103700602', 'syah@gmail.com', 'Teknik informatika', '20240201102027IMG-20211228-WA0020.jpg'),
(3, 'Riski Pebriansyah', '4103700603', 'riskipebri@gmail.com', 'Teknik informatika', 'riski.jpg'),
(14, 'Riris Riskianti', '4105672829', 'mbaririn@gmail.com', 'Pendidikan Guru paud', '65bca02b0e858.jpg'),
(17, 'Muhammad Hafidfz', '4103700601', 'Hafidztandetande@gmail.com', 'pendidikan luar biasa', 'foto_(2).jpeg'),
(18, 'Rian Ihsan', '4103700601', 'Rianihsan@gmail.com', 'Informatika dan sistem informasi', '65bc9ccadc55e.jpg'),
(19, 'Akmal Mudzaki', '4103700601', 'akmalmuddzk@gmail.com', 'Manjemen pendidikan', '65c3a3df38912.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `username`, `password`) VALUES
(1, 'Rakha Nauval', 'Rakhanauval@gmail.com', 'RAKNAU17', '171717'),
(4, 'Rika Permani Dewi', 'Rikapermasi@gmail.com', 'rikapermani', '$2y$10$pYfErPW/Q1xwZiapI2LA7.Ip.MrPFReGWsYol4ONoaRm8wvoWZsKG'),
(5, 'Rizki Hendiawan', 'Rizki@gmail.com', 'rizkihendri', '$2y$10$4wNaAPWlfaH/FLLGITtCNOj8J//Pn4IC.nHIW/uozvFZoTr1HkMuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
