-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jan 2026 pada 06.42
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `ppdb_inf25`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_ppdb`
--

CREATE TABLE `alur_ppdb` (
  `id` int NOT NULL,
  `langkah` int NOT NULL,
  `judul` varchar(120) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `alur_ppdb`
--

INSERT INTO `alur_ppdb` (`id`, `langkah`, `judul`, `deskripsi`, `aktif`) VALUES
(1, 1, 'Registrasi Akun', 'Buat akun lalu login', 1),
(2, 2, 'Isi Formulir', 'Lengkapi data sesuai dokumen', 1),
(3, 3, 'Upload Dokumen', 'Unggah KK, Akta, Ijazah/SKL', 1),
(4, 4, 'Kirim Pendaftaran', 'Pastikan data benar lalu submit', 1),
(5, 5, 'Verifikasi', 'Menunggu verifikasi operator', 1),
(6, 6, 'Pengumuman & Daftar Ulang', 'Cek hasil lalu daftar ulang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ppdb`
--

CREATE TABLE `jadwal_ppdb` (
  `id` int NOT NULL,
  `kegiatan` varchar(150) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '1',
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jadwal_ppdb`
--

INSERT INTO `jadwal_ppdb` (`id`, `kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `urutan`, `aktif`) VALUES
(1, 'Pembukaan Pendaftaran', '2025-12-27', '2025-12-27', 'PPDB dibuka secara online', 1, 1),
(2, 'Verifikasi Berkas', '2025-12-28', '2025-12-30', 'Verifikasi oleh operator sekolah', 2, 1),
(3, 'Pengumuman Hasil', '2025-12-31', '2025-12-31', 'Hasil seleksi diumumkan', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `id_sekolah` int NOT NULL,
  `nilai_rata_rata` decimal(5,2) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','submit','verifikasi','ditolak') DEFAULT 'draft',
  `keterangan` varchar(255) DEFAULT NULL,
  `jalur_id` int DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kecamatan_id` int DEFAULT NULL,
  `desa_id` int DEFAULT NULL,
  `no_pendaftaran` varchar(30) DEFAULT NULL,
  `id_sekolah2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `ringkasan` text,
  `isi` text,
  `kategori` enum('Umum','PPDB','Seleksi','Pengumuman Penting') DEFAULT 'Umum',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `slug`, `ringkasan`, `isi`, `kategori`, `is_active`, `created_at`) VALUES
