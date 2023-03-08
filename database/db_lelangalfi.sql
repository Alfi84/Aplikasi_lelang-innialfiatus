-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 02:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelangalfi`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(45, 52, 82, 17, 825000000),
(46, 52, 82, 18, 850000000),
(47, 53, 81, 12, 775000000),
(48, 53, 81, 17, 800000000),
(49, 57, 85, 17, 460000000),
(50, 57, 85, 19, 480000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `status_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `photo`, `tgl`, `harga_awal`, `status_barang`) VALUES
(80, 'Rumah tingkat 2 lantai', 'Luas : 462 m2 Lokasi : Perum. Citraland Cluster Taman Golf Blok C1 No. 7, Kel. Sambikerep, Kec. Sambikerep (d/h Kec. Lakarsantri), Kota Surabaya', 'rumah_tingkat_2_lantai.jpg', '2023-03-06', 600000000, 'dilelang'),
(81, 'Rumah 2 lantai coklat', 'Luas : 563 m2 Lokasi : Kel. Bendul Merisi, Kec. Wonocolo, Kota Surabaya, Provinsi Surabaya', 'rumah_2_lantai_coklat.jpg', '2023-03-05', 750000000, 'dilelang'),
(82, 'Rumah modern', 'Luas : 237 m2 Lokasi : Jl. Babatan Pratama XVIII/V-12, Kel. Babatan, Kec. Wiyung, Kota. Surabaya', 'Rumah_modern1.jpg', '2023-03-04', 800000000, 'dilelang'),
(83, 'Rumah sederhana', 'Luas : 116 m2 Lokasi : Perumahan Pantai Mentari Blok DD15 No. 01, Kel. Bulak, Kec. Bulak, Kota Surabaya', 'Rumah_sederhana.jpeg', '2023-03-06', 500000000, 'dilelang'),
(85, 'Rumah Istana', 'Luas : 335 m2 Lokasi : Blok C2-23, Kel. Lidah Wetan, Kec. Lakarsantri, Kota Surabaya setempat dikenal dengan Perum. Wisata Bukit Mas, Cluster Alexandria Acropolis Blok C2 No. 23, Kel. Lidah Wetan, Kec. Lakarsantri, Kota Surabaya', 'Rumah_istana1.jpg', '2023-03-06', 450000000, 'dilelang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` datetime NOT NULL,
  `harga_akhir` int(20) UNSIGNED DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL,
  `tanggal_akhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `nama_barang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`, `tanggal_akhir`) VALUES
(52, '', 82, '2023-03-05 08:59:00', 850000000, 18, 21, 'ditutup', '2023-03-06 10:00:00'),
(53, '', 81, '2023-03-06 09:01:00', 800000000, 17, 21, 'ditutup', '2023-03-06 09:39:00'),
(54, '', 80, '2023-03-06 09:07:00', NULL, NULL, 21, 'dibuka', '2023-03-07 10:07:00'),
(55, '', 83, '2023-03-06 10:08:00', NULL, NULL, 21, 'ditutup', '2023-03-06 21:30:00'),
(57, '', 85, '2023-03-06 20:30:00', 480000000, 19, 15, 'ditutup', '2023-03-07 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas'),
(3, 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `id_level`) VALUES
(1, 'Hilyatus zahro', 'hilya', '202cb962ac59075b964b07152d234b70', '082273615476', 3),
(12, 'herni wati', 'herni', '827ccb0eea8a706c4c34a16891f84e7b', '0987654323456', 3),
(13, 'alfiatus', 'alfi', '202cb962ac59075b964b07152d234b70', '098765434567', 3),
(17, 'Dina Tri', 'Dina', '202cb962ac59075b964b07152d234b70', '081234754962', 3),
(18, 'catur wulan', 'wulan', '202cb962ac59075b964b07152d234b70', '089764345876', 3),
(19, 'diana salsa', 'diana', '202cb962ac59075b964b07152d234b70', '087956437863', 3),
(20, 'dinda', 'dinda', '202cb962ac59075b964b07152d234b70', '098789654123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(15, 'herni wati', 'herni', '34173cb38f07f89ddbebc2ac9128303f', 2),
(16, 'alfiatus', 'alfii', '68d30a9594728bc39aa24be94b319d21', 2),
(19, 'alfia', 'alfi', '202cb962ac59075b964b07152d234b70', 1),
(21, 'herni wati', 'wati', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD CONSTRAINT `tb_masyarakat_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
