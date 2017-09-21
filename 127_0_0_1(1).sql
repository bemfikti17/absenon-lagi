-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2017 at 08:22 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--
CREATE DATABASE IF NOT EXISTS `absen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `absen`;

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
('14231645', 'Ryan Lewis', '1KA23', 'Sistem Informasi', 'Laki-Laki', '2017-09-05', 'Kalimalang', 'Staff Biro PTI'),
('16116611', 'Rizky Permana Putra', '1KA22', 'Sistem Informasi', 'Laki-Laki', '1998-09-01', 'Kalimalang', 'Staff Biro PTI');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(5) NOT NULL,
  `id_koor` int(5) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_koor`, `nama_kegiatan`) VALUES
(1, 1, 'TECHNO FAIR');

-- --------------------------------------------------------

--
-- Table structure for table `kepanitiaan`
--

CREATE TABLE `kepanitiaan` (
  `id_kepanitiaan` int(5) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `id_kegiatan` int(5) NOT NULL,
  `jabatan_panitia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepanitiaan`
--

INSERT INTO `kepanitiaan` (`id_kepanitiaan`, `npm`, `id_kegiatan`, `jabatan_panitia`) VALUES
(1, '16116611', 1, 'Ketua Pelaksana'),
(2, '14231645', 1, 'Koor Keamanan');

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `id_koor` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `npm` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koordinator`
--

INSERT INTO `koordinator` (`id_koor`, `username`, `password`, `npm`) VALUES
(1, 'kips08', '$2y$10$4YP4PYv.p.CCnmytEcP.5eWRDaaFyXIl76YPMQLOaW2WMAelcedEC', '16116611');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(5) NOT NULL,
  `id_rapat` int(5) NOT NULL,
  `id_kepanitiaan` int(5) NOT NULL,
  `hadir` int(5) NOT NULL,
  `tdk_hadir` int(5) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `jam_hadir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_rapat`, `id_kepanitiaan`, `hadir`, `tdk_hadir`, `keterangan`, `jam_hadir`) VALUES
(1, 1, 1, 1, 0, '-', '10:20'),
(2, 1, 2, 0, 1, 'Sakit', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id_rapat` int(5) NOT NULL,
  `bahasan` varchar(250) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_kegiatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `bahasan`, `tgl`, `id_kegiatan`) VALUES
(1, 'Keperluan Acara', '29Sep 2017', 1);

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
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_koor` (`id_koor`);

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
  MODIFY `id_kegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  MODIFY `id_kepanitiaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `id_koor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id_rapat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_koor`) REFERENCES `koordinator` (`id_koor`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
