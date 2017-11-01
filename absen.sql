-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 05:44 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(5) NOT NULL,
  `id_kegiatan` int(5) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `jml_hadir` int(5) NOT NULL,
  `jml_tdk_hdr` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `ttl` date NOT NULL,
  `domisili` varchar(15) NOT NULL,
  `kepengurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`npm`, `nama`, `kelas`, `jurusan`, `jenis_kelamin`, `ttl`, `domisili`, `kepengurusan`) VALUES
('12345678', 'Puyeng', '5KA88', 'Sistem Informasi', 'L', '2017-09-07', 'Depok', 'Haha'),
('13115561', 'Jibril Hartri Putra', '3KA01', 'Sistem Informasi', 'L', '1997-01-21', 'Depok', 'Gabut'),
('14231645', 'Ryan Lewis', '1KA23', 'Sistem Informasi', 'Laki-Laki', '2017-09-05', 'Kalimalang', 'Staff Biro PTI'),
('16116611', 'Rizky Permana Putra', '1KA22', 'Sistem Informasi', 'Laki-Laki', '1998-09-01', 'Kalimalang', 'Staff Biro PTI');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(5) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `ket_kegiatan` varchar(1000) DEFAULT NULL,
  `tgl_kegiatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `ket_kegiatan`, `tgl_kegiatan`) VALUES
(9, 'HAIII', 'APA AJA', '31-09-2017'),
(10, 'KEGIATAN ASIK', 'ASIK AJA', '02-09-2017');

-- --------------------------------------------------------

--
-- Table structure for table `kepanitiaan`
--

CREATE TABLE `kepanitiaan` (
  `id_kepanitiaan` int(5) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `id_kegiatan` int(5) DEFAULT NULL,
  `jabatan_panitia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepanitiaan`
--

INSERT INTO `kepanitiaan` (`id_kepanitiaan`, `npm`, `id_kegiatan`, `jabatan_panitia`) VALUES
(48, '12345678', 9, NULL),
(49, '13115561', 9, NULL),
(50, '14231645', 9, NULL),
(51, '16116611', 9, NULL),
(55, '12345678', 10, NULL),
(56, '13115561', 10, NULL),
(57, '14231645', 10, NULL),
(58, '16116611', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `id_koor` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `izin` int(11) NOT NULL COMMENT 'kalau 0 administrator, kalau 1 bph/mk, 2 ketuplak, 3 anggota',
  `last_login` varchar(25) DEFAULT NULL,
  `kegiatan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koordinator`
--

INSERT INTO `koordinator` (`id_koor`, `username`, `password`, `npm`, `izin`, `last_login`, `kegiatan`) VALUES
(1, 'kips08', '$2y$10$4YP4PYv.p.CCnmytEcP.5eWRDaaFyXIl76YPMQLOaW2WMAelcedEC', '16116611', 2, NULL, '9:10'),
(2, 'jibrilhp', '$2y$10$4YP4PYv.p.CCnmytEcP.5eWRDaaFyXIl76YPMQLOaW2WMAelcedEC', '13115561', 2, NULL, ''),
(3, 'jalur1', '$2y$10$4YP4PYv.p.CCnmytEcP.5eWRDaaFyXIl76YPMQLOaW2WMAelcedEC', '12345678', 3, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(5) NOT NULL,
  `id_rapat` int(5) DEFAULT NULL,
  `id_kepanitiaan` int(5) NOT NULL,
  `hadir` int(5) DEFAULT '0',
  `tdk_hadir` int(5) DEFAULT '1',
  `keterangan` varchar(250) DEFAULT 'Alpha',
  `jam_hadir` varchar(10) DEFAULT NULL COMMENT '{JAM}:{MENIT}:{DETIK}',
  `tgl_rapat` varchar(12) DEFAULT NULL COMMENT 'DD-MM-YYYY'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_rapat`, `id_kepanitiaan`, `hadir`, `tdk_hadir`, `keterangan`, `jam_hadir`, `tgl_rapat`) VALUES
(77, 21, 48, 0, 1, 'Alpha', NULL, NULL),
(78, 21, 49, 0, 1, 'Alpha', NULL, NULL),
(79, 21, 50, 0, 1, 'Alpha', NULL, NULL),
(80, 21, 51, 0, 1, 'Alpha', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id_rapat` int(5) NOT NULL,
  `rapat_ke` varchar(100) DEFAULT NULL,
  `bahasan` varchar(250) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `timestamp_selesai` varchar(10) DEFAULT NULL COMMENT 'pukul berapa absen ini expired..?',
  `id_kegiatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `rapat_ke`, `bahasan`, `tgl`, `timestamp_selesai`, `id_kegiatan`) VALUES
(21, '1', 'apa aja', '31-09-2017', '20:43:22', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  ADD PRIMARY KEY (`id_kepanitiaan`),
  ADD KEY `id_kepanitiaan` (`id_kepanitiaan`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`id_koor`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_rapat` (`id_rapat`),
  ADD KEY `id_kepanitiaan` (`id_kepanitiaan`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id_rapat`),
  ADD KEY `id_rapat` (`id_rapat`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  MODIFY `id_kepanitiaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `id_koor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id_rapat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `anggota` (`npm`);

--
-- Constraints for table `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  ADD CONSTRAINT `kepanitiaan_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `anggota` (`npm`),
  ADD CONSTRAINT `kepanitiaan_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_rapat`) REFERENCES `rapat` (`id_rapat`),
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_kepanitiaan`) REFERENCES `kepanitiaan` (`id_kepanitiaan`);

--
-- Constraints for table `rapat`
--
ALTER TABLE `rapat`
  ADD CONSTRAINT `rapat_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
