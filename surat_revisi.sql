-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 06:05 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_revisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_surat`
--

CREATE TABLE `tbl_jenis_surat` (
  `id` int(11) NOT NULL,
  `nama_prihal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_surat`
--

INSERT INTO `tbl_jenis_surat` (`id`, `nama_prihal`) VALUES
(1, 'Ijin kunjungan'),
(2, 'Observasi'),
(3, 'Tugas Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nama_lengkap` varchar(30) NOT NULL,
  `npm` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nama_lengkap`, `npm`, `semester`, `jurusan`, `kelas`, `username`, `password`) VALUES
('Hoerudin', '065115114', 6, 'Ilmu Komputer', 'D', '065115114', '065115114'),
('Andi', '065115115', 6, 'Ilmu Komputer', 'D', '065115115', '065115115');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`, `link`) VALUES
(4, 'PRIHAL', 'Prihal'),
(8, 'DATA MAHASISWA', 'Mahasiswa'),
(9, 'DATA SURAT', 'Surat'),
(10, 'PENGAJUAN SURAT', 'Pengajuan'),
(11, 'DOKUMENTASI', 'Dokumentasi'),
(13, 'KONFRIMASI SURAT', 'Konfrimasi'),
(15, 'PENGGUNA SISTEM', 'Pengguna'),
(16, 'PILIH SURAT', 'Pilih_surat'),
(17, 'DASHBOARD', 'Dashboard'),
(18, 'LOGOUT', 'Logout'),
(19, 'hdhdhd', 'dfdfdfdf'),
(20, 'fdfdfd', 'dfdfddfdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(11) NOT NULL,
  `nama_surat` varchar(30) NOT NULL,
  `jenis_surat` int(11) NOT NULL,
  `isi_surat` text NOT NULL,
  `nama_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `nama_surat`, `jenis_surat`, `isi_surat`, `nama_file`) VALUES
(19, 'surat observasi', 2, '', 'jurnal.docx'),
(20, 'ijin kunjungan', 1, '', 'jurnal1.docx'),
(21, 'Ta', 3, '', 'jurnal2.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `id_level_user`, `foto`, `nama_lengkap`) VALUES
(1, 'andihoerudin', 'andihoerudin', 1, 'jhdfkjshjdshdkjsaf', 'andihoerudin'),
(18, 'mahasiswa', 'mahasiswa', 2, '', 'ajajajadfdfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(52, 4, 1),
(53, 8, 1),
(54, 9, 1),
(55, 10, 1),
(56, 11, 1),
(57, 12, 1),
(58, 13, 1),
(59, 14, 1),
(60, 15, 1),
(62, 16, 1),
(63, 16, 2),
(64, 10, 2),
(65, 17, 1),
(66, 17, 2),
(67, 14, 2),
(68, 18, 1),
(69, 18, 2),
(70, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_surat`
--

CREATE TABLE `transaksi_surat` (
  `id_transaksi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_surat`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_surat` (
`id_transaksi` int(11)
,`nama_lengkap` varchar(30)
,`npm` int(11)
,`nama_prihal` varchar(30)
,`nama_surat` varchar(30)
,`tanggal_pengajuan` timestamp
,`status` int(11)
,`nama_file` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id_user` int(11)
,`nama_lengkap` varchar(30)
,`nama_level` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_surat`
--
DROP TABLE IF EXISTS `v_transaksi_surat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_surat`  AS  select `ts`.`id_transaksi` AS `id_transaksi`,`tm`.`nama_lengkap` AS `nama_lengkap`,`ts`.`npm` AS `npm`,`tjs`.`nama_prihal` AS `nama_prihal`,`tbs`.`nama_surat` AS `nama_surat`,`ts`.`tanggal_pengajuan` AS `tanggal_pengajuan`,`ts`.`status` AS `status`,`ts`.`nama_file` AS `nama_file` from (((`transaksi_surat` `ts` join `tbl_surat` `tbs`) join `tbl_jenis_surat` `tjs`) join `tbl_mahasiswa` `tm`) where ((`ts`.`npm` = `tm`.`npm`) and (`ts`.`id_surat` = `tbs`.`id_surat`) and (`tjs`.`id` = `tbs`.`jenis_surat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `tu`.`id_user` AS `id_user`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tls`.`nama_level` AS `nama_level` from (`tbl_user` `tu` join `tbl_level_user` `tls`) where (`tu`.`id_level_user` = `tls`.`id_level_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `transaksi_surat`
--
ALTER TABLE `transaksi_surat`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transaksi_surat`
--
ALTER TABLE `transaksi_surat`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
