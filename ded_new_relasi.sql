-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14 Nov 2018 pada 09.03
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ded_new_relasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(20) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_skpa` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_note`
--

CREATE TABLE `tbl_note` (
  `id_note` int(10) NOT NULL,
  `id_skpa` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_objek_data`
--

CREATE TABLE `tbl_objek_data` (
  `id_objek_data` int(15) NOT NULL,
  `id_suborganisasi` int(15) NOT NULL,
  `objek_data` varchar(200) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
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
-- Struktur dari tabel `tbl_parameter`
--

CREATE TABLE `tbl_parameter` (
  `id_parameter` int(12) NOT NULL,
  `id_objek_data` int(15) NOT NULL,
  `nama_parameter` varchar(50) NOT NULL,
  `tipe_data` enum('string','numeric','text','date') NOT NULL,
  `panjang_data` int(5) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_skpa`
--

CREATE TABLE `tbl_skpa` (
  `id_skpa` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_skpa` varchar(100) NOT NULL,
  `regulasi` varchar(70) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('aktif','non-aktif') NOT NULL DEFAULT 'non-aktif'
) ;

--
-- Dumping data untuk tabel `tbl_skpa`
--

INSERT INTO `tbl_skpa` (`id_skpa`, `username`, `password`, `nama_skpa`, `regulasi`, `level`, `status`) VALUES
(1, '', '', 'Sekretariat Daerah Aceh', 'Pergub Aceh No. 97 tahun 2016', 'user', 'non-aktif'),
(2, '', '', 'Sekretariat Dewan Perwakilan Rakyat Aceh', 'Pergub Aceh No. 98 tahun 2016', 'user', 'non-aktif'),
(3, '', '', 'Inspektorat Aceh', 'Pergub Aceh No. 99 tahun 2016', 'user', 'non-aktif'),
(4, '', '', 'Badan Perencanaan Pembangunan Daerah Aceh', 'Pergub Aceh No. 67 tahun 2018', 'user', 'non-aktif'),
(5, '', '', 'Badan Pengelolaan Keuangan Aceh', 'Pergub Aceh No. 66 tahun 2018', 'user', 'non-aktif'),
(6, '', '', 'Badan Kepegawaian Aceh', 'Pergub Aceh No. 102 tahun 2016', 'user', 'non-aktif'),
(7, '', '', 'Badan Pengembangan Sumber Daya manusia Aceh', 'Pergub Aceh No. 103 tahun 2016', 'user', 'non-aktif'),
(8, '', '', 'Badan Penangulangan Bencana Aceh', 'Pergub Aceh No. 104 tahun 2016', 'user', 'non-aktif'),
(9, '', '', 'Badan Penghubung Pemerintah Aceh', 'Pergub Aceh No. 105 tahun 2016', 'user', 'non-aktif'),
(10, '', '', 'Dinas Pendidikan Aceh', 'Pergub Aceh No. 106 tahun 2016', 'user', 'non-aktif'),
(11, '', '', 'Dinas Kesehatan Aceh', 'Pergub Aceh No. 107 tahun 2016', 'user', 'non-aktif'),
(12, '', '', 'Dinas Pekerjaan Umum dan Penataan Ruang Aceh', 'Pergub Aceh No. 108 tahun 2016', 'user', 'non-aktif'),
(13, '', '', 'Dinas Pengairan Aceh', 'Pergub Aceh No. 109 tahun 2016', 'user', 'non-aktif'),
(14, '', '', 'Dinas Perumahan Rakyat Aceh', 'Pergub Aceh No. 110 tahun 2016', 'user', 'non-aktif'),
(15, '', '', 'Dinas Sosial Aceh', 'Pergub Aceh No. 111 tahun 2016', 'user', 'non-aktif'),
(16, '', '', 'Dinas Tenaga Kerja dan Mobilitas Penduduk Aceh', 'Pergub Aceh No. 112 tahun 2016', 'user', 'non-aktif'),
(17, '', '', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'Pergub Aceh No. 113 tahun 2016', 'user', 'non-aktif'),
(18, '', '', 'Dinas Pangan Aceh', 'Pergub Aceh No. 114 tahun 2016', 'user', 'non-aktif'),
(19, '', '', 'Dinas Lingkungan Hidup dan Pangan Aceh', 'Pergub Aceh No. 115 tahun 2016', 'user', 'non-aktif'),
(20, '', '', 'Dinas registrasi Kependudukan Aceh', 'Pergub Aceh No. 116 tahun 2016', 'user', 'non-aktif'),
(21, '', '', 'Dinas Pemberdayaan Masyarakat dan Gampong Aceh', 'Pergub Aceh No. 117 tahun 2016', 'user', 'non-aktif'),
(22, '', '', 'Dinas Perhubungan Aceh', 'Pergub Aceh No. 118 tahun 2016', 'user', 'non-aktif'),
(23, '', '', 'Dinas Komunikasi, Informatika dan Persandian Aceh', 'Pergub Aceh No. 119 tahun 2016', 'user', 'non-aktif'),
(24, '', '', 'Dinas Koperasi dan Usaha Kecil Dan Menengah Aceh', 'Pergub Aceh No. 120 tahun 2016', 'user', 'non-aktif'),
(25, '', '', 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Aceh', 'Pergub Aceh No. 121 tahun 2016', 'user', 'non-aktif'),
(26, '', '', 'Dinas Pemuda Dan Olahraga Aceh', 'Pergub Aceh No. 122 tahun 2016', 'user', 'non-aktif'),
(27, '', '', 'Dinas Kebudayaan dan Pariwisata Aceh', 'Pergub Aceh No. 123 tahun 2016', 'user', 'non-aktif'),
(28, '', '', 'Dinas Perpustakaan dan Kearsipan Aceh', 'Pergub Aceh No. 124 tahun 2016', 'user', 'non-aktif'),
(29, '', '', 'Dinas Kelautan Dan Perikanan Aceh', 'Pergub Aceh No. 125 tahun 2016', 'user', 'non-aktif'),
(30, '', '', 'Dinas Pertanian dan Perkebunan Aceh', 'Pergub Aceh No. 126 tahun 2016', 'user', 'non-aktif'),
(31, '', '', 'Dinas Peternakan Aceh', 'Pergub Aceh No. 127 tahun 2016', 'user', 'non-aktif'),
(32, '', '', 'Dinas Energi dan Sumber Daya Mineral Aceh', 'Pergub Aceh No. 128 tahun 2016', 'user', 'non-aktif'),
(33, '', '', 'Dinas Perindustrian dan Perdagangan Aceh', 'Pergub Aceh No. 129 tahun 2016', 'user', 'non-aktif'),
(34, '', '', 'Keurukon Katibul Wali', 'Pergub Aceh No. 130 tahun 2016', 'user', 'non-aktif'),
(35, '', '', 'Dinas Syariat Islam Aceh', 'Pergub Aceh No. 131 tahun 2016', 'user', 'non-aktif'),
(36, '', '', 'Dinas Pendidikan dayah Aceh', 'Pergub Aceh No. 132 tahun 2016', 'user', 'non-aktif'),
(37, '', '', 'Dinas Pertanahan Aceh', 'Pergub Aceh No. 133 tahun 2016', 'user', 'non-aktif'),
(38, '', '', 'Sekretariat Majelis Permusyawaratan Ulama Aceh', 'Pergub Aceh No. 134 tahun 2016', 'user', 'non-aktif'),
(39, '', '', 'Sekretariat Majelis Adat Aceh', 'Pergub Aceh No. 135 tahun 2016', 'user', 'non-aktif'),
(40, '', '', 'Sekretariat Majelis Pendidikan Aceh', 'Pergub Aceh No. 136 tahun 2016', 'user', 'non-aktif'),
(41, '', '', 'Sekretariat Baitul Mal Aceh', 'Pergub Aceh No. 137 tahun 2016', 'user', 'non-aktif'),
(42, '', '', 'Sekretariat Badan Reintegrasi', 'Pergub Aceh No. 138 tahun 2016', 'user', 'non-aktif'),
(43, '', '', 'Satuan Polisi Pamong Praja dan Wilayatul Hisbah Aceh', 'Pergub Aceh No. 139 tahun 2016', 'user', 'non-aktif'),
(44, '', '', 'Rumah Sakit Umum dr. Zainoel Abidin', 'Pergub Aceh No. 140 tahun 2016', 'user', 'non-aktif'),
(45, '', '', 'Rumah Sakit Jiwa', 'Pergub Aceh No. 141 tahun 2016', 'user', 'non-aktif'),
(46, '', '', 'Rumah Sakit Ibu dan Anak', 'Pergub Aceh No. 142 tahun 2016', 'user', 'non-aktif'),
(47, '', '', 'Badan Kesatuan Bangsa dan Politik Aceh', 'Pergub Aceh No. 143 tahun 2016', 'user', 'non-aktif'),
(48, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suborganisasi`
--

CREATE TABLE `tbl_suborganisasi` (
  `id_suborganisasi` int(15) NOT NULL,
  `id_organisasi` int(15) NOT NULL,
  `nama_suborganisasi` varchar(200) NOT NULL,
  `tugas_sub` varchar(2000) NOT NULL,
  `fungsi_sub` varchar(2000) NOT NULL
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
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_skpa` (`id_skpa`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_skpa` (`id_skpa`);

--
-- Indexes for table `tbl_objek_data`
--
ALTER TABLE `tbl_objek_data`
  ADD PRIMARY KEY (`id_objek_data`),
  ADD KEY `id_suborganisasi` (`id_suborganisasi`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`),
  ADD KEY `id_skpa` (`id_skpa`);

--
-- Indexes for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_objek_data` (`id_objek_data`);

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
  ADD PRIMARY KEY (`id_suborganisasi`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `tbl_objek_data`
--
ALTER TABLE `tbl_objek_data`
  MODIFY `id_objek_data` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skpa`
--
ALTER TABLE `tbl_skpa`
  MODIFY `id_skpa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_suborganisasi`
--
ALTER TABLE `tbl_suborganisasi`
  MODIFY `id_suborganisasi` int(15) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD CONSTRAINT `tbl_dokumen_ibfk_1` FOREIGN KEY (`id_skpa`) REFERENCES `tbl_skpa` (`id_skpa`);

--
-- Ketidakleluasaan untuk tabel `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD CONSTRAINT `tbl_note_ibfk_1` FOREIGN KEY (`id_skpa`) REFERENCES `tbl_skpa` (`id_skpa`);

--
-- Ketidakleluasaan untuk tabel `tbl_objek_data`
--
ALTER TABLE `tbl_objek_data`
  ADD CONSTRAINT `tbl_objek_data_ibfk_1` FOREIGN KEY (`id_suborganisasi`) REFERENCES `tbl_suborganisasi` (`id_suborganisasi`);

--
-- Ketidakleluasaan untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD CONSTRAINT `tbl_organisasi_ibfk_1` FOREIGN KEY (`id_skpa`) REFERENCES `tbl_skpa` (`id_skpa`);

--
-- Ketidakleluasaan untuk tabel `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD CONSTRAINT `tbl_parameter_ibfk_1` FOREIGN KEY (`id_objek_data`) REFERENCES `tbl_objek_data` (`id_objek_data`);

--
-- Ketidakleluasaan untuk tabel `tbl_suborganisasi`
--
ALTER TABLE `tbl_suborganisasi`
  ADD CONSTRAINT `tbl_suborganisasi_ibfk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `tbl_organisasi` (`id_organisasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
