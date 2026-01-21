-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2025 at 07:00 AM
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
(24, 'SMA NEGERI 1 LOSARI', 'Jalan Jend. Sudirman No. 70, Losari Lor, Kecamatan Losari, Kabupaten Brebes, Provinsi Jawa Tengah', 324),
(0, 'SMA Muhammadiyah Brebes ', 'Jl. Yos Sudarso, Kec. Brebes, Kab. Brebes', 340),
(0, 'SMA Muhammadiyah Bumiayu ', 'Jl. Lingkar Bumiayu, Kec. Bumiayu, Kab. Brebes', 350),
(0, 'SMA Muhammadiyah Tonjong ', 'Jl. Raya Tonjong, Kec. Tonjong, Kab. Brebes', 320),
(0, 'SMA Muhammadiyah Larangan ', 'Jl. Raya Larangan, Kec. Larangan, Kab. Brebes', 345),
(0, 'SMA Ma’arif NU Jatibarang ', 'Jl. Raya Jatibarang, Kec. Jatibarang, Kab. Brebes', 245),
(0, 'SMA Ma’arif NU Bulakamba ', 'Jl. Raya Bulakamba, Kec. Bulakamba, Kab. Brebes', 350),
(0, 'SMA Islam Bustanul Ulum', 'Kec. Ketanggungan, Kab. Brebes', 346),
(0, 'SMA Islam Diponegoro Losari ', ' Kec. Losari, Kab. Brebes', 329),
(0, 'SMA Nurul Huda Paguyangan ', 'Kec. Paguyangan, Kab. Brebes', 325),
(0, 'SMA Yanuris Tonjong ', ' Desa Linggapura, Kec. Tonjong, Kab. Brebes', 235),
(0, 'SMA YPI Brebes ', 'Kec. Brebes, Kab. Brebes', 342),
(0, 'SMA Al-Falah Larangan ', ' Kec. Larangan, Kab. Brebes', 433),
(0, 'SMA Al-Huda Bumiayu ', ' Kec. Bumiayu, Kab. Brebes', 333),
(0, 'SMA Al-Ikhlas Banjarharjo ', ' Kec. Banjarharjo, Kab. Brebes', 430),
(0, 'SMA Andalusia Jatibarang ', 'Kec. Jatibarang, Kab. Brebes', 360),
(0, 'SMA Boarding School Brebes', ' Kec. Brebes, Kab. Brebes', 440),
(0, 'SMA Madani Brebes ', ' Kec. Brebes, Kab. Brebes', 350),
(0, 'SMA Madani Brebes', ' Kec. Brebes, Kab. Brebes', 355),
(0, 'SMA Ki Hajar Dewantara Brebes ', ' Kec. Brebes, Kab. Brebes', 344),
(0, 'SMA Budi Utomo Brebes', ' Kec. Brebes, Kab. Brebes', 324),
(0, 'SMA Cakra Nenggala Brebes', ' Kec. Brebes, Kab. Brebes', 333),
(0, 'SMA IC Islamic Centre Brebes ', 'JL. YOS SUDARSO NO. 35 BREBES', 356),
(0, 'SMA Karya Bhakti Brebes', 'JL. TAMAN SISWA NO. 1 BREBES', 453),
(0, 'MAN 1 Brebes ', ' Jl. Yos Sudarso, Kec. Brebes, Kab. Brebes', 320),
(0, 'sma karya bhakti brebes ', 'JL. TAMAN SISWA NO. 1 BREBES', 356),
(0, 'MA Al-Ikhlas Losari ', ' Kec. Losari, Kab. Brebes', 360),
(0, 'MA An-Nur Losari ', ' Kec. Losari, Kab. Brebes', 260),
(0, 'MA Nurul Huda Losari ', 'Kec. Losari, Kab. Brebes', 328),
(0, 'MA Al-Madina Paguyangan ', ' Kec. Paguyangan, Kab. Brebes', 325),
(0, 'MA Ma’arif NU Tonjong ', ' Kec. Tonjong, Kab. Brebes', 389),
(0, 'MA Ma’arif NU Wanasari ', ' Kec. Wanasari, Kab. Brebes', 300),
(0, 'MA Ma’arif NU Bulakamba ', ' Kec. Bulakamba, Kab. Brebes', 222),
(0, 'MA Syafa’atul Ummah Bulakamba ', ' Kec. Bulakamba, Kab. Brebes', 346),
(0, 'MA As-Syamsuriyyah Wanasari', ' Kec. Wanasari, Kab. Brebes', 300),
(0, 'MA Bhakti Utama NU Songgom ', ' Kec. Songgom, Kab. Brebes', 340);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `foto`, `level`) VALUES
(2, 'exando dhaniar outra', 'ekhsangagalngentod@gmail.com', '$2y$10$26VTSlIUR9GWGVRdPDjjl.yyZXf4BOIro7AbaWVDBCm8ZedIJ0BSu', NULL, 'user'),
(3, 'naufal fajar', 'nopalfjr29@gmail.com', '$2y$10$dDnC6OC8zKh9k7Mu2btr4.70acsV04krf9mTslyMxQzXJQidZZlEC', NULL, 'user'),
(4, 'Rizky', 'kyyfatur12@gmail.com', '$2y$10$GixwMdJO1WtwZfhEV8jXvuOCP581GxaM7h6fom6znq1ZophVMEgoe', NULL, 'user'),
(5, 'Administrator', 'admin@gmail.com', '$2y$10$Yk/bTC1F1YKJ3GZAP8IfZuZNnWa7nUl/OgAgDbWwd3uoJ8//VbBqW', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