(1, 'Pembukaan PPDB Tahun Ajaran 2025/2026', 'pembukaan-ppdb-2025-2026', 'Pendaftaran PPDB Online SMA Tahun Ajaran 2025/2026 telah resmi dibuka.Seluruh calon peserta didik dapat melakukan pendaftaran melalui sistem PPDB sesuai jadwal dan ketentuan yang berlaku.', '<h3>Jadwal Penting</h3>\r\n<ul>\r\n  <li><strong>Pembukaan Pendaftaran:</strong> 27 Desember 2025</li>\r\n  <li><strong>Verifikasi Berkas:</strong> 28–30 Desember 2025</li>\r\n  <li><strong>Pengumuman Hasil Seleksi:</strong> 31 Desember 2025</li>\r\n</ul>\r\n\r\n<h3>Langkah Pendaftaran</h3>\r\n<ol>\r\n  <li>Masuk ke menu <strong>Akun</strong> dan lakukan registrasi.</li>\r\n  <li>Lengkapi data diri dan pilih jalur pendaftaran yang sesuai.</li>\r\n  <li>Unggah berkas persyaratan (format jelas dan dapat terbaca).</li>\r\n  <li>Pastikan data benar, lalu <strong>kirim pendaftaran</strong>.</li>\r\n  <li>Pantau status verifikasi dan pengumuman pada menu <strong>Pengumuman</strong>.</li>\r\n</ol>\r\n\r\n<blockquote>\r\n  <strong>Catatan:</strong> PPDB dilaksanakan secara <strong>online</strong> dan <strong>gratis</strong>. Waspada terhadap segala bentuk penipuan yang mengatasnamakan PPDB.\r\n</blockquote>\r\n\r\n<h3>Persyaratan Umum</h3>\r\n<ul>\r\n  <li>Dokumen identitas (KK/KTP orang tua/wali sesuai ketentuan).</li>\r\n  <li>Rapor/Surat Keterangan Lulus (sesuai jalur).</li>\r\n  <li>Dokumen pendukung jalur (Prestasi/Afirmasi/Zonasi) bila diperlukan.</li>\r\n</ul>\r\n\r\n<p>Apabila terdapat kendala, silakan menghubungi panitia PPDB melalui menu <strong>Kontak</strong> atau datang langsung ke sekolah tujuan pada jam kerja.</p>\r\n\r\n<p><em>— Panitia PPDB Online SMA BREBES</em></p>\r\n', 'PPDB', 1, '2025-12-27 11:01:08'),
(2, 'Jadwal Verifikasi Berkas', 'jadwal-verifikasi-berkas', 'Verifikasi berkas PPDB dilaksanakan sesuai jadwal resmi.', '<p>Verifikasi berkas dilaksanakan pada tanggal <strong>1–3 Juli 2025</strong>.</p>', 'Umum', 1, '2025-12-27 11:01:08'),
(3, 'Pengumuman Hasil Seleksi', 'hasil-seleksi-ppdb', 'Hasil seleksi PPDB akan diumumkan sesuai jadwal.', '<p>Hasil seleksi PPDB diumumkan pada tanggal <strong>5 Juli 2025</strong>.</p>', 'Seleksi', 1, '2025-12-27 11:01:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datasekolah`
--

CREATE TABLE `tbl_datasekolah` (
  `id_sekolah` int NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kuota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_datasekolah`
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
(25, 'SMA Muhammadiyah Brebes ', 'Jl. Yos Sudarso, Kec. Brebes, Kab. Brebes', 340),
(26, 'SMA Muhammadiyah Bumiayu ', 'Jl. Lingkar Bumiayu, Kec. Bumiayu, Kab. Brebes', 350),
(27, 'SMA Muhammadiyah Tonjong ', 'Jl. Raya Tonjong, Kec. Tonjong, Kab. Brebes', 320),
(28, 'SMA Muhammadiyah Larangan ', 'Jl. Raya Larangan, Kec. Larangan, Kab. Brebes', 345),
(29, 'SMA Ma’arif NU Jatibarang ', 'Jl. Raya Jatibarang, Kec. Jatibarang, Kab. Brebes', 245),
(30, 'SMA Ma’arif NU Bulakamba ', 'Jl. Raya Bulakamba, Kec. Bulakamba, Kab. Brebes', 350),
(31, 'SMA Islam Bustanul Ulum', 'Kec. Ketanggungan, Kab. Brebes', 346),
(32, 'SMA Islam Diponegoro Losari ', ' Kec. Losari, Kab. Brebes', 329),
(33, 'SMA Nurul Huda Paguyangan ', 'Kec. Paguyangan, Kab. Brebes', 325),
(34, 'SMA Yanuris Tonjong ', ' Desa Linggapura, Kec. Tonjong, Kab. Brebes', 235),
(35, 'SMA YPI Brebes ', 'Kec. Brebes, Kab. Brebes', 342),
(36, 'SMA Al-Falah Larangan ', ' Kec. Larangan, Kab. Brebes', 433),
(37, 'SMA Al-Huda Bumiayu ', ' Kec. Bumiayu, Kab. Brebes', 333),
(38, 'SMA Al-Ikhlas Banjarharjo ', ' Kec. Banjarharjo, Kab. Brebes', 430),
(39, 'SMA Andalusia Jatibarang ', 'Kec. Jatibarang, Kab. Brebes', 360),
(40, 'SMA Boarding School Brebes', ' Kec. Brebes, Kab. Brebes', 440),
(41, 'SMA Madani Brebes ', ' Kec. Brebes, Kab. Brebes', 350),
(42, 'SMA Madani Brebes', ' Kec. Brebes, Kab. Brebes', 355),
(43, 'SMA Ki Hajar Dewantara Brebes ', ' Kec. Brebes, Kab. Brebes', 344),
(44, 'SMA Budi Utomo Brebes', ' Kec. Brebes, Kab. Brebes', 324),
(45, 'SMA Cakra Nenggala Brebes', ' Kec. Brebes, Kab. Brebes', 333),
(46, 'SMA IC Islamic Centre Brebes ', 'JL. YOS SUDARSO NO. 35 BREBES', 356),
(47, 'SMA Karya Bhakti Brebes', 'JL. TAMAN SISWA NO. 1 BREBES', 453),
(48, 'MAN 1 Brebes ', ' Jl. Yos Sudarso, Kec. Brebes, Kab. Brebes', 320),
(49, 'sma karya bhakti brebes ', 'JL. TAMAN SISWA NO. 1 BREBES', 356),
(50, 'MA Al-Ikhlas Losari ', ' Kec. Losari, Kab. Brebes', 360),
(51, 'MA An-Nur Losari ', ' Kec. Losari, Kab. Brebes', 260),
(52, 'MA Nurul Huda Losari ', 'Kec. Losari, Kab. Brebes', 328),
(53, 'MA Al-Madina Paguyangan ', ' Kec. Paguyangan, Kab. Brebes', 325),
(54, 'MA Ma’arif NU Tonjong ', ' Kec. Tonjong, Kab. Brebes', 389),
(55, 'MA Ma’arif NU Wanasari ', ' Kec. Wanasari, Kab. Brebes', 300),
(56, 'MA Ma’arif NU Bulakamba ', ' Kec. Bulakamba, Kab. Brebes', 222),
(57, 'MA Syafa’atul Ummah Bulakamba ', ' Kec. Bulakamba, Kab. Brebes', 346),
(58, 'MA As-Syamsuriyyah Wanasari', ' Kec. Wanasari, Kab. Brebes', 300),
(59, 'MA Bhakti Utama NU Songgom ', ' Kec. Songgom, Kab. Brebes', 340);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id` int NOT NULL,
  `id_kecamatan` int DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_desa`
--

INSERT INTO `tbl_desa` (`id`, `id_kecamatan`, `nama`) VALUES
(1, 1, 'Salem'),
(2, 1, 'Citimbang'),
(3, 1, 'Bentarsari'),
(4, 1, 'Ganggawang'),
(5, 1, 'Winduasri'),
(6, 2, 'Bantarkawung'),
(7, 2, 'Cinanas'),
(8, 2, 'Telaga'),
(9, 2, 'Terlaya'),
(10, 2, 'Pangebatan'),
(11, 3, 'Bumiayu'),
(12, 3, 'Kalierang'),
(13, 3, 'Negaradaha'),
(14, 3, 'Jatisawit'),
(15, 3, 'Langkap'),
(16, 4, 'Paguyangan'),
(17, 4, 'Kretek'),
(18, 4, 'Cilibur'),
(19, 4, 'Winduasri'),
(20, 4, 'Ragatunjung'),
(21, 5, 'Sirampog'),
(22, 5, 'Benda'),
(23, 5, 'Manggis'),
(24, 5, 'Buniwah'),
(25, 5, 'Dukuhwringin'),
(26, 6, 'Tonjong'),
(27, 6, 'Linggapura'),
(28, 6, 'Negaradaha'),
(29, 6, 'Pekuncen'),
(30, 6, 'Rajawetan'),
(41, 7, 'Larangan'),
(42, 7, 'Siandong'),
(43, 7, 'Wlahar'),
(44, 7, 'Rengaspendawa'),
(45, 7, 'Kedungbokor'),
(46, 8, 'Ketanggungan'),
(47, 8, 'Kubangpari'),
(48, 8, 'Dukuhbadag'),
(49, 8, 'Karangbandung'),
(50, 8, 'Baros'),
(51, 9, 'Banjarharjo'),
(52, 9, 'Ciawi'),
(53, 9, 'Cihaur'),
(54, 9, 'Malahayu'),
(55, 9, 'Parereja'),
(56, 10, 'Losari'),
(57, 10, 'Rungkang'),
(58, 10, 'Babakan'),
(59, 10, 'Kedungneng'),
(60, 10, 'Randusari'),
(61, 11, 'Tanjung'),
(62, 11, 'Pejagan'),
(63, 11, 'Luwungragi'),
(64, 11, 'Karangreja'),
(65, 11, 'Kebondalem'),
(66, 12, 'Kersana'),
(67, 12, 'Sindangjaya'),
(68, 12, 'Kemukten'),
(69, 12, 'Sindangwangi'),
(70, 12, 'Limbangan'),
(71, 13, 'Bulakamba'),
(72, 13, 'Kluwut'),
(73, 13, 'Pakijangan'),
(74, 13, 'Luwunggede'),
(75, 13, 'Grinting'),
(76, 14, 'Wanasari'),
(77, 14, 'Siasem'),
(78, 14, 'Pesantunan'),
(79, 14, 'Kedunguter'),
(80, 14, 'Kertabesuki'),
(81, 15, 'Songgom'),
(82, 15, 'Wanatawang'),
(83, 15, 'Jatirokeh'),
(84, 15, 'Cenang'),
(85, 15, 'Linggapura'),
(86, 16, 'Jatibarang'),
(87, 16, 'Tegalwulung'),
(88, 16, 'Janegara'),
(89, 16, 'Kebogadung'),
(90, 16, 'Pedeslohor'),
(91, 17, 'Brebes'),
(92, 17, 'Kalimati'),
(93, 17, 'Pasarbatang'),
(94, 17, 'Limbangan Kulon'),
(95, 17, 'Gandasuli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id` int NOT NULL,
  `pendaftaran_id` int NOT NULL,
  `jenis` enum('KK','AKTA','IJAZAH') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` enum('pending','valid','invalid') DEFAULT 'pending',
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jalur`
--

CREATE TABLE `tbl_jalur` (
  `id` int NOT NULL,
  `kode` varchar(30) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_jalur`
--

INSERT INTO `tbl_jalur` (`id`, `kode`, `nama`, `aktif`) VALUES
(1, 'ZONASI', 'Zonasi', 1),
(2, 'AFIRMASI', 'Afirmasi', 1),
(3, 'PRESTASI', 'Prestasi', 1),
(4, 'PINDAH', 'Perpindahan Orang Tua', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int NOT NULL,
  `nama_kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Salem'),
(2, 'Bantarkawung'),
(3, 'Bumiayu'),
(4, 'Paguyangan'),
(5, 'Sirampog'),
(6, 'Tonjong'),
(7, 'Larangan'),
(8, 'Ketanggungan'),
(9, 'Banjarharjo'),
(10, 'Losari'),
(11, 'Tanjung'),
(12, 'Kersana'),
(13, 'Bulakamba'),
(14, 'Wanasari'),
(15, 'Songgom'),
(16, 'Jatibarang'),
(17, 'Brebes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int NOT NULL,
  `pendaftaran_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `aksi` varchar(50) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `foto`, `level`) VALUES
(3, 'naufal fajar', 'nopalfjr29@gmail.com', '$2y$10$dDnC6OC8zKh9k7Mu2btr4.70acsV04krf9mTslyMxQzXJQidZZlEC', NULL, 'user'),
(4, 'Rizky', 'kyyfatur12@gmail.com', '$2y$10$GixwMdJO1WtwZfhEV8jXvuOCP581GxaM7h6fom6znq1ZophVMEgoe', NULL, 'user'),
(5, 'Administrator', 'admin@gmail.com', '$2y$10$Yk/bTC1F1YKJ3GZAP8IfZuZNnWa7nUl/OgAgDbWwd3uoJ8//VbBqW', NULL, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `id_profile` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` text,
  `asal_sekolah` varchar(120) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`id_profile`, `id_user`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `asal_sekolah`, `no_hp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 5, 'Muhammad Rizky', 'Jatiroto', '2006-12-02', 'L', 'Islam', 'KALIWADAS KRAJAN TENGAH RT 01 RW 03', 'SMP ISLAM T HUDA', '081326335241', '1767180379_a6e9baac5801c7957664.jpeg', '2025-12-31 09:45:19', '2025-12-31 11:49:42');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`),
  ADD KEY `fk_datasekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_datasekolah`
--
ALTER TABLE `tbl_datasekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jalur`
--
ALTER TABLE `tbl_jalur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `uq_profile_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_datasekolah`
--
ALTER TABLE `tbl_datasekolah`
  MODIFY `id_sekolah` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jalur`
--
ALTER TABLE `tbl_jalur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id_profile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_datasekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `tbl_datasekolah` (`id_sekolah`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
