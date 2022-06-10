-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2021 pada 21.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

CREATE TABLE `balita` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_id` int(11) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `balita`
--

INSERT INTO `balita` (`id`, `name`, `tgl_lahir`, `jk_id`, `nama_ortu`, `alamat`, `no_hp`) VALUES
(1, 'Rayhan Pramudyo', '2002-12-12', 1, 'Sukma Mawaddah', 'jl. Mastrip', '083972834'),
(2, 'aa', '2012-08-12', 4, 'Budi', 'jl. Mastrip', '081249079110'),
(3, 'Puput Mega Wijayanti', '2021-12-03', 1, 'Anwar Zinar', 'jl. Mastrip', '081249079110'),
(4, 'Adinda Ajeng', '0000-00-00', 1, 'Budi', 'jl. Mastrip', '081249079110');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Tablet'),
(2, 'Kapsul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor_specialist`
--

CREATE TABLE `doctor_specialist` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `specialist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'uadmin', 'user admin'),
(3, 'bidan', '-'),
(4, 'kepala', '-'),
(5, 'pharmacist', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ibuhamil`
--

CREATE TABLE `ibuhamil` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ibuhamil`
--

INSERT INTO `ibuhamil` (`id`, `name`, `tgl_lahir`, `jk_id`, `alamat`, `no_hp`) VALUES
(1, 'Soraya', '2001-04-12', 1, 'jl. Kemuning', '02147483647'),
(2, 'Anggita', '1995-12-15', 1, 'jl. Mastrip', '02147483647'),
(3, 'Adinda Ajeng', '2018-11-01', 1, 'jl. Mastrip', '081249079110'),
(4, 'Anggita', '2000-09-09', 1, 'jl. Mastrip', '081249079110'),
(5, 'Kepala Puskesmas', '2018-11-15', 1, 'Lumajang', '08136842972');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasibalita`
--

CREATE TABLE `imunisasibalita` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imunisasibalita`
--

INSERT INTO `imunisasibalita` (`id`, `name`) VALUES
(1, 'Tidak ada'),
(2, 'DPT (Penyakit difteri tetanus)'),
(3, 'Polio'),
(4, 'Hepatitis B'),
(5, 'BCG (Penyakit TBC)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasiibu`
--

CREATE TABLE `imunisasiibu` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `imunisasiibu`
--

