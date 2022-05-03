-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2021 at 03:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `iddetail` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penilaian`
--

INSERT INTO `detail_penilaian` (`iddetail`, `id_penilaian`, `id_subkriteria`) VALUES
(1, 1, 1),
(2, 1, 8),
(3, 1, 13),
(4, 1, 17),
(5, 1, 22),
(6, 2, 4),
(7, 2, 8),
(8, 2, 13),
(9, 2, 19),
(10, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `devisi`
--

CREATE TABLE `devisi` (
  `iddevisi` int(11) NOT NULL,
  `nama_devisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devisi`
--

INSERT INTO `devisi` (`iddevisi`, `nama_devisi`) VALUES
(1, 'Devisi 1');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `id_devisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `nama_karyawan`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `pendidikan`, `tanggal_masuk`, `no_telepon`, `id_devisi`) VALUES
(1, 'FIkri', 'Padang', '1993-12-13', 'Laki-Laki', 'Padang', 'SI Sederajat', '2021-02-09', '082285588848', 1),
(2, 'Ihsanul Arif', 'Padang', '2021-02-10', 'Laki-Laki', 'Padang', 'SI Sederajat', '2021-02-09', '082169008091', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idkriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Kedisiplinan', 20),
(2, 'Kerajinan', 20),
(3, 'Loyalitas', 20),
(4, 'Sikap', 25),
(5, 'Semangat Kerja', 15);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idpenilaian` int(11) NOT NULL,
  `tanggal_penilaian` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `status_penilaian` varchar(30) NOT NULL,
  `total_penilaian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`idpenilaian`, `tanggal_penilaian`, `id_karyawan`, `status_penilaian`, `total_penilaian`) VALUES
(1, '2021-02-10', 1, 'Sukses', 100),
(2, '2021-02-10', 2, 'Sukses', 79);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `idsub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`idsub_kriteria`, `id_kriteria`, `nama_subkriteria`, `nilai`) VALUES
(1, 1, 'Sangat Disiplin', 100),
(2, 1, 'Disiplin', 80),
(4, 1, 'Cukup Disiplin', 60),
(5, 1, 'Kurang Disiplin', 40),
(6, 1, 'Tidak Disiplin', 20),
(7, 2, 'Sangat Rajin', 100),
(8, 2, 'Rajin', 80),
(9, 2, 'Cukup rajin', 60),
(10, 2, 'Kurang Rajin', 40),
(11, 2, 'Tidak Rajin', 20),
(12, 3, 'Sangat Loyal', 100),
(13, 3, 'Loyal', 80),
(14, 3, 'Cukup Loyal', 40),
(15, 3, 'Kurang Loyal', 40),
(16, 3, 'Tidak Loyal', 20),
(17, 4, 'Sangat Baik', 100),
(18, 4, 'Baik', 80),
(19, 4, 'Cukup Baik', 60),
(20, 4, 'Kurang Baik', 40),
(21, 4, 'Tidak Baik', 20),
(22, 5, 'Sangat Semangat', 100),
(23, 5, 'Semangat', 80),
(24, 5, 'Cukup Semangat', 60),
(25, 5, 'Kurang Semangat', 40),
(26, 5, 'Tidak Semangat', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama_user`, `username`, `password`, `jabatan`, `foto`) VALUES
(1, 'Kepala', 'hrd', 'hrd', 'HRD', 'default.png'),
(2, 'Rio Irawan', 'rio', 'rio', 'Section Manager', 'default.png'),
(3, 'Roydo Ari Pratama', 'edo', 'edo', 'Departemen Manager', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`iddevisi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idpenilaian`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`idsub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `devisi`
--
ALTER TABLE `devisi`
  MODIFY `iddevisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `idsub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
