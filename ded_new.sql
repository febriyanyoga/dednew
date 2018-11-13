-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 03:33 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ded_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(20) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1541390705, '::1', '05929635'),
(2, 1541390744, '::1', '48372260'),
(3, 1541390777, '::1', '57230772'),
(4, 1541390941, '::1', '26142900'),
(5, 1541390960, '::1', '54241660'),
(6, 1541390969, '::1', '83781750'),
(7, 1541390999, '::1', '09083178');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ded`
--

CREATE TABLE `tbl_ded` (
  `id_ded` int(15) NOT NULL,
  `id_tupoksi` int(15) NOT NULL,
  `objek_data` varchar(200) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_ded` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id_dokumen`, `id_ded`, `nama_dokumen`, `nama_file`) VALUES
(8, 1, 'tes', '618e60dacc29fa45e8d89996d8573bad.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note`
--

CREATE TABLE `tbl_note` (
  `id_note` int(10) NOT NULL,
  `id_ded` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ;

--
-- Dumping data for table `tbl_note`
--

INSERT INTO `tbl_note` (`id_note`, `id_ded`, `judul`, `note`, `tanggal`) VALUES
(2, 1, 'coba', 'asdaa', '2018-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id_organisasi` int(15) NOT NULL,
  `id_skpa` int(15) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `tugas` varchar(2000) NOT NULL,
  `fungsi` varchar(2000) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` int(11) NOT NULL,
  `nama_sistem` varchar(70) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL
) ;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nama_sistem`, `alamat`, `provinsi`, `kabupaten`, `no_telp`, `logo`) VALUES
(1, 'Aplikasi Repository Basis Data Tunggal Aceh', 'Aceh', 'Nangroe Aceh Darusalam', 'Banda Aceh', '0212345678', 'Coat_of_arms_of_Aceh_svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skpa`
--

CREATE TABLE `tbl_skpa` (
  `id_skpa` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_skpa` varchar(255) NOT NULL,
  `regulasi` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suborganisasi`
--

CREATE TABLE `tbl_suborganisasi` (
  `id_suborganisasi` int(15) NOT NULL,
  `id_organisasi` int(15) NOT NULL,
  `nama_suborganisasi` varchar(200) NOT NULL,
  `tugas` varchar(2000) NOT NULL,
  `fungsi` varchar(2000) NOT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `tbl_ded`
--
ALTER TABLE `tbl_ded`
  ADD PRIMARY KEY (`id_ded`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skpa`
--
ALTER TABLE `tbl_skpa`
  ADD PRIMARY KEY (`id_skpa`);

--
-- Indexes for table `tbl_suborganisasi`
--
ALTER TABLE `tbl_suborganisasi`
  ADD PRIMARY KEY (`id_suborganisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ded`
--
ALTER TABLE `tbl_ded`
  MODIFY `id_ded` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `id_note` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_skpa`
--
ALTER TABLE `tbl_skpa`
  MODIFY `id_skpa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suborganisasi`
--
ALTER TABLE `tbl_suborganisasi`
  MODIFY `id_suborganisasi` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
