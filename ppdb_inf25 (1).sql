-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2025 at 03:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_inf25`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datasekolah`
--

CREATE TABLE `tbl_datasekolah` (
  `id_sekolah` int NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kuota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_datasekolah`
--

INSERT INTO `tbl_datasekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `kuota`) VALUES
(5, 'SMAN 1 BUMIAYU', 'Jl. P. Diponegoro No. 2, Bumiayu, Kabupaten Brebes, Jawa Tengah', 360),
(6, 'MAN 2 BREBES', 'Jl. Jenderal Sudirman, Laren, Kec. Bumiayu, Kabupaten Brebes, Jawa Tengah', 300),
(7, 'SMA NEGRI 1 BANJARHARJO ', 'Jl.Raya Barat No.27,Banjarharjo,Kec.Banjarharjo,Kab.Brebes.', 360),
(8, 'SMA NEGERI 1 LARANGAN', 'Jl.Raya Barat Sitanggal,Sitanggal,Kec.Larangan,Kab.Brebes', 324),
(9, 'SMA NEGERI 1 PAGUYANGAN', 'Jl.Kedungbanteng No.1,Desa Paguyangan,Kec.Paguyangan,Kab.Brebes', 288),
(10, 'SMA NEGERI 2 BREBES', 'Jl.Ahmad Yani No.77,Kel.Brebes,Kec.Brebes,Kab.Brebes', 432),
(11, 'SMA NEGERI 3 BREBES', 'Jl.MT Haryono No.78,Kel.Brbes,Kec.Brebes,Kab.Brebes.', 360),
(12, 'SMA NEGERI 1 SALEM', 'Jl.Raya Salem(Bentar),Kec.Salem.Kab.Brebes', 324),
(13, 'SMA NEGERI 1 TANJUNG', 'Jl.Cemara Tanjung,Desa Lemah Abang,Kec.Tanjung,Kab.Brebes.', 324),
(14, 'SMA NEGERI 1 WANASARI', 'Jl.Raya Sidamulya,Kec.Wanasari,Kab.Brebes', 252),
(15, 'SMA NEGERI 1 KETANGGUNGAN', 'Jl.KH.Mukhtadi(Karangmalang),Kec.Ketanggungan,Kab.Brebes.', 360),
(16, 'SMA NEGERI 1 KERSANA', 'Jl.Stasiun Kersana(Cigedog),Kec.Kersana,Kab.Brebes.', 324),
(17, 'SMA NEGERI 1 JATIBARANG', 'Jl.Raya Karanglo TegalWulung,Kec Jatibarang,Kab.Brebes', 324),
(18, 'SMA NEGERI 1 BULAKAMBA ', 'Jl.Grinting,Bulakamba,Kab.Brebes', 396),
(19, 'SMA NEGERI 1 BREBES ', 'Jl.Dr.Setiabudi No.11,Kec.Brebes,Kab.Brebes', 396),
(20, 'SMA NEGERI 1 SIRAMPOG', 'Jl.Raya Simrampog,Dusun Manggis,Kec.Sirampog,Kab.Brebes', 324),
(24, 'SMA NEGERI 1 LOSARI', 'Jalan Jend. Sudirman No. 70, Losari Lor, Kecamatan Losari, Kabupaten Brebes, Provinsi Jawa Tengah', 324);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `foto`) VALUES
(1, 'Administrator', 'admin@gmail.com', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `role` enum('admin','panitia','calon_siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_datasekolah`
--
ALTER TABLE `tbl_datasekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_datasekolah`
--
ALTER TABLE `tbl_datasekolah`
  MODIFY `id_sekolah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
