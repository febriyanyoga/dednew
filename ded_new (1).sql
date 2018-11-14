-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14 Nov 2018 pada 08.30
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(20) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(42, 1542160818, '::1', '23811149');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_skpa` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_objek_data`
--

CREATE TABLE `tbl_objek_data` (
  `id_objek_data` int(15) NOT NULL,
  `id_suborganisasi` int(15) NOT NULL,
  `objek_data` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_objek_data`
--

INSERT INTO `tbl_objek_data` (`id_objek_data`, `id_suborganisasi`, `objek_data`) VALUES
(1, 1, 'pga99_ surat masuk'),
(2, 1, 'pga99_surat_keluar'),
(3, 1, 'pga99_asset'),
(4, 1, 'pga99_inventaris'),
(5, 1, 'pga99_pegawai'),
(6, 1, 'pga99_perundang-undangan'),
(7, 1, 'pga99_humas_dan_protokoler'),
(8, 3, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id_organisasi`, `id_skpa`, `nama_organisasi`, `tugas`, `fungsi`) VALUES
(1, 3, 'Inspektur', '<p>Melakukan pengawasan terhadap pelaksanaan urusan pemerintahan di daerah provinsi, pelaksanaan pembinaan atas penyelenggaraan pemerintahan daerah kab/kota dan pelaksanaan urusan pemerintahan di kab/kota melaksanakan tugas umum pemerintahan dan pembangunan di bidang Pemerintahan Umum</p>', '<ol><li>perumusan kebijakan teknis bidang pengawasan&nbsp;<br>dan fasilitas pengawasan;</li><li>pelaksanaan pengawasan internal terhadap kinerja&nbsp;<br>dan keuangan melalui audit, reviu, evaluasi,&nbsp;<br>pemantauan, dan kegiatan pengawasan lainnya;</li><li>pelaksanaan pengawasan untuk tujuan tertentu&nbsp;<br>atas penugasan dari gubernur;</li><li>penyusunan laporan hasil pengawasan;</li><li>pelaksanaan administrasi inspektorat provinsi; dan</li><li>pelaksanaan tugas-tugas kedinasan lainnya yang&nbsp;<br>diberikan oleh Gubernur sesuai dengan tugas dan&nbsp;<br>fungsinya.</li></ol>'),
(3, 3, 'Sekretariat', '<p>Melakukan pengelolaan urusan administrasi, umum, perlengkapan, peralatan, kerumahtanggaan, perpustakaan, keuangan, kepegawaian, ketatalaksanaan, hubungan masyarakat, hukum, perundang-undangan, pelayanan administrasi, penyusunan program dan pelaporan</p>', '<p>a.&nbsp;&nbsp; pelaksanaan urusan ketatausahaan, rumah tangga, barang inventaris, aset, perlengkapan, peralatan, pemeliharaan dan perpustakaan;</p><p>b.&nbsp;&nbsp; pembinaan kepegawaian, organisasi, ketatalaksanaan, hukum dan perundang-undangan serta pelaksanaan hubungan masyarakat</p><p>c.&nbsp;&nbsp;&nbsp; pengelolaan administrasi keuangan;</p><p>d.&nbsp;&nbsp; penyusunan program kerja tahunan, jangka menengah dan jangka panjang;</p><p>e.&nbsp;&nbsp;&nbsp; penyusunan rencana anggaran yang bersumber dari APBA, APBN dan sumber lainnya;</p><p>f.&nbsp;&nbsp;&nbsp;&nbsp; penyusunan rencana strategis, laporan akuntabilitas kinerja dan rencana kinerja Inspektorat Aceh; dan</p><p>g. &nbsp; &nbsp;pelaksanaan tugas-tugas kedinasan lainnya yang diberikan oleh Inspektur Aceh sesuai dengan tugas dan fungsinya.</p>');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_parameter`
--

INSERT INTO `tbl_parameter` (`id_parameter`, `id_objek_data`, `nama_parameter`, `tipe_data`, `panjang_data`) VALUES
(1, 1, 'id', 'string', 20),
(2, 1, 'tanggal', 'date', 10),
(3, 1, 'hal', 'string', 15),
(4, 1, 'lampiran', 'text', 15),
(5, 1, 'disposisi', 'text', 50),
(6, 1, 'asal', 'text', 25),
(7, 2, 'id', 'string', 20),
(8, 2, 'tanggal', 'date', 10),
(9, 2, 'hal', 'text', 15),
(10, 2, 'lamp', 'text', 15),
(11, 2, 'disposisi', 'text', 50),
(12, 2, 'tujuan ', 'text', 25),
(13, 3, 'nama', 'text', 25),
(14, 3, 'tanggal_pembelian', 'date', 10),
(15, 3, 'kode', 'string', 10),
(16, 3, 'nilai', 'numeric', 20),
(17, 4, 'id', 'numeric', 15),
(18, 4, 'nama_barang', 'string', 25),
(19, 4, 'tanggal_pembelian', 'date', 10),
(20, 4, 'kode_barang', 'string', 10),
(21, 4, 'harga_barang', 'numeric', 20),
(22, 4, 'umur_pakai', 'numeric', 2),
(23, 4, 'tipe_barang', 'string', 10),
(24, 4, 'merk_barang', 'text', 10),
(25, 5, 'id', 'numeric', 15),
(26, 5, 'nama', 'text', 25),
(27, 5, 'tanggal_lahir', 'date', 10),
(28, 5, 'tempat_lahir', 'text', 20),
(29, 5, 'tahun_masuk', 'numeric', 4),
(30, 6, 'nomor_peraturan', 'string', 20),
(31, 6, 'hal_peraturan', 'text', 50),
(32, 6, 'tanggal_penetapan', 'date', 10),
(33, 7, 'acara', 'text', 30),
(34, 7, 'undangan', 'text', 30),
(35, 7, 'press_realease', 'text', 100),
(36, 7, 'kerjasama', 'text', 100),
(37, 7, 'redaksi_website', 'string', 600),
(38, 7, 'admin_medsos', 'string', 600),
(39, 8, '', 'string', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nama_sistem`, `alamat`, `provinsi`, `kabupaten`, `no_telp`, `logo`) VALUES
(1, 'Aplikasi Repository Basis Data Tunggal Aceh', 'Aceh', 'Nangroe Aceh Darusalam', 'Banda Aceh', '0212345678', 'Coat_of_arms_of_Aceh_svg.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_suborganisasi`
--

INSERT INTO `tbl_suborganisasi` (`id_suborganisasi`, `id_organisasi`, `nama_suborganisasi`, `tugas_sub`, `fungsi_sub`) VALUES
(1, 3, 'Sub Bagian Umum', '<p>Melakukan urusan ketatausahaan, rumah tangga, barang inventaris, aset, perlengkapan, peralatan, pemeliharaan dan perpustakaan kepegawaian, organisasi, ketatalaksanaan, hukum, perundang - undangan, pelaksanaan hubungan masyarakat dan protokoler.</p>', '<p>&nbsp;</p>'),
(3, 1, '', '', '');

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
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `tbl_objek_data`
--
ALTER TABLE `tbl_objek_data`
  ADD PRIMARY KEY (`id_objek_data`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  ADD PRIMARY KEY (`id_parameter`);

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
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `id_note` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_objek_data`
--
ALTER TABLE `tbl_objek_data`
  MODIFY `id_objek_data` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_parameter`
--
ALTER TABLE `tbl_parameter`
  MODIFY `id_parameter` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_skpa`
--
ALTER TABLE `tbl_skpa`
  MODIFY `id_skpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_suborganisasi`
--
ALTER TABLE `tbl_suborganisasi`
  MODIFY `id_suborganisasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