INSERT INTO `imunisasiibu` (`id`, `name`) VALUES
(1, 'Tidak Ada'),
(2, 'Vaksin Campak'),
(3, 'Vaksin Hepatitis'),
(4, 'Vaksin Difteri'),
(5, 'Vaksin TT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `rule_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalbalita`
--

CREATE TABLE `jadwalbalita` (
  `id` int(11) NOT NULL,
  `jeniskegiatan_id` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `imunisasibalita_id` int(11) NOT NULL,
  `penyuluhanbalita_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwalbalita`
--

INSERT INTO `jadwalbalita` (`id`, `jeniskegiatan_id`, `jadwal`, `imunisasibalita_id`, `penyuluhanbalita_id`) VALUES
(1, 2, '2021-12-15', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalibu`
--

CREATE TABLE `jadwalibu` (
  `id` int(11) NOT NULL,
  `jeniskegiatan_id` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `imunisasiibu_id` int(11) NOT NULL,
  `penyuluhanibu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwalibu`
--

INSERT INTO `jadwalibu` (`id`, `jeniskegiatan_id`, `jadwal`, `imunisasiibu_id`, `penyuluhanibu_id`) VALUES
(1, 2, '2021-12-09', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskegiatan`
--

CREATE TABLE `jeniskegiatan` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jeniskegiatan`
--

INSERT INTO `jeniskegiatan` (`id`, `name`) VALUES
(1, 'Imunisasi'),
(2, 'Penyuluhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jk`
--

CREATE TABLE `jk` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jk`
--

INSERT INTO `jk` (`id`, `name`) VALUES
(1, 'Perempuan'),
(4, 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `pemeriksaanibu_id` int(11) NOT NULL,
  `pemeriksaanbalita_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicine`
--

CREATE TABLE `medicine` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `expired` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medicine`
--

INSERT INTO `medicine` (`id`, `code`, `name`, `category_id`, `date`, `expired`, `timestamp`, `stock`) VALUES
(1, 'P-1', 'Paracetamol', 2, '2019-11-04', '2020-12-01', 1572854861, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `list_id` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `link`, `list_id`, `icon`, `status`, `position`, `description`) VALUES
(101, 1, 'Beranda', 'admin/', 'home_index', 'home', 1, 1, '-'),
(103, 1, 'Setting', 'admin/menus', '-', 'cogs', 1, 3, '-'),
(104, 1, 'User', 'admin/user_management', 'user_management_index', 'users', 1, 2, '-'),
(106, 103, 'Menu', 'admin/menus', 'menus_index', 'bars', 1, 1, '-'),
(107, 2, 'Beranda', 'user/home', 'home_index', 'home', 1, 1, '-'),
(111, 4, 'Laporan', 'laporan/', '', 'file', 1, 1, '-'),
(113, 2, 'Data Master', 'uadmin/farmasi', 'uadmin_farmasi', 'database', 1, 1, '-'),
(119, 113, 'Data User', 'uadmin/users', '-', 'users', 1, 1, '-'),
(120, 113, 'Data Ibu Hamil', 'uadmin/ibuhamil', 'ibuhamil-index', 'female', 1, 1, '-'),
(121, 113, 'Data Balita', 'uadmin/balita', 'balita-index', 'baby', 1, 2, '-'),
(125, 111, 'Laporan Imunisasi', 'kepala/laporan', '-', 'tablet', 1, 1, '-'),
(126, 2, 'Transaksi', 'uadmin/', '-', 'cubes', 1, 1, '-'),
(127, 126, 'Jadwal Kegiatan', 'uadmin/', '-', 'book', 1, 1, '-'),
(129, 126, 'SMS Gateway', 'uadmin/pesan', '-', 'mobile', 1, 1, '-'),
(130, 3, 'Pasien', 'bidan/', '', 'server', 1, 1, '-'),
(133, 127, 'Ibu Hamil', 'uadmin/jadwalibu', '-', 'female', 1, 1, '-'),
(134, 127, 'Balita', 'uadmin/jadwalbalita', '-', 'baby', 1, 1, '-'),
(135, 103, 'Group', 'admin/group', 'group-index', 'list', 1, 1, '-'),
(136, 103, 'Jenis Kelamin', 'admin/jk', 'jk-index', 'venus-mars', 1, 1, '-'),
(142, 130, 'Data Ibu Hamil', 'bidan/ibuhamil', '-', 'female', 1, 1, '-'),
(143, 130, 'Data balita', 'bidan/balita', '-', 'baby', 1, 1, '-'),
(144, 113, 'Jenis Kegiatan', 'uadmin/jeniskegiatan', '-', 'list', 1, 4, '-'),
(145, 113, 'Jenis Imunisasi Ibu', 'uadmin/imunisasiibu', '-', 'female', 1, 5, '-'),
(146, 113, 'Jenis Imunisasi Balita', 'uadmin/imunisasibalita', '-', 'baby', 1, 6, '-'),
(147, 113, 'Penyuluhan Ibu', 'uadmin/penyuluhanibu', '-', 'tag', 1, 7, '-'),
(148, 113, 'Penyuluhan Balita', 'uadmin/penyuluhanbalita', '-', 'tags', 1, 8, '-'),
(149, 5, 'PDF', 'pharmacist/pdf', '-', 'home', 1, 1, '-'),
(150, 5, 'Transaction', 'pharmacist/transaction', '-', 'home', 1, 1, '-'),
(151, 5, 'Prescription', 'pharmacist/prescription', '-', 'home', 1, 1, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient`
--

CREATE TABLE `patient` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `patient_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `patient`
--

INSERT INTO `patient` (`id`, `name`, `patient_group_id`) VALUES
(2, 'Zidni', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient_group`
--

CREATE TABLE `patient_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `patient_group`
--

INSERT INTO `patient_group` (`id`, `name`, `description`) VALUES
(1, 'Balita', 'Anak Usia 5-6 tahun'),
(2, 'Ibu', 'Ibu hamil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaanbalita`
--

CREATE TABLE `pemeriksaanbalita` (
  `id` int(11) NOT NULL,
  `balita_id` int(11) NOT NULL,
  `bb` varchar(10) NOT NULL,
  `tb` varchar(10) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `imunisasibalita_id` int(11) NOT NULL,
  `penyuluhanbalita_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaanibu`
--

CREATE TABLE `pemeriksaanibu` (
  `id` int(11) NOT NULL,
  `ibuhamil_id` int(11) NOT NULL,
  `darah` varchar(10) NOT NULL,
  `bb` varchar(10) NOT NULL,
  `jantung` varchar(10) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `imunisasiibu_id` int(11) NOT NULL,
  `penyuluhanibu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuluhanbalita`
--

CREATE TABLE `penyuluhanbalita` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyuluhanbalita`
--

INSERT INTO `penyuluhanbalita` (`id`, `name`) VALUES
(1, 'Tidak ada'),
(2, 'Gizi balita'),
(3, 'Tumbuh Kembang Anak'),
(4, 'PHBS'),
(5, 'ASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuluhanibu`
--

CREATE TABLE `penyuluhanibu` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyuluhanibu`
--

INSERT INTO `penyuluhanibu` (`id`, `name`) VALUES
(1, 'Tidak ada'),
(2, 'KB'),
(3, 'PHBS'),
(4, 'Penyakit menular');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prescription`
--

INSERT INTO `prescription` (`id`, `code`, `user_id`, `patient_id`, `date`, `timestamp`, `status`) VALUES
(1, 'R-1', 15, 2, '2019-11-04', 1572866932, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `ibuhamil_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id` int(10) UNSIGNED NOT NULL,
  `rule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id`, `rule`) VALUES
(2, '3 x sehari sesudah makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `specialist`
--

CREATE TABLE `specialist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `specialist`
--

INSERT INTO `specialist` (`id`, `name`) VALUES
(1, 'Spesialis Mata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `nip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `image`, `address`, `nip`) VALUES
(1, '127.0.0.1', 'admin@fixl.com', '$2y$12$XpBgMvQ5JzfvN3PTgf/tA.XwxbCOs3mO0a10oP9/11qi1NUpv46.u', 'admin@fixl.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1639727405, 1, 'Admin', 'Ajeng', '081342989185', 'USER_1_1638272930.jpg', 'admin', NULL),
(13, '::1', 'uadmin@gmail.com', '$2y$10$78SZyvKRKMU7nPCew9w4nOpEUmJ1SeTV4L4ZG2NXXSfbEaswqoepq', 'uadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568678256, 1639666839, 1, 'User Admin', 'Kader', '00', 'USER_13_1639103000.png', 'jln mutiara no 8', NULL),
(14, '::1', 'kepala@gmail.com', '$2y$10$Un1PLu68UHwSBfkT/8oa1.Z1bdwuJehfzaMrx5y3TWeR.2kPfIg7a', 'kepala@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572856687, 1639667716, 1, 'Kepala', 'Puskesmas', '081234567890', 'default.jpg', 'Jalan', NULL),
(15, '::1', 'bidan@gmail.com', '$2y$10$8fJac0Hyx55d9OxLOL8BK.iJ8toU0pwoZL7YeUBf8YEm4GmdVpaRy', 'bidan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1572857608, 1639849464, 1, 'User', 'Bidan', '08123', 'USER_15_1638268815.png', 'Jalan', NULL),
(16, '::1', 'adindaajeng61@gmail.com', '$2y$10$AbvcI96VROUogkTbs4y8LOcT6zS2RBjEuyl28OjdV0xDpazQjkmom', 'adindaajeng61@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1639586794, 1639587082, 1, 'Adinda', 'Ajeng', '081249079110', 'default.jpg', 'jl. Mastrip', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(37, 13, 2),
(39, 14, 4),
(41, 15, 3),
(43, 16, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `doctor_specialist`
--
ALTER TABLE `doctor_specialist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_id` (`specialist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ibuhamil`
--
ALTER TABLE `ibuhamil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `imunisasibalita`
--
ALTER TABLE `imunisasibalita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `imunisasiibu`
--
ALTER TABLE `imunisasiibu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `prescription_id` (`prescription_id`),
  ADD KEY `rule_id` (`rule_id`);

--
-- Indeks untuk tabel `jadwalbalita`
--
ALTER TABLE `jadwalbalita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwalibu`
--
ALTER TABLE `jadwalibu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jeniskegiatan`
--
ALTER TABLE `jeniskegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_group_id` (`patient_group_id`);

--
-- Indeks untuk tabel `patient_group`
--
ALTER TABLE `patient_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeriksaanbalita`
--
ALTER TABLE `pemeriksaanbalita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balita_id` (`balita_id`),
  ADD KEY `imunisasibalita_id` (`imunisasibalita_id`),
  ADD KEY `penyuluhanbalita_id` (`penyuluhanbalita_id`);

--
-- Indeks untuk tabel `pemeriksaanibu`
--
ALTER TABLE `pemeriksaanibu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ibuhamil_id` (`ibuhamil_id`),
  ADD KEY `imunisasiibu_id` (`imunisasiibu_id`),
  ADD KEY `penyuluhanibu_id` (`penyuluhanibu_id`);

--
-- Indeks untuk tabel `penyuluhanbalita`
--
ALTER TABLE `penyuluhanbalita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyuluhanibu`
--
ALTER TABLE `penyuluhanibu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balita`
--
ALTER TABLE `balita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `doctor_specialist`
--
ALTER TABLE `doctor_specialist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ibuhamil`
--
ALTER TABLE `ibuhamil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `imunisasibalita`
--
ALTER TABLE `imunisasibalita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `imunisasiibu`
--
ALTER TABLE `imunisasiibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwalbalita`
--
ALTER TABLE `jadwalbalita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwalibu`
--
ALTER TABLE `jadwalibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jeniskegiatan`
--
ALTER TABLE `jeniskegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jk`
--
ALTER TABLE `jk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `patient_group`
--
ALTER TABLE `patient_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaanbalita`
--
ALTER TABLE `pemeriksaanbalita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaanibu`
--
ALTER TABLE `pemeriksaanibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyuluhanbalita`
--
ALTER TABLE `penyuluhanbalita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyuluhanibu`
--
ALTER TABLE `penyuluhanibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `specialist`
--
ALTER TABLE `specialist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `doctor_specialist`
--
ALTER TABLE `doctor_specialist`
  ADD CONSTRAINT `doctor_specialist_ibfk_1` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`),
  ADD CONSTRAINT `doctor_specialist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`id`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`);

--
-- Ketidakleluasaan untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ketidakleluasaan untuk tabel `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`patient_group_id`) REFERENCES `patient_group` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemeriksaanbalita`
--
ALTER TABLE `pemeriksaanbalita`
  ADD CONSTRAINT `pemeriksaanbalita_ibfk_1` FOREIGN KEY (`imunisasibalita_id`) REFERENCES `imunisasibalita` (`id`),
  ADD CONSTRAINT `pemeriksaanbalita_ibfk_2` FOREIGN KEY (`balita_id`) REFERENCES `balita` (`id`),
  ADD CONSTRAINT `pemeriksaanbalita_ibfk_3` FOREIGN KEY (`penyuluhanbalita_id`) REFERENCES `penyuluhanbalita` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemeriksaanibu`
--
ALTER TABLE `pemeriksaanibu`
  ADD CONSTRAINT `pemeriksaanibu_ibfk_1` FOREIGN KEY (`ibuhamil_id`) REFERENCES `ibuhamil` (`id`),
  ADD CONSTRAINT `pemeriksaanibu_ibfk_2` FOREIGN KEY (`imunisasiibu_id`) REFERENCES `imunisasiibu` (`id`),
  ADD CONSTRAINT `pemeriksaanibu_ibfk_3` FOREIGN KEY (`penyuluhanibu_id`) REFERENCES `penyuluhanibu` (`id`);

--
-- Ketidakleluasaan untuk tabel `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
